<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Users for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {
	public function indexAction() {
		$view = new ViewModel ();
		return $view;
	}
	public function registerAction() {
		$view = new ViewModel ();
		$view->setTemplate ( 'users/index/new-user' );
		return $view;
	}
	public function loginAction() {
		$view = new ViewModel ();
		$view->setTemplate ( 'users/index/login' );
		return $view;
	}
	public function fooAction() {
		// This shows the :controller and :action parameters in default route
		// are working when you browse to /users/users/foo
		return array ();
	}
}
