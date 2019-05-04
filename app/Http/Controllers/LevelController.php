<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLevelControllerRequest;
use App\Http\Requests\UpdateLevelControllerRequest;
use App\Repositories\LevelControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LevelControllerController extends AppBaseController
{
    /** @var  LevelControllerRepository */
    private $levelControllerRepository;

    public function __construct(LevelControllerRepository $levelControllerRepo)
    {
        $this->levelControllerRepository = $levelControllerRepo;
    }

    /**
     * Display a listing of the LevelController.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->levelControllerRepository->pushCriteria(new RequestCriteria($request));
        $levelControllers = $this->levelControllerRepository->all();

        return view('level_controllers.index')
            ->with('levelControllers', $levelControllers);
    }

    /**
     * Show the form for creating a new LevelController.
     *
     * @return Response
     */
    public function create()
    {
        return view('level_controllers.create');
    }

    /**
     * Store a newly created LevelController in storage.
     *
     * @param CreateLevelControllerRequest $request
     *
     * @return Response
     */
    public function store(CreateLevelControllerRequest $request)
    {
        $input = $request->all();

        $levelController = $this->levelControllerRepository->create($input);

        Flash::success('Level Controller saved successfully.');

        return redirect(route('levelControllers.index'));
    }

    /**
     * Display the specified LevelController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $levelController = $this->levelControllerRepository->findWithoutFail($id);

        if (empty($levelController)) {
            Flash::error('Level Controller not found');

            return redirect(route('levelControllers.index'));
        }

        return view('level_controllers.show')->with('levelController', $levelController);
    }

    /**
     * Show the form for editing the specified LevelController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $levelController = $this->levelControllerRepository->findWithoutFail($id);

        if (empty($levelController)) {
            Flash::error('Level Controller not found');

            return redirect(route('levelControllers.index'));
        }

        return view('level_controllers.edit')->with('levelController', $levelController);
    }

    /**
     * Update the specified LevelController in storage.
     *
     * @param  int              $id
     * @param UpdateLevelControllerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLevelControllerRequest $request)
    {
        $levelController = $this->levelControllerRepository->findWithoutFail($id);

        if (empty($levelController)) {
            Flash::error('Level Controller not found');

            return redirect(route('levelControllers.index'));
        }

        $levelController = $this->levelControllerRepository->update($request->all(), $id);

        Flash::success('Level Controller updated successfully.');

        return redirect(route('levelControllers.index'));
    }

    /**
     * Remove the specified LevelController from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $levelController = $this->levelControllerRepository->findWithoutFail($id);

        if (empty($levelController)) {
            Flash::error('Level Controller not found');

            return redirect(route('levelControllers.index'));
        }

        $this->levelControllerRepository->delete($id);

        Flash::success('Level Controller deleted successfully.');

        return redirect(route('levelControllers.index'));
    }
}
