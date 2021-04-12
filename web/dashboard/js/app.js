var item_state, item_p; var page_title = 'News';
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
    M.toast({html: "Thanks for your submission!"});
    $('#_feedback').modal('close');
    form.reset();
  }).catch(error => {
    status.innerHTML = "Oops! There was a problem submitting your form";
  });
}
form.addEventListener("submit", handleSubmit)
  function edit_popup(id, name, qty, price, room) {
      sm_page('edit_page', '', '');
      var x = document.getElementById('edit_nav');
      var name1 = document.getElementById('edit_item_name');
      var qty1 = document.getElementById('edit_item_qty');
      x.style.display = 'block';
      var form = document.getElementById('edit_form');
      switch(room) { 
        case 'bedroom': room1 = 'Home'; form.action = './rooms/bedroom/edit.php'; break;
        case 'kitchen': room1 = 'Contact'; form.action = 'edit.php'; break;
        case 'bathroom': room1 = 'bathroom'; form.action = './rooms/bathroom/edit.php'; break;
        case 'garage': room1 = 'About'; form.action = './rooms/garage/edit.php'; break;
        case 'garage': room1 = 'About'; form.action = './rooms/garage/edit.php'; break;
        case 'storage': room1 = 'storage'; form.action = './rooms/storage/edit.php'; break;
        case 'dining_room': room1 = 'dining_room'; form.action = './rooms/dining_room/edit.php'; break;
        case 'laundryroom': room1 = 'laundryroom'; form.action = './rooms/laundry/edit.php'; break; 
        case 'camping': room1 = 'cs'; form.action = './rooms/camping/edit.php'; break;
        case 'custom_room': room1 = 'custom_room'; form.action = './rooms/custom_item_edit.php'; break;
      }
      document.getElementById('edit_item_id').value = id; name1.value = name; name1.focus(); qty1.value = qty; qty1.focus();
      document.getElementById('editback').onclick = function() {edit_back(room1);};
  }
  function edit_back(data) {
      var x = document.getElementById('edit_nav');
      x.style.display = 'none';
      sm_page(data, this, '');
  }
