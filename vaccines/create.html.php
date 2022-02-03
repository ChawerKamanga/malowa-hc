<?php
    include '../inc/head.html.php';
    include '../inc/authenticated.php';

    if (isset($_GET['empty'])) {
        echo '<p class="text-red">Invalid data please fill in all the fields</p>';
    }
?>

<a href="http://localhost/malowa-hc/dashboard/index.html.php">Dashboard</a>
<a href="http://localhost/malowa-hc/dashboard/index.html.php">Under Five Children</a>

<form action="http://localhost/malowa-hc/vaccines/store.php" method="post">
    <label for="vaccinename">Vaccine Name</label>
    <input type="text" name="vaccinename" id="vaccinename"> <br>

    <input type="radio" id="is-special" name="is_special" value="0">
    <label for="is-special">Is Special</label>

    <input type="radio" id="is-not-special" name="is_special" value="1">
    <label for="is-not-special">Not Special</label> <br>

    <input type="submit" value="Register">

</form>

<?php
include '../inc/footer.html.php';
?>
