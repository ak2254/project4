<?php
session_start();

require('model/database.php');
require('model/accounts_db.php');
require('model/questions_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}

switch ($action) {
    case 'show_login':
    {
        include('views/login.php');
        break;
    }
    case 'show _reg':
    {
        include('views/reg.php');
        break;

    }

    case 'add_quest':
    {

        $userId = filter_input(INPUT_GET, 'userId');
        session_start();
        $_SESSION['userId'] = $userId;
        include('views/addquest.php');
        break;

    }
    case 'edit_quest':
    {
        include('views/editquest.php');
        break;
    }

    case 'validate_login':
    {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if ($email == NULL || $password == NULL) {
            $error = 'Email and Password are required';
            include('errors/error.php');
        } else {
            $userId = validate_login($email, $password);
            $_SESSION['userId'] = $userId;
            if ($userId == false) {
                $error = 'Invalid Login';
                include('views/reg.php');

            } else {
                header("Location: .?action=display_users&userId=$userId");
            }
        }
        break;
    }
    case 'val_reg':
    {
        $name = filter_input(INPUT_POST, 'name');
        $ln = filter_input(INPUT_POST, 'ln');
        $date = filter_input(INPUT_POST, 'date');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $uId = filter_input(INPUT_POST, 'userID');
        if (empty($email)) {
            $error = "Email is required ";
            include('errors/error.php');

        }
        if ((strpos($email, '@') == false)) {
            $error = " Invalid email. ";
            include('errors/error.php');

        }
        if (empty($name)) {
            $error = 'First name is required.';
            include('errors/error.php');

        }
        if (empty($ln)) {
            $error = ' Last name is required.';
            include('errors/error.php');


        }
        if (empty($date)) {
            $error = ' Birth date is required.';
            include('errors/error.php');
        }
        if (empty($password)) {
            $error = ' Password must be entered.';
            include('errors/error.php');

        }
        if (strlen($password) < 8) {
            $error = ' Password must be at least 8 characters long. ';
            include('errors/error.php');

        } else {
            $userId = new_usr($name, $ln, $email, $date, $password, $uId);
            $_SESSION['userId'] = $userId;
            if ($userId !== false) {
                header("Location: .?action=display_users&userId=$userId");
            }
        }
        break;


    }

    case 'create_new_question':
    {
        $email = filter_input(INPUT_POST, 'email');
        $name = filter_input(INPUT_POST, 'name');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');
        $id = filter_input(INPUT_POST, 'id');

        if (empty($name)) {
            $error = "name is required ";
            include('errors/error.php');


        }
        if (strlen($name) < 3) {
            $error = " Must be at least 3 characters";
            include('errors/error.php');


        }

        if (empty($body)) {
            $error = ' Body is required';
            include('errors/error.php');
        }
        if (strlen($body) > 500) {
            $error = ' Must be less than 500 characters.';
            include('errors/error.php');
        }


        if (empty($skills)) {
            $error = 'At least Two skills are required';
            include('errors/error.php');
        }
        $array = explode(" ", $skills);


        if (sizeof($array) < 2) {
            $error = " At least 2 skills must be entered.";
            include('errors/error.php');

        } else {
            $userId = add_question($id, $name, $body, $skills);
            $_SESSION['userId'] = $userId;

            if ($userId !== false) {
                header("Location: .?action=display_users&userId=$userId");
            }
        }
        break;

    }
    case 'edit_question':
    {
        $quid = filter_input(INPUT_POST, 'quid');
        $name = filter_input(INPUT_POST, 'name');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');
        $id = filter_input(INPUT_POST, 'id');
        if (empty($name)) {
            $error = "name is required ";
            include('errors/error.php');


        }
        if (strlen($name) < 3) {
            $error = " Must be at least 3 characters";
            include('errors/error.php');


        }

        if (empty($body)) {
            $error = ' Body is required';
            include('errors/error.php');
        }
        if (strlen($body) > 500) {
            $error = ' Must be less than 500 characters.';
            include('errors/error.php');
        }


        if (empty($skills)) {
            $error = 'At least Two skills are required';
            include('errors/error.php');
        }
        $array = explode(" ", $skills);


        if (sizeof($array) < 2) {
            $error = " At least 2 skills must be entered.";
            include('errors/error.php');

        } else {
            $userId = edit_question($quid, $id, $name, $skills, $body);
            $_SESSION['userId'] = $userId;
            if ($userId !== false) {
                header("Location: .?action=display_users&userId=$userId");
            }
        }
        break;


    }

    case 'delete_question':
    {

        $uId = filter_input(INPUT_POST, 'userId');

        $qId = filter_input(INPUT_POST, 'questionId');
        $q = delete_question($uId, $qId);

        if ($q !== false) {
            header("Location: .?action=display_users&userId=$uId");
        }
        break;
    }
    case 'single_question':{
        $uId = filter_input(INPUT_POST, 'userId');

        $qId = filter_input(INPUT_POST, 'questionId');
        $_SESSION['userId'] = $uId;
        if ($qId == NULL) {
            $error = 'User Id unavailable';
            echo $error;
        } else {
            $questions = get_question($qId);
            include('views/onequest.php');
        }
        break;
    }

    case 'display_users':
    {

        $userId = filter_input(INPUT_GET, 'userId');
        $_SESSION['userId'] = $userId;
        if ($userId == NULL) {
            $error = 'User Id unavailable';
            include('errors/error.php');
        } else {
            $questions = get_questions_by_ownerId($userId);
            include('views/display_questions.php');
        }
        break;
    }
    case 'display_all':
    {
        include('views/displayall.php');
        break;

    }
    case 'goback':
    {

        include('views/display_questions.php');
        break;


    }
    case 'logout':
    {
        session_destroy();
        include('views/login.php');

    }

    default: {
        $error = 'Unknown Action';
        include('errors/error.php');
    }
}