function item(id, name, qty, price, directory, room, star) {
    document.getElementById('action_qr').href = "https://api.qrserver.com/v1/create-qr-code/?size=1500x1500&data=" + encodeURI("I currently have " + qty + " " + name + " in my inventory");
    var nav_star_i = document.querySelector('#nav_star i');
    var edit_fab = document.getElementById('editfab');
    var action_recipe = document.getElementById('action_recipe');
    var navedit = document.getElementById('nav_edit');
    edit_fab.style.display = 'block';
    edit_fab.style.transform = 'scale(0)';
    setTimeout(function() {
        edit_fab.style.display = 'block';
        edit_fab.style.transform = 'scale(1)';
    }, 10);
    edit_fab.onclick = function() {
        setTimeout(function() {
            edit_popup(id, name, qty, price, room);
        }, 0.001);
    };
    document.body.style.overflow = 'hidden';
    document.getElementById('nav_star').style.display = '';
    document.getElementById('action_share_p').onclick = function() {
        if (navigator.share) {
            document.getElementById('action_share_p').style.display = "block";
            navigator.share({
                title: document.title,
                text: "I'm currently having " + qty + " " + name + " in my inventory.",
                url: window.location.href
            }).then(() => console.log('Successful share')).catch(error => console.log('Error sharing:', error));
        }
    };
    document.getElementById("FLOATING_ACTION_BUTTON").style.transform = "scale(0)";
    document.querySelector("meta[name=theme-color]").setAttribute("content", "#1f1f1f");
    switch(room) { case 'bedroom': page_title = 'Home'; break; case 'kitchen': page_title = 'Contact'; break; case 'bathroom': page_title = 'bathroom'; break; case 'garage': page_title = 'About'; break; case 'garage': page_title = 'About'; break; case 'family': page_title = 'family'; break; case 'storage': page_title = 'storage'; break; case 'dining_room': page_title = 'dining_room'; break; case 'laundryroom': page_title = 'laundryroom'; break; case 'camping': page_title = 'cs'; break; case 'custom_room': page_title = 'custom_room'; page_title = 'custom_room'; document.getElementById('nav_star').style.display = 'none'; break; }
    item_state = 'item_popup';
    item_p = 1;
    document.getElementById("action_delete").onclick = function() {
        document.getElementById(room + 'tr_' + id).style.display = 'none';
        if (room == 'kitchen') { toast(name, qty); } else { M.toast({ html: 'Deleted!' }); }
        $("#div1").load(directory + "delete.php?id=" + id);
        sm_page(page_title, '', '');
    };
    document.getElementById("nav_delete").onclick = function() {
        document.getElementById(room + 'tr_' + id).style.display = 'none';
        if (room == 'kitchen') {
            toast(name, qty);
        } else {
            M.toast({ html: 'Deleted "'+name+'"' });
        }
        $("#div1").load(directory + "delete.php?id=" + id);
        sm_page(page_title, '', '');
    };
    if (star == 0) { nav_star_i.innerHTML = 'star_outline'; } else { nav_star_i.innerHTML = 'star'; }
    var _navstar = document.getElementById("nav_star");
    switch(room) {
        case 'kitchen': 
            _navstar.onclick = function() {
                if (nav_star_i.innerHTML == 'star') {
                    nav_star_i.innerHTML = 'star_outline';
                    $('#div1').load('https://smartlist.ga/dashboard/star.php?id=' + id);
                    document.getElementById('kitchentr_' + id).onclick = function() {
                        item(id, name, qty, price, directory, room, 0);
                    };
                    document.getElementById('kitchentr_' + id).style.borderLeft = '';
                } else {
                    nav_star_i.innerHTML = 'star';
                    $('#div1').load('https://smartlist.ga/dashboard/star.php?id=' + id);
                    document.getElementById('kitchentr_' + id).onclick = function() {
                        item(id, name, qty, price, directory, room, 1);
                    };
                    document.getElementById('kitchentr_' + id).style.borderLeft = '3px solid #f57f17';
                }
                return false;
            }
            break;
        case 'bedroom': 
            _navstar.onclick = function() {
            if (nav_star_i.innerHTML == 'star') {
                nav_star_i.innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/bedroom/star.php?id=' + id);
                document.getElementById('bedroomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('bedroomtr_' + id).style.borderLeft = '';
                M.toast({
                    html: 'Un-Starred item'
                });
            } else {
                nav_star_i.innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/bedroom/star.php?id=' + id);
                document.getElementById('bedroomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1);
                };
                document.getElementById('bedroomtr_' + id).style.borderLeft = '3px solid #f57f17';
            }
            return false;
            };
            break;
        case 'garage': 
            _navstar.onclick = function() {
            if (nav_star_i.innerHTML == 'star') {
                nav_star_i.innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/garage/star.php?id=' + id);
                document.getElementById('garagetr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('garagetr_' + id).style.borderLeft = '';
            } else {
                nav_star_i.innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/garage/star.php?id=' + id);
                document.getElementById('garagetr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1);
                };
                document.getElementById('garagetr_' + id).style.borderLeft = '3px solid #f57f17';
            }
            return false;
            };
            break;
        case 'camping': 
            _navstar.onclick = function() {
            if (nav_star_i.innerHTML == 'star') {
                nav_star_i.innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/camping/star.php?id=' + id);
                document.getElementById('campingtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('campingtr_' + id).style.borderLeft = '';
            } else {
                nav_star_i.innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/camping/star.php?id=' + id);
                document.getElementById('campingtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1);
                };
                document.getElementById('campingtr_' + id).style.borderLeft = '3px solid #f57f17';
            }
            return false;
            };
            break;
        case 'bathroom':
            document.getElementById("nav_star").onclick = function() {
            if (nav_star_i.innerHTML == 'star') {
                nav_star_i.innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/bathroom/star.php?id=' + id);
                document.getElementById('bathroomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('bathroomtr_' + id).style.borderLeft = '';
            } else {
                nav_star_i.innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/bathroom/star.php?id=' + id);
                document.getElementById('bathroomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1);
                };
                document.getElementById('bathroomtr_' + id).style.borderLeft = '3px solid #f57f17';
            };
            return false;
            }
            break;
        case 'family': 
            _navstar.onclick = function() {
            if (nav_star_i.innerHTML == 'star') {
                nav_star_i.innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/family/star.php?id=' + id);
                document.getElementById('familytr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('familytr_' + id).style.borderLeft = '';
                M.toast({
                    html: 'Un-Starred item'
                });
            } else {
                nav_star_i.innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/family/star.php?id=' + id);
                document.getElementById('familytr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1);
                };
                document.getElementById('familytr_' + id).style.borderLeft = '3px solid #f57f17';
            }
            return false
            }
            break;
        case 'storage': 
            _navstar.onclick = function() {
            if (nav_star_i.innerHTML == 'star') {
                nav_star_i.innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/storage/star.php?id=' + id);
                document.getElementById('storagetr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('storagetr_' + id).style.borderLeft = '';
                M.toast({
                    html: 'Un-Starred item'
                });
            } else {
                nav_star_i.innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/storage/star.php?id=' + id);
                document.getElementById('storagetr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1);
                };
                document.getElementById('storagetr_' + id).style.borderLeft = '3px solid #f57f17';
            }
            return false
            }
            break;
        case 'laundryroom': 
            _navstar.onclick = function() {
            if (nav_star_i.innerHTML == 'star') {
                nav_star_i.innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/laundry/star.php?id=' + id);
                document.getElementById('laundryroomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('laundryroomtr_' + id).style.borderLeft = '';
            } else {
                nav_star_i.innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/laundry/star.php?id=' + id);
                document.getElementById('laundryroomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1);
                };
                document.getElementById('laundryroomtr_' + id).style.borderLeft = '3px solid #f57f17';
                }
                return false
            }
            break;
        case 'dining_room': 
             document.getElementById("nav_star").onclick = function() {
            if (nav_star_i.innerHTML == 'star') {
                nav_star_i.innerHTML = 'star_outline';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/dining_room/star.php?id=' + id);
                document.getElementById('dining_roomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 0);
                };
                document.getElementById('dining_roomtr_' + id).style.borderLeft = '';
            } else {
                nav_star_i.innerHTML = 'star';
                $('#div1').load('https://smartlist.ga/dashboard/rooms/dining_room/star.php?id=' + id);
                document.getElementById('dining_roomtr_' + id).onclick = function() {
                    item(id, name, qty, price, directory, room, 1);
                };
                document.getElementById('dining_roomtr_' + id).style.borderLeft = '3px solid #f57f17';
                }
                return false
            }
            break;
    } 
    document.getElementById('nav_edit').onclick = function() { setTimeout(function() { document.getElementById('editfab').click(); }, 100); } 
    document.getElementById('action_edit').onclick = function() { setTimeout(function() { document.getElementById('editfab').click(); }, 100); }
    action_recipe.href = "https://www.google.com/search?q=recipes+with+" + encodeURI(name);
    if (room !== 'kitchen') { action_recipe.style.display = 'none'; } else if (room == 'kitchen') { action_recipe.style.display = '0'; }
    document.getElementById('item_title').innerHTML = name;
    document.getElementById('item_qty').innerHTML = "Quantity: " + qty;
    document.getElementById('action_mail').href = "mailto:hello@homebase.rf.gd?subject=My%20Inventory%20Status%20%7C%20Smartlist&body=Hi%20_____%2C%0D%0AI'm%20currently%20having%20" + encodeURI(qty) + "%20" + encodeURI(name) + "%20in%20my%20" + encodeURI(room) + ".%0D%0A%0D%0AThank%20you%2C%0D%0ASincerely%2C%0D%0A________";
    document.getElementById('item_desc').innerHTML = "<div class='chip'>Category: " + price + "</div><div class='chip'>Room: " + room + "</div>";
    if (room == 'kitchen') { document.getElementById('item_desc').style.display = 'block' } else { document.getElementById('item_desc').innerHTML = "<div class='chip'>Room: " + room + "</div>"; }
    if (id == 'KITCHEN_IDENTIFY_BY_NAME') { document.getElementById("action_delete").onclick = function() { document.getElementById('KITCHEN_tr_' + name).style.display = 'none'; toast(name, qty); $("#div1").load("https://smartlist.ga/dashboard/rooms/kitchen/quickdelete.php?name=" + encodeURI(name) + "&qty=" + encodeURI(qty) + "&price=" + encodeURI(price)); sm_page(page_title, '', '') }; document.getElementById("nav_delete").onclick = function() { document.getElementById('KITCHEN_tr_' + name).style.display = 'none'; toast(name, qty); $("#div1").load("https://smartlist.ga/dashboard/rooms/kitchen/quickdelete.php?name=" + encodeURI(name) + "&qty=" + encodeURI(qty) + "&price=" + encodeURI(price)); sm_page(page_title, '', '') } }
    else if (id == 'BEDROOM_IDENTIFY_BY_NAME') { document.getElementById("action_delete").onclick = function() { document.getElementById('BEDROOM_tr' + name).style.display = 'none'; M.toast({ html: 'Deleted!' }); $("#div1").load("https://smartlist.ga/dashboard/rooms/bedroom/quickdelete.php?name=" + encodeURI(name) + "&qty=" + encodeURI(qty)); sm_page(page_title, '', '') }; document.getElementById("nav_delete").onclick = function() { document.getElementById('BEDROOM_tr' + name).style.display = 'none'; M.toast({ html: 'Deleted!' }); $("#div1").load("https://smartlist.ga/dashboard/rooms/bedroom/quickdelete.php?name=" + encodeURI(name) + "&qty=" + encodeURI(qty)); sm_page(page_title, '', '') }; }
    if (id == 'BATHROOM_IDENTIFY_BY_NAME') { document.getElementById("action_delete").onclick = function() { document.getElementById('BATHROOM_tr' + name).style.display = 'none'; M.toast({ html: 'Deleted!' }); $("#div1").load("https://smartlist.ga/dashboard/rooms/bathroom/quickdelete.php?name=" + encodeURI(name) + "&qty=" + encodeURI(qty)); sm_page(page_title, '', '') }; document.getElementById("nav_delete").onclick = function() { document.getElementById('BATHROOM_tr' + name).style.display = 'none'; M.toast({ html: 'Deleted!' }); $("#div1").load("https://smartlist.ga/dashboard/rooms/bathroom/quickdelete.php?name=" + encodeURI(name) + "&qty=" + encodeURI(qty)); sm_page(page_title, '', '') }; }
    document.getElementById('action_share').href = "https://smartlist.ga/dashboard/rooms/share/?name=" + encodeURI(name) + "&itemqty=" + encodeURI(qty) + "&room=kitchen&id=" + id + "&new=true" + id;
    sm_page('item_popup', this, '');
    secondary();
  if (room == 'custom_room') { document.getElementById('nav_delete').onclick = function() { $('#div1').load('./rooms/custom_item_delete.php?id='+id); sm_page('custom_room', this, ''); document.getElementById('croomtr_'+id).style.background = 'rgba(235, 185, 181, .5)'; setTimeout(function(){  document.getElementById('croomtr_'+id).style.display = 'none';}, 1000); }; document.getElementById('action_delete').onclick = function() { $('#div1').load('./rooms/custom_item_delete.php?id='+id); sm_page('custom_room', this, ''); document.getElementById('croomtr_'+id).style.background = 'rgba(235, 185, 181, .5)'; setTimeout(function(){ document.getElementById('croomtr_'+id).style.display = 'none';}, 1000); }; };
  }
const __bmconfig = {
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true,
            },
            scaleLabel: {
                display: true,
                labelString: 'You spent '
            }
        }],
        xAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
            scaleLabel: {
                display: true,
                labelString: 'Date'
            }
        }]
    },
    tooltips: {
        titleFontSize: 16,
        caretPadding: 10,
        bodyFontSize: 14,
        mode: 'index',
        intersect: false,
        displayColors: false,
        xPadding: 20,
        yPadding: 15,
        bodyFontColor: '#919191',
        backgroundColor: '#fff',
        cornerRadius: 6,
        borderColor: '#ccc',
        borderWidth: 1.5,
        titleFontColor: '#212121',
        callbacks: {
            label: function(tooltipItems, data) {
                return data.datasets[tooltipItems.datasetIndex].label + ': ' + tooltipItems.yLabel + ' dollars';
            },
        },
    },
    hover: {
        mode: 'nearest',
        intersect: true
    },
    elements: {
        animationEasing: 'easeIn',
        line: {
            tension: 0.2
        },
        point: {
            radius: 0
        }
    },
};

function bm_add() {
    var x = document.getElementById('bm_amount');
    $('#div1').load('https://smartlist.ga/scalesize/bm/addx.php?n=' + x.value);
    addData(myChart, new Date().toJSON().slice(0, 10).split('-').reverse().join('/'), x.value);
    x.value = '';
    sm_page('News', this, '');
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
        document.querySelector(el).innerHTML = "<div style='width:100%;background:rgba(200,200,200,.3);height:300px'></div>";
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
    $(document).ready(function() { $('input.autocomplete').autocomplete({ onAutocomplete: function() { nav_title('Search Results'); w_title('Search Results'); changeValue(); sm_page('searchresults', this, ''); }, data: { "Apple": 'https://media.istockphoto.com/photos/red-apple-with-leaf-picture-id683494078?k=6&m=683494078&s=612x612&w=0&h=aVyDhOiTwUZI0NeF_ysdLZkSvDD4JxaJMdWSx2p3pp4=', "Banana": null, "Orange": null, "Coriander": null, "Kale": null, "Watermelon": null, "Mango": null, "Noodles": null, "Juice": null, "Dal": null, "Black beans": null, "Kidney beans": null, "Coconuts": null, "Dark Chocolate": null, "Bread": null, "Chocolate": null, "Yogurt": null, "Milk": null, "Cilantro": null, "Sooji fine": null, "Saaru powder": null, "Pineapple": null, "Almond": null, "Carrot": null, "Brocolli": null, "JavaScript": null, "Lisp": null, "Perl": null, "PHP": null, "Python": null, "Ruby": null, "Scala": null, "Scheme": null, "Apricot": null, "Artichoke": null, "Asian Pear": null, "Asparagus": null, "Atemoya": null, "Avocado": null, "Bamboo Shoots": null, "Bean Sprouts": null, "Beans": null, "Beets": null, "Belgian Endive": null, "Bell Peppers": null, "Bitter Melon": null, "Blackberries": null, "Blueberries": null, "Bok Choy": null, "Boniato": null, "Boysenberries": null, "Broccoflower": null, "Broccoli": null, "Brussels Sprouts": null, "Cabbage": null, "Cactus Pear": null, "Cantaloupe": null, "Carambola": null, "Carrots": null, "Casaba Melon": null, "Cauliflower": null, "Celery": null, "Chayote": null, "Cherimoya": null, "Cherries": null, "Collard Greens": null, "Corn": null, "Cranberries": null, "Cucumber": null, "Dates": null, "Dried Plums": null, "Eggplant": null, "Endive": null, "Escarole": null, "Feijoa": null, "Fennel": null, "Figs": null, "Garlic": null, "Gooseberries": null, "Grapefruit": null, "Grapes": null, "Green Beans": null, "Green Onions": null, "Greens": null, "Guava": null, "Hominy": null, "Honeydew Melon": null, "Horned Melon": null, "Iceberg Lettuce": null, "Jerusalem Artichoke": null, "Jicama": null, "Kiwifruit": null, "Kohlrabi": null, "Kumquat": null, "Leeks": null, "Lemons": null, "Lettuce": null, "Lima Beans": null, "Limes": null, "Longan": null, "Loquat": null, "Lychee": null, "Madarins": null, "Malanga": null, "Mandarin Oranges": null, "Mangos": null, "Mulberries": null, "Mushrooms": null, "Napa": null, "Nectarines": null, "Okra": null, "Onion": null, "Oranges": null, "Papayas": null, "Parsnip": null, "Passion Fruit": null, "Peaches": null, "Pears": null, "Peas": null, "Peppers": null, "Persimmons": null, "Plantains": null, "Plums": null, "Pomegranate": null, "Potatoes": null, "Prickly Pear": null, "Prunes": null, "Pummelo": null, "Pumpkin": null, "Quince": null, "Radicchio": null, "Radishes": null, "Raisins": null, "Raspberries": null, "Red Cabbage": null, "Rhubarb": null, "Romaine Lettuce": null, "Rutabaga": null, "Shallots": null, "Snow Peas": null, "Spinach": null, "Sprouts": null, "Squash": null, "Strawberries": null, "String Beans": null, "Sweet Potato": null, "Tangelo": null, "Tangerines": null, "Tomatillo": null, "Tomato": null, "Turnip": null, "Ugli Fruit": null, "Water Chestnuts": null, "Watercress": null, "Waxed Beans": null, "Yams": null, "Yellow Squash": null, "Yuca/Cassava": null, "Zucchini Squash": null, }, limit: 3, });
    $('.modal').modal({
        onCloseStart: function() {
            w_title('Dashboard');
        }
    });
    $('.sidenav').sidenav();
    $('.collapsible').collapsible();
    $('#fab').floatingActionButton();
    $('#modal').modal();
    $('.dropdown-trigger').dropdown();
    $('.tooltipped').tooltip({
        transitionMovement: 5
    });
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
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("FLOATING_ACTION_BUTTON").style.width = '130px';
        document.getElementById("FLOATING_ACTION_BUTTON").getElementsByTagName('i')[0].classList.remove('active_i');
        setTimeout(function() {
            document.getElementById("FLOATING_ACTION_BUTTON").getElementsByTagName('span')[0].style.opacity = 1;
        }, 200);
    } else {
        document.getElementById("FLOATING_ACTION_BUTTON").getElementsByTagName('span')[0].style.opacity = 0;
        setTimeout(function() {
            document.getElementById("FLOATING_ACTION_BUTTON").style.width = '56px';
            document.getElementById("FLOATING_ACTION_BUTTON").getElementsByTagName('i')[0].classList.add('active_i');
        }, 100);
    }
    prevScrollpos = currentScrollPos;
};
var smartlist_page_names = [];

function sm_page(pageName, elmnt, color) {
    document.getElementById("searchbar").style.display = "none";
    document.getElementById('editfab').style.display = 'none';
    document.body.style.overflow = '';
    document.getElementById('edit_nav').style.display = 'none';
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
            sm_page('notification_popup', '', '');
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
};

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
var map = {};
onkeydown = onkeyup = function(e) {
    e = e || event;
    map[e.keyCode] = e.type == 'keydown';
    if (map["191"] == true) {
        e.preventDefault();
        showsearch();
        document.getElementById('search').focus();
    }
};
Pusher.logToConsole = false;
var pusher = new Pusher('70e2355e418d35261aca', {
    cluster: 'us3'
});
var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    var notification = new Notification("" + data);
});
$(document).ready(function() { $('input.autocomplete1').autocomplete({ data: { "Apple": null, "Banana": null, "Orange": null, "Coriander": null, "Kale": null, "Watermelon": null, "Mango": null, "Noodles": null, "Juice": null, "Dal": null, "Black beans": null, "Kidney beans": null, "Coconuts": null, "Dark Chocolate": null, "Bread": null, "Chocolate": null, "Yogurt": null, "Milk": null, "Cilantro": null, "Sooji fine": null, "Saaru powder": null, "Pineapple": null, "Almond": null, "Carrot": null, "Brocolli": null, "JavaScript": null, "Lisp": null, "Perl": null, "PHP": null, "Python": null, "Ruby": null, "Scala": null, "Scheme": null, "Apricot": null, "Artichoke": null, "Asian Pear": null, "Asparagus": null, "Atemoya": null, "Avocado": null, "Bamboo Shoots": null, "Bean Sprouts": null, "Beans": null, "Beets": null, "Belgian Endive": null, "Bell Peppers": null, "Bitter Melon": null, "Blackberries": null, "Blueberries": null, "Bok Choy": null, "Boniato": null, "Boysenberries": null, "Broccoflower": null, "Broccoli": null, "Brussels Sprouts": null, "Cabbage": null, "Cactus Pear": null, "Cantaloupe": null, "Carambola": null, "Carrots": null, "Casaba Melon": null, "Cauliflower": null, "Celery": null, "Chayote": null, "Cherimoya": null, "Cherries": null, "Collard Greens": null, "Corn": null, "Cranberries": null, "Cucumber": null, "Dates": null, "Dried Plums": null, "Eggplant": null, "Endive": null, "Escarole": null, "Feijoa": null, "Fennel": null, "Figs": null, "Garlic": null, "Gooseberries": null, "Grapefruit": null, "Grapes": null, "Green Beans": null, "Green Onions": null, "Greens": null, "Guava": null, "Hominy": null, "Honeydew Melon": null, "Horned Melon": null, "Iceberg Lettuce": null, "Jerusalem Artichoke": null, "Jicama": null, "Kiwifruit": null, "Kohlrabi": null, "Kumquat": null, "Leeks": null, "Lemons": null, "Lettuce": null, "Lima Beans": null, "Limes": null, "Longan": null, "Loquat": null, "Lychee": null, "Madarins": null, "Malanga": null, "Mandarin Oranges": null, "Mangos": null, "Mulberries": null, "Mushrooms": null, "Napa": null, "Nectarines": null, "Okra": null, "Onion": null, "Oranges": null, "Papayas": null, "Parsnip": null, "Passion Fruit": null, "Peaches": null, "Pears": null, "Peas": null, "Peppers": null, "Persimmons": null, "Plantains": null, "Plums": null, "Pomegranate": null, "Potatoes": null, "Prickly Pear": null, "Prunes": null, "Pummelo": null, "Pumpkin": null, "Quince": null, "Radicchio": null, "Radishes": null, "Raisins": null, "Raspberries": null, "Red Cabbage": null, "Rhubarb": null, "Romaine Lettuce": null, "Rutabaga": null, "Shallots": null, "Snow Peas": null, "Spinach": null, "Sprouts": null, "Squash": null, "Strawberries": null, "String Beans": null, "Sweet Potato": null, "Tangelo": null, "Tangerines": null, "Tomatillo": null, "Tomato": null, "Turnip": null, "Ugli Fruit": null, "Water Chestnuts": null, "Watercress": null, "Waxed Beans": null, "Yams": null, "Yellow Squash": null, "Yuca/Cassava": null, "Zucchini Squash": null, "Buffet": null, "Chairs": null, "Lamps": null, "Rugs": null, "Table": null, "Curtains": null, "Draperies": null, "Window Hardware": null, "Mirrors": null, "Clocks": null, "China": null, "Crystal": null, "Linens": null, "Silver ": null, "Flatware": null, "Paintings ": null, "Appliances ": null, "Cabinets and Contents ": null, "Wall Shelving": null, "China Cabinet": null, "Stove/Oven": null, "Refrigerator": null, "Dishwasher": null, "Utensils": null, "Cutlery": null, "Dishes ": null, "Glassware": null, "Freezer": null, "Microwave": null, "Rotisserie": null, "Food Processor": null, "Mixer": null, "Blender": null, "Radio": null, "Clock": null, "Television": null, "Ceiling Fan": null, "Cookbooks": null, "Foods": null, "Garbage Disposal": null, "Liquors": null, "Pots and Pans": null, "Small Appliances": null, "Telephone": null, "Washer": null, "Dryer": null, "Ironing Board": null, "Iron": null, "Closet Contents ": null, "Bookcases": null, "Books": null, "Compact Discs ": null, "Computer": null, "Couches": null, "Desk": null, "Drapes": null, "Electronic Games ": null, "Entertainment Centre": null, "Fireplace Equipment ": null, "Games/Toys ": null, "Hobby Equipment ": null, "Piano": null, "Pictures": null, "Tables": null, "VCR": null, "DVDs ": null, "DVD Player": null, "Tapes ": null, "Window Air Conditioner": null, "Whirlpool": null, "Hamper": null, "Hair Dryer": null, "Scale": null, "Shower Curtain": null, "Electric Razors": null, "Medications ": null, "Humidifier": null, "Pictures ": null, "Furniture ": null, "Bed": null, "Mattress/Box Spring": null, "Bedding": null, "Dressers": null, "Radios": null, "Nightstands": null, "Men’s Clothing ": null, "Women’s Clothing ": null, "Children’s Clothing ": null, "Shoes ": null, "Handbags ": null, "Vacuum Cleaner": null, "Auto Equipment ": null, "Bicycles": null, "Garden Furniture": null, "Garden Tools": null, "Lawn Furniture": null, "Power Tools ": null, "Sports Equipment ": null, "Storage Shelving": null, "Furniture": null, "Trunks": null, "Cameras": null, "Golf Equipment": null, "Ski Equipment": null, "Boating Equipment": null, "Paint Set": null, "Pool Table": null, "Exercise Equipment": null, "Hunting Equipment": null, "Fishing Equipment": null, "Stamp Collection": null, "Carving Set": null, "Sewing Machine": null, "Bowling Equipment": null, "Camping Equipment": null, "Games": null, "Ice Skating Equipment": null, "Tennis Equipment": null, "Home Computer": null, "Modem": null, "Hard Drive": null, "Scanner": null, "Printer": null, "Fax Machine": null, "Antiques": null, "Bracelets": null, "Brooches": null, "Central Air Conditioning Unit": null, "Central Heating Unit": null, "Earrings": null, "Fine Art": null, "Furs": null, "Hobby Collections": null, "Necklaces": null, "Other Jewellery": null, "Rings": null, "Watches": null, "Sculptures": null, "Handbags": null, }, limit: 6, }); });
dragElement(document.getElementById("budgetmetermodala"));
dragElement(document.getElementById("right_click_modal"));

