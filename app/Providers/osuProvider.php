<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\Arr;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class osuProvider extends AbstractProvider implements ProviderInterface
{
    /**
     * The scopes being requested.
     *
     * @var array
     */
    protected $scopes = ['identify'];

    /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase('https://osu.ppy.sh/oauth/authorize', $state);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl()
    {
        return 'https://osu.ppy.sh/oauth/token';
    }

    protected function getTokenFields($code) 
    {
        return Arr::add(
            parent::getTokenFields($code), 'grant_type', 'authorization_code'
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get('https://osu.ppy.sh/api/v2/me',[
            'headers' => [
                'Authorization' => 'Bearer '. $token,
            ],
        ]);

        $user = json_decode($response->getBody(), true);
        return $user;
    }
    
    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'id' => $user['id'],
            'name' => $user['username'],
            'nickname' => $user['username'],
            'avatar' => $user['avatar_url'],
        ]);
    }

}
