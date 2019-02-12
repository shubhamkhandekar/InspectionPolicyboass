<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inspection | Policyboss</title>


<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="css/jquery.min.js" type="text/javascript"></script>
<script src="css/bootstrap.min.js" type="text/javascript"></script>

<style>
body {background:#f5f5f5 url("images/bg.jpg") no-repeat;}
.padding {padding:10px;}
 .container-fluid {padding:0px; padding-top:15px;}
.bg-img {width:auto; display:block;background-repeat: no-repeat, repeat;}
.white-bg {border-radius:10px;margin-bottom:30px;background:#fff; padding:30px 20px; margin-top:0px; transition:all 0.3s linear;-moz-transition:all 0.3s linear;-webkit-transition:all 0.3s linear;}
.white-bg:hover {box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}

container-fluid {padding-top:0px !important;}
.header {background:#fff url("images/pattern.png") repeat-x;width:100%; height:70px; z-index:1000;}


label {
  display: block;
  padding-top:10px;
  text-align: left;
  font-weight:normal;
}
label .label-text {
  color: #666;
  cursor: text;
  font-size:18px;
  line-height:10px;
  -moz-transform: translateY(-34px);
  -ms-transform: translateY(-34px);
  -webkit-transform: translateY(-34px);
  transform: translateY(-34px);
  transition: all 0.3s;
}
label input {
  background-color: transparent;
  border: 0;
  border-bottom: 1px solid #ccc;
  font-size: 20px;
  letter-spacing: -1px;
  outline: 0;
  padding: 5px 10px;
  padding-left:0px;
  text-align: left;
  transition: all 0.3s;
  width:100%;
}

label input:focus + .label-text {
  color: #ddd;
  font-size: 13px;
  -moz-transform: translateY(-55px);
  -ms-transform: translateY(-55px);
  -webkit-transform: translateY(-55px);
  transform: translateY(-55px);
}
label input:valid + .label-text {
  font-size: 13px;
  -moz-transform: translateY(-55px);
  -ms-transform: translateY(-55px);
  -webkit-transform: translateY(-55px);
  transform: translateY(-55px);
}

.button {
  background-color: #fff;
  border: 1px solid #4175a5;
  border-radius: 27px;
  color:#4175a5;
  cursor: pointer;
  font-size: 16px;
  margin-top: 5px;
  padding: 6px 20px;
  text-transform: uppercase;
  transition: all 200ms;
}
.button:hover, button:focus {
  background-color: white;
  background:#4175a5;
  color: #fff;
  outline: 0;
}
*:focus {
    outline: none;
}
label {color:#999;}
img {vertical-align:middle;}
.bg-red {background:#e31e24; color:#fff; text-align:center;}
.img-top-mrg {padding:6px; padding-top:7px;}
.book-btn {padding-left:30px;padding-right:30px;}
.img-opc:hover {opacity:0.6;cursor:pointer;}

.circle {width:170px;height:170px; border:1px solid #ccc; border-radius:60%; margin:0 auto; display:block;}
.circle:hover {background:#f8f8f8; box-shadow:1px 1px 3px 1px #ccc; cursor:pointer;}
.circle  img {padding:32px; margin-top:25px;}
.padd {padding:4px; color:#888; font-size:12px;}
.btn-pad {padding:15px; padding-left:0px;}
.btn-red-styl {display:block; margin:auto;opacity: 0.8;  padding:10px 0px; width:60%;border:2px solid #ed1c24; text-align:center; margin-top:20px; border-radius:10px;color:#ed1c24; transition:all 0.3s linear;-moz-transition:all 0.3s linear;-webkit-transition:all 0.3s linear;}
.btn-red-styl:hover {opacity: 1;text-decoration:none;color:#ed1c24; width:70%;transition:all 0.3s linear;-moz-transition:all 0.3s linear;-webkit-transition:all 0.3s linear}
.input-styl {border:0px; border-bottom:1px solid #ccc; width:100%;margin-bottom:10px;}

.center-lg {margin:0 auto; display:block;  padding:20px;}
.pad-tp-btm a {padding:0px; 20px; display:block;}

@media only screen and (max-width: 768px) {
  .header{display:none;}
  .col-xs-12 {padding-right: 15px;
    padding-left: 15px;
}
.center-img {margin:0 auto; display:block;}
}
</style>
</head>
<body>
  <div class="container-fluid header" style="padding-top:0px;">
    <div class="container hidden-xs hidden-sm">

      <div class="col-md-12">
   
  
      </div>
    </div>
  </div>

 
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-xs-12 col-xs-12 col-md-offset-4 hidden-lg hidden-md center-lg"><a href="http://www.rupeeboss.com/elite/" target="_blank"><img src="images/elite-bg-logo.png" class="img-top-mrg img-responsive center-img" width="100"/></a>
      </div>
      <div class="col-md-4 col-xs-12 col-md-offset-4">
        <div class="white-bg">
          <form action="{{url('login-page')}}" method="post">{{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" name="email" placeholder="Email" value="" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @if ($errors->has('email'))<label class="control-label" for="inputError" > {{ $errors->first('email') }}</label>  @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" value="" required="">
         @if ($errors->has('password')) <label class="control-label" for="inputError">{{ $errors->first('password') }} </label> @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
       <!--  <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            <a href="forgot-password" target="_blank" class="btn btn-link ">forgot Password</a>
        </div>
         @if (Session::has('msg')) <label class="control-label" for="inputError">{{ Session::get('msg') }} </label>@endif
        <!-- /.col -->
      </div>
    </form>

        </div>
      </div>
    </div>
  </div>
</body>
</html>