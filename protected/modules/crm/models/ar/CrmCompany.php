<?php

/**
 * This is the model class for table "crm_companies".
 *
 * The followings are the available columns in table 'crm_companies':
 * @property integer $id
 * @property string $title
 * @property string $web
 * @property string $address
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
 * @property CrmUsers $lastModifiedUser
 * @property CrmUsers $createdUser
 * @property CrmCompanyEmailRelations[] $crmCompanyEmailRelations
 * @property CrmCompanyPhoneRelations[] $crmCompanyPhoneRelations
 */
class CrmCompany extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'crm_companies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, created_user_id, created_user_name, created_datetime, last_modified_user_id, last_modified_user_name, last_modified_datetime', 'required'),
			array('created_user_id, last_modified_user_id', 'numerical', 'integerOnly'=>true),
			array('title, created_user_name, created_ip, last_modified_user_name, last_modified_ip', 'length', 'max'=>500),
			array('web', 'length', 'max'=>200),
			array('address', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, web, address, created_user_id, created_user_name, created_datetime, created_ip, last_modified_user_id, last_modified_user_name, last_modified_datetime, last_modified_ip', 'safe', 'on'=>'search'),
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
			'lastModifiedUser' => array(self::BELONGS_TO, 'CrmUser', 'last_modified_user_id'),
			'createdUser' => array(self::BELONGS_TO, 'CrmUser', 'created_user_id'),
			'crmCompanyEmailRelations' => array(self::HAS_MANY, 'CrmCompanyEmailRelation', 'company_id'),
			'crmCompanyPhoneRelations' => array(self::HAS_MANY, 'CrmCompanyPhoneRelation', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'web' => 'Web',
			'address' => 'Address',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('address',$this->address,true);
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
	 * @return CrmCompany the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
