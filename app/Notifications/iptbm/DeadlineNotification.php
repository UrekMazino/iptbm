<?php

namespace App\Notifications\iptbm;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeadlineNotification extends Notification
{
    use Queueable;

    /**
     * Create a
     * new notification instance.
     */
    private $task;
    private $deadline;
    private $url;
    private $iptype;
    private $stage;
    private $technology;
    private $applicationnumber;

    public function __construct($technology, $iptype, $applicationnumber, $task, $stage, $deadline, $url)
    {
        $this->technology = $technology;
        $this->applicationnumber = $applicationnumber;
        $this->iptype = $iptype;
        $this->stage = $stage;
        $this->task = $task;
        $this->deadline = $deadline;
        $this->url = $url;
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
        return (new MailMessage)
            ->markdown('iptbm.mail.deadline-notification',
                ['technologyname' => $this->technology,
                    'applicationnumber' => $this->applicationnumber,
                    'iptype' => $this->iptype,
                    'task' => $this->task,
                    'stage' => $this->stage,
                    'deadline' => $this->deadline,
                    'url' => $this->url
                ]);
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
