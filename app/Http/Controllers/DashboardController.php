<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Session;
use URL;
use Mail;
use DB;

class DashboardController extends Controller
{
	public function dashboard(){
		return view('/dashboard');

	}
}
   