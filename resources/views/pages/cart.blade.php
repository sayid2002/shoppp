

@extends("main.main2")

@section("content")

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('main')}}">Main</a></li>
                    <li class="active">Orders</li>
                </ol>
            </div>
            <div class="table-responsive cart_info" style="width: 100%; background-color: ; margin: auto;">
                <table class="table table-condensed" >
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Product</td>
                        <td class="description"></td>
                        <td class="quantity">Quantity</td>
                        <td class="price">Price</td>

                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>



                    <?php foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row) :?>

                    <tr> <td class="cart_product">
                            <img style="width: 80px; height: 80px;" src="public/upl/<?php echo ($row->options->has('img') ? $row->options->img : ''); ?>"></img>

                            <a href=""><img src="" alt=""></a>
                        </td> <td class="cart_description">
                            <h4><a href=""><?php echo $row->name; ?></a></h4>
                            <p>Web ID: <?=$row->id?></p>

                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_down" href="{{route('minus',['id'=>$row->rowId,'qty'=>$row->qty])}}"> - </a>
                                <input type="text"  name="quantity" class="cart_quantity_input" size="2" value="<?php echo $row->qty; ?>">
                                <a class="cart_quantity_up" href="{{route('plus',['id'=>$row->rowId,'qty'=>$row->qty])}}"> + </a>
                        </div>
                        </td>

                        <td><?php echo $row->price; ?> sum</td>
                        <td><?php echo $row->price * $row->qty; ?> sum</td>
                        <td class="cart_delete" style="margin-left: 20px">
                            <a class="cart_quantity_delete" href="{{route('delcart',['id'=>$row->rowId])}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>

                    <?php endforeach;?>



                    </tbody>
                </table>
            </div>
        </div>
    </section>
       <section id="do_action">
        <div class="container">
            <div class="heading">
                <p>Fill the blanks</p>
            </div>
            <div class="row">
                <div class="col-sm-6" style="width: 100%">
  
                    <div class="chose_area">

                        <form action="" method="post">


                        <ul class="user_info">
                             

                             <li class="single_field zip-field" style="width: 45%; margin-right: 5%;">
                                <label>Name:</label>
                                <input type="text" name="name"  placeholder="">
                            </li>
                            
                              <li class="single_field zip-field" style="width: 45%;">
                                <label>Surname:</label>
                                <input type="text" placeholder="" name="surname">
                            </li>

                              <li class="single_field zip-field" style="width: 45%; margin-right: 5%;">
                                <label>Phone:</label>
                                <input type="text" name="phone" placeholder="">
                            </li>
                            <li class="single_field" style="width: 45%;">
                                <label>City:</label>
                                <select>
                                    <option name="city" value="Uzbekistan">Tashkent</option>
                                   

                                </select>

                            </li>
                         
                           
                        </ul>


                        <div class="total_area" style="background-color: ; height: 220px;">
                            <ul>
                                <li>Eco Tax <span>$<?=Cart::tax();?></span></li>
                                <li>Shipping Cost <span>Free</span></li>
                                <li>Total <span>$<?=Cart::total();?><?$total = Cart::total()?></span></li>
                            </ul>
@csrf
                            <button type="submit" class="btn btn-default"   style="background-color: #FE980F;color: white;border-color: white; float: right;">Checkout</button>

                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>




@endsection
