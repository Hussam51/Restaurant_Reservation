<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReservation extends Notification
{
    use Queueable;

    public $reservation_id;
    public $res_date;
    public $userName;
    public $email;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reservation)
    {

       $this->reservation_id=$reservation->id;
       $this->email=$reservation->email;
       $this->res_date=$reservation->res_date;
       $this->userName=$reservation->first_name.' '.$reservation->first_name;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->subject("New Reservation")
                    ->from("{{$this->email}}")
                    ->line("a new reservation Created by.{{$this->userName}}")
                    ->action('Notification Url', url("admin/reservations/.{{$this->reservation_id}}"))
                    ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable){
        return [
            'reservation_id'=>$this->reservation_id,
            'res_date'=>$this->res_date,
            'user_name'=>$this->userName,
            'icon'=>'fas fa file',
            'url'=>url("/admin/reservations/.{{$this->reservation_id}}")
        ];
    }


    public function toBroadcast($notifiable){
        return [
            'reservation_id'=>$this->reservation_id,
            'res_date'=>$this->res_date,
            'user_name'=>$this->userName

        ];
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
