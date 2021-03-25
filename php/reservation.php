<?php
    
    if(isset($_POST['btnReserv'])){
        
        $id = $_POST['btnReserv'];

        $errors = [];

        if(count($errors) > 0){
            $_SESSION['greske'] = $errors;
        
            //header("Location: ../index.php?page=reg");
        }
        else {
            require_once "connection.php";

            $query = "SELECT * FROM destinacions WHERE id_destinacion = :id";

            $result = $konekcija->prepare($query);
            $result->bindParam(":id", $id);
            $result->execute();

            $destinacion = $result->fetch();

            $country = $destinacion->country;
            $continent = $destinacion->continent;
            $price = $destinacion->price;
            // echo $country ." ". $continent ." ". $price;

            if($_SESSION['user']){
                $id_user = $_SESSION['user']->id_korisnik;
            }
            else{
                $id_user = $_SESSION['admin']->id_korisnik;
            }

            $query = "INSERT INTO reservation VALUES('', :country, :continent, :price, :id_user)";

            $result = $konekcija->prepare($query);
            $result->bindParam(":country", $country);
            $result->bindParam(":continent", $continent);
            $result->bindParam(":price", $price);
            $result->bindParam(":id_user", $id_user);

            $result->execute();

            header("Location: ../index.php");
        }
    }