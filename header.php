<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopp</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Owl-carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet"> <!-- Bold -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet"> <!-- Less bold -->

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/global.css">

  <?php
  require('database/functions.php');
  ?>

</head>

<body>

  <div class="wrapper">
    <header class="header">
      <div class="header__container">
        <nav class="header__menu">
          <div class="header__logo">
            <h2><a href="index.php">Shopp</a></h2>
          </div>
          <ul class="header__list">
            <li><a href="men.php">Мужчины</a></li>
            <li><a href="women.php">Женщины</a></li>
            <li><a href="kids.php">Дети</a></li>
            <li><a href="sale.php">Акции</a></li>
          </ul>

          <ul class="header__panel">
            <li>
              <h5>
                <i class="fas fa-search" data-toggle="modal" data-target="#search"></i>
              </h5>
            </li>

            <li>
              <a href="cart.php" class="nav-item nav-link active">
                <h5 class="cart">
                  <i class="fas fa-shopping-basket"></i>
                  <?php echo count($Product->getData('cart')); ?>
                </h5>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="modal fade" id="search" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-circle">
          <div class="modal-header">
            <h5 class="modal-title">Поиск товаров</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="search" method="POST">
              <div class="form-group" id="search">
                <input type="text" class="form-control" id="search" placeholder="Поиск">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <main class="main">