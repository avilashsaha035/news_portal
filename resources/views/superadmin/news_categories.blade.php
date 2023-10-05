@extends('superadmin.layouts.app')

@section('content')
        <div class="app-inner-layout app-inner-layout-page">
            <div class="app-inner-layout__wrapper">
                <div class="app-inner-layout__content pt-1">
                    <div class="tab-content">
                        <div class="container-fluid">

                             <!-- Button trigger modal -->
                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#staticBackdrop">Add News-Categories</button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Insert News Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.insert-category') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Category name(in English)</label>
                                              <input type="text" name="english" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Category name(in Bangeli)</label>
                                              <input type="text" name="bangla" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="division">Select Division</label>
                                                <select name="divisions" class="form-control" id="country">
                                                @foreach ($division as $division)
                                                    <option class="form-control" value="{{ $division->id }}"> {{ $division->division_name_eng }} </option>
                                                @endforeach

                                                </select>
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="country">Status</label>
                                                <select name="status" class="form-control" id="country">
                                                <option class="form-control" value="">---Select Status---</option>
                                                <option class="form-control" value="active">Active</option>
                                                <option class="form-control" value="deactive">De-active</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </form>
                                    </div>
                                </div>
                                </div>
                            </div>


                            <!-- edit-modal -->
                            <div class="modal fade" id="staticBackdropEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit NewsCategory</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.update-category') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Category name(in English)</label>
                                              <input type="text" name="english" id="name_eng" class="form-control" aria-describedby="emailHelp">
                                              <input type="hidden" name="nc_id" id="ncid" >
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Category name(in Bengali)</label>
                                              <input type="text" name="bangla" id="name_ban" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group">
                                                <label for="country">Status</label>
                                                <select name="status" id="categories" class="form-control" >
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
                                                        <th>Category name(in English)</th>
                                                        <th>Category name(in Bengali)</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($category as $key=>$item )
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
                                                                <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                    Status
                                                                </button>
                                                                  <div class="dropdown-menu">
                                                                    @if($item->status == 'deactive')
                                                                        <a class="dropdown-item" value="active" href="{{ route('superadmin.active-category', $item->id) }}">Active</a>
                                                                    @else
                                                                        <a class="dropdown-item" href="{{ route('superadmin.deactive-category', $item->id) }}">De-active</a>
                                                                    @endif
                                                                  </div>

                                                                  <a href="" class="btn btn-info" id="editCategory" data-toggle="modal" data-target="#staticBackdropEdit" data-id="{{ $item->id }}"><i class="fa-solid fa-pencil"></i></a>
                                                                @if($item->soft_delete == "deactivate")
                                                                    <a href="{{ route('superadmin.softdlt-category', $item->id) }}" class="btn btn-warning">Soft-Delete</a>
                                                                @endif
                                                                @if($item->soft_delete == "activate")
                                                                    <a href="{{ route('superadmin.restore-category', $item->id) }}" class="btn btn-success">Restore</a>
                                                                    <a href="{{ route('superadmin.delete-category', $item->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
@endsection




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script>

$(document).ready(function () {

$('body').on('click', '#editCategory', function (event) {
    event.preventDefault();
    var id = $(this).data('id');

    $.get('category_edit/' + id , function (data) {
         $('#name_eng').val(data.data.cate_title_eng);
         $('#name_ban').val(data.data.cate_title_ban);
         $('#ncid').val(id);
         if(data.data.status === "active") {
            document.getElementById("categories").value = "active";
         }
         if(data.data.status == "deactive") {
            document.getElementById("categories").value = "deactive";
         }

     })
});
});
</script>
