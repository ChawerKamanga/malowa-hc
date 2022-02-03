<?php
    include '../inc/authenticated.php';
    include '../inc/head.html.php';
    include '../database/crud.php';
    

    if (isset($_GET['empty'])) {
        echo '<p class="text-red">Invalid data please fill in all the fields</p>';
    }

    if (isset($_GET['errors'])) {
        echo '<p class="text-red">Password confirmation does not match</p>';
    }

    if (isset($_GET['email_taken'])) {
        echo '<p class="text-red">Email already taken</p>';
    }

    $healthWorker = get1($_GET['id'], 'health_workers');  
    
?>
    <form action="http://localhost/malowa-hc/health-workers/update.php" method="post">
        <input type="hidden" name="id" value="<?=$healthWorker['id']?>">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname" required value="<?=$healthWorker['firstname']?>"> <br>

        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" id="lastname" value="<?=$healthWorker['lastname']?>"> <br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required value="<?=$healthWorker['email']?>"> <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password"> <br>

        <label for="password-confirm">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password-confirm"> <br>


        <a href="http://localhost/malowa-hc/">login</a> <br>

        <input type="submit" value="Update">

    </form>
<?php
    include '../inc/footer.html.php';    
?>