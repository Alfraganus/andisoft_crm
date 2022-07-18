<?php

namespace common\models;

use Yii;
use yii\debug\models\search\Profile;

/**
 * This is the model class for table "applications".
 *
 * @property int $id
 * @property string $name
 *
 * @property Profile[] $profiles
 */
class Applications extends \yii\db\ActiveRecord
{

    CONST APP_PLAYSTATION = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
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
        ];
    }

    /**
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery
     */

    public static function getApplications() : array
    {
        return self::find()->asArray()->all();
    }



    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['application_id' => 'id']);
    }
}
