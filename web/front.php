<?php

// framework/web/front.php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\Reference;

$sc = include __DIR__.'/../src/container.php';

$request = Request::createFromGlobals();

$sc->register('listener.string_response', 'Simplex\StringResponseListener');
$sc->getDefinition('dispatcher')
    ->addMethodCall('addSubscriber', array(new Reference('listener.string_response')))
;

$sc->setParameter('charset', 'UTF-8');
$sc->setParameter('routes', include __DIR__.'/../src/app.php');

$response = $sc->get('framework')->handle($request);

$response->send();
