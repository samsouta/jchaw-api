<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Notification ကိုပေးပို့မယ့် channels တွေကိုပြောပြပါ။
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail']; // ဒီမှာ mail ကိုပေးပို့ဖို့သတ်မှတ်ထားပါတယ်။
    }

    /**
     * Notification ကို email အဖြစ်ပြန်လုပ်ပေးပါ။
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Your Password')
            ->line('We have received a request to reset your password.')
            ->action('Reset Password', url(route('password.reset', ['token' => $this->token, 'email' => $notifiable->email])))
            ->line('If you did not request a password reset, no further action is required.');
    }
}
