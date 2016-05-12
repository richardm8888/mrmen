@extends('layouts.mrmen')

@section('title', 'Mr. Men - Book List')

@section('content')    

	<!-- Error messages -->
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<!-- Success message -->
	@if ($status)
		<div class="alert alert-success" role="alert">{{$status}}</div>
	@endif
	
	<div class="container">
		<div class="row">
			<div class="text-left col-lg-8 col-md-8 col-sm-12 col-xs-12">
				
				<p>
					<img align="left" src="/img/{{$book->bookurl}}.jpg" alt="{{$book->bookname}}" style="margin-top: 30px;" width="160" height="160"/>
					<h1>{{$book->bookname}}</h2>
					{{$book->bookdescription}}
				</p>

			<!-- Display reviews if any are present for the book -->
			@if ( is_array($reviews) && count($reviews) > 0 )
				<h3>Reviews</h3>
				@foreach ($reviews as $review)
				<div>
					<h4>{{$review->emailaddress}} <small>{{$review->reviewdate}}</h4>
					<p>{{$review->review}}</p>
				</div>
				@endforeach
			@endif
			</div>

			<!-- Forms (purchase and review) -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<br />
				<!-- Purchase book -->
				<form method="post" action="" class="form-inline">
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email Address" name="emailaddress" />
					</div>
					<div class="form-group">
						<button name="submit" type="submit" class="btn btn-primary ">Buy Book <span class="glyphicon glyphicon-shopping-cart"></span></button>
					</div>
					{{ csrf_field() }}
				</form>

				<!-- Add a review -->
				<h3>Write a Review</h3>
				<form method="post" action="{{route('reviewbook')}}">
					<div class="form-group">
						<label for="emailaddress">Email Address</label>
						<input type="email" class="form-control" placeholder="Email Address" name="emailaddress" />
					</div>
					<div class="form-group">
						<label for="review">Review</label>
						<textarea class="form-control" placeholder="Review" name="review"></textarea>
					</div>

					<button name="submit" type="submit" class="btn btn-primary">Submit Review <span class=""></span></button>

					<input type="hidden" name="bookid" value="{{$book->bookid}}" />
					<input type="hidden" name="bookurl" value="{{$book->bookurl}}" />
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>

@endsection