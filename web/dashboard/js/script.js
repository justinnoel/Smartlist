class loadPage {
  constructor (file, el, options) {
    this.file = file;
    this.el = el;
    this.options = options;
    if(document.querySelector(el)) {
      el = document.querySelector(el);
    }
    else {
      console.error(el + " does not exist!")
    }
    if(options && options.loader === false) {
    }
    else {
      document.getElementById('fab').style.display = "none"
      el.innerHTML = `
<center>
<div class="loader">
<svg viewBox="0 0 32 32" width="42" height="42">
<circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
</svg>
</div>
</center>`
    }
    if(options && options.callback) {
      $(el).load(file, () => options.callback)
    }
    else {
      $(el).load(file, function() { document.getElementById('fab').style.display = "";})
    }
  }
}

window.onerror = function(msg, url, linenumber) {
  if(!msg.includes('DataCloneError')) {alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);}
  return true;
}

String.prototype.plural = function (revert) {

  var plural = {
    '(quiz)$': "$1zes",
    '^(ox)$': "$1en",
    '([m|l])ouse$': "$1ice",
    '(matr|vert|ind)ix|ex$': "$1ices",
    '(x|ch|ss|sh)$': "$1es",
    '([^aeiouy]|qu)y$': "$1ies",
    '(hive)$': "$1s",
    '(?:([^f])fe|([lr])f)$': "$1$2ves",
    '(shea|lea|loa|thie)f$': "$1ves",
    'sis$': "ses",
    '([ti])um$': "$1a",
    '(tomat|potat|ech|her|vet)o$': "$1oes",
    '(bu)s$': "$1ses",
    '(alias)$': "$1es",
    '(octop)us$': "$1i",
    '(ax|test)is$': "$1es",
    '(us)$': "$1es",
    '([^s]+)$': "$1s"
  };

  var singular = {
    '(quiz)zes$': "$1",
    '(matr)ices$': "$1ix",
    '(vert|ind)ices$': "$1ex",
    '^(ox)en$': "$1",
    '(alias)es$': "$1",
    '(octop|vir)i$': "$1us",
    '(cris|ax|test)es$': "$1is",
    '(shoe)s$': "$1",
    '(o)es$': "$1",
    '(bus)es$': "$1",
    '([m|l])ice$': "$1ouse",
    '(x|ch|ss|sh)es$': "$1",
    '(m)ovies$': "$1ovie",
    '(s)eries$': "$1eries",
    '([^aeiouy]|qu)ies$': "$1y",
    '([lr])ves$': "$1f",
    '(tive)s$': "$1",
    '(hive)s$': "$1",
    '(li|wi|kni)ves$': "$1fe",
    '(shea|loa|lea|thie)ves$': "$1f",
    '(^analy)ses$': "$1sis",
    '((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$': "$1$2sis",
    '([ti])a$': "$1um",
    '(n)ews$': "$1ews",
    '(h|bl)ouses$': "$1ouse",
    '(corpse)s$': "$1",
    '(us)es$': "$1",
    's$': ""
  };

  var irregular = {
    'move': 'moves',
    'foot': 'feet',
    'goose': 'geese',
    'sex': 'sexes',
    'child': 'children',
    'man': 'men',
    'tooth': 'teeth',
    'person': 'people'
  };

  var uncountable = [
    'sheep',
    'fish',
    'deer',
    'moose',
    'series',
    'species',
    'money',
    'rice',
    'information',
    'equipment'
  ];

  // save some time in the case that singular and plural are the same
  if (uncountable.indexOf(this.toLowerCase()) >= 0)
    return this;

  // check for irregular forms
  for (word in irregular) {

    if (revert) {
      var pattern = new RegExp(irregular[word] + '$', 'i');
      var replace = word;
    } else {
      var pattern = new RegExp(word + '$', 'i');
      var replace = irregular[word];
    }
    if (pattern.test(this))
      return this.replace(pattern, replace);
  }

  if (revert) var array = singular;
  else var array = plural;

  // check for matches using regular expressions
  for (reg in array) {

    var pattern = new RegExp(reg, 'i');

    if (pattern.test(this))
      return this.replace(pattern, array[reg]);
  }

  return this;
}

