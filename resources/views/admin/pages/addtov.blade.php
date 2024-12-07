@extends("admin.main2")


@section('content')
<?php    $lang= App::getLocale();?>


    <div class="container-fluid">
        <form style="" action="" method="post" enctype="multipart/form-data">

            @csrf
           



                        <input  style="width:300px;" type="text" placeholder="Title" name="title" id=""><br>
                        <input  style="width:300px;" type="text" placeholder="Info" name="info" id=""><br>
                        Picture
                        <input style="width:300px;" type="file" name="img" />
                      
            <input style="width:300px;" type="text" placeholder="Price" name="price" id=""><br>

         

            <input  style="width:300px;" type="submit" class="button" value="Submit">

        </form>










    </div>

@endsection