<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTopicControllerRequest;
use App\Http\Requests\UpdateTopicControllerRequest;
use App\Repositories\TopicControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TopicControllerController extends AppBaseController
{
    /** @var  TopicControllerRepository */
    private $topicControllerRepository;

    public function __construct(TopicControllerRepository $topicControllerRepo)
    {
        $this->topicControllerRepository = $topicControllerRepo;
    }

    /**
     * Display a listing of the TopicController.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->topicControllerRepository->pushCriteria(new RequestCriteria($request));
        $topicControllers = $this->topicControllerRepository->all();

        return view('topic_controllers.index')
            ->with('topicControllers', $topicControllers);
    }

    /**
     * Show the form for creating a new TopicController.
     *
     * @return Response
     */
    public function create()
    {
        return view('topic_controllers.create');
    }

    /**
     * Store a newly created TopicController in storage.
     *
     * @param CreateTopicControllerRequest $request
     *
     * @return Response
     */
    public function store(CreateTopicControllerRequest $request)
    {
        $input = $request->all();

        $topicController = $this->topicControllerRepository->create($input);

        Flash::success('Topic Controller saved successfully.');

        return redirect(route('topicControllers.index'));
    }

    /**
     * Display the specified TopicController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $topicController = $this->topicControllerRepository->findWithoutFail($id);

        if (empty($topicController)) {
            Flash::error('Topic Controller not found');

            return redirect(route('topicControllers.index'));
        }

        return view('topic_controllers.show')->with('topicController', $topicController);
    }

    /**
     * Show the form for editing the specified TopicController.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $topicController = $this->topicControllerRepository->findWithoutFail($id);

        if (empty($topicController)) {
            Flash::error('Topic Controller not found');

            return redirect(route('topicControllers.index'));
        }

        return view('topic_controllers.edit')->with('topicController', $topicController);
    }

    /**
     * Update the specified TopicController in storage.
     *
     * @param  int              $id
     * @param UpdateTopicControllerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTopicControllerRequest $request)
    {
        $topicController = $this->topicControllerRepository->findWithoutFail($id);

        if (empty($topicController)) {
            Flash::error('Topic Controller not found');

            return redirect(route('topicControllers.index'));
        }

        $topicController = $this->topicControllerRepository->update($request->all(), $id);

        Flash::success('Topic Controller updated successfully.');

        return redirect(route('topicControllers.index'));
    }

    /**
     * Remove the specified TopicController from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $topicController = $this->topicControllerRepository->findWithoutFail($id);

        if (empty($topicController)) {
            Flash::error('Topic Controller not found');

            return redirect(route('topicControllers.index'));
        }

        $this->topicControllerRepository->delete($id);

        Flash::success('Topic Controller deleted successfully.');

        return redirect(route('topicControllers.index'));
    }
}
