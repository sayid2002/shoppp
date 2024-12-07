
@extends("main.main")

@section("content")

    <div class="col-sm-9 padding-right" style="width: 100%;">
        <div class="features_items"><!--features_items-->
             <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('main')}}">Main</a></li>
                    <li class="active">Products</li>
                </ol>
            </div>
            <h2 class="title text-center">Products</h2>
             <?
if ($tovari != null) {
            
            
 

foreach ($tovari as $item) {
$id = $item->id;
    ?>

   <div class="col-sm-5" style="background-color: ; width: 32%;margin-left: 10px;">
                   <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="{{route('detail',['id'=>$item->id])}}">   <img src="/public/upl/<?=$item['img']?>" alt="" style="width: 300px; height: 200px;"/></a>
                                <p><font size="4"><?=$item['title']?></font></p>
                                <h2><?=$item['price']?>sums</h2>
  <a href="{{route('req',['id'=>$id])}}" class="btn btn-default "  style="background-color: #FE980F;color: white;border-color: white;"><i class="fa fa-shopping-cart" ></i>  Order</a>
                            </div>


                        </div>

                    </div>
  
                </div>

 

    <?}

           
} elseif (!isset($tovari)) {
?><h1>You have not ordered anything yet</h1>
<?}

{?>


<?} ?>

        </div><!--features_items-->


    </div>

@endsection