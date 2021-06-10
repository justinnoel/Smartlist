var item_state, item_p, editPopupRoom, editPopupRoom1;
var page_title = 'News';
var autocompleteData = {
    "Apple": null,
    "Banana": null,
    "Orange": null,
    "Coriander": null,
    "Kale": null,
    "Watermelon": null,
    "Mango": null,
    "Noodles": null,
    "Juice": null,
    "Dal": null,
    "Black beans": null,
    "Kidney beans": null,
    "Coconuts": null,
    "Dark Chocolate": null,
    "Bread": null,
    "Chocolate": null,
    "Yogurt": null,
    "Milk": null,
    "Cilantro": null,
    "Sooji fine": null,
    "Saaru powder": null,
    "Pineapple": null,
    "Almond": null,
    "Carrot": null,
    "Brocolli": null,
    "JavaScript": null,
    "Lisp": null,
    "Perl": null,
    "PHP": null,
    "Python": null,
    "Ruby": null,
    "Scala": null,
    "Scheme": null,
    "Apricot": null,
    "Artichoke": null,
    "Asian Pear": null,
    "Asparagus": null,
    "Atemoya": null,
    "Avocado": null,
    "Bamboo Shoots": null,
    "Bean Sprouts": null,
    "Beans": null,
    "Beets": null,
    "Belgian Endive": null,
    "Bell Peppers": null,
    "Bitter Melon": null,
    "Blackberries": null,
    "Blueberries": null,
    "Bok Choy": null,
    "Boniato": null,
    "Boysenberries": null,
    "Broccoflower": null,
    "Broccoli": null,
    "Brussels Sprouts": null,
    "Cabbage": null,
    "Cactus Pear": null,
    "Cantaloupe": null,
    "Carambola": null,
    "Carrots": null,
    "Casaba Melon": null,
    "Cauliflower": null,
    "Celery": null,
    "Chayote": null,
    "Cherimoya": null,
    "Cherries": null,
    "Collard Greens": null,
    "Corn": null,
    "Cranberries": null,
    "Cucumber": null,
    "Dates": null,
    "Dried Plums": null,
    "Eggplant": null,
    "Endive": null,
    "Escarole": null,
    "Feijoa": null,
    "Fennel": null,
    "Figs": null,
    "Garlic": null,
    "Gooseberries": null,
    "Grapefruit": null,
    "Grapes": null,
    "Green Beans": null,
    "Green Onions": null,
    "Greens": null,
    "Guava": null,
    "Hominy": null,
    "Honeydew Melon": null,
    "Horned Melon": null,
    "Iceberg Lettuce": null,
    "Jerusalem Artichoke": null,
    "Jicama": null,
    "Kiwifruit": null,
    "Kohlrabi": null,
    "Kumquat": null,
    "Leeks": null,
    "Lemons": null,
    "Lettuce": null,
    "Lima Beans": null,
    "Limes": null,
    "Longan": null,
    "Loquat": null,
    "Lychee": null,
    "Madarins": null,
    "Malanga": null,
    "Mandarin Oranges": null,
    "Mangos": null,
    "Mulberries": null,
    "Mushrooms": null,
    "Napa": null,
    "Nectarines": null,
    "Okra": null,
    "Onion": null,
    "Oranges": null,
    "Papayas": null,
    "Parsnip": null,
    "Passion Fruit": null,
    "Peaches": null,
    "Pears": null,
    "Peas": null,
    "Peppers": null,
    "Persimmons": null,
    "Plantains": null,
    "Plums": null,
    "Pomegranate": null,
    "Potatoes": null,
    "Prickly Pear": null,
    "Prunes": null,
    "Pummelo": null,
    "Pumpkin": null,
    "Quince": null,
    "Radicchio": null,
    "Radishes": null,
    "Raisins": null,
    "Raspberries": null,
    "Red Cabbage": null,
    "Rhubarb": null,
    "Romaine Lettuce": null,
    "Rutabaga": null,
    "Shallots": null,
    "Snow Peas": null,
    "Spinach": null,
    "Sprouts": null,
    "Squash": null,
    "Strawberries": null,
    "String Beans": null,
    "Sweet Potato": null,
    "Tangelo": null,
    "Tangerines": null,
    "Tomatillo": null,
    "Tomato": null,
    "Turnip": null,
    "Ugli Fruit": null,
    "Water Chestnuts": null,
    "Watercress": null,
    "Waxed Beans": null,
    "Yams": null,
    "Yellow Squash": null,
    "Yuca/Cassava": null,
    "Zucchini Squash": null,
    "Buffet": null,
    "Chairs": null,
    "Lamps": null,
    "Rugs": null,
    "Table": null,
    "Curtains": null,
    "Draperies": null,
    "Window Hardware": null,
    "Mirrors": null,
    "Clocks": null,
    "China": null,
    "Crystal": null,
    "Linens": null,
    "Silver ": null,
    "Flatware": null,
    "Paintings ": null,
    "Appliances ": null,
    "Cabinets and Contents ": null,
    "Wall Shelving": null,
    "China Cabinet": null,
    "Stove/Oven": null,
    "Refrigerator": null,
    "Dishwasher": null,
    "Utensils": null,
    "Cutlery": null,
    "Dishes ": null,
    "Glassware": null,
    "Freezer": null,
    "Microwave": null,
    "Rotisserie": null,
    "Food Processor": null,
    "Mixer": null,
    "Blender": null,
    "Radio": null,
    "Clock": null,
    "Television": null,
    "Ceiling Fan": null,
    "Cookbooks": null,
    "Foods": null,
    "Garbage Disposal": null,
    "Liquors": null,
    "Pots and Pans": null,
    "Small Appliances": null,
    "Telephone": null,
    "Washer": null,
    "Dryer": null,
    "Ironing Board": null,
    "Iron": null,
    "Closet Contents ": null,
    "Bookcases": null,
    "Books": null,
    "Compact Discs ": null,
    "Computer": null,
    "Couches": null,
    "Desk": null,
    "Drapes": null,
    "Electronic Games ": null,
    "Entertainment Centre": null,
    "Fireplace Equipment ": null,
    "Games/Toys ": null,
    "Hobby Equipment ": null,
    "Piano": null,
    "Pictures": null,
    "Tables": null,
    "VCR": null,
    "DVDs ": null,
    "DVD Player": null,
    "Tapes ": null,
    "Window Air Conditioner": null,
    "Whirlpool": null,
    "Hamper": null,
    "Hair Dryer": null,
    "Scale": null,
    "Shower Curtain": null,
    "Electric Razors": null,
    "Medications ": null,
    "Humidifier": null,
    "Pictures ": null,
    "Furniture ": null,
    "Bed": null,
    "Mattress/Box Spring": null,
    "Bedding": null,
    "Dressers": null,
    "Radios": null,
    "Nightstands": null,
    "Men’s Clothing ": null,
    "Women’s Clothing ": null,
    "Children’s Clothing ": null,
    "Shoes ": null,
    "Handbags ": null,
    "Vacuum Cleaner": null,
    "Auto Equipment ": null,
    "Bicycles": null,
    "Garden Furniture": null,
    "Garden Tools": null,
    "Lawn Furniture": null,
    "Power Tools ": null,
    "Sports Equipment ": null,
    "Storage Shelving": null,
    "Furniture": null,
    "Trunks": null,
    "Cameras": null,
    "Golf Equipment": null,
    "Ski Equipment": null,
    "Boating Equipment": null,
    "Paint Set": null,
    "Pool Table": null,
    "Exercise Equipment": null,
    "Hunting Equipment": null,
    "Fishing Equipment": null,
    "Stamp Collection": null,
    "Carving Set": null,
    "Sewing Machine": null,
    "Bowling Equipment": null,
    "Camping Equipment": null,
    "Games": null,
    "Ice Skating Equipment": null,
    "Tennis Equipment": null,
    "Home Computer": null,
    "Modem": null,
    "Hard Drive": null,
    "Scanner": null,
    "Printer": null,
    "Fax Machine": null,
    "Antiques": null,
    "Bracelets": null,
    "Brooches": null,
    "Central Air Conditioning Unit": null,
    "Central Heating Unit": null,
    "Earrings": null,
    "Fine Art": null,
    "Furs": null,
    "Hobby Collections": null,
    "Necklaces": null,
    "Other Jewellery": null,
    "Rings": null,
    "Watches": null,
    "Sculptures": null,
    "Handbags": null,
};
var form = document.getElementById("feedback-form");
async function handleSubmit(event) {
    event.preventDefault();
    var status = document.getElementById("my-form-status");
    var data = new FormData(event.target);
    fetch(event.target.action, {
        method: form.method,
        body: data,
        headers: {
            'Accept': 'application/json'
        }
    }).then(response => {
        M.toast({
            html: "Thanks for your submission!"
        });
        $('#_feedback').modal('close');
        form.reset();
    }).catch(error => {
        status.innerHTML = "Oops! There was a problem submitting your form";
    });
}
form.addEventListener("submit", handleSubmit);

