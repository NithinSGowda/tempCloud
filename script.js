const uform=document.querySelector('.uform');
const dform=document.querySelector('.dform');

function uploader(){
    uform.style.display='block'
}
function downloader(){
    dform.style.display='block'
}
function dclose(){
    dform.style.display='none'
}
function uclose(){
    uform.style.display='none'
}
function tuthide(){
    document.querySelector('.tutorial').style.display='none';
    var d = new Date();
    d.setTime(d.getTime() + (14*24*60*60*1000));
    document.cookie = "tutorial=done; expires=" + d.toUTCString();
}

var tutorialCookie = document.cookie;
if(tutorialCookie.includes("tutorial=done")){
  console.log(tutorialCookie);
  tuthide()
}