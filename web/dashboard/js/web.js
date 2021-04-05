var brandlogotext = document.getElementById("brandlogo");
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {} else {
    var ds = new DragSelect({
        selectables: document.querySelectorAll('.draggables'),
        area: document.getElementById('Contact'),
        callback: e => console.log(e),
    });
}
$(document).ready(function() {
    $('input.autocomplete').autocomplete({
        data: {
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
        },
        limit: 3,
    });
});
$(document).ready(function() {
    $('.sidenav').sidenav();
    $('.collapsible').collapsible();
});
$('.tap-target').tapTarget();
$(document).ready(function() {
    $('.fixed-action-btn').floatingActionButton();
});
$(document).ready(function() {
    $("#kitchen_search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#kitchen_table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
$("#notification").on("click", function() {
    $("#hide").css('display', 'none');

    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    } /*function myFunctiona() { var xt = document.getElementById("myDIVa"); if (xt.style.display === "none") { xt.style.display = "block"; } else { xt.style.display = "none"; } }*/
    $(document).ready(function() {
        $('.sidenav').sidenav().on('click tap', 'li a', () => {
            /*$('.sidenav').sidenav('close');*/
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                $('.sidenav').sidenav('close');
            }
        });
    });
    $(document).ready(function() {
        $('.modal').modal();
    });
    var animals = [];

    function openPage(pageName, elmnt, color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {}
        document.getElementById(pageName).style.display = "block";
        $(pageName).scrollTop(0);
        window.scrollTo(0, 0);
        document.getElementById("secondary_nav").style.display = "none";
        animals.push(pageName);
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
            document.getElementById("imageid").src = "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.whatswithtech.com%2Fwp-content%2Fuploads%2F2015%2F09%2Fblack-and-blue-material-design-wallpaper.png&f=1&nofb=1";
        }
    }
    function switchTheme(e) {
        if (e.target.checked) {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
             metaThemeColor = document.querySelector("meta[name=theme-color]");
            metaThemeColor.setAttribute("content", "#191918");
            document.getElementById("imageid").src = "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.whatswithtech.com%2Fwp-content%2Fuploads%2F2015%2F09%2Fblack-and-blue-material-design-wallpaper.png&f=1&nofb=1";
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
             metaThemeColor = document.querySelector("meta[name=theme-color]");
            metaThemeColor.setAttribute("content", "#2a1782");
        }
    }
    toggleSwitch.addEventListener('change', switchTheme, false);
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
                    break;
                case 'e':
                    event.preventDefault();
                    $('.modal').modal('close');
                    openPage('modal1', this, '');
                    brandlogotext.innerHTML = 'Settings';
                    break;
                case 'b':
                    event.preventDefault();
                    $('.modal').modal('close');
                    openPage('budgetmetermodal', this, '');
                    break;
                case 's':
                    event.preventDefault();
                    $('.modal').modal('close');
                    $('#budgetmetermodala').modal('open');
                    break;
            }
        }
    });
    var length = $('ul#menu li').length;
    document.getElementById('badge').innerHTML = length;
    $(document).ready(function() {
        $('.sidenav').sidenav().on('click tap', 'li a', () => {
            document.getElementById("bar").style.display = "block";
            setTimeout(function() {
                document.getElementById("bar").style.display = "none"
            }, 2000);
        });
    });
    $(document).ready(function() {
        $(".card a").click(function() {
            document.getElementById("bar").style.display = "block";
            setTimeout(function() {
                document.getElementById("bar").style.display = "none"
            }, 2000);
        });
    });

    function toast(name, qty) {
        M.toast({
            html: "Deleted \"" + name + '" <a class="btn-flat toast-action waves-effect waves-orange text-white" style="color: white !important" href="https://smartlist.ga/dashboard/exe.php?name=' + encodeURI(name) + '&qty=' + qty + '&price=1">Undo</a>'
        });
    }
    localStorage.setItem("hidea", $("#hide").is(":visible"));
});
localStorage.hidea == "false" ? $("#hide").css('display', 'none') : $("#hide").show();

function desktop_ping(theBody, theTitle) {
    var dts = Math.floor(Date.now());
if (!('Notification' in window)) {
    var options = {
        body: theBody,
        icon: 'https://i.ibb.co/FDqN0Vh/Screenshot-2021-02-02-at-7-55-08-AM-2.png',
        timestamp: dts,
        buttons: [{
            title: "Yes, get me there",
            iconUrl: "/path/to/yesIcon.png"
        }]
    };
    var n = new Notification(theTitle, options);
    n.onclick = function() {
        event.preventDefault();
        window.focus();
        openPage('myDIVa', '', '')
    };
    document.addEventListener('visibilitychange', function() {
        if (document.visibilityState === 'visible') {
            n.close();
        }
    });
    syncalertplayAudio();
}
}