<?php
    @ob_start();
    session_start();
    include "php/connection.php";
    $page = "";
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }

    include "views/front/head.php";
    include "views/front/nav.php";

    switch($page){
        case "home":
            include "views/front/home.php";
            include "php/login.php";
            break;
        case "destinacion":
            include "views/front/destinacion.php";
            break;
        case "contact":
            include "views/front/contact.php";
            break;
        case "hotel":
            include "views/front/hotels.php";
            break;
        case "reg":
            include "views/front/reg.php";
            include "php/registracion.php";
            break;
        case "gallery":
            include "views/front/gallery.php";
            break;
        case "autor":
            include "views/front/autor.php";
            break;
        case "anketa":
            include "views/front/anketa.php";
            break;
        default:
            include "views/front/home.php";
            include "php/login.php";
            break;
    }

    include "views/front/footer.php";

?>