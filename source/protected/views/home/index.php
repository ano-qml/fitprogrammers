<div id="leftcol">
    <h1>Latest Questions</h1>
    <div class="question_list">
        <div class="paging">
            <?php $this->widget('CLinkPager', array(
                'pages' => $pages,
                'header'=>"<b>".$count." results found.</b>",
                'nextPageLabel'=>'Next',
                'prevPageLabel'=>'Previous',
                'lastPageLabel'=>'Last',
                'firstPageLabel'=>'First'
            )) ?>
        </div>
        
        <?php
        foreach ($models as $model) {
        ?>
        <div class="question_item">
            <div class="q_votes">
                <div class="q_counter">
                    <?php echo ($model->vote_up_count + $model->vote_down_count); ?>
                </div>
                <div>votes</div>
            </div>
            <div class="q_status unanswered">
                <div class="q_counter">
                    <?php echo FPost::getAnswerCount($model->post_unique_id) ?>
                </div>
                <div>answer</div>
            </div>
            <div class="q_views">
                <div class="q_counter">
                    <?php echo $model->view_count; ?>
                </div>
                <div>views</div>
            </div>
            <div class="q_content">
                <h2><a href="<?php echo Yii::app()->createUrl('post/index', array('uid'=>$model->post_unique_id)); ?>">
                    <?php echo $model->title; ?>
                    </a></h2>
                <div class="q_tags">
                    <?php
                    for ($i = 0; $i < count($model->tags); $i++) {
                    ?>
                    <a href="<?php echo Yii::app()->createUrl('tags/index',array('name'=>trim($model->tags[$i])))?>" class="tag" title="tags"><?php echo trim($model->tags[$i]); ?></a>
                    <?php
                    }
                    ?>
                </div>
                <div class="q_info">
                    <span class="time" title="Posted time"><?php echo $model->created_date; ?></span>
                    <a href="#" class="userinfo" title="User info">
                        <?php echo FMembership::getAuthor($model->author)->getAttribute('real_name'); ?></a>
                    <span class="reputation" title="reputation score of this user">
                        <?php echo FMembership::getAuthor($model->author)->getAttribute('reputation'); ?>
                    </span>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        
        <div class="paging">
            <?php $this->widget('CLinkPager', array(
                'pages' => $pages,
                'header'=>"<b>".$count." results found.</b>",
                'nextPageLabel'=>'Next',
                'prevPageLabel'=>'Previous',
                'lastPageLabel'=>'Last',
                'firstPageLabel'=>'First'
            )) ?>
        </div>
    </div>         
</div>



<div id="rightcol">
    <div class="container blue">
        <div class="container_body">
            I am pleased to announce the first version of FIT Programmers System.
            An environment where FITers can share and ask questions about Programming.
            <br />
            Important notes:
            <ul>
                <li>Use your FIT Portal username</li>
                <li>The default password is posted on FIT forum</li>
                <li>Remember to change password</li>
                <li><b>To change password: click on "Hello, username" on the Menu</b></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <h1>Recent tags</h1>
        <div class="container_body">

        </div>
    </div>
</div>
