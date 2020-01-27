<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB; # ユーザ名取得用

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
    * The password reset token.
    */
    private $token;

    /**
     * Create a new notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail']; # mail用に通知を利用する
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $email = $notifiable->getEmailForPasswordReset(); # email取得
        $user = DB::table('users')->select('name')->where('email', $email)->first(); # emailで検索
        $url = url(config('app.url').route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false));
            # token, email 含んだ パスワード再設定用url を生成
        return (new MailMessage)
                    ->subject('パスワード再設定')
                    ->greeting("こんにちは、$user->name さん")
                    ->line('以下リンクより、パスワードの設定を行なってください。')
                    ->line('60分で無効となります。')
                    ->action('パスワード再設定用リンク', $url);
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
