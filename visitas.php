
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/loader.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Aleo:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <title>Micrositio de publicaciones</title>
</head>

<body class="cp">
  <?php
$servername = "localhost";
$database = "db14";
$username = "dbcuenta14";
$password = "Cta.m1sql14";

// Create connection

$connection = mysqli_connect($servername, $username, $password, $database);

$mensajeSuccess = "";

if ($connection->connect_error) {
  die("Connection failed: "
      . $conn->connect_error);
} 
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
  $name =  $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $comments = $_REQUEST['comments'];
  if($name !=''||$email !=''){
    
    $sqlquery = "INSERT INTO comments (user,email,comments) VALUES ('$name', '$email', '$comments')";
   
    if ($connection->query($sqlquery) === TRUE) {
      $mensajeSuccess = "record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $_POST = array();

  } else {
    echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
  }
}
$columns = ["user", "email", "comments"];

// $fetchData = fetch_data($database, "comments", $columns);

$query = "SELECT * FROM comments";


$result = mysqli_query($connection, $query);  

?>



<!DOCTYPE html>
<html lang="en">


  <div class="loader">
    <div id="loop" class="center"></div>
    <div id="bike-wrapper" class="center">
      <div id="bike" class="centerBike"></div>
    </div>
  </div>
  <header class="bg-dark">
    <div class="container">
      <div class="row header-logos-wrapper">
        <div class="col header-logos-container">
          <a href="#">
            <img class="logo-unam" src="img/unam-logo.svg" alt="Logo UNAM">
          </a>
          <a href="#" class="iisunam">
            <img class="logo-iis" src="img/logo-iis.svg" alt="Logo IISUNAM">
          </a>
        </div>
      </div>
      <div class="row main-menu">
        <nav class="navbar navbar-expand-md bg-transparent navbar-dark ">
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="libros.html">Libros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="revistas.html">Revistas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ediciones-digitales.html">Ediciones digitales</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="catalogo-historico.html">Catálogo histórico</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Sobre libros
                </a>
                <ul class="dropdown-menu">
                  <!-- <li><a class="dropdown-item" href="eventos.html">Eventos</a></li>
                  <li><a class="dropdown-item" href="noticias.html">Noticias</a></li>-->
                  <li><a class="dropdown-item active" href="visitas.php">Libro de visitas</a></li>
                  <li><a class="dropdown-item" href="video-resenas.html">Video reseñas</a></li>
                  <li><a class="dropdown-item" href="como-publicar.html">Cómo públicar</a></li>
                </ul>
              </li>
              <li>
                <button type="button" class="btn btn-link btn-menu">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <div class="pleca">
  </div>
  <section class="site-title bg-dark">
    <div class="container">
      <div class="row">
        <div class="seccion text-secondary">
          <h1><span class="text-primary">&#x2022</span> Libro de visitas</h1>
        </div>
      </div>
    </div>
  </section>

  <main>

    <div class="container container-item container-cp">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h3 class="text-secondary">
            <b>
              Déjanos un comentario
            </b>
          </h3>
        </div>
        <div class="col-md-8 pt-5">
          <form class="row g-3" action="visitas.php" method="post">
            <div class="col-md-6">
              <label for="inputEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputEmail" name="email">
            </div>
            <div class="col-md-6">
              <label for="inputName" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="inputName" name="name">
            </div>
            <div class="col-md-12">
              <label for="inputComment" class="form-label">Ingrese su comentario</label>
              <textarea class="form-control" id="inputComment" rows="3" name="comments"></textarea>
            </div>
            <div class="col-12">
              <input class="btn btn-primary" name="submit" type="submit" value="Enviar">
            </div>
          </form>
          <h3 class="text-secondary text-center"><b><?php echo $mensajeSuccess; ?></b></h3>
        </div>
        <hr class="my-5">
        <div class="col-12">
          <h3 class="text-secondary">
            <b>
              Mensajes de otros usuarios
            </b>
          </h3>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Comentario</th>
              </tr>
            </thead>
            <tbody>
            <?php

