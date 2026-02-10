// JavaScript Diagram Builder 3.33
// Copyright (c) 2001-2005 Lutz Tautenhahn, all rights reserved.
//
// The Author grants you a non-exclusive, royalty free, license to use,
// modify and redistribute this software, provided that this copyright notice
// and license appear on all copies of the software.
// This software is provided "as is", without a warranty of any kind.

var _N_Dia=0,_N_Box=0,_zIndex=0,xLabel,_prevChart=[];
if(navigator.appName == "Microsoft Internet Explorer"){var _dSize=1;document.execCommand("BackgroundImageCache",false,true);}else var _dSize=-1;
if(navigator.userAgent.search("Opera")>=0)_dSize=-1;
var _IE=0;
if (_dSize==1){_IE=1;if (window.document.documentElement.clientHeight) _dSize=-1;}
var _nav4=(document.layers)?1:0;
var _PathToScript="";
var arrImg=["images/chart/v_blue.gif","images/chart/v_red.gif"];
for(var i in arrImg){var pic=new Image(1,1);pic.src=arrImg[i];}
function Diagram(){
this.xtext="";
this.ytext="";
this.title="";
this.XScale="function _parseAxisLabel";
this.YScale=1;
this.ID="Dia"+_N_Dia; _N_Dia++; _zIndex++;
this.zIndex=_zIndex;
this.logsub=new Array(0.301, 0.477, 0.602, 0.699, 0.778, 0.845, 0.903, 0.954);
this.SetAxisLabel=_SetAxisLabel;
this.SetFrame=_SetFrame;
this.SetBorder=_SetBorder;
this.SetText=_SetText;
this.SetGridColor=_SetGridColor;
this.SetXGridColor=_SetXGridColor;
this.SetYGridColor=_SetYGridColor;
this.ScreenX=_ScreenX;
this.ScreenY=_ScreenY;
this.RealX=_RealX;
this.RealY=_RealY;
this.XGrid=new Array(3);
this.YGrid=new Array(3);
this.XGridDelta=1;
this.YGridDelta=0;
this.XSubGrids=0;
this.YSubGrids=0;
this.SubGrids=0;
this.XGridColor="";
this.YGridColor="";
this.XSubGridColor="";
this.YSubGridColor="";
this.MaxGrids=0;
this.DateInterval=_DateInterval;
this.Draw=_Draw;
this.SetTitle=_SetTitle;
return(this);
}
function EvalSafe(ss){var jj="";if(ss.indexOf("^")>=0)return("");try{with(Math)jj=eval(ss);}catch(error){return("");}return(jj);}
function _SetTitle(theTitle){var id=this.ID, selObj;selObj=document.getElementById(id);selObj.title=theTitle;}
function _parseAxisLabel(nn){var ret=((xLabel[nn]==undefined)?'':xLabel[nn]);return ret;}
function _SetAxisLabel(dat){xLabel=dat;}
function _SetFrame(theLeft, theTop, theRight, theBottom){this.left=theLeft;this.right=theRight;this.top=theTop;this.bottom=theBottom;}
function _SetBorder(theLeftX, theRightX, theBottomY, theTopY){this.xmin=theLeftX;this.xmax=theRightX;this.ymin=theBottomY;this.ymax=theTopY;}
function _SetText(theScaleX, theScaleY, theTitle){this.xtext=theScaleX;this.ytext=theScaleY;this.title=theTitle;}
function _SetGridColor(theGridColor, theSubGridColor){this.XGridColor=theGridColor;this.YGridColor=theGridColor;if((theSubGridColor)||(theSubGridColor=="")){this.XSubGridColor=theSubGridColor;this.YSubGridColor=theSubGridColor;}}
function _SetXGridColor(theGridColor, theSubGridColor){this.XGridColor=theGridColor;if ((theSubGridColor)||(theSubGridColor==""))this.XSubGridColor=theSubGridColor;}
function _SetYGridColor(theGridColor, theSubGridColor){this.YGridColor=theGridColor;if ((theSubGridColor)||(theSubGridColor==""))this.YSubGridColor=theSubGridColor;}
function _ScreenX(theRealX){return(Math.round((theRealX-this.xmin)/(this.xmax-this.xmin)*(this.right-this.left)+this.left));}
function _ScreenY(theRealY){return(Math.round((this.ymax-theRealY)/(this.ymax-this.ymin)*(this.bottom-this.top)+this.top));}
function _RealX(theScreenX){return(this.xmin+(this.xmax-this.xmin)*(theScreenX-this.left)/(this.right-this.left));}
function _RealY(theScreenY){return(this.ymax-(this.ymax-this.ymin)*(theScreenY-this.top)/(this.bottom-this.top));}
function _sign(rr){if (rr<0) return(-1); else return(1);}
function _DateInterval(vv){
  var bb=140*24*60*60*1000; //140 days
  this.SubGrids=4;
  if (vv>=bb) //140 days < 5 months
  { bb=8766*60*60*1000;//1 year
    if (vv<bb) //1 year 
      return(bb/12); //1 month
    if (vv<bb*2) //2 years 
      return(bb/6); //2 month
    if (vv<bb*5/2) //2.5 years
    { this.SubGrids=6; return(bb/4); } //3 month
    if (vv<bb*5) //5 years
    { this.SubGrids=6; return(bb/2); } //6 month
    if (vv<bb*10) //10 years
      return(bb); //1 year
    if (vv<bb*20) //20 years
      return(bb*2); //2 years
    if (vv<bb*50) //50 years
    { this.SubGrids=5; return(bb*5); } //5 years
    if (vv<bb*100) //100 years
    { this.SubGrids=5; return(bb*10); } //10 years
    if (vv<bb*200) //200 years
      return(bb*20); //20 years
    if (vv<bb*500) //500 years
    { this.SubGrids=5; return(bb*50); } //50 years
    this.SubGrids=5; return(bb*100); //100 years
  }
  bb/=2; //70 days
  if (vv>=bb) { this.SubGrids=7; return(bb/5); } //14 days
  bb/=2; //35 days
  if (vv>=bb) { this.SubGrids=7; return(bb/5); } //7 days
  bb/=7; bb*=4; //20 days
  if (vv>=bb) return(bb/5); //4 days
  bb/=2; //10 days
  if (vv>=bb) return(bb/5); //2 days
  bb/=2; //5 days
  if (vv>=bb) return(bb/5); //1 day
  bb/=2; //2.5 days
  if (vv>=bb) return(bb/5); //12 hours
  bb*=3; bb/=5; //1.5 day
  if (vv>=bb) { this.SubGrids=6; return(bb/6); } //6 hours
  bb/=2; //18 hours
  if (vv>=bb) { this.SubGrids=6; return(bb/6); } //3 hours
  bb*=2; bb/=3; //12 hours
  if (vv>=bb) return(bb/6); //2 hours
  bb/=2; //6 hours
  if (vv>=bb) return(bb/6); //1 hour
  bb/=2; //3 hours
  if (vv>=bb) { this.SubGrids=6; return(bb/6); } //30 mins
  bb/=2; //1.5 hours
  if (vv>=bb) { this.SubGrids=5; return(bb/6); } //15 mins
  bb*=2; bb/=3; //1 hour
  if (vv>=bb) { this.SubGrids=5; return(bb/6); } //10 mins
  bb/=3; //20 mins
  if (vv>=bb) { this.SubGrids=5; return(bb/4); } //5 mins
  bb/=2; //10 mins
  if (vv>=bb) return(bb/5); //2 mins
  bb/=2; //5 mins
  if (vv>=bb) return(bb/5); //1 min
  bb*=3; bb/=2; //3 mins
  if (vv>=bb) { this.SubGrids=6; return(bb/6); } //30 secs
  bb/=2; //1.5 mins
  if (vv>=bb) { this.SubGrids=5; return(bb/6); } //15 secs
  bb*=2; bb/=3; //1 min
  if (vv>=bb) { this.SubGrids=5; return(bb/6); } //10 secs
  bb/=3; //20 secs
  if (vv>=bb) { this.SubGrids=5; return(bb/4); } //5 secs
  bb/=2; //10 secs
  if (vv>=bb) return(bb/5); //2 secs
  return(bb/10); //1 sec
}
function _DateFormat(vv, ii, ttype){
  var yy, mm, dd, hh, nn, ss, vv_date=new Date(vv);
  Month=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  Weekday=new Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
  if (ii>15*24*60*60*1000)
  { if (ii<365*24*60*60*1000)
    { vv_date.setTime(vv+15*24*60*60*1000);
      yy=vv_date.getUTCFullYear()%100;
      if (yy<10) yy="0"+yy;
      mm=vv_date.getUTCMonth()+1;
      if (ttype==5) ;//You can add your own date format here
      if (ttype==4) return(Month[mm-1]);
      if (ttype==3) return(Month[mm-1]+" "+yy);
      return(mm+"/"+yy);
    }
    vv_date.setTime(vv+183*24*60*60*1000);
    yy=vv_date.getUTCFullYear();
    return(yy);
  }
  vv_date.setTime(vv);
  yy=vv_date.getUTCFullYear();
  mm=vv_date.getUTCMonth()+1;
  dd=vv_date.getUTCDate();
  ww=vv_date.getUTCDay();
  hh=vv_date.getUTCHours();
  nn=vv_date.getUTCMinutes();
  ss=vv_date.getUTCSeconds();
  if (ii>=86400000)//1 day
  { if (ttype==5) ;//You can add your own date format here
    if (ttype==4) return(Weekday[ww]);
    if (ttype==3) return(mm+"/"+dd);
    return(dd+"."+mm+".");
  }
  if (ii>=21600000)//6 hours 
  { if (hh==0) 
    { if (ttype==5) ;//You can add your own date format here
      if (ttype==4) return(Weekday[ww]);
      if (ttype==3) return(mm+"/"+dd);
      return(dd+"."+mm+".");
    }
    else
    { if (ttype==5) ;//You can add your own date format here
      if (ttype==4) return((hh<=12) ? hh+"am" : hh%12+"pm");
      if (ttype==3) return((hh<=12) ? hh+"am" : hh%12+"pm");
      return(hh+":00");
    }
  }
  if (ii>=60000)//1 min
  { if (nn<10) nn="0"+nn;
    if (ttype==5) ;//You can add your own date format here
    if (ttype==4) return((hh<=12) ? hh+"."+nn+"am" : hh%12+"."+nn+"pm");
    if (nn=="00") nn="";
    else nn=":"+nn;
    if (ttype==3) return((hh<=12) ? hh+nn+"am" : hh%12+nn+"pm");
    if (nn=="") nn=":00";
    return(hh+nn);
  }
  if (ss<10) ss="0"+ss;
  return(nn+":"+ss);
}
function _nvl(vv,rr){if(vv==null)return(rr);var ss=String(vv);while(ss.search("'")>=0)ss=ss.replace("'","&#39;");return(ss);}
function _IsImage(ss){if(!ss)return(false);var tt=String(ss).toLowerCase().split(".");if(tt.length!=2)return(false);switch (tt[1]){case "gif":return(true);case "png":return(true);case "jpg":return(true); case "jpg":return(true);return(false);}}

