@extends('superadmin.layouts.app')

@section('content')
        <div class="app-inner-layout app-inner-layout-page">
            <div class="app-inner-layout__wrapper">
                <div class="app-inner-layout__content pt-1">
                    <div class="tab-content">
                        <div class="container-fluid">

                             <!-- Button trigger modal -->
                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#staticBackdrop">Add Child-Subcategories</button>

                            <!-- Add Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Insert Child Subcategory</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.insert-childsubcategory') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Child Category name(in English)</label>
                                              <input type="text" name="english" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Child Category name(in Bengali)</label>
                                              <input type="text" name="bangla" class="form-control" id="exampleInputPassword1">
                                            </div>

                                            <div class="form-group">
                                                <label for="news_categories">News-category</label>
                                                <select name="news_categories" class="form-control" id="country">
                                                    <option class="form-control" value="">---Select News-Category---</option>
                                                @foreach ($category as $categories)
                                                    <option class="form-control" name="news_category" value="{{ $categories->id }}"> {{ $categories->cate_title_eng }} </option>
                                                @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="sub_categories">Sub-category</label>
                                                <select name="sub_categories" class="form-control" id="country">
                                                    <option class="form-control" value="">---Select Sub-Category---</option>
                                                @foreach ($subcategory as $subcategories)
                                                    <option class="form-control" name="news_subcategory" value="{{ $subcategories->id }}"> {{ $subcategories->cate_title_eng }} </option>
                                                @endforeach
                                                </select>
                                            </div>


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

                            <!-- Edit Modal -->
                            <div class="modal fade" id="staticBackdropEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Child Subcategory</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.update-child_subcategory') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Child Category name(in English)</label>
                                              <input type="text" name="english" id="name_eng" class="form-control" aria-describedby="emailHelp">
                                              <input type="hidden" name="cs_id" id="csid">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Child Category name(in Bengali)</label>
                                              <input type="text" name="bangla" id="name_ban" class="form-control">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="news_categories">News-category</label>
                                                <select name="news_categories" class="form-control" id="newscat">
                                                @foreach ($category as $categoryy)
                                                    <option class="form-control" name="news_category" value="{{ $categoryy->id }}"> {{ $categoryy->cate_title_eng }} </option>
                                                @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="sub_categories">Sub-category</label>
                                                <select name="sub_categories" class="form-control" id="subcat">
                                                @foreach ($subcategory as $subcategoryy)
                                                    <option class="form-control" name="news_subcategory" value="{{ $subcategoryy->id }}"> {{ $subcategoryy->cate_title_eng }} </option>
                                                @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group mb-3">
                                                <label for="country">Status</label>
                                                <select name="status" class="form-control" id="action">
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
                                                        <th>Child Category name(in English)</th>
                                                        <th>Child Category name(in Bengali)</th>
                                                        <th>Sub-ategory</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($childSubCate as $key=>$item )
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $item->cate_title_eng }}</td>
                                                            <td>{{ $item->cate_title_ban }}</td>
                                                            <td>{{ $item->cat_name }}</td>
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
                                                                        <a class="dropdown-item" value="active" href="{{ route('activeChildSubCategory', $item->id) }}">Active</a>
                                                                    @else
                                                                        <a class="dropdown-item" href="{{ route('deactiveChildSubCategory',$item->id) }}">De-active</a>
                                                                    @endif
                                                                  </div>

                                                                <a href="" id="editChild" class="btn btn-info" data-toggle="modal" data-target="#staticBackdropEdit" data-id="{{ $item->id }}"><i class="fa-solid fa-pencil"></i></a>

                                                                @if($item->soft_delete == "deactivate")
                                                                    <a href="{{ route('softdltChildSubCategory', $item->id) }}" class="btn btn-warning">Soft-Delete</a>
                                                                @endif
                                                                @if($item->soft_delete == "activate")
                                                                    <a href="{{ route('restoreChildSubCategory', $item->id) }}" class="btn btn-success">Restore</a>
                                                                    <a href="{{ route('deleteChildSubCategory', $item->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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

        $('body').on('click', '#editChild', function(event) {
            event.preventDefault();
            var id = $(this).data('id');

            $.get('child_subcategory_edit/' + id, function(data) {
                $('#name_eng').val(data.data.cate_title_eng);
                $('#name_ban').val(data.data.cate_title_ban);
                document.getElementById("newscat").value = data.data.news_categories ;
                document.getElementById("subcat").value = data.data.sub_categories ;
                $('#csid').val(id);
                if (data.data.status == "active") {
                    document.getElementById("action").value = "active";
                }
                if (data.data.status == "deactive") {
                    document.getElementById("action").value = "deactive";
                }

            })
        });
    });
</script>
