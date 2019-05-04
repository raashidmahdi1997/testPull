<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFixJumbledSentencesControllerRequest;
use App\Http\Requests\UpdateFixJumbledSentencesControllerRequest;
use App\Repositories\FixJumbledSentencesControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FixJumbledSentencesControllerController extends AppBaseController
{
    /** @var  FixJumbledSentencesControllerRepository */
    private $fixJumbledSentencesControllerRepository;

    public function __construct(FixJumbledSentencesControllerRepository $fixJumbledSentencesControllerRepo)
    {
        $this->fixJumbledSentencesControllerRepository = $fixJumbledSentencesControllerRepo;
    }

    /**
     * Display a listing of the FixJumbledSentencesController.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fixJumbledSentencesControllerRepository->pushCriteria(new RequestCriteria($request));
        $fixJumbledSentencesControllers = $this->fixJumbledSentencesControllerRepository->all();

        return view('fix_jumbled_sentences_controllers.index')
            ->with('fixJumbledSentencesControllers', $fixJumbledSentencesControllers);
    }

    /**
     * Show the form for creating a new FixJumbledSentencesController.
     *
     * @return Response
     */
    public function create()
    {
        return view('fix_jumbled_sentences_controllers.create');
    }

    /**
     * Store a newly created FixJumbledSentencesController in storage.
     *
     * @param CreateFixJumbledSentencesControllerRequest $request
     *
     * @return Response
     */
    public function store(CreateFixJumbledSentencesControllerRequest $request)
    {
        $input = $request->all();

        $fixJumbledSentencesController = $this->fixJumbledSentencesControllerRepository->create($input);

        Flash::success('Fix Jumbled Sentences Controller saved successfully.');

        return redirect(route('fixJumbledSentencesControllers.index'));
    }

    /**
     * Display the specified FixJumbledSentencesController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fixJumbledSentencesController = $this->fixJumbledSentencesControllerRepository->findWithoutFail($id);

        if (empty($fixJumbledSentencesController)) {
            Flash::error('Fix Jumbled Sentences Controller not found');

            return redirect(route('fixJumbledSentencesControllers.index'));
        }

        return view('fix_jumbled_sentences_controllers.show')->with('fixJumbledSentencesController', $fixJumbledSentencesController);
    }

    /**
     * Show the form for editing the specified FixJumbledSentencesController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fixJumbledSentencesController = $this->fixJumbledSentencesControllerRepository->findWithoutFail($id);

        if (empty($fixJumbledSentencesController)) {
            Flash::error('Fix Jumbled Sentences Controller not found');

            return redirect(route('fixJumbledSentencesControllers.index'));
        }

        return view('fix_jumbled_sentences_controllers.edit')->with('fixJumbledSentencesController', $fixJumbledSentencesController);
    }

    /**
     * Update the specified FixJumbledSentencesController in storage.
     *
     * @param  int              $id
     * @param UpdateFixJumbledSentencesControllerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFixJumbledSentencesControllerRequest $request)
    {
        $fixJumbledSentencesController = $this->fixJumbledSentencesControllerRepository->findWithoutFail($id);

        if (empty($fixJumbledSentencesController)) {
            Flash::error('Fix Jumbled Sentences Controller not found');

            return redirect(route('fixJumbledSentencesControllers.index'));
        }

        $fixJumbledSentencesController = $this->fixJumbledSentencesControllerRepository->update($request->all(), $id);

        Flash::success('Fix Jumbled Sentences Controller updated successfully.');

        return redirect(route('fixJumbledSentencesControllers.index'));
    }

    /**
     * Remove the specified FixJumbledSentencesController from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fixJumbledSentencesController = $this->fixJumbledSentencesControllerRepository->findWithoutFail($id);

        if (empty($fixJumbledSentencesController)) {
            Flash::error('Fix Jumbled Sentences Controller not found');

            return redirect(route('fixJumbledSentencesControllers.index'));
        }

        $this->fixJumbledSentencesControllerRepository->delete($id);

        Flash::success('Fix Jumbled Sentences Controller deleted successfully.');

        return redirect(route('fixJumbledSentencesControllers.index'));
    }
}
