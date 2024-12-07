
@extends("main.main")

@section("content")

    <div class="col-sm-4 col-sm-offset-1">
        <div class="login-form"><!--sign up form-->
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('main')}}">Main</a></li>
                    <li class="active">Log up</li>
                </ol>
            </div>
            <h2>Registry</h2>
            <form action="" method="post">
                @csrf
                <input type="text" placeholder="Name" name="name">
                <input type="text" placeholder="Surname" name="surname"/>
                <input type="text" placeholder="Phone" name="phone"/>
                <input type="text" placeholder="Login" name="login"/>
                <input type="password" placeholder="Password" name="password"/>
                <button type="submit" class="btn btn-default">Sign up</button>
            </form>
        </div><!--/sign up form-->
    </div> 

     <div class="col-sm-1">
        <h2 class="or">OR</h2>
    </div><br><br>
   <h3><font color="#808080">Do you have an account?</font></h3>
        <h3><a href="{{route('auth')}}"><font color="#FE980F">Click here to log in!</font></a></h3></div>

        <br><br>
@endsection

