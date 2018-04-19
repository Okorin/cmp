<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use GruzzleHttp\Client;

class ProcessNodeTokenRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $token;
    private $osuUser;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct() // needs to take the Params later
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->token = $this->generateNewToken();
        $client = new Client();
        $res    = $client->request('POST', env('BANCHOJS_URI'), json_encode([
            'sharedSecret' => env('BANCHOJS_SECRET'),
            'osuToken'     => $this->token,
            'osuId'        => $this->osuUser->id,
        ]));
    }

    private function generateNewToken()
    {

    }
}