function edit_popup(id, name, qty, price, room) {
    sm_page('edit_page', '', '');
    var x = document.getElementById('edit_nav');
    var name1 = document.getElementById('edit_item_name');
    var qty1 = document.getElementById('edit_item_qty');
    x.style.display = 'block';
    var form = document.getElementById('edit_form');
    var room1;
    switch (room) {
        case 'bedroom':
            room1 = 'Home';
            form.action = './rooms/bedroom/edit.php';
            break;
        case 'kitchen':
            room1 = 'Contact';
            form.action = './rooms/kitchen/edit.php';
            break;
        case 'bathroom':
            room1 = 'bathroom';
            form.action = './rooms/bathroom/edit.php';
            break;
        case 'garage':
            room1 = 'About';
            form.action = './rooms/garage/edit.php';
            break;
        case 'garage':
            room1 = 'About';
            form.action = './rooms/garage/edit.php';
            break;
        case 'storage':
            room1 = 'storage';
            form.action = './rooms/storage/edit.php';
            break;
        case 'dining_room':
            room1 = 'dining_room';
            form.action = './rooms/dining_room/edit.php';
            break;
        case 'laundryroom':
            room1 = 'laundryroom';
            form.action = './rooms/laundry/edit.php';
            break;
        case 'camping':
            room1 = 'cs';
            form.action = './rooms/camping/edit.php';
            break;
        case 'custom_room':
            room1 = 'custom_room';
            form.action = './rooms/custom_room/custom_item_edit.php';
            break;
    }
    editPopupRoom = room1;
    editPopupRoom1 = room;
    document.getElementById('edit_item_id').value = id;
    name1.value = name;
    name1.focus();
    qty1.value = qty;
    qty1.focus();
    document.getElementById('editback').onclick = function() {
        edit_back(room1);
    };
}

function edit_back(data) {
    var x = document.getElementById('edit_nav');
    x.style.display = 'none';
    sm_page(data);
}

