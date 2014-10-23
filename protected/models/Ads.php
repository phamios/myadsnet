<?php

/**
 * This is the model class for table "tbl_ads".
 *
 * The followings are the available columns in table 'tbl_ads':
 * @property string $id
 * @property string $ad_name
 * @property string $ad_type
 * @property string $ad_link
 * @property string $ad_create_date
 * @property string $ad_status
 */
class Ads extends CActiveRecord
{
	public $ad_type_list = array(
		'1' => 'Type 1',
		'2' => 'Type 2',
		'3' => 'Type 3',
		'4' => 'Type 4',
		'5' => 'Type 5',
	);
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_ads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ad_name, ad_type, ad_link, ad_create_date', 'required'),
			array('ad_name, ad_status', 'length', 'max'=>45),
			array('ad_type', 'length', 'max'=>10),
			array('ad_link', 'url', 'defaultScheme' => 'http'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ad_name, ad_type, ad_link, ad_create_date, ad_status', 'safe', 'on'=>'search'),
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
			'ads_category'=>array(self::HAS_MANY, 'AdsCategory', 'id_ads'),
			'categories'=>array(self::HAS_MANY, 'Category', array('id_category'=>'id'), 'through'=>'ads_category', 'condition'=>'categories.cate_status="active"'),

			'ads_image'=>array(self::HAS_MANY, 'AdsImage', 'id_ads'),
			'images'=>array(self::HAS_MANY, 'Image', array('id_image'=>'id'), 'through'=>'ads_image'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ad_name' => 'Ad Name',
			'ad_type' => 'Ad Type',
			'ad_link' => 'Ad Link',
			'ad_create_date' => 'Ad Create Date',
			'ad_status' => 'Ad Status',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('ad_name',$this->ad_name,true);
		$criteria->compare('ad_type',$this->ad_type,true);
		$criteria->compare('ad_link',$this->ad_link,true);
		$criteria->compare('ad_create_date',$this->ad_create_date,true);
		$criteria->compare('ad_status',$this->ad_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ads the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getType()
	{
		return $this->ad_type_list[$this->ad_type];
	}
}
