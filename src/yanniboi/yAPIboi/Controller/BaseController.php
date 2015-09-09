<?php

namespace yanniboi\yAPIboi\Controller;

use yanniboi\yAPIboi\Application;
use Silex\Application as SilexApplication;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;

/**
 * Base controller class to hide Silex-related implementation details
 */
abstract class BaseController implements ControllerProviderInterface {
  /**
   * @var \yanniboi\yAPIboi\Application
   */
  protected $container;

  public function __construct(Application $app) {
    $this->container = $app;
  }

  abstract protected function addRoutes(ControllerCollection $controllers);

  public function connect(SilexApplication $app) {
    $controllers = $app['controllers_factory'];

    $this->addRoutes($controllers);

    return $controllers;
  }


  /**
   * Render a twig template
   *
   * @param  string $template  The template filename
   * @param  array  $variables
   * @return string
   */
  public function render($template, array $variables = array())
  {
    return $this->container['twig']->render($template, $variables);
  }

}