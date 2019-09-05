<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Message;
use App\Models\Comment;

class HomeController extends Controller
{
    public function index()
	{
		$messages = Message::orderBy('id','desc')->paginate(10);
		$comments = Comment::orderBy('id','desc')->paginate(10);
		return view('back-end.home',compact('messages','comments'));
	}
}
