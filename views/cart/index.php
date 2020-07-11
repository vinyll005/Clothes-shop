<?php require_once(ROOT.'/views/layouts/header.php');?>
<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(/template/images/main2.jpg);">
    <h2 class="l-text2 t-center">
        Cart
    </h2>
</section>
<div class="container">
    <div class="sec-title p-t-60">
        <h3 class="m-text5 t-center">
            Hello <?php echo $_SESSION['userName'];?>, welcome to your cart!
        </h3>
    </div>
</div>

<!-- Cart -->
<?php if(isset($products)): ?>
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1"></th>
                        <th class="column-2">Product</th>
                        <th class="column-3">Price</th>
                        <th class="column-4 p-l-70">Quantity</th>
                        <th class="column-5">Total</th>
                        <th class="column-5">Delete</th>
                    </tr>
                    <?php foreach($products as $product): ?>
                    <tr id="main-cart" class="table-row">
                        <td class="column-1">
                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                <img src="/template/images/products/<?php echo $product['id'];?>.jpg" alt="IMG-PRODUCT">
                            </div>
                        </td>
                        <td class="column-2"><?php echo $product['name'];?></td>
                        <td class="column-3">$<?php echo $product['price'];?></td>
                        <td class="column-4">
                            <div class="flex-w bo5 of-hidden w-size17">
                                <button data-id="<?php echo $product['id'];?>"
                                    class="update-product btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center num-product" type="number" name="num-product1"
                                    value="<?php echo $productsInCart[$product['id']];?>">

                                <button data-id="<?php echo $product['id'];?>"
                                    class="update-product btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </td>
                        <td data-id="<?php echo $product['id'];?>" id="cart-amount<?php echo $product['id'];?>"
                            class="column-5">$<?php echo Cart::updateProductPrice($product['id']);?>
                        </td>
                        <td  class="column-5" >
                            <a href="/cart/delete/<?php echo $product['id'];?>" style="margin-left:15px;"><i class="fas fa fa-times"></i></a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">
                <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                    <a href="/cart/clean" class="clean-cart flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Clean Cart
                     </a>
                </div>
            </div>

            <div class="flex-w flex-m w-full-sm">
                <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                    <a href="/products" class="clean-cart flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Buy more
                     </a>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="container">
                <div class="sec-title p-t-60">
                    <h3 class="m-text5 t-center">
                        Your cart is empty!
                    </h3>
                    </div>
            </div>
        <?php endif;?>
        <!-- Total -->
        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <h5 class="m-text20 p-b-24">
                Cart Totals
            </h5>
            
            <div class="flex-w flex-sb-m p-t-26 p-b-30">
                <span class="m-text22 w-size19 w-full-sm">
                    Total:
                </span>

                <span class="m-text21 w-size20 w-full-sm">
                    <?php if(isset($products)):?>
                        $<?php echo Cart::getTotalPrice($products);?>
                    <?php else:?> 
                        0
                    <?php endif;?>   
                </span>
            </div>
            <div class="flex-w flex-m w-full-sm">
                <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                    <a href="/cart/checkout" class="clean-cart flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Buy products
                     </a>
                </div>
            </div>
    </div>
</section>

<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Featured Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
				<?php if(isset($recommendProducts)): ?>
					<?php foreach($recommendProducts as $product): ?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative <?php if($product['is_new'] == 1) echo "block2-labelnew";?>">
								<img src="/template/images/products/<?php echo $product['id'];?>.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
                                        <button data-id="<?php echo $product['id'];?>" class="add-to-cart flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Add to Cart
                                        </button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="/products/<?php echo $product['id'];?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $product['name'];?>
								</a>

								<span class="block2-price m-text6 p-r-5">
									$<?php echo $product['price'];?>
								</span>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php require_once(ROOT.'/views/layouts/footer.php');?>