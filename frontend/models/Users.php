<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $id
 * @property string $name
 * @property string $position
 * @property string $sts_position
 * @property int $status
 * @property string $avatar
 * @property string $username
 * @property string $password
 * @property string $date
 * @property int $recievedDocId
 * @property int $sendDocId
 *
 * @property Comments[] $comments
 * @property Documents[] $documents
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'position', 'sts_position', 'status', 'avatar', 'username', 'password', 'recievedDocId', 'sendDocId'], 'required'],
            [['status', 'recievedDocId', 'sendDocId'], 'integer'],
            [['date'], 'safe'],
            [['id', 'name', 'position', 'sts_position', 'username'], 'string', 'max' => 255],
            [['avatar'], 'string', 'max' => 1000],
            [['password'], 'string', 'max' => 250],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'position' => 'Position',
            'sts_position' => 'Sts Position',
            'status' => 'Status',
            'avatar' => 'Avatar',
            'username' => 'Username',
            'password' => 'Password',
            'date' => 'Date',
            'recievedDocId' => 'Recieved Doc ID',
            'sendDocId' => 'Send Doc ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['id_users' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Documents::className(), ['id_users' => 'id']);
    }
}
