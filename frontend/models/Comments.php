<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $id_number_doc
 * @property string $id_users
 * @property string $created_date
 * @property string $comment
 *
 * @property Users $users
 * @property Documents $numberDoc
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_number_doc', 'id_users', 'comment'], 'required'],
            [['id_number_doc'], 'integer'],
            [['created_date'], 'safe'],
            [['comment'], 'string'],
            [['id_users'], 'string', 'max' => 255],
            [['id_users'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_users' => 'id']],
            [['id_number_doc'], 'exist', 'skipOnError' => true, 'targetClass' => Documents::className(), 'targetAttribute' => ['id_number_doc' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_number_doc' => 'Id Number Doc',
            'id_users' => 'Id Users',
            'created_date' => 'Created Date',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_users']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNumberDoc()
    {
        return $this->hasOne(Documents::className(), ['id' => 'id_number_doc']);
    }
}
