<?php

namespace MyCompany\Controller;

use ZendServerGateway\Controller\AbstractActionController;
use MyCompany\Model\CustomerRepository;
use MyCompany\Model\HSCIQRepository;
use MyCompany\Model\ChinaPortsRepository;

class RpcController extends AbstractActionController {
	public function getHelloAction($name, $surname) {
		return array (
				'message' => "Hello $name $surname!" 
		);
	}
	public function getCustomersAction() {
		$cr = new CustomerRepository ();
		return $cr->getAll ();
	}
	public function getHsCiqAction($hs_code) {
		$cr = new HSCIQRepository ();
		return $cr->getByHscode ( $hs_code );
	}
	public function getHsCiqAllAction() {
		$cr = new HSCIQRepository ();
		return $cr->getAll ();
	}
	public function getChinaPortsAction() {
		$cr = new ChinaPortsRepository ();
		return $cr->getAll ();
	}
}
