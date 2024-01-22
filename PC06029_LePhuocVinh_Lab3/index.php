<?php
require_once 'vendor/autoload.php';

use App\core\Form;
use App\controller\BaseController;

$base = new BaseController();

?>

<div class="container">
    <h3>Bài tập Lab3</h3>
    <h1>Create an account</h1>
    <?php $form = Form::begin('', 'post'); ?>
    <div class="row">
        <div class="col">
            <?php echo $form->field('fullName'); ?>
        </div>
    </div>
    <?php echo $form->field('email'); ?>
    <?php echo $form->field('password')->passwordFiled(); ?>
    <?php echo $form->field('confirmPassword')->passwordFiled(); ?>
    <button class="btn btn-primary" type="submit">Submit</button>
    <?php echo Form::end() ?>
</div>