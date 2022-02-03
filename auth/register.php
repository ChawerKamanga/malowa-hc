<?php   

include 'auth.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$passwordConfirmation = $_POST['password_confirmation'];
$password = $_POST['password'];


$fields = array($firstname, $lastname, $email, $passwordConfirmation, $password);

foreach ($fields as $field) {
    if (empty($field)) {
        $fieldEmpty = true;  
    }
}

if ($fieldEmpty) {
    header("Location: http://localhost/malowa-hc/register/index.html.php?empty=true");
}

if (validEmail($email)) {
    header("Location: http://localhost/malowa-hc/register/index.html.php?email_taken=true");
}

if (!$fieldEmpty && passwordConfirmed($password, $passwordConfirmation)) {
    $dataOkay = true;
}else {
    header("Location: http://localhost/malowa-hc/register/index.html.php?errors=true");
}

// encrypt the password
$password = password_hash($password, PASSWORD_BCRYPT);

if ($dataOkay && save4('firstname', 'lastname', 'email', 'password', $firstname, $lastname, $email, $password, 'health_workers')){
    session_start();
    $_SESSION['email'] = $email;
    header("Location: http://localhost/malowa-hc/dashboard/index.html.php");
}
