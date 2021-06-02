<?php
ob_start();
include('header.php');
?>

<?php

$subcategory = array_map(function ($product) {
  return $product['product_subcategory'];
}, $product_kids);
$unique = array_unique($subcategory);
sort($unique);
shuffle($product_kids);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['add_submit'])) {
    $Cart->addToCart($_POST['user_id'], $_POST['product_id']);
  }
}

$in_cart = $Cart->getCartId($Product->getData('Cart'));
?>

<section id="kids">
  <div class="container py-4">
    <div class="row">
      <div id="filters" class="button-group  col-md-1 order-md-2 mt-1">
        <button class="btn is-checked font text-left text-nowrap subcategory__list" data-filter="*">Вся одежда</button>
        <?php
        array_map(function ($subcategory) {
          printf('<button class="btn font text-left subcategory__list" data-filter=".%s">%s</button>', $subcategory, $subcategory);
        }, $unique);
        ?>
      </div>

      <div class="grid col-md-11 order-md-1">
        <?php array_map(function ($product) use ($in_cart) {
        ?>
          <div class="grid-item px-3 <?php echo $product['product_subcategory'] ?? "Subcategory"; ?>">
            <div class="item py-3" style="width: 300px;">
              <div class="product">
                <a href="<?php printf('%s?product_id=%s', 'product.php',  $product['product_id']); ?>"><img src="<?php echo $product['product_image'] ?? "Image"; ?>" alt="Товар" class="img-fluid rounded"></a>

                <div class="text-center">
                  <h5 class="py-2 h5-font"><?php echo $product['product_name'] ?? "Unknown"; ?></h5>
                  <div class="rating text-warning">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                  </div>
                  <div class="price py-2">
                    <span class="font">₽ <?php echo $product['product_price'] ?? 0 ?></span>
                  </div>
                  <form method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?? '1'; ?>">
                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                    <?php
                    if (in_array($product['product_id'], $in_cart ?? [])) {
                      echo '<button type="submit" disabled class="btn btn-success">В корзине</button>';
                    } else {
                      echo '<button type="submit" name="add_submit" class="btn btn-warning">Добавить в корзину</button>';
                    }
                    ?>
                  </form>
                </div>

              </div>
            </div>
          </div>
        <?php }, $product_kids) ?>
      </div>
    </div>
  </div>
</section>

<?php
include('footer.php');
?>