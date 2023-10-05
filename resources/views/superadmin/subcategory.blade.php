@extends('superadmin.layouts.app')

@section('content')
        <div class="app-inner-layout app-inner-layout-page">
            <div class="app-inner-layout__wrapper">
                <div class="app-inner-layout__content pt-1">
                    <div class="tab-content">
                        <div class="container-fluid">


                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#staticBackdrop">Add Sub-Category</button>


                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Insert Sub-Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.insert_subcategory') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Sub-Category Title(in English)</label>
                                              <input type="text" name="english" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Sub-Category Title(in Bengali)</label>
                                              <input type="text" name="bangla" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group mb-3">
                                                <select name="news_categories" id="news_categories" class="form-control">
                                                    <option class="form-control" value="">---Select News-Category---</option>
                                                    @foreach ($category as $categories)
                                                    <option class="form-control" value="{{$categories->id}}">{{$categories->cate_title_eng}}</option>
                                                    @endforeach
                                                 </select>
                                                 </div>
                                            <div class="form-group mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option class="form-control" value="active">Active</option>
                                                <option class="form-control" value="deactive">De-Active</option>
                                             </select>
                                             </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </form>
                                    </div>
                                </div>
                                </div>
                            </div>



                            {{-- edit-modal --}}
                            <div class="modal fade" id="staticBackdropEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit District</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.update_subcategory') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Sub-Category Title(in English)</label>
                                              <input type="text" name="english" id="name_eng" class="form-control" aria-describedby="emailHelp">
                                              <input type="hidden" name="sc_id" id="scid" >
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Sub-Category Title(in Bengali)</label>
                                              <input type="text" name="bangla" id="name_ban" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Select Division</label>
                                                <select name="category" id="CategoryEdit" class="form-control">
                                                @foreach ($category as $cate)
                                                    <option class="form-control" value="{{ $cate->id }}"> {{ $cate->cate_title_eng }} </option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="country">Status</label>
                                                <select name="status" id="subCategories" class="form-control" >
                                                <option class="form-control" value="active">Active</option>
                                                <option class="form-control" value="deactive">De-active</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                          </form>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <table style="width: 100%;" id="example"
                                                class="table table-hover table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Sub-Category Title(in English)</th>
                                                        <th>Sub-Category Title(in Bengali)</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($subcategory as $key=>$item )
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $item->cate_title_eng }}</td>
                                                            <td>{{ $item->cate_title_ban }}</td>
                                                            @if($item->status == "active")
                                                                <td class="text-success">{{ $item->status }}</td>
                                                            @else
                                                                <td class="text-danger">{{ $item->status }}</td>
                                                            @endif

                                                            <td class="dropdown">

                                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                  Status
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                  @if($item->status == 'deactive')
                                                                      <a class="dropdown-item" value="active" href="{{ route('subcategory.activate', $item->id) }}">Active</a>
                                                                  @else
                                                                      <a class="dropdown-item" href="{{ route('subcategory.deactivate', $item->id) }}">De-active</a>
                                                                  @endif
                                                                </div>
                                                                <a href="" class="btn btn-info" id="editSubCategory" data-toggle="modal" data-target="#staticBackdropEdit" data-id="{{ $item->id }}"><i class="fa-solid fa-pencil"></i></a>

                                                                @if($item->soft_delete == "deactivate")
                                                                    <a class="btn btn-warning" href="{{ route('superadmin.softdelete_subcategory', $item->id) }}">Soft-Delete</a>
                                                                @endif

                                                                @if($item->soft_delete == "activate")
                                                                    <a class="btn btn-danger" href="{{ route('superadmin.delete_subcategory', $item->id) }}"><i class="fa-solid fa-trash"></i></a>
                                                                    <a class="btn btn-success" href="{{ route('superadmin.restore_subcategory', $item->id) }}">Restore</a>
                                                                @endif
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@include('superadmin.user_js')

@if(session('success'))
<script>
    $(document).ready(function () {
        Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '{{session('success')}}',
  showConfirmButton: false,
  timer: 1500
})
    });
</script>
@endif
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script>

$(document).ready(function () {

$('body').on('click', '#editSubCategory', function (event) {
    event.preventDefault();
    var id = $(this).data('id');

    $.get('subcategory_edit/' + id , function (data) {
         $('#name_eng').val(data.data.cate_title_eng);
         $('#name_ban').val(data.data.cate_title_ban);
         document.getElementById("CategoryEdit").value = data.data.news_categories;
         $('#scid').val(id);
         if(data.data.status === "active") {
            document.getElementById("subCategories").value = "active";
         }
         if(data.data.status == "deactive") {
            document.getElementById("subCategories").value = "deactive";
         }

     })
});
});
</script>
