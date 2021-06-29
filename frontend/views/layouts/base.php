<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
    <?php echo $content ?>

<?php echo $this->render('footer'); ?>
<?php $this->endContent() ?>