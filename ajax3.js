$(document).ready(function() {
    $(".global").click(function() {
        var sem = $("#sem").val();

        if(sem!= "") {
          $.ajax({         
            url:"global.php",
            data:{mydata:sem},
            type:'POST',      
              success:function(response) {
              var resp = $.trim(response);
              $("#ge").html(resp);
           
            }
          });
        }     
        else {
          $("#ge").html("");
        }
      });
    });