@extends('layouts.master')

@section('title')
    View Pivot Table
@endsection

@section('content')

    @section('subtitle')
        Kategori Post
    @endsection

    @section('subpage')
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Kategori Post</li>
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
                                <th><center>Post ID</center></th>
                                <th><center>Kategori ID</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($data as $d)
                            <tr align="center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->post_id }}</td>
                                <td>{{ $d->kategori_id }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
