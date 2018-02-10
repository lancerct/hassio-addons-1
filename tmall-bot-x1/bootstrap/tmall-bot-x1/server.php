<?php
require_once __DIR__.'/homeassistant_conf.php';

// error reporting (this is a demo, after all!)
ini_set('display_errors',1);error_reporting(E_ALL);

// Autoloading (composer is preferred, but for this example let's just do this)
//require_once('oauth2-server-php/src/OAuth2/Autoloader.php');
//OAuth2_Autoloader::register();

require_once(dirname(__FILE__).'/oauth2-server-php/src/OAuth2/Autoloader.php');
OAuth2\Autoloader::register();


//$storage = new OAuth2\Storage\Pdo(array('dsn' => $dsn, 'username' => $user, 'password' => $pwd));
$storage = new OAuth2\Storage\Pdo(array('dsn' => dsn, 'username' => user, 'password' => pwd));



// Pass a storage object or array of storage objects to the OAuth2 server class
$server = new OAuth2\Server($storage);

// Add the "Client Credentials" grant type (it is the simplest of the grant types)
$server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));
?>