function dragElement(elmnt) {
    var pos3 = 0,
        pos4 = 0;
    if (document.getElementById(elmnt.id)) {
        document.getElementById(elmnt.id).onmousedown = dragMouseDown;
    } else {
        elmnt.onmousedown = dragMouseDown;
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
        e.preventDefault();
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    }

    function closeDragElement() {
        document.onmouseup = null;
        document.ontouchend = null;
        document.onmousemove = null;
        setTimeout(function() {
            elmnt.style.top = "";
        }, 1000);
        return false;
    }
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function _settingsLoad(el, data) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("__SETTINGSPAGE");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.querySelectorAll(".__sidebar a");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.boxShadow = "";

    }
    document.getElementById('_smSettingsPage_' + data).style.display = "block";
    el.style.boxShadow = 'inset 2px 0px 0px 0px rgba(230,81,0,1)';
}
$(document).ready(function() {
    document.getElementById('__def').click();
});
var bedroom_qty, bedroom_name, bathroom_qty, bathroom_name, searcha, qtay, date;
function add() {
  $('.modal').modal('close');
  sm_page('ajax_loader', this, '');
  searcha = document.getElementById("tags").value.replace(/['"]+/g, ''); 
  qtay = document.getElementById("qty").value.replace(/['"]+/g, '');
  date = document.getElementById("date").value.replace(/['"]+/g, ''); 
$("#div1").load("https://smartlist.ga/dashboard/resources/modal.php?name=" + encodeURI(searcha) + "&qty=" + encodeURI(qtay) + "&price=" + encodeURI(date) + "", null, function() {AJAX_LOAD('#Contact', './rooms/kitchen/view.php');document.getElementById("tags").value = null;});
}
function add_bathroom() {
    $('.modal').modal('close');
    sm_page('bathroom', this, '');
    AJAX_LOAD('#bathroom', './rooms/bathroom/view.php');
    bathroom_qty = document.getElementById("bathroom_qty_input").value.replace(/['"]+/g, '');
    bathroom_name = document.getElementById("bathroom_name_input").value.replace(/['"]+/g, '');
    document.getElementById("bathroom_name_input").value = null;
    document.getElementById("bathroom_qty_input").value = 1;
    if (document.getElementById('bathroom_table_var')) {
        document.getElementById('bathroom_table_var').style.display = 'none';
    }
    $("#div1").load("https://smartlist.ga/dashboard/rooms/bathroom/quickadd.php?name=" + encodeURI(bathroom_name) + "&qty=" + encodeURI(bathroom_qty) + "");
    $('html, body').scrollTop($(document).height());
}

function add_bedroom() {
    $('.modal').modal('close');
    sm_page('Home', this, '');
    AJAX_LOAD('#Home', './rooms/bedroom/view.php');
    bedroom_qty = document.getElementById("bedroom_qty_input").value.replace(/['"]+/g, '');
    bedroom_name = document.getElementById("bedroom_name_input").value.replace(/['"]+/g, '');
    document.getElementById("bedroom_name_input").value = null;
    document.getElementById("bedroom_qty_input").value = null;
    $("#bedroom_table").append("<tr class='card-new'id='BEDROOM_tr" + bedroom_name + " onclick='item(\"BEDROOM_IDENTIFY_BY_NAME\", \"" + bedroom_name + "\", \"" + bedroom_qty + "\", \"\", \"\", \"bedroom\")'><td>" + bedroom_name + "</td><td>" + bedroom_qty + "</td></tr>");
    if (document.getElementById('BEDROOM_VAR_COUNT')) {
        document.getElementById('BEDROOM_VAR_COUNT').style.display = 'none';
    }
    $("#div1").load("https://smartlist.ga/dashboard/rooms/bedroom/quickadd.php?name=" + encodeURI(bedroom_name) + "&qty=" + encodeURI(bedroom_qty) + "");
    $('html, body').scrollTop($(document).height());
}
$("#garage_form").submit(function(e) {
    sm_page('ajax_loader', this, '');
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(data) {
            sm_page('About', this, '');
            var n = document.getElementById("garage_name_input").value;
            var q = document.getElementById("garage_qty_input").value;
            $("#garage_table").append("<tr class='card-new'id='GARAGE_tr" + n.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '_') + "' onclick='item(" + data + ", \"" + n.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '_') + "\", \"" + q.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '_') + "\", \"\", \"https://smartlist.ga/dashboard/rooms/garage/\", \"garage\")'><td>" + n + "</td><td>" + q + "</td></tr>");
            $('html, body').scrollTop($(document).height());
            document.getElementById("garage_form").reset();
        }
    });
});
history.pushState(null, null, 'beta');
window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'beta');
    $('.modal').modal('close');
    if (item_state == 'item_popup') {
        back();
        item_state = '1';
    }
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('.sidenav').sidenav('close');
    }
});
$(document).ready(function() {
    $('.sidenav a').css('pointer-events', 'unset');
    $('.sidenav a').css('opacity', '1');
    $('nav a').css('pointer-events', 'unset');
    $('nav a').css('opacity', '1');
});
$(document).ready(function() {
    var elems = document.querySelectorAll("input[type=range]");
    M.Range.init(elems);
});
document.getElementById('notification').addEventListener('click', function() {
  sm_page("notification_popup", this, "");
  AJAX_LOAD("#notification_popup", "./rooms/notifications.php");
  nav_title("Notifications");
  w_title("Notifications");
  document.getElementById("hide_notification").style.display="none";
});
document.getElementById('search_toggle').addEventListener('click', function(){
  showsearch();
  document.getElementById('search').focus();
});
document.getElementById('account_pair_view').addEventListener('click', function(){
  AJAX_LOAD('#pairb', 'https://smartlist.ga/dashboard/resources/pairs.php')
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
    document.getElementById('rclick_add').onclick = function() {$('#div1').load('./rooms/todo_qadd.php?name=' + encodeURI(__el1));M.toast({html: 'Item added successfully to grocery list'});};
    document.getElementById('rclick_edit').onclick = function() {edit_popup(el.getAttribute('data-id'), __el1, __el2, '', room);};
    switch(room) {
        case 'kitchen': directory = 'delete.php'; break;
        case 'bathroom': directory = './rooms/bathroom/delete.php'; break;
        case 'bedroom': directory = './rooms/bedroom/delete.php'; break;
        case 'garage': directory = './rooms/garage/delete.php'; break;
        case 'family': directory = './rooms/family/delete.php'; break;
        case 'custom_room': directory = './rooms/custom_item_delete.php'; break;
    }
    document.getElementById('rclick_delete').onclick = function() {$('#div1').load(directory + "?id=" + id);};
}
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-S0PH6N0Z7E');
