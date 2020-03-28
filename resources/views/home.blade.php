@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')

    @section('subtitle')
        Dashboard
    @endsection

    @section('subpage')
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    @endsection
    <?php
        $dataPost = \App\Post::all();
        $countPost = count($dataPost);

        $dataTag = \App\Tag::all();
        $countTag = count($dataTag);

        $dataKategori = \App\Kategori::all();
        $countKategori = count($dataKategori);
    ?>
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3>{{ $countPost }}</h3>
                <p>Post Data</p>
            </div>
            <div class="icon">
                <i class="fa fa-newspaper-o"></i>
            </div>
            <a href="{{ route('Post.index') }}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3>{{ $countTag }}</h3>
                <p>Tag Data</p>
            </div>
            <div class="icon">
                <i class="fa fa-newspaper-o"></i>
            </div>
            <a href="{{ route('Tag.index') }}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3>{{ $countKategori }}</h3>
                <p>Kategori Data</p>
            </div>
            <div class="icon">
                <i class="fa fa-newspaper-o"></i>
            </div>
            <a href="{{ route('Kategori.index') }}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-12 col-xs-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                Dashboard
            </div>

            <div class="card-body">
                Welcome {{ Auth::user()->name }} Logged in as Admin!
            </div>
        </div>
    </div>
@endsection
