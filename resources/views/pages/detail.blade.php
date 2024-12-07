
@extends("main.main")

@section("content")
    <div class="col-sm-9 padding-right" style="width: 100%;">
        <div class="product-details"><!--product-details-->
              <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('main')}}">Main</a></li>
                    <li><a href="{{route('products')}}">Products</a></li>
                    <li class="active">Details</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <div class="view-product">
                    <img src="/public/upl/<?=$tov[0]->img?>" alt="">

                </div>
<?$id = $tov[0]->id?>

            </div>
            <div class="col-sm-6">
                <div class="product-information"><!--/product-information-->
                    <p>ID: <?=$tov[0]['id']?></p>
                    <h2><?=$tov[0]->{"title"}?></h2>
                    <p><font size="3"><?=$tov[0]->{"info"}?></font></p>
                    <span>
                                    <span><?=$tov[0]->price?>sums</span>
                                    <label>Quantity:</label>
                                   
                                     <a href="{{route('req',['id'=>$id])}}" class="btn btn-default " style="background-color: #FE980F;color: white;border-color: white;">
                                        <i class="fa fa-shopping-cart "></i> Order</a>

                                </span>
                   
                   
                    <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""></a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

      



    </div>
@endsection