function _Draw(theDrawColor, isScaleText)
{ var x0,y0,i,j,itext,l,x,y,r,u,fn,dx,dy,xr,yr,invdifx,invdify,deltax,deltay,id=this.ID,divtext="",ii=0,k,sub,sshift,res='';
    res+="<div id='"+this.ID+"' class='chart'>"; 
  if (_IsImage(theDrawColor)) divtext="<div id='"+this.ID+"i"+eval(ii++)+"' style='left:"+eval(this.left)+"px; width:"+eval(this.right-this.left+_dSize)+"px; top:"+eval(this.top)+"px; height:"+eval(this.bottom-this.top+_dSize)+"px;border-style:solid; border-width:1px; z-index:"+this.zIndex+"'><img src='"+theDrawColor+"' width="+eval(this.right-this.left-1)+" height="+eval(this.bottom-this.top-1)+"></div>";
  else divtext="<div id='"+this.ID+"i"+eval(ii++)+"' class='chart' style='left:"+eval(this.left)+"px; width:"+eval(this.right-this.left+_dSize)+"px; top:"+eval(this.top)+"px; height:"+eval(this.bottom-this.top+_dSize)+"px; background-color:"+theDrawColor+";border-style:solid; border-width:1px; z-index:"+this.zIndex+"'></div>";  

   u="";
    fn="";
    if (isNaN(this.XScale))
    { if (this.XScale.substr(0,9)=="function ") fn=eval("window."+this.XScale.substr(9));
      else u=this.XScale;
    }
    dx=(this.xmax-this.xmin);
    if (Math.abs(dx)>0)
    { invdifx=(this.right-this.left)/(this.xmax-this.xmin);
      r=1;
      while (Math.abs(dx)>=100) { dx/=10; r*=10; }
      while (Math.abs(dx)<10) { dx*=10; r/=10; }
      if (Math.abs(dx)>=50) { this.SubGrids=5; deltax=10*r*_sign(dx); }
      else
      { if (Math.abs(dx)>=20) { this.SubGrids=5; deltax=5*r*_sign(dx); }
        else { this.SubGrids=4; deltax=2*r*_sign(dx); }
      }
      if (this.XGridDelta!=0) deltax=this.XGridDelta;
      if (this.XSubGrids!=0) this.SubGrids=this.XSubGrids;
      sshift=Math.abs(deltax*invdifx/2);
      x=Math.floor(this.xmin/deltax)*deltax;
      itext=0;
      if (deltax!=0) this.MaxGrids=Math.floor(Math.abs((this.xmax-this.xmin)/deltax))+2;
      else this.MaxGrids=0;
      grd=deltax*invdifx/this.MaxGrids+((this.xmax));
      for (j=this.MaxGrids; j>=-1; j--)
      { xr=x+j*deltax;
        x0=Math.round(this.left+(-this.xmin+xr)*invdifx);
        if ((x0>=this.left)&&(x0<=this.right))
        { itext++;
          if ((itext!=2)||(!isScaleText))
          { if (r>1) 
            { if (fn) l=fn(xr)+"";
              else l=xr+""+u; 
            }
            else 
            { if (fn) l=fn(Math.round(10*xr/r)/Math.round(10/r))+"";
              else l=Math.round(10*xr/r)/Math.round(10/r)+""+u; 
            }
            if (l.charAt(0)==".") l="0"+l;
            if (l.substr(0,2)=="-.") l="-0"+l.substr(1,100);
          }
          else l=this.xtext;
          if ((x0+sshift>=this.left)&&(x0+sshift<=this.right))divtext+="<div id='"+this.ID+"i"+eval(ii++)+"' align=center style='position:absolute; left:"+eval(x0-grd-12+sshift)+"px; width:102px; top:"+eval(this.bottom+8)+"px;z-index:"+this.zIndex+";'>"+l+"</div>";
            divtext+="<div id='"+this.ID+"i"+eval(ii++)+"' class='bottomGridPointer' style='left:"+x0+"px;top:"+eval(this.bottom)+"px;z-index:"+this.zIndex+";'></div>";
          
          if ((this.XGridColor)&&(x0>this.left)&&(x0<this.right)) divtext+="<div id='"+this.ID+"i"+eval(ii++)+"' class='subGrid' style='left:"+x0+"px;top:"+eval(this.top+1)+"px;z-index:"+this.zIndex+";height:"+eval(this.bottom-this.top-1)+"px;background-color:"+this.XGridColor+";'></div>";
        }
      }
    }

    u="";
    fn="";
    if (isNaN(this.YScale))
    { if (this.YScale.substr(0,9)=="function ") fn=eval("window."+this.YScale.substr(9));
      else u=this.YScale;
    }
    dy=this.ymax-this.ymin;
    if (Math.abs(dy)>0)
    { invdify=(this.bottom-this.top)/(this.ymax-this.ymin);
      r=1;
      while (Math.abs(dy)>=100) { dy/=10; r*=10; }
      while (Math.abs(dy)<10) { dy*=10; r/=10; }
      if (Math.abs(dy)>=50) { this.SubGrids=5; deltay=10*r*_sign(dy); }
      else
      { if (Math.abs(dy)>=20) { this.SubGrids=5; deltay=5*r*_sign(dy); }
        else { this.SubGrids=4; deltay=2*r*_sign(dy); }
      }      
      if (this.YGridDelta!=0) deltay=this.YGridDelta;
      if (this.YSubGrids!=0) this.SubGrids=this.YSubGrids;
      sub=deltay*invdify/this.SubGrids;
      y=Math.floor(this.ymax/deltay)*deltay;
      itext=0;
      if (deltay!=0) this.MaxGrids=Math.floor(Math.abs((this.ymax-this.ymin)/deltay))+2;
      else this.MaxGrids=0;
      for (j=-1; j<=this.MaxGrids; j++)
      { yr=y-j*deltay;
        y0=Math.round(this.top+(this.ymax-yr)*invdify);
          for (k=1; k<this.SubGrids; k++)
          { if ((y0+k*sub>this.top+1)&&(y0+k*sub<this.bottom-1))divtext+="<div id='"+this.ID+"i"+eval(ii++)+"' class='subGrid' style='left:"+eval(this.left+1)+"px;top:"+Math.round(y0+k*sub)+"px;z-index:"+this.zIndex+";height:1px;width:"+eval(this.right-this.left-1)+"px;'></div>";
          }
        if ((y0>=this.top)&&(y0<=this.bottom))
        { itext++;
          if ((itext!=2)||(!isScaleText))
          { if (r>1)
            { if (fn) l=fn(yr)+"";
              else l=yr+""+u;
            }   
            else
            { if (fn) l=fn(Math.round(10*yr/r)/Math.round(10/r))+"";
              else l=Math.round(10*yr/r)/Math.round(10/r)+""+u;
            }  
            if (l.charAt(0)==".") l="0"+l;
            if (l.substr(0,2)=="-.") l="-0"+l.substr(1,100);
          }
          else l=this.ytext;
          if ((y0>=this.top)&&(y0<=this.bottom))divtext+="<div id='"+this.ID+"i"+eval(ii++)+"' align=right style='position:absolute;left:"+eval(this.left-100)+"px;width:89px;top:"+eval(y0-9)+"px;z-index:"+this.zIndex+"'>"+l+"</div>";
          divtext+="<div id='"+this.ID+"i"+eval(ii++)+"' class='grupSubGrid' style='left:"+eval(this.left-5)+"px;top:"+eval(y0)+"px;z-index:"+this.zIndex+";width:5px;'></div>";
          if ((this.YGridColor)&&(y0>this.top)&&(y0<this.bottom)) divtext+="<div id='"+this.ID+"i"+eval(ii++)+"' class='grupSubGrid' style='left:"+eval(this.left+1)+"px;top:"+eval(y0)+"px;z-index:"+this.zIndex+";width:"+eval(this.right-this.left-1)+"px;'></div>";
        }
      }
    }

  divtext+="<div id='"+this.ID+"i"+eval(ii++)+"' class='titleChart' style='left:"+this.left+"px; width:"+eval(this.right-this.left)+"px; top:"+eval(this.top-20)+"px;z-index:"+this.zIndex+"'>"+this.title+"</div>";
    res+=divtext+"</div>";
	return res;
}
function Box(thePrev, theLeft, theTop, theBottom, theText){
var ID="Box"+_N_Box;
var width=eval(23+_dSize),height=theBottom-theTop,res='';
if (_nvl(theText,"")!=""){
	if(thePrev){var theClass='prevBox',ID='p'+_N_Box;_prevChart[_prevChart.length]=ID;}
	else{var theClass='curBox',ID='cp'+(_N_Box-1);}
	res+="<div id='"+ID+"' class='"+theClass+"' style='left:"+theLeft+"px;top:"+theTop+"px;width:"+width+"px;height:"+eval(theBottom-theTop-1+_dSize)+"px;z-index:"+_zIndex+";font-size:"+width/3+"pt;' title='"+_nvl(theText,"")+"'>"+theText+"</div>";_zIndex++;
}else res+="<div id='"+ID+"' class='hiddenBox' style='left:"+theLeft+"px;top:"+theTop+"px;width:"+width+"px;height:"+eval(theBottom-theTop-1+_dSize)+"px;z-index:"+_zIndex+"'></div>";
_N_Box++;
return res;
}
function showPrevChart(){for(var i=0;i<_prevChart.length;i++){document.getElementById(_prevChart[i]).style.visibility='visible';var el=document.getElementById('c'+_prevChart[i]).style;el.left=(parseFloat(el.left)+(parseFloat(el.width)/2))+'px';}}
function hidePrevChart(){for(var i=0;i<_prevChart.length;i++){document.getElementById(_prevChart[i]).style.visibility='hidden';var el=document.getElementById('c'+_prevChart[i]).style;el.left=(parseFloat(el.left)-(parseFloat(el.width)/2))+'px';}}