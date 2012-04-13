<?php
$user = FMembership::getUser();
if ($user == null) {
?>
<li><a href="<?php echo Yii::app()->createUrl('user/login') ?>">Login</a></li>
<li class="selected"><a href="<?php echo Yii::app()->createUrl('user/register') ?>">Register</a></li>
<?php
}
else {
    ?>
<li class="selected"><a href="<?php echo Yii::app()->createUrl('user/changepassword') ?>">Hello, <?php echo $user->user->fitportal_id; ?></a></li>
<li ><a href="<?php echo Yii::app()->createUrl('user/logout') ?>">Logout</a></li>
<?php
}

