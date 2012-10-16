<?php
// module/Index/config/module.config.php:
return array(
    'controllers' => array(
        'invokables' => array(
            'User\Controller\Index' => 'User\Controller\IndexController',
        ),
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'user' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/user[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
        
    'view_manager' => array(
        'template_path_stack' => array(
            'user' => __DIR__ . '/../view',            
        ),
        //Ici on place les templates des mises en pages et erreurs.
        'template_map' => array(
            'layout/welcome'=> __DIR__ . '/../view/layout/welcome.phtml',
        ),
    ),
);
