<?php
    include '../inc/head.html.php';
    include '../inc/authenticated.php';
    include_once '../database/crud.php';

    if (isset($_GET['empty'])) {
        echo '<p class="text-red">Invalid data please fill in all the fields</p>';
    }
    
    $child = get1($_GET['id'], 'under_five_children');  
    
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


    <?php
        $result = getAll('parents');

        if ($result->num_rows > 0) {
            echo '<select name="parent" id="parent">';
                echo '<option value="">--Please choose an option--</option>';
                while ($parent = $result->fetch_assoc()) { 
                    echo '<option value="' . $parent['id'] .'">'. $parent['firstname'] . ' ' . $parent['lastname'] .'</option>';
                }
            echo '</select>';
        }else {
            echo '<br><br>0 results<br>';
        }

    ?> <br>

    <input type="submit" value="Update">

</form>

<?php
include '../inc/footer.html.php';
?>
