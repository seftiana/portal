var oddEven = function() {
  // var content = document.getElementById('
   var tables = document.getElementsByTagName('table'); 
   var jumTables = tables.length;
   for (i=0; i<jumTables; i++) {//alert(tables[i].className);
      if (tables[i].className == 'table-common') {
         var trs = tables[i].getElementsByTagName('tr'); //alert(trs.length);
         for (j=0; j<trs.length; j++) {
            if (!(j % 2) && trs[j].className != "table-common-alert") {
               trs[j].className += " table-common-even";
            }
         }
      }
   }
}

window.onload=oddEven;