<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends MrMenController
{
    /**
     * Show the home page
     *
     * @return Response
     */
    public function home(Request $request)
    {
        $bookModel = new \App\Models\Books();

        // Get list of books viewed in the current session
        $viewedbooks = $request->session()->get('viewedbooks');
        if ( is_array($viewedbooks) )
        {
            // Sort them by the last viewed first and then retrieve the full book details
            krsort($viewedbooks);
            $books = $viewedbooks;
            foreach ( $books as $key => $url )
            {
                $book = $bookModel->getSingleBook($url);
                $books[$key] = $book;
            }
        }
        else
        {
            $books = false;
        } 

        // Get list of books purchased from the session
        $purchasedbooks = $request->session()->get('purchasedbooks');

        // Display success message for book purchase
        $status = $request->session()->get('status');

        return view('home',  ['viewedbooks' => $books, 'purchasedbooks' => $purchasedbooks, 'status' => $status]);
    }
}