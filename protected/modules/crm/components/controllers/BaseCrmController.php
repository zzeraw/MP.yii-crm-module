<?php

class BaseCrmController extends CController
{
	public $layout = '/templates/default';
	public $menu = array();
	public $breadcrumbs = array();

    public function filters()
    {
        return array(
            // 'accessControl',
            // 'postOnly + delete',
        );
    }
}