if(mysqli_num_rows($result))
{

    while($row2 = mysqli_fetch_row($result))
    {
        echo '<tr>';
        foreach ($row2 as $key=>$value)
        {
            echo '<td>',$value, '</td>';
        }
        echo '</tr>';
    }
}
            ?>
          
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </main>

  <div class="footer-sm bg-secondary">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="row">
            <div class="col footer-legend">
              <p class="m-0">Lorem laborum placeat corporis excepturi alias minima odio, fuga perspiciatis
                voluptatem
                consequatur.
              </p>
            </div>
            <div class="col-md-auto">
              <div class="social-media">
                <a href="http://youtube.com"><i class="fab fa-youtube"></i></a>
                <a href="http://twitter.com"><i class="fab fa-twitter"></i></a>
                <a href="http://facebook.com"><i class="fab fa-facebook-f"></i></a>
                <a href="http://instagram.com"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="bg-dark text-white">
    <div class="container">
      <div class="sections">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <h3>
              Sobre el instituto
            </h3>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt, sequi laborum non vel
              eos
              praesentium hic eveniet accusantium sed aut. Nobis, voluptates reprehenderit nostrum nisi ad
              sed
              molestias doloremque in autem itaque eum nesciunt ex nam quibusdam libero, neque voluptatum.
            </p>
          </div>
          <div class="col-sm-6 col-md-3">
            <h3>
              Transparencia
            </h3>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt, sequi laborum non vel
              eos
              praesentium hic eveniet accusantium sed aut. Nobis, voluptates reprehenderit nostrum nisi ad
              sed
              molestias doloremque in autem itaque eum nesciunt ex nam quibusdam libero, neque voluptatum.
            </p>
          </div>
          <div class="col-sm-6 col-md-3">
            <h3>
              Comunidad
            </h3>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt, sequi laborum non vel
              eos
              praesentium hic eveniet accusantium sed aut. Nobis, voluptates reprehenderit nostrum nisi ad
              sed
              molestias doloremque in autem itaque eum nesciunt ex nam quibusdam libero, neque voluptatum.
            </p>
          </div>
          <div class="col-sm-6 col-md-3">
            <h3>
              Contacto
            </h3>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt, sequi laborum non vel
              eos
              praesentium hic eveniet accusantium sed aut. Nobis, voluptates reprehenderit nostrum nisi ad
              sed
              molestias doloremque in autem itaque eum nesciunt ex nam quibusdam libero, neque voluptatum.
            </p>
          </div>
        </div>
      </div>
      <div class="legal">
        <div class="row">
          <p class="text-center">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde consequuntur quis veritatis
            libero
            tempora esse, vero quia repellat non hic dolores ad quibusdam doloribus voluptatem explicabo
            quod
            magni
            nesciunt itaque.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <div class="menu">
    <nav class="menu__nav">

      <ul class="menu__list r-list">
        <li class="menu__group">
          <a class="menu__link r-link" href="index.html">Inicio</a>
        </li>
        <li class="menu__group">
          <a class="menu__link r-link" href="libros.html">Libros</a>
        </li>
        <li class="menu__group">
          <a class="menu__link r-link" href="revistas.html">Revistas</a>
        </li>
        <li class="menu__group">
          <a class="menu__link r-link" href="ediciones-digitales.html">Ediciones digitales</a>
        </li>
        <li class="menu__group">
          <a class="menu__link r-link disabled" href="catalogo-historico.html">Catálogo histórico</a>
        </li>
        <li class="menu__group">
          <a class="menu__link r-link" href="#">
            Sobre libros
          </a>
          <ul class="menu__list r-list">
            <!-- <li class="menu__group"><a class="menu__link r-link" href="eventos.html">Eventos</a></li>
            <li class="menu__group"><a class="menu__link r-link" href="noticias.html">Noticias</a></li> -->
            <li class="menu__group active"><a class="menu__link r-link" href="visitas.php">Libro de visitas</a>
            <li class="menu__group"><a class="menu__link r-link" href="video-resenas.html">Video reseñas</a>
            </li>
            <li class="menu__group"><a class="menu__link r-link" href="como-publicar.html">Cómo públicar</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <button class="menu__toggle r-button" type="button">
      <span class="menu__hamburger m-hamburger">
        <span class="m-hamburger__label">
          <span class="menu__toggle-hint screen-reader">Open menu</span>
        </span>
      </span>
    </button>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  <script src="js/custom.js"></script>
</body>

</html>

<?php

$connection->close();

?>