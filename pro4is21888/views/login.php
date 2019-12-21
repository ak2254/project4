<?php include('abstract-views/header.php'); ?>
<div class = "login">
    <h1> Login</h1>
    <form action = "index.php" method = "post">
        <input type="hidden" name="action" value="validate_login">
        <br><br>
        <fieldset style="width: 400px; height: 250px; margin-bottom: 30px">
            <h3 >Email:</h3>
            <input style="width: 300px; height: 30px" type="text" class ="email" name="email" > *required

            <h3  >Password:  </h3>
            <input style=" width: 300px; height: 30px" type="password" class ="password" name="password"  > *required

        </fieldset>
        <input style="height: 60px; width: 150px;" type="submit" value="Submit ">
    </form>
</div>
<?php include('abstract-views/footer.php'); ?>