function htmlspecialchars(str) {
    if (typeof(str) == "string") {
        str = str.replace(/&/g, "&amp;"); /* must do &amp; first */
        str = str.replace(/"/g, "&quot;");
        str = str.replace(/'/g, "&#039;");
        str = str.replace(/</g, "&lt;");
        str = str.replace(/>/g, "&gt;");
    }
    return str;
}

function item(el, star, label, room) {
    document.querySelector("meta[name=theme-color]").setAttribute("content", "#191918");
    sm_page("item_popup");
    secondary();
    item_state = 'item_popup';

    var name = el.getElementsByTagName("td")[0].innerHTML;
    var qty = el.getElementsByTagName("td")[1].innerHTML;
    var id = el.getAttribute("data-id");
    document.getElementById("FLOATING_ACTION_BUTTON").style.display = "none";
    const actions = {
        editFab: document.getElementById('editfab'),
        menu: {
            del: document.getElementById("action_delete"),
            recipe: document.getElementById("action_recipe"),
            qrCode: document.getElementById("action_qr"),
            task: document.getElementById("action_task"),
            share: document.getElementById("action_share_p"),
        },
        navbar: {
            del: document.getElementById('nav_delete'),
            edit: document.getElementById('nav_edit'),
            star: document.getElementById('nav_star'),
        },
    };

    if (star === 1) {
        actions.navbar.star.getElementsByTagName("i")[0].innerHTML = "star";
    } else {
        actions.navbar.star.getElementsByTagName("i")[0].innerHTML = "star_outline";
    }

    switch (room) {
        case 'bedroom':
            page_title = 'Home';
            dir = "./rooms/bedroom/";
            break;
        case 'kitchen':
            page_title = 'Contact';
            dir = "./rooms/kitchen/";
            break;
        case 'bathroom':
            page_title = 'bathroom';
            dir = "./rooms/bathroom/";
            break;
        case 'garage':
            page_title = 'About';
            dir = "./rooms/garage/";
            break;
        case 'family':
            page_title = 'family';
            dir = "./rooms/family/";
            break;
        case 'storage':
            page_title = 'storage';
            dir = "./rooms/storage/";
            break;
        case 'dining_room':
            page_title = 'dining_room';
            dir = "./rooms/dining_room/";
            break;
        case 'laundry':
            page_title = 'laundryroom';
            dir = "./rooms/laundry/";
            break;
        case 'camping':
            page_title = 'cs';
            dir = "./rooms/camping/";
            break;
        case 'custom_room':
            page_title = 'custom_room';
            dir = "./rooms/custom_room/";
            break;
    }

    if (room !== 'kitchen') {
        action_recipe.style.display = 'none';
    } else if (room == 'kitchen') {
        action_recipe.style.display = '';
        actions.menu.recipe.href = "https://www.google.com/search?q=recipes+with+" + encodeURI(name);
    }
    actions.menu.task.onclick = function() {
        $('#div1').load('./rooms/todo_qadd.php?name=' + encodeURI(name), function() {
            M.toast({
                html: "Added to grocery list"
            })
        })
    }

    actions.navbar.star.onclick = function() {
        if (actions.navbar.star.getElementsByTagName("i")[0].innerHTML == "star") {
            el.style.borderLeft = "none";
            actions.navbar.star.getElementsByTagName("i")[0].innerHTML = "star_outline";
            el.onclick = function() {
                item(el, 0, label, room);
            };
        } else {
            el.style.borderLeft = "3px solid #f57f17";
            actions.navbar.star.getElementsByTagName("i")[0].innerHTML = "star";
            el.onclick = function() {
                item(el, 1, label, room);
            };
        }
        $("#div1").load(dir + "star.php?id=" + id)
    }

    actions.navbar.del.onclick = function() {
        sm_page(page_title)
        M.toast({
            html: 'Deleted!'
        });
        el.remove();
        $("#div1").load(dir + "delete.php?id=" + id)
    }
    actions.menu.del.onclick = function() {
        sm_page(page_title)
        M.toast({
            html: 'Deleted!'
        });
        el.remove();
        $("#div1").load(dir + "delete.php?id=" + id)
    }
    actions.menu.share.onclick = function() {
        if (navigator.share) {
            document.getElementById('action_share_p').style.display = "block";
            navigator.share({
                title: document.title,
                text: "I'm currently having " + qty + " " + name + " in my inventory.",
                url: window.location.href
            }).then(() => console.log('Successful share')).catch(error => console.log('Error sharing:', error));
        }
    };
    document.getElementById("item_title").innerHTML = htmlspecialchars(name);
    document.getElementById("item_qty").innerHTML = "Quantity: " + htmlspecialchars(qty);
    document.getElementById('action_mail').href = "mailto:hello@homebase.rf.gd?subject=My%20Inventory%20Status%20%7C%20Smartlist&body=Hi%20_____%2C%0D%0AI'm%20currently%20having%20" + encodeURI(qty) + "%20" + encodeURI(name) + "%20in%20my%20" + encodeURI(room) + ".%0D%0A%0D%0AThank%20you%2C%0D%0ASincerely%2C%0D%0A________";
    document.getElementById("item_desc").innerHTML = `<div class="chip waves-effect" onclick="copyToClipboard(this.innerText)">Category: ${label}</div><div class="chip waves-effect" onclick="copyToClipboard(this.innerText)">Room: ${room}</div> ${(el.classList.contains("sync_tr") ? `<div class="chip waves-effect green white-text darken-3">Synced</div>` : "")} ${(star == 1 ? `<div class="orange darken-3 white-text chip waves-effect">Starred</div>` : "")}`;

    actions.menu.qrCode.href = "https://api.qrserver.com/v1/create-qr-code/?size=1500x1500&data=" + encodeURI("I currently have " + qty + " " + name + " in my inventory");
    actions.editFab.style.display = 'block';
    actions.editFab.style.transform = 'scale(0)';
    setTimeout(function() {
        actions.editFab.style.transform = 'scale(1)';
    }, 10);

    actions.editFab.onclick = function() {
        setTimeout(function() {
            edit_popup(id, name, qty, label, room);
        }, 0.001);
    };

    actions.navbar.edit.onclick = function() {
        setTimeout(function() {
            edit_popup(id, name, qty, label, room);
        }, 0.001);
    };

    // End function 
}

function __bmevents() {
    if ($(window).width() > 960) {
        return ['mousemove', 'mouseout'];
    } else {
        return ['touchstart', 'touchend'];
    }
}
const __bmconfig = {
    maintainAspectRatio: false,
    responsive: true,
    aspectRatio: 10,
    interaction: {
        mode: 'nearest',
        axis: "x",
        intersect: false,
        label: function(txt) {
            return "$" + txt
        }
    },

    elements: {
        point: {
            radius: 0,
            display: false,
        },
    },
    plugins: {
        legend: {
            display: false,
        },
        tooltip: {
            backgroundColor: "#fff",
            titleColor: "black",
            bodyColor: "black",
            usePointStyle: true,
            padding: 10,
            borderColor: "#eee",
            borderWidth: 3,
            position: "nearest",
            displayColors: false,
            cornerRadius: ($(window).width() < 900 ? 10 : 6),
            titleFont: {
                size: 14,
                weight: '800',
                family: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
            },
            bodyFont: {
                size: 12,
                family: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
            },
            callbacks: {

            }
        }
    },
    scales: {
        y: {
            beginAtZero: true,
            grid: {
                drawBorder: false,

            },
            ticks: {
                maxTicksLimit: 10,
                callback: function(value, index, values) {
                    return '$' + value;
                },
                font: {
                    family: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
                },
            }
        },
        x: {
            ticks: {
                font: {
                    family: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
                },
                autoSkip: true,
                maxRotation: 0,
                align: "start",
                minRotation: 0,
                maxTicksLimit: ($(window).width() < 900 ? 3 : 5),
            },
            grid: {
                display: false,
                drawBorder: false,
            },
        }
    }
};

function bm_add() {
    var x = document.getElementById('bm_amount');
    $('#div1').load('https://smartlist.ga/dashboard/rooms/bm/addx.php?n=' + x.value);
    addData(budgetMeter, new Date().toJSON().slice(0, 10).split('-').reverse().join('/'), x.value);
    x.value = '';
    sm_page('News');
}

function updateScales(chart) {
    var xScale = chart.scales.x;
    var yScale = chart.scales.y;
    chart.options.scales = {
        newId: {
            display: true
        },
        y: {
            display: true,
        }
    };
    chart.update();
    xScale = chart.scales.newId;
    yScale = chart.scales.y;
}

function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets[0].data.push(data);
    chart.data.datasets[1].data.push(__bmgoal);
    chart.update();
}
var _color = document.getElementById("color");

function AJAX_LOAD(el, data, style = '') {
    document.body.style.overflow = 'hidden';
    if (style !== 'box') {
        document.querySelector(el).innerHTML = '<center><br><br><br><svg class=\'circular\' height=\'50\' width=\'50\'> <circle class=\'path\' cx=\'25\' cy=\'25\' r=\'20\' fill=\'none\' stroke-width=\'3\' stroke-miterlimit=\'10\' /> </svg><br></center>';
    } else {
        document.querySelector(el).innerHTML = `<div class="progress settings_progress" style="background: #fff59d" id="settings_progress"><div style="background:#ff9800" class="indeterminate"></div></div>`;
    }
    $(el).load(data);
    document.body.style.overflow = '';
}
$('select').formSelect();

function showsearch() {
    var oijw = document.getElementById("searchbar");
    if (oijw.style.display === "none") {
        oijw.style.display = "block";
    } else {
        oijw.style.display = "none";
    }
}

function secondary() {
    var oijwsecondary_nav = document.getElementById("secondary_nav");
    if (oijwsecondary_nav.style.display === "none") {
        oijwsecondary_nav.style.display = "block";
    } else {
        oijwsecondary_nav.style.display = "none";
    }
}
var brandlogotext = document.getElementById("brandlogo");
$(document).ready(function() {
    window.scrollTo(0, 0);
    request_notification();
    sm_page('News')
    $('a').attr('draggable', false);
    $('.sidenav a').css('pointer-events', 'unset');
    $('.sidenav a').css('opacity', '1');
    var elems = document.querySelectorAll("input[type=range]");
    M.Range.init(elems);
    $('input.autocomplete1').autocomplete({
        data: autocompleteData,
        limit: 6,
    });
    $('input.autocomplete').autocomplete({
        onAutocomplete: function() {
            nav_title('Search Results');
            w_title('Search Results');
            changeValue();
            sm_page('searchresults');
        },
        data: {
            "Apple": 'https://media.istockphoto.com/photos/red-apple-with-leaf-picture-id683494078?k=6&m=683494078&s=612x612&w=0&h=aVyDhOiTwUZI0NeF_ysdLZkSvDD4JxaJMdWSx2p3pp4=',
            "Banana": null,
            "Orange": null,
            "Coriander": null,
            "Kale": null,
            "Watermelon": null,
            "Mango": null,
            "Noodles": null,
            "Juice": null,
            "Dal": null,
            "Black beans": null,
            "Kidney beans": null,
            "Coconuts": null,
            "Dark Chocolate": null,
            "Bread": null,
            "Chocolate": null,
            "Yogurt": null,
            "Milk": null,
            "Cilantro": null,
            "Sooji fine": null,
            "Saaru powder": null,
            "Pineapple": null,
            "Almond": null,
            "Carrot": null,
            "Brocolli": null,
            "JavaScript": null,
            "Lisp": null,
            "Perl": null,
            "PHP": null,
            "Python": null,
            "Ruby": null,
            "Scala": null,
            "Scheme": null,
            "Apricot": null,
            "Artichoke": null,
            "Asian Pear": null,
            "Asparagus": null,
            "Atemoya": null,
            "Avocado": null,
            "Bamboo Shoots": null,
            "Bean Sprouts": null,
            "Beans": null,
            "Beets": null,
            "Belgian Endive": null,
            "Bell Peppers": null,
            "Bitter Melon": null,
            "Blackberries": null,
            "Blueberries": null,
            "Bok Choy": null,
            "Boniato": null,
            "Boysenberries": null,
            "Broccoflower": null,
            "Broccoli": null,
            "Brussels Sprouts": null,
            "Cabbage": null,
            "Cactus Pear": null,
            "Cantaloupe": null,
            "Carambola": null,
            "Carrots": null,
            "Casaba Melon": null,
            "Cauliflower": null,
            "Celery": null,
            "Chayote": null,
            "Cherimoya": null,
            "Cherries": null,
            "Collard Greens": null,
            "Corn": null,
            "Cranberries": null,
            "Cucumber": null,
            "Dates": null,
            "Dried Plums": null,
            "Eggplant": null,
            "Endive": null,
            "Escarole": null,
            "Feijoa": null,
            "Fennel": null,
            "Figs": null,
            "Garlic": null,
            "Gooseberries": null,
            "Grapefruit": null,
            "Grapes": null,
            "Green Beans": null,
            "Green Onions": null,
            "Greens": null,
            "Guava": null,
            "Hominy": null,
            "Honeydew Melon": null,
            "Horned Melon": null,
            "Iceberg Lettuce": null,
            "Jerusalem Artichoke": null,
            "Jicama": null,
            "Kiwifruit": null,
            "Kohlrabi": null,
            "Kumquat": null,
            "Leeks": null,
            "Lemons": null,
            "Lettuce": null,
            "Lima Beans": null,
            "Limes": null,
            "Longan": null,
            "Loquat": null,
            "Lychee": null,
            "Madarins": null,
            "Malanga": null,
            "Mandarin Oranges": null,
            "Mangos": null,
            "Mulberries": null,
            "Mushrooms": null,
            "Napa": null,
            "Nectarines": null,
            "Okra": null,
            "Onion": null,
            "Oranges": null,
            "Papayas": null,
            "Parsnip": null,
            "Passion Fruit": null,
            "Peaches": null,
            "Pears": null,
            "Peas": null,
            "Peppers": null,
            "Persimmons": null,
            "Plantains": null,
            "Plums": null,
            "Pomegranate": null,
            "Potatoes": null,
            "Prickly Pear": null,
            "Prunes": null,
            "Pummelo": null,
            "Pumpkin": null,
            "Quince": null,
            "Radicchio": null,
            "Radishes": null,
            "Raisins": null,
            "Raspberries": null,
            "Red Cabbage": null,
            "Rhubarb": null,
            "Romaine Lettuce": null,
            "Rutabaga": null,
            "Shallots": null,
            "Snow Peas": null,
            "Spinach": null,
            "Sprouts": null,
            "Squash": null,
            "Strawberries": null,
            "String Beans": null,
            "Sweet Potato": null,
            "Tangelo": null,
            "Tangerines": null,
            "Tomatillo": null,
            "Tomato": null,
            "Turnip": null,
            "Ugli Fruit": null,
            "Water Chestnuts": null,
            "Watercress": null,
            "Waxed Beans": null,
            "Yams": null,
            "Yellow Squash": null,
            "Yuca/Cassava": null,
            "Zucchini Squash": null,
        },
        limit: 3,
    });
    $('.modal').modal({
        onOpenStart: function() {
            document.querySelector("meta[name=theme-color]").setAttribute("content", 'rgba(0, 0, 0, .3)');
        },
        onCloseStart: function() {
            w_title('Dashboard');
            document.querySelector("meta[name=theme-color]").setAttribute("content", user.theme_top_color);
            $('.modal').scrollTop(0);
        },
        onCloseEnd: function() {
            $('.modal').scrollTop(0);
            document.getElementById('budgetmetermodala').classList.remove('addheight');
        }
    });
    $('#key').modal({
        endingTop: '50%'
    });
    $('.sidenav').sidenav({
        onCloseEnd: function() {
            $('#slide-out').scrollTop(0);
        }
    });
    $('.collapsible').collapsible();
    $('#fab').floatingActionButton();
    $('#modal').modal();
    $('.dropdown-trigger').dropdown();
    $('.tooltipped').tooltip({
        transitionMovement: 5
    });
    if ($(window).width() > 600) {
        document.getElementById('__def').click();
    }
    $('.materialboxed').materialbox();
    $('.sidenav').sidenav().on('click tap', 'li a:not(.collapsible-header)', () => {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $('.sidenav').sidenav('close');
        }
    });
    if (window.localStorage.getItem('accept_cookies')) {
        $('#hide_notification').hide();
    }
    $("#notification").click(function() {
        window.localStorage.setItem('accept_cookies', true);
        $('#hide_notification').hide();
    });
});

