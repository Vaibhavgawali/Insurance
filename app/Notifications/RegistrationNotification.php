<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;
use App\Models\User;

class RegistrationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user,$password,$role)
    {
        $this->user=$user;
        $this->password=$password;
        $this->role=$role;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return(new MailMessage)
            ->greeting('Dear, ' . $this->user->name)
            ->line('Thanks for registering with insurancecareer.in')
            ->line('Please see below the login credentials:')
            ->line('Email id: ' . $this->user->email)
            ->line('Password: ' . $this->password)
            ->line('Do not reply to this mail. If you have any query, please write to info@insurancecareer.in.')
            ->action('Click here to Login', url('/login?role='. $this->role))
            ->line('Wish you all the best.')
            // ->salutation('Regards,<br/>Team insurancecareer.in');
            ->salutation("Regards, \r\n Team insurancecareer.in");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
