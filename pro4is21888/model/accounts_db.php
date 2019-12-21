<?php

function validate_login($email, $password) {
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';

    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();

    $user = $statement->fetch();
    $isValidLogin = count($user) > 0;
    if (!$isValidLogin) {
        $statement->closeCursor();
        return false;
    } else {
        $userId = $user['ownerid'];
        $statement->closeCursor();
        return $userId;
    }
}
function new_usr($name, $ln, $email, $date, $password, $userId){
    //add a new usr
    global $db;
    $query = 'INSERT INTO accounts (email, fname, lname, birthday, password, ownerid )
VALUES
(:email, :fname, :lname, :birthday, :password, :ownerid) ';
    $statement = $db->prepare($query);
    $statement->bindValue(':fname', $name);
    $statement->bindValue(':lname', $ln);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':birthday', $date);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':ownerid', $userId);
    $statement->execute();
    if($statement->execute() === true){
        return $userId;
    }else{
        return false;
    }
    $statement->closeCursor();



}