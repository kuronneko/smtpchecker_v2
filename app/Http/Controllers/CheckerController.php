<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class CheckerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $smtpServers = [
            [
                'host' => 'test',
                'port' => 2525,
                'encryption' => 'tls',
                'username' => 'test',
                'password' => 'test',
                'address' => 'no-reply@test.com',
            ],
        ];

        $transportResults = [];

        foreach ($smtpServers as $server) {
            try {
                $transport = Transport::fromDsn(sprintf(
                    'smtp://%s:%s@%s:%s',
                    $server['username'],
                    $server['password'],
                    $server['host'],
                    $server['port']
                ));

                $mailer = new Mailer($transport);

                $email = (new Email())
                    ->from($server['address'])
                    ->to('test@test.cl')
                    ->subject('Test Email')
                    ->text('This is a test email sent using Symfony Mailer.');

                $mailer->send($email);

                $transportResults[] = [
                    'server' => $server['host'],
                    'status' => 'ok',
                    'message' => 'SMTP server connected and test email sent successfully.',
                ];
            } catch (TransportExceptionInterface $e) {
                $transportResults[] = [
                    'server' => $server['host'],
                    'status' => 'error',
                    'message' => $e->getMessage(),
                ];
            }
        }

        return response()->json(['results' => $transportResults]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
