var prevVisible=true,iA=false,iPD=false,nGrup=0,seq=0,gseq=0,my=0,gcon=new Array(),jml,ket={},tbl={},totData=new Array(),totPData=new Array(),uAsk=[],btsA=[],btsB=[],gJumlah=0;
function drawHasilKuisioner(){var id='cont';drawTable(id);drawChart(id);}
function drawSebaranResponden(){var id='cont';drawSebaranTable(id);drawSebaranChart(id);}
function switchPrevChartVisibility(){if(prevVisible){hidePrevChart();prevVisible=false;document.getElementById('shBut').innerHTML=' Tampilkan Semester Sebelumnya ';}else{showPrevChart();prevVisible=true;document.getElementById('shBut').innerHTML=' Sembunyikan Semester Sebelumnya ';}}
function drawChart(id){
var res='',el=document.getElementById(id);
if(my<4)my=4;
for(var k=0;k<dAsk.length;k++){
if(dIns[k]==undefined)continue;
var dLabel=new Array(),m=dAsk[k].length+1;
var D=new Diagram();
res+='<div id="con'+k+'" style="position:relative;height:350px;display:none;">';
for(var i=0;i<m-1;i++){dLabel.push((i+1));}
m=(m>10)?m:10;
D.SetFrame(40,20,670,306);
D.SetBorder(0,m,0,my+1);
D.SetGridColor("#808080","#CCCCCC");
D.SetText("","",'<b>'+dIns[k]+'</b>'+((dGrup[k]=='')?'':' : '+dGrup[k]));
D.SetAxisLabel(dLabel);
res+=D.Draw("",false);
var i,j,y,y0=D.ScreenY(0),mean,b,f;
for(i=0;i<m;i++){
f=12;
for(b in pAId[k]){
if(pAId[k][b]==dAId[k][i]){mean=(parseFloat(pData[k][b])/parseFloat(pJumlah[k][b])).toFixed(2);y=D.ScreenY(mean);j=D.ScreenX(i+1)-25;
res+=Box(true,j,y,y0,mean);
f=0;break;}
}
if(dData[k][i]!=undefined){mean=(parseFloat(dData[k][i])/parseFloat(dJumlah[k][i])).toFixed(2);y=D.ScreenY(mean);j=D.ScreenX(i+1)-f;
res+=Box(false,j,y,y0,mean);
}}res+='</div>';}
for(var k=0;k<nGrup;k++){
var dLabel=new Array();
var m=totData[k].length+1;
var D=new Diagram();
res+='<div id="tcon'+k+'" style="position:relative;height:350px;display:none;">';
for(var i=0;i<totData[k].length;i++){dLabel.push((i+1));}
m=(m>10)?m:10;
D.SetFrame(40,20,670,306);
D.SetBorder(0,m,0,my+1);
D.SetGridColor("#808080","#CCCCCC");
D.SetText("","",'<b>Grand Mean</b>'+((dGrup[uAsk[k]]=='')?'':' : '+dGrup[uAsk[k]]));
D.SetAxisLabel(dLabel);
res+=D.Draw("",false);
var i,j,y,y0=D.ScreenY(0),f;
for(i=0;i<m;i++){
f=12;
for(b in pAId[k]){
if(pAId[k][b]==dAId[k][i]){y=D.ScreenY(totPData[k][b]);j=D.ScreenX(i+1)-25;
res+=Box(true,j,y,y0,totPData[k][b]);
f=0;break;}
}
if(totData[k][i]!=undefined){y=D.ScreenY(totData[k][i]);j=D.ScreenX(i+1)-f;
res+=Box(false,j,y,y0,totData[k][i]);
}}res+='</div>';}
res+='<table><tr><td width="30px"><div class="curBox" style="position:relative;width:22px;">&nbsp</div></td><td>: Semester Sekarang</td></tr><tr><td><div class="prevBox" style="position:relative;width:22px;">&nbsp</div></td><td>: Semester Sebelumnya</td></tr></table>';
el.innerHTML+=res;
for(var k=0;k<nGrup;k++){tbl[k]=document.getElementById('dataTable'+k);ket[k]=document.getElementById('ketTable'+k);}
jml=(dAsk.length-1);
setBatasChart();
showDataGrup(0);
switchPrevChartVisibility();
hideNotify();
}
function drawSebaranChart(id){
var res='',el=document.getElementById(id);
var D=new Diagram();
res+='<div id="con" style="position:relative;height:350px;">';
m=(dGrup.length>10)?dGrup.length:10;
D.SetFrame(40,20,670,306);
D.SetBorder(0,m,0,my+1);
D.SetGridColor("#808080","#CCCCCC");
D.SetText("","",'<b>JUMLAH RESPONDEN</b>');
D.SetAxisLabel(dGrup);
res+=D.Draw("",false);
var i,j,y,y0=D.ScreenY(0),b,f;
for(i=0;i<dGrup.length;i++){
f=12;
if(totPData[i]!=undefined){
y=D.ScreenY(totPData[i]);j=D.ScreenX(i+1)-25;
res+=Box(true,j,y,y0,totPData[i].toFixed(0));
f=0;}
if(totData[i]!=undefined){y=D.ScreenY(totData[i]);j=D.ScreenX(i+1)-f;
totData[i]=parseFloat(totData[i]).toFixed(0);y=D.ScreenY(totData[i]);j=D.ScreenX(i+1);
res+=Box(false,j,y,y0,totData[i]);
}}res+='</div>';
el.innerHTML+=res;
for(var k=0;k<nGrup;k++){tbl[k]=document.getElementById('dataTable'+k);ket[k]=document.getElementById('ketTable'+k);}
switchPrevChartVisibility();
var tp=realTop(document.getElementById('footer'));
var el=document.getElementById('butt');
el.style.position='relative';
el.style.top=tp-700+'px';
el.innerHTML='<table style="margin-bottom:10px;"><tr><td width="30px"><div class="curBox" style="position:relative;width:22px;">&nbsp</div></td><td>: Semester Sekarang</td></tr><tr><td><div class="prevBox" style="position:relative;width:22px;">&nbsp</div></td><td>: Semester Sebelumnya</td></tr></table>'+el.innerHTML;
hideNotify();
}
function setBatasChart(){for(var j=0;j<gcon.length;j++){if(btsA[gcon[j]]==undefined){btsA[gcon[j]]=-1;btsB[gcon[j]]=gcon.length;}if(btsA[gcon[j]]<j)btsA[gcon[j]]=j;if(btsB[gcon[j]]>j)btsB[gcon[j]]=j;}}
function prevChart(el){el.disabled=true;var ns=parseInt(seq)-1;if(ns==(btsB[gseq]-1))showDataGrup(gseq);else if(gcon[ns]==undefined||gcon[ns]!=gseq){showChart(btsA[gseq]);}else showChart(ns);el.disabled=false;}
function nextChart(el){el.disabled=true;var ns=parseInt(seq)+1;if(gcon[ns]==undefined||gcon[ns]!=gseq)showDataGrup(gseq);else showChart(ns);el.disabled=false;}
function showChart(ns){var ncon=document.getElementById('con'+ns);var pcon=document.getElementById('con'+seq);if(ncon==undefined){var ncon=document.getElementById('con0');ns=0;}var ptcon=document.getElementById('tcon'+gseq);ptcon.style.display='none';if(pcon!=undefined)pcon.style.display='none';ncon.style.display='block';window.scroll(0,realTop(ncon));seq=ns;}
function realTop(obj){var curtop=0;if(obj.offsetParent)while(1){curtop+=obj.offsetTop;if(!obj.offsetParent)break;obj=obj.offsetParent;}else if(obj.y)curtop+=obj.y;return curtop;}
function showDataGrup(i){if(tbl[i]===undefined){i=0;}tbl[gseq].style.display='none';ket[gseq].style.display='none';tbl[i].style.display='';ket[i].style.display='';var ntcon=document.getElementById('tcon'+i);var ptcon=document.getElementById('tcon'+gseq);if(ntcon==undefined){var ntcon=document.getElementById('tcon0');i=0;}var pcon=document.getElementById('con'+seq);if(pcon!=undefined)pcon.style.display='none';ptcon.style.display='none';ntcon.style.display='block';gseq=i;seq=btsB[i]-1;}
function drawTable(id){
var cont=document.getElementById(id);var tblG=document.getElementById('pilihGrup');
var tGrup='-',num={},b=0,c=0,tmpData=[],tmpJumlah=[],tmpgJumlah=[],tmpPData=[],tmpPJumlah=[],tmpAId=[],tmpIns=[],tmpLink=[],tmpHeadCol=[];
num[nGrup]=0;tmpData[nGrup]=[];tmpPData[nGrup]=[];tmpIns[nGrup]=[];tmpLink[nGrup]=[];tmpAId[nGrup]=[];tmpJumlah[nGrup]=[];tmpgJumlah[nGrup]=[];tmpPJumlah[nGrup]=[];tmpHeadCol[nGrup]=[];totData[nGrup]=[];totPData[nGrup]=[];
var s=document.location.href.replace('#','');
var pos1=(s.indexOf('&m=')==-1)?s.length:s.indexOf('&m=');
var pos2=(s.indexOf('&j=')==-1)?s.length:s.indexOf('&j=');
var pos=(pos1<pos2)?pos1:pos2;
var thisSite=s.substring(0,pos1);
for(var j=0;j<dGrup.length;j++){
if(tGrup!=dGrup[j]){tGrup=dGrup[j];nGrup++;tmpData[nGrup]=[];tmpIns[nGrup]=[];tmpLink[nGrup]=[];tmpAId[nGrup]=[];tmpJumlah[nGrup]=[];tmpgJumlah[nGrup]=[];totData[nGrup]=[];totPData[nGrup]=[];tmpPData[nGrup]=[];tmpPJumlah[nGrup]=[];tmpHeadCol[nGrup]=[];num[nGrup]=0;b=0;}
if(num[(nGrup-1)]<dAsk[j].length){num[(nGrup-1)]=dAsk[j].length;uAsk[(nGrup-1)]=j;tmpHeadCol[(nGrup-1)]=dAId[j];}
if(dIns[j]!='')gcon[j]=(nGrup-1);
tmpIns[(nGrup-1)][b]=[];
tmpLink[(nGrup-1)][b]=[];
tmpAId[(nGrup-1)][b]=[];
tmpData[(nGrup-1)][b]=[];
tmpJumlah[(nGrup-1)][b]=[];
tmpgJumlah[(nGrup-1)][b]=[];
tmpPData[(nGrup-1)][b]=[];
tmpPJumlah[(nGrup-1)][b]=[];
for(var k=0;k<dAsk[j].length;k++){
tmpData[(nGrup-1)][b][dAId[j][k]]=parseFloat(dData[j][k]);
tmpJumlah[(nGrup-1)][b][dAId[j][k]]=parseFloat(dJumlah[j][k]);
if(gJumlah!=0)tmpgJumlah[(nGrup-1)][b][dAId[j][k]]=parseFloat(gJumlah[j][k]);
if(pData[j]!=undefined&&pData[j][k]!=undefined){tmpPData[(nGrup-1)][b][dAId[j][k]]=parseFloat(pData[j][k]);tmpPJumlah[(nGrup-1)][b][dAId[j][k]]=parseFloat(pJumlah[j][k]);}
tmpAId[(nGrup-1)][b][k]=dAId[j][k];
if(my<(tmpData[(nGrup-1)][b][dAId[j][k]]/tmpJumlah[(nGrup-1)][b][dAId[j][k]]))my=Math.ceil(tmpData[(nGrup-1)][b][dAId[j][k]]/tmpJumlah[(nGrup-1)][b][dAId[j][k]]);
}
tmpIns[(nGrup-1)][b]=dIns[j];
tmpLink[(nGrup-1)][b]=dLink[j];
b++;}
for(var j=0;j<nGrup;j++){
var lastRow = 2;
var tmpBobot=new Array();
var jSample=0;
var bbt=new Array(),jml=new Array();
var pBbt=new Array(),pJml=new Array();
tbl[j]=document.createElement('Table');
ket[j]=document.createElement('Table');
tbl[j].setAttribute('id','dataTable'+j);
ket[j].setAttribute('id','ketTable'+j);
tbl[j].setAttribute('class','table-common');
tbl[j].className='table-common';
tbl[j].style.display='none';
ket[j].style.display='none';
var rHead=tbl[j].insertRow(0);
rHead.setAttribute('id','headerTable');
if(tmpIns[j][0]=='')addKolom(rHead,'','th',2);else addKolom(rHead,dTipe,'th',2);
addKolom(rHead,'JUMLAH SAMPLE','th',2);
addKolom(rHead,'RERATA','th',2);
if(dGrup[uAsk[j]]!='')var gCol=addKolom(rHead,dGrup[uAsk[j]],'th',1);
rHead=tbl[j].insertRow(1);
rHead.setAttribute('id','headerTable');
var kHead=ket[j].insertRow(0);
kHead.setAttribute('id','headerTable');
var col=kHead.appendChild(document.createElement('th'));
col.appendChild(document.createTextNode('Keterangan :'));
if(dTipe=='GROUP')for(var k=0;k<num[j];k++){addKolom(rHead,(k+1),'th',1);if(gTipe<3)addKet(ket[j],(k+1),'<a href="'+thisSite+'&m='+dDest[2]+'&g='+gTipe+'&d='+dAId[uAsk[j]][k]+'">'+dAsk[uAsk[j]][k]+'</a>');else addKet(ket[j],(k+1),dAsk[uAsk[j]][k]);}
else for(var k=0;k<num[j];k++){addKolom(rHead,(k+1),'th',1);addKet(ket[j],(k+1),dAsk[uAsk[j]][k]);}
col.setAttribute('colspan',2);
col.colSpan=2;
col.style.textAlign='left';
if(dGrup[uAsk[j]]!=''){gCol.setAttribute('colspan',num[j]);gCol.colSpan=num[j];
var colG=addKolomInst(tblG.rows[0],'<a href="#" class="button" onClick="showDataGrup('+j+')">'+dGrup[uAsk[j]]+'</a>','th');}
if(tmpIns[j][0]==''){
for(var i=0;i<tmpData[j].length;i++){
	var b=0,tSample;
	tSample=parseInt(dCount[j]);
	if(dTipe=='GROUP')jSample=Math.max(jSample,tSample);
	else jSample+=tSample;
	for(var k=0;k<num[j];k++){
		if(tmpAId[j][i][b]!=tmpHeadCol[j][k]){continue;}
		var kBbt=tmpData[j][i][tmpAId[j][i][b]];
		var kJml=tmpJumlah[j][i][tmpAId[j][i][b]];
		if(kBbt==undefined||bbt[k]==NaN)kBbt=0.0;
		if(kJml==undefined||kJml[k]==NaN)kJml=0.0;
		bbt[k]=(bbt[k]===undefined)?kBbt:(bbt[k]+kBbt);
		jml[k]=(jml[k]===undefined)?kJml:jml[k]+kJml;
		b++;
	}
}}else{
for(var i=0;i<tmpData[j].length;i++){
	var row=tbl[j].insertRow(lastRow);
	var tBbt=0,tJml=0,b=0,tSample;
	lastRow++;
	tSample=parseInt(dCount[j]);
	if(dTipe=='GROUP')jSample=Math.max(jSample,tSample);
	else jSample+=tSample;
	
	if(dTipe=='FAKULTAS')addKolomInst(row,'<a href="'+document.location.href.replace('#','')+'&m='+dDest[0]+'&d='+tmpLink[j][i]+'" class="button">'+tmpIns[j][i]+'</a>','td');
	else addKolomInst(row,'<a href="#" class="button" onClick="showChart('+c+');return false;">'+tmpIns[j][i]+'</a>','td');
	addKolom(row,tSample.toFixed(2),'td',1);
	var rerata=addKolom(row,'','td',1);
	for(var k=0;k<num[j];k++){
		if(tmpAId[j][i][b]!=tmpHeadCol[j][k]){addKolomInst(row,'','td');continue;}
		var kBbt=tmpData[j][i][tmpAId[j][i][b]];
		var kJml=tmpJumlah[j][i][tmpAId[j][i][b]];
		if(tmpPData[j]!=undefined&&tmpPData[j][i]!=undefined&&tmpPData[j][i][tmpAId[j][i][b]]!=undefined){
		var kPBbt=tmpPData[j][i][tmpAId[j][i][b]];
		var kPJml=tmpPJumlah[j][i][tmpAId[j][i][b]];
		pBbt[k]=(pBbt[k]===undefined)?kPBbt:(pBbt[k]+kPBbt);
		pJml[k]=(pJml[k]===undefined)?kPJml:pJml[k]+kPJml;
		}
		if(kBbt==undefined||kBbt[k]==NaN)kBbt=0.0;
		if(kJml==undefined||kJml[k]==NaN)kJml=0.0;
		addKolomInst(row,'<a href="#" onClick="showChart('+c+');return false;" class="button">'+((kJml!=0.0)?(kBbt/kJml).toFixed(2):'')+'</a>','td');
		bbt[k]=(bbt[k]===undefined)?kBbt:(bbt[k]+kBbt);
		jml[k]=(jml[k]===undefined)?kJml:jml[k]+kJml;
		tBbt+=kBbt;tJml+=kJml;
		b++;
	}
	rerata.innerHTML=(tBbt/tJml).toFixed(2);
	c++;
}}
var row=tbl[j].insertRow(lastRow);
if(dTipe=='JURUSAN')addKolomInst(row,'<a href="'+thisSite+'" class="button">Grand Mean</a>','td');
else if(dTipe=='GROUP'&&gUp!='')addKolomInst(row,'<a href="'+thisSite+'&m='+dDest[2]+'&g=*'+gTipe+'&d='+gUp+'" class="button">Grand Mean</a>','td');
else addKolomInst(row,'<a href="#" class="button" onClick="showDataGrup('+(j)+');return false;">Grand Mean</a>','td');
if(dTipe=='MATAKULIAH')jSample=jSample/3;
addKolom(row,(Math.ceil(jSample)).toFixed(2),'td',1);
var rerata=addKolom(row,'','td',1);
var totalBobot=0,totalJml=0;
for(k=0;k<num[j];k++){var grMean=((jml[k]!=0.0)?(bbt[k]/jml[k]).toFixed(2):0.0);totalBobot+=bbt[k];totalJml+=jml[k];addKolomInst(row,'<a href="#" onClick="showDataGrup('+j+');return false;" class="button">'+grMean+'</a>','td');
totData[j][k]=grMean;totPData[j][k]=((pJml[k]!=0.0)?(pBbt[k]/pJml[k]).toFixed(2):0.0);}
rerata.innerHTML=(totalBobot/totalJml).toFixed(2);
cont.appendChild(tbl[j]);
cont.appendChild(ket[j]);
}
if(dDest[1]!=''){
var tmpNGrup=nGrup;
var jmlCol1=tmpNGrup;
var rowG=tblG.insertRow(0);var col=rowG.appendChild(document.createElement('th'));
if(dTipe=='MATAKULIAH')col.innerHTML='<a href="'+thisSite+'" class="button">LIHAT HASIL KUISIONER GLOBAL</a>';
else col.innerHTML='<a href="'+thisSite+'&m='+dDest[1]+'" class="button">LIHAT HASIL KUISIONER MATAKULIAH</a>';
if(iA){
if(tmpNGrup<3){tmpNGrup=3;if(!colG){}else{colG.setAttribute('colspan',3);colG.colSpan=3;}}
jmlCol1=parseInt(tmpNGrup/3);
var col2=rowG.appendChild(document.createElement('th'));col2.setAttribute('colspan',(jmlCol1));col2.colSpan=(jmlCol1);
if(iPD)col2.innerHTML='<a href="'+thisSite+'" class="button">LIHAT HASIL KUISIONER GLOBAL</a>';
else col2.innerHTML='<a href="'+thisSite+'&m='+dDest[2]+'" class="button">LIHAT HASIL KUISIONER PER INSTANSI</a>';
var col3=rowG.appendChild(document.createElement('th'));col3.setAttribute('colspan',(tmpNGrup-(2*jmlCol1)));col3.colSpan=(tmpNGrup-(2*jmlCol1));
col3.innerHTML='<a href="'+thisSite+'&j=aRfj" class="button">LIHAT SEBARAN RESPONDEN</a>';}
col.setAttribute('colspan',jmlCol1);col.colSpan=jmlCol1;
}
}
function drawSebaranTable(id){
var cont=document.getElementById(id);var tblG=document.getElementById('pilihGrup');
var jml=0,b=0,c=1,gjml=0,pjml=0;
var sTbl=document.createElement('Table');
sTbl.setAttribute('id','dataTable');
sTbl.className='table-common';
var rHead=sTbl.insertRow(0);
rHead.setAttribute('id','headerTable');
addKolom(rHead,'FAKULTAS','th',1);
addKolom(rHead,'JURUSAN','th',1);
addKolom(rHead,'TOTAL','th',1);
for(var j=0;j<dGrup.length;j++){
var row=sTbl.insertRow(c);
c++;
if(dGrup[j]=='')addKolom(row,'Non Program Studi','td',dAsk[j].length);
else addKolom(row,dGrup[j],'td',dAsk[j].length);
addKolom(row,dAsk[j][0],'td',1);
addKolom(row,dData[j][0],'td',1);
gjml=parseInt(dData[j][0]);
pjml=(pData[j][0]==undefined)?0:parseInt(pData[j][0]);
for(b=1;b<dAsk[j].length;b++){
var row=sTbl.insertRow(c);
addKolom(row,dAsk[j][b],'td',1);
addKolom(row,dData[j][b],'td',1);
gjml+=parseInt(dData[j][b]);
pjml+=(pData[j][b]==undefined)?0:parseInt(pData[j][b]);
c++;}
jml+=gjml;
totData[j]=gjml;
totPData[j]=pjml;
if(my<gjml)my=gjml;
}
var row=sTbl.insertRow(c);
var col=addKolom(row,'Grand Mean','td',1);
col.colSpan=2;col.setAttribute('colspan',2);
addKolom(row,jml,'td',1);
cont.appendChild(sTbl);

var rowG=tblG.insertRow(0);var col=rowG.appendChild(document.createElement('th'));
var s=document.location.href.replace('#','');
col.innerHTML='<a href="'+s.replace(/(&j=)[\w\d&=]+/,'')+'" class="button">LIHAT HASIL KUISIONER</a>';
}
function addKolom(el,d,t,rp){var th=document.createElement(t);var col=el.appendChild(th);var tNode=document.createTextNode(d);if(rp>1){col.setAttribute('rowspan',rp);col.rowSpan=rp;}col.appendChild(tNode);return col;}
function addKolomInst(el,d,t){var td=document.createElement(t);var col=el.appendChild(td);col.innerHTML=d;return col;}
function addKet(el,i,d){var row=el.insertRow(el.rows.length);var td=document.createElement('td');var col=row.appendChild(td);var tNode=document.createTextNode(i);col.appendChild(tNode);var col=row.insertCell(1);col.innerHTML=': '+d;}
function showNotify(){var ly=document.getElementById('layar');ly.style.backgroundColor='#ffffff';ly.style.height=(screen.height-110)+'px';ly.style.visibility='visible';}
function hideNotify(){var ly=document.getElementById('layar');ly.style.visibility='hidden';}