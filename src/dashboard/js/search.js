/**
 * @description - Handles the search form submission
 * @param {*} event - The event that triggered the function
 */
document.getElementById("searchForm").addEventListener("submit", (event) =>
sendData(event, (data) => {
data = JSON.parse(data);
    var items = "";
    window.location.hash = "#/results"
    var noResults = true;
    var _categories = new Array();
    data.forEach((item) => _categories.push( (item.categories ? item.categories : "").replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;") ))
    _categories = [...new Set(_categories)];
    _categories = _categories.filter(function(e){ return e.replace(/(\r\n|\n|\r)/gm,"")});
    data.forEach((item) => {
    var url = "";
    url = `#/rooms/${item.room.replace(" Room", "").replace(" Supplies").toLowerCase()}`;
    if((`
    ${item.name}
    ${item.qty}
    ${item.room}
    ${item.date}
    ${item.id}
    `).toLowerCase().includes(document.getElementById("search").value.toLowerCase())) {
        noResults = false;
    items += `
    <div class="col s6 m4">
    
        <div onclick="window.location.hash='${url}';document.getElementById('searchBar').classList.add('hide');" class="modal-close waves-effect card" style="background:rgba(200, 200, 200,.2)!important;">
        <div class="card-content">
            <p style="margin-bottom: 15px" class="truncate"><br><b>${item.name}</b><br>${item.qty}<br></p>
            <div style="overflow-x:scroll;white-space: nowrap;width:100%">
            ${item.star == "1" ? `<div class="chip chip-border orange darken-3 white-text">Starred</div> ` : ""}
            ${item.qty && item.qty.toLowerCase().includes("(in stock)") ? `<div class="chip chip-border teal darken-3 white-text">In stock</div> ` : ""}
            <div class="chip chip-border">${item.room}</div> 
            <div class="chip chip-border">Last updated on ${item.date.replace("on", "at")}</div>
            <div class="chip chip-border">${item.categories}</div>
            <div class="chip chip-border">ID: ${item.id}</div>
            </div>
        </div>
        </div>

    </div>`;
    }
    });
    
    if(noResults === true) {
    items = `
    <div class="col s12 center">
        <img src="https://i.ibb.co/fCjCZsK/having-job.png" style="width:100%;max-width:500px;margin-bottom:10px;border-radius: 5px;" class="z-depth-1">
        <p>No results found</p>
    </div>
    `
    }
    document.querySelectorAll('input').forEach(el => el.blur());
    document.getElementById("app").innerHTML = `
    <div style="position:fixed;top: 65px;left:0;width: 100%;height:calc(100vh - 65px);background:var(--nav-scroll-color);z-index: 999;overflow-y:scroll;margin-top: 10px;filter: brightness(98%);" class="z-depth-4" id="searchResultsApp">
    <div class="container">
        <br><br>
        ${noResults !== true ? `
        <p>Room</p>
        <div style="overflow-x:scroll;white-space: nowrap">
        <div class="chip chip-border waves-effect" onclick="filterSearchResults(this.innerText.toLowerCase())">Kitchen</div> 
        <div class="chip chip-border waves-effect" onclick="filterSearchResults(this.innerText.toLowerCase())">Bedroom</div> 
        <div class="chip chip-border waves-effect" onclick="filterSearchResults(this.innerText.toLowerCase())">Bathroom</div> 
        <div class="chip chip-border waves-effect" onclick="filterSearchResults(this.innerText.toLowerCase())">Laundry room</div> 
        <div class="chip chip-border waves-effect" onclick="filterSearchResults(this.innerText.toLowerCase())">Dining room</div> 
        <div class="chip chip-border waves-effect" onclick="filterSearchResults(this.innerText.toLowerCase())">Family</div> 
        <div class="chip chip-border waves-effect" onclick="filterSearchResults(this.innerText.toLowerCase())">Garage</div> 
        <div class="chip chip-border waves-effect" onclick="filterSearchResults(this.innerText.toLowerCase())">Camping supplies</div> 
        </div>

        <p>Options</p>
        <div style="overflow-x:scroll;white-space: nowrap">
        <div class="chip chip-border waves-effect" onclick="filterSearchResults(this.innerText.toLowerCase())">Starred</div> 
        <div class="chip chip-border waves-effect" onclick="filterSearchResults(this.innerText.toLowerCase())">In stock</div> 
        </div>
        
        <p>Category</p>
        <div style="overflow-x:scroll;white-space: nowrap">
        ${_categories.map(d => {return `<div class="chip chip-border waves-effect" onclick="filterSearchResults(this.innerText.toLowerCase())">${d.toString().replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;")}</div> `}).join("")}`: ""}
        </div>
        <div class="row" id="searchResultsAppRow">
        ${items}
        </div>
    </div>
    </div>
    `;
})
);

export function filterSearchResults(item) {
    document.getElementById("searchResultsAppRow").querySelectorAll(".col").forEach(el => {
       el.style.display = (el.innerHTML.toLowerCase().includes(item.toLowerCase()) ? "block":"none")
    })
    var found = false
      document.querySelectorAll("#searchResultsAppRow .col").forEach(el => {
         if($(this).is(":visible")) {
            found = true
         }
      })
   if(found === false) {
         document.getElementById("searchResultsAppRow").innerHTML = `<br><br><div class="col s12 center">
               <img src="https://i.ibb.co/fCjCZsK/having-job.png" style="width:100%;max-width:500px;margin-bottom:10px;border-radius: 5px;" class="z-depth-1">
               <p>No results found</p>
            </div>`
   }
}

/**  
 * Filters results when searching
 *  
 * @param {element} el - The element for filtering
 */
export function filterResults(el) {
   var value = el.innerText;
   document.querySelectorAll("#search_results li").forEach(el => {
      if (el.innerText.toString().toLowerCase().includes(value.toLowerCase())) {
         el.style.display = "block"
      }
      else {
         el.style.display = "none"
      }
   })
}