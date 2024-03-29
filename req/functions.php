<?php
function redirect($url,$debugValue=null,$hash=null) {
    if ( $hash )
        $url .= "&hash=".substr($_POST["hash"],1);
        
    if ( $debugValue ){
        die('REDIRECT:DEBUG:<a href="'.$url.'">'.$url."</a>");
    } else {
        die('<meta http-equiv="refresh" content="0;URL='.$url.'">');
    }
}
?>