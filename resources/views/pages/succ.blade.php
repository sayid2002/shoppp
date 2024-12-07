@extends("main.main2")

@section("content")



    <div class="col-sm-4 " style="width: 100%; background-color: ;">
        <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('main')}}">Main</a></li>
                    <li class="active">Orders</li>
                </ol>
            </div>


<h1 style="margin: auto;padding-top: 5%;color: #fdb45e;" align="center">You have ordered succesfully!</h1>
        <h3 style="margin: auto;margin-bottom: 20%;" align="center" ><a href="{{route('main')}}"><font color="#808080">Continue shopping</font></a></h3>




    </div>





@endsection