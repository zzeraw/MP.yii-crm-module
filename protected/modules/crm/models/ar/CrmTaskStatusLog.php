<?php

/**
 * This is the model class for table "crm_task_status_logs".
 *
 * The followings are the available columns in table 'crm_task_status_logs':
 * @property integer $id
 * @property integer $task_id
 * @property integer $status_id
 * @property integer $user_id
 * @property string $user_name
 * @property string $datetime
 * @property string $ip
 *
 * The followings are the available model relations:
 * @property CrmUsers $user
 * @property CrmTasks $task
 * @property CrmTaskStatuses $status
 */
class CrmTaskStatusLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'crm_task_status_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status_id, user_id, user_name, datetime', 'required'),
			array('task_id, status_id, user_id', 'numerical', 'integerOnly'=>true),
			array('user_name, ip', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, task_id, status_id, user_id, user_name, datetime, ip', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'CrmUser', 'user_id'),
			'task' => array(self::BELONGS_TO, 'CrmTask', 'task_id'),
			'status' => array(self::BELONGS_TO, 'CrmTaskStatus', 'status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'task_id' => 'Task',
			'status_id' => 'Status',
			'user_id' => 'User',
			'user_name' => 'User Name',
			'datetime' => 'Datetime',
			'ip' => 'Ip',
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
		$criteria->compare('task_id',$this->task_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('datetime',$this->datetime,true);
		$criteria->compare('ip',$this->ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CrmTaskStatusLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
