$(document).ready(function () {
    bsCustomFileInput.init();
})

 const alrt = "<div class=\"alert alert-success\" role=\"alert\">File upload successful <a href=\"http://bit.ly/tempcloudinsta\" class=\"alert-link\">Follow me on Instagram.</a></div>";

 function gettext(){
    var num = document.querySelector('#txt-retrieve').value;
    var link = "http://tempcloud.ml/TEXT/" + num + ".txt";
    console.log(link);
    window.location.href = link;
 }