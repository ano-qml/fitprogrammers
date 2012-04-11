<?php

/**
 * This is the model class for table "members".
 *
 * The followings are the available columns in table 'members':
 * @property string $member_id
 * @property string $email
 * @property string $password
 * @property string $avatar
 * @property string $website
 * @property string $location
 * @property string $real_name
 * @property integer $age
 * @property string $profile_views
 * @property string $reputation
 * @property string $about_me
 * @property string $join_date
 * @property string $last_login_date
 * @property string $last_login_ip
 * @property string $fitportal_id
 */
class Members extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Members the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'members';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, avatar, real_name', 'required'),
			array('age', 'numerical', 'integerOnly'=>true),
			array('email, website, location, real_name, fitportal_id', 'length', 'max'=>255),
			array('password, last_login_ip', 'length', 'max'=>32),
			array('avatar, profile_views, reputation', 'length', 'max'=>20),
			array('about_me, join_date, last_login_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('member_id, email, password, avatar, website, location, real_name, age, profile_views, reputation, about_me, join_date, last_login_date, last_login_ip, fitportal_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'member_id' => 'Member',
			'email' => 'Email',
			'password' => 'Password',
			'avatar' => 'Avatar',
			'website' => 'Website',
			'location' => 'Location',
			'real_name' => 'Real Name',
			'age' => 'Age',
			'profile_views' => 'Profile Views',
			'reputation' => 'Reputation',
			'about_me' => 'About Me',
			'join_date' => 'Join Date',
			'last_login_date' => 'Last Login Date',
			'last_login_ip' => 'Last Login Ip',
			'fitportal_id' => 'Fitportal',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('member_id',$this->member_id,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('real_name',$this->real_name,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('profile_views',$this->profile_views,true);
		$criteria->compare('reputation',$this->reputation,true);
		$criteria->compare('about_me',$this->about_me,true);
		$criteria->compare('join_date',$this->join_date,true);
		$criteria->compare('last_login_date',$this->last_login_date,true);
		$criteria->compare('last_login_ip',$this->last_login_ip,true);
		$criteria->compare('fitportal_id',$this->fitportal_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}