<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php   
    session_start();
    if(!isset($_SESSION['email']) || !isset($_SESSION['password'])){
      header("Location:../llogin.php");
    } 
   
    if (isset($script_includes))
    {
        if (is_array($script_includes))
        {
            foreach ($script_includes as $src)
            {
                echo "\r\n<script src=\"$src\"></script>";
            }
        }
        elseif (is_string($script_includes))
        {
            echo "\r\n<script src=\"$script_includes\"></script>";
        }
    }
    if(isset($bootstrap))
    {
      echo  "<link rel=\"stylesheet\" href=\"$bootstrap\">";
    }
    if (isset($css_includes))
    {
        if (is_array($css_includes))
        {
            foreach ($css_includes as $href)
            {
                echo "\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"$href\">";
            }
        }
        elseif (is_string($css_includes))
        {
            echo "\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"$css_includes\">";
        }
    }
    if(isset($title))
       echo "<title>$title</title>";
    if(isset($header_css))
     echo  "<link rel=\"stylesheet\" href=\"$header_css\">";
     $dashboard_header_css="../../css/dashboard.css";
     if(isset($dashboard_header_css))
      {
        echo  "<link rel=\"stylesheet\" href=\"$dashboard_header_css\">";
      }
  
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Menaxhimi i te dhenave</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Dashboard</a></li>
            <li><a href="tabelaFluturimeve.php">Fluturimet</a></li>
            <li><a href="tabelaAeroplanet.php">Aeroplanet</a></li>
            <li><a href="tabelaPerdoruesit.php">Perdoruesit</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Mireseerdhe  <?php echo $_SESSION['email']?></a></li>
            <li><a href="../llogout.php">Log out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Agjensia per Udhetime <small>Menaxhimi</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                 Krijo !
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" id="fluturim">Shto fluturim</a></li>
                <li><a type="button" id="user">Shto Perdorues</a></li>
                <li><a type="button" id="aeroplan">Shto Aeroplan</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="tabelaFluturimeve.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Fluturimet  <span class="badge">12</span></a>
              <a href="tabelaAeroplanet.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Aeroplanet <span class="badge">33</span></a>
              <a href="tabelaPerdoruesit.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Perdoruesit <span class="badge">203</span></a>
            </div>


 


