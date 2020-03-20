$(document).ready(function () {
    bsCustomFileInput.init();
})

 const alrt = "<div class=\"alert alert-success\" role=\"alert\">File upload successful <a href=\"http://bit.ly/tempcloudinsta\" class=\"alert-link\">Follow me on Instagram.</a></div>";

 function gettext(){
    var num = document.querySelector('#txt-retrieve').value;
    var display = document.getElementById("mycontent");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "textget.php?num="+num);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        display.innerHTML = this.responseText;
      } else {
        display.innerHTML = "Loading...";
      };
    }
  }