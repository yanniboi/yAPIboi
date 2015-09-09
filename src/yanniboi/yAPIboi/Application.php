<?php

namespace yanniboi\yAPIboi;

use Silex\Application as SilexApplication;
use Symfony\Component\Finder\Finder;
use Silex\Provider\TwigServiceProvider;


class Application extends SilexApplication {
  public function __construct(array $values = array())
  {
    parent::__construct($values);

    $this->configureParameters();
    $this->configureProviders();

  }


  public function mountControllers()
  {
    $controllerPath = 'src/yanniboi/yAPIboi/Controller';
    $finder = new Finder();
    $finder->in($this['root_dir'].'/'.$controllerPath)
      ->name('*Controller.php')
    ;

    foreach ($finder as $file) {
      /** @var \Symfony\Component\Finder\SplFileInfo $file */
      // e.g. Api/FooController.php
      $cleanedPathName = $file->getRelativePathname();
      // e.g. Api\FooController.php
      $cleanedPathName = str_replace('/', '\\', $cleanedPathName);
      // e.g. Api\FooController
      $cleanedPathName = str_replace('.php', '', $cleanedPathName);

      $class = 'yanniboi\\yAPIboi\\Controller\\'.$cleanedPathName;

      // don't instantiate the abstract base class
      $refl = new \ReflectionClass($class);
      if ($refl->isAbstract()) {
        continue;
      }

      $this->mount('/', new $class($this));
    }
  }

  private function configureParameters()
  {
    $this['root_dir'] = __DIR__.'/../../..';
    //$this['sqlite_path'] = $this['root_dir'].'/data/code_battles.sqlite';
  }

  private function configureProviders()
  {
    // URL generation
    //$this->register(new UrlGeneratorServiceProvider());

    // Twig
    $this->register(new TwigServiceProvider(), array(
      'twig.path' => $this['root_dir'].'/views',
    ));

  }

}