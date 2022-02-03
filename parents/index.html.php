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
<a href="http://localhost/malowa-hc/parents/index.html.php">Parents</a>
<a href="http://localhost/malowa-hc/parents/create.html.php">Add Parents</a>


<form action="http://localhost/malowa-hc/auth/logout.php" method="post" style="display: inline;">
    <button type="submit">Logout</button>
</form>

<?php

$result = getAll('parents');

if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Vaccine Name</th>';
    echo '<th>is a special vaccine</th>';
    echo '<th>action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($parent = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $parent["vaccine_name"] . '</td>';
        if ($parent["is_special"]) {
            echo '<td style="text-align: center">Yes</td>';
        }else {
            echo '<td style="text-align: center">No</td>';   
        }
        echo '<td> <a href="https://localhost/malowa-hc/vaccines/edit.html.php?id=' 
        . $parent["id"] . '"' . '>edit</a> <button onclick="confirmDelete(' 
        . $parent["id"] . ')">delete</button></td>';
        echo '</tr>';
        echo '<form method="post" action="https://localhost/malowa-hc/vaccines/delete.php" style="display: none;" 
                id="delete-form-' . $parent["id"] . '">';
        echo '<input type="hidden" name="id" value="' . $parent["id"] . '">';
        echo '</form>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<br><br>0 results<br>';
}

include '../inc/footer.html.php';
?>