function truncateString(str, num) {
    if (str.length > num) {
        return str.slice(0, num) + "...";
    } else {
        return str;
    }
}
var prevScrollpos = window.pageYOffset;
window.addEventListener('scroll', function() {
    var currentScrollPos = window.pageYOffset;
    var x = document.getElementById('FLOATING_ACTION_BUTTON');
    if (prevScrollpos > currentScrollPos) {
        x.style.width = '130px';
        x.getElementsByTagName('i')[0].classList.remove('active_i');
        setTimeout(function() {
            x.getElementsByTagName('span')[0].style.opacity = 1;
        }, 200);
    } else {
        x.getElementsByTagName('span')[0].style.opacity = 0;
        setTimeout(function() {
            x.style.width = '56px';
            x.getElementsByTagName('i')[0].classList.add('active_i');
        }, 100);
    }
    prevScrollpos = currentScrollPos;
});

var smartlist_page_names = [];

function sm_page(pageName, elmnt, color) {
    elmnt = elmnt || "";
    color = color || "";
    if (pageName == "News") {
        document.querySelector("meta[name=theme-color]").setAttribute("content", user.theme_top_color);
    }
    document.getElementById("searchbar").style.display = "none";
    document.getElementById('editfab').style.display = 'none';
    document.body.style.overflow = '';
    document.getElementById('edit_nav').style.display = 'none';
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    var els = document.querySelectorAll('.sidenav-active');
    if (els) {
        for (i = 0; i < els.length; i++) {
            els[i].classList.remove('sidenav-active');
        }
    }
    document.getElementById(pageName).style.display = "block";
    $(pageName).scrollTop(0);
    window.scrollTo(0, 0);
    document.getElementById("secondary_nav").style.display = "none";
    smartlist_page_names.push(pageName);
    // M.toast({html: JSON.stringify(smartlist_page_names)});
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
        // document.getElementById("imageid").src = "https://www.whatswithtech.com/wp-content/uploads/2015/09/black-and-blue-material-design-wallpaper.png";
    }
}

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
        metaThemeColor = document.querySelector("meta[name=theme-color]");
        metaThemeColor.setAttribute("content", "#191918");
        // document.getElementById("imageid").src = "https://www.whatswithtech.com/wp-content/uploads/2015/09/black-and-blue-material-design-wallpaper.png";
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
        metaThemeColor = document.querySelector("meta[name=theme-color]");
        metaThemeColor.setAttribute("content", "#2a1782");
    }
}
toggleSwitch.addEventListener('change', switchTheme, false);
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    document.documentElement.setAttribute('data-theme', 'dark');
    metaThemeColor = document.querySelector("meta[name=theme-color]");
    metaThemeColor.setAttribute("content", "#191918");
}

function toast(name, qty) {
    M.toast({
        html: "Deleted \"" + name + '" <a class="btn-flat toast-action waves-effect waves-orange text-white" style="color: white !important" href="https://smartlist.ga/dashboard/exe.php?name=' + encodeURI(name) + '&qty=' + qty + '&price=1">Undo</a>'
    });
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

document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.which == 188) {
        event.preventDefault();
        $('.modal').modal('close');
        sm_page('modal1');
    } else if (e.ctrlKey && e.which == 191) {
        event.preventDefault();
        $('.modal').modal('close');
        $('#key').modal('open');
        w_title('Keyboard Shortcuts');
    } else if (e.ctrlKey && e.which == 70) {
        event.preventDefault();
        $('.modal').modal('close');
        showsearch();
        document.getElementById('search').focus();
    } else if (e.ctrlKey && e.which == 83) {
        event.preventDefault();
        $('.modal').modal('close');
        $('#budgetmetermodala').modal('open');
        w_title('Add an item');
    } else if (e.ctrlKey && e.which == 71) {
        event.preventDefault();
        if ($("#grocerylist_add").is(":visible") !== true) {
            sm_page('grocerylist_add');
            AJAX_LOAD('#grocerylist_add', './rooms/grocerylist/quickadd.php');
        }
    } else if (e.ctrlKey && e.which == 71) {
        event.preventDefault();
        if ($("#grocerylist_add").is(":visible") !== true) {
            sm_page('grocerylist_add');
            AJAX_LOAD('#grocerylist_add', './rooms/grocerylist/quickadd.php');
        }
    } else if (e.ctrlKey && e.which == 66) {
        event.preventDefault();
        $('.modal').modal('close');
        w_title('Budget Meter');
        nav_title('Budget Meter');
        if ($("#budgetmetermodal").is(":visible") !== true) {
            AJAX_LOAD('#budgetmetermodal', './rooms/bm/index.php')
        }
        sm_page('budgetmetermodal');
    } else if (e.ctrlKey && e.which == 76) {
        event.preventDefault();
        if ($("#todo_add").is(":visible") !== true) {
            sm_page('todo_add');
            AJAX_LOAD('#todo_add', './rooms/todo/quickadd.php');
        }
    } else if (e.ctrlKey && e.which == 68) {
        e.preventDefault();
        M.toast({
            html: "Use CTRL / to open keyboard shortcuts"
        });
    } else if (e.ctrlKey && e.which == 69) {
        e.preventDefault();
        M.toast({
            html: "Use CTRL Comma to open settings"
        });
    } else if (e.shiftKey && e.which == 27 || e.metaKey && e.which == 27) {
        event.preventDefault();
    }
    // &&e.altKey
});

function load_croom(data, name) {
    document.getElementById('custom_room').innerHTML = '<center><br><br><br><svg class=\'circular\' height=\'50\' width=\'50\'> <circle class=\'path\' cx=\'25\' cy=\'25\' r=\'20\' fill=\'none\' stroke-width=\'3\' stroke-miterlimit=\'10\' /> </svg><br></center>';
    $('#custom_room').load('https://smartlist.ga/dashboard/rooms/custom_room/ajax_croom_loader.php?room=' + encodeURI(data));
    sm_page('custom_room');
    change_title(name);
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
                /*var notification = new Notification("Nice! Notifications are enabled!");*/
            }
        });
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
dragElement(document.getElementById("budgetmetermodala"));
dragElement(document.getElementById("right_click_modal"));

