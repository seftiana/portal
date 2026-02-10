   var xmlhttp,alerted
   /*@cc_on @*/
   /*@if (@_jscript_version >= 5)
   // JScript gives us Conditional compilation, we can cope with old IE versions.
     try {
     xmlhttp=new ActiveXObject("Msxml2.XMLHTTP")
    } catch (e) {
     try {
       xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
     } catch (E) {
      alert("You must have Microsofts XML parsers available")
     }
    }
   @else
    alert("You must have JScript version 5 or above.")
    xmlhttp=false
    alerted=true
   @end @*/
   if (!xmlhttp && !alerted) {
    // Non ECMAScript Ed. 3 will error here (IE<5 ok), nothing I can 
    // realistically do about it, blame the w3c or ECMA for not
    // having a working versioning capability in  <SCRIPT> or
    // ECMAScript.
    try {
     xmlhttp = new XMLHttpRequest();
    } catch (e) {
     alert("You need a browser which supports an XMLHttpRequest Object.\nMozilla build 0.9.5 has this Object and IE5 and above, others may do, I don't know, any info jim@jibbering.com")
    }
   }

	function RSchange() {
	 if (xmlhttp.readyState==4) {
		//document.write (xmlhttp.responseText)
		document.getElementById('StatistikContainer').innerHTML = xmlhttp.responseText
	 }
	}
	
	function go(PageParam) {
	if (xmlhttp) { 
	  d=document
	  xmlhttp.open("GET", PageParam,true);
	  xmlhttp.onreadystatechange=RSchange
	  xmlhttp.send(null)
	 }
	}


   /*function RSchange() {
    if (xmlhttp.readyState==4) {
      //document.write (xmlhttp.responseText)
      document.getElementById('view_perusahaan_1').innerHTML = xmlhttp.responseText;
    }
   }*/
   
   
   /*function go(PageParam,divName) {
   if (xmlhttp) { 
     //window.alert(PageParam);
     d=document;
     xmlhttp.open("GET", PageParam,true);
     xmlhttp.onreadystatechange = RSchange;
     //window.alert(xmlhttp.readyState);
     xmlhttp.send(null);
    }
   }*/
   
   function goDetail(PageParam,divName) {
      var divIsi = document.getElementById(divName);
      if (xmlhttp) { 
        //window.alert(divName);
        d=document;
        xmlhttp.open("GET", PageParam,true);
        xmlhttp.onreadystatechange = function(){
         if(xmlhttp.readyState == 1){
            //document.getElementById(divName).innerHTML = "<br /><div style=\"text-align: center; width: 50%; border: 1px solid #999999; font-size: 14px; font-weight: bold; color: #CCCCCC;\"> Loading ....</div>";
            divIsi.innerHTML = document.getElementById(divName).innerHTML;
            //document.getElementById('menu_1').innerHtml = "<h4>Loading ...</h4>";
         }else if (xmlhttp.readyState==4) {
            divIsi.innerHTML = xmlhttp.responseText;
         }
        }
        //window.alert(xmlhttp.readyState);
        xmlhttp.send(null);
       }
   }