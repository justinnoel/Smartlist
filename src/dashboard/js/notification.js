
/**
 * @param {string} data - Body of the notification
 */
export function showNotification(data) {
   Notification.requestPermission(function (result) {
      if (result === "granted") {
         navigator.serviceWorker.ready.then(function (registration) {
            registration.showNotification("Smartlist", {
               body: data,
               icon: "https://i.ibb.co/X5LcCc4/logo-z3yoqm-modified-removebg-preview-modified.png",
               vibrate: [200, 100, 200, 100, 200, 100, 200],
               // tag: 'vibration-sample'
            });
         });
      }
   });
}