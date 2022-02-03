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
<a href="">Visits</a>
<a href="http://localhost/malowa-hc/vaccines/index.html.php">Vaccine</a>
<a href="">Parents</a>

<form action="http://localhost/malowa-hc/auth/logout.php" method="post" style="display: inline;">
    <button type="submit">Logout</button>
</form>

<?php

$result = getAll('under_five_children');

if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>id</th>';
    echo '<th>Firstname</th>';
    echo '<th>Lastname</th>';
    echo '<th>Gender</th>';
    echo '<th>Date Of Birth</th>';
    echo '<th>Parent</th>';
    echo '<th>Number of Vaccines</th>';
    echo '<th>action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($child = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $child["id"] . '</td>';
        echo '<td>' . $child["firstname"] . '</td>';
        echo '<td>' . $child["lastname"] . '</td>';
        echo '<td>' . $child["gender"] . '</td>';
        echo '<td>' . $child["date_of_birth"] . '</td>';
        echo '<td>' . $child["parent_id"] . '</td>';
        echo '<td>' . 1 . '</td>';
        echo '<td> <a href="https://localhost/malowa-hc/under-five-children/edit.html.php?id=' 
        . $child["id"] . '"' . '>edit</a> <button onclick="confirmDelete(' 
        . $child["id"] . ')">delete</button></td>';
        echo '</tr>';
        echo '<form method="post" action="https://localhost/malowa-hc/under-five-children/delete.php" style="display: none;" 
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