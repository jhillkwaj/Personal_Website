var selected = document.getElementById("selectDefault");
var tab = document.getElementById("tabDefault");

selected.style.backgroundColor = "#424242";
selected.style.color = "white";
tab.style.backgroundColor = "#BDBDBD";
tab.style.color = "black";


function sideMenue(obj ,name) {
  if(selected != obj) {
    document.getElementById('main').innerHTML = document.getElementById(name).innerHTML;

    obj.style.backgroundColor = "#424242";
    obj.style.color = "white";
    if(selected != null) {
      selected.id = "";
      selected.style.backgroundColor = null;
      selected.style.color = null;
    }
    selected = obj;
  }

  
}

function menueSelect(name) {
  sideMenue(document.getElementById(name+"TAB"), name);
}


function openLink(link) {
  window.open(link);
}

function openPage(link) {
  window.open(link+".html","_self");
}