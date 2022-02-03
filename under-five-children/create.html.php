<?php
    include '../inc/head.html.php';
    include '../inc/authenticated.php';
    include_once '../database/crud.php';

    if (isset($_GET['empty'])) {
        echo '<p class="text-red">Invalid data please fill in all the fields</p>';
    }


?>

<a href="http://localhost/malowa-hc/dashboard/index.html.php">Dashboard</a>
<a href="http://localhost/malowa-hc/dashboard/index.html.php">Under Five Children</a>

<form action="http://localhost/malowa-hc/under-five-children/store.php" method="post">
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" id="firstname"> <br>

    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" id="lastname"> <br>

    <input type="radio" id="male" name="gender" value="M">
    <label for="male">Male</label>

    <input type="radio" id="female" name="gender" value="F">
    <label for="female">Female</label> <br>

    <label for="dob">Date of birth</label>
    <input type="date" name="date_of_birth" id="dob"> <br>

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

    ?>
    <br>

    <input type="submit" value="Register">

</form>

<?php
include '../inc/footer.html.php';
?>
