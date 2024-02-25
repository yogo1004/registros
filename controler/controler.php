<?php
require "model/model.php";


function home2($id_event, $date_event,$date_old)
{
    $event = getEventById($id_event);

    if ($id_event == NULL){

        if ($date_event !=  NULL) {
        $date = $date_event;
        $_SESSION["date_now"] = $date_event;
        } else {

            $date = date("Y-m-d");
            $_SESSION["date_now"] = date("Y-m-d");
        }

         $events = getCulteByDate($_SESSION["date_now"]);
         if(isset($events[0])){
            $event = $events[0];
         }
        
        
    } else{
        if ($date_event !=  NULL) {

            if($date_event == $date_old) {

            $_SESSION["date_now"] = $date_event;
            $date = $date_event;
            } else{
              
                if($date_old == null){
                    $yo = getCulteById($id_event);



                      if($yo == null){
                        $_SESSION["date_now"] = $date_event;
                        $date = $date_event;
                    } else {
                        $_SESSION["date_now"] = $yo['date'];
                        $date = $yo['date'];
                    }
                
                }else{
                    $yo = getCulteByDate($date_event);
                        

                      if($yo[0] == NULL){
                       
                        $_SESSION["date_now"] = $date_event;
                        $date = $date_event;
                    } else {
                        $_SESSION["date_now"] = $yo[0]['date'];
                        $date = $yo[0]['date'];
                    }
                }
              
          
           
            }

           
        }
        else {  
            $yo = getCulteByDate($date_event);
         
            $_SESSION["date_now"] = $yo[0]['date'];
            $date = $yo[0]['date'];
        }

        
    }
   
   
    $_SESSION["date"] = $date;
    $users = getUsers();
    $services = getServices();

     $comites = getComites();
     
    $Allcultos = getCulteByDate($_SESSION["date"]);


    if($id_event == NULL ){
        if(!empty($Allcultos)){
            $cultos =  getCulteByDateAndTime($Allcultos[0]['date'], $Allcultos[0]['time_init'],$Allcultos[0]['name_event']);
        }
        
    } else{
        if($date_event != $date_old){
            if($date_old == NULL){
            $cultos =  getCulteById($id_event);
            }else{
                $cultos =  getCulteByDateAndTime($Allcultos[0]['date'], $Allcultos[0]['time_init'],$Allcultos[0]['name_event']);
            }
        }else{
            $cultos =  getCulteById($id_event);
        }
        
    }

/*

      if ($id_event == NULL || $date_old == null){
         $cultos =  getCulteById($id_event);
        }else{
            $cultos =  getCulteByDateAndTime($Allcultos[0]['date'], $Allcultos[0]['time_init'],$Allcultos[0]['name_event']);
        }
       
   */

  
        if(isset($cultos) == null || $cultos == false){
                $cultos = [
                    'date' => $_SESSION["date"]
                ];
    
        }
 

if(array_key_exists('time_init', $cultos)){
    $datas = getDataByDate($cultos["date"], $cultos["time_init"]);
    
    $base = [
        0 => [
            'name' => 'Recepción',
        ],
        1 => [
            'name' => 'Anuncios',
        ],
        2 => [
            'name' => 'Dirección',
        ],
        3 => [
            'name' => 'Vocalización',
        ],
        4 => [
            'name' => 'Bateria',
        ],
        5 => [
            'name' => 'Especial',
        ],
        6 => [
            'name' => 'Piano',
        ],
        7 => [
            'name' => 'Traducción',
        ],
        
        8 => [
               'name' => 'Transmisión',
        ],
        9 => [
            'name' => 'Proyección',
        ],
        10 => [
            'name' => 'Bajo',
        ],
        11 => [
            'name' => 'Ofrenda',
        ],
        12 => [
            'name' => 'Cocina',
        ],
        13 => [
            'name' => 'Guitarra',
        ],
    ];

        foreach ($base as $key => $b) {
            if (!in_array($b['name'], array_column($datas, 'name'))) {
            //    $datas[sizeof($datas)]['name'] = $b['name'];
            }

        }
}

    require_once 'view/home.php';
}

