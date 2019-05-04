<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTranslationControllerRequest;
use App\Http\Requests\UpdateTranslationControllerRequest;
use App\Repositories\TranslationControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TranslationController extends AppBaseController
{
    /** @var  TranslationControllerRepository */
    private $translationControllerRepository;

    public function __construct(TranslationControllerRepository $translationControllerRepo)
    {
        $this->translationControllerRepository = $translationControllerRepo;
    }

    /**
     * Display a listing of the TranslationController.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->translationControllerRepository->pushCriteria(new RequestCriteria($request));
        $translationControllers = $this->translationControllerRepository->all();

        return view('translation_controllers.index')
            ->with('translationControllers', $translationControllers);
    }

    /**
     * Show the form for creating a new TranslationController.
     *
     * @return Response
     */
    public function create()
    {
        return view('translation_controllers.create');
    }

    /**
     * Store a newly created TranslationController in storage.
     *
     * @param CreateTranslationControllerRequest $request
     *
     * @return Response
     */
    public function store(CreateTranslationControllerRequest $request)
    {
        $input = $request->all();

        $translationController = $this->translationControllerRepository->create($input);

        Flash::success('Translation Controller saved successfully.');

        return redirect(route('translationControllers.index'));
    }

    /**
     * Display the specified TranslationController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $translationController = $this->translationControllerRepository->findWithoutFail($id);

        if (empty($translationController)) {
            Flash::error('Translation Controller not found');

            return redirect(route('translationControllers.index'));
        }

        return view('translation_controllers.show')->with('translationController', $translationController);
    }

    /**
     * Show the form for editing the specified TranslationController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $translationController = $this->translationControllerRepository->findWithoutFail($id);

        if (empty($translationController)) {
            Flash::error('Translation Controller not found');

            return redirect(route('translationControllers.index'));
        }

        return view('translation_controllers.edit')->with('translationController', $translationController);
    }

    /**
     * Update the specified TranslationController in storage.
     *
     * @param  int              $id
     * @param UpdateTranslationControllerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTranslationControllerRequest $request)
    {
        $translationController = $this->translationControllerRepository->findWithoutFail($id);

        if (empty($translationController)) {
            Flash::error('Translation Controller not found');

            return redirect(route('translationControllers.index'));
        }

        $translationController = $this->translationControllerRepository->update($request->all(), $id);

        Flash::success('Translation Controller updated successfully.');

        return redirect(route('translationControllers.index'));
    }

    /**
     * Remove the specified TranslationController from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $translationController = $this->translationControllerRepository->findWithoutFail($id);

        if (empty($translationController)) {
            Flash::error('Translation Controller not found');

            return redirect(route('translationControllers.index'));
        }

        $this->translationControllerRepository->delete($id);

        Flash::success('Translation Controller deleted successfully.');

        return redirect(route('translationControllers.index'));
    }
}
