function random(randomFood = false) {
  if (randomFood == true) {
    console.log("RANDOM");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // Typical action to be performed when the document is ready:
        recipe(JSON.parse(xhttp.responseText).meals[0].strMeal);
      }
    };
    xhttp.open(
      "GET",
      "https://www.themealdb.com/api/json/v1/1/random.php",
      true
    );
    xhttp.send();
  } else {
    var culture = document.getElementById("culture").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(xhttp.responseText);
        var item = json.meals[Math.floor(Math.random() * json.meals.length)];
        console.log(item);
        recipe(item.strMeal);
      }
    };
    xhttp.open(
      "GET",
      "https://www.themealdb.com/api/json/v1/1/filter.php?a=" +
        culture +
        (document.getElementById("vegetarian").checked == true
          ? "&c=vegetarian"
          : ""),
      // +  encodeURIComponent(culture),
      true
    );
    xhttp.send();
  }
}
function recipe(e, filter = false) {
  // e = "Taco";
  document.getElementById("res").innerHTML = "Recipes";
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Typical action to be performed when the document is ready:
      var json = JSON.parse(xhttp.responseText);
      console.log(json);
      document.getElementById("demo").innerHTML = "";
      if (json.meals === null || json.meals === "null") {
        document.getElementById("demo").innerHTML = "No results found";
        return false;
      }
      json.meals.forEach((data) => {
        document.getElementById("demo").innerHTML += `<div class="col s12 m4">
<div class="card waves-effect" onclick="recipe_modal(${data.idMeal})">
<div class="card-image">
<img class="lazy" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD//gA7Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2NjIpLCBxdWFsaXR5ID0gODIK/9sAQwAGBAQFBAQGBQUFBgYGBwkOCQkICAkSDQ0KDhUSFhYVEhQUFxohHBcYHxkUFB0nHR8iIyUlJRYcKSwoJCshJCUk/9sAQwEGBgYJCAkRCQkRJBgUGCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQk/8AAEQgB9AH0AwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A9cpaKK1MgooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooopgFFFFIAooooAKKKKACiiigAooooAKKKKACiiigAoozRmgAoozRmgAoozRmgAoozRmgAoozRmgAoozRmgAoozRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUlABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABS0lLQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRTAKKKKQBRRQaACikooAWikopgLRSUUALRSUUALRSUUgCiiigAooooAKKKKACiiigAooooAKKKKAClpKWgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiimAUUUUgCg0UUAFFFFABSUtJTAWkoooAKWkooAKKKKACij8aPxpAFFH40fjQAUUfjR+NABRR+NH40AFFH40fjQAUUfjR+NABS0n40tABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABQKKKACiiigAooooAKKKKACiiigAooooAKKKKACg0UUAFFFFABSUtJTAKKKKACiiloASiiigA/Cj8KKKQB+FH4UUUAH4UfhRRQAfhR+FFFAB+FH4UUUAH4UfhRRQAfhS0lL3oAKKKKACiiigAoo70UAFFFFABRRR3oAKKKKACiiigAoo70UAFFFFABRRR3oAKKKKACiiigAoo70CgAooooAKKKKACiiigAooooAKKKKACiiigAoNFBoASiiigAooopgFFFFABRRRQAUUUvWkAlFLijFACUUuKMUAJRS4oxQAlFLijFACUUuKMUAJRS4oxQAlLRiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo6UAFFGaM0AFFGaM0AFFGaM0AFFGaM0AFFGaKACiiigAoNFBoASiiigAooooAKKKKACiiigApRSUooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACg0UGgAooooAKSlpKAFooooAKKKKACiiigAooooAKDRQaAEooooAKKKKACiiigAooooAKUUlKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoNFBoAKKSigBaSiigBaKSigBaKSigBaKKKACiiigAoNFBoASiiigAooooAKKKKACiiigApRSUooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACg0UGgAooooAKSlpKAFooooAKKKKACiiigAooooAKDRQaAEooooAKKKKACiiigAooooAKUUlKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoNFBoAKKKKACkpaSgBaKKKACiiigAooooAKKKKACg0UGgBKKKKACiiigAooooAKKKKAClFJSigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKDRQaAEopaKAEopaSgAopaKAEopaKACiiigAooooAKDRQaAEooooAKKKKACiiigAooooAKUUlKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoNFBoAKKKKACkpaSgBaKKKACiiigAooooAKKKKACg0UUAJRS0UAJRS0UAJRS0UAJRS0UAJSiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKDRRQAUUlFAC0lFFAC0UlFAC0UlFAC0UlFAC0UUUAFFFFABRRRQAUUUUAFFH40UAFFFH40AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFJRQAtFJRQAtFJRQAtFJRQAtFJRQAtFFFABRRRQAUUUUAFFFFAB+FFFFABR+FFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFBoASloooASlopKAFpKWigApKWigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooASilooASilooASilooASilooASilooAKKKKACiiigAooooAKKKKAD8aKPwooAKPxoo/CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigBKKKWgBKKKWgBKKWkoAKKWkoAKKWigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACg0UUAFFJRQAtJRRQAtFJRQAtFJRQAtFJRQAtFFFABRRRQAUUUUAFFFFABRR+NFABRRR+NABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRSUUALRSUUALRSUUALRSUUALRSUUALRRRQAUUUUAFFFFABRRRQAfhRRRQAUfhRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRQaAEpaKKAEpaKSgBaSlooAKSlooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAEopaKAEopaKAEopaKAEopaKAEopaKACiiigAooooAKKKKACiiigA/Gij8KKACj8aKPwoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooASiiloASiiloASilpKACilpKACilooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoNFFABRSUUALSUUUALRSUUALRSUUALRSUUALRRRQAUUUUAFFFFABRRRQAUUfjRQAUUUfjQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUlFAC0UlFAC0UlFAC0UlFAC0UlFAC0UUUAFFFFABRRRQAUUUUAH4UUUUAFH4UUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUGgBKWiigBKWikoAWkpaKACkpaKACiiigAooooAKKKKACiiigAooooAKKMUUAFFFGKACiijpQAUUZozQAUUZozQAUUZozQAUUZozQAUUZozQAUUZozQAUUZozQAUUZozQAUUUZoAKKM0ZoAKKM0UAFFGaM0AFFGaM0AFFFGaACijNGaACijNFABRRmjNABRRmjNABRRRmgAoozRQAlFLRQAlFLRQAlFLRQAlFLRQAlFLRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUGig0AFFFFABSUtJQAtFFFABRRRQAlLSUtABRRRQAUlLSUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFLSUtABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFBooNABRSUUALSUUUALRSUUALRSUUAFLSUUALRSUUALSUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFLSUtABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFBooNABRRRQAUlLSUALRRRQAUUUUAJS0lLQAUUUUAFJS0lABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABS0lLQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABQaKDQAUUUUAFJS0lAC0UUUAFFFFACUtJS0AFFFFABSUtJQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUtJS0AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUGiigAooooAKKKKACiiigAooooAKKKKACiiigApKKKAFpKKKACloooASloooASiiigBaSiigBaSiigApaKKAEpaKKAEooooAWkoooAWkoooAKWiigBKWiigAooooAKKKKACiiigAooooAKKKKAP/9k=" data-src="${
          data.strMealThumb
        }"></div>
<div class="card-content">
<span class="card-title" style="font-weight: bold !important">${
          data.strMeal
        }</span>
${data.strCategory ? `<div class="chip">${data.strCategory}</div>` : ""} ${
          data.strArea ? `<div class="chip">${data.strArea}</div>` : ""
        }
</div>
</div>
</div>`;
      });
      $(".lazy").lazy();
    }
  };
  xhttp.open(
    "GET",
    filter == false
      ? "https://www.themealdb.com/api/json/v1/1/search.php?s=" + encodeURI(e)
      : "https://www.themealdb.com/api/json/v1/1/filter.php?i=" + encodeURI(e),
    true
  );
  xhttp.send();
}
function recipe_modal(id) {
  $("#popup").modal("open");
  document.getElementById("popup").innerHTML = `<center><svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
   <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
</svg></center>`;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var json = JSON.parse(xhttp.responseText).meals[0];
      console.log(json);
      var converter = new showdown.Converter({
				simpleLineBreaks: true,
				simplifiedAutoLink: true, 
				tables: true
			}),
        text = json.strInstructions,
        instructions = converter.makeHtml(text);
      // Typical action to be performed when the document is ready:
      document.getElementById("popup").innerHTML = `

<div class="navbar-fixed"  style="position: fixed;top:0;left:0;">

			<nav class="orange darken-3" style="position: fixed;top:0;left:0;">
				<ul>
					<li>
						<a href="#" class="modal-close">
							<i class="material-icons left">arrow_back</i> Details
						</a>
					</li>
				</ul>
			</nav>
			  </div>
				<div class="row">
					<div class="col s12 m6" style="padding: 0 !important">
					<img id="img" src="${
            json.strMealThumb
          }" style="width: 100%;height: 50vh;object-fit: cover">
					</div>
					<div class="col s12 m6">
					<div class="hide-on-med-and-rup" style="margin-top: 40px"></div>
					<div class="container">
					<h2>${json.strMeal}</h2>
					${json.strCategory ? `<div class="chip">${json.strCategory}</div>` : ""}
					${json.strArea ? `<div class="chip">${json.strArea}</div>` : ""}
					<br><br>
					<h4>Ingredients</h5>
					${json.strIngredient1 ? "<li>" + json.strIngredient1 + "</li>" : ""}
					${json.strIngredient2 ? "<li>" + json.strIngredient2 + "</li>" : ""}
					${json.strIngredient3 ? "<li>" + json.strIngredient3 + "</li>" : ""}
					${json.strIngredient4 ? "<li>" + json.strIngredient4 + "</li>" : ""}
					${json.strIngredient5 ? "<li>" + json.strIngredient5 + "</li>" : ""}
					${json.strIngredient6 ? "<li>" + json.strIngredient6 + "</li>" : ""}
					${json.strIngredient7 ? "<li>" + json.strIngredient7 + "</li>" : ""}
					${json.strIngredient8 ? "<li>" + json.strIngredient8 + "</li>" : ""}
					${json.strIngredient9 ? "<li>" + json.strIngredient9 + "</li>" : ""}
					${json.strIngredient10 ? "<li>" + json.strIngredient10 + "</li>" : ""}
					${json.strIngredient11 ? "<li>" + json.strIngredient11 + "</li>" : ""}
					${json.strIngredient12 ? "<li>" + json.strIngredient12 + "</li>" : ""}
					${json.strIngredient13 ? "<li>" + json.strIngredient13 + "</li>" : ""}
					${json.strIngredient14 ? "<li>" + json.strIngredient14 + "</li>" : ""}
					${json.strIngredient15 ? "<li>" + json.strIngredient15 + "</li>" : ""}
					${json.strIngredient16 ? "<li>" + json.strIngredient16 + "</li>" : ""}
					${json.strIngredient17 ? "<li>" + json.strIngredient17 + "</li>" : ""}
					${json.strIngredient18 ? "<li>" + json.strIngredient18 + "</li>" : ""}
					${json.strIngredient19 ? "<li>" + json.strIngredient19 + "</li>" : ""}
					${json.strIngredient20 ? "<li>" + json.strIngredient20 + "</li>" : ""}
					<br><br>
					<h4>Instructions</h5>
					${instructions}

						<div class="fixed-action-btn">
  <a class="btn-floating btn-large red" style="transform: none !important" href="${json.strYoutube}" target="_blank">
    <i class="large material-icons">play_circle_filled</i>
  </a>
  <ul>
    <li><a class="btn-floating blue-grey lighten-1" href="${json.strSource}" target="_blank"><i class="material-icons">open_in_new</i></a></li>
  </ul>
</div>


					</div>
					</div>
				</div>	
`;
    }
		 $(document).ready(function(){
    $('.fixed-action-btn').floatingActionButton();
  });
        
  };
  xhttp.open(
    "GET",
    "https://www.themealdb.com/api/json/v1/1/lookup.php?i=" + id,
    true
  );
  xhttp.send();
}
document.getElementById("culture").addEventListener("change", function () {
  localStorage.setItem("culture", document.getElementById("culture").value);
});
if (localStorage.getItem("culture")) {
  document.getElementById("culture").value = localStorage.getItem("culture");
  random();
}
function shuffle(array) {
  var currentIndex = array.length,
    randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {
    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex--;

    // And swap it with the current element.
    [array[currentIndex], array[randomIndex]] = [
      array[randomIndex],
      array[currentIndex],
    ];
  }

  return array;
}
function darkMode() {
  if (document.documentElement.classList.contains("dark")) {
    document.documentElement.classList.remove("dark");
  } else {
    document.documentElement.classList.add("dark");
  }
}

