
@extends("main.main")

@section("content")
    <div class="col-sm-4 col-sm-offset-1">

        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form_group">

                <div class="form_group">
                    <label for="exampleInputEmail1">name</label><br />
                    <input type="text" name="name"  class="form-control"   value="<?=$users[0]['name']?>"/>
                </div>  <div class="form_group">
                    <label for="exampleInputEmail1">surname</label><br />
                    <input type="text" name="surname"  class="form-control"   value="<?=$users[0]['surname']?>"/>
                </div>  <div class="form_group">
                    <label for="exampleInputEmail1">phone</label><br />
                    <input type="text" name="phone"  class="form-control"   value="<?=$users[0]['phone']?>"/>
                </div> <div class="form_group">
                    <label for="exampleInputEmail1">img</label><br />
                    <input type="file" name="img"  class="form-control"/>
                </div>


                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>





@endsection
