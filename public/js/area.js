(function(){var e,t,a,n,r,s;e=function(){for(var e="pixel-point/show",s=[["ids",""]],i=document.getElementsByClassName("area-ad"),d=0;d<i.length;d++)""===s[0][1]?s[0][1]+=a(i[d]).id:s[0][1]+=","+a(i[d]).id;if(s[0][1].length>0){var o=n({url:e,data:s,isResponse:!0});o.onreadystatechange=function(){if(4===this.readyState){var a={message:"",error:!0,adsIds:[],ads:[]};try{a=JSON.parse(this.response)}catch(e){}if(this.status>=500)setTimeout(function(){n({url:e,data:a,isResponse:!0})},5e3);else if(200===this.status){for(var s=[],i=[],d=0;d<a.ads.length;d++)t(a.ads[d])&&(i.push(a.ads[d].placeID)&&s.push(a.ads[d].id));r(i,s)}}},o.send(o.mybody)}},t=function(e){var t=e.id||"",a=e.href||"",n=e.placeID||"",r=e.data||"",i=document.querySelector("ins[data-area-ad-client='"+n+"']");if(!i)return null;i.addEventListener("click",s,!1),i.setAttribute("data-area-ad-id",t);var d=document.createElement("a");return d.href=a,d.innerHTML=r,i.innerHTML=d.outerHTML,t},a=function(e){return{id:e.getAttribute("data-area-ad-client")}},n=function(e){for(var t="http://icexch.dev/api/v1/"+e.url,a=e.type||"POST",r=e.data,s=e.isResponse,i=new XMLHttpRequest,d="",o=0;o<r.length;o++)d+="&"+r[o][0]+"="+encodeURIComponent(r[o][1]);if(i.mybody=d,i.open(a,t,!0),i.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),s)return i;i.onreadystatechange=function(){if(4===this.readyState){var e={message:"",error:!0};try{e=JSON.parse(this.response)}catch(e){}(this.status>=500||e.error)&&setTimeout(function(){n({url:t,type:a,data:e})},5e3)}},i.send(d)},r=function(e,t){var a=[["adsIDs",t.join(",")],["placesIDs",e.join(",")]];n({url:"pixel-point/showed",data:a})},s=function(e){e.preventDefault();var t=[["placeID",this.getAttribute("data-area-ad-client")],["adID",this.getAttribute("data-area-ad-id")]];n({url:"pixel-point/clicked",data:t})},e()}).call(this);