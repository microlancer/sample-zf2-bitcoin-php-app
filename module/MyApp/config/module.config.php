<?php

return array(
    'router' => array(
        'routes' => array(
            'main-paths' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'may_terminate' => true,
                'options' => array(
                    'route' => '/:controller',
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
            )
        ),
        'JsonSchema\Validator' => array(
            'shared' => false,
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
            'apps/index/index' => __DIR__ . '/../view/apps/index/index.phtml',
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'main/index/index' => __DIR__ . '/../view/main/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
            'docs/index/index' => __DIR__ . '/../view/docs/index/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
