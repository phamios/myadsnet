<?php

/**
 * This is the model class for table "tbl_category".
 *
 * The followings are the available columns in table 'tbl_category':
 * @property string $id
 * @property string $cate_name
 * @property string $cate_root
 * @property string $cate_status
 */
class Category extends CActiveRecord
{
	public $cate_parent_name;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cate_name', 'required'),
			array('cate_name, cate_status', 'length', 'max'=>45),
			array('cate_root', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cate_name, cate_root, cate_status, cate_parent_name', 'safe', 'on'=>'search'),
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
			'parent_category'=>array(self::BELONGS_TO, 'Category', 'cate_root'),
			'child_categories'=>array(self::HAS_MANY, 'Category', 'cate_root'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cate_name' => 'Cate Name',
			'cate_root' => 'Cate Root',
			'cate_status' => 'Cate Status',
			'cate_parent_name' => 'Parent Cate'
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

		$criteria->compare('t.id',$this->id,true);
		$criteria->compare('t.cate_name',$this->cate_name,true);
		$criteria->compare('t.cate_root',$this->cate_root,true);
		$criteria->compare('t.cate_status',$this->cate_status,true);
		$criteria->compare('parent_category.cate_name',$this->cate_parent_name,true);

		$criteria->with = array('parent_category');
		$criteria->together = true;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'t.cate_status ASC, t.cate_root ASC',
                'attributes'=>array(
                    'cate_parent_name'=>array(
                        'asc'=>'parent_category.cate_name',
                        'desc'=>'parent_category.cate_name DESC',
                    ),
                    '*',
                ),
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getParent()
	{
		return (empty($this->parent_category)) ? 'Null' : $this->parent_category->cate_name;
	}
}
