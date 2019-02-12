
<script type="text/javascript">
function fnAllowNumeric(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

              return false;
            }
            return true;
          }


         window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);

   $('body').on('click', '.update_status', function() {
      ids=$(this).attr('data-val');
      $('#modal_saleid').val(ids);
     
   });
 </script>


<script type="text/javascript">
  function mail(obj,val){
    // //console.log(obj);
    if(obj=='email' ){
       var str =$('#EmailID').val();
       var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/; 
       var res = str.match(emailPattern);
       if(res){
         // //console.log('Pancard is valid one.!!');
          $('#e_mail').hide();

      }else{
        // //console.log('Oops.Please Enter Valid Pan Number.!!');
        $('#e_mail').show();

        return false;
      }
                  
  }
}
</script>


<script type="text/javascript">
function mail(obj,val){
// console.log(obj);
if(obj=='email' ){
var str =$('#email').val();
var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/; 
var res = str.match(emailPattern);
if(res){
  // console.log('Pancard is valid one.!!');
   $('#email_id').hide();

}else{
 // console.log('Oops.Please Enter Valid Pan Number.!!');
 $('#email_id').show();

 return false;
}

}
}
</script>

            <script type="text/javascript">
            var d = new Date();
            var year = d.getFullYear();
            d.setFullYear(year);
            $(".datepicker_id").datepicker({ dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            maxDate: year,
            minDate: "-100Y",
            yearRange: '100:' + year + '',
            //  yearRange: "c-5:c+50", // last hundred years and future hundred years
            //yearRange : 'c-65:c+10'
            defaultDate: d
            });
            </script>


