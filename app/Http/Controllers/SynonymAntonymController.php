<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSynonymAntonymControllerRequest;
use App\Http\Requests\UpdateSynonymAntonymControllerRequest;
use App\Repositories\SynonymAntonymControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SynonymAntonymControllerController extends AppBaseController
{
    /** @var  SynonymAntonymControllerRepository */
    private $synonymAntonymControllerRepository;

    public function __construct(SynonymAntonymControllerRepository $synonymAntonymControllerRepo)
    {
        $this->synonymAntonymControllerRepository = $synonymAntonymControllerRepo;
    }

    /**
     * Display a listing of the SynonymAntonymController.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->synonymAntonymControllerRepository->pushCriteria(new RequestCriteria($request));
        $synonymAntonymControllers = $this->synonymAntonymControllerRepository->all();

        return view('synonym_antonym_controllers.index')
            ->with('synonymAntonymControllers', $synonymAntonymControllers);
    }

    /**
     * Show the form for creating a new SynonymAntonymController.
     *
     * @return Response
     */
    public function create()
    {
        return view('synonym_antonym_controllers.create');
    }

    /**
     * Store a newly created SynonymAntonymController in storage.
     *
     * @param CreateSynonymAntonymControllerRequest $request
     *
     * @return Response
     */
    public function store(CreateSynonymAntonymControllerRequest $request)
    {
        $input = $request->all();

        $synonymAntonymController = $this->synonymAntonymControllerRepository->create($input);

        Flash::success('Synonym Antonym Controller saved successfully.');

        return redirect(route('synonymAntonymControllers.index'));
    }

    /**
     * Display the specified SynonymAntonymController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $synonymAntonymController = $this->synonymAntonymControllerRepository->findWithoutFail($id);

        if (empty($synonymAntonymController)) {
            Flash::error('Synonym Antonym Controller not found');

            return redirect(route('synonymAntonymControllers.index'));
        }

        return view('synonym_antonym_controllers.show')->with('synonymAntonymController', $synonymAntonymController);
    }

    /**
     * Show the form for editing the specified SynonymAntonymController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $synonymAntonymController = $this->synonymAntonymControllerRepository->findWithoutFail($id);

        if (empty($synonymAntonymController)) {
            Flash::error('Synonym Antonym Controller not found');

            return redirect(route('synonymAntonymControllers.index'));
        }

        return view('synonym_antonym_controllers.edit')->with('synonymAntonymController', $synonymAntonymController);
    }

    /**
     * Update the specified SynonymAntonymController in storage.
     *
     * @param  int              $id
     * @param UpdateSynonymAntonymControllerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSynonymAntonymControllerRequest $request)
    {
        $synonymAntonymController = $this->synonymAntonymControllerRepository->findWithoutFail($id);

        if (empty($synonymAntonymController)) {
            Flash::error('Synonym Antonym Controller not found');

            return redirect(route('synonymAntonymControllers.index'));
        }

        $synonymAntonymController = $this->synonymAntonymControllerRepository->update($request->all(), $id);

        Flash::success('Synonym Antonym Controller updated successfully.');

        return redirect(route('synonymAntonymControllers.index'));
    }

    /**
     * Remove the specified SynonymAntonymController from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $synonymAntonymController = $this->synonymAntonymControllerRepository->findWithoutFail($id);

        if (empty($synonymAntonymController)) {
            Flash::error('Synonym Antonym Controller not found');

            return redirect(route('synonymAntonymControllers.index'));
        }

        $this->synonymAntonymControllerRepository->delete($id);

        Flash::success('Synonym Antonym Controller deleted successfully.');

        return redirect(route('synonymAntonymControllers.index'));
    }
}
