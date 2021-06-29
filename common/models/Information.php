<?php

namespace common\models;

use common\models\query\ArticleQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property string|null $button
 * @property int|null $banner_order
 * @property int $status
 * @property string|null $path
 * @property string|null $base_url
 * @property int $use_contructor
 * @property int|null $contructor_id
 *
 * @property UserProfile $contructor
 */
class Information extends \yii\db\ActiveRecord
{

    public $thumbnail;
    private $model;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Information';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email','phone_number'], 'string'],
            ['email', 'unique', 'targetClass' => Information::class, 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id' => $this->getModel()->id]]);
                }
            },'message' => 'Đã tồn tại {value}'],
            [['email'],'match','pattern' => '/^[a-zA-Z0-9-][a-zA-Z0-9_\.-]{1,32}@[a-z0-9-]{2,}(\.[a-zA-Z0-9]{2,3}){1,2}$/','message' => 'Email không đúng định dạng'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'phone_number' => 'Số điện thoại',
        ];
    }
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new Information;
        }
        return $this->model;
    }

    /**
     * Gets query for [[Contructor]].
     *
     * @return \yii\db\ActiveQuery
     */

}
