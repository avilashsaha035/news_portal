@extends('superadmin.layouts.app')

@section('content')
        <div class="app-inner-layout app-inner-layout-page">
            <div class="app-inner-layout__wrapper">
                <div class="app-inner-layout__content pt-1">
                    <div class="tab-content">
                        <div class="container-fluid">

                            <a  href="{{ route('getNews') }}" class="btn btn-primary mb-2">Add News</a>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <table style="width: 100%;" id="example"
                                                class="table table-hover table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Title(in Bengali)</th>
                                                        <th>Banner</th>
                                                        <th>Published at</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($news as $key=>$item )
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $item->title_eng }}</td>
                                                            <td>
                                                                <img src="{{ asset('news_banners/'.$item->banner) }}" alt="image here" width="250px" height="150px">
                                                            </td>
                                                            <td>
                                                              @if($item->status == "active")
                                                              <span class="text-success">Active</span>
                                                              @else
                                                              <span class="text-danger">De-active</span>
                                                              @endif
                                                            </td>

                                                            <td class="dropdown">
                                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                  Status
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                  @if($item->status == "deactive")
                                                                  <a class="dropdown-item" href="{{route('activeNews', $item->id)}}">Activate</a>
                                                                  @else
                                                                  <a class="dropdown-item" href="{{route('deactiveNews', $item->id)}}">Deactive</a>
                                                                  @endif
                                                                </div>
                                                                <a href="{{ route('edit_newsGet', $item->slug) }}" class="btn btn-info"><i class="fa-solid fa-pencil"></i></a>
                                                                @if($item->soft_delete == "deactivate")
                                                                    <a class="btn btn-warning" href="{{ route('softdltNews', $item->id) }}">Soft-Delete</a>
                                                                @endif

                                                                @if($item->soft_delete == "activate")
                                                                    <a class="btn btn-success" href="{{ route('restoreNews', $item->id) }}">Restore</a>
                                                                    <a class="btn btn-danger" href="{{ route('deleteNews', $item->id) }}"><i class="fa-solid fa-trash"></i></a>
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
