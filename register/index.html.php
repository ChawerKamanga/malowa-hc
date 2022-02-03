<?php
    include '../inc/head.html.php';

    include '../inc/unauthenticated.php';

    if (isset($_GET['empty'])) {
        echo '<p class="text-red">Invalid data please fill in all the fields</p>';
    }

    if (isset($_GET['errors'])) {
        echo '<p class="text-red">Password confirmation does not match</p>';
    }

    if (isset($_GET['email_taken'])) {
        echo '<p class="text-red">Email already taken</p>';
    }
   
?>
    <form action="http://localhost/malowa-hc/auth/register.php" method="post">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname" required> <br>

        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" id="lastname"> <br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required> <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password"> <br>

        <label for="password-confirm">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password-confirm"> <br>


        <a href="http://localhost/malowa-hc/">login</a> <br>

        <input type="submit" value="Register">

    </form>
<?php
    include '../inc/footer.html.php';    
?>