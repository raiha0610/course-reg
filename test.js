function showUser() {
  var str=document.getElementById('course').value;
 
if (str == "") {
  document.getElementById("txtHint").innerHTML = "";
  return;
} else {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var h = document.getElementById("myh");
h.insertAdjacentHTML("afterend", this.responseText);
    }
  };
  xmlhttp.open("GET","getdetails.php?q="+str,true);
  xmlhttp.send();

}

}
function removerow(){
  $("table tbody").find('input[name="record"]').each(function(){
    if($(this).is(":checked")){
          $(this).parents("tr").remove();
      }
  });
}
function calculateSum() {
  var sum = 0;
  //iterate through each textboxes and add the values
  $('.credit').each(function () {
          sum += parseFloat(this.value);
  
  });
  //.toFixed() method will roundoff the final sum to 2 decimal places
  $("#sum").html(sum);
  }
/*crating new click event for save button*/
function saveTable() {

  var cid = new Array(); 
  var cname = new Array();
  var credit = new Array();

  $(".cid").each(function () {
   
          cid.push($(this).val());   
  });
  $(".cname").each(function () {
      cname.push($(this).val());   
  });
  $('.credit').each(function () {
      credit.push($(this).val());   
  });

  
  
  var sendcid = JSON.stringify(cid); 
  var sendcname = JSON.stringify(cname);
  var sendcredit= JSON.stringify(credit);
   
 

  $.ajax({
  url: "save-table.php",
  type: "post",
  data: {cid : sendcid , cname : sendcname,credit : sendcredit},
  success : function(data){
  alert(data); /* alerts the response from php.*/
  }
  });
 
  }

$(document).ready(function() {
var id = 1; 
/*Assigning id and class for tr and td tags for separation.*/
$("#butsend").click(function() {
var newid = id++; 
var rname=$("#rcname").val() ;

var rid=$("#rcid").val() ;
var rcred=$("#rcredit").val() ;
if(rname==""||rid==""||rcred==""){
alert("Empty fields");
}


else{
$("#table1").append('<tr valign="top" id="'+newid+'">\n\
<td  class="rcid'+newid+'">' + rid + '</td>\n\
<td  class="rcname'+newid+'">' + rname + '</td>\n\
<td class="rcredit'+newid+'">' + rcred + '</td>\n\
<td ><a href="javascript:void(0);" class="remCF">Remove</a></td>\n\ </tr>');
}

});

$("#table1").on('click', '.remCF', function() {
$(this).parent().parent().remove();
});
/*crating new click event for save button*/
$("#butsave").click(function() {
var lastRowId = $('#table1 tr:last').attr("id"); /*finds id of the last row inside table*/
var rcname = new Array(); 
var rcid = new Array();
var rcredit = new Array();
for ( var i = 1; i <= lastRowId; i++) {
  rcid.push($("#"+i+" .rcid"+i).html());
rcname.push($("#"+i+" .rcname"+i).html()); /*pushing all the names listed in the table*/
rcredit.push($("#"+i+" .rcredit"+i).html()); /*pushing all the emails listed in the table*/
}
var sendrcid = JSON.stringify(rcid); 
var sendrcname = JSON.stringify(rcname);
var sendrcredit= JSON.stringify(rcredit);
$.ajax({
url: "redo_insert.php",
type: "post",
data: {rcid : sendrcid , rcname : sendrcname,rcredit : sendrcredit},
success : function(data){
alert(data); /* alerts the response from php.*/
}
});
});
});


function myFunction() {
  var x = document.getElementById("redo");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

