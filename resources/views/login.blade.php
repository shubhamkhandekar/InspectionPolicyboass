 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Inspection | Policyboss </title>


    <!-- Bootstrap -->
    <link href="{{url('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{url('vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <form role="form" method="post" action="{{url('login-page')}}">
                        {{ csrf_field() }}
                            <fieldset>
                             
                                <div class="form-group has-error">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text" autofocus>
                                       @if ($errors->has('email'))<label class="control-label" for="inputError"> {{ $errors->first('email') }}</label>  @endif
                                </div>
                                <div class="form-group has-error">
                                  <input class="form-control" placeholder="Password" name="password" type="password">
                                      @if ($errors->has('password')) <label class="control-label" for="inputError">{{ $errors->first('password') }} </label> @endif
                                </div>
                            <div class="form-group has-error">
                                @if (Session::has('msg')) <label class="control-label" for="inputError">{{ Session::get('msg') }} </label>@endif
                            </div>
                            
                              <!--   <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form -->

                                <a type="button" name="forgot" id="forgot" href="forgot-password">Forgot Password</a>
                                <button class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
          </section>
        </div>



        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Login</a>
              </div>

              <div class="clearfix"></div>
              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Inspection System</h1>
                  <p>©2016 All Rights Reserved. Policyboss</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

