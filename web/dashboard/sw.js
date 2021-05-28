self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open('smartlist-app').then((cache) => cache.addAll([
      "/",
      "./test.php",
      "./index.php",
      "./manifest.webmanifest",
      "./sw.js",
      "./beta",
      "./rooms/",
      "./rooms/bedroom/",
      "./rooms/bathroom/",
      "./rooms/garage/",
      "./rooms/family/",
      "./rooms/storage/",
      "./rooms/dining_room/",
      "./rooms/kitchen/",
      "./rooms/laundry/",
      "./rooms/camping/",
      "./rooms/bm/",
      "./rooms/bathroom/view.php",
      "./rooms/bedroom/view.php",
      "./rooms/bm/index.php",
      "./rooms/camping/view.php",
      "./rooms/custom_room/ajax_croom_loader.php",
      "./rooms/dining_room/view.php",
      "./rooms/family/view.php",
      "./rooms/foodwaste/view.php",
      "./rooms/garage/view.php",
      "./rooms/grocerylist/view.php",
      "./rooms/kitchen/view.php",
      "./rooms/laundry/view.php",
      "./rooms/storage/view.php",
      "./rooms/todo/view.php",
      "./rooms/maintenance.php",
      "./rooms/trash.php",
      "./js/app.js",
      "./resources/style.css",
      "./login.php",
      "./auth",
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