<?php
session_start();
include("./dashboard/cred.php");
function thousandsCurrencyFormat($num) {

  if($num>1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;

  }

  return $num;
}
$_CONFIG = json_decode(file_get_contents("/home/smartlis/public_html/config.json"));
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "
SELECT COUNT(name) FROM products
UNION
SELECT COUNT(name) FROM bedroom
UNION
SELECT COUNT(name) FROM bathroom
UNION
SELECT COUNT(name) FROM garage
UNION
SELECT COUNT(name) FROM camping
UNION
SELECT COUNT(name) FROM dining_room
UNION
SELECT COUNT(name) FROM family
UNION
SELECT COUNT(name) FROM laundry
UNION
SELECT COUNT(name) FROM storageroom
UNION
SELECT COUNT(name) FROM custom_room_items
";
$users = $dbh->query($sql);
$itemCount = 0;
foreach ($users as $e) {$itemCount += $e["COUNT(name)"]*98;}$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM login";
$users = $dbh->query($sql);
$userCount = $users->rowCount()*4982;

$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM bm";
$users = $dbh->query($sql);
// $financeCount = $users->rowCount();  
$financeCount=0;
foreach($users as $a) {$financeCount += decrypt($a['qty']);}

function sanitize_output($buffer) {

  $search = array(
    '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
    '/[^\S ]+\</s',     // strip whitespaces before tags, except space
    '/(\s)+/s',         // shorten multiple whitespace sequences
    '/<!--(.|\s)*?-->/' // Remove HTML comments
  );

  $replace = array(
    '>',
    '<',
    '\\1',
    ''
  );

  $buffer = preg_replace($search, $replace, $buffer);

  return $buffer;
}

ob_start("sanitize_output");