window.addEventListener("focus", () => getHashPage("hide"))
window.addEventListener("popstate", (e) => {
  var a = true;
  if(!$(".modal").is(":visible")) {
    getHashPage();
    a = false;
  }
  else {
    e.preventDefault();
    $('.modal').modal('close');
    a = true;
  }
  if(a === true) {
    history.pushState(null, null, window.location.href);
  }
  var els = document.querySelectorAll('.sidenav-active');
  if (els) {
    for (i = 0; i < els.length; i++) {
      els[i].classList.remove('sidenav-active')
    }
  }
})

function item(el, star, label, room) {
  var id = el.getAttribute("data-id");
  switch (room) { case 'bedroom': page_title = 'Home'; dir = "./rooms/bedroom/"; break; case 'kitchen': page_title = 'Contact'; dir = "./rooms/kitchen/"; break; case 'bathroom': page_title = 'bathroom'; dir = "./rooms/bathroom/"; break; case 'garage': page_title = 'About'; dir = "./rooms/garage/"; break; case 'family': page_title = 'family'; dir = "./rooms/family/"; break; case 'storage': page_title = 'storage'; dir = "./rooms/storage/"; break; case 'dining_room': page_title = 'dining_room'; dir = "./rooms/dining_room/"; break; case 'laundry': page_title = 'laundryroom'; dir = "./rooms/laundry/"; break; case 'camping': page_title = 'cs'; dir = "./rooms/camping/"; break; case 'custom_room': page_title = 'custom_room'; dir = "./rooms/custom_room/"; break; }
  if (star === 1) {
    document.getElementById('star').getElementsByTagName("i")[0].innerHTML = "star";
  } else {
    document.getElementById('star').getElementsByTagName("i")[0].innerHTML = "star_outline";
  }
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
  document.getElementById('edit_item_id').value = id;
  var actions = {
    action_task: document.getElementById('action_task'),
    action_qr: document.getElementById('action_qr'),
    action_share: document.getElementById('action_share'),
    action_mail: document.getElementById('action_mail'),
    action_wa: document.getElementById('action_wa'),
    action_share_p: document.getElementById('action_share_p'),
    action_recipe: document.getElementById('action_recipe'),
    action_delete: document.getElementById('action_delete'),
    navbar: {
      star: document.getElementById('star'),
      edit: document.getElementById('edit'),
      delete: document.getElementById('delete'),
    }
  }
  $("#item_sidenav").sidenav({
    edge: "right",
    onOpenEnd() {
      document.querySelector('meta[name="theme-color"]').setAttribute('content',  '#1d272b');
    },
    onCloseEnd() {
      if(document.documentElement.classList.contains('_darkTheme')) {
        document.querySelector('meta[name="theme-color"]').setAttribute('content',  '#212121');
      }
      else {
        document.querySelector('meta[name="theme-color"]').setAttribute('content',  user.themeTop)}
    }
  })
  $("#edit_sidenav").sidenav({
    edge: "right",
  })
  $("#item_sidenav").sidenav('open');
  var name = el.getElementsByTagName('td')[0].innerText;
  var qty = el.getElementsByTagName('td')[1].innerText;
  actions.action_qr.href = "https://api.qrserver.com/v1/create-qr-code/?size=1000x1000&data=" + encodeURI("I currently have " + qty + " " + name + " in my inventory");
  actions.action_mail.href = "mailto:hello@homebase.rf.gd?subject=My%20Inventory%20Status%20%7C%20Smartlist&body=Hi%20_____%2C%0D%0AI'm%20currently%20having%20" + encodeURI(qty) + "%20" + encodeURI(name) + "%20in%20my%20" + encodeURI(room) + ".%0D%0A%0D%0AThank%20you%2C%0D%0ASincerely%2C%0D%0A________";
  actions.action_task.onclick = function () {
    $('#ajaxLoader').load('./rooms/todo_qadd.php?name=' + encodeURI(name), function () {
      M.toast({
        html: "Added to grocery list"
      })
    })
  }
  actions.navbar.edit.onclick = function() {
    $("#edit_sidenav").sidenav('open');
    document.getElementById('edit_item_name').value = name;
    document.getElementById('edit_item_qty').value = qty;
    document.getElementById('edit_item_qty').focus();
    document.getElementById('edit_item_name').focus()
  }
  if (room !== 'kitchen') {
    actions.action_recipe.style.display = 'none';
  } else if (room == 'kitchen') {
    actions.action_recipe.style.display = '';
    actions.action_recipe.href = "https://www.google.com/search?q=recipes+with+" + encodeURI(name);
  }
  actions.navbar.delete.onclick = function () {
    $("#item_sidenav").sidenav('close')
    M.toast({
      html: 'Deleted!'
    });
    el.remove();
    $("#ajaxLoader").load(dir + "delete.php?id=" + id)
  }
  actions.navbar.star.onclick = function () {
    if (actions.navbar.star.getElementsByTagName("i")[0].innerHTML == "star") {
      el.style.borderLeft = "none";
      actions.navbar.star.getElementsByTagName("i")[0].innerHTML = "star_outline";
      el.onclick = function () {
        item(el, 0, label, room);
      };
    } else {
      el.style.borderLeft = "3px solid #f57f17";
      actions.navbar.star.getElementsByTagName("i")[0].innerHTML = "star";
      el.onclick = function () {
        item(el, 1, label, room);
      };
    }
    $("#ajaxLoader").load(dir + "star.php?id=" + id)
  }
  actions.action_share_p.onclick = function () {
    if (navigator.share) {
      document.getElementById('action_share_p').style.display = "block";
      navigator.share({
        title: document.title,
        text: "I'm currently having " + qty + " " + name + " in my inventory.",
        url: window.location.href
      }).then(() => console.log('Successful share')).catch(error => console.log('Error sharing:', error));
    }
  };

  document.getElementById('title').innerHTML = "<br>" + name
  document.getElementById('qty').innerHTML = qty;
  document.getElementById('chips').innerHTML += "";
  if(el.classList.contains('sync_tr')) {
    document.getElementById('chips').innerHTML += `<div class="chip green white-text darken-3 waves-effect waves-light" onclick="copyToClipboard(this.innerText)">Synced</div>`;
  }
  label.split(",").forEach((e) => {
    document.getElementById('chips').innerHTML += `<div class="chip waves-effect" onclick="copyToClipboard(this.innerText)">${e}</div>`
  })
}

