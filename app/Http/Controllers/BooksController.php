<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BooksController extends MrMenController
{
    private $bookModel;

    public function __construct()
    {
        $this->bookModel = new \App\Models\Books();
    }
    /**
    * Show a list of books
    *
    * @return Response
    */
    public function index(Request $request)
    {
        // Retrieve all books in the database
        $books = $this->bookModel->getBooks();

        // If any books have been viewed already, work out the latest one, display it first
        if ( $viewedbooks = $request->session()->get('viewedbooks') )
        {
            foreach ( $books as $key => $b )
            {
                krsort($viewedbooks);
                $lastviewed = reset($viewedbooks);
                if ( $b->bookurl == $lastviewed )
                {
                    unset($books[$key]);
                    array_unshift($books, $b);
                }
            }
        }

        return view('books', ['books' => $books]);
    }

    /**
     * Show the profile for the given user.
     *
     * @param  string  $url
     * @return Response
     */
    public function book(Request $request, $url)
    {
        $book = $this->bookModel->getSingleBook($url);
        
        // Send user back to the home page if no book can be found for the passed bookurl
        if ( !$book )
        {
            return redirect()->action('HomeController@home');
        }

        // Process the 'purchase' form
        if ( isset($_POST['submit']) )
        {
            // Check an email address is entered
            $this->validate($request, [
                'emailaddress' => 'required|email'
            ]);

            $this->bookModel->purchaseBook($book->bookid, $_POST['emailaddress']);

            // If the current user has already purchased books, add this book to the list, otherwise create a new array containing it
            if ( !$purchasedbooks = $request->session()->get('purchasedbooks') )
            {
                $request->session()->put('purchasedbooks', array(0 => $book));    
            }
            else
            {
                array_push($purchasedbooks, $book);
                $request->session()->put('purchasedbooks', $purchasedbooks);
            }

            //Display success message on screen
            $request->session()->flash('status', 'Thank you for purchasing ' . $book->bookname);

            return redirect()->action('HomeController@home');
        }

        // Update viewed books array in session, or create new array if no books have been viewed yet
        if ( !$viewedbooks = $request->session()->get('viewedbooks') )
        {
            $request->session()->put('viewedbooks', array(0 => $url));    
        }
        else
        {
            // If book has already been viewed, remove it from the array and add it to the end (last viewed)
            $key = array_search($url, $viewedbooks);
            if ( $key !== false )
            {
                unset($viewedbooks[$key]);
            }
            array_push($viewedbooks, $url);

            $request->session()->put('viewedbooks', $viewedbooks);
        }

        // Send status message to the view (from add review)
        $status = $request->session()->get('status');

        // Get book reviews and send to the view
        $reviews = $this->bookModel->getBookReviews($book->bookid);

        return view('book', ['book' => $book, 'status' => $status, 'reviews' => $reviews]);
    }

    /**
     * Add a review to a book
     *
     * @return Response
     */
    public function review(Request $request)
    {
        // Process 'add review' form
        if ( isset($_POST['submit']) )
        {
            // Check we have an email address and review (as well as both hidden fields)
            $this->validate($request, [
                'emailaddress' => 'required|email',
                'review' => 'required|max:1000',
                'bookid' => 'required',
                'bookurl' => 'required'
            ]);

            // Save review in DB
            $review =  $this->bookModel->reviewBook($_POST['bookid'], $_POST['emailaddress'], $_POST['review']);

            // Retrieve full book details (to display name in message on screen)
            $book = $this->bookModel->getSingleBook($_POST['bookurl']);
            if ( $review )
            {
                $request->session()->flash('status', 'Thank you for reviewing ' . $book->bookname);
            }
        }

        // Send user to book page if a bookurl is sent, otherwise back to the book list page
        if ( $_POST['bookurl'] )
        {
            return redirect()->action('BooksController@book', ['id' => $_POST['bookurl']]);
        }
        else
        {
            return redirect()->action('BooksController@index');
        }
    }
}