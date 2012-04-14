<?php
class Page extends AppModel{
    public $name = 'Page';
    var $useTable = false;
         
    function getHomeData(){   
        $info_home = $this->query("SELECT * FROM home_page WHERE id = 1"); 
        if(empty($info_home) == false){
            $home['headline_1'] = $info_home[0]['home_page']['headline_1'];
            $home['headline_2'] = $info_home[0]['home_page']['headline_2'];
            $home['headline_3'] = $info_home[0]['home_page']['headline_3'];
            $home['headline_4'] = $info_home[0]['home_page']['headline_4'];
            $home['headline_link1'] = $info_home[0]['home_page']['headline_link1'];
            $home['headline_link2'] = $info_home[0]['home_page']['headline_link2'];
            $home['headline_link3'] = $info_home[0]['home_page']['headline_link3'];
            $home['headline_link4'] = $info_home[0]['home_page']['headline_link4'];
            $home['headline_link4'] = $info_home[0]['home_page']['headline_link4'];
            $home['full_page_pic'] = $info_home[0]['home_page']['full_page_pic'];
            $home['full_page_text'] = $info_home[0]['home_page']['full_page_text'];
            $home['full_page_pic_link'] = $info_home[0]['home_page']['full_page_pic_link'];
            $home['body_text_content'] = $info_home[0]['home_page']['body_text_content'];
            $home['body_text_link'] = $info_home[0]['home_page']['body_text_link'];
            $home['body_text_register'] = $info_home[0]['home_page']['body_text_register'];
            $home['body_text_become'] = $info_home[0]['home_page']['body_text_become'];
            $home['body_text_thanks'] = $info_home[0]['home_page']['body_text_thanks'];
            return $home;
        }else{
            return false;
        }
    }
    
    function getSlideData(){   
        $info_slide = $this->query("SELECT * FROM feature_slides WHERE show_front = 1"); 
        if(empty($info_slide) == false){
            for($i=0; $i<count($info_slide); $i++){
                $slide[$i]['id'] = $info_slide[$i]['feature_slides']['id'];
                $slide[$i]['pic'] = $info_slide[$i]['feature_slides']['feature_slide_pic'];
                $slide[$i]['title'] = $info_slide[$i]['feature_slides']['feature_slide_title'];
                $slide[$i]['description'] = $info_slide[$i]['feature_slides']['feature_slide_description'];
                $slide[$i]['link'] = $info_slide[$i]['feature_slides']['feature_slide_link'];                
            }
            return $slide;
        }else{
            return false;
        }
    }
    
    function getBlocksData(){   
        $info_block = $this->query("SELECT * FROM feature_blocks WHERE feature_show = 1"); 
        if(empty($info_block) == false){
            for($i=0; $i<count($info_block); $i++){
                $block[$i]['id'] = $info_block[$i]['feature_blocks']['id'];
                $block[$i]['pic'] = $info_block[$i]['feature_blocks']['feature_block_pic'];
                $block[$i]['title'] = $info_block[$i]['feature_blocks']['feature_block_title'];
                $block[$i]['subtitle'] = $info_block[$i]['feature_blocks']['feature_block_subtitle'];
                $block[$i]['description'] = $info_block[$i]['feature_blocks']['feature_block_description'];                
                $block[$i]['price'] = $info_block[$i]['feature_blocks']['feature_block_price'];
                $block[$i]['link'] = $info_block[$i]['feature_blocks']['feature_block_link'];
            }
            return $block;
        }else{
            return false;
        }
    }
    
    function getCategories(){     
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM   `categories` AS c ORDER BY `category_name`" ;
        return $this->query($var1);  
    }
}