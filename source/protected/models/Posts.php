<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property string $post_unique_id
 * @property string $post_id
 * @property string $last_version_id
 * @property string $title
 * @property string $body
 * @property string $author
 * @property string $tags
 * @property string $vote_up_count
 * @property string $vote_down_count
 * @property string $view_count
 * @property string $created_date
 * @property integer $is_best_answer
 * @property integer $is_a_question
 * @property integer $is_answered
 * @property integer $is_a_comment
 * @property integer $bounty
 * @property string $parent_unique_id
 */
class Posts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Posts the static model class
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
		return 'posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_unique_id, last_version_id, title, body, author, tags, parent_unique_id', 'required'),
			array('is_best_answer, is_a_question, is_answered, is_a_comment, bounty', 'numerical', 'integerOnly'=>true),
			array('post_unique_id, last_version_id, author, vote_up_count, vote_down_count, view_count, parent_unique_id', 'length', 'max'=>20),
			array('title', 'length', 'max'=>255),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('post_unique_id, post_id, last_version_id, title, body, author, tags, vote_up_count, vote_down_count, view_count, created_date, is_best_answer, is_a_question, is_answered, is_a_comment, bounty, parent_unique_id', 'safe', 'on'=>'search'),
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
			'post_unique_id' => 'Post Unique',
			'post_id' => 'Post',
			'last_version_id' => 'Last Version',
			'title' => 'Title',
			'body' => 'Body',
			'author' => 'Author',
			'tags' => 'Tags',
			'vote_up_count' => 'Vote Up Count',
			'vote_down_count' => 'Vote Down Count',
			'view_count' => 'View Count',
			'created_date' => 'Created Date',
			'is_best_answer' => 'Is Best Answer',
			'is_a_question' => 'Is A Question',
			'is_answered' => 'Is Answered',
			'is_a_comment' => 'Is A Comment',
			'bounty' => 'Bounty',
			'parent_unique_id' => 'Parent Unique',
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

		$criteria->compare('post_unique_id',$this->post_unique_id,true);
		$criteria->compare('post_id',$this->post_id,true);
		$criteria->compare('last_version_id',$this->last_version_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('vote_up_count',$this->vote_up_count,true);
		$criteria->compare('vote_down_count',$this->vote_down_count,true);
		$criteria->compare('view_count',$this->view_count,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('is_best_answer',$this->is_best_answer);
		$criteria->compare('is_a_question',$this->is_a_question);
		$criteria->compare('is_answered',$this->is_answered);
		$criteria->compare('is_a_comment',$this->is_a_comment);
		$criteria->compare('bounty',$this->bounty);
		$criteria->compare('parent_unique_id',$this->parent_unique_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}