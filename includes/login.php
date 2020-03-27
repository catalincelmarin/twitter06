<?php
    require_once ROOT."/includes/activeRecords/User.php";
    $message = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        if(!is_null($email) &&
            !is_null($password)) {

            $user = User::loginUser($conn,$email,$password);


            if(!is_null($user)) {
                $_SESSION['userId'] = $user->getId();
                $_SESSION['userName'] = $user->getName();
                $_SESSION['userEmail'] = $user->getEmail();

                header("Location:index.php");
                exit();
            } else {
                $message = 'wrong username or password';
            }

        } else {
            $message = 'error data';
        }
    }