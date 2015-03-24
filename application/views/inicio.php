<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>
<style type="text/css">
      #wrapper{
        width: 1000px;
        margin: auto;
      }
      .carousel-inner { text-align: center; }
      .carousel .item > img { display: inline-block; }
      #titulo{
      	/*color: black;*/
      	text-align: center;
      	text-shadow: 2px 2px 2px grey;
      }
    </style>
<div class="container"><h1 id="titulo">Congreso FTW</h1></div>
<div id="wrapper">
  <div id="carousel-example-generic" class="carousel slide">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="img/Chrysanthemum.jpg" alt="...">
      <div class="carousel-caption">
      	<h3>Imagen1</h3>
      </div>
    </div>
    <div class="item">
      <img src="img/Desert.jpg" alt="..." >
      <div class="carousel-caption">
      	<h3>Imagen2</h3>
      </div>
    </div>
    <div class="item">
      <img src="img/Hydrangeas.jpg" alt="...">
      <div class="carousel-caption">
      	<h3>Imagen3</h3>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<?php include "/secciones/pie.php"?>
