<?php

namespace yanniboi\yAPIboi\Controller;

use Silex\Application as SilexApplication;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class RestController extends BaseController
{
  protected function addRoutes(ControllerCollection $controllers)
  {
    $controllers->post('/api/programmers', array($this, 'newAction'));
  }

  public function newAction(Request $request) {
    $data = json_decode($request->getContent(), TRUE);
    return $request;

  }

}
