var iframe = document.createElement('iframe');
var include = document.getElementById('EbossCatalogue');
var catalogueBase = catalogueBase || include.src.split("embed.js")[0];
iframe.id="EbossCatalogueIframe";
iframe.allowtransparency="true";
iframe.frameborder="0";
iframe.src=catalogueBase;
iframe.style.width="100%";
iframe.style.height="500px";
iframe.style.border="0 none";

include.parentNode.appendChild(iframe);

var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
var eventer = window[eventMethod];
var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

eventer(messageEvent,function(e) {
	var action = e.data.split(':')[0];
	var targetHeight = e.data.split(':')[1];
	if(action=="resizeIframe") {
		document.getElementById("EbossCatalogueIframe").style.height = targetHeight+"px";
	}
},false);

