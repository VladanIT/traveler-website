<?php

    if(isset($_POST['btnInsert'])){

        $title = $_POST['tbTitle'];
        $price = $_POST['tbPrice'];
        $about = $_POST['taAbout'];
        $continent = $_POST['tbContinent'];
        $country = $_POST['tbCountry'];
        $picture = $_FILES['picture'];

        //var_dump($picture);
        $file_name = $picture['name'];
        $file_type = $picture['type'];
        $file_size = $picture['size'];
        $file_tmp = $picture['tmp_name'];

        $errors = [];
        $reTitle = "/^[\w\d\s]{2,}$/";
        $rePrice = "/^[\d]{1,10000}$/";
        $reAbout = "/^[\s\S]{120,150}$/";
        $reContinent = "/^[\w]{3,}$/";
        $reCountry = "/^[\w]{3,}$/";

        if(!preg_match($reTitle, $title)){
            $errors[] = "Naslov mora sadrzati samo slova i brojeve. Vratite se i pokusajte ponovo.";
        }

        if(!preg_match($rePrice, $price)){
            $errors[] = "Cena nije ispravna. Vratite se i pokusajte ponovo.";
        }

        if(!preg_match($reAbout, $about)){
            $errors[] = "Opis nije dobar. Vratite se i pokusajte ponovo.";
        }

        if(!preg_match($reContinent, $continent)){
            $errors[] = "Kontinent nije dobar. Vratite se i pokusajte ponovo.";
        }

        if(!preg_match($reCountry, $country)){
            $errors[] = "Drzava nije dobra. Vratite se i pokusajte ponovo.";
        }

        $formats = array("image/jpg", "image/jpeg", "image/png", "image/gif");

        if(!in_array($file_type, $formats)){
            $errors[] = "Tip fajla nije dobar.";
        }

        if($file_size > 10000000){
            $errors[] = "Fajl mora biti manji od 10MB.";
        }

        if(count($errors) > 0){
            // $_SESSION['greske'] = $errors;
            //header("Location: ../admin.php?page=gallery");
            echo "<ul>";

                foreach($errors as $error){
                    echo "<li> $error </li>";
                }
            
            echo "</ul>";
        }
        else {

            $file_name = time()."_".$file_name;
            $new_src = "../destinacions/".$file_name;
            $new_src_picture = "destinacions/".$file_name;

            if(move_uploaded_file($file_tmp, $new_src)){
                
                require_once "connection.php";

                $upit = "INSERT INTO destinacions VALUES('', :title, :src, :price, :about, :continent, :country)";
                
                $dataPrepare = $konekcija->prepare($upit);
                $dataPrepare->bindParam(":title", $title);
                $dataPrepare->bindParam(":src", $new_src_picture);
                $dataPrepare->bindParam(":price", $price);
                $dataPrepare->bindParam(":about", $about);
                $dataPrepare->bindParam(":continent", $continent);
                $dataPrepare->bindParam(":country", $country);

                $dataPrepare->execute();

                header("Location: ../admin.php?page=destinacion");
            }
        }
    }