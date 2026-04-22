<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/3b96751dc8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="administrator/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="administrator/js/jsTNC.js"></script>
    <link type="text/css" rel="stylesheet" href="TNCcss.css"/>
    <title>TNC</title>
</head>
<body>
    <navbar>
        <img src="img/quangcaotnc.png" style="width:100%;margin:auto;">
      </navbar>
    <section class="header-top bg-primary">
       <div class="container">
        <div class="row justify-content-end ">
          <div class="col-2 py-2">
            <i class="fa-solid fa-phone-volume text-light"></i><a class="link-light link-underline-opacity-0 link-underline-opacity-100-hover" href="tel:0374573648"> 0374573648 </a>
          </div>
          <div class="col-2 py-2">
            <i class="fa-solid fa-envelope text-light"></i><a class="link-light link-underline-opacity-0 link-underline-opacity-100-hover" href="#"> contact@gmail.com </a>
          </div>
          
        </div>
       </div>
    </section>
    <section class="header-mid">
      <?php require './apart/header-mid.php'; ?>
    </section>
    <?php if (!isset($_GET['reqHanghoa'])): ?>
    <section class="center-silder">
      <?php require './apart/center-swiper.php';?>
    </section>
    <?php endif; ?>
    <section class="PC-hotproduct">
    <div class="container">
    </div>
    <?php
     if (isset($_GET['search'])) {
      require './apart/timkiem.php';
  } else {
      if (isset($_GET['req']) && $_GET['req'] == 'profile') {
          require './apart/capnhatthongtin.php';
      } else if (!isset($_GET['reqHanghoa'])) {
          require 'apart/viewListLoaihang.php';
      } else {
          require './apart/viewHanghoa.php';
      }
  }
    ?>
    </section>
    </div>
    </section>
</body>
</html>