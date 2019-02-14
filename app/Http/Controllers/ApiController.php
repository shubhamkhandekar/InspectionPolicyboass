<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Response;
use Validator;
class ApiController extends CallApiController

{
  public static $service_url_static = "http://services.rupeeboss.com/";
    public function vehicle_registration(Request $req){
      	
try {
	    date_default_timezone_set('Asia/Kolkata');
        $time=date('Hi'); 
        if (($time >= "0900") && ($time <= "1900")) {
         // echo "Good Morning";
         $mobile_number = $req['mobile_number'];
      	$vehicle_no=$req['vehicle_no'];
      	Session::put('vehicle_no',$vehicle_no);
      	
      	 $lattitude=$req['lattitude'];
      	 $longitude=$req['longitude'];
      	 $device_token=$req['device_token'];
      	 $query=DB::table('vehicle_registration')

        ->insertGetId(['vehicle_no'=>$req->vehicle_no,
              'mobile_number'=>$req->mobile_number,
              'lattitude'=>$req->lattitude,
              'longitude'=>$req->longitude,
              'device_token'=>$req->device_token,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);
        if($query){
              
        	 $result=json_decode(json_encode(["mobile_number"=>$mobile_number,"vehicle_no"=>$vehicle_no,"vehicle_id"=>$query]));
         return response()->json(array('status' =>0,'message'=>"success",'result'=>$result));
        }
         }else{
         	return response()->json(array('status' =>1,'message'=>"Official hours are over.Try between 9 to 7",'result'=>''));
         } 
        
        
       

         } catch (Exception $e) {
      	return response()->json(array('status' => 1,'err'=>$e->getMessage()));
      }
  }

    public function vehicle_documents(Request $req){
  

function getToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    }

    return $token;
}
    	$res['status']=0;
        $res['msg']="success";

    	$document_name=$req['document_name'];
    	$vehicle_no=$req['vehicle_no'];
      $vehicle_id=$req['vehicle_id'];
    	
    
    try
    {
       $file=$req->file('doc');
      
       if($file == null){
            throw new \Exception("Upload Document ", 1);
          }
          $destinationPath = 'uploads/app/'.$vehicle_no.'/images/';;
          
          $filename=$document_name.".".$file->getClientOriginalExtension();

          
           
          $file->move($destinationPath,$filename);
         $query=DB::table('vehicle_documents')
            ->insertGetId(['vehicle_no'=>$req->vehicle_no,
              'document_name'=>$req->document_name,
              'doc_path'=>$destinationPath.$filename,
              'vehicle_id'=>$req->vehicle_id,
               'type'=>'image',
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

            $q=DB::table('vehicle_details')
            ->insertGetId(['vehicle_no'=>$req->vehicle_no,
              'document_name'=>$req->document_name,
              'doc_path'=>$destinationPath.$filename,
              'vehicleid'=>$req->vehicle_id,
              'type'=>'image',
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);


            if ( $query) {
            	return response()->json(array('status' =>0,'message'=>"success"));
            }
    }catch(\Exception $ee){


     return response()->json(array('status' =>1,'message'=>$ee->getMessage()));
    }
 }



   public function vehicle_video_documents(Request $req){
   	$res['status']=0;
    $res['msg']="success";
    $document_name=$req['document_name'];
    
    $vehicle_no=$req['vehicle_no'];
    $vehicle_id=$req['vehicle_id'];
    

    try
    {

       $file=$req->file('video');
        // print_r($file);exit();
       if($file == null){
            throw new \Exception("Upload Video ", 1);
          }
          $destinationPath = 'uploads/app/'.$vehicle_no.'/videos/';
          
          $filename=$document_name.".".$file->getClientOriginalExtension();
         

          
           
          $file->move($destinationPath,$filename);
          $query=DB::table('vehicle_documents')
            ->insertGetId(['vehicle_no'=>$req->vehicle_no,
              'document_name'=>$req->document_name,
              'doc_path'=>$destinationPath.$filename,
              'vehicle_id'=>$req->vehicle_id,
              'type'=>'video',
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

           $q=DB::table('vehicle_details')
            ->insertGetId(['vehicle_no'=>$req->vehicle_no,
              'document_name'=>$req->document_name,
              'doc_path'=>$destinationPath.$filename,
              'vehicleid'=>$req->vehicle_id,
              'type'=>'video',
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

    if ( $query) {
            	return response()->json(array('status' =>0,'message'=>"success"));
            }
    }catch(\Exception $ee){


     return response()->json(array('status' =>1,'message'=>$ee->getMessage()));
    }
 }


  

 public function vehicle_inspection_details(Request $req){
    $status=0;
    $msg="success";
    $vehicle_no=$req['vehicle_no'];
    $vehicle_condition=$req['vehicle_condition'];
    $vehicle_id=$req['vehicle_id'];
    
     try {
     	$query=DB::table('inspection_details_front_rear')
            ->insertGetId(['vehicle_no'=>$req->vehicle_no,
               'vehicle_id'=>$req->vehicle_id,
              'front_bumper'=>$req->front_bumper,
              'grill'=>$req->grill,
              'head_lamp_lt'=>$req->head_lamp_lt,
              'head_lamp_rt'=>$req->head_lamp_rt,
              'indicator_light_lt'=>$req->indicator_light_lt,
              'indicator_light_rt'=>$req->indicator_light_rt,
              'fog_light_lt'=>$req->fog_light_lt,
              'fog_light_rt'=>$req->fog_light_rt,
              'front_panel'=>$req->front_panel,
              'bonnet'=>$req->bonnet,
              'left_apron'=>$req->left_apron,
              'right_apron'=>$req->right_apron,
              'dicky'=>$req->dicky,
              'rear_bumper'=>$req->rear_bumper,
              'tail_lamp_lt'=>$req->tail_lamp_lt,
              'tail_lamp_rt'=>$req->tail_lamp_rt,
              'vehicle_condition'=>$req->vehicle_condition,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

            $query1=DB::table('inspection_details_glass')
            ->insertGetId(['vehicle_no'=>$req->vehicle_no,
            	'vehicle_id'=>$req->vehicle_id,
              'back_glass'=>$req->back_glass,
              'glass_laminated'=>$req->glass_laminated,
              'rf_door_glass'=>$req->rf_door_glass,
              'rr_door_glass'=>$req->rr_door_glass,
              'lf_door_glass'=>$req->lf_door_glass,
              'lr_door_glass'=>$req->lr_door_glass,
              'rim'=>$req->rim,
              'under_carriage'=>$req->under_carriage,
              'vehicle_condition'=>$req->vehicle_condition,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

            $query2=DB::table('inspection_details_left')
            ->insertGetId(['vehicle_no'=>$req->vehicle_no,
            	'vehicle_id'=>$req->vehicle_id,
              'lt_front_fender'=>$req->lt_front_fender,
              'lt_front_door'=>$req->lt_front_door,
              'lt_rear_door'=>$req->lt_rear_door,
              'lt_running_board'=>$req->lt_running_board,
              'lt_pillar_door'=>$req->lt_pillar_door,
              'lt_pillar_center'=>$req->lt_pillar_center,
              'lt_pillar_rear'=>$req->lt_pillar_rear,
              'lt_qtr_panel'=>$req->lt_qtr_panel,
              'vehicle_condition'=>$req->vehicle_condition,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

            $query3=DB::table('inspection_details_right')
            ->insertGetId(['vehicle_no'=>$req->vehicle_no,
            	'vehicle_id'=>$req->vehicle_id,
              'rt_qtr_panel'=>$req->rt_qtr_panel,
              'rt_rear_door'=>$req->rt_rear_door,
              'rt_front_door'=>$req->rt_front_door,
              'rt_front_pillar_A'=>$req->rt_front_pillar_A,
              'rt_center_pillar_B'=>$req->rt_center_pillar_B,
              'rt_rear_pillar_C'=>$req->rt_rear_pillar_C,
              'rt_running_board'=>$req->rt_running_board,
              'rt_front_fender'=>$req->rt_front_fender,
              'floor'=>$req->floor,
              'rear_view_mirror_lt'=>$req->rear_view_mirror_lt,
              'rear_view_mirror_rt'=>$req->rear_view_mirror_rt,
              'tyres'=>$req->tyres,
              'vehicle_condition'=>$req->vehicle_condition,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

             $query4=DB::table('tyre_make_and dot_num')
            ->insertGetId(['vehicle_no'=>$req->vehicle_no,
            	'vehicle_id'=>$req->vehicle_id,
              'lt_rear_tyre'=>$req->lt_rear_tyre,
              'lt_front_tyre'=>$req->lt_front_tyre,
              'rt_rear_tyre'=>$req->rt_rear_tyre,
              'rt_front_tyre'=>$req->rt_front_tyre,
              'vehicle_condition'=>$req->vehicle_condition,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

            if (!$query) {
            	$msg+="\n Note:data is not inserted in inspection_details_front_rear";
            }
            if (!$query1) {
            	$msg+="\n Note:data is not inserted in inspection_details_glass";
            } 
            if (!$query2) {
            	$msg+="\n Note:data is not inserted in inspection_details_left";
            }if (!$query3) {
            	$msg+="\n Note:data is not inserted in inspection_details_right";
            }if (!$query4) {
            	$msg+="\n Note:data is not inserted in tyre_make_and dot_num";
            }

            $query5=DB::table('vehicle_part_master')
            ->insertGetId([
              'vehicle_id'=>$req->vehicle_id,
              'front_rear_id'=>$query,
              'left_id'=>$query1,
              'right_id'=>$query2,
              'tyre_id'=>$query3,
              'glass_id'=>$query4,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);
           
     } catch (Exception $e) {
     	$msg=$ee->getMessage();
     }
     return response()->json(array('status' =>$status,'message'=>$msg,"front_rear_id"=>$query,"left_id"=>$query1,"right_id"=>$query2,"tyre_id"=>$query3,"glass_id"=>$query4,));
   }
  

  public function vehicle_verification(){
    return view('vehicle-verification');
  }

   public function vehicle_inspection_otp(Request $req){
      $status=0;
      $msg="success";
      try {
        // $otp=123456;
      $otp = mt_rand(100000, 999999);
            Session::put('temp_contact', $req['mobile']);
            // print_r(Session::get('temp_contact'));exit();
            $post_data='{"mobNo":"'.$req['mobile'].'","msgData":"your otp is '.$otp.' - RupeeBoss.com",
                        "source":"WEB"}';
            $url = "http://beta.services.rupeeboss.com/LoginDtls.svc/xmlservice/sendSMS";
            $url = $this::$service_url_static."LoginDtls.svc/xmlservice/sendSMS";
            $result=$this->call_json_data_api($url,$post_data);
            $http_result=$result['http_result'];
            $error=$result['error'];
            $obj = json_decode($http_result);
            // print_r($post_data);exit();
            // statusId response 0 for success, 1 for failure

            $query=DB::table('vehicle_inspection_otp')
            ->insertGetId(['mobile_no'=>$req->mobile,
              'otp'=>$otp,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);
            
            if ($query) {
              return response()->json(array('status' =>0,'message'=>"success"));
            }
      } catch (Exception $ee) {
        return response()->json(array('status' =>1,'message'=>$ee->getMessage()));
      }
      
    }
    


   

   public function vehicle_inspection_verify_otp(Request $req){
    // print_r($req->all());exit();
    $status=0;
    $msg="success";
    try {
      $phone = $req->mobile;
    $express_otp=$req->verify_otp;

    $query=DB::table('vehicle_inspection_otp')->select('mobile_no','otp')->where('mobile_no','=',$phone)->where('otp','=',$express_otp)->orderBy('id','desc')->first();
     
    // $query=DB::table('vehice_verify_otp')
    //         ->insertGetId(['mobile_no'=>$req->mobile,
    //           'otp'=>$req->verify_otp,
    //           'created_at'=>date("Y-m-d H:i:s"),
    //           'updated_at'=>date("Y-m-d H:i:s")]);
    if ($query) {
     return response()->json(array('status' =>0,'message'=>"success"));
    } else{
       return response()->json(array('status' =>1,'message'=>"Invalid OTP."));
    }
    } catch (Exception $ee) {
      $ee->getMessage();
    }
  }


   public function vehicle_insurance_info(Request $req){
      // print_r($req->all());exit();
       $status=0;
      $msg="Successfully Inserted";
      try {
        $query=DB::table('vehicle-insurance-info')
            ->insertGetId(['insuredmobileno'=>$req->etMbNo,
              'vehicleregno'=>$req->vehicleregno,
              'customername'=>$req->custname,
              'chasisno'=>$req->chasino,
              'prevpolno'=>$req->prevpolno,
              'makeclass'=>$req->make,
              'engineno'=>$req->engineno,
              'topoldate'=>$req->todate,
              'frompoldate'=>$req->fromdate,
              'registrationdate'=>$req->regdate,
              'fuelused'=>$req->fuelused,
              'vehiclecalss'=>$req->vehicleclass,
              'previnsurancename'=>$req->insurename,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);
        if ($query) {
        $result=json_decode(json_encode(["insurance_id"=>$query]));
        return response()->json(array('status' =>0,'message'=>"Successfully Inserted",'result'=>$result));
        } 
      } catch (Exception $ee) {
        return response()->json(array('status' =>1,'message'=>$ee->getMessage()));
      }

            
              

     }

    public function vehicle_details(Request $req){
       // print_r($req->all());exit();

    $status=0;
    $msg="Successfully Inserted";
    $vehicle_no=$req['vehicle_no'];
    // print_r($vehicle_no);exit();
    // $vehicle_condition=$req['vehicle_condition'];
    $vehicle_id=$req['vehicle_id'];
    
     try {
      $query=DB::table('vehicle_front_details')
            ->insertGetId(['vehicle_no'=>$vehicle_no,
              'vehicle_id'=>$vehicle_id,
              'front_front_bumper'=>$req->front_front_bumper?$req->front_front_bumper:'',
              'front_front_panel'=>$req->front_front_panel?$req->front_front_bumper:'',
              'front_indicator_light_RT'=>$req->front_indicator_light_RT?$req->front_front_bumper:'',
              'front_head_lamp_LT'=>$req->front_head_lamp_LT?$req->front_head_lamp_LT:'',
              'front_fog_lamp_LT'=>$req->front_fog_lamp_LT?$req->front_fog_lamp_LT:'',
              'front_left_apron'=>$req->front_left_apron?$req->front_left_apron:'',
              'front_indicator_light_LT'=>$req->front_indicator_light_LT?$req->front_indicator_light_LT:'',
              'front_grill'=>$req->front_grill?$req->front_grill:'',
              'front_bonnet'=>$req->front_bonnet?$req->front_bonnet:'',
              'front_head_lamp_RT'=>$req->front_head_lamp_RT?$req->front_head_lamp_RT:'',
              'front_fog_lamp_RT'=>$req->front_fog_lamp_RT?$req->front_fog_lamp_RT:'',
              'front_right_apron'=>$req->front_right_apron?$req->front_right_apron:'',
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

            $query1=DB::table('vehicle_rear_details')
            ->insertGetId(['vehicle_no'=>$vehicle_no,
              'vehicle_id'=>$vehicle_id,
              'rear_rear_bumper'=>$req->rear_rear_bumper?$req->rear_rear_bumper:'',
              'rear_dickey_door'=>$req->rear_dickey_door?$req->rear_dickey_door:'',
              'rear_tail_lamp_RT'=>$req->rear_tail_lamp_RT?$req->rear_tail_lamp_RT:'',
              'rear_dicky'=>$req->rear_dicky?$req->rear_dicky:'',
              'rear_tail_lamp_LT'=>$req->rear_tail_lamp_LT?$req->rear_tail_lamp_LT:'',
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

            $query2=DB::table('vehicle_left_details')
            ->insertGetId(['vehicle_no'=>$vehicle_no,
              'vehicle_id'=>$vehicle_id,
              'lt_front_door'=>$req->lt_front_door?$req->lt_front_door:'',
              'lt_qtr_panel'=>$req->lt_qtr_panel?$req->lt_qtr_panel:'',
              'lt_rear_door'=>$req->lt_rear_door?$req->lt_rear_door:'',
              'lt_running_board'=>$req->lt_running_board?$req->lt_running_board:'',
              'lt_pillar_board'=>$req->lt_pillar_board?$req->lt_pillar_board:'',
              'lt_pillar_door_A'=>$req->lt_pillar_door_A?$req->lt_pillar_door_A:'',
              'lt_pillar_center_B'=>$req->lt_pillar_center_B?$req->lt_pillar_center_B:'',
              'lt_pillar_rear_C'=>$req->lt_pillar_rear_C?$req->lt_pillar_rear_C:'',
              // 'vehicle_condition'=>$req->vehicle_condition,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

            $query3=DB::table('vehicle_right_details')
            ->insertGetId(['vehicle_no'=>$vehicle_no,
              'vehicle_id'=>$vehicle_id,
              'rt_qtr_panel'=>$req->rt_qtr_panel?$req->rt_qtr_panel:'',
              'rt_floor_silencer'=>$req->rt_floor_silencer?$req->rt_floor_silencer:'',
              'rt_rear_pillar_C'=>$req->rt_rear_pillar_C?$req->rt_rear_pillar_C:'',
              'rt_front_door'=>$req->rt_front_door?$req->rt_front_door:'',
              'rt_front_fender'=>$req->rt_front_fender?$req->rt_front_fender:'',
              'rt_centre_pillar_B'=>$req->rt_centre_pillar_B?$req->rt_centre_pillar_B:'',
              'rt_rear_door'=>$req->rt_rear_door?$req->rt_rear_door:'',
              'rt_rear_view_mirror_LT'=>$req->rt_rear_view_mirror_LT?$req->rt_rear_view_mirror_LT:'',
              'rt_running_board'=>$req->rt_running_board?$req->rt_running_board:'',
              'rt_front_pillar_A'=>$req->rt_front_pillar_A?$req->rt_front_pillar_A:'',
              
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

             $query4=DB::table('vehicle_glass_details')
            ->insertGetId(['vehicle_no'=>$vehicle_no,
              'vehicle_id'=>$vehicle_id,
              'glass_back_glass'=>$req->glass_back_glass?$req->glass_back_glass:'',
              'glass_rim'=>$req->glass_rim?$req->glass_rim:'',
              'glass_front_windshield'=>$req->glass_front_windshield?$req->glass_front_windshield:'',
              'glass_under_carriage'=>$req->glass_under_carriage?$req->glass_under_carriage:'',
              'glass_rf_door_glass'=>$req->glass_rf_door_glass?$req->glass_rf_door_glass:'',
              'glass_top_roof'=>$req->glass_top_roof?$req->glass_top_roof:'',
              'glass_dashboard'=>$req->glass_dashboard?$req->glass_dashboard:'',
              'glass_engine'=>$req->glass_engine?$req->glass_engine:'',
              'glass_suspension'=>$req->glass_suspension?$req->glass_suspension:'',
              'glass_radiator'=>$req->glass_radiator?$req->glass_radiator:'',
              'glass_drive_shaft'=>$req->glass_drive_shaft?$req->glass_drive_shaft:'',
              'glass_brakes'=>$req->glass_brakes?$req->glass_brakes:'',
              'glass_rr_door_glass'=>$req->glass_rr_door_glass?$req->glass_rr_door_glass:'',
              'glass_roof_lining'=>$req->glass_roof_lining?$req->glass_roof_lining:'',
              'glass_lt_door_glass'=>$req->glass_lt_door_glass?$req->glass_lt_door_glass:'',
              'glass_seats_front'=>$req->glass_seats_front?$req->glass_seats_front:'',
              'glass_lr_door_glass'=>$req->glass_lr_door_glass?$req->glass_lr_door_glass:'',
              'glass_seats_rear'=>$req->glass_seats_rear?$req->glass_seats_rear:'',
              'glass_instrument_meters'=>$req->glass_instrument_meters?$req->glass_instrument_meters:'',
              'glass_gear_box'=>$req->glass_gear_box?$req->glass_gear_box:'',
              'glass_steering_system'=>$req->glass_steering_system?$req->glass_steering_system:'',
              'glass_air_conditioner'=>$req->glass_air_conditioner?$req->glass_air_conditioner:'',
              'glass_wheels'=>$req->glass_wheels?$req->glass_wheels:'',
              'glass_music_system'=>$req->glass_music_system?$req->glass_music_system:'',
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

            if (!$query) {
              $msg+="\n Note:data is not inserted in vehicle_front_details";
            }
            if (!$query1) {
              $msg+="\n Note:data is not inserted in vehicle_rear_details";
            } 
            if (!$query2) {
              $msg+="\n Note:data is not inserted in vehicle_left_details";
            }if (!$query3) {
              $msg+="\n Note:data is not inserted in vehicle_right_details";
            }if (!$query4) {
              $msg+="\n Note:data is not inserted in vehicle_glass_details";
            }

            $query5=DB::table('vehicle_related_ids')
            ->insertGetId([
              'vehicle_id'=>$req->vehicle_id,
              'vehicle_front_detail_id'=>$query,
              'vehicle_rear_details_id'=>$query1,
              'vehicle_left_details_id'=>$query2,
              'vehicle_right_details_id'=>$query3,
              'vehicle_glass_details_id'=>$query4,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);
           
     } catch (Exception $e) {
      $msg=$ee->getMessage();
     }
      $result=json_decode(json_encode(["vehicle_front_detail_id"=>$query,"vehicle_rear_details_id"=>$query,"vehicle_left_details_id"=>$query,"vehicle_right_details_id"=>$query,"vehicle_glass_details_id"=>$query]));
     return response()->json(array('status' =>$status,'message'=>$msg,'result'=>$result));
   }


   public function vehicle_info_details(Request $req){
    /*(
    [vehicle_no] => MH 01 VP 7488
    [SRN] => 78455
    [CRN] => 74586
    [FBAId] => 1976
    [VehicleRequestId] => 6868
)*/
    // print_r($req->all());exit();
     $status=0;
    $msg="Successfully Inserted";
    $val =Validator::make($req->all(), [
                'vehicle_no' => 'required',
                'SRN' => 'required',
                'CRN'=>'required',
                'FBAId'=>'required',
                'VehicleRequestId'=>'required',
                
                            ]);

           if ($val->fails()){

              return response()->json(array('status' =>1,'result'=>null,'message'=>"Failure"));
           }
           else{

            $user = DB::table('vehicle-info-details')->where('vehicle_request_id', '=' ,$req->VehicleRequestId)->first();

            if (count($user)>0) {
              $query = DB::table('vehicle-info-details')->where('vehicle_request_id', '=' ,$req->VehicleRequestId)->update(['vehicle_no'=>$req->vehicle_no,
              'SRN'=>$req->SRN,
              'CRN'=>$req->CRN,
              'FBAId'=>$req->FBAId,
             
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);
               $result=json_decode(json_encode(["vehicle_id"=>$user->vehicle_id]));
             return response()->json(array('status' =>$status,'message'=>$msg,'result'=>$result));

            } else {
              $query=DB::table('vehicle-info-details')
            ->insertGetId(['vehicle_no'=>$req->vehicle_no,
              'SRN'=>$req->SRN,
              'CRN'=>$req->CRN,
              'FBAId'=>$req->FBAId,
              'vehicle_request_id'=>$req->VehicleRequestId,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);

            $result=json_decode(json_encode(["vehicle_id"=>$query]));
         return response()->json(array('status' =>$status,'message'=>$msg,'result'=>$result));
            }
            

              
           }
          
    
    

   }
    
    

 //       public function vehicle_send_otp(Request $req){
 //    // print_r($req->mobile);exit();
 //    $otp=123456;
 //    // $otp = mt_rand(100000, 999999);
 //    Session::put('temp_contact', $req['mobile']);
 //    $post_data='{"mobNo":"'.$req['mobile'].'","msgData":"your otp is '.$otp.' - RupeeBoss.com",
 //                "source":"WEB"}';
 //            // $url = "http://beta.services.rupeeboss.com/LoginDtls.svc/xmlservice/sendSMS";
 //               $url = $this::$service_url_static."LoginDtls.svc/xmlservice/sendSMS";
 //            $result=$this->call_json_data_api($url,$post_data);
 //            $http_result=$result['http_result'];
 //            $error=$result['error'];
 //            $obj = json_decode($http_result);
 //            // statusId response 0 for success, 1 for failure
            
 //            if($obj->{'statusId'}==0){
 //                return Response::json(array(
 //                            'data' => true,
 //                        ));
 //            }else{
 //                return Response::json(array(
 //                            'data' => false,
 //                        ));
 //            }
        
 //        }

 //    public function vehicle_verify_otp(Request $req){
 //    $phone = Session::get('temp_contact');
 //    $express_otp=$req->verify_otp;
 //    //print_r($express_otp);
 //    //print_r($phone);
        
 //          Session::put('contact',$phone);
 //          if(Session::get('temp_contact'))
 //          {
 //          return Response::json(array(
 //                            'data' => "true",
 //                        ));
 //           }else{
 //          return Response::json(array(
 //                            'data' => "false",
 //                        ));
 //        }
 // }
        

}
