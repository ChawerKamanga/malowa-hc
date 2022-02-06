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

<form action="http://localhost/malowa-hc/under-five-children/store.php" method="post" id="date-form" onsubmit="validateDate(event)">
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" id="firstname"> <br>

    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" id="lastname"> <br>

    <input type="radio" id="male" name="gender" value="M" required>
    <label for="male">Male</label>

    <input type="radio" id="female" name="gender" value="F" required>
    <label for="female">Female</label> <br>

    <label for="dob">Date of birth</label>
    
    <?php
        date_default_timezone_set('CAT/UTC+2');
        $todaysDate = date('Y-m-d');


        $date = strtotime($todaysDate .' -5 year');
        $fiveYearsAgo = date('Y-m-d', $date);
    ?>

    <input type="date" id="date" name="date_of_birth" id="dob" min="<?=$fiveYearsAgo?>" max="<?=$todaysDate?>" required> <br>

    <?php
        $result = getAll('parents');

        if ($result->num_rows > 0) {
            echo '<select name="parent" id="parent" required>';
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

    <input type="submit" value="Add Child">

</form>

<?php
include '../inc/footer.html.php';
?>
