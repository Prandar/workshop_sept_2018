<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
    <title>hello</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="Css\wee.css">
    <script src="Js\main.js"></script>
    <script src="Js\WEE.js"></script>
    <script src="Js\wee_function.js"></script>
</head>
<body class="container-fluid" onload="gent_info_event()">
<header class="row" id="colorlogo">
    <div class="col-4"></div>
    <div id="logo" class="col-4">
        <img class="img_logo" src="Img/wee%20fond%20clair.png">
    </div>
    <div class="col-1"></div>
    <div id="login_logout" class="col-2">

    <script type="text/javascript">
    $(function(){
        var maVariableDeSession = '<?php echo $_SESSION['mail']; ?>';
    });
    </script>

    <div class="dropdown" style="display: none">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Session
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <h6 class="dropdown-header"><?=$_SESSION['mail'];?></h6>
            <a class="dropdown-item" href="Controller\logout.php">Déconnexion</a>
        </div>
    </div>

    </div>
    <div class="col-1"></div>

</header>
