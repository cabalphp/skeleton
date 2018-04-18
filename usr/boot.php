<?php
require __DIR__ . '/../vendor/autoload.php';


class Boot extends Cabal\Core\Application\Boot
{
    use Cabal\Core\Http\Boot\HasPlates;
    use Cabal\DB\Boot\HasDB;
    use Cabal\Core\Cache\Boot\HasCache;
}

$options = getopt('e:');
$boot = new Boot(dirname(__DIR__), array_get($options, 'e'));

