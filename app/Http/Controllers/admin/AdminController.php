<?php

namespace App\Http\Controllers\admin;

use app\models\Category;

use app\models\Menu;
use App\news;

use App\Http\Controllers\Controller;
use App\Tovari;
use App\User;
use App\Zakaz;
use App\Orders;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function admin()
    {

session_start();
        if (!isset($_SESSION['id'])){

            return redirect()->route("auth");
echo '<script language="javascript">';
echo 'alert("You are not admin")';
echo '</script>';
        }else {



            return redirect()->route("site");
        }

$a = \App\Tovari::all();
$b = \App\Zakaz::all();

$tov = $a->count();
$ord = $b->count();



        return view("admin.pages.index",compact('tov','ord'));
    } 

     public function checkeradmin()
    {

session_start();
        if (!isset($_SESSION['id'])){
echo '<script language="javascript">';
echo 'alert("You are not logged in")';
echo '</script>';
            return redirect()->route("auth");



        }else {



            return redirect()->route("addtov");
        }





       
    }  public function site()
    {

session_start();
      
$a = \App\Tovari::all();
$b = \App\Zakaz::all();

$tov = $a->count();
$ord = $b->count();



        return view("admin.pages.site",compact('tov','ord'));
    } public function addcat(Request $request){
    session_start();
    $lang= App::getLocale();
    $cat = \App\Category::all();
    if ($request->isMethod("post")) {

        $cat = new \App\Category();



        $cat->title_en = $request->input("title_en");
        $cat->title_ru =  $request->input("title_ru");
        $cat->title_uz =  $request->input("title_uz");


        $cat->save();

        return redirect()->route("category");
    }

    return view("admin.pages.addcat",compact('cat','a'));


}public function addtov(Request $request){
    session_start();
    $id = $_SESSION['id'];
  
    $tov = \App\Tovari::all();
//     if ($request->isMethod("post")) {

//         $tov = new \App\Tovari();
//         $tov->title = $request->input("title");
//         $tov->info = $request->input("info");

//   if ($request->file('img') != "")  {
    
         
//         $img = $request->file('img')->getClientOriginalName();
//         $request->file('img')->storeAs('upl',$img); 
//         $tov->img = $img;
//         $tov->img2 = 0;
//         $tov->img3 = 0;
//         $tov->types = $request->input("types");
//         $tov->type2 = $request->input("type2");
//         $tov->type3 = $request->input("type3");}

// if ($request->file('types' ) != ""){
//          $tov->types =  $request->input("types");
//          $tov->type2 = 0;
//          $tov->type3 =  0;

//   }      if ($request->file('types' and'type2' ) != ""){
//         $tov->types =  $request->input("types");
//         $tov->type2 =  $request->input("type2");
//         $tov->type3 = 0;}
//         if ($request->file('types' and 'type2' and 'type3' ) != ""){ 
//             $tov->type3 =  $request->input("type3");
//             $tov->type3 =  $request->input("type3");
//             $tov->type3 =  $request->input("type3");}

//          $tov->price =  $request->input("price");
//         if ($request->file('price2' ) != ""){ $tov->price2 =  $request->input("price2");}
//        if ($request->file('price3' ) != ""){  $tov->price3 =  $request->input("price3");}
//        else{  $tov->price2 = 0; $tov->price3 = 0;}
//         $tov->brand =  $request->input("brand");      $tov->save();
//      if ($request->file('img' and 'img2') != "")  {
         
//         $img = $request->file('img')->getClientOriginalName();
//         $request->file('img')->storeAs('upl',$img);   $img2 = $request->file('img2')->getClientOriginalName();
//         $request->file('img2')->storeAs('upl',$img2); 
//         $tov->img = $img;
//         $tov->img2 = $img2;
//         $tov->img2 = 0; if ($request->file('types' ) != ""){
//          $tov->types =  $request->input("types");
//          $tov->type2 = 0;
//          $tov->type3 =  0;

//   }      if ($request->file('types' and'type2' ) != ""){
//         $tov->types =  $request->input("types");
//         $tov->type2 =  $request->input("type2");
//         $tov->type3 = 0;}
//         if ($request->file('types' and 'type2' and 'type3' ) != ""){ 
//             $tov->type3 =  $request->input("type3");
//             $tov->type3 =  $request->input("type3");
//             $tov->type3 =  $request->input("type3");}
        
//          $tov->price =  $request->input("price");
//         if ($request->file('price2' ) != ""){ $tov->price2 =  $request->input("price2");}
//        if ($request->file('price3' ) != ""){  $tov->price3 =  $request->input("price3");}
//        else{  $tov->price2 = 0; $tov->price3 = 0;}
//         $tov->brand =  $request->input("brand");      $tov->save();
//      }if ($request->file('img' and 'img2' and 'img3' ) != "") {
         
//         $img = $request->file('img')->getClientOriginalName();
//         $request->file('img')->storeAs('upl',$img); 
//         $img2 = $request->file('img2')->getClientOriginalName();
//         $request->file('img2')->storeAs('upl',$img2); 
//         $img3 = $request->file('img3')->getClientOriginalName();
//         $request->file('img3')->storeAs('upl',$img3); 
//         $tov->img = $img;
//         $tov->img2 = $img2;
//         $tov->img3 = $img3;

//          if ($request->file('types' ) != ""){
//          $tov->types =  $request->input("types");
//          $tov->type2 = 0;
//          $tov->type3 =  0;

//   }      if ($request->file('types' and'type2' ) != ""){
//         $tov->types =  $request->input("types");
//         $tov->type2 =  $request->input("type2");
//         $tov->type3 = 0;}
//         if ($request->file('types' and 'type2' and 'type3' ) != ""){ 
//             $tov->type3 =  $request->input("type3");
//             $tov->type3 =  $request->input("type3");
//             $tov->type3 =  $request->input("type3");}
        
//          $tov->price =  $request->input("price");
//         if ($request->file('price2' ) != ""){ $tov->price2 =  $request->input("price2");}
//        if ($request->file('price3' ) != ""){  $tov->price3 =  $request->input("price3");}
//        else{  $tov->price2 = 0; $tov->price3 = 0;}
//         $tov->brand =  $request->input("brand");      $tov->save();
//      }
    
   


// else{

   
// }
 if ($request->isMethod("post")) {

            $tov = new \App\Tovari();
         $tov->title = $request->input("title");
        $tov->info = $request->input("info");
$images = ['img'];

foreach ($images as $imageField) {
    if ($request->hasFile($imageField) && $request->file($imageField)->getSize() > 0) {
        $img = $request->file($imageField)->getClientOriginalName();
        $request->file($imageField)->storeAs('upl', $img);
        $tov->$imageField = $img; // Assign the image name to the corresponding field
    } else {
        // Handle the case where no image is uploaded (e.g., set a default image name)
        // For example:
        $tov->$imageField = 'default_image.jpg';
    }
}


          // if (!isset($request->file('img' == null)) {
          //      $img = $request->file('img')->getClientOriginalName();
          //   $request->file('img')->storeAs('images',$img);
            
          //   }    if (!isset($request->file('img' and 'img2' == null)) {
          //      $img = $request->file('img')->getClientOriginalName();
          //   $request->file('img')->storeAs('images',$img);
          //   $img2 = $request->file('img2')->getClientOriginalName();
          //   $request->file('img2')->storeAs('images',$img2);
            
          //   }    if (!isset($request->file('img' and 'img2' and 'img3' == null)) {
          //      $img = $request->file('img')->getClientOriginalName();
          //   $request->file('img')->storeAs('images',$img);
          //   $img2 = $request->file('img2')->getClientOriginalName();
          //   $request->file('img2')->storeAs('images',$img2);
          //   $img3 = $request->file('img3')->getClientOriginalName();
          //   $request->file('img3')->storeAs('images',$img3);
            
          //   }  
           
        

            $tov->price = $request->input("price");
            $tov->user_id = $id;
          
         
            $tov->save();
       
         return redirect()->route("userbooks",['id'=>$id]);
        }
        
    
       

       
  

    // }

    return view("admin.pages.addtov",compact('tov','a','img'));


}public function category()
{
    session_start();
    $lang= App::getLocale();
    $cat = \App\Category::all();





    return view("admin.pages.category",compact('cat','a'));
}public function left()
{



    return view("admin.inc.left");
}public function editcat($id,Request $request)
{
    $cat = \App\Category::where(['id' => $id])->get();
    if ($request->isMethod("post")) {


        $cat[0]->title_en = $request->input("title_en");
        $cat[0]->title_ru = $request->input("title_ru");
        $cat[0]->title_uz = $request->input("title_uz");


        $cat[0]->save();
        return redirect()->route("category");


    }

    return view("admin.pages.editcat",compact('cat'));
}public function edittov($id,Request $request)
{
    session_start();
    $tov = \App\Tovari::where(['id' => $id])->get();
    if ($request->isMethod("post")) {


     


        if ($request->file('img') != "") {
            $img = $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('upl', $img);
            $tov[0]->img = $img;

          
                      

     $tov[0]->title = $request->input("title");
        $tov[0]->info = $request->input("info");
       
        $tov[0]->price = $request->input("price");
      
      


            $tov[0]->save();

        }  
        else{
$tov[0]->title = $request->input("title");
        $tov[0]->info = $request->input("info");
       
        $tov[0]->price = $request->input("price");
      
      


            $tov[0]->save();

        }
    

   $userid = $_SESSION['id'];

  
        return redirect()->route("userbooks",['id'=>$userid]);
    }

        return view("admin.pages.edittov", compact('tov'));


}public function editcom($id,Request $request)
{
    $com = \App\Commentary::where(['id' => $id])->get();
    if ($request->isMethod("post")) {


        $com[0]->author = $request->input("author");
        $com[0]->text = $request->input("text");
        $com[0]->comment_id = $request->input("comment_id");


        $com[0]->save();
        return redirect()->route("commentary");


    }

    return view("admin.pages.editcom",compact('com'));
}
    public function dellcat($id)
    {



        $m = \App\Category::where(['id' => $id])->delete();

        return redirect()->route("category");

    }  public function delltov($id)
{
    session_start();
    $id2 = $_SESSION['id'];



    $m = \App\Tovari::where(['id' => $id])->delete();

    return redirect()->route("userbooks",['id'=>$id2]);

} public function dellcom($id)
{



    $m = \App\Commentary::where(['id' => $id])->delete();

    return redirect()->route("commentary");

} public function finishord($id)
{




    $m = Zakaz::find($id);
    $m->status = 1;
    $m->save();



    return redirect()->route("orders");

}  public function cancelord($id)
{

    $m = Zakaz::find($id);
    $m->status = 2;
    $m->save();




    $m->save();
    return redirect()->route("orders");

}   public function news() {
    $news = \App\news::all();

    return view("admin.pages.news",compact('news'));
} public function commentary() {
    $commentary = \App\Commentary::all();


    return view("admin.pages.commentary",compact('commentary'));
}public function tovari() {
    $tovari = \App\Tovari::all();


    return view("admin.pages.tovari",compact('tovari'));
}public function ordersuser($id) {
    $tovari = Zakaz::where(['user_id' => $id])->get();


    return view("admin.pages.ordersuser",compact('tovari'));
}public function orders() {
    $orders = Zakaz::all();



    return view("admin.pages.orders",compact('orders'));
}public function users() {
    $users = \App\Registry::all();


    return view("admin.pages.users",compact('users'));
}
}
