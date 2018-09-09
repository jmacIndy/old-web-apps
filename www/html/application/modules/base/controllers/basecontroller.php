<?php

namespace sevenkevins;

class baseController
{
	protected $breadcrumbs, $view, $content=null;

	public function __construct()
	{
		$this->view = new \sevenkevins\view;

		/*** create the bread crumbs ***/
		$bc = new \sevenkevins\breadcrumbs;
		// $bc->setPointer('->');
		$bc->crumbs();
		$this->view->breadcrumbs = $bc->breadcrumbs;

		// a new menu instance
		$menu = new \sevenkevins\menuReader( __APP_PATH . '/modules' );
		$this->view->menu = $menu;
	}

	public function __destruct()
	{
		if( !is_null( $this->content ) )
		{
			$this->view->content = $this->content;
			$result = $this->view->fetch( __APP_PATH.'/layouts/index.phtml' );
			$fc = FrontController::getInstance();
			$fc->setBody($result);
		}
	}
}
