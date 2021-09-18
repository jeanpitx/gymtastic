<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Repositories\EmailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Notifications\SendMasiveClient;
use App\Models\Enlace;
use Flash;
use Validator;
use Response;


/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
*/
class EmailController extends AppBaseController
{
    /** @var  EmailRepository */
    private $emailRepository;

    public function __construct(EmailRepository $emailRepo)
    {
        $this->emailRepository = $emailRepo;
    }

    /**
     * Display a listing of the Email.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $emails = $this->emailRepository->paginate(10);

        return view('emails.index')
            ->with('emails', $emails);
    }


    /**
     * Display a listing of the Solicitud.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function indexFilter(Request $request)
    {
        if($request->search){
            $dato=$this->emailRepository->model()::where('email', 'like',  '%'.$request->search.'%');
            if($dato->exists()){

                $dato = $dato->paginate(10);

                return view('emails.index')
                    ->with('emails', $dato);
            }else{
                Flash::error("Los datos que busca no han sido encontrados")->important();
                return redirect(route('emails.index'));
            }
        }
    }

    /**
     * Show the form for creating a new Email.
     *
     * @return Response
     */
    public function create()
    {
        return view('emails.create');
    }

    public function masive()
    {
        $emails = $this->emailRepository->all();
        $enlaces= array( "ninguna"=>"Ninguno");
        $enlaces["Existentes"]=Enlace::pluck('referencia','url');

        $imgs=Enlace::where([['referencia','like','ARCHIVO%'],['url','not like','%.pdf'],['referencia','not like','%Popup']])->pluck('referencia','url');
        $images= array();
        foreach ($imgs as $key=>$val) {
            $images[url($key)]=$val;
        }

        return view('emails.masive',compact('enlaces','images'))->with('emails', $emails);
    }

    public function masiveSend(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'titulo' => 'required|string', 
            'mensaje' => 'required|string', 
            'emailmasive' => 'required|string', 
        ]);

        if ($validator->fails()) {
            return Response::json(array("Error: falta completar campos",$validator->messages()), 200);
            //return redirect(route('emails.masive'))->withErrors($validator)->withInput();
        }

        $tipodoc=null;
        $documento=null;
        if(!empty($request->dochide)){
            $tipodoc="pdf";
            $documento=base64_decode(substr($request->dochide, strpos($request->dochide, ",")+1));
        }

        \Notification::route('mail', $request->emailmasive)
            ->route('titulo',  $request->titulo)
            ->route('imagen',  $request->imagen)
            ->route('enlace',  $request->url)
            ->route('documento',  $documento)
            ->route('tipodoc',  $tipodoc)
            ->route('mensaje',  $request->mensaje)//para pasar variables
            ->notify(new SendMasiveClient());

        //$emails = $this->emailRepository->all();
        /*foreach($emails as $email){
            //envia notificación al cliente
            \Notification::route('mail', $email->email)
            ->route('titulo',  $request->titulo)
            ->route('imagen',  $request->imagen)
            ->route('enlace',  $request->url)
            ->route('documento',  $documento)
            ->route('tipodoc',  $tipodoc)
            ->route('mensaje',  $request->mensaje)//para pasar variables
            ->notify(new SendMasiveClient());
        }*/

        //Flash::success("Mensajes enviados correctamente.")->important();
        return Response::json(array("Enviado"), 200);
    }

    /**
     * Store a newly created Email in storage.
     *
     * @param CreateEmailRequest $request
     *
     * @return Response
     */
    public function store(CreateEmailRequest $request)
    {
        $input = $request->all();

        $email = $this->emailRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/emails.singular')]))->important();

        return redirect(route('emails.index'));
    }

    /**
     * Display the specified Email.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $email = $this->emailRepository->find($id);

        if (empty($email)) {
            Flash::error(__('messages.not_found', ['model' => __('models/emails.singular')]))->important();

            return redirect(route('emails.index'));
        }

        return view('emails.show')->with('email', $email);
    }

    /**
     * Show the form for editing the specified Email.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $email = $this->emailRepository->find($id);

        if (empty($email)) {
            Flash::error(__('messages.not_found', ['model' => __('models/emails.singular')]))->important();

            return redirect(route('emails.index'));
        }

        return view('emails.edit')->with('email', $email);
    }

    /**
     * Update the specified Email in storage.
     *
     * @param int $id
     * @param UpdateEmailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmailRequest $request)
    {
        $email = $this->emailRepository->find($id);

        if (empty($email)) {
            Flash::error(__('messages.not_found', ['model' => __('models/emails.singular')]))->important();

            return redirect(route('emails.index'));
        }

        $email = $this->emailRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/emails.singular')]))->important();

        return redirect(route('emails.index'));
    }

    /**
     * Remove the specified Email from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $email = $this->emailRepository->find($id);

        if (empty($email)) {
            Flash::error(__('messages.not_found', ['model' => __('models/emails.singular')]))->important();

            return redirect(route('emails.index'));
        }

        $this->emailRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/emails.singular')]))->important();

        return redirect(route('emails.index'));
    }
}
