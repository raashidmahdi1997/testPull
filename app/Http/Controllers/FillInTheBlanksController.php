<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFillInTheBlanksControllerRequest;
use App\Http\Requests\UpdateFillInTheBlanksControllerRequest;
use App\Repositories\FillInTheBlanksControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FillInTheBlanksControllerController extends AppBaseController
{
    /** @var  FillInTheBlanksControllerRepository */
    private $fillInTheBlanksControllerRepository;

    public function __construct(FillInTheBlanksControllerRepository $fillInTheBlanksControllerRepo)
    {
        $this->fillInTheBlanksControllerRepository = $fillInTheBlanksControllerRepo;
    }

    /**
     * Display a listing of the FillInTheBlanksController.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fillInTheBlanksControllerRepository->pushCriteria(new RequestCriteria($request));
        $fillInTheBlanksControllers = $this->fillInTheBlanksControllerRepository->all();

        return view('fill_in_the_blanks_controllers.index')
            ->with('fillInTheBlanksControllers', $fillInTheBlanksControllers);
    }

    /**
     * Show the form for creating a new FillInTheBlanksController.
     *
     * @return Response
     */
    public function create()
    {
        return view('fill_in_the_blanks_controllers.create');
    }

    /**
     * Store a newly created FillInTheBlanksController in storage.
     *
     * @param CreateFillInTheBlanksControllerRequest $request
     *
     * @return Response
     */
    public function store(CreateFillInTheBlanksControllerRequest $request)
    {
        $input = $request->all();

        $fillInTheBlanksController = $this->fillInTheBlanksControllerRepository->create($input);

        Flash::success('Fill In The Blanks Controller saved successfully.');

        return redirect(route('fillInTheBlanksControllers.index'));
    }

    /**
     * Display the specified FillInTheBlanksController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fillInTheBlanksController = $this->fillInTheBlanksControllerRepository->findWithoutFail($id);

        if (empty($fillInTheBlanksController)) {
            Flash::error('Fill In The Blanks Controller not found');

            return redirect(route('fillInTheBlanksControllers.index'));
        }

        return view('fill_in_the_blanks_controllers.show')->with('fillInTheBlanksController', $fillInTheBlanksController);
    }

    /**
     * Show the form for editing the specified FillInTheBlanksController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fillInTheBlanksController = $this->fillInTheBlanksControllerRepository->findWithoutFail($id);

        if (empty($fillInTheBlanksController)) {
            Flash::error('Fill In The Blanks Controller not found');

            return redirect(route('fillInTheBlanksControllers.index'));
        }

        return view('fill_in_the_blanks_controllers.edit')->with('fillInTheBlanksController', $fillInTheBlanksController);
    }

    /**
     * Update the specified FillInTheBlanksController in storage.
     *
     * @param  int              $id
     * @param UpdateFillInTheBlanksControllerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFillInTheBlanksControllerRequest $request)
    {
        $fillInTheBlanksController = $this->fillInTheBlanksControllerRepository->findWithoutFail($id);

        if (empty($fillInTheBlanksController)) {
            Flash::error('Fill In The Blanks Controller not found');

            return redirect(route('fillInTheBlanksControllers.index'));
        }

        $fillInTheBlanksController = $this->fillInTheBlanksControllerRepository->update($request->all(), $id);

        Flash::success('Fill In The Blanks Controller updated successfully.');

        return redirect(route('fillInTheBlanksControllers.index'));
    }

    /**
     * Remove the specified FillInTheBlanksController from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fillInTheBlanksController = $this->fillInTheBlanksControllerRepository->findWithoutFail($id);

        if (empty($fillInTheBlanksController)) {
            Flash::error('Fill In The Blanks Controller not found');

            return redirect(route('fillInTheBlanksControllers.index'));
        }

        $this->fillInTheBlanksControllerRepository->delete($id);

        Flash::success('Fill In The Blanks Controller deleted successfully.');

        return redirect(route('fillInTheBlanksControllers.index'));
    }
}
