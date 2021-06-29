<?php
namespace backend\components;

use Yii;
use yii\grid\DataColumn;
use yii\helpers\Html;

class xPBooleanColumn extends DataColumn
{
    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->content === null) {
            return $this->grid->formatter->format($this->getDataCellValue($model, $key, $index), $this->format);
        }

        return parent::renderDataCellContent($model, $key, $index);
    }
}