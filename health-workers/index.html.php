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
<a href="http://localhost/malowa-hc/health-workers/create.html.php">Add Under Five healthWorkerren</a>
<a href="">Visits</a>
<a href="">Vaccine</a>
<a href="">Parents</a>

<form action="http://localhost/malowa-hc/auth/logout.php" method="post" style="display: inline;">
    <button type="submit">Logout</button>
</form>

<?php

$result = getAll('health_workers');

if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Firstname</th>';
    echo '<th>Lastname</th>';
    echo '<th>email</th>';
    echo '<th>action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($healthWorker = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $healthWorker["firstname"] . '</td>';
        echo '<td>' . $healthWorker["lastname"] . '</td>';
        echo '<td>' . $healthWorker["email"] . '</td>';

        if ($_SESSION['email'] === $healthWorker["email"]) {
            echo '<td style="text-align: center"> <a href="https://localhost/malowa-hc/health-workers/edit.html.php?id=' 
            . $healthWorker["id"] . '"' . '>edit</a> ';
            echo '</tr>';
        }else {
            echo '<td style="text-align: center"> <a href="https://localhost/malowa-hc/health-workers/view.html.php?id=' 
            . $healthWorker["id"] . '"' . '>view</a></td>';
            echo '</tr>';
        }
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<br><br>0 results<br>';
}

include '../inc/footer.html.php';
?>