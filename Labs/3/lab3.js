
//adding favorite quote
var newDiv = document.getElementsByTagName('div')[Math.floor(Math.random()*4)].cloneNode();
document.body.appendChild(newDiv);
//done adding favorite quote

// tree of elements
var root = document.getElementsByTagName('html')[0];

var str = domIterate(root);
document.getElementById('info').innerHTML = str;

function domIterate(current, depth) {
	
	if(!depth){
		depth = 0;
	}
	
	if(current.nodeType == 1) {
		var txt = '';
		
		for(var i = 0; i < depth; i++){
			txt += '-';
		}
	
		txt += current.tagName + "\n";
		
		for(var n = 0; n < current.childNodes.length; n++){
			var childTxt = domIterate(current.childNodes[n], depth + 1);
			if(childTxt != null && childTxt != ''){
				txt += childTxt;
			}
		}
		
		return txt;
	} else {
		return null;
	}
}
//end tree of elements

//on click listener
addListener(document.getElementsByTagName('html')[0]);

function addListener(current){
	if(current.nodeType == 1){
		current.onclick = function() { 
			alert(current.tagName); 
		};
		
		for(var n = 0; n < current.childNodes.length; n++){
			addListener(current.childNodes[n]);
		}
	}
}
//end of on click

//mouse over listener

addMouseListeners();

function addMouseListeners(){
	var divs = document.getElementsByTagName('div');
	
	for(var i = 0; i < divs.length; i++){
		divs[i].onmouseover = function() { 
			this.style.background = "blue";
			this.style.padding = "0px 0px 0px 10px";
		};
		divs[i].onmouseout = function() { 
			this.style.background = "white";
			this.style.padding = "0px 0px 0px 0px";
		};
	}
}