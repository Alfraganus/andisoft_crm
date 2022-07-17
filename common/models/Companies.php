<?php

namespace common\models;

use Yii;
use yii\debug\models\search\Profile;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $created_on
 * @property int|null $current_tariff_id
 * @property int|null $user_id
 * @property string $owner_fullname
 * @property string $owner_contact_phone
 *
 * @property Profile[] $profiles
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_on','current_tariff_id','user_id'], 'integer'],
            [['owner_fullname', 'owner_contact_phone'], 'required'],
            [['name', 'owner_fullname', 'owner_contact_phone'], 'string', 'max' => 255],
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
            'created_on' => 'Created On',
            'owner_fullname' => 'Owner Fullname',
            'owner_contact_phone' => 'Owner Contact Phone',
        ];
    }


    public static function getCompanies() : array
    {
        return self::find()->asArray()->all();
    }


    /**
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['company_id' => 'id']);
    }
}
