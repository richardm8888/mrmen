@extends('layouts.mrmen')

@section('title', 'Mr. Men')

@section('content')    

    @if ($status)
        <div class="alert alert-success" role="alert">{{$status}}</div>
    @endif

    <!-- Top section to display welcome message -->
    <div class="jumbotron">
        <div class="container">
            <h1>Mr. Men &amp; Little Miss Books</h1>
            <p>Welcome to Mr.Men &amp; Little Miss Books. <br />We offer a range of online books available to download for free.</p>
            <p><a class="btn btn-primary btn-lg" href="/books" role="button">Browse the collection &raquo;</a></p>
        </div>
    </div>

    <!-- Viewed Books -->
    @if( is_array($viewedbooks) && count($viewedbooks) > 0 )
    
        <div class="container marketing">
            <h2 class="text-center">Recently Viewed</h2>
            @include('bookslist', ['books' => $viewedbooks, 'highlight_lastviewed' => true])
        </div>
    @endif

    <!-- Purchased Books -->
    @if( is_array($purchasedbooks) && count($purchasedbooks) > 0 )

        <div class="container marketing">
            <h2 class="text-center">Purchased Books</h2>
            @include('bookslist', ['books' => $purchasedbooks, 'highlight_lastviewed' => false])
        </div>
    
    @endif

@endsection
