<!DOCTYPE html>
<html>
    <head>
        <title>Add an item</title><script async src="https://www.googletagmanager.com/gtag/js?id=G-S0PH6N0Z7E"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-S0PH6N0Z7E');
    </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <style>
            .dropdown-content {
                min-width: 300px;
            }
            .dropdown-content a {
                color: gray !important;
            }
        </style>
    </head>
    <body>
        <div class="container">
              <a class='right dropdown-trigger btn large purple' href='#' data-target='dropdown1'>Select room</a>
              <ul id='dropdown1' class='dropdown-content'>
                <li><a href="#!">Kitchen</a></li>
                <li><a href="#!">Bedroom</a></li>
                <li><a href="#!">Bathroom</a></li>
                <li><a href="#!">Garage</a></li>
                <li><a href="#!">Family Room</a></li>
                <li><a href="#!">Storage Room</a></li>
                <li><a href="#!">Dining Room</a></li>
                <li><a href="#!">Laundry room</a></li>
              </ul>
              <form action="" method="POST">
                  <input type="text" name="name">
                  <input type="text" name="qty">
                  <input type="hidden" name="price" value="1">
                  <button type="submit" class="btn red waves-effect waves-light">Add</button>
              </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
              $('.dropdown-trigger').dropdown();
        </script>
    </body>
</html>