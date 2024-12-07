
@extends("main.main")

@section("content")

    <div class="col-sm-4">
        <div class="signup-form"><!--sign up form-->
            <h2>@lang('home.new')</h2>
            <form action="" method="post">
                @csrf
                <input type="text" placeholder="@lang('home.yourname')" name="name">
                <input type="text" placeholder="@lang('home.surname')" name="surname"/>
                <input type="text" placeholder="@lang('home.phone')" name="phone"/>
                <input type="text" placeholder="@lang('home.login')" name="login"/>
                <input type="password" placeholder="@lang('home.password')" name="password"/>
                <button type="submit" class="btn btn-default">@lang('home.signup')</button>
            </form>
        </div><!--/sign up form-->
    </div>  <div class="col-sm-1">
        <h2 class="or">@lang('home.or')</h2>
    </div><br><br>
   <h3><font color="#808080">@lang('home.have')</font></h3>
        <h3><a href="{{route('auth')}}"><font color="#FE980F">@lang('home.click')</font></a></h3></div>
@endsection