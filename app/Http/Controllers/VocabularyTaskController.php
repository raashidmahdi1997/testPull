<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVocabularyTaskControllerRequest;
use App\Http\Requests\UpdateVocabularyTaskControllerRequest;
use App\Repositories\VocabularyTaskControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VocabularyTaskControllerController extends AppBaseController
{
    /** @var  VocabularyTaskControllerRepository */
    private $vocabularyTaskControllerRepository;

    public function __construct(VocabularyTaskControllerRepository $vocabularyTaskControllerRepo)
    {
        $this->vocabularyTaskControllerRepository = $vocabularyTaskControllerRepo;
    }

    /**
     * Display a listing of the VocabularyTaskController.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vocabularyTaskControllerRepository->pushCriteria(new RequestCriteria($request));
        $vocabularyTaskControllers = $this->vocabularyTaskControllerRepository->all();

        return view('vocabulary_task_controllers.index')
            ->with('vocabularyTaskControllers', $vocabularyTaskControllers);
    }

    /**
     * Show the form for creating a new VocabularyTaskController.
     *
     * @return Response
     */
    public function create()
    {
        return view('vocabulary_task_controllers.create');
    }

    /**
     * Store a newly created VocabularyTaskController in storage.
     *
     * @param CreateVocabularyTaskControllerRequest $request
     *
     * @return Response
     */
    public function store(CreateVocabularyTaskControllerRequest $request)
    {
        $input = $request->all();

        $vocabularyTaskController = $this->vocabularyTaskControllerRepository->create($input);

        Flash::success('Vocabulary Task Controller saved successfully.');

        return redirect(route('vocabularyTaskControllers.index'));
    }

    /**
     * Display the specified VocabularyTaskController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vocabularyTaskController = $this->vocabularyTaskControllerRepository->findWithoutFail($id);

        if (empty($vocabularyTaskController)) {
            Flash::error('Vocabulary Task Controller not found');

            return redirect(route('vocabularyTaskControllers.index'));
        }

        return view('vocabulary_task_controllers.show')->with('vocabularyTaskController', $vocabularyTaskController);
    }

    /**
     * Show the form for editing the specified VocabularyTaskController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vocabularyTaskController = $this->vocabularyTaskControllerRepository->findWithoutFail($id);

        if (empty($vocabularyTaskController)) {
            Flash::error('Vocabulary Task Controller not found');

            return redirect(route('vocabularyTaskControllers.index'));
        }

        return view('vocabulary_task_controllers.edit')->with('vocabularyTaskController', $vocabularyTaskController);
    }

    /**
     * Update the specified VocabularyTaskController in storage.
     *
     * @param  int              $id
     * @param UpdateVocabularyTaskControllerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVocabularyTaskControllerRequest $request)
    {
        $vocabularyTaskController = $this->vocabularyTaskControllerRepository->findWithoutFail($id);

        if (empty($vocabularyTaskController)) {
            Flash::error('Vocabulary Task Controller not found');

            return redirect(route('vocabularyTaskControllers.index'));
        }

        $vocabularyTaskController = $this->vocabularyTaskControllerRepository->update($request->all(), $id);

        Flash::success('Vocabulary Task Controller updated successfully.');

        return redirect(route('vocabularyTaskControllers.index'));
    }

    /**
     * Remove the specified VocabularyTaskController from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vocabularyTaskController = $this->vocabularyTaskControllerRepository->findWithoutFail($id);

        if (empty($vocabularyTaskController)) {
            Flash::error('Vocabulary Task Controller not found');

            return redirect(route('vocabularyTaskControllers.index'));
        }

        $this->vocabularyTaskControllerRepository->delete($id);

        Flash::success('Vocabulary Task Controller deleted successfully.');

        return redirect(route('vocabularyTaskControllers.index'));
    }
}
