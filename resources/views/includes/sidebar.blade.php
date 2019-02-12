<?php  use App\Http\Controllers\InitialController; $cl=new InitialController(); ?>
<style type="text/css">
  .left_col {
    background: #26b99a !important;
}
</style>
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="#" class="site_title"><i class="fa fa-dashboard"></i> 
        <span>@if(session()->has('email')) {{Session::get('user_name')}}
         <img src="{{url('/')}}/{{$cl->logo_fn()}}" width="93">         
       @endif</span> 
     </a>
   </div>
   <!-- sidebar menu -->
   <?php
   $menu = DB::select('call SideBarMenu(?)' , array(Session::get('role_id')));
   $menu_array = array();
   foreach($menu as $menu_val){
    $menu_array[$menu_val -> parent_menu_name][$menu_val -> id]['menu_name'] = $menu_val -> menu_name;
    $menu_array[$menu_val -> parent_menu_name][$menu_val -> id]['url_link'] = $menu_val -> url_link;
  }
  ?>

  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <ul class="nav side-menu">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-home"></i>Home</a></li> 
        @foreach($menu_array as $parent_menu => $child_menu)        
        <li><a>{{ $parent_menu }}<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            @foreach($child_menu as $menu_id => $menu_elements)
            <li><a href="{{URL::to($menu_elements['url_link'])}}">{{ $menu_elements['menu_name'] }}</a></li>
            @endforeach
          </ul>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
    <!-- /sidebar menu --> 
</div>
</div>
