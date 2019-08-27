<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Tag;
use App\Models\Comment;

class HomeController extends Controller
{
    public function index()
	{
		
		return view('back-end.home');
	}
}
