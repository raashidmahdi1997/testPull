<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEnglishResourcesControllerRequest;
use App\Http\Requests\UpdateEnglishResourcesControllerRequest;
use App\Repositories\EnglishResourcesControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EnglishResourcesControllerController extends AppBaseController
{
    /** @var  EnglishResourcesControllerRepository */
    private $englishResourcesControllerRepository;

    public function __construct(EnglishResourcesControllerRepository $englishResourcesControllerRepo)
    {
        $this->englishResourcesControllerRepository = $englishResourcesControllerRepo;
    }

    /**
     * Display a listing of the EnglishResourcesController.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->englishResourcesControllerRepository->pushCriteria(new RequestCriteria($request));
        $englishResourcesControllers = $this->englishResourcesControllerRepository->all();

        return view('english_resources_controllers.index')
            ->with('englishResourcesControllers', $englishResourcesControllers);
    }

    /**
     * Show the form for creating a new EnglishResourcesController.
     *
     * @return Response
     */
    public function create()
    {
        return view('english_resources_controllers.create');
    }

    /**
     * Store a newly created EnglishResourcesController in storage.
     *
     * @param CreateEnglishResourcesControllerRequest $request
     *
     * @return Response
     */
    public function store(CreateEnglishResourcesControllerRequest $request)
    {
        $input = $request->all();

        $englishResourcesController = $this->englishResourcesControllerRepository->create($input);

        Flash::success('English Resources Controller saved successfully.');

        return redirect(route('englishResourcesControllers.index'));
    }

    /**
     * Display the specified EnglishResourcesController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $englishResourcesController = $this->englishResourcesControllerRepository->findWithoutFail($id);

        if (empty($englishResourcesController)) {
            Flash::error('English Resources Controller not found');

            return redirect(route('englishResourcesControllers.index'));
        }

        return view('english_resources_controllers.show')->with('englishResourcesController', $englishResourcesController);
    }

    /**
     * Show the form for editing the specified EnglishResourcesController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $englishResourcesController = $this->englishResourcesControllerRepository->findWithoutFail($id);

        if (empty($englishResourcesController)) {
            Flash::error('English Resources Controller not found');

            return redirect(route('englishResourcesControllers.index'));
        }

        return view('english_resources_controllers.edit')->with('englishResourcesController', $englishResourcesController);
    }

    /**
     * Update the specified EnglishResourcesController in storage.
     *
     * @param  int              $id
     * @param UpdateEnglishResourcesControllerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnglishResourcesControllerRequest $request)
    {
        $englishResourcesController = $this->englishResourcesControllerRepository->findWithoutFail($id);

        if (empty($englishResourcesController)) {
            Flash::error('English Resources Controller not found');

            return redirect(route('englishResourcesControllers.index'));
        }

        $englishResourcesController = $this->englishResourcesControllerRepository->update($request->all(), $id);

        Flash::success('English Resources Controller updated successfully.');

        return redirect(route('englishResourcesControllers.index'));
    }

    /**
     * Remove the specified EnglishResourcesController from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $englishResourcesController = $this->englishResourcesControllerRepository->findWithoutFail($id);

        if (empty($englishResourcesController)) {
            Flash::error('English Resources Controller not found');

            return redirect(route('englishResourcesControllers.index'));
        }

        $this->englishResourcesControllerRepository->delete($id);

        Flash::success('English Resources Controller deleted successfully.');

        return redirect(route('englishResourcesControllers.index'));
    }
}
