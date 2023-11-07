<?php

namespace App\Notifications\iptbm\admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountCreationNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $username;
    public $password;
    public $fullName;
    public $url;
    public function __construct($fullname,$username,$password)
    {
        $this->username=$username;
        $this->password=$password;
        $this->fullName=$fullname;
        $this->url=config('app.url');
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
            ->markdown('iptbm.mail.account-creation',
                [ 'username'=>$this->username,
                    'password'=>$this->password,
                    'url'=>$this->url,
                    'fullName'=>$this->fullName
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