function home3($dateNew, $adultos, $ninos, $culto_id, $servicio_nombre, $services_id, $firstname, $users_id, $id, $service, $first, $last, $comite_id, $time_init,$time_init_new)
{

    $comites = getComites();
    $event = getEventById($culto_id);

 
    if(isset($_SESSION["date"])){
        $_SESSION["date_now"] = date("Y-m-d");
    }else{

        $_SESSION["date_now"] = $_SESSION["date"];
    }
   

    
    if(isset($firstname)){

$users= [];
$i = 0;
foreach ($firstname as $keyTOTAL => $itemTOTAL) {
 if(!is_null($itemTOTAL)){
 
    foreach ($itemTOTAL as $key => $item) {
         
            
                $userOld = explode(" ", ucwords(strtolower($item)));

                if($userOld[0] != ""){
                    $users[$i][$key] = getUserByFirstAndLastname($userOld[0], $userOld[1]);

                }
          }
    }
      if(!is_null($itemTOTAL)){
            $i++;
            
      }
}

    }
    



$i = 0;
$ii = 0;
    foreach ($servicio_nombre as $key => $item) {

        if(!is_null($firstname[$i])){
        $services[$i] = getServicesByName($item);
        $fi[$ii] =$services[$i];

        $id22[$ii] = $id[$i];
          

        $ii++;
         }
         $i++;
    }
   

   //   $id = $id22;
     // $id = array_filter($id);
$services = $fi;
foreach ($services as $key => $item) {
            for($j = 0; $j < count($id); $j++){
            $dataTemp = getDataById($id[$j]);
           // var_dump($dataTemp);    
        }

}

   // var_dump("SERVICES2",$services2);

    if (!($culto_id == "" &&( $ninos == "" || $ninos == 0) && ( $adultos == "" || $adultos == 0) && empty($firstname))) {


        $cultos = getCulteById($culto_id);
      
      //////////////////// CREATE OR UPDATE         'EVENT ' . substr(md5(rand()), 0, 9)  
            if (isset($cultos['id_event']) == false) {

            } else {
                  $oneCulto = [
                    
                    'id' => $culto_id,
                    'name_event' => $cultos['name_event'],
                    'date2' => $cultos['date'],
                    'time_init' => $cultos['time_init'],
                    'comite_id' => $cultos['comite_id'],
                    'siblings' => $adultos,
                    'friends' => $ninos
                ];


                if ($adultos == "") {
                    $oneCulto['siblings'] = 0;
                }
                if ($ninos == "") {
                    $oneCulto['friends'] = 0;
                }
                updateCulto($oneCulto);
            }
    
      $oneCulto = [
                    
                    'id' => $culto_id,
                    'name_event' => $cultos['name_event'],
                    'date2' => $cultos["date"],
                    'time_init' => $cultos['time_init'],
                    'comite_id' => $cultos['comite_id'],
                    'siblings' => $adultos,
                    'friends' => $ninos
                ];


              
 //var_dump($id);
        if ($servicio_nombre != "") {
            $length = count($users);
 //               var_dump("SERVICES",$services);

 //var_dump("USERS",$users); 

  foreach ($users as $keyUser => $oneUser) {
 // var_dump("KEY",$keyUser);
 //  echo "<br>";
//var_dump("key3", $keyUser);

        foreach ($oneUser as $key3 => $user) {
            
            
             //   if(!isset($user)) {
             //       $user['id'] = null;
             //      // var_dump('user is null',$user);
             //   }
             //   if(!isset($services[$keyUser])){
             //       $services[$keyUser]['id'] = "-1";
             //   } 
             //   if(!isset($oneCulto)) {
             //       $oneCulto['id'] = "-1";
             //   } 
         if(isset($user) && isset($services[$keyUser]['id']) && isset($oneCulto['id'])) {
                $isExist = getisExist($user['id'], $services[$keyUser]['id'], $oneCulto['id']);
            //    var_dump('EXIST',$isExist);
         }
             
              
          
                if (!isset($id[$keyUser]) && is_bool($isExist)) {
                  
                    if(array_key_exists('id', $user)){
                        $oneUser = [
                            'users_id' => $user['id'],
                            'services_id' => $services[$keyUser]['id'],
                            'event_id' => $culto_id
                        ];
                        createData($oneUser);
                    }
         
                } else {

                        if (!$services[$keyUser]) {
                            echo "TOTO<br>";
                            deleteData3($id[$keyUser]);
                        } else {
                            if(!is_null($user)) {
                            var_dump($user["id"]);

                         $ididi =   getDataByUserAndService($user["id"],$services[$keyUser]['id']);
                                echo 'user:'.$user["id"].' |  service: '. $services[$keyUser]['id'] . ' |  id'. $id[$keyUser] . '<br>';
                               updateDataById($user["id"], $services[$keyUser]["id"], $ididi);
                           }
                        }
                }
        }
        echo "END<br>";
            }
        //////////////////////////////////    }
        }
        if ($first != null && $last != null) {
            $first = ucwords(strtolower($first));
            $last = ucwords(strtolower($last));
            $isExist = getUserIfExist($first, $last);

            if ($isExist == null && $first != null && $last != null) {
                $id = addUserModel($first, $last);
            }
        }

        if ($service != null) {
            $service = ucwords(strtolower($service));
            $isExist = getServiceIfExist($service);

            if ($isExist == null && $service != null) {
                $id = addServiceModel($service);
            }
        }
    }



    $_SESSION["date"] = $dateNew;
    if ($_SESSION["date"] == null) {
        

        $_SESSION["date"] = date("Y-m-d");
    }

    $usersAll = getUsers();
    $services = getServices();

if( $event['time_init'] == NULL){
      
  $cultos = getCulteByDateAndTime($_SESSION["date"], $time_init_new, $event['name_event']);
}else {
   
    $cultos = getCulteById($culto_id);
}

   
    if (isset($cultos) == false) {
        $cultos = [
            'date' => $_SESSION["date"]
        ];
    }

   
 $Allcultos = getCulteByDate($cultos['date']);
$listServices = getServices();

foreach ($listServices as $key => $value) {
    $datasNew[$key] = getDataByDateAndServiceId($cultos["date"], $cultos["time_init"],$value['id']);
 }
// $datasNew = array_filter($datasNew);

  

    $datas = getDataByDate($cultos["date"], $cultos["time_init"]);
   

    $base = [
        0 => [
            'name' => 'Recepción',
        ],
        1 => [
            'name' => 'Anuncios',
        ],
        2 => [
            'name' => 'Dirección',
        ],
        3 => [
            'name' => 'Vocalización',
        ],
        4 => [
            'name' => 'Bateria',
        ],
        5 => [
            'name' => 'Especial',
        ],
        6 => [
            'name' => 'Piano',
        ],
        7 => [
            'name' => 'Traducción',
        ],
        
        8 => [
               'name' => 'Transmisión',
        ],
        9 => [
            'name' => 'Proyección',
        ],
        10 => [
            'name' => 'Bajo',
        ],
        11 => [
            'name' => 'Ofrenda',
        ],
        12 => [
            'name' => 'Cocina',
        ],
        13 => [
            'name' => 'Guitarra',
        ],
    ];
        foreach ($base as $key => $b) {
            if (!in_array($b['name'], array_column($datas, 'name'))) {
                $datas[sizeof($datas)]['name'] = $b['name'];
            }

        }
  $datasNew = array_filter($datasNew);

$iii = 0;
  foreach ($datasNew as $key => $b) {
$datasNew2[$iii] = $datasNew[$key] ;
$iii++;
  }


  $datasNew = $datasNew2;
    $coco = [];
    $ii = 0;
    foreach($datasNew as $key2 => $b2) {

             if (in_array($b2[0]['name'], array_column($base, 'name'))) {
                   $newList2[$ii]['name'] =  $b2[0]['name'];
                   $ii++;
             }
    }




           foreach ($base as $key => $b) {
            if (!in_array($b['name'], array_column($newList2, 'name'))) {
                $datasNew[sizeof($datasNew)][0]['name'] = $b['name'];
            }
        }

    require_once 'view/home.php';
}


