$(document).ready(function () {

  // Isotope фильтр
  var $grid = $('.grid').isotope({
    itemSelector: '.grid-item',
    layoutMode: 'fitRows'
  });

  // Отфильтровать продукты по нажатию кнопки
  $('.button-group').on('click', 'button', function () {
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
  })
  
  let $qty_up = $('.qty .qty-up');
  let $qty_down = $('.qty .qty-down');
  let $deal_price = $('#deal-price');

  // Увеличить количество товара
  $qty_up.click(function (e) {

    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

    // Изменить цену исп. AJAX
    $.ajax({
      url: "database/ajax.php", type: 'post', data: { productid: $(this).data("id") }, success: function (result) {
        let obj = JSON.parse(result);
        let product_price = obj[0]['product_price'];

        if ($input.val() >= 1 && $input.val() <= 9) {
          $input.val(function (i, oldval) {
            return ++oldval;
          });

          // Ув. цену продукта
          $price.text(parseInt(product_price * $input.val()).toFixed(2));

          // Промежуточный итог
          let subtotal = parseInt($deal_price.text()) + parseInt(product_price);
          $deal_price.text(subtotal.toFixed(2));
        }

      }
    });
  });

  // Уменьшить количество товара
  $qty_down.click(function (e) {

    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

    // Изменить цену исп. AJAX
    $.ajax({
      url: "database/ajax.php", type: 'post', data: { productid: $(this).data("id") }, success: function (result) {
        let obj = JSON.parse(result);
        let product_price = obj[0]['product_price'];

        if ($input.val() > 1 && $input.val() <= 10) {
          $input.val(function (i, oldval) {
            return --oldval;
          });

          // Ув. цену продукта
          $price.text(parseInt(product_price * $input.val()).toFixed(2));

          // Промежуточный итог
          let subtotal = parseInt($deal_price.text()) - parseInt(product_price);
          $deal_price.text(subtotal.toFixed(2));
        }

      }
    });
  });


});