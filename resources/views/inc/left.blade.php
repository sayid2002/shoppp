<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>@lang("home.category")</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">

               <?php

                $lang = \Illuminate\Support\Facades\App::getLocale();


                foreach ($category as $item){

                   ?>

                    <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route('category',['id'=>$item->id])}}"><?=$item->{"title_$lang"}?></a></h4>
                </div>
            </div>




             <?php   }?>

            </div>

        </div><!--/category-products-->




        <div class="price-range"><!--price-range-->
            <h2>@lang("home.pricerange")</h2>
            <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div><!--/price-range-->

        <div class="shipping text-center"><!--shipping-->
            <img src="/public/images/home/shipping.jpg" alt="" />
        </div><!--/shipping-->
        <br>
        <button class="button btn btn-default pull-left" style="margin-bottom: 10px; background-color: #FE980F;width: 50%"><a href="{{route('registry')}}"><font color="white">@lang("home.reg")</font></a></button>
        <button class="button btn btn-default pull-right" style="margin-bottom: 10px;background-color: #FE980F;width: 50%"><a href="{{route('auth')}}"><font color="white">@lang("home.auth")</font></a></button>

    </div>

</div>    <br>