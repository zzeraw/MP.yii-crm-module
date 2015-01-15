<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <?php Yii::app()->clientScript->registerPackage('jquery'); ?>
    <?php Yii::app()->clientScript->registerPackage('bootstrap3'); ?>
    <?php Yii::app()->clientScript->registerPackage('custom-css'); ?>
    <?php Yii::app()->clientScript->registerPackage('custom-js'); ?>

    <meta name="description" content=''>
    <meta name="keywords" content=''>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

    <div class="login-content">
        <?php echo $content; ?>
    </div>

</body>


</html>

