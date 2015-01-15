<?php

class CrmUserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        $email = strtolower($this->email);
        $user = CrmUser::model()->find('LOWER(email)=?',array($email));

        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (!$user->validatePassword($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $user->id;

            $this->username = $user->username;

            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}
