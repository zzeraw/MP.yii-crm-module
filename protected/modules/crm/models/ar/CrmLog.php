<?php

/**
 * This is the model class for table "crm_logs".
 *
 * The followings are the available columns in table 'crm_logs':
 * @property integer $id
 * @property integer $action_id
 * @property integer $user_id
 * @property string $user_name
 * @property string $datetime
 * @property string $ip
 * @property string $before_data
 * @property string $after_data
 * @property integer $restore_flag
 * @property integer $restore_user_id
 * @property integer $restore_user_name
 * @property string $restore_datetime
 * @property string $restore_ip
 *
 * The followings are the available model relations:
 * @property CrmUsers $restoreUser
 * @property CrmLogActions $action
 * @property CrmUsers $user
 */
class CrmLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'crm_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('action_id, user_id, user_name, datetime, before_data, after_data, restore_user_id, restore_datetime', 'required'),
			array('action_id, user_id, restore_flag, restore_user_id, restore_user_name', 'numerical', 'integerOnly'=>true),
			array('user_name, ip, restore_ip', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, action_id, user_id, user_name, datetime, ip, before_data, after_data, restore_flag, restore_user_id, restore_user_name, restore_datetime, restore_ip', 'safe', 'on'=>'search'),
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
			'restoreUser' => array(self::BELONGS_TO, 'CrmUser', 'restore_user_id'),
			'action' => array(self::BELONGS_TO, 'CrmLogAction', 'action_id'),
			'user' => array(self::BELONGS_TO, 'CrmUser', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'action_id' => 'Action',
			'user_id' => 'User',
			'user_name' => 'User Name',
			'datetime' => 'Datetime',
			'ip' => 'Ip',
			'before_data' => 'Before Data',
			'after_data' => 'After Data',
			'restore_flag' => 'Restore Flag',
			'restore_user_id' => 'Restore User',
			'restore_user_name' => 'Restore User Name',
			'restore_datetime' => 'Restore Datetime',
			'restore_ip' => 'Restore Ip',
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
		$criteria->compare('action_id',$this->action_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('datetime',$this->datetime,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('before_data',$this->before_data,true);
		$criteria->compare('after_data',$this->after_data,true);
		$criteria->compare('restore_flag',$this->restore_flag);
		$criteria->compare('restore_user_id',$this->restore_user_id);
		$criteria->compare('restore_user_name',$this->restore_user_name);
		$criteria->compare('restore_datetime',$this->restore_datetime,true);
		$criteria->compare('restore_ip',$this->restore_ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CrmLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
