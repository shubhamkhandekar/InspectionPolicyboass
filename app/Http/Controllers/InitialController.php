<?php

namespace App\Http\Controllers;
use Response;
use Request;

use Validator;
use Redirect;
use Session;
use URL;
use Mail;
use DB;
class InitialController extends Controller{

  public function send_success_response($message,$status,$data){	
  	$res = array('message' =>$message ,'status'=>$status,'status_code'=>0,'Data'=>$data );
  	return Response::json($res);
  }

  public function send_failure_response($message,$status,$data){
  	$res = array('message' =>$message ,'status'=>$status,'status_code'=>1,'Data'=>[] );
  	return Response::json($res);
  }

  public function send_success_json_encode($data){
    return Response::json($data);
  }



  public function logo_fn(){


    $logo='';
    if(Session::get('role_id')==2){
    $query=DB::table('company_master')->select('comp_icon_url')->where('comp_id','=',Session::get('company_id'))->first();
    $logo=$query->comp_icon_url;
    }else{
     $logo='images/pb_logo.jpg';
    }

       return $logo;

  }



}
