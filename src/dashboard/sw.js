self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open('smartlist-app').then((cache) => cache.addAll([
      '/index.php',
    ]))
  );
});

self.addEventListener('fetch', (e) => {
  console.log(e.request.url);
  //   if(!navigator.onLine && window.location == "https://smartlist.ga/dashboard/auth" || window.location == "https://smartlist.ga/dashboard/auth/") {
  //           window.location.href="https://smartlist.ga/dashboard/beta";
  //   }
  if (!navigator.onLine) {
    e.respondWith(
      caches.match(e.request).then((response) => response || fetch(e.request))
    );
  }
});
async function fetchText() {
  let response = await fetch('https://smartlist.ga/dashboard/user/settings/backup/?t=products&f=json');

  // console.log(response.status); // 200
  // console.log(response.statusText); // OK

  if (response.status === 200) {
    let data = await response.text();
    // handle data
    data = JSON.parse(data);
    var items = "";
    data.items.forEach(data => {
      if(parseInt(data.qty.replace(/\D/g,'')) < 10000) {
        items += `${data.name}, `
      }
    })
    items = items.slice(0, -2)
    var nt = self.registration.showNotification("Smartlist Daily Digest", {
      body: `You're running out of ${items}`,
      icon: 'https://smartlist.ga/dashboard/logo_z3yoqm.png',
      vibrate: [200, 100, 200, 100, 200, 100, 200],
    });
    nt.onclick = function() {self.clients.openWindow("https://smartlist.ga/dashboard/")}
    // self.registration.showNotification(JSON.stringify(res));
  }
  else {
    console.log(response.status);
  }
}

// fetchText();
setInterval(() => {fetchText();}, 600000)
// 1000 * 60 * 60 * 24
// 600000