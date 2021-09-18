<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;
use App\User;

/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class SendPassword extends Notification
{
    use Queueable;
    public $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($var_password) //User $user
    {
        $this->password = $var_password;
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
        $subject = sprintf('%s: Tienes un nuevo mensaje!', config('app.name'));
        $greeting = sprintf('Hola %s!', $notifiable->name);
        $message = sprintf('Se ha generado la siguiente clave de acceso: <strong>%s</strong>', $this->password);

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->salutation('Atentamente')
                    ->line('Bienvenido a nuestro sistema.')
                    ->line(new HtmlString($message))
                    ->line('Por favor da clic en el siguiene enlace para iniciar sesión.')
                    ->action("Iniciar sesión", url('https://192.168.10.2/login'))
                    ->line('Gracias por usar nuestra aplicación.!');
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
