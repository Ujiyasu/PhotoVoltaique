<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Facebook\Controller\Facebook' => 'Facebook\Controller\FacebookController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'facebook' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/facebook[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z0-9_-]*',
                        'id'     => '[a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Facebook\Controller\Facebook',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'facebook' => __DIR__ . '/../view',
        ),
    ),
);
?>
