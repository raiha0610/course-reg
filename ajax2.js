$(document).ready(function() {
    $(".fetch").click(function() {
        var cid = $("#cid").val();

        if(cid!= "") {
          $.ajax({         
            url:"get-credit.php",
            data:{c_id:cid},
            type:'POST',      
              success:function(response) {
              var resp = $.trim(response);
              $("#credit").html(resp);
           
            }
          });
        }     
        else {
          $("#credit").html("");
        }
      });
    });