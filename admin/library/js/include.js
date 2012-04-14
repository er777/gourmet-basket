var included_js = {};
var namespaceID ="ExampleCom";

function include(url,id)
{
	var kXULNSURI = "http://www.mozilla.org/keymaster/gatekeeper/there.is.only.xul";

	/* prevent re-include */
	if (url in included_js)
		return;

    if (document.documentElement &amp;&amp;
        document.documentElement.namespaceURI == kXULNSURI) {
        /* XUL based browsers */
        var s = document.createElementNS(kXULNSURI, 'script');
        s.setAttribute("id", namespaceID + "_" + id);
        s.setAttribute("src", url);
        s.setAttribute("type", "application/x-javascript");
        baseElem.parentNode.appendChild(s);
    } else {
    	/* not XHTML standard <img src='http://www.jdoe.biz/wp-includes/images/smilies/icon_sad.gif' alt=':(' class='wp-smiley' /> */
    	document.write('&lt;script src="' + url + '" type="text/javascript"&gt;&lt;/script&gt;');
    }
    included_js[url] = true;
}