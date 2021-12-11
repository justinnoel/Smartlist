/**
 * @description - Handles a form
 * @param {*} event - The form submit event
 */
export function sendData(event, callback = () => {}) {
  event.preventDefault();
  const _http = new XMLHttpRequest();
  // Bind the FormData object and the form element
  const data = new FormData(event.target);

  // Define what happens on successful data submission
  return new Promise((resolve, reject) => {
    _http.addEventListener("load", function (event) {
      callback(event.target.responseText);
      resolve(event.target.responseText);
    });
    // Define what happens in case of error
    _http.addEventListener("error", function (event) {
      alert("Oops! Something went wrong.");
    });

    // Set up our request
    _http.open((event.target.method?event.target.method:"POST"), event.target.action);

    // The data sent is what the user provided in the form
    _http.send(data);
  });
}