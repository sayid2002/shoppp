
@extends("main.main")

@section("content")

    <div class="col-sm-4 col-sm-offset-1">
        <div class="login-form"><!--login form-->
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('main')}}">Main</a></li>
                    <li class="active">Log in</li>
                </ol>
            </div>
            <h2>Log in to your account</h2>
            <form action="" method="post">
                @csrf
                <input type="text" placeholder="Login" name="login">
                <input type="password" placeholder="Password" name="password" />
                <span>
								<input type="checkbox" class="checkbox">
                  Remember me
							</span>
                <button type="submit" style="margin-bottom: 20px;" class="btn btn-default">Log in</button>
            </form>
        </div><!--/login form-->
    </div>
    <div class="cleaner" ></div>
       <div class="col-sm-1">
        <h2 class="or">OR</h2>
    </div><br><br>
   <h3><font color="#808080">Don't you have an account yet?</font></h3>
        <h3><a href="{{route('registry')}}"><font color="#FE980F">Click here to log up </font></a></h3>
@endsection