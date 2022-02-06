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
<a href="http://localhost/malowa-hc/health-workers/create.html.php">Add Under Five purposeren</a>
<a href="">Visits</a>
<a href="http://localhost/malowa-hc/purpose/create.html.php">Add purpose</a>
<a href="">Parents</a>

<form action="http://localhost/malowa-hc/auth/logout.php" method="post" style="display: inline;">
    <button type="submit">Logout</button>
</form>

<?php

$result = getAll('purpose');

if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Purpose Name</th>';
    echo '<th>Purpose Description</th>';
    echo '<th>action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($purpose = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $purpose["purpose"] . '</td>';
        echo '<td>' . $purpose["purpose_desc"] . '</td>';
        echo '<td> <a href="http://localhost/malowa-hc/purpose/edit.html.php?id=' 
        . $purpose["id"] . '"' . '>edit</a> <button onclick="confirmDelete(' 
        . $purpose["id"] . ')">delete</button></td>';
        echo '</tr>';
        echo '<form method="post" action="http://localhost/malowa-hc/purpose/delete.php" style="display: none;" 
                id="delete-form-' . $purpose["id"] . '">';
        echo '<input type="hidden" name="id" value="' . $purpose["id"] . '">';
        echo '</form>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<br><br>0 results<br>';
}

include '../inc/footer.html.php';
?>