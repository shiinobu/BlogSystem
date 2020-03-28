@extends('layouts.master')

@section('title')
    View Post
@endsection

@section('content')

    @section('subtitle')
        View Post
    @endsection

    @section('subpage')
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          <li class="breadcrumb-item active">View Post</li>
        </ol>
    @endsection

    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <strong><center>DATA</center></strong>
            </div>

            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <center>{{ $message }}</center>
                </div>
            @endif

            <div class="card-body">
                <div class="table-reponsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th><center>No</center></th>
                                <th><center>ID</center></th>
                                <th><center>Title</center></th>
                                <th><center>Slug</center></th>
                                <th><center>Image</center></th>
                                <th><center>Body</center></th>
                                <th><center>View_Count</center></th>
                                <th width="175px"><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($data as $d)
                            <tr align="center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->title }}</td>
                                <td>{{ $d->slug }}</td>
                                <td><img width="150px" src="{{ url('/image/'.$d->image) }}"></td>
                                <td>{{ $d->body }}</td>
                                <td>{{ $d->view_count }}</td>
                                <td>
                                    <form action="{{ route('Post.destroy', $d->id) }}" method="POST">
                                        <a class="btn btn-success btn-sm" href="{{ route('Post.edit', $d->id) }}"><i class="fa fa-edit fa-lg"></i>  Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash fa-lg"></i>  Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