function deleteData2($id)
{

    deleteData3($id);
}

function addUser($firstname, $lastname)
{
    $_SESSION["date_now"] = date("Y-m-d");
    $firstname = ucwords(strtolower($firstname));
    $lastname = ucwords(strtolower($lastname));
    $isExist = getUserIfExist($firstname, $lastname);

    if ($isExist == null && $firstname != null && $lastname != null) {
        $id = addUserModel($firstname, $lastname);
    }
    $users = getUsers();
    $services = getServices();

    $cultos = getCulteByDate($_SESSION["date"]);

    if (!$cultos) {
        $cultos = [
            'date' => $_SESSION["date"]
        ];
    }
    $datas = getDataByDate($_SESSION["date"], $cultos['time_init']);
    $base = [
        0 => [
            'name' => 'Recepción',
        ],
        1 => [
            'name' => 'Anuncios',
        ],
        2 => [
            'name' => 'Dirección',
        ],
        3 => [
            'name' => 'Vocalización',
        ],
        4 => [
            'name' => 'Bateria',
        ],
        5 => [
            'name' => 'Especial',
        ],
        6 => [
            'name' => 'Piano',
        ],
        7 => [
            'name' => 'Traducción',
        ],
        
        8 => [
               'name' => 'Transmisión',
        ],
        9 => [
            'name' => 'Proyección',
        ],
        10 => [
            'name' => 'Bajo',
        ],
        11 => [
            'name' => 'Ofrenda',
        ],
        12 => [
            'name' => 'Cocina',
        ],
        13 => [
            'name' => 'Guitarra',
        ],
    ];
    if ($_SESSION['date'] >= $_SESSION['date_now']) {
        foreach ($datas as $key => $b) {
            if (!in_array($b['name'], array_column($datas, 'name'))) {
                $datas[sizeof($datas)]['name'] = $b['name'];
            }

        }
    }
    
    require_once 'view/home.php';
}

