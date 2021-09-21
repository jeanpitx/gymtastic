<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SendContactRecibidaClient;
use App\Notifications\SendContactRecibidaOper;
use Carbon\Carbon;
use App\Models\Carousel;
use App\Models\Footer;
use App\Models\Catalogo;
use App\Models\Parametro;
use App\Models\Persona;
use App\Models\Enlace;
use App\Models\Tarjeta;
use App\Models\Interna;
use App\Models\Fija;
use App\Models\Menu;
use App\Models\Email;
use App\Models\Postulacion;
use App\Models\Categoria;
use Response;
use DB;
use Validator;
use Flash;
use Cookie;

/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class ShowInfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['guest']);
        $this->middleware(['apikey'])->only(['getCidSolicita','getCid']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $enlaces=Enlace::select(
            'url',
            'metodo',
            'estado')->get();
        $enlaces=json_decode($enlaces->toJson());
        $ciudad=$this->getAllCitiesNoKey();

        return view('public/landing', compact('enlaces','ciudad'));
    }

    

    /**
     * Permite enviar el correo de contactenos
     */
    public function landingStore(Request $request)
    {

        if(config('recaptcha-v3.enable')){
            $validate_recaptcha=Validator::make($request->all(), [
                'g-recaptcha-response' => 'required|recaptcha:solicitud,0.5',//https://github.com/huangdijia/laravel-recaptcha-v3
            ]);

            if ($validate_recaptcha->fails()) {
                abort(401, 'Ud no ha superado las validaciones del recaptcha.');
            }
        }

        $validator=Validator::make($request->all(), [
            'identificacion'=> 'required|max:10|string',
            'nombres_completos'=> 'required|min:5|max:150|string',
            'email'=> 'required|min:5|max:100|email',
            'telefono'=> 'required|min:9|max:10|string',
            'ciudad'=> 'required|max:60|string',
            'deporte'=> 'required|max:100|string',
            'sexo'=> 'required|max:60|string',
            'fecha_nacimiento'=> 'required|date',
            'comentario'=> 'required|max:1000|string'
        ]);

        if ($validator->fails()) {
            return redirect(route('main'))->withErrors($validator)->withInput();
        }


        $createemail=Email::firstOrCreate(
            ["email"=>strtolower($request->email)],
            ["identificacion"=>$request->identificacion,
            "tipo_registro"=>"FORMULARIO INICIAL"
        ]);

        //envia notificación al cliente
        \Notification::route('mail', strtolower($request->email))
            ->route('mensaje',  "Estimado cliente, hemos recibido su solicitud, gracias por ponerse en contacto con nosotros.")
            ->route('name',  $request->nombres_completos)
            ->notify(new SendContactRecibidaClient());

        //envia notificación al operador
        \Notification::route('mail', explode(",",config('mail.notifieroperator')))
            ->route('cid',  $request->identificacion)
            ->route('ciudad',  $request->ciudad)
            ->route('name',  $request->nombres_completos)//para pasar variables
            ->route('email',  strtolower($request->email))
            ->route('phone',  $request->telefono)
            ->route('sexo',  $request->sexo)
            ->route('fecha_nacimiento',  $request->fecha_nacimiento)
            ->route('deporte',  $request->deporte)
            ->route('msg',  strtoupper($request->comentario))
            ->notify(new SendContactRecibidaOper());

        Flash::overlay("Su solicitud ha sido registrada en nuestro sistema con éxito, pronto un asesor se pondrá en contacto con Ud., gracias por utilizar nuestros servicios.", "Banco comercial de manabí");

        return redirect(route('main'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function interna($page)
    {
        if(is_numeric($page)){ // find by id
            $interna=Interna::find($page);
            if (empty($interna)) 
                abort(404);
            return redirect()->route('content', ['page' => strtolower(rawurlencode(strip_tags($interna->titulo)))]);
        }else{
            $interna=Interna::whereRaw("REPLACE(REPLACE(titulo, '<b>', ''), '</b>', '')= ?",
            [rawurldecode($page)])->first();
        }
        if (empty($interna))
            abort(404);

        $enlaces=Enlace::select(
            'url',
            'metodo',
            'estado')->get();
        $enlaces=json_decode($enlaces->toJson());
        $footers=Footer::all();
        $menus=Menu::all();
        $fijas=Fija::with("Enlace:id_enlace,url,estado,metodo")->get()->toarray();

        $titlehead=$interna->titulo;
        
        return view('public/content', compact('enlaces','footers','interna','fijas','menus','titlehead'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function agencias()
    {
        
        $enlaces=Enlace::select(
            'url',
            'metodo',
            'estado')->get();
        $enlaces=json_decode($enlaces->toJson());
        $footers=Footer::all();
        $menus=Menu::all();
        $fijas=Fija::with("Enlace:id_enlace,url,estado,metodo")->get()->toarray();

        $titlehead='Cajeros y oficinas';
        
        return view('public/agencias', compact('enlaces','footers','fijas','menus','titlehead'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function categoria($page)
    {
        $categoria=Categoria::where("titulo",strtoupper($page))->first();
        if (empty($categoria)) {
            abort(404);
        }

        $enlaces=Enlace::select(
            'url',
            'metodo',
            'estado')->get();
        $enlaces=json_decode($enlaces->toJson());
        $footers=Footer::all();
        $menus=Menu::all();
        $fijas=Fija::with("Enlace:id_enlace,url,estado,metodo")->get()->toarray();

        $titlehead='BCM '.strtoupper($page);
        
        return view('public/category', compact('enlaces','footers','fijas','menus','categoria','titlehead'));
    }

    /**
     * Permite generar la solicitud de tarjetas de credito
     */
    public function solicitudSimple()
    {
        $parametros=Parametro::where("id_parametro","4")->first()->parametro;
        $parametros=explode(",",str_replace("\"","",$parametros));
        $ciudad=$this->getAllCitiesNoKey();
        
        $fijas=Fija::with("Enlace:id_enlace,url,estado,metodo")->get()->toarray();
        $footers=Footer::all();
        $menus=Menu::all();

        $titlehead='Solicitud de tarjeta de crédito';

        return view('public/solicitudTarjetaSimple', compact('ciudad','fijas','footers','menus','parametros','titlehead'));
    }

    
    /**
     * Permite abrir el enlace de contacto
     */
    public function contacto()
    {
        $parametros=Parametro::where("id_parametro","4")->first()->parametro;
        $parametros=explode(",",str_replace("\"","",$parametros));
        
        $fijas=Fija::with("Enlace:id_enlace,url,estado,metodo")->get()->toarray();
        $footers=Footer::all();
        $menus=Menu::all();

        $titlehead='Solicitud de productos financieros';

        return view('public/contacto', compact('fijas','footers','menus','parametros','titlehead'));  
    }

    /**
     * Permite enviar el correo de contactenos
     */
    public function contactoStore(Request $request)
    {

        if(config('recaptcha-v3.enable')){
            $validate_recaptcha=Validator::make($request->all(), [
                'g-recaptcha-response' => 'required|recaptcha:solicitud,0.5',//https://github.com/huangdijia/laravel-recaptcha-v3
            ]);

            if ($validate_recaptcha->fails()) {
                /*Flash::error('recaptcha: no se ha superado recaptcha')->important();
                return redirect(route('contactenos'))->withInput()->withErrors($validate_recaptcha);*/
                abort(401, 'Ud no ha superado las validaciones del recaptcha.');
            }
        }

        $validator=Validator::make($request->all(), [
            'identificacion'=> 'required|max:10|string',
            'nombres'=> 'required|min:5|max:150|string',
            'email'=> 'required|min:5|max:100|email',
            'telefono'=> 'required|min:9|max:10|string',
            'ciudad'=> 'required|max:60|string',
            'tipo_consulta'=> 'required|integer',
            'mensaje'=> 'required|min:20|max:300|string'
        ]);

        if ($validator->fails()) {
            //Flash::error('Debes subir un archivo de tipo pdf.')->important();
            return redirect(route('contactenos'))->withErrors($validator)->withInput();
        }

        $parametros=Parametro::where("id_parametro","4")->first()->parametro;
        $parametros=explode(",",str_replace("\"","",$parametros));

        $createemail=Email::firstOrCreate(
            ["email"=>strtolower($request->email)],
            ["identificacion"=>$request->identificacion,
            "tipo_registro"=>"FORMULARIO DE CONTACTO"
        ]);

        //envia notificación al cliente
        \Notification::route('mail', strtolower($request->email))
            ->route('mensaje',  "Estimado cliente, hemos recibido su solicitud, pronto un asesor se pondra en contacto con ud.")//para pasar variables
            ->route('name',  $request->nombres)
            ->notify(new SendContactRecibidaClient());

        //envia notificación al operador
        \Notification::route('mail', explode(",",config('mail.notifierbcmcontact')))
            ->route('cid',  $request->identificacion)
            ->route('ciudad',  $request->ciudad)
            ->route('name',  $request->nombres)//para pasar variables
            ->route('email',  strtolower($request->email))
            ->route('phone',  $request->telefono)
            ->route('tipo',  $parametros[$request->tipo_consulta])
            ->route('msg',  strtoupper($request->mensaje))
            ->notify(new SendContactRecibidaOper());

        Flash::overlay("Su solicitud ha sido registrada en nuestro sistema con éxito, pronto un asesor se pondrá en contacto con Ud., gracias por utilizar nuestros servicios.", "Banco comercial de manabí");

        return redirect(route('contactenos'));
    }


    

    /**
     * Permite abrir el enlace de contacto
     */
     public function empleo()
     {
        $fijas=Fija::with("Enlace:id_enlace,url,estado,metodo")->get()->toarray();
        $footers=Footer::all();
        $menus=Menu::all();
        $ciudad=$this->getAllCities();

        $titlehead='Solicitud de Empleo';

        return view('public/empleo', compact('ciudad','fijas','footers','menus','titlehead'));  
     }
 
     /**
      * Permite enviar el correo de contactenos
      */
     public function empleoStore(Request $request)
     {
 
        if(config('recaptcha-v3.enable')){
            $validate_recaptcha=Validator::make($request->all(), [
                'g-recaptcha-response' => 'required|recaptcha:solicitud,0.5',//https://github.com/huangdijia/laravel-recaptcha-v3
            ]);

            if ($validate_recaptcha->fails()) {
                /*Flash::error('recaptcha: no se ha superado recaptcha')->important();
                return redirect(route('empleo'))->withInput()->withErrors($validate_recaptcha);*/
                abort(401, 'Ud no ha superado las validaciones del recaptcha.');
            }
        }

        
        if(Persona::where('identificacion', $request->identificacion)->exists() && Persona::where('identificacion', $request->identificacion)->first()->Postulacion()->exists()){
            $datebd = new Carbon(Persona::where('identificacion', $request->identificacion)->first()->Postulacion()->first()->created_at);
            if(Carbon::now()->diffInMonths($datebd)<config('bcm.solicitud_meses')){
                Flash::error('La persona con la identificación: '.$request->identificacion.', ya ha solicitado empleo, no se podrá modificar hasta despues de '.(config('bcm.solicitud_meses')-Carbon::now()->diffInMonths($datebd)).' meses.')->important();
                return redirect(route('empleo'))->withInput();
            }

            //eliminamos el registro existente
            Persona::where('identificacion',$request->identificacion)->first()->Postulacion()->delete();
        }
 
        $validator=Validator::make($request->all(), [
            'identificacion'=> 'required|max:10|string',
            'nombres'=> 'required|min:5|max:150|string',
            //invisibles
            'nacionalidad'=> 'required',
            'fecha_nacimiento'=> 'required',
            'sexo'=> 'required',
            'estado_civil'=> 'required',
            //termina invisibles
            'email'=> 'required|min:5|max:100|email',
            'telefono'=> 'required|min:9|max:10|string',
            'ciudad'=> 'required|integer',
            'direccion'=> 'required|min:20|max:100|string',
            'expectativas'=> 'required|min:20|max:300|string',
            'f_curriculum'=> 'required|file|mimetypes:application/pdf|max:5000'
        ]);

        if ($validator->fails()) {
            return redirect(route('empleo'))->withErrors($validator)->withInput();
        }

        $nombres = explode(" ", $request->nombres);
        $persona=Persona::firstOrCreate(
            ['identificacion' => $request->identificacion],
            ['identificacion' => $request->identificacion,
            'primer_apellido' => strtoupper(array_key_exists(0,$nombres)?" ".$nombres[0]:""),
            'segundo_apellido' => strtoupper(array_key_exists(1,$nombres)?" ".$nombres[1]:""),
            'nombres' => strtoupper((array_key_exists(2,$nombres)?$nombres[2]:"").(array_key_exists(3,$nombres)?" ".$nombres[3]:"").(array_key_exists(4,$nombres)?" ".$nombres[4]:"") ),
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'sexo' => strtoupper($request->sexo),
            'estado_civil' => strtoupper($request->estado_civil),
            'nacionalidad' => strtoupper($request->nacionalidad)
        ]);

        //guardamos en storage los archivos subidos
        $extension=$request->file('f_curriculum')->getClientOriginalExtension();//sirve para todos
        $filename=$request->identificacion.'-rrhh.'.$extension; //'.date('Y-m-d').'
        $request->file('f_curriculum')->storeAs('pdf-postulacion', $filename);

        $createjob=Postulacion::create([
            "id_persona"=>$persona->id_persona,
            "correo_electronico"=>strtolower($request->email),
            "telefono"=>$request->telefono,
            "direccion"=>mb_strtoupper($request->direccion, 'UTF-8'),
            "id_ciudad"=>$request->ciudad,
            "expectativas"=>mb_strtoupper($request->expectativas, 'UTF-8'),
            "f_curriculum"=>"pdf-postulacion/".$filename
        ]);

        $createemail=Email::firstOrCreate(
            ["email"=>strtolower($request->email)],
            ["identificacion"=>$request->identificacion,
            "tipo_registro"=>"FORMULARIO DE EMPLEO"
        ]);


        $ciudad=$this->getAllCities();
        //envia notificación al cliente
        \Notification::route('mail', strtolower($request->email))
            ->route('mensaje',  "Estimado postulante, hemos recibido su solicitud, la solicitud será revisada y en caso de salir favorecido un asesor se pondra en contacto con ud.")//para pasar variables
            ->route('name',  $request->nombres)
            ->notify(new SendContactRecibidaClient());

        //envia notificación al operador
        \Notification::route('mail', explode(",",config('mail.notifierbcmjob')))
            ->route('cid',  $request->identificacion)
            ->route('ciudad',  $ciudad[$request->ciudad])
            ->route('name',  $request->nombres)//para pasar variables
            ->route('email',  strtolower($request->email))
            ->route('phone',  $request->telefono)
            ->route('tipo',  "EMPLEO")
            ->route('msg',  strtoupper($request->expectativas))
            ->notify(new SendContactRecibidaOper());

        Flash::overlay("Su solicitud ha sido registrada en nuestro sistema con éxito, su solicitud será revisada por un asesor., gracias por utilizar nuestros servicios.", "Banco comercial de manabí");

        return redirect(route('empleo'));
     }

    

    /**
     * Permite abrir el enlace de contacto
     */
    public function simulador()
    {
        $fijas=Fija::with("Enlace:id_enlace,url,estado,metodo")->get()->toarray();
        $footers=Footer::all();
        $menus=Menu::all();

        $titlehead='Simulador de crédito';

        return view('public/simulador', compact('fijas','footers','menus','titlehead'));  
    }

    
    public function getCidPublic(Request $request)
    {
        if (empty($request->id) || !is_numeric($request->id) || strlen($request->id)<10 || strlen($request->id)>13) {
		    abort(404, 'Error con su peticion.');
        }
        $json = file_get_contents('https://www.entrenadinamica.com/wp-access/cid.php?ci='.$request->id);
        if(!$json)
            $json = json_encode(array(array("error"=>'La cedula consultada es erronea')));

	    //me notifica si alguien mas utiliza este servicio
        /*\Notification::route('mail', strtolower("jemeza@bcmanabi.com"))
            ->route('mensaje',  "Consumo servicio de consulta publica con los siguientes datos.. Cedula: ".$request->id.", Ip: ".$request->ip())//para pasar variables
            ->route('name',  "Jean Meza")
            ->notify(new SendContactRecibidaClient());*/

        return Response::json(json_decode($json), 200);
    }

    /**
     * 
     */
    public function getCidProtect(Request $request)
    {
        if (empty($request->id) || !is_numeric($request->id) || strlen($request->id)<10 || strlen($request->id)>13) {
		abort(404, 'Error con su peticion.');
        }
        $json = file_get_contents('https://www.entrenadinamica.com/wp-access/cid.php?ci='.$request->id);
        if(!$json)
            $json = json_encode(array(array("error"=>'La cedula consultada es erronea')));;
        return Response::json(json_decode($json), 200);
    }

    /**
     * EN CASO DE QUERER PROTEGER UNA RUTA JSON CON SE UTILIZA PASSPORT DE LARAVEL SEGUIR TUTORIAL
     * https://medium.com/@cvallejo/sistema-de-autenticaci%C3%B3n-api-rest-con-laravel-5-6-240be1f3fc7d
     */
    public function getCidSolicita(Request $request)
    {
        if (empty($request->id) || !is_numeric($request->id) || strlen($request->id)<10 || strlen($request->id)>13) {
		abort(404, 'Error con su peticion.');
        }
        if(Persona::where('identificacion', $request->id)->exists() && Persona::where('identificacion', $request->id)->first()->PersonaSolicitante()->exists()){
            $datebd = new Carbon(Persona::where('identificacion', $request->id)->first()->PersonaSolicitante()->first()->Solicitud()->first()->created_at);
            $estadosol=Persona::where('identificacion', $request->id)->first()->PersonaSolicitante()->first()->Solicitud()->first()->estado;

            if(($estadosol=="RECHAZADA" || $estadosol=="RECHAZADA-CUPO") && Carbon::now()->diffInMonths($datebd)<config('bcm.solicitud_meses'))
                return Response::json(array(array("error"=>'La persona con la identificación: '.$request->id.', ya ha solicitado tarjeta, no se podrá modificar hasta despues de '. (config('bcm.solicitud_meses') - Carbon::now()->diffInMonths($datebd) ).' meses.')), 200);
            else if(!($estadosol=="RECHAZADA" || $estadosol=="RECHAZADA-CUPO"))
                return Response::json(array(array("error"=>'La persona con la identificación: '.$request->id.', ya ha solicitado tarjeta.')), 200);
        }

        $json = file_get_contents('https://www.entrenadinamica.com/wp-access/cid.php?ci='.$request->id);
        if(!$json)
            $json = json_encode(array(array("error"=>'La cedula consultada es erronea')));

        return Response::json(json_decode($json), 200);
    }

    public function getApiProvinces(Request $request)
    {
        $file=Storage::get("private/provincias.json");
        $response = Response::make($file,200);
        $response->header('Content-Type', 'application/json');
        return $response;
    }

    public function actualizacookie(Request $request)
    {
        Cookie::queue($request->cookie,'activo',7*(60*24));//7 dia * 60 minutos * 24 horas
        return "true";
    }

    public function carousel()
    {
        $carrusel=Carousel::all('titulo','descripcion','url_imagen','indicador_btn','link')->where('deleted_at',null);
        return response()->json(array_merge(array('carrusel'=>$carrusel)));
    }

    public function progress()
    {
        $carrusel=Carousel::all('titulo','descripcion','url_imagen','indicador_btn','link')->where('deleted_at',null);
        return response()->json(array_merge(array('carrusel'=>$carrusel)));
    }

    /**
     * obtiene todas las ciudades del archivo provincias json
     */
    public function getAllCities(){
        $json=json_decode(Storage::get("private/provincias.json"));
        $cities=array();
        foreach ($json as $item) {
            foreach ($item->cantones as $key=>$subitem) {
                $cities[$key]=strtoupper($subitem->canton." (".$item->provincia.")");
            }
        }
        return $cities;
    }

    /**
     * obtiene todas las ciudades del archivo provincias json
     */
    public function getAllCitiesNoKey(){
        $json=json_decode(Storage::get("private/provincias.json"));
        $cities=array();
        foreach ($json as $item) {
            foreach ($item->cantones as $key=>$subitem) {
                $cities[strtoupper($subitem->canton." (".$item->provincia.")")]=strtoupper($subitem->canton." (".$item->provincia.")");
            }
        }
        return $cities;
    }

    public function mantenimiento(){
    	abort(503, 'Opción en mantenimiento, favor intentar mas tarde.');
    }

    public function jota()
    {
        return view('public/jota');
    }

    public function jotapost(Request $request)
    {
        $validate=Validator::make($request->all(), [
            'id' => 'required',
            'factor' => 'required',
        ]);
        if ($validate->fails()) {
            $error="error";
            return view('public/jota',compact('error'));
        }

        $var=array(
            array("name"=>"MEZA CEVALLOS JIMMY JOSE", "cid"=>"1312038415", "fecha"=>"jueves, 19 noviembre 2020"),
            array("name"=>"BERMÚDEZ GILER CARLOS ALBERTO", "cid"=>"1312593757", "fecha"=>"jueves, 19 noviembre 2020"),
            array("name"=>"LILIBETH GUADALUPE MORA GILER", "cid"=>"1312568650", "fecha"=>"viernes, 1 enero 2021")
        );
        $success=null;
        if($request->id=='67931' && $request->factor=='458'){
            $success=$var[0];
        }
        if($request->id=='67939' && $request->factor=='653'){
            $success=$var[1];
        }
        if($request->id=='67982' && $request->factor=='650'){
            $success=$var[2];
        }

        if (empty($success)) {
            $error="error2";
            return view('public/jota',compact('error'));
        }

        return view('public/jota',compact('success'));
    }

}
