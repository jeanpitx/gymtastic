<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArchiveRequest;
use App\Http\Requests\UpdateArchiveRequest;
use App\Repositories\ArchiveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Enlace;
use Validator;
use Flash;
use Response;
use Storage;

/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
*/
class ArchiveController extends AppBaseController
{
    /** @var  ArchiveRepository */
    private $archiveRepository;

    public function __construct(ArchiveRepository $archiveRepo)
    {
        $this->archiveRepository = $archiveRepo;
    }

    /**
     * Display a listing of the Archive.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $archives = $this->archiveRepository->paginate(10);

        return view('archives.index')
            ->with('archives', $archives);
    }

    /**
     * Show the form for creating a new Archive.
     *
     * @return Response
     */
    public function create()
    {
        return view('archives.create');
    }

    /**
     * Store a newly created Archive in storage.
     *
     * @param CreateArchiveRequest $request
     *
     * @return Response
     */
    public function store(CreateArchiveRequest $request)
    {

        $validator=Validator::make($request->all(), [
            'url_archivo' => 'required|file|max:5000|mimes:jpeg,png,svg,pdf', //ID_CATALOGO
        ]);

        if ($validator->fails()) {
            return redirect(route('archives.create'))->withErrors($validator)->withInput();
        }

        $extension=$request->file('url_archivo')->extension();
        $filename=str_replace(" ","_",($request->nombre.'-'.date('Y-m-d').'.'.$extension));
        $request->file('url_archivo')->storeAs('public/files', $filename);

        $archive = $this->archiveRepository->create([
            "nombre"=>$request->nombre,
            "url_archivo"=>'storage/files/'.$filename,
            "tipo_archivo"=>$extension
        ]);

        Flash::success(__('messages.saved', ['model' => __('models/archives.singular')]))->important();

        //*********** COMIENZA CODIGO QUE VALIDA LAS URL
        $enlace=Enlace::updateOrCreate(
            ['referencia'=>'ARCHIVO - '.$archive->nombre],
            ['url'=>$archive->url_archivo]
        );
        //*********** TERMINA CODIGO QUE VALIDA LAS URL

        return redirect(route('archives.index'));
    }

    /**
     * Display the specified Archive.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $archive = $this->archiveRepository->find($id);

        if (empty($archive)) {
            Flash::error(__('messages.not_found', ['model' => __('models/archives.singular')]))->important();

            return redirect(route('archives.index'));
        }

        return view('archives.show')->with('archive', $archive);
    }

    /**
     * Show the form for editing the specified Archive.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $archive = $this->archiveRepository->find($id);

        if (empty($archive)) {
            Flash::error(__('messages.not_found', ['model' => __('models/archives.singular')]))->important();

            return redirect(route('archives.index'));
        }

        return view('archives.edit')->with('archive', $archive);
    }

    /**
     * Update the specified Archive in storage.
     *
     * @param int $id
     * @param UpdateArchiveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArchiveRequest $request)
    {
        $archive = $this->archiveRepository->find($id);

        if (empty($archive)) {
            Flash::error(__('messages.not_found', ['model' => __('models/archives.singular')]))->important();

            return redirect(route('archives.index'));
        }

        $array_save=array(
            "nombre"=>$request->nombre,
        );

        if($request->url_archivo){
            $this->validate($request, [
                'url_archivo' => 'required|file|max:5000|mimes:jpeg,png,svg,pdf'
            ]);

            Storage::delete(str_replace("storage", "public", $archive->url_archivo)); //eliminamos imagen

            $extension=$request->file('url_archivo')->extension();
            $filename=str_replace(" ","_",($request->nombre.'-'.date('Y-m-d').'.'.$extension));
            $request->file('url_archivo')->storeAs('public/files', $filename);
            $array_save["url_archivo"]='storage/files/'.$filename;
            $array_save["tipo_archivo"]=$extension;
        }

        $archive->update($array_save);

        //*********** COMIENZA CODIGO QUE VALIDA LAS URL
        $enlace=Enlace::updateOrCreate(
            ['referencia'=>'ARCHIVO - '.$request->nombre],
            ['url'=>$archive->url_archivo]
        );
        //*********** TERMINA CODIGO QUE VALIDA LAS URL

        Flash::success(__('messages.updated', ['model' => __('models/archives.singular')]))->important();

        return redirect(route('archives.index'));
    }

    /**
     * Remove the specified Archive from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $archive = $this->archiveRepository->find($id);

        if (empty($archive)) {
            Flash::error(__('messages.not_found', ['model' => __('models/archives.singular')]))->important();

            return redirect(route('archives.index'));
        }

        $enlace=Enlace::where("referencia",'ARCHIVO - '.$archive->nombre)->first();
        $enlace->Tarjeta()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->Menu()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->MenuPnivel()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->MenuSnivel()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->FooterElement()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->Fija()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->Carousel()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->delete();

        if(!empty($archive->url_archivo) ){ //preguntamos si hay imagen
            Storage::delete(str_replace("storage", "public", $archive->url_archivo)); //eliminamos imagen
        }

        $this->archiveRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/archives.singular')]))->important();

        return redirect(route('archives.index'));
    }
}
