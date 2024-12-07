@extends("admin.main")


@section('content')


    <div class="container-fluid">

        <form action="" method="post" enctype="multipart/form-data">

           
          
                
               @csrf
                  



                        <input style="width: 300px" type="text" value="<?=$tov[0]['title']?>" name="title" id=""><br>
                        <input style="width: 300px" type="text" value="<?=$tov[0]['info']?>" name="info" id=""><br>


                 



                  


           

            <div class="form_group">
                <label for="exampleInputEmail1">img</label><br />
                <input type="file" name="img"  class=""/>
            </div>
            <input style="width: 300px" type="text" value="<?=$tov[0]['price']?>" name="price" id=""><br>
           

 
    


         <br> 




            <input style="position: relative;left: 110px" type="submit" ><br>
        </form>

    </div>

@endsection