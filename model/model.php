<?php
/**
 *Created by bargylus.
 *FILE_NAME:model.php
 *USER:marwa
 *DATE:14.05.2020
 */


///Connexion à la base de donnée
///créer par marwan
///
function getPDO()
{
    require "model/.constant.php";
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname . ';charset=utf8', $user, $pass);
    return $dbh;
}

function getUsers()
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM users ';
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute();//execute query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client cherche tous les résultats
        $dbh = null; //refermer une connection quand on a fini
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getServices()
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM services ';
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute();//execute query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client cherche tous les résultats
        $dbh = null; //refermer une connection quand on a fini
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}



function getCulteByDate($date)
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT culte.*, comites.name_comite, comites.id_comite FROM culte JOIN comites ON comites.id_comite = culte.comite_id WHERE culte.date =:date3 ';
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute(['date3' => $date]);//execute query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client cherche tous les résultats
        $dbh = null; //refermer une connection quand on a fini
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}


function getComites()
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM comites ';
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute();//execute query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client cherche tous les résultats
        $dbh = null; //refermer une connection quand on a fini
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}





function getDataByDate($date2)
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = "SELECT us.id AS 'id', s.name, firstname,lastname,users.id AS 'users_id', culte.id AS 'culte_id', s.id AS 'services_id' FROM users_has_services us
                 LEFT  JOIN users ON users.id = us.users_id
                  JOIN culte ON culte.id = us.culte_id
                LEFT  JOIN services s ON s.id = us.services_id
						WHERE culte.date =:date4";
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute(['date4' => $date2]);//execute query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client cherche tous les résultats
        $dbh = null; //refermer une connection quand on a fini
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getUserByFirstAndLastname($firstname,$lastname)
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM users WHERE firstname =:firstname AND lastname =:lastname ';
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute(['firstname' => $firstname,'lastname'=> $lastname]);//execute query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client cherche tous les résultats
        $dbh = null; //refermer une connection quand on a fini
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}


function getServicesByName($item)
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM services WHERE name =:item ';
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute(['item' => $item]);//execute query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client cherche tous les résultats
        $dbh = null; //refermer une connection quand on a fini
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}




function createCulto($oneUser)
{
    $dbh = getPDO();
    try {
        $query = "INSERT INTO culte(date,adultos,ninos) 
                  VALUES  (:date2,:adultos,:ninos,:comite_id)";
        $stmt = $dbh->prepare($query);
        $stmt->execute($oneUser);

        $id =   $dbh->lastInsertId();
        $dbh = null;
        return $id;
    } catch (PDOException $e) {
        print "Error!:" . $e->getMessage() . "<br/>";
        die();
    }
    //
}


function updateCulto($delivery)
{
    try {
        $dbh = getPDO();
        $query = "UPDATE  culte set 
                  date = :date2, 
                  adultos =:adultos, 
                  ninos =:ninos,
                  comite_id =:comite_id
                  WHERE id =:id";
        $statment = $dbh->prepare($query);
        $statment->execute($delivery);//prepare query
       //prepare result for client
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

function getisExist($users_id,$services_id,$culte_id)
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM users_has_services WHERE users_id =:users_id AND services_id =:services_id AND culte_id =:culte_id';
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute(['users_id' => $users_id,'services_id'=> $services_id,'culte_id' => $culte_id]);//execute query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client cherche tous les résultats
        $dbh = null; //refermer une connection quand on a fini
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function createData($oneUser)
{
    $dbh = getPDO();
    try {
        $query = "INSERT INTO users_has_services(users_id,services_id,culte_id) 
                  VALUES  (:users_id,:services_id,:culte_id)";
        $stmt = $dbh->prepare($query);
        $stmt->execute($oneUser);

        $id =   $dbh->lastInsertId();
        $dbh = null;
        return $id;
    } catch (PDOException $e) {
        print "Error!:" . $e->getMessage() . "<br/>";
        die();
    }
    //
}

    function deleteData3($id)
    {
        try {
            $dbh = getPDO();
            $query = 'DELETE from users_has_services WHERE id=:id';
            $statment = $dbh->prepare($query);
            $statment->execute(['id' => $id]);
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return null;
        }
    }


function updateDataById($user,$service,$id){
    try {
        $dbh = getPDO();
        $query = 'UPDATE users_has_services set users_id =:users_id, services_id=:services_id WHERE id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['users_id' => $user, 'services_id' => $service, 'id' => $id]);//prepare query
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}


function getUserIfExist($firstname,$lastname)
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM users WHERE firstname =:firstname AND lastname =:lastname';
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute(['firstname' => $firstname,'lastname'=> $lastname]);//execute query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client cherche tous les résultats
        $dbh = null; //refermer une connection quand on a fini
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function addUserModel($firstname,$lastname)
{
    $dbh = getPDO();
    try {
        $query = "INSERT INTO users(firstname,lastname) 
                  VALUES  (:firstname,:lastname)";
        $stmt = $dbh->prepare($query);
        $stmt->execute([ 'firstname' => $firstname, 'lastname' => $lastname]);

        $id =   $dbh->lastInsertId();
        $dbh = null;
        return $id;
    } catch (PDOException $e) {
        print "Error!:" . $e->getMessage() . "<br/>";
        die();
    }
}

function getServiceIfExist($service)
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM services WHERE name =:name';
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute(['name' => $service]);//execute query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client cherche tous les résultats
        $dbh = null; //refermer une connection quand on a fini
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}


function addServiceModel($service)
{
    $dbh = getPDO();
    try {
        $query = "INSERT INTO services(name) 
                  VALUES  (:name)";
        $stmt = $dbh->prepare($query);
        $stmt->execute([ 'name' => $service]);

        $id =   $dbh->lastInsertId();
        $dbh = null;
        return $id;
    } catch (PDOException $e) {
        print "Error!:" . $e->getMessage() . "<br/>";
        die();
    }
}


function getEvents()
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM events e JOIN comites c ON e.comite_id = c.id_comite';
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute();//execute query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client cherche tous les résultats
        $dbh = null; //refermer une connection quand on a fini
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}


