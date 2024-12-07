@extends("main.main")


@section('content')


    <div class="container-fluid" style="height: 400px;">
        <div class="category-tab"><!--category-tab-->

            <div class="tab-content">
               
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
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">edit</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">delete</th>

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

                       


                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route('edittov',['id'=>$item['id']])}}"><font color="blue">Edit</font></a></td>
                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route('delltov',['id'=>$item['id']])}}"><font color="blue">Delete</font></a></td>

                    </tr><?php }?>






                    </tbody>

                </table>


            </div>





        </div><!--/category-tab-->




    </div>

@endsection