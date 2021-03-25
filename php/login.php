<?php
    
    if(isset($_POST['btnLogin'])){

        $password = $_POST['tbPass'];
        $username = $_POST['tbUser'];

        $errors = [];
        $rePassword = "/^[\S]{5,}$/";
        $reUsername = "/^[\w\d]{6,}$/";

        if(!preg_match($rePassword, $password)){
            $errors[] = "Lozinka nije dobra!";
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

            $upit = "SELECT * FROM korisnik k INNER JOIN uloga u ON k.uloga_id = u.id_uloga WHERE korisnicko_ime = :username AND lozinka = :pass";

            $login = $konekcija->prepare($upit);
            $login->bindParam(":username", $username);
            $login->bindParam(":pass", $pass);
            $login->execute();
            
            $user = $login->fetch();
            $uloga = $user->uloga_id;
            if($user){
                if($uloga == 2){
                    $_SESSION['user'] = $user;
                    header("Location: index.php?page=destinacion");
                }
                if($uloga == 1){
                    $_SESSION['admin'] = $user;
                    header("Location: admin.php");
                }
            }
        }
    }