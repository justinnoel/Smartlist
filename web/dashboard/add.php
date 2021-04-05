<html>
<head>
    <title>Add Data</title>
          <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body class="container">
      <script>
  $( function() {
    var availableTags = [
      "Apple",
      "Orange",
      "Yogurt",
      "Milk",
      "Coriander",
      "Cilantro",
      "Sooji fine",
      "Saaru powder",
      "Banana",
      "Pineapple",
      "Watermelon",
      "Almond",
      "Carrot",
      "Brocolli",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme",
"Apple",
"Apricot",
"Artichoke",
"Asian Pear",
"Asparagus",
"Atemoya",
"Avocado",
"Bamboo Shoots",
"Banana",
"Bean Sprouts",
"Beans",
"Beets",
"Belgian Endive",
"Bell Peppers",
"Bitter Melon",
"Blackberries",
"Blueberries",
"Bok Choy",
"Boniato",
"Boysenberries",
"Broccoflower",
"Broccoli",
"Brussels Sprouts",
"Cabbage",
"Cactus Pear",
"Cantaloupe",
"Carambola",
"Carrots",
"Casaba Melon",
"Cauliflower",
"Celery",
"Chayote",
"Cherimoya",
"Cherries",
"Coconuts",
"Collard Greens",
"Corn",
"Cranberries",
"Cucumber",
"Dates",
"Dried Plums",
"Eggplant",
"Endive",
"Escarole",
"Feijoa",
"Fennel",
"Figs",
"Garlic",
"Gooseberries",
"Grapefruit",
"Grapes",
"Green Beans",
"Green Onions",
"Greens",
"Guava",
"Hominy",
"Honeydew Melon",
"Horned Melon",
"Iceberg Lettuce",
"Jerusalem Artichoke",
"Jicama",
"Kale",
"Kiwifruit",
"Kohlrabi",
"Kumquat",
"Leeks",
"Lemons",
"Lettuce",
"Lima Beans",
"Limes",
"Longan",
"Loquat",
"Lychee",
"Madarins",
"Malanga",
"Mandarin Oranges",
"Mangos",
"Mulberries",
"Mushrooms",
"Napa",
"Nectarines",
"Okra",
"Onion",
"Oranges",
"Papayas",
"Parsnip",
"Passion Fruit",
"Peaches",
"Pears",
"Peas",
"Peppers",
"Persimmons",
"Pineapple",
"Plantains",
"Plums",
"Pomegranate",
"Potatoes",
"Prickly Pear",
"Prunes",
"Pummelo",
"Pumpkin",
"Quince",
"Radicchio",
"Radishes",
"Raisins",
"Raspberries",
"Red Cabbage",
"Rhubarb",
"Romaine Lettuce",
"Rutabaga",
"Shallots",
"Snow Peas",
"Spinach",
"Sprouts",
"Squash",
"Strawberries",
"String Beans",
"Sweet Potato",
"Tangelo",
"Tangerines",
"Tomatillo",
"Tomato",
"Turnip",
"Ugli Fruit",
"Water Chestnuts",
"Watercress",
"Watermelon",
"Waxed Beans",
"Yams",
"Yellow Squash",
"Yuca/Cassava",
"Zucchini Squash",
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
   <!-- <a href="index.php" class="btn btn-dark">Home</a> <a href="view.php" class="btn btn-dark">View Products</a>  <a href="logout.php" class="btn btn-dark">Logout</a>-->
    <br/><br/>
    
    <form action="addx.php" method="post" name="form1">
        <table class="table">
            <tr> 
                <td>Name</td>
                <div class="ui-widget">
                <td>
                                <a href="https://homebase.rf.gd/homebase/upload/upload.php" style="float:right;display:inline-block;font-size: 30px;"><i class="fa fa-upload"></i></a>

                <input type="text" name="name" class="form-control" style='width:95%' id="tags" value="<?php echo $_GET['item']; ?>">
                
                </div>
                </td>
            </tr>
            <tr> 
                <td>Quantity</td>
                <td><input type="text" name="qty" class="form-control" value="<?php echo $_GET['q']; ?>"></td>
            </tr>
            <tr style="height:0;width:0;display:none"> 
                <td>Price</td>
                <td><input type="text" name="price" class="form-control" value="1"></td>
            </tr>
            <tr> 
                <td><input type="submit" name="Submit" value="Add" class="btn btn-success"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>
