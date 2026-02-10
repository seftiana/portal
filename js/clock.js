<!--
if(navigator.appName == "Netscape") {
document.write('<layer id="clock"></layer>');
}

if (navigator.appVersion.indexOf("MSIE") != -1){
document.write('<span id="clock"></span>');
}

DaysofWeek = new Array()
  DaysofWeek[0]="Minggu"
  DaysofWeek[1]="Senin"
  DaysofWeek[2]="Selasa"
  DaysofWeek[3]="Rabu"
  DaysofWeek[4]="Kamis"
  DaysofWeek[5]="Jumat"
  DaysofWeek[6]="Sabtu"

Months = new Array()
  Months[0]="Januari"
  Months[1]="Februari"
  Months[2]="Maret"
  Months[3]="April"
  Months[4]="Mei"
  Months[5]="Juni"
  Months[6]="Juli"
  Months[7]="Agustus"
  Months[8]="September"
  Months[9]="Oktober"
  Months[10]="November"
  Months[11]="Desember"

function upclock(){
var dte = new Date();
var hrs = dte.getHours();
var min = dte.getMinutes();
var sec = dte.getSeconds();
var day = DaysofWeek[dte.getDay()]
var date = dte.getDate()
var month = Months[dte.getMonth()]
var year = dte.getFullYear()

var col = ":";
var spc = " ";
var apm;

if (hrs == 0) hrs=12;
if (hrs<=9) hrs="0"+hrs;
if (min<=9) min="0"+min;
if (sec<=9) sec="0"+sec;

if(navigator.appName == "Netscape") {
document.clock.document.write(hrs+col+min+col+sec+spc+day+spc+date+spc+month+spc+year);
document.clock.document.close();
}

if (navigator.appVersion.indexOf("MSIE") != -1){
clock.innerHTML = hrs+col+min+col+sec+spc+day+spc+date+spc+month+spc+year;
}
}
setInterval("upclock()",1000);
//-->
