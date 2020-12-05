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

