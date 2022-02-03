<?php
    include '../inc/head.html.php';
    include '../inc/authenticated.php';
    include '../database/crud.php';

    if (isset($_GET['empty'])) {
        echo '<p class="text-red">Invalid data please fill in all the fields</p>';
    }

    $child = get1($_GET['id'], 'vaccines'); 
?>

<a href="http://localhost/malowa-hc/dashboard/index.html.php">Dashboard</a>
<a href="http://localhost/malowa-hc/dashboard/index.html.php">Under Five Children</a>

<form action="http://localhost/malowa-hc/vaccines/update.php" method="post">
    <input type="hidden" name="id" value="<?=$child['id']?>">
    <label for="vaccinename">Vaccine Name</label>
    <input type="text" name="vaccinename" id="vaccinename" value="<?=$child['vaccine_name']?>"> <br>

    <?php
        if ($child['is_special'] == 1) {
            echo '<input type="radio" id="is-special" name="is_special" value="1" checked>';
        }else {
            echo '<input type="radio" id="is-special" name="is_special" value="1">';
        }
    ?>
    <label for="is-special">Is Special</label>

    <?php
        if ($child['is_special'] == 0) {
            echo '<input type="radio" id="is-not-special" name="is_special" value="0" checked>';
        }else {
            echo '<input type="radio" id="is-not-special" name="is_special" value="0">';
        }
    ?>
    <label for="is-not-special">Not Special</label> <br>

    <input type="submit" value="Update">

</form>

<?php
include '../inc/footer.html.php';
?>
