<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSalesForceError extends Mailable
{
    use Queueable, SerializesModels;

    public $email = '';

    /**
     * Create a new message instance.
     *
     * @param $errorDetails
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        
        return $this->from('noreply@'.config('app.name'), 'CSU Global')
            ->replyTo('noreply@'.config('app.name'), 'CSU Global')
            ->subject('Student Application Error - '. date('l jS \of F Y h:i:s A', time()))
            ->markdown('email.salesforce_error');
        
    }
}