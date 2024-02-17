<!DOCTYPE html>
<html lang="es">

<head>
    <title><?= $title; ?> </title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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



    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->

 <!-- Navbar -->


</head>

<body class="">



 <nav class="navbar navbar-expand-lg   bg-success navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <h3><?=$cultos['name_event']?></h3>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

<div class="dropdown  d-none d-lg-block">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?=date('H:i', strtotime($cultos['time_init']))?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <?php  foreach ($Allcultos as $culto) {  
            if($cultos['time_init'] != $culto['time_init']){ ?>
          <button class="dropdown-item" type="button"><a class="dropdown-item" href="index.php?action=home&id=<?=$culto['id_event']?>&date_old=<?= $cultos["date"]?>&date=<?=$culto["date"]?>"><?=date('H:i', strtotime($culto['time_init']))?></a></button>

          <?php } }?>
  </div>
</div>

    <input type="date" class="form-control d-none d-lg-block" placeholder="YYYY-MM-DD" name="date" id="calendar2" value="<?= $cultos["date"] ?>">
</a>

  
    <div class="collapse navbar-collapse  justify-content-end" id="collapsibleNavbar">
    <a class="nav-link" id="aDate" href="index.php?action=home&id=<?=$culto['id_event']?>&date_old=<?= $cultos["date"]?>&date="></a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php?action=anunciosPage" class="btn btn-warning"  >
                    ANUNCIOS</a>
        </li>
        <li class="nav-item">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Créer un utilisateur
                </button>
        </li>
        <li class="nav-item">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                    Créer un service
                </button>
        </li>
          <li class="nav-item">
                <input id="addService" type="button" class="btn btn-warning" value="ajouter un service">
           
        </li>
      </ul>
    </div>
  </div>
</nav> 
<nav class="navbar navbar-light bg-light d-block d-lg-none">
  <div class="container-fluid">
   <input type="date" class="form-control" placeholder="YYYY-MM-DD" name="date" id="calendar" value="<?= $cultos["date"] ?>">
</a>

<?php if($title == "home"){ ?>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?=date('H:i', strtotime($cultos['time_init']))?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <?php  foreach ($Allcultos as $culto) {  
            if($cultos['time_init'] != $culto['time_init']){ ?>
          <button class="dropdown-item" type="button"><a class="dropdown-item" href="index.php?action=home&id=<?=$culto['id_event']?>&date_old=<?= $cultos["date"]?>&date=<?=$culto["date"]?>"><?=date('H:i', strtotime($culto['time_init']))?></a></button>

          <?php } }?>
  </div>
</div>
<?php } ?>
  </div>
</nav>
    <div id="sub-body" class="h-100 col-12 " style="background: linear-gradient(#f8e5e5,white);">
        <div class="row">
            <div class="col-lg-2 "></div>
                <?= $content2; ?>
            <div class="col-lg-2"></div>
        </div>
    </div>

 <!-- A grey horizontal navbar that becomes vertical on small screens -->

</body>


 <script>
        function fnEditProfilFirstname() {
            form.submit()
        }
         function changeEvent() {
            formChange.submit()
        }
        function changeCalendar(){
         var href = aDate.getAttribute("href");
         var calendarValue = calendar.value;
         document.getElementById("aDate").href =href +calendarValue;
         document.getElementById('aDate').click()
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
            id_calendar.addEventListener("input", changeCalendar)
            }

        }

        //lit tout l'html avant de lancer la fonction init
        document.addEventListener("DOMContentLoaded", init)
    </script>



</html>