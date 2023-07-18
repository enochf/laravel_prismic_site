<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendTestimonialSubmission extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Create a new message instance.
     *
     * @param $errorDetails
     */
    public function __construct($email) {

        $this->email = json_decode($email);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {

        $message = $this->from('noreply@'.config('app.name'), 'CSU Global')
        ->replyTo('noreply@'.config('app.name'), 'CSU Global')
        ->subject('New Testimonial Submission - '. date('l jS \of F Y h:i:s A', time()))
        ->markdown('email.testimonial_submission');

        if ($this->email->photo1) {
            $message->attachFromStorage($this->email->photo1);
        }

        if ($this->email->photo2) {
            $message->attachFromStorage($this->email->photo2);
        }

        if ($this->email->photo3) {
            $message->attachFromStorage($this->email->photo3);
        }

        return $message;

    }
}
