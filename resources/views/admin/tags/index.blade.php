@extends('admin.layout')

@section('breadcrumbs')
    <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Tags</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-xlg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tags</h4>
                    <h6 class="card-subtitle">Page all tags</h6>
                    <div class="button-group">
                        <a href="{{route('tags.create')}}" class="btn waves-effect waves-light btn-primary">Add tag</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table category</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{$tag->id}}</td>
                                    <td>{{$tag->title}}</td>
                                    <td class="text-nowrap">
                                        <a href="{{route('tags.edit', $tag)}}" data-toggle="tooltip" data-original-title="Edit"> <i class="fas fa-pencil-alt text-inverse m-r-10"></i> </a>

                                        {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'delete']) !!}
                                        <button type="submit" class="btn-reset" onclick="return confirm('Вы уверены?')">
                                            <a href="#" data-toggle="tooltip" data-original-title="Delete"> <i class="fas fa-window-close text-danger"></i> </a>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection