<?php
    require_once ROOT."/includes/activeRecords/User.php";
    $message = '';
    $name = '';
    $email = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $checkPassword = isset($_POST['checkPassword']) ? $_POST['checkPassword'] : null;

        if(!is_null($name) &&
            !is_null($email) &&
            is_null(User::getByEmail($conn,$email)) &&
            !is_null($password) &&
            $password === $checkPassword) {

            $user = new User();
            $user->setName($name);
            $user->setPassword($password);
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