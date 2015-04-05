<?php

/**
 * This file is part of the Core Framework package.
 *
 * (c) Shalom Sam <shalom.s@coreframework.in>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @var $routes array - Set routes here
 *
 * @format: '/path' || '/path/{args} => [
 *   'pageName' => 'home',
 *   'pageTitle' => 'Homepage',
 *   'controller' => 'Controllers:demoController:indexAction', // {namespace}:{controllerName}:{action}(optional)
 *   'argReq' => ['args' => '?argType' ]
 *   'argDefault' => '1',
 *   'method' => 'GET'
 *   ],
 *
 *
 * @var: path - defines the path to listen for. Ex: '/', '/testing/{id}'. In the last case {id} stands
 * for the argument to pass to controller as $payload(array) .i.e. 'testing/2' etc.
 * Incase of paths it is essential to remeber that '/testing/{id}' could match '/testing/somepath' especialy if the
 * required argument is a string type (\w). To avoid this '/testing/somepath' must be defined before '/testing/{id}'
 * [required]
 *
 * @var: pageName - defines name for page [required]
 *
 * @var: pageTitle - defines the page tile [required]
 *
 * @var: controller - defines {Namespace}:{typeController}:{typeAction}. typeAction(method) when not specified will
 * look for the second part of URL, if this doesn't exist or is an argument then it will default to indexAction
 * typeAction when defined in url must be without the word 'Action', the 'Action' part will be added automatically.
 * Ex : in URL 'www.hostname.com/somemethod/somepath' somemethodAction will be the typeAction
 * [required]
 *
 * @var: argReq - set the required type ie. string or digits [required if argument specified in path]
 *
 * @var: argDefault - default argument to pass, when none is given (optional)
 *
 * @var: method - method to accept for path. if not specified GET is assumed
 *
 * @required: pageName, pageTitle, controller, argReq(if arguments is present) . Rest are optional
 *
 */
return $routes = [


    '/' => [
        'pageName' => 'demo',
        'pageTitle' => 'Demo Home Page',
        'controller' => '\\web\\Controllers:siteController:indexAction',
        'metas' => [
            'keywords' => 'test, keywords, for test',
            'description' => 'This is a test description',
            'author' => 'Shalom Sam'
        ]
    ],
    '/about' => [
        'pageName' => 'demo',
        'pageTitle' => 'Demo about Page',
        'controller' => '\\web\\Controllers:siteController:aboutAction'
    ],
    '/user/register' => [
        'method' => 'POST',
        'controller' => '\\web\\Controllers:siteController:registerAction',
        'noCache' => true
    ],

    '/user/login' => [
        'method' => 'POST',
        'controller' => '\\web\\Controllers:siteController:loginAction',
        'noCache' => true
    ],

    '/user/logout' => [
        'method' => 'GET',
        'controller' => '\\web\\Controllers:siteController:logoutAction',
        'noCache' => true
    ],

    '/test/helloworld' => [
        'pageName' => 'test',
        'pageTitle' => 'Test',
        'method' => 'GET',
        'controller' => '\\Core\\Controllers:testController:helloWorldAction'
    ],
    '/test/hello/{name}' => [
        'pageName' => 'test',
        'pageTitle' => 'Test',
        'argReq' => ['name' => '[\w]'],
        'argDefault' => 'name',
        'method' => 'GET',
        'controller' => '\\Core\\Controllers:testController'
    ],
    '/testing/{id}' => [
        'pageName' => 'testing',
        'pageTitle' => 'Testing',
        'argReq' => ['id' => '[\d]'],
        'argDefault' => '1',
        'method' => 'GET',
        'controller' => '\\Core\\Controllers:testController'
    ],
    'testingmulti/{id}/someMethod/{slug}' => [
        'pageName' => 'test',
        'pageTitle' => 'Test',
        'argReq' => ['id' => '[\d]', 'slug' => '[\w]'],
        'argDefault' => ['id' => '1', 'slug' => 'awesome'],
        'method' => 'post',
        'controller' => '\\Core\\Controllers:testController:someMethod'
    ]
];