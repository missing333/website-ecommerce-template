<!-- Special Price -->
<?php
    $brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['special_price_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$in_cart = $Cart->getCartId($product->getData('cart'));

?>
<section id="all-items">
    <div class="gridcontainer" style="display:grid;grid-template-columns: 250px 3fr;margin:0px;">
        <div id="filters" class="button-group text-left font-baloo font-size-16" style="display:flex;flex-direction:column;align-items: flex-start;">
            <button class="bold btn is-checked" data-filter="*" style="">ALL BRANDS</button>
            <?php
                array_map(function ($brand){
                    printf('<button class="btn" data-filter=".%s"  style="align-items: flex-start;">%s</button>', $brand, $brand);
                }, $unique);
            ?>
        </div>

        <div id="gridAll" class="grid" style="height: 350px;">
            <?php array_map(function ($item) use($in_cart){ ?>
            <div class="mycard grid-item border <?php echo $item['item_brand'] ?? "Brand" ; ?>">
                <div style="width: 200px;height: 300px;">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>">
                          <img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid" style="object-fit:cover;height: 200px;width:100%;">
                        </a>
                        <div class="text-center">
                            <h6 class="bold"><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                            <div class="price py-2">
                                <span>$<?php echo $item['item_price'] ?? 0 ?></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                if (in_array($item['item_id'], $in_cart ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                }else{
                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $product_shuffle) ?>
        </div>
    </div>
</section>
<!-- !Special Price -->
