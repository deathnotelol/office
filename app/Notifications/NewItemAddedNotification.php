<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewItemAddedNotification extends Notification
{
    use Queueable;

    public $message;
    public $url;

    /**
     * Create a new notification instance.
     */
    public function __construct($message, $url)
    {
        $this->message = $message;
        $this->url = $url;
    }

    /**
     * Store notification in the database.
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the database representation of the notification.
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
            'url' => $this->url,  // Save the URL to the database
            'time' => now()->format('h:i A'),
        ];
    }
}
