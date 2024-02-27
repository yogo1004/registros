<?php
/**
 *Created by bargylus.
 *FILE_NAME:home.php
 *USER:marwan
 *DATE:14.05.2020
 */
$title = "home";
ob_start();
?>


   <!-- <div class="bg-warning  justify-content-center">
        <form method="get" class="justify-content-center d-flex flex-row" action="index.php?action=home" id="formChange">
            <?php if(array_key_exists('id_event', $cultos)){ ?>
            <input type="hidden" name="date_old" value="<?=$cultos["date"]?>">
            <div class="bg-success"><h5><?=$cultos['name_event']?></h5></div>
            <?php } ?>
            <div class="">
                <input type="date" class="form-control" name="date" id="calendar2" value="<?= $cultos["date"] ?>">
            </div>
            <?php if(array_key_exists('id_event', $cultos)){ ?>
            <div class="">
                <select class="bg-success selectpicker form-control-sm show-tick" id="time_init"  name="id" data-live-search="true">
                   <?php  foreach ($Allcultos as $culto) {
                         if($cultos['time_init'] == $culto['time_init']){
                            ?>
                            <option value="<?=$culto['id_event']?>" data-tokens="<?=$culto['time_init']?>" selected><?=$culto['time_init']?></option>
                        <?php } else {  ?>
                            <option value="<?=$culto['id_event']?>" data-tokens="<?=$culto['time_init']?>"><?=$culto['time_init']?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <?php } ?>
        </form>
    </div> -->

    <?php  if(array_key_exists('id_event', $cultos)){ ?>
    <form method="post" action="index.php?action=signup" id="form" class="justify-content-center d-flex flex-column">
        <div class="row d-flex justify-content-center">
            <!--<div class="col-1">
                <select class="bg-success selectpicker form-control-sm show-tick"   name="comite" data-live-search="true">
                    <option class=""  value="" data-tokens="nada">nada</option>
                    <?php
                    foreach ($comites as $comite) {
                         if($comite['name_comite'] == $cultos['name_comite']){
                            ?>
                            <option value="<?=$comite['id_comite']?>" data-tokens="<?=$comite['name_comite']?>" selected><?=$comite['name_comite']?></option>
                        <?php } else {  ?>
                            <option value="<?=$comite['id_comite']?>" data-tokens="<?=$comite['name_comite']?>"><?=$comite['name_comite']?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="col-1">
                <input type="time" id="appt" name="time_init_new" value="<?=$cultos['time_init']?>">        
            </div>-->
        </div>
        <input type="hidden" name="culto_id" id="ninos" value="<?= $cultos["id_event"] ?>">
        <div class="row d-flex justify-content-center ">
            <div class="col-5 p-0 bg-warning   d-flex flex-row-md-reverse">
                <input type="text" class="iptG" placeholder="quantité adultes" name="adultos" id="dd" value="<?= $cultos["siblings"] ?>">
            </div>
            <div class="col-5 p-0 d-flex flex-row bg-success">
                <input type="text" class="iptG col-12" placeholder="quantité enfants" name="ninos" id="ninos"
                       value="<?= $cultos["friends"] ?>"> 
            </div>
 
        </div>
        <div class="" id="form2">
        </div>
       
        <?php $line = 0; foreach ($datasNew as $key2 => $data) { var_dump($data[0]['id'] );  ?>
        <input type="hidden" name="line[]" id="line" value="<?=$line?>">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-3 col-lg-3 col-md-4 col-6 p-0 d-flex flex-row-reverse">
                <select class="bg-danger selectpicker show-tick col-12"   name="name[]" data-live-search="true">
                    <option class=""  value="" data-tokens="nada">nada</option>
                    <?php
                    foreach ($services as $service) {
                        if ($service['name'] == $data[0]['name']) {
                            ?>
                            <option value="<?= $service['name'] ?>" data-tokens="<?= $service['name'] ?>"
                                    selected ><?= $service['name'] ?></option>
                        <?php } else {  ?>
                            <option value="<?= $service['name'] ?>"
                                    data-tokens="<?= $service['name'] ?>"><?= $service['name'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-6 p-0">
            
                <select class="bg-warning selectpicker show-tick col-12" multiple name="firstname<?=$key2?>[]" data-live-search="true" id="select_id" >
                    <option class=" form-select-lg" value="" data-tokens="nada" class="h1">nada</option> 
                    <?php  
                    foreach ($data as $key7 => $user7) {  
                    foreach ($usersAll as $key6 => $user2) {
                
                        
                      if(array_key_exists('users_id', $user7)) {
                            ?>
                    <?php  if($user2['id'] == $user7['users_id']){  ?>

                <option selected value="<?= $user2['firstname'] ?> <?= $user2['lastname'] ?>"
                                                    data-tokens="<?= $user2['lastname'] ?> <?= $user2['lastname'] ?>"><?= $user2['firstname'] ?> <?= $user2['lastname'] ?></option>
                                   <?php 
                                    } elseif($key7 == 0 && !in_array($user2['id'], array_column($data, 'users_id'))){ ?>

                                    <option value="<?= $user2['firstname'] ?> <?= $user2['lastname'] ?>"
                data-tokens="<?= $user2['lastname'] ?> <?= $user2['lastname'] ?>"><?= $user2['firstname'] ?> <?= $user2['lastname'] ?></option>



                                    <?php

                                    }
                                    
                                        } else if($key7 == 0){ ?>
                <option value="<?= $user2['firstname'] ?> <?= $user2['lastname'] ?>"
                data-tokens="<?= $user2['lastname'] ?> <?= $user2['lastname'] ?>"><?= $user2['firstname'] ?> <?= $user2['lastname'] ?></option>
                    <?php }

                      } 
                    
                    } ?>
                </select>
            </div>
            <?php if( isset($data[0]['services_id'])) { ?>
            <input type="hidden" name="services_id[]" id="dd2" value="<?=$data[0]["services_id"]?>">
            <?php } ?>
            <?php if( isset($data[0]['users_id'])) { ?>
            <input type="hidden" name="users_id[]" id="dd3" value="<?=$data[0]["users_id"]?>">
            <?php } ?>
            <?php if( isset($data[0]['id'])) {  ?>
            <input type="hidden" name="id[]" id="dd4" value="<?=$data[0]["id"]?>">
            <?php } ?>
        </div>
        <?php $line++;  } ?>
        
     
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="first" required class="form-control" placeholder="Prénom">
                            </div>
                            <div class="col">
                                <input type="text" name="last" required class="form-control"  placeholder="Nom de famille">
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" id="save" class="btn btn-primary">Sauvegarder</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="service" required class="form-control"
                                       placeholder="Nom du service">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler
                        </button>
                        <button type="button" id="save2" class="btn btn-primary">Sauvegarder</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <button id="confirmer" form="form" class="btn btn-primary btn-lg"
                style="background-color: #00549b; height: 50px; width: 90%;margin-left: 15px; margin-right: 100px; color: white;text-align: center">
            Confirmer
    </button>
    <datalist id="listName">
        <?php
        foreach ($services
        as $service){ ?>
        <option value="<?= $service['name'] ?>">
            <?php } ?>
    </datalist>
    <datalist id="listUserFirst">
        <?php
        foreach ($usersAll
        as $user){ ?>
        <option value="<?= $user2['firstname'] ?> <?= $user2['lastname'] ?>">
            <?php } ?>
    </datalist>
    <datalist id="listUserLast">
        <?php
        foreach ($usersAll
        as $user){ ?>
        <option value="<?= $user2['lastname'] ?>">
            <?php } ?>
    </datalist>
    <?php } ?>

<?php
$content2 = ob_get_clean();
require "view/gabarit.php";
?>
