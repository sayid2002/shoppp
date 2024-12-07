
@extends("main.main")

@section("content")

    <div class="col-sm-4 col-sm-offset-1">
        <div class="login-form"><!--login form-->
            <h2>@lang('home.signin')</h2>
            <form action="" method="post">
                @csrf
                <input type="text" placeholder="@lang('home.login')" name="login">
                <input type="password" placeholder="@lang('home.password')" name="password" />
                <span>
								<input type="checkbox" class="checkbox">
                    @lang('home.keep')
							</span>
                <button type="submit" class="btn btn-default">@lang('home.log')</button>
            </form>
        </div><!--/login form-->
    </div>
    <div class="col-sm-1">
        <h2 class="or">@lang('home.or')</h2>
    </div>
    <br><br> <h3><font color="#808080">@lang('home.new')</font></h3>
       <h3><a href="{{route('registry')}}"><font color="#FE980F">@lang('home.click')</font></a></h3></div>
@endsection