var brandlogotext = document.getElementById("brandlogo");
$(document).ready(function() {
    $('input.autocomplete').autocomplete({
        onAutocomplete: function() {nav_title('Search Results');w_title('Search Results');changeValue();sm_page('searchresults',this, '');},
        data: {"Apple": 'https://media.istockphoto.com/photos/red-apple-with-leaf-picture-id683494078?k=6&m=683494078&s=612x612&w=0&h=aVyDhOiTwUZI0NeF_ysdLZkSvDD4JxaJMdWSx2p3pp4=', "Banana": null, "Orange": null, "Coriander": null, "Kale": null, "Watermelon": null, "Mango": null, "Noodles": null, "Juice": null, "Dal": null, "Black beans": null, "Kidney beans": null, "Coconuts": null, "Dark Chocolate": null, "Bread": null, "Chocolate": null, "Yogurt": null, "Milk": null, "Cilantro": null, "Sooji fine": null, "Saaru powder": null, "Pineapple": null, "Almond": null, "Carrot": null, "Brocolli": null, "JavaScript": null, "Lisp": null, "Perl": null, "PHP": null, "Python": null, "Ruby": null, "Scala": null, "Scheme": null, "Apricot": null, "Artichoke": null, "Asian Pear": null, "Asparagus": null, "Atemoya": null, "Avocado": null, "Bamboo Shoots": null, "Bean Sprouts": null, "Beans": null, "Beets": null, "Belgian Endive": null, "Bell Peppers": null, "Bitter Melon": null, "Blackberries": null, "Blueberries": null, "Bok Choy": null, "Boniato": null, "Boysenberries": null, "Broccoflower": null, "Broccoli": null, "Brussels Sprouts": null, "Cabbage": null, "Cactus Pear": null, "Cantaloupe": null, "Carambola": null, "Carrots": null, "Casaba Melon": null, "Cauliflower": null, "Celery": null, "Chayote": null, "Cherimoya": null, "Cherries": null, "Collard Greens": null, "Corn": null, "Cranberries": null, "Cucumber": null, "Dates": null, "Dried Plums": null, "Eggplant": null, "Endive": null, "Escarole": null, "Feijoa": null, "Fennel": null, "Figs": null, "Garlic": null, "Gooseberries": null, "Grapefruit": null, "Grapes": null, "Green Beans": null, "Green Onions": null, "Greens": null, "Guava": null, "Hominy": null, "Honeydew Melon": null, "Horned Melon": null, "Iceberg Lettuce": null, "Jerusalem Artichoke": null, "Jicama": null, "Kiwifruit": null, "Kohlrabi": null, "Kumquat": null, "Leeks": null, "Lemons": null, "Lettuce": null, "Lima Beans": null, "Limes": null, "Longan": null, "Loquat": null, "Lychee": null, "Madarins": null, "Malanga": null, "Mandarin Oranges": null, "Mangos": null, "Mulberries": null, "Mushrooms": null, "Napa": null, "Nectarines": null, "Okra": null, "Onion": null, "Oranges": null, "Papayas": null, "Parsnip": null, "Passion Fruit": null, "Peaches": null, "Pears": null, "Peas": null, "Peppers": null, "Persimmons": null, "Plantains": null, "Plums": null, "Pomegranate": null, "Potatoes": null, "Prickly Pear": null, "Prunes": null, "Pummelo": null, "Pumpkin": null, "Quince": null, "Radicchio": null, "Radishes": null, "Raisins": null, "Raspberries": null, "Red Cabbage": null, "Rhubarb": null, "Romaine Lettuce": null, "Rutabaga": null, "Shallots": null, "Snow Peas": null, "Spinach": null, "Sprouts": null, "Squash": null, "Strawberries": null, "String Beans": null, "Sweet Potato": null, "Tangelo": null, "Tangerines": null, "Tomatillo": null, "Tomato": null, "Turnip": null, "Ugli Fruit": null, "Water Chestnuts": null, "Watercress": null, "Waxed Beans": null, "Yams": null, "Yellow Squash": null, "Yuca/Cassava": null, "Zucchini Squash": null,},
        limit: 3,
    });
    $('.modal').modal({onCloseStart: function() {w_title('Dashboard')}});
    $('.sidenav').sidenav();
    $('.collapsible').collapsible();
    $('#fab').floatingActionButton();
    $('#modal').modal();
    $('.dropdown-trigger').dropdown();
    $('.tooltipped').tooltip({transitionMovement: 5});
    $('body').on('contextmenu', '', function() { document.getElementById("rmenu").className = "show"; document.getElementById("rmenu").style.top = mouseY(event) + 'px'; document.getElementById("rmenu").style.left = mouseX(event) + 'px'; window.event.returnValue = false; });
    $('.materialboxed').materialbox();
    $('.sidenav').sidenav().on('click tap', 'li a:not(.collapsible-header)', () => {if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) { $('.sidenav').sidenav('close'); }});
    if (window.localStorage.getItem('accept_cookies')) {
        $('#hide_notification').hide();
    }
    $("#notification").click(function() {
        window.localStorage.setItem('accept_cookies', true);
        $('#hide_notification').hide();
    });
});
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("FLOATING_ACTION_BUTTON").style.transform = "scale(1)";
    } else {
        document.getElementById("FLOATING_ACTION_BUTTON").style.transform = "scale(0)";
    }
    prevScrollpos = currentScrollPos;
};
var smartlist_page_names = [];

