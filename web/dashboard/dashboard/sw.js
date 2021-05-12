const offlineFallbackPage = "./offline";
self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open('smartlist-app').then((cache) => cache.addAll([
      './beta',
      './test.php',
      './js/',
      './js/app.js',
      './js/app.min.js',
      './resources/',
      './resources/style.css',
      './rooms/bedroom/',
      './rooms/bathroom/',
      './rooms/garage/',
      './rooms/camping/',
      './rooms/family/',
      './rooms/dining_room/',
      './rooms/laundry/',
      './login.php',
      './rooms/kitchen/view.php',
      './rooms/garage/view.php',
      './rooms/laundry/view.php',
    //   './rooms/grocerylist/view.php',
    //   './rooms/grocerylist/index.php',
      './rooms/storage/view.php',
      './rooms/notifications.php',
      './rooms/ajax_croom_loader.php',
      './rooms/maintenance.php',
      './rooms/suggested.php',
      './rooms/starred.php',
      './rooms/style.css',
      './rooms/add_room.php',
      './rooms/bedroom/view.php',
      './rooms/bathroom/view.php',
      './rooms/family/view.php',
      './rooms/dining_room/view.php',
    ])),
  );
});

self.addEventListener('fetch', (e) => {
  console.log(e.request.url);
  if (!navigator.onLine) {
      e.respondWith(
        caches.match(e.request).then((response) => response || fetch(e.request)),
      );
  }
});