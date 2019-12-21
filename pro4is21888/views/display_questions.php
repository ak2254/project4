
<!DOCTYPE html>
<html>
<head>
    <title>Logged In</title>
    <link rel="stylesheet" type="text/css" href="css/u.css">
</head>
<body>

<h1> Welcome!</h1>
<h2>Questions for User with ID: <?php echo $userId;
    session_start()?></h2>


<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Body</th>
        <th> Skills</th>
        <th> Delete</th>
        <th> View</th>
        <th>Edit</th>


    </tr>
    <?php $questions = get_questions_by_ownerId($userId);

    foreach ($questions as $question) :
        $userId = $_SESSION['userId'];

    ?>

        <tr>
            <td><?php echo $question['id']; ?></td>
            <td><?php echo $question['title']; ?></td>
            <td><?php echo $question['body']; ?></td>
            <td><?php echo $question['skills']; ?></td>
            <td><form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_question">
                    <input type="hidden" name="questionId" value="<?php echo $question['id'];?>">
                    <input type="hidden" name="userId" value="<?php echo $userId; ?> ">
                    <input class="btn" type="submit" value="Delete">
                </form>

            </td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="single_question">
                    <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">
                    <input type="hidden" name="userId" value="<?php echo $question['ownerid']?>">
                    <input type="submit" class="btn" value="View">
                </form>
            </td>

            <td>
                <a href="?action=edit_quest&userId=<?php echo $userId ?>"><input type="submit" value="Edit Question"></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="?action=display_all&userId=<?php echo $userId ?>"><input style="height: 100px; width: 150px; margin-left: 5rem; margin-top: 5rem;" type="submit" value="display all"></a>

<a href="?action=add_quest&userId=<?php echo $userId ?>"><input style="height: 100px; width: 150px; margin-left: 5rem; margin-top: 5rem;" type="submit" value="Add Question"></a>
<a href="?action=logout&userId"=<?php echo $userId ?>><input style="height: 100px; width: 150px; margin-left: 5rem; " type="submit" value="Logout"></a>
</body>
</html>
