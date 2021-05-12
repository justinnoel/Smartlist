var foods = {
  American: {
    breakfast: [
      {name: 'Waffles'},
      {name: 'Pancakes'}, 
      {name: 'Bagels'},
    ],
    lunch: [
      {name: 'Taco'},
      {name: 'Chicken and Waffles'},
      {name: 'Cream Cheese'},
      {name: 'Sunny side up'},
      {name: 'Harboiled eggs'},
      {name: 'French toast'},
      {name: 'Burrito'},
      {name: 'Breakfast tacos'},
      {name: 'Peanut butter and jelly sandwitch', }
    ],
  },
  English: [
    {name: 'Waffles'},
    {name: 'Tea'},
    {name: 'Tasty Lincolnshire sausages'},
    {name: 'Warming Scottish porridge'},
    {name: 'Black pudding'},
    {name: 'White pudding'},
    {name: 'Staffordshire oatcakes'},
  ], 
  Indian: {
    breakfast: [
      {name: 'Idli'}, {name: 'Dosa'}, {name: 'Avalakki'}, {name: 'Rotti'}, {name: 'Oats upma'}, {name: 'Akki rotti'},
    ],
    lunch: [
      {name: 'Chapati'}, {name: 'Palya'}, {name: 'Chicken Tikka masala'}, {name: 'Chole bhature'}, {name: 'Dal'}, {name: 'Dum Aloo'}, {name: 'Poha'}, {name: 'Kadai Paneer'}, {name: 'Kheer'}, {name: 'Khichdi'}, {name: 'Kofta'}, {name: 'Palak Paneer'}, {name: 'Pani Puri'}, {name: 'Puri'}, {name: 'Pongal'}, {name: 'Paratha'}, {name: 'Rajma'}, {name: 'Avial'}, {name: 'Pongal'}, {name: 'Samosa'}, {name: 'Shahi paneer'}, {name: 'Chicken 65'}, {name: 'Chaat'}, {name: 'Naan'}, {name: 'Channa Masala'}, {name: 'Thepla'}, {name: 'Paneer Tikka Masala'}, {name: 'Aloo Paratha'}, {name: 'Palak Paratha'}, {name: 'Upma'}, {name: 'Masala Dosa'}, {name: 'Sambar'}, {name: 'Vada'}, {name: 'Pav Bhaji'}, {name: 'Pooran-poli'}, {name: 'Rasya muthia'}, {name: 'Puri Bhaji'}, {name: 'Shrikhand'}, {name: 'Aloo matar'}, {name: 'Aloo methi'}, {name: 'Aloo shimla mirch'}, {name: 'Aloo tikki'}, {name: 'Amritsari kulcha'}, {name: 'Biryani'}, {name: 'Butter chicken'}, {name: 'Daal baati churma'},
    ],
    dinner: [
      {name: 'Chapati'}, {name: 'Palya'}, {name: 'Chicken Tikka masala'}, {name: 'Chole bhature'}, {name: 'Dal'}, {name: 'Dum Aloo'}, {name: 'Poha'}, {name: 'Kadai Paneer'}, {name: 'Kheer'}, {name: 'Khichdi'}, {name: 'Kofta'}, {name: 'Palak Paneer'}, {name: 'Pani Puri'}, {name: 'Puri'}, {name: 'Pongal'}, {name: 'Paratha'}, {name: 'Rajma'}, {name: 'Avial'}, {name: 'Pongal'}, {name: 'Samosa'}, {name: 'Shahi paneer'}, {name: 'Chicken 65'}, {name: 'Chaat'}, {name: 'Naan'}, {name: 'Channa Masala'}, {name: 'Thepla'}, {name: 'Paneer Tikka Masala'}, {name: 'Aloo Paratha'}, {name: 'Palak Paratha'}, {name: 'Upma'}, {name: 'Masala Dosa'}, {name: 'Sambar'}, {name: 'Vada'}, {name: 'Pav Bhaji'}, {name: 'Pooran-poli'}, {name: 'Rasya muthia'}, {name: 'Puri Bhaji'}, {name: 'Shrikhand'}, {name: 'Aloo matar'}, {name: 'Aloo methi'}, {name: 'Aloo shimla mirch'}, {name: 'Aloo tikki'}, {name: 'Amritsari kulcha'}, {name: 'Biryani'}, {name: 'Butter chicken'}, {name: 'Daal baati churma'},
    ],
  }
};
function random() {
  var culture = document.getElementById('culture').value;
  var type = document.getElementById('type').value;
  if(culture == "American") {
    if(type == "1") { recipe(foods.American.breakfast[Math.floor(Math.random() * foods.American.breakfast.length)].name);}
    else if(type == "2") { recipe(foods.American.lunch[Math.floor(Math.random() * foods.American.lunch.length)].name);}
    else if(type == "3") { recipe(foods.American.dinner[Math.floor(Math.random() * foods.American.dinner.length)].name);}
  }
  else if(culture == "Indian") {
    if(type == "1") { recipe(foods.Indian.breakfast[Math.floor(Math.random() * foods.Indian.breakfast.length)].name);}
    else if(type == "2") { recipe(foods.Indian.lunch[Math.floor(Math.random() * foods.Indian.lunch.length)].name);}
    else if(type == "3") { recipe(foods.Indian.dinner[Math.floor(Math.random() * foods.Indian.dinner.length)].name) }
  }
}
function recipe(data) {
    document.getElementById('btn_recipe').disabled = false;
  var x = document.getElementById('res');
  x.innerHTML = "";
  x.style.display = "none";
  setTimeout(function() {
    x.innerHTML= data;
    x.style.display = "block";
  }, 5);
  document.getElementById('btn_recipe').onclick = null;
  document.getElementById('btn_recipe').onclick = function() {
  document.getElementById("demo").innerHTML = "Loading...";
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                document.getElementById('btn_recipe').disabled = true;

        document.getElementById("demo").innerHTML = "";
        const response = JSON.parse(xhttp.responseText);
        var el = document.getElementById('demo');
        function card(object) {
          var x = document.getElementById("demo");
          var tags = "";
          object.recipe.healthLabels.forEach(element => tags += "<div class='chip'>"+ element + "</div>")
          x.innerHTML += `
<div class="col s12 m4">
<div class="card">
<div class="card-image waves-effect waves-light">
<img src="${object.recipe.image}" width="100%">
  </div>
<div class="card-content">
<span class="card-title">${object.recipe.label}</span>
<p>${tags}</p>
  </div>
<div class="card-action">
<a href="${object.recipe.url}" target="_blank">View Recipe</a>
  </div>  </div>

  </div>
`
        }
        response.hits.forEach(element => card(element));
      }
    };
    xhttp.open("GET", "https://api.edamam.com/search?q="+encodeURI(data)+"&app_id=a1912a58&app_key=1cccbf6210623a7d30cb0f07be1af3e4&from=0&to=25", true);
    xhttp.send();
  };
}
document.body.addEventListener("keydown", function(event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    random();
  }
});
document.getElementById('culture').addEventListener('change', function() {
  localStorage.setItem('culture', document.getElementById('culture').value);
});
$(document).ready(function(){
  $('select').formSelect();
  if(localStorage.getItem('culture')) {
    document.getElementById('culture').value = localStorage.getItem('culture');
    random();
  }
});
window.onerror = function(msg, url, linenumber) {
  alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
  return true;
};
random();
$('.sidenav').sidenav();