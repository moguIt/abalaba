<?php include ROOT . '/views/layouts/header.php'; ?>

<section data-page="indexCatalog">
    <div class="container">
        <div class="row">

            <?php include ROOT . '/views/layouts/menu.php'; ?>

            <?php
                include ROOT . '/views/layouts/filters.php';
                echo '</div>';
            ?>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Новинки</h2>
                    <div id="goods">
                        <img src="/template/images/loading.gif" alt="" class="gif-good"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script id="goods-template" type="text/template">
    <% _.each(goods, function(item) { %>

    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="/upload/images/products/<%= item.product_id %>.jpg" alt="" />
                    <h2><%= item.product_price %> грн</h2>
                    <p>
                        <a href="/product/<%= item.product_id %>"><%= item.product_name %></a>
                    </p>
                    <a href="/cart/add/<%= item.product_id %>" data-id="<%= item.product_id %>"
                       class="btn btn-default add-to-cart">
                        <i class="fa fa-shopping-cart"></i>В корзину
                    </a>
                </div>
            </div>
        </div>
    </div>
    <% }); %>
</script>

<script id="brands-template" type="text/template">
    <% _.each(brands, function(item) { %>
        <div class="checkbox"><label><input type="checkbox" name="brands[]" value="<%= item.brand_id %>">
            <%= item.brand_name %></label>
        </div>
    <% }); %>
</script>

<?php include ROOT . '/views/layouts/footer.php'; ?>