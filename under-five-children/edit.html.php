<?php
    include '../inc/head.html.php';
    include '../inc/authenticated.php';
    include '../database/crud.php';

    if (isset($_GET['empty'])) {
        echo '<p class="text-red">Invalid data please fill in all the fields</p>';
    }
    
    $id = isset($_GET['id']);
    $child = get1($id, 'under_five_children');  
    
?>

<a href="http://localhost/malowa-hc/dashboard/index.html.php">Dashboard</a>
<a href="http://localhost/malowa-hc/dashboard/index.html.php">Under Five Children</a>

<form action="http://localhost/malowa-hc/under-five-children/update.php" method="post">
    <input type="hidden" name="id" value="<?=$child['id']?>">
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" id="firstname" value="<?=$child['firstname']?>"> <br>

    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" id="lastname" value="<?=$child['lastname']?>"> <br>

    <?php
        if ($child['gender'] === 'M') {
            echo '<input type="radio" id="male" name="gender" value="M" checked>';
        }else{
            echo '<input type="radio" id="male" name="gender" value="M">';   
        }
    ?>
    <label for="male">Male</label>

    <?php
        if ($child['gender'] === 'F') {
            echo '<input type="radio" id="female" name="gender" value="F" checked>';
        }else {
            echo '<input type="radio" id="female" name="gender" value="F">';
        }
    ?>
    <label for="female">Female</label> <br>

    <label for="dob">Date of birth</label>
    <input type="date" name="date_of_birth" id="dob" value="<?=$child['date_of_birth']?>"> <br>


    <select name="parent" id="parent">
        <option value="">--Please choose an option--</option>
        <option value="1">Thomas Tuchel</option>
        <option value="2">Joma Tech</option>
        <option value="3">Brad Traversy</option>
    </select> <br>

    <input type="submit" value="Update">

</form>

<?php
include '../inc/footer.html.php';
?>
