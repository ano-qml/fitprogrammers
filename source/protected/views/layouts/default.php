<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Hanusoft - FIT Programmers</title>
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/style.css" />
    <!-- jQuery UI -->
    <link type="text/css" href="<?php echo Yii::app()->baseUrl ?>/css/humanity/jquery-ui-1.8.18.custom.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/scripts/jquery-ui-1.8.18.custom.min.js"></script>
    <!-- WYSIWYG Editor -->
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
						
    
    <!-- Fancy Box -->
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl ?>/scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <div class="logo">
                <a href="<?php echo Yii::app()->createUrl('home/index'); ?>">
                    <img src="<?php echo Yii::app()->baseUrl ?>/images/fitprogrammers.png" style="border:none;" /></a>
            </div>
            <div class="mainmenu">
                <ul>
                    <li><a href="<?php echo Yii::app()->createUrl('questions') ?>">Questions</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('tags') ?>">Tags</a></li>
                    <!--
                    <li><a href="<?php echo Yii::app()->createUrl('badges') ?>">Badges</a></li>
                    -->
                    <li><a href="<?php echo Yii::app()->createUrl('questions/unanswered') ?>">Unanswered</a></li>
                    <?php
                    $this->widget('application.components.widgets.WUserLogin');
                    ?>
                </ul>
            </div>
            <div class="ask_question">
                <a href="<?php echo Yii::app()->createUrl('questions/post') ?>">ask question</a>
            </div>
        </div>
        
        <div class="clear" />
        
        <div id="body">
            <?php echo $content; ?>
        </div>
        
        <div class="clear"/>
        
        <div id="footer">
            Created by Ha Quang Minh
            <br />
            This site is a part of Hanusoft and Faculty of Information Technology, Hanoi University.
            <br />
            <i>
                Last updated on [<?php echo date ("F d Y H:i:s.", filemtime(Yii::app()->basePath.'/components/Controller.php')) ?>]. 
                Current version: <?php echo FApp::$_VERSION; ?>
            </i>
        </div>
    </div>
</body>

</html>