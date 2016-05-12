<?php
	
namespace App\Models;

use DB;

class Books 
{
	/**
         * Get ALL Books
         * 
         * @return Array of Books
         */
	public function getBooks() 
	{
		$sql = "
	            SELECT  *
	            FROM    books
	            ORDER BY bookname ASC
	        ";

	        $books = DB::select($sql);
		
		return $books;
	}

	/**
         * Get a single Book
         *
         * @param  string  $url
         * @return Object of Book Details
         */
	public function getSingleBook($url = '') 
	{
		if ( $url == '' )
		{
			return false;
		}

		$sql = "
	            SELECT  *
	            FROM    books
	            WHERE   bookurl = ?
	        ";

	        $book = DB::select($sql, [$url]);

	        return $book[0];
	}

	/**
         * Add Record of book purchase
         *
         * @param  int $bookid
         * @param  string  $email
         * @return Boolean
         */
	public function purchaseBook($bookid, $email)
	{
		$sql = "
			INSERT INTO bookorders (bookid, emailaddress) VALUES (?, ?)
		";

		$order = DB::insert($sql, [$bookid, $email]);

		return $order;
	}

	/**
         * Add review of book 
         *
         * @param  int $bookid
         * @param  string  $email
         * @param  string  $review
         * @return Boolean
         */
	public function reviewBook($bookid, $email, $review)
	{
		$sql = "
			INSERT INTO bookreviews (bookid, emailaddress, review) VALUES (?, ?, ?)
		";

		$review = DB::insert($sql, [$bookid, $email, $review]);

		return $review;
	}

	/**
         * Get a Books reviews
         *
         * @param  int @bookid
         * @return Array of reviews
         */
	public function getBookReviews($bookid) 
	{
		if ( !$bookid )
		{
			return false;
		}

		$sql = "
	            SELECT  *
	            FROM    bookreviews
	            WHERE   bookid = ?
	        ";

	        $reviews = DB::select($sql, [$bookid]);

	        return $reviews;
	}
}