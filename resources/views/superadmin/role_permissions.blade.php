@extends('superadmin.layouts.app')

@section('content')
        <div class="app-inner-layout app-inner-layout-page">
            <div class="app-inner-layout__wrapper">
                <div class="app-inner-layout__content pt-1">
                    <div class="tab-content">
                        <div class="container-fluid">

                             <!-- Button trigger modal -->
                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#staticBackdrop">Add Permission</button>

                            <!-- Add Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Create Permission</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.insert-permission') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Permission Name</label>
                                              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Icon</label>
                                              <input type="text" name="icon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Route</label>
                                              <input type="text" name="route" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <!-- <div class="form-group mb-3">
                                                <select name="role" id="role_id" class="form-control">
                                                    <option class="form-control" value="">Select Role</option>
                                                    @foreach ($role as $rl)
                                                        <option class="form-control" value="{{ $rl->id }}">{{ $rl->role_type }}</option>
                                                    @endforeach
                                                </select>
                                            </div> -->

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </form>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="staticBackdropEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Permission</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.update-permission') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Permission name</label>
                                              <input type="text" name="Pr_name" id="p_name" class="form-control" aria-describedby="emailHelp">
                                              <input type="hidden" name="p_id" id="pid" >
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Icon</label>
                                              <input type="text" name="Pr_icon" id="p_icon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Route</label>
                                              <input type="text" name="Pr_route" id="p_route" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="country">Status</label>
                                                <select name="status" class="form-control" id="roles">
                                                <option class="form-control" value="active">Active</option>
                                                <option class="form-control" value="deactive">De-active</option>
                                                </select>
                                            </div> -->
                                            <button type="submit" class="btn btn-primary"> Update </button>
                                          </form>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Name</th>
                                                        <!-- <th>Role</th> -->
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($permission as $key=>$item )
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <!-- <td>{{ $item->role }}</td> -->


                                                            <td class="dropdown">
                                                                <!-- <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                    Status
                                                                </button> -->


                                                                <a href="" id="editPermission" class="btn btn-info" data-toggle="modal" data-target="#staticBackdropEdit" data-id="{{ $item->id }}"><i class="fa-solid fa-pencil"></i></a>

                                                                @if($item->soft_delete == "deactivate")
                                                                    <a href="{{ route('superadmin.softdlt-permission', $item->id) }}" class="btn btn-warning">Soft-Delete</a>
                                                                @endif
                                                                @if($item->soft_delete == "activate")
                                                                    <a href="{{ route('superadmin.restore-permission', $item->id) }}" class="btn btn-success">Restore</a>
                                                                    <a href="{{ route('superadmin.delete-permission', $item->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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

$('body').on('click', '#editPermission', function (event) {
    event.preventDefault();
    var id = $(this).data('id');

    $.get('permission_edit/' + id , function (data) {
        // alert(data.data.status);
         $('#p_name').val(data.data.name);
         $('#p_icon').val(data.data.icon);
         $('#p_route').val(data.data.route);
         $('#pid').val(id);
         // if(data.data.status === "deactive") {
         //    document.getElementById("roles").value = "deactive";
         // }
         // if(data.data.status === "active") {
         //    document.getElementById("countrys").value = "active";
         // }
     })
});
});
</script>
