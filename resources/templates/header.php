<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php   if (isset($script_includes))
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

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand mr-2" href="#">Udhetime</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"> 
      <li class="nav-item active">
      
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Kontakto</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Nentitujt
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
   
    
       
      
      <form class="form-inline my-2 my-lg-0" style="margin-left:50px;background:white">
    
       <img src="https://img.icons8.com/metro/26/000000/administrator-male.png">
           <a class="nav-link" href="registration.php">Regjistrohuni</a>
    </form>
    <form class="form-inline my-2 my-lg-0" style="margin-left:20px;background:white">
       <img src="https://img.icons8.com/color/24/000000/gender-neutral-user.png">
       <a class="nav-link" href="llogin.php">Hyr</a>
    </form>


  </div>
</nav>