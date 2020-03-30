<?php
    require_once ROOT.'/includes/activeRecords/Tweet.php';

    $userId = $_SESSION['userId'];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $tweet = isset($_POST['text']) && strlen(trim($_POST['text'])) > 5 &&
        strlen(trim($_POST['text'])) < 161 ? $_POST['text'] : null;
        if(is_null($tweet)) {
            $message = 'tweet not ok';
        } else {
            $dbTweet = new Tweet();
            $dbTweet->setUserId($_SESSION['userId']);
            $dbTweet->setText($tweet);
            if($dbTweet->save($conn)) {
                header('Location:index.php');
                exit();
            }


        }

    }

    $page = 'home';