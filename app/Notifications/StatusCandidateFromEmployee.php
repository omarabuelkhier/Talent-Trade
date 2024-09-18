<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StatusCandidateFromEmployee extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($username,$userImage,$created_at,$role,$job_id,$status)
    {
        $this->username = $username;
        $this->userImage = $userImage;
        $this->created_at = $created_at;
        $this->role = $role;
        $this->job_id = $job_id;
        $this->status = $status;

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
            'name' => $this->username,
            'image' => $this->userImage,
            'created_at' => $this->created_at,
            'role' => $this->role,
            'job_id' => $this->job_id,
            'status' => $this->status,
        ];
    }
}
