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
class Banner extends \yii\db\ActiveRecord
{

    public $thumbnail;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }


    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::class,
                'attribute' => 'thumbnail',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['banner_order', 'status'], 'integer'],
            [['title'],'string', 'max' => 255],
            [['path', 'base_url'], 'string', 'max' => 1024],
            [['thumbnail'],'safe'],
            [['title'],'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Tiêu đề',
            'content' => 'Nội Dung',
            'button' => 'Nút hiển thị',
            'banner_order' => 'Thứ tự',
            'status' => 'Trạng thái',
            'path' => 'Path',
            'base_url' => 'Base Url',
        ];
    }

    /**
     * Gets query for [[Contructor]].
     *
     * @return \yii\db\ActiveQuery
     */

    public static function getBanner($id_contructor = NULL)
    {
        $banner = self::find()
            ->where([
                'status' => 1,
            ])
            ->orderBy([
                'banner_order' => SORT_ASC,
            ])
            ->all();
        return $banner;
    }
    
    public function getImageBanner($id_contructor = NULL)
    {
        if($id_contructor){
            $contructor = UserProfile::findOne($id_contructor);
            return $contructor->getBanner();
        } else {
        $img_path = Yii::$app->glide->createSignedUrl([
            'glide/index',
            'path' => $this->path,
        ], true);

        if ($img_path)
            return $img_path;
        }
    }
    public static function readFileToArray($nameFile){
        $dump_dir = $_SERVER['DOCUMENT_ROOT'] . '/data_dump/';
        $data = file_get_contents($dump_dir.$nameFile);
        $array = json_decode($data,true);
        return $array;
    }
}
