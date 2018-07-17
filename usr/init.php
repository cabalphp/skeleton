<?php

/**
 * @var \Server $server
 */
/**
 * @var \Cabal\Core\Application\Dispatcher $dispatcher
 */

// 使用 Model
\Cabal\DB\Model::setDBManager($server->db()); 