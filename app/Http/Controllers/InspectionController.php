<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Session;
use URL;
use Mail;
use DB;

class InspectionController extends Controller
{
    public function inspectiondetails(){
    	
    	return view('inspection-details');
    }

    public function view_inspection_status(Request $req){
    	
    	$data=DB::select("call usp_get_vechicle_documents(?,?)" ,array($req->master_f_date,$req->master_to_date));
     	return json_encode($data);
 }
 public function getvehicalimgaes($vehicalid){
 	$data=DB::select("call Vehical_images_data($vehicalid)");
 	//print_r(json_encode($data));exit();
     	return json_encode($data);
 	
 }
}
