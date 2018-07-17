<?php
require __DIR__ . '/../vendor/autoload.php';

class Server extends \Cabal\Core\Server
{
    use \Cabal\Core\Cache\ServerHasCache;
    use Cabal\Core\Http\Server\HasPlates;
    use Cabal\DB\ServerHasDB;

    public function __construct($root, $env)
    {
        parent::__construct($root, $env);
    }
}

$boot = new \Cabal\Core\Boot();

$options = getopt('e:');
$server = $boot->createServer(dirname(__DIR__), array_get($options, 'e'), Server::class);

return $server;

