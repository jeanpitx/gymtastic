<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInternaRequest;
use App\Http\Requests\UpdateInternaRequest;
use App\Repositories\InternaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Enlace;
use Flash;
use Response;


/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
*/
class InternaController extends AppBaseController
{
    /** @var  InternaRepository */
    private $internaRepository;

    public function __construct(InternaRepository $internaRepo)
    {
        $this->internaRepository = $internaRepo;
    }

    /**
     * Display a listing of the Interna.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $internas = $this->internaRepository->paginate(10);

        return view('internas.index')
            ->with('internas', $internas);
    }

    /**
     * Show the form for creating a new Interna.
     *
     * @return Response
     */
    public function create()
    {
        $enlaces= array("otra" => "Nueva Url", "ninguna"=>"Ninguno");
        $enlaces["Existentes"]=Enlace::pluck('referencia','id_enlace');

        return view('internas.create',compact('enlaces'));
    }

    /**
     * Store a newly created Interna in storage.
     *
     * @param CreateInternaRequest $request
     *
     * @return Response
     */
    public function store(CreateInternaRequest $request)
    {
        $this->validate($request, [
            'imghide' => 'required'
        ]);


        if($request->url!="ninguna" && $request->url!=null && !$request->imghidebtn){
            Flash::error("Si la página interna tiene una url, debe subir la imagen del boton")->important();
            return redirect()->back()->withInput();
        }

        //obtenemos imagen, tipo y nombre
        $image = base64_decode(substr($request->imghide, strpos($request->imghide, ",")+1));
        $tipo_imagen  = substr($request->imghide, strpos($request->imghide, "/")+1, 3);
        $filename='interna-'.date('Y-m-d-His').'.'.$tipo_imagen;

        //si hay imagen de boton guardamos
        if($request->imghidebtn){
            $imagebtn = base64_decode(substr($request->imghidebtn, strpos($request->imghidebtn, ",")+1));
            $tipo_imagen_btn  = substr($request->imghidebtn, strpos($request->imghidebtn, "/")+1, 3);
            $filenamebtn='interna-btn-'.date('Y-m-d-His').'.'.$tipo_imagen_btn;
        }


        $titulo=str_replace(["strong","<p>","</p>"],["b"],$request->titulo);

        //*********** COMIENZA CODIGO QUE VALIDA LAS URL
        $enlace=null;
        if($request->url!="ninguna" && $request->url!=null){
            if(is_numeric($request->url))
                $enlace=Enlace::find($request->url);
            else
                $enlace=Enlace::firstOrCreate(
                    ['url'=>$request->url],
                    ['referencia'=>'TARJETA - '.$request->titulo]
                );
            $enlace=$enlace->id_enlace;
        }
        //*********** TERMINA CODIGO QUE VALIDA LAS URL

        $interna = $this->internaRepository->create([
            'titulo'=>$titulo,
            'url_imagen'=>'storage/interna/'.$filename,
            'contenido'=>$request->contenido,
            'url_boton'=>!empty($filenamebtn)?'storage/interna/'.$filenamebtn:null,
            'id_enlace'=>$enlace
        ]);

        //guardamos la imagen
        Storage::disk('public')->put('interna/'.$filename, $image);
        //guardamos boton
        if(!empty($filenamebtn)) Storage::disk('public')->put('interna/'.$filenamebtn, $imagebtn);

        Flash::success(__('messages.saved', ['model' => __('models/internas.singular')]))->important();

        //*********** COMIENZA CODIGO QUE VALIDA LAS URL
        $enlace=Enlace::firstOrCreate(
            ['url'=>'/content/'.$interna->id_interna],
            ['referencia'=>'INTERNA - '.str_replace(["<strong>","</strong>","<p>","</p>","<b>","</b>"],[],$request->titulo)]
        );
        //*********** TERMINA CODIGO QUE VALIDA LAS URL

        return redirect(route('internas.index'));
    }

