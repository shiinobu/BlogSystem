@extends('layouts.master')

@section('title')
    Edit Kategori
@endsection

@section('content')

    @section('subtitle')
        Edit Kategori
    @endsection

    @section('subpage')
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit Kategori</li>
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
                <form method="POST" action="{{ route('Kategori.update', $data->id) }}" role="form" enctype="multipart/form-data">
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
                        <label>Image</label>
                        <div class="form-group">
                            <img width="150px" src="{{ url('/image/'.$data->image) }}" style="padding-bottom: 5px;">
                            <input type="file" id="img" class="uploadImage" name="image" required="required" data-multiple-caption="{count} files selected" multiple value="{{ url('/image/'.$data->image) }}">
                            <label for="img" class="form-control">
                                <strong><i class="fa fa-upload fa-md"></i> <span>Choose a file&hellip;</span></strong>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success btn-flat form-control">SAVE</button>
                    </div>
                    <div class="form-group">
                        <a href="{{ url('Kategori') }}" class="btn btn-block btn-danger btn-flat form-control">CANCEL</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavScript untuk Style Upload Image !-->
    <script type="text/javascript">
        'use strict';

        ;( function ( document, window, index )
        {
            var inputs = document.querySelectorAll( '.uploadImage' );
            Array.prototype.forEach.call( inputs, function( input )
            {
                var label    = input.nextElementSibling,
                labelVal = label.innerHTML;

                input.addEventListener( 'change', function( e )
                {
                    var fileName = '';
                    if( this.files && this.files.length > 1 )
                        fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                    else
                        fileName = e.target.value.split( '\\' ).pop();

                    if( fileName )
                        label.querySelector( 'span' ).innerHTML = fileName;
                    else
                        label.innerHTML = labelVal;
                });
                // Firefox bug fix
                input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
                input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
            });
        }( document, window, 0 ));
    </script>
@endsection