

function showSearch(){
	
	var searchBar=document.getElementById('searchInput');
		state=getComputedStyle(searchBar).display

	if (state==="none"){

		console.log("none");
		searchBar.style.display="inline-block"
		
	}

	else if (state==="inline-block"){

		console.log("block");
		searchBar.style.display="none"
		console.log("submit")
	}

	document.querySelector('#searchBtn').hidden=false;


}

function showSearchPop(){

	

	var searchRow=document.getElementById('searchPop');
	var searchBar=document.getElementById('searchInput2');
	console.log(searchBar)
		state=getComputedStyle(searchBar).display
		console.log(state)

	if (state==="none"){

		console.log("none");
		searchRow.style.display="block"
		searchBar.style.display="block"
		
	}

	else if (state==="block"){

		console.log("block");
		searchBar.style.display="none"
		searchRow.style.display="none"
		
		console.log("submit")
	}

	document.querySelector('#searchBtn2').hidden=false;
}


function openNav() {
	
 $('body').css('overflow','hidden')
  document.getElementById("mySidenav").style.width = "320px";

}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  $('body').css('overflow','auto')
} 

function cenaUpdate(min,max){
	
	var val=max-min;
	var slider=document.querySelectorAll("[id='slider']")[1];
	
	var od=Math.floor(Number((window.getComputedStyle(slider).getPropertyValue('--low').slice(0,-1))-1)*(val/100)+min);
	var do_cena=Math.floor((Number(window.getComputedStyle(slider).getPropertyValue('--high').slice(0,-1))+1)*(val/100)+min);
	
	if (od>do_cena){
		var pom=od;
		od=do_cena;
		do_cena=pom;
	}
	
	document.getElementById("labelOd").innerHTML=od-1+"€";
	document.getElementById("labelDo").innerHTML=do_cena+1+"€";
	
}

function showSizeFilter(){
	var filter=document.getElementById("sizeFilter");
	var visib=getComputedStyle(filter).display
	if (visib==="none"){
		filter.style.display="block";
		console.log("A")
		document.getElementById("sizeButton").style.color="#96262e";

	}

	else {
		filter.style.display="none";
		console.log("B")
		document.getElementById("sizeButton").style.color="white";
	}

}

function reset(){
	  var items = document.getElementsByName('optradio')
        for (var i = 0; i < items.length; i++) {
            if (items[i].type == 'checkbox')
                items[i].checked = false;
        }
}

function showColectionFilter(){
	var filter=document.getElementById("colectionFilter");
	var visib=getComputedStyle(filter).display
	if (visib==="none"){
		filter.style.display="block";
		console.log("A")
		document.getElementById("colectionButton").style.color="#96262e";

	}

	else {
		filter.style.display="none";
		console.log("B")
		document.getElementById("colectionButton").style.color="white";
	}

}

function showColorFilter(){
	var filter=document.getElementById("colorFilter");
	var visib=getComputedStyle(filter).display
	if (visib==="none"){
		filter.style.display="block";
		console.log("A")
		document.getElementById("colorButton").style.color="#96262e";

	}

	else {
		filter.style.display="none";
		console.log("B")
		document.getElementById("colorButton").style.color="white";
	}

}


function quantity_change(){
	if(document.querySelector('.quantity_input').value>document.querySelector('.quantity_input').max){
		document.querySelector('.quantity_input').value=document.querySelector('.quantity_input').max;
	}
}

function quantity(dif){
	var a=document.querySelector('.quantity_input');
	var val=a.value;
	
	
	if (Number(dif)==-1){
		if (Number(val)>1){
			document.querySelector('.quantity_input').value=Number(val)+Number(dif);
			document.querySelector('input[name="quantityHidden"]').value=Number(val)+Number(dif);
		}
			
	} 

	else {
		if(Number(val)<a.max){
		document.querySelector('.quantity_input').value=Number(val)+Number(dif);
		document.querySelector('input[name="quantityHidden"]').value=Number(val)+Number(dif);
		}
	}
	

}

function size_picked(stock){
	var a=document.querySelector('.dropdown-menu >label >input[type="radio"]:checked').value;
	document.getElementById("sizeLabel").innerHTML=a;
	check_stock(stock);
}

function sizeValue(){
	return document.querySelector('.dropdown-menu >label >input[type="radio"]:checked').value;
}

