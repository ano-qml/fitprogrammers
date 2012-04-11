<div class="post_tilte">
    A question on .NET Course: how can we manage to do the source code when we dont know it
</div>


<div id="leftcol">
    <div class="post_container">
        <div class="post_left">
            <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/images/vote_up.png" /></a>
            <span class="vote_count">4</span>
            <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/images/vote_down.png" /></a>
            <a href="#" class="star"><img src="<?php echo Yii::app()->baseUrl ?>/images/star.png" /></a>
        </div>
        <div class="post_right">
            <div class="post_body">
                I've a complex flow where I've to attach mouseover event for every polyline on the map. The code for attaching the event is simple:

google.maps.event.addListener(polyline, "mouseover", function() {
            console.log('event fired');

        });

But the event is attaching to few polylines and not to others. What might be the reason?

Edit

Following is some more code that is before the above code and used for defining polyline:

    this.polyline = new google.maps.Polyline({
                path : [fromPosition, toPosition],
                strokeColor : '#CCCCCC',
                strokeOpacity : 1.0,
                strokeWeight : 2
            });
   var polyline = this.polyline;

Edit 05-Apr-2012

Following is the code that creates problem, Please explain why it's happening and recommend any solution. Thanks
            </div>
            <div class="post_tags">
                <a href="#" class="tag" title="tags">.NET</a>
                <a href="#" class="tag" title="tags">.NET</a>
            </div>
            <div class="post_actions">
                <a href="#">link</a>
                |
                <a href="#">edit</a>
            </div>
            <div class="post_info">
                asked <b>Mar 27, 2012</b>
                <br />
                <a href="#">MinhHQ</a>
            </div>
            <div class="post_comments"></div>
        </div>
    </div>
    
    <div class="post_answer_title">4 answers</div>
    
    
    <div class="post_container">
        <div class="post_left">
            <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/images/vote_up.png" /></a>
            <span class="vote_count">4</span>
            <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/images/vote_down.png" /></a>
            <a href="#" class="star"><img src="<?php echo Yii::app()->baseUrl ?>/images/star.png" /></a>
        </div>
        <div class="post_right">
            <div class="post_body">
                I've a complex flow where I've to attach mouseover event for every polyline on the map. The code for attaching the event is simple:

google.maps.event.addListener(polyline, "mouseover", function() {
            console.log('event fired');

        });

But the event is attaching to few polylines and not to others. What might be the reason?

Edit

Following is some more code that is before the above code and used for defining polyline:

    this.polyline = new google.maps.Polyline({
                path : [fromPosition, toPosition],
                strokeColor : '#CCCCCC',
                strokeOpacity : 1.0,
                strokeWeight : 2
            });
   var polyline = this.polyline;

Edit 05-Apr-2012

Following is the code that creates problem, Please explain why it's happening and recommend any solution. Thanks
            </div>
            <div class="post_tags">
                <a href="#" class="tag" title="tags">.NET</a>
                <a href="#" class="tag" title="tags">.NET</a>
            </div>
            <div class="post_actions">
                <a href="#">link</a>
                |
                <a href="#">edit</a>
            </div>
            <div class="post_info">
                answered <b>Mar 27, 2012</b>
                <br />
                <a href="#">MinhHQ</a>
            </div>
            <div class="post_comments"></div>
        </div>
    </div>
    
    
    <div class="your_answer">
        <h1>Your answer</h1>
        <form class="ask_form">
            <p>
                <textarea name="wysiwyg" id="wysiwyg" class="ask_editor"></textarea>
            </p>
            
            <p>
                <input type="submit" value="Ask Fiters" class="ask_submit" />
            </p>
        </form> 
    </div>
</div>



<div id="rightcol">
    <div class="container blue">
        <div class="container_body">
            I am pleased to announce the first version of FIT Programmers System.
            An environment where FITers can share and ask questions about Programming.
        </div>
    </div>

    <div class="container">
        <h1>Recent tags</h1>
        <div class="container_body">

        </div>
    </div>
</div>