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

window.addEventListener('load', () => {
    registerSW();
  });

async function registerSW() {
    if ('serviceWorker' in navigator) {
      try {
        await navigator.serviceWorker.register('./sw.js');
      } catch (e) {
        console.log(`SW registration failed`);
      }
    }
}

var deferredPrompt;window.addEventListener('beforeinstallprompt', function (e) { 
	e.preventDefault(); 
	deferredPrompt = e;
	showAddToHomeScreen();
});

function showAddToHomeScreen() {
	var a2hsBtn = document.querySelector(".ad2hs-prompt");
	a2hsBtn.style.display = "block";
	a2hsBtn.addEventListener("click", addToHomeScreen);
}

function addToHomeScreen() {
 	var a2hsBtn = document.querySelector(".ad2hs-prompt");
	a2hsBtn.style.display = 'none';
	deferredPrompt.prompt();
	deferredPrompt.userChoice .then(function(choiceResult){
	if (choiceResult.outcome === 'accepted') {
    	console.log('User accepted the A2HS prompt');
	} else {
    	console.log('User dismissed the A2HS prompt'); 
	}
	deferredPrompt = null;
	});
}