function addService($service)
{
    $service = ucwords(strtolower($service));
    $_SESSION["date_now"] = date("Y-m-d");
    $isExist = getServiceIfExist($service);

    if ($isExist == null && $service != null) {
        $id = addServiceModel($service);
    }

    $users = getUsers();
    $services = getServices();

    $cultos = getCulteByDate($_SESSION["date"]);

    if (!$cultos) {
        $cultos = [
            'date' => $_SESSION["date"]
        ];
    }
    $datas = getDataByDate($_SESSION["date"], $cultos[0]["time_init"]);
    $base = [
        0 => [
            'name' => 'Recepción',
        ],
        1 => [
            'name' => 'Anuncios',
        ],
        2 => [
            'name' => 'Dirección',
        ],
        3 => [
            'name' => 'Vocalización',
        ],
        4 => [
            'name' => 'Bateria',
        ],
        5 => [
            'name' => 'Especial',
        ],
        6 => [
            'name' => 'Piano',
        ],
        7 => [
            'name' => 'Traducción',
        ],
        
        8 => [
               'name' => 'Transmisión',
        ],
        9 => [
            'name' => 'Proyección',
        ],
        10 => [
            'name' => 'Bajo',
        ],
        11 => [
            'name' => 'Ofrenda',
        ],
        12 => [
            'name' => 'Cocina',
        ],
        13 => [
            'name' => 'Guitarra',
        ],
    ];
    if ($_SESSION['date'] >= $_SESSION['date_now']) {
        foreach ($base as $key => $b) {
            if (!in_array($b['name'], array_column($datas, 'name'))) {
                $datas[sizeof($datas)]['name'] = $b['name'];
            }

        }
    }
    require_once 'view/home.php';

}

function nouveau()
{
    $users = getUsers();
    $services = getServices();

    $cultos = getCulteByDate($_SESSION["date"]);

    if (!$cultos) {
        $cultos = [
            'date' => $_SESSION["date"]
        ];
    }
    $datas = getDataByDate($_SESSION["date"], $cultos[0]['time_init']);

    require_once 'view/home.php';
}
function anunciosPage(){
    $events = getEvents();
    require_once 'view/anounces.php';
}
