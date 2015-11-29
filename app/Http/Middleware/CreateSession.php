<?php

namespace App\Http\Middleware;

use Elearn\Foundation\Helper\Json;
use Illuminate\Http\Request;
use Illuminate\Redis\Database;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Session\SessionInterface;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class CreateSession extends StartSession
{
    /**
     * @var Database
     */
    protected $redis;

    public function __construct(SessionManager $manager, Database $redis)
    {
        parent::__construct($manager);
        $this->redis = $redis;
    }

    protected function startSession(Request $request)
    {
        $session = parent::startSession($request);


        return $session;
    }

    protected function addCookieToResponse(Response $response, SessionInterface $session)
    {
        parent::addCookieToResponse($response, $session);
        if ($this->sessionIsPersistent($config = $this->manager->getSessionConfig())) {

            $id = $session->getId();
            $content = $session->all();
            $this->redis->command('set', ['session:' . $id, Json::dump($content)]);
            $this->redis->command('expire', ['session:' . $id, $this->getSessionLifetimeInSeconds()]);

            $cookie = new Cookie(env('COMMON_SESSION'), $session->getId(), $this->getCookieExpirationDate(),
                $config['path'], $config['domain'], Arr::get($config, 'secure', false));

            $response->headers->setCookie($cookie);
        }
    }

}