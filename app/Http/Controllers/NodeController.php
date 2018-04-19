<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessTokenRequest;
use GruzzleHttp\Client;

class NodeController extends Controller
{
    //
    public function __construct() 
    {

    }

    public function requestTokenForUser(Request $req) 
    {
        // check a ratelimit for this caller
        // ToDo, outsource implementation to another class
        // This should search a persistently known osu!user in my db before calling the api
        if (!$req->has('osu_user')) return;
        $type = (is_numeric($req->osu_user)) ? 'id' : 'string';

        // check the osu userid or create it in my db
        $client = new Client();
        $res    = $client->request('GET', 'https://osu.ppy.sh/api/get_user', [
            'k' => env('OSU_API_KEY'),
            'u' => $req->osu_user,
            'type' => $type,
        ]);

        // if the request was successful make the user known to my db
        if ($res->getStatusCode() === 200) {

            // grab the user object and queue the job
            //ProcessTokenRequest::dispatch($osuUser)
        }

        // if the program makes it to over here it actually failed getting a valid user
        return;
        
    }
}