document.addEventListener('keydown', function (e) {
  if (e.ctrlKey && e.which == 83) {
    event.preventDefault();
    $('.modal').modal('close');
    $('#addItem').modal('open');
  } 
  else if(e.which == 27) {
    if($('#edit_sidenav').is(":visible")){
      $('#edit_sidenav').sidenav("close")
    }
    if($('#item_sidenav').is(":visible")){
      // setTimeout(() => { $('#item_sidenav').sidenav("close")}, 100)
    }
  }
  else if(e.ctrlKey && e.which == 76) {
    event.preventDefault();
    $('.modal').modal('close');
    window.location.hash = "#/add/todo";
  }
  else if(e.ctrlKey && e.which == 66) {
    event.preventDefault();
    $('#bmmodal').modal('open');
  }
  else if(e.ctrlKey && e.which == 191) {
    e.preventDefault();
    $('#keyboardShortcuts').modal('open');
  }
  else if(e.ctrlKey && e.which == 188) {
    event.preventDefault();
    $('.modal').modal('close');
    window.location.hash = "#/settings";
  }
  else if(e.ctrlKey && e.which == 71) {
    event.preventDefault();
    $('.modal').modal('close');
    window.location.hash = "#/add/shopping-list";

  }
  else if (e.shiftKey && e.which == 27 || e.metaKey && e.which == 27) {
    event.preventDefault();
  }
  // &&e.altKey
});

navigator.serviceWorker.register('https://smartlist.ga/dashboard/sw.js');

function showNotification(data) {
  Notification.requestPermission(function(result) {
    if (result === 'granted') {
      navigator.serviceWorker.ready.then(function(registration) {
        registration.showNotification('Smartlist', {
          body: data,
          icon: 'https://smartlist.ga/dashboard/logo_z3yoqm.png',
          vibrate: [200, 100, 200, 100, 200, 100, 200],
          // tag: 'vibration-sample'
        });
      });
    }
  });
}

document.body.onclick = function() {
  // showNotification("Hi!!!");
}
CKEDITOR.replace('addNoteT', {
  skin: 'moono-lisa',
  enterMode: CKEDITOR.ENTER_BR,
  shiftEnterMode: CKEDITOR.ENTER_P,
  toolbar: [
    { name: 'basicstyles', groups: ['basicstyles'], items: ['Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor'] },
    { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
    { name: 'scripts', items: ['Subscript', 'Superscript'] },
    { name: 'justify', groups: ['blocks', 'align'], items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
    { name: 'paragraph', groups: ['list', 'indent'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
    { name: 'links', items: ['Link', 'Unlink'] },
    { name: 'insert', items: ['Image'] },
    { name: 'spell', items: ['jQuerySpellChecker'] },
    { name: 'table', items: ['Table'] }
  ],
});
function sidenav_highlight(el) {
  var els = document.querySelectorAll('.sidenav-active');
  if (els) {
    for (i = 0; i < els.length; i++) {
      els[i].classList.remove('sidenav-active')
    }
  }
  setTimeout(function () {
    el.classList.add('sidenav-active');
  }, 1);
}
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("fab").style.width = '130px';
    document.getElementById("fab").getElementsByTagName('i')[0].classList.remove('active_i');
    setTimeout(function(){ 
      document.getElementById("fab").getElementsByTagName('span')[0].style.opacity = 1;
    }, 200);
  } else {
    document.getElementById("fab").getElementsByTagName('span')[0].style.opacity = 0
    setTimeout(function(){ 
      document.getElementById("fab").style.width = '5px';
      document.getElementById("fab").getElementsByTagName('i')[0].classList.add('active_i');
    }, 100);
  }
  prevScrollpos = currentScrollPos;
};
function bm_add() {
  var x = document.getElementById('bm_amount');
  var e = document.getElementById('bm_select');
  $('#ajaxLoader').load('https://smartlist.ga/dashboard/rooms/bm/addx.php?n=' + encodeURI(x.value) + "&label=" + encodeURI(e.value));
  x.value = '';
  new loadPage("./pages/dashboard.php", "#app", {loader: false})
}
$(document).ready(function(){
  $('.fixed-action-btn').floatingActionButton();
});
window.addEventListener("keyup", (e) => {
  switch(e.keyCode) {
      // case 27: $('#item_sidenav').sidenav('close'); break;
  }
});
$(document).ready(function(){
  $('.fixed-action-btn').floatingActionButton();
  $(".sidenav").sidenav();
  $(".modal").modal({
    onOpenStart() {document.querySelector('meta[name="theme-color"]').setAttribute('content',  (document.documentElement.classList.contains('_darkTheme') ? "#101010": user.themeDark));},
    onCloseStart() {
      if(document.documentElement.classList.contains('_darkTheme')) {
        document.querySelector('meta[name="theme-color"]').setAttribute('content',  '#212121');
      }
      else {
        document.querySelector('meta[name="theme-color"]').setAttribute('content',  user.themeTop);
      }
    },
  });
  $("select").formSelect();
  $('input.autocomplete').autocomplete({
    data: autocompleteData,
    limit: 6,
  });
});

window.addEventListener("load", () => getHashPage())
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

function qq() {
  $("#noSearchResultsHeading").show();
  $("#noSearchResultsContainer").hide()
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById("search");
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

function dark_mode() {
  document.documentElement.classList.toggle('_darkTheme');
  localStorage.setItem('theme', (document.documentElement.classList.contains('_darkTheme') === true ? "true" : "false"))
}

function darkSidenav() {
  document.documentElement.classList.toggle('_darkSidenav');
  localStorage.setItem('_darkSidenav', (document.documentElement.classList.contains('_darkSidenav') === true ? "true" : "false"))
}

if(localStorage.getItem('theme') && localStorage.getItem('theme') == "true") {
  document.documentElement.classList.add('_darkTheme')
}
if(localStorage.getItem('_darkSidenav') && localStorage.getItem('_darkSidenav') == "true") {
  document.documentElement.classList.add('_darkSidenav')
}

function chipValue(el) {
  var input = el.parentElement.parentElement.getElementsByTagName('input')[0];
  input.focus();
  input.value = el.innerText
  el.parentElement.parentElement.getElementsByTagName('input')[1].focus();
  el.parentElement.parentElement.getElementsByTagName('input')[1].value = 1;
}

var ele = document.documentElement;
// ele.style.cursor = 'grab';

let pos = {
  top: 0,
  left: 0,
  x: 0,
  y: 0
};

var mouseDownHandler = function (e) {
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

var mouseMoveHandler = function (e) {
  // How far the mouse has been moved
  var dx = e.clientX - pos.x;
  var dy = e.clientY - pos.y;

  // Scroll the element
  ele.scrollTop = pos.top - dy;
  ele.scrollLeft = pos.left - dx;
};

var mouseUpHandler = function () {
  // ele.style.cursor = 'grab';
  ele.style.removeProperty('user-select');

  document.removeEventListener('mousemove', mouseMoveHandler);
  document.removeEventListener('mouseup', mouseUpHandler);
};
if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
  // Attach the handler
  ele.addEventListener('mousedown', mouseDownHandler);
}

window.addEventListener('offline', () => {
  M.toast({html: "You are offline. Please connect to the internet"})
});
window.addEventListener('online', () => {
  M.toast({html: "Network connection restored!"})
});

$("#searchForm").submit(function(e) {

  e.preventDefault();

  var form = $(this);
  var url = form.attr('action');

  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    success: function(data)
    {
      var el = document.getElementById('searchResults');
      el.innerHTML = `<div class="modal-content" style="padding-top: 0!important"><a style="position: absolute;top: 20px;right: 20px"  class="right btn btn-floating btn-flat black-text waves-effect modal-close"><i class="material-icons" style="color: var(--font-color) !important">close</i></a> ${data}</div>`
      $('#searchResults').modal('open');
      qq();
    }
  });
});
$("#edit_form").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  var url = form.attr('action');
  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    success: function (data) {
      $("#item_popup, #edit_sidenav").sidenav('close')
      document.getElementById("title").innerHTML = "<br>" + document.getElementById('edit_item_name').value
      document.getElementById("qty").innerHTML = document.getElementById('edit_item_qty').value;
      document.getElementById('edit_form').reset();
      getHashPage();
    }
  });
});
$("#avatarChangeForm").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  var url = form.attr('action');
  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    success: function (data) {
      window.location.reload()
    }
  });
});
function fileChange(el, callback = function (e) { }) {
  var file = el;
  var form = new FormData();
  form.append("image", file.files[0])

  var settings = {
    "url": "https://api.imgbb.com/1/upload?key=5e97a7dae2b850713c9da081460622cf",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "mimeType": "multipart/form-data",
    "contentType": false,
    "data": form
  };


  $.ajax(settings).done(function (response) {
    console.log(response);
    var jx = JSON.parse(response);
    callback(jx.data.url)

  });
}
$(document).ready(() => {
  $('#feedbackBeta').modal({dismissible: false, onOpenStart() {document.querySelector('meta[name="theme-color"]').setAttribute('content',  (document.documentElement.classList.contains('_darkTheme') ? "#101010": user.themeDark));},
                            onCloseStart() {document.querySelector('meta[name="theme-color"]').setAttribute('content',  (document.documentElement.classList.contains('_darkTheme') ? "#101010": user.themeDark)); localStorage.setItem('s', 'true')}})
  if(!localStorage.getItem('s')) {
    $('#feedbackBeta').modal('open')
  }
});
$('.tabs').tabs();







