<!DOCTYPE html>
<html>
    <head>
        <title>Add an item</title>
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
    <body><br>
        <div class="container">
     
              <form action="add.php" method="POST">
                  <div class="input-field"><label>Name</label><input type="text" name="name" id="name" class="autocomplete" autofocus autocomplete="off"onkeyup="success()"></div>
                    <div class="input-field"><label>Description</label><textarea type="text" id="qty" name="qty" class="autocomplete_1 materialize-textarea" autocomplete="off"onkeyup="success()"></textarea>
                  <input type="hidden" name="price" value="1">
                  <button type="submit" class="btn purple waves-effect waves-light" name='submit' disabled id='button' onclick='setTimeout(function(){this.disabled=true;}, 0200);'>Add</button>
                 <button type="reset" href="#" class="btn red" disabled id='cancel'>Cancel</button>
                          <a class='dropdown-trigger btn large btn-flat right' href='#' data-target='dropdown1'>Select action</a>
              <ul id='dropdown1' class='dropdown-content'>
                <li><a href="https://smartlist.ga/dashboard/event/dash/todo/add.php">Todo</a></li>
                <li><a href="https://smartlist.ga/dashboard/event/dash/item/add.php">Dining Room</a></li>
                <li><a href="https://smartlist.ga/dashboard/event/dash/event/add.php">Event</a></li>
              </ul>
              </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
              $('.dropdown-trigger').dropdown();
                $(document).ready(function(){ $('input.autocomplete').autocomplete({ data: { "Apple": null, "Banana": null, "Orange": null, "Coriander": null, "Kale": null, "Watermelon": null, "Mango": null, "Noodles": null, "Juice": null, "Dal": null, "Black beans": null, "Kidney beans": null, "Coconuts": null, "Dark Chocolate": null, "Bread": null, "Chocolate": null, "Apple": null, "Orange": null, "Yogurt": null, "Milk": null, "Coriander": null, "Cilantro": null, "Sooji fine": null, "Saaru powder": null, "Banana": null, "Pineapple": null, "Watermelon": null, "Almond": null, "Carrot": null, "Brocolli": null, "JavaScript": null, "Lisp": null, "Perl": null, "PHP": null, "Python": null, "Ruby": null, "Scala": null, "Scheme": null, "Apple": null, "Apricot": null, "Artichoke": null, "Asian Pear": null, "Asparagus": null, "Atemoya": null, "Avocado": null, "Bamboo Shoots": null, "Banana": null, "Bean Sprouts": null, "Beans": null, "Beets": null, "Belgian Endive": null, "Bell Peppers": null, "Bitter Melon": null, "Blackberries": null, "Blueberries": null, "Bok Choy": null, "Boniato": null, "Boysenberries": null, "Broccoflower": null, "Broccoli": null, "Brussels Sprouts": null, "Cabbage": null, "Cactus Pear": null, "Cantaloupe": null, "Carambola": null, "Carrots": null, "Casaba Melon": null, "Cauliflower": null, "Celery": null, "Chayote": null, "Cherimoya": null, "Cherries": null, "Coconuts": null, "Collard Greens": null, "Corn": null, "Cranberries": null, "Cucumber": null, "Dates": null, "Dried Plums": null, "Eggplant": null, "Endive": null, "Escarole": null, "Feijoa": null, "Fennel": null, "Figs": null, "Garlic": null, "Gooseberries": null, "Grapefruit": null, "Grapes": null, "Green Beans": null, "Green Onions": null, "Greens": null, "Guava": null, "Hominy": null, "Honeydew Melon": null, "Horned Melon": null, "Iceberg Lettuce": null, "Jerusalem Artichoke": null, "Jicama": null, "Kale": null, "Kiwifruit": null, "Kohlrabi": null, "Kumquat": null, "Leeks": null, "Lemons": null, "Lettuce": null, "Lima Beans": null, "Limes": null, "Longan": null, "Loquat": null, "Lychee": null, "Madarins": null, "Malanga": null, "Mandarin Oranges": null, "Mangos": null, "Mulberries": null, "Mushrooms": null, "Napa": null, "Nectarines": null, "Okra": null, "Onion": null, "Oranges": null, "Papayas": null, "Parsnip": null, "Passion Fruit": null, "Peaches": null, "Pears": null, "Peas": null, "Peppers": null, "Persimmons": null, "Pineapple": null, "Plantains": null, "Plums": null, "Pomegranate": null, "Potatoes": null, "Prickly Pear": null, "Prunes": null, "Pummelo": null, "Pumpkin": null, "Quince": null, "Radicchio": null, "Radishes": null, "Raisins": null, "Raspberries": null, "Red Cabbage": null, "Rhubarb": null, "Romaine Lettuce": null, "Rutabaga": null, "Shallots": null, "Snow Peas": null, "Spinach": null, "Sprouts": null, "Squash": null, "Strawberries": null, "String Beans": null, "Sweet Potato": null, "Tangelo": null, "Tangerines": null, "Tomatillo": null, "Tomato": null, "Turnip": null, "Ugli Fruit": null, "Water Chestnuts": null, "Watercress": null, "Watermelon": null, "Waxed Beans": null, "Yams": null, "Yellow Squash": null, "Yuca/Cassava": null, "Zucchini Squash": null, }, limit: 3, }); });
function success() {
	 if(document.getElementById("name").value==="" || document.getElementById("qty").value==="") { 
            document.getElementById('button').disabled = true; 
            document.getElementById('cancel').disabled = true; 
        } else { 
            document.getElementById('button').disabled = false;
            document.getElementById('cancel').disabled = false;
        }
    }
        </script>
    </body>
</html>