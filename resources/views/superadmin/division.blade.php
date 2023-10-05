@extends('superadmin.layouts.app')

@section('content')
            <div class="app-inner-layout app-inner-layout-page">
                <div class="app-inner-layout__wrapper">
                    <div class="app-inner-layout__content pt-1">
                        <div class="tab-content">
                            <div class="container-fluid">


                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                    data-target="#staticBackdrop">Add Division</button>

                                <!--Add Modal-->
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1"
                                    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Insert Division</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('superadmin.insert_division') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Division Name(in English)</label>
                                                        <input type="text" name="english" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Division Name(in
                                                            Bengali)</label>
                                                        <input type="text" name="bangla" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <select name="countries" id="countries" class="form-control">
                                                            <option class="form-control" value="">---Select
                                                                Country---</option>
                                                            @foreach ($country as $countries)
                                                                <option class="form-control" value="{{ $countries->id }}">
                                                                    {{ $countries->country_name_eng }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <select name="status" id="status" class="form-control">
                                                            <option class="form-control" value="">---Select
                                                                Status---</option>
                                                            <option class="form-control" value=1>Active</option>
                                                            <option class="form-control" value=0>De-Active</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Edit Modal-->
                                <div class="modal fade" id="staticBackdropEdit" data-backdrop="static" tabindex="-1"
                                    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Edit Division</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('superadmin.update_division') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Division Name(in English)</label>
                                                        <input type="text" name="english" id="name_eng" class="form-control" aria-describedby="emailHelp">
                                                        <input type="hidden" name="d_id" id="did">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Division Name(in Bengali)</label>
                                                        <input type="text" name="bangla" id="name_ban" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Select Country</label>
                                                        <select name="country" id="countryEdit" class="form-control">
                                                            @foreach ($country as $countryy)
                                                                <option class="form-control" value="{{ $countryy->id }}">
                                                                    {{ $countryy->country_name_eng }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <select name="status" id="divisions" class="form-control">
                                                            <option class="form-control" value=1>Active</option>
                                                            <option class="form-control" value=0>De-Active</option>
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
                                                            <th>Division Name(in English)</th>
                                                            <th>Division Name(in Bengali)</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($division as $key => $item)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $item->division_name_eng }}</td>
                                                                <td>{{ $item->division_name_ban }}</td>
                                                                <td>
                                                                    @if ($item->status == 1)
                                                                        <span class="text-success">Active</span>
                                                                    @else
                                                                        <span class="text-danger">Not Active</span>
                                                                    @endif
                                                                </td>


                                                                <td class="dropdown">

                                                                    <button type="button"
                                                                        class="btn btn-success dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        Status
                                                                    </button>
                                                                    <div class="dropdown-menu">

                                                                        @if ($item->status == 1)
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('division.deactivate', $item->id) }}">DeActivate</a>
                                                                        @else
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('division.activate', $item->id) }}">Activate</a>
                                                                        @endif

                                                                    </div>

                                                                    <a href="" id="editDivision"
                                                                        class="btn btn-info" data-toggle="modal"
                                                                        data-target="#staticBackdropEdit"
                                                                        data-id="{{ $item->id }}"><i
                                                                            class="fa-solid fa-pencil"></i></a>

                                                                    @if ($item->soft_delete == 'deactivate')
                                                                        <a class="btn btn-warning" href="{{ route('superadmin.softdelete_division', $item->id) }}">Soft-Delete</a>
                                                                    @endif

                                                                    @if ($item->soft_delete == 'activate')
                                                                        <a class="btn btn-success" href="{{ route('superadmin.restore_division', $item->id) }}">Restore</a>
                                                                        <a class="btn btn-danger" href="{{ route('superadmin.delete_division', $item->id) }}"><i class="fa-solid fa-trash"></i></a>
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

        $('body').on('click', '#editDivision', function(event) {
            event.preventDefault();
            var id = $(this).data('id');

            $.get('division_edit/' + id, function(data) {
                $('#name_eng').val(data.data.division_name_eng);
                $('#name_ban').val(data.data.division_name_ban);
                document.getElementById("countryEdit").value = data.data.countries;
                $('#did').val(id);
                if (data.data.status == 0) {
                    document.getElementById("divisions").value = 0;
                }
                if (data.data.status == 1) {
                    document.getElementById("divisions").value = 1;
                }

            })
        });
    });
</script>
