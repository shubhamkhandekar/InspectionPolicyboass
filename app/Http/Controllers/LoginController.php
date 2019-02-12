<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Validator;
use Redirect;
use Auth;
use App\User;
use Reminder;
use Mail;
use sentinel;
use App\CustomValidation;

class LoginController extends Controller
{
  public function login(Request $request){
   // print_r($request()->email);exit();
   if(!$request->session()->exists('email')){
    return view('login');
  }else{
    return redirect('/dashboard');
  }

}

public function login_page(Request $request){
    //print_r($request->all());exit();
  $validator = Validator::make($request->all(),[
    'email' => 'required|max:100',
    'password' => 'required|max:10',
  ]);
  if ($validator->fails()) {
    return redirect('/')
    ->withErrors($validator)
    ->withInput();
  }else{
    $query=DB::select('call login_user(?,?)',array($request->email,$request->password)); 
    if(!empty($query)){
      $val=$query[0];
      $request->session()->flush(); 
      $request->session()->put('user_id',$val->user_id);
      $request->session()->put('password',$val->pwd); 
      $request->session()->put('email',$val->email); 
      $request->session()->put('user_name',$val->user_name);                 
      return redirect()->intended('dashboard');
    }else{
      Session::flash('msg', "Invalid email or password. Please Try again!");
      return Redirect::back();
    }
  }
}
public function logout(Request $req) {
  $req->session()->flush();
  return redirect('/');
}
//}
  //   public function login_page(Request $request){
  //    // print_r($request->all());exit();
  //       $is_authenticated=0;
  //       $validator = Validator::make($request->all(), [
  //           'email' => 'required',
  //           'password' => 'required',
  //       ]);

  //       if ($validator->fails()) {
  //           return redirect('/')
  //                       ->withErrors($validator)
  //                       ->withInput();
  //       }else{
  //         $value=DB::table('user_master')
  //         ->select('user_master.*')
  //         ->where('email','=',$request->email)
  //         ->where('pwd','=', $request->password)
  //         ->where('is_active','=','1')
  //         ->first();
  //         if($value){
  //           $comp_result = DB::select('call login_user(?,?)' , array($request->email,$request->password));
  //           if(count($comp_result)==0){
  //             Session::flash('msg', "Company Not assigned to this User! Contact Super Admin");
  //             return Redirect::back();
  //           }


  //    //}
  //        $this::set_session_for_user($value->user_id,$value->user_name,$value->email);
  //           $is_authenticated=1;
  //           return redirect('dashboard');
  //         }else{

  //         Session::flash('msg', "Invalid email or password. Please Try again! ");
  //         return Redirect::back();
  //         }
  //   }
  // }

  //   public function logout(){
  //     Session::flush();
  //     return Redirect('/');

  //   }

    // public function set_session_for_user($user_id,$user_name,$email){
    //     Session::put('user_id',$user_id);
    //     Session::put('name',$user_name);
    //     Session::put('email',$email);
    //     // Session::put('notification_count',$notification_count);



    // }

  //  public function forgotpassword(){
  //   return view('forgot-password');
  // }

  // public function forgot_password(Request $request){
  //   $is_authenticated=0;
  //       $validator = Validator::make($request->all(), [
  //           'email' => 'required',]);
  //   if ($validator->fails()) {
  //     return redirect('forgot-password')
  //    ->withErrors($validator)
  //    ->withInput();
  // }else
  // {
  //    $value=DB::table('user_master')
  //    ->select('user_master.*')
  //    ->where('email','=',$request->email)
  //    ->first();
  // if($value != '' && $value !=null){
  //   $user=DB::select("call forgot_password(?)",array($request->email));
  //   $contactName = $user[0]->user_name;
  //   $contactEmail = $user[0]->email;
  //   $contactMessage = $user[0]->pwd;
  //   $data = array('name'=>$contactName, 'password'=>$contactMessage);
  //   Mail::send('mail', $data, function($data) use ($contactEmail, $contactName)
  // {   
  //   $data->from('noreply@rupeeboss.com', 'Rupeeboss');
  //   $data->to($contactEmail,$contactName)->subject('GMC Password');
  // });

  // if($user)
  // {
  //   $val=$user[0];
  //   if($user)
  // {
  //   Session::flash('msg', 'Sending Mail from GMC. successfully.');
  //   return redirect()->intended('/');
  // }else
  // {
  //   Session::flash('msg', 'The Send Password Operation Failed'); 
  //   return redirect()->intended('forgot-password');
  // }
  // }
  // }else
  // {

  //   Session::flash('msg', "Invalid email. Please Try again! ");
  //   return Redirect::back();

  // }
  // }
  // }

  // public function updatepassword(){
  //     return view('change-password');
  //   }

  //   public function update_password(CustomValidation $validator,Request $request){

  //   $data = array();
  //   $error = array();

  //   $parameters['REQUEST'] = $request->all();
  //   $parameters['USERNAME'] = Session::get('email');

  //   $parameters['VALIDATIONS'] = array(
  //     'OLD_PASSWORD_FIELD_NAME'=>'old_pass',
  //     'NEW_PASSWORD_FIELD_NAME'=>'new_pass',
  //     'CONFIRM_PASSWORD_FIELD_NAME'=>'conf_new_pass'
  //   );

  //   extract($validator->set_new_password_validation($parameters)); 
  //   if(count($error) === 0){
  //     $new_pass = $parameters['REQUEST'][$parameters['VALIDATIONS']['NEW_PASSWORD_FIELD_NAME']];
  //     $update_pass = DB::select("call update_user_password(?,?)",array($new_pass,$parameters['USERNAME']));

  //     $request->session()->flush();   //destroy current session
  //     $success_msg = array('messege'=>'success','msg_alert'=>'Password Changed Successfully.Log in with new password.','redirectUrl'=>'/');
  //     echo json_encode($success_msg);
  //   }else{
  //     echo json_encode($error);
  //   } 
  // }




}