function dragElement(elmnt) {
    var pos3 = 0,
        pos4 = 0;
    if (document.getElementById(elmnt.id)) {
        document.getElementById(elmnt.id).onmousedown = dragMouseDown;
    } else {
        elmnt.onmousedown = dragMouseDown;
        elmnt.ontouchstart = dragMouseDown;
    }

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        document.ontouchend = closeDragElement;
        document.ontouchcancel = closeDragElement;
        document.onmousemove = elementDrag;
        document.ontouchstart = elementDrag;
        document.ontouchmove = elementDrag;
    }

    function elementDrag(e) {
        e = e || window.event;
        e.stopPropagation();
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        if (!/Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $(".modal.bottom-sheet a").addClass('disabled');
        }
        pos4 = e.clientY;
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    }

    function closeDragElement() {
        document.onmouseup = null;
        document.ontouchend = null;
        document.onmousemove = null;
        setTimeout(function() {
            elmnt.style.top = "";
            if (!/Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                $(".modal.bottom-sheet a").removeClass('disabled');
            }
        }, 100);
        return false;
    }
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
var bedroom_qty, bedroom_name, bathroom_qty, bathroom_name, searcha, qtay, date;

history.pushState(null, null, 'https://smartlist.ga/dashboard/beta');


window.addEventListener('popstate', function(event) {
    // event.preventDefault();
    history.pushState(null, null, 'https://smartlist.ga/dashboard/beta');
    $('.modal').modal('close');
    //  || $("#budgetmetermodal").is(":visible") || $("#family").is(":visible") || $("#croom_add").is(":visible") || $("#storage").is(":visible") || $("#budgetmetermodal").is(":visible") || $("#notification_popup").is(":visible") || $("#searchresults").is(":visible") || $("#Contact").is(":visible") || $("#Home").is(":visible") || $("#About").is(":visible") ||  $("#STARRED_ITEMS").is(":visible") || $("#bathroom").is(":visible") || $("#foodwaste").is(":visible") || $("#custom_room").is(":visible")
    if ($(".tabcontent").is(":visible")) {
        if (!$("#item_popup").is(":visible") && !$("#modal1").is(":visible")) {
            sm_page('News');
            sidenav_highlight(document.getElementById('defaultOpen'));
            change_title('Dashboard');
        }
    }
    if (item_state == 'item_popup') {
        back();
        item_state = '1';
    }
    if ($("#modal1").is(":visible") && $(window).width() > 600) {
        sm_page('News');
        document.querySelector("meta[name=theme-color]").setAttribute("content", user.theme_top_color);
    } else if ($("#modal1").is(":visible")) {
        document.getElementById('capitalizeFirstLetter').click();
    }
    if (document.documentElement.getAttribute('data-theme') === "dark") {
        document.querySelector("meta[name=theme-color]").setAttribute("content", '#1f1f1f');
    }
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('.sidenav').sidenav('close');
    }
});
document.getElementById('notification').addEventListener('click', function() {
    sm_page("notification_popup");
    AJAX_LOAD("#notification_popup", "./rooms/notifications.php");
    nav_title("Notifications");
    w_title("Notifications");
    document.getElementById("hide_notification").style.display = "none";
});
document.getElementById('search_toggle').addEventListener('click', function() {
    showsearch();
    document.getElementById('search').focus();
});

function modal_open(id, el, room) {
    var __el1 = el.getElementsByTagName('td')[0].innerHTML;
    var __el2 = el.getElementsByTagName('td')[1].innerHTML;
    var directory;
    $('#right_click_modal').modal('open');
    document.getElementById('rclick_qr').href = 'https://api.qrserver.com/v1/create-qr-code/?size=850x850&data=' + __el1;
    document.getElementById('rclick_recipe').href = 'https://google.com/search/?q=' + encodeURI("Recipes with " + __el1);
    document.getElementById('rclick_mail').href = 'mailto:fakeemail@emailsender.net?subject=' + encodeURI("My inventory Status") + "&body=" + encodeURI("I currently have " + __el2 + " " + __el1 + " in my inventory");
    document.getElementById('rclick_share').onclick = function() {
        if (navigator.share) {
            navigator.share({
                title: document.title,
                text: "I'm currently having " + __el1 + " " + __el2 + " in my inventory.",
                url: window.location.href
            }).then(() => console.log('Successful share')).catch(error => console.log('Error sharing:', error));
        }
    };
    document.getElementById('rclick_add').onclick = function() {
        $('#div1').load('./rooms/todo_qadd.php?name=' + encodeURI(__el1));
        M.toast({
            html: 'Item added successfully to grocery list'
        });
    };
    document.getElementById('rclick_edit').onclick = function() {
        edit_popup(el.getAttribute('data-id'), __el1, __el2, '', room);
    };
    switch (room) {
        case 'kitchen':
            directory = 'delete.php';
            break;
        case 'bathroom':
            directory = './rooms/bathroom/delete.php';
            break;
        case 'bedroom':
            directory = './rooms/bedroom/delete.php';
            break;
        case 'garage':
            directory = './rooms/garage/delete.php';
            break;
        case 'family':
            directory = './rooms/family/delete.php';
            break;
        case 'laundryroom':
            directory = './rooms/laundry/delete.php';
            break;
        case 'dining_room':
            directory = './rooms/dining_room/delete.php';
            break;
        case 'storage':
            directory = './rooms/storage/delete.php';
            break;
        case 'custom_room':
            directory = './rooms/custom_room/custom_item_delete.php';
            break;
    }
    document.getElementById('rclick_delete').onclick = function() {
        $('#div1').load(directory + "?id=" + id);
        $(el).hide()
    };
}
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', 'G-S0PH6N0Z7E');
window.addEventListener('keyup', function(e) {
    if (e.keyCode == '187') {
        e.preventDefault();
        document.getElementById("FLOATING_ACTION_BUTTON").style.width = '130px';
        document.getElementById("FLOATING_ACTION_BUTTON").getElementsByTagName('i')[0].classList.remove('active_i');
        setTimeout(function() {
            document.getElementById("FLOATING_ACTION_BUTTON").getElementsByTagName('span')[0].style.opacity = 1;
        }, 200);
    }
});

