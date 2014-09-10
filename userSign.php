<?php
$signInDetails = array();
//Get username from post
if(isset($post['username'])){
    $signInDetails['username'] = trim(htmlspecialchars($post['username']));
}

//Get password from post
if(isset($post['password']) && trim(htmlspecialchars($post['password'])) != ""){
    $signInDetails['password'] = crypt(htmlspecialchars($post['password']), '$2a$07$7A0w1YreTefVmuUcjT0RgdQn4$');
}

if($signInDetails['username'] == 'azureuser' && $signInDetails['password'] == '$2a$07$7A0w1YreTefVmuUcjT0RgOn9PXIjjF90Qd1hTMj/DYK1jppaGCydO'){
    $redirecturl = "Location: http://" . htmlspecialchars($_SERVER['HTTP_HOST']) . dirname(htmlspecialchars($_SERVER['PHP_SELF'])) . "/data.html";
    header($redirecturl);
    exit;
}