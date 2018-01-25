<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
           

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"> Каталог Товаров </h2>

                    <?php foreach ($latestProducts as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="<?php echo $product['friendly_url']; ?>"><img src="<?php echo Product::getImage($product['id']); ?>" alt="" />
                                        <h2><?php echo $product['price']; ?>грн</h2>
                                        <p>
                                            <a href="/<?php echo $product['friendly_url']; ?>">
                                                <?php echo $product['name']; ?>
                                            </a>
                                        </p>
                                        <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $product['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                                    <?php if ($product['is_new']): ?>
                                        <img src="/template/images/home/new.png" class="new" alt="" />
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                </div><!--features_items-->

            
            </div><!--/recommended_items-->

        </div>
    </div>

</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>