<?php
if (isset($_POST['wishlist-submit'])) {
  $addedrecord = $Cart->addToWishlist($_POST['product_id']);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['add_submit'])) {
    $Cart->addToCart($_POST['user_id'], $_POST['product_id']);
  }
}
$product_id = $_GET['product_id'];
var_dump($product_id);
foreach ($Product->getData() as $product) : if ($product['product_id'] == $product_id) :
?>
    <section id="product" class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <img src="<?php echo $product['product_image'] ?? "Image" ?>" alt="Товар" class="img-fluid rounded">
            <div class="form-row pt-4">
              <div class="col text-left">
                <form method="POST">
                  <input type="hidden" value="<?php echo $product['product_id'] ?? 0; ?>" name="product_id">
                  <?php
                  if (in_array($product['product_id'], $Cart->getCartId($Product->getData('cart')) ?? [])) {
                    echo '<button type="submit" disabled class="btn btn-danger">Добавить в избранное</button>';
                  } else {
                    echo '<button type="submit" name="wishlist-submit" class="btn btn-danger text-nowrap">Добавить в избранное</button>';
                  }
                  ?>
                </form>
              </div>
              <div class="col text-right">
                <form method="POST">
                  <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?? '1'; ?>">
                  <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                  <?php
                  if (in_array($product['product_id'], $Cart->getCartId($Product->getData('cart')) ?? [])) {
                    echo '<button type="submit" disabled class="btn btn-success form-control">В корзине</button>';
                  } else {
                    echo '<button type="submit" name="add_submit" class="btn btn-warning form-control">Добавить в корзину</button>';
                  } 
                  ?>
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <h5 class=""><?php echo $product['product_name'] ?? "Unknown"; ?></h5>
            <!-- <small>by <?php echo $product['product_brand'] ?? "Brand"; ?></small> -->
          </div>

          <div class="col-12 mt-5">
            <h5 class="py-4">Сведения о товаре</h5>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam vitae vel?</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam vitae vel?</p>
          </div>
        </div>
      </div>
    </section>

<?php endif;
endforeach; ?>