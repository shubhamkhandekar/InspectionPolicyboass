  @extends('includes.master')
  @section('content')  
<script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>
  <div class="right_col" role="main">
    <div class="row  class="right_col"">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <p class="text-muted font-13 m-b-30"></p>
            <center> 
             <a href="#" data-toggle="modal" data-target="#myModal"  id="master_btn" class="btn btn-lg btn-success">Masters</a>
             <a href="#" data-toggle="modal" data-target="#myModal"  id="pree_ins_btn" class="btn btn-lg btn-success">Pree Inspection</a>
             <a href="#" data-toggle="modal" data-target="#myModal"  id="claim_btn" class="btn btn-lg btn-success">Claim</a>       
           </center>
           <a href="#" id="pree_link_btn" style="display: none;">view insepection status</a>
           <a href="#" id="master_link_btn" style="display: none;">Distance Approval</a>    
           <a href="#" id="claim_link_btn" style="display: none;">Assing Inspection</a>
           <div id="pree_inspection_form" style="display: none;">
             <div class="container">
               <div class="panel panel-primary">
                <div class="panel-heading">Inspection Datails1</div>
                <div class="panel-body">
                  <form name="user_form" id="user_form">
                   {{ csrf_field() }}

                   <!-- <input type="hidden" class="form-control" id="user_id" name="user_id" value=""> -->
                   <div class="col-md-6">
                     <div class="form-group row">
                      <label for="inspection_no" class="col-sm-4 col-form-label">Inspection No:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="inspection_no" name="inspection_no" placeholder="Inspection No" required>
                        <label class="control-label" for="inputError"><span id="err_inspection_no" class="error_class"></span></label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                   <div class="form-group row">
                    <label for="registration_no" class="col-sm-4 col-form-label">Registration No:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="registration_no" name="registration_no" placeholder="Registration No"  required>
                      <label class="control-label" for="inputError"><span id="err_registration_no" class="error_class"></span></label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="f_date" class="col-sm-4 col-form-label">Form Date:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control datepicker_id" id="master_f_date" name="master_f_date" placeholder="From Date" required readonly value="2018-02-01">
                      <label class="control-label" for="inputError"><span id="err_pass" class="error_class"></span></label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="to_date" class="col-sm-4 col-form-label">To Date:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control datepicker_id" id="master_to_date" name="master_to_date" placeholder="To Date"  required readonly value="2019-02-12">
                      <label class="control-label" for="inputError"><span id="err_to_date" class="error_class"></span></label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="is_active" class="col-sm-4 col-form-label">Status:</label>
                    <div class="col-sm-6">
                      <select class="form-control" id="status" name="status" placeholder="Active/Inactive" required>
                        <option  value="">Select One</option>
                        <option >All</option>
                      </select>
                      <label class="control-label" for="inputError"><span id="err_comp_id" class="error_class"></span></label>
                    </div>
                  </div>
                </div>
                <center>
                  <button type="button" name="search_btn" id="search_btn" class="btn btn-success">Search</button>
                </center>
              </form>

             <!--     <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.No</th>
                          <th>Vehicle_id</th> 
                          <th>Vehicle_no</th>
                          <th>Document Name</th>                          
                          <th>Document Type</th>
                          <th>Path</th>
                          <th>Created Date</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        
                                    
                    </tbody>
                  </table> -->

                  <div id="divhistory">
                  </div>
                </div>
              </div>
            </div>
          </div>




          <div id="master_form" style="display: none;">
           <div class="container">
             <div class="panel panel-primary">
              <div class="panel-heading">Inspection Datails</div>
              <div class="panel-body">
                <form name="" id=""  method="POST">
                 {{ csrf_field() }}

                 <input type="hidden" class="form-control" id="user_id" name="user_id" value="">

                 <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inspection_no" class="col-sm-4 col-form-label">Inspection No:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="inspection_no" name="inspection_no" placeholder="Inspection No" required>
                      <label class="control-label" for="inputError"><span id="err_inspection_no" class="error_class"></span></label>
                    </div>
                  </div>
                </div>



                <div class="col-md-6">
                 <div class="form-group row">
                  <label for="registration_no" class="col-sm-4 col-form-label">Registration No:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="registration_no" name="registration_no" placeholder="Registration No"  required>
                    <label class="control-label" for="inputError"><span id="err_registration_no" class="error_class"></span></label>
                  </div>
                </div>
              </div>





              <div class="col-md-6">
                <div class="form-group row">
                  <label for="f_date" class="col-sm-4 col-form-label">Form Date:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="f_date" name="f_date" placeholder="From Date" required>
                    <label class="control-label" for="inputError"><span id="err_pass" class="error_class"></span></label>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group row">
                  <label for="to_date" class="col-sm-4 col-form-label">To Date:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="to_date" name="to_date" placeholder="To Date"  required>
                    <label class="control-label" for="inputError"><span id="err_to_date" class="error_class"></span></label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label for="is_active" class="col-sm-4 col-form-label">Status:</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="status" name="status" placeholder="Active/Inactive" required>
                      <option  value="">Select One</option>
                      <option >All</option>

                    </select>
                    <label class="control-label" for="inputError"><span id="err_comp_id" class="error_class"></span></label>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>




    <div id="claim_form" style="display: none;">
     <div class="container">
       <div class="panel panel-primary">
       	<div class="panel-heading">Inspection Datails2</div>
        <div class="panel-body">
          <form name="" id=""  method="POST">
           {{ csrf_field() }}

           <input type="hidden" class="form-control" id="user_id" name="user_id" value="">

           <div class="col-md-6">
             <div class="form-group row">
              <label for="inspection_no" class="col-sm-4 col-form-label">Inspection No:</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="inspection_no" name="inspection_no" placeholder="Inspection No" required>
                <label class="control-label" for="inputError"><span id="err_inspection_no" class="error_class"></span></label>
              </div>
            </div>
          </div>



          <div class="col-md-6">
           <div class="form-group row">
            <label for="registration_no" class="col-sm-4 col-form-label">Registration No:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="registration_no" name="registration_no" placeholder="Registration No"  required>
              <label class="control-label" for="inputError"><span id="err_registration_no" class="error_class"></span></label>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="f_date" class="col-sm-4 col-form-label">Form Date:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="f_date" name="f_date" placeholder="From Date" required>
              <label class="control-label" for="inputError"><span id="err_pass" class="error_class"></span></label>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="to_date" class="col-sm-4 col-form-label">To Date:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="to_date" name="to_date" placeholder="To Date"  required>
              <label class="control-label" for="inputError"><span id="err_to_date" class="error_class"></span></label>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="is_active" class="col-sm-4 col-form-label">Status:</label>
            <div class="col-sm-6">
              <select class="form-control" id="status" name="status" placeholder="Active/Inactive" required>
                <option  value="">Select One</option>
                <option >All</option>
              </select>
              <label class="control-label" for="inputError"><span id="err_comp_id" class="error_class"></span></label>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
 <!-- Modal -->
  <div class="modal fade" id="imagemodal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Vehical Images</h4>
        </div>
        <div class="modal-body">

          <table style="width:100%">
            <tr>             
              <td>
                <div id="divimages"></div>
              </td>
            </tr>
            <tr>             
             <td>
              <div>
                <iframe id="divviewimg"></iframe>
              </div>
           </td>
           </tr>            
         </table>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  $(document).on('click','#master_btn',function(){

  // $('#empcode').val('');
  // $('#empname').val('');
  // $('#compid').val('');
  // $('#dateofbirth').val('');
  // $('#dateofjoining').val('');
  // $('#age').val('');
  // $('#suminsured').val('');
  // $('#email').val('');master_link_btn
  $('#master_link_btn').hide();
  $('#master_form').hide();
  $('#claim_form').hide();
  $('#pree_inspection_form').hide();
  $('#pree_link_btn').show();
  $('#claim_link_btn').hide();
  
});

  $(document).on('click','#pree_ins_btn',function(){
  //$('#comp_id_').val('');

  $('#master_form').hide();
  $('#pree_link_btn').hide();
  $('#claim_form').hide();
  $('#pree_inspection_form').hide();
  $('#master_link_btn').show();
  $('#claim_link_btn').hide();

});

  $(document).on('click','#claim_btn',function(){
 // $('#comp_id').val('');
 $('#master_form').hide();
 $('#pree_inspection_form').hide();
 $('#claim_form').hide();
 $('#claim_link_btn').show();
 $('#master_link_btn').hide();
 $('#pree_link_btn').hide(); 
});

  $(document).on('click','#pree_link_btn',function(){
 // $('#comp_id').val('');
 $('#pree_inspection_form').show();
 $('#master_form').hide();
 $('#claim_form').hide(); 
});

  $(document).on('click','#master_link_btn',function(){
    $('#master_form').show();
    $('#claim_form').hide();
    $('#pree_inspection_form').hide();
//$('#pree_link_btn').hide();

});

  $(document).on('click','#claim_link_btn',function(){
    $('#master_form').hide();
    $('#claim_form').show();
    $('#pree_inspection_form').hide();
//$('#pree_link_btn').hide();	

});
</script>

