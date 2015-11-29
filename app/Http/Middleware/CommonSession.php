<?php

namespace App\Http\Middleware;

use Closure;
use Elearn\Foundation\Helper\Json;
use Illuminate\Redis\Database;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Cookie;

class CommonSession extends StartSession
{
    /**
     * @var \Predis\ClientInterface
     */
    private $redis;

    public function __construct(Database $client, SessionManager $manager)
    {
        parent::__construct($manager);
        $this->redis = $client->connection('common');
    }

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $session = $request->getSession();

        if ($this->sessionIsPersistent($config = $this->manager->getSessionConfig())) {
            $id = $session->getId();
            $key = 'session:' . $id;
            $content = $session->all();
            $value = Json::dump($content);
            $this->redis->set($key, $value);
            $this->redis->expire($key, $this->getSessionLifetimeInSeconds());

            $cookie = new Cookie(env('COMMON_SESSION'), $id, $this->getCookieExpirationDate(),
                $config['path'], $config['domain'], Arr::get($config, 'secure', false));
            $response->headers->setCookie($cookie);
        }
        return $response;
    }
}