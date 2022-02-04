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
<a href="">Health Workers</a>
<a href="http://localhost/malowa-hc/health-workers/create.html.php">Add Under Five vaccineren</a>
<a href="">Visits</a>
<a href="http://localhost/malowa-hc/vaccines/create.html.php">Add Vaccine</a>
<a href="http://localhost/malowa-hc/visits/create.html.php">Add Visit</a>
<a href="">Parents</a>

<form action="http://localhost/malowa-hc/auth/logout.php" method="post" style="display: inline;">
    <button type="submit">Logout</button>
</form>

<?php

$result = getVisits();

if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>child</th>';
    echo '<th>vaccine</th>';
    echo '<th>date_of_visit</th>';
    echo '<th>action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($visit = $result->fetch_assoc()) {
        
        echo '<tr>';
        echo '<td>' . $visit["firstname"] . ' ' . $visit["lastname"]. '</td>';
        echo '<td>' . $visit["vaccine_name"] . '</td>';
        echo '<td>' . $visit["date_of_visit"] . '</td>';
        
        echo '<td style="text-align: center"> <button onclick="confirmDelete(' 
        . $visit["id"] . ')">delete</button></td>';
        echo '</tr>';
        echo '<form method="post" action="https://localhost/malowa-hc/visits/delete.php" style="display: none;" 
                id="delete-form-' . $visit["id"] . '">';
        echo '<input type="hidden" name="id" value="' . $visit["id"] . '">';
        echo '</form>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<br><br>0 results<br>';
}

include '../inc/footer.html.php';
?>