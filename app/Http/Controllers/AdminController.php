<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FormInfo;

class AdminController extends Controller
{
	public function Dashboard()
	{	
		$forms = FormInfo::all();
		return view('pages.dashboard', ['forms' => $forms]);
	}
}
