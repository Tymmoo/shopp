<?php
ob_start();
include('header.php');
?>

<?php
count($Product->getData('cart')) ? include('templates/_cart.php') :  include('templates/_cart_empty.php');
count($Product->getData('wishlist')) ? include('templates/_wishilist.php') :  include('templates/_wishlist_empty.php');
?>

<?php
include('footer.php');
?>


