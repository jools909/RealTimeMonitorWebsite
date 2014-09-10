<?php
$signInDetails = array();
//Get username from post
if(isset($_POST['username'])){
    $signInDetails['username'] = trim(htmlspecialchars($_POST['username']));
}

//Get password from post
if(isset($_POST['password']) && trim(htmlspecialchars($_POST['password'])) != ""){
    $signInDetails['password'] = crypt(htmlspecialchars($_POST['password']), '$2a$07$7A0w1YreTefVmuUcjT0RgdQn4$');
}

if(isset($signInDetails['username']) && isset($signInDetails['password'])){
    if($signInDetails['username'] == 'azureuser' && $signInDetails['password'] == '$2a$07$7A0w1YreTefVmuUcjT0RgOn9PXIjjF90Qd1hTMj/DYK1jppaGCydO'){
        $redirecturl = "Location: http://" . htmlspecialchars($_SERVER['HTTP_HOST']) . substr(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), 0, -1) . "data.html";
        header($redirecturl);
        exit;
    } else {
        $homeURL = "Location: http://". htmlspecialchars($_SERVER['HTTP_HOST']) . substr(dirname(htmlspecialchars($_SERVER['PHP_SELF'])),0,-1) . "index.html";
        header($homeURL);
        exit;
    }
} else {
    $homeURL = "Location: http://". htmlspecialchars($_SERVER['HTTP_HOST']) . substr(dirname(htmlspecialchars($_SERVER['PHP_SELF'])),0,-1) . "index.html";
    header($homeURL);
    exit;
}
