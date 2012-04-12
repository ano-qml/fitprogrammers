<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FTags
 *
 * @author qmha
 */
class FTags {
    //put your code here
    public static function makeTags($tags) {
        $items = explode(',', $tags);
        for ($i = 0; $i < count($items); $i++) {
            $item[$i] = strtolower(trim($items[$i]));
            $model = Tags::model()->find('tag_name = :tag', array('tag'=>$item[$i]));
            if ($model == null) {
                // insert
                $tag = new Tags;
                $tag->tag_name = $item[$i];
                $tag->use_count = 0;
                $tag->insert();
            }
            else {
                // Update the use-count
                $model->setAttribute('use_count', $model->getAttribute('use_count')++);
                $model->save();
            }
        }
    }
}

?>
