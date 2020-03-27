<?php
    require_once ROOT."/includes/activeRecords/User.php";
    $message = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $oldPassword = isset($_POST['oldPassword']) ? $_POST['oldPassword'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $checkPassword = isset($_POST['checkPassword']) ? $_POST['checkPassword'] : null;

    $user = User::getById($conn,$_SESSION['userId']);
    if(strlen(trim($oldPassword)) > 0) {
        $verifyOld = password_verify($oldPassword, $user->getPassword());
    } else {
        $verifyOld = true;
    }

    if(!is_null($name) &&
        !is_null($email) &&
        $verifyOld &&
        !is_null($password) &&
        $password === $checkPassword) {
        $user->setName($name);
        if(strlen(trim($password)) > 0) {
            $user->setPassword($password);
        }

        $user->setEmail($email);

        if($user->save($conn)) {
            header("Location:index.php");
            exit();
        } else {
            $message = 'not done';
        }

    } else {
        $message = 'error data';
    }
}

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $user = User::getById($conn,$_SESSION['userId']);

        if(is_null($user)) {
            $message = 'wrong username or password';
        } else {
            $name = $user->getName();
            $email = $user->getEmail();
        }

    }