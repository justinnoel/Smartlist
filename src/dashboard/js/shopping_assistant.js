'use strict';
main.innerHTML += `<div class="carousel-item blue-grey white-text darken-3" style="padding-top: 25vh"onclick="setTimeout(()=>\$('.carousel.carousel-slider').carousel('next'), 100);toggleFullScreen()">
<div class="container">

<h1>Welcome!</h1>
<h2>Tap anywhere to begin shopping!</h2>
<p>Up next is a bunch of items you're running out of. Great for in-store use! Once you've put an item in your cart, tap anywhere to view the next recommended item</p>
</div>
</div>`;
items.forEach((item,key) => {
  var el = document.getElementById("main");
  var colors = ['red', 'green', 'blue', 'blue-grey', 'pink', 'brown', 'orange', 'purple', 'grey', 'cyan', 'teal', 'lime', 'indigo', 'light-green', 'amber', 'yellow'];
  var color = colors[Math.floor(Math.random()*colors.length)];
  main.innerHTML += `<div class="carousel-item ${color} white-text darken-3" style="padding-top: 25vh" onclick="${(item.id ? "$('#ajaxLoader').load('https://smartlist.ga/dashboard/user/grocerylist/delete.php?id="+item.id+"}');" : "")} setTimeout(()=>\$('.carousel.carousel-slider').carousel('next'), 500);done();setTimeout(()=>this.classList.add('done'),1700);">
<h1>${item.name}</h1>
<h2>${item.room}</h2>
<p class="white-text">${key+1}/${items.length+1}</p>
</div>`;
  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: false
  });

})

main.innerHTML += `<div class="carousel-item black white-text darken-3" style="padding-top: 25vh">
<div class="container">

<h1>Done!</h1>
<h2>You're done shopping!</h2>
<p>You've bought all the recommended items, and now you can update your inventory</p>
</div>
</div>`;
$('.carousel.carousel-slider').carousel({
  fullWidth: true,
  indicators: false,
  onCycleTo(e) {document.querySelector('meta[name="theme-color"]').setAttribute('content',  window.getComputedStyle( e, null).getPropertyValue('background-color'));}
});


function done() {
  confetti({
    particleCount: 100,
    spread: 70,
    origin: { y: 0.6 }
  });
}
if ('wakeLock' in navigator) {

  const handleVisibilityChange = async () => {
    if (wakeLock !== null && document.visibilityState === 'visible') {
      await requestWakeLock();
    }
  };

  document.addEventListener('visibilitychange', handleVisibilityChange);
  document.addEventListener('click', handleVisibilityChange);
}
function toggleFullScreen() {
  if (!document.fullscreenElement) {
      document.documentElement.requestFullscreen();
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    }
  }
}