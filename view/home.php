<?php
/**
 *Created by bargylus.
 *FILE_NAME:home.php
 *USER:marwan
 *DATE:14.05.2020
 */

ob_start();
?>
<div class="col-12 col-lg-8"  style="position: relative;bottom:0px;justify-content: center;align-items: center; height: 100%; ">




    <form method="post" action="index.php?action=signup" id="form" class="d-flex justify-content-center w-100 h-100">
        
        <div id="form2" class="col-12">
            <!-- Modal --> 
            <div class="modal fade bg-info" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                                    <input type="text" name="first" required class="form-control"
                                           placeholder="Prénom">
                                </div>
                                <div class="col">
                                    <input type="text" name="last" required class="form-control"
                                           placeholder="Nom de famille">
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un utilisateur</h5>
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
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <input type="date" class="form-control" name="date" id="calendar"
                               value="<?= $cultos["date"] ?>">
                    </div>
                    <div class="col-6" style="background-color: rgba(255,255,255,0);right: 20px">
                        <input id="addService" type="button" class="btn btn-warning" value="ajouter un service">
                    </div>
                </div>
    
    
            <br>
            <div class="row">
            <input type="text" class="iptG form-control-lg col-5 mr-3" placeholder="quantité adultes" name="adultos" id="dd" value="<?= $cultos["adultos"] ?>">
            <input type="text" placeholder="quantité enfants" name="ninos" id="ninos" class=" form-control-lg col-5"
                   value="<?= $cultos["ninos"] ?>"><br>
            <input type="hidden" name="culto_id" id="ninos" value="<?= $cultos["id"] ?>">
            </div>
            </div>
    
            <?php
            foreach ($datas as $data) { ?>
    
                <!--      <input type="text" name="name[]" id="dd" title="coucou" value="<?= $data["name"] ?>" list="listName"> -->
                <select class="selectpicker form-control-lg show-tick col-sm-3half form-select-lg"   name="name[]" data-live-search="true">
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
                <!--         <input type="text" name="firstname[]" id="dd" title="coucou"
                   value="<?= $data["firstname"] ?> <?= $data["lastname"] ?>" list="listUserFirst"> -->

                <select class="selectpicker form-control-lg col-sm-3half" name="firstname[]" data-live-search="true" id="select_id" >
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
                
                <!--     <a type="button" href="index.php?action=deleteData&id=<?= $data["id"] ?>" class="btn btn-danger">X</a> -->
                <input type="hidden" name="services_id[]" id="dd" value="<?= $data["services_id"] ?>">
                <input type="hidden" name="users_id[]" id="dd" value="<?= $data["users_id"] ?>">
                <input type="hidden" name="id[]" id="dd" value="<?= $data["id"] ?>">
                <br>
            <?php } ?>
        </div>
     
    </form>
    <button id="confirmer" class="btn btn-primary btn-lg"
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