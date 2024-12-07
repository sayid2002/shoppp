
@extends("main.main")

@section("content")

    <?php if(isset($_SESSION['id'])){?>


    <div class="col-sm-4 " style="width: 100%;background-color: ;"> <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('main')}}">Main</a></li>
                    <li class="active">Profile</li>
                </ol>
            </div>
        <div style=" width: 200px; margin: auto;background-color: ;">
           
        <?php
        if ($users[0]->img == null){ ?>
        <img  style="width: 250px;margin: auto; height: 250px;border-radius: 250px" src="/public/upl/blank1.jpg" alt="">


        <?php } else{?>

        <img  style="margin: auto;width: 200px;margin-bottom: 20px;  height: 200px;border-radius: 200px" src="/public/upl/blank1.jpg?>" alt="">




        <?php }?></div>
        <table border="1" align="" width="300" style="position:relative;" class="table">
            <tr>
                <td>id</td>
                <td>Name </td>
                <td>Surname </td>
                <td>Phone</td>
              

<?if ($users[0]->status == 0) {?>
                <td><a href="{{route('addtov')}}">Add book</a></td>
              
    
<?}
else{?>

                <td><a href="{{route('admin')}}">AdminPage</a></td>

<?}
?>

                



            </tr>
            <tr>
                <td><?php echo $users[0]->id;?></td>
                <td><?php echo $users[0]->name;?></td>
                <td><?php echo $users[0]->surname;?></td>
                <td><?php echo $users[0]->phone;?></td>
               <?if ($users[0]->status == 0) {?>
               
                <td><a href="{{route('userbooks',['id'=>$users[0]->id])}}">My books</a></td>
    
<?}?>
             


            </tr>



        </table>
<a href="{{route('exit')}}"><button class="btn btn-default"  style="background-color: #FE980F;color: white;border-color: white;width: 110px;">Exit</button></a>






    </div>


    <?php }
    else{ ?>
    You are not logged in!

    <?php }?>





@endsection