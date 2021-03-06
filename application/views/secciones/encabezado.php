<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="<?php echo base_url(); ?>"></base>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Congreso</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="js/jquery-ui.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <!--<link rel="stylesheet" type="text/css" href="css/estilos.css"-->
    <style>
    .error{
      color:red;
    }
    .container-fluid{
      background-image: url("img/fondo.jpg");
    }
    body{
      background-image: url("img/fondo7.jpg");
      background-repeat: no-repeat;
    }
    /*.container{
      background-color: white;
    }*/
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
      $(function() {
        $( "#datepicker" ).datepicker();
      });
    </script>
  </head>
  <body>