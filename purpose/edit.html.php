<?php
    include '../inc/head.html.php';
    include '../inc/authenticated.php';
    include '../database/crud.php';

    if (isset($_GET['empty'])) {
        echo '<p class="text-red">Invalid data please fill in all the fields</p>';
    }

    $purpose = get1($_GET['id'], 'purpose'); 
?>

<a href="http://localhost/malowa-hc/dashboard/index.html.php">Dashboard</a>
<a href="http://localhost/malowa-hc/purpose/index.html.php">Go back</a>

<form action="http://localhost/malowa-hc/purpose/update.php" method="post">
    <input type="hidden" name="id" value="<?=$purpose['id']?>">
    <label for="purpose">purpose Name</label>
    <input type="text" name="purpose" id="purposename" value="<?=$purpose['purpose']?>"> <br>

    <label for="purpose-description">Purpose Description</label>
    <textarea name="purpose_desc" id="purpose-description"><?=$purpose['purpose_desc']?></textarea> <br><br>

    <input type="submit" value="Update Purpose">

</form>

<?php
include '../inc/footer.html.php';
?>
