<!DOCTYPE html>
<html>

<head><script async src="https://www.googletagmanager.com/gtag/js?id=G-S0PH6N0Z7E"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-S0PH6N0Z7E');
    </script>
	<title>Add an item | Smartlist</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
	</script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<style>
		.modal_bg {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.3);
			animation: modal .2s forwards;
			transition: all .2s;
			z-index: 999;
		}

		@keyframes modal {
			0% {
				transform: scale(2);
				opacity: 0;
			}
			100% {
				transform: scale(1);
				opacity: 1
			}
		}

		.modal_content {
			position: fixed;
			top: 50%;
			transition: all .2s;
			left: 50%;
			box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
			width: 80px;
			height: 80px;
			background: white;
			border-radius: 2px;
			padding: 15px;
			transform: translate(-50%, -50%)
		}
	</style>
</head>

<body onload='load()'>
	<div class="modal_bg" id="modal">
		<div class="modal_content">
			<div class="preloader-wrapper active">
				<div class="spinner-layer spinner-red-only">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
        <h5>Add an item</h5>
<form action="custom_room_adder.php?room=<?php echo $_GET['room']; ?>" method="post" name="form1">
<div class="input-field">
<label>Item name</label>
<input type="text" name="name" class="autocomplete" autocomplete='off' autofocus>
</div>
<div class="input-field">
<label>Quantity</label>
<input type="text" name="qty" class="form-control">
</div>
<input type="hidden" name="price" class="form-control" value="1">
<button type="submit" name="Submit" value="Add" class="waves-effect text-center btn btn-primary d-block m-auto purple darken-3">Create</button>
<a href="javascript:history.back()" class="text-center btn btn-info red">Back</a>
</form>
   <script>
      // The setTimeout is used for demo purposes only. Please remove this, as it will slow your page down!
      function load() {
        var e = document.getElementById("modal");
        e.style.animation = 'auto';
        setTimeout(function(){
          e.style.transform = 'scale(2)';
          e.style.opacity = '0';
          setTimeout(function(){
            e.style.display = 'none';
          }, 0200);
        }, 1000);
      } 
      $(document).ready(function() { $('input.autocomplete').autocomplete({ data: { "Apple": 'https://media.istockphoto.com/photos/red-apple-with-leaf-picture-id683494078?k=6&m=683494078&s=612x612&w=0&h=aVyDhOiTwUZI0NeF_ysdLZkSvDD4JxaJMdWSx2p3pp4=', "Banana": null, "Orange": null, "Coriander": null, "Kale": null, "Watermelon": null, "Mango": null, "Noodles": null, "Juice": null, "Dal": null, "Black beans": null, "Kidney beans": null, "Coconuts": null, "Dark Chocolate": null, "Bread": null, "Chocolate": null, "Yogurt": null, "Milk": null, "Cilantro": null, "Sooji fine": null, "Saaru powder": null, "Pineapple": null, "Almond": null, "Carrot": null, "Brocolli": null, "JavaScript": null, "Lisp": null, "Perl": null, "PHP": null, "Python": null, "Ruby": null, "Scala": null, "Scheme": null, "Apricot": null, "Artichoke": null, "Asian Pear": null, "Asparagus": null, "Atemoya": null, "Avocado": null, "Bamboo Shoots": null, "Bean Sprouts": null, "Beans": null, "Beets": null, "Belgian Endive": null, "Bell Peppers": null, "Bitter Melon": null, "Blackberries": null, "Blueberries": null, "Bok Choy": null, "Boniato": null, "Boysenberries": null, "Broccoflower": null, "Broccoli": null, "Brussels Sprouts": null, "Cabbage": null, "Cactus Pear": null, "Cantaloupe": null, "Carambola": null, "Carrots": null, "Casaba Melon": null, "Cauliflower": null, "Celery": null, "Chayote": null, "Cherimoya": null, "Cherries": null, "Collard Greens": null, "Corn": null, "Cranberries": null, "Cucumber": null, "Dates": null, "Dried Plums": null, "Eggplant": null, "Endive": null, "Escarole": null, "Feijoa": null, "Fennel": null, "Figs": null, "Garlic": null, "Gooseberries": null, "Grapefruit": null, "Grapes": null, "Green Beans": null, "Green Onions": null, "Greens": null, "Guava": null, "Hominy": null, "Honeydew Melon": null, "Horned Melon": null, "Iceberg Lettuce": null, "Jerusalem Artichoke": null, "Jicama": null, "Kiwifruit": null, "Kohlrabi": null, "Kumquat": null, "Leeks": null, "Lemons": null, "Lettuce": null, "Lima Beans": null, "Limes": null, "Longan": null, "Loquat": null, "Lychee": null, "Madarins": null, "Malanga": null, "Mandarin Oranges": null, "Mangos": null, "Mulberries": null, "Mushrooms": null, "Napa": null, "Nectarines": null, "Okra": null, "Onion": null, "Oranges": null, "Papayas": null, "Parsnip": null, "Passion Fruit": null, "Peaches": null, "Pears": null, "Peas": null, "Peppers": null, "Persimmons": null, "Plantains": null, "Plums": null, "Pomegranate": null, "Potatoes": null, "Prickly Pear": null, "Prunes": null, "Pummelo": null, "Pumpkin": null, "Quince": null, "Radicchio": null, "Radishes": null, "Raisins": null, "Raspberries": null, "Red Cabbage": null, "Rhubarb": null, "Romaine Lettuce": null, "Rutabaga": null, "Shallots": null, "Snow Peas": null, "Spinach": null, "Sprouts": null, "Squash": null, "Strawberries": null, "String Beans": null, "Sweet Potato": null, "Tangelo": null, "Tangerines": null, "Tomatillo": null, "Tomato": null, "Turnip": null, "Ugli Fruit": null, "Water Chestnuts": null, "Watercress": null, "Waxed Beans": null, "Yams": null, "Yellow Squash": null, "Yuca/Cassava": null, "Zucchini Squash": null, "Buffet": null, "Chairs": null, "Lamps": null, "Rugs": null, "Table": null, "Curtains": null, "Draperies": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "China": null, "Crystal": null, "Linens": null, "Silver ": null, "Flatware": null, "Paintings ": null, "Appliances ": null, "Cabinets and Contents ": null, "Wall Shelving": null, "China Cabinet": null, "Stove/Oven": null, "Refrigerator": null, "Dishwasher": null, "Table": null, "Chairs": null, "Cabinets and Contents ": null, "Utensils": null, "Cutlery": null, "Dishes ": null, "Glassware": null, "Freezer": null, "Microwave": null, "Rotisserie": null, "Food Processor": null, "Mixer": null, "Blender": null, "Radio": null, "Clock": null, "Television": null, "Ceiling Fan": null, "Cookbooks": null, "Crystal": null, "Foods": null, "Garbage Disposal": null, "Linens": null, "Liquors": null, "Pots and Pans": null, "Small Appliances": null, "Telephone": null, "Washer": null, "Dryer": null, "Ironing Board": null, "Iron": null, "Cabinets and Contents ": null, "Closet Contents ": null, "Bookcases": null, "Books": null, "Cabinets and Contents ": null, "Compact Discs ": null, "Ceiling Fan": null, "Chairs": null, "Clocks": null, "Closet Contents ": null, "Computer": null, "Couches": null, "Desk": null, "Drapes": null, "Curtains": null, "Window Hardware": null, "Electronic Games ": null, "Entertainment Centre": null, "Fireplace Equipment ": null, "Games/Toys ": null, "Hobby Equipment ": null, "Lamps": null, "Piano": null, "Pictures": null, "Rugs": null, "Tables": null, "Telephone": null, "Television": null, "VCR": null, "DVDs ": null, "DVD Player": null, "Tapes ": null, "Wall Shelving": null, "Window Air Conditioner": null, "Whirlpool": null, "Cabinets and Contents ": null, "Hamper": null, "Linens": null, "Hair Dryer": null, "Scale": null, "Shower Curtain": null, "Rugs": null, "Electric Razors": null, "Mirrors": null, "Appliances ": null, "Medications ": null, "Whirlpool": null, "Cabinets and Contents ": null, "Hamper": null, "Linens": null, "Hair Dryer": null, "Scale": null, "Shower Curtain": null, "Rugs": null, "Electric Razors": null, "Mirrors": null, "Appliances ": null, "Medications ": null, "Whirlpool": null, "Cabinets and Contents ": null, "Hamper": null, "Linens": null, "Hair Dryer": null, "Scale": null, "Shower Curtain": null, "Rugs": null, "Electric Razors": null, "Mirrors": null, "Appliances ": null, "Medications ": null, "Humidifier": null, "Rugs": null, "Mirrors": null, "Paintings ": null, "Pictures ": null, "Chairs": null, "Furniture ": null, "Bed": null, "Mattress/Box Spring": null, "Bedding": null, "Chairs": null, "Dressers": null, "Rugs": null, "Tables": null, "Curtains": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "Radios": null, "Linens": null, "Desk": null, "Nightstands": null, "Lamps": null, "Paintings ": null, "Window Air Conditioner": null, "Television": null, "VCR": null, "DVD Player": null, "Cabinets and Contents ": null, "Games/Toys ": null, "Men’s Clothing ": null, "Women’s Clothing ": null, "Children’s Clothing ": null, "Shoes ": null, "Handbags ": null, "Bed": null, "Mattress/Box Spring": null, "Bedding": null, "Chairs": null, "Dressers": null, "Rugs": null, "Tables": null, "Curtains": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "Radios": null, "Linens": null, "Desk": null, "Nightstands": null, "Lamps": null, "Paintings ": null, "Window Air Conditioner": null, "Television": null, "VCR": null, "DVD Player": null, "Cabinets and Contents ": null, "Games/Toys ": null, "Men’s Clothing ": null, "Women’s Clothing ": null, "Children’s Clothing ": null, "Shoes ": null, "Handbags ": null, "Bed": null, "Mattress/Box Spring": null, "Bedding": null, "Chairs": null, "Dressers": null, "Rugs": null, "Tables": null, "Curtains": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "Radios": null, "Linens": null, "Desk": null, "Nightstands": null, "Lamps": null, "Paintings ": null, "Window Air Conditioner": null, "Television": null, "VCR": null, "DVD Player": null, "Cabinets and Contents ": null, "Games/Toys ": null, "Men’s Clothing ": null, "Women’s Clothing ": null, "Children’s Clothing ": null, "Shoes ": null, "Handbags ": null, "Bed": null, "Mattress/Box Spring": null, "Bedding": null, "Chairs": null, "Dressers": null, "Rugs": null, "Tables": null, "Curtains": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "Radios": null, "Linens": null, "Desk": null, "Nightstands": null, "Lamps": null, "Paintings ": null, "Window Air Conditioner": null, "Television": null, "VCR": null, "DVD Player": null, "Cabinets and Contents ": null, "Games/Toys ": null, "Men’s Clothing ": null, "Women’s Clothing ": null, "Children’s Clothing ": null, "Shoes ": null, "Handbags ": null, "Bed": null, "Mattress/Box Spring": null, "Bedding": null, "Chairs": null, "Dressers": null, "Rugs": null, "Tables": null, "Curtains": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "Radios": null, "Linens": null, "Desk": null, "Nightstands": null, "Lamps": null, "Paintings ": null, "Window Air Conditioner": null, "Television": null, "VCR": null, "DVD Player": null, "Cabinets and Contents ": null, "Games/Toys ": null, "Men’s Clothing ": null, "Women’s Clothing ": null, "Children’s Clothing ": null, "Shoes ": null, "Handbags ": null, "Lawn mower": null, "Snow Blower": null, "Ladders": null, "Barbeque/Grill": null, "Chairs": null, "Dehumidifier": null, "Luggage": null, "Hand Tools ": null, "Workbench": null, "Heating Unit": null, "Freezer": null, "Vacuum Cleaner": null, "Auto Equipment ": null, "Bicycles": null, "Garden Furniture": null, "Garden Tools": null, "Lawn Furniture": null, "Power Tools ": null, "Rugs": null, "Sports Equipment ": null, "Storage Shelving": null, "Furniture": null, "Trunks": null, "Cameras": null, "Golf Equipment": null, "Ski Equipment": null, "Boating Equipment": null, "Paint Set": null, "Pool Table": null, "Exercise Equipment": null, "Hunting Equipment": null, "Fishing Equipment": null, "Stamp Collection": null, "Carving Set": null, "Sewing Machine": null, "Bowling Equipment": null, "Camping Equipment": null, "Games": null, "Ice Skating Equipment": null, "Tennis Equipment": null, "Home Computer": null, "Modem": null, "Hard Drive": null, "Scanner": null, "Printer": null, "Fax Machine": null, "Antiques": null, "Bracelets": null, "Brooches": null, "Central Air Conditioning Unit": null, "Central Heating Unit": null, "Earrings": null, "Fine Art": null, "Furs": null, "Hobby Collections": null, "Necklaces": null, "Other Jewellery": null, "Rings": null, "Watches": null, "Sculptures": null, "Handbags": null,}, limit: 3, }); });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
