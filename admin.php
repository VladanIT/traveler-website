<?php

    include "php/connection.php";
    $page = "";
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }

    include "views/admin/head.php";
    include "views/admin/header.php";
    include "views/admin/nav.php";

    switch($page){
        case "home":
            include "views/admin/home.php";
            break;
        case "gallery":
            include "views/admin/gallery.php";
            break;
        case "korisnici":
            include "views/admin/users.php";
            break;
        case "reservation":
            include "views/admin/reservation.php";
            break;
        case "destinacion":
            include "views/admin/destinacion.php";
            break;
        case "menu":
            include "views/admin/menu.php";
            break;
        case "messages":
            include "views/admin/messages.php";
            break;
        case "anketa":
            include "views/admin/anketa.php";
            break;
        default:
            include "views/admin/home.php";
            break;
    }

    include "views/admin/footer.php";

?>