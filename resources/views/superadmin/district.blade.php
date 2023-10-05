@extends('superadmin.layouts.app')

@section('content')
        <div class="app-inner-layout app-inner-layout-page">
            <div class="app-inner-layout__wrapper">
                <div class="app-inner-layout__content pt-1">
                    <div class="tab-content">
                        <div class="container-fluid">

                             <!-- Button trigger modal -->
                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#staticBackdrop">Add District</button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Insert District</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.insert-district') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">District name(in English)</label>
                                              <input type="text" name="english" class="form-control" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">District name(in Bengali)</label>
                                              <input type="text" name="bangla" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group">
                                                <label for="division">Select Division</label>
                                                <select name="divisions" class="form-control">
                                                @foreach ($division as $divisions)
                                                    <option class="form-control" value="{{ $divisions->id }}"> {{ $divisions->division_name_eng }} </option>
                                                @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="country">Status</label>
                                                <select name="status" id="district" class="form-control" >
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
                                        <form action="{{ route('superadmin.update-district') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">District name(in English)</label>
                                              <input type="text" name="english" id="name_eng" class="form-control" aria-describedby="emailHelp">
                                              <input type="hidden" name="ds_id" id="dsid" >
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">District name(in Bengali)</label>
                                              <input type="text" name="bangla" id="name_ban" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Select Division</label>
                                                <select name="division" id="divisionEdit" class="form-control">
                                                @foreach ($division as $divi)
                                                    <option class="form-control" value="{{ $divi->id }}"> {{ $divi->division_name_eng }} </option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="country">Status</label>
                                                <select name="status" id="districts" class="form-control" >
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
                                    <div class="">
                                        <div class="card-body">
                                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>District name(in English)</th>
                                                        <th>District name(in Bengali)</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($district as $key=>$item )
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $item->district_name_eng }}</td>
                                                            <td>{{ $item->district_name_ban }}</td>
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
                                                                        <a class="dropdown-item" value="active" href="{{ route('superadmin.active-district', $item->id) }}">Active</a>
                                                                    @else
                                                                        <a class="dropdown-item" href="{{ route('superadmin.deactive-district', $item->id) }}">De-active</a>
                                                                    @endif
                                                                  </div>

                                                                  <a href="" class="btn btn-info" id="editDistrict" data-toggle="modal" data-target="#staticBackdropEdit" data-id="{{ $item->id }}"><i class="fa-solid fa-pencil"></i></a>

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

$('body').on('click', '#editDistrict', function (event) {
    event.preventDefault();
    var id = $(this).data('id');

    $.get('district_edit/' + id , function (data) {
         $('#name_eng').val(data.data.district_name_eng);
         $('#name_ban').val(data.data.district_name_ban);
         document.getElementById("divisionEdit").value = data.data.divisions;
         $('#dsid').val(id);
         if(data.data.status === "active") {
            document.getElementById("districts").value = "active";
         }
         if(data.data.status == "deactive") {
            document.getElementById("districts").value = "deactive";
         }

     })
});
});
</script>