/*BEGIN Swipe*/
!function(e){"function"==typeof define&&define.amd&&define.amd.jQuery?define(["jquery"],e):e(jQuery)}(function(e){var n="left",t="right",r="up",i="down",l="in",o="out",a="none",u="auto",s="swipe",c="pinch",p="tap",h="doubletap",f="longtap",d="horizontal",g="vertical",w="all",v=10,T="start",b="move",E="end",S="cancel",m="ontouchstart"in window,y=window.navigator.msPointerEnabled&&!window.navigator.pointerEnabled,O=window.navigator.pointerEnabled||window.navigator.msPointerEnabled,x="TouchSwipe";function M(M,D){D=e.extend({},D);var P=m||O||!D.fallbackToMouseEvents,L=P?O?y?"MSPointerDown":"pointerdown":"touchstart":"mousedown",R=P?O?y?"MSPointerMove":"pointermove":"touchmove":"mousemove",k=P?O?y?"MSPointerUp":"pointerup":"touchend":"mouseup",A=P?null:"mouseleave",I=O?y?"MSPointerCancel":"pointercancel":"touchcancel",U=0,N=null,j=0,H=0,_=0,Q=1,C=0,F=0,X=null,Y=e(M),q="start",V=0,W={},$=0,z=0,G=0,Z=0,B=0,J=null,K=null;try{Y.bind(L,ee),Y.bind(I,re)}catch(n){e.error("events not supported "+L+","+I+" on jQuery.swipe")}function ee(l){if(!0!==Y.data(x+"_intouch")&&!(e(l.target).closest(D.excludedElements,Y).length>0)){var o,a=l.originalEvent?l.originalEvent:l,u=a.touches,s=u?u[0]:a;return q=T,u?V=u.length:!1!==D.preventDefaultEvents&&l.preventDefault(),U=0,N=null,F=null,j=0,H=0,_=0,Q=1,C=0,X=function(){var e={};return e[n]=Le(n),e[t]=Le(t),e[r]=Le(r),e[i]=Le(i),e}(),ye(),Me(0,s),!u||V===D.fingers||D.fingers===w||fe()?($=Ae(),2==V&&(Me(1,u[1]),H=_=ke(W[0].start,W[1].start)),(D.swipeStatus||D.pinchStatus)&&(o=ae(a,q))):o=!1,!1===o?(ae(a,q=S),o):(D.hold&&(K=setTimeout(e.proxy(function(){Y.trigger("hold",[a.target]),D.hold&&(o=D.hold.call(Y,a,a.target))},this),D.longTapThreshold)),xe(!0),null)}}function ne(s){var c=s.originalEvent?s.originalEvent:s;if(q!==E&&q!==S&&!Oe()){var p,h=c.touches,f=De(h?h[0]:c);if(z=Ae(),h&&(V=h.length),D.hold&&clearTimeout(K),q=b,2==V&&(0==H?(Me(1,h[1]),H=_=ke(W[0].start,W[1].start)):(De(h[1]),_=ke(W[0].end,W[1].end),W[0].end,W[1].end,F=Q<1?o:l),Q=function(e,n){return(n/e*1).toFixed(2)}(H,_),C=Math.abs(H-_)),V===D.fingers||D.fingers===w||!h||fe()){if(function(e,l){if(!1===D.preventDefaultEvents)return;if(D.allowPageScroll===a)e.preventDefault();else{var o=D.allowPageScroll===u;switch(l){case n:(D.swipeLeft&&o||!o&&D.allowPageScroll!=d)&&e.preventDefault();break;case t:(D.swipeRight&&o||!o&&D.allowPageScroll!=d)&&e.preventDefault();break;case r:(D.swipeUp&&o||!o&&D.allowPageScroll!=g)&&e.preventDefault();break;case i:(D.swipeDown&&o||!o&&D.allowPageScroll!=g)&&e.preventDefault()}}}(s,N=function(e,l){var o=function(e,n){var t=e.x-n.x,r=n.y-e.y,i=Math.atan2(r,t),l=Math.round(180*i/Math.PI);l<0&&(l=360-Math.abs(l));return l}(e,l);return o<=45&&o>=0?n:o<=360&&o>=315?n:o>=135&&o<=225?t:o>45&&o<135?i:r}(f.start,f.end)),U=function(e,n){return Math.round(Math.sqrt(Math.pow(n.x-e.x,2)+Math.pow(n.y-e.y,2)))}(f.start,f.end),j=Re(),function(e,n){n=Math.max(n,Pe(e)),X[e].distance=n}(N,U),(D.swipeStatus||D.pinchStatus)&&(p=ae(c,q)),!D.triggerOnTouchEnd||D.triggerOnTouchLeave){var v=!0;if(D.triggerOnTouchLeave){var T=function(n){var t=(n=e(n)).offset();return{left:t.left,right:t.left+n.outerWidth(),top:t.top,bottom:t.top+n.outerHeight()}}(this);v=function(e,n){return e.x>n.left&&e.x<n.right&&e.y>n.top&&e.y<n.bottom}(f.end,T)}!D.triggerOnTouchEnd&&v?q=oe(b):D.triggerOnTouchLeave&&!v&&(q=oe(E)),q!=S&&q!=E||ae(c,q)}}else ae(c,q=S);!1===p&&ae(c,q=S)}}function te(e){var n=e.originalEvent?e.originalEvent:e,t=n.touches;if(t){if(t.length&&!Oe())return G=Ae(),Z=event.touches.length+1,!0;if(t.length&&Oe())return!0}return Oe()&&(V=Z),z=Ae(),j=Re(),ce()||!se()?ae(n,q=S):D.triggerOnTouchEnd||0==D.triggerOnTouchEnd&&q===b?(!1!==D.preventDefaultEvents&&e.preventDefault(),ae(n,q=E)):!D.triggerOnTouchEnd&&Ee()?ue(n,q=E,p):q===b&&ae(n,q=S),xe(!1),null}function re(){V=0,z=0,$=0,H=0,_=0,Q=1,ye(),xe(!1)}function ie(e){var n=e.originalEvent?e.originalEvent:e;D.triggerOnTouchLeave&&ae(n,q=oe(E))}function le(){Y.unbind(L,ee),Y.unbind(I,re),Y.unbind(R,ne),Y.unbind(k,te),A&&Y.unbind(A,ie),xe(!1)}function oe(e){var n=e,t=pe(),r=se(),i=ce();return!t||i?n=S:!r||e!=b||D.triggerOnTouchEnd&&!D.triggerOnTouchLeave?!r&&e==E&&D.triggerOnTouchLeave&&(n=S):n=E,n}function ae(e,n){var t,r=e.touches;return ve()&&we()||de()&&fe()?(ve()&&we()&&(t=ue(e,n,s)),de()&&fe()&&!1!==t&&(t=ue(e,n,c))):me()&&Se()&&!1!==t?t=ue(e,n,h):j>D.longTapThreshold&&U<v&&D.longTap&&!1!==t?t=ue(e,n,f):1!==V&&m||!(isNaN(U)||U<D.threshold)||!Ee()||!1===t||(t=ue(e,n,p)),n===S&&(we()&&(t=ue(e,n,s)),fe()&&(t=ue(e,n,c)),re()),n===E&&(r&&r.length||re()),t}function ue(a,u,d){var g;if(d==s){if(Y.trigger("swipeStatus",[u,N||null,U||0,j||0,V,W]),D.swipeStatus&&!1===(g=D.swipeStatus.call(Y,a,u,N||null,U||0,j||0,V,W)))return!1;if(u==E&&ge()){if(Y.trigger("swipe",[N,U,j,V,W]),D.swipe&&!1===(g=D.swipe.call(Y,a,N,U,j,V,W)))return!1;switch(N){case n:Y.trigger("swipeLeft",[N,U,j,V,W]),D.swipeLeft&&(g=D.swipeLeft.call(Y,a,N,U,j,V,W));break;case t:Y.trigger("swipeRight",[N,U,j,V,W]),D.swipeRight&&(g=D.swipeRight.call(Y,a,N,U,j,V,W));break;case r:Y.trigger("swipeUp",[N,U,j,V,W]),D.swipeUp&&(g=D.swipeUp.call(Y,a,N,U,j,V,W));break;case i:Y.trigger("swipeDown",[N,U,j,V,W]),D.swipeDown&&(g=D.swipeDown.call(Y,a,N,U,j,V,W))}}}if(d==c){if(Y.trigger("pinchStatus",[u,F||null,C||0,j||0,V,Q,W]),D.pinchStatus&&!1===(g=D.pinchStatus.call(Y,a,u,F||null,C||0,j||0,V,Q,W)))return!1;if(u==E&&he())switch(F){case l:Y.trigger("pinchIn",[F||null,C||0,j||0,V,Q,W]),D.pinchIn&&(g=D.pinchIn.call(Y,a,F||null,C||0,j||0,V,Q,W));break;case o:Y.trigger("pinchOut",[F||null,C||0,j||0,V,Q,W]),D.pinchOut&&(g=D.pinchOut.call(Y,a,F||null,C||0,j||0,V,Q,W))}}return d==p?u!==S&&u!==E||(clearTimeout(J),clearTimeout(K),Se()&&!me()?(B=Ae(),J=setTimeout(e.proxy(function(){B=null,Y.trigger("tap",[a.target]),D.tap&&(g=D.tap.call(Y,a,a.target))},this),D.doubleTapThreshold)):(B=null,Y.trigger("tap",[a.target]),D.tap&&(g=D.tap.call(Y,a,a.target)))):d==h?u!==S&&u!==E||(clearTimeout(J),B=null,Y.trigger("doubletap",[a.target]),D.doubleTap&&(g=D.doubleTap.call(Y,a,a.target))):d==f&&(u!==S&&u!==E||(clearTimeout(J),B=null,Y.trigger("longtap",[a.target]),D.longTap&&(g=D.longTap.call(Y,a,a.target)))),g}function se(){var e=!0;return null!==D.threshold&&(e=U>=D.threshold),e}function ce(){var e=!1;return null!==D.cancelThreshold&&null!==N&&(e=Pe(N)-U>=D.cancelThreshold),e}function pe(){return!D.maxTimeThreshold||!(j>=D.maxTimeThreshold)}function he(){var e=Te(),n=be(),t=null===D.pinchThreshold||C>=D.pinchThreshold;return e&&n&&t}function fe(){return!!(D.pinchStatus||D.pinchIn||D.pinchOut)}function de(){return!(!he()||!fe())}function ge(){var e=pe(),n=se(),t=Te(),r=be();return!ce()&&r&&t&&n&&e}function we(){return!!(D.swipe||D.swipeStatus||D.swipeLeft||D.swipeRight||D.swipeUp||D.swipeDown)}function ve(){return!(!ge()||!we())}function Te(){return V===D.fingers||D.fingers===w||!m}function be(){return 0!==W[0].end.x}function Ee(){return!!D.tap}function Se(){return!!D.doubleTap}function me(){if(null==B)return!1;var e=Ae();return Se()&&e-B<=D.doubleTapThreshold}function ye(){G=0,Z=0}function Oe(){var e=!1;G&&(Ae()-G<=D.fingerReleaseThreshold&&(e=!0));return e}function xe(e){!0===e?(Y.bind(R,ne),Y.bind(k,te),A&&Y.bind(A,ie)):(Y.unbind(R,ne,!1),Y.unbind(k,te,!1),A&&Y.unbind(A,ie,!1)),Y.data(x+"_intouch",!0===e)}function Me(e,n){var t={start:{x:0,y:0},end:{x:0,y:0}};return t.start.x=t.end.x=n.pageX||n.clientX,t.start.y=t.end.y=n.pageY||n.clientY,W[e]=t,t}function De(e){var n=void 0!==e.identifier?e.identifier:0,t=function(e){return W[e]||null}(n);return null===t&&(t=Me(n,e)),t.end.x=e.pageX||e.clientX,t.end.y=e.pageY||e.clientY,t}function Pe(e){if(X[e])return X[e].distance}function Le(e){return{direction:e,distance:0}}function Re(){return z-$}function ke(e,n){var t=Math.abs(e.x-n.x),r=Math.abs(e.y-n.y);return Math.round(Math.sqrt(t*t+r*r))}function Ae(){return(new Date).getTime()}this.enable=function(){return Y.bind(L,ee),Y.bind(I,re),Y},this.disable=function(){return le(),Y},this.destroy=function(){le(),Y.data(x,null),Y=null},this.option=function(n,t){if("object"==typeof n)D=e.extend(D,n);else if(void 0!==D[n]){if(void 0===t)return D[n];D[n]=t}else{if(!n)return D;e.error("Option "+n+" does not exist on jQuery.swipe.options")}return null}}e.fn.swipe=function(n){var t=e(this),r=t.data(x);if(r&&"string"==typeof n){if(r[n])return r[n].apply(this,Array.prototype.slice.call(arguments,1));e.error("Method "+n+" does not exist on jQuery.swipe")}else if(r&&"object"==typeof n)r.option.apply(this,arguments);else if(!(r||"object"!=typeof n&&n))return function(n){!n||void 0!==n.allowPageScroll||void 0===n.swipe&&void 0===n.swipeStatus||(n.allowPageScroll=a);void 0!==n.click&&void 0===n.tap&&(n.tap=n.click);n||(n={});return n=e.extend({},e.fn.swipe.defaults,n),this.each(function(){var t=e(this),r=t.data(x);r||(r=new M(this,n),t.data(x,r))})}.apply(this,arguments);return t},e.fn.swipe.version="1.6.12",e.fn.swipe.defaults={fingers:1,threshold:75,cancelThreshold:null,pinchThreshold:20,maxTimeThreshold:null,fingerReleaseThreshold:250,longTapThreshold:500,doubleTapThreshold:200,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,pinchIn:null,pinchOut:null,pinchStatus:null,click:null,tap:null,doubleTap:null,longTap:null,hold:null,triggerOnTouchEnd:!0,triggerOnTouchLeave:!1,allowPageScroll:"auto",fallbackToMouseEvents:!0,excludedElements:"label, button, input, select, textarea, a, .noSwipe",preventDefaultEvents:!0},e.fn.swipe.phases={PHASE_START:T,PHASE_MOVE:b,PHASE_END:E,PHASE_CANCEL:S},e.fn.swipe.directions={LEFT:n,RIGHT:t,UP:r,DOWN:i,IN:l,OUT:o},e.fn.swipe.pageScroll={NONE:a,HORIZONTAL:d,VERTICAL:g,AUTO:u},e.fn.swipe.fingers={ONE:1,TWO:2,THREE:3,FOUR:4,FIVE:5,ALL:w}}),$(function(){$(".modal").swipe({swipe:function(e,n,t,r,i,l){"down"==n&&$(".modal").modal("close")},threshold:0})});
/*END Swipe*/
function _settingsLoad(el, data) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("__SETTINGSPAGE");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    if ($(window).width() < 600) {
        document.getElementById('_settingsmenu').style.display = 'none';
        document.getElementById('capitalizeFirstLetter').onclick = function() {
            tablinks = document.querySelectorAll(".__sidebar a");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.boxShadow = "";
            }
            document.querySelector("meta[name=theme-color]").setAttribute("content", '#212121');
            tabcontent = document.getElementsByClassName("__SETTINGSPAGE");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            document.getElementById('capitalizeFirstLetter').onclick = function() {
                sm_page('News');
                document.querySelector("meta[name=theme-color]").setAttribute("content", user.theme_top_color);
            }
            document.getElementById('_settingsmenu').style.display = "block";
        }
    }
    tablinks = document.querySelectorAll(".__sidebar a");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.boxShadow = "";
    }
    document.getElementById('_smSettingsPage_' + data).style.display = "block";
    el.style.boxShadow = 'inset 3px 0px 0px 0px rgba(230,81,0,1)';
    if ($(window).width() < 600) {
        document.getElementById('capitalizeFirstLetter').style.display = "block";
    }
}
window.addEventListener('load', function() {
    if ($(window).width() < 600) {
        var c = document.getElementsByClassName("__SETTINGSPAGE");
        for (i = 0; i < c.length; i++) {
            c[i].style.display = "none";
        }
    }
});
if ((!('innerText' in document.createElement('a'))) && ('getSelection' in window)) {
    HTMLElement.prototype.__defineGetter__("innerText", function() {
        var selection = window.getSelection(),
            ranges = [],
            str;

        // Save existing selections.
        for (var i = 0; i < selection.rangeCount; i++) {
            ranges[i] = selection.getRangeAt(i);
        }

        // Deselect everything.
        selection.removeAllRanges();

        // Select `el` and all child nodes.
        // 'this' is the element .innerText got called on
        selection.selectAllChildren(this);

        // Get the string representation of the selected nodes.
        str = selection.toString();

        // Deselect everything. Again.
        selection.removeAllRanges();

        // Restore all formerly existing selections.
        for (var i = 0; i < ranges.length; i++) {
            selection.addRange(ranges[i]);
        }

        // Oh look, this is what we wanted.
        // String representation of the element, close to as rendered.
        return str;
    })
}
//addEventListener polyfill 1.0 / Eirik Backer / MIT Licence
(function(win, doc) {
    if (win.addEventListener) return; //No need to polyfill
    function docHijack(p) {
        var old = doc[p];
        doc[p] = function(v) {
            return addListen(old(v))
        }
    }

    function addEvent(on, fn, self) {
        return (self = this).attachEvent('on' + on, function(e) {
            var e = e || win.event;
            e.preventDefault = e.preventDefault || function() {
                e.returnValue = false
            }
            e.stopPropagation = e.stopPropagation || function() {
                e.cancelBubble = true
            }
            fn.call(self, e);
        });
    }

    function addListen(obj, i) {
        if (i = obj.length)
            while (i--) obj[i].addEventListener = addEvent;
        else obj.addEventListener = addEvent;
        return obj;
    }
    addListen([doc, win]);
    if ('Element' in win) win.Element.prototype.addEventListener = addEvent; //IE8
    else { //IE < 8
        doc.attachEvent('onreadystatechange', function() {
            addListen(doc.all)
        }); //Make sure we also init at domReady
        docHijack('getElementsByTagName');
        docHijack('getElementById');
        docHijack('createElement');
        addListen(doc.all);
    }
})(window, document);

