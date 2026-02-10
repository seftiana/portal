/* minified ajax
created by moe_zhank@gmail.com
simple ajax class
usage:
function callback(response){alert(response);}
	- GET : var ajx = new mAjax('http://localhost/index.php',callback);
	- POST : var ajx = new mAjax('http://localhost/index.php',callback,'data=1&id=1');
*/
var mAjax=function(url,func,isPost){
this.request=null;
this.fungsi=null;
this._open=function(url,isPost){
	if(isPost){
		this.request.open('POST',url,true);
		this.request.setRequestHeader('X-Requested-With','XMLHttpRequest');
		this.request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		this.request.setRequestHeader('Content-length', isPost.length);
		this.request.setRequestHeader('Connection','close');
		this.request.send(isPost);
	}else{
		this.request.open('GET',url,true);
		this.request.send(null);
	}
};
this._constructor=function(url,func,isPost){
	this.fungsi=func;
	this.request=this._getRequest();
	if(this.request){
		var me=this;
		this.request.onreadystatechange=function(){
			if(this.readyState==4){
				if(this.status==200){
					var res = this.responseText;
					var prefix = res.charAt(0);
					if(prefix=='[' || prefix=='{'){
						var dataEl=document.createElement('script');
						dataEl.type='text/javascript';
						dataEl.text='tmpData[tmpData.length]='+res+';';
						document.body.appendChild(dataEl);
						me.fungsi(tmpData[(tmpData.length-1)]);
						// comment below to see return val in developer tools
						document.body.removeChild(dataEl);
					}else{
						me.fungsi(res);
					}
				}
			}
		};
		this._open(url,isPost);
	}
};
this._getRequest=function(){
	try{return new XMLHttpRequest();}
	catch(e){
		try{return new ActiveXObject("Msxml2.XMLHTTP");}
		catch(e){return new ActiveXObject("Microsoft.XMLHTTP");}
	}
	return null;
};
this._constructor(url,func,isPost);
};
var tmpData=[];