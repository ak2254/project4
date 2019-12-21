
<!DOCTYPE html>
<html>
<head>
    <title>Logged In</title>
    <link rel="stylesheet" type="text/css" href="css/u.css">
</head>
<body>

<h1> Welcome!</h1>
<h2> The view of the question you selected
    <?php session_start()?></h2>


<table class="table">
    <tr>
        <th>ID</th>
        <th>Name Of the Question</th>
        <th>Body</th>
        <th> Skills</th>
        <th> Delete</th>
        <th>Edit</th>


    </tr>
    <?php
    $questions = get_question($qId);


    foreach ($questions as $question) :
         $_SESSION['userId'] = $uId;

        ?>

        <tr>
            <td><?php echo $question['id']; ?></td>
            <td><?php echo $question['title']; ?></td>
            <td><?php echo $question['body']; ?></td>
            <td><?php echo $question['skills']; ?></td>
            <td><form >
                    <input type="hidden" name="action" value="delete_question">
                    <input type="hidden" name="questionId" value="<?php echo $question['id'];?>">
                    <input type="hidden" name="userId" value="<?php echo $question['ownerid']  ?> ">
                    <input class="btn" type="submit" value="Delete">
                </form>

            </td>
            <td>
                <a href="?action=edit_quest&userId=<?php echo $userId ?>"><input type="submit" value="Edit Question"></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="?action=display_all&userId=<?php echo $uId ?>"><input style="height: 100px; width: 150px; margin-left: 2rem; margin-top: 5rem;" type="submit" value="display all"></a>
<a href="?action=display_users&userId=<?php echo $uId?>"><input style="height: 100px; width: 150px; margin-left: 2rem; margin-top: 5rem;" type="submit" value="Go back to your own questions"></a>

<a href="?action=add_quest&userId=<?php echo $uId ?>"><input style="height: 100px; width: 150px; margin-left: 2rem; margin-top: 5rem;" type="submit" value="Add Question"></a>
<a href="?action=logout&userId"=<?php echo $uId ?>><input style="height: 100px; width: 150px; margin-left: 2rem; " type="submit" value="Logout"></a>
</body>
</html>