<script type="text/javascript">
  $('#search_btn').on('click',function(){
    $.ajax({  
     type: "post",  
     url: "{{URL::to('view-inspection-status')}}",
     data : $("#user_form").serialize(),
     success: function(msg){
       {
         var data = JSON.parse(msg);
         var str ="<table id='datatable'class='table table-striped table-bordered'><thead><tr><th>Evaluate</th><th>Vehicle No</th><th>Photo</th><th>Video</th><th>Created Date</th></tr><thead><tbody>";
         for (var i = 0; i < data.length; i++) 
         {
           str = str + "<tr><td><a href='#'>Evaluate</a></td><td>"+data[i].vehicle_no+"</td><td><a href='#' onclick='getimgaeinfo("+data[i].vehicle_id+")'>Photo</a></td><td><a href='#'>Video</a></td><td>"+data[i].created_at+"</td></tr>"; 
         }
         str = str + "</tbody></table>";
         $('#divhistory').html(str);
         $('#datatable').DataTable();
       }
     }
   });
  }); 

</script>
<script type="text/javascript">

 function getimgaeinfo(vehicalno){
    // alert(vehicalno);
  $("#imagemodal").modal('show');
    alert(vehicalno);
    $.ajax({ 
     url: 'get_vehical_images/'+vehicalno,
     dataType : 'json',
     method:"GET",
     success: function(msg)
     {      
      var str='';
      for (var i = 0; i < msg.length; i++) 
         {
          $path= "showimage('"+msg[i].doc_path+"')";
          //alert($path);
           str = str +'<tr><td><a href="#" class="btn btn-default" onclick='+$path+'>'+msg[i].document_name+'</a></td></tr>'; 
         }
        $('#divimages').html(str);
     }
   });
  }

</script>
<script type="text/javascript">
  function showimage(doc_path){
    alert('test');
    alert(doc_path);
   // alert('{{url("'+doc_path+'")}}');
  $("#divviewimg").attr("src",'http://localhost:8000/'+doc_path);
  }
</script>
@endsection

