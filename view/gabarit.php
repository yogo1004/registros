<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?= $title; ?> </title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

          <link href="../css/index.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>


</head>

<body class="d-flex justify-content-center">
    <div id="sub-body" class="h-100 col-12 " style="position: absolute;   height: 100%;  background: linear-gradient(#f8e5e5,white);
       overflow: auto;">
       <div style="width: 100%;  height: 150px"
             class="shadow p-3 bg-danger rounded  d-flex justify-content-center">
            <p style="text-align: center; width:400px;font-family: 'Arial' ;color: #808080;top: 5px;left: 20px; font-size: 30px; ">
                <a href="index.php?action=home">ASSISTENCE EEANJESUS</a>
            </p>
            <div style="position: absolute; top: 75px;">
                <a style="width: 300px; height: 50px" href="index.php?action=anunciosPage" class="btn btn-warning"  >
                    ANUNCIOS</a>

                <button style="width: 300px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Créer un utilisateur
                </button>


                <button style="width: 300px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                    Créer un service
                </button>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-2 margin-top: 10%;"></div>
                <?= $content2; ?>
            <div class="col-lg-2"></div>
        </div>
    </div>

</body>


 <script>
        function fnEditProfilFirstname() {
            form.submit()
        }
         function changeEvent() {
            formChange.submit()
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
            var sel = document.getElementById('select_id')
            var id_save = document.getElementById('save')
            var id_save2 = document.getElementById('save2')
            var id_time_init = document.getElementById('time_init')
            var id_confirmer = document.getElementById('confirmer')
            var id_addService = document.getElementById('addService')
            var id_calendar = document.getElementById('calendar')
            if(sel != null){
                sel.addEventListener("click",fnEditProfilFirstname)
            }
            if(id_save != null){
            id_save.addEventListener("click", fnEditProfilFirstname)
            }

            if(id_save2 != null){
            id_save2.addEventListener("click", fnEditProfilFirstname)
            }

            if(id_time_init != null){
            id_time_init.addEventListener("change", changeEvent)
            }

            if(id_confirmer != null){
            id_confirmer.addEventListener("click", fnEditProfilFirstname)
            }

            if(id_addService != null){
            id_addService.addEventListener("click", fnAddInputs)
            }

            if(id_calendar != null){
            id_calendar.addEventListener("input", changeEvent)
            }

        }

        //lit tout l'html avant de lancer la fonction init
        document.addEventListener("DOMContentLoaded", init)
    </script>



</html>