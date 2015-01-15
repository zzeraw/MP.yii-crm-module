<?php

/**
 * This is the model class for table "crm_contact_phone_relations".
 *
 * The followings are the available columns in table 'crm_contact_phone_relations':
 * @property integer $type_id
 * @property integer $contact_id
 *
 * The followings are the available model relations:
 * @property CrmContacts $contact
 * @property CrmPhoneTypes $type
 */
class CrmContactPhoneRelation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'crm_contact_phone_relations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, contact_id', 'required'),
			array('type_id, contact_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('type_id, contact_id', 'safe', 'on'=>'search'),
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
			'contact' => array(self::BELONGS_TO, 'CrmContact', 'contact_id'),
			'type' => array(self::BELONGS_TO, 'CrmPhoneType', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'type_id' => 'Type',
			'contact_id' => 'Contact',
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

		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('contact_id',$this->contact_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CrmContactPhoneRelation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