window.matchMedia("(prefers-color-scheme: dark)").addListener(
  (e) => e.matches && darkMode() // listener
);

if (
  window.matchMedia &&
  window.matchMedia("(prefers-color-scheme: dark)").matches
) {
  darkMode();
  document.getElementById("d").checked = true;
}
if (
  localStorage.getItem("dmode") == true ||
  localStorage.getItem("dmode") == "true"
) {
  darkMode();
  document.getElementById("d").checked = true;
}

window.addEventListener("load", function () {
  $(".modal").modal();
  $(".sidenav").sidenav();
  $("select").formSelect();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var el = document.getElementById("categories");
      // Typical action to be performed when the document is ready:
      var json = JSON.parse(xhttp.responseText).meals;
      el.getElementsByClassName("container")[0].innerHTML =
        "<h5>Search by Ingredients</h5><p>Pick an ingredient to randomly generate a dish containing the ingredient!</p>";
      json.forEach((data) => {
        el.getElementsByClassName(
          "container"
        )[0].innerHTML += `<div class='modal-close chip waves-effect' onclick="recipe(this.innerText, true)">${data.strIngredient}</div>`;
      });
    }
  };
  xhttp.open(
    "GET",
    "https://www.themealdb.com/api/json/v1/1/list.php?i=list",
    true
  );
  xhttp.send();
});