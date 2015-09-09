<?php

namespace yanniboi\yAPIboi\Controller;

use Silex\Application as SilexApplication;
use Silex\ControllerCollection;

class DefaultController extends BaseController {
  protected function addRoutes(ControllerCollection $controllers) {
    $controllers->get('/', array($this, 'defaultHome'));
  }

  public function defaultHome() {
    return $this->render('homepage.twig');
  }

}
