@extends('layouts.master')

@section('title')
    Edit Tag
@endsection

@section('content')

    @section('subtitle')
        Edit Tag
    @endsection

    @section('subpage')
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit Tag</li>
        </ol>
    @endsection

    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <strong><center>DATA</center></strong>
            </div>

            @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissible">
                    @foreach ($errors->all() as $error)
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h6><center><i class="fa fa-ban fa-md"></i> {{ $error }}</center></h6>
                    @endforeach
                </div>
            @endif

            <div class="card-body">
                <form method="POST" action="{{ route('Tag.update', $data->id) }}" role="form" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" name="name" required="required" value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" id="slug" class="form-control" name="slug" required="required" value="{{ $data->slug }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success btn-flat form-control">SAVE</button>
                    </div>
                    <div class="form-group">
                        <a href="{{ url('Tag') }}" class="btn btn-block btn-danger btn-flat form-control">CANCEL</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection