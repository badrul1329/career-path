<?php
namespace App\Controllers;
use App\Models\Book;

class BookController extends Controller{
	public function index(){
		echo "I am Book index";
	}
	
	public function edit(){
		$book = new Book(); 
		$message = "Do u want to edit book?";
		return view('EditBook',[
			'message' => "Do u want to edit profile?",
			'books' => $book->getAll()
		]);
	}
}