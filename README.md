
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
* **Secure** - Smartlist uses 256-bit AES encryption to store the items
* **Fast** - Smartlist uses the serviceWorker technology, and uses a fast and reliable CDN
* **Collaborative** - You can sync your inventory with up to 1 person
* **Enhanced finance tracking** - Smartlist can help you track your finances. Finance calculators, budget, finance plans are available!
* **Star important items** - You can star important items which you edit frequently
* **Recipe Generator** - Generate recipes based on the items you have, or just ger recipe ideas
* **Share items** - Share items via WhatsApp, SMS, and email!
* **Notes & documents** - Store encrypted text files for free
* **Home maintenance** - Get reminders for home maintenance
* **Email notifications** - Get daily / weekly emails about your inventory
* **Customize your profile** - You can change the theme color, dark theme, and even change the branding!
* **Search your home** - You can search your home!
* **Shopping list and todo list** - You can add items to your shopping list to view in store
* **Shopping assistant** - Easy for in-store use. Tap to change next item to buy
* **Custom rooms and labels** - Along with default rooms, you can set custom rooms and categories
* **Great design** - We implement the features of Material Design to make it easy for everyone to use
* **PWA** - You can install this app via your browser!
* **Notifications** - Get updates on items you're running out of

### How can I contribute?
Want to contribute? 
Visit: https://smartlist.ga/join


### Where's the code?
You can find the code for the dashboard under the `/web/dashboard` directory

### Top contributors
Smartlist woudln't have been possible without the following people:

* @ManuTheCoder
* @WaterBottlesHydrate
* @N-V-O

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
request["Authorization"] = "Bearer key_here"

response = https.request(request)
puts response.read_body

```
<!--<img src="https://i.ibb.co/FDqN0Vh/smartlist.png" width="100px">-->
<img src="https://i.ibb.co/bvqb9qg/Screenshot-2021-04-23-11-45-58-AM.png" width="300px">



### Screenshots

<p float="left">
<img src="https://user-images.githubusercontent.com/77016441/142774038-39ad7b4f-870c-47cf-80b6-159f044db680.png" style="width: 200px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774055-327fd6a9-6108-4691-b197-40a18383fe8a.png" style="width: 200px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774060-06155948-0a21-45bf-b004-f1828ddcbf1f.png" style="width: 200px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774069-95c56035-5a64-464d-97fb-aa6a3bbcf484.png" style="width: 200px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774074-88f4ffcc-a420-4197-a3dd-c924fb3037cf.png" style="width: 200px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774103-77bf3eda-366b-44de-ae84-b183d3891fbd.png" style="width: 200px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774106-48603cc3-b9cb-461e-bdc0-6d1c81e355de.png" style="width: 200px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774121-ad6a6eab-4f6e-4515-8a63-f440da0cc6bf.png" style="width: 200px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774146-81ba3c2a-28e4-449c-9d2b-e3b838d977c3.png" style="width: 200px;display: inline;float:left">
  </p>
  <p float="left">
<img src="https://user-images.githubusercontent.com/77016441/142774164-982d8a04-a287-4fde-a185-2f1b7da1f715.png" style="width: 200px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774167-7ddeb7fa-b024-4e2a-ad87-4d8bb6b3685a.png" style="width: 200px;display: inline;float:left">
  </p>
  <p float="left">
<img src="https://user-images.githubusercontent.com/77016441/142774174-ccaa29ab-db59-4e4b-b4df-3269b1a5997a.png" style="width: 100px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774178-926ad2ad-81c9-441a-97cb-fa9c94c5c22c.png" style="width: 100px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774180-57899f21-c0b6-44ef-9f1e-9f7d399197ab.png" style="width: 100px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774197-6d7baa84-e27d-437c-90d8-f57c1afba73a.png" style="width: 100px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774203-1ef4b7e7-1b4d-41aa-8674-5c6bfdc208fb.png" style="width: 100px;display: inline;float:left">
<img src="https://user-images.githubusercontent.com/77016441/142774215-a8c6a18a-a31c-4ace-b4ea-4a7a2f514124.png" style="width: 100px;display: inline;float:left">
</p>
