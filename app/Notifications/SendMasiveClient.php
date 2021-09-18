<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class SendMasiveClient extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mensaje=(new MailMessage)
                        ->subject("BCM : ".$notifiable->routes['titulo'])
                        ->greeting("Saludos estimado cliente.")
                        ->salutation('Atentamente '.config('app.name'))
                        ->line("**".$notifiable->routes['titulo']."**");

        //imagen
        if(!empty($notifiable->routes["imagen"])){
            /*$mensaje->attachData($notifiable->routes['imagen'], "<".$notifiable->routes['titulo'].".".$notifiable->routes['tipo'].">", [
                'mime' => 'image/'.$notifiable->routes['tipo'],
            ]);*/
            //$mensaje->line(new HtmlString('<img src="'.embedData($notifiable->routes['imagen'], $notifiable->routes['titulo'].".".$notifiable->routes['tipo']).'" alt="Propaganda BCM">'));
            //$mensaje->line(new HtmlString('<img src="https://www.bcmanabi.com/imagen/destacado_banca_linea.jpg" alt="Propaganda BCM">'));
            //$mensaje->line(new HtmlString('<img src="cid:'.$notifiable->routes['titulo'].".".$notifiable->routes['tipo'].'" alt="Propaganda BCM">'));//{{ $message->embedData($notifiable->routes["imagen"], $notifiable->routes["titulo"].".".$notifiable->routes["tipo"]) }}
            $mensaje->line(new HtmlString('<img src="https://www.bcmanabi.com'.str_replace("https://192.168.10.2","",$notifiable->routes["imagen"]).'" style="max-width:100%" alt="Propaganda BCM" title="Clic aquí">'));//{{ $message->embedData($notifiable->routes["imagen"], $notifiable->routes["titulo"].".".$notifiable->routes["tipo"]) }}
        }

        //mensaje
        $mensaje->line(new HtmlString($notifiable->routes['mensaje']));


        //archivo adjunto pdf
        if(!empty($notifiable->routes["documento"]))
            $mensaje->attachData($notifiable->routes['documento'], $notifiable->routes['titulo'].".".$notifiable->routes['tipodoc'], [
                'mime' => 'application/'.$notifiable->routes['tipodoc'],
            ]);


        //enlace
        if(!empty($notifiable->routes["enlace"]) && $notifiable->routes["enlace"]!='ninguna'){
            $mensaje->line('Para mas información acerca de estos beneficios, te invitamos a dar clic en el siguiente enlace:');
            $mensaje->action("Accede aquí", url("".$notifiable->routes["enlace"]));
        }else{
            $mensaje->line('Para mas información acerca de todos nuestros servicios visita nuestro sitio web a continuación:');
            $mensaje->action("Sitio Web", url('/'));
        }

        //pie de página
        $mensaje->line('Gracias por utilizar nuestros servicios.!');

        return $mensaje;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
