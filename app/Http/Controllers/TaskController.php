<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskControllerRequest;
use App\Http\Requests\UpdateTaskControllerRequest;
use App\Repositories\TaskControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TaskControllerController extends AppBaseController
{
    /** @var  TaskControllerRepository */
    private $taskControllerRepository;

    public function __construct(TaskControllerRepository $taskControllerRepo)
    {
        $this->taskControllerRepository = $taskControllerRepo;
    }

    /**
     * Display a listing of the TaskController.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->taskControllerRepository->pushCriteria(new RequestCriteria($request));
        $taskControllers = $this->taskControllerRepository->all();

        return view('task_controllers.index')
            ->with('taskControllers', $taskControllers);
    }

    /**
     * Show the form for creating a new TaskController.
     *
     * @return Response
     */
    public function create()
    {
        return view('task_controllers.create');
    }

    /**
     * Store a newly created TaskController in storage.
     *
     * @param CreateTaskControllerRequest $request
     *
     * @return Response
     */
    public function store(CreateTaskControllerRequest $request)
    {
        $input = $request->all();

        $taskController = $this->taskControllerRepository->create($input);

        Flash::success('Task Controller saved successfully.');

        return redirect(route('taskControllers.index'));
    }

    /**
     * Display the specified TaskController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $taskController = $this->taskControllerRepository->findWithoutFail($id);

        if (empty($taskController)) {
            Flash::error('Task Controller not found');

            return redirect(route('taskControllers.index'));
        }

        return view('task_controllers.show')->with('taskController', $taskController);
    }

    /**
     * Show the form for editing the specified TaskController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $taskController = $this->taskControllerRepository->findWithoutFail($id);

        if (empty($taskController)) {
            Flash::error('Task Controller not found');

            return redirect(route('taskControllers.index'));
        }

        return view('task_controllers.edit')->with('taskController', $taskController);
    }

    /**
     * Update the specified TaskController in storage.
     *
     * @param  int              $id
     * @param UpdateTaskControllerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTaskControllerRequest $request)
    {
        $taskController = $this->taskControllerRepository->findWithoutFail($id);

        if (empty($taskController)) {
            Flash::error('Task Controller not found');

            return redirect(route('taskControllers.index'));
        }

        $taskController = $this->taskControllerRepository->update($request->all(), $id);

        Flash::success('Task Controller updated successfully.');

        return redirect(route('taskControllers.index'));
    }

    /**
     * Remove the specified TaskController from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $taskController = $this->taskControllerRepository->findWithoutFail($id);

        if (empty($taskController)) {
            Flash::error('Task Controller not found');

            return redirect(route('taskControllers.index'));
        }

        $this->taskControllerRepository->delete($id);

        Flash::success('Task Controller deleted successfully.');

        return redirect(route('taskControllers.index'));
    }
}
