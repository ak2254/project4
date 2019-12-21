<?php

function get_questions_by_ownerId ($ownerId) {
    global $db;
    $query = 'SELECT * FROM questions WHERE ownerid = :ownerid';

    $statement = $db->prepare($query);
    $statement->bindValue(':ownerid', $ownerId);
    $statement->execute();

    $questions = $statement->fetchAll();
    $statement->closeCursor();

    return $questions;
}
function add_question($id, $name, $body, $skills ){
    global $db;
    $query = 'INSERT INTO questions(ownerid, title, body, skills) VALUES (:ownerid, :title, :body, :skills)';
    $statement = $db->prepare($query);
    $statement->bindValue(':ownerid', $id);
    $statement->bindValue(':title', $name);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':skills', $skills);
    if($statement->execute() === true){
        return $id;
    }else{
        return false;
    }
    $statement->closeCursor();



}
function delete_question($ownerid, $id){
    global $db;
    $query = "DELETE from questions WHERE id = :id  && ownerid = :ownerid ";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':ownerid', $ownerid);
    $statement->execute();
    if($statement->execute() === true){
        return $ownerid;
    }else{
        return false;
    }
    $statement->closeCursor();


}
function all_questions(){
    global $db;
    $query = "SELECT * FROM questions";
    $statement = $db->prepare($query);
    $statement->execute();
    $questions = $statement->fetchAll();
    $statement->closeCursor();
    return $questions;
}
function get_question($id){
    global $db;
    $query = "SELECT * FROM questions WHERE id=:id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $question = $statement->fetchAll();
    $statement->closeCursor();
    return $question;
}

function edit_question($qid, $ownerid, $tittle, $skills, $body){
    global $db;
    $query = "UPDATE questions SET ownerid=':ownerid', title=':tittle', body=':body', skills=':skills' WHERE qid=':qid'";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':qid', $qid);
    $stmt->bindValue(':tittle', $tittle);
    $stmt->bindValue(':body', $body);
    $stmt->bindValue(':skills', $skills);
    $stmt->bindValue(':ownerid', $ownerid);
    $stmt->execute();
    if($stmt->execute() === true){
        return $ownerid;
    }else{
        return false;
    }
    $stmt->closeCursor();

}
