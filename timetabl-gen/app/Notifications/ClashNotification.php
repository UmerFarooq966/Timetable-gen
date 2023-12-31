<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClashNotification extends Notification
{
    use Queueable;

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('There is a timetable clash in your enrolled courses.')
            ->action('View Timetable', url('/timetable'));
    }

    // Add the 'via' method
    public function via($notifiable)
    {
        return ['mail'];
    }
}

