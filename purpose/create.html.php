<?php
    include '../inc/head.html.php';
    include '../inc/authenticated.php';

    if (isset($_GET['empty'])) {
        echo '<p class="text-red">Invalid data please fill in all the fields</p>';
    }
?>

<a href="http://localhost/malowa-hc/dashboard/index.html.php">Dashboard</a>
<a href="http://localhost/malowa-hc/dashboard/index.html.php">Under Five Children</a>

<form action="http://localhost/malowa-hc/purpose/store.php" method="post">
    <label for="purpose">Purpose Name</label>
    <input type="text" name="purpose" id="purpose"> <br><br>

    <label for="purpose-description">Purpose Description</label>
    <textarea name="purpose_desc" id="purpose-description"></textarea> <br><br>

    <input type="submit" value="Add purpose">

</form>

<?php
include '../inc/footer.html.php';
?>
