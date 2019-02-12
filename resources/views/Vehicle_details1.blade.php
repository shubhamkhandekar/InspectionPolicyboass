  @extends('includes.master')
  @section('content')  
  <div id="vehicledashboard">
    <div style="padding-left: 20px;">
    	<b style="font-size:20px;">Search:</b>
    	<input type="text" id="searchTerm" onkeyup="doSearch(this)" placeholder="Search for Vehicle No" title="Type in a Vehicle No" style="height: 39px; width: 30%;font-size: 16px;
  padding: 9px 17px 8px 15px;
  border: 1px solid #ddd;
  margin-bottom: 12px;"> 
    </div>
	<table class="table table-bordered tbl" id="dataTable">
    <thead>
        <tr class="btn-primary" style="font-weight: bold; height:30px;">
                        <th align="left" style="padding-left: 4px; width: 3%">Sr No</th>
                        <th align="left" style="padding-left: 4px; width: 3%">Vehicle No</th>
                         <th align="left" style="padding-left: 4px; width: 3%"><span class="glyphicon glyphicon-eye-open"></span> View Document</th>
                        <th align="left" style="padding-left: 4px; width: 3%">Type</th>
        </tr>
    </thead>   
  <tbody>
     @foreach($query as $val)      
     
       <tr>
           <td align="left" style="padding-left: 4px" width="-1%"> 1</td>
           <td align="left" style="padding-left: 4px"  width="3%"><?php echo $val->vehicle_no;?>
           </td>
           <td align="left" style="padding-left: 4px"  width="3%">
            <input type="button" name="btnview" class="btntest" data-toggle="modal" data-target="#myModal" id="btnview" value="View" />
            <input type="hidden" name="lblhidden" id="lblhidden" value='<?php echo $val->Files; ?>'>
           </td>
           <td align="left" style="padding-left: 4px"  width="3%"><?php echo $val->DocumentType;?>
           </td>
         </tr>
     @endforeach
  </tbody> 
 </table>   
</div>
  <div class="modal fade" id="myModal" role="dialog" style="background:none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Vehicle Details</h4>
        </div>
        <div class="modal-body">
        <div> 
        <input type="hidden" name="lblpath" id="lblpath">
        <input type="hidden" name="lblcount" id="lblcount" value="0">
           <iframe src="" id="docframe" style="width:100%;height:320px;margin:0px;padding:0px;" allowfullscreen>
          <html>
           <body style="margin: 0;">
           </body>
          </html>
          </iframe>
        <div class="btn-group">
        <button type="button" id="btnprev" value="Previous"> <span class="glyphicon glyphicon-backward"></span></button> <span class="glyphicon glyphicon-pause"></span> <button type="button" id="btnnext" value="Next"><span class="glyphicon glyphicon-forward"></span></button> 
        </div>
         </div>
        </div>
        </div>
      </div>
  </div>

  
  @endsection
