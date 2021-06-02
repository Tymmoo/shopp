<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['delete-wishlist-submit'])) {
    $deletedrecord = $Cart->deleteWishlist($_POST['product_id']);
  }
}
if (isset($_POST['cart-submit'])) {
  $Cart->addToWishlist($_POST['product_id'], 'cart', 'wishlist');
}
?>

<section id="cart" class="py-3 mb-5">
  <div class="container-fluid w-75">
    <h5 class="">Список желаний</h5>

    <div class="row">
      <div class="col-sm-9">
        <?php
        foreach ($Product->getData('wishlist') as $product) :
          $cart = $Product->getProduct($product['product_id']);
          $subTotal[] = array_map(function ($product) {
        ?>

            <div class="row border-top py-3 mt-3">
              <div class="col-sm-2">
                <img src="<?php echo $product['product_image'] ?? "Image" ?>" style="height: 120px;" alt="Корзина" class="img-fluid rounded">
              </div>
              <div class="col-sm-8">
                <h5 class=""><?php echo $product['product_name'] ?? "Unknown"; ?></h5>
                <!-- <small><?php echo $product['product_brand'] ?? "Brand"; ?></small> -->

                <div class="qty d-flex pt-2">
                  <form method="POST">
                    <input type="hidden" value="<?php echo $product['product_id'] ?? 0; ?>" name="product_id">
                    <button type="submit" name="delete-wishlist-submit" class="btn text-danger pl-0 pr-3">Удалить</button>
                  </form>

                  <form method="POST">
                    <input type="hidden" value="<?php echo $product['product_id'] ?? 0; ?>" name="product_id">
                    <button type="submit" name="cart-submit" class="btn text-danger">Добавить в корзину</button>
                  </form>

                </div>
              </div>

              <div class="col-sm-2 text-right">
                <div class="text-danger">
                  ₽ <span class="product_price" data-id="<?php echo $product['product_id'] ?? '0'; ?>"><?php echo $product['product_price'] ?? 0; ?></span>
                </div>
              </div>
            </div>

        <?php
            return $product['product_price'];
          }, $cart);
        endforeach;
        ?>
      </div>
    </div>

  </div>
</section>