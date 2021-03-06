<?php
return array(
    'navigation' => array(
        'default' => array(
            array(
                'id' => 'identity/identity',
                'label' => $this->translate('Identities'),
                'route' => 'identity/identity',
                'action' => 'index',
            ),
            array(
                'id' => 'contact/contact',
                'label' => $this->translate('Contacts'),
                'route' => 'contact/contact',
                'action' => 'index',
            ),
            array(
                'label' => $this->translate('Manual'),
                'route' => 'showcase-app/default',
                'controller' => 'index',
                'action' => 'manual',
                'order' => 100,
            ),
        )
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'KapShowcaseApp\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'showcase-app' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/showcase-app',
                    'defaults' => array(
                        '__NAMESPACE__' => 'KapShowcaseApp\Controller',
                        'controller'    => 'Index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'KapShowcaseApp\Controller\Index' => 'KapShowcaseApp\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            //'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            //'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            //'error/404'               => __DIR__ . '/../view/error/404.phtml',
            //'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy', // register JSON renderer strategy
            //'ViewFeedStrategy', // register Feed renderer strategy
        ),
    ),
);
