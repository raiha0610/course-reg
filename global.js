function showglobal() {
    var str=document.getElementById('ge').value;

  if (str == "") {
   
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var h = document.getElementById("myh");
  h.insertAdjacentHTML("afterend", this.responseText);
      }
    };
    xmlhttp.open("GET","getglobal.php?q="+str,true);
    xmlhttp.send();
  }
  }