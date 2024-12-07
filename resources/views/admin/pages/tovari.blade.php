@extends("admin.main")


@section('content')


    <div class="container-fluid">
        <div class="category-tab"><!--category-tab-->

            <div class="tab-content">
                <button style="background-color: grey;margin-bottom: 5px;  border-color: grey"><a href="{{route('addtov')}}"><font color="white">Add product</font></a></button>
                <br>

                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                    <thead>
                    <tr><th class="sorting sorting_asc"
                            tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="">Id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Title</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Info</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Image</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Price</th>

                    </thead>
                    <tbody>

                    <?php foreach ($tovari as $item){?>






                    <tr class="odd" >
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>


                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['title']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['info']?></td>
                        <td width="100" class="dtr-control sorting_1" tabindex="0">

                            <img width="100%" height="40px" style="margin-top: 5px;" src="/public/upl/<?=$item['img']?>" alt="">
                          
                            </td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['price']?> sum<br>

                       


                       
                    </tr><?php }?>






                    </tbody>

                </table>


            </div>





        </div><!--/category-tab-->




    </div>

@endsection