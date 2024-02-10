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
            ASSISTENCE EEANJESUS</p>
        <div style="position: absolute; top: 75px;">


           
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
</html>