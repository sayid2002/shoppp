
@extends("main.main")

@section("content")
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2><?php if($s->isNotEmpty()){
                     foreach ($s as $item){?>


                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/public/images/home/<?=$item['img']?>" alt="" />
                                    <h2>$<?=$item['price']?></h2>
                                    <p><?=$item['title']?></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>



                    <?php   }}

                     else{?>
                    <div>
                        <h2 align="center">No posts found</h2>
                    </div> <?php }?>





                </div><!--features_items-->




            </div>


@endsection
