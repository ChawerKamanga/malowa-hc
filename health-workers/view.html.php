<?php
    include '../inc/authenticated.php';
    include '../inc/head.html.php';
    include '../database/crud.php';
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



$healthWorker = get1($_GET['id'], 'health_workers');

echo '<br><br>Firstname: ' . $healthWorker['firstname'] . '<br>';
echo 'Lastname: ' . $healthWorker['lastname'] . '<br>';
echo 'Email: ' . $healthWorker['email'] . '<br>';


    include '../inc/footer.html.php';
?>