<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEnlaceRequest;
use App\Http\Requests\UpdateEnlaceRequest;
use App\Repositories\EnlaceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;


/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
*/
class EnlaceController extends AppBaseController
{
    /** @var  EnlaceRepository */
    private $enlaceRepository;

    public function __construct(EnlaceRepository $enlaceRepo)
    {
        $this->middleware('rol:web|root');
        $this->enlaceRepository = $enlaceRepo;
    }

    /**
     * Display a listing of the Enlace.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $enlaces = $this->enlaceRepository->paginate(10);

        return view('enlaces.index')
            ->with('enlaces', $enlaces);
    }

    /**
     * Show the form for creating a new Enlace.
     *
     * @return Response
     */
    public function create()
    {
        return view('enlaces.create');
    }

    /**
     * Store a newly created Enlace in storage.
     *
     * @param CreateEnlaceRequest $request
     *
     * @return Response
     */
    public function store(CreateEnlaceRequest $request)
    {
        $input = $request->all();

        $enlace = $this->enlaceRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/enlaces.singular')]))->important();

        return redirect(route('enlaces.index'));
    }

    /**
     * Display the specified Enlace.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $enlace = $this->enlaceRepository->find($id);

        if (empty($enlace)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enlaces.singular')]))->important();

            return redirect(route('enlaces.index'));
        }

        return view('enlaces.show')->with('enlace', $enlace);
    }

    /**
     * Show the form for editing the specified Enlace.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $enlace = $this->enlaceRepository->find($id);

        if (empty($enlace)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enlaces.singular')]))->important();

            return redirect(route('enlaces.index'));
        }

        return view('enlaces.edit')->with('enlace', $enlace);
    }

    /**
     * Update the specified Enlace in storage.
     *
     * @param int $id
     * @param UpdateEnlaceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnlaceRequest $request)
    {
        $enlace = $this->enlaceRepository->find($id);

        if (empty($enlace)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enlaces.singular')]))->important();

            return redirect(route('enlaces.index'));
        }

        $enlace = $this->enlaceRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/enlaces.singular')]))->important();

        return redirect(route('enlaces.index'));
    }

    /**
     * Remove the specified Enlace from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $enlace = $this->enlaceRepository->find($id);

        if (empty($enlace)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enlaces.singular')]))->important();

            return redirect(route('enlaces.index'));
        }

        $this->enlaceRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/enlaces.singular')]))->important();

        return redirect(route('enlaces.index'));
    }
}
