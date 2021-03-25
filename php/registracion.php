<?php

    if(isset($_POST['btnReg'])){

        $firstName = $_POST['tbFirstName'];
        $lastName = $_POST['tbLastName'];
        $email = $_POST['tbMail'];
        $password = $_POST['tbPassword'];
        $username = $_POST['tbUsername'];

        $errors = [];
        $reNames = "/^[A-Z][a-z]{2,}$/";
        $rePassword = "/^[\S]{5,}$/";
        $reUsername = "/^[\w\d]{6,}$/";

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Email nije ok";
        }

        if(!preg_match($rePassword, $password)){
            $errors[] = "Lozinka nije dobra!";
        }

        if(!preg_match($reNames, $firstName)){
            $errors[] = "Ime nije dobro!";
        }

        if(!preg_match($reNames, $lastName)){
            $errors[] = "Prezime nije dobro!";
        }

        if(!preg_match($reUsername, $username)){
            $errors[] = "Korisnicko ime nije dobro!";
        }

        if(count($errors) > 0){
            $_SESSION['greske'] = $errors;
            //header("Location: ../index.php?page=reg");
        }
        else {
            require_once "connection.php";
            
            $pass = md5($password);
            $role = 2;

            $upit = "INSERT INTO korisnik VALUES('', :firstName, :lastName, :kor_ime, :email, :pass, :role_id)";
            
            $dataPrepare = $konekcija->prepare($upit);
            $dataPrepare->bindParam(":firstName", $firstName);
            $dataPrepare->bindParam(":lastName", $lastName);
            $dataPrepare->bindParam(":kor_ime", $username);
            $dataPrepare->bindParam(":email", $email);
            $dataPrepare->bindParam(":pass", $pass);
            $dataPrepare->bindParam(":role_id", $role);
            $dataPrepare->execute();

            //header("Location: ../index.php?page=home");
        }
    }
    ?>