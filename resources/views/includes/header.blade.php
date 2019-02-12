<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 2px solid #ddd;
  padding: 20px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #red;
  color: white;
}
.green-btn {background:#ff0000; margin:0 auto; display:block;width: 100px; color:#fff;border: 1px solid #ff0000;}

.notification_read_color{color:green !important;}
.notification_unread_color{color:yellow !important;}
</style>
<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>

      <div class="nav toggle">
       <i><a id="menu_toggle" class="fa fa-bars" style="font-size:36px;"> </a></i>
       <br>

     </div>


     <ul class="nav navbar-top-links navbar-right" >        

       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">

          <li><a href="#"><i class="fa fa-user fa-fw"></i> @if(session()->has('user_name')) {{Session::get('user_name')}} @endif</a>
          </li>
          <li class="divider"></li>
          <li><a href="{{url('change-password')}}"><i class="fa fa-unlock fa-fw"></i> Change Password</a>
          </li>
          <li class="divider"></li>
          <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
          </li>
        </ul>
        <!-- /.dropdown-user -->
      </li>
      <!-- /.dropdown -->


          <form name="notifications" id="notify" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="roleid" value="{{ session()->get( 'role_id' ) }}">
            <input type="hidden" name="compid" value="{{ session()->get( 'company_id' ) }}">
            <input type="hidden" name="hidden_userid" value="{{ session()->get('userid') }}">
           

            <div id='notifications_panel'>
            </div>
          </form>        
        </ul>
      </li>

    </ul>
  </nav>
</div>
</div>
 <!-- /top navigation -->