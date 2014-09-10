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
        echo htmlspecialchars($_SERVER['HTTP_HOST']);
        echo dirname(htmlspecialchars($_SERVER['PHP_SELF']));

        $redirecturl = "Location: http://" . htmlspecialchars($_SERVER['HTTP_HOST']) . dirname(htmlspecialchars($_SERVER['PHP_SELF'])) . "data.html";
        echo $redirecturl;
//        header($redirecturl);
//        exit;
    } else {
        echo htmlspecialchars($_SERVER['HTTP_HOST']);
        echo dirname(htmlspecialchars($_SERVER['PHP_SELF']));

        $homeURL = "Location: http://". htmlspecialchars($_SERVER['HTTP_HOST']) . dirname(htmlspecialchars($_SERVER['PHP_SELF'])) . "index.html";
        echo $homeURL;
//        header($homeURL);
//        exit;
    }
} else {
    $homeURL = "Location: http://". htmlspecialchars($_SERVER['HTTP_HOST']) . dirname(htmlspecialchars($_SERVER['PHP_SELF'])) . "index.html";
    header($homeURL);
    exit;
}
