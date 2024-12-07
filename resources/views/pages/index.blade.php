
@extends("main.main")

@section("content")

    <div class="col-sm-9 padding-right" style="width: 100%;">
        <div class="features_items" style="background-color: ;"> <!--features_items-->
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('main')}}">Main</a></li>
                </ol>
            </div>
            <h2 class="title text-center">Products</h2>
             
            
    
   <div class="col-sm-6">
    <a href="{{route('products')}}">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                 <img src="/public/upl/h1.jpg" alt="" style="width: 70%; height: 250px;"/>
                                <p><font size="4">Books</font></p>
                                <h2></h2>

                            </div>

                        </div>

                    </div></a>
                </div>

  <div class="col-sm-6">

                    <div class="product-image-wrapper">
                        <div class="single-products">
    <a href="{{route('checkeradmin')}}">
                            <div class="productinfo text-center">
                              <img src="/public/upl/h2.jpg" alt="" style="width: 70%; height: 250px;" />
                                <p><font size="4">Upload a book</font></p>
                                <h2></h2>

                                
                            </div>
</a>
                        </div>

                    </div>
                </div>



           



        </div><!--features_items-->


    </div>

@endsection