    /**
     * Display the specified Interna.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $interna = $this->internaRepository->find($id);

        if (empty($interna)) {
            Flash::error(__('messages.not_found', ['model' => __('models/internas.singular')]))->important();

            return redirect(route('internas.index'));
        }

        return view('internas.show')->with('interna', $interna);
    }

    /**
     * Show the form for editing the specified Interna.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $interna = $this->internaRepository->find($id);

        if (empty($interna)) {
            Flash::error(__('messages.not_found', ['model' => __('models/internas.singular')]))->important();

            return redirect(route('internas.index'));
        }

        $enlaces= array("otra" => "Nueva Url", "ninguna"=>"Ninguno");
        $enlaces["Existentes"]=Enlace::pluck('referencia','id_enlace');

        return view('internas.edit',compact('enlaces'))->with('interna', $interna);
    }

    /**
     * Update the specified Interna in storage.
     *
     * @param int $id
     * @param UpdateInternaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInternaRequest $request)
    {
        $interna = $this->internaRepository->find($id);

        if (empty($interna)) {
            Flash::error(__('messages.not_found', ['model' => __('models/internas.singular')]))->important();
            return redirect(route('internas.index'));
        }

        if($request->url!="ninguna" && $request->url!=null && !$request->imghidebtn && !empty($interna->url_btn)){
            Flash::error("Si la página interna tiene una url, debe subir la imagen del boton")->important();
            return redirect()->back()->withInput();
        }

        $titulo=str_replace(["strong","<p>","</p>"],["b"],$request->titulo);

        //*********** COMIENZA CODIGO QUE VALIDA LAS URL
        $enlace=null;
        if($request->url!="ninguna" && $request->url!=null){
            if(is_numeric($request->url))
                $enlace=Enlace::find($request->url);
            else
                $enlace=Enlace::firstOrCreate(
                    ['url'=>$request->url],
                    ['referencia'=>'TARJETA - '.$request->titulo]
                );
            $enlace=$enlace->id_enlace;
        }
        //*********** TERMINA CODIGO QUE VALIDA LAS URL

        //creamos los datos a guardar
        $array_save=array(
            'titulo'=>$titulo,
            'contenido'=>$request->contenido,
            'id_enlace'=>$enlace
        );

        //si hay nueva imagen eliminamos imagen actual y creamos la nueva
        if($request->imghide){
            $this->validate($request, [
                'imghide' => 'required'
            ]);

            Storage::delete(str_replace("storage", "public", $interna->url_imagen)); //eliminamos imagen

            $image = base64_decode(substr($request->imghide, strpos($request->imghide, ",")+1));
            $tipo_imagen  = substr($request->imghide, strpos($request->imghide, "/")+1, 3);
            $filename='interna-'.date('Y-m-d-His').'.'.$tipo_imagen;
            $array_save["url_imagen"]='storage/interna/'.$filename;
        }

        //si hay imagen de boton guardamos
        if($request->imghidebtn){
            if($interna->url_boton) Storage::delete(str_replace("storage", "public", $interna->url_boton)); //eliminamos imagen

            $imagebtn = base64_decode(substr($request->imghidebtn, strpos($request->imghidebtn, ",")+1));
            $tipo_imagen_btn  = substr($request->imghidebtn, strpos($request->imghidebtn, "/")+1, 3);
            $filenamebtn='interna-btn-'.date('Y-m-d-His').'.'.$tipo_imagen_btn;
            $array_save["url_boton"]='storage/interna/'.$filenamebtn;
        }
        if($enlace==null){
            if($interna->url_boton) Storage::delete(str_replace("storage", "public", $interna->url_boton)); //eliminamos imagen
            $array_save["url_boton"]=null;
        }

        $interna->update($array_save);

        //guardamos la imagen
        if($request->imghide) Storage::disk('public')->put('interna/'.$filename, $image);
        if($request->url_boton) Storage::disk('public')->put('interna/'.$filenamebtn, $imagebtn);

        //*********** COMIENZA CODIGO QUE VALIDA LAS URL
        $enlace=Enlace::firstOrCreate(
            ['url'=>'/content/'.$interna->id_interna],
            ['referencia'=>'INTERNA - '.str_replace(["<strong>","</strong>","<p>","</p>","<b>","</b>"],[],$request->titulo)]
        );
        //*********** TERMINA CODIGO QUE VALIDA LAS URL

        Flash::success(__('messages.updated', ['model' => __('models/internas.singular')]))->important();

        return redirect(route('internas.index'));
    }

    /**
     * Remove the specified Interna from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $interna = $this->internaRepository->find($id);

        if (empty($interna)) {
            Flash::error(__('messages.not_found', ['model' => __('models/internas.singular')]))->important();

            return redirect(route('internas.index'));
        }

        $enlace=Enlace::where("referencia",'INTERNA - '.str_replace(["<strong>","</strong>","<p>","</p>","<b>","</b>"],[],$interna->titulo))->first();
        $enlace->Tarjeta()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->Menu()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->MenuPnivel()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->MenuSnivel()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->FooterElement()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->Fija()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->Carousel()->where("id_enlace",$enlace->id_enlace)->update(["id_enlace"=>null]);
        $enlace->delete();

        if(!empty($interna->url_imagen) ){ //preguntamos si hay imagen
            Storage::delete(str_replace("storage", "public", $interna->url_imagen)); //eliminamos imagen
        }
        if(!empty($interna->url_boton) ){ //preguntamos si hay imagen
            Storage::delete(str_replace("storage", "public", $interna->url_boton)); //eliminamos imagen
        }
        $this->internaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/internas.singular')]))->important();

        return redirect(route('internas.index'));
    }
}