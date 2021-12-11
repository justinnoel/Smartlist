/**  
 * Uploads an image to imgbb
 *  
 * @see https://imgbb.com/api
 * @param {element} el - The element to trigger
 * @param {callback} callback - The callback function.
 * @return Returns an image URL
 */
export function fileChange(el, callback = function (e) { }) {
   var file = el;
   var form = new FormData();
   form.append("image", file.files[0]);

   var settings = {
      url: "https://api.imgbb.com/1/upload?key=5e97a7dae2b850713c9da081460622cf",
      method: "POST",
      timeout: 0,
      processData: false,
      mimeType: "multipart/form-data",
      contentType: false,
      data: form,
   };

   $.ajax(settings).done(function (response) {
      console.log(response);
      var jx = JSON.parse(response);
      callback(jx.data.url);
   });
}