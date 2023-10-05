@extends('superadmin.layouts.app')

@section('content')
        <div class="app-inner-layout app-inner-layout-page">
            <div class="app-inner-layout__wrapper">
                <div class="app-inner-layout__content pt-1">
                    <div class="tab-content">
                        <div class="container-fluid">


                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#staticBackdrop">Add Meta Data</button>

                            <!--Add Modal-->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Insert Meta Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.insert_websettings') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="logo">Logo</label>
                                              <input type="file" name="logo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                              <label for="icon">Icon</label>
                                              <input type="file" name="icon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                              <label for="meta_title">Meta Title</label>
                                              <input type="text" name="meta_title" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Meta Description</label>
                                                <textarea name="meta_desc" id="productTextarea">

                                                </textarea>
                                              </div>
                                            <div class="form-group">
                                              <label for="facebook_link">Facebook Link</label>
                                              <input type="text" name="facebook_link" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">
                                              <label for="twitter_link">Twitter Link</label>
                                              <input type="text" name="twitter_link" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">
                                              <label for="youtube_link">YouTube Link</label>
                                              <input type="text" name="youtube_link" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </form>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <!--Edit Modal-->
                            <div class="modal fade" id="staticBackdropEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Meta Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('superadmin.update_websettings') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="logo">Logo</label>
                                              <input type="file" name="logo_new" id="logo" class="form-control">
                                              <input type="text" name="logo_old" id="logoh" class="form-control" hidden/>

                                            </div>
                                            <div class="form-group">
                                              <label for="icon">Icon</label>
                                              <input type="file" name="icon_new" id="icon" class="form-control">
                                              <input type="text" name="icon_old" id="iconh" class="form-control" hidden/>

                                            </div>
                                            <div class="form-group">
                                              <label for="meta_title">Meta Title</label>
                                              <input type="text" name="meta_title" id="title" class="form-control">
                                              <input type="hidden" name="w_id" id="wid" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Meta Description</label>

                                                <textarea name="meta_desc" id="Textarea">
                                                </textarea>

                                              </div>
                                            <div class="form-group">
                                              <label for="facebook_link">Facebook Link</label>
                                              <input type="text" name="facebook_link" class="form-control" id="facebook">
                                            </div>
                                            <div class="form-group">
                                              <label for="twitter_link">Twitter Link</label>
                                              <input type="text" name="twitter_link" class="form-control" id="twitter">
                                            </div>
                                            <div class="form-group">
                                              <label for="youtube_link">YouTube Link</label>
                                              <input type="text" name="youtube_link" class="form-control" id="youtube">
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
                                                        <th>Meta Title</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($websettings as $key=>$item )
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{ $item->meta_title }}</td>
                                                            <td>
                                                                <a href="" id="editWeb" class="btn btn-info" data-toggle="modal" data-target="#staticBackdropEdit" data-id="{{ $item->id }}"><i class="fa-solid fa-pencil"></i></a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script type="text/javascript">
    tinymce.init({
      selector: '#productTextarea',
      width: 470,
      height: 300,
      plugins: [
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
        'media', 'table', 'emoticons', 'template', 'help'
      ],
      toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
        'forecolor backcolor emoticons | help',
      menu: {
        favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
      },
      menubar: 'favs file edit view insert format tools table help',
      content_css: 'css/content.css'
    });
  </script>

<script type="text/javascript">

   tinymce.init({
      selector: '#Textarea',
      width: 470,
      height: 300,
      plugins: [
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
        'media', 'table', 'emoticons', 'template', 'help'
      ],
      toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
        'forecolor backcolor emoticons | help',
      menu: {
        favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
      },
      menubar: 'favs file edit view insert format tools table help',
      content_css: 'css/content.css'
    });
  </script>



<script>
    $(document).ready(function () {

    $('body').on('click', '#editWeb', function (event) {
        event.preventDefault();
        var id = $(this).data('id');

        $.get('websettings_edit/' + id , function (data) {
             $('#logoh').val(data.data.logo);

             $('#iconh').val(data.data.icon);

             $('#title').val(data.data.meta_title);

             tinyMCE.activeEditor.setContent(data.data.meta_desc);

             $('#facebook').val(data.data.facebook_link);

             $('#twitter').val(data.data.twitter_link);

             $('#youtube').val(data.data.youtube_link);

             $('#wid').val(id);

         })
    });
    });
</script>

@endsection