function sidenav_highlight(el) {
    var els = document.querySelectorAll('.sidenav-active');
    if (els) {
        for (i = 0; i < els.length; i++) {
            els[i].classList.remove('sidenav-active')
        }
    }
    setTimeout(function() {
        el.classList.add('sidenav-active');
    }, 100);
}

function change_title(data) {
    w_title(data);
    nav_title(data)
}

function bedroom_chip(el) {
    var x = document.getElementById('bedroom_name_input');
    x.value = el.getElementsByTagName('span')[0].innerHTML;
    x.focus();
    document.getElementById('bedroom_qty_input').focus()
}
window.addEventListener('load', function() {
    sidenav_highlight(document.getElementById('defaultOpen'));
});
document.getElementById('scroll_sidenav_to_top').addEventListener('click', function() {
    $('#slide-out').scrollTop(0);
});
document.getElementById('search_close').addEventListener('click', showsearch);

function meta_theme_color(data) {
    document.querySelector("meta[name=theme-color]").setAttribute("content", data);
}

function disable_online_events() {
    document.getElementById('fab').style.pointerEvents = "none";
    document.getElementById('item_options').style.display = "none";
    document.getElementById('editfab').style.pointerEvents = "none";
    document.getElementById('editfab').style.opacity = "0 !important";
    document.getElementById('nav_edit').style.visibility = "hidden";
    document.getElementById('nav_star').style.visibility = "hidden";
    document.getElementById('nav_star').style.visibility = "hidden";
    $('nav a').css({
        'pointer-events': 'none'
    });
    document.getElementById('nav_delete').style.visibility = "hidden";
    document.getElementById('fab').style.opacity = "0";
    M.toast({
        html: "You are currently offline. <br>Please connect to the internet to add or edit items"
    });
    $(document).ready(function() {
        var q = document.querySelector('.card');
        for (i = 0; i < q.length; i++) {
            q[i].style.pointerEvents = 'none'
        }
    });
}

