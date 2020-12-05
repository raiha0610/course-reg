$(document).ready(function() {
  $("#sem").change(function() {
    var semester = $(this).val();
    
    if(semester != "") {
      $.ajax({
        url:"get-course.php",
        data:{mydata:semester},
        type:'POST',
        success:function(response) {
          var resp = $.trim(response);
          $("#course").html(resp);
       
        }
      });
    }     
    else {
      $("#course").html("<option value=''>------- Select --------</option>");
    }
  });
 
});
