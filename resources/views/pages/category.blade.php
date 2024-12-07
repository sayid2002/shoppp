
@extends("main.main")

@section("content")

    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">@lang('home.featured')</h2>
            <?php   $lang = \Illuminate\Support\Facades\App::getLocale();foreach($cat as $item){?>


            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="/public/images/home/<?=$item->img?>" alt="" />
                            <h2>$<?=$item->price?></h2>
                            <p><?=$item->{"title_$lang"}?></p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>@lang('home.add')</a>
                        </div>

                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>@lang('home.addw')</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>@lang('home.addc')</a></li>
                        </ul>
                    </div>
                </div>
            </div>



            <?php   }?>




        </div><!--features_items-->

        <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tshirt" data-toggle="tab">@lang('home.tshirt')</a></li>
                    <li><a href="#blazers" data-toggle="tab">@lang('home.blazers')</a></li>
                    <li><a href="#sunglass" data-toggle="tab">@lang('home.sunglass')</a></li>

                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tshirt" >

                    <?php   $lang = \Illuminate\Support\Facades\App::getLocale();
                    foreach ($tov1 as $item){?>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/public/images/home/<?=$item->img?>" alt="" />
                                    <h2>$<?=$item->price?></h2>
                                    <p><?=$item->{"title_$lang"}?></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>@lang("home.add")</a>
                                </div>

                            </div>
                        </div>
                    </div>





                    <?php     }?>

                </div>

                <div class="tab-pane fade" id="blazers" >
                    <?php   $lang = \Illuminate\Support\Facades\App::getLocale();
                    foreach ($tov2 as $item){?>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/public/images/home/<?=$item->img?>" alt="" />
                                    <h2>$<?=$item->price?></h2>
                                    <p><?=$item->{"title_$lang"}?></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>@lang("home.add")</a>
                                </div>

                            </div>
                        </div>
                    </div>





                    <?php     }?>
                </div>

                <div class="tab-pane fade" id="sunglass" >
                    <?php   $lang = \Illuminate\Support\Facades\App::getLocale();
                    foreach ($tov3 as $item){?>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/public/images/home/<?=$item->img?>" alt="" />
                                    <h2>$<?=$item->price?></h2>
                                    <p><?=$item->{"title_$lang"}?></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>@lang("home.add")</a>
                                </div>

                            </div>
                        </div>
                    </div>





                    <?php     }?>
                </div>


            </div>
        </div><!--/category-tab-->



    </div>
@endsection