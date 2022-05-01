<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class EnrollTask extends Notification
{
    use Queueable;
    private $enrollData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($enrollData)
    {
        $this->enrollData = $enrollData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'slack'];
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
            ->line($this->enrollData['body'])
            ->action($this->enrollData['title'], $this->enrollData['url'])
            ->line($this->enrollData['thankyou']);
    }

    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->content($this->enrollData['title']);
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