function enable_online_events() {
    document.getElementById('fab').style.pointerEvents = "";
    document.getElementById('item_options').style.display = "";
    document.getElementById('editfab').style.pointerEvents = "";
    document.getElementById('editfab').style.opacity = "";
    document.getElementById('nav_edit').style.visibility = "";
    document.getElementById('nav_star').style.visibility = "";
    document.getElementById('nav_star').style.visibility = "";
    $('nav a').css({
        'pointer-events': 'unset'
    });
    document.getElementById('nav_delete').style.visibility = "";
    document.getElementById('fab').style.opacity = "";
    M.toast({
        html: "Network connection has been restored!"
    });
    $(document).ready(function() {
        var q = document.querySelector('.card');
        for (i = 0; i < q.length; i++) {
            q[i].style.pointerEvents = ''
        }
    });
}
window.addEventListener('offline', disable_online_events);
window.addEventListener('online', enable_online_events);
if (!navigator.onLine) {
    disable_online_events()
} else {
    $(document).ready(function() {
        $('nav a').css('pointer-events', 'unset');
        $('nav a').css('opacity', '1');
    });
}

function nav_title(data) {
    brandlogotext.innerHTML = data;
}

function back() {
    document.body.style.overflow = '';
    document.getElementById('editfab').style.display = 'none';
    document.getElementById('edit_nav').style.display = 'none';
    document.getElementById("FLOATING_ACTION_BUTTON").style.display = "block";
    if (page_title == 'News') {
        nav_title('Dashboard');
    }
    sm_page(page_title);
    document.querySelector('meta[name="theme-color"]').setAttribute('content', user.theme_top_color);
}

function desktop_ping(theBody, theTitle) {
    var dts = Math.floor(Date.now());
    var options = {
        body: theBody,
        icon: 'https://i.ibb.co/pxpvwT8/logo-z3yoqm.png',
        timestamp: dts,
    };
    var n = new Notification(theTitle, options);
    n.onclick = function() {
        event.preventDefault();
        window.focus();
        sm_page('notification_popup');
        AJAX_LOAD("#notification_popup", "./rooms/notifications.php")
    };
    document.addEventListener('visibilitychange', function() {
        if (document.visibilityState === 'visible') {
            n.close();
        }
    });
    syncalertplayAudio();
}
document.body.addEventListener('load', function() {
    if (document.documentElement.getAttribute('data-theme') === "dark") {
        document.querySelector("meta[name=theme-color]").setAttribute("content", '#1f1f1f');
    }
});
$("#edit_form").submit(function(e) {
    e.preventDefault();
    sm_page('ajax_loader');
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(data) {
            document.getElementById('edit_form').reset();
            sm_page(editPopupRoom);
            if (editPopupRoom !== "custom_room") {
                AJAX_LOAD("#" + editPopupRoom, "./rooms/" + editPopupRoom1 + "/view.php");
            } else {
                //   load_croom(editPopupRoom1, "");
            }
        }
    });
});

function mtoggle(el) {
    el.classList.toggle('green');
    el.classList.toggle('darken-3');
    el.classList.toggle('white-text');
}
$("#search_bar").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    sm_page('ajax_loader');
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(data) {
            document.getElementById('searchresults').innerHTML = data;
            qq();
            sm_page('searchresults');
        }
    });


});
window.addEventListener('load', function() {
    var btns = document.querySelectorAll('.links a');
    for (i = 0; i < btns.length; i++) {
        btns[i].addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                this.click();
            }
        });
    }
});
var interval = setInterval(function() {
    if (sessionStorage.getItem('status') == null) {
        clearInterval(interval)
        // window.location.href = "https://smartlist.ga/dashboard/login.php?inactive";
        // alert(1)
    }
}, 300000);

function highlight(el) {
    var t = document.querySelectorAll('.pagination_container button');
    for (i = 0; i < t.length; i++) {
        t[i].classList.remove('paginationActive');
        t[i].classList.remove('waves-light');
    }
    el.classList.add('paginationActive');
    el.classList.remove('waves-light');
}

function addPagerToTables(tables, rowsPerPage = 10) {
    tables = typeof tables == "string" ? document.querySelectorAll(tables) : tables;
    for (let table of tables)
        addPagerToTable(table, rowsPerPage);
}

function addPagerToTable(table, rowsPerPage = 10) {
    let tBodyRows = table.querySelectorAll('tBody tr:not(.hover)');
    let numPages = Math.ceil(tBodyRows.length / rowsPerPage);
    let colCount = [].slice.call(
            table.querySelector('tr').cells
        )
        .reduce((a, b) => a + parseInt(b.colSpan), 0);
    if (numPages !== 1) {
        var as = table.createTFoot().insertRow();
        as.classList.add('skipRow');
        as.innerHTML = `<td></td><td colspan=${colCount-1}><div class="pagination_container"></div></td>`;
    }
    if (numPages == 1)
        return;
    for (i = 0; i < numPages; i++) {
        let pageNum = i + 1;
        table.querySelector('.pagination_container')
            .insertAdjacentHTML(
                'beforeend',
                `<button rel="${i}" class="pagination_btn waves-effect${(i == 0 ? " paginationActive waves-light" : "")}">${pageNum}</button> `
            );
    }
    for (let navA of table.querySelectorAll('.pagination_container button')) {
        navA.addEventListener('click', function(e) {
            changeToPage(table, parseInt(e.target.innerHTML), rowsPerPage);
            highlight(this)
        });
    }
    changeToPage(table, 1, rowsPerPage);
}

function changeToPage(table, page, rowsPerPage) {
    let startItem = (page - 1) * rowsPerPage;
    let endItem = startItem + rowsPerPage;
    let navAs = table.querySelectorAll('.pagination_container button');
    let tBodyRows = table.querySelectorAll('tBody tr');
    for (let nix = 0; nix < navAs.length; nix++) {
        if (nix == page - 1)
            navAs[nix].classList.add('active');
        else
            navAs[nix].classList.remove('active');
        for (let trix = 0; trix < tBodyRows.length; trix++)
            tBodyRows[trix].style.display =
            (trix >= startItem && trix < endItem) ?
            '' :
            'none';
    }
}

function qq() {
    $("#noSearchResultsHeading").show();
    $("#noSearchResultsContainer").hide()
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("q");
    filter = input.value.toUpperCase();
    ul = document.getElementById("search_results");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].classList.remove('hide')
        } else {
            li[i].classList.add('hide')
        }
    }
    if ($("#search_results li:not(.hide)").length == 0) {
        $('#noSearchResultsHeading').hide();
        $("#noSearchResultsContainer").show()
    }
}

var ele = document.documentElement;
// ele.style.cursor = 'grab';

let pos = {
    top: 0,
    left: 0,
    x: 0,
    y: 0
};

var mouseDownHandler = function(e) {
    // ele.style.cursor = 'grabbing';
    ele.style.userSelect = 'none';

    pos = {
        left: ele.scrollLeft,
        top: ele.scrollTop,
        // Get the current mouse position
        x: e.clientX,
        y: e.clientY,
    };

    document.addEventListener('mousemove', mouseMoveHandler);
    document.addEventListener('mouseup', mouseUpHandler);
};

var mouseMoveHandler = function(e) {
    // How far the mouse has been moved
    var dx = e.clientX - pos.x;
    var dy = e.clientY - pos.y;

    // Scroll the element
    ele.scrollTop = pos.top - dy;
    ele.scrollLeft = pos.left - dx;
};

var mouseUpHandler = function() {
    // ele.style.cursor = 'grab';
    ele.style.removeProperty('user-select');

    document.removeEventListener('mousemove', mouseMoveHandler);
    document.removeEventListener('mouseup', mouseUpHandler);
};

// Attach the handler
ele.addEventListener('mousedown', mouseDownHandler);

function copyToClipboard(data) {
    console.log(data)
    var copyText = document.getElementById("copyToClipboard");
    copyText.type = 'text';
    copyText.value = data;
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    document.execCommand("copy");
    M.toast({
        html: "Copied text to Clipboard"
    });
    copyText.type = 'hidden';

}