function sm_page(pageName, elmnt, color) {
    document.getElementById("searchbar").style.display = "none";
    document.getElementById('editfab').style.display = 'none';
    document.body.style.overflow = '';
    document.getElementById('edit_nav').style.display='none';
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    document.getElementById(pageName).style.display = "block";
    $(pageName).scrollTop(0);
    window.scrollTo(0, 0);
    document.getElementById("secondary_nav").style.display = "none";
    smartlist_page_names.push(pageName);
}
document.getElementById("defaultOpen").click();

function filter() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
var metaThemeColor;
const toggleSwitch = document.querySelector('#darkmode');
const currentTheme = localStorage.getItem('theme');
if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);
    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
        metaThemeColor = document.querySelector("meta[name=theme-color]");
        metaThemeColor.setAttribute("content", "#191918");
        document.getElementById("imageid").src = "https://www.whatswithtech.com/wp-content/uploads/2015/09/black-and-blue-material-design-wallpaper.png";
    }
}

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
        metaThemeColor = document.querySelector("meta[name=theme-color]");
        metaThemeColor.setAttribute("content", "#191918");
        document.getElementById("imageid").src = "https://www.whatswithtech.com/wp-content/uploads/2015/09/black-and-blue-material-design-wallpaper.png";
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
        metaThemeColor = document.querySelector("meta[name=theme-color]");
        metaThemeColor.setAttribute("content", "#2a1782");
    }
}
toggleSwitch.addEventListener('change', switchTheme, false);
function toast(name, qty) {
    M.toast({html: "Deleted \"" + name + '" <a class="btn-flat toast-action waves-effect waves-orange text-white" style="color: white !important" href="https://smartlist.ga/dashboard/exe.php?name=' + encodeURI(name) + '&qty=' + qty + '&price=1">Undo</a>'});
}
function changeValue() {
    document.getElementById("sr").innerHTML = document.getElementById("search").value;
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function desktop_ping(theBody, theTitle) {
    var dts = Math.floor(Date.now());
    if (!('Notification' in window)) {
        var options = {
            body: theBody,
            icon: 'https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png',
            timestamp: dts,
        };
        var n = new Notification(theTitle, options);
        n.onclick = function() {
            event.preventDefault();
            window.focus();
            sm_page('notification_popup', '', '')
        };
        document.addEventListener('visibilitychange', function() {
            if (document.visibilityState === 'visible') {
                n.close();
            }
        });
        syncalertplayAudio();
    }
}

$(window).bind('keydown', function(event) {
    if (event.ctrlKey || event.metaKey) {
        switch (String.fromCharCode(event.which).toLowerCase()) {
            case 'f':
                event.preventDefault();
                showsearch();
                document.getElementById('search').focus();
                break;
            case 'd':
                event.preventDefault();
                $('.modal').modal('close');
                $('#key').modal('open');
                w_title('Keyboard Shortcuts');
                break;
            case 'e':
                event.preventDefault();
                $('.modal').modal('close');
                sm_page('modal1', this, '');
                brandlogotext.innerHTML = 'Settings';
                w_title('Settings');
                nav_title('Settings');
                break;
            case 'b':
                event.preventDefault();
                $('.modal').modal('close');
                w_title('Budget Meter');
                nav_title('Budget Meter');
                sm_page('budgetmetermodal', this, '');
                break;
            case 's':
                event.preventDefault();
                $('.modal').modal('close');
                $('#budgetmetermodala').modal('open');
                w_title('Add an item');
                break;
        }
    }
});

function load_croom(data, name) {
    document.getElementById('custom_room').innerHTML = '<center><br><br><br><svg class=\'circular\' height=\'50\' width=\'50\'> <circle class=\'path\' cx=\'25\' cy=\'25\' r=\'20\' fill=\'none\' stroke-width=\'3\' stroke-miterlimit=\'10\' /> </svg><br></center>';
    $('#custom_room').load('https://smartlist.ga/dashboard/rooms/ajax_croom_loader.php?room=' + encodeURI(data));
    sm_page('custom_room', this, '');
    brandlogotext.innerHTML = name;
}
window.onerror = function(msg, url, linenumber) {
    alert('Error message: ' + msg + '\nURL: ' + url + '\nLine Number: ' + linenumber);
    return true;
}

function w_title(data) {
    document.title = data + " | Smartlist";
}

function task_complete() {
    var x = document.getElementById("task_complete");
    x.play();
}
var syncalertx = document.getElementById("syncalert");

function syncalertplayAudio() {
    syncalertx.play();
}

function notifyMe() {
    if (!("Notification" in window)) {
        M.toast({
            html: 'Your current browser doesn\'t support notifications. We reccomend using Chrome for the best experience'
        });
    } else if (Notification.permission === "granted") {} else if (Notification.permission !== "denied") {
        Notification.requestPermission().then(function(permission) {
            if (permission === "granted") {}
        });
    }
}

function request_notification() {
    if (!("Notification" in window)) {
        M.toast({
            html: 'Your current browser doesn\'t support notifications. We reccomend using Chrome for the best experience'
        });
    } else if (Notification.permission === "granted") {} else if (Notification.permission !== "denied") {
        Notification.requestPermission().then(function(permission) {
            if (permission === "granted") {
                /*var notification = new Notification("Nice! Notifications are enabled!");*/ }
        });
    }
}
var map = {};
onkeydown = onkeyup = function(e) {
    e = e || event;
    map[e.keyCode] = e.type == 'keydown';
    if (map["191"] == true) {
        e.preventDefault();
        showsearch();
        document.getElementById('search').focus();
    }
}
Pusher.logToConsole = false;
var pusher = new Pusher('70e2355e418d35261aca', {
    cluster: 'us3'
});
var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    var notification = new Notification("" + data);
});
$(document).ready(function() { $('input.autocomplete1').autocomplete({ data: { "Apple": null, "Banana": null, "Orange": null, "Coriander": null, "Kale": null, "Watermelon": null, "Mango": null, "Noodles": null, "Juice": null, "Dal": null, "Black beans": null, "Kidney beans": null, "Coconuts": null, "Dark Chocolate": null, "Bread": null, "Chocolate": null, "Yogurt": null, "Milk": null, "Cilantro": null, "Sooji fine": null, "Saaru powder": null, "Pineapple": null, "Almond": null, "Carrot": null, "Brocolli": null, "JavaScript": null, "Lisp": null, "Perl": null, "PHP": null, "Python": null, "Ruby": null, "Scala": null, "Scheme": null, "Apricot": null, "Artichoke": null, "Asian Pear": null, "Asparagus": null, "Atemoya": null, "Avocado": null, "Bamboo Shoots": null, "Bean Sprouts": null, "Beans": null, "Beets": null, "Belgian Endive": null, "Bell Peppers": null, "Bitter Melon": null, "Blackberries": null, "Blueberries": null, "Bok Choy": null, "Boniato": null, "Boysenberries": null, "Broccoflower": null, "Broccoli": null, "Brussels Sprouts": null, "Cabbage": null, "Cactus Pear": null, "Cantaloupe": null, "Carambola": null, "Carrots": null, "Casaba Melon": null, "Cauliflower": null, "Celery": null, "Chayote": null, "Cherimoya": null, "Cherries": null, "Collard Greens": null, "Corn": null, "Cranberries": null, "Cucumber": null, "Dates": null, "Dried Plums": null, "Eggplant": null, "Endive": null, "Escarole": null, "Feijoa": null, "Fennel": null, "Figs": null, "Garlic": null, "Gooseberries": null, "Grapefruit": null, "Grapes": null, "Green Beans": null, "Green Onions": null, "Greens": null, "Guava": null, "Hominy": null, "Honeydew Melon": null, "Horned Melon": null, "Iceberg Lettuce": null, "Jerusalem Artichoke": null, "Jicama": null, "Kiwifruit": null, "Kohlrabi": null, "Kumquat": null, "Leeks": null, "Lemons": null, "Lettuce": null, "Lima Beans": null, "Limes": null, "Longan": null, "Loquat": null, "Lychee": null, "Madarins": null, "Malanga": null, "Mandarin Oranges": null, "Mangos": null, "Mulberries": null, "Mushrooms": null, "Napa": null, "Nectarines": null, "Okra": null, "Onion": null, "Oranges": null, "Papayas": null, "Parsnip": null, "Passion Fruit": null, "Peaches": null, "Pears": null, "Peas": null, "Peppers": null, "Persimmons": null, "Plantains": null, "Plums": null, "Pomegranate": null, "Potatoes": null, "Prickly Pear": null, "Prunes": null, "Pummelo": null, "Pumpkin": null, "Quince": null, "Radicchio": null, "Radishes": null, "Raisins": null, "Raspberries": null, "Red Cabbage": null, "Rhubarb": null, "Romaine Lettuce": null, "Rutabaga": null, "Shallots": null, "Snow Peas": null, "Spinach": null, "Sprouts": null, "Squash": null, "Strawberries": null, "String Beans": null, "Sweet Potato": null, "Tangelo": null, "Tangerines": null, "Tomatillo": null, "Tomato": null, "Turnip": null, "Ugli Fruit": null, "Water Chestnuts": null, "Watercress": null, "Waxed Beans": null, "Yams": null, "Yellow Squash": null, "Yuca/Cassava": null, "Zucchini Squash": null, "Buffet": null, "Chairs": null, "Lamps": null, "Rugs": null, "Table": null, "Curtains": null, "Draperies": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "China": null, "Crystal": null, "Linens": null, "Silver ": null, "Flatware": null, "Paintings ": null, "Appliances ": null, "Cabinets and Contents ": null, "Wall Shelving": null, "China Cabinet": null, "Stove/Oven": null, "Refrigerator": null, "Dishwasher": null, "Table": null, "Chairs": null, "Cabinets and Contents ": null, "Utensils": null, "Cutlery": null, "Dishes ": null, "Glassware": null, "Freezer": null, "Microwave": null, "Rotisserie": null, "Food Processor": null, "Mixer": null, "Blender": null, "Radio": null, "Clock": null, "Television": null, "Ceiling Fan": null, "Cookbooks": null, "Crystal": null, "Foods": null, "Garbage Disposal": null, "Linens": null, "Liquors": null, "Pots and Pans": null, "Small Appliances": null, "Telephone": null, "Washer": null, "Dryer": null, "Ironing Board": null, "Iron": null, "Cabinets and Contents ": null, "Closet Contents ": null, "Bookcases": null, "Books": null, "Cabinets and Contents ": null, "Compact Discs ": null, "Ceiling Fan": null, "Chairs": null, "Clocks": null, "Closet Contents ": null, "Computer": null, "Couches": null, "Desk": null, "Drapes": null, "Curtains": null, "Window Hardware": null, "Electronic Games ": null, "Entertainment Centre": null, "Fireplace Equipment ": null, "Games/Toys ": null, "Hobby Equipment ": null, "Lamps": null, "Piano": null, "Pictures": null, "Rugs": null, "Tables": null, "Telephone": null, "Television": null, "VCR": null, "DVDs ": null, "DVD Player": null, "Tapes ": null, "Wall Shelving": null, "Window Air Conditioner": null, "Whirlpool": null, "Cabinets and Contents ": null, "Hamper": null, "Linens": null, "Hair Dryer": null, "Scale": null, "Shower Curtain": null, "Rugs": null, "Electric Razors": null, "Mirrors": null, "Appliances ": null, "Medications ": null, "Whirlpool": null, "Cabinets and Contents ": null, "Hamper": null, "Linens": null, "Hair Dryer": null, "Scale": null, "Shower Curtain": null, "Rugs": null, "Electric Razors": null, "Mirrors": null, "Appliances ": null, "Medications ": null, "Whirlpool": null, "Cabinets and Contents ": null, "Hamper": null, "Linens": null, "Hair Dryer": null, "Scale": null, "Shower Curtain": null, "Rugs": null, "Electric Razors": null, "Mirrors": null, "Appliances ": null, "Medications ": null, "Humidifier": null, "Rugs": null, "Mirrors": null, "Paintings ": null, "Pictures ": null, "Chairs": null, "Furniture ": null, "Bed": null, "Mattress/Box Spring": null, "Bedding": null, "Chairs": null, "Dressers": null, "Rugs": null, "Tables": null, "Curtains": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "Radios": null, "Linens": null, "Desk": null, "Nightstands": null, "Lamps": null, "Paintings ": null, "Window Air Conditioner": null, "Television": null, "VCR": null, "DVD Player": null, "Cabinets and Contents ": null, "Games/Toys ": null, "Men’s Clothing ": null, "Women’s Clothing ": null, "Children’s Clothing ": null, "Shoes ": null, "Handbags ": null, "Bed": null, "Mattress/Box Spring": null, "Bedding": null, "Chairs": null, "Dressers": null, "Rugs": null, "Tables": null, "Curtains": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "Radios": null, "Linens": null, "Desk": null, "Nightstands": null, "Lamps": null, "Paintings ": null, "Window Air Conditioner": null, "Television": null, "VCR": null, "DVD Player": null, "Cabinets and Contents ": null, "Games/Toys ": null, "Men’s Clothing ": null, "Women’s Clothing ": null, "Children’s Clothing ": null, "Shoes ": null, "Handbags ": null, "Bed": null, "Mattress/Box Spring": null, "Bedding": null, "Chairs": null, "Dressers": null, "Rugs": null, "Tables": null, "Curtains": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "Radios": null, "Linens": null, "Desk": null, "Nightstands": null, "Lamps": null, "Paintings ": null, "Window Air Conditioner": null, "Television": null, "VCR": null, "DVD Player": null, "Cabinets and Contents ": null, "Games/Toys ": null, "Men’s Clothing ": null, "Women’s Clothing ": null, "Children’s Clothing ": null, "Shoes ": null, "Handbags ": null, "Bed": null, "Mattress/Box Spring": null, "Bedding": null, "Chairs": null, "Dressers": null, "Rugs": null, "Tables": null, "Curtains": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "Radios": null, "Linens": null, "Desk": null, "Nightstands": null, "Lamps": null, "Paintings ": null, "Window Air Conditioner": null, "Television": null, "VCR": null, "DVD Player": null, "Cabinets and Contents ": null, "Games/Toys ": null, "Men’s Clothing ": null, "Women’s Clothing ": null, "Children’s Clothing ": null, "Shoes ": null, "Handbags ": null, "Bed": null, "Mattress/Box Spring": null, "Bedding": null, "Chairs": null, "Dressers": null, "Rugs": null, "Tables": null, "Curtains": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "Radios": null, "Linens": null, "Desk": null, "Nightstands": null, "Lamps": null, "Paintings ": null, "Window Air Conditioner": null, "Television": null, "VCR": null, "DVD Player": null, "Cabinets and Contents ": null, "Games/Toys ": null, "Men’s Clothing ": null, "Women’s Clothing ": null, "Children’s Clothing ": null, "Shoes ": null, "Handbags ": null, "Lawn mower": null, "Snow Blower": null, "Ladders": null, "Barbeque/Grill": null, "Chairs": null, "Dehumidifier": null, "Luggage": null, "Hand Tools ": null, "Workbench": null, "Heating Unit": null, "Freezer": null, "Vacuum Cleaner": null, "Auto Equipment ": null, "Bicycles": null, "Garden Furniture": null, "Garden Tools": null, "Lawn Furniture": null, "Power Tools ": null, "Rugs": null, "Sports Equipment ": null, "Storage Shelving": null, "Furniture": null, "Trunks": null, "Cameras": null, "Golf Equipment": null, "Ski Equipment": null, "Boating Equipment": null, "Paint Set": null, "Pool Table": null, "Exercise Equipment": null, "Hunting Equipment": null, "Fishing Equipment": null, "Stamp Collection": null, "Carving Set": null, "Sewing Machine": null, "Bowling Equipment": null, "Camping Equipment": null, "Games": null, "Ice Skating Equipment": null, "Tennis Equipment": null, "Home Computer": null, "Modem": null, "Hard Drive": null, "Scanner": null, "Printer": null, "Fax Machine": null, "Antiques": null, "Bracelets": null, "Brooches": null, "Central Air Conditioning Unit": null, "Central Heating Unit": null, "Earrings": null, "Fine Art": null, "Furs": null, "Hobby Collections": null, "Necklaces": null, "Other Jewellery": null, "Rings": null, "Watches": null, "Sculptures": null, "Handbags": null,}, limit: 6, }); });