function colorValue(){
	return document.querySelector('.color_picker >li >input[type="radio"]:checked').value;
}
function check_stock(stock){
	console.log(stock)
	var size=document.querySelector('.dropdown-menu >label >input[type="radio"]:checked')
	var color=document.querySelector('.color_picker >li >input[type="radio"]:checked')
	console.log(size)
	console.log(color)
	var in_stock=false;
	if (size!=null && color!=null){
		console.log(color.value)
		for (var i=0; i<stock.length; i++){
			if (size.value==stock[i]['size_name'] && color.value==stock[i]['color_code']){
				document.querySelector('.quantity_input').max=stock[i]['count'];
				document.querySelector('#show_stock').innerHTML="Skladom: "+stock[i]['count']+" ks";
				document.querySelector('.cart_add').disabled=false;
				document.querySelector('.cart_add').innerHTML='Pridať do košíka';
				document.querySelector('input[name="colorHidden"]').value=color.value;
				document.querySelector('input[name="sizeHidden"]').value=size.value;
				in_stock=true;
				break;
			}
		}
		if(!in_stock){
				document.querySelector('.quantity_input').max=1;
				document.querySelector('#show_stock').innerHTML="Skladom: 0 ks";
				document.querySelector('.cart_add').disabled=true;
				document.querySelector('.cart_add').innerHTML='Nie je skladom';
		}
	}
}



function radio_load(){
	var itemValue = localStorage.getItem("option");
    if (itemValue !== null) {
        $("input[value=\""+itemValue+"\"]").prop('checked','checked');
	}
	
}

function filter_load(){
	var itemValue=localStorage.getItem("collection").split(',');
	console.log('Ah '+itemValue.length);
	for (var i=0;i<itemValue.length;i++){
		console.log(itemValue[i]);
		$("input[name='collection'][value=\""+itemValue[i]+"\"]").prop('checked',true);
	}
	itemValue=localStorage.getItem("color_name").split(',');
	console.log('Aj '+itemValue.length);
	for (var i=0;i<itemValue.length;i++){
		console.log(itemValue[i]);
		$("input[name='color_name'][value=\""+itemValue[i]+"\"]").prop('checked',true);
	}
	itemValue=localStorage.getItem("size_name").split(',');
	console.log('Ak '+itemValue.length);
	for (var i=0;i<itemValue.length;i++){
		console.log(itemValue[i]);
		$("input[name='size_name'][value=\""+itemValue[i]+"\"]").prop('checked',true);
	}

	openNav();
}

function radio_redir(value,query){
	
	//var parsed=value.split('|');
	localStorage.setItem("option", value);
	//location.href='?order='+parsed[0]+'&sort='+parsed[1];
	location.href=query;

}


function filter_to_query(curr_url,full_url){
	console.log(curr_url)
	var checked_size=[...document.querySelectorAll('input[name=size_name]:checked')].map(e=>e.value)
	localStorage.setItem("size_name", checked_size);
	var checked_color=[...document.querySelectorAll('input[name=color_name]:checked')].map(e=>e.value)
	localStorage.setItem("color_name", checked_color);
	var checked_collection=[...document.querySelectorAll('input[name=collection]:checked')].map(e=>e.value)
	localStorage.setItem("collection", checked_collection);
	console.log(checked_size);
	console.log(checked_color);
	console.log(checked_collection);
	var query_string=decodeURIComponent(full_url).split('/');
	query_string=query_string[query_string.length-1];
	console.log('Halo '+query_string);
	var query_string='';
	if (curr_url.includes('?')===false){
		query_string=query_string+'?';
	}
	else {
		query_string=query_string+'&';
	}
	if (checked_color.length>0){
		query_string=query_string+'color_name='+checked_color.join(',')+'&';
	}
	if (checked_size.length>0){
		query_string=query_string+'size_name='+checked_size.join(',')+'&';
	}
	if (checked_collection.length>0){
		query_string=query_string+'collection='+checked_collection.join(',')+'&';
	}

	var price_from=Number(document.getElementById("labelOd").innerHTML.slice(0,-1));
	var price_to=Number(document.getElementById("labelDo").innerHTML.slice(0,-1));
	console.log(price_from);
	console.log(price_to);
	query_string=query_string+'price='+price_from+","+price_to;
	console.log(query_string);
	location.href=curr_url+query_string;
}