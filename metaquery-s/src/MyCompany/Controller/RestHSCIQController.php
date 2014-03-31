<?php

namespace MyCompany\Controller;

use ZendServerGateway\Controller\AbstractRestfulController;
use MyCompany\Model\HSCIQRepository;

class RestHSCIQController extends AbstractRestfulController {
	
	/**
	 *
	 * @see \Zend\Mvc\Controller\AbstractRestfulController::getList()
	 */
	public function getList() {
		$cr = new HSCIQRepository ();
		return $cr->getAll ();
	}
	
	/**
	 *
	 * @see \Zend\Mvc\Controller\AbstractRestfulController::get()
	 */
	public function get($id) {
		$cr = new HSCIQRepository ();
		$hsciq = $cr->get ( $id );
		if ($hsciq === false) {
			$this->getResponse ()->setStatusCode ( 404 );
			return;
		}
		return $hsciq;
	}
	
	/**
	 *
	 * @see \Zend\Mvc\Controller\AbstractRestfulController::create()
	 */
	public function create($data) {
		$data = ( array ) $data;
		$cr = new HSCIQRepository ();
		$hs_code = $data ['$hs_code'];
		$hs_name = $data ['$hs_name'];
		$ciq_code = $data ['$$ciq_code'];
		$ciq_name = $data ['$$ciq_name'];
		$id = $cr->add ( $hs_code, $hs_name, $ciq_code, $ciq_name );
		if ($id > - 1) {
			$this->getResponse ()->setStatusCode ( 201 );
			return $cr->get ( $id );
		} else {
			$this->getResponse ()->setStatusCode ( 422 );
			$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-type', 'application/error+json' );
		}
	}
	
	/**
	 *
	 * @see \Zend\Mvc\Controller\AbstractRestfulController::update()
	 */
	public function update($id, $data) {
		$data = ( array ) $data;
		$cr = new HSCIQRepository ();
		$hs_code = $data ['$hs_code'];
		$hs_name = $data ['$hs_name'];
		$ciq_code = $data ['$$ciq_code'];
		$ciq_name = $data ['$$ciq_name'];
		if ($cr->update ( $id, $hs_code, $hs_name, $ciq_code, $ciq_name )) {
			return $cr->get ( $id );
		} else {
			$this->getResponse ()->setStatusCode ( 422 );
			$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-type', 'application/error+json' );
		}
	}
	
	/**
	 *
	 * @see \Zend\Mvc\Controller\AbstractRestfulController::delete()
	 */
	public function delete($id) {
		$cr = new HSCIQRepository ();
		if ($cr->delete ( $id )) {
			$this->getResponse ()->setStatusCode ( 204 );
		} else {
			$this->getResponse ()->setStatusCode ( 422 );
			$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-type', 'application/error+json' );
		}
	}
}
