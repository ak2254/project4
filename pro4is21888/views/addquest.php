
<?php include('abstract-views/header.php'); ?>
<div class = "login">
    <h1> New Question</h1>
    <form action = "index.php" method = "post">
        <input type="hidden" name="action" value="create_new_question">

        <br><br>
        <fieldset style="width: 400px; height: 700px; margin-bottom: 30px">
            <h3> Email </h3>
            <input type="text" class ="email" name="email" > *required
            <h3> ID </h3>
            <input type="text" class ="id" name="id" > *required

            <h2>Question Name</h2>
            <input style="margin-bottom: 30px;" type="text" class ="name" name="name">


            <h2>Question body</h2>
            <textarea style="margin-bottom: 30px;" type="text" class ="body" name="body" >
        </textarea>


            <h2>Question Skills </h2>
            <textarea style="margin-bottom: 30px;" type="text" class ="skills" name="skills" >

        </textarea>
        </fieldset>
        <input  style="height: 60px; width: 150px;" type ="submit" value="Submit">
    </form>

</div>
<?php include('abstract-views/footer.php'); ?>
