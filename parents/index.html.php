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
    echo '<th>Firstame</th>';
    echo '<th>Lastname</th>';
    echo '<th>gender</th>';
    echo '<th>Number of children</th>';
    echo '<th>action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($parent = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $parent["firstname"] . '</td>';
        echo '<td>' . $parent["lastname"] . '</td>';
        if ($parent["gender"] === 'M') {
            echo '<td style="text-align: center">Male</td>';
        }else {
            echo '<td style="text-align: center">Female</td>';   
        }

        $countChildren = countParentChild($parent["id"]);

        if ($countChildren['total_children'] >= 5) {
            echo '<td style="color: red; text-align: center">'. $countChildren['total_children']  . '</td>';
        }else {
            echo '<td style="text-align: center">' . $countChildren['total_children'] .'</td>';
        }

        echo '<td> <a href="http://localhost/malowa-hc/parents/edit.html.php?id=' 
        . $parent["id"] . '"' . '>edit</a> <button onclick="confirmDelete(' 
        . $parent["id"] . ')">delete</button></td>';
        echo '</tr>';
        echo '<form method="post" action="http://localhost/malowa-hc/parents/delete.php" style="display: none;" 
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