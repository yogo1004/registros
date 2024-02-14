<?php
require "model/model.php";


function home2($id_event)
{
    // date("Y-m-d") "2023-02-22"

 var_dump($id_event); 
$event = getEventById($id_event);


    if ($id_event == NULL){
         $date = date("Y-m-d");
        $_SESSION["date_now"] = date("Y-m-d");
    } else{
        $date = $event['date'];
         $_SESSION["date_now"] = $event['date'];
    }
   
   
    $_SESSION["date"] = $date;
    $users = getUsers();
    $services = getServices();

     $comites = getComites();
    $Allcultos = getCulteByDate($_SESSION["date"]);
     $cultos =  getCulteByDateAndTime($Allcultos[0]['date'], $Allcultos[0]['time_init']);



    
    if (!$cultos) {
        $cultos = [
            'date' => $_SESSION["date"]
        ];
    }
 
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

    if ($_SESSION['date'] >= $_SESSION['date_now']) {
        foreach ($base as $key => $b) {
            if (!in_array($b['name'], array_column($datas, 'name'))) {
                $datas[sizeof($datas)]['name'] = $b['name'];
            }

        }
    }
    require_once 'view/home.php';
}

function home3($dateNew, $adultos, $ninos, $culto_id, $servicio_nombre, $services_id, $firstname, $users_id, $id, $service, $first, $last, $comite_id, $time_init,$time_init_new)
{

    $comites = getComites();
    $event = getEventById($time_init);
    if(isset($_SESSION["date"])){
        $_SESSION["date_now"] = date("Y-m-d");
    }else{

        $_SESSION["date_now"] = $_SESSION["date"];
    }

    
    if(isset($firstname)){

    foreach ($firstname as $key => $item) {
        $userOld = explode(" ", ucwords(strtolower($item)));
      
        if($userOld[0] != ""){
            $users[$key] = getUserByFirstAndLastname($userOld[0], $userOld[1]);
        }
        
    }

    }else {
        // $users = "";
    }


    foreach ($servicio_nombre as $key => $item) {

        $services[$key] = getServicesByName($item);
    }
    if (!($culto_id == "" &&( $ninos == "" || $ninos == 0) && ( $adultos == "" || $adultos == 0) && empty($firstname))) {


        $cultos = getCulteByDateAndTime($_SESSION["date"],$event['time_init']);

        if ($adultos != "" || $ninos != "" || isset($firstname)) {

            if (isset($cultos['id_event']) == false) {
                $oneCulto = [
                    'name_event' => 'TESTE EVENT',
                    'date2' => $_SESSION["date"],   
                    'time_init' => $time_init_new,
                    'comite_id' => $comite_id,
                    'siblings' => $adultos,
                    'friends' => $ninos,
                ];


                if ($adultos == "") {
                    $oneCulto['siblings'] = 0;
                }
                if ($ninos == "") {
                    $oneCulto['friends'] = 0;
                }

                $id2 = createCulto($oneCulto);

                $oneCulto['id'] = $id2;
            } else {
                $oneCulto = [
                    
                    'id' => $cultos['id_event'],
                    'name_event' => 'TESTE EVENT234234',
                    'date2' => $_SESSION["date"],
                    'time_init' => $time_init_new,
                    'comite_id' => $comite_id,
                    'siblings' => $adultos,
                    'friends' => $ninos
                ];


                if ($adultos == "") {
                    $oneCulto['siblings'] = 0;
                }
                if ($ninos == "") {
                    $oneCulto['friends'] = 0;
                }
                   echo "<br><br>STOP22<br>";
        var_dump($oneCulto);
echo "<br>STOP<br><br>";
                updateCulto($oneCulto);
            }
        } else {

        }

      
        if ($servicio_nombre != "") {
            $length = count($servicio_nombre);
            for ($key = 0; $key < $length; $key++) {
                $isExist = getisExist($users[$key]['id'], $services[$key]['id'], $oneCulto['id']);

                if ($id[$key] == null && $isExist == null) {
                   
                    if($users[$key]['id'] != '' && $users[$key]['id'] != null && $users[$key]['id'] != false){
                        $oneUser = [
                            'users_id' => $users[$key]['id'],
                            'services_id' => $services[$key]['id'],
                            'event_id' => $oneCulto['id']
                        ];
                        
                        createData($oneUser);
                    }
                } else {
                        if ($users[$key]['id'] == false && $services[$key]['id'] == false) {
                            deleteData3($id[$key]);
                        } else {
                            
                            updateDataById($users[$key]['id'], $services[$key]['id'], $id[$key]);
                            
                        }
                }

            }
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

    $users = getUsers();
    $services = getServices();

    $cultos = getCulteByDateAndTime($_SESSION["date"], $time_init_new);
    if (isset($cultos['id_event']) == false) {
        $cultos = [
            'date' => $_SESSION["date"]
        ];
    }
 $Allcultos = getCulteByDate($_SESSION["date"]);

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
   //if ($_SESSION['date'] >= $_SESSION['date_now']) {
        foreach ($base as $key => $b) {
            if (!in_array($b['name'], array_column($datas, 'name'))) {
                $datas[sizeof($datas)]['name'] = $b['name'];
            }

        }
  //  }
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