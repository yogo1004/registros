<?php
/**
 *Created by bargylus.
 *FILE_NAME:index.php
 *USER:marwan
 *DATE:14.05.2020
 */

require "controler/controler.php";

session_start();
// to go home by default
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}


switch ($action) {




    case 'signup':
        home3($_POST["date"],$_POST["adultos"],$_POST["ninos"],$_POST["culto_id"],$_POST["name"],$_POST["services_id"],$_POST["firstname"],$_POST["users_id"],$_POST['id'],$_POST['service'],$_POST['first'],$_POST['last']);
        break;
    case 'deleteData':
        deleteData2($_GET['id']);
        break;
    case 'addUser':
        addUser($_POST['firstname'],$_POST['lastname']);
    break;
    case 'addService':
        addService($_POST['service']);
        break;
    default :
        home2();

        break;
}