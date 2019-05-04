<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSentenceMatchingControllerRequest;
use App\Http\Requests\UpdateSentenceMatchingControllerRequest;
use App\Repositories\SentenceMatchingControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SentenceMatchingControllerController extends AppBaseController
{
    /** @var  SentenceMatchingControllerRepository */
    private $sentenceMatchingControllerRepository;

    public function __construct(SentenceMatchingControllerRepository $sentenceMatchingControllerRepo)
    {
        $this->sentenceMatchingControllerRepository = $sentenceMatchingControllerRepo;
    }

    /**
     * Display a listing of the SentenceMatchingController.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sentenceMatchingControllerRepository->pushCriteria(new RequestCriteria($request));
        $sentenceMatchingControllers = $this->sentenceMatchingControllerRepository->all();

        return view('sentence_matching_controllers.index')
            ->with('sentenceMatchingControllers', $sentenceMatchingControllers);
    }

    /**
     * Show the form for creating a new SentenceMatchingController.
     *
     * @return Response
     */
    public function create()
    {
        return view('sentence_matching_controllers.create');
    }

    /**
     * Store a newly created SentenceMatchingController in storage.
     *
     * @param CreateSentenceMatchingControllerRequest $request
     *
     * @return Response
     */
    public function store(CreateSentenceMatchingControllerRequest $request)
    {
        $input = $request->all();

        $sentenceMatchingController = $this->sentenceMatchingControllerRepository->create($input);

        Flash::success('Sentence Matching Controller saved successfully.');

        return redirect(route('sentenceMatchingControllers.index'));
    }

    /**
     * Display the specified SentenceMatchingController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sentenceMatchingController = $this->sentenceMatchingControllerRepository->findWithoutFail($id);

        if (empty($sentenceMatchingController)) {
            Flash::error('Sentence Matching Controller not found');

            return redirect(route('sentenceMatchingControllers.index'));
        }

        return view('sentence_matching_controllers.show')->with('sentenceMatchingController', $sentenceMatchingController);
    }

    /**
     * Show the form for editing the specified SentenceMatchingController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sentenceMatchingController = $this->sentenceMatchingControllerRepository->findWithoutFail($id);

        if (empty($sentenceMatchingController)) {
            Flash::error('Sentence Matching Controller not found');

            return redirect(route('sentenceMatchingControllers.index'));
        }

        return view('sentence_matching_controllers.edit')->with('sentenceMatchingController', $sentenceMatchingController);
    }

    /**
     * Update the specified SentenceMatchingController in storage.
     *
     * @param  int              $id
     * @param UpdateSentenceMatchingControllerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSentenceMatchingControllerRequest $request)
    {
        $sentenceMatchingController = $this->sentenceMatchingControllerRepository->findWithoutFail($id);

        if (empty($sentenceMatchingController)) {
            Flash::error('Sentence Matching Controller not found');

            return redirect(route('sentenceMatchingControllers.index'));
        }

        $sentenceMatchingController = $this->sentenceMatchingControllerRepository->update($request->all(), $id);

        Flash::success('Sentence Matching Controller updated successfully.');

        return redirect(route('sentenceMatchingControllers.index'));
    }

    /**
     * Remove the specified SentenceMatchingController from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sentenceMatchingController = $this->sentenceMatchingControllerRepository->findWithoutFail($id);

        if (empty($sentenceMatchingController)) {
            Flash::error('Sentence Matching Controller not found');

            return redirect(route('sentenceMatchingControllers.index'));
        }

        $this->sentenceMatchingControllerRepository->delete($id);

        Flash::success('Sentence Matching Controller deleted successfully.');

        return redirect(route('sentenceMatchingControllers.index'));
    }
}
