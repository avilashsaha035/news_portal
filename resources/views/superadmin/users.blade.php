@extends('superadmin.layouts.app')

@section('content')
        <div class="app-inner-layout app-inner-layout-page">
            <div class="app-inner-layout__wrapper">
                <div class="app-inner-layout__content pt-1">
                    <div class="tab-content">
                        <div class="container-fluid">

                             <!-- Button trigger modal -->
                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#staticBackdrop">Add Users</button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Insert Users</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.insert-user') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">User name</label>
                                              <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Email</label>
                                              <input type="text" name="email" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Password</label>
                                              <input type="password" name="bangla" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group">
                                                <label for="division">Select Roles</label>
                                                <select name="userRole" class="form-control">
                                                @foreach ($role as $rl)
                                                    <option class="form-control" value="{{ $rl->id }}"> {{ $rl->role_type }} </option>
                                                @endforeach

                                                </select>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="country">Status</label>
                                                <select name="status" id="district" class="form-control" >
                                                <option class="form-control" value="active">Active</option>
                                                <option class="form-control" value="deactive">De-active</option>
                                                </select>
                                            </div> -->
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
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.update-user') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">User name</label>
                                              <input type="text" name="name" id="nameId" class="form-control" aria-describedby="emailHelp">
                                              <input type="hidden" name="us_id" id="userid" >
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Email</label>
                                              <input type="text" name="email" id="emailId" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Password</label>
                                              <input type="password" name="password"  id="" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Select Role</label>
                                                <select name="userRole" id="userRoleEdit" class="form-control">
                                                @foreach ($role as $rl)
                                                    <option class="form-control" value="{{ $rl->id }}"> {{ $rl->role_type }} </option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="country">Status</label>
                                                <select name="status" id="districts" class="form-control" >
                                                <option class="form-control" value="active">Active</option>
                                                <option class="form-control" value="deactive">De-active</option>
                                                </select>
                                            </div> -->
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
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Role Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($user as $key=>$item )
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->email  }}</td>
                                                            @php
                                                              $userRole = DB::table('role_user')->where('user_id', '=', $item->id)->first();
                                                              $roleName = "";
                                                              if($userRole){
                                                                  $roleName = DB::table('roles')->where('id', '=', $userRole->role_id)->first();
                                                              }
                                                            @endphp
                                                            <td> @if($roleName) {{ $roleName->role_type  }} @endif</td>
                                                            <td class="dropdown">
                                                                  <a href="" class="btn btn-info" id="editUserRole" data-toggle="modal" data-target="#staticBackdropEdit" data-id="{{ $item->id }}"><i class="fa-solid fa-pencil"></i></a>

                                                                @if($item->soft_delete == "deactivate")
                                                                    <a href="{{ route('superadmin.softdlt-district', $item->id) }}" class="btn btn-warning">Soft-Delete</a>
                                                                @endif
                                                                @if($item->soft_delete == "activate")
                                                                    <a href="{{ route('superadmin.restore-district', $item->id) }}" class="btn btn-success">Restore</a>
                                                                    <a href="{{ route('superadmin.delete-district', $item->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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

$('body').on('click', '#editUserRole', function (event) {
    event.preventDefault();
    var id = $(this).data('id');

    $.get('user_edit/' + id , function (data) {
         $('#nameId').val(data.data.name);
         $('#emailId').val(data.data.email);
         document.getElementById("userRoleEdit").value = data.rl_data.role_id;
         $('#userid').val(id);
         // if(data.data.status === "active") {
         //    document.getElementById("districts").value = "active";
         // }
         // if(data.data.status == "deactive") {
         //    document.getElementById("districts").value = "deactive";
         // }

     })
});
});
</script>
