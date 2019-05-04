<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBanglaResourcesControllerRequest;
use App\Http\Requests\UpdateBanglaResourcesControllerRequest;
use App\Repositories\BanglaResourcesControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BanglaResourcesController extends Controller
{
    /** @var  BanglaResourcesControllerRepository */
    private $banglaResourcesControllerRepository;

    

    /**
     * Display a listing of the BanglaResourcesController.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $this->banglaResourcesControllerRepository->pushCriteria(new RequestCriteria($request));
        // $banglaResourcesControllers = $this->banglaResourcesControllerRepository->all();

        // return view('bangla_resources_controllers.index')
        //     ->with('banglaResourcesControllers', $banglaResourcesControllers);
    }

    /**
     * Show the form for creating a new BanglaResourcesController.
     *
     * @return Response
     */
    public function create()
    {
        // return view('bangla_resources_controllers.create');
    }

    /**
     * Store a newly created BanglaResourcesController in storage.
     *
     * @param CreateBanglaResourcesControllerRequest $request
     *
     * @return Response
     */
    public function store(CreateBanglaResourcesControllerRequest $request)
    {
        // $input = $request->all();

        // $banglaResourcesController = $this->banglaResourcesControllerRepository->create($input);

        // Flash::success('Bangla Resources Controller saved successfully.');

        // return redirect(route('banglaResourcesControllers.index'));
    }

    /**
     * Display the specified BanglaResourcesController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $banglaResourcesController = $this->banglaResourcesControllerRepository->findWithoutFail($id);

        // if (empty($banglaResourcesController)) {
        //     Flash::error('Bangla Resources Controller not found');

        //     return redirect(route('banglaResourcesControllers.index'));
        // }

        // return view('bangla_resources_controllers.show')->with('banglaResourcesController', $banglaResourcesController);
    }

    /**
     * Show the form for editing the specified BanglaResourcesController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // $banglaResourcesController = $this->banglaResourcesControllerRepository->findWithoutFail($id);

        // if (empty($banglaResourcesController)) {
        //     Flash::error('Bangla Resources Controller not found');

        //     return redirect(route('banglaResourcesControllers.index'));
        // }

        // return view('bangla_resources_controllers.edit')->with('banglaResourcesController', $banglaResourcesController);
    }

    /**
     * Update the specified BanglaResourcesController in storage.
     *
     * @param  int              $id
     * @param UpdateBanglaResourcesControllerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBanglaResourcesControllerRequest $request)
    {
        // $banglaResourcesController = $this->banglaResourcesControllerRepository->findWithoutFail($id);

        // if (empty($banglaResourcesController)) {
        //     Flash::error('Bangla Resources Controller not found');

        //     return redirect(route('banglaResourcesControllers.index'));
        // }

        // $banglaResourcesController = $this->banglaResourcesControllerRepository->update($request->all(), $id);

        // Flash::success('Bangla Resources Controller updated successfully.');

        // return redirect(route('banglaResourcesControllers.index'));
    }

    /**
     * Remove the specified BanglaResourcesController from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        // $banglaResourcesController = $this->banglaResourcesControllerRepository->findWithoutFail($id);

        // if (empty($banglaResourcesController)) {
        //     Flash::error('Bangla Resources Controller not found');

        //     return redirect(route('banglaResourcesControllers.index'));
        // }

        // $this->banglaResourcesControllerRepository->delete($id);

        // Flash::success('Bangla Resources Controller deleted successfully.');

        // return redirect(route('banglaResourcesControllers.index'));
    }
}
