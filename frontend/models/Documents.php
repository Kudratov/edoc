<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property int $id
 * @property string $number_doc
 * @property string $date_doc
 * @property string $subject
 * @property string $resolution
 * @property string $id_users
 *
 * @property Comments[] $comments
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number_doc', 'subject', 'resolution', 'id_users'], 'required'],
            [['date_doc'], 'safe'],
            [['subject', 'resolution'], 'string'],
            [['number_doc', 'id_users'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number_doc' => 'Number Doc',
            'date_doc' => 'Date Doc',
            'subject' => 'Subject',
            'resolution' => 'Resolution',
            'id_users' => 'Id Users',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['id_number_doc' => 'id']);
    }
}
