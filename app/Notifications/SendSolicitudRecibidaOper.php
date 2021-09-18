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
class SendSolicitudRecibidaOper extends Notification // oper de operador
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
        $mailer=(new MailMessage)
        ->subject('Nueva Solicitud de tarjeta de crédito!')
        ->greeting('Nueva solicitud de tarjeta de crédito!')
        ->salutation('Saludos')
        ->line('El sistema de tarjetas de crédito ha recibído una nueva solicitud con los siguientes datos:');

        $html="<ul>";
        foreach ($notifiable->routes['datos'] as $clave => $valor){
            if($clave=="coordenadas" || $clave=="coordenadas_negocio_dependiente" || $clave=="coordenadas_negocio_independiente")
                $html=$html.'<li><b>'.ucfirst(str_replace('_',' ',$clave)).': </b> <a href='.$valor.' targer="_blank">Ver ubicación</a></li>';
            else
                $html=$html.'<li><b>'.ucfirst(str_replace('_',' ',$clave)).': </b> '.$valor.'</li>';
        }
        $mailer->line(new HtmlString($html."</ul>"));
        $mailer->line('')->line('Por favor comuniquese lo antes posible con el cliente.');
        return $mailer;
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
