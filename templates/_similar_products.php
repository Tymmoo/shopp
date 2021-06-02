<?php

shuffle($product_men);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['top_sale_submit'])) {
    $Cart->addToCart($_POST['user_id'], $_POST['product_id']);
  }
}
?>

<section id="top-sale">
  <div class="container py-4">
    <h5 class="">Похожие товары</h5>
    <div class="owl-carousel owl-theme py-5">
      <?php foreach ($product_men as $product) { ?>
        <div class="item px-3">
          <div class="product">
            <a href="<?php printf('%s?product_id=%s', 'product.php',  $product['product_id']); ?>"><img src="<?php echo $product['product_image'] ?? "Image"; ?>" alt="product1" class="img-fluid img-similar rounded"></a>
            <div class="text-center py-3">
              <h5><?php echo  $product['product_name'] ?? "Unknown";  ?></h5>
              <div class="rating text-warning">
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="far fa-star"></i></span>
              </div>
              <div class="price py-2">
                <span class="font">₽ <?php echo $product['product_price'] ?? '0'; ?></span>
              </div>
              <form method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?? '1'; ?>">
                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                <?php
                if (in_array($product['product_id'], $Cart->getCartId($Product->getData('cart')) ?? [])) {
                  echo '<button type="submit" disabled class="btn btn-success">В корзине</button>';
                } else {
                  echo '<button type="submit" name="top_sale_submit" class="btn btn-warning">Добавить корзину</button>';
                }
                ?>
              </form>
            </div>
          </div>
        </div>
      <?php }
      ?>
    </div>
  </div>
</section>