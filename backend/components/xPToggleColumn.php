<?php
namespace backend\components;

use yii\grid\DataColumn;
use yii\helpers\Html;
use yii\helpers\Url;

class xPToggleColumn extends DataColumn
{
    /**
     * @var array|string the update action route
     */
    public $updateAction = ['/site/column-update'];
    /**
     * @var array of values to rendering
     * Data format:
     *  [
     *      'value_one' => 'The first label',
     *      'value_two' => 'The second label',
     *  ]
     */
    public $buttons = [
        0 => 'Off',
        1 => 'On',
    ];
    /**
     * @inheritdoc
     */
    public function init()
    {
//        Asset::register($this->grid->view);
        $this->grid->view->registerJs("ToggleColumn.init();");
    }
    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        $items = '';
        foreach ($this->buttons as $value => $label) {
            $items .= Html::label(
                Html::radio(null, $model->{$this->attribute} == $value, ['value' => $value]) . $label,
                $model->{$this->attribute} == $value,
                [
                    'class' => 'btn ' . ($model->{$this->attribute} == $value ? 'btn-primary' : 'btn-default'),
                ]
            );
        }
        return Html::tag(
            'div',
            $items,
            [
                'data-action' => 'toggle-column',
                'data-attribute' => $this->attribute,
                'data-id' => $model->id,
                'data-model' => get_class($model),
                'data-url' => Url::to($this->updateAction),
                'data-toggle' => 'buttons',
                'class' => 'btn-group-xs btn-group',
            ]
        );
    }
}