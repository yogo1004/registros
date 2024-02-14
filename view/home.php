<?php
/**
 *Created by bargylus.
 *FILE_NAME:home.php
 *USER:marwan
 *DATE:14.05.2020
 */

ob_start();
?>



<div class="container d-flex col-12 justify-content-center">
    <form method="post" action="index.php?action=signup" id="form" class="">
   



        <div class="row">
            <div class="col-4"><h5><?=$cultos['name_event']?></h5></div>
            <div class="col-4">
                <input type="date" class="form-control" name="date" id="calendar" value="<?= $cultos["date"] ?>">
            </div>
            <div class="col-4">
                <select class="bg-success selectpicker form-control-sm show-tick" id="time_init"  name="time_init" data-live-search="true">
                   <?php
                    foreach ($Allcultos as $culto) {
                         if($cultos['time_init'] == $culto['time_init']){
                            ?>
                            <option value="<?=$culto['id_event']?>" data-tokens="<?=$culto['time_init']?>" selected><?=$culto['time_init']?></option>
                        <?php } else {  ?>
                            <option value="<?=$culto['id_event']?>" data-tokens="<?=$culto['time_init']?>"><?=$culto['time_init']?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>  
        </div>
        <div class="row">
        
                        <div class="col-6">
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
            <div class="col-6">
                <input type="time" id="appt" name="time_init_new" value="<?=$cultos['time_init']?>">        
            </div>
        </div>
        <input type="hidden" name="culto_id" id="ninos" value="<?= $cultos["id_event"] ?>">
        <div id="hidde" hidden>
            <div class="row">

                <div class="col-4">
                    <input type="text" class="iptG form-control-lg col-5" placeholder="quantité adultes" name="adultos" id="dd" value="<?= $cultos["siblings"] ?>">
                </div>
                <div class="col-4">
                    <input type="text" placeholder="quantité enfants" name="ninos" id="ninos" class=" form-control-lg col-5"
                           value="<?= $cultos["friends"] ?>">
                </div>
                <div class="col-4" style="background-color: rgba(255,255,255,0);">
                    <input id="addService" type="button" class="btn btn-warning" value="ajouter un service">
                </div>
            </div>


            <?php
                //  var_dump($datas);
            foreach ($datas as $data) { ?>
            <div class="row justify-content-center align-items-center ">
                <div class="col-6">
                    <select class="bg-danger selectpicker show-tick"   name="name[]" data-live-search="true">
                        <option class=""  value="" data-tokens="nada">nada</option>
                        <?php
                        foreach ($services as $service) {
                            if ($service['name'] == $data['name']) {
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
                <div class="col-6">
                    <select class="bg-warning selectpicker show-tick" name="firstname[]" data-live-search="true" id="select_id" >
                        <option class=" form-select-lg" value="" data-tokens="nada" class="h1">nada</option>
                        <?php
                        foreach ($users as $user) {
                            if ($user['id'] == $data['users_id']) {
                                ?>
                                <option
                                value="<?= $user['firstname'] ?> <?= $user['lastname'] ?>"
                                        data-tokens="<?= $user['firstname'] ?> <?= $user['lastname'] ?>"
                                        selected
                                        ><?= $user['firstname'] ?> <?= $user['lastname'] ?></option>
                            <?php } else {  ?>
                                <option 
                                value="<?= $user['firstname'] ?> <?= $user['lastname'] ?>"
                                        data-tokens="<?= $user['lastname'] ?> <?= $user['lastname'] ?>"><?= $user['firstname'] ?> <?= $user['lastname'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                        <?php if( isset($data['services_id'])) { ?>
                <input type="hidden" name="services_id[]" id="dd2" value="<?=$data["services_id"]?>">
                <?php } ?>
                <?php if( isset($data['users_id'])) { ?>
                <input type="hidden" name="users_id[]" id="dd3" value="<?=$data["users_id"]?>">
                <?php } ?>
                <?php if( isset($data['id'])) {  ?>
                <input type="hidden" name="id[]" id="dd4" value="<?=$data["id"]?>">
                <?php } ?>
            </div>
            <?php } ?>

            <div class="" id="form2">
            </div>
        </div>
          
          <button id="confirmer" class="btn btn-primary btn-lg"
                style="background-color: #00549b; height: 50px; width: 90%;margin-left: 15px; margin-right: 100px; color: white;text-align: center">
            Confirmer
    </button>

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
</div>
   

    <datalist id="listName">
        <?php
        foreach ($services

        as $service){ ?>
        <option value="<?= $service['name'] ?>">
            <?php } ?>
    </datalist>
    <datalist id="listUserFirst">
        <?php
        foreach ($users

        as $user){ ?>
        <option value="<?= $user['firstname'] ?> <?= $user['lastname'] ?>">
            <?php } ?>
    </datalist>
    <datalist id="listUserLast">
        <?php
        foreach ($users

        as $user){ ?>
        <option value="<?= $user['lastname'] ?>">
            <?php } ?>
    </datalist>
</div>

    <script>
        function fnEditProfilFirstname() {
            form.submit()
        }

        function fnEditProfilFirstname2() {
            form2.submit()
        }

        function fnEditProfilFirstname3() {
            form3.submit()
        }

        function fnAddInputs() {
            const userprofile = document.getElementById('form2');
            console.log(userprofile)
            let p = document.createElement("input");
            let p2 = document.createElement("input");
            let p4 = document.createElement("br");
            console.log(userprofile.children.length)
            p.id = userprofile.children.length+1
            p.name = "name[]"
            p.placeholder = "nom du service"
            p.setAttribute("list", 'listName')
            p.setAttribute("onblur", "fnNewInput(this.id)")
            p.setAttribute("class", 'dropdown bootstrap-select')
        //  p.setAttribute("size", '1')
            p2.id = userprofile.children.length+2
            p2.name = "firstname[]"
            p2.style = ";left:5px;"
            p2.placeholder = "nom et prénom"
            p2.setAttribute("list", 'listUserFirst')
            p2.setAttribute("onblur", "fnNewInput2(this.id)")
            p2.setAttribute("class", 'dropdown bootstrap-select')
        //  p2.setAttribute("size", '1')
            
            userprofile.appendChild(p)
            userprofile.appendChild(p2)
            userprofile.appendChild(p4)
        }
        function fnNewInput(x) {
            let listName =  document.getElementById('listName').children;
            let listName2 =  document.getElementById(x);
            let listName3 =  document.getElementById(x).value;

            console.log("length: "+listName.length);
        
            let y =false;
            for (let i = 0; i < listName.length; i++) {
               if(listName3 == listName[i].value){
                y = true;
                break;
               }
            }
            if(!y){
                listName2.value = "";
            }
        }
        function fnNewInput2(x) {
            let firstnames =  document.getElementById('listUserFirst').children;
            let lastnames =  document.getElementById('listUserLast').children;
            let listName2 =  document.getElementById(x);
            let listName3 =  document.getElementById(x).value;
        
            let y =false;
            for (let i = 0; i < firstnames.length; i++) {
               if(listName3 == firstnames[i].value){
                y = true;
                break;
               }
            }
            if(!y){
                listName2.value = "";
            }
        }

        function init() {
            let sel = document.getElementById('select_id');
            sel.onchange = function (){
                console.log("test")
            }
           sel.addEventListener("click",fnEditProfilFirstname);
            save.addEventListener("click", fnEditProfilFirstname)
            save2.addEventListener("click", fnEditProfilFirstname)
            calendar.addEventListener("input", fnEditProfilFirstname)
            time_init.addEventListener("change", fnEditProfilFirstname)
            confirmer.addEventListener("click", fnEditProfilFirstname)
            addService.addEventListener("click", fnAddInputs)
            

        }

        //lit tout l'html avant de lancer la fonction init
        document.addEventListener("DOMContentLoaded", init)
    </script>

<?php
$content2 = ob_get_clean();
require "view/gabarit.php";
?>
