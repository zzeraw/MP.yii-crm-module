<?php
class CrmWebUser extends CWebUser
{
    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
    public function checkAccess($operation, $params = array())
    {
        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }

        $record = CrmUser::model()->findByPK($this->id);

        if (!isset($record->role_id)) {
            return false;
        }

        if ($record->role == CrmUserRole::model()->findIdByAlias('banned')) {
            return false;
        }

        // switch ($record->role) {
        //     case CrmUserRole::model()->findIdByAlias('admin'):
        //         $view = 'admin';
        //         break;
        //     case CrmUserRole::model()->findIdByAlias('manager'):
        //         $view = 'manager';
        //         break;
        //     default:
        //         return false;
        //         break;
        // }
        // $this->setState('view', $view);

        // allow access if the operation request is the current user's role
        return ($operation === (int) $record->role);
    }
}
?>
