<?php
include '../inc/head.html.php';
include '../inc/authenticated.php';
include '../database/crud.php';

if (isset($_GET['empty'])) {
    echo '<p class="text-red message">Invalid data please fill in all the fields</p>';
}

if (isset($_GET['special_vaccine'])) {
    echo '<p class="text-red message">A male child can not recive that vaccine</p>';
}
?>

<a href="http://localhost/malowa-hc/dashboard/index.html.php">Dashboard</a>
<a href="http://localhost/malowa-hc/visits/index.html.php">Visits</a>

<form action="http://localhost/malowa-hc/visits/store.php" method="post">

    <?php
    $result = getAll('under_five_children');

    if ($result->num_rows > 0) {
        echo '<select name="child_id" id="child">';
        echo '<option value="">--Please choose a child--</option>';
        while ($child = $result->fetch_assoc()) {
            echo '<option value="' . $child['id'] . '">' . $child['firstname'] . ' ' . $child['lastname'] . '</option>';
        }
        echo '</select>';
    } else {
        echo '<br><br>0 results<br>';
    }

    ?>

    <?php
    $result = getAll('vaccines');

    if ($result->num_rows > 0) {
        echo '<select name="vaccine_id" id="child">';
        echo '<option value="">--Please choose a vaccine--</option>';
        while ($vaccine = $result->fetch_assoc()) {
            echo '<option value="' . $vaccine['id'] . '">' . $vaccine['vaccine_name'] . '</option>';
        }
        echo '</select>';
    } else {
        echo '<br><br>0 results<br>';
    }

    ?> <br>

    <span>Came for vaccine? </span>
    <input type="radio" id="yes" name="vaccine_visit" value="1" checked onclick="hideOptions()">
    <label for="yes" onclick="hideOptions()">Yes</label>

    <input type="radio" id="no" name="vaccine_visit" onclick="displayOptions()" value="0">
    <label for="no" onclick="displayOptions()">No</label> <br>

    <div id="disply-clicked" style="display: none;">
        <input type="checkbox" id="normal" name="normal" checked>
        <label for="normal">Normal Checkup</label>
    
        <input type="checkbox" id="malaria" name="malaria">
        <label for="malaria">Malaria</label>
    </div>

    <label for="day-of-visit">Day of visit</label>
    <input type="date" name="date_of_visit" id="day-of-visit"> <br>

    <input type="submit" value="Add Visit">

</form>

<?php
include '../inc/footer.html.php';
?>