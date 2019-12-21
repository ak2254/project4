<?php include('abstract-views/header.php'); ?>
<div class = "login">
    <h1>  Registration</h1>
    <form action = "index.php" method = "post">
        <input type="hidden" name="action" value="validate_reg">
        <input type="hidden" name="action" value="val_reg">
    <br><br>
    <fieldset style="width: 400px; height: 500px; margin-bottom: 30px">
        <h3>First Name</h3>
        <input type="text" class ="name" name="name"   > *required

        <h3>Last Name</h3>
        <input type="text" class ="ln" name="ln" > *required

        <h3>Birthday</h3>
        <input type="date" class ="date" name="date" > *required

        <h3>Email</h3>
        <input type="email" class ="email" name="email" > *required

        <h3>Password:  </h3>
        <input type="password" class ="password" name="password"  > *required
        <h3>Owner Id:  </h3>
        <input type="text" class ="text" name="userID"  > *required

    </fieldset>
        <input style="height: 60px; width: 150px;" type="submit" value="Submit ">
</form>
</div>
<?php include('abstract-views/footer.php'); ?>


