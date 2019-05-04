<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserHistoryControllerRequest;
use App\Http\Requests\UpdateUserHistoryControllerRequest;
use App\Repositories\UserHistoryControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserHistoryControllerController extends AppBaseController
{
    /** @var  UserHistoryControllerRepository */
    private $userHistoryControllerRepository;

    public function __construct(UserHistoryControllerRepository $userHistoryControllerRepo)
    {
        $this->userHistoryControllerRepository = $userHistoryControllerRepo;
    }

    /**
     * Display a listing of the UserHistoryController.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userHistoryControllerRepository->pushCriteria(new RequestCriteria($request));
        $userHistoryControllers = $this->userHistoryControllerRepository->all();

        return view('user_history_controllers.index')
            ->with('userHistoryControllers', $userHistoryControllers);
    }

    /**
     * Show the form for creating a new UserHistoryController.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_history_controllers.create');
    }

    /**
     * Store a newly created UserHistoryController in storage.
     *
     * @param CreateUserHistoryControllerRequest $request
     *
     * @return Response
     */
    public function store(CreateUserHistoryControllerRequest $request)
    {
        $input = $request->all();

        $userHistoryController = $this->userHistoryControllerRepository->create($input);

        Flash::success('User History Controller saved successfully.');

        return redirect(route('userHistoryControllers.index'));
    }

    /**
     * Display the specified UserHistoryController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userHistoryController = $this->userHistoryControllerRepository->findWithoutFail($id);

        if (empty($userHistoryController)) {
            Flash::error('User History Controller not found');

            return redirect(route('userHistoryControllers.index'));
        }

        return view('user_history_controllers.show')->with('userHistoryController', $userHistoryController);
    }

    /**
     * Show the form for editing the specified UserHistoryController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userHistoryController = $this->userHistoryControllerRepository->findWithoutFail($id);

        if (empty($userHistoryController)) {
            Flash::error('User History Controller not found');

            return redirect(route('userHistoryControllers.index'));
        }

        return view('user_history_controllers.edit')->with('userHistoryController', $userHistoryController);
    }

    /**
     * Update the specified UserHistoryController in storage.
     *
     * @param  int              $id
     * @param UpdateUserHistoryControllerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserHistoryControllerRequest $request)
    {
        $userHistoryController = $this->userHistoryControllerRepository->findWithoutFail($id);

        if (empty($userHistoryController)) {
            Flash::error('User History Controller not found');

            return redirect(route('userHistoryControllers.index'));
        }

        $userHistoryController = $this->userHistoryControllerRepository->update($request->all(), $id);

        Flash::success('User History Controller updated successfully.');

        return redirect(route('userHistoryControllers.index'));
    }

    /**
     * Remove the specified UserHistoryController from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userHistoryController = $this->userHistoryControllerRepository->findWithoutFail($id);

        if (empty($userHistoryController)) {
            Flash::error('User History Controller not found');

            return redirect(route('userHistoryControllers.index'));
        }

        $this->userHistoryControllerRepository->delete($id);

        Flash::success('User History Controller deleted successfully.');

        return redirect(route('userHistoryControllers.index'));
    }
}
