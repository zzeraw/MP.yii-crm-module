<?php

/**
 * This is the model class for table "crm_tasks".
 *
 * The followings are the available columns in table 'crm_tasks':
 * @property integer $id
 * @property integer $status_id
 * @property integer $type_id
 * @property string $custom_type_name
 * @property string $date
 * @property integer $time
 * @property integer $contact_id
 * @property integer $dealing_id
 * @property string $text
 * @property string $result
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
 * @property CrmTaskStatusLogs[] $crmTaskStatusLogs
 * @property CrmUsers $lastModifiedUser
 * @property CrmTaskStatuses $status
 * @property CrmTaskTypes $type
 * @property CrmContacts $contact
 * @property CrmDealings $dealing
 * @property CrmUsers $createdUser
 */
class CrmTask extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'crm_tasks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status_id, result, created_user_id, created_user_name, created_datetime, last_modified_user_id, last_modified_user_name, last_modified_datetime', 'required'),
			array('status_id, type_id, time, contact_id, dealing_id, created_user_id, last_modified_user_id', 'numerical', 'integerOnly'=>true),
			array('custom_type_name', 'length', 'max'=>200),
			array('created_user_name, created_ip, last_modified_user_name, last_modified_ip', 'length', 'max'=>500),
			array('date, text', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, status_id, type_id, custom_type_name, date, time, contact_id, dealing_id, text, result, created_user_id, created_user_name, created_datetime, created_ip, last_modified_user_id, last_modified_user_name, last_modified_datetime, last_modified_ip', 'safe', 'on'=>'search'),
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
			'crmTaskStatusLogs' => array(self::HAS_MANY, 'CrmTaskStatusLog', 'task_id'),
			'lastModifiedUser' => array(self::BELONGS_TO, 'CrmUser', 'last_modified_user_id'),
			'status' => array(self::BELONGS_TO, 'CrmTaskStatus', 'status_id'),
			'type' => array(self::BELONGS_TO, 'CrmTaskType', 'type_id'),
			'contact' => array(self::BELONGS_TO, 'CrmContact', 'contact_id'),
			'dealing' => array(self::BELONGS_TO, 'CrmDealing', 'dealing_id'),
			'createdUser' => array(self::BELONGS_TO, 'CrmUser', 'created_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status_id' => 'Status',
			'type_id' => 'Type',
			'custom_type_name' => 'Custom Type Name',
			'date' => 'Date',
			'time' => 'Time',
			'contact_id' => 'Contact',
			'dealing_id' => 'Dealing',
			'text' => 'Text',
			'result' => 'Result',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('custom_type_name',$this->custom_type_name,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time);
		$criteria->compare('contact_id',$this->contact_id);
		$criteria->compare('dealing_id',$this->dealing_id);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('result',$this->result,true);
		$criteria->compare('created_user_id',$this->created_user_id);
		$criteria->compare('created_user_name',$this->created_user_name,true);
		$criteria->compare('created_datetime',$this->created_datetime,true);
		$criteria->compare('created_ip',$this->created_ip,true);
		$criteria->compare('last_modified_user_id',$this->last_modified_user_id);
		$criteria->compare('last_modified_user_name',$this->last_modified_user_name,true);
		$criteria->compare('last_modified_datetime',$this->last_modified_datetime,true);
		$criteria->compare('last_modified_ip',$this->last_modified_ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CrmTask the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
