
@extends('layouts.app')

@section('content')
<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/blog/blog_4.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">categories</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Availabla categories</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary ml-lg-3" href="{{ route('categories.create') }}"> Create New category</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="auto">Action</th>
        </tr>
            <?php
                $i = 0;
             ?>
	    @foreach ($categories as $category)

	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $category->name }}</td>
	        <td>
                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Show</a>
                     <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

@endsection


