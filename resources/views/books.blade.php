@extends('layouts.mrmen')

@section('title', 'Mr. Men - Book List')

@section('content')    

	<!-- Book list (include booklist view) -->
	<div class="container marketing">
		<h2>Our Collection</h2>
		@include('bookslist', ['books' => $books, 'highlight_lastviewed' => true])
	</div>

@endsection