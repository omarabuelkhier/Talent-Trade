<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StatusCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($candidate_name , $created_at , $candidate_image ,$role ,$candidate_id)
    {
        $this->candidate_name = $candidate_name;
        $this->created_at = $created_at;
        $this->candidate_image = $candidate_image;
        $this->role = $role;
        $this->candidate_id = $candidate_id;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'candidate_name' => $this->candidate_name,
            'created_at' => $this->created_at,
            'candidate_image' => $this->candidate_image,
            'role' => $this->role,
            'candidate_id' => $this->candidate_id,
        ];
    }
}
