<?php

namespace App\Http\Controllers;




use App\Registry;

use App\Tovari;
use App\Zakaz;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller{

    public function main()
    {


session_start();
        

        $tovari = DB::select("select * from tovari");

//
//        foreach ($tovari as $item) {
//            echo($item->title_ru);
//        }
//exit;
//



        return view("pages.index", compact( 'category','tovari','tov1','tov2','tov3','slider','i'));
    }     public function products(Request $request)
    {


session_start();
       

               $tovari = Tovari::all();


//
//        foreach ($tovari as $item) {
//            echo($item->title_ru);
//        }
//exit;
//



        return view("pages.products", compact('tovari'));
    }  public function main2()
    {

        



        return view("pages.index", compact( ''));
    } public function category($id)
    {session_start();

        
        $cat = DB::select("select title, id,img,price,nav_id,cat_id from tovari where cat_id = $id");







        return view("pages.category", compact( '', 'category','tov1','tov2','tov3','slider','i','cat'));
    } public function registry(Request $request)
{
    session_start();

    






    $reg = Registry::all();


    if ($request->isMethod("post")) {

        $reg = new Registry();

        $reg->name = $request->input("name");
        $reg->surname = $request->input("surname");
        $reg->phone = $request->input("phone");
        $reg->login = $request->input("login");
        $reg->password = $request->input("password");
        $reg->status = 0;
        $reg->save();
        return redirect()->route("auth");
    }


    return view("pages.registry",compact( '', 'category','tov1','tov2','tov3','slider','i','cat','tov','commentary'));
} public function detail(Request $request,$id)
    {

       
        session_start();
        


        $tov = Tovari::where(['id'=>$id])->get();








        return view("pages.detail", compact('tov'));
    }

    public function auth(Request $request)
    {
session_start();

        






        if ($request->isMethod("post")) {

        
            $login = $request->input("login");
            $password = $request->input("password");
           
            $reg = Registry::where(['login' => $login, 'password' => $password])->first();

           $_SESSION['id'] = $reg['id'];

 return redirect()->route('cab');


// $_SESSION['status'] = $reg['status'];
//             if ($reg['status'] == 'admin') {
// $_SESSION['id'] = $reg['id'];

// return redirect()->route('cab');
//             }
//             else{
// echo '<script language="javascript">';
// echo 'alert("Siz admin emassiz")';
// echo '</script>';

//             }






      }

        return view("pages.auth", compact( '', 'category','tov1','tov2','tov3','slider','i','cat','tov','commentary'));
    }

    public function cab()
    {
        session_start();

if (!isset($_SESSION['id'])){

return redirect()->route("auth");

}else {

    $id = $_SESSION['id'];

    






    $users = Registry::where(['id' => $id])->get();


    return view("pages.cab", compact('', 'category', 'tov1', 'tov2', 'tov3', 'slider', 'i', 'cat', 'tov', 'commentary', 'users'));

}
    }
    public function edit(Request $request)
    {
        session_start();

       
        $id = $_SESSION['id'];

        






        $users = Registry::where(['id' => $id])->get();
        if($request->isMethod("post")){



            $users[0]->name = $request->input("name");
            $users[0]->surname = $request->input("surname");
            $users[0]->phone = $request->input("phone");

            $img = $request->file('img')->getClientOriginalName();
            $users[0]->img = $request->file('img')->storeAs('./upl',$img);

            $users[0]->save();
            return redirect()->route("cab");
        }


        return view("pages.edit", compact('', 'category','tov1','tov2','tov3','slider','i','cat','tov','commentary','users'));
    }
    public function exit()
    {

        session_start();


        unset($_SESSION['id']);

        return redirect()->route("auth");
    }public function delete()
{

    session_start();

    $m = Registry::where(['id' => $_SESSION['id']])->delete();

    return redirect()->route("auth");

}public function userbooks($id)
{
    session_start();

    $tovari = Tovari::where(['user_id' => $id])->get();


    return view("pages.userbooks",compact('tovari'));

}public function req($id)
{
      session_start();

   

    $a = Tovari::find($id);

   $addcart =  Cart::add(['id' => $a['id'] ,'name' => $a['title'],'img' => $a['img'], 'qty' => 1, 'price' => $a['price'], 'weight' => 998 , 'options' => ['img' => $a['img']]]);

    return redirect()->route("cart");


 






}


public function cart(Request $request)
{
      session_start();
    if ($request->isMethod("post")) {






        foreach (Cart::content() as $row) {



           
            $title = $row->name;
            $img = $row->options->has('img') ? $row->options->img : '';
            $price = Cart::total();
$qty = $row->qty;

        

        


            $m = new Zakaz();

          
            $m->title = $title;
            $m->prod_id = $row->id;
            $m->img = $img;
            $m->qty = $qty;
            $m->price = $price;
           
              $m->name = $request->get("name");
            $m->surname = $request->get("surname");
            $m->phone = $request->get("phone");
           
            $m->status = 0;
           


            $m->save();

        }
        Cart::destroy();
        return redirect()->route('succ');

        }
    return view("pages.cart", compact('carts','','id','title','img','price','client','email','phone'));


}


    public function search(Request $request){
       
        $search = $request->input('search');
        









       $s =  Tovari::where('title', 'like', '%' . $search . '%')->get();
        return view('pages.search', compact('posts','', 'category','tov1','tov2','tov3','slider','i','cat','tov','commentary','users','s'));
    }
    public function plus($id,$qty)
    {
      $qty +=1;




        Cart::update($id,$qty);
return redirect()->back();
    }




    public function minus($id,$qty)
    {
      $qty -=1;




        Cart::update($id,$qty);
return redirect()->back();
    }   public function succ()
    {

       
        $i = "0";

        




return  view('pages.succ',compact('','category','slider','i'));
    } public function delcart($id)
    {
        Cart::remove($id);



return redirect()->back();
    }
}