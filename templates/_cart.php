<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['delete-cart-submit'])) {
    $deletedrecord = $Cart->deleteCart($_POST['product_id']);
  }
}
if (isset($_POST['wishlist-submit'])) {
  $addedrecord = $Cart->addToWishlist($_POST['product_id']);
}

$allItems = '';
?>

<section id="cart" class="py-3 mb-5">
  <div class="container-fluid w-75">
    <h5 class="">Корзина</h5>

    <div class="row">
      <div class="col-md-9">
        <?php
        foreach ($Product->getData('cart') as $product) :
          $cart = $Product->getProduct($product['product_id']);
          $subTotal[] = array_map(function ($product) {
        ?>
            <div class="row border-top py-3 mt-3">
              <div class="col-md-2">
                <img src="<?php echo $product['product_image'] ?? "Image" ?>" style="width: 300px;" alt="cart1" class="img-fluid rounded">
              </div>

              <div class="col-md-8">

                <h5 class=""><?php echo $product['product_name'] ?? "Unknown"; ?></h5>
                <!-- <small><?php echo $product['product_brand'] ?? "Brand"; ?></small> -->

                <div class="qty d-flex pt-4 font">
                  <div class="d-flex w-25">
                    <button class="qty-up border bg-light" data-id="<?php echo $product['product_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                    <input type="text" data-id="<?php echo $product['product_id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light text-center" disabled value="1" placeholder="1">
                    <button data-id="<?php echo $product['product_id'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                  </div>

                  <form method="POST">
                    <input type="hidden" value="<?php echo $product['product_id'] ?? 0; ?>" name="product_id">
                    <button type="submit" name="delete-cart-submit" class="btn text-danger px-3">Удалить</button>
                  </form>

                  <form method="POST">
                    <input type="hidden" value="<?php echo $product['product_id'] ?? 0; ?>" name="product_id">
                    <button type="submit" name="wishlist-submit" class="btn text-danger text-nowrap">Добавить в избранное</button>
                  </form>
                </div>

              </div>

              <div class="col-md-2 text-right">
                <div class="text-danger">
                  ₽ <span class="product_price" data-id="<?php echo $product['product_id'] ?? '0'; ?>"> <?php echo $product['product_price'] ?? 0; ?></span>
                </div>
              </div>
            </div>
        <?php
            return $product['product_price'];
          }, $cart);
        endforeach;
        ?>
      </div>

      <div class="col-md-3">
        <div class="sub-total border text-center mt-3">
          <div class="py-4">
            <h5 class="">Общая сумма ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> тов.):&nbsp; <span class="text-danger">₽ <span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span></span></h5>
            <button type="submit" class="btn btn-primary mt-3 checkout" data-toggle="modal" data-target="#checkout">Перейти к покупке</button>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="modal fade" id="checkout" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content rounded-circle">
        <div class="modal-header">
          <h5 class="modal-title">Подтвердить заказ</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="checkout" method="POST">
            <div class="form-group" id="checkout">
              <label for="product">Товар(-ы)</label>
              <input type="text" class="form-control" id="product" placeholder="Ваши товар(-ы)" readonly>
            </div>
            <div class="form-group">
              <label for="name">Введите имя</label>
              <input type="name" class="form-control" id="name" placeholder="Ваше имя">
              <small class="form-text text-muted">Обязательное поле</small>
            </div>
            <div class="form-group">
              <label for="email">Введите почту</label>
              <input type="email" class="form-control" id="email" placeholder="Ваша почта">
              <small class="form-text text-muted">Обязательное поле</small>
            </div>
            <div class="form-group">
              <label for="price">Общая цена</label>
              <input type="text" class="form-control" id="price" placeholder="Цена" readonly>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button type="button" class="btn btn-primary">Подтвердить покупку</button>
        </div>
      </div>
    </div>
  </div>
</section>