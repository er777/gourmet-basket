<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
    Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
    //Router::connect('/products/*', array('controller' => 'products', 'action'=>'index'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
    Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
    
    // Products route.
    // Take the ID from the url as an argument and pass to the controller.
   
     Router::connect(
        '/product/:id',
        array(
            'controller' => 'products', 
            'action' => 'detail'
        ),
        array(
            'pass' => array('id')
        )
    );
    /*
     -DS This route is not a logical product/category relationship.
     
    Router::connect(
        '/categories',
        array('controller' => 'vendors', 'action' => '')
    );
    */
    Router::connect(
    '/add',
    array('controller' => 'cart', 'action' => 'add')
);
    
    /*
     -DS- Commented out when i got here.
     Router::connect(
        '/products/category/:username-:id',
        array(
            'controller' => 'products', 
            'action' => 'category'
        ),
        array(
            'pass' => array('id', 'username'),
            'id' => '[0-9]+',
            'username'
        )
    );*/
    
