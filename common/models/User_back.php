<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $nike
 * @property string $avatar
 * @property string $email
 * @property integer $level
 * @property integer $points
 * @property string $description
 * @property integer $gender
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $status
 * @property string $registered
 * @property integer $created_at
 * @property integer $updated_at
 */
class User_back extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nike', 'email'], 'required'],
            [['level', 'points', 'gender', 'status'], 'integer'],
            [['registered'], 'safe'],
            [['nike'], 'string', 'max' => 12],
            [['avatar', 'email'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 160],
            [['auth_key'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nike' => Yii::t('app', 'Nike'),
            'avatar' => Yii::t('app', 'Avatar'),
            'email' => Yii::t('app', 'Email'),
            'level' => Yii::t('app', 'Level'),
            'points' => Yii::t('app', 'Points'),
            'description' => Yii::t('app', 'Description'),
            'gender' => Yii::t('app', 'Gender'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'status' => Yii::t('app', 'Status'),
            'registered' => Yii::t('app', 'Registered'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
