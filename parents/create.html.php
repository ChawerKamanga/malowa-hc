<?php
    include '../inc/head.html.php';
    include '../inc/authenticated.php';

    if (isset($_GET['empty'])) {
        echo '<p class="text-red">Invalid data please fill in all the fields</p>';
    }
?>

<a href="http://localhost/malowa-hc/dashboard/index.html.php">Dashboard</a>
<a href="http://localhost/malowa-hc/parents/index.html.php">Parents</a>

<form action="http://localhost/malowa-hc/vaccines/store.php" method="post">
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" id="firstname"> <br>

    <label for="firstname">Lastname</label>
    <input type="text" name="lastname" id="lastname"> <br>

    <input type="radio" id="male" name="gender" value="M">
    <label for="male">Male</label>

    <input type="radio" id="female" name="gender" value="M">
    <label for="female">Female</label> <br>

    <input type="submit" value="Register">

</form>

<?php
include '../inc/footer.html.php';
?>
