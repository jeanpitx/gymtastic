<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class SendContactRecibidaOper extends Notification // oper de operador
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

        return (new MailMessage)
                        ->subject('Nueva Solicitud de productos BCM! - '.$notifiable->routes['tipo'])
                        ->greeting('Nueva solicitud de productos BCM!')
                        ->salutation('Saludos')
                        ->line('El sistema de solicitud de productos BCM ha recibído una nueva su solicitud con los siguientes datos:')
                        ->line('* '.$notifiable->routes['name'].' (**'.$notifiable->routes['cid'].'**) - '.strtoupper($notifiable->routes['ciudad']))
                        ->line('* **Correo electrónico**: '.$notifiable->routes['email'])
                        ->line('* **Número de teléfono**: '.$notifiable->routes['phone'])
                        ->line('* **Fecha Nacimiento**: '.$notifiable->routes['fecha_nacimiento'])
                        ->line('* **Sexo**: '.$notifiable->routes['sexo'])
                        ->line('* **Deporte**: '.$notifiable->routes['deporte'])
                        ->line('* **Comentario**: '.$notifiable->routes['msg'])
                        ->line('')
                        ->line('Por favor comuniquese lo antes posible con el cliente.');
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
