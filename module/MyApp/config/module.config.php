<?php

return array(
    'router' => array(
        'routes' => array(
            'main-paths' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'may_terminate' => true,
                'options' => array(
                    'route' => '/:controller[/:action]',
                    'constraints' => array(
                        'controller' => 'index',
                        'action' => 'index',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'MyApp\Controller',
                        'controller' => 'index',
                        'action' => 'index',
                    ),
                ),
            ),
            'root' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'may_terminate' => true,
                'options' => array(
                    'route' => '',
                    'defaults' => array(
                        '__NAMESPACE__' => 'MyApp\Controller',
                        'controller' => 'MyApp\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'errors' => array(
        'format' => 'json-format',
        'show_exceptions' => array(
            'message' => true,
            'trace'   => true
        ),
    ),
    'di' => array(
        'instance' => array(
            'alias' => array(
                'json-format'  => 'MyApp\Format\Json',
                'image-format' => 'MyApp\Format\Image',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'MyApp\Controller\Index' => 'MyApp\Controller\IndexController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'myapp/index/index' => __DIR__ . '/../view/myapp/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
