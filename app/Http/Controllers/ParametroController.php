<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateParametroRequest;
use App\Http\Requests\UpdateParametroRequest;
use App\Repositories\ParametroRepository;
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
**/
class ParametroController extends AppBaseController
{
    /** @var  ParametroRepository */
    private $parametroRepository;

    public function __construct(ParametroRepository $parametroRepo)
    {
        $this->middleware('rol:root|admin');
        $this->parametroRepository = $parametroRepo;
    }

    /**
     * Display a listing of the Parametro.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $parametros = $this->parametroRepository->paginate(10);

        return view('parametros.index')
            ->with('parametros', $parametros);
    }

    /**
     * Show the form for creating a new Parametro.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.create');
    }

    /**
     * Store a newly created Parametro in storage.
     *
     * @param CreateParametroRequest $request
     *
     * @return Response
     */
    public function store(CreateParametroRequest $request)
    {
        $input = $request->all();

        $parametro = $this->parametroRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/parametros.singular')]))->important();

        return redirect(route('parametros.index'));
    }

    /**
     * Display the specified Parametro.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parametro = $this->parametroRepository->find($id);

        if (empty($parametro)) {
            Flash::error(__('messages.not_found', ['model' => __('models/parametros.singular')]))->important();

            return redirect(route('parametros.index'));
        }

        return view('parametros.show')->with('parametro', $parametro);
    }

    /**
     * Show the form for editing the specified Parametro.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parametro = $this->parametroRepository->find($id);

        if (empty($parametro)) {
            Flash::error(__('messages.not_found', ['model' => __('models/parametros.singular')]))->important();

            return redirect(route('parametros.index'));
        }

        return view('parametros.edit')->with('parametro', $parametro);
    }

    /**
     * Update the specified Parametro in storage.
     *
     * @param int $id
     * @param UpdateParametroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParametroRequest $request)
    {
        $parametro = $this->parametroRepository->find($id);

        if (empty($parametro)) {
            Flash::error(__('messages.not_found', ['model' => __('models/parametros.singular')]))->important();

            return redirect(route('parametros.index'));
        }

        $parametro = $this->parametroRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/parametros.singular')]))->important();

        return redirect(route('parametros.index'));
    }

    /**
     * Remove the specified Parametro from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parametro = $this->parametroRepository->find($id);

        if (empty($parametro)) {
            Flash::error(__('messages.not_found', ['model' => __('models/parametros.singular')]))->important();

            return redirect(route('parametros.index'));
        }

        $this->parametroRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/parametros.singular')]))->important();

        return redirect(route('parametros.index'));
    }
}
