$(document).ready(function() {
$("#course").change(function() {
    var course = $(this).val();
   
    if(course != "") {
      $.ajax({         
        url:"get-cid.php",
        data:{cdata:course},
        type:'POST',      
        
        success:function(response) {
          var resp = $.trim(response);
          $("#cid").html(resp);
       
        }
      });
    }     
    else {
      $("#cid").html("");
    }
  });
});