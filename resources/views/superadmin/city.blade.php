@extends('superadmin.layouts.app')

@section('content')
        <div class="app-inner-layout app-inner-layout-page">
            <div class="app-inner-layout__wrapper">
                <div class="app-inner-layout__content pt-1">
                    <div class="tab-content">
                        <div class="container-fluid">


                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#staticBackdrop">Add City</button>

                            <!-- Add Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Insert City</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.insert_city') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">City/Union/Village Name(in English)</label>
                                              <input type="text" name="english" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">City/Union/Village Name(in Bengali)</label>
                                              <input type="text" name="bangla" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group mb-3">
                                                <select name="type" id="type" class="form-control">
                                                <option class="form-control" value="">---Select Type---</option>
                                                <option class="form-control" name="City">City</option>
                                                <option class="form-control" name="Union">Union</option>
                                                <option class="form-control" name="Village">Village</option>
                                                 </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <select name="districts" id="districts" class="form-control">
                                                    <option class="form-control" value="">---Select District---</option>
                                                    @foreach ($district as $districts)
                                                    <option class="form-control" value="{{$districts->id}}">{{$districts->district_name_eng}}</option>
                                                    @endforeach
                                                 </select>
                                                 </div>
                                            <div class="form-group mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option class="form-control" value="">---Select Status---</option>
                                                <option class="form-control" value= 1>Active</option>
                                                <option class="form-control" value= 0>De-Active</option>
                                             </select>
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
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit City</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.update_city') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">City/Union/Village Name(in English)</label>
                                              <input type="text" name="english" id="name_eng" class="form-control" aria-describedby="emailHelp">
                                              <input type="hidden" name="ct_id" id="ctid">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">City/Union/Village Name(in Bengali)</label>
                                              <input type="text" name="bangla" id="name_ban" class="form-control">
                                            </div>
                                            <div class="form-group mb-3">
                                                <select name="type" id="types" class="form-control">
                                                <option class="form-control" name="City">City</option>
                                                <option class="form-control" name="Union">Union</option>
                                                <option class="form-control" name="Village">Village</option>
                                                 </select>
                                                 </div>
                                                 <div class="form-group mb-3">
                                                    <label for="">Select District</label>
                                                    <select name="district" id="districtEdit" class="form-control">
                                                        @foreach ($district as $districtt)
                                                            <option class="form-control" value="{{ $districtt->id }}">
                                                                {{ $districtt->district_name_eng }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            <div class="form-group mb-3">
                                            <select name="status" id="cities" class="form-control">
                                                <option class="form-control" value= 1>Active</option>
                                                <option class="form-control" value= 0>De-Active</option>
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
                                                        <th>City Name(in English)</th>
                                                        <th>City Name(in Bengali)</th>
                                                        <th>Type</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($city as $key=>$item )
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{ $item->city_union_villages_name_eng }}</td>
                                                            <td>{{ $item->city_union_villages_name_ban }}</td>
                                                            <td>
                                                                @if($item->type == "City")
                                                                <span>City</span>
                                                                @endif
                                                                @if($item->type == "Union")
                                                                <span>Union</span>
                                                                @endif
                                                                @if($item->type == "Village")
                                                                <span>Village</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                              @if($item->status == 1)
                                                              <span class="text-success">Active</span>
                                                              @else
                                                              <span class="text-danger">Not Active</span>
                                                              @endif
                                                            </td>

                                                            <td class="dropdown">

                                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                  Status
                                                                </button>
                                                                <div class="dropdown-menu">

                                                                  @if($item->status == 1)
                                                                  <a class="dropdown-item" href="{{route('city.deactivate', $item->id)}}">DeActivate</a>
                                                                  @else

                                                                  <a class="dropdown-item" href="{{route('city.activate', $item->id)}}">Activate</a>
                                                                  @endif

                                                                </div>

                                                                <a href="" id="editCity" class="btn btn-info" data-toggle="modal" data-target="#staticBackdropEdit" data-id="{{ $item->id }}"><i class="fa-solid fa-pencil"></i></a>

                                                                @if($item->soft_delete == "deactivate")
                                                                    <a class="btn btn-warning" href="{{ route('superadmin.softdelete_city', $item->id) }}">Soft-Delete</a>
                                                                @endif

                                                                @if($item->soft_delete == "activate")
                                                                    <a class="btn btn-danger" href="{{ route('superadmin.delete_city', $item->id) }}"><i class="fa-solid fa-trash"></i></a>
                                                                    <a class="btn btn-success" href="{{ route('superadmin.restore_city', $item->id) }}">Restore</a>
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
    $(document).ready(function() {

        $('body').on('click', '#editCity', function(event) {
            event.preventDefault();
            var id = $(this).data('id');

            $.get('city_edit/' + id, function(data) {
                $('#name_eng').val(data.data.city_union_villages_name_eng);
                $('#name_ban').val(data.data.city_union_villages_name_ban);
                document.getElementById("districtEdit").value = data.data.districts;
                $('#ctid').val(id);
                if (data.data.status == 0) {
                    document.getElementById("cities").value = 0;
                }
                if (data.data.status == 1) {
                    document.getElementById("cities").value = 1;
                }

                if (data.data.type == "City") {
                    document.getElementById("types").value = "City";
                }
                if (data.data.type == "Union") {
                    document.getElementById("types").value = "Union";
                }
                if (data.data.type == "Village") {
                    document.getElementById("types").value = "Village";
                }

            })
        });
    });
</script>
