<?php

$loader = require __DIR__.'/vendor/autoload.php';

use yanniboi\yAPIboi\Application;

/*
 * Create our application object
 *
 * This configures all of the routes, providers, etc (in the constructor)
 */

$app = new Application(array(
  'debug' => true,
));

/** show all errors! */
ini_set('display_errors', 1);
error_reporting(E_ALL);

$app->mountControllers();

return $app;

