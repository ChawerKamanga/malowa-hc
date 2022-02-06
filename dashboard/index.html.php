<?php
include '../inc/head.html.php';
include '../inc/authenticated.php';
include '../database/crud.php';

if (isset($_GET['success'])) {
    echo '<p class="text-green message">Record added successfully</p>';
}

if (isset($_GET['updated'])) {
    echo '<p class="text-green message">Record updated successfully</p>';
}

if (isset($_GET['deleted'])) {
    echo '<p class="text-green message">Record deleted successfully</p>';
}
?>

<a href="http://localhost/malowa-hc/dashboard/index.html.php">Dashboard</a>
<a href="http://localhost/malowa-hc/health-workers/index.html.php">Health Workers</a>
<a href="http://localhost/malowa-hc/under-five-children/create.html.php">Add Under Five Children</a>
<a href="http://localhost/malowa-hc/visits/index.html.php">Visits</a>
<a href="http://localhost/malowa-hc/vaccines/index.html.php">Vaccine</a>
<a href="http://localhost/malowa-hc/parents/index.html.php">Parents</a>
<a href="http://localhost/malowa-hc/purpose/index.html.php">Purposes</a>

<form action="http://localhost/malowa-hc/auth/logout.php" method="post" style="display: inline;">
    <button type="submit">Logout</button>
</form>

<?php

$result = getChildren();


if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>id</th>';
    echo '<th>Firstname</th>';
    echo '<th>Lastname</th>';
    echo '<th>Gender</th>';
    echo '<th>Age</th>';
    echo '<th>Parent</th>';
    echo '<th>Number of Vaccines</th>';
    echo '<th>action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    
    date("F jS, Y", strtotime($timestamp));

    while ($child = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $child["id"] . '</td>';
        echo '<td>' . $child["firstname"] . '</td>';
        echo '<td>' . $child["lastname"] . '</td>';

        if ($child["gender"] == 'M') {
            echo '<td style="text-align: center">Male</td>';
        }else {
            echo '<td style="text-align: center">Female</td>';
        }

        $timezone = date_default_timezone_get();
        $date = date('m/d/Y', time());

        $date1 = new DateTime($child["date_of_birth"]);
        $date2 = new DateTime($date);
        $interval = $date1->diff($date2);

        if ($interval->y > 0) {
            if ($interval->y > 1) {
                echo '<td>' . $interval->y .  ' years, ' . $interval->m. ' months '. '</td>';
            }else {
                echo '<td>' . $interval->y .  ' year, ' . $interval->m. ' months '. '</td>';
            }
        }else {
            echo '<td>' . $interval->m. ' months '. '</td>';
        }


        // echo '<td>' . date("F jS, Y", strtotime($child["date_of_birth"])) . '</td>';
        echo '<td>' . $child["parent_firstname"] . ' '. $child['parent_lastname']. '</td>';
        $countChildren = countChildren($child["id"]);
        echo '<td style="text-align: center">' . $countChildren['total_children'] . '</td>';
        echo '<td> <a href="http://localhost/malowa-hc/under-five-children/edit.html.php?id=' 
        . $child["id"] . '"' . '>edit</a> <button onclick="confirmDelete(' 
        . $child["id"] . ')">delete</button></td>';
        echo '</tr>';
        echo '<form method="post" action="http://localhost/malowa-hc/under-five-children/delete.php" style="display: none;" 
                id="delete-form-' . $child["id"] . '">';
        echo '<input type="hidden" name="id" value="' . $child["id"] . '">';
        echo '</form>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<br><br>0 results<br>';
}
?>



<?php

include '../inc/footer.html.php';
?>