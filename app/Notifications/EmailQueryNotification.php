<?php

namespace App\Notifications;
use App\Http\Controllers\EmailQueryController;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailQueryNotification extends Notification
{
    use Queueable;
    public $email;
    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email,$user)
    {
        $this->email = $email;
        $this->user = $user;
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
                    ->line($this->email->email_subject)
                    ->line($this->email->message)
                    ->action('Click here to response', route('email.link',$this->user->id));
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
