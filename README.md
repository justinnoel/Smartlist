
[![Image](https://i.ibb.co/PZr6Gdn/save-money-by-keeping-track-of-what-you-have-at-home-1.png)](https://smartlist.ga)


# Smartlist
## The sophisticated home inventory app
Smartlist is a home inventory app that lets you keep track of what you home inventory app! Smartlist is free of cost and has no "Premium plans". Smartlist is made using HTML, CSS, JS, jQuery, PHP, SQL. This product is an open source projec
##### [Join us!](https://smartlist.ga/join)
![CB](https://img.shields.io/badge/Contributors-20-yellow?style=flat)
![Frontend](https://img.shields.io/static/v1?label=Frontend&message=HTML,%20CSS,%20JS&color=%3CCOLOR%3E&style=flat)
![Backend](https://img.shields.io/static/v1?label=Backend&message=PHP,%20SQL&color=red&style=flat)
![CONTRIBUTE](https://img.shields.io/static/v1?label=Contribute&message=Using%20Smartlist%20Contributors&color=blue&style=flat)
[![Build Status](https://img.shields.io/github/forks/Smartlist-app/Smartlist.svg?style=flat)](https://github.com/ManuTheCoder/Smartlist-desktop)
[![Build Status](https://img.shields.io/github/stars/Smartlist-app/Smartlist.svg?style=flat)](https://github.com/ManuTheCoder/Smartlist-desktop)
[![License](https://img.shields.io/github/license/Smartlist-app/Smartlist.svg?style=flat)](https://github.com/ManuTheCoder/Smartlist-desktop)
[![Better Uptime Badge](https://betteruptime.com/status-badges/v1/monitor/77o4.svg)](https://betteruptime.com/?utm_source=status_badge)

### Meet Smartlist. 
Smartlist is a free home inventory app that lets you keep track of what you have in your home, and helps you save money. 
This is the **official GitHub Repository** for Smartlist!
### Features
* **Secure** - Our dashboard is highly secure, and immune against attacks
* **Sync** - Sync your inventory with others you live with!
* **Star items** - Star important items you edit usually
* **Custom Rooms** - Create custom categories for items!
* **Recipe generator** - Save time finding recipes!
* **Scan rooms** - Scan your room to quickly build up your inventory
* **Home Maintenance** - Reminders for common things you forget to clean
* **Budget meter** - Track how much you spend using our budget meter
* **Push notifications** - Get real time notifications on what you're missing!
* **PWA** - Smartlist is a progressive web app!
* **Themes** - Custom user-defined themes + dark mode
* **Suggested items** - Get to know what you have, and what you need
* **Todo List** - Be more productive using our todo list
* **Grocery List** - Keep track of what you need next time you visit the grocery store
* **Right click on items** (Or tap and hold on mobile) - You can now view an item's actions by right-clicking it, or tapping and holding it on mobile!
* **Help Desk** - We have a forum and a knowledge base!
* **Generate QR codes** - Want to share items? You can now generate QR codes, send emails, and more!
* **Search your home!** - Search your home for items
* **Keep a budget** - Know how much you spend, and try not to spend higher than your budget!
* **Smartlist is a single page app!** No more redirects!
* **Create, Update, Edit, Delete items** - You can Create, Update, Edit, Delete items!
* **Smartlist Events** - Smartlist events is a great place to organize and keep track of what you need and have for a party, wedding, etc.
* **Profile Pictures** - Personalize your account!
* **Offline Access** - Access your inventory offline!
* **Invite collaborators and comment on items!** - You can create a shareable link for items, and then share it with others - even who don't have an account!
* **Accessible to Everyone!**  - We ran the lighthouse test, and scored *100%* in accessibility!
* **Keyboard Shortcuts** - For the pros - Ever wanted to quickly go to the next room and switch back to the previous room, or search an item quickly? You can now press CTRL F to search items, CTRL E to go to your settings, CTRL B to go to your budget meter, and CTRL S to add an item! 
### How is Smartlist different from other home inventory apps?
* **Smartlist is free** - We don't believe in an nonsensical "Paid plans", and "Pricing"
* **Smartlist is open source** - You can download the files from the GitHub repository. Please read our terms and conditions before doing so, though. 
* **Smartlist is a single page app!** No more redirects!
* **Budget meter** - This is the first home inventory app to create the budget meter! Keep track of how much you spend *visually!*
* **Extremely fast load times** - Our app loads extremely fast
### How can I contribute?
Want to contribute? 
Visit: https://smartlist.ga/join


### Where's the code?
You can find the code for the dashboard under the `/web/dashboard` directory


### API
Smartlist provides an easy-to-use API for free!
Languages supported: JS, PHP, Python, Flutter, Swift, C++, Java, Kotlin
* Log in to your Smartlist account. 
* Go to your settings, and click on "Developer"
* Click on the "API Dashboard" button
* Click on the "API keys" in the side navigation menu
* Create a key by filling out the form
* Let's code!

#### JS Usage: 
```js
var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function() {
  if(this.readyState === 4) {
    console.log(this.responseText);
  }
});

xhr.open("POST", "https://api.smartlist.ga/v1/test-key");
xhr.setRequestHeader("Authorization", "Bearer key_here");

xhr.send();
```

#### Python
```python
import requests

url = "https://api.smartlist.ga/v1/test-key"

payload={}
headers = {
  'Authorization': 'Bearer key_here'
}

response = requests.request("POST", url, headers=headers, data=payload)

print(response.text)
```

#### Java
```java
OkHttpClient client = new OkHttpClient().newBuilder()
  .build();
MediaType mediaType = MediaType.parse("text/plain");
RequestBody body = RequestBody.create(mediaType, "");
Request request = new Request.Builder()
  .url("https://api.smartlist.ga/v1/test-key")
  .method("POST", body)
  .addHeader("Authorization", "Bearer key_here")
  .build();
Response response = client.newCall(request).execute();
```

#### PHP
```php
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.smartlist.ga/v1/test-key',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer key_here'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
```
#### Node.JS
```js
var axios = require('axios');

var config = {
  method: 'post',
  url: 'https://api.smartlist.ga/v1/test-key',
  headers: { 
    'Authorization': 'Bearer key_here'
  }
};

axios(config)
.then(function (response) {
  console.log(JSON.stringify(response.data));
})
.catch(function (error) {
  console.log(error);
});
```

#### Swift
```swift
import  Foundation
#if canImport(FoundationNetworking)
import  FoundationNetworking
#endif
var semaphore =  DispatchSemaphore  (value:  0)
var request =  URLRequest(url:  URL(string:  "https://api.smartlist.ga/v1/test-key")!,timeoutInterval:  Double.infinity)
request.addValue("Bearer key_here", forHTTPHeaderField:  "Authorization")

request.httpMethod  =  "POST"

let task =  URLSession.shared.dataTask(with: request)  { data, response, error in guard  let data = data else  {	
print(String(describing: error))
semaphore.signal()
return
}
print(String(data: data, encoding: .utf8)!)
semaphore.signal()
}

  

task.resume()

semaphore.wait()
```
#### cURL
```curl
curl --location --request POST 'https://api.smartlist.ga/v1/test-key' \

--header 'Authorization: Bearer key_here'
```
#### Ruby
```ruby
require "uri"
require "net/http"

url = URI("https://api.smartlist.ga/v1/test-key")

https = Net::HTTP.new(url.host, url.port)
https.use_ssl = true

request = Net::HTTP::Post.new(url)
request["Authorization"] = "Bearer c07cddf2684cea9928e37afa39ba2a21844db979ae37833f6f3e66a3e87ae7f5a7421d75a064ab42b309b863049c3d73a736bab2fb68bb05101f7da4eee17fef"

response = https.request(request)
puts response.read_body

```
<!--<img src="https://i.ibb.co/FDqN0Vh/smartlist.png" width="100px">-->
<img src="https://i.ibb.co/bvqb9qg/Screenshot-2021-04-23-11-45-58-AM.png" width="300px">
