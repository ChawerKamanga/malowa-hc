<?php
    include '../inc/head.html.php';
    include '../inc/authenticated.php';
    include '../database/crud.php';

    if (isset($_GET['empty'])) {
        echo '<p class="text-red">Invalid data please fill in all the fields</p>';
    }
?>

<a href="http://localhost/malowa-hc/dashboard/index.html.php">Dashboard</a>
<a href="http://localhost/malowa-hc/visits/index.html.php">Visits</a>

<form action="http://localhost/malowa-hc/visits/store.php" method="post">

    <?php
        $result = getAll('under_five_children');

        if ($result->num_rows > 0) {
            echo '<select name="child_id" id="child">';
                echo '<option value="">--Please choose an child--</option>';
                while ($child = $result->fetch_assoc()) { 
                    echo '<option value="' . $child['id'] .'">'. $child['firstname'] . ' ' . $child['lastname'] .'</option>';
                }
            echo '</select>';
        }else {
            echo '<br><br>0 results<br>';
        }

    ?> 

    <?php
        $result = getAll('vaccines');

        if ($result->num_rows > 0) {
            echo '<select name="vaccine_id" id="child">';
                echo '<option value="">--Please choose a vaccine--</option>';
                while ($vaccine = $result->fetch_assoc()) { 
                    echo '<option value="' . $vaccine['id'] .'">'. $vaccine['vaccine_name'] .'</option>';
                }
            echo '</select>';
        }else {
            echo '<br><br>0 results<br>';
        }

    ?> <br>

   
    <label for="day-of-visit">Day of visit</label>
    <input type="date" name="date_of_visit" id="day-of-visit"> <br>

    <input type="submit" value="Add Visit">

</form>

<?php
include '../inc/footer.html.php';
?>