?>
<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdn.tailwindcss.com/"></script>
    <script>
    tailwind.config = {
      // theme: {
      //   extend: {
      //     colors: {
      //       clifford: '#da373d',
      //     }
      //   }
      // }
     darkMode: 'class',
    }
  </script>
        <script type="application/ld+json">{"@context":"https://schema.org","@type":"Project","name":"Smartlist","alternateName":"Smartlist","url":"https://smartlist.ga","logo":"https://smartlist.ga/dashboard/icon/roofing.svg","sameAs":["https://github.com/Smartlist-App","https://smartlist.ga"]} </script> 
        <title>Smartlist - sophisticated home and business inventory management for free.</title>
        <meta name="title" content="Smartlist - sophisticated home and business inventory management for free.">
        <meta name="description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home. Save money for free by tracking your expenses, getting reminders for home maintenance, and creating shopping lists!">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://smartlist.ga/">
        <meta property="og:title" content="Smartlist - sophisticated home and business inventory management for free.">
        <meta property="og:description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home. Save money for free by tracking your expenses, getting reminders for home maintenance, and creating shopping lists!">
        <meta property="og:image" content="https://i.ibb.co/1nW9xMJ/banner.png">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://smartlist.ga/">
        <meta property="twitter:title" content="Smartlist - sophisticated home and business inventory management for free.">
        <meta property="twitter:description" content="Smartlist is a free home inventory app that lets you keep track of what you have in your home. Save money for free by tracking your expenses, getting reminders for home maintenance, and creating shopping lists!">
        <meta property="twitter:image" content="https://i.ibb.co/1nW9xMJ/banner.png">
    <meta charset="UTF-8" />
    <link
      rel="shortcut icon"
      href="https://i.ibb.co/HPtyvJS/logo-z3yoqm-modified-removebg-preview-modified.png"
    />
          <link
    rel="stylesheet"
    data-cfasync="false"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.0/animate.css"
  />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
    />
    <style>
    body {display:none}
     * { font-family: "Outfit", sans-serif; outline: 0; -webkit-tap-highlight-color: transparent; }
            input[type=range] { height: 25px; -webkit-appearance: none; margin: 10px 0; width: 100%; } input[type=range]:focus { outline: none; } input[type=range]::-webkit-slider-runnable-track { width: 100%; height: 5px; cursor: pointer; animate: 0.2s; box-shadow: 0px 0px 0px #000000; background: #2497E3; border-radius: 1px; border: 0px solid #000000; } input[type=range]::-webkit-slider-thumb { box-shadow: 0px 0px 0px #000000; border: 1px solid #2497E3; height: 18px; width: 18px; border-radius: 25px; background: #A1D0FF; cursor: pointer; -webkit-appearance: none; margin-top: -7px; } input[type=range]:focus::-webkit-slider-runnable-track { background: #2497E3; } input[type=range]::-moz-range-track { width: 100%; height: 5px; cursor: pointer; animate: 0.2s; box-shadow: 0px 0px 0px #000000; background: #2497E3; border-radius: 1px; border: 0px solid #000000; } input[type=range]::-moz-range-thumb { box-shadow: 0px 0px 0px #000000; border: 1px solid #2497E3; height: 18px; width: 18px; border-radius: 25px; background: #A1D0FF; cursor: pointer; } input[type=range]::-ms-track { width: 100%; height: 5px; cursor: pointer; animate: 0.2s; background: transparent; border-color: transparent; color: transparent; } input[type=range]::-ms-fill-lower { background: #2497E3; border: 0px solid #000000; border-radius: 2px; box-shadow: 0px 0px 0px #000000; } input[type=range]::-ms-fill-upper { background: #2497E3; border: 0px solid #000000; border-radius: 2px; box-shadow: 0px 0px 0px #000000; } input[type=range]::-ms-thumb { margin-top: 1px; box-shadow: 0px 0px 0px #000000; border: 1px solid #2497E3; height: 18px; width: 18px; border-radius: 25px; background: #A1D0FF; cursor: pointer; } input[type=range]:focus::-ms-fill-lower { background: #2497E3; } input[type=range]:focus::-ms-fill-upper { background: #2497E3; }
            .slide { overflow: hidden;height:auto } .slide .e { display: inline-block; animation: reveal .8s cubic-bezier(0.77, 0, 0.175, 1) 0.5s forwards; transform: translate(0,100%);} @keyframes reveal { 0% { transform: translate(0,100%); } 100% { transform: translate(0,0);overflow:visible } } 
            .fadeInUp {animation-duration: .8s !important}
            .modal {
                position:fixed;top:0;left:0;width:100%;height:100%;z-index:100000;background:rgba(0,0,0,0.1);
                text-align: center
            }
            .modal-content {
                width: 90vw;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%)
            }
            </style>
    <!-- ... -->
  </head>
  <body class="dark:bg-slate-800">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-green-600">
      <div class="max-w-8xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
          <div class="w-0 flex-1 flex items-center">
            <span class="flex p-2 rounded-lg bg-green-700">
              <!-- Heroicon name: outline/speakerphone -->
              <svg
                class="h-6 w-6 text-white"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                  d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"
                />
              </svg>
            </span>
            <p class="ml-3 font-medium text-white truncate">
              <span class="md:hidden"><?=$_CONFIG->banner->mobile;?></span>
              <span class="hidden md:inline">
                <?=$_CONFIG->banner->desktop;?>
              </span>
            </p>
          </div>
          <div
            class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto"
          >
            <a
              href="<?=$_CONFIG->banner->buttonURL;?>"
              class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-green-600 bg-white hover:bg-green-100 focus:ring-2 focus:ring-white"
            >
              <?=$_CONFIG->banner->buttonText;?>
            </a>
          </div>
          <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
            <button
              type="button"
              class="-mr-1 flex p-2 rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2"
              onclick="this.parentElement.parentElement.parentElement.parentElement.remove()"
            >
              <span class="sr-only">Dismiss</span>
              <!-- Heroicon name: outline/x -->
              <svg
                class="h-6 w-6 text-white"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>

    <nav class="sticky top-0 z-10 bg-white shadow-sm py-4 px-4 flex w-full dark:bg-slate-700">
      <a href="/" class="text-gray-500 dark:text-white flex items-center py-1 px-3 rounded-md"
        ><img
          src="data:image/svg+xml,%0A%3Csvg xmlns='http://www.w3.org/2000/svg' version='1.2' baseProfile='tiny' width='270.4838718484766' height='263.7741935731965' style=''%3E%3Crect id='backgroundrect' width='100%25' height='100%25' x='0' y='0' fill='none' stroke='none' class='selected' style=''/%3E%3Cmetadata%3E%3Crdf:RDF xmlns:rdf='http://www.w3.org/1999/02/22-rdf-syntax-ns%23' xmlns:rdfs='http://www.w3.org/2000/01/rdf-schema%23' xmlns:dc='http://purl.org/dc/elements/1.1/'%3E%3Crdf:Description about='https://iconscout.com/legal%23licenses' dc:title='roofing,contractor' dc:description='roofing,contractor' dc:publisher='Iconscout' dc:date='2017-09-24' dc:format='image/svg+xml' dc:language='en'%3E%3Cdc:creator%3E%3Crdf:Bag%3E%3Crdf:li%3EScott De Jonge%3C/rdf:li%3E%3C/rdf:Bag%3E%3C/dc:creator%3E%3C/rdf:Description%3E%3C/rdf:RDF%3E%3C/metadata%3E%3Cg class='currentLayer' style=''%3E%3Ctitle%3ELayer 1%3C/title%3E%3Cpath d='M90.02969540151386,106.6231528191286 h17.361412403869622 l-0.15184073554539457,9.5813841632138 l-17.209571668324223,14.488660919254208 v-24.070045082468013 zm48.01032162773054,-5.30393265986017 L69.54838562011719,157.83196602375125 L76.7679828573699,165.4193502380333 l61.55279628665656,-50.798756763511705 L199.86211575252864,165.4193502380333 L207.0645234725498,157.83196602375125 L138.58435174157697,101.31922015926843 L138.3064545463335,101.09677124023438 l-0.26643751708908836,0.22244891903405475 z' id='svg_1' class=''/%3E%3Crect fill='none' stroke-dashoffset='' fill-rule='nonzero' id='svg_3' x='6.419353485107422' y='4.387096881866455' width='257.70965576171875' height='257' style='color: rgb(0, 0, 0);' class='' stroke='%23000000' stroke-opacity='1' stroke-width='7' rx='29' ry='29'/%3E%3C/g%3E%3C/svg%3E"
          alt=""
          class="h-auto w-7 pd-10"
        /><span class="text-gray-500 dark:text-white text-lg mx-1.5">Smartlist</span></a
      >
      <a
        href="//community.smartlist.ga"
        class="hidden lg:flex hover:bg-blue-50 dark:hover:bg-slate-900 hover:text-blue-900 dark:hover:text-white text-gray-500 dark:text-white items-center py-1 px-3 focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 rounded-md"
        >Community Forum</a
      >
      <a
        href="//support.smartlist.ga"
        class="hover:bg-blue-50 dark:hover:bg-slate-900 dark:hover:text-white focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 hover:text-blue-900 text-gray-500 dark:text-white hidden lg:flex md:flex items-center py-1 px-3 rounded-md focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"
        >Knowledge Base</a
      >
      <a
        href="//smartlist.ga/developer"
        class="hover:bg-blue-50 dark:hover:bg-slate-900 hover:text-blue-900 dark:hover:text-white text-gray-500 dark:text-white flex items-center py-1 px-3 rounded-md focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"
        >Developer</a
      >
            <a
        href="https://discord.gg/QDwxp7qrf2"
        class="hover:bg-blue-50 dark:hover:bg-slate-900 hidden lg:flex hover:text-blue-900 text-gray-500 dark:text-white flex items-center py-1 px-3 rounded-md focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"
        >Discord</a
      >
      <a
        href="/impact"
        class="bg-blue-50 dark:bg-slate-900 hover:text-blue-900 dark:hover:text-white text-gray-500 dark:text-white hidden lg:flex md:flex items-center py-1 px-3 rounded-md focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"
        >Our Impact</a
      >
      <a
        href="/join"
        class="hover:bg-blue-50 dark:hover:bg-slate-900 hover:text-blue-900 dark:hover:text-white text-gray-500 dark:text-white hidden lg:flex md:flex items-center py-1 px-3 rounded-md focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"
        >
                Join us!</a
      >
      <a
        href="/security"
        class="hover:bg-blue-50 dark:hover:bg-slate-900 hover:text-blue-900 dark:hover:text-white text-gray-500 dark:text-white flex items-center py-1 px-3 rounded-md focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"
        >Privacy</a
      >
      <a
        href="//smartlist.ga/login"
        class="float-right hover:bg-blue-50 dark:hover:bg-slate-900 hover:text-blue-900 dark:hover:text-white text-gray-500 dark:text-white flex items-center ml-auto py-1 px-3 rounded-md focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"
        >Login</a
      >
    </nav>
            <main class="container mx-auto px-10 py-20 lg:py-40 overflow-x-hidden">
                <div class="text-center">
                    <div class="bg1">
                        <h1
                            class="slide text-4xl tracking-tight text-gray-900 sm:text-5xl md:text-6xl mt-5 dark:text-white"
                        >
                            <span class="e">
                            Our <span class="e text-green-600 dark:text-white">impact</span>
                            </span>
                        </h1>
                        <h2
                            class="text-1xl tracking-tight text-gray-900 sm:text-2xl md:text-1xl mt-5 lg:mt-8 slide dark:text-white"
                        >
                            <span class="e">
                            Learn <span class="e">how <span class="e">Smartlist <span class="e">helps <span class="e">the <span class="e">world</span></span></span></span></span></span>
                            </span>
                        </h2>
                    </div>
                </div>
                <div class="bg-green-50 p-5 mt-40 rounded-lg wow fadeInUp dark:bg-green-900 dark:text-white">
                    <h2 class="text-3xl">
                        Our mission
                    </h2>
                    <p>Our mission is to end global poverty by providing our technology.</p>
                </div>
                <div class="grid gap-1 items-center grid-cols-1 lg:grid-cols-2 mt-5" class="w-full">
                    <div class="p-2">
                        <h2 class="dark:text-white text-3xl wow fadeInUp">Helping families save money.</h2>
                        <p class="wow fadeInUp dark:text-white">More than 10,000 families save money by keeping track of what they have in their home.</p>
                    </div>
                    <div class="p-2">
                        <img src="https://i.ibb.co/n7S0LHC/Screenshot-2021-11-29-12-33-27-PM.png" class="w-full rounded-xl shadow-lg wow fadeInRight" alt="">
                    </div>
                </div>
                <div class="grid gap-1 items-center grid-cols-1 lg:grid-cols-2 mt-5" class="w-full">
                    <div class="p-2">
                        <img src="https://thumbor.forbes.com/thumbor/960x0/https%3A%2F%2Fspecials-images.forbesimg.com%2Fimageserve%2F60ab8c0bd475ba635eb5b640%2FDiverse-Group-People-Working-Together-Concept%2F960x0.jpg%3Ffit%3Dscale" class="w-full rounded-xl shadow-lg wow fadeInLeft" alt="">
                    </div>
                    <div class="p-5">
                        <h2 class="dark:text-white text-3xl wow fadeInUp">We're transparent 😎</h2>
                        <p class="dark:text-white wow fadeInUp">You can view how your data is processed. Smartlist's code is open source and available on GitHub. </p>
                    </div>
                </div>
                    <div class="grid gap-1 items-center grid-cols-1 lg:grid-cols-2 mt-5" class="w-full">
                    <div class="p-5">
                        <h2 class="dark:text-white text-3xl wow fadeInUp">Eco-Friendly</h2>
                        <p class="dark:text-white wow fadeInUp">We're using CloudFlare's eco-friendly technology to make our servers a bit less harmful to the environment</p>
                    </div>
                    <div class="p-2">
                        <img src="https://www.icompasstech.com/wp-content/uploads/2019/02/4-Ways-for-Governments-to-be-More-Environmentally-Friendly.jpg" class="w-full rounded-xl shadow-lg wow fadeInRight" alt="">
                    </div>
                </div>
        <div class="grid gap-1 items-center grid-cols-1 lg:grid-cols-2 mt-5" class="w-full">
                    <div class="p-2">
                        <img src="https://i.ibb.co/FBQtHVk/finance.jpg" class="w-full rounded-xl shadow-lg wow fadeInLeft" alt="">
                    </div>
                    <div class="p-5">
                        <h2 class="dark:text-white text-3xl wow fadeInUp">Saving money. Simplified.</h2>
                        <p class="dark:text-white wow fadeInUp">We care for families of all types, and our services are free of cost. Anyone can sign up for free. You can set short, medium, or long term goals for your financial life. We'll remind you about home maintenance to prevent huge bills in the future.</p>
                    </div>
                </div>

                <div class="grid gap-1 items-center grid-cols-1 lg:grid-cols-2 mt-5" class="w-full">
                    <div class="p-5">

                        <h2 class="dark:text-white text-3xl wow fadeInUp">In the future...</h2>
                        <p class="dark:text-white wow fadeInUp">We would love to end global hunger with the donations we make. (Currently Smartlist doesn't have a donation system)</p>
                    </div>
                    <div class="p-2">
                        <img src="https://www.thegef.org/sites/default/files/gorongosa_coffee_blog_woman_child_jenguyton.jpg" class="w-full rounded-xl shadow-lg wow fadeInRight" alt="">
                    </div>
                    
                </div>

            </main>
             <div class="bg-gray-900 text-white rounded-none lg:rounded-lg md:rounded-lg shadow-xl py-10 container mx-auto px-10 py-20 lg:py-20 wow fadeInUp">
            <h2 class="text-4xl mt-2">Introducing Smartlist Events</h2>
            <h3 class="text-2xl mt-2">Collaborate on your events and parties</h3>
            <p class="mt-1">Smartlist events helps you plan your events in advance. You'll be able to plan your menu, manage guest lists, items, and more.</p>
            <a href="//collaborate.smartlist.ga" target="_blank" class="bg-gray-800 hover:bg-gray-700 rounded-lg mt-5 focus:ring-2 focus:ring-gray-700 py-4 px-5 inline-block focus:ring-offset-2">Learn more</a>
        </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-gray-100 m-5 rounded-lg wow fadeInUp">
      <!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-gray-50 dark:bg-slate-800">
  <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
    <h2 class="text-3xl tracking-tight text-gray-900 sm:text-4xl dark:text-white">
      <span class="block font-extrabold">Ready to start saving money?</span>
      <span class="block text-green-600">Create an account - It's free!</span>
    </h2>
    <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
      <div class="inline-flex rounded-md shadow">
        <a href="/signup" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
          Get started
        </a>
      </div>
      <div class="ml-3 inline-flex rounded-md shadow">
        <a href="//blog.manuthecoder.ml/smartlist" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-green-600 bg-white hover:bg-green-50 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:bg-slate-600">
          Learn more
        </a>
      </div>
    </div>
  </div>
</div>

    </div>
        <div class="m-4 wow fadeInUp" style="border-top:1px solid rgba(200, 200, 200, .3)">
            <div
                class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between"
            >
                <div class="grid-cols-1 lg:grid-cols-2 md:grid-cols-2 grid" style="width:100%">
                    <div class="lg:w-1/2">
                        <h6 class="text-2xl tracking-tight text-gray-600 sm:text-2xl">
                            Smartlist
                        </h6>
                        <p class="text-gray-400">The sophisticated home inventory app</p>
                        <form action="" class="mt-2">
                            <p class="text-gray-400"><b>Subscribe to our newsletter</b></p>
                            <p class="text-gray-400 mb-2">We'll send you monthly updates about our app</p>
                            <div>
                                <input name="email" type="email" autocomplete="off" required class="px-5 py-3 rounded-4 border-gray-300 border-2 rounded-md mb-2 focus:border-green-600 focus:text-green-600 text-gray-400 mr-1 dark:bg-slate-700" placeholder="Enter your email here...">
                                <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Subscribe</button>
                            </div>
                        </form>
                    </div>
                    <div class="w-1/2 mt-3 lg:mt-0">
                        <a class="block text-gray-500"
                        href="https://support.smartlist.ga/#/terms-and-conditions">Terms of service</a>
                        <a class="block text-gray-500" href="https://support.smartlist.ga/#/privacy-policy">Privacy Policy</a>
                        <a class="block text-gray-500" href="https://events.smartlist.ga">Smartlist Events</a>
                        <a class="block text-gray-500" href="https://support.smartlist.ga">Knowledge base</a>
                        <a class="block text-gray-500" href="https://community.smartlist.ga">Community Forum</a>
                        <a class="block text-gray-500" href="https://smartlist.ga/dashboard">Dashboard</a>
                        <a class="block text-gray-500" href="https://github.com/Smartist-App/Smartlist">GitHub</a>
            <br>
            <a href="https://www.producthunt.com/posts/smartlist?utm_source=badge-featured&utm_medium=badge&utm_souce=badge-smartlist" class="mt-2" style="margin-top: 10px!important" target="_blank"><img src="https://api.producthunt.com/widgets/embed-image/v1/featured.svg?post_id=321053&theme=dark" alt="Smartlist - Smart and easy home inventory and finance management. | Product Hunt" style="width: 250px; height: 54px;" width="250" height="54" /></a>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:flex lg:items-center lg:justify-between text-gray-500">
                    &copy; Copyright 2021. All rights reserved
            </div>
    </div>
        <div class="modal hidden" id="vid">
            <div class="modal-content p-10 rounded-md shadow-xl bg-white">
                <iframe width="100%" height="500px" src="about:blank" id="iframe" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <br>
<a
href="#/"
            onclick="modal.toggle('vid')"
            class="text-black focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:-mr-2 px-6 rounded-md py-4 inline-block mt-5 mr-2 bg-green-50"
            >Great!</a
          >
            </div>
        </div>
    <!-- ... -->
        <script data-cfasync="false" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
        <script>
    window.onerror = function(e){alert(e)};
            window.addEventListener('load', function() {
                new WOW().init();
            });
            var modal = {
                toggle(el) {
                    document.getElementById(el).classList.toggle("hidden");
                }
            };
            window.addEventListener("load", function() {
                setTimeout(function() {
                document.getElementById("iframe").src='https://www.youtube.com/embed/C5a72RRzOoc'
                }, 500);
        document.body.style.display = "block";
            });
            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.body.classList.add("dark")
            }
        </script>
  </body>
</html>