<?php
/**
 *Created by bargylus.
 *FILE_NAME:index.php
 *USER:marwan
 *DATE:14.05.2020
 */
 require($_SERVER['DOCUMENT_ROOT'] . '/controler/controler.php'); 
//require "controler/controler.php";

session_start();
// to go home by default
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'anunciosPage';
}


switch ($action) {


case 'anunciosPage':

    anunciosPage();
    break;

case 'home':
 
 $id = NULL;
 $date = NULL;
 $date_old = NULL;

 if(isset($_GET['id'])){
    $id = $_GET['id'];
 }

 if(isset($_GET['date'])){
    $date = $_GET['date'];
 }

  if(isset($_GET['date_old'])){
    $date_old = $_GET['date_old'];
 }


    home2($id, $date, $date_old);
break;
    case 'signup':

$date = "";
$comite = "";
$time_init = "";
$time_init_new = "";
if(isset($_POST['date'])){
    $date = $_POST['date'];
 }
 if(isset($_POST['comite'])){
    $comite = $_POST['comite'];
 }
 if(isset($_POST['time_init'])){
    $time_init = $_POST['time_init'];
 }
 if(isset($_POST['time_init_new'])){
    $time_init_new = $_POST['time_init_new'];
 }  
 


for ($i = 0; $i < count($_POST['name']); $i++) {
$firstname[$i] = $_POST['firstname'. $i];
}

        home3($date,$_POST["adultos"],$_POST["ninos"],$_POST["culto_id"],

        $_POST["name"],$_POST["services_id"],$firstname,$_POST["users_id"],

        $_POST['id'],$_POST['service'],$_POST['first'],$_POST['last'],$comite, 

        $time_init, $time_init_new);
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
anunciosPage();

        break;
}