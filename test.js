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