@extends('superadmin.layouts.app')

@section('content')
        <div class="app-inner-layout app-inner-layout-page">
            <div class="app-inner-layout__wrapper">
                <div class="app-inner-layout__content pt-1">
                    <div class="tab-content">
                        <div class="container-fluid">

                             <!-- Button trigger modal -->
                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#staticBackdrop">Add Roles</button>

                            <!-- Add Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Create Role</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.insert-role') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Role type</label>
                                              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Role Description</label>
                                              <input type="text" name="description" class="form-control" id="exampleInputPassword1">
                                            </div>

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
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Role</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.update-role') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Role Type</label>
                                              <input type="text" name="name" id="r_name" class="form-control" aria-describedby="emailHelp">
                                              <input type="hidden" name="r_id" id="rid" >
                                              <!-- Php catches the name, JavaScript catches the id -->
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Role Description</label>
                                              <input type="text" name="description" id="r_description" class="form-control">
                                            </div>
                                            <h5>Give access for:</h5>
                                            <div class="form-group" id="role_permit">
                                              <label for="exampleInputPassword1">Role permission</label>
                                              <input type="text" name="permission" id="r_permission" class="form-control" aria-describedby="emailHelp">
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
                                            <table style="width: 100%;" id="example"
                                                class="table table-hover table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Role Type</th>
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($role as $key=>$item )
                                                        @if($item->name != "ROLE_SUPERADMIN")
                                                        <tr>
                                                            <td>{{ $key+1 -  1 }}</td>
                                                            <td>{{ $item->role_type }}</td>
                                                            <td>{{ $item->description }}</td>


                                                            <td class="dropdown">
                                                                <!-- <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                    Status
                                                                </button> -->


                                                                <a href="" id="editRole" class="btn btn-info" data-toggle="modal" data-target="#staticBackdropEdit" data-id="{{ $item->id }}"><i class="fa-solid fa-pencil"></i></a>

                                                                @if($item->soft_delete == "deactivate")
                                                                    <a href="{{ route('superadmin.softdlt-role', $item->id) }}" class="btn btn-warning">Soft-Delete</a>
                                                                @endif
                                                                @if($item->soft_delete == "activate")
                                                                    <a href="{{ route('superadmin.restore-role', $item->id) }}" class="btn btn-success">Restore</a>
                                                                    <a href="{{ route('superadmin.delete-role', $item->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                                @endif


                                                            </td>
                                                        </tr>
                                                        @endif
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

$('body').on('click', '#editRole', function (event) {
    event.preventDefault();
    var id = $(this).data('id');

    $.get('role_edit/' + id , function (data) {
        // alert(data.data.status);
         $('#r_name').val(data.data.role_type);
         $('#r_description').val(data.data.description);
         // $('#r_permission').val(data.p_data.name);
         $('#rid').val(id);

         var html = "";
         for(let i = 0; i < data.p_data.length; i++) {

          html = html + "<input type='checkbox' id='permissionid"+data.p_data[i].id+"' name='permission"+data.p_data[i].id+"' value='" +data.p_data[i].id+ "'>"+ " " + data.p_data[i].name + "<br>" ;
              document.getElementById("role_permit").innerHTML = html;
          }



          for(let i = 0; i < data.role_has_data.length; i++) {
             //alert(data.role_has_data[i].permission);
             // Check
            document.getElementById("permissionid"+data.role_has_data[i].permission).checked = true;

            // Uncheck
            // document.getElementById("permission").checked = false;
            // html = html + "<input type='checkbox' id='vehicle1' name='permission"+data.p_data[i].id+"' value='" +data.p_data[i].id+ "'>"+ " " + data.p_data[i].name + "<br>" ;
            //     document.getElementById("role_permit").innerHTML = html;
           }

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
