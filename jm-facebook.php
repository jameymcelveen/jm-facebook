<?php
/*
Plugin Name: JM Facebook Tools
*/

//[jm-facebook-photos]

$fb_access_token = 'CAAMGAipsajcBAICIAZCvfOj8bZB8DzhoDKGZA17szNHaU3fkUjQYkGo1M0mzl5ZA1pfoYYjZBrdu8wBu1DHxOOhQYcRiqCrVZBZClITAHmBbg5ybpXDuneAK0wu1P2RfePN03dz4ZAD0mK0sLR7yOhXUvDbgx1Bcjinrq0NkgEWszm4fhxol9pZBPyscZAOOFj9b2sOW2xiflRlilvysJmaJHEiZATosYzmQYwZD';
//$group_id = "157288534403279";
$group_id = "me";

function jm_facebook_photos_func( $atts ) {
    global $fb_access_token;
    global $group_id;
    $json = file_get_contents('https://graph.facebook.com/v2.3/'.$group_id.'/Albums?access_token='.$fb_access_token);
    //print '<!--'.$json.'-->';
    $rsp = json_decode($json, true);
    $data = $rsp["data"];
    $paging = $rsp["paging"];
    $html = '<link rel="stylesheet" type="text/css" href="style.css">';
    $html .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>';
    $html .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.0/masonry.pkgd.min.js"></script>';
    $html .= '<div class="grid">';
    for ($k = 0; $k < count($data); $k++){
        $item = $data[$k];
        $id = $item["id"];
        $name = $item["name"];
        //$cover_photo = $item["cover"];
        $desc = '';
        if (array_key_exists('description', $item)) {
            $desc = $item["description"];
        }
        //$img_url = file_get_contents('https://graph.facebook.com/v2.3/'.$id.'/picture?type=thumbnail&redirect=false&'
        https://graph.facebook.com/v2.3/1119171271561  CAAMGAipsajcBAOkwhveVZARGl7OfPV6vIjwYMqxJMGVjNxigWsNl49ZCeD4NVIIY3f8mWUcrxkGZAkcHuVzWP4mkZBtSBmFUqKKucdT9tnBL8lhrNzTnDdZCvL3DymLkUvbnh1V7G4GNTUyoXHwwKtlYBVMZB2JHlHN2qNXTsKN7pUL9X9rMnS2IKeeJp4ZB9KXLilQiwGZCcRuUvxOiflmk92ZBhpfm3rJEZD
        $picture = json_decode(file_get_contents('https://graph.facebook.com/v2.3/'.$id.'/picture?type=thumbnail&redirect=false&access_token='.$fb_access_token), true);
        //var_dump($picture);
        $html .= '<div class="grid-item"><img src="'.$picture["data"]["url"].'" alt="'.$name.'"><h3>'.$name.'</h3></div>';
  }
    /*
      "paging":{
         "cursors":{
            "before":"NjU3MTc1ODM3NzQ3ODc3",
            "after":"MTkyMTkwMDcwOTEzMTI1"
         }
       }
    */
    $html .= "</div>";
    $html .= "<script>$('.grid').masonry({ itemSelector: '.grid-item', columnWidth: 200});</script>";
    return $html;
}
add_shortcode( 'jm-facebook-photos', 'jm_facebook_photos_func' );

//print jm_facebook_photos_func('');
