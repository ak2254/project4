
<!DOCTYPE html>
<html>
<head>
    <title>Logged In</title>
    <link rel="stylesheet" type="text/css" href="css/u.css">
</head>
<body>

<h1> Welcome!</h1>
<h2> All the Questions asked:
    <?php
    session_start()?></h2>




<table class="table">
    <tr>

        <th> USER ID</th>
        <th>ID Of the Question</th>
        <th>Name</th>
        <th>Body</th>
        <th> Skills</th>
        <th>View</th>



    </tr>
    <?php $questions = all_questions();
    $userId =$_SESSION['userId'];



    foreach ($questions as $question) :

    ?>
        <tr>
            <td><?php echo $question['ownerid']; ?></td>
            <td><?php echo $question['id']; ?></td>
            <td><?php echo $question['title']; ?></td>
            <td><?php echo $question['body']; ?></td>
            <td><?php echo $question['skills']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="single_question">
                    <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">
                    <input type="hidden" name="userId" value="<?php echo $question['ownerid']?>">
                    <input type="submit" class="btn" value="View">
                </form>
            </td>

        </tr>

    <?php endforeach; ?>
</table>
<a href="?action=display_users&userId=<?php echo $userId?>"><input style="height: 100px; width: 150px; margin-left: 5rem; margin-top: 5rem;" type="submit" value="Go back to your own questions"></a>

<a href="?action=add_quest&userId=<?php echo $userId ?>"><input style="height: 100px; width: 150px; margin-left: 5rem; margin-top: 5rem;" type="submit" value="Add Question"></a>

<a href="?action=logout&userId"=<?php echo $userId ?>><input style="height: 100px; width: 150px; margin-left: 5rem; " type="submit" value="Logout"></a>
</body>
</html>

