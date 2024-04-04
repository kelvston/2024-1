
@extends('layouts.app')

@section('content')

<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">register New Patient</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->
  @if ($errors->any())
  <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
    <div class="row mb-3 col-sm-6 py-2 wow fadeInLeft" >
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('patients.index') }}"> Back</a>
            </div>
        </div>
    </div>



    <form class="contact-form mt-5" action="{{ route('patients.store') }}" method="POST">
    	@csrf
         <div class="row mb-3">
		    <div class="col-sm-6 py-2 wow fadeInLeft">
		        <div class="form-group">
		            <strong>First Name</strong>
		            <input type="text" name="firstName" class="form-control" placeholder="first Name">
		        </div>
		    </div>
            <div class="col-sm-6 py-2 wow fadeInRight">
		        <div class="form-group">
		            <strong>Middle Name</strong>
		            <input type="text" name="MiddleName" class="form-control" placeholder="second name">
		        </div>
		    </div>

            <div class="row mb-3">
                <div class="col-sm-6 py-2 wow fadeInLeft">
                    <div class="form-group">
                        <strong>Last Name</strong>
                        <input type="text" name="LastName" class="form-control" placeholder="Sur Name">
                    </div>
                </div>
                <div class="col-sm-6 py-2 wow fadeInRight">
                    <div class="form-group">
                        <strong>date of Birth</strong>
                        <input type="date" name="birthDate" class="form-control" placeholder="date">
                    </div>
                </div>
            <div class="col-12 py-2 wow fadeInUp">
		        <div class="form-group">
		            <strong>address</strong>
		            <input type="text" name="address" class="form-control" placeholder="address">
		        </div>
		    </div>
		    <div class="col-sm-6 py-2 wow fadeInLeft">
		        <div class="form-group">
		            <strong>occupation</strong>
		            <input type="text" name="occupation" class="form-control" placeholder="occupation">
		        </div>
		    </div>
            <div class="col-sm-6 py-2 wow fadeInRight">
		        <div class="form-group">
		            <strong>phone</strong>
		            <input type="phone" name="phone" class="form-control" placeholder="number">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary wow zoomIn">Submit</button>
		    </div>
		</div>
    </form>
    @push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( 'CKEditor error: '+error );
            } );
    </script>
@endpush

@endsection
