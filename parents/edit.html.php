<?php
    include '../inc/head.html.php';
    include '../inc/authenticated.php';
    include '../database/crud.php';

    if (isset($_GET['empty'])) {
        echo '<p class="text-red">Invalid data please fill in all the fields</p>';
    }

    $parent = get1($_GET['id'], 'parents'); 

?>

<a href="http://localhost/malowa-hc/dashboard/index.html.php">Dashboard</a>
<a href="http://localhost/malowa-hc/parents/index.html.php">Parents</a>

<form action="http://localhost/malowa-hc/parents/update.php" method="post">
    <input type="hidden" name="id" value="<?=$parent['id']?>">
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" id="firstname" value="<?=$parent['firstname']?>"> <br>

    <label for="firstname">Lastname</label>
    <input type="text" name="lastname" id="lastname" value="<?=$parent['lastname']?>"> <br>

    <?php
        if ($parent['gender'] === 'M') {
            echo '<input type="radio" id="male" name="gender" value="M" checked>';
        }else {
            echo '<input type="radio" id="male" name="gender" value="M">';
        }
    ?>
    <label for="male">Male</label>

    <?php
        if ($parent['gender'] === 'F') {
            echo '<input type="radio" id="female" name="gender" value="F" checked>';
        }else {
            echo '<input type="radio" id="female" name="gender" value="F">';
        }
    ?>

    <label for="female">Female</label> <br>

    <input type="submit" value="Update Parent">

</form>

<?php
include '../inc/footer.html.php';
?>
