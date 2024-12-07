<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">

        </div>
    </div><!--/header_top-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{route('main')}}"><img src="/public/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        
                        <ul class="nav navbar-nav">
<?if (!isset($_SESSION['id'])) {?>
<a href="{{route('auth')}}"><button class="btn btn-default"  style="background-color: #FE980F;color: white;border-color: white;">Log in</button></a>
<a href="{{route('registry')}}"><button class="btn btn-default"  style="background-color: #FE980F;color: white;border-color: white;">Log up</button></a>
<?}else{?>
<a href="{{route('cab')}}"><button class="btn btn-default"  style="background-color: #FE980F;color: white;border-color: white;">Profile</button></a>


<?}?>
 
                           










                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                
                <div class="col-sm-3">

                    </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