function modal_open(id, el, room) {
  var __el1 = el.getElementsByTagName('td')[0].innerHTML;
  var __el2 = el.getElementsByTagName('td')[1].innerHTML;
  var directory;
  $('#right_click_modal').modal('open');
  document.getElementById('rclick_qr').href = 'https://api.qrserver.com/v1/create-qr-code/?size=850x850&data=' + __el1;
  document.getElementById('rclick_recipe').href = 'https://google.com/search?q=' + encodeURI("Recipes with " + __el1);
  document.getElementById('rclick_mail').href = 'mailto:fakeemail@emailsender.net?subject=' + encodeURI("My inventory Status") + "&body=" + encodeURI("I currently have " + __el2 + " " + __el1 + " in my inventory");
  document.getElementById('rclick_share').onclick = function () {
    if (navigator.share) {
      navigator.share({
        title: document.title,
        text: "I'm currently having " + __el1 + " " + __el2 + " in my inventory.",
        url: window.location.href
      }).then(() => console.log('Successful share')).catch(error => console.log('Error sharing:', error));
    }
  };
  document.getElementById('rclick_add').onclick = function () {
    $('#div1').load('./rooms/todo_qadd.php?name=' + encodeURI(__el1));
    M.toast({
      html: 'Item added successfully to grocery list'
    });
  };


  switch (room) {
    case 'kitchen':
      directory = './rooms/kitchen/delete.php';
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
  document.getElementById('rclick_edit').onclick = function () {
    var form = document.getElementById('edit_form');
    document.getElementById('edit_item_id').value = id;
    $("#edit_sidenav").sidenav('open'); 
    form.action = directory.replace("delete", "edit")
    document.getElementById('edit_item_name').value = __el1;
    document.getElementById('edit_item_qty').value = __el2;
    document.getElementById('edit_item_qty').focus();
    document.getElementById('edit_item_name').focus()
  };
  document.getElementById('rclick_delete').onclick = function () {
    $('#ajaxLoader').load(directory + "?id=" + id);
    $(el).hide()
  };
}