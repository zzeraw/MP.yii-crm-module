<?php

class CrmModule extends CWebModule
{
    public function init()
    {
        $this->_setImport();
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else {
            return false;
        }
    }

    protected function _setImport()
    {
        $this->setImport(array(
            $this->id . '.behaviors.*',
            $this->id . '.extensions.*',
            $this->id . '.helpers.*',
            $this->id . '.vendors.*',

            $this->id . '.models.*',
            $this->id . '.models.ar.*',
            $this->id . '.models.base.*',
            $this->id . '.models.forms.*',

            $this->id . '.components.*',
            $this->id . '.components.actions.*',
            $this->id . '.components.actions.base.*',
            $this->id . '.components.controllers.*',
            $this->id . '.components.custom.*',
            $this->id . '.components.widgets.*',
            $this->id . '.components.widgets.views.*',
        ));
    }

}