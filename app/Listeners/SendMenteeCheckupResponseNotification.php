<?php

namespace App\Listeners;

use App\Events\MenteeCheckupResponded;
use GuzzleHttp\Client;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMenteeCheckupResponseNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MenteeCheckupResponded  $event
     * @return void
     */
    public function handle(MenteeCheckupResponded $event)
    {
        $id = env('CMP_WEBHOOK_ID');
        $token = env('CMP_WEBHOOK_TOKEN');
        
        if (!$id || !$token) return false;
        
        $checkup =  $event->menteeCheckup;

        $client = new Client();
        $client->post("https://discordapp.com/api/webhooks/$id/$token", [
            'json' => [
                'embeds' => [
                    [
                        'title' => 'Submitted a response',
                        'author' => ['name' => $checkup->participant->mentee->name],
                    ]
                ],
            ]
        ]);
    }
}
