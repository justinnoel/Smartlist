export function copyToClipboard(data) {
   navigator.clipboard.writeText(data.toString())
   // Show success message
   M.Toast.dismissAll();
   setTimeout(() => M.toast({
      html: "Copied text to Clipboard",
   }), 200)
}
