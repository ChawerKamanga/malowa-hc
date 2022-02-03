<?php
    include '../database/crud.php';

    function validEmail($email)
    {
        $user = getField('email', $email ,'health_workers');  
        
        if ($email === $user['email']) {
            return true;
        }

        return false;
    }

    function validPassword($password, $email)
    {
        $user = getField('email', $email ,'health_workers');

        
        if (password_verify($password, $user['password'])) {
            return true;
        }
        
        return false;
    }

    function passwordConfirmed($password, $passwordConfirm)
    {
        if ($password === $passwordConfirm) {
            return true;
        }

        return false;
    }