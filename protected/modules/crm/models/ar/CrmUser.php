<?php

/**
 * This is the model class for table "crm_users".
 *
 * The followings are the available columns in table 'crm_users':
 * @property integer $id
 * @property integer $role_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $mobile_phone
 * @property string $work_phone
 * @property string $note
 * @property string $photo
 * @property integer $created_user_id
 * @property string $created_user_name
 * @property string $created_datetime
 * @property string $created_ip
 * @property integer $last_modified_user_id
 * @property string $last_modified_user_name
 * @property string $last_modified_datetime
 * @property string $last_modified_ip
 *
 * The followings are the available model relations:
 * @property CrmCompanies[] $crmCompanies
 * @property CrmCompanies[] $crmCompanies1
 * @property CrmContacts[] $crmContacts
 * @property CrmContacts[] $crmContacts1
 * @property CrmDealingStatusLogs[] $crmDealingStatusLogs
 * @property CrmDealings[] $crmDealings
 * @property CrmDealings[] $crmDealings1
 * @property CrmDealings[] $crmDealings2
 * @property CrmLogs[] $crmLogs
 * @property CrmLogs[] $crmLogs1
 * @property CrmTaskStatusLogs[] $crmTaskStatusLogs
 * @property CrmTasks[] $crmTasks
 * @property CrmTasks[] $crmTasks1
 * @property CrmUser $createdUser
 * @property CrmUser[] $crmUsers
 * @property CrmUser $lastModifiedUser
 * @property CrmUser[] $crmUsers1
 * @property CrmUserRoles $role
 */
class CrmUser extends CActiveRecord
{
	private $_confirmPassword;

	public function getConfirmPassword()
	{
		return $this->_confirmPassword;
	}

	public function setConfirmPassword($confirmPassword)
	{
		$this->_confirmPassword = $confirmPassword;
	}

	protected function beforeSave()
    {
        if (parent::beforeSave()) {

        	if ($this->isNewRecord) {
        		$this->password = $this->hashPassword($this->password);
        	}

            return true;
        } else {
            return false;
        }
    }

	public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password, $this->password);
    }

    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'crm_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, password, created_user_id, created_user_name, created_datetime, last_modified_user_id, last_modified_user_name, last_modified_datetime', 'required'),
			array('role_id, created_user_id, last_modified_user_id', 'numerical', 'integerOnly' => true),
			array('name, created_user_name, created_ip, last_modified_user_name, last_modified_ip', 'length', 'max' => 500),
			array('email, password', 'length', 'max' => 300),
			array('confirmPassword', 'length', 'max' => 300),
			// array('confirmPassword', 'comparePasswords'),
			array('mobile_phone, work_phone', 'length', 'max' => 50),
			array('photo', 'length', 'max' => 200),
			array('note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, role_id, name, email, password, mobile_phone, work_phone, note, photo, created_user_id, created_user_name, created_datetime, created_ip, last_modified_user_id, last_modified_user_name, last_modified_datetime, last_modified_ip', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'crmLastModifiedCompanies' => array(self::HAS_MANY, 'CrmCompany', 'last_modified_user_id'),
			'crmCreatedCompanies' => array(self::HAS_MANY, 'CrmCompany', 'created_user_id'),
			'crmLastModifiedContacts' => array(self::HAS_MANY, 'CrmContact', 'last_modified_user_id'),
			'crmCreatedContacts' => array(self::HAS_MANY, 'CrmContact', 'created_user_id'),
			'crmDealingStatusLogs' => array(self::HAS_MANY, 'CrmDealingStatusLogs', 'user_id'),
			'crmLastModifiedDealings' => array(self::HAS_MANY, 'CrmDealing', 'last_modified_user_id'),
			'crmResponsibleDealings' => array(self::HAS_MANY, 'CrmDealing', 'responsible_user_id'),
			'crmCreatedDealings' => array(self::HAS_MANY, 'CrmDealing', 'created_user_id'),
			'crmRestoredLogs' => array(self::HAS_MANY, 'CrmLog', 'restore_user_id'),
			'crmCreatedLogs' => array(self::HAS_MANY, 'CrmLog', 'user_id'),
			'crmTaskStatusLogs' => array(self::HAS_MANY, 'CrmTaskStatusLogs', 'user_id'),
			'crmLastModifiedTasks' => array(self::HAS_MANY, 'CrmTask', 'last_modified_user_id'),
			'crmCreatedTasks' => array(self::HAS_MANY, 'CrmTask', 'created_user_id'),
			'lastModifiedUser' => array(self::BELONGS_TO, 'CrmUser', 'last_modified_user_id'),
			'crmLastModifiedUsers' => array(self::HAS_MANY, 'CrmUser', 'last_modified_user_id'),
			'createdUser' => array(self::BELONGS_TO, 'CrmUser', 'created_user_id'),
			'crmCreatedUsers' => array(self::HAS_MANY, 'CrmUser', 'created_user_id'),
			'role' => array(self::BELONGS_TO, 'CrmUserRole', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'role_id' => 'Role',
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'mobile_phone' => 'Mobile Phone',
			'work_phone' => 'Work Phone',
			'note' => 'Note',
			'photo' => 'Photo',
			'created_user_id' => 'Created User',
			'created_user_name' => 'Created User Name',
			'created_datetime' => 'Created Datetime',
			'created_ip' => 'Created Ip',
			'last_modified_user_id' => 'Last Modified User',
			'last_modified_user_name' => 'Last Modified User Name',
			'last_modified_datetime' => 'Last Modified Datetime',
			'last_modified_ip' => 'Last Modified Ip',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('role_id', $this->role_id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('mobile_phone', $this->mobile_phone, true);
		$criteria->compare('work_phone', $this->work_phone, true);
		$criteria->compare('note', $this->note, true);
		$criteria->compare('photo', $this->photo, true);
		$criteria->compare('created_user_id', $this->created_user_id);
		$criteria->compare('created_user_name', $this->created_user_name, true);
		$criteria->compare('created_datetime', $this->created_datetime, true);
		$criteria->compare('created_ip', $this->created_ip, true);
		$criteria->compare('last_modified_user_id', $this->last_modified_user_id);
		$criteria->compare('last_modified_user_name', $this->last_modified_user_name, true);
		$criteria->compare('last_modified_datetime', $this->last_modified_datetime, true);
		$criteria->compare('last_modified_ip', $this->last_modified_ip, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CrmUser the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
