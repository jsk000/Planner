<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DoneNotification extends Notification
{
    use Queueable;

    // to pass data to our constuctor
    private $NotData;

    /**
     * Create a new notification instance.
     *pass information, that we want to send through a notification
     * @return void
     */
    public function __construct($NotData)//The variable is not there by default
    {
        $this->NotData = $NotData;
    }

    /**
     * Get the notification's delivery channels.
     *this method allows us to define, which notifaction channel we are going to use
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    //for every notification channel we need a specific method to define how or what to send

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Dear User,')
                    ->line($this->NotData['line1'])
                    ->action($this->NotData['check'], $this->NotData['url'])
                    ->line($this->NotData['line2']);
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
            'status' => $this->NotData['status']
        ];
    }
}
