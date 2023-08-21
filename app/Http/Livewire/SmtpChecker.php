<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class SmtpChecker extends Component
{
    public $username, $password, $host, $port, $encryption, $address, $recipient;

    public function render()
    {
        return view('livewire.smtp-checker');
    }

    public function smtpSingleChecker(){

        try {
            $transport = Transport::fromDsn(sprintf(
                'smtp://%s:%s@%s:%s',
                $this->username,
                $this->password,
                $this->host,
                $this->port,
                $this->encryption
            ));

            $mailer = new Mailer($transport);

            $email = (new Email())
                ->from($this->address)
                ->to($this->recipient)
                ->subject('Test Email')
                ->text('This is a test email sent using Symfony Mailer.');

            $mailer->send($email);

            session()->flash('success', 'SMTP server connected and test email sent successfully.');

        } catch (TransportExceptionInterface $e) {

            session()->flash('error', $e->getMessage());

        }
    }
}
