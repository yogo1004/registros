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
function getCulto()
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM culte ';
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
        $query = 'SELECT * FROM culte c WHERE c.date =:date3 ';
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

function getData()
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = "SELECT s.name, firstname,lastname,users.id AS 'users_id', culte.id AS 'culte_id', s.id AS 'services_id' FROM users_has_services us
                  JOIN users ON users.id = us.users_id
                  JOIN culte ON culte.id = us.culte_id
                  JOIN services s ON s.id = us.services_id";
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
function getUserById($id)
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM users WHERE id=:id';
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute(['id' => $id]);//execute query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client cherche tous les résultats
        $dbh = null; //refermer une connection quand on a fini
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getUserByEmail($email)
{
    require "model/.constant.php";
    try {
        $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
        $query = 'SELECT * FROM users WHERE email=:email';
        $statment = $dbh->prepare($query);//prepare query, il doit faire des vérifications et il va pas exécuter tant
        //qu'il y a des choses incorrects
        $statment->execute(['email' => $email]);//execute query
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
                  VALUES  (:date2,:adultos,:ninos)";
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

function createUser($oneUser)
{
    $dbh = getPDO();
    try {
        $query = "INSERT INTO users( email,  lastname,  firstname,  phone_number,  registration_date,  birth_date,  street_home,  zip,  city,  canton,  password,droits) 
                  VALUES  (:email,  :lastname,  :firstname,  :phone_number,  :registration_date,  :birth_date,  :street_home,  :zip,  :city,  :canton,  :password,:droits)";
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


//(ALTIN)fonction qui cherche une bouteille avec toutes ses informations au panier
function getWineBottle($id)
{


    try {
        $dbh = getPDO();
        /*
         * JOHNNY: j'ai rajouté inner join discounts pour les prix a calculer dans le basket
         *
        $query = 'SELECT * FROM wines INNER JOIN wines_compose_grapes on  wines.id = wines_compose_grapes.wine_id  
                        INNER JOIN grapes on  wines_compose_grapes.grape_id = grapes.id WHERE wines.id =:id';
        */

        $query = 'SELECT wines.id,wines.year,wines.winename,wines.alcohol,wines.basic_price,wines.size,
                    wines.size,wines.stock,wines.discounts_id,grapes.name,grapes.color,
                        discounts.percentage,discounts.start_date,discounts.end_date, wines.photo FROM wines            
                        INNER JOIN wines_compose_grapes on  wines.id = wines_compose_grapes.wine_id  
                        INNER JOIN grapes on  wines_compose_grapes.grape_id =grapes.id
                         INNER JOIN discounts ON wines.discounts_id = discounts.id WHERE wines.id =:id;
                        ';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

//(ALTIN)fonction qui Update le stock d'une bouteille
function withdrawWineBottle($id, $quantity)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE wines set stock = stock - ' . $quantity . ' WHERE wines.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function addWineBottle($id, $quantity)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE wines set stock = stock + ' . $quantity . ' WHERE wines.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getOrdersById($id)
{
    require "model/.constant.php";
    $dbh = getPDO();
    try {

        $query = "select deliveries.firstname as 'firstname_delivery', deliveries.lastname as 'lastname_delivery', deliveries.street as 'street_delivery',deliveries.city as 'city_delivery', deliveries.zip as 'zip_delivery' , users.id, users.firstname, users.lastname,wines.winename, users.email, orders_contain_wines.quantity, 
                    orders_contain_wines.price as 'price_wine',  orders.date_purchase, 
                    orders.number, orders.states_id, orders.total_price, orders.id AS 'id_order', states.name AS 'state_name', states.id AS 'state_id', wines.photo, wines.id as 'wine_id'   FROM bargylus_db.orders_contain_wines
inner join wines on orders_contain_wines.wine_id = wines.id
inner join orders on  orders_contain_wines.order_id = orders.id
inner join deliveries on  orders.delivery_id = deliveries.id
INNER JOIN states ON orders.states_id = states.id
inner join users on  orders.user_id = users.id WHERE orders.id =:id";
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getOrdersByUserId($id)
{
    require "model/.constant.php";
    $dbh = getPDO();
    try {

        $query = "select users.id, users.firstname, users.lastname,wines.winename, users.email, orders_contain_wines.quantity, 
                    orders_contain_wines.price as 'price_wine',  orders.date_purchase, 
                    orders.number, orders.states_id, orders.total_price, orders.id AS 'id_order', states.name AS 'state_name', 
                    states.id AS 'state_id', wines.photo,wines.id as 'wine_id'   FROM bargylus_db.orders_contain_wines
inner join wines on orders_contain_wines.wine_id = wines.id
inner join orders on  orders_contain_wines.order_id = orders.id
INNER JOIN states ON orders.states_id = states.id
inner join users on  orders.user_id = users.id WHERE users.id =:id";
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getOrders()
{
    require "model/.constant.php";
    $dbh = getPDO();
    try {

        $query = 'select users.id, users.firstname, users.lastname,wines.winename, users.email, orders_contain_wines.quantity, 
                    orders_contain_wines.price as \'price_wine\', orders.date_purchase, 
                    orders.number, orders.states_id, orders.total_price, orders.id AS \'id_order\', states.name AS "state_name", states.id AS "state_id"   FROM bargylus_db.orders_contain_wines
inner join wines on orders_contain_wines.wine_id = wines.id
inner join orders on  orders_contain_wines.order_id = orders.id
INNER JOIN states ON orders.states_id = states.id
inner join users on  orders.user_id = users.id WHERE users.lastname LIKE \'%\' ORDER BY orders.number';
        $statment = $dbh->prepare($query);
        $statment->execute();//prepare query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getStates()
{
    require "model/.constant.php";
    $dbh = getPDO();
    try {

        $query = 'select states.id, states.name AS "state_name"  FROM states';
        $statment = $dbh->prepare($query);
        $statment->execute();//prepare query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function updateStateOrderById($id, $state)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE orders set orders.states_id =:state WHERE orders.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id, 'state' => $state]);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        if ($debug) var_dump($queryResult);
        return $queryResult;
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
function getGrapesOrder($id)
{

    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT grapes.name as "grapes_name",grapes.color FROM wines            
                        INNER JOIN wines_compose_grapes on  wines.id = wines_compose_grapes.wine_id  
                        INNER JOIN grapes on  wines_compose_grapes.grape_id =grapes.id
                        WHERE wines.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

function getDelivery($id){



        require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'select deliveries.firstname, deliveries.lastname, deliveries.street, deliveries.zip, deliveries.city , deliveries.id as "delivery_id" from deliveries
INNER JOIN users ON deliveries.user_id = users.id
where users.id =:id AND deliveries.visibility = 1
order by deliveries.id desc LIMIT 1';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}
function getInvoice($id){



    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'select invoices.firstname, invoices.lastname, invoices.street, invoices.zip, invoices.city , invoices.id as "invoice_id" from invoices
INNER JOIN users ON invoices.user_id = users.id
where users.id =:id AND invoices.visibility = 1
order by invoices.id desc LIMIT 1';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}
function getLastDeliveryByUserId($id)
{

    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'select orders.id,deliveries.firstname, deliveries.lastname, deliveries.street, deliveries.zip, deliveries.city , deliveries.id as "delivery_id", orders.id  as "last_order" from orders
INNER JOIN users ON orders.user_id = users.id
INNER JOIN deliveries ON orders.delivery_id = deliveries.id
where users.id = :id AND deliveries.visibility = 1
order by orders.id desc LIMIT 1';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

function getLastInvoiceByUserId($id)
{

    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'select modes_payments.name, orders.id,invoices.firstname, invoices.lastname, invoices.street, invoices.zip, invoices.city , invoices.id as "invoice_id", max(orders.id) as "last_order" from orders
inner join modes_payments on orders.mode_payment_id = modes_payments.id
inner join invoices on orders.invoice_id = invoices.id
inner join users on invoices.user_id = users.id
where users.id = :id AND invoices.visibility = 1
GROUP BY invoice_id
HAVING max(orders.id) = orders.id
order by orders.id desc limit 1';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

function getDeliveriesByUserId($id)
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'select deliveries.firstname, deliveries.lastname, deliveries.street, deliveries.zip, deliveries.city, deliveries.id as "delivery_id", users.id as "user_id" from deliveries
INNER JOIN users ON deliveries.user_id =  users.id
WHERE users.id = :id and deliveries.visibility = 1';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getInvoicesByUserId($id)
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'select invoices.firstname, invoices.lastname, invoices.street, invoices.zip, invoices.city, invoices.id as "invoice_id", users.id as "user_id" from invoices
inner join users on invoices.user_id = users.id
where users.id = :id and invoices.visibility = 1';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getDeliveryById($id)
{

    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'select deliveries.user_id, deliveries.firstname, deliveries.lastname, deliveries.street, deliveries.zip, deliveries.city, deliveries.id as "delivery_id" from deliveries
INNER JOIN users ON deliveries.user_id =  users.id
WHERE deliveries.id = :id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

function getDeliveries()
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM deliveries';
        $statment = $dbh->prepare($query);
        $statment->execute();//prepare query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

function getReceives()
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM users_receivein_deliveries';
        $statment = $dbh->prepare($query);
        $statment->execute();//prepare query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

function getInvoices()
{
    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM invoices';
        $statment = $dbh->prepare($query);
        $statment->execute();//prepare query
        $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

function getInvoiceById($id)
{

    require "model/.constant.php";
    try {
        $dbh = getPDO();
        $query = 'select users.id as "user_id",invoices.firstname, invoices.lastname, invoices.street, invoices.zip, invoices.city,  invoices.id as "invoice_id" from invoices
inner join users on invoices.user_id = users.id

where invoices.id = :id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}
function updateCulto($delivery)
{
    try {
        $dbh = getPDO();
        $query = "UPDATE  culte set 
                  date = :date2, 
                  adultos =:adultos, 
                  ninos =:ninos 
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


function updateDeliveryModel($delivery)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE deliveries 
set 
firstname =:firstname, 
lastname =:lastname, 
street =:street, 
zip =:zip, 
city =:city 
WHERE deliveries.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute($delivery);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

function addDeliveryVisibility($id)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE deliveries 
set 
visibility = 1
WHERE deliveries.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

function addInvoiceVisibility($id)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE invoices 
set 
visibility = 1
WHERE invoices.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['id' => $id]);
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

function updateInvoiceModel($invoice)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE invoices
set 
firstname =:firstname, 
lastname =:lastname, 
street =:street, 
zip =:zip, 
city =:city 
WHERE invoices.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute($invoice);//prepare query
        $queryResult = $statment->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
        if ($debug) var_dump($queryResult);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }

}

function addDeliveryModel($delivery)
{
    require "model/.constant.php";
    $dbh = getPDO();
    try {
        $query = "INSERT INTO deliveries(firstname,lastname,street,zip,city, user_id) 
                  VALUES  (:firstname,:lastname,:street,:zip,:city,:user_id)";
        $stmt = $dbh->prepare($query);
        $stmt->execute($delivery);

        $dbh->lastInsertId();
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!:" . $e->getMessage() . "<br/>";
        die();
    }
}

function addInvoiceModel($invoice)
{
    require "model/.constant.php";
    $dbh = getPDO();
    try {
        $query = "INSERT INTO  invoices(firstname,lastname,street,zip,city,user_id) 
                  VALUES  (:firstname,:lastname,:street,:zip,:city,:user_id)";
        $stmt = $dbh->prepare($query);
        $stmt->execute($invoice);

        $dbh->lastInsertId();
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!:" . $e->getMessage() . "<br/>";
        die();
    }
}

function addReceiveInModel($delivery)
{
    require "model/.constant.php";
    $dbh = getPDO();
    try {
        $query = "INSERT INTO users_receivein_deliveries(delivery_id,user_id) 
                  VALUES  (:delivery_id,:user_id)";
        $stmt = $dbh->prepare($query);
        $stmt->execute($delivery);

        $dbh->lastInsertId();
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!:" . $e->getMessage() . "<br/>";
        die();
    }
}

function deleteDeliveryModel($id)
{
    $dbh = getPDO();
    try {
        $query = "UPDATE deliveries
                set 
            visibility =0
        WHERE deliveries.id =:id";
        $stmt = $dbh->prepare($query);
        $stmt->execute(['id' => $id]);
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!:" . $e->getMessage() . "<br/>";
        die();
    }


}

function deleteInvoiceModel($id)
{
    $dbh = getPDO();
    try {
        $query = "UPDATE invoices
set 
visibility =0
WHERE invoices.id =:id";
        $stmt = $dbh->prepare($query);
        $stmt->execute(['id' => $id]);
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!:" . $e->getMessage() . "<br/>";
        die();
    }
}

function updateElementFirstname($id, $value)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE users
set 
firstname = :val
WHERE users.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['val' => $value, 'id' => $id]);//prepare query
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function updateElementLastname($id, $value)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE users
set 
lastname = :val
WHERE users.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['val' => $value, 'id' => $id]);//prepare query
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function updateElementNumber($id, $value)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE users
set 
phone_number = :val
WHERE users.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['val' => $value, 'id' => $id]);//prepare query
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function updateElementBirthdate($id, $value)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE users
set 
birth_date = :val
WHERE users.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['val' => $value, 'id' => $id]);//prepare query
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function updateElementStreet($id, $value)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE users
set 
street_home = :val
WHERE users.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['val' => $value, 'id' => $id]);//prepare query
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}


function updateElementZip($id, $value)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE users
set 
zip = :val
WHERE users.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['val' => $value, 'id' => $id]);//prepare query
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function updateElementCity($id, $value)
{
    try {
        $dbh = getPDO();
        $query = 'UPDATE users
set 
city = :val
WHERE users.id =:id';
        $statment = $dbh->prepare($query);
        $statment->execute(['val' => $value, 'id' => $id]);//prepare query
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;

    }


}


//fonction qui supprime les deliveries par rapport au zip entré
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


