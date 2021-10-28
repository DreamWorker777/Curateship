/*! jQuery v3.5.1 | (c) JS Foundation and other contributors | jquery.org/license */
!function(e,t){"use strict";"object"==typeof module&&"object"==typeof module.exports?module.exports=e.document?t(e,!0):function(e){if(!e.document)throw new Error("jQuery requires a window with a document");return t(e)}:t(e)}("undefined"!=typeof window?window:this,function(C,e){"use strict";var t=[],r=Object.getPrototypeOf,s=t.slice,g=t.flat?function(e){return t.flat.call(e)}:function(e){return t.concat.apply([],e)},u=t.push,i=t.indexOf,n={},o=n.toString,v=n.hasOwnProperty,a=v.toString,l=a.call(Object),y={},m=function(e){return"function"==typeof e&&"number"!=typeof e.nodeType},x=function(e){return null!=e&&e===e.window},E=C.document,c={type:!0,src:!0,nonce:!0,noModule:!0};function b(e,t,n){var r,i,o=(n=n||E).createElement("script");if(o.text=e,t)for(r in c)(i=t[r]||t.getAttribute&&t.getAttribute(r))&&o.setAttribute(r,i);n.head.appendChild(o).parentNode.removeChild(o)}function w(e){return null==e?e+"":"object"==typeof e||"function"==typeof e?n[o.call(e)]||"object":typeof e}var f="3.5.1",S=function(e,t){return new S.fn.init(e,t)};function p(e){var t=!!e&&"length"in e&&e.length,n=w(e);return!m(e)&&!x(e)&&("array"===n||0===t||"number"==typeof t&&0<t&&t-1 in e)}S.fn=S.prototype={jquery:f,constructor:S,length:0,toArray:function(){return s.call(this)},get:function(e){return null==e?s.call(this):e<0?this[e+this.length]:this[e]},pushStack:function(e){var t=S.merge(this.constructor(),e);return t.prevObject=this,t},each:function(e){return S.each(this,e)},map:function(n){return this.pushStack(S.map(this,function(e,t){return n.call(e,t,e)}))},slice:function(){return this.pushStack(s.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},even:function(){return this.pushStack(S.grep(this,function(e,t){return(t+1)%2}))},odd:function(){return this.pushStack(S.grep(this,function(e,t){return t%2}))},eq:function(e){var t=this.length,n=+e+(e<0?t:0);return this.pushStack(0<=n&&n<t?[this[n]]:[])},end:function(){return this.prevObject||this.constructor()},push:u,sort:t.sort,splice:t.splice},S.extend=S.fn.extend=function(){var e,t,n,r,i,o,a=arguments[0]||{},s=1,u=arguments.length,l=!1;for("boolean"==typeof a&&(l=a,a=arguments[s]||{},s++),"object"==typeof a||m(a)||(a={}),s===u&&(a=this,s--);s<u;s++)if(null!=(e=arguments[s]))for(t in e)r=e[t],"__proto__"!==t&&a!==r&&(l&&r&&(S.isPlainObject(r)||(i=Array.isArray(r)))?(n=a[t],o=i&&!Array.isArray(n)?[]:i||S.isPlainObject(n)?n:{},i=!1,a[t]=S.extend(l,o,r)):void 0!==r&&(a[t]=r));return a},S.extend({expando:"jQuery"+(f+Math.random()).replace(/\D/g,""),isReady:!0,error:function(e){throw new Error(e)},noop:function(){},isPlainObject:function(e){var t,n;return!(!e||"[object Object]"!==o.call(e))&&(!(t=r(e))||"function"==typeof(n=v.call(t,"constructor")&&t.constructor)&&a.call(n)===l)},isEmptyObject:function(e){var t;for(t in e)return!1;return!0},globalEval:function(e,t,n){b(e,{nonce:t&&t.nonce},n)},each:function(e,t){var n,r=0;if(p(e)){for(n=e.length;r<n;r++)if(!1===t.call(e[r],r,e[r]))break}else for(r in e)if(!1===t.call(e[r],r,e[r]))break;return e},makeArray:function(e,t){var n=t||[];return null!=e&&(p(Object(e))?S.merge(n,"string"==typeof e?[e]:e):u.call(n,e)),n},inArray:function(e,t,n){return null==t?-1:i.call(t,e,n)},merge:function(e,t){for(var n=+t.length,r=0,i=e.length;r<n;r++)e[i++]=t[r];return e.length=i,e},grep:function(e,t,n){for(var r=[],i=0,o=e.length,a=!n;i<o;i++)!t(e[i],i)!==a&&r.push(e[i]);return r},map:function(e,t,n){var r,i,o=0,a=[];if(p(e))for(r=e.length;o<r;o++)null!=(i=t(e[o],o,n))&&a.push(i);else for(o in e)null!=(i=t(e[o],o,n))&&a.push(i);return g(a)},guid:1,support:y}),"function"==typeof Symbol&&(S.fn[Symbol.iterator]=t[Symbol.iterator]),S.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),function(e,t){n["[object "+t+"]"]=t.toLowerCase()});var d=function(n){var e,d,b,o,i,h,f,g,w,u,l,T,C,a,E,v,s,c,y,S="sizzle"+1*new Date,p=n.document,k=0,r=0,m=ue(),x=ue(),A=ue(),N=ue(),D=function(e,t){return e===t&&(l=!0),0},j={}.hasOwnProperty,t=[],q=t.pop,L=t.push,H=t.push,O=t.slice,P=function(e,t){for(var n=0,r=e.length;n<r;n++)if(e[n]===t)return n;return-1},R="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",M="[\\x20\\t\\r\\n\\f]",I="(?:\\\\[\\da-fA-F]{1,6}"+M+"?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+",W="\\["+M+"*("+I+")(?:"+M+"*([*^$|!~]?=)"+M+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+I+"))|)"+M+"*\\]",F=":("+I+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+W+")*)|.*)\\)|)",B=new RegExp(M+"+","g"),$=new RegExp("^"+M+"+|((?:^|[^\\\\])(?:\\\\.)*)"+M+"+$","g"),_=new RegExp("^"+M+"*,"+M+"*"),z=new RegExp("^"+M+"*([>+~]|"+M+")"+M+"*"),U=new RegExp(M+"|>"),X=new RegExp(F),V=new RegExp("^"+I+"$"),G={ID:new RegExp("^#("+I+")"),CLASS:new RegExp("^\\.("+I+")"),TAG:new RegExp("^("+I+"|[*])"),ATTR:new RegExp("^"+W),PSEUDO:new RegExp("^"+F),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+M+"*(even|odd|(([+-]|)(\\d*)n|)"+M+"*(?:([+-]|)"+M+"*(\\d+)|))"+M+"*\\)|)","i"),bool:new RegExp("^(?:"+R+")$","i"),needsContext:new RegExp("^"+M+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+M+"*((?:-\\d)?\\d*)"+M+"*\\)|)(?=[^-]|$)","i")},Y=/HTML$/i,Q=/^(?:input|select|textarea|button)$/i,J=/^h\d$/i,K=/^[^{]+\{\s*\[native \w/,Z=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,ee=/[+~]/,te=new RegExp("\\\\[\\da-fA-F]{1,6}"+M+"?|\\\\([^\\r\\n\\f])","g"),ne=function(e,t){var n="0x"+e.slice(1)-65536;return t||(n<0?String.fromCharCode(n+65536):String.fromCharCode(n>>10|55296,1023&n|56320))},re=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,ie=function(e,t){return t?"\0"===e?"\ufffd":e.slice(0,-1)+"\\"+e.charCodeAt(e.length-1).toString(16)+" ":"\\"+e},oe=function(){T()},ae=be(function(e){return!0===e.disabled&&"fieldset"===e.nodeName.toLowerCase()},{dir:"parentNode",next:"legend"});try{H.apply(t=O.call(p.childNodes),p.childNodes),t[p.childNodes.length].nodeType}catch(e){H={apply:t.length?function(e,t){L.apply(e,O.call(t))}:function(e,t){var n=e.length,r=0;while(e[n++]=t[r++]);e.length=n-1}}}function se(t,e,n,r){var i,o,a,s,u,l,c,f=e&&e.ownerDocument,p=e?e.nodeType:9;if(n=n||[],"string"!=typeof t||!t||1!==p&&9!==p&&11!==p)return n;if(!r&&(T(e),e=e||C,E)){if(11!==p&&(u=Z.exec(t)))if(i=u[1]){if(9===p){if(!(a=e.getElementById(i)))return n;if(a.id===i)return n.push(a),n}else if(f&&(a=f.getElementById(i))&&y(e,a)&&a.id===i)return n.push(a),n}else{if(u[2])return H.apply(n,e.getElementsByTagName(t)),n;if((i=u[3])&&d.getElementsByClassName&&e.getElementsByClassName)return H.apply(n,e.getElementsByClassName(i)),n}if(d.qsa&&!N[t+" "]&&(!v||!v.test(t))&&(1!==p||"object"!==e.nodeName.toLowerCase())){if(c=t,f=e,1===p&&(U.test(t)||z.test(t))){(f=ee.test(t)&&ye(e.parentNode)||e)===e&&d.scope||((s=e.getAttribute("id"))?s=s.replace(re,ie):e.setAttribute("id",s=S)),o=(l=h(t)).length;while(o--)l[o]=(s?"#"+s:":scope")+" "+xe(l[o]);c=l.join(",")}try{return H.apply(n,f.querySelectorAll(c)),n}catch(e){N(t,!0)}finally{s===S&&e.removeAttribute("id")}}}return g(t.replace($,"$1"),e,n,r)}function ue(){var r=[];return function e(t,n){return r.push(t+" ")>b.cacheLength&&delete e[r.shift()],e[t+" "]=n}}function le(e){return e[S]=!0,e}function ce(e){var t=C.createElement("fieldset");try{return!!e(t)}catch(e){return!1}finally{t.parentNode&&t.parentNode.removeChild(t),t=null}}function fe(e,t){var n=e.split("|"),r=n.length;while(r--)b.attrHandle[n[r]]=t}function pe(e,t){var n=t&&e,r=n&&1===e.nodeType&&1===t.nodeType&&e.sourceIndex-t.sourceIndex;if(r)return r;if(n)while(n=n.nextSibling)if(n===t)return-1;return e?1:-1}function de(t){return function(e){return"input"===e.nodeName.toLowerCase()&&e.type===t}}function he(n){return function(e){var t=e.nodeName.toLowerCase();return("input"===t||"button"===t)&&e.type===n}}function ge(t){return function(e){return"form"in e?e.parentNode&&!1===e.disabled?"label"in e?"label"in e.parentNode?e.parentNode.disabled===t:e.disabled===t:e.isDisabled===t||e.isDisabled!==!t&&ae(e)===t:e.disabled===t:"label"in e&&e.disabled===t}}function ve(a){return le(function(o){return o=+o,le(function(e,t){var n,r=a([],e.length,o),i=r.length;while(i--)e[n=r[i]]&&(e[n]=!(t[n]=e[n]))})})}function ye(e){return e&&"undefined"!=typeof e.getElementsByTagName&&e}for(e in d=se.support={},i=se.isXML=function(e){var t=e.namespaceURI,n=(e.ownerDocument||e).documentElement;return!Y.test(t||n&&n.nodeName||"HTML")},T=se.setDocument=function(e){var t,n,r=e?e.ownerDocument||e:p;return r!=C&&9===r.nodeType&&r.documentElement&&(a=(C=r).documentElement,E=!i(C),p!=C&&(n=C.defaultView)&&n.top!==n&&(n.addEventListener?n.addEventListener("unload",oe,!1):n.attachEvent&&n.attachEvent("onunload",oe)),d.scope=ce(function(e){return a.appendChild(e).appendChild(C.createElement("div")),"undefined"!=typeof e.querySelectorAll&&!e.querySelectorAll(":scope fieldset div").length}),d.attributes=ce(function(e){return e.className="i",!e.getAttribute("className")}),d.getElementsByTagName=ce(function(e){return e.appendChild(C.createComment("")),!e.getElementsByTagName("*").length}),d.getElementsByClassName=K.test(C.getElementsByClassName),d.getById=ce(function(e){return a.appendChild(e).id=S,!C.getElementsByName||!C.getElementsByName(S).length}),d.getById?(b.filter.ID=function(e){var t=e.replace(te,ne);return function(e){return e.getAttribute("id")===t}},b.find.ID=function(e,t){if("undefined"!=typeof t.getElementById&&E){var n=t.getElementById(e);return n?[n]:[]}}):(b.filter.ID=function(e){var n=e.replace(te,ne);return function(e){var t="undefined"!=typeof e.getAttributeNode&&e.getAttributeNode("id");return t&&t.value===n}},b.find.ID=function(e,t){if("undefined"!=typeof t.getElementById&&E){var n,r,i,o=t.getElementById(e);if(o){if((n=o.getAttributeNode("id"))&&n.value===e)return[o];i=t.getElementsByName(e),r=0;while(o=i[r++])if((n=o.getAttributeNode("id"))&&n.value===e)return[o]}return[]}}),b.find.TAG=d.getElementsByTagName?function(e,t){return"undefined"!=typeof t.getElementsByTagName?t.getElementsByTagName(e):d.qsa?t.querySelectorAll(e):void 0}:function(e,t){var n,r=[],i=0,o=t.getElementsByTagName(e);if("*"===e){while(n=o[i++])1===n.nodeType&&r.push(n);return r}return o},b.find.CLASS=d.getElementsByClassName&&function(e,t){if("undefined"!=typeof t.getElementsByClassName&&E)return t.getElementsByClassName(e)},s=[],v=[],(d.qsa=K.test(C.querySelectorAll))&&(ce(function(e){var t;a.appendChild(e).innerHTML="<a id='"+S+"'></a><select id='"+S+"-\r\\' msallowcapture=''><option selected=''></option></select>",e.querySelectorAll("[msallowcapture^='']").length&&v.push("[*^$]="+M+"*(?:''|\"\")"),e.querySelectorAll("[selected]").length||v.push("\\["+M+"*(?:value|"+R+")"),e.querySelectorAll("[id~="+S+"-]").length||v.push("~="),(t=C.createElement("input")).setAttribute("name",""),e.appendChild(t),e.querySelectorAll("[name='']").length||v.push("\\["+M+"*name"+M+"*="+M+"*(?:''|\"\")"),e.querySelectorAll(":checked").length||v.push(":checked"),e.querySelectorAll("a#"+S+"+*").length||v.push(".#.+[+~]"),e.querySelectorAll("\\\f"),v.push("[\\r\\n\\f]")}),ce(function(e){e.innerHTML="<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";var t=C.createElement("input");t.setAttribute("type","hidden"),e.appendChild(t).setAttribute("name","D"),e.querySelectorAll("[name=d]").length&&v.push("name"+M+"*[*^$|!~]?="),2!==e.querySelectorAll(":enabled").length&&v.push(":enabled",":disabled"),a.appendChild(e).disabled=!0,2!==e.querySelectorAll(":disabled").length&&v.push(":enabled",":disabled"),e.querySelectorAll("*,:x"),v.push(",.*:")})),(d.matchesSelector=K.test(c=a.matches||a.webkitMatchesSelector||a.mozMatchesSelector||a.oMatchesSelector||a.msMatchesSelector))&&ce(function(e){d.disconnectedMatch=c.call(e,"*"),c.call(e,"[s!='']:x"),s.push("!=",F)}),v=v.length&&new RegExp(v.join("|")),s=s.length&&new RegExp(s.join("|")),t=K.test(a.compareDocumentPosition),y=t||K.test(a.contains)?function(e,t){var n=9===e.nodeType?e.documentElement:e,r=t&&t.parentNode;return e===r||!(!r||1!==r.nodeType||!(n.contains?n.contains(r):e.compareDocumentPosition&&16&e.compareDocumentPosition(r)))}:function(e,t){if(t)while(t=t.parentNode)if(t===e)return!0;return!1},D=t?function(e,t){if(e===t)return l=!0,0;var n=!e.compareDocumentPosition-!t.compareDocumentPosition;return n||(1&(n=(e.ownerDocument||e)==(t.ownerDocument||t)?e.compareDocumentPosition(t):1)||!d.sortDetached&&t.compareDocumentPosition(e)===n?e==C||e.ownerDocument==p&&y(p,e)?-1:t==C||t.ownerDocument==p&&y(p,t)?1:u?P(u,e)-P(u,t):0:4&n?-1:1)}:function(e,t){if(e===t)return l=!0,0;var n,r=0,i=e.parentNode,o=t.parentNode,a=[e],s=[t];if(!i||!o)return e==C?-1:t==C?1:i?-1:o?1:u?P(u,e)-P(u,t):0;if(i===o)return pe(e,t);n=e;while(n=n.parentNode)a.unshift(n);n=t;while(n=n.parentNode)s.unshift(n);while(a[r]===s[r])r++;return r?pe(a[r],s[r]):a[r]==p?-1:s[r]==p?1:0}),C},se.matches=function(e,t){return se(e,null,null,t)},se.matchesSelector=function(e,t){if(T(e),d.matchesSelector&&E&&!N[t+" "]&&(!s||!s.test(t))&&(!v||!v.test(t)))try{var n=c.call(e,t);if(n||d.disconnectedMatch||e.document&&11!==e.document.nodeType)return n}catch(e){N(t,!0)}return 0<se(t,C,null,[e]).length},se.contains=function(e,t){return(e.ownerDocument||e)!=C&&T(e),y(e,t)},se.attr=function(e,t){(e.ownerDocument||e)!=C&&T(e);var n=b.attrHandle[t.toLowerCase()],r=n&&j.call(b.attrHandle,t.toLowerCase())?n(e,t,!E):void 0;return void 0!==r?r:d.attributes||!E?e.getAttribute(t):(r=e.getAttributeNode(t))&&r.specified?r.value:null},se.escape=function(e){return(e+"").replace(re,ie)},se.error=function(e){throw new Error("Syntax error, unrecognized expression: "+e)},se.uniqueSort=function(e){var t,n=[],r=0,i=0;if(l=!d.detectDuplicates,u=!d.sortStable&&e.slice(0),e.sort(D),l){while(t=e[i++])t===e[i]&&(r=n.push(i));while(r--)e.splice(n[r],1)}return u=null,e},o=se.getText=function(e){var t,n="",r=0,i=e.nodeType;if(i){if(1===i||9===i||11===i){if("string"==typeof e.textContent)return e.textContent;for(e=e.firstChild;e;e=e.nextSibling)n+=o(e)}else if(3===i||4===i)return e.nodeValue}else while(t=e[r++])n+=o(t);return n},(b=se.selectors={cacheLength:50,createPseudo:le,match:G,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(e){return e[1]=e[1].replace(te,ne),e[3]=(e[3]||e[4]||e[5]||"").replace(te,ne),"~="===e[2]&&(e[3]=" "+e[3]+" "),e.slice(0,4)},CHILD:function(e){return e[1]=e[1].toLowerCase(),"nth"===e[1].slice(0,3)?(e[3]||se.error(e[0]),e[4]=+(e[4]?e[5]+(e[6]||1):2*("even"===e[3]||"odd"===e[3])),e[5]=+(e[7]+e[8]||"odd"===e[3])):e[3]&&se.error(e[0]),e},PSEUDO:function(e){var t,n=!e[6]&&e[2];return G.CHILD.test(e[0])?null:(e[3]?e[2]=e[4]||e[5]||"":n&&X.test(n)&&(t=h(n,!0))&&(t=n.indexOf(")",n.length-t)-n.length)&&(e[0]=e[0].slice(0,t),e[2]=n.slice(0,t)),e.slice(0,3))}},filter:{TAG:function(e){var t=e.replace(te,ne).toLowerCase();return"*"===e?function(){return!0}:function(e){return e.nodeName&&e.nodeName.toLowerCase()===t}},CLASS:function(e){var t=m[e+" "];return t||(t=new RegExp("(^|"+M+")"+e+"("+M+"|$)"))&&m(e,function(e){return t.test("string"==typeof e.className&&e.className||"undefined"!=typeof e.getAttribute&&e.getAttribute("class")||"")})},ATTR:function(n,r,i){return function(e){var t=se.attr(e,n);return null==t?"!="===r:!r||(t+="","="===r?t===i:"!="===r?t!==i:"^="===r?i&&0===t.indexOf(i):"*="===r?i&&-1<t.indexOf(i):"$="===r?i&&t.slice(-i.length)===i:"~="===r?-1<(" "+t.replace(B," ")+" ").indexOf(i):"|="===r&&(t===i||t.slice(0,i.length+1)===i+"-"))}},CHILD:function(h,e,t,g,v){var y="nth"!==h.slice(0,3),m="last"!==h.slice(-4),x="of-type"===e;return 1===g&&0===v?function(e){return!!e.parentNode}:function(e,t,n){var r,i,o,a,s,u,l=y!==m?"nextSibling":"previousSibling",c=e.parentNode,f=x&&e.nodeName.toLowerCase(),p=!n&&!x,d=!1;if(c){if(y){while(l){a=e;while(a=a[l])if(x?a.nodeName.toLowerCase()===f:1===a.nodeType)return!1;u=l="only"===h&&!u&&"nextSibling"}return!0}if(u=[m?c.firstChild:c.lastChild],m&&p){d=(s=(r=(i=(o=(a=c)[S]||(a[S]={}))[a.uniqueID]||(o[a.uniqueID]={}))[h]||[])[0]===k&&r[1])&&r[2],a=s&&c.childNodes[s];while(a=++s&&a&&a[l]||(d=s=0)||u.pop())if(1===a.nodeType&&++d&&a===e){i[h]=[k,s,d];break}}else if(p&&(d=s=(r=(i=(o=(a=e)[S]||(a[S]={}))[a.uniqueID]||(o[a.uniqueID]={}))[h]||[])[0]===k&&r[1]),!1===d)while(a=++s&&a&&a[l]||(d=s=0)||u.pop())if((x?a.nodeName.toLowerCase()===f:1===a.nodeType)&&++d&&(p&&((i=(o=a[S]||(a[S]={}))[a.uniqueID]||(o[a.uniqueID]={}))[h]=[k,d]),a===e))break;return(d-=v)===g||d%g==0&&0<=d/g}}},PSEUDO:function(e,o){var t,a=b.pseudos[e]||b.setFilters[e.toLowerCase()]||se.error("unsupported pseudo: "+e);return a[S]?a(o):1<a.length?(t=[e,e,"",o],b.setFilters.hasOwnProperty(e.toLowerCase())?le(function(e,t){var n,r=a(e,o),i=r.length;while(i--)e[n=P(e,r[i])]=!(t[n]=r[i])}):function(e){return a(e,0,t)}):a}},pseudos:{not:le(function(e){var r=[],i=[],s=f(e.replace($,"$1"));return s[S]?le(function(e,t,n,r){var i,o=s(e,null,r,[]),a=e.length;while(a--)(i=o[a])&&(e[a]=!(t[a]=i))}):function(e,t,n){return r[0]=e,s(r,null,n,i),r[0]=null,!i.pop()}}),has:le(function(t){return function(e){return 0<se(t,e).length}}),contains:le(function(t){return t=t.replace(te,ne),function(e){return-1<(e.textContent||o(e)).indexOf(t)}}),lang:le(function(n){return V.test(n||"")||se.error("unsupported lang: "+n),n=n.replace(te,ne).toLowerCase(),function(e){var t;do{if(t=E?e.lang:e.getAttribute("xml:lang")||e.getAttribute("lang"))return(t=t.toLowerCase())===n||0===t.indexOf(n+"-")}while((e=e.parentNode)&&1===e.nodeType);return!1}}),target:function(e){var t=n.location&&n.location.hash;return t&&t.slice(1)===e.id},root:function(e){return e===a},focus:function(e){return e===C.activeElement&&(!C.hasFocus||C.hasFocus())&&!!(e.type||e.href||~e.tabIndex)},enabled:ge(!1),disabled:ge(!0),checked:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&!!e.checked||"option"===t&&!!e.selected},selected:function(e){return e.parentNode&&e.parentNode.selectedIndex,!0===e.selected},empty:function(e){for(e=e.firstChild;e;e=e.nextSibling)if(e.nodeType<6)return!1;return!0},parent:function(e){return!b.pseudos.empty(e)},header:function(e){return J.test(e.nodeName)},input:function(e){return Q.test(e.nodeName)},button:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&"button"===e.type||"button"===t},text:function(e){var t;return"input"===e.nodeName.toLowerCase()&&"text"===e.type&&(null==(t=e.getAttribute("type"))||"text"===t.toLowerCase())},first:ve(function(){return[0]}),last:ve(function(e,t){return[t-1]}),eq:ve(function(e,t,n){return[n<0?n+t:n]}),even:ve(function(e,t){for(var n=0;n<t;n+=2)e.push(n);return e}),odd:ve(function(e,t){for(var n=1;n<t;n+=2)e.push(n);return e}),lt:ve(function(e,t,n){for(var r=n<0?n+t:t<n?t:n;0<=--r;)e.push(r);return e}),gt:ve(function(e,t,n){for(var r=n<0?n+t:n;++r<t;)e.push(r);return e})}}).pseudos.nth=b.pseudos.eq,{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})b.pseudos[e]=de(e);for(e in{submit:!0,reset:!0})b.pseudos[e]=he(e);function me(){}function xe(e){for(var t=0,n=e.length,r="";t<n;t++)r+=e[t].value;return r}function be(s,e,t){var u=e.dir,l=e.next,c=l||u,f=t&&"parentNode"===c,p=r++;return e.first?function(e,t,n){while(e=e[u])if(1===e.nodeType||f)return s(e,t,n);return!1}:function(e,t,n){var r,i,o,a=[k,p];if(n){while(e=e[u])if((1===e.nodeType||f)&&s(e,t,n))return!0}else while(e=e[u])if(1===e.nodeType||f)if(i=(o=e[S]||(e[S]={}))[e.uniqueID]||(o[e.uniqueID]={}),l&&l===e.nodeName.toLowerCase())e=e[u]||e;else{if((r=i[c])&&r[0]===k&&r[1]===p)return a[2]=r[2];if((i[c]=a)[2]=s(e,t,n))return!0}return!1}}function we(i){return 1<i.length?function(e,t,n){var r=i.length;while(r--)if(!i[r](e,t,n))return!1;return!0}:i[0]}function Te(e,t,n,r,i){for(var o,a=[],s=0,u=e.length,l=null!=t;s<u;s++)(o=e[s])&&(n&&!n(o,r,i)||(a.push(o),l&&t.push(s)));return a}function Ce(d,h,g,v,y,e){return v&&!v[S]&&(v=Ce(v)),y&&!y[S]&&(y=Ce(y,e)),le(function(e,t,n,r){var i,o,a,s=[],u=[],l=t.length,c=e||function(e,t,n){for(var r=0,i=t.length;r<i;r++)se(e,t[r],n);return n}(h||"*",n.nodeType?[n]:n,[]),f=!d||!e&&h?c:Te(c,s,d,n,r),p=g?y||(e?d:l||v)?[]:t:f;if(g&&g(f,p,n,r),v){i=Te(p,u),v(i,[],n,r),o=i.length;while(o--)(a=i[o])&&(p[u[o]]=!(f[u[o]]=a))}if(e){if(y||d){if(y){i=[],o=p.length;while(o--)(a=p[o])&&i.push(f[o]=a);y(null,p=[],i,r)}o=p.length;while(o--)(a=p[o])&&-1<(i=y?P(e,a):s[o])&&(e[i]=!(t[i]=a))}}else p=Te(p===t?p.splice(l,p.length):p),y?y(null,t,p,r):H.apply(t,p)})}function Ee(e){for(var i,t,n,r=e.length,o=b.relative[e[0].type],a=o||b.relative[" "],s=o?1:0,u=be(function(e){return e===i},a,!0),l=be(function(e){return-1<P(i,e)},a,!0),c=[function(e,t,n){var r=!o&&(n||t!==w)||((i=t).nodeType?u(e,t,n):l(e,t,n));return i=null,r}];s<r;s++)if(t=b.relative[e[s].type])c=[be(we(c),t)];else{if((t=b.filter[e[s].type].apply(null,e[s].matches))[S]){for(n=++s;n<r;n++)if(b.relative[e[n].type])break;return Ce(1<s&&we(c),1<s&&xe(e.slice(0,s-1).concat({value:" "===e[s-2].type?"*":""})).replace($,"$1"),t,s<n&&Ee(e.slice(s,n)),n<r&&Ee(e=e.slice(n)),n<r&&xe(e))}c.push(t)}return we(c)}return me.prototype=b.filters=b.pseudos,b.setFilters=new me,h=se.tokenize=function(e,t){var n,r,i,o,a,s,u,l=x[e+" "];if(l)return t?0:l.slice(0);a=e,s=[],u=b.preFilter;while(a){for(o in n&&!(r=_.exec(a))||(r&&(a=a.slice(r[0].length)||a),s.push(i=[])),n=!1,(r=z.exec(a))&&(n=r.shift(),i.push({value:n,type:r[0].replace($," ")}),a=a.slice(n.length)),b.filter)!(r=G[o].exec(a))||u[o]&&!(r=u[o](r))||(n=r.shift(),i.push({value:n,type:o,matches:r}),a=a.slice(n.length));if(!n)break}return t?a.length:a?se.error(e):x(e,s).slice(0)},f=se.compile=function(e,t){var n,v,y,m,x,r,i=[],o=[],a=A[e+" "];if(!a){t||(t=h(e)),n=t.length;while(n--)(a=Ee(t[n]))[S]?i.push(a):o.push(a);(a=A(e,(v=o,m=0<(y=i).length,x=0<v.length,r=function(e,t,n,r,i){var o,a,s,u=0,l="0",c=e&&[],f=[],p=w,d=e||x&&b.find.TAG("*",i),h=k+=null==p?1:Math.random()||.1,g=d.length;for(i&&(w=t==C||t||i);l!==g&&null!=(o=d[l]);l++){if(x&&o){a=0,t||o.ownerDocument==C||(T(o),n=!E);while(s=v[a++])if(s(o,t||C,n)){r.push(o);break}i&&(k=h)}m&&((o=!s&&o)&&u--,e&&c.push(o))}if(u+=l,m&&l!==u){a=0;while(s=y[a++])s(c,f,t,n);if(e){if(0<u)while(l--)c[l]||f[l]||(f[l]=q.call(r));f=Te(f)}H.apply(r,f),i&&!e&&0<f.length&&1<u+y.length&&se.uniqueSort(r)}return i&&(k=h,w=p),c},m?le(r):r))).selector=e}return a},g=se.select=function(e,t,n,r){var i,o,a,s,u,l="function"==typeof e&&e,c=!r&&h(e=l.selector||e);if(n=n||[],1===c.length){if(2<(o=c[0]=c[0].slice(0)).length&&"ID"===(a=o[0]).type&&9===t.nodeType&&E&&b.relative[o[1].type]){if(!(t=(b.find.ID(a.matches[0].replace(te,ne),t)||[])[0]))return n;l&&(t=t.parentNode),e=e.slice(o.shift().value.length)}i=G.needsContext.test(e)?0:o.length;while(i--){if(a=o[i],b.relative[s=a.type])break;if((u=b.find[s])&&(r=u(a.matches[0].replace(te,ne),ee.test(o[0].type)&&ye(t.parentNode)||t))){if(o.splice(i,1),!(e=r.length&&xe(o)))return H.apply(n,r),n;break}}}return(l||f(e,c))(r,t,!E,n,!t||ee.test(e)&&ye(t.parentNode)||t),n},d.sortStable=S.split("").sort(D).join("")===S,d.detectDuplicates=!!l,T(),d.sortDetached=ce(function(e){return 1&e.compareDocumentPosition(C.createElement("fieldset"))}),ce(function(e){return e.innerHTML="<a href='#'></a>","#"===e.firstChild.getAttribute("href")})||fe("type|href|height|width",function(e,t,n){if(!n)return e.getAttribute(t,"type"===t.toLowerCase()?1:2)}),d.attributes&&ce(function(e){return e.innerHTML="<input/>",e.firstChild.setAttribute("value",""),""===e.firstChild.getAttribute("value")})||fe("value",function(e,t,n){if(!n&&"input"===e.nodeName.toLowerCase())return e.defaultValue}),ce(function(e){return null==e.getAttribute("disabled")})||fe(R,function(e,t,n){var r;if(!n)return!0===e[t]?t.toLowerCase():(r=e.getAttributeNode(t))&&r.specified?r.value:null}),se}(C);S.find=d,S.expr=d.selectors,S.expr[":"]=S.expr.pseudos,S.uniqueSort=S.unique=d.uniqueSort,S.text=d.getText,S.isXMLDoc=d.isXML,S.contains=d.contains,S.escapeSelector=d.escape;var h=function(e,t,n){var r=[],i=void 0!==n;while((e=e[t])&&9!==e.nodeType)if(1===e.nodeType){if(i&&S(e).is(n))break;r.push(e)}return r},T=function(e,t){for(var n=[];e;e=e.nextSibling)1===e.nodeType&&e!==t&&n.push(e);return n},k=S.expr.match.needsContext;function A(e,t){return e.nodeName&&e.nodeName.toLowerCase()===t.toLowerCase()}var N=/^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;function D(e,n,r){return m(n)?S.grep(e,function(e,t){return!!n.call(e,t,e)!==r}):n.nodeType?S.grep(e,function(e){return e===n!==r}):"string"!=typeof n?S.grep(e,function(e){return-1<i.call(n,e)!==r}):S.filter(n,e,r)}S.filter=function(e,t,n){var r=t[0];return n&&(e=":not("+e+")"),1===t.length&&1===r.nodeType?S.find.matchesSelector(r,e)?[r]:[]:S.find.matches(e,S.grep(t,function(e){return 1===e.nodeType}))},S.fn.extend({find:function(e){var t,n,r=this.length,i=this;if("string"!=typeof e)return this.pushStack(S(e).filter(function(){for(t=0;t<r;t++)if(S.contains(i[t],this))return!0}));for(n=this.pushStack([]),t=0;t<r;t++)S.find(e,i[t],n);return 1<r?S.uniqueSort(n):n},filter:function(e){return this.pushStack(D(this,e||[],!1))},not:function(e){return this.pushStack(D(this,e||[],!0))},is:function(e){return!!D(this,"string"==typeof e&&k.test(e)?S(e):e||[],!1).length}});var j,q=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;(S.fn.init=function(e,t,n){var r,i;if(!e)return this;if(n=n||j,"string"==typeof e){if(!(r="<"===e[0]&&">"===e[e.length-1]&&3<=e.length?[null,e,null]:q.exec(e))||!r[1]&&t)return!t||t.jquery?(t||n).find(e):this.constructor(t).find(e);if(r[1]){if(t=t instanceof S?t[0]:t,S.merge(this,S.parseHTML(r[1],t&&t.nodeType?t.ownerDocument||t:E,!0)),N.test(r[1])&&S.isPlainObject(t))for(r in t)m(this[r])?this[r](t[r]):this.attr(r,t[r]);return this}return(i=E.getElementById(r[2]))&&(this[0]=i,this.length=1),this}return e.nodeType?(this[0]=e,this.length=1,this):m(e)?void 0!==n.ready?n.ready(e):e(S):S.makeArray(e,this)}).prototype=S.fn,j=S(E);var L=/^(?:parents|prev(?:Until|All))/,H={children:!0,contents:!0,next:!0,prev:!0};function O(e,t){while((e=e[t])&&1!==e.nodeType);return e}S.fn.extend({has:function(e){var t=S(e,this),n=t.length;return this.filter(function(){for(var e=0;e<n;e++)if(S.contains(this,t[e]))return!0})},closest:function(e,t){var n,r=0,i=this.length,o=[],a="string"!=typeof e&&S(e);if(!k.test(e))for(;r<i;r++)for(n=this[r];n&&n!==t;n=n.parentNode)if(n.nodeType<11&&(a?-1<a.index(n):1===n.nodeType&&S.find.matchesSelector(n,e))){o.push(n);break}return this.pushStack(1<o.length?S.uniqueSort(o):o)},index:function(e){return e?"string"==typeof e?i.call(S(e),this[0]):i.call(this,e.jquery?e[0]:e):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(e,t){return this.pushStack(S.uniqueSort(S.merge(this.get(),S(e,t))))},addBack:function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}}),S.each({parent:function(e){var t=e.parentNode;return t&&11!==t.nodeType?t:null},parents:function(e){return h(e,"parentNode")},parentsUntil:function(e,t,n){return h(e,"parentNode",n)},next:function(e){return O(e,"nextSibling")},prev:function(e){return O(e,"previousSibling")},nextAll:function(e){return h(e,"nextSibling")},prevAll:function(e){return h(e,"previousSibling")},nextUntil:function(e,t,n){return h(e,"nextSibling",n)},prevUntil:function(e,t,n){return h(e,"previousSibling",n)},siblings:function(e){return T((e.parentNode||{}).firstChild,e)},children:function(e){return T(e.firstChild)},contents:function(e){return null!=e.contentDocument&&r(e.contentDocument)?e.contentDocument:(A(e,"template")&&(e=e.content||e),S.merge([],e.childNodes))}},function(r,i){S.fn[r]=function(e,t){var n=S.map(this,i,e);return"Until"!==r.slice(-5)&&(t=e),t&&"string"==typeof t&&(n=S.filter(t,n)),1<this.length&&(H[r]||S.uniqueSort(n),L.test(r)&&n.reverse()),this.pushStack(n)}});var P=/[^\x20\t\r\n\f]+/g;function R(e){return e}function M(e){throw e}function I(e,t,n,r){var i;try{e&&m(i=e.promise)?i.call(e).done(t).fail(n):e&&m(i=e.then)?i.call(e,t,n):t.apply(void 0,[e].slice(r))}catch(e){n.apply(void 0,[e])}}S.Callbacks=function(r){var e,n;r="string"==typeof r?(e=r,n={},S.each(e.match(P)||[],function(e,t){n[t]=!0}),n):S.extend({},r);var i,t,o,a,s=[],u=[],l=-1,c=function(){for(a=a||r.once,o=i=!0;u.length;l=-1){t=u.shift();while(++l<s.length)!1===s[l].apply(t[0],t[1])&&r.stopOnFalse&&(l=s.length,t=!1)}r.memory||(t=!1),i=!1,a&&(s=t?[]:"")},f={add:function(){return s&&(t&&!i&&(l=s.length-1,u.push(t)),function n(e){S.each(e,function(e,t){m(t)?r.unique&&f.has(t)||s.push(t):t&&t.length&&"string"!==w(t)&&n(t)})}(arguments),t&&!i&&c()),this},remove:function(){return S.each(arguments,function(e,t){var n;while(-1<(n=S.inArray(t,s,n)))s.splice(n,1),n<=l&&l--}),this},has:function(e){return e?-1<S.inArray(e,s):0<s.length},empty:function(){return s&&(s=[]),this},disable:function(){return a=u=[],s=t="",this},disabled:function(){return!s},lock:function(){return a=u=[],t||i||(s=t=""),this},locked:function(){return!!a},fireWith:function(e,t){return a||(t=[e,(t=t||[]).slice?t.slice():t],u.push(t),i||c()),this},fire:function(){return f.fireWith(this,arguments),this},fired:function(){return!!o}};return f},S.extend({Deferred:function(e){var o=[["notify","progress",S.Callbacks("memory"),S.Callbacks("memory"),2],["resolve","done",S.Callbacks("once memory"),S.Callbacks("once memory"),0,"resolved"],["reject","fail",S.Callbacks("once memory"),S.Callbacks("once memory"),1,"rejected"]],i="pending",a={state:function(){return i},always:function(){return s.done(arguments).fail(arguments),this},"catch":function(e){return a.then(null,e)},pipe:function(){var i=arguments;return S.Deferred(function(r){S.each(o,function(e,t){var n=m(i[t[4]])&&i[t[4]];s[t[1]](function(){var e=n&&n.apply(this,arguments);e&&m(e.promise)?e.promise().progress(r.notify).done(r.resolve).fail(r.reject):r[t[0]+"With"](this,n?[e]:arguments)})}),i=null}).promise()},then:function(t,n,r){var u=0;function l(i,o,a,s){return function(){var n=this,r=arguments,e=function(){var e,t;if(!(i<u)){if((e=a.apply(n,r))===o.promise())throw new TypeError("Thenable self-resolution");t=e&&("object"==typeof e||"function"==typeof e)&&e.then,m(t)?s?t.call(e,l(u,o,R,s),l(u,o,M,s)):(u++,t.call(e,l(u,o,R,s),l(u,o,M,s),l(u,o,R,o.notifyWith))):(a!==R&&(n=void 0,r=[e]),(s||o.resolveWith)(n,r))}},t=s?e:function(){try{e()}catch(e){S.Deferred.exceptionHook&&S.Deferred.exceptionHook(e,t.stackTrace),u<=i+1&&(a!==M&&(n=void 0,r=[e]),o.rejectWith(n,r))}};i?t():(S.Deferred.getStackHook&&(t.stackTrace=S.Deferred.getStackHook()),C.setTimeout(t))}}return S.Deferred(function(e){o[0][3].add(l(0,e,m(r)?r:R,e.notifyWith)),o[1][3].add(l(0,e,m(t)?t:R)),o[2][3].add(l(0,e,m(n)?n:M))}).promise()},promise:function(e){return null!=e?S.extend(e,a):a}},s={};return S.each(o,function(e,t){var n=t[2],r=t[5];a[t[1]]=n.add,r&&n.add(function(){i=r},o[3-e][2].disable,o[3-e][3].disable,o[0][2].lock,o[0][3].lock),n.add(t[3].fire),s[t[0]]=function(){return s[t[0]+"With"](this===s?void 0:this,arguments),this},s[t[0]+"With"]=n.fireWith}),a.promise(s),e&&e.call(s,s),s},when:function(e){var n=arguments.length,t=n,r=Array(t),i=s.call(arguments),o=S.Deferred(),a=function(t){return function(e){r[t]=this,i[t]=1<arguments.length?s.call(arguments):e,--n||o.resolveWith(r,i)}};if(n<=1&&(I(e,o.done(a(t)).resolve,o.reject,!n),"pending"===o.state()||m(i[t]&&i[t].then)))return o.then();while(t--)I(i[t],a(t),o.reject);return o.promise()}});var W=/^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;S.Deferred.exceptionHook=function(e,t){C.console&&C.console.warn&&e&&W.test(e.name)&&C.console.warn("jQuery.Deferred exception: "+e.message,e.stack,t)},S.readyException=function(e){C.setTimeout(function(){throw e})};var F=S.Deferred();function B(){E.removeEventListener("DOMContentLoaded",B),C.removeEventListener("load",B),S.ready()}S.fn.ready=function(e){return F.then(e)["catch"](function(e){S.readyException(e)}),this},S.extend({isReady:!1,readyWait:1,ready:function(e){(!0===e?--S.readyWait:S.isReady)||(S.isReady=!0)!==e&&0<--S.readyWait||F.resolveWith(E,[S])}}),S.ready.then=F.then,"complete"===E.readyState||"loading"!==E.readyState&&!E.documentElement.doScroll?C.setTimeout(S.ready):(E.addEventListener("DOMContentLoaded",B),C.addEventListener("load",B));var $=function(e,t,n,r,i,o,a){var s=0,u=e.length,l=null==n;if("object"===w(n))for(s in i=!0,n)$(e,t,s,n[s],!0,o,a);else if(void 0!==r&&(i=!0,m(r)||(a=!0),l&&(a?(t.call(e,r),t=null):(l=t,t=function(e,t,n){return l.call(S(e),n)})),t))for(;s<u;s++)t(e[s],n,a?r:r.call(e[s],s,t(e[s],n)));return i?e:l?t.call(e):u?t(e[0],n):o},_=/^-ms-/,z=/-([a-z])/g;function U(e,t){return t.toUpperCase()}function X(e){return e.replace(_,"ms-").replace(z,U)}var V=function(e){return 1===e.nodeType||9===e.nodeType||!+e.nodeType};function G(){this.expando=S.expando+G.uid++}G.uid=1,G.prototype={cache:function(e){var t=e[this.expando];return t||(t={},V(e)&&(e.nodeType?e[this.expando]=t:Object.defineProperty(e,this.expando,{value:t,configurable:!0}))),t},set:function(e,t,n){var r,i=this.cache(e);if("string"==typeof t)i[X(t)]=n;else for(r in t)i[X(r)]=t[r];return i},get:function(e,t){return void 0===t?this.cache(e):e[this.expando]&&e[this.expando][X(t)]},access:function(e,t,n){return void 0===t||t&&"string"==typeof t&&void 0===n?this.get(e,t):(this.set(e,t,n),void 0!==n?n:t)},remove:function(e,t){var n,r=e[this.expando];if(void 0!==r){if(void 0!==t){n=(t=Array.isArray(t)?t.map(X):(t=X(t))in r?[t]:t.match(P)||[]).length;while(n--)delete r[t[n]]}(void 0===t||S.isEmptyObject(r))&&(e.nodeType?e[this.expando]=void 0:delete e[this.expando])}},hasData:function(e){var t=e[this.expando];return void 0!==t&&!S.isEmptyObject(t)}};var Y=new G,Q=new G,J=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,K=/[A-Z]/g;function Z(e,t,n){var r,i;if(void 0===n&&1===e.nodeType)if(r="data-"+t.replace(K,"-$&").toLowerCase(),"string"==typeof(n=e.getAttribute(r))){try{n="true"===(i=n)||"false"!==i&&("null"===i?null:i===+i+""?+i:J.test(i)?JSON.parse(i):i)}catch(e){}Q.set(e,t,n)}else n=void 0;return n}S.extend({hasData:function(e){return Q.hasData(e)||Y.hasData(e)},data:function(e,t,n){return Q.access(e,t,n)},removeData:function(e,t){Q.remove(e,t)},_data:function(e,t,n){return Y.access(e,t,n)},_removeData:function(e,t){Y.remove(e,t)}}),S.fn.extend({data:function(n,e){var t,r,i,o=this[0],a=o&&o.attributes;if(void 0===n){if(this.length&&(i=Q.get(o),1===o.nodeType&&!Y.get(o,"hasDataAttrs"))){t=a.length;while(t--)a[t]&&0===(r=a[t].name).indexOf("data-")&&(r=X(r.slice(5)),Z(o,r,i[r]));Y.set(o,"hasDataAttrs",!0)}return i}return"object"==typeof n?this.each(function(){Q.set(this,n)}):$(this,function(e){var t;if(o&&void 0===e)return void 0!==(t=Q.get(o,n))?t:void 0!==(t=Z(o,n))?t:void 0;this.each(function(){Q.set(this,n,e)})},null,e,1<arguments.length,null,!0)},removeData:function(e){return this.each(function(){Q.remove(this,e)})}}),S.extend({queue:function(e,t,n){var r;if(e)return t=(t||"fx")+"queue",r=Y.get(e,t),n&&(!r||Array.isArray(n)?r=Y.access(e,t,S.makeArray(n)):r.push(n)),r||[]},dequeue:function(e,t){t=t||"fx";var n=S.queue(e,t),r=n.length,i=n.shift(),o=S._queueHooks(e,t);"inprogress"===i&&(i=n.shift(),r--),i&&("fx"===t&&n.unshift("inprogress"),delete o.stop,i.call(e,function(){S.dequeue(e,t)},o)),!r&&o&&o.empty.fire()},_queueHooks:function(e,t){var n=t+"queueHooks";return Y.get(e,n)||Y.access(e,n,{empty:S.Callbacks("once memory").add(function(){Y.remove(e,[t+"queue",n])})})}}),S.fn.extend({queue:function(t,n){var e=2;return"string"!=typeof t&&(n=t,t="fx",e--),arguments.length<e?S.queue(this[0],t):void 0===n?this:this.each(function(){var e=S.queue(this,t,n);S._queueHooks(this,t),"fx"===t&&"inprogress"!==e[0]&&S.dequeue(this,t)})},dequeue:function(e){return this.each(function(){S.dequeue(this,e)})},clearQueue:function(e){return this.queue(e||"fx",[])},promise:function(e,t){var n,r=1,i=S.Deferred(),o=this,a=this.length,s=function(){--r||i.resolveWith(o,[o])};"string"!=typeof e&&(t=e,e=void 0),e=e||"fx";while(a--)(n=Y.get(o[a],e+"queueHooks"))&&n.empty&&(r++,n.empty.add(s));return s(),i.promise(t)}});var ee=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,te=new RegExp("^(?:([+-])=|)("+ee+")([a-z%]*)$","i"),ne=["Top","Right","Bottom","Left"],re=E.documentElement,ie=function(e){return S.contains(e.ownerDocument,e)},oe={composed:!0};re.getRootNode&&(ie=function(e){return S.contains(e.ownerDocument,e)||e.getRootNode(oe)===e.ownerDocument});var ae=function(e,t){return"none"===(e=t||e).style.display||""===e.style.display&&ie(e)&&"none"===S.css(e,"display")};function se(e,t,n,r){var i,o,a=20,s=r?function(){return r.cur()}:function(){return S.css(e,t,"")},u=s(),l=n&&n[3]||(S.cssNumber[t]?"":"px"),c=e.nodeType&&(S.cssNumber[t]||"px"!==l&&+u)&&te.exec(S.css(e,t));if(c&&c[3]!==l){u/=2,l=l||c[3],c=+u||1;while(a--)S.style(e,t,c+l),(1-o)*(1-(o=s()/u||.5))<=0&&(a=0),c/=o;c*=2,S.style(e,t,c+l),n=n||[]}return n&&(c=+c||+u||0,i=n[1]?c+(n[1]+1)*n[2]:+n[2],r&&(r.unit=l,r.start=c,r.end=i)),i}var ue={};function le(e,t){for(var n,r,i,o,a,s,u,l=[],c=0,f=e.length;c<f;c++)(r=e[c]).style&&(n=r.style.display,t?("none"===n&&(l[c]=Y.get(r,"display")||null,l[c]||(r.style.display="")),""===r.style.display&&ae(r)&&(l[c]=(u=a=o=void 0,a=(i=r).ownerDocument,s=i.nodeName,(u=ue[s])||(o=a.body.appendChild(a.createElement(s)),u=S.css(o,"display"),o.parentNode.removeChild(o),"none"===u&&(u="block"),ue[s]=u)))):"none"!==n&&(l[c]="none",Y.set(r,"display",n)));for(c=0;c<f;c++)null!=l[c]&&(e[c].style.display=l[c]);return e}S.fn.extend({show:function(){return le(this,!0)},hide:function(){return le(this)},toggle:function(e){return"boolean"==typeof e?e?this.show():this.hide():this.each(function(){ae(this)?S(this).show():S(this).hide()})}});var ce,fe,pe=/^(?:checkbox|radio)$/i,de=/<([a-z][^\/\0>\x20\t\r\n\f]*)/i,he=/^$|^module$|\/(?:java|ecma)script/i;ce=E.createDocumentFragment().appendChild(E.createElement("div")),(fe=E.createElement("input")).setAttribute("type","radio"),fe.setAttribute("checked","checked"),fe.setAttribute("name","t"),ce.appendChild(fe),y.checkClone=ce.cloneNode(!0).cloneNode(!0).lastChild.checked,ce.innerHTML="<textarea>x</textarea>",y.noCloneChecked=!!ce.cloneNode(!0).lastChild.defaultValue,ce.innerHTML="<option></option>",y.option=!!ce.lastChild;var ge={thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};function ve(e,t){var n;return n="undefined"!=typeof e.getElementsByTagName?e.getElementsByTagName(t||"*"):"undefined"!=typeof e.querySelectorAll?e.querySelectorAll(t||"*"):[],void 0===t||t&&A(e,t)?S.merge([e],n):n}function ye(e,t){for(var n=0,r=e.length;n<r;n++)Y.set(e[n],"globalEval",!t||Y.get(t[n],"globalEval"))}ge.tbody=ge.tfoot=ge.colgroup=ge.caption=ge.thead,ge.th=ge.td,y.option||(ge.optgroup=ge.option=[1,"<select multiple='multiple'>","</select>"]);var me=/<|&#?\w+;/;function xe(e,t,n,r,i){for(var o,a,s,u,l,c,f=t.createDocumentFragment(),p=[],d=0,h=e.length;d<h;d++)if((o=e[d])||0===o)if("object"===w(o))S.merge(p,o.nodeType?[o]:o);else if(me.test(o)){a=a||f.appendChild(t.createElement("div")),s=(de.exec(o)||["",""])[1].toLowerCase(),u=ge[s]||ge._default,a.innerHTML=u[1]+S.htmlPrefilter(o)+u[2],c=u[0];while(c--)a=a.lastChild;S.merge(p,a.childNodes),(a=f.firstChild).textContent=""}else p.push(t.createTextNode(o));f.textContent="",d=0;while(o=p[d++])if(r&&-1<S.inArray(o,r))i&&i.push(o);else if(l=ie(o),a=ve(f.appendChild(o),"script"),l&&ye(a),n){c=0;while(o=a[c++])he.test(o.type||"")&&n.push(o)}return f}var be=/^key/,we=/^(?:mouse|pointer|contextmenu|drag|drop)|click/,Te=/^([^.]*)(?:\.(.+)|)/;function Ce(){return!0}function Ee(){return!1}function Se(e,t){return e===function(){try{return E.activeElement}catch(e){}}()==("focus"===t)}function ke(e,t,n,r,i,o){var a,s;if("object"==typeof t){for(s in"string"!=typeof n&&(r=r||n,n=void 0),t)ke(e,s,n,r,t[s],o);return e}if(null==r&&null==i?(i=n,r=n=void 0):null==i&&("string"==typeof n?(i=r,r=void 0):(i=r,r=n,n=void 0)),!1===i)i=Ee;else if(!i)return e;return 1===o&&(a=i,(i=function(e){return S().off(e),a.apply(this,arguments)}).guid=a.guid||(a.guid=S.guid++)),e.each(function(){S.event.add(this,t,i,r,n)})}function Ae(e,i,o){o?(Y.set(e,i,!1),S.event.add(e,i,{namespace:!1,handler:function(e){var t,n,r=Y.get(this,i);if(1&e.isTrigger&&this[i]){if(r.length)(S.event.special[i]||{}).delegateType&&e.stopPropagation();else if(r=s.call(arguments),Y.set(this,i,r),t=o(this,i),this[i](),r!==(n=Y.get(this,i))||t?Y.set(this,i,!1):n={},r!==n)return e.stopImmediatePropagation(),e.preventDefault(),n.value}else r.length&&(Y.set(this,i,{value:S.event.trigger(S.extend(r[0],S.Event.prototype),r.slice(1),this)}),e.stopImmediatePropagation())}})):void 0===Y.get(e,i)&&S.event.add(e,i,Ce)}S.event={global:{},add:function(t,e,n,r,i){var o,a,s,u,l,c,f,p,d,h,g,v=Y.get(t);if(V(t)){n.handler&&(n=(o=n).handler,i=o.selector),i&&S.find.matchesSelector(re,i),n.guid||(n.guid=S.guid++),(u=v.events)||(u=v.events=Object.create(null)),(a=v.handle)||(a=v.handle=function(e){return"undefined"!=typeof S&&S.event.triggered!==e.type?S.event.dispatch.apply(t,arguments):void 0}),l=(e=(e||"").match(P)||[""]).length;while(l--)d=g=(s=Te.exec(e[l])||[])[1],h=(s[2]||"").split(".").sort(),d&&(f=S.event.special[d]||{},d=(i?f.delegateType:f.bindType)||d,f=S.event.special[d]||{},c=S.extend({type:d,origType:g,data:r,handler:n,guid:n.guid,selector:i,needsContext:i&&S.expr.match.needsContext.test(i),namespace:h.join(".")},o),(p=u[d])||((p=u[d]=[]).delegateCount=0,f.setup&&!1!==f.setup.call(t,r,h,a)||t.addEventListener&&t.addEventListener(d,a)),f.add&&(f.add.call(t,c),c.handler.guid||(c.handler.guid=n.guid)),i?p.splice(p.delegateCount++,0,c):p.push(c),S.event.global[d]=!0)}},remove:function(e,t,n,r,i){var o,a,s,u,l,c,f,p,d,h,g,v=Y.hasData(e)&&Y.get(e);if(v&&(u=v.events)){l=(t=(t||"").match(P)||[""]).length;while(l--)if(d=g=(s=Te.exec(t[l])||[])[1],h=(s[2]||"").split(".").sort(),d){f=S.event.special[d]||{},p=u[d=(r?f.delegateType:f.bindType)||d]||[],s=s[2]&&new RegExp("(^|\\.)"+h.join("\\.(?:.*\\.|)")+"(\\.|$)"),a=o=p.length;while(o--)c=p[o],!i&&g!==c.origType||n&&n.guid!==c.guid||s&&!s.test(c.namespace)||r&&r!==c.selector&&("**"!==r||!c.selector)||(p.splice(o,1),c.selector&&p.delegateCount--,f.remove&&f.remove.call(e,c));a&&!p.length&&(f.teardown&&!1!==f.teardown.call(e,h,v.handle)||S.removeEvent(e,d,v.handle),delete u[d])}else for(d in u)S.event.remove(e,d+t[l],n,r,!0);S.isEmptyObject(u)&&Y.remove(e,"handle events")}},dispatch:function(e){var t,n,r,i,o,a,s=new Array(arguments.length),u=S.event.fix(e),l=(Y.get(this,"events")||Object.create(null))[u.type]||[],c=S.event.special[u.type]||{};for(s[0]=u,t=1;t<arguments.length;t++)s[t]=arguments[t];if(u.delegateTarget=this,!c.preDispatch||!1!==c.preDispatch.call(this,u)){a=S.event.handlers.call(this,u,l),t=0;while((i=a[t++])&&!u.isPropagationStopped()){u.currentTarget=i.elem,n=0;while((o=i.handlers[n++])&&!u.isImmediatePropagationStopped())u.rnamespace&&!1!==o.namespace&&!u.rnamespace.test(o.namespace)||(u.handleObj=o,u.data=o.data,void 0!==(r=((S.event.special[o.origType]||{}).handle||o.handler).apply(i.elem,s))&&!1===(u.result=r)&&(u.preventDefault(),u.stopPropagation()))}return c.postDispatch&&c.postDispatch.call(this,u),u.result}},handlers:function(e,t){var n,r,i,o,a,s=[],u=t.delegateCount,l=e.target;if(u&&l.nodeType&&!("click"===e.type&&1<=e.button))for(;l!==this;l=l.parentNode||this)if(1===l.nodeType&&("click"!==e.type||!0!==l.disabled)){for(o=[],a={},n=0;n<u;n++)void 0===a[i=(r=t[n]).selector+" "]&&(a[i]=r.needsContext?-1<S(i,this).index(l):S.find(i,this,null,[l]).length),a[i]&&o.push(r);o.length&&s.push({elem:l,handlers:o})}return l=this,u<t.length&&s.push({elem:l,handlers:t.slice(u)}),s},addProp:function(t,e){Object.defineProperty(S.Event.prototype,t,{enumerable:!0,configurable:!0,get:m(e)?function(){if(this.originalEvent)return e(this.originalEvent)}:function(){if(this.originalEvent)return this.originalEvent[t]},set:function(e){Object.defineProperty(this,t,{enumerable:!0,configurable:!0,writable:!0,value:e})}})},fix:function(e){return e[S.expando]?e:new S.Event(e)},special:{load:{noBubble:!0},click:{setup:function(e){var t=this||e;return pe.test(t.type)&&t.click&&A(t,"input")&&Ae(t,"click",Ce),!1},trigger:function(e){var t=this||e;return pe.test(t.type)&&t.click&&A(t,"input")&&Ae(t,"click"),!0},_default:function(e){var t=e.target;return pe.test(t.type)&&t.click&&A(t,"input")&&Y.get(t,"click")||A(t,"a")}},beforeunload:{postDispatch:function(e){void 0!==e.result&&e.originalEvent&&(e.originalEvent.returnValue=e.result)}}}},S.removeEvent=function(e,t,n){e.removeEventListener&&e.removeEventListener(t,n)},S.Event=function(e,t){if(!(this instanceof S.Event))return new S.Event(e,t);e&&e.type?(this.originalEvent=e,this.type=e.type,this.isDefaultPrevented=e.defaultPrevented||void 0===e.defaultPrevented&&!1===e.returnValue?Ce:Ee,this.target=e.target&&3===e.target.nodeType?e.target.parentNode:e.target,this.currentTarget=e.currentTarget,this.relatedTarget=e.relatedTarget):this.type=e,t&&S.extend(this,t),this.timeStamp=e&&e.timeStamp||Date.now(),this[S.expando]=!0},S.Event.prototype={constructor:S.Event,isDefaultPrevented:Ee,isPropagationStopped:Ee,isImmediatePropagationStopped:Ee,isSimulated:!1,preventDefault:function(){var e=this.originalEvent;this.isDefaultPrevented=Ce,e&&!this.isSimulated&&e.preventDefault()},stopPropagation:function(){var e=this.originalEvent;this.isPropagationStopped=Ce,e&&!this.isSimulated&&e.stopPropagation()},stopImmediatePropagation:function(){var e=this.originalEvent;this.isImmediatePropagationStopped=Ce,e&&!this.isSimulated&&e.stopImmediatePropagation(),this.stopPropagation()}},S.each({altKey:!0,bubbles:!0,cancelable:!0,changedTouches:!0,ctrlKey:!0,detail:!0,eventPhase:!0,metaKey:!0,pageX:!0,pageY:!0,shiftKey:!0,view:!0,"char":!0,code:!0,charCode:!0,key:!0,keyCode:!0,button:!0,buttons:!0,clientX:!0,clientY:!0,offsetX:!0,offsetY:!0,pointerId:!0,pointerType:!0,screenX:!0,screenY:!0,targetTouches:!0,toElement:!0,touches:!0,which:function(e){var t=e.button;return null==e.which&&be.test(e.type)?null!=e.charCode?e.charCode:e.keyCode:!e.which&&void 0!==t&&we.test(e.type)?1&t?1:2&t?3:4&t?2:0:e.which}},S.event.addProp),S.each({focus:"focusin",blur:"focusout"},function(e,t){S.event.special[e]={setup:function(){return Ae(this,e,Se),!1},trigger:function(){return Ae(this,e),!0},delegateType:t}}),S.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(e,i){S.event.special[e]={delegateType:i,bindType:i,handle:function(e){var t,n=e.relatedTarget,r=e.handleObj;return n&&(n===this||S.contains(this,n))||(e.type=r.origType,t=r.handler.apply(this,arguments),e.type=i),t}}}),S.fn.extend({on:function(e,t,n,r){return ke(this,e,t,n,r)},one:function(e,t,n,r){return ke(this,e,t,n,r,1)},off:function(e,t,n){var r,i;if(e&&e.preventDefault&&e.handleObj)return r=e.handleObj,S(e.delegateTarget).off(r.namespace?r.origType+"."+r.namespace:r.origType,r.selector,r.handler),this;if("object"==typeof e){for(i in e)this.off(i,t,e[i]);return this}return!1!==t&&"function"!=typeof t||(n=t,t=void 0),!1===n&&(n=Ee),this.each(function(){S.event.remove(this,e,n,t)})}});var Ne=/<script|<style|<link/i,De=/checked\s*(?:[^=]|=\s*.checked.)/i,je=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;function qe(e,t){return A(e,"table")&&A(11!==t.nodeType?t:t.firstChild,"tr")&&S(e).children("tbody")[0]||e}function Le(e){return e.type=(null!==e.getAttribute("type"))+"/"+e.type,e}function He(e){return"true/"===(e.type||"").slice(0,5)?e.type=e.type.slice(5):e.removeAttribute("type"),e}function Oe(e,t){var n,r,i,o,a,s;if(1===t.nodeType){if(Y.hasData(e)&&(s=Y.get(e).events))for(i in Y.remove(t,"handle events"),s)for(n=0,r=s[i].length;n<r;n++)S.event.add(t,i,s[i][n]);Q.hasData(e)&&(o=Q.access(e),a=S.extend({},o),Q.set(t,a))}}function Pe(n,r,i,o){r=g(r);var e,t,a,s,u,l,c=0,f=n.length,p=f-1,d=r[0],h=m(d);if(h||1<f&&"string"==typeof d&&!y.checkClone&&De.test(d))return n.each(function(e){var t=n.eq(e);h&&(r[0]=d.call(this,e,t.html())),Pe(t,r,i,o)});if(f&&(t=(e=xe(r,n[0].ownerDocument,!1,n,o)).firstChild,1===e.childNodes.length&&(e=t),t||o)){for(s=(a=S.map(ve(e,"script"),Le)).length;c<f;c++)u=e,c!==p&&(u=S.clone(u,!0,!0),s&&S.merge(a,ve(u,"script"))),i.call(n[c],u,c);if(s)for(l=a[a.length-1].ownerDocument,S.map(a,He),c=0;c<s;c++)u=a[c],he.test(u.type||"")&&!Y.access(u,"globalEval")&&S.contains(l,u)&&(u.src&&"module"!==(u.type||"").toLowerCase()?S._evalUrl&&!u.noModule&&S._evalUrl(u.src,{nonce:u.nonce||u.getAttribute("nonce")},l):b(u.textContent.replace(je,""),u,l))}return n}function Re(e,t,n){for(var r,i=t?S.filter(t,e):e,o=0;null!=(r=i[o]);o++)n||1!==r.nodeType||S.cleanData(ve(r)),r.parentNode&&(n&&ie(r)&&ye(ve(r,"script")),r.parentNode.removeChild(r));return e}S.extend({htmlPrefilter:function(e){return e},clone:function(e,t,n){var r,i,o,a,s,u,l,c=e.cloneNode(!0),f=ie(e);if(!(y.noCloneChecked||1!==e.nodeType&&11!==e.nodeType||S.isXMLDoc(e)))for(a=ve(c),r=0,i=(o=ve(e)).length;r<i;r++)s=o[r],u=a[r],void 0,"input"===(l=u.nodeName.toLowerCase())&&pe.test(s.type)?u.checked=s.checked:"input"!==l&&"textarea"!==l||(u.defaultValue=s.defaultValue);if(t)if(n)for(o=o||ve(e),a=a||ve(c),r=0,i=o.length;r<i;r++)Oe(o[r],a[r]);else Oe(e,c);return 0<(a=ve(c,"script")).length&&ye(a,!f&&ve(e,"script")),c},cleanData:function(e){for(var t,n,r,i=S.event.special,o=0;void 0!==(n=e[o]);o++)if(V(n)){if(t=n[Y.expando]){if(t.events)for(r in t.events)i[r]?S.event.remove(n,r):S.removeEvent(n,r,t.handle);n[Y.expando]=void 0}n[Q.expando]&&(n[Q.expando]=void 0)}}}),S.fn.extend({detach:function(e){return Re(this,e,!0)},remove:function(e){return Re(this,e)},text:function(e){return $(this,function(e){return void 0===e?S.text(this):this.empty().each(function(){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||(this.textContent=e)})},null,e,arguments.length)},append:function(){return Pe(this,arguments,function(e){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||qe(this,e).appendChild(e)})},prepend:function(){return Pe(this,arguments,function(e){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var t=qe(this,e);t.insertBefore(e,t.firstChild)}})},before:function(){return Pe(this,arguments,function(e){this.parentNode&&this.parentNode.insertBefore(e,this)})},after:function(){return Pe(this,arguments,function(e){this.parentNode&&this.parentNode.insertBefore(e,this.nextSibling)})},empty:function(){for(var e,t=0;null!=(e=this[t]);t++)1===e.nodeType&&(S.cleanData(ve(e,!1)),e.textContent="");return this},clone:function(e,t){return e=null!=e&&e,t=null==t?e:t,this.map(function(){return S.clone(this,e,t)})},html:function(e){return $(this,function(e){var t=this[0]||{},n=0,r=this.length;if(void 0===e&&1===t.nodeType)return t.innerHTML;if("string"==typeof e&&!Ne.test(e)&&!ge[(de.exec(e)||["",""])[1].toLowerCase()]){e=S.htmlPrefilter(e);try{for(;n<r;n++)1===(t=this[n]||{}).nodeType&&(S.cleanData(ve(t,!1)),t.innerHTML=e);t=0}catch(e){}}t&&this.empty().append(e)},null,e,arguments.length)},replaceWith:function(){var n=[];return Pe(this,arguments,function(e){var t=this.parentNode;S.inArray(this,n)<0&&(S.cleanData(ve(this)),t&&t.replaceChild(e,this))},n)}}),S.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(e,a){S.fn[e]=function(e){for(var t,n=[],r=S(e),i=r.length-1,o=0;o<=i;o++)t=o===i?this:this.clone(!0),S(r[o])[a](t),u.apply(n,t.get());return this.pushStack(n)}});var Me=new RegExp("^("+ee+")(?!px)[a-z%]+$","i"),Ie=function(e){var t=e.ownerDocument.defaultView;return t&&t.opener||(t=C),t.getComputedStyle(e)},We=function(e,t,n){var r,i,o={};for(i in t)o[i]=e.style[i],e.style[i]=t[i];for(i in r=n.call(e),t)e.style[i]=o[i];return r},Fe=new RegExp(ne.join("|"),"i");function Be(e,t,n){var r,i,o,a,s=e.style;return(n=n||Ie(e))&&(""!==(a=n.getPropertyValue(t)||n[t])||ie(e)||(a=S.style(e,t)),!y.pixelBoxStyles()&&Me.test(a)&&Fe.test(t)&&(r=s.width,i=s.minWidth,o=s.maxWidth,s.minWidth=s.maxWidth=s.width=a,a=n.width,s.width=r,s.minWidth=i,s.maxWidth=o)),void 0!==a?a+"":a}function $e(e,t){return{get:function(){if(!e())return(this.get=t).apply(this,arguments);delete this.get}}}!function(){function e(){if(l){u.style.cssText="position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0",l.style.cssText="position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%",re.appendChild(u).appendChild(l);var e=C.getComputedStyle(l);n="1%"!==e.top,s=12===t(e.marginLeft),l.style.right="60%",o=36===t(e.right),r=36===t(e.width),l.style.position="absolute",i=12===t(l.offsetWidth/3),re.removeChild(u),l=null}}function t(e){return Math.round(parseFloat(e))}var n,r,i,o,a,s,u=E.createElement("div"),l=E.createElement("div");l.style&&(l.style.backgroundClip="content-box",l.cloneNode(!0).style.backgroundClip="",y.clearCloneStyle="content-box"===l.style.backgroundClip,S.extend(y,{boxSizingReliable:function(){return e(),r},pixelBoxStyles:function(){return e(),o},pixelPosition:function(){return e(),n},reliableMarginLeft:function(){return e(),s},scrollboxSize:function(){return e(),i},reliableTrDimensions:function(){var e,t,n,r;return null==a&&(e=E.createElement("table"),t=E.createElement("tr"),n=E.createElement("div"),e.style.cssText="position:absolute;left:-11111px",t.style.height="1px",n.style.height="9px",re.appendChild(e).appendChild(t).appendChild(n),r=C.getComputedStyle(t),a=3<parseInt(r.height),re.removeChild(e)),a}}))}();var _e=["Webkit","Moz","ms"],ze=E.createElement("div").style,Ue={};function Xe(e){var t=S.cssProps[e]||Ue[e];return t||(e in ze?e:Ue[e]=function(e){var t=e[0].toUpperCase()+e.slice(1),n=_e.length;while(n--)if((e=_e[n]+t)in ze)return e}(e)||e)}var Ve=/^(none|table(?!-c[ea]).+)/,Ge=/^--/,Ye={position:"absolute",visibility:"hidden",display:"block"},Qe={letterSpacing:"0",fontWeight:"400"};function Je(e,t,n){var r=te.exec(t);return r?Math.max(0,r[2]-(n||0))+(r[3]||"px"):t}function Ke(e,t,n,r,i,o){var a="width"===t?1:0,s=0,u=0;if(n===(r?"border":"content"))return 0;for(;a<4;a+=2)"margin"===n&&(u+=S.css(e,n+ne[a],!0,i)),r?("content"===n&&(u-=S.css(e,"padding"+ne[a],!0,i)),"margin"!==n&&(u-=S.css(e,"border"+ne[a]+"Width",!0,i))):(u+=S.css(e,"padding"+ne[a],!0,i),"padding"!==n?u+=S.css(e,"border"+ne[a]+"Width",!0,i):s+=S.css(e,"border"+ne[a]+"Width",!0,i));return!r&&0<=o&&(u+=Math.max(0,Math.ceil(e["offset"+t[0].toUpperCase()+t.slice(1)]-o-u-s-.5))||0),u}function Ze(e,t,n){var r=Ie(e),i=(!y.boxSizingReliable()||n)&&"border-box"===S.css(e,"boxSizing",!1,r),o=i,a=Be(e,t,r),s="offset"+t[0].toUpperCase()+t.slice(1);if(Me.test(a)){if(!n)return a;a="auto"}return(!y.boxSizingReliable()&&i||!y.reliableTrDimensions()&&A(e,"tr")||"auto"===a||!parseFloat(a)&&"inline"===S.css(e,"display",!1,r))&&e.getClientRects().length&&(i="border-box"===S.css(e,"boxSizing",!1,r),(o=s in e)&&(a=e[s])),(a=parseFloat(a)||0)+Ke(e,t,n||(i?"border":"content"),o,r,a)+"px"}function et(e,t,n,r,i){return new et.prototype.init(e,t,n,r,i)}S.extend({cssHooks:{opacity:{get:function(e,t){if(t){var n=Be(e,"opacity");return""===n?"1":n}}}},cssNumber:{animationIterationCount:!0,columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,gridArea:!0,gridColumn:!0,gridColumnEnd:!0,gridColumnStart:!0,gridRow:!0,gridRowEnd:!0,gridRowStart:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{},style:function(e,t,n,r){if(e&&3!==e.nodeType&&8!==e.nodeType&&e.style){var i,o,a,s=X(t),u=Ge.test(t),l=e.style;if(u||(t=Xe(s)),a=S.cssHooks[t]||S.cssHooks[s],void 0===n)return a&&"get"in a&&void 0!==(i=a.get(e,!1,r))?i:l[t];"string"===(o=typeof n)&&(i=te.exec(n))&&i[1]&&(n=se(e,t,i),o="number"),null!=n&&n==n&&("number"!==o||u||(n+=i&&i[3]||(S.cssNumber[s]?"":"px")),y.clearCloneStyle||""!==n||0!==t.indexOf("background")||(l[t]="inherit"),a&&"set"in a&&void 0===(n=a.set(e,n,r))||(u?l.setProperty(t,n):l[t]=n))}},css:function(e,t,n,r){var i,o,a,s=X(t);return Ge.test(t)||(t=Xe(s)),(a=S.cssHooks[t]||S.cssHooks[s])&&"get"in a&&(i=a.get(e,!0,n)),void 0===i&&(i=Be(e,t,r)),"normal"===i&&t in Qe&&(i=Qe[t]),""===n||n?(o=parseFloat(i),!0===n||isFinite(o)?o||0:i):i}}),S.each(["height","width"],function(e,u){S.cssHooks[u]={get:function(e,t,n){if(t)return!Ve.test(S.css(e,"display"))||e.getClientRects().length&&e.getBoundingClientRect().width?Ze(e,u,n):We(e,Ye,function(){return Ze(e,u,n)})},set:function(e,t,n){var r,i=Ie(e),o=!y.scrollboxSize()&&"absolute"===i.position,a=(o||n)&&"border-box"===S.css(e,"boxSizing",!1,i),s=n?Ke(e,u,n,a,i):0;return a&&o&&(s-=Math.ceil(e["offset"+u[0].toUpperCase()+u.slice(1)]-parseFloat(i[u])-Ke(e,u,"border",!1,i)-.5)),s&&(r=te.exec(t))&&"px"!==(r[3]||"px")&&(e.style[u]=t,t=S.css(e,u)),Je(0,t,s)}}}),S.cssHooks.marginLeft=$e(y.reliableMarginLeft,function(e,t){if(t)return(parseFloat(Be(e,"marginLeft"))||e.getBoundingClientRect().left-We(e,{marginLeft:0},function(){return e.getBoundingClientRect().left}))+"px"}),S.each({margin:"",padding:"",border:"Width"},function(i,o){S.cssHooks[i+o]={expand:function(e){for(var t=0,n={},r="string"==typeof e?e.split(" "):[e];t<4;t++)n[i+ne[t]+o]=r[t]||r[t-2]||r[0];return n}},"margin"!==i&&(S.cssHooks[i+o].set=Je)}),S.fn.extend({css:function(e,t){return $(this,function(e,t,n){var r,i,o={},a=0;if(Array.isArray(t)){for(r=Ie(e),i=t.length;a<i;a++)o[t[a]]=S.css(e,t[a],!1,r);return o}return void 0!==n?S.style(e,t,n):S.css(e,t)},e,t,1<arguments.length)}}),((S.Tween=et).prototype={constructor:et,init:function(e,t,n,r,i,o){this.elem=e,this.prop=n,this.easing=i||S.easing._default,this.options=t,this.start=this.now=this.cur(),this.end=r,this.unit=o||(S.cssNumber[n]?"":"px")},cur:function(){var e=et.propHooks[this.prop];return e&&e.get?e.get(this):et.propHooks._default.get(this)},run:function(e){var t,n=et.propHooks[this.prop];return this.options.duration?this.pos=t=S.easing[this.easing](e,this.options.duration*e,0,1,this.options.duration):this.pos=t=e,this.now=(this.end-this.start)*t+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),n&&n.set?n.set(this):et.propHooks._default.set(this),this}}).init.prototype=et.prototype,(et.propHooks={_default:{get:function(e){var t;return 1!==e.elem.nodeType||null!=e.elem[e.prop]&&null==e.elem.style[e.prop]?e.elem[e.prop]:(t=S.css(e.elem,e.prop,""))&&"auto"!==t?t:0},set:function(e){S.fx.step[e.prop]?S.fx.step[e.prop](e):1!==e.elem.nodeType||!S.cssHooks[e.prop]&&null==e.elem.style[Xe(e.prop)]?e.elem[e.prop]=e.now:S.style(e.elem,e.prop,e.now+e.unit)}}}).scrollTop=et.propHooks.scrollLeft={set:function(e){e.elem.nodeType&&e.elem.parentNode&&(e.elem[e.prop]=e.now)}},S.easing={linear:function(e){return e},swing:function(e){return.5-Math.cos(e*Math.PI)/2},_default:"swing"},S.fx=et.prototype.init,S.fx.step={};var tt,nt,rt,it,ot=/^(?:toggle|show|hide)$/,at=/queueHooks$/;function st(){nt&&(!1===E.hidden&&C.requestAnimationFrame?C.requestAnimationFrame(st):C.setTimeout(st,S.fx.interval),S.fx.tick())}function ut(){return C.setTimeout(function(){tt=void 0}),tt=Date.now()}function lt(e,t){var n,r=0,i={height:e};for(t=t?1:0;r<4;r+=2-t)i["margin"+(n=ne[r])]=i["padding"+n]=e;return t&&(i.opacity=i.width=e),i}function ct(e,t,n){for(var r,i=(ft.tweeners[t]||[]).concat(ft.tweeners["*"]),o=0,a=i.length;o<a;o++)if(r=i[o].call(n,t,e))return r}function ft(o,e,t){var n,a,r=0,i=ft.prefilters.length,s=S.Deferred().always(function(){delete u.elem}),u=function(){if(a)return!1;for(var e=tt||ut(),t=Math.max(0,l.startTime+l.duration-e),n=1-(t/l.duration||0),r=0,i=l.tweens.length;r<i;r++)l.tweens[r].run(n);return s.notifyWith(o,[l,n,t]),n<1&&i?t:(i||s.notifyWith(o,[l,1,0]),s.resolveWith(o,[l]),!1)},l=s.promise({elem:o,props:S.extend({},e),opts:S.extend(!0,{specialEasing:{},easing:S.easing._default},t),originalProperties:e,originalOptions:t,startTime:tt||ut(),duration:t.duration,tweens:[],createTween:function(e,t){var n=S.Tween(o,l.opts,e,t,l.opts.specialEasing[e]||l.opts.easing);return l.tweens.push(n),n},stop:function(e){var t=0,n=e?l.tweens.length:0;if(a)return this;for(a=!0;t<n;t++)l.tweens[t].run(1);return e?(s.notifyWith(o,[l,1,0]),s.resolveWith(o,[l,e])):s.rejectWith(o,[l,e]),this}}),c=l.props;for(!function(e,t){var n,r,i,o,a;for(n in e)if(i=t[r=X(n)],o=e[n],Array.isArray(o)&&(i=o[1],o=e[n]=o[0]),n!==r&&(e[r]=o,delete e[n]),(a=S.cssHooks[r])&&"expand"in a)for(n in o=a.expand(o),delete e[r],o)n in e||(e[n]=o[n],t[n]=i);else t[r]=i}(c,l.opts.specialEasing);r<i;r++)if(n=ft.prefilters[r].call(l,o,c,l.opts))return m(n.stop)&&(S._queueHooks(l.elem,l.opts.queue).stop=n.stop.bind(n)),n;return S.map(c,ct,l),m(l.opts.start)&&l.opts.start.call(o,l),l.progress(l.opts.progress).done(l.opts.done,l.opts.complete).fail(l.opts.fail).always(l.opts.always),S.fx.timer(S.extend(u,{elem:o,anim:l,queue:l.opts.queue})),l}S.Animation=S.extend(ft,{tweeners:{"*":[function(e,t){var n=this.createTween(e,t);return se(n.elem,e,te.exec(t),n),n}]},tweener:function(e,t){m(e)?(t=e,e=["*"]):e=e.match(P);for(var n,r=0,i=e.length;r<i;r++)n=e[r],ft.tweeners[n]=ft.tweeners[n]||[],ft.tweeners[n].unshift(t)},prefilters:[function(e,t,n){var r,i,o,a,s,u,l,c,f="width"in t||"height"in t,p=this,d={},h=e.style,g=e.nodeType&&ae(e),v=Y.get(e,"fxshow");for(r in n.queue||(null==(a=S._queueHooks(e,"fx")).unqueued&&(a.unqueued=0,s=a.empty.fire,a.empty.fire=function(){a.unqueued||s()}),a.unqueued++,p.always(function(){p.always(function(){a.unqueued--,S.queue(e,"fx").length||a.empty.fire()})})),t)if(i=t[r],ot.test(i)){if(delete t[r],o=o||"toggle"===i,i===(g?"hide":"show")){if("show"!==i||!v||void 0===v[r])continue;g=!0}d[r]=v&&v[r]||S.style(e,r)}if((u=!S.isEmptyObject(t))||!S.isEmptyObject(d))for(r in f&&1===e.nodeType&&(n.overflow=[h.overflow,h.overflowX,h.overflowY],null==(l=v&&v.display)&&(l=Y.get(e,"display")),"none"===(c=S.css(e,"display"))&&(l?c=l:(le([e],!0),l=e.style.display||l,c=S.css(e,"display"),le([e]))),("inline"===c||"inline-block"===c&&null!=l)&&"none"===S.css(e,"float")&&(u||(p.done(function(){h.display=l}),null==l&&(c=h.display,l="none"===c?"":c)),h.display="inline-block")),n.overflow&&(h.overflow="hidden",p.always(function(){h.overflow=n.overflow[0],h.overflowX=n.overflow[1],h.overflowY=n.overflow[2]})),u=!1,d)u||(v?"hidden"in v&&(g=v.hidden):v=Y.access(e,"fxshow",{display:l}),o&&(v.hidden=!g),g&&le([e],!0),p.done(function(){for(r in g||le([e]),Y.remove(e,"fxshow"),d)S.style(e,r,d[r])})),u=ct(g?v[r]:0,r,p),r in v||(v[r]=u.start,g&&(u.end=u.start,u.start=0))}],prefilter:function(e,t){t?ft.prefilters.unshift(e):ft.prefilters.push(e)}}),S.speed=function(e,t,n){var r=e&&"object"==typeof e?S.extend({},e):{complete:n||!n&&t||m(e)&&e,duration:e,easing:n&&t||t&&!m(t)&&t};return S.fx.off?r.duration=0:"number"!=typeof r.duration&&(r.duration in S.fx.speeds?r.duration=S.fx.speeds[r.duration]:r.duration=S.fx.speeds._default),null!=r.queue&&!0!==r.queue||(r.queue="fx"),r.old=r.complete,r.complete=function(){m(r.old)&&r.old.call(this),r.queue&&S.dequeue(this,r.queue)},r},S.fn.extend({fadeTo:function(e,t,n,r){return this.filter(ae).css("opacity",0).show().end().animate({opacity:t},e,n,r)},animate:function(t,e,n,r){var i=S.isEmptyObject(t),o=S.speed(e,n,r),a=function(){var e=ft(this,S.extend({},t),o);(i||Y.get(this,"finish"))&&e.stop(!0)};return a.finish=a,i||!1===o.queue?this.each(a):this.queue(o.queue,a)},stop:function(i,e,o){var a=function(e){var t=e.stop;delete e.stop,t(o)};return"string"!=typeof i&&(o=e,e=i,i=void 0),e&&this.queue(i||"fx",[]),this.each(function(){var e=!0,t=null!=i&&i+"queueHooks",n=S.timers,r=Y.get(this);if(t)r[t]&&r[t].stop&&a(r[t]);else for(t in r)r[t]&&r[t].stop&&at.test(t)&&a(r[t]);for(t=n.length;t--;)n[t].elem!==this||null!=i&&n[t].queue!==i||(n[t].anim.stop(o),e=!1,n.splice(t,1));!e&&o||S.dequeue(this,i)})},finish:function(a){return!1!==a&&(a=a||"fx"),this.each(function(){var e,t=Y.get(this),n=t[a+"queue"],r=t[a+"queueHooks"],i=S.timers,o=n?n.length:0;for(t.finish=!0,S.queue(this,a,[]),r&&r.stop&&r.stop.call(this,!0),e=i.length;e--;)i[e].elem===this&&i[e].queue===a&&(i[e].anim.stop(!0),i.splice(e,1));for(e=0;e<o;e++)n[e]&&n[e].finish&&n[e].finish.call(this);delete t.finish})}}),S.each(["toggle","show","hide"],function(e,r){var i=S.fn[r];S.fn[r]=function(e,t,n){return null==e||"boolean"==typeof e?i.apply(this,arguments):this.animate(lt(r,!0),e,t,n)}}),S.each({slideDown:lt("show"),slideUp:lt("hide"),slideToggle:lt("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(e,r){S.fn[e]=function(e,t,n){return this.animate(r,e,t,n)}}),S.timers=[],S.fx.tick=function(){var e,t=0,n=S.timers;for(tt=Date.now();t<n.length;t++)(e=n[t])()||n[t]!==e||n.splice(t--,1);n.length||S.fx.stop(),tt=void 0},S.fx.timer=function(e){S.timers.push(e),S.fx.start()},S.fx.interval=13,S.fx.start=function(){nt||(nt=!0,st())},S.fx.stop=function(){nt=null},S.fx.speeds={slow:600,fast:200,_default:400},S.fn.delay=function(r,e){return r=S.fx&&S.fx.speeds[r]||r,e=e||"fx",this.queue(e,function(e,t){var n=C.setTimeout(e,r);t.stop=function(){C.clearTimeout(n)}})},rt=E.createElement("input"),it=E.createElement("select").appendChild(E.createElement("option")),rt.type="checkbox",y.checkOn=""!==rt.value,y.optSelected=it.selected,(rt=E.createElement("input")).value="t",rt.type="radio",y.radioValue="t"===rt.value;var pt,dt=S.expr.attrHandle;S.fn.extend({attr:function(e,t){return $(this,S.attr,e,t,1<arguments.length)},removeAttr:function(e){return this.each(function(){S.removeAttr(this,e)})}}),S.extend({attr:function(e,t,n){var r,i,o=e.nodeType;if(3!==o&&8!==o&&2!==o)return"undefined"==typeof e.getAttribute?S.prop(e,t,n):(1===o&&S.isXMLDoc(e)||(i=S.attrHooks[t.toLowerCase()]||(S.expr.match.bool.test(t)?pt:void 0)),void 0!==n?null===n?void S.removeAttr(e,t):i&&"set"in i&&void 0!==(r=i.set(e,n,t))?r:(e.setAttribute(t,n+""),n):i&&"get"in i&&null!==(r=i.get(e,t))?r:null==(r=S.find.attr(e,t))?void 0:r)},attrHooks:{type:{set:function(e,t){if(!y.radioValue&&"radio"===t&&A(e,"input")){var n=e.value;return e.setAttribute("type",t),n&&(e.value=n),t}}}},removeAttr:function(e,t){var n,r=0,i=t&&t.match(P);if(i&&1===e.nodeType)while(n=i[r++])e.removeAttribute(n)}}),pt={set:function(e,t,n){return!1===t?S.removeAttr(e,n):e.setAttribute(n,n),n}},S.each(S.expr.match.bool.source.match(/\w+/g),function(e,t){var a=dt[t]||S.find.attr;dt[t]=function(e,t,n){var r,i,o=t.toLowerCase();return n||(i=dt[o],dt[o]=r,r=null!=a(e,t,n)?o:null,dt[o]=i),r}});var ht=/^(?:input|select|textarea|button)$/i,gt=/^(?:a|area)$/i;function vt(e){return(e.match(P)||[]).join(" ")}function yt(e){return e.getAttribute&&e.getAttribute("class")||""}function mt(e){return Array.isArray(e)?e:"string"==typeof e&&e.match(P)||[]}S.fn.extend({prop:function(e,t){return $(this,S.prop,e,t,1<arguments.length)},removeProp:function(e){return this.each(function(){delete this[S.propFix[e]||e]})}}),S.extend({prop:function(e,t,n){var r,i,o=e.nodeType;if(3!==o&&8!==o&&2!==o)return 1===o&&S.isXMLDoc(e)||(t=S.propFix[t]||t,i=S.propHooks[t]),void 0!==n?i&&"set"in i&&void 0!==(r=i.set(e,n,t))?r:e[t]=n:i&&"get"in i&&null!==(r=i.get(e,t))?r:e[t]},propHooks:{tabIndex:{get:function(e){var t=S.find.attr(e,"tabindex");return t?parseInt(t,10):ht.test(e.nodeName)||gt.test(e.nodeName)&&e.href?0:-1}}},propFix:{"for":"htmlFor","class":"className"}}),y.optSelected||(S.propHooks.selected={get:function(e){var t=e.parentNode;return t&&t.parentNode&&t.parentNode.selectedIndex,null},set:function(e){var t=e.parentNode;t&&(t.selectedIndex,t.parentNode&&t.parentNode.selectedIndex)}}),S.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){S.propFix[this.toLowerCase()]=this}),S.fn.extend({addClass:function(t){var e,n,r,i,o,a,s,u=0;if(m(t))return this.each(function(e){S(this).addClass(t.call(this,e,yt(this)))});if((e=mt(t)).length)while(n=this[u++])if(i=yt(n),r=1===n.nodeType&&" "+vt(i)+" "){a=0;while(o=e[a++])r.indexOf(" "+o+" ")<0&&(r+=o+" ");i!==(s=vt(r))&&n.setAttribute("class",s)}return this},removeClass:function(t){var e,n,r,i,o,a,s,u=0;if(m(t))return this.each(function(e){S(this).removeClass(t.call(this,e,yt(this)))});if(!arguments.length)return this.attr("class","");if((e=mt(t)).length)while(n=this[u++])if(i=yt(n),r=1===n.nodeType&&" "+vt(i)+" "){a=0;while(o=e[a++])while(-1<r.indexOf(" "+o+" "))r=r.replace(" "+o+" "," ");i!==(s=vt(r))&&n.setAttribute("class",s)}return this},toggleClass:function(i,t){var o=typeof i,a="string"===o||Array.isArray(i);return"boolean"==typeof t&&a?t?this.addClass(i):this.removeClass(i):m(i)?this.each(function(e){S(this).toggleClass(i.call(this,e,yt(this),t),t)}):this.each(function(){var e,t,n,r;if(a){t=0,n=S(this),r=mt(i);while(e=r[t++])n.hasClass(e)?n.removeClass(e):n.addClass(e)}else void 0!==i&&"boolean"!==o||((e=yt(this))&&Y.set(this,"__className__",e),this.setAttribute&&this.setAttribute("class",e||!1===i?"":Y.get(this,"__className__")||""))})},hasClass:function(e){var t,n,r=0;t=" "+e+" ";while(n=this[r++])if(1===n.nodeType&&-1<(" "+vt(yt(n))+" ").indexOf(t))return!0;return!1}});var xt=/\r/g;S.fn.extend({val:function(n){var r,e,i,t=this[0];return arguments.length?(i=m(n),this.each(function(e){var t;1===this.nodeType&&(null==(t=i?n.call(this,e,S(this).val()):n)?t="":"number"==typeof t?t+="":Array.isArray(t)&&(t=S.map(t,function(e){return null==e?"":e+""})),(r=S.valHooks[this.type]||S.valHooks[this.nodeName.toLowerCase()])&&"set"in r&&void 0!==r.set(this,t,"value")||(this.value=t))})):t?(r=S.valHooks[t.type]||S.valHooks[t.nodeName.toLowerCase()])&&"get"in r&&void 0!==(e=r.get(t,"value"))?e:"string"==typeof(e=t.value)?e.replace(xt,""):null==e?"":e:void 0}}),S.extend({valHooks:{option:{get:function(e){var t=S.find.attr(e,"value");return null!=t?t:vt(S.text(e))}},select:{get:function(e){var t,n,r,i=e.options,o=e.selectedIndex,a="select-one"===e.type,s=a?null:[],u=a?o+1:i.length;for(r=o<0?u:a?o:0;r<u;r++)if(((n=i[r]).selected||r===o)&&!n.disabled&&(!n.parentNode.disabled||!A(n.parentNode,"optgroup"))){if(t=S(n).val(),a)return t;s.push(t)}return s},set:function(e,t){var n,r,i=e.options,o=S.makeArray(t),a=i.length;while(a--)((r=i[a]).selected=-1<S.inArray(S.valHooks.option.get(r),o))&&(n=!0);return n||(e.selectedIndex=-1),o}}}}),S.each(["radio","checkbox"],function(){S.valHooks[this]={set:function(e,t){if(Array.isArray(t))return e.checked=-1<S.inArray(S(e).val(),t)}},y.checkOn||(S.valHooks[this].get=function(e){return null===e.getAttribute("value")?"on":e.value})}),y.focusin="onfocusin"in C;var bt=/^(?:focusinfocus|focusoutblur)$/,wt=function(e){e.stopPropagation()};S.extend(S.event,{trigger:function(e,t,n,r){var i,o,a,s,u,l,c,f,p=[n||E],d=v.call(e,"type")?e.type:e,h=v.call(e,"namespace")?e.namespace.split("."):[];if(o=f=a=n=n||E,3!==n.nodeType&&8!==n.nodeType&&!bt.test(d+S.event.triggered)&&(-1<d.indexOf(".")&&(d=(h=d.split(".")).shift(),h.sort()),u=d.indexOf(":")<0&&"on"+d,(e=e[S.expando]?e:new S.Event(d,"object"==typeof e&&e)).isTrigger=r?2:3,e.namespace=h.join("."),e.rnamespace=e.namespace?new RegExp("(^|\\.)"+h.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,e.result=void 0,e.target||(e.target=n),t=null==t?[e]:S.makeArray(t,[e]),c=S.event.special[d]||{},r||!c.trigger||!1!==c.trigger.apply(n,t))){if(!r&&!c.noBubble&&!x(n)){for(s=c.delegateType||d,bt.test(s+d)||(o=o.parentNode);o;o=o.parentNode)p.push(o),a=o;a===(n.ownerDocument||E)&&p.push(a.defaultView||a.parentWindow||C)}i=0;while((o=p[i++])&&!e.isPropagationStopped())f=o,e.type=1<i?s:c.bindType||d,(l=(Y.get(o,"events")||Object.create(null))[e.type]&&Y.get(o,"handle"))&&l.apply(o,t),(l=u&&o[u])&&l.apply&&V(o)&&(e.result=l.apply(o,t),!1===e.result&&e.preventDefault());return e.type=d,r||e.isDefaultPrevented()||c._default&&!1!==c._default.apply(p.pop(),t)||!V(n)||u&&m(n[d])&&!x(n)&&((a=n[u])&&(n[u]=null),S.event.triggered=d,e.isPropagationStopped()&&f.addEventListener(d,wt),n[d](),e.isPropagationStopped()&&f.removeEventListener(d,wt),S.event.triggered=void 0,a&&(n[u]=a)),e.result}},simulate:function(e,t,n){var r=S.extend(new S.Event,n,{type:e,isSimulated:!0});S.event.trigger(r,null,t)}}),S.fn.extend({trigger:function(e,t){return this.each(function(){S.event.trigger(e,t,this)})},triggerHandler:function(e,t){var n=this[0];if(n)return S.event.trigger(e,t,n,!0)}}),y.focusin||S.each({focus:"focusin",blur:"focusout"},function(n,r){var i=function(e){S.event.simulate(r,e.target,S.event.fix(e))};S.event.special[r]={setup:function(){var e=this.ownerDocument||this.document||this,t=Y.access(e,r);t||e.addEventListener(n,i,!0),Y.access(e,r,(t||0)+1)},teardown:function(){var e=this.ownerDocument||this.document||this,t=Y.access(e,r)-1;t?Y.access(e,r,t):(e.removeEventListener(n,i,!0),Y.remove(e,r))}}});var Tt=C.location,Ct={guid:Date.now()},Et=/\?/;S.parseXML=function(e){var t;if(!e||"string"!=typeof e)return null;try{t=(new C.DOMParser).parseFromString(e,"text/xml")}catch(e){t=void 0}return t&&!t.getElementsByTagName("parsererror").length||S.error("Invalid XML: "+e),t};var St=/\[\]$/,kt=/\r?\n/g,At=/^(?:submit|button|image|reset|file)$/i,Nt=/^(?:input|select|textarea|keygen)/i;function Dt(n,e,r,i){var t;if(Array.isArray(e))S.each(e,function(e,t){r||St.test(n)?i(n,t):Dt(n+"["+("object"==typeof t&&null!=t?e:"")+"]",t,r,i)});else if(r||"object"!==w(e))i(n,e);else for(t in e)Dt(n+"["+t+"]",e[t],r,i)}S.param=function(e,t){var n,r=[],i=function(e,t){var n=m(t)?t():t;r[r.length]=encodeURIComponent(e)+"="+encodeURIComponent(null==n?"":n)};if(null==e)return"";if(Array.isArray(e)||e.jquery&&!S.isPlainObject(e))S.each(e,function(){i(this.name,this.value)});else for(n in e)Dt(n,e[n],t,i);return r.join("&")},S.fn.extend({serialize:function(){return S.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var e=S.prop(this,"elements");return e?S.makeArray(e):this}).filter(function(){var e=this.type;return this.name&&!S(this).is(":disabled")&&Nt.test(this.nodeName)&&!At.test(e)&&(this.checked||!pe.test(e))}).map(function(e,t){var n=S(this).val();return null==n?null:Array.isArray(n)?S.map(n,function(e){return{name:t.name,value:e.replace(kt,"\r\n")}}):{name:t.name,value:n.replace(kt,"\r\n")}}).get()}});var jt=/%20/g,qt=/#.*$/,Lt=/([?&])_=[^&]*/,Ht=/^(.*?):[ \t]*([^\r\n]*)$/gm,Ot=/^(?:GET|HEAD)$/,Pt=/^\/\//,Rt={},Mt={},It="*/".concat("*"),Wt=E.createElement("a");function Ft(o){return function(e,t){"string"!=typeof e&&(t=e,e="*");var n,r=0,i=e.toLowerCase().match(P)||[];if(m(t))while(n=i[r++])"+"===n[0]?(n=n.slice(1)||"*",(o[n]=o[n]||[]).unshift(t)):(o[n]=o[n]||[]).push(t)}}function Bt(t,i,o,a){var s={},u=t===Mt;function l(e){var r;return s[e]=!0,S.each(t[e]||[],function(e,t){var n=t(i,o,a);return"string"!=typeof n||u||s[n]?u?!(r=n):void 0:(i.dataTypes.unshift(n),l(n),!1)}),r}return l(i.dataTypes[0])||!s["*"]&&l("*")}function $t(e,t){var n,r,i=S.ajaxSettings.flatOptions||{};for(n in t)void 0!==t[n]&&((i[n]?e:r||(r={}))[n]=t[n]);return r&&S.extend(!0,e,r),e}Wt.href=Tt.href,S.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:Tt.href,type:"GET",isLocal:/^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(Tt.protocol),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":It,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/\bxml\b/,html:/\bhtml/,json:/\bjson\b/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":JSON.parse,"text xml":S.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(e,t){return t?$t($t(e,S.ajaxSettings),t):$t(S.ajaxSettings,e)},ajaxPrefilter:Ft(Rt),ajaxTransport:Ft(Mt),ajax:function(e,t){"object"==typeof e&&(t=e,e=void 0),t=t||{};var c,f,p,n,d,r,h,g,i,o,v=S.ajaxSetup({},t),y=v.context||v,m=v.context&&(y.nodeType||y.jquery)?S(y):S.event,x=S.Deferred(),b=S.Callbacks("once memory"),w=v.statusCode||{},a={},s={},u="canceled",T={readyState:0,getResponseHeader:function(e){var t;if(h){if(!n){n={};while(t=Ht.exec(p))n[t[1].toLowerCase()+" "]=(n[t[1].toLowerCase()+" "]||[]).concat(t[2])}t=n[e.toLowerCase()+" "]}return null==t?null:t.join(", ")},getAllResponseHeaders:function(){return h?p:null},setRequestHeader:function(e,t){return null==h&&(e=s[e.toLowerCase()]=s[e.toLowerCase()]||e,a[e]=t),this},overrideMimeType:function(e){return null==h&&(v.mimeType=e),this},statusCode:function(e){var t;if(e)if(h)T.always(e[T.status]);else for(t in e)w[t]=[w[t],e[t]];return this},abort:function(e){var t=e||u;return c&&c.abort(t),l(0,t),this}};if(x.promise(T),v.url=((e||v.url||Tt.href)+"").replace(Pt,Tt.protocol+"//"),v.type=t.method||t.type||v.method||v.type,v.dataTypes=(v.dataType||"*").toLowerCase().match(P)||[""],null==v.crossDomain){r=E.createElement("a");try{r.href=v.url,r.href=r.href,v.crossDomain=Wt.protocol+"//"+Wt.host!=r.protocol+"//"+r.host}catch(e){v.crossDomain=!0}}if(v.data&&v.processData&&"string"!=typeof v.data&&(v.data=S.param(v.data,v.traditional)),Bt(Rt,v,t,T),h)return T;for(i in(g=S.event&&v.global)&&0==S.active++&&S.event.trigger("ajaxStart"),v.type=v.type.toUpperCase(),v.hasContent=!Ot.test(v.type),f=v.url.replace(qt,""),v.hasContent?v.data&&v.processData&&0===(v.contentType||"").indexOf("application/x-www-form-urlencoded")&&(v.data=v.data.replace(jt,"+")):(o=v.url.slice(f.length),v.data&&(v.processData||"string"==typeof v.data)&&(f+=(Et.test(f)?"&":"?")+v.data,delete v.data),!1===v.cache&&(f=f.replace(Lt,"$1"),o=(Et.test(f)?"&":"?")+"_="+Ct.guid+++o),v.url=f+o),v.ifModified&&(S.lastModified[f]&&T.setRequestHeader("If-Modified-Since",S.lastModified[f]),S.etag[f]&&T.setRequestHeader("If-None-Match",S.etag[f])),(v.data&&v.hasContent&&!1!==v.contentType||t.contentType)&&T.setRequestHeader("Content-Type",v.contentType),T.setRequestHeader("Accept",v.dataTypes[0]&&v.accepts[v.dataTypes[0]]?v.accepts[v.dataTypes[0]]+("*"!==v.dataTypes[0]?", "+It+"; q=0.01":""):v.accepts["*"]),v.headers)T.setRequestHeader(i,v.headers[i]);if(v.beforeSend&&(!1===v.beforeSend.call(y,T,v)||h))return T.abort();if(u="abort",b.add(v.complete),T.done(v.success),T.fail(v.error),c=Bt(Mt,v,t,T)){if(T.readyState=1,g&&m.trigger("ajaxSend",[T,v]),h)return T;v.async&&0<v.timeout&&(d=C.setTimeout(function(){T.abort("timeout")},v.timeout));try{h=!1,c.send(a,l)}catch(e){if(h)throw e;l(-1,e)}}else l(-1,"No Transport");function l(e,t,n,r){var i,o,a,s,u,l=t;h||(h=!0,d&&C.clearTimeout(d),c=void 0,p=r||"",T.readyState=0<e?4:0,i=200<=e&&e<300||304===e,n&&(s=function(e,t,n){var r,i,o,a,s=e.contents,u=e.dataTypes;while("*"===u[0])u.shift(),void 0===r&&(r=e.mimeType||t.getResponseHeader("Content-Type"));if(r)for(i in s)if(s[i]&&s[i].test(r)){u.unshift(i);break}if(u[0]in n)o=u[0];else{for(i in n){if(!u[0]||e.converters[i+" "+u[0]]){o=i;break}a||(a=i)}o=o||a}if(o)return o!==u[0]&&u.unshift(o),n[o]}(v,T,n)),!i&&-1<S.inArray("script",v.dataTypes)&&(v.converters["text script"]=function(){}),s=function(e,t,n,r){var i,o,a,s,u,l={},c=e.dataTypes.slice();if(c[1])for(a in e.converters)l[a.toLowerCase()]=e.converters[a];o=c.shift();while(o)if(e.responseFields[o]&&(n[e.responseFields[o]]=t),!u&&r&&e.dataFilter&&(t=e.dataFilter(t,e.dataType)),u=o,o=c.shift())if("*"===o)o=u;else if("*"!==u&&u!==o){if(!(a=l[u+" "+o]||l["* "+o]))for(i in l)if((s=i.split(" "))[1]===o&&(a=l[u+" "+s[0]]||l["* "+s[0]])){!0===a?a=l[i]:!0!==l[i]&&(o=s[0],c.unshift(s[1]));break}if(!0!==a)if(a&&e["throws"])t=a(t);else try{t=a(t)}catch(e){return{state:"parsererror",error:a?e:"No conversion from "+u+" to "+o}}}return{state:"success",data:t}}(v,s,T,i),i?(v.ifModified&&((u=T.getResponseHeader("Last-Modified"))&&(S.lastModified[f]=u),(u=T.getResponseHeader("etag"))&&(S.etag[f]=u)),204===e||"HEAD"===v.type?l="nocontent":304===e?l="notmodified":(l=s.state,o=s.data,i=!(a=s.error))):(a=l,!e&&l||(l="error",e<0&&(e=0))),T.status=e,T.statusText=(t||l)+"",i?x.resolveWith(y,[o,l,T]):x.rejectWith(y,[T,l,a]),T.statusCode(w),w=void 0,g&&m.trigger(i?"ajaxSuccess":"ajaxError",[T,v,i?o:a]),b.fireWith(y,[T,l]),g&&(m.trigger("ajaxComplete",[T,v]),--S.active||S.event.trigger("ajaxStop")))}return T},getJSON:function(e,t,n){return S.get(e,t,n,"json")},getScript:function(e,t){return S.get(e,void 0,t,"script")}}),S.each(["get","post"],function(e,i){S[i]=function(e,t,n,r){return m(t)&&(r=r||n,n=t,t=void 0),S.ajax(S.extend({url:e,type:i,dataType:r,data:t,success:n},S.isPlainObject(e)&&e))}}),S.ajaxPrefilter(function(e){var t;for(t in e.headers)"content-type"===t.toLowerCase()&&(e.contentType=e.headers[t]||"")}),S._evalUrl=function(e,t,n){return S.ajax({url:e,type:"GET",dataType:"script",cache:!0,async:!1,global:!1,converters:{"text script":function(){}},dataFilter:function(e){S.globalEval(e,t,n)}})},S.fn.extend({wrapAll:function(e){var t;return this[0]&&(m(e)&&(e=e.call(this[0])),t=S(e,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&t.insertBefore(this[0]),t.map(function(){var e=this;while(e.firstElementChild)e=e.firstElementChild;return e}).append(this)),this},wrapInner:function(n){return m(n)?this.each(function(e){S(this).wrapInner(n.call(this,e))}):this.each(function(){var e=S(this),t=e.contents();t.length?t.wrapAll(n):e.append(n)})},wrap:function(t){var n=m(t);return this.each(function(e){S(this).wrapAll(n?t.call(this,e):t)})},unwrap:function(e){return this.parent(e).not("body").each(function(){S(this).replaceWith(this.childNodes)}),this}}),S.expr.pseudos.hidden=function(e){return!S.expr.pseudos.visible(e)},S.expr.pseudos.visible=function(e){return!!(e.offsetWidth||e.offsetHeight||e.getClientRects().length)},S.ajaxSettings.xhr=function(){try{return new C.XMLHttpRequest}catch(e){}};var _t={0:200,1223:204},zt=S.ajaxSettings.xhr();y.cors=!!zt&&"withCredentials"in zt,y.ajax=zt=!!zt,S.ajaxTransport(function(i){var o,a;if(y.cors||zt&&!i.crossDomain)return{send:function(e,t){var n,r=i.xhr();if(r.open(i.type,i.url,i.async,i.username,i.password),i.xhrFields)for(n in i.xhrFields)r[n]=i.xhrFields[n];for(n in i.mimeType&&r.overrideMimeType&&r.overrideMimeType(i.mimeType),i.crossDomain||e["X-Requested-With"]||(e["X-Requested-With"]="XMLHttpRequest"),e)r.setRequestHeader(n,e[n]);o=function(e){return function(){o&&(o=a=r.onload=r.onerror=r.onabort=r.ontimeout=r.onreadystatechange=null,"abort"===e?r.abort():"error"===e?"number"!=typeof r.status?t(0,"error"):t(r.status,r.statusText):t(_t[r.status]||r.status,r.statusText,"text"!==(r.responseType||"text")||"string"!=typeof r.responseText?{binary:r.response}:{text:r.responseText},r.getAllResponseHeaders()))}},r.onload=o(),a=r.onerror=r.ontimeout=o("error"),void 0!==r.onabort?r.onabort=a:r.onreadystatechange=function(){4===r.readyState&&C.setTimeout(function(){o&&a()})},o=o("abort");try{r.send(i.hasContent&&i.data||null)}catch(e){if(o)throw e}},abort:function(){o&&o()}}}),S.ajaxPrefilter(function(e){e.crossDomain&&(e.contents.script=!1)}),S.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/\b(?:java|ecma)script\b/},converters:{"text script":function(e){return S.globalEval(e),e}}}),S.ajaxPrefilter("script",function(e){void 0===e.cache&&(e.cache=!1),e.crossDomain&&(e.type="GET")}),S.ajaxTransport("script",function(n){var r,i;if(n.crossDomain||n.scriptAttrs)return{send:function(e,t){r=S("<script>").attr(n.scriptAttrs||{}).prop({charset:n.scriptCharset,src:n.url}).on("load error",i=function(e){r.remove(),i=null,e&&t("error"===e.type?404:200,e.type)}),E.head.appendChild(r[0])},abort:function(){i&&i()}}});var Ut,Xt=[],Vt=/(=)\?(?=&|$)|\?\?/;S.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var e=Xt.pop()||S.expando+"_"+Ct.guid++;return this[e]=!0,e}}),S.ajaxPrefilter("json jsonp",function(e,t,n){var r,i,o,a=!1!==e.jsonp&&(Vt.test(e.url)?"url":"string"==typeof e.data&&0===(e.contentType||"").indexOf("application/x-www-form-urlencoded")&&Vt.test(e.data)&&"data");if(a||"jsonp"===e.dataTypes[0])return r=e.jsonpCallback=m(e.jsonpCallback)?e.jsonpCallback():e.jsonpCallback,a?e[a]=e[a].replace(Vt,"$1"+r):!1!==e.jsonp&&(e.url+=(Et.test(e.url)?"&":"?")+e.jsonp+"="+r),e.converters["script json"]=function(){return o||S.error(r+" was not called"),o[0]},e.dataTypes[0]="json",i=C[r],C[r]=function(){o=arguments},n.always(function(){void 0===i?S(C).removeProp(r):C[r]=i,e[r]&&(e.jsonpCallback=t.jsonpCallback,Xt.push(r)),o&&m(i)&&i(o[0]),o=i=void 0}),"script"}),y.createHTMLDocument=((Ut=E.implementation.createHTMLDocument("").body).innerHTML="<form></form><form></form>",2===Ut.childNodes.length),S.parseHTML=function(e,t,n){return"string"!=typeof e?[]:("boolean"==typeof t&&(n=t,t=!1),t||(y.createHTMLDocument?((r=(t=E.implementation.createHTMLDocument("")).createElement("base")).href=E.location.href,t.head.appendChild(r)):t=E),o=!n&&[],(i=N.exec(e))?[t.createElement(i[1])]:(i=xe([e],t,o),o&&o.length&&S(o).remove(),S.merge([],i.childNodes)));var r,i,o},S.fn.load=function(e,t,n){var r,i,o,a=this,s=e.indexOf(" ");return-1<s&&(r=vt(e.slice(s)),e=e.slice(0,s)),m(t)?(n=t,t=void 0):t&&"object"==typeof t&&(i="POST"),0<a.length&&S.ajax({url:e,type:i||"GET",dataType:"html",data:t}).done(function(e){o=arguments,a.html(r?S("<div>").append(S.parseHTML(e)).find(r):e)}).always(n&&function(e,t){a.each(function(){n.apply(this,o||[e.responseText,t,e])})}),this},S.expr.pseudos.animated=function(t){return S.grep(S.timers,function(e){return t===e.elem}).length},S.offset={setOffset:function(e,t,n){var r,i,o,a,s,u,l=S.css(e,"position"),c=S(e),f={};"static"===l&&(e.style.position="relative"),s=c.offset(),o=S.css(e,"top"),u=S.css(e,"left"),("absolute"===l||"fixed"===l)&&-1<(o+u).indexOf("auto")?(a=(r=c.position()).top,i=r.left):(a=parseFloat(o)||0,i=parseFloat(u)||0),m(t)&&(t=t.call(e,n,S.extend({},s))),null!=t.top&&(f.top=t.top-s.top+a),null!=t.left&&(f.left=t.left-s.left+i),"using"in t?t.using.call(e,f):("number"==typeof f.top&&(f.top+="px"),"number"==typeof f.left&&(f.left+="px"),c.css(f))}},S.fn.extend({offset:function(t){if(arguments.length)return void 0===t?this:this.each(function(e){S.offset.setOffset(this,t,e)});var e,n,r=this[0];return r?r.getClientRects().length?(e=r.getBoundingClientRect(),n=r.ownerDocument.defaultView,{top:e.top+n.pageYOffset,left:e.left+n.pageXOffset}):{top:0,left:0}:void 0},position:function(){if(this[0]){var e,t,n,r=this[0],i={top:0,left:0};if("fixed"===S.css(r,"position"))t=r.getBoundingClientRect();else{t=this.offset(),n=r.ownerDocument,e=r.offsetParent||n.documentElement;while(e&&(e===n.body||e===n.documentElement)&&"static"===S.css(e,"position"))e=e.parentNode;e&&e!==r&&1===e.nodeType&&((i=S(e).offset()).top+=S.css(e,"borderTopWidth",!0),i.left+=S.css(e,"borderLeftWidth",!0))}return{top:t.top-i.top-S.css(r,"marginTop",!0),left:t.left-i.left-S.css(r,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var e=this.offsetParent;while(e&&"static"===S.css(e,"position"))e=e.offsetParent;return e||re})}}),S.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(t,i){var o="pageYOffset"===i;S.fn[t]=function(e){return $(this,function(e,t,n){var r;if(x(e)?r=e:9===e.nodeType&&(r=e.defaultView),void 0===n)return r?r[i]:e[t];r?r.scrollTo(o?r.pageXOffset:n,o?n:r.pageYOffset):e[t]=n},t,e,arguments.length)}}),S.each(["top","left"],function(e,n){S.cssHooks[n]=$e(y.pixelPosition,function(e,t){if(t)return t=Be(e,n),Me.test(t)?S(e).position()[n]+"px":t})}),S.each({Height:"height",Width:"width"},function(a,s){S.each({padding:"inner"+a,content:s,"":"outer"+a},function(r,o){S.fn[o]=function(e,t){var n=arguments.length&&(r||"boolean"!=typeof e),i=r||(!0===e||!0===t?"margin":"border");return $(this,function(e,t,n){var r;return x(e)?0===o.indexOf("outer")?e["inner"+a]:e.document.documentElement["client"+a]:9===e.nodeType?(r=e.documentElement,Math.max(e.body["scroll"+a],r["scroll"+a],e.body["offset"+a],r["offset"+a],r["client"+a])):void 0===n?S.css(e,t,i):S.style(e,t,n,i)},s,n?e:void 0,n)}})}),S.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(e,t){S.fn[t]=function(e){return this.on(t,e)}}),S.fn.extend({bind:function(e,t,n){return this.on(e,null,t,n)},unbind:function(e,t){return this.off(e,null,t)},delegate:function(e,t,n,r){return this.on(t,e,n,r)},undelegate:function(e,t,n){return 1===arguments.length?this.off(e,"**"):this.off(t,e||"**",n)},hover:function(e,t){return this.mouseenter(e).mouseleave(t||e)}}),S.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "),function(e,n){S.fn[n]=function(e,t){return 0<arguments.length?this.on(n,null,e,t):this.trigger(n)}});var Gt=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;S.proxy=function(e,t){var n,r,i;if("string"==typeof t&&(n=e[t],t=e,e=n),m(e))return r=s.call(arguments,2),(i=function(){return e.apply(t||this,r.concat(s.call(arguments)))}).guid=e.guid=e.guid||S.guid++,i},S.holdReady=function(e){e?S.readyWait++:S.ready(!0)},S.isArray=Array.isArray,S.parseJSON=JSON.parse,S.nodeName=A,S.isFunction=m,S.isWindow=x,S.camelCase=X,S.type=w,S.now=Date.now,S.isNumeric=function(e){var t=S.type(e);return("number"===t||"string"===t)&&!isNaN(e-parseFloat(e))},S.trim=function(e){return null==e?"":(e+"").replace(Gt,"")},"function"==typeof define&&define.amd&&define("jquery",[],function(){return S});var Yt=C.jQuery,Qt=C.$;return S.noConflict=function(e){return C.$===S&&(C.$=Qt),e&&C.jQuery===S&&(C.jQuery=Yt),S},"undefined"==typeof e&&(C.jQuery=C.$=S),S});

/*!
 * jQuery Form Plugin
 * version: 4.2.2
 * Requires jQuery v1.7.2 or later
 * Project repository: https://github.com/jquery-form/form

 * Copyright 2017 Kevin Morris
 * Copyright 2006 M. Alsup

 * Dual licensed under the LGPL-2.1+ or MIT licenses
 * https://github.com/jquery-form/form#license

 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 */
/* global ActiveXObject */

/* eslint-disable */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD. Register as an anonymous module.
		define(['jquery'], factory);
	} else if (typeof module === 'object' && module.exports) {
		// Node/CommonJS
		module.exports = function( root, jQuery ) {
			if (typeof jQuery === 'undefined') {
				// require('jQuery') returns a factory that requires window to build a jQuery instance, we normalize how we use modules
				// that require this pattern but the window provided is a noop if it's defined (how jquery works)
				if (typeof window !== 'undefined') {
					jQuery = require('jquery');
				}
				else {
					jQuery = require('jquery')(root);
				}
			}
			factory(jQuery);
			return jQuery;
		};
	} else {
		// Browser globals
		factory(jQuery);
	}

}(function ($) {
/* eslint-enable */
	'use strict';

	/*
		Usage Note:
		-----------
		Do not use both ajaxSubmit and ajaxForm on the same form. These
		functions are mutually exclusive. Use ajaxSubmit if you want
		to bind your own submit handler to the form. For example,

		$(document).ready(function() {
			$('#myForm').on('submit', function(e) {
				e.preventDefault(); // <-- important
				$(this).ajaxSubmit({
					target: '#output'
				});
			});
		});

		Use ajaxForm when you want the plugin to manage all the event binding
		for you. For example,

		$(document).ready(function() {
			$('#myForm').ajaxForm({
				target: '#output'
			});
		});

		You can also use ajaxForm with delegation (requires jQuery v1.7+), so the
		form does not have to exist when you invoke ajaxForm:

		$('#myForm').ajaxForm({
			delegation: true,
			target: '#output'
		});

		When using ajaxForm, the ajaxSubmit function will be invoked for you
		at the appropriate time.
	*/

	var rCRLF = /\r?\n/g;

	/**
	 * Feature detection
	 */
	var feature = {};

	feature.fileapi = $('<input type="file">').get(0).files !== undefined;
	feature.formdata = (typeof window.FormData !== 'undefined');

	var hasProp = !!$.fn.prop;

	// attr2 uses prop when it can but checks the return type for
	// an expected string. This accounts for the case where a form
	// contains inputs with names like "action" or "method"; in those
	// cases "prop" returns the element
	$.fn.attr2 = function() {
		if (!hasProp) {
			return this.attr.apply(this, arguments);
		}

		var val = this.prop.apply(this, arguments);

		if ((val && val.jquery) || typeof val === 'string') {
			return val;
		}

		return this.attr.apply(this, arguments);
	};

	/**
	 * ajaxSubmit() provides a mechanism for immediately submitting
	 * an HTML form using AJAX.
	 *
	 * @param	{object|string}	options		jquery.form.js parameters or custom url for submission
	 * @param	{object}		data		extraData
	 * @param	{string}		dataType	ajax dataType
	 * @param	{function}		onSuccess	ajax success callback function
	 */
	$.fn.ajaxSubmit = function(options, data, dataType, onSuccess) {
		// fast fail if nothing selected (http://dev.jquery.com/ticket/2752)
		if (!this.length) {
			log('ajaxSubmit: skipping submit process - no element selected');

			return this;
		}

		/* eslint consistent-this: ["error", "$form"] */
		var method, action, url, $form = this;

		if (typeof options === 'function') {
			options = {success: options};

		} else if (typeof options === 'string' || (options === false && arguments.length > 0)) {
			options = {
				'url'      : options,
				'data'     : data,
				'dataType' : dataType
			};

			if (typeof onSuccess === 'function') {
				options.success = onSuccess;
			}

		} else if (typeof options === 'undefined') {
			options = {};
		}

		method = options.method || options.type || this.attr2('method');
		action = options.url || this.attr2('action');

		url = (typeof action === 'string') ? $.trim(action) : '';
		url = url || window.location.href || '';
		if (url) {
			// clean url (don't include hash vaue)
			url = (url.match(/^([^#]+)/) || [])[1];
		}

		options = $.extend(true, {
			url       : url,
			success   : $.ajaxSettings.success,
			type      : method || $.ajaxSettings.type,
			iframeSrc : /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank'		// eslint-disable-line no-script-url
		}, options);

		// hook for manipulating the form data before it is extracted;
		// convenient for use with rich editors like tinyMCE or FCKEditor
		var veto = {};

		this.trigger('form-pre-serialize', [this, options, veto]);

		if (veto.veto) {
			log('ajaxSubmit: submit vetoed via form-pre-serialize trigger');

			return this;
		}

		// provide opportunity to alter form data before it is serialized
		if (options.beforeSerialize && options.beforeSerialize(this, options) === false) {
			log('ajaxSubmit: submit aborted via beforeSerialize callback');

			return this;
		}

		var traditional = options.traditional;

		if (typeof traditional === 'undefined') {
			traditional = $.ajaxSettings.traditional;
		}

		var elements = [];
		var qx, a = this.formToArray(options.semantic, elements, options.filtering);

		if (options.data) {
			var optionsData = $.isFunction(options.data) ? options.data(a) : options.data;

			options.extraData = optionsData;
			qx = $.param(optionsData, traditional);
		}

		// give pre-submit callback an opportunity to abort the submit
		if (options.beforeSubmit && options.beforeSubmit(a, this, options) === false) {
			log('ajaxSubmit: submit aborted via beforeSubmit callback');

			return this;
		}

		// fire vetoable 'validate' event
		this.trigger('form-submit-validate', [a, this, options, veto]);
		if (veto.veto) {
			log('ajaxSubmit: submit vetoed via form-submit-validate trigger');

			return this;
		}

		var q = $.param(a, traditional);

		if (qx) {
			q = (q ? (q + '&' + qx) : qx);
		}

		if (options.type.toUpperCase() === 'GET') {
			options.url += (options.url.indexOf('?') >= 0 ? '&' : '?') + q;
			options.data = null;	// data is null for 'get'
		} else {
			options.data = q;		// data is the query string for 'post'
		}

		var callbacks = [];

		if (options.resetForm) {
			callbacks.push(function() {
				$form.resetForm();
			});
		}

		if (options.clearForm) {
			callbacks.push(function() {
				$form.clearForm(options.includeHidden);
			});
		}

		// perform a load on the target only if dataType is not provided
		if (!options.dataType && options.target) {
			var oldSuccess = options.success || function(){};

			callbacks.push(function(data, textStatus, jqXHR) {
				var successArguments = arguments,
					fn = options.replaceTarget ? 'replaceWith' : 'html';

				$(options.target)[fn](data).each(function(){
					oldSuccess.apply(this, successArguments);
				});
			});

		} else if (options.success) {
			if ($.isArray(options.success)) {
				$.merge(callbacks, options.success);
			} else {
				callbacks.push(options.success);
			}
		}

		options.success = function(data, status, xhr) { // jQuery 1.4+ passes xhr as 3rd arg
			var context = options.context || this;		// jQuery 1.4+ supports scope context

			for (var i = 0, max = callbacks.length; i < max; i++) {
				callbacks[i].apply(context, [data, status, xhr || $form, $form]);
			}
		};

		if (options.error) {
			var oldError = options.error;

			options.error = function(xhr, status, error) {
				var context = options.context || this;

				oldError.apply(context, [xhr, status, error, $form]);
			};
		}

		if (options.complete) {
			var oldComplete = options.complete;

			options.complete = function(xhr, status) {
				var context = options.context || this;

				oldComplete.apply(context, [xhr, status, $form]);
			};
		}

		// are there files to upload?

		// [value] (issue #113), also see comment:
		// https://github.com/malsup/form/commit/588306aedba1de01388032d5f42a60159eea9228#commitcomment-2180219
		var fileInputs = $('input[type=file]:enabled', this).filter(function() {
			return $(this).val() !== '';
		});
		var hasFileInputs = fileInputs.length > 0;
		var mp = 'multipart/form-data';
		var multipart = ($form.attr('enctype') === mp || $form.attr('encoding') === mp);
		var fileAPI = feature.fileapi && feature.formdata;

		log('fileAPI :' + fileAPI);

		var shouldUseFrame = (hasFileInputs || multipart) && !fileAPI;
		var jqxhr;

		// options.iframe allows user to force iframe mode
		// 06-NOV-09: now defaulting to iframe mode if file input is detected
		if (options.iframe !== false && (options.iframe || shouldUseFrame)) {
			// hack to fix Safari hang (thanks to Tim Molendijk for this)
			// see: http://groups.google.com/group/jquery-dev/browse_thread/thread/36395b7ab510dd5d
			if (options.closeKeepAlive) {
				$.get(options.closeKeepAlive, function() {
					jqxhr = fileUploadIframe(a);
				});

			} else {
				jqxhr = fileUploadIframe(a);
			}

		} else if ((hasFileInputs || multipart) && fileAPI) {
			jqxhr = fileUploadXhr(a);

		} else {
			jqxhr = $.ajax(options);
		}

		$form.removeData('jqxhr').data('jqxhr', jqxhr);

		// clear element array
		for (var k = 0; k < elements.length; k++) {
			elements[k] = null;
		}

		// fire 'notify' event
		this.trigger('form-submit-notify', [this, options]);

		return this;

		// utility fn for deep serialization
		function deepSerialize(extraData) {
			var serialized = $.param(extraData, options.traditional).split('&');
			var len = serialized.length;
			var result = [];
			var i, part;

			for (i = 0; i < len; i++) {
				// #252; undo param space replacement
				serialized[i] = serialized[i].replace(/\+/g, ' ');
				part = serialized[i].split('=');
				// #278; use array instead of object storage, favoring array serializations
				result.push([decodeURIComponent(part[0]), decodeURIComponent(part[1])]);
			}

			return result;
		}

		// XMLHttpRequest Level 2 file uploads (big hat tip to francois2metz)
		function fileUploadXhr(a) {
			var formdata = new FormData();

			for (var i = 0; i < a.length; i++) {
				formdata.append(a[i].name, a[i].value);
			}

			if (options.extraData) {
				var serializedData = deepSerialize(options.extraData);

				for (i = 0; i < serializedData.length; i++) {
					if (serializedData[i]) {
						formdata.append(serializedData[i][0], serializedData[i][1]);
					}
				}
			}

			options.data = null;

			var s = $.extend(true, {}, $.ajaxSettings, options, {
				contentType : false,
				processData : false,
				cache       : false,
				type        : method || 'POST'
			});

			if (options.uploadProgress) {
				// workaround because jqXHR does not expose upload property
				s.xhr = function() {
					var xhr = $.ajaxSettings.xhr();

					if (xhr.upload) {
						xhr.upload.addEventListener('progress', function(event) {
							var percent = 0;
							var position = event.loaded || event.position;			/* event.position is deprecated */
							var total = event.total;

							if (event.lengthComputable) {
								percent = Math.ceil(position / total * 100);
							}

							options.uploadProgress(event, position, total, percent);
						}, false);
					}

					return xhr;
				};
			}

			s.data = null;

			var beforeSend = s.beforeSend;

			s.beforeSend = function(xhr, o) {
				// Send FormData() provided by user
				if (options.formData) {
					o.data = options.formData;
				} else {
					o.data = formdata;
				}

				if (beforeSend) {
					beforeSend.call(this, xhr, o);
				}
			};

			return $.ajax(s);
		}

		// private function for handling file uploads (hat tip to YAHOO!)
		function fileUploadIframe(a) {
			var form = $form[0], el, i, s, g, id, $io, io, xhr, sub, n, timedOut, timeoutHandle;
			var deferred = $.Deferred();

			// #341
			deferred.abort = function(status) {
				xhr.abort(status);
			};

			if (a) {
				// ensure that every serialized input is still enabled
				for (i = 0; i < elements.length; i++) {
					el = $(elements[i]);
					if (hasProp) {
						el.prop('disabled', false);
					} else {
						el.removeAttr('disabled');
					}
				}
			}

			s = $.extend(true, {}, $.ajaxSettings, options);
			s.context = s.context || s;
			id = 'jqFormIO' + new Date().getTime();
			var ownerDocument = form.ownerDocument;
			var $body = $form.closest('body');

			if (s.iframeTarget) {
				$io = $(s.iframeTarget, ownerDocument);
				n = $io.attr2('name');
				if (!n) {
					$io.attr2('name', id);
				} else {
					id = n;
				}

			} else {
				$io = $('<iframe name="' + id + '" src="' + s.iframeSrc + '" />', ownerDocument);
				$io.css({position: 'absolute', top: '-1000px', left: '-1000px'});
			}
			io = $io[0];


			xhr = { // mock object
				aborted               : 0,
				responseText          : null,
				responseXML           : null,
				status                : 0,
				statusText            : 'n/a',
				getAllResponseHeaders : function() {},
				getResponseHeader     : function() {},
				setRequestHeader      : function() {},
				abort                 : function(status) {
					var e = (status === 'timeout' ? 'timeout' : 'aborted');

					log('aborting upload... ' + e);
					this.aborted = 1;

					try { // #214, #257
						if (io.contentWindow.document.execCommand) {
							io.contentWindow.document.execCommand('Stop');
						}
					} catch (ignore) {}

					$io.attr('src', s.iframeSrc); // abort op in progress
					xhr.error = e;
					if (s.error) {
						s.error.call(s.context, xhr, e, status);
					}

					if (g) {
						$.event.trigger('ajaxError', [xhr, s, e]);
					}

					if (s.complete) {
						s.complete.call(s.context, xhr, e);
					}
				}
			};

			g = s.global;
			// trigger ajax global events so that activity/block indicators work like normal
			if (g && $.active++ === 0) {
				$.event.trigger('ajaxStart');
			}
			if (g) {
				$.event.trigger('ajaxSend', [xhr, s]);
			}

			if (s.beforeSend && s.beforeSend.call(s.context, xhr, s) === false) {
				if (s.global) {
					$.active--;
				}
				deferred.reject();

				return deferred;
			}

			if (xhr.aborted) {
				deferred.reject();

				return deferred;
			}

			// add submitting element to data if we know it
			sub = form.clk;
			if (sub) {
				n = sub.name;
				if (n && !sub.disabled) {
					s.extraData = s.extraData || {};
					s.extraData[n] = sub.value;
					if (sub.type === 'image') {
						s.extraData[n + '.x'] = form.clk_x;
						s.extraData[n + '.y'] = form.clk_y;
					}
				}
			}

			var CLIENT_TIMEOUT_ABORT = 1;
			var SERVER_ABORT = 2;

			function getDoc(frame) {
				/* it looks like contentWindow or contentDocument do not
				 * carry the protocol property in ie8, when running under ssl
				 * frame.document is the only valid response document, since
				 * the protocol is know but not on the other two objects. strange?
				 * "Same origin policy" http://en.wikipedia.org/wiki/Same_origin_policy
				 */

				var doc = null;

				// IE8 cascading access check
				try {
					if (frame.contentWindow) {
						doc = frame.contentWindow.document;
					}
				} catch (err) {
					// IE8 access denied under ssl & missing protocol
					log('cannot get iframe.contentWindow document: ' + err);
				}

				if (doc) { // successful getting content
					return doc;
				}

				try { // simply checking may throw in ie8 under ssl or mismatched protocol
					doc = frame.contentDocument ? frame.contentDocument : frame.document;
				} catch (err) {
					// last attempt
					log('cannot get iframe.contentDocument: ' + err);
					doc = frame.document;
				}

				return doc;
			}

			// Rails CSRF hack (thanks to Yvan Barthelemy)
			var csrf_token = $('meta[name=csrf-token]').attr('content');
			var csrf_param = $('meta[name=csrf-param]').attr('content');

			if (csrf_param && csrf_token) {
				s.extraData = s.extraData || {};
				s.extraData[csrf_param] = csrf_token;
			}

			// take a breath so that pending repaints get some cpu time before the upload starts
			function doSubmit() {
				// make sure form attrs are set
				var t = $form.attr2('target'),
					a = $form.attr2('action'),
					mp = 'multipart/form-data',
					et = $form.attr('enctype') || $form.attr('encoding') || mp;

				// update form attrs in IE friendly way
				form.setAttribute('target', id);
				if (!method || /post/i.test(method)) {
					form.setAttribute('method', 'POST');
				}
				if (a !== s.url) {
					form.setAttribute('action', s.url);
				}

				// ie borks in some cases when setting encoding
				if (!s.skipEncodingOverride && (!method || /post/i.test(method))) {
					$form.attr({
						encoding : 'multipart/form-data',
						enctype  : 'multipart/form-data'
					});
				}

				// support timout
				if (s.timeout) {
					timeoutHandle = setTimeout(function() {
						timedOut = true; cb(CLIENT_TIMEOUT_ABORT);
					}, s.timeout);
				}

				// look for server aborts
				function checkState() {
					try {
						var state = getDoc(io).readyState;

						log('state = ' + state);
						if (state && state.toLowerCase() === 'uninitialized') {
							setTimeout(checkState, 50);
						}

					} catch (e) {
						log('Server abort: ', e, ' (', e.name, ')');
						cb(SERVER_ABORT);				// eslint-disable-line callback-return
						if (timeoutHandle) {
							clearTimeout(timeoutHandle);
						}
						timeoutHandle = undefined;
					}
				}

				// add "extra" data to form if provided in options
				var extraInputs = [];

				try {
					if (s.extraData) {
						for (var n in s.extraData) {
							if (s.extraData.hasOwnProperty(n)) {
								// if using the $.param format that allows for multiple values with the same name
								if ($.isPlainObject(s.extraData[n]) && s.extraData[n].hasOwnProperty('name') && s.extraData[n].hasOwnProperty('value')) {
									extraInputs.push(
									$('<input type="hidden" name="' + s.extraData[n].name + '">', ownerDocument).val(s.extraData[n].value)
										.appendTo(form)[0]);
								} else {
									extraInputs.push(
									$('<input type="hidden" name="' + n + '">', ownerDocument).val(s.extraData[n])
										.appendTo(form)[0]);
								}
							}
						}
					}

					if (!s.iframeTarget) {
						// add iframe to doc and submit the form
						$io.appendTo($body);
					}

					if (io.attachEvent) {
						io.attachEvent('onload', cb);
					} else {
						io.addEventListener('load', cb, false);
					}

					setTimeout(checkState, 15);

					try {
						form.submit();

					} catch (err) {
						// just in case form has element with name/id of 'submit'
						var submitFn = document.createElement('form').submit;

						submitFn.apply(form);
					}

				} finally {
					// reset attrs and remove "extra" input elements
					form.setAttribute('action', a);
					form.setAttribute('enctype', et); // #380
					if (t) {
						form.setAttribute('target', t);
					} else {
						$form.removeAttr('target');
					}
					$(extraInputs).remove();
				}
			}

			if (s.forceSync) {
				doSubmit();
			} else {
				setTimeout(doSubmit, 10); // this lets dom updates render
			}

			var data, doc, domCheckCount = 50, callbackProcessed;

			function cb(e) {
				if (xhr.aborted || callbackProcessed) {
					return;
				}

				doc = getDoc(io);
				if (!doc) {
					log('cannot access response document');
					e = SERVER_ABORT;
				}
				if (e === CLIENT_TIMEOUT_ABORT && xhr) {
					xhr.abort('timeout');
					deferred.reject(xhr, 'timeout');

					return;

				} else if (e === SERVER_ABORT && xhr) {
					xhr.abort('server abort');
					deferred.reject(xhr, 'error', 'server abort');

					return;
				}

				if (!doc || doc.location.href === s.iframeSrc) {
					// response not received yet
					if (!timedOut) {
						return;
					}
				}

				if (io.detachEvent) {
					io.detachEvent('onload', cb);
				} else {
					io.removeEventListener('load', cb, false);
				}

				var status = 'success', errMsg;

				try {
					if (timedOut) {
						throw 'timeout';
					}

					var isXml = s.dataType === 'xml' || doc.XMLDocument || $.isXMLDoc(doc);

					log('isXml=' + isXml);

					if (!isXml && window.opera && (doc.body === null || !doc.body.innerHTML)) {
						if (--domCheckCount) {
							// in some browsers (Opera) the iframe DOM is not always traversable when
							// the onload callback fires, so we loop a bit to accommodate
							log('requeing onLoad callback, DOM not available');
							setTimeout(cb, 250);

							return;
						}
						// let this fall through because server response could be an empty document
						// log('Could not access iframe DOM after mutiple tries.');
						// throw 'DOMException: not available';
					}

					// log('response detected');
					var docRoot = doc.body ? doc.body : doc.documentElement;

					xhr.responseText = docRoot ? docRoot.innerHTML : null;
					xhr.responseXML = doc.XMLDocument ? doc.XMLDocument : doc;
					if (isXml) {
						s.dataType = 'xml';
					}
					xhr.getResponseHeader = function(header){
						var headers = {'content-type': s.dataType};

						return headers[header.toLowerCase()];
					};
					// support for XHR 'status' & 'statusText' emulation :
					if (docRoot) {
						xhr.status = Number(docRoot.getAttribute('status')) || xhr.status;
						xhr.statusText = docRoot.getAttribute('statusText') || xhr.statusText;
					}

					var dt = (s.dataType || '').toLowerCase();
					var scr = /(json|script|text)/.test(dt);

					if (scr || s.textarea) {
						// see if user embedded response in textarea
						var ta = doc.getElementsByTagName('textarea')[0];

						if (ta) {
							xhr.responseText = ta.value;
							// support for XHR 'status' & 'statusText' emulation :
							xhr.status = Number(ta.getAttribute('status')) || xhr.status;
							xhr.statusText = ta.getAttribute('statusText') || xhr.statusText;

						} else if (scr) {
							// account for browsers injecting pre around json response
							var pre = doc.getElementsByTagName('pre')[0];
							var b = doc.getElementsByTagName('body')[0];

							if (pre) {
								xhr.responseText = pre.textContent ? pre.textContent : pre.innerText;
							} else if (b) {
								xhr.responseText = b.textContent ? b.textContent : b.innerText;
							}
						}

					} else if (dt === 'xml' && !xhr.responseXML && xhr.responseText) {
						xhr.responseXML = toXml(xhr.responseText);			// eslint-disable-line no-use-before-define
					}

					try {
						data = httpData(xhr, dt, s);						// eslint-disable-line no-use-before-define

					} catch (err) {
						status = 'parsererror';
						xhr.error = errMsg = (err || status);
					}

				} catch (err) {
					log('error caught: ', err);
					status = 'error';
					xhr.error = errMsg = (err || status);
				}

				if (xhr.aborted) {
					log('upload aborted');
					status = null;
				}

				if (xhr.status) { // we've set xhr.status
					status = ((xhr.status >= 200 && xhr.status < 300) || xhr.status === 304) ? 'success' : 'error';
				}

				// ordering of these callbacks/triggers is odd, but that's how $.ajax does it
				if (status === 'success') {
					if (s.success) {
						s.success.call(s.context, data, 'success', xhr);
					}

					deferred.resolve(xhr.responseText, 'success', xhr);

					if (g) {
						$.event.trigger('ajaxSuccess', [xhr, s]);
					}

				} else if (status) {
					if (typeof errMsg === 'undefined') {
						errMsg = xhr.statusText;
					}
					if (s.error) {
						s.error.call(s.context, xhr, status, errMsg);
					}
					deferred.reject(xhr, 'error', errMsg);
					if (g) {
						$.event.trigger('ajaxError', [xhr, s, errMsg]);
					}
				}

				if (g) {
					$.event.trigger('ajaxComplete', [xhr, s]);
				}

				if (g && !--$.active) {
					$.event.trigger('ajaxStop');
				}

				if (s.complete) {
					s.complete.call(s.context, xhr, status);
				}

				callbackProcessed = true;
				if (s.timeout) {
					clearTimeout(timeoutHandle);
				}

				// clean up
				setTimeout(function() {
					if (!s.iframeTarget) {
						$io.remove();
					} else { // adding else to clean up existing iframe response.
						$io.attr('src', s.iframeSrc);
					}
					xhr.responseXML = null;
				}, 100);
			}

			var toXml = $.parseXML || function(s, doc) { // use parseXML if available (jQuery 1.5+)
				if (window.ActiveXObject) {
					doc = new ActiveXObject('Microsoft.XMLDOM');
					doc.async = 'false';
					doc.loadXML(s);

				} else {
					doc = (new DOMParser()).parseFromString(s, 'text/xml');
				}

				return (doc && doc.documentElement && doc.documentElement.nodeName !== 'parsererror') ? doc : null;
			};
			var parseJSON = $.parseJSON || function(s) {
				/* jslint evil:true */
				return window['eval']('(' + s + ')');			// eslint-disable-line dot-notation
			};

			var httpData = function(xhr, type, s) { // mostly lifted from jq1.4.4

				var ct = xhr.getResponseHeader('content-type') || '',
					xml = ((type === 'xml' || !type) && ct.indexOf('xml') >= 0),
					data = xml ? xhr.responseXML : xhr.responseText;

				if (xml && data.documentElement.nodeName === 'parsererror') {
					if ($.error) {
						$.error('parsererror');
					}
				}
				if (s && s.dataFilter) {
					data = s.dataFilter(data, type);
				}
				if (typeof data === 'string') {
					if ((type === 'json' || !type) && ct.indexOf('json') >= 0) {
						data = parseJSON(data);
					} else if ((type === 'script' || !type) && ct.indexOf('javascript') >= 0) {
						$.globalEval(data);
					}
				}

				return data;
			};

			return deferred;
		}
	};

	/**
	 * ajaxForm() provides a mechanism for fully automating form submission.
	 *
	 * The advantages of using this method instead of ajaxSubmit() are:
	 *
	 * 1: This method will include coordinates for <input type="image"> elements (if the element
	 *	is used to submit the form).
	 * 2. This method will include the submit element's name/value data (for the element that was
	 *	used to submit the form).
	 * 3. This method binds the submit() method to the form for you.
	 *
	 * The options argument for ajaxForm works exactly as it does for ajaxSubmit. ajaxForm merely
	 * passes the options argument along after properly binding events for submit elements and
	 * the form itself.
	 */
	$.fn.ajaxForm = function(options, data, dataType, onSuccess) {
		if (typeof options === 'string' || (options === false && arguments.length > 0)) {
			options = {
				'url'      : options,
				'data'     : data,
				'dataType' : dataType
			};

			if (typeof onSuccess === 'function') {
				options.success = onSuccess;
			}
		}

		options = options || {};
		options.delegation = options.delegation && $.isFunction($.fn.on);

		// in jQuery 1.3+ we can fix mistakes with the ready state
		if (!options.delegation && this.length === 0) {
			var o = {s: this.selector, c: this.context};

			if (!$.isReady && o.s) {
				log('DOM not ready, queuing ajaxForm');
				$(function() {
					$(o.s, o.c).ajaxForm(options);
				});

				return this;
			}

			// is your DOM ready?  http://docs.jquery.com/Tutorials:Introducing_$(document).ready()
			log('terminating; zero elements found by selector' + ($.isReady ? '' : ' (DOM not ready)'));

			return this;
		}

		if (options.delegation) {
			$(document)
				.off('submit.form-plugin', this.selector, doAjaxSubmit)
				.off('click.form-plugin', this.selector, captureSubmittingElement)
				.on('submit.form-plugin', this.selector, options, doAjaxSubmit)
				.on('click.form-plugin', this.selector, options, captureSubmittingElement);

			return this;
		}

		return this.ajaxFormUnbind()
			.on('submit.form-plugin', options, doAjaxSubmit)
			.on('click.form-plugin', options, captureSubmittingElement);
	};

	// private event handlers
	function doAjaxSubmit(e) {
		/* jshint validthis:true */
		var options = e.data;

		if (!e.isDefaultPrevented()) { // if event has been canceled, don't proceed
			e.preventDefault();
			$(e.target).closest('form').ajaxSubmit(options); // #365
		}
	}

	function captureSubmittingElement(e) {
		/* jshint validthis:true */
		var target = e.target;
		var $el = $(target);

		if (!$el.is('[type=submit],[type=image]')) {
			// is this a child element of the submit el?  (ex: a span within a button)
			var t = $el.closest('[type=submit]');

			if (t.length === 0) {
				return;
			}
			target = t[0];
		}

		var form = target.form;

		form.clk = target;

		if (target.type === 'image') {
			if (typeof e.offsetX !== 'undefined') {
				form.clk_x = e.offsetX;
				form.clk_y = e.offsetY;

			} else if (typeof $.fn.offset === 'function') {
				var offset = $el.offset();

				form.clk_x = e.pageX - offset.left;
				form.clk_y = e.pageY - offset.top;

			} else {
				form.clk_x = e.pageX - target.offsetLeft;
				form.clk_y = e.pageY - target.offsetTop;
			}
		}
		// clear form vars
		setTimeout(function() {
			form.clk = form.clk_x = form.clk_y = null;
		}, 100);
	}


	// ajaxFormUnbind unbinds the event handlers that were bound by ajaxForm
	$.fn.ajaxFormUnbind = function() {
		return this.off('submit.form-plugin click.form-plugin');
	};

	/**
	 * formToArray() gathers form element data into an array of objects that can
	 * be passed to any of the following ajax functions: $.get, $.post, or load.
	 * Each object in the array has both a 'name' and 'value' property. An example of
	 * an array for a simple login form might be:
	 *
	 * [ { name: 'username', value: 'jresig' }, { name: 'password', value: 'secret' } ]
	 *
	 * It is this array that is passed to pre-submit callback functions provided to the
	 * ajaxSubmit() and ajaxForm() methods.
	 */
	$.fn.formToArray = function(semantic, elements, filtering) {
		var a = [];

		if (this.length === 0) {
			return a;
		}

		var form = this[0];
		var formId = this.attr('id');
		var els = (semantic || typeof form.elements === 'undefined') ? form.getElementsByTagName('*') : form.elements;
		var els2;

		if (els) {
			els = $.makeArray(els); // convert to standard array
		}

		// #386; account for inputs outside the form which use the 'form' attribute
		// FinesseRus: in non-IE browsers outside fields are already included in form.elements.
		if (formId && (semantic || /(Edge|Trident)\//.test(navigator.userAgent))) {
			els2 = $(':input[form="' + formId + '"]').get(); // hat tip @thet
			if (els2.length) {
				els = (els || []).concat(els2);
			}
		}

		if (!els || !els.length) {
			return a;
		}

		if ($.isFunction(filtering)) {
			els = $.map(els, filtering);
		}

		var i, j, n, v, el, max, jmax;

		for (i = 0, max = els.length; i < max; i++) {
			el = els[i];
			n = el.name;
			if (!n || el.disabled) {
				continue;
			}

			if (semantic && form.clk && el.type === 'image') {
				// handle image inputs on the fly when semantic == true
				if (form.clk === el) {
					a.push({name: n, value: $(el).val(), type: el.type});
					a.push({name: n + '.x', value: form.clk_x}, {name: n + '.y', value: form.clk_y});
				}
				continue;
			}

			v = $.fieldValue(el, true);
			if (v && v.constructor === Array) {
				if (elements) {
					elements.push(el);
				}
				for (j = 0, jmax = v.length; j < jmax; j++) {
					a.push({name: n, value: v[j]});
				}

			} else if (feature.fileapi && el.type === 'file') {
				if (elements) {
					elements.push(el);
				}

				var files = el.files;

				if (files.length) {
					for (j = 0; j < files.length; j++) {
						a.push({name: n, value: files[j], type: el.type});
					}
				} else {
					// #180
					a.push({name: n, value: '', type: el.type});
				}

			} else if (v !== null && typeof v !== 'undefined') {
				if (elements) {
					elements.push(el);
				}
				a.push({name: n, value: v, type: el.type, required: el.required});
			}
		}

		if (!semantic && form.clk) {
			// input type=='image' are not found in elements array! handle it here
			var $input = $(form.clk), input = $input[0];

			n = input.name;

			if (n && !input.disabled && input.type === 'image') {
				a.push({name: n, value: $input.val()});
				a.push({name: n + '.x', value: form.clk_x}, {name: n + '.y', value: form.clk_y});
			}
		}

		return a;
	};

	/**
	 * Serializes form data into a 'submittable' string. This method will return a string
	 * in the format: name1=value1&amp;name2=value2
	 */
	$.fn.formSerialize = function(semantic) {
		// hand off to jQuery.param for proper encoding
		return $.param(this.formToArray(semantic));
	};

	/**
	 * Serializes all field elements in the jQuery object into a query string.
	 * This method will return a string in the format: name1=value1&amp;name2=value2
	 */
	$.fn.fieldSerialize = function(successful) {
		var a = [];

		this.each(function() {
			var n = this.name;

			if (!n) {
				return;
			}

			var v = $.fieldValue(this, successful);

			if (v && v.constructor === Array) {
				for (var i = 0, max = v.length; i < max; i++) {
					a.push({name: n, value: v[i]});
				}

			} else if (v !== null && typeof v !== 'undefined') {
				a.push({name: this.name, value: v});
			}
		});

		// hand off to jQuery.param for proper encoding
		return $.param(a);
	};

	/**
	 * Returns the value(s) of the element in the matched set. For example, consider the following form:
	 *
	 *	<form><fieldset>
	 *		<input name="A" type="text">
	 *		<input name="A" type="text">
	 *		<input name="B" type="checkbox" value="B1">
	 *		<input name="B" type="checkbox" value="B2">
	 *		<input name="C" type="radio" value="C1">
	 *		<input name="C" type="radio" value="C2">
	 *	</fieldset></form>
	 *
	 *	var v = $('input[type=text]').fieldValue();
	 *	// if no values are entered into the text inputs
	 *	v === ['','']
	 *	// if values entered into the text inputs are 'foo' and 'bar'
	 *	v === ['foo','bar']
	 *
	 *	var v = $('input[type=checkbox]').fieldValue();
	 *	// if neither checkbox is checked
	 *	v === undefined
	 *	// if both checkboxes are checked
	 *	v === ['B1', 'B2']
	 *
	 *	var v = $('input[type=radio]').fieldValue();
	 *	// if neither radio is checked
	 *	v === undefined
	 *	// if first radio is checked
	 *	v === ['C1']
	 *
	 * The successful argument controls whether or not the field element must be 'successful'
	 * (per http://www.w3.org/TR/html4/interact/forms.html#successful-controls).
	 * The default value of the successful argument is true. If this value is false the value(s)
	 * for each element is returned.
	 *
	 * Note: This method *always* returns an array. If no valid value can be determined the
	 *	array will be empty, otherwise it will contain one or more values.
	 */
	$.fn.fieldValue = function(successful) {
		for (var val = [], i = 0, max = this.length; i < max; i++) {
			var el = this[i];
			var v = $.fieldValue(el, successful);

			if (v === null || typeof v === 'undefined' || (v.constructor === Array && !v.length)) {
				continue;
			}

			if (v.constructor === Array) {
				$.merge(val, v);
			} else {
				val.push(v);
			}
		}

		return val;
	};

	/**
	 * Returns the value of the field element.
	 */
	$.fieldValue = function(el, successful) {
		var n = el.name, t = el.type, tag = el.tagName.toLowerCase();

		if (typeof successful === 'undefined') {
			successful = true;
		}

		/* eslint-disable no-mixed-operators */
		if (successful && (!n || el.disabled || t === 'reset' || t === 'button' ||
			(t === 'checkbox' || t === 'radio') && !el.checked ||
			(t === 'submit' || t === 'image') && el.form && el.form.clk !== el ||
			tag === 'select' && el.selectedIndex === -1)) {
		/* eslint-enable no-mixed-operators */
			return null;
		}

		if (tag === 'select') {
			var index = el.selectedIndex;

			if (index < 0) {
				return null;
			}

			var a = [], ops = el.options;
			var one = (t === 'select-one');
			var max = (one ? index + 1 : ops.length);

			for (var i = (one ? index : 0); i < max; i++) {
				var op = ops[i];

				if (op.selected && !op.disabled) {
					var v = op.value;

					if (!v) { // extra pain for IE...
						v = (op.attributes && op.attributes.value && !(op.attributes.value.specified)) ? op.text : op.value;
					}

					if (one) {
						return v;
					}

					a.push(v);
				}
			}

			return a;
		}

		return $(el).val().replace(rCRLF, '\r\n');
	};

	/**
	 * Clears the form data. Takes the following actions on the form's input fields:
	 *  - input text fields will have their 'value' property set to the empty string
	 *  - select elements will have their 'selectedIndex' property set to -1
	 *  - checkbox and radio inputs will have their 'checked' property set to false
	 *  - inputs of type submit, button, reset, and hidden will *not* be effected
	 *  - button elements will *not* be effected
	 */
	$.fn.clearForm = function(includeHidden) {
		return this.each(function() {
			$('input,select,textarea', this).clearFields(includeHidden);
		});
	};

	/**
	 * Clears the selected form elements.
	 */
	$.fn.clearFields = $.fn.clearInputs = function(includeHidden) {
		var re = /^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i; // 'hidden' is not in this list

		return this.each(function() {
			var t = this.type, tag = this.tagName.toLowerCase();

			if (re.test(t) || tag === 'textarea') {
				this.value = '';

			} else if (t === 'checkbox' || t === 'radio') {
				this.checked = false;

			} else if (tag === 'select') {
				this.selectedIndex = -1;

			} else if (t === 'file') {
				if (/MSIE/.test(navigator.userAgent)) {
					$(this).replaceWith($(this).clone(true));
				} else {
					$(this).val('');
				}

			} else if (includeHidden) {
				// includeHidden can be the value true, or it can be a selector string
				// indicating a special test; for example:
				// $('#myForm').clearForm('.special:hidden')
				// the above would clean hidden inputs that have the class of 'special'
				if ((includeHidden === true && /hidden/.test(t)) ||
					(typeof includeHidden === 'string' && $(this).is(includeHidden))) {
					this.value = '';
				}
			}
		});
	};


	/**
	 * Resets the form data or individual elements. Takes the following actions
	 * on the selected tags:
	 * - all fields within form elements will be reset to their original value
	 * - input / textarea / select fields will be reset to their original value
	 * - option / optgroup fields (for multi-selects) will defaulted individually
	 * - non-multiple options will find the right select to default
	 * - label elements will be searched against its 'for' attribute
	 * - all others will be searched for appropriate children to default
	 */
	$.fn.resetForm = function() {
		return this.each(function() {
			var el = $(this);
			var tag = this.tagName.toLowerCase();

			switch (tag) {
			case 'input':
				this.checked = this.defaultChecked;
					// fall through

			case 'textarea':
				this.value = this.defaultValue;

				return true;

			case 'option':
			case 'optgroup':
				var select = el.parents('select');

				if (select.length && select[0].multiple) {
					if (tag === 'option') {
						this.selected = this.defaultSelected;
					} else {
						el.find('option').resetForm();
					}
				} else {
					select.resetForm();
				}

				return true;

			case 'select':
				el.find('option').each(function(i) {				// eslint-disable-line consistent-return
					this.selected = this.defaultSelected;
					if (this.defaultSelected && !el[0].multiple) {
						el[0].selectedIndex = i;

						return false;
					}
				});

				return true;

			case 'label':
				var forEl = $(el.attr('for'));
				var list = el.find('input,select,textarea');

				if (forEl[0]) {
					list.unshift(forEl[0]);
				}

				list.resetForm();

				return true;

			case 'form':
					// guard against an input with the name of 'reset'
					// note that IE reports the reset function as an 'object'
				if (typeof this.reset === 'function' || (typeof this.reset === 'object' && !this.reset.nodeType)) {
					this.reset();
				}

				return true;

			default:
				el.find('form,input,label,select,textarea').resetForm();

				return true;
			}
		});
	};

	/**
	 * Enables or disables any matching elements.
	 */
	$.fn.enable = function(b) {
		if (typeof b === 'undefined') {
			b = true;
		}

		return this.each(function() {
			this.disabled = !b;
		});
	};

	/**
	 * Checks/unchecks any matching checkboxes or radio buttons and
	 * selects/deselects and matching option elements.
	 */
	$.fn.selected = function(select) {
		if (typeof select === 'undefined') {
			select = true;
		}

		return this.each(function() {
			var t = this.type;

			if (t === 'checkbox' || t === 'radio') {
				this.checked = select;

			} else if (this.tagName.toLowerCase() === 'option') {
				var $sel = $(this).parent('select');

				if (select && $sel[0] && $sel[0].type === 'select-one') {
					// deselect all other options
					$sel.find('option').selected(false);
				}

				this.selected = select;
			}
		});
	};

	// expose debug var
	$.fn.ajaxSubmit.debug = false;

	// helper fn for console logging
	function log() {
		if (!$.fn.ajaxSubmit.debug) {
			return;
		}

		var msg = '[jquery.form] ' + Array.prototype.join.call(arguments, '');

		if (window.console && window.console.log) {
			window.console.log(msg);

		} else if (window.opera && window.opera.postError) {
			window.opera.postError(msg);
		}
	}
}));

// Utility function
function Util () {};

/* 
	class manipulation functions
*/
Util.hasClass = function(el, className) {
	if (el.classList) return el.classList.contains(className);
	else return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
};

Util.addClass = function(el, className) {
	var classList = className.split(' ');
 	if (el.classList) el.classList.add(classList[0]);
 	else if (!Util.hasClass(el, classList[0])) el.className += " " + classList[0];
 	if (classList.length > 1) Util.addClass(el, classList.slice(1).join(' '));
};

Util.removeClass = function(el, className) {
	var classList = className.split(' ');
	if (el.classList) el.classList.remove(classList[0]);	
	else if(Util.hasClass(el, classList[0])) {
		var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|$)');
		el.className=el.className.replace(reg, ' ');
	}
	if (classList.length > 1) Util.removeClass(el, classList.slice(1).join(' '));
};

Util.toggleClass = function(el, className, bool) {
	if(bool) Util.addClass(el, className);
	else Util.removeClass(el, className);
};

Util.setAttributes = function(el, attrs) {
  for(var key in attrs) {
    el.setAttribute(key, attrs[key]);
  }
};

/* 
  DOM manipulation
*/
Util.getChildrenByClassName = function(el, className) {
  var children = el.children,
    childrenByClass = [];
  for (var i = 0; i < el.children.length; i++) {
    if (Util.hasClass(el.children[i], className)) childrenByClass.push(el.children[i]);
  }
  return childrenByClass;
};

Util.is = function(elem, selector) {
  if(selector.nodeType){
    return elem === selector;
  }

  var qa = (typeof(selector) === 'string' ? document.querySelectorAll(selector) : selector),
    length = qa.length,
    returnArr = [];

  while(length--){
    if(qa[length] === elem){
      return true;
    }
  }

  return false;
};

/* 
	Animate height of an element
*/
Util.setHeight = function(start, to, element, duration, cb) {
	var change = to - start,
	    currentTime = null;

  var animateHeight = function(timestamp){  
    if (!currentTime) currentTime = timestamp;         
    var progress = timestamp - currentTime;
    var val = parseInt((progress/duration)*change + start);
    element.style.height = val+"px";
    if(progress < duration) {
        window.requestAnimationFrame(animateHeight);
    } else {
    	cb();
    }
  };
  
  //set the height of the element before starting animation -> fix bug on Safari
  element.style.height = start+"px";
  window.requestAnimationFrame(animateHeight);
};

/* 
	Smooth Scroll
*/

Util.scrollTo = function(final, duration, cb, scrollEl) {
  var element = scrollEl || window;
  var start = element.scrollTop || document.documentElement.scrollTop,
    currentTime = null;

  if(!scrollEl) start = window.scrollY || document.documentElement.scrollTop;
      
  var animateScroll = function(timestamp){
  	if (!currentTime) currentTime = timestamp;        
    var progress = timestamp - currentTime;
    if(progress > duration) progress = duration;
    var val = Math.easeInOutQuad(progress, start, final-start, duration);
    element.scrollTo(0, val);
    if(progress < duration) {
        window.requestAnimationFrame(animateScroll);
    } else {
      cb && cb();
    }
  };

  window.requestAnimationFrame(animateScroll);
};

/* 
  Focus utility classes
*/

//Move focus to an element
Util.moveFocus = function (element) {
  if( !element ) element = document.getElementsByTagName("body")[0];
  element.focus();
  if (document.activeElement !== element) {
    element.setAttribute('tabindex','-1');
    element.focus();
  }
};

/* 
  Misc
*/

Util.getIndexInArray = function(array, el) {
  return Array.prototype.indexOf.call(array, el);
};

Util.cssSupports = function(property, value) {
  if('CSS' in window) {
    return CSS.supports(property, value);
  } else {
    var jsProperty = property.replace(/-([a-z])/g, function (g) { return g[1].toUpperCase();});
    return jsProperty in document.body.style;
  }
};

// merge a set of user options into plugin defaults
// https://gomakethings.com/vanilla-javascript-version-of-jquery-extend/
Util.extend = function() {
  // Variables
  var extended = {};
  var deep = false;
  var i = 0;
  var length = arguments.length;

  // Check if a deep merge
  if ( Object.prototype.toString.call( arguments[0] ) === '[object Boolean]' ) {
    deep = arguments[0];
    i++;
  }

  // Merge the object into the extended object
  var merge = function (obj) {
    for ( var prop in obj ) {
      if ( Object.prototype.hasOwnProperty.call( obj, prop ) ) {
        // If deep merge and property is an object, merge properties
        if ( deep && Object.prototype.toString.call(obj[prop]) === '[object Object]' ) {
          extended[prop] = extend( true, extended[prop], obj[prop] );
        } else {
          extended[prop] = obj[prop];
        }
      }
    }
  };

  // Loop through each object and conduct a merge
  for ( ; i < length; i++ ) {
    var obj = arguments[i];
    merge(obj);
  }

  return extended;
};

// Check if Reduced Motion is enabled
Util.osHasReducedMotion = function() {
  if(!window.matchMedia) return false;
  var matchMediaObj = window.matchMedia('(prefers-reduced-motion: reduce)');
  if(matchMediaObj) return matchMediaObj.matches;
  return false; // return false if not supported
}; 

/* 
	Polyfills
*/
//Closest() method
if (!Element.prototype.matches) {
	Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;
}

if (!Element.prototype.closest) {
	Element.prototype.closest = function(s) {
		var el = this;
		if (!document.documentElement.contains(el)) return null;
		do {
			if (el.matches(s)) return el;
			el = el.parentElement || el.parentNode;
		} while (el !== null && el.nodeType === 1); 
		return null;
	};
}

//Custom Event() constructor
if ( typeof window.CustomEvent !== "function" ) {

  function CustomEvent ( event, params ) {
    params = params || { bubbles: false, cancelable: false, detail: undefined };
    var evt = document.createEvent( 'CustomEvent' );
    evt.initCustomEvent( event, params.bubbles, params.cancelable, params.detail );
    return evt;
   }

  CustomEvent.prototype = window.Event.prototype;

  window.CustomEvent = CustomEvent;
}

/* 
	Animation curves
*/
Math.easeInOutQuad = function (t, b, c, d) {
	t /= d/2;
	if (t < 1) return c/2*t*t + b;
	t--;
	return -c/2 * (t*(t-2) - 1) + b;
};

Math.easeInQuart = function (t, b, c, d) {
	t /= d;
	return c*t*t*t*t + b;
};

Math.easeOutQuart = function (t, b, c, d) { 
  t /= d;
	t--;
	return -c * (t*t*t*t - 1) + b;
};

Math.easeInOutQuart = function (t, b, c, d) {
	t /= d/2;
	if (t < 1) return c/2*t*t*t*t + b;
	t -= 2;
	return -c/2 * (t*t*t*t - 2) + b;
};

Math.easeOutElastic = function (t, b, c, d) {
  var s=1.70158;var p=d*0.7;var a=c;
  if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
  if (a < Math.abs(c)) { a=c; var s=p/4; }
  else var s = p/(2*Math.PI) * Math.asin (c/a);
  return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
};


/* JS Utility Classes */
(function() {
  // make focus ring visible only for keyboard navigation (i.e., tab key) 
  var focusTab = document.getElementsByClassName('js-tab-focus');
  function detectClick() {
    if(focusTab.length > 0) {
      resetFocusTabs(false);
      window.addEventListener('keydown', detectTab);
    }
    window.removeEventListener('mousedown', detectClick);
  };

  function detectTab(event) {
    if(event.keyCode !== 9) return;
    resetFocusTabs(true);
    window.removeEventListener('keydown', detectTab);
    window.addEventListener('mousedown', detectClick);
  };

  function resetFocusTabs(bool) {
    var outlineStyle = bool ? '' : 'none';
    for(var i = 0; i < focusTab.length; i++) {
      focusTab[i].style.setProperty('outline', outlineStyle);
    }
  };
  window.addEventListener('mousedown', detectClick);
}());
// File#: _1_accordion
// Usage: codyhouse.co/license
(function() {
    var Accordion = function(element) {
      this.element = element;
      this.items = Util.getChildrenByClassName(this.element, 'js-accordion__item');
      this.version = this.element.getAttribute('data-version') ? '-'+this.element.getAttribute('data-version') : '';
      this.showClass = 'accordion'+this.version+'__item--is-open';
      this.animateHeight = (this.element.getAttribute('data-animation') == 'on');
      this.multiItems = !(this.element.getAttribute('data-multi-items') == 'off'); 
      // deep linking options
      this.deepLinkOn = this.element.getAttribute('data-deep-link') == 'on';
      // init accordion
      this.initAccordion();
    };
  
    Accordion.prototype.initAccordion = function() {
      //set initial aria attributes
      for( var i = 0; i < this.items.length; i++) {
        var button = this.items[i].getElementsByTagName('button')[0],
          content = this.items[i].getElementsByClassName('js-accordion__panel')[0],
          isOpen = Util.hasClass(this.items[i], this.showClass) ? 'true' : 'false';
        Util.setAttributes(button, {'aria-expanded': isOpen, 'aria-controls': 'accordion-content-'+i, 'id': 'accordion-header-'+i});
        Util.addClass(button, 'js-accordion__trigger');
        Util.setAttributes(content, {'aria-labelledby': 'accordion-header-'+i, 'id': 'accordion-content-'+i});
      }
  
      //listen for Accordion events
      this.initAccordionEvents();
  
      // check deep linking option
      this.initDeepLink();
    };
  
    Accordion.prototype.initAccordionEvents = function() {
      var self = this;
  
      this.element.addEventListener('click', function(event) {
        var trigger = event.target.closest('.js-accordion__trigger');
        //check index to make sure the click didn't happen inside a children accordion
        if( trigger && Util.getIndexInArray(self.items, trigger.parentElement) >= 0) self.triggerAccordion(trigger);
      });
    };
  
    Accordion.prototype.triggerAccordion = function(trigger) {
      var bool = (trigger.getAttribute('aria-expanded') === 'true');
  
      this.animateAccordion(trigger, bool, false);
  
      if(!bool && this.deepLinkOn) {
        history.replaceState(null, '', '#'+trigger.getAttribute('aria-controls'));
      }
    };
  
    Accordion.prototype.animateAccordion = function(trigger, bool, deepLink) {
      var self = this;
      var item = trigger.closest('.js-accordion__item'),
        content = item.getElementsByClassName('js-accordion__panel')[0],
        ariaValue = bool ? 'false' : 'true';
  
      if(!bool) Util.addClass(item, this.showClass);
      trigger.setAttribute('aria-expanded', ariaValue);
      self.resetContentVisibility(item, content, bool);
  
      if( !this.multiItems && !bool || deepLink) this.closeSiblings(item);
    };
  
    Accordion.prototype.resetContentVisibility = function(item, content, bool) {
      Util.toggleClass(item, this.showClass, !bool);
      content.removeAttribute("style");
      if(bool && !this.multiItems) { // accordion item has been closed -> check if there's one open to move inside viewport 
        this.moveContent();
      }
    };
  
    Accordion.prototype.closeSiblings = function(item) {
      //if only one accordion can be open -> search if there's another one open
      var index = Util.getIndexInArray(this.items, item);
      for( var i = 0; i < this.items.length; i++) {
        if(Util.hasClass(this.items[i], this.showClass) && i != index) {
          this.animateAccordion(this.items[i].getElementsByClassName('js-accordion__trigger')[0], true, false);
          return false;
        }
      }
    };
  
    Accordion.prototype.moveContent = function() { // make sure title of the accordion just opened is inside the viewport
      var openAccordion = this.element.getElementsByClassName(this.showClass);
      if(openAccordion.length == 0) return;
      var boundingRect = openAccordion[0].getBoundingClientRect();
      if(boundingRect.top < 0 || boundingRect.top > window.innerHeight) {
        var windowScrollTop = window.scrollY || document.documentElement.scrollTop;
        window.scrollTo(0, boundingRect.top + windowScrollTop);
      }
    };
  
    Accordion.prototype.initDeepLink = function() {
      if(!this.deepLinkOn) return;
      var hash = window.location.hash.substr(1);
      if(!hash || hash == '') return;
      var trigger = this.element.querySelector('.js-accordion__trigger[aria-controls="'+hash+'"]');
      if(trigger && trigger.getAttribute('aria-expanded') !== 'true') {
        this.animateAccordion(trigger, false, true);
        setTimeout(function(){trigger.scrollIntoView(true);});
      }
    };
  
    window.Accordion = Accordion;
    
    //initialize the Accordion objects
    var accordions = document.getElementsByClassName('js-accordion');
    if( accordions.length > 0 ) {
      for( var i = 0; i < accordions.length; i++) {
        (function(i){new Accordion(accordions[i]);})(i);
      }
    }
  }());
// File#: _1_alert-card
// Usage: codyhouse.co/license
(function() {
    function initAlertCard(card) {
      card.addEventListener('click', function(event) {
        if(event.target.closest('.js-alert-card__close-btn')) Util.addClass(card, 'is-hidden');
      });
    };
  
    var alertCards = document.getElementsByClassName('js-alert-card');
    if(alertCards.length > 0) {
      for(var i = 0; i < alertCards.length; i++) {
        (function(i){initAlertCard(alertCards[i])})(i);
      }
    }
  }());
// File#: _1_alert
// Usage: codyhouse.co/license
(function() {
    var alertClose = document.getElementsByClassName("js-alert__close-btn");
    if (alertClose.length > 0) {
        for (var i = 0; i < alertClose.length; i++) {
            (function(i) {
                initAlertEvent(alertClose[i]);
            })(i);
        }
    }
})();

function initAlertEvent(element) {
    element.addEventListener("click", function(event) {
        event.preventDefault();
        Util.removeClass(element.closest(".js-alert"), "alert--is-visible");
    });
}

// File#: _1_anim-menu-btn
// Usage: codyhouse.co/license
(function() {
	var menuBtns = document.getElementsByClassName('js-anim-menu-btn');
	if( menuBtns.length > 0 ) {
	  for(var i = 0; i < menuBtns.length; i++) {(function(i){
		initMenuBtn(menuBtns[i]);
	  })(i);}
  
	  function initMenuBtn(btn) {
		btn.addEventListener('click', function(event){	
		  event.preventDefault();
		  var status = !Util.hasClass(btn, 'anim-menu-btn--state-b');
		  Util.toggleClass(btn, 'anim-menu-btn--state-b', status);
		  // emit custom event
		  var event = new CustomEvent('anim-menu-btn-clicked', {detail: status});
		  btn.dispatchEvent(event);
		});
	  };
	}
  }());
// File#: _1_back-to-top
// Usage: codyhouse.co/license
(function() {
    var backTop = document.getElementsByClassName('js-back-to-top')[0];
    if( backTop ) {
      var dataElement = backTop.getAttribute('data-element');
      var scrollElement = dataElement ? document.querySelector(dataElement) : window;
      var scrollDuration = parseInt(backTop.getAttribute('data-duration')) || 300, //scroll to top duration
        scrollOffset = parseInt(backTop.getAttribute('data-offset')) || 0, //show back-to-top if scrolling > scrollOffset
        scrolling = false;
      
      //detect click on back-to-top link
      backTop.addEventListener('click', function(event) {
        event.preventDefault();
        if(!window.requestAnimationFrame) {
          scrollElement.scrollTo(0, 0);
        } else {
          dataElement ? Util.scrollTo(0, scrollDuration, false, scrollElement) : Util.scrollTo(0, scrollDuration);
        } 
        //move the focus to the #top-element - don't break keyboard navigation
        Util.moveFocus(document.getElementById(backTop.getAttribute('href').replace('#', '')));
      });
      
      //listen to the window scroll and update back-to-top visibility
      checkBackToTop();
      if (scrollOffset > 0) {
        scrollElement.addEventListener("scroll", function(event) {
          if( !scrolling ) {
            scrolling = true;
            (!window.requestAnimationFrame) ? setTimeout(function(){checkBackToTop();}, 250) : window.requestAnimationFrame(checkBackToTop);
          }
        });
      }
  
      function checkBackToTop() {
        var windowTop = scrollElement.scrollTop || document.documentElement.scrollTop;
        if(!dataElement) windowTop = window.scrollY || document.documentElement.scrollTop;
        Util.toggleClass(backTop, 'back-to-top--is-visible', windowTop >= scrollOffset);
        scrolling = false;
      }
    }
  }());


// File#: _1_choice-buttons
// Usage: codyhouse.co/license
(function() {
  var ChoiceButton = function(element) {
    this.element = element;
    this.btns = this.element.getElementsByClassName('js-choice-btn');
    this.inputs = getChoiceInput(this);
    this.isRadio = this.inputs[0].type.toString() == 'radio';
    resetCheckedStatus(this); // set initial classes
    initChoiceButtonEvent(this); // add listeners
  };

  function getChoiceInput(element) { // store input elements in an object property
    var inputs = [];
    for(var i = 0; i < element.btns.length; i++) {
      inputs.push(element.btns[i].getElementsByTagName('input')[0]);
    }
    return inputs;
  };

  function initChoiceButtonEvent(choiceBtn) {
    choiceBtn.element.addEventListener('click', function(event){ // update status on click
      if(Util.getIndexInArray(choiceBtn.inputs, event.target) > -1) return; // triggered by change in input element -> will be detected by the 'change' event

      var selectedBtn = event.target.closest('.js-choice-btn');
      if(!selectedBtn) return;
      var index = Util.getIndexInArray(choiceBtn.btns, selectedBtn);
      if(choiceBtn.isRadio && choiceBtn.inputs[index].checked) { // radio input already checked
        choiceBtn.inputs[index].focus(); // move focus to input element
        return; 
      }

      choiceBtn.inputs[index].checked = !choiceBtn.inputs[index].checked;
      choiceBtn.inputs[index].dispatchEvent(new CustomEvent('change')); // trigger change event
      choiceBtn.inputs[index].focus(); // move focus to input element
    });

    for(var i = 0; i < choiceBtn.btns.length; i++) {(function(i){ // change + focus events
      choiceBtn.inputs[i].addEventListener('change', function(event){
        choiceBtn.isRadio ? resetCheckedStatus(choiceBtn) : resetSingleStatus(choiceBtn, i);
      });

      choiceBtn.inputs[i].addEventListener('focus', function(event){
        resetFocusStatus(choiceBtn, i, true);
      });

      choiceBtn.inputs[i].addEventListener('blur', function(event){
        resetFocusStatus(choiceBtn, i, false);
      });
    })(i);}
  };

  function resetCheckedStatus(choiceBtn) {
    for(var i = 0; i < choiceBtn.btns.length; i++) {
      resetSingleStatus(choiceBtn, i);
    }
  };

  function resetSingleStatus(choiceBtn, index) { // toggle .choice-btn--checked class
    Util.toggleClass(choiceBtn.btns[index], 'choice-btn--checked', choiceBtn.inputs[index].checked);
  };

  function resetFocusStatus(choiceBtn, index, bool) { // toggle .choice-btn--focus class
    Util.toggleClass(choiceBtn.btns[index], 'choice-btn--focus', bool);
  };

  //initialize the ChoiceButtons objects
  var choiceButton = document.getElementsByClassName('js-choice-btns');
  if( choiceButton.length > 0 ) {
    for( var i = 0; i < choiceButton.length; i++) {
      (function(i){new ChoiceButton(choiceButton[i]);})(i);
    }
  };
}());


// File#: _1_choice-tags
// Usage: codyhouse.co/license
(function() {
    var ChoiceTags = function(element) {
      this.element = element;
      this.labels = this.element.getElementsByClassName('js-choice-tag');
      this.inputs = getChoiceInput(this);
      this.isRadio = this.inputs[0].type.toString() == 'radio';
      this.checkedClass = 'choice-tag--checked';
      initChoiceTags(this);
      initChoiceTagEvent(this);
    }
  
    function getChoiceInput(element) {
      var inputs = [];
      for(var i = 0; i < element.labels.length; i++) {
        inputs.push(element.labels[i].getElementsByTagName('input')[0]);
      }
      return inputs;
    };
  
    function initChoiceTags(element) {
      // if tag is selected by default - add checkedClass to the label element
      for(var i = 0; i < element.inputs.length; i++) {
        Util.toggleClass(element.labels[i], element.checkedClass, element.inputs[i].checked);
      }
    };
  
    function initChoiceTagEvent(element) {
      element.element.addEventListener('change', function(event) {
        var inputIndex = Util.getIndexInArray(element.inputs, event.target);
        if(inputIndex < 0) return;
        Util.toggleClass(element.labels[inputIndex], element.checkedClass, event.target.checked);
        if(element.isRadio && event.target.checked) resetRadioTags(element, inputIndex);
      });
    };
  
    function resetRadioTags(element, index) {
      // when a radio input is checked - reset all the others
      for(var i = 0; i < element.labels.length; i++) {
        if(i != index) Util.removeClass(element.labels[i], element.checkedClass);
      }
    };
  
    //initialize the ChoiceTags objects
    var choiceTags = document.getElementsByClassName('js-choice-tags');
    if( choiceTags.length > 0 ) {
      for( var i = 0; i < choiceTags.length; i++) {
        (function(i){new ChoiceTags(choiceTags[i]);})(i);
      }
    };
  }());
// File#: _1_col-table
// Usage: codyhouse.co/license
(function() {
    var ColTable = function(element) {
      this.element = element;
      this.header = this.element.getElementsByTagName('thead')[0];
      this.body = this.element.getElementsByTagName('tbody')[0];
      this.headerRows = this.header.getElementsByTagName('th');
      this.tableRows = this.body.getElementsByTagName('tr');
      this.collapsedLayoutClass = 'cl-table--collapsed';
      this.mainColCellClass = 'cl-table__th-inner';
      initTable(this);
    };
  
    function initTable(table) {
      // create additional table content + set table roles
      addTableContent(table);
      setTableRoles(table);
  
      // custom event emitted when window is resized
      table.element.addEventListener('update-col-table', function(event){
        checkTableLayour(table);
      });
  
      // mobile version - listent to click/key enter on the row -> expand it
      table.element.addEventListener('click', function(event){
        revealColDetails(table, event);
      });
      table.element.addEventListener('keydown', function(event){
        if(event.keyCode && event.keyCode == 13 || event.key && event.key.toLowerCase() == 'enter') {
          revealColDetails(table, event);
        }
      });
    };
  
    function checkTableLayour(table) {
      var layout = getComputedStyle(table.element, ':before').getPropertyValue('content').replace(/\'|"/g, '');
      Util.toggleClass(table.element, table.collapsedLayoutClass, layout != 'expanded');
    };
  
    function addTableContent(table) {
      // for the collapsed version, add a ul with list of details for each table column heading
      var content = [];
      for(var i = 0; i < table.tableRows.length; i++) {
        var cells = table.tableRows[i].getElementsByClassName('cl-table__cell');
        for(var j = 1; j < cells.length; j++) {
          if( i == 0) content[j] = '';
          content[j] = content[j] + '<li class="cl-table__item"><span class="cl-table__label">'+cells[0].innerHTML+':</span><span>'+cells[j].innerHTML+'</span></li>';
        }
      }
      // append new content to each col th
      for(var j = 1; j < table.headerRows.length; j++) {
        var colContent = '<input type="text" class="cl-table__input" aria-hidden="true"><span class="cl-table__th-inner">'+table.headerRows[j].innerHTML+'<i class="cl-table__th-icon" aria-hidden="true"></i></span><ul class="cl-table__list" aria-hidden="true">'+content[j]+'</ul>';
        table.headerRows[j].innerHTML = colContent;
        Util.addClass(table.headerRows[j], 'js-'+table.mainColCellClass);
      }
    };
  
    function setTableRoles(table) {
      var trElements = table.header.getElementsByTagName('tr');
      for(var i=0; i < trElements.length; i++) {
        trElements[i].setAttribute('role', 'row');
      }
      var thElements = table.header.getElementsByTagName('th');
      for(var i=0; i < thElements.length; i++) {
        thElements[i].setAttribute('role', 'cell');
      }
    };
  
    function revealColDetails(table, event) {
      var col = event.target.closest('.js-'+table.mainColCellClass);
      if(!col || event.target.closest('.cl-table__list')) return;
      Util.toggleClass(col, 'cl-table__cell--show-list', !Util.hasClass(col, 'cl-table__cell--show-list'));
    };
  
    //initialize the ColTable objects
    var colTables = document.getElementsByClassName('js-cl-table');
    if( colTables.length > 0 ) {
      var j = 0,
      colTablesArray = [];
      for( var i = 0; i < colTables.length; i++) {
        var beforeContent = getComputedStyle(colTables[i], ':before').getPropertyValue('content');
        if(beforeContent && beforeContent !='' && beforeContent !='none') {
          (function(i){colTablesArray.push(new ColTable(colTables[i]));})(i);
          j = j + 1;
        }
      }
      
      if(j > 0) {
        var resizingId = false,
          customEvent = new CustomEvent('update-col-table');
        window.addEventListener('resize', function(event){
          clearTimeout(resizingId);
          resizingId = setTimeout(doneResizing, 300);
        });
  
        function doneResizing() {
          for( var i = 0; i < colTablesArray.length; i++) {
            (function(i){colTablesArray[i].element.dispatchEvent(customEvent)})(i);
          };
        };
  
        (window.requestAnimationFrame) // init table layout
          ? window.requestAnimationFrame(doneResizing)
          : doneResizing();
      }
    }
  }());
// File#: _1_custom-select
// Usage: codyhouse.co/license
(function() {
    // NOTE: you need the js code only when using the --custom-dropdown variation of the Custom Select component. Default version does nor require JS.
    
    var CustomSelect = function(element) {
      this.element = element;
      this.select = this.element.getElementsByTagName('select')[0];
      this.optGroups = this.select.getElementsByTagName('optgroup');
      this.options = this.select.getElementsByTagName('option');
      this.selectedOption = getSelectedOptionText(this);
      this.selectId = this.select.getAttribute('id');
      this.trigger = false;
      this.dropdown = false;
      this.customOptions = false;
      this.arrowIcon = this.element.getElementsByTagName('svg');
      this.label = document.querySelector('[for="'+this.selectId+'"]');
  
      this.optionIndex = 0; // used while building the custom dropdown
  
      initCustomSelect(this); // init markup
      initCustomSelectEvents(this); // init event listeners
    };
    
    function initCustomSelect(select) {
      // create the HTML for the custom dropdown element
      select.element.insertAdjacentHTML('beforeend', initButtonSelect(select) + initListSelect(select));
      
      // save custom elements
      select.dropdown = select.element.getElementsByClassName('js-select__dropdown')[0];
      select.trigger = select.element.getElementsByClassName('js-select__button')[0];
      select.customOptions = select.dropdown.getElementsByClassName('js-select__item');
      
      // hide default select
      Util.addClass(select.select, 'is-hidden');
      if(select.arrowIcon.length > 0 ) select.arrowIcon[0].style.display = 'none';
  
      // place dropdown
      placeDropdown(select);
    };
  
    function initCustomSelectEvents(select) {
      // option selection in dropdown
      initSelection(select);
  
      // click events
      select.trigger.addEventListener('click', function(){
        toggleCustomSelect(select, false);
      });
      if(select.label) {
        // move focus to custom trigger when clicking on <select> label
        select.label.addEventListener('click', function(){
          Util.moveFocus(select.trigger);
        });
      }
      // keyboard navigation
      select.dropdown.addEventListener('keydown', function(event){
        if(event.keyCode && event.keyCode == 38 || event.key && event.key.toLowerCase() == 'arrowup') {
          keyboardCustomSelect(select, 'prev', event);
        } else if(event.keyCode && event.keyCode == 40 || event.key && event.key.toLowerCase() == 'arrowdown') {
          keyboardCustomSelect(select, 'next', event);
        }
      });
      // native <select> element has been updated -> update custom select as well
      select.element.addEventListener('select-updated', function(event){
        resetCustomSelect(select);
      });
    };
  
    function toggleCustomSelect(select, bool) {
      var ariaExpanded;
      if(bool) {
        ariaExpanded = bool;
      } else {
        ariaExpanded = select.trigger.getAttribute('aria-expanded') == 'true' ? 'false' : 'true';
      }
      select.trigger.setAttribute('aria-expanded', ariaExpanded);
      if(ariaExpanded == 'true') {
        var selectedOption = getSelectedOption(select);
        Util.moveFocus(selectedOption); // fallback if transition is not supported
        select.dropdown.addEventListener('transitionend', function cb(){
          Util.moveFocus(selectedOption);
          select.dropdown.removeEventListener('transitionend', cb);
        });
        placeDropdown(select); // place dropdown based on available space
      }
    };
  
    function placeDropdown(select) {
      // remove placement classes to reset position
      Util.removeClass(select.dropdown, 'select__dropdown--right select__dropdown--up');
      var triggerBoundingRect = select.trigger.getBoundingClientRect();
      Util.toggleClass(select.dropdown, 'select__dropdown--right', (document.documentElement.clientWidth - 5 < triggerBoundingRect.left + select.dropdown.offsetWidth));
      // check if there's enough space up or down
      var moveUp = (window.innerHeight - triggerBoundingRect.bottom - 5) < triggerBoundingRect.top;
      Util.toggleClass(select.dropdown, 'select__dropdown--up', moveUp);
      // check if we need to set a max width
      var maxHeight = moveUp ? triggerBoundingRect.top - 20 : window.innerHeight - triggerBoundingRect.bottom - 20;
      // set max-height based on available space
      select.dropdown.setAttribute('style', 'max-height: '+maxHeight+'px; width: '+triggerBoundingRect.width+'px;');
    };
  
    function keyboardCustomSelect(select, direction, event) { // navigate custom dropdown with keyboard
      event.preventDefault();
      var index = Util.getIndexInArray(select.customOptions, document.activeElement);
      index = (direction == 'next') ? index + 1 : index - 1;
      if(index < 0) index = select.customOptions.length - 1;
      if(index >= select.customOptions.length) index = 0;
      Util.moveFocus(select.customOptions[index]);
    };
  
    function initSelection(select) { // option selection
      select.dropdown.addEventListener('click', function(event){
        var option = event.target.closest('.js-select__item');
        if(!option) return;
        selectOption(select, option);
      });
    };
    
    function selectOption(select, option) {
      if(option.hasAttribute('aria-selected') && option.getAttribute('aria-selected') == 'true') {
        // selecting the same option
        select.trigger.setAttribute('aria-expanded', 'false'); // hide dropdown
      } else { 
        var selectedOption = select.dropdown.querySelector('[aria-selected="true"]');
        if(selectedOption) selectedOption.setAttribute('aria-selected', 'false');
        option.setAttribute('aria-selected', 'true');
        var option_label = option.querySelector('.select__text');
        select.trigger.getElementsByClassName('js-select__label')[0].textContent = option_label.textContent;
        select.trigger.setAttribute('aria-expanded', 'false');
        // new option has been selected -> update native <select> element _ arai-label of trigger <button>
        updateNativeSelect(select, option.getAttribute('data-index'));
        updateTriggerAria(select); 
      }
      // move focus back to trigger
      select.trigger.focus();
    };
  
    function updateNativeSelect(select, index) {
      select.select.selectedIndex = index;
      select.select.dispatchEvent(new CustomEvent('change', {bubbles: true})); // trigger change event
    };
  
    function updateTriggerAria(select) {
      if (select.options.length > 0)
        select.trigger.setAttribute('aria-label', select.options[select.select.selectedIndex].innerHTML+', '+select.label.textContent);
    };
  
    function getSelectedOptionText(select) {// used to initialize the label of the custom select button
      var label = '';
      if (select.options.length > 0) {
        if('selectedIndex' in select.select) {
          label = select.options[select.select.selectedIndex].text;
        } else {
          label = select.select.querySelector('option[selected]').text;
        }
      }

      return label;
    };
    
    function initButtonSelect(select) { // create the button element -> custom select trigger
      // check if we need to add custom classes to the button trigger
      var customClasses = select.element.getAttribute('data-trigger-class') ? ' '+select.element.getAttribute('data-trigger-class') : '';

      var label = "";
      if (select.options.length > 0)
        label = select.options[select.select.selectedIndex].innerHTML+', '+select.label.textContent;
    
      var button = '<button type="button" class="js-select__button select__button'+customClasses+'" aria-label="'+label+'" aria-expanded="false" aria-controls="'+select.selectId+'-dropdown"><span aria-hidden="true" class="js-select__label select__label">'+select.selectedOption+'</span>';
      if(select.arrowIcon.length > 0 && select.arrowIcon[0].outerHTML) {
        var clone = select.arrowIcon[0].cloneNode(true);
        Util.removeClass(clone, 'select__icon');
        button = button +clone.outerHTML;
      }
      
      return button+'</button>';
  
    };
  
    function initListSelect(select) { // create custom select dropdown
      var list = '<div class="js-select__dropdown select__dropdown" aria-describedby="'+select.selectId+'-description" id="'+select.selectId+'-dropdown">';
      list = list + getSelectLabelSR(select);
      if(select.optGroups.length > 0) {
        for(var i = 0; i < select.optGroups.length; i++) {
          var optGroupList = select.optGroups[i].getElementsByTagName('option'),
            optGroupLabel = '<li><span class="select__item select__item--optgroup">'+select.optGroups[i].getAttribute('label')+'</span></li>';
          list = list + '<ul class="select__list" role="listbox">'+optGroupLabel+getOptionsList(select, optGroupList) + '</ul>';
        }
      } else {
        list = list + '<ul class="select__list" role="listbox">'+getOptionsList(select, select.options) + '</ul>';
      }
      return list;
    };
  
    function getSelectLabelSR(select) {
      if(select.label) {
        return '<p class="sr-only" id="'+select.selectId+'-description">'+select.label.textContent+'</p>'
      } else {
        return '';
      }
    };
    
    function resetCustomSelect(select) {
      // <select> element has been updated (using an external control) - update custom select
      var selectedOption = select.dropdown.querySelector('[aria-selected="true"]');
      if(selectedOption) selectedOption.setAttribute('aria-selected', 'false');
      var option = select.dropdown.querySelector('.js-select__item[data-index="'+select.select.selectedIndex+'"]');
      option.setAttribute('aria-selected', 'true');
      select.trigger.getElementsByClassName('js-select__label')[0].textContent = option.textContent;
      select.trigger.setAttribute('aria-expanded', 'false');
      updateTriggerAria(select); 
    };
  
    function getOptionsList(select, options) {
      var list = '';
      for(var i = 0; i < options.length; i++) {
        var selected = options[i].hasAttribute('selected') ? ' aria-selected="true"' : ' aria-selected="false"';
        var badge = '';
        if (options[i].hasAttribute('data-count')) {
          badge = '<span class="sidenav__counter">' + options[i].getAttribute('data-count') + '</span>';
        }
        list = list + '<li><button type="button" class="reset js-select__item select__item select__item--option" role="option" data-value="'+options[i].value+'" '+selected+' data-index="'+select.optionIndex+'"><span class="select__text">'+options[i].text+'</span>'+badge+'</button></li>';
        select.optionIndex = select.optionIndex + 1;
      };
      return list;
    };
  
    function getSelectedOption(select) {
      var option = select.dropdown.querySelector('[aria-selected="true"]');
      if(option) return option;
      else return select.dropdown.getElementsByClassName('js-select__item')[0];
    };
  
    function moveFocusToSelectTrigger(select) {
      if(!document.activeElement.closest('.js-select')) return
      select.trigger.focus();
    };
    
    function checkCustomSelectClick(select, target) { // close select when clicking outside it
      if( !select.element.contains(target) ) toggleCustomSelect(select, 'false');
    };
    
    //initialize the CustomSelect objects
    var customSelect = document.getElementsByClassName('js-select');
    if( customSelect.length > 0 ) {
      var selectArray = [];
      for( var i = 0; i < customSelect.length; i++) {
        (function(i){selectArray.push(new CustomSelect(customSelect[i]));})(i);
      }
  
      // listen for key events
      window.addEventListener('keyup', function(event){
        if( event.keyCode && event.keyCode == 27 || event.key && event.key.toLowerCase() == 'escape' ) {
          // close custom select on 'Esc'
          selectArray.forEach(function(element){
            moveFocusToSelectTrigger(element); // if focus is within dropdown, move it to dropdown trigger
            toggleCustomSelect(element, 'false'); // close dropdown
          });
        } 
      });
      // close custom select when clicking outside it
      window.addEventListener('click', function(event){
        selectArray.forEach(function(element){
          checkCustomSelectClick(element, event.target);
        });
      });
    }
  }());
// File#: _1_date-picker
// Usage: codyhouse.co/license
(function() {
    var DatePicker = function(opts) {
      this.options = Util.extend(DatePicker.defaults , opts);
      this.element = this.options.element;
      this.input = this.element.getElementsByClassName('js-date-input__text')[0];
      this.trigger = this.element.getElementsByClassName('js-date-input__trigger')[0];
      this.triggerLabel = this.trigger.getAttribute('aria-label');
      this.datePicker = this.element.getElementsByClassName('js-date-picker')[0];
      this.body = this.datePicker.getElementsByClassName('js-date-picker__dates')[0];
      this.navigation = this.datePicker.getElementsByClassName('js-date-picker__month-nav')[0];
      this.heading = this.datePicker.getElementsByClassName('js-date-picker__month-label')[0];
      this.pickerVisible = false;
      // date format
      this.dateIndexes = getDateIndexes(this); // store indexes of date parts (d, m, y)
      // set initial date
      resetCalendar(this);
      // selected date
      this.dateSelected = false;
      this.selectedDay = false;
      this.selectedMonth = false;
      this.selectedYear = false;
      // focus trap
      this.firstFocusable = false;
      this.lastFocusable = false;
      // date value - for custom control variation
      this.dateValueEl = this.element.getElementsByClassName('js-date-input__value');
      if(this.dateValueEl.length > 0) {
        this.dateValueLabelInit = this.dateValueEl[0].textContent; // initial input value
      }
      initCalendarAria(this);
      initCalendarEvents(this);
      // place picker according to available space
      placeCalendar(this);
    };
  
    DatePicker.prototype.showCalendar = function() {
      showCalendar(this);
    };
  
    DatePicker.prototype.showNextMonth = function() {
      showNext(this, true);
    };
  
    DatePicker.prototype.showPrevMonth = function() {
      showPrev(this, true);
    };
  
    function initCalendarAria(datePicker) {
      // reset calendar button label
      resetLabelCalendarTrigger(datePicker);
      if(datePicker.dateValueEl.length > 0) {
        resetCalendar(datePicker);
        resetLabelCalendarValue(datePicker);
      }
      // create a live region used to announce new month selection to SR
      var srLiveReagion = document.createElement('div');
      srLiveReagion.setAttribute('aria-live', 'polite');
      Util.addClass(srLiveReagion, 'sr-only js-date-input__sr-live');
      datePicker.element.appendChild(srLiveReagion);
      datePicker.srLiveReagion = datePicker.element.getElementsByClassName('js-date-input__sr-live')[0];
    };
  
    function initCalendarEvents(datePicker) {
      datePicker.input.addEventListener('focus', function(event){
        toggleCalendar(datePicker, true); // toggle calendar when focus is on input
      });
      if(datePicker.trigger) {
        datePicker.trigger.addEventListener('click', function(event){ // open calendar when clicking on calendar button
          event.preventDefault();
          datePicker.pickerVisible = false;
          toggleCalendar(datePicker);
          datePicker.trigger.setAttribute('aria-expanded', 'true');
        });
      }
  
      // select a date inside the date picker
      datePicker.body.addEventListener('click', function(event){
        event.preventDefault();
        var day = event.target.closest('button');
        if(day) {
          datePicker.dateSelected = true;
          datePicker.selectedDay = day.innerText;
          datePicker.selectedMonth = datePicker.currentMonth;
          datePicker.selectedYear = datePicker.currentYear;
          setInputValue(datePicker);
          datePicker.input.focus(); // focus on the input element and close picker
          resetLabelCalendarTrigger(datePicker);
          resetLabelCalendarValue(datePicker);
        }
      });
  
      // navigate using month nav
      datePicker.navigation.addEventListener('click', function(event){
        event.preventDefault();
        var btn = event.target.closest('.js-date-picker__month-nav-btn');
        if(btn) {
          Util.hasClass(btn, 'js-date-picker__month-nav-btn--prev') ? showPrev(datePicker, true) : showNext(datePicker, true);
        }
      });
  
      // hide calendar
      window.addEventListener('keydown', function(event){ // close calendar on esc
        if(event.keyCode && event.keyCode == 27 || event.key && event.key.toLowerCase() == 'escape') {
          if(document.activeElement.closest('.js-date-picker')) {
            datePicker.input.focus(); //if focus is inside the calendar -> move the focus to the input element 
          } else { // do not move focus -> only close calendar
            hideCalendar(datePicker); 
          }
        }
      });
      window.addEventListener('click', function(event){
        if(!event.target.closest('.js-date-picker') && !event.target.closest('.js-date-input') && datePicker.pickerVisible) {
          hideCalendar(datePicker);
        }
      });
  
      // navigate through days of calendar
      datePicker.body.addEventListener('keydown', function(event){
        var day = datePicker.currentDay;
        if(event.keyCode && event.keyCode == 40 || event.key && event.key.toLowerCase() == 'arrowdown') {
          day = day + 7;
          resetDayValue(day, datePicker);
        } else if(event.keyCode && event.keyCode == 39 || event.key && event.key.toLowerCase() == 'arrowright') {
          day = day + 1;
          resetDayValue(day, datePicker);
        } else if(event.keyCode && event.keyCode == 37 || event.key && event.key.toLowerCase() == 'arrowleft') {
          day = day - 1;
          resetDayValue(day, datePicker);
        } else if(event.keyCode && event.keyCode == 38 || event.key && event.key.toLowerCase() == 'arrowup') {
          day = day - 7;
          resetDayValue(day, datePicker);
        } else if(event.keyCode && event.keyCode == 35 || event.key && event.key.toLowerCase() == 'end') { // move focus to last day of week
          event.preventDefault();
          day = day + 6 - getDayOfWeek(datePicker.currentYear, datePicker.currentMonth, day);
          resetDayValue(day, datePicker);
        } else if(event.keyCode && event.keyCode == 36 || event.key && event.key.toLowerCase() == 'home') { // move focus to first day of week
          event.preventDefault();
          day = day - getDayOfWeek(datePicker.currentYear, datePicker.currentMonth, day);
          resetDayValue(day, datePicker);
        } else if(event.keyCode && event.keyCode == 34 || event.key && event.key.toLowerCase() == 'pagedown') {
          event.preventDefault();
          showNext(datePicker); // show next month
        } else if(event.keyCode && event.keyCode == 33 || event.key && event.key.toLowerCase() == 'pageup') {
          event.preventDefault();
          showPrev(datePicker); // show prev month
        }
      });
  
      // trap focus inside calendar
      datePicker.datePicker.addEventListener('keydown', function(event){
        if( event.keyCode && event.keyCode == 9 || event.key && event.key == 'Tab' ) {
          //trap focus inside modal
          trapFocus(event, datePicker);
        }
      });
  
      datePicker.input.addEventListener('keydown', function(event){
        if(event.keyCode && event.keyCode == 13 || event.key && event.key.toLowerCase() == 'enter') {
          // update calendar on input enter
          resetCalendar(datePicker);
          resetLabelCalendarTrigger(datePicker);
          resetLabelCalendarValue(datePicker);
          hideCalendar(datePicker);
        } else if(event.keyCode && event.keyCode == 40 || event.key && event.key.toLowerCase() == 'arrowdown' && datePicker.pickerVisible) { // move focus to calendar using arrow down
          datePicker.body.querySelector('button[tabindex="0"]').focus();
        };
      });
    };
  
    function getCurrentDay(date) {
      return (date) 
        ? getDayFromDate(date)
        : new Date().getDate();
    };
  
    function getCurrentMonth(date) {
      return (date) 
        ? getMonthFromDate(date)
        : new Date().getMonth();
    };
  
    function getCurrentYear(date) {
      return (date) 
        ? getYearFromDate(date)
        : new Date().getFullYear();
    };
  
    function getDayFromDate(date) {
      var day = parseInt(date.split('-')[2]);
      return isNaN(day) ? getCurrentDay(false) : day;
    };
  
    function getMonthFromDate(date) {
      var month = parseInt(date.split('-')[1]) - 1;
      return isNaN(month) ? getCurrentMonth(false) : month;
    };
  
    function getYearFromDate(date) {
      var year = parseInt(date.split('-')[0]);
      return isNaN(year) ? getCurrentYear(false) : year;
    };
  
    function showNext(datePicker, bool) {
      // show next month
      datePicker.currentYear = (datePicker.currentMonth === 11) ? datePicker.currentYear + 1 : datePicker.currentYear;
      datePicker.currentMonth = (datePicker.currentMonth + 1) % 12;
      datePicker.currentDay = checkDayInMonth(datePicker);
      showCalendar(datePicker, bool);
      datePicker.srLiveReagion.textContent = datePicker.options.months[datePicker.currentMonth] + ' ' + datePicker.currentYear;
    };
  
    function showPrev(datePicker, bool) {
      // show prev month
      datePicker.currentYear = (datePicker.currentMonth === 0) ? datePicker.currentYear - 1 : datePicker.currentYear;
      datePicker.currentMonth = (datePicker.currentMonth === 0) ? 11 : datePicker.currentMonth - 1;
      datePicker.currentDay = checkDayInMonth(datePicker);
      showCalendar(datePicker, bool);
      datePicker.srLiveReagion.textContent = datePicker.options.months[datePicker.currentMonth] + ' ' + datePicker.currentYear;
    };
  
    function checkDayInMonth(datePicker) {
      return (datePicker.currentDay > daysInMonth(datePicker.currentYear, datePicker.currentMonth)) ? 1 : datePicker.currentDay;
    };
  
    function daysInMonth(year, month) {
      return 32 - new Date(year, month, 32).getDate();
    };
  
    function resetCalendar(datePicker) {
      var currentDate = false,
        selectedDate = datePicker.input.value;
  
      datePicker.dateSelected = false;
      if( selectedDate != '') {
        var date = getDateFromInput(datePicker);
        datePicker.dateSelected = true;
        currentDate = date;
      } 
      datePicker.currentDay = getCurrentDay(currentDate);
      datePicker.currentMonth = getCurrentMonth(currentDate); 
      datePicker.currentYear = getCurrentYear(currentDate); 
      
      datePicker.selectedDay = datePicker.dateSelected ? datePicker.currentDay : false;
      datePicker.selectedMonth = datePicker.dateSelected ? datePicker.currentMonth : false;
      datePicker.selectedYear = datePicker.dateSelected ? datePicker.currentYear : false;
    };
  
    function showCalendar(datePicker, bool) {
      // show calendar element
      var firstDay = getDayOfWeek(datePicker.currentYear, datePicker.currentMonth, '01');
      datePicker.body.innerHTML = '';
      datePicker.heading.innerHTML = datePicker.options.months[datePicker.currentMonth] + ' ' + datePicker.currentYear;
  
      // creating all cells
      var date = 1,
        calendar = '';
      for (var i = 0; i < 6; i++) {
        for (var j = 0; j < 7; j++) {
          if (i === 0 && j < firstDay) {
            calendar = calendar + '<li></li>';
          } else if (date > daysInMonth(datePicker.currentYear, datePicker.currentMonth)) {
            break;
          } else {
            var classListDate = '',
              tabindexValue = '-1';
            if (date === datePicker.currentDay) {
              tabindexValue = '0';
            } 
            if(!datePicker.dateSelected && getCurrentMonth() == datePicker.currentMonth && getCurrentYear() == datePicker.currentYear && date == getCurrentDay()){
              classListDate = classListDate+' date-picker__date--today'
            }
            if (datePicker.dateSelected && date === datePicker.selectedDay && datePicker.currentYear === datePicker.selectedYear && datePicker.currentMonth === datePicker.selectedMonth) {
              classListDate = classListDate+'  date-picker__date--selected';
            }
            calendar = calendar + '<li><button class="date-picker__date'+classListDate+'" tabindex="'+tabindexValue+'" type="button">'+date+'</button></li>';
            date++;
          }
        }
      }
      datePicker.body.innerHTML = calendar; // appending days into calendar body
      
      // show calendar
      if(!datePicker.pickerVisible) Util.addClass(datePicker.datePicker, 'date-picker--is-visible');
      datePicker.pickerVisible = true;
  
      //  if bool is false, move focus to calendar day
      if(!bool) datePicker.body.querySelector('button[tabindex="0"]').focus();
  
      // store first/last focusable elements
      getFocusableElements(datePicker);
  
      //place calendar
      placeCalendar(datePicker);
    };
  
    function hideCalendar(datePicker) {
      Util.removeClass(datePicker.datePicker, 'date-picker--is-visible');
      datePicker.pickerVisible = false;
  
      // reset first/last focusable
      datePicker.firstFocusable = false;
      datePicker.lastFocusable = false;
  
      // reset trigger aria-expanded attribute
      if(datePicker.trigger) datePicker.trigger.setAttribute('aria-expanded', 'false');
    };
  
    function toggleCalendar(datePicker, bool) {
      if(!datePicker.pickerVisible) {
        resetCalendar(datePicker);
        showCalendar(datePicker, bool);
      } else {
        hideCalendar(datePicker);
      }
    };
  
    function getDayOfWeek(year, month, day) {
      var weekDay = (new Date(year, month, day)).getDay() - 1;
      if(weekDay < 0) weekDay = 6;
      return weekDay;
    };
  
    function getDateIndexes(datePicker) {
      var dateFormat = datePicker.options.dateFormat.toLowerCase().replace(/-/g, '');
      return [dateFormat.indexOf('d'), dateFormat.indexOf('m'), dateFormat.indexOf('y')];
    };
  
    function setInputValue(datePicker) {
      datePicker.input.value = getDateForInput(datePicker);
    };
  
    function getDateForInput(datePicker) {
      var dateArray = [];
      dateArray[datePicker.dateIndexes[0]] = getReadableDate(datePicker.selectedDay);
      dateArray[datePicker.dateIndexes[1]] = getReadableDate(datePicker.selectedMonth+1);
      dateArray[datePicker.dateIndexes[2]] = datePicker.selectedYear;
      return dateArray[0]+datePicker.options.dateSeparator+dateArray[1]+datePicker.options.dateSeparator+dateArray[2];
    };
  
    function getDateFromInput(datePicker) {
      var dateArray = datePicker.input.value.split(datePicker.options.dateSeparator);
      return dateArray[datePicker.dateIndexes[2]]+'-'+dateArray[datePicker.dateIndexes[1]]+'-'+dateArray[datePicker.dateIndexes[0]];
    };
  
    function getReadableDate(date) {
      return (date < 10) ? '0'+date : date;
    };
  
    function resetDayValue(day, datePicker) {
      var totDays = daysInMonth(datePicker.currentYear, datePicker.currentMonth);
      if( day > totDays) {
        datePicker.currentDay = day - totDays;
        showNext(datePicker, false);
      } else if(day < 1) {
        var newMonth = datePicker.currentMonth == 0 ? 11 : datePicker.currentMonth - 1;
        datePicker.currentDay = daysInMonth(datePicker.currentYear, newMonth) + day;
        showPrev(datePicker, false);
      } else {
        datePicker.currentDay = day;
        datePicker.body.querySelector('button[tabindex="0"]').setAttribute('tabindex', '-1');
        // set new tabindex to selected item
        var buttons = datePicker.body.getElementsByTagName("button");
        for (var i = 0; i < buttons.length; i++) {
          if (buttons[i].textContent == datePicker.currentDay) {
            buttons[i].setAttribute('tabindex', '0');
            buttons[i].focus();
            break;
          }
        }
        getFocusableElements(datePicker); // update first focusable/last focusable element
      }
    };
  
    function resetLabelCalendarTrigger(datePicker) {
      if(!datePicker.trigger) return;
      // reset accessible label of the calendar trigger
      (datePicker.selectedYear && datePicker.selectedMonth && datePicker.selectedDay) 
        ? datePicker.trigger.setAttribute('aria-label', datePicker.triggerLabel+', selected date is '+ new Date(datePicker.selectedYear, datePicker.selectedMonth, datePicker.selectedDay).toDateString())
        : datePicker.trigger.setAttribute('aria-label', datePicker.triggerLabel);
    };
  
    function resetLabelCalendarValue(datePicker) {
      // this is used for the --custom-control variation -> there's a label that should be updated with the selected date
      if(datePicker.dateValueEl.length < 1) return;
      (datePicker.selectedYear && datePicker.selectedMonth && datePicker.selectedDay) 
        ? datePicker.dateValueEl[0].textContent = getDateForInput(datePicker)
        : datePicker.dateValueEl[0].textContent = datePicker.dateValueLabelInit;
    };
  
    function getFocusableElements(datePicker) {
      var allFocusable = datePicker.datePicker.querySelectorAll('[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex]:not([tabindex="-1"]), [contenteditable], audio[controls], video[controls], summary');
      getFirstFocusable(allFocusable, datePicker);
      getLastFocusable(allFocusable, datePicker);
    }
  
    function getFirstFocusable(elements, datePicker) {
      for(var i = 0; i < elements.length; i++) {
        if( (elements[i].offsetWidth || elements[i].offsetHeight || elements[i].getClientRects().length) &&  elements[i].getAttribute('tabindex') != '-1') {
          datePicker.firstFocusable = elements[i];
          return true;
        }
      }
    };
  
    function getLastFocusable(elements, datePicker) {
      //get last visible focusable element inside the modal
      for(var i = elements.length - 1; i >= 0; i--) {
        if( (elements[i].offsetWidth || elements[i].offsetHeight || elements[i].getClientRects().length) &&  elements[i].getAttribute('tabindex') != '-1' ) {
          datePicker.lastFocusable = elements[i];
          return true;
        }
      }
    };
  
    function trapFocus(event, datePicker) {
      if( datePicker.firstFocusable == document.activeElement && event.shiftKey) {
        //on Shift+Tab -> focus last focusable element when focus moves out of calendar
        event.preventDefault();
        datePicker.lastFocusable.focus();
      }
      if( datePicker.lastFocusable == document.activeElement && !event.shiftKey) {
        //on Tab -> focus first focusable element when focus moves out of calendar
        event.preventDefault();
        datePicker.firstFocusable.focus();
      }
    };
  
    function placeCalendar(datePicker) {
      // reset position
      datePicker.datePicker.style.left = '0px';
      datePicker.datePicker.style.right = 'auto';
      
      //check if you need to modify the calendar postion
      var pickerBoundingRect = datePicker.datePicker.getBoundingClientRect();
  
      if(pickerBoundingRect.right > window.innerWidth) {
        datePicker.datePicker.style.left = 'auto';
        datePicker.datePicker.style.right = '0px';
      }
    };
  
    DatePicker.defaults = {
      element : '',
      months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      dateFormat: 'd-m-y',
      dateSeparator: '/'
    };
  
    window.DatePicker = DatePicker;
  
    var datePicker = document.getElementsByClassName('js-date-input'),
      flexSupported = Util.cssSupports('align-items', 'stretch');
    if( datePicker.length > 0 ) {
      for( var i = 0; i < datePicker.length; i++) {(function(i){
        if(!flexSupported) {
          Util.addClass(datePicker[i], 'date-input--hide-calendar');
          return;
        }
        var opts = {element: datePicker[i]};
        if(datePicker[i].getAttribute('data-date-format')) {
          opts.dateFormat = datePicker[i].getAttribute('data-date-format');
        }
        if(datePicker[i].getAttribute('data-date-separator')) {
          opts.dateSeparator = datePicker[i].getAttribute('data-date-separator');
        }
        if(datePicker[i].getAttribute('data-months')) {
          opts.months = datePicker[i].getAttribute('data-months').split(',').map(function(item) {return item.trim();});
        }
        new DatePicker(opts);
      })(i);}
    }
  }());
  
  
// File#: _1_diagonal-movement
// Usage: codyhouse.co/license
/*
  Modified version of the jQuery-menu-aim plugin
  https://github.com/kamens/jQuery-menu-aim
  - Replaced jQuery with Vanilla JS
  - Minor changes
*/
(function() {
  var menuAim = function(opts) {
    init(opts);
  };

  window.menuAim = menuAim;

  function init(opts) {
    var activeRow = null,
      mouseLocs = [],
      lastDelayLoc = null,
      timeoutId = null,
      options = Util.extend({
        menu: '',
        rows: false, //if false, get direct children - otherwise pass nodes list 
        submenuSelector: "*",
        submenuDirection: "right",
        tolerance: 75,  // bigger = more forgivey when entering submenu
        enter: function(){},
        exit: function(){},
        activate: function(){},
        deactivate: function(){},
        exitMenu: function(){}
      }, opts),
      menu = options.menu;

    var MOUSE_LOCS_TRACKED = 3,  // number of past mouse locations to track
      DELAY = 300;  // ms delay when user appears to be entering submenu

    /**
     * Keep track of the last few locations of the mouse.
     */
    var mousemoveDocument = function(e) {
      mouseLocs.push({x: e.pageX, y: e.pageY});

      if (mouseLocs.length > MOUSE_LOCS_TRACKED) {
        mouseLocs.shift();
      }
    };

    /**
     * Cancel possible row activations when leaving the menu entirely
     */
    var mouseleaveMenu = function() {
      if (timeoutId) {
        clearTimeout(timeoutId);
      }

      // If exitMenu is supplied and returns true, deactivate the
      // currently active row on menu exit.
      if (options.exitMenu(this)) {
        if (activeRow) {
          options.deactivate(activeRow);
        }

        activeRow = null;
      }
    };

    /**
     * Trigger a possible row activation whenever entering a new row.
     */
    var mouseenterRow = function() {
      if (timeoutId) {
        // Cancel any previous activation delays
        clearTimeout(timeoutId);
      }

      options.enter(this);
      possiblyActivate(this);
    },
    mouseleaveRow = function() {
      options.exit(this);
    };

    /*
     * Immediately activate a row if the user clicks on it.
     */
    var clickRow = function() {
      activate(this);
    };  

    /**
     * Activate a menu row.
     */
    var activate = function(row) {
      if (row == activeRow) {
        return;
      }

      if (activeRow) {
        options.deactivate(activeRow);
      }

      options.activate(row);
      activeRow = row;
    };

    /**
     * Possibly activate a menu row. If mouse movement indicates that we
     * shouldn't activate yet because user may be trying to enter
     * a submenu's content, then delay and check again later.
     */
    var possiblyActivate = function(row) {
      var delay = activationDelay();

      if (delay) {
        timeoutId = setTimeout(function() {
          possiblyActivate(row);
        }, delay);
      } else {
        activate(row);
      }
    };

    /**
     * Return the amount of time that should be used as a delay before the
     * currently hovered row is activated.
     *
     * Returns 0 if the activation should happen immediately. Otherwise,
     * returns the number of milliseconds that should be delayed before
     * checking again to see if the row should be activated.
     */
    var activationDelay = function() {
      if (!activeRow || !Util.is(activeRow, options.submenuSelector)) {
        // If there is no other submenu row already active, then
        // go ahead and activate immediately.
        return 0;
      }

      function getOffset(element) {
        var rect = element.getBoundingClientRect();
        return { top: rect.top + window.pageYOffset, left: rect.left + window.pageXOffset };
      };

      var offset = getOffset(menu),
          upperLeft = {
              x: offset.left,
              y: offset.top - options.tolerance
          },
          upperRight = {
              x: offset.left + menu.offsetWidth,
              y: upperLeft.y
          },
          lowerLeft = {
              x: offset.left,
              y: offset.top + menu.offsetHeight + options.tolerance
          },
          lowerRight = {
              x: offset.left + menu.offsetWidth,
              y: lowerLeft.y
          },
          loc = mouseLocs[mouseLocs.length - 1],
          prevLoc = mouseLocs[0];

      if (!loc) {
        return 0;
      }

      if (!prevLoc) {
        prevLoc = loc;
      }

      if (prevLoc.x < offset.left || prevLoc.x > lowerRight.x || prevLoc.y < offset.top || prevLoc.y > lowerRight.y) {
        // If the previous mouse location was outside of the entire
        // menu's bounds, immediately activate.
        return 0;
      }

      if (lastDelayLoc && loc.x == lastDelayLoc.x && loc.y == lastDelayLoc.y) {
        // If the mouse hasn't moved since the last time we checked
        // for activation status, immediately activate.
        return 0;
      }

      // Detect if the user is moving towards the currently activated
      // submenu.
      //
      // If the mouse is heading relatively clearly towards
      // the submenu's content, we should wait and give the user more
      // time before activating a new row. If the mouse is heading
      // elsewhere, we can immediately activate a new row.
      //
      // We detect this by calculating the slope formed between the
      // current mouse location and the upper/lower right points of
      // the menu. We do the same for the previous mouse location.
      // If the current mouse location's slopes are
      // increasing/decreasing appropriately compared to the
      // previous's, we know the user is moving toward the submenu.
      //
      // Note that since the y-axis increases as the cursor moves
      // down the screen, we are looking for the slope between the
      // cursor and the upper right corner to decrease over time, not
      // increase (somewhat counterintuitively).
      function slope(a, b) {
        return (b.y - a.y) / (b.x - a.x);
      };

      var decreasingCorner = upperRight,
        increasingCorner = lowerRight;

      // Our expectations for decreasing or increasing slope values
      // depends on which direction the submenu opens relative to the
      // main menu. By default, if the menu opens on the right, we
      // expect the slope between the cursor and the upper right
      // corner to decrease over time, as explained above. If the
      // submenu opens in a different direction, we change our slope
      // expectations.
      if (options.submenuDirection == "left") {
        decreasingCorner = lowerLeft;
        increasingCorner = upperLeft;
      } else if (options.submenuDirection == "below") {
        decreasingCorner = lowerRight;
        increasingCorner = lowerLeft;
      } else if (options.submenuDirection == "above") {
        decreasingCorner = upperLeft;
        increasingCorner = upperRight;
      }

      var decreasingSlope = slope(loc, decreasingCorner),
        increasingSlope = slope(loc, increasingCorner),
        prevDecreasingSlope = slope(prevLoc, decreasingCorner),
        prevIncreasingSlope = slope(prevLoc, increasingCorner);

      if (decreasingSlope < prevDecreasingSlope && increasingSlope > prevIncreasingSlope) {
        // Mouse is moving from previous location towards the
        // currently activated submenu. Delay before activating a
        // new menu row, because user may be moving into submenu.
        lastDelayLoc = loc;
        return DELAY;
      }

      lastDelayLoc = null;
      return 0;
    };

    /**
     * Hook up initial menu events
     */
    menu.addEventListener('mouseleave', mouseleaveMenu);  
    var rows = (options.rows) ? options.rows : menu.children;
    if(rows.length > 0) {
      for(var i = 0; i < rows.length; i++) {(function(i){
        rows[i].addEventListener('mouseenter', mouseenterRow);  
        rows[i].addEventListener('mouseleave', mouseleaveRow);
        rows[i].addEventListener('click', clickRow);  
      })(i);}
    }

    document.addEventListener('mousemove', function(event){
    (!window.requestAnimationFrame) ? mousemoveDocument(event) : window.requestAnimationFrame(function(){mousemoveDocument(event);});
    });
  };
}());


// File#: _1_drawer
// Usage: codyhouse.co/license
(function() {
    var Drawer = function(element) {
      this.element = element;
      this.content = document.getElementsByClassName('js-drawer__body')[0];
      this.triggers = document.querySelectorAll('[aria-controls="'+this.element.getAttribute('id')+'"]');
      this.firstFocusable = null;
      this.lastFocusable = null;
      this.selectedTrigger = null;
      this.isModal = Util.hasClass(this.element, 'js-drawer--modal');
      this.showClass = "drawer--is-visible";
      this.initDrawer();
    };
  
    Drawer.prototype.initDrawer = function() {
      var self = this;
      //open drawer when clicking on trigger buttons
      if ( this.triggers ) {
        for(var i = 0; i < this.triggers.length; i++) {
          this.triggers[i].addEventListener('click', function(event) {
            event.preventDefault();
            if(Util.hasClass(self.element, self.showClass)) {
              self.closeDrawer(event.target);
              return;
            }
            self.selectedTrigger = event.target;
            self.showDrawer();
            self.initDrawerEvents();
          });
        }
      }
  
      // if drawer is already open -> we should initialize the drawer events
      if(Util.hasClass(this.element, this.showClass)) this.initDrawerEvents();
    };
  
    Drawer.prototype.showDrawer = function() {
      var self = this;
      this.content.scrollTop = 0;
      Util.addClass(this.element, this.showClass);
      this.getFocusableElements();
      Util.moveFocus(this.element);
      // wait for the end of transitions before moving focus
      this.element.addEventListener("transitionend", function cb(event) {
        Util.moveFocus(self.element);
        self.element.removeEventListener("transitionend", cb);
      });
      this.emitDrawerEvents('drawerIsOpen', this.selectedTrigger);
    };
  
    Drawer.prototype.closeDrawer = function(target) {
      Util.removeClass(this.element, this.showClass);
      this.firstFocusable = null;
      this.lastFocusable = null;
      if(this.selectedTrigger) this.selectedTrigger.focus();
      //remove listeners
      this.cancelDrawerEvents();
      this.emitDrawerEvents('drawerIsClose', target);
    };
  
    Drawer.prototype.initDrawerEvents = function() {
      //add event listeners
      this.element.addEventListener('keydown', this);
      this.element.addEventListener('click', this);
    };
  
    Drawer.prototype.cancelDrawerEvents = function() {
      //remove event listeners
      this.element.removeEventListener('keydown', this);
      this.element.removeEventListener('click', this);
    };
  
    Drawer.prototype.handleEvent = function (event) {
      switch(event.type) {
        case 'click': {
          this.initClick(event);
        }
        case 'keydown': {
          this.initKeyDown(event);
        }
      }
    };
  
    Drawer.prototype.initKeyDown = function(event) {
      if( event.keyCode && event.keyCode == 27 || event.key && event.key == 'Escape' ) {
        //close drawer window on esc
        this.closeDrawer(false);
      } else if( this.isModal && (event.keyCode && event.keyCode == 9 || event.key && event.key == 'Tab' )) {
        //trap focus inside drawer
        this.trapFocus(event);
      }
    };
  
    Drawer.prototype.initClick = function(event) {
      //close drawer when clicking on close button or drawer bg layer 
      if( !event.target.closest('.js-drawer__close') && !Util.hasClass(event.target, 'js-drawer') ) return;
      event.preventDefault();
      this.closeDrawer(event.target);
    };
  
    Drawer.prototype.trapFocus = function(event) {
      if( this.firstFocusable == document.activeElement && event.shiftKey) {
        //on Shift+Tab -> focus last focusable element when focus moves out of drawer
        event.preventDefault();
        this.lastFocusable.focus();
      }
      if( this.lastFocusable == document.activeElement && !event.shiftKey) {
        //on Tab -> focus first focusable element when focus moves out of drawer
        event.preventDefault();
        this.firstFocusable.focus();
      }
    }
  
    Drawer.prototype.getFocusableElements = function() {
      //get all focusable elements inside the drawer
      var allFocusable = this.element.querySelectorAll('[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex]:not([tabindex="-1"]), [contenteditable], audio[controls], video[controls], summary');
      this.getFirstVisible(allFocusable);
      this.getLastVisible(allFocusable);
    };
  
    Drawer.prototype.getFirstVisible = function(elements) {
      //get first visible focusable element inside the drawer
      for(var i = 0; i < elements.length; i++) {
        if( elements[i].offsetWidth || elements[i].offsetHeight || elements[i].getClientRects().length ) {
          this.firstFocusable = elements[i];
          return true;
        }
      }
    };
  
    Drawer.prototype.getLastVisible = function(elements) {
      //get last visible focusable element inside the drawer
      for(var i = elements.length - 1; i >= 0; i--) {
        if( elements[i].offsetWidth || elements[i].offsetHeight || elements[i].getClientRects().length ) {
          this.lastFocusable = elements[i];
          return true;
        }
      }
    };
  
    Drawer.prototype.emitDrawerEvents = function(eventName, target) {
      var event = new CustomEvent(eventName, {detail: target});
      this.element.dispatchEvent(event);
    };
  
    //initialize the Drawer objects
    var drawer = document.getElementsByClassName('js-drawer');
    if( drawer.length > 0 ) {
      for( var i = 0; i < drawer.length; i++) {
        (function(i){new Drawer(drawer[i]);})(i);
      }
    }
  }());
// File#: _1_expandable-search
// Usage: codyhouse.co/license
(function() {
    var expandableSearch = document.getElementsByClassName('js-expandable-search');
    if(expandableSearch.length > 0) {
      for( var i = 0; i < expandableSearch.length; i++) {
        (function(i){ // if user types in search input, keep the input expanded when focus is lost
          expandableSearch[i].getElementsByClassName('js-expandable-search__input')[0].addEventListener('input', function(event){
            Util.toggleClass(event.target, 'expandable-search__input--has-content', event.target.value.length > 0);
          });
        })(i);
      }
    }
  }());
// File#: _1_file-upload
// Usage: codyhouse.co/license
(function() {
    var InputFile = function(element) {
      this.element = element;
      this.input = this.element.getElementsByClassName('file-upload__input')[0];
      this.label = this.element.getElementsByClassName('file-upload__label')[0];
      this.multipleUpload = this.input.hasAttribute('multiple'); // allow for multiple files selection
      
      // this is the label text element -> when user selects a file, it will be changed from the default value to the name of the file 
      this.labelText = this.element.getElementsByClassName('file-upload__text')[0];
      this.initialLabel = this.labelText.textContent;
  
      initInputFileEvents(this);
    }; 
  
    function initInputFileEvents(inputFile) {
      // make label focusable
      inputFile.label.setAttribute('tabindex', '0');
      inputFile.input.setAttribute('tabindex', '-1');
  
      // move focus from input to label -> this is triggered when a file is selected or the file picker modal is closed
      inputFile.input.addEventListener('focusin', function(event){ 
        inputFile.label.focus();
      });
  
      // press 'Enter' key on label element -> trigger file selection
      inputFile.label.addEventListener('keydown', function(event) {
        if( event.keyCode && event.keyCode == 13 || event.key && event.key.toLowerCase() == 'enter') {inputFile.input.click();}
      });
  
      // file has been selected -> update label text
      inputFile.input.addEventListener('change', function(event){ 
        updateInputLabelText(inputFile);
      });
    };
  
    function updateInputLabelText(inputFile) {
      var label = '';
      if(inputFile.input.files && inputFile.input.files.length < 1) { 
        label = inputFile.initialLabel; // no selection -> revert to initial label
      } else if(inputFile.multipleUpload && inputFile.input.files && inputFile.input.files.length > 1) {
        label = inputFile.input.files.length+ ' files'; // multiple selection -> show number of files
      } else {
        label = inputFile.input.value.split('\\').pop(); // single file selection -> show name of the file
      }
      inputFile.labelText.textContent = label;
    };
  
    //initialize the InputFile objects
    var inputFiles = document.getElementsByClassName('file-upload');
    if( inputFiles.length > 0 ) {
      for( var i = 0; i < inputFiles.length; i++) {
        (function(i){new InputFile(inputFiles[i]);})(i);
      }
    }
  }());
// File#: _1_floating-label
// Usage: codyhouse.co/license
(function() {
    var floatingLabels = document.getElementsByClassName('floating-label');
    if( floatingLabels.length > 0 ) {
      var placeholderSupported = checkPlaceholderSupport(); // check if browser supports :placeholder
      for(var i = 0; i < floatingLabels.length; i++) {
        (function(i){initFloatingLabel(floatingLabels[i])})(i);
      }
  
      function initFloatingLabel(element) {
        if(!placeholderSupported) { // :placeholder is not supported -> show label right away
          Util.addClass(element.getElementsByClassName('form-label')[0], 'form-label--floating');
          return;
        }
        var input = element.getElementsByClassName('form-control')[0];
        input.addEventListener('input', function(event){
          resetFloatingLabel(element, input);
        });
      };
  
      function resetFloatingLabel(element, input) { // show label if input is not empty
        Util.toggleClass(element.getElementsByClassName('form-label')[0], 'form-label--floating', input.value.length > 0);
      };
  
      function checkPlaceholderSupport() {
        var input = document.createElement('input');
          return ('placeholder' in input);
      };
    }
  }());
// File#: _1_infinite-scroll
// Usage: codyhouse.co/license
(function() {
    var InfiniteScroll = function(opts) {
      this.options = Util.extend(InfiniteScroll.defaults, opts);
      this.element = this.options.element;
      this.loader = document.getElementsByClassName('js-infinite-scroll__loader');
      this.loadBtn = document.getElementsByClassName('js-infinite-scroll__btn');
      this.loading = false;
      this.currentPageIndex = this.element.getAttribute('data-current-page') ? parseInt(this.element.getAttribute('data-current-page')) : 0;
      this.index = this.currentPageIndex;
      initLoad(this);
    };
  
    function initLoad(infiniteScroll) {
      setPathValues(infiniteScroll); // get dynamic content paths
  
      getTresholdPixel(infiniteScroll);
      
      if(infiniteScroll.options.container) { // get container of dynamic content
        infiniteScroll.container = infiniteScroll.element.querySelector(infiniteScroll.options.container);
      }
      
      if((!infiniteScroll.options.loadBtn || infiniteScroll.options.loadBtnDelay) && infiniteScroll.loadBtn.length > 0) { // hide load more btn
        Util.addClass(infiniteScroll.loadBtn[0], 'sr-only');
      }
  
      if(!infiniteScroll.options.loadBtn || infiniteScroll.options.loadBtnDelay) {
        if(intersectionObserverSupported) { // check element scrolling
          initObserver(infiniteScroll);
        } else {
          infiniteScroll.scrollEvent = handleEvent.bind(infiniteScroll);
          window.addEventListener('scroll', infiniteScroll.scrollEvent);
        }
      }
      
      initBtnEvents(infiniteScroll); // listen for click on load Btn
      
      if(!infiniteScroll.options.path) { // content has been loaded using a custom function
        infiniteScroll.element.addEventListener('loaded-new', function(event){
          contentWasLoaded(infiniteScroll, event.detail.path, event.detail.checkNext); // reset element
          // emit 'content-loaded' event -> this could be useful when new content needs to be initialized
        infiniteScroll.element.dispatchEvent(new CustomEvent('content-loaded', {detail: event.detail.path}));
        });
      }
    };
  
    function setPathValues(infiniteScroll) { // path can be strin or comma-separated list
      if(!infiniteScroll.options.path) return;
      var split = infiniteScroll.options.path.split(',');
      if(split.length > 1) {
        infiniteScroll.options.path = [];
        for(var i = 0; i < split.length; i++) infiniteScroll.options.path.push(split[i].trim());
      }
    };
  
    function getTresholdPixel(infiniteScroll) { // get the threshold value in pixels - will be used only if intersection observer is not supported
      infiniteScroll.thresholdPixel = infiniteScroll.options.threshold.indexOf('px') > -1 ? parseInt(infiniteScroll.options.threshold.replace('px', '')) : parseInt(window.innerHeight*parseInt(infiniteScroll.options.threshold.replace('%', ''))/100);
    };
  
    function initObserver(infiniteScroll) { // intersection observer supported
      // append an element to the bottom of the container that will be observed
      var observed = document.createElement("div");
      Util.setAttributes(observed, {'aria-hidden': 'true', 'class': 'js-infinite-scroll__observed', 'style': 'width: 100%; height: 1px; margin-top: -1px; visibility: hidden;'});
      infiniteScroll.element.appendChild(observed);
  
      infiniteScroll.observed = infiniteScroll.element.getElementsByClassName('js-infinite-scroll__observed')[0];
  
      var config = {rootMargin: '0px 0px '+infiniteScroll.options.threshold+' 0px'};
      infiniteScroll.observer = new IntersectionObserver(observerLoadContent.bind(infiniteScroll), config);
      infiniteScroll.observer.observe(infiniteScroll.observed);
    };
  
    function observerLoadContent(entry) { 
      if(this.loading) return;
      if(entry[0].intersectionRatio > 0) loadMore(this);
    };
  
    function handleEvent(event) { // handle click/scroll events
      switch(event.type) {
        case 'click': {
          initClick(this, event); // click on load more button
          break;
        }
        case 'scroll': { // triggered only if intersection onserver is not supported
          initScroll(this);
          break;
        }
      }
    };
  
    function initScroll(infiniteScroll) { // listen to scroll event (only if intersectionObserver is not supported)
      (!window.requestAnimationFrame) ? setTimeout(checkLoad.bind(infiniteScroll)) : window.requestAnimationFrame(checkLoad.bind(infiniteScroll));
    };
  
    function initBtnEvents(infiniteScroll) { // load more button events - click + focus (for keyboard accessibility)
      if(infiniteScroll.loadBtn.length == 0) return;
      infiniteScroll.clickEvent = handleEvent.bind(infiniteScroll);
      infiniteScroll.loadBtn[0].addEventListener('click', infiniteScroll.clickEvent);
      
      if(infiniteScroll.options.loadBtn && !infiniteScroll.options.loadBtnDelay) {
        Util.removeClass(infiniteScroll.loadBtn[0], 'sr-only');
        if(infiniteScroll.loader.length > 0 ) Util.addClass(infiniteScroll.loader[0], 'is-hidden');
      }
  
      // toggle class sr-only if link is in focus/loses focus
      infiniteScroll.loadBtn[0].addEventListener('focusin', function(){
        if(Util.hasClass(infiniteScroll.loadBtn[0], 'sr-only')) {
          Util.addClass(infiniteScroll.loadBtn[0], 'js-infinite-scroll__btn-focus');
          Util.removeClass(infiniteScroll.loadBtn[0], 'sr-only');
        }
      });
      infiniteScroll.loadBtn[0].addEventListener('focusout', function(){
        if(Util.hasClass(infiniteScroll.loadBtn[0], 'js-infinite-scroll__btn-focus')) {
          Util.removeClass(infiniteScroll.loadBtn[0], 'js-infinite-scroll__btn-focus');
          Util.addClass(infiniteScroll.loadBtn[0], 'sr-only');
        }
      });
    };
  
    function initClick(infiniteScroll, event) { // click on 'Load More' button
      event.preventDefault();
      Util.addClass(infiniteScroll.loadBtn[0], 'sr-only');
      loadMore(infiniteScroll);
    };
  
    function checkLoad() { // while scrolling -> check if we need to load new content (only if intersectionObserver is not supported)
      if(this.loading) return;
      if(!needLoad(this)) return;
      loadMore(this);
    };
  
    function loadMore(infiniteScroll) { // new conten needs to be loaded
      infiniteScroll.loading = true;
      if(infiniteScroll.loader.length > 0) Util.removeClass(infiniteScroll.loader[0], 'is-hidden');
      var moveFocus = false;
      if(infiniteScroll.loadBtn.length > 0 ) moveFocus = Util.hasClass(infiniteScroll.loadBtn[0], 'js-infinite-scroll__btn-focus');
      // check if need to add content or user has custom load function
      if(infiniteScroll.options.path) {
        contentBasicLoad(infiniteScroll, moveFocus); // load content
      } else {
        emitCustomEvents(infiniteScroll, 'load-new', moveFocus); // user takes care of loading content
      }
    };
  
    function contentBasicLoad(infiniteScroll, moveFocus) {
      var filePath = getFilePath(infiniteScroll);
      // load file content
      getNewContent(filePath, function(content){
        var checkNext = insertNewContent(infiniteScroll, content, moveFocus);
        contentWasLoaded(infiniteScroll, filePath, checkNextPageAvailable(infiniteScroll, checkNext));
        // emit 'content-loaded' event -> this could be useful when new content needs to be initialized
        infiniteScroll.element.dispatchEvent(new CustomEvent('content-loaded', {detail: filePath}));
      });
    };
  
    function getFilePath(infiniteScroll) { // get path of the file to load
      return (Array.isArray(infiniteScroll.options.path)) 
        ? infiniteScroll.options.path[infiniteScroll.index]
        : infiniteScroll.options.path.replace('{n}', infiniteScroll.index+1);
    };
  
    function getNewContent(path, cb) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) cb(this.responseText);
      };
      xhttp.open("GET", path, true);
      xhttp.send();
    };
  
    function insertNewContent(infiniteScroll, content, moveFocus) {
      var next = false;
      if(infiniteScroll.options.container) {
        var div = document.createElement("div");
        div.innerHTML = content;
        var wrapper = div.querySelector(infiniteScroll.options.container);
        if(wrapper) {
          content = wrapper.innerHTML;
          next = wrapper.getAttribute('data-path');
        }
      }
      var lastItem = false;
      if(moveFocus) lastItem = getLastChild(infiniteScroll);
      if(infiniteScroll.container) {
        infiniteScroll.container.insertAdjacentHTML('beforeend', content);
      } else {
        (infiniteScroll.loader.length > 0) 
          ? infiniteScroll.loader[0].insertAdjacentHTML('beforebegin', content)
          : infiniteScroll.element.insertAdjacentHTML('beforeend', content);
      }
      if(moveFocus && lastItem) Util.moveFocus(lastItem);
  
      return next;
    };
  
    function getLastChild(infiniteScroll) {
      if(infiniteScroll.container) return infiniteScroll.container.lastElementChild;
      if(infiniteScroll.loader.length > 0) return infiniteScroll.loader[0].previousElementSibling;
      return infiniteScroll.element.lastElementChild;
    };
  
    function checkNextPageAvailable(infiniteScroll, checkNext) { // check if there's still content to be loaded
      if(Array.isArray(infiniteScroll.options.path)) {
        return infiniteScroll.options.path.length > infiniteScroll.index + 1;
      }
      return checkNext;
    };
  
    function contentWasLoaded(infiniteScroll, url, checkNext) { // new content has been loaded - reset status 
      if(infiniteScroll.loader.length > 0) Util.addClass(infiniteScroll.loader[0], 'is-hidden'); // hide loader
      
      if(infiniteScroll.options.updateHistory && url) { // update browser history
        var pageArray = location.pathname.split('/'),
          actualPage = pageArray[pageArray.length - 1] ;
        if( actualPage != url && history.pushState ) window.history.replaceState({path: url},'',url);
      }
      
      if(!checkNext) { // no need to load additional pages - remove scroll listening and/or click listening
        removeScrollEvents(infiniteScroll);
        if(infiniteScroll.clickEvent) {
          infiniteScroll.loadBtn[0].removeEventListener('click', infiniteScroll.clickEvent);
          Util.addClass(infiniteScroll.loadBtn[0], 'is-hidden');
          Util.removeClass(infiniteScroll.loadBtn[0], 'sr-only');
        }
      }
      
      if(checkNext && infiniteScroll.options.loadBtn) { // check if we need to switch from scrolling to click -> add/remove proper listener
        if(!infiniteScroll.options.loadBtnDelay) {
          Util.removeClass(infiniteScroll.loadBtn[0], 'sr-only');
        } else if(infiniteScroll.index - infiniteScroll.currentPageIndex + 1 >= infiniteScroll.options.loadBtnDelay && infiniteScroll.loadBtn.length > 0) {
          removeScrollEvents(infiniteScroll);
          Util.removeClass(infiniteScroll.loadBtn[0], 'sr-only');
        }
      }
  
      if(checkNext && infiniteScroll.loadBtn.length > 0 && Util.hasClass(infiniteScroll.loadBtn[0], 'js-infinite-scroll__btn-focus')) { // keyboard accessibility
        Util.removeClass(infiniteScroll.loadBtn[0], 'sr-only');
      }
  
      infiniteScroll.index = infiniteScroll.index + 1;
      infiniteScroll.loading = false;
    };
  
    function removeScrollEvents(infiniteScroll) {
      if(infiniteScroll.scrollEvent) window.removeEventListener('scroll', infiniteScroll.scrollEvent);
      if(infiniteScroll.observer) infiniteScroll.observer.unobserve(infiniteScroll.observed);
    };
  
    function needLoad(infiniteScroll) { // intersectionObserverSupported not supported -> check if threshold has been reached
      return infiniteScroll.element.getBoundingClientRect().bottom - window.innerHeight <= infiniteScroll.thresholdPixel;
    };
  
    function emitCustomEvents(infiniteScroll, eventName, moveFocus) { // applicable when user takes care of loading new content
      var event = new CustomEvent(eventName, {detail: {index: infiniteScroll.index+1, moveFocus: moveFocus}});
      infiniteScroll.element.dispatchEvent(event);
    };
  
    InfiniteScroll.defaults = {
      element : '',
      path : false, // path of files to be loaded: set to comma-separated list or string (should include {n} to be replaced by integer index). If not set, user will take care of loading new content
      container: false, // Append new content to this element. Additionally, when loaded a new page, only content of the element will be appended
      threshold: '200px', // distance between viewport and scroll area for loading new content
      updateHistory: false, // push new url to browser history
      loadBtn: false, // use a button to load more content
      loadBtnDelay: false // set to an integer if you want the load more button to be visible only after a number of loads on scroll - loadBtn needs to be 'on'
    };
  
    window.InfiniteScroll = InfiniteScroll;
  
    //initialize the InfiniteScroll objects
    var infiniteScroll = document.getElementsByClassName('js-infinite-scroll'),
      intersectionObserverSupported = ('IntersectionObserver' in window && 'IntersectionObserverEntry' in window && 'intersectionRatio' in window.IntersectionObserverEntry.prototype);
  
    if( infiniteScroll.length > 0) {
      for( var i = 0; i < infiniteScroll.length; i++) {
        (function(i){
          var path = infiniteScroll[i].getAttribute('data-path') ? infiniteScroll[i].getAttribute('data-path') : false,
          container = infiniteScroll[i].getAttribute('data-container') ? infiniteScroll[i].getAttribute('data-container') : false,
          updateHistory = ( infiniteScroll[i].getAttribute('data-history') && infiniteScroll[i].getAttribute('data-history') == 'on') ? true : false,
          loadBtn = ( infiniteScroll[i].getAttribute('data-load-btn') && infiniteScroll[i].getAttribute('data-load-btn') == 'on') ? true : false,
          loadBtnDelay = infiniteScroll[i].getAttribute('data-load-btn-delay') ? infiniteScroll[i].getAttribute('data-load-btn-delay') : false,
          threshold = infiniteScroll[i].getAttribute('data-threshold') ? infiniteScroll[i].getAttribute('data-threshold') : '200px';
          new InfiniteScroll({element: infiniteScroll[i], path : path, container : container, updateHistory: updateHistory, loadBtn: loadBtn, loadBtnDelay: loadBtnDelay, threshold: threshold});
        })(i);
      }
    };
  }());
// File#: _1_language-picker
// Usage: codyhouse.co/license
(function() {
    var LanguagePicker = function(element) {
      this.element = element;
      this.select = this.element.getElementsByTagName('select')[0];
      this.options = this.select.getElementsByTagName('option');
      this.selectedOption = getSelectedOptionText(this);
      this.pickerId = this.select.getAttribute('id');
      this.trigger = false;
      this.dropdown = false;
      this.firstLanguage = false;
      // dropdown arrow inside the button element
      this.arrowSvgPath = '<svg viewBox="0 0 16 16"><polygon points="3,5 8,11 13,5 "></polygon></svg>';
      this.globeSvgPath = '<svg viewBox="0 0 16 16"><path d="M8,0C3.6,0,0,3.6,0,8s3.6,8,8,8s8-3.6,8-8S12.4,0,8,0z M13.9,7H12c-0.1-1.5-0.4-2.9-0.8-4.1 C12.6,3.8,13.6,5.3,13.9,7z M8,14c-0.6,0-1.8-1.9-2-5H10C9.8,12.1,8.6,14,8,14z M6,7c0.2-3.1,1.3-5,2-5s1.8,1.9,2,5H6z M4.9,2.9 C4.4,4.1,4.1,5.5,4,7H2.1C2.4,5.3,3.4,3.8,4.9,2.9z M2.1,9H4c0.1,1.5,0.4,2.9,0.8,4.1C3.4,12.2,2.4,10.7,2.1,9z M11.1,13.1 c0.5-1.2,0.7-2.6,0.8-4.1h1.9C13.6,10.7,12.6,12.2,11.1,13.1z"></path></svg>';
  
      initLanguagePicker(this);
      initLanguagePickerEvents(this);
    };
  
    function initLanguagePicker(picker) {
      // create the HTML for the custom dropdown element
      picker.element.insertAdjacentHTML('beforeend', initButtonPicker(picker) + initListPicker(picker));
      
      // save picker elements
      picker.dropdown = picker.element.getElementsByClassName('language-picker__dropdown')[0];
      picker.languages = picker.dropdown.getElementsByClassName('language-picker__item');
      picker.firstLanguage = picker.languages[0];
      picker.trigger = picker.element.getElementsByClassName('language-picker__button')[0];
    };
  
    function initLanguagePickerEvents(picker) {
      // make sure to add the icon class to the arrow dropdown inside the button element
      var svgs = picker.trigger.getElementsByTagName('svg');
      Util.addClass(svgs[0], 'icon');
      Util.addClass(svgs[1], 'icon');
      // language selection in dropdown
      // ⚠️ Important: you need to modify this function in production
      initLanguageSelection(picker);
  
      // click events
      picker.trigger.addEventListener('click', function(){
        toggleLanguagePicker(picker, false);
      });
      // keyboard navigation
      picker.dropdown.addEventListener('keydown', function(event){
        if(event.keyCode && event.keyCode == 38 || event.key && event.key.toLowerCase() == 'arrowup') {
          keyboardNavigatePicker(picker, 'prev');
        } else if(event.keyCode && event.keyCode == 40 || event.key && event.key.toLowerCase() == 'arrowdown') {
          keyboardNavigatePicker(picker, 'next');
        }
      });
    };
  
    function toggleLanguagePicker(picker, bool) {
      var ariaExpanded;
      if(bool) {
        ariaExpanded = bool;
      } else {
        ariaExpanded = picker.trigger.getAttribute('aria-expanded') == 'true' ? 'false' : 'true';
      }
      picker.trigger.setAttribute('aria-expanded', ariaExpanded);
      if(ariaExpanded == 'true') {
        picker.firstLanguage.focus(); // fallback if transition is not supported
        picker.dropdown.addEventListener('transitionend', function cb(){
          picker.firstLanguage.focus();
          picker.dropdown.removeEventListener('transitionend', cb);
        });
        // place dropdown
        placeDropdown(picker);
      }
    };
  
    function placeDropdown(picker) {
      var triggerBoundingRect = picker.trigger.getBoundingClientRect();
      Util.toggleClass(picker.dropdown, 'language-picker__dropdown--right', (window.innerWidth < triggerBoundingRect.left + picker.dropdown.offsetWidth));
      Util.toggleClass(picker.dropdown, 'language-picker__dropdown--up', (window.innerHeight < triggerBoundingRect.bottom + picker.dropdown.offsetHeight));
    };
  
    function checkLanguagePickerClick(picker, target) { // if user clicks outside the language picker -> close it
      if( !picker.element.contains(target) ) toggleLanguagePicker(picker, 'false');
    };
  
    function moveFocusToPickerTrigger(picker) {
      if(picker.trigger.getAttribute('aria-expanded') == 'false') return;
      if(document.activeElement.closest('.language-picker__dropdown') == picker.dropdown) picker.trigger.focus();
    };
  
    function initButtonPicker(picker) { // create the button element -> picker trigger
      // check if we need to add custom classes to the button trigger
      var customClasses = picker.element.getAttribute('data-trigger-class') ? ' '+picker.element.getAttribute('data-trigger-class') : '';
    
      var button = '<button class="language-picker__button'+customClasses+'" aria-label="'+picker.select.value+' '+picker.element.getElementsByTagName('label')[0].textContent+'" aria-expanded="false" aria-controls="'+picker.pickerId+'-dropdown">';
      button = button + '<span aria-hidden="true" class="language-picker__label language-picker__flag language-picker__flag--'+picker.select.value+'">'+picker.globeSvgPath+'<em>'+picker.selectedOption+'</em>';
      button = button +picker.arrowSvgPath+'</span>';
      return button+'</button>';
    };
  
    function initListPicker(picker) { // create language picker dropdown
      var list = '<div class="language-picker__dropdown" aria-describedby="'+picker.pickerId+'-description" id="'+picker.pickerId+'-dropdown">';
      list = list + '<p class="sr-only" id="'+picker.pickerId+'-description">'+picker.element.getElementsByTagName('label')[0].textContent+'</p>';
      list = list + '<ul class="language-picker__list" role="listbox">';
      for(var i = 0; i < picker.options.length; i++) {
        var selected = picker.options[i].selected ? ' aria-selected="true"' : '',
          language = picker.options[i].getAttribute('lang');
        list = list + '<li><a lang="'+language+'" hreflang="'+language+'" href="'+getLanguageUrl(picker.options[i])+'"'+selected+' role="option" data-value="'+picker.options[i].value+'" class="language-picker__item language-picker__flag language-picker__flag--'+picker.options[i].value+'"><span>'+picker.options[i].text+'</span></a></li>';
      };
      return list;
    };
  
    function getSelectedOptionText(picker) { // used to initialize the label of the picker trigger button
      var label = '';
      if('selectedIndex' in picker.select) {
        label = picker.options[picker.select.selectedIndex].text;
      } else {
        label = picker.select.querySelector('option[selected]').text;
      }
      return label;
    };
  
    function getLanguageUrl(option) {
      // ⚠️ Important: You should replace this return value with the real link to your website in the selected language
      // option.value gives you the value of the language that you can use to create your real url (e.g, 'english' or 'italiano')
      return '#';
    };
  
    function initLanguageSelection(picker) {
      picker.element.getElementsByClassName('language-picker__list')[0].addEventListener('click', function(event){
        var language = event.target.closest('.language-picker__item');
        if(!language) return;
        
        if(language.hasAttribute('aria-selected') && language.getAttribute('aria-selected') == 'true') {
          // selecting the same language
          event.preventDefault();
          picker.trigger.setAttribute('aria-expanded', 'false'); // hide dropdown
        } else { 
          // ⚠️ Important: this 'else' code needs to be removed in production. 
          // The user has to be redirected to the new url -> nothing to do here
          event.preventDefault();
          picker.element.getElementsByClassName('language-picker__list')[0].querySelector('[aria-selected="true"]').removeAttribute('aria-selected');
          language.setAttribute('aria-selected', 'true');
          picker.trigger.getElementsByClassName('language-picker__label')[0].setAttribute('class', 'language-picker__label language-picker__flag language-picker__flag--'+language.getAttribute('data-value'));
          picker.trigger.getElementsByClassName('language-picker__label')[0].getElementsByTagName('em')[0].textContent = language.textContent;
          picker.trigger.setAttribute('aria-expanded', 'false');
        }
      });
    };
  
    function keyboardNavigatePicker(picker, direction) {
      var index = Util.getIndexInArray(picker.languages, document.activeElement);
      index = (direction == 'next') ? index + 1 : index - 1;
      if(index < 0) index = picker.languages.length - 1;
      if(index >= picker.languages.length) index = 0;
      Util.moveFocus(picker.languages[index]);
    };
  
    //initialize the LanguagePicker objects
    var languagePicker = document.getElementsByClassName('js-language-picker');
    if( languagePicker.length > 0 ) {
      var pickerArray = [];
      for( var i = 0; i < languagePicker.length; i++) {
        (function(i){pickerArray.push(new LanguagePicker(languagePicker[i]));})(i);
      }
  
      // listen for key events
      window.addEventListener('keyup', function(event){
        if( event.keyCode && event.keyCode == 27 || event.key && event.key.toLowerCase() == 'escape' ) {
          // close language picker on 'Esc'
          pickerArray.forEach(function(element){
            moveFocusToPickerTrigger(element); // if focus is within dropdown, move it to dropdown trigger
            toggleLanguagePicker(element, 'false'); // close dropdown
          });
        } 
      });
      // close language picker when clicking outside it
      window.addEventListener('click', function(event){
        pickerArray.forEach(function(element){
          checkLanguagePickerClick(element, event.target);
        });
      });
    }
  }());
// File#: _1_masonry
// Usage: codyhouse.co/license

(function() {
    var Masonry = function(element) {
      this.element = element;
      this.list = this.element.getElementsByClassName('js-masonry__list')[0];
      this.items = this.element.getElementsByClassName('js-masonry__item');
      this.activeColumns = 0;
      this.colStartWidth = 0; // col min-width (defined in CSS using --masonry-col-auto-size variable)
      this.colWidth = 0; // effective column width
      this.colGap = 0;
      // store col heights and items
      this.colHeights = [];
      this.colItems = [];
      // flex full support
      this.flexSupported = checkFlexSupported(this.items[0]);
      getGridLayout(this); // get initial grid params
      setGridLayout(this); // set grid params (width of elements)
      initMasonryLayout(this); // init gallery layout
    };
  
    function checkFlexSupported(item) {
      var itemStyle = window.getComputedStyle(item);
      return itemStyle.getPropertyValue('flex-basis') != 'auto';
    };
  
    function getGridLayout(grid) { // this is used to get initial grid details (width/grid gap)
      var itemStyle = window.getComputedStyle(grid.items[0]);
      if( grid.colStartWidth == 0) {
        grid.colStartWidth = parseFloat(itemStyle.getPropertyValue('width'));
      }
      grid.colGap = parseFloat(itemStyle.getPropertyValue('margin-right'));
    };
  
    function setGridLayout(grid) { // set width of items in the grid
      var containerWidth = parseFloat(window.getComputedStyle(grid.element).getPropertyValue('width'));
      grid.activeColumns = parseInt((containerWidth + grid.colGap)/(grid.colStartWidth+grid.colGap));
      if(grid.activeColumns < 2) grid.activeColumns = 2; // Set minimum column size
      grid.colWidth = parseFloat((containerWidth - (grid.activeColumns - 1)*grid.colGap)/grid.activeColumns);
      for(var i = 0; i < grid.items.length; i++) {
        grid.items[i].style.width = grid.colWidth+'px'; // reset items width
        // Integrate with Infinite scroll (Show all elements)
        grid.items[i].style.display = 'inline-block'; // reset items width
      }
    };
  
    function initMasonryLayout(grid) {
      if(grid.flexSupported) {
        checkImgLoaded(grid); // reset layout when images are loaded
      } else {
        Util.addClass(grid.element, 'masonry--loaded'); // make sure the gallery is visible
      }
  
      grid.element.addEventListener('masonry-resize', function(){ // window has been resized -> reset masonry layout
        getGridLayout(grid);
        setGridLayout(grid);
        if(grid.flexSupported) layItems(grid); 
      });
  
      grid.element.addEventListener('masonry-reset', function(event){ // reset layout (e.g., new items added to the gallery)
        if(grid.flexSupported) checkImgLoaded(grid); 
      });
    };
  
    function layItems(grid) {
      Util.addClass(grid.element, 'masonry--loaded'); // make sure the gallery is visible
      grid.colHeights = [];
      grid.colItems = [];
  
      // grid layout has already been set -> update container height and order of items
      for(var j = 0; j < grid.activeColumns; j++) {
        grid.colHeights.push(0); // reset col heights
        grid.colItems[j] = []; // reset items order
      }
      
      for(var i = 0; i < grid.items.length; i++) {
        var minHeight = Math.min.apply( Math, grid.colHeights ),
          index = grid.colHeights.indexOf(minHeight);
        if(grid.colItems[index]) grid.colItems[index].push(i);
        grid.items[i].style.flexBasis = 0; // reset flex basis before getting height
        var itemHeight = grid.items[i].getBoundingClientRect().height || grid.items[i].offsetHeight || 1;
        grid.colHeights[index] = grid.colHeights[index] + grid.colGap + itemHeight;
      }
  
      // reset height of container
      var masonryHeight = Math.max.apply( Math, grid.colHeights ) + 5;
      grid.list.style.cssText = 'height: '+ masonryHeight + 'px;';
  
      // go through elements and set flex order
      var order = 0;
      for(var i = 0; i < grid.colItems.length; i++) {
        for(var j = 0; j < grid.colItems[i].length; j++) {
          grid.items[grid.colItems[i][j]].style.order = order;
          order = order + 1;
        }
        // change flex-basis of last element of each column, so that next element shifts to next col
        var lastItemCol = grid.items[grid.colItems[i][grid.colItems[i].length - 1]];
        if (typeof lastItemCol !== 'undefined') {
          lastItemCol.style.flexBasis = masonryHeight - grid.colHeights[i] + lastItemCol.getBoundingClientRect().height - 5 + 'px';
        }
      }
  
      // emit custom event when grid has been reset
      grid.element.dispatchEvent(new CustomEvent('masonry-laid'));
    };
  
    function checkImgLoaded(grid) {
      var imgs = grid.list.getElementsByTagName('img');
  
      function countLoaded() {
        var setTimeoutOn = false;
        for(var i = 0; i < imgs.length; i++) {
          if(!imgs[i].complete) {
            setTimeoutOn = true;
            break;
          } else if (typeof imgs[i].naturalHeight !== "undefined" && imgs[i].naturalHeight == 0) {
            setTimeoutOn = true;
            break;
          }
        }
  
        if(!setTimeoutOn) {
          layItems(grid);
        } else {
          setTimeout(function(){
            countLoaded();
          }, 100);
        }
      };
  
      if(imgs.length == 0) {
        layItems(grid); // no need to wait -> no img available
      } else {
        countLoaded();
      }
    };
  
    //initialize the Masonry objects
    var masonries = document.getElementsByClassName('js-masonry'), 
      flexSupported = Util.cssSupports('flex-basis', 'auto'),
      masonriesArray = [];
  
    if( masonries.length > 0) {
      for( var i = 0; i < masonries.length; i++) {
        var maronry_items = masonries[i].getElementsByClassName('js-masonry__item');
        if (maronry_items.length > 0) {
          if(!flexSupported) {
            Util.addClass(masonries[i], 'masonry--loaded'); // reveal gallery
          } else {
            (function(i){masonriesArray.push(new Masonry(masonries[i]));})(i); // init Masonry Layout
          }
        }
      }
  
      if(!flexSupported) return;
  
      // listen to window resize -> reorganize items in gallery
      var resizingId = false,
        customEvent = new CustomEvent('masonry-resize');
        
      window.addEventListener('resize', function() {
        clearTimeout(resizingId);
        resizingId = setTimeout(doneResizing, 500);
      });
  
      function doneResizing() {
        for( var i = 0; i < masonriesArray.length; i++) {
          (function(i){masonriesArray[i].element.dispatchEvent(customEvent)})(i);
        };
      };
    };
  }());
// File#: _1_menu
// Usage: codyhouse.co/license
(function() {
    var Menu = function(element) {
      this.element = element;
      this.elementId = this.element.getAttribute('id');
      this.menuItems = this.element.getElementsByClassName('js-menu__content');
      this.trigger = document.querySelectorAll('[aria-controls="'+this.elementId+'"]');
      this.selectedTrigger = false;
      this.menuIsOpen = false;
      this.initMenu();
      this.initMenuEvents();
    };	
  
    Menu.prototype.initMenu = function() {
      // init aria-labels
      for(var i = 0; i < this.trigger.length; i++) {
        Util.setAttributes(this.trigger[i], {'aria-expanded': 'false', 'aria-haspopup': 'true'});
      }
      // init tabindex
      for(var i = 0; i < this.menuItems.length; i++) {
        this.menuItems[i].setAttribute('tabindex', '0');
      }
    };
  
    Menu.prototype.initMenuEvents = function() {
      var self = this;
      for(var i = 0; i < this.trigger.length; i++) {(function(i){
        self.trigger[i].addEventListener('click', function(event){
          event.preventDefault();
          // if the menu had been previously opened by another trigger element -> close it first and reopen in the right position
          if(Util.hasClass(self.element, 'menu--is-visible') && self.selectedTrigger !=  self.trigger[i]) {
            self.toggleMenu(false, false); // close menu
          }
          // toggle menu
          self.selectedTrigger = self.trigger[i];
          self.toggleMenu(!Util.hasClass(self.element, 'menu--is-visible'), true);
        });
      })(i);}
      
      // keyboard events
      this.element.addEventListener('keydown', function(event) {
        // use up/down arrow to navigate list of menu items
        if( !Util.hasClass(event.target, 'js-menu__content') ) return;
        if( (event.keyCode && event.keyCode == 40) || (event.key && event.key.toLowerCase() == 'arrowdown') ) {
          self.navigateItems(event, 'next');
        } else if( (event.keyCode && event.keyCode == 38) || (event.key && event.key.toLowerCase() == 'arrowup') ) {
          self.navigateItems(event, 'prev');
        }
      });
    };
  
    Menu.prototype.toggleMenu = function(bool, moveFocus) {
      var self = this;
      // toggle menu visibility
      Util.toggleClass(this.element, 'menu--is-visible', bool);
      this.menuIsOpen = bool;
      if(bool) {
        this.selectedTrigger.setAttribute('aria-expanded', 'true');
        Util.moveFocus(this.menuItems[0]);
        this.element.addEventListener("transitionend", function(event) {Util.moveFocus(self.menuItems[0]);}, {once: true});
        // position the menu element
        this.positionMenu();
        // add class to menu trigger
        Util.addClass(this.selectedTrigger, 'menu-control--active');
      } else if(this.selectedTrigger) {
        this.selectedTrigger.setAttribute('aria-expanded', 'false');
        if(moveFocus) Util.moveFocus(this.selectedTrigger);
        // remove class from menu trigger
        Util.removeClass(this.selectedTrigger, 'menu-control--active');
        this.selectedTrigger = false;
      }
    };
  
    Menu.prototype.positionMenu = function(event, direction) {
      var selectedTriggerPosition = this.selectedTrigger.getBoundingClientRect(),
        menuOnTop = (window.innerHeight - selectedTriggerPosition.bottom) < selectedTriggerPosition.top;
        // menuOnTop = window.innerHeight < selectedTriggerPosition.bottom + this.element.offsetHeight;
        
      var left = selectedTriggerPosition.left,
        right = (window.innerWidth - selectedTriggerPosition.right),
        isRight = (window.innerWidth < selectedTriggerPosition.left + this.element.offsetWidth);
  
      var horizontal = isRight ? 'right: '+right+'px;' : 'left: '+left+'px;',
        vertical = menuOnTop
          ? 'bottom: '+(window.innerHeight - selectedTriggerPosition.top)+'px;'
          : 'top: '+selectedTriggerPosition.bottom+'px;';
      // check right position is correct -> otherwise set left to 0
      if( isRight && (right + this.element.offsetWidth) > window.innerWidth) horizontal = 'left: '+ parseInt((window.innerWidth - this.element.offsetWidth)/2)+'px;';
      var maxHeight = menuOnTop ? selectedTriggerPosition.top - 20 : window.innerHeight - selectedTriggerPosition.bottom - 20;
      this.element.setAttribute('style', horizontal + vertical +'max-height:'+Math.floor(maxHeight)+'px;');
    };
  
    Menu.prototype.navigateItems = function(event, direction) {
      event.preventDefault();
      var index = Util.getIndexInArray(this.menuItems, event.target),
        nextIndex = direction == 'next' ? index + 1 : index - 1;
      if(nextIndex < 0) nextIndex = this.menuItems.length - 1;
      if(nextIndex > this.menuItems.length - 1) nextIndex = 0;
      Util.moveFocus(this.menuItems[nextIndex]);
    };
  
    Menu.prototype.checkMenuFocus = function() {
      var menuParent = document.activeElement.closest('.js-menu');
      if (!menuParent || !this.element.contains(menuParent)) this.toggleMenu(false, false);
    };
  
    Menu.prototype.checkMenuClick = function(target) {
      if( !this.element.contains(target) && !target.closest('[aria-controls="'+this.elementId+'"]')) this.toggleMenu(false);
    };
  
    window.Menu = Menu;
  
    //initialize the Menu objects
    var menus = document.getElementsByClassName('js-menu');
    if( menus.length > 0 ) {
      var menusArray = [];
      for( var i = 0; i < menus.length; i++) {
        (function(i){menusArray.push(new Menu(menus[i]));})(i);
      }
  
      // listen for key events
      window.addEventListener('keyup', function(event){
        if( event.keyCode && event.keyCode == 9 || event.key && event.key.toLowerCase() == 'tab' ) {
          //close menu if focus is outside menu element
          menusArray.forEach(function(element){
            element.checkMenuFocus();
          });
        } else if( event.keyCode && event.keyCode == 27 || event.key && event.key.toLowerCase() == 'escape' ) {
          // close menu on 'Esc'
          menusArray.forEach(function(element){
            element.toggleMenu(false, false);
          });
        } 
      });
      // close menu when clicking outside it
      window.addEventListener('click', function(event){
        menusArray.forEach(function(element){
          element.checkMenuClick(event.target);
        });
      });
      // on resize -> close all menu elements
      window.addEventListener('resize', function(event){
        menusArray.forEach(function(element){
          element.toggleMenu(false, false);
        });
      });
      // on scroll -> close all menu elements
      window.addEventListener('scroll', function(event){
        menusArray.forEach(function(element){
          if(element.menuIsOpen) element.toggleMenu(false, false);
        });
      });
    }
  }());
// File#: _1_modal-window
// Usage: codyhouse.co/license
(function() {
    var Modal = function(element) {
        this.element = element;
        this.triggers = document.querySelectorAll(
            '[aria-controls="' + this.element.getAttribute("id") + '"]'
        );
        this.firstFocusable = null;
        this.lastFocusable = null;
        this.moveFocusEl = null; // focus will be moved to this element when modal is open
        this.modalFocus = this.element.getAttribute("data-modal-first-focus")
            ? this.element.querySelector(
                  this.element.getAttribute("data-modal-first-focus")
              )
            : null;
        this.selectedTrigger = null;
        this.showClass = "modal--is-visible";
        this.initModal();
    };

    Modal.prototype.initModal = function() {
        var self = this;
        //open modal when clicking on trigger buttons
        if (this.triggers) {
            for (var i = 0; i < this.triggers.length; i++) {
                this.triggers[i].addEventListener("click", function(event) {
                    event.preventDefault();
                    if (Util.hasClass(self.element, self.showClass)) {
                        self.closeModal();
                        return;
                    }
                    self.selectedTrigger = event.target;
                    self.showModal();
                    self.initModalEvents();
                });
            }
        }

        // listen to the openModal event -> open modal without a trigger button
        this.element.addEventListener("openModal", function(event) {
            if (event.detail) self.selectedTrigger = event.detail;
            self.showModal();
            self.initModalEvents();
        });

        // listen to the closeModal event -> close modal without a trigger button
        this.element.addEventListener("closeModal", function(event) {
            if (event.detail) self.selectedTrigger = event.detail;
            self.closeModal();
        });

        // if modal is open by default -> initialise modal events
        if (Util.hasClass(this.element, this.showClass)) this.initModalEvents();
    };

    Modal.prototype.showModal = function() {
        var self = this;
        Util.addClass(this.element, this.showClass);
        this.getFocusableElements();
        this.moveFocusEl.focus();
        // wait for the end of transitions before moving focus
        this.element.addEventListener("transitionend", function cb(event) {
            self.moveFocusEl.focus();
            self.element.removeEventListener("transitionend", cb);
        });
        this.emitModalEvents("modalIsOpen");
    };

    Modal.prototype.closeModal = function() {
        if (!Util.hasClass(this.element, this.showClass)) return;
        Util.removeClass(this.element, this.showClass);
        this.firstFocusable = null;
        this.lastFocusable = null;
        this.moveFocusEl = null;
        if (this.selectedTrigger) this.selectedTrigger.focus();
        //remove listeners
        this.cancelModalEvents();
        this.emitModalEvents("modalIsClose");
    };

    Modal.prototype.initModalEvents = function() {
        //add event listeners
        this.element.addEventListener("keydown", this);
        this.element.addEventListener("click", this);
    };

    Modal.prototype.cancelModalEvents = function() {
        //remove event listeners
        this.element.removeEventListener("keydown", this);
        this.element.removeEventListener("click", this);
    };

    Modal.prototype.handleEvent = function(event) {
        switch (event.type) {
            case "click": {
                this.initClick(event);
            }
            case "keydown": {
                this.initKeyDown(event);
            }
        }
    };

    Modal.prototype.initKeyDown = function(event) {
        if (
            (event.keyCode && event.keyCode == 9) ||
            (event.key && event.key == "Tab")
        ) {
            //trap focus inside modal
            this.trapFocus(event);
        } else if (
            ((event.keyCode && event.keyCode == 13) ||
                (event.key && event.key == "Enter")) &&
            event.target.closest(".js-modal__close")
        ) {
            event.preventDefault();
            this.closeModal(); // close modal when pressing Enter on close button
        }
    };

    Modal.prototype.initClick = function(event) {
        //close modal when clicking on close button or modal bg layer
        if (
            !event.target.closest(".js-modal__close") &&
            !Util.hasClass(event.target, "js-modal")
            // !event.target.closest(".js-modal__close")
        )
            return;

        // do not close modal when modal has custom-disable-modal-close class
        if (Util.hasClass(event.target, "custom-disable-modal-close")) {
            return;
        }

        event.preventDefault();
        this.closeModal();
    };

    Modal.prototype.trapFocus = function(event) {
        if (this.firstFocusable == document.activeElement && event.shiftKey) {
            //on Shift+Tab -> focus last focusable element when focus moves out of modal
            event.preventDefault();
            this.lastFocusable.focus();
        }
        if (this.lastFocusable == document.activeElement && !event.shiftKey) {
            //on Tab -> focus first focusable element when focus moves out of modal
            event.preventDefault();
            this.firstFocusable.focus();
        }
    };

    Modal.prototype.getFocusableElements = function() {
        //get all focusable elements inside the modal
        var allFocusable = this.element.querySelectorAll(focusableElString);
        this.getFirstVisible(allFocusable);
        this.getLastVisible(allFocusable);
        this.getFirstFocusable();
    };

    Modal.prototype.getFirstVisible = function(elements) {
        //get first visible focusable element inside the modal
        for (var i = 0; i < elements.length; i++) {
            if (isVisible(elements[i])) {
                this.firstFocusable = elements[i];
                break;
            }
        }
    };

    Modal.prototype.getLastVisible = function(elements) {
        //get last visible focusable element inside the modal
        for (var i = elements.length - 1; i >= 0; i--) {
            if (isVisible(elements[i])) {
                this.lastFocusable = elements[i];
                break;
            }
        }
    };

    Modal.prototype.getFirstFocusable = function() {
        if (!this.modalFocus || !Element.prototype.matches) {
            this.moveFocusEl = this.firstFocusable;
            return;
        }
        var containerIsFocusable = this.modalFocus.matches(focusableElString);
        if (containerIsFocusable) {
            this.moveFocusEl = this.modalFocus;
        } else {
            this.moveFocusEl = false;
            var elements = this.modalFocus.querySelectorAll(focusableElString);
            for (var i = 0; i < elements.length; i++) {
                if (isVisible(elements[i])) {
                    this.moveFocusEl = elements[i];
                    break;
                }
            }
            if (!this.moveFocusEl) this.moveFocusEl = this.firstFocusable;
        }
    };

    Modal.prototype.emitModalEvents = function(eventName) {
        var event = new CustomEvent(eventName, {
            detail: this.selectedTrigger
        });
        this.element.dispatchEvent(event);
    };

    function isVisible(element) {
        return (
            element.offsetWidth ||
            element.offsetHeight ||
            element.getClientRects().length
        );
    }

    //initialize the Modal objects
    var modals = document.getElementsByClassName("js-modal");
    // generic focusable elements string selector
    var focusableElString =
        '[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex]:not([tabindex="-1"]), [contenteditable], audio[controls], video[controls], summary';
    if (modals.length > 0) {
        var modalArrays = [];
        for (var i = 0; i < modals.length; i++) {
            (function(i) {
                modalArrays.push(new Modal(modals[i]));
            })(i);
        }

        window.addEventListener("keydown", function(event) {
            //close modal window on esc
            if (
                (event.keyCode && event.keyCode == 27) ||
                (event.key && event.key.toLowerCase() == "escape")
            ) {
                /* for( var i = 0; i < modalArrays.length; i++) {
            (function(i){modalArrays[i].closeModal();})(i);
          }; */
            }
        });
    }
})();

// File#: _1_password
// Usage: codyhouse.co/license
(function() {
    var Password = function(element) {
        this.element = element;
        this.password = this.element.getElementsByClassName(
            "js-password__input"
        )[0];
        this.visibilityBtn = this.element.getElementsByClassName(
            "js-password__btn"
        )[0];
        this.visibilityClass = "password--text-is-visible";
        this.initPassword();
    };

    Password.prototype.initPassword = function() {
        var self = this;
        //listen to the click on the password btn
        this.visibilityBtn.addEventListener("click", function(event) {
            //if password is in focus -> do nothing if user presses Enter
            if (document.activeElement === self.password) return;
            event.preventDefault();
            self.togglePasswordVisibility();
        });
    };

    Password.prototype.togglePasswordVisibility = function() {
        var makeVisible = !Util.hasClass(this.element, this.visibilityClass);
        //change element class
        Util.toggleClass(this.element, this.visibilityClass, makeVisible);
        //change input type
        makeVisible
            ? this.password.setAttribute("type", "text")
            : this.password.setAttribute("type", "password");
    };

    //initialize the Password objects
    var passwords = document.getElementsByClassName("js-password");
    if (passwords.length > 0) {
        for (var i = 0; i < passwords.length; i++) {
            (function(i) {
                new Password(passwords[i]);
            })(i);
        }
    }
})();

// File#: _1_popover
// Usage: codyhouse.co/license
(function() {
    var Popover = function(element) {
      this.element = element;
      this.elementId = this.element.getAttribute('id');
      this.trigger = document.querySelectorAll('[aria-controls="'+this.elementId+'"]');
      this.selectedTrigger = false;
      this.popoverVisibleClass = 'popover--is-visible';
      this.selectedTriggerClass = 'popover-control--active';
      this.popoverIsOpen = false;
      // focusable elements
      this.firstFocusable = false;
      this.lastFocusable = false;
      // position target - position tooltip relative to a specified element
      this.positionTarget = getPositionTarget(this);
      // gap between element and viewport - if there's max-height 
      this.viewportGap = parseInt(getComputedStyle(this.element).getPropertyValue('--popover-viewport-gap')) || 20;
      initPopover(this);
      initPopoverEvents(this);
    };
  
    // public methods
    Popover.prototype.togglePopover = function(bool, moveFocus) {
      togglePopover(this, bool, moveFocus);
    };
  
    Popover.prototype.checkPopoverClick = function(target) {
      checkPopoverClick(this, target);
    };
  
    Popover.prototype.checkPopoverFocus = function() {
      checkPopoverFocus(this);
    };
  
    // private methods
    function getPositionTarget(popover) {
      // position tooltip relative to a specified element - if provided
      var positionTargetSelector = popover.element.getAttribute('data-position-target');
      if(!positionTargetSelector) return false;
      var positionTarget = document.querySelector(positionTargetSelector);
      return positionTarget;
    };
  
    function initPopover(popover) {
      // init aria-labels
      for(var i = 0; i < popover.trigger.length; i++) {
        Util.setAttributes(popover.trigger[i], {'aria-expanded': 'false', 'aria-haspopup': 'true'});
      }
    };
    
    function initPopoverEvents(popover) {
      for(var i = 0; i < popover.trigger.length; i++) {(function(i){
        popover.trigger[i].addEventListener('click', function(event){
          event.preventDefault();
          // if the popover had been previously opened by another trigger element -> close it first and reopen in the right position
          if(Util.hasClass(popover.element, popover.popoverVisibleClass) && popover.selectedTrigger !=  popover.trigger[i]) {
            togglePopover(popover, false, false); // close menu
          }
          // toggle popover
          popover.selectedTrigger = popover.trigger[i];
          togglePopover(popover, !Util.hasClass(popover.element, popover.popoverVisibleClass), true);
        });
      })(i);}
      
      // trap focus
      popover.element.addEventListener('keydown', function(event){
        if( event.keyCode && event.keyCode == 9 || event.key && event.key == 'Tab' ) {
          //trap focus inside popover
          trapFocus(popover, event);
        }
      });
    };
    
    function togglePopover(popover, bool, moveFocus) {
      // toggle popover visibility
      Util.toggleClass(popover.element, popover.popoverVisibleClass, bool);
      popover.popoverIsOpen = bool;
      if(bool) {
        popover.selectedTrigger.setAttribute('aria-expanded', 'true');
        getFocusableElements(popover);
        // move focus
        focusPopover(popover);
        popover.element.addEventListener("transitionend", function(event) {focusPopover(popover);}, {once: true});
        // position the popover element
        positionPopover(popover);
        // add class to popover trigger
        Util.addClass(popover.selectedTrigger, popover.selectedTriggerClass);
      } else if(popover.selectedTrigger) {
        popover.selectedTrigger.setAttribute('aria-expanded', 'false');
        if(moveFocus) Util.moveFocus(popover.selectedTrigger);
        // remove class from menu trigger
        Util.removeClass(popover.selectedTrigger, popover.selectedTriggerClass);
        popover.selectedTrigger = false;
      }
    };
    
    function focusPopover(popover) {
      if(popover.firstFocusable) {
        popover.firstFocusable.focus();
      } else {
        Util.moveFocus(popover.element);
      }
    };
  
    function positionPopover(popover) {
      // reset popover position
      resetPopoverStyle(popover);
      var selectedTriggerPosition = (popover.positionTarget) ? popover.positionTarget.getBoundingClientRect() : popover.selectedTrigger.getBoundingClientRect();
      
      var menuOnTop = (window.innerHeight - selectedTriggerPosition.bottom) < selectedTriggerPosition.top;
        
      var left = selectedTriggerPosition.left,
        right = (window.innerWidth - selectedTriggerPosition.right),
        isRight = (window.innerWidth < selectedTriggerPosition.left + popover.element.offsetWidth);
  
      var horizontal = isRight ? 'right: '+right+'px;' : 'left: '+left+'px;',
        vertical = menuOnTop
          ? 'bottom: '+(window.innerHeight - selectedTriggerPosition.top)+'px;'
          : 'top: '+selectedTriggerPosition.bottom+'px;';
      // check right position is correct -> otherwise set left to 0
      if( isRight && (right + popover.element.offsetWidth) > window.innerWidth) horizontal = 'left: '+ parseInt((window.innerWidth - popover.element.offsetWidth)/2)+'px;';
      // check if popover needs a max-height (user will scroll inside the popover)
      var maxHeight = menuOnTop ? selectedTriggerPosition.top - popover.viewportGap : window.innerHeight - selectedTriggerPosition.bottom - popover.viewportGap;
  
      var initialStyle = popover.element.getAttribute('style');
      if(!initialStyle) initialStyle = '';
      popover.element.setAttribute('style', initialStyle + horizontal + vertical +'max-height:'+Math.floor(maxHeight)+'px;');
    };
    
    function resetPopoverStyle(popover) {
      // remove popover inline style before appling new style
      popover.element.style.maxHeight = '';
      popover.element.style.top = '';
      popover.element.style.bottom = '';
      popover.element.style.left = '';
      popover.element.style.right = '';
    };
  
    function checkPopoverClick(popover, target) {
      // close popover when clicking outside it
      if(!popover.popoverIsOpen) return;
      if(!popover.element.contains(target) && !target.closest('[aria-controls="'+popover.elementId+'"]')) togglePopover(popover, false);
    };
  
    function checkPopoverFocus(popover) {
      // on Esc key -> close popover if open and move focus (if focus was inside popover)
      if(!popover.popoverIsOpen) return;
      var popoverParent = document.activeElement.closest('.js-popover');
      togglePopover(popover, false, popoverParent);
    };
    
    function getFocusableElements(popover) {
      //get all focusable elements inside the popover
      var allFocusable = popover.element.querySelectorAll(focusableElString);
      getFirstVisible(popover, allFocusable);
      getLastVisible(popover, allFocusable);
    };
  
    function getFirstVisible(popover, elements) {
      //get first visible focusable element inside the popover
      for(var i = 0; i < elements.length; i++) {
        if( isVisible(elements[i]) ) {
          popover.firstFocusable = elements[i];
          break;
        }
      }
    };
  
    function getLastVisible(popover, elements) {
      //get last visible focusable element inside the popover
      for(var i = elements.length - 1; i >= 0; i--) {
        if( isVisible(elements[i]) ) {
          popover.lastFocusable = elements[i];
          break;
        }
      }
    };
  
    function trapFocus(popover, event) {
      if( popover.firstFocusable == document.activeElement && event.shiftKey) {
        //on Shift+Tab -> focus last focusable element when focus moves out of popover
        event.preventDefault();
        popover.lastFocusable.focus();
      }
      if( popover.lastFocusable == document.activeElement && !event.shiftKey) {
        //on Tab -> focus first focusable element when focus moves out of popover
        event.preventDefault();
        popover.firstFocusable.focus();
      }
    };
    
    function isVisible(element) {
      // check if element is visible
      return element.offsetWidth || element.offsetHeight || element.getClientRects().length;
    };
  
    window.Popover = Popover;
  
    //initialize the Popover objects
    var popovers = document.getElementsByClassName('js-popover');
    // generic focusable elements string selector
    var focusableElString = '[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex]:not([tabindex="-1"]), [contenteditable], audio[controls], video[controls], summary';
    
    if( popovers.length > 0 ) {
      var popoversArray = [];
      var scrollingContainers = [];
      for( var i = 0; i < popovers.length; i++) {
        (function(i){
          popoversArray.push(new Popover(popovers[i]));
          var scrollableElement = popovers[i].getAttribute('data-scrollable-element');
          if(scrollableElement && !scrollingContainers.includes(scrollableElement)) scrollingContainers.push(scrollableElement);
        })(i);
      }
  
      // listen for key events
      window.addEventListener('keyup', function(event){
        if( event.keyCode && event.keyCode == 27 || event.key && event.key.toLowerCase() == 'escape' ) {
          // close popover on 'Esc'
          popoversArray.forEach(function(element){
            element.checkPopoverFocus();
          });
        } 
      });
      // close popover when clicking outside it
      window.addEventListener('click', function(event){
        popoversArray.forEach(function(element){
          element.checkPopoverClick(event.target);
        });
      });
      // on resize -> close all popover elements
      window.addEventListener('resize', function(event){
        popoversArray.forEach(function(element){
          element.togglePopover(false, false);
        });
      });
      // on scroll -> close all popover elements
      window.addEventListener('scroll', function(event){
        popoversArray.forEach(function(element){
          if(element.popoverIsOpen) element.togglePopover(false, false);
        });
      });
      // take into account additinal scrollable containers
      for(var j = 0; j < scrollingContainers.length; j++) {
        var scrollingContainer = document.querySelector(scrollingContainers[j]);
        if(scrollingContainer) {
          scrollingContainer.addEventListener('scroll', function(event){
            popoversArray.forEach(function(element){
              if(element.popoverIsOpen) element.togglePopover(false, false);
            });
          });
        }
      }
    }
  }());
// File#: _1_progress-bar
// Usage: codyhouse.co/license
(function() {	
    var ProgressBar = function(element) {
      this.element = element;
      this.fill = this.element.getElementsByClassName('progress-bar__fill')[0];
      this.label = this.element.getElementsByClassName('progress-bar__value');
      this.value = getProgressBarValue(this);
      // before checking if data-animation is set -> check for reduced motion
      updatedProgressBarForReducedMotion(this);
      this.animate = this.element.hasAttribute('data-animation') && this.element.getAttribute('data-animation') == 'on';
      this.animationDuration = this.element.hasAttribute('data-duration') ? this.element.getAttribute('data-duration') : 1000;
      // animation will run only on browsers supporting IntersectionObserver
      this.canAnimate = ('IntersectionObserver' in window && 'IntersectionObserverEntry' in window && 'intersectionRatio' in window.IntersectionObserverEntry.prototype);
      // this element is used to announce the percentage value to SR
      this.ariaLabel = this.element.getElementsByClassName('js-progress-bar__aria-value');
      // check if we need to update the bar color
      this.changeColor =  Util.hasClass(this.element, 'progress-bar--color-update') && Util.cssSupports('color', 'var(--color-value)');
      if(this.changeColor) {
        this.colorThresholds = getProgressBarColorThresholds(this);
      }
      initProgressBar(this);
      // store id to reset animation
      this.animationId = false;
    }; 
  
    // public function
    ProgressBar.prototype.setProgressBarValue = function(value) {
      setProgressBarValue(this, value);
    };
  
    function getProgressBarValue(progressBar) { // get progress value
      // return (fill width/total width) * 100
      return parseFloat(progressBar.fill.offsetWidth*100/progressBar.element.getElementsByClassName('progress-bar__bg')[0].offsetWidth);
    };
  
    function getProgressBarColorThresholds(progressBar) {
      var thresholds = [];
      var i = 1;
      while (!isNaN(parseInt(getComputedStyle(progressBar.element).getPropertyValue('--progress-bar-color-'+i)))) {
        thresholds.push(parseInt(getComputedStyle(progressBar.element).getPropertyValue('--progress-bar-color-'+i)));
        i = i + 1;
      }
      return thresholds;
    };
  
    function updatedProgressBarForReducedMotion(progressBar) {
      // if reduced motion is supported and set to reduced -> remove animations
      if(osHasReducedMotion) progressBar.element.removeAttribute('data-animation');
    };
  
    function initProgressBar(progressBar) {
      // set initial bar color
      if(progressBar.changeColor) updateProgressBarColor(progressBar, progressBar.value);
      // if data-animation is on -> reset the progress bar and animate when entering the viewport
      if(progressBar.animate && progressBar.canAnimate) animateProgressBar(progressBar);
      // reveal fill and label -> --animate and --color-update variations only
      setTimeout(function(){Util.addClass(progressBar.element, 'progress-bar--init');}, 30);
  
      // dynamically update value of progress bar
      progressBar.element.addEventListener('updateProgress', function(event){
        // cancel request animation frame if it was animating
        if(progressBar.animationId) window.cancelAnimationFrame(progressBar.animationId);
        
        var final = event.detail.value,
          duration = (event.detail.duration) ? event.detail.duration : progressBar.animationDuration;
        var start = getProgressBarValue(progressBar);
        // trigger update animation
        updateProgressBar(progressBar, start, final, duration, function(){
          emitProgressBarEvents(progressBar, 'progressCompleted', progressBar.value+'%');
          // update value of label for SR
          if(progressBar.ariaLabel.length > 0) progressBar.ariaLabel[0].textContent = final+'%';
        });
      });
    };
  
    function animateProgressBar(progressBar) {
      // reset inital values
      setProgressBarValue(progressBar, 0);
      
      // listen for the element to enter the viewport -> start animation
      var observer = new IntersectionObserver(progressBarObserve.bind(progressBar), { threshold: [0, 0.1] });
      observer.observe(progressBar.element);
    };
  
    function progressBarObserve(entries, observer) { // observe progressBar position -> start animation when inside viewport
      var self = this;
      if(entries[0].intersectionRatio.toFixed(1) > 0 && !this.animationTriggered) {
        updateProgressBar(this, 0, this.value, this.animationDuration, function(){
          emitProgressBarEvents(self, 'progressCompleted', self.value+'%');
        });
      }
    };
  
    function updateProgressBar(progressBar, start, to, duration, cb) {
      var change = to - start,
        currentTime = null;
  
      var animateFill = function(timestamp){  
        if (!currentTime) currentTime = timestamp;         
        var progress = timestamp - currentTime;
        var val = parseInt((progress/duration)*change + start);
        // make sure value is in correct range
        if(change > 0 && val > to) val = to;
        if(change < 0 && val < to) val = to;
        if(progress >= duration) val = to;
  
        setProgressBarValue(progressBar, val);
        if(progress < duration) {
          progressBar.animationId = window.requestAnimationFrame(animateFill);
        } else {
          progressBar.animationId = false;
          cb();
        }
      };
      if ( window.requestAnimationFrame && !osHasReducedMotion ) {
        progressBar.animationId = window.requestAnimationFrame(animateFill);
      } else {
        setProgressBarValue(progressBar, to);
        cb();
      }
    };
  
    function setProgressBarValue(progressBar, value) {
      progressBar.fill.style.width = value+'%';
      if(progressBar.label.length > 0 ) progressBar.label[0].textContent = value+'%';
      if(progressBar.changeColor) updateProgressBarColor(progressBar, value);
    };
  
    function updateProgressBarColor(progressBar, value) {
      var className = 'progress-bar--fill-color-'+ progressBar.colorThresholds.length;
      for(var i = progressBar.colorThresholds.length; i > 0; i--) {
        if( !isNaN(progressBar.colorThresholds[i - 1]) && value <= progressBar.colorThresholds[i - 1]) {
          className = 'progress-bar--fill-color-' + i;
        } 
      }
      
      removeProgressBarColorClasses(progressBar);
      Util.addClass(progressBar.element, className);
    };
  
    function removeProgressBarColorClasses(progressBar) {
      var classes = progressBar.element.className.split(" ").filter(function(c) {
        return c.lastIndexOf('progress-bar--fill-color-', 0) !== 0;
      });
      progressBar.element.className = classes.join(" ").trim();
    };
  
    function emitProgressBarEvents(progressBar, eventName, detail) {
      progressBar.element.dispatchEvent(new CustomEvent(eventName, {detail: detail}));
    };
  
    window.ProgressBar = ProgressBar;
  
    //initialize the ProgressBar objects
    var progressBars = document.getElementsByClassName('js-progress-bar');
    var osHasReducedMotion = Util.osHasReducedMotion();
    if( progressBars.length > 0 ) {
      for( var i = 0; i < progressBars.length; i++) {
        (function(i){new ProgressBar(progressBars[i]);})(i);
      }
    }
  }());
// File#: _1_repeater
// Usage: codyhouse.co/license
(function() {
    var Repeater = function(element) {
      this.element = element;
      this.blockWrapper = this.element.getElementsByClassName('js-repeater__list');
      if(this.blockWrapper.length < 1) return;
      this.blocks = false;
      getBlocksList(this);
      this.firstBlock = false;
      this.addNew = this.element.getElementsByClassName('js-repeater__add');
      this.cloneClass = this.element.getAttribute('data-repeater-class');
      this.inputName = this.element.getAttribute('data-repeater-input-name');
      initRepeater(this);
    };
  
    function initRepeater(element) {
      if(element.addNew.length < 1 || element.blocks.length < 1 || element.blockWrapper.length < 1 ) return;
      element.firstBlock = element.blocks[0].cloneNode(true);
      
      // detect click on a Remove button
      element.element.addEventListener('click', function(event) {
        var deleteBtn = event.target.closest('.js-repeater__remove');
        if(deleteBtn) {
          event.preventDefault();
          removeBlock(element, deleteBtn);
        }
      });
  
      // detect click on Add button
      element.addNew[0].addEventListener('click', function(event) {
        event.preventDefault();
        addBlock(element);
      });
    };
  
    function addBlock(element) {
      if(element.blocks.length > 0) {
        var clone = element.blocks[element.blocks.length - 1].cloneNode(true),
          nameToReplace = element.inputName.replace('[n]', '['+(element.blocks.length - 1)+']'),
          newName = element.inputName.replace('[n]', '['+element.blocks.length+']');
      } else {
        var clone =  element.firstBlock.cloneNode(true),
        nameToReplace = element.inputName.replace('[n]', '[0]'),
        newName = element.inputName.replace('[n]', '[0]');
      }
      
      if(element.cloneClass) Util.addClass(clone, element.cloneClass);
      // modify name/for/id attributes
      updateBlockAttrs(clone, nameToReplace, newName, true);
  
      element.blockWrapper[0].appendChild(clone);
      // update blocks list
      getBlocksList(element)
    };
  
    function removeBlock(element, trigger) {
      var block = trigger.closest('.js-repeater__item');
      if(block) {
        var index = Util.getIndexInArray(element.blocks, block);
        block.remove();
        // update blocks list
        getBlocksList(element);
        // need to reset all blocks after that -> name/for/id values
        for(var i = index; i < element.blocks.length; i++) {
          updateBlockAttrs(element.blocks[i], element.inputName.replace('[n]', '['+(i+1)+']'), element.inputName.replace('[n]', '['+i+']'));
        }
      }
    };
  
    function updateBlockAttrs(block, nameToReplace, newName, reset) {
      var nameElements = block.querySelectorAll('[name^="'+nameToReplace+'"]'),
        forElements = block.querySelectorAll('[for^="'+nameToReplace+'"]'),
        idElements = block.querySelectorAll('[id^="'+nameToReplace+'"]');
  
      for(var i = 0; i < nameElements.length; i++) {
        var nameAttr = nameElements[i].getAttribute('name');
        nameElements[i].setAttribute('name', nameAttr.replace(nameToReplace, newName));
        if(reset && nameElements[i].value) nameElements[i].value = '';
      }
  
      for(var i = 0; i < forElements.length; i++) {
        var forAttr = forElements[i].getAttribute('for');
        forElements[i].setAttribute('for', forAttr.replace(nameToReplace, newName));
      }
  
      for(var i = 0; i < idElements.length; i++) {
        var idAttr = idElements[i].getAttribute('id');
        idElements[i].setAttribute('id', idAttr.replace(nameToReplace, newName));
      }
    };
  
    function getBlocksList(element) {
      element.blocks = Util.getChildrenByClassName(element.blockWrapper[0], 'js-repeater__item');
    };
  
    //initialize the Repeater objects
    var repeater = document.getElementsByClassName('js-repeater');
    if( repeater.length > 0 ) {
      for( var i = 0; i < repeater.length; i++) {
        (function(i){new Repeater(repeater[i]);})(i);
      }
    };
  }());
// File#: _1_responsive-sidebar
// Usage: codyhouse.co/license
(function() {
    var Sidebar = function(element) {
      this.element = element;
      this.triggers = document.querySelectorAll('[aria-controls="'+this.element.getAttribute('id')+'"]');
      this.firstFocusable = null;
      this.lastFocusable = null;
      this.selectedTrigger = null;
      this.showClass = "sidebar--is-visible";
      this.staticClass = "sidebar--static";
      this.customStaticClass = "";
      this.readyClass = "sidebar--loaded";
      this.layout = false; // this will be static or mobile
      getCustomStaticClass(this); // custom classes for static version
      initSidebar(this);
    };
  
    function getCustomStaticClass(element) {
      var customClasses = element.element.getAttribute('data-static-class');
      if(customClasses) element.customStaticClass = ' '+customClasses;
    };
    
    function initSidebar(sidebar) {
      initSidebarResize(sidebar); // handle changes in layout -> mobile to static and viceversa
      
      if ( sidebar.triggers ) { // open sidebar when clicking on trigger buttons - mobile layout only
        for(var i = 0; i < sidebar.triggers.length; i++) {
          sidebar.triggers[i].addEventListener('click', function(event) {
            event.preventDefault();
            if(Util.hasClass(sidebar.element, sidebar.showClass)) {
              sidebar.selectedTrigger = event.target;
              closeSidebar(sidebar);
              return;
            }
            sidebar.selectedTrigger = event.target;
            showSidebar(sidebar);
            initSidebarEvents(sidebar);
          });
        }
      }
    };
  
    function showSidebar(sidebar) { // mobile layout only
      Util.addClass(sidebar.element, sidebar.showClass);
      getFocusableElements(sidebar);
      Util.moveFocus(sidebar.element);
    };
  
    function closeSidebar(sidebar) { // mobile layout only
      Util.removeClass(sidebar.element, sidebar.showClass);
      sidebar.firstFocusable = null;
      sidebar.lastFocusable = null;
      if(sidebar.selectedTrigger) sidebar.selectedTrigger.focus();
      sidebar.element.removeAttribute('tabindex');
      //remove listeners
      cancelSidebarEvents(sidebar);
    };
  
    function initSidebarEvents(sidebar) { // mobile layout only
      //add event listeners
      sidebar.element.addEventListener('keydown', handleEvent.bind(sidebar));
      sidebar.element.addEventListener('click', handleEvent.bind(sidebar));
    };
  
    function cancelSidebarEvents(sidebar) { // mobile layout only
      //remove event listeners
      sidebar.element.removeEventListener('keydown', handleEvent.bind(sidebar));
      sidebar.element.removeEventListener('click', handleEvent.bind(sidebar));
    };
  
    function handleEvent(event) { // mobile layout only
      switch(event.type) {
        case 'click': {
          initClick(this, event);
        }
        case 'keydown': {
          initKeyDown(this, event);
        }
      }
    };
  
    function initKeyDown(sidebar, event) { // mobile layout only
      if( event.keyCode && event.keyCode == 27 || event.key && event.key == 'Escape' ) {
        //close sidebar window on esc
        closeSidebar(sidebar);
      } else if( event.keyCode && event.keyCode == 9 || event.key && event.key == 'Tab' ) {
        //trap focus inside sidebar
        trapFocus(sidebar, event);
      }
    };
  
    function initClick(sidebar, event) { // mobile layout only
      //close sidebar when clicking on close button or sidebar bg layer 
      if( !event.target.closest('.js-sidebar__close-btn') && !Util.hasClass(event.target, 'js-sidebar') ) return;
      event.preventDefault();
      closeSidebar(sidebar);
    };
  
    function trapFocus(sidebar, event) { // mobile layout only
      if( sidebar.firstFocusable == document.activeElement && event.shiftKey) {
        //on Shift+Tab -> focus last focusable element when focus moves out of sidebar
        event.preventDefault();
        sidebar.lastFocusable.focus();
      }
      if( sidebar.lastFocusable == document.activeElement && !event.shiftKey) {
        //on Tab -> focus first focusable element when focus moves out of sidebar
        event.preventDefault();
        sidebar.firstFocusable.focus();
      }
    };
  
    function initSidebarResize(sidebar) {
      // custom event emitted when window is resized - detect only if the sidebar--static@{breakpoint} class was added
      var beforeContent = getComputedStyle(sidebar.element, ':before').getPropertyValue('content');
      if(beforeContent && beforeContent !='' && beforeContent !='none') {
        checkSidebarLayour(sidebar);
  
        sidebar.element.addEventListener('update-sidebar', function(event){
          checkSidebarLayour(sidebar);
        });
      } 
      Util.addClass(sidebar.element, sidebar.readyClass);
    };
  
    function checkSidebarLayour(sidebar) {
      var layout = getComputedStyle(sidebar.element, ':before').getPropertyValue('content').replace(/\'|"/g, '');
      if(layout == sidebar.layout) return;
      sidebar.layout = layout;
      if(layout != 'static') Util.addClass(sidebar.element, 'is-hidden');
      Util.toggleClass(sidebar.element, sidebar.staticClass + sidebar.customStaticClass, layout == 'static');
      if(layout != 'static') setTimeout(function(){Util.removeClass(sidebar.element, 'is-hidden')});
      // reset element role 
      (layout == 'static') ? sidebar.element.removeAttribute('role', 'alertdialog') :  sidebar.element.setAttribute('role', 'alertdialog');
      // reset mobile behaviour
      if(layout == 'static' && Util.hasClass(sidebar.element, sidebar.showClass)) closeSidebar(sidebar);
    };
  
    function getFocusableElements(sidebar) {
      //get all focusable elements inside the drawer
      var allFocusable = sidebar.element.querySelectorAll('[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex]:not([tabindex="-1"]), [contenteditable], audio[controls], video[controls], summary');
      getFirstVisible(sidebar, allFocusable);
      getLastVisible(sidebar, allFocusable);
    };
  
    function getFirstVisible(sidebar, elements) {
      //get first visible focusable element inside the sidebar
      for(var i = 0; i < elements.length; i++) {
        if( elements[i].offsetWidth || elements[i].offsetHeight || elements[i].getClientRects().length ) {
          sidebar.firstFocusable = elements[i];
          return true;
        }
      }
    };
  
    function getLastVisible(sidebar, elements) {
      //get last visible focusable element inside the sidebar
      for(var i = elements.length - 1; i >= 0; i--) {
        if( elements[i].offsetWidth || elements[i].offsetHeight || elements[i].getClientRects().length ) {
          sidebar.lastFocusable = elements[i];
          return true;
        }
      }
    };
  
    //initialize the Sidebar objects
    var sidebar = document.getElementsByClassName('js-sidebar');
    if( sidebar.length > 0 ) {
      for( var i = 0; i < sidebar.length; i++) {
        (function(i){new Sidebar(sidebar[i]);})(i);
      }
      // switch from mobile to static layout
      var customEvent = new CustomEvent('update-sidebar');
      window.addEventListener('resize', function(event){
        (!window.requestAnimationFrame) ? setTimeout(function(){resetLayout();}, 250) : window.requestAnimationFrame(resetLayout);
      });
  
      function resetLayout() {
        for( var i = 0; i < sidebar.length; i++) {
          (function(i){sidebar[i].dispatchEvent(customEvent)})(i);
        };
      };
    }
  }());
// File#: _1_side-navigation
// Usage: codyhouse.co/license
(function() {
    function initSideNav(nav) {
      nav.addEventListener('click', function(event){
        var btn = event.target.closest('.js-sidenav__sublist-control');
        if(!btn) return;
        var listItem = btn.parentElement,
          bool = Util.hasClass(listItem, 'sidenav__item--expanded');
        btn.setAttribute('aria-expanded', !bool);
        Util.toggleClass(listItem, 'sidenav__item--expanded', !bool);
      });
    };
  
    var sideNavs = document.getElementsByClassName('js-sidenav');
    if( sideNavs.length > 0 ) {
      for( var i = 0; i < sideNavs.length; i++) {
        (function(i){initSideNav(sideNavs[i]);})(i);
      }
    }
  }());
// File#: _1_smooth-scrolling
// Usage: codyhouse.co/license
(function() {
    var SmoothScroll = function(element) {
      if(!('CSS' in window) || !CSS.supports('color', 'var(--color-var)')) return;
      this.element = element;
      this.scrollDuration = parseInt(this.element.getAttribute('data-duration')) || 300;
      this.dataElementY = this.element.getAttribute('data-scrollable-element-y') || this.element.getAttribute('data-scrollable-element') || this.element.getAttribute('data-element');
      this.scrollElementY = this.dataElementY ? document.querySelector(this.dataElementY) : window;
      this.dataElementX = this.element.getAttribute('data-scrollable-element-x');
      this.scrollElementX = this.dataElementY ? document.querySelector(this.dataElementX) : window;
      this.initScroll();
    };
  
    SmoothScroll.prototype.initScroll = function() {
      var self = this;
  
      //detect click on link
      this.element.addEventListener('click', function(event){
        event.preventDefault();
        var targetId = event.target.closest('.js-smooth-scroll').getAttribute('href').replace('#', ''),
          target = document.getElementById(targetId),
          targetTabIndex = target.getAttribute('tabindex'),
          windowScrollTop = self.scrollElementY.scrollTop || document.documentElement.scrollTop;
  
        // scroll vertically
        if(!self.dataElementY) windowScrollTop = window.scrollY || document.documentElement.scrollTop;
  
        var scrollElementY = self.dataElementY ? self.scrollElementY : false;
  
        var fixedHeight = self.getFixedElementHeight(); // check if there's a fixed element on the page
        Util.scrollTo(target.getBoundingClientRect().top + windowScrollTop - fixedHeight, self.scrollDuration, function() {
          // scroll horizontally
          self.scrollHorizontally(target, fixedHeight);
          //move the focus to the target element - don't break keyboard navigation
          Util.moveFocus(target);
          history.pushState(false, false, '#'+targetId);
          self.resetTarget(target, targetTabIndex);
        }, scrollElementY);
      });
    };
  
    SmoothScroll.prototype.scrollHorizontally = function(target, delta) {
      var scrollEl = this.dataElementX ? this.scrollElementX : false;
      var windowScrollLeft = this.scrollElementX ? this.scrollElementX.scrollLeft : document.documentElement.scrollLeft;
      var final = target.getBoundingClientRect().left + windowScrollLeft - delta,
        duration = this.scrollDuration;
  
      var element = scrollEl || window;
      var start = element.scrollLeft || document.documentElement.scrollLeft,
        currentTime = null;
  
      if(!scrollEl) start = window.scrollX || document.documentElement.scrollLeft;
      // return if there's no need to scroll
      if(Math.abs(start - final) < 5) return;
          
      var animateScroll = function(timestamp){
        if (!currentTime) currentTime = timestamp;        
        var progress = timestamp - currentTime;
        if(progress > duration) progress = duration;
        var val = Math.easeInOutQuad(progress, start, final-start, duration);
        element.scrollTo({
          left: val,
        });
        if(progress < duration) {
          window.requestAnimationFrame(animateScroll);
        }
      };
  
      window.requestAnimationFrame(animateScroll);
    };
  
    SmoothScroll.prototype.resetTarget = function(target, tabindex) {
      if( parseInt(target.getAttribute('tabindex')) < 0) {
        target.style.outline = 'none';
        !tabindex && target.removeAttribute('tabindex');
      }	
    };
  
    SmoothScroll.prototype.getFixedElementHeight = function() {
      var scrollElementY = this.dataElementY ? this.scrollElementY : document.documentElement;
      var fixedElementDelta = parseInt(getComputedStyle(scrollElementY).getPropertyValue('scroll-padding'));
      if(isNaN(fixedElementDelta) ) { // scroll-padding not supported
        fixedElementDelta = 0;
        var fixedElement = document.querySelector(this.element.getAttribute('data-fixed-element'));
        if(fixedElement) fixedElementDelta = parseInt(fixedElement.getBoundingClientRect().height);
      }
      return fixedElementDelta;
    };
    
    //initialize the Smooth Scroll objects
    var smoothScrollLinks = document.getElementsByClassName('js-smooth-scroll');
    if( smoothScrollLinks.length > 0 && !Util.cssSupports('scroll-behavior', 'smooth') && window.requestAnimationFrame) {
      // you need javascript only if css scroll-behavior is not supported
      for( var i = 0; i < smoothScrollLinks.length; i++) {
        (function(i){new SmoothScroll(smoothScrollLinks[i]);})(i);
      }
    }
  }());
// File#: _1_social-sharing
// Usage: codyhouse.co/license
(function() {
  function initSocialShare(button) {
    button.addEventListener('click', function(event){
      event.preventDefault();
      var social = button.getAttribute('data-social');
      var url = getSocialUrl(button, social);
      (social == 'mail')
        ? window.location.href = url
        : window.open(url, social+'-share-dialog', 'width=626,height=436');
    });
  };

  function getSocialUrl(button, social) {
    var params = getSocialParams(social);
    var newUrl = '';
    for(var i = 0; i < params.length; i++) {
      var paramValue = button.getAttribute('data-'+params[i]);
      if(params[i] == 'hashtags') paramValue = encodeURI(paramValue.replace(/\#| /g, ''));
      if(paramValue) {
        (social == 'facebook') 
          ? newUrl = newUrl + 'u='+encodeURIComponent(paramValue)+'&'
          : newUrl = newUrl + params[i]+'='+encodeURIComponent(paramValue)+'&';
      }
    }
    if(social == 'linkedin') newUrl = 'mini=true&'+newUrl;
    return button.getAttribute('href')+'?'+newUrl;
  };

  function getSocialParams(social) {
    var params = [];
    switch (social) {
      case 'twitter':
        params = ['text', 'hashtags'];
        break;
      case 'facebook':
      case 'linkedin':
        params = ['url'];
        break;
      case 'pinterest':
        params = ['url', 'media', 'description'];
        break;
      case 'mail':
        params = ['subject', 'body'];
        break;
    }
    return params;
  };

  var socialShare = document.getElementsByClassName('js-social-share');
  if(socialShare.length > 0) {
    for( var i = 0; i < socialShare.length; i++) {
      (function(i){initSocialShare(socialShare[i])})(i);
    }
  }
}());
// File#: _1_sticky-banner
// Usage: codyhouse.co/license
(function() {
    var StickyBanner = function(element) {
      this.element = element;
      this.offsetIn = 0;
      this.offsetOut = 0;
      this.targetIn = this.element.getAttribute('data-target-in') ? document.querySelector(this.element.getAttribute('data-target-in')) : false;
      this.targetOut = this.element.getAttribute('data-target-out') ? document.querySelector(this.element.getAttribute('data-target-out')) : false;
      this.reset = 0;
      getBannerOffsets(this);
      initBanner(this);
    };
  
    function getBannerOffsets(element) { // get offset in and offset out values
      // update offsetIn
      element.offsetIn = 0;
      if(element.targetIn) {
        var boundingClientRect = element.targetIn.getBoundingClientRect();
        element.offsetIn = boundingClientRect.top + document.documentElement.scrollTop + boundingClientRect.height;
      }
      var dataOffsetIn = element.element.getAttribute('data-offset-in');
      if(dataOffsetIn) {
        element.offsetIn = element.offsetIn + parseInt(dataOffsetIn);
      }
      // update offsetOut
      element.offsetOut = 0;
      if(element.targetOut) {
        var boundingClientRect = element.targetOut.getBoundingClientRect();
        element.offsetOut = boundingClientRect.top + document.documentElement.scrollTop - window.innerHeight;
      }
      var dataOffsetOut = element.element.getAttribute('data-offset-out');
      if(dataOffsetOut) {
        element.offsetOut = element.offsetOut + parseInt(dataOffsetOut);
      }
    };
  
    function initBanner(element) {
      resetBannerVisibility(element);
  
      element.element.addEventListener('resize-banner', function(){
        getBannerOffsets(element);
        resetBannerVisibility(element);
      });
  
      element.element.addEventListener('scroll-banner', function(){
        if(element.reset < 10) {
          getBannerOffsets(element);
          element.reset = element.reset + 1;
        }
        resetBannerVisibility(element);
      });
    };
  
    function resetBannerVisibility(element) {
      var scrollTop = document.documentElement.scrollTop,
        topTarget = false,
        bottomTarget = false;
      if(element.offsetIn < scrollTop) {
        topTarget = true;
      }
      if(element.offsetOut == 0 || scrollTop < element.offsetOut) {
        bottomTarget = true;
      }
      Util.toggleClass(element.element, 'sticky-banner--visible', bottomTarget && topTarget);
    };
  
    //initialize the Sticky Banner objects
    var stckyBanner = document.getElementsByClassName('js-sticky-banner');
    if( stckyBanner.length > 0 ) {
      for( var i = 0; i < stckyBanner.length; i++) {
        (function(i){new StickyBanner(stckyBanner[i]);})(i);
      }
      
      // init scroll/resize
      var resizingId = false,
        scrollingId = false,
        resizeEvent = new CustomEvent('resize-banner'),
        scrollEvent = new CustomEvent('scroll-banner');
      
      window.addEventListener('resize', function(event){
        clearTimeout(resizingId);
        resizingId = setTimeout(function(){
          doneResizing(resizeEvent);
        }, 300);
      });
  
      window.addEventListener('scroll', function(event){
        if(scrollingId) return;
        scrollingId = true;
        window.requestAnimationFrame 
          ? window.requestAnimationFrame(function(){
            doneResizing(scrollEvent);
            scrollingId = false;
          })
          : setTimeout(function(){
            doneResizing(scrollEvent);
            scrollingId = false;
          }, 200);
  
        resizingId = setTimeout(function(){
          doneResizing(resizeEvent);
        }, 300);
      });
  
      function doneResizing(event) {
        for( var i = 0; i < stckyBanner.length; i++) {
          (function(i){stckyBanner[i].dispatchEvent(event)})(i);
        };
      };
    }
  }());
// File#: _1_sub-navigation
// Usage: codyhouse.co/license
(function() {
    var SideNav = function(element) {
      this.element = element;
      this.control = this.element.getElementsByClassName('js-subnav__control');
      this.navList = this.element.getElementsByClassName('js-subnav__wrapper');
      this.closeBtn = this.element.getElementsByClassName('js-subnav__close-btn');
      this.firstFocusable = getFirstFocusable(this);
      this.showClass = 'subnav__wrapper--is-visible';
      this.collapsedLayoutClass = 'subnav--collapsed';
      initSideNav(this);
    };
  
    function getFirstFocusable(sidenav) { // get first focusable element inside the subnav
      if(sidenav.navList.length == 0) return;
      var focusableEle = sidenav.navList[0].querySelectorAll('[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex]:not([tabindex="-1"]), [contenteditable], audio[controls], video[controls], summary'),
          firstFocusable = false;
      for(var i = 0; i < focusableEle.length; i++) {
        if( focusableEle[i].offsetWidth || focusableEle[i].offsetHeight || focusableEle[i].getClientRects().length ) {
          firstFocusable = focusableEle[i];
          break;
        }
      }
  
      return firstFocusable;
    };
  
    function initSideNav(sidenav) {
      checkSideNavLayout(sidenav); // switch from --compressed to --expanded layout
      initSideNavToggle(sidenav); // mobile behavior + layout update on resize
    };
  
    function initSideNavToggle(sidenav) { 
      // custom event emitted when window is resized
      sidenav.element.addEventListener('update-sidenav', function(event){
        checkSideNavLayout(sidenav);
      });
  
      // mobile only
      if(sidenav.control.length == 0 || sidenav.navList.length == 0) return;
      sidenav.control[0].addEventListener('click', function(event){ // open sidenav
        openSideNav(sidenav, event);
      });
      sidenav.element.addEventListener('click', function(event) { // close sidenav when clicking on close button/bg layer
        if(event.target.closest('.js-subnav__close-btn') || Util.hasClass(event.target, 'js-subnav__wrapper')) {
          closeSideNav(sidenav, event);
        }
      });
    };
  
    function openSideNav(sidenav, event) { // open side nav - mobile only
      event.preventDefault();
      sidenav.selectedTrigger = event.target;
      event.target.setAttribute('aria-expanded', 'true');
      Util.addClass(sidenav.navList[0], sidenav.showClass);
      sidenav.navList[0].addEventListener('transitionend', function cb(event){
        sidenav.navList[0].removeEventListener('transitionend', cb);
        sidenav.firstFocusable.focus();
      });
    };
  
    function closeSideNav(sidenav, event, bool) { // close side sidenav - mobile only
      if( !Util.hasClass(sidenav.navList[0], sidenav.showClass) ) return;
      if(event) event.preventDefault();
      Util.removeClass(sidenav.navList[0], sidenav.showClass);
      if(!sidenav.selectedTrigger) return;
      sidenav.selectedTrigger.setAttribute('aria-expanded', 'false');
      if(!bool) sidenav.selectedTrigger.focus();
      sidenav.selectedTrigger = false; 
    };
  
    function checkSideNavLayout(sidenav) { // switch from --compressed to --expanded layout
      var layout = getComputedStyle(sidenav.element, ':before').getPropertyValue('content').replace(/\'|"/g, '');
      if(layout != 'expanded' && layout != 'collapsed') return;
      Util.toggleClass(sidenav.element, sidenav.collapsedLayoutClass, layout != 'expanded');
    };
    
    var sideNav = document.getElementsByClassName('js-subnav'),
      SideNavArray = [],
      j = 0;
    if( sideNav.length > 0) {
      for(var i = 0; i < sideNav.length; i++) {
        var beforeContent = getComputedStyle(sideNav[i], ':before').getPropertyValue('content');
        if(beforeContent && beforeContent !='' && beforeContent !='none') {
          j = j + 1;
        }
        (function(i){SideNavArray.push(new SideNav(sideNav[i]));})(i);
      }
  
      if(j > 0) { // on resize - update sidenav layout
        var resizingId = false,
          customEvent = new CustomEvent('update-sidenav');
        window.addEventListener('resize', function(event){
          clearTimeout(resizingId);
          resizingId = setTimeout(doneResizing, 300);
        });
  
        function doneResizing() {
          for( var i = 0; i < SideNavArray.length; i++) {
            (function(i){SideNavArray[i].element.dispatchEvent(customEvent)})(i);
          };
        };
  
        (window.requestAnimationFrame) // init table layout
          ? window.requestAnimationFrame(doneResizing)
          : doneResizing();
      }
  
      // listen for key events
      window.addEventListener('keyup', function(event){
        if( (event.keyCode && event.keyCode == 27) || (event.key && event.key.toLowerCase() == 'escape' )) {// listen for esc key - close navigation on mobile if open
          for(var i = 0; i < SideNavArray.length; i++) {
            (function(i){closeSideNav(SideNavArray[i], event);})(i);
          };
        }
        if( (event.keyCode && event.keyCode == 9) || (event.key && event.key.toLowerCase() == 'tab' )) { // listen for tab key - close navigation on mobile if open when nav loses focus
          if( document.activeElement.closest('.js-subnav__wrapper')) return;
          for(var i = 0; i < SideNavArray.length; i++) {
            (function(i){closeSideNav(SideNavArray[i], event, true);})(i);
          };
        }
      });
    }
  }());
// File#: _1_swipe-content
(function() {
  var SwipeContent = function(element) {
    this.element = element;
    this.delta = [false, false];
    this.dragging = false;
    this.intervalId = false;
    initSwipeContent(this);
  };

  function initSwipeContent(content) {
    content.element.addEventListener('mousedown', handleEvent.bind(content));
    content.element.addEventListener('touchstart', handleEvent.bind(content));
  };

  function initDragging(content) {
    //add event listeners
    content.element.addEventListener('mousemove', handleEvent.bind(content));
    content.element.addEventListener('touchmove', handleEvent.bind(content));
    content.element.addEventListener('mouseup', handleEvent.bind(content));
    content.element.addEventListener('mouseleave', handleEvent.bind(content));
    content.element.addEventListener('touchend', handleEvent.bind(content));
  };

  function cancelDragging(content) {
    //remove event listeners
    if(content.intervalId) {
      (!window.requestAnimationFrame) ? clearInterval(content.intervalId) : window.cancelAnimationFrame(content.intervalId);
      content.intervalId = false;
    }
    content.element.removeEventListener('mousemove', handleEvent.bind(content));
    content.element.removeEventListener('touchmove', handleEvent.bind(content));
    content.element.removeEventListener('mouseup', handleEvent.bind(content));
    content.element.removeEventListener('mouseleave', handleEvent.bind(content));
    content.element.removeEventListener('touchend', handleEvent.bind(content));
  };

  function handleEvent(event) {
    switch(event.type) {
      case 'mousedown':
      case 'touchstart':
        startDrag(this, event);
        break;
      case 'mousemove':
      case 'touchmove':
        drag(this, event);
        break;
      case 'mouseup':
      case 'mouseleave':
      case 'touchend':
        endDrag(this, event);
        break;
    }
  };

  function startDrag(content, event) {
    content.dragging = true;
    // listen to drag movements
    initDragging(content);
    content.delta = [parseInt(unify(event).clientX), parseInt(unify(event).clientY)];
    // emit drag start event
    emitSwipeEvents(content, 'dragStart', content.delta, event.target);
  };

  function endDrag(content, event) {
    cancelDragging(content);
    // credits: https://css-tricks.com/simple-swipe-with-vanilla-javascript/
    var dx = parseInt(unify(event).clientX), 
      dy = parseInt(unify(event).clientY);
    
    // check if there was a left/right swipe
    if(content.delta && (content.delta[0] || content.delta[0] === 0)) {
      var s = getSign(dx - content.delta[0]);
      
      if(Math.abs(dx - content.delta[0]) > 30) {
        (s < 0) ? emitSwipeEvents(content, 'swipeLeft', [dx, dy]) : emitSwipeEvents(content, 'swipeRight', [dx, dy]);	
      }
      
      content.delta[0] = false;
    }
    // check if there was a top/bottom swipe
    if(content.delta && (content.delta[1] || content.delta[1] === 0)) {
    	var y = getSign(dy - content.delta[1]);

    	if(Math.abs(dy - content.delta[1]) > 30) {
      	(y < 0) ? emitSwipeEvents(content, 'swipeUp', [dx, dy]) : emitSwipeEvents(content, 'swipeDown', [dx, dy]);
      }

      content.delta[1] = false;
    }
    // emit drag end event
    emitSwipeEvents(content, 'dragEnd', [dx, dy]);
    content.dragging = false;
  };

  function drag(content, event) {
    if(!content.dragging) return;
    // emit dragging event with coordinates
    (!window.requestAnimationFrame) 
      ? content.intervalId = setTimeout(function(){emitDrag.bind(content, event);}, 250) 
      : content.intervalId = window.requestAnimationFrame(emitDrag.bind(content, event));
  };

  function emitDrag(event) {
    emitSwipeEvents(this, 'dragging', [parseInt(unify(event).clientX), parseInt(unify(event).clientY)]);
  };

  function unify(event) { 
    // unify mouse and touch events
    return event.changedTouches ? event.changedTouches[0] : event; 
  };

  function emitSwipeEvents(content, eventName, detail, el) {
    var trigger = false;
    if(el) trigger = el;
    // emit event with coordinates
    var event = new CustomEvent(eventName, {detail: {x: detail[0], y: detail[1], origin: trigger}});
    content.element.dispatchEvent(event);
  };

  function getSign(x) {
    if(!Math.sign) {
      return ((x > 0) - (x < 0)) || +x;
    } else {
      return Math.sign(x);
    }
  };

  window.SwipeContent = SwipeContent;
  
  //initialize the SwipeContent objects
  var swipe = document.getElementsByClassName('js-swipe-content');
  if( swipe.length > 0 ) {
    for( var i = 0; i < swipe.length; i++) {
      (function(i){new SwipeContent(swipe[i]);})(i);
    }
  }
}());
// File#: _1_switch-icon
// Usage: codyhouse.co/license
(function() {
    var switchIcons = document.getElementsByClassName('js-switch-icon');
    if( switchIcons.length > 0 ) {
      for(var i = 0; i < switchIcons.length; i++) {(function(i){
        if( !Util.hasClass(switchIcons[i], 'switch-icon--hover') ) initswitchIcons(switchIcons[i]);
      })(i);}
  
      function initswitchIcons(btn) {
        btn.addEventListener('click', function(event){	
          event.preventDefault();
          var status = !Util.hasClass(btn, 'switch-icon--state-b');
          Util.toggleClass(btn, 'switch-icon--state-b', status);
          // emit custom event
          var event = new CustomEvent('switch-icon-clicked', {detail: status});
          btn.dispatchEvent(event);
        });
      };
    }
  }());
// File#: _1_table
// Usage: codyhouse.co/license
(function() {
    function initTable(table) {
      checkTableLayour(table); // switch from a collapsed to an expanded layout
      Util.addClass(table, 'table--loaded'); // show table
  
      // custom event emitted when window is resized
      table.addEventListener('update-table', function(event){
        checkTableLayour(table);
      });
    };
  
    function checkTableLayour(table) {
      var layout = getComputedStyle(table, ':before').getPropertyValue('content').replace(/\'|"/g, '');
      Util.toggleClass(table, tableExpandedLayoutClass, layout != 'collapsed');
    };
  
    var tables = document.getElementsByClassName('js-table'),
      tableExpandedLayoutClass = 'table--expanded';
    if( tables.length > 0 ) {
      var j = 0;
      for( var i = 0; i < tables.length; i++) {
        var beforeContent = getComputedStyle(tables[i], ':before').getPropertyValue('content');
        if(beforeContent && beforeContent !='' && beforeContent !='none') {
          (function(i){initTable(tables[i]);})(i);
          j = j + 1;
        } else {
          Util.addClass(tables[i], 'table--loaded');
        }
      }
      
      if(j > 0) {
        var resizingId = false,
          customEvent = new CustomEvent('update-table');
        window.addEventListener('resize', function(event){
          clearTimeout(resizingId);
          resizingId = setTimeout(doneResizing, 300);
        });
  
        function doneResizing() {
          for( var i = 0; i < tables.length; i++) {
            (function(i){tables[i].dispatchEvent(customEvent)})(i);
          };
        };
  
        (window.requestAnimationFrame) // init table layout
          ? window.requestAnimationFrame(doneResizing)
          : doneResizing();
      }
    }
  }());
// File#: _1_tabs
// Usage: codyhouse.co/license
(function() {
	var Tab = function(element) {
	  this.element = element;
	  this.tabList = this.element.getElementsByClassName('js-tabs__controls')[0];
	  this.listItems = this.tabList.getElementsByTagName('li');
	  this.triggers = this.tabList.getElementsByTagName('a');
	  this.panelsList = this.element.getElementsByClassName('js-tabs__panels')[0];
	  this.panels = Util.getChildrenByClassName(this.panelsList, 'js-tabs__panel');
	  this.hideClass = 'is-hidden';
	  this.customShowClass = this.element.getAttribute('data-show-panel-class') ? this.element.getAttribute('data-show-panel-class') : false;
	  this.layout = this.element.getAttribute('data-tabs-layout') ? this.element.getAttribute('data-tabs-layout') : 'horizontal';
	  // deep linking options
	  this.deepLinkOn = this.element.getAttribute('data-deep-link') == 'on';
	  // init tabs
	  this.initTab();
	};
  
	Tab.prototype.initTab = function() {
	  //set initial aria attributes
	  this.tabList.setAttribute('role', 'tablist');
	  for( var i = 0; i < this.triggers.length; i++) {
		var bool = (i == 0),
		  panelId = this.panels[i].getAttribute('id');
		this.listItems[i].setAttribute('role', 'presentation');
		Util.setAttributes(this.triggers[i], {'role': 'tab', 'aria-selected': bool, 'aria-controls': panelId, 'id': 'tab-'+panelId});
		Util.addClass(this.triggers[i], 'js-tabs__trigger'); 
		Util.setAttributes(this.panels[i], {'role': 'tabpanel', 'aria-labelledby': 'tab-'+panelId});
		Util.toggleClass(this.panels[i], this.hideClass, !bool);
  
		if(!bool) this.triggers[i].setAttribute('tabindex', '-1'); 
	  }
  
	  //listen for Tab events
	  this.initTabEvents();
  
	  // check deep linking option
	  this.initDeepLink();
	};
  
	Tab.prototype.initTabEvents = function() {
	  var self = this;
	  //click on a new tab -> select content
	  this.tabList.addEventListener('click', function(event) {
		if( event.target.closest('.js-tabs__trigger') ) self.triggerTab(event.target.closest('.js-tabs__trigger'), event);
	  });
	  //arrow keys to navigate through tabs 
	  this.tabList.addEventListener('keydown', function(event) {
		;
		if( !event.target.closest('.js-tabs__trigger') ) return;
		if( tabNavigateNext(event, self.layout) ) {
		  event.preventDefault();
		  self.selectNewTab('next');
		} else if( tabNavigatePrev(event, self.layout) ) {
		  event.preventDefault();
		  self.selectNewTab('prev');
		}
	  });
	};
  
	Tab.prototype.selectNewTab = function(direction) {
	  var selectedTab = this.tabList.querySelector('[aria-selected="true"]'),
		index = Util.getIndexInArray(this.triggers, selectedTab);
	  index = (direction == 'next') ? index + 1 : index - 1;
	  //make sure index is in the correct interval 
	  //-> from last element go to first using the right arrow, from first element go to last using the left arrow
	  if(index < 0) index = this.listItems.length - 1;
	  if(index >= this.listItems.length) index = 0;	
	  this.triggerTab(this.triggers[index]);
	  this.triggers[index].focus();
	};
  
	Tab.prototype.triggerTab = function(tabTrigger, event) {
	  var self = this;
	  event && event.preventDefault();	
	  var index = Util.getIndexInArray(this.triggers, tabTrigger);
	  //no need to do anything if tab was already selected
	  if(this.triggers[index].getAttribute('aria-selected') == 'true') return;
	  
	  for( var i = 0; i < this.triggers.length; i++) {
		var bool = (i == index);
		Util.toggleClass(this.panels[i], this.hideClass, !bool);
		if(this.customShowClass) Util.toggleClass(this.panels[i], this.customShowClass, bool);
		this.triggers[i].setAttribute('aria-selected', bool);
		bool ? this.triggers[i].setAttribute('tabindex', '0') : this.triggers[i].setAttribute('tabindex', '-1');
	  }
  
	  // update url if deepLink is on
	  if(this.deepLinkOn) {
		history.replaceState(null, '', '#'+tabTrigger.getAttribute('aria-controls'));
	  }
	};
  
	Tab.prototype.initDeepLink = function() {
	  if(!this.deepLinkOn) return;
	  var hash = window.location.hash.substr(1);
	  var self = this;
	  if(!hash || hash == '') return;
	  for(var i = 0; i < this.panels.length; i++) {
		if(this.panels[i].getAttribute('id') == hash) {
		  this.triggerTab(this.triggers[i], false);
		  setTimeout(function(){self.panels[i].scrollIntoView(true);});
		  break;
		}
	  };
	};
  
	function tabNavigateNext(event, layout) {
	  if(layout == 'horizontal' && (event.keyCode && event.keyCode == 39 || event.key && event.key == 'ArrowRight')) {return true;}
	  else if(layout == 'vertical' && (event.keyCode && event.keyCode == 40 || event.key && event.key == 'ArrowDown')) {return true;}
	  else {return false;}
	};
  
	function tabNavigatePrev(event, layout) {
	  if(layout == 'horizontal' && (event.keyCode && event.keyCode == 37 || event.key && event.key == 'ArrowLeft')) {return true;}
	  else if(layout == 'vertical' && (event.keyCode && event.keyCode == 38 || event.key && event.key == 'ArrowUp')) {return true;}
	  else {return false;}
	};
	
	//initialize the Tab objects
	var tabs = document.getElementsByClassName('js-tabs');
	if( tabs.length > 0 ) {
	  for( var i = 0; i < tabs.length; i++) {
		(function(i){new Tab(tabs[i]);})(i);
	  }
	}
  }());
document.getElementById('themeSwitch').addEventListener('change', function(event){
    (event.target.checked) ? document.body.setAttribute('data-theme', 'dark') : document.body.removeAttribute('data-theme');
  });
// File#: _2_adv-custom-select
// Usage: codyhouse.co/license
(function() {
    var AdvSelect = function(element) {
      this.element = element;
      this.select = this.element.getElementsByTagName('select')[0];
      this.optGroups = this.select.getElementsByTagName('optgroup');
      this.options = this.select.getElementsByTagName('option');
      this.optionData = getOptionsData(this);
      this.selectId = this.select.getAttribute('id');
      this.selectLabel = document.querySelector('[for='+this.selectId+']')
      this.trigger = this.element.getElementsByClassName('js-adv-select__control')[0];
      this.triggerLabel = this.trigger.getElementsByClassName('js-adv-select__value')[0];
      this.dropdown = document.getElementById(this.trigger.getAttribute('aria-controls'));
  
      initAdvSelect(this); // init markup
      initAdvSelectEvents(this); // init event listeners
    };
  
    function getOptionsData(select) {
      var obj = [],
        dataset = select.options[0].dataset;
  
      function camelCaseToDash( myStr ) {
        return myStr.replace( /([a-z])([A-Z])/g, '$1-$2' ).toLowerCase();
      }
      for (var prop in dataset) {
        if (Object.prototype.hasOwnProperty.call(dataset, prop)) {
          // obj[prop] = select.dataset[prop];
          obj.push(camelCaseToDash(prop));
        }
      }
      return obj;
    };
  
    function initAdvSelect(select) {
      // create custom structure
      createAdvStructure(select);
      // update trigger label
      updateTriggerLabel(select);
      // hide native select and show custom structure
      Util.addClass(select.select, 'is-hidden');
      Util.removeClass(select.trigger, 'is-hidden');
      Util.removeClass(select.dropdown, 'is-hidden');
    };
  
    function initAdvSelectEvents(select) {
      if(select.selectLabel) {
        // move focus to custom trigger when clicking on <select> label
        select.selectLabel.addEventListener('click', function(){
          select.trigger.focus();
        });
      }
  
      // option is selected in dropdown
      select.dropdown.addEventListener('click', function(event){
        triggerSelection(select, event.target);
      });
  
      // keyboard navigation
      select.dropdown.addEventListener('keydown', function(event){
        if(event.keyCode && event.keyCode == 38 || event.key && event.key.toLowerCase() == 'arrowup') {
          keyboardCustomSelect(select, 'prev', event);
        } else if(event.keyCode && event.keyCode == 40 || event.key && event.key.toLowerCase() == 'arrowdown') {
          keyboardCustomSelect(select, 'next', event);
        } else if(event.keyCode && event.keyCode == 13 || event.key && event.key.toLowerCase() == 'enter') {
          triggerSelection(select, document.activeElement);
        }
      });
    };
  
    function createAdvStructure(select) {
      // store optgroup and option structure
      var optgroup = select.dropdown.querySelector('[role="group"]'),
        option = select.dropdown.querySelector('[role="option"]'),
        optgroupClone = false,
        optgroupLabel = false,
        optionClone = false;
      if(optgroup) {
        optgroupClone = optgroup.cloneNode();
        optgroupLabel = document.getElementById(optgroupClone.getAttribute('describedby'));
      }
      if(option) optionClone = option.cloneNode(true);
  
      var dropdownCode = '';
  
      if(select.optGroups.length > 0) {
        for(var i = 0; i < select.optGroups.length; i++) {
          dropdownCode = dropdownCode + getOptGroupCode(select, select.optGroups[i], optgroupClone, optionClone, optgroupLabel, i);
        }
      } else {
        for(var i = 0; i < select.options.length; i++) {
          dropdownCode = dropdownCode + getOptionCode(select, select.options[i], optionClone);
        }
      }
  
      select.dropdown.innerHTML = dropdownCode;
    };
  
    function getOptGroupCode(select, optGroup, optGroupClone, optionClone, optgroupLabel, index) {
      if(!optGroupClone || !optionClone) return '';
      var code = '';
      var options = optGroup.getElementsByTagName('option');
      for(var i = 0; i < options.length; i++) {
        code = code + getOptionCode(select, options[i], optionClone);
      }
      if(optgroupLabel) {
        var label = optgroupLabel.cloneNode(true);
        var id = label.getAttribute('id') + '-'+index;
        label.setAttribute('id', id);
        optGroupClone.setAttribute('describedby', id);
        code = label.outerHTML.replace('{optgroup-label}', optGroup.getAttribute('label')) + code;
      } 
      optGroupClone.innerHTML = code;
      return optGroupClone.outerHTML;
    };
  
    function getOptionCode(select, option, optionClone) {
      optionClone.setAttribute('data-value', option.value);
      if(option.selected) {
        optionClone.setAttribute('aria-selected', 'true');
        optionClone.setAttribute('tabindex', '0');
      } else {
        optionClone.removeAttribute('aria-selected');
        optionClone.removeAttribute('tabindex');
      }
      var optionHtml = optionClone.outerHTML;
      optionHtml = optionHtml.replace('{option-label}', option.text);
      for(var i = 0; i < select.optionData.length; i++) {
        optionHtml = optionHtml.replace('{'+select.optionData[i]+'}', option.getAttribute('data-'+select.optionData[i]));
      }
      return optionHtml;
    };
  
    function updateTriggerLabel(select) {
      // select.triggerLabel.textContent = select.options[select.select.selectedIndex].text;
      select.triggerLabel.innerHTML = select.dropdown.querySelector('[aria-selected="true"]').innerHTML;
    };
  
    function triggerSelection(select, target) {
      var option = target.closest('[role="option"]');
      if(!option) return;
      selectOption(select, option);
    };
  
    function selectOption(select, option) {
      if(option.hasAttribute('aria-selected') && option.getAttribute('aria-selected') == 'true') {
        // selecting the same option
      } else { 
        var selectedOption = select.dropdown.querySelector('[aria-selected="true"]');
        if(selectedOption) {
          selectedOption.removeAttribute('aria-selected');
          selectedOption.removeAttribute('tabindex');
        }
        option.setAttribute('aria-selected', 'true');
        option.setAttribute('tabindex', '0');
        // new option has been selected -> update native <select> element and trigger label
        updateNativeSelect(select, option.getAttribute('data-value'));
        updateTriggerLabel(select);
      }
      // move focus back to trigger
      setTimeout(function(){
        select.trigger.click();
      });
    };
  
    function updateNativeSelect(select, selectedValue) {
      var selectedOption = select.select.querySelector('[value="'+selectedValue+'"');
      select.select.selectedIndex = Util.getIndexInArray(select.options, selectedOption);
      select.select.dispatchEvent(new CustomEvent('change', {bubbles: true})); // trigger change event
    };
  
    function keyboardCustomSelect(select, direction) {
      var selectedOption = select.select.querySelector('[value="'+document.activeElement.getAttribute('data-value')+'"]');
      if(!selectedOption) return;
      var index = Util.getIndexInArray(select.options, selectedOption);
      
      index = direction == 'next' ? index + 1 : index - 1;
      if(index < 0) return;
      if(index >= select.options.length) return;
      
      var dropdownOption = select.dropdown.querySelector('[data-value="'+select.options[index].getAttribute('value')+'"]');
      if(dropdownOption) Util.moveFocus(dropdownOption);
    };
  
    //initialize the AdvSelect objects
    var advSelect = document.getElementsByClassName('js-adv-select');
    if( advSelect.length > 0 ) {
      for( var i = 0; i < advSelect.length; i++) {
        (function(i){new AdvSelect(advSelect[i]);})(i);
      }
    }
  }());
// File#: _2_autocomplete
// Usage: codyhouse.co/license
(function() {
    var Autocomplete = function(opts) {
      if(!('CSS' in window) || !CSS.supports('color', 'var(--color-var)')) return;
      this.options = Util.extend(Autocomplete.defaults, opts);
      this.element = this.options.element;
      this.input = this.element.getElementsByClassName('js-autocomplete__input')[0];
      this.results = this.element.getElementsByClassName('js-autocomplete__results')[0];
      this.resultsList = this.results.getElementsByClassName('js-autocomplete__list')[0];
      this.ariaResult = this.element.getElementsByClassName('js-autocomplete__aria-results');
      this.resultClassName = this.element.getElementsByClassName('js-autocomplete__item').length > 0 ? 'js-autocomplete__item' : 'js-autocomplete__result';
      // store search info
      this.inputVal = '';
      this.typeId = false;
      this.searching = false;
      this.searchingClass = this.element.getAttribute('data-autocomplete-searching-class') || 'autocomplete--searching';
      // dropdown reveal class
      this.dropdownActiveClass =  this.element.getAttribute('data-autocomplete-dropdown-visible-class') || this.element.getAttribute('data-dropdown-active-class');
      // truncate dropdown
      this.truncateDropdown = this.element.getAttribute('data-autocomplete-dropdown-truncate') && this.element.getAttribute('data-autocomplete-dropdown-truncate') == 'on' ? true : false;
      initAutocomplete(this);
      this.autocompleteClosed = false; // fix issue when selecting an option from the list
    };
  
    function initAutocomplete(element) {
      initAutocompleteAria(element); // set aria attributes for SR and keyboard users
      initAutocompleteTemplates(element);
      initAutocompleteEvents(element);
    };
  
    function initAutocompleteAria(element) {
      // set aria attributes for input element
      Util.setAttributes(element.input, {'role': 'combobox', 'aria-autocomplete': 'list'});
      var listId = element.resultsList.getAttribute('id');
      if(listId) element.input.setAttribute('aria-owns', listId);
      // set aria attributes for autocomplete list
      element.resultsList.setAttribute('role', 'list');
    };
  
    function initAutocompleteTemplates(element) {
      element.templateItems = element.resultsList.querySelectorAll('.'+element.resultClassName+'[data-autocomplete-template]');
      if(element.templateItems.length < 1) element.templateItems = element.resultsList.querySelectorAll('.'+element.resultClassName);
      element.templates = [];
      for(var i = 0; i < element.templateItems.length; i++) {
        element.templates[i] = element.templateItems[i].getAttribute('data-autocomplete-template');
      }
    };
  
    function initAutocompleteEvents(element) {
      // input - keyboard navigation 
      element.input.addEventListener('keyup', function(event){
        handleInputTyped(element, event);
      });
  
      // if input type="search" -> detect when clicking on 'x' to clear input
      element.input.addEventListener('search', function(event){
        updateSearch(element);
      });
  
      // make sure dropdown is open on click
      element.input.addEventListener('click', function(event){
        updateSearch(element, true);
      });
  
      element.input.addEventListener('focus', function(event){
        if(element.autocompleteClosed) {
          element.autocompleteClosed = false;
          return;
        }
        updateSearch(element, true);
      });
  
      // input loses focus -> close menu
      element.input.addEventListener('blur', function(event){
        checkFocusLost(element, event);
      });
  
      // results list - keyboard navigation 
      element.resultsList.addEventListener('keydown', function(event){
        navigateList(element, event);
      });
  
      // results list loses focus -> close menu
      element.resultsList.addEventListener('focusout', function(event){
        checkFocusLost(element, event);
      });
  
      // close on esc
      window.addEventListener('keyup', function(event){
        if( event.keyCode && event.keyCode == 27 || event.key && event.key.toLowerCase() == 'escape' ) {
          toggleOptionsList(element, false);
        } else if(event.keyCode && event.keyCode == 13 || event.key && event.key.toLowerCase() == 'enter') { // on Enter - select result if focus is within results list
          selectResult(element, document.activeElement.closest('.'+element.resultClassName), event);
        }
      });
  
      // select element from list
      element.resultsList.addEventListener('click', function(event){
        selectResult(element, event.target.closest('.'+element.resultClassName), event);
      });
    };
  
    function checkFocusLost(element, event) {
      if(element.element.contains(event.relatedTarget)) return;
      toggleOptionsList(element, false);
    };
  
    function handleInputTyped(element, event) {
      if(event.key.toLowerCase() == 'arrowdown' || event.keyCode == '40') {
        moveFocusToList(element);
      } else {
        updateSearch(element);
      }
    };
  
    function moveFocusToList(element) {
      if(!Util.hasClass(element.element, element.dropdownActiveClass)) return;
      resetSearch(element); // clearTimeout
      // make sure first element is focusable
      var index = 0;
      if(!elementListIsFocusable(element.resultsItems[index])) {
        index = getElementFocusbleIndex(element, index, true);
      }
      getListFocusableEl(element.resultsItems[index]).focus();
    };
  
    function updateSearch(element, bool) {
      var inputValue = element.input.value;
      if(inputValue == element.inputVal && !bool) return; // input value did not change
      element.inputVal = inputValue;
      if(element.typeId) clearInterval(element.typeId); // clearTimeout
      if(element.inputVal.length < element.options.characters) { // not enough characters to start searching
        toggleOptionsList(element, false);
        return;
      }
      if(bool) { // on focus -> update result list without waiting for the debounce
        updateResultsList(element, 'focus');
        return;
      }
      element.typeId = setTimeout(function(){
        updateResultsList(element, 'type');
      }, element.options.debounce);
    };
  
    function toggleOptionsList(element, bool) {
      // toggle visibility of options list
      if(bool) {
        if(Util.hasClass(element.element, element.dropdownActiveClass)) return;
        Util.addClass(element.element, element.dropdownActiveClass);
        element.input.setAttribute('aria-expanded', true);
        truncateAutocompleteList(element);
      } else {
        if(!Util.hasClass(element.element, element.dropdownActiveClass)) return;
        if(element.resultsList.contains(document.activeElement)) {
          element.autocompleteClosed = true;
          element.input.focus();
        }
        Util.removeClass(element.element, element.dropdownActiveClass);
        element.input.removeAttribute('aria-expanded');
        resetSearch(element); // clearTimeout
      }
    };
  
    function truncateAutocompleteList(element) {
      if(!element.truncateDropdown) return;
      // reset max height
      element.resultsList.style.maxHeight = '';
      // check available space 
      var spaceBelow = (window.innerHeight - element.input.getBoundingClientRect().bottom - 10),
        maxHeight = parseInt(getComputedStyle(element.resultsList).maxHeight);
  
      (maxHeight > spaceBelow) 
        ? element.resultsList.style.maxHeight = spaceBelow+'px' 
        : element.resultsList.style.maxHeight = '';
    };
  
    function updateResultsList(element, eventType) {
      if(element.searching) return;
      element.searching = true;
      Util.addClass(element.element, element.searchingClass); // show loader
      element.options.searchData(element.inputVal, function(data){
        // data = custom results
        populateResults(element, data);
        Util.removeClass(element.element, element.searchingClass);
        toggleOptionsList(element, true);
        updateAriaRegion(element);
        element.searching = false;
      }, eventType);
    };
  
    function updateAriaRegion(element) {
      element.resultsItems = element.resultsList.querySelectorAll('.'+element.resultClassName+'[tabindex="-1"]');
      if(element.ariaResult.length == 0) return;
      element.ariaResult[0].textContent = element.resultsItems.length;
    };
  
    function resetSearch(element) {
      if(element.typeId) clearInterval(element.typeId);
      element.typeId = false;
    };
  
    function navigateList(element, event) {
      var downArrow = (event.key.toLowerCase() == 'arrowdown' || event.keyCode == '40'),
        upArrow = (event.key.toLowerCase() == 'arrowup' || event.keyCode == '38');
      if(!downArrow && !upArrow) return;
      event.preventDefault();
      var selectedElement = document.activeElement.closest('.'+element.resultClassName) || document.activeElement;
      var index = Util.getIndexInArray(element.resultsItems, selectedElement);
      var newIndex = getElementFocusbleIndex(element, index, downArrow);
      getListFocusableEl(element.resultsItems[newIndex]).focus();
    };
  
    function getElementFocusbleIndex(element, index, nextItem) {
      var newIndex = nextItem ? index + 1 : index - 1;
      if(newIndex < 0) newIndex = element.resultsItems.length - 1;
      if(newIndex >= element.resultsItems.length) newIndex = 0;
      // check if element can be focused
      if(!elementListIsFocusable(element.resultsItems[newIndex])) {
        // skip this element
        return getElementFocusbleIndex(element, newIndex, nextItem);
      }
      return newIndex;
    };
  
    function elementListIsFocusable(item) {
      var role = item.getAttribute('role');
      if(role && role == 'presentation') {
        // skip this element
        return false;
      }
      return true;
    };
  
    function getListFocusableEl(item) {
      var newFocus = item,
        focusable = newFocus.querySelectorAll('button:not([disabled]), [href]');
      if(focusable.length > 0 ) newFocus = focusable[0];
      return newFocus;
    };
  
    function selectResult(element, result, event) {
      if(!result) return;
      if(element.options.onClick) {
        element.options.onClick(result, element, event, function(){
          toggleOptionsList(element, false);
        });
      } else {
        element.input.value = getResultContent(result);
        toggleOptionsList(element, false);
      }
      element.inputVal = element.input.value;
    };
  
    function getResultContent(result) { // get text content of selected item
      var labelElement = result.querySelector('[data-autocomplete-label]');
      return labelElement ? labelElement.textContent : result.textContent;
    };
  
    function populateResults(element, data) {
      var innerHtml = '';
  
      for(var i = 0; i < data.length; i++) {
        innerHtml = innerHtml + getItemHtml(element, data[i]);
      }
      element.resultsList.innerHTML = innerHtml;
    };
  
    function getItemHtml(element, data) {
      var clone = getClone(element, data);
      Util.removeClass(clone, 'is-hidden');
      clone.setAttribute('tabindex', '-1');
      for(var key in data) {
        if (data.hasOwnProperty(key)) {
          if(key == 'label') setLabel(clone, data[key]);
          else if(key == 'class') setClass(clone, data[key]);
          else if(key == 'url') setUrl(clone, data[key]);
          else if(key == 'src') setSrc(clone, data[key]);
          else setKey(clone, key, data[key]);
        }
      }
      return clone.outerHTML;
    };
  
    function getClone(element, data) {
      var item = false;
      if(element.templateItems.length == 1 || !data['template']) item = element.templateItems[0];
      else {
        for(var i = 0; i < element.templateItems.length; i++) {
          if(data['template'] == element.templates[i]) {
            item = element.templateItems[i];
          }
        }
        if(!item) item = element.templateItems[0];
      }
      return item.cloneNode(true);
    };
  
    function setLabel(clone, label) {
      var labelElement = clone.querySelector('[data-autocomplete-label]');
      labelElement 
        ? labelElement.textContent = label
        : clone.textContent = label;
    };
  
    function setClass(clone, classList) {
      Util.addClass(clone, classList);
    };
  
    function setUrl(clone, url) {
      var linkElement = clone.querySelector('[data-autocomplete-url]');
      if(linkElement) linkElement.setAttribute('href', url);
    };
  
    function setSrc(clone, src) {
      var imgElement = clone.querySelector('[data-autocomplete-src]');
      if(imgElement) imgElement.setAttribute('src', src);
    };
  
    function setKey(clone, key, value) {
      var subElement = clone.querySelector('[data-autocomplete-'+key+']');
      if(subElement) {
        if(subElement.hasAttribute('data-autocomplete-html')) subElement.innerHTML = value;
        else subElement.textContent = value;
      }
    };
  
    Autocomplete.defaults = {
      element : '',
      debounce: 200,
      characters: 2,
      searchData: false, // function used to return results
      onClick: false // function executed when selecting an item in the list; arguments (result, obj) -> selected <li> item + Autocompletr obj reference
    };
  
    window.Autocomplete = Autocomplete;
  }());
// File#: _2_comments
// Usage: codyhouse.co/license
(function() {
    function initVote(element) {
      var voteCounter = element.getElementsByClassName('js-comments__vote-label');
      element.addEventListener('click', function(){
        var pressed = element.getAttribute('aria-pressed') == 'true';
        element.setAttribute('aria-pressed', !pressed);
        Util.toggleClass(element, 'comments__vote-btn--pressed', !pressed);
        resetCounter(voteCounter, pressed);
        emitKeypressEvents(element, voteCounter, pressed);
      });
    };
  
    function resetCounter(voteCounter, pressed) { // update counter value (if present)
      if(voteCounter.length == 0) return;
      var count = parseInt(voteCounter[0].textContent);
      voteCounter[0].textContent = pressed ? count - 1 : count + 1;
    };
  
    function emitKeypressEvents(element, label, pressed) { // emit custom event when vote is updated
      var count = (label.length == 0) ? false : parseInt(label[0].textContent);
      var event = new CustomEvent('newVote', {detail: {count: count, upVote: !pressed}});
      element.dispatchEvent(event);
    };
  
    var voteCounting = document.getElementsByClassName('js-comments__vote-btn');
    if( voteCounting.length > 0 ) {
      for( var i = 0; i < voteCounting.length; i++) {
        (function(i){initVote(voteCounting[i]);})(i);
      }
    }
  }());
// File#: _2_drag-drop-file
// Usage: codyhouse.co/license
(function() {
    var Ddf = function(opts) {
      this.options = Util.extend(Ddf.defaults , opts);
      this.element = this.options.element;
      this.area = this.element.getElementsByClassName('js-ddf__area');
      this.input = this.element.getElementsByClassName('js-ddf__input');
      this.label = this.element.getElementsByClassName('js-ddf__label');
      this.labelEnd = this.element.getElementsByClassName('js-ddf__files-counter');
      this.labelEndMessage = this.labelEnd.length > 0 ? this.labelEnd[0].innerHTML.split('%') : false;
      this.droppedFiles = [];
      this.lastDroppedFiles = [];
      this.options.acceptFile = [];
      this.progress = false;
      this.progressObj = [];
      this.progressCompleteClass = 'ddf__progress--complete';
      initDndMessageResponse(this);
      initProgress(this, 0, 1, false);
      initDdf(this);
    };
  
    function initDndMessageResponse(element) { 
      // use this function to initilise the response of the Ddf when files are dropped (e.g., show list of files, update label message, show loader)
      if(element.options.showFiles) {
        element.filesList = element.element.getElementsByClassName('js-ddf__list');
        if(element.filesList.length == 0) return;
        element.fileItems = element.filesList[0].getElementsByClassName('js-ddf__item');
        if(element.fileItems.length > 0) Util.addClass(element.fileItems[0], 'is-hidden');+
        // listen for click on remove file action
        initRemoveFile(element);
      } else { // do not show list of files
        if(element.label.length == 0) return;
        if(element.options.upload) element.progress = element.element.getElementsByClassName('js-ddf__progress');
      }
    };
  
    function initDdf(element) {
      if(element.input.length > 0 ) { // store accepted file format
        var accept = element.input[0].getAttribute('accept');
        if(accept) element.options.acceptFile = accept.split(',').map(function(element){ return element.trim();})
      }
  
      initDndInput(element);
      initDndArea(element);
    };
  
    function initDndInput(element) { // listen to changes in the input file element
      if(element.input.length == 0 ) return;
      element.input[0].addEventListener('change', function(event){
        if(element.input[0].value == '') return; 
        storeDroppedFiles(element, element.input[0].files);
        element.input[0].value = '';
        updateDndArea(element);
      });
    };
  
    function initDndArea(element) { //drag event listeners
      element.element.addEventListener('dragenter', handleEvent.bind(element));
      element.element.addEventListener('dragover', handleEvent.bind(element));
      element.element.addEventListener('dragleave', handleEvent.bind(element));
      element.element.addEventListener('drop', handleEvent.bind(element));
    };
  
    function handleEvent(event) {
      switch(event.type) {
        case 'dragenter': 
        case 'dragover':
          preventDefaults(event);
          Util.addClass(this.area[0], 'ddf__area--file-hover');
          break;
        case 'dragleave':
          preventDefaults(event);
          Util.removeClass(this.area[0], 'ddf__area--file-hover');
          break;
        case 'drop':
          preventDefaults(event);
          storeDroppedFiles(this, event.dataTransfer.files);
          updateDndArea(this);
          break;
      }
    };
  
    function storeDroppedFiles(element, fileData) { // check files size/format/number
      element.lastDroppedFiles = [];
      if(element.options.replaceFiles) element.droppedFiles = [];
      Array.prototype.push.apply(element.lastDroppedFiles, fileData);
      filterUploadedFiles(element); // remove files that do not respect format/size
      element.droppedFiles = element.droppedFiles.concat(element.lastDroppedFiles);
      if(element.options.maxFiles) filterMaxFiles(element); // check max number of files
    };
  
    function updateDndArea(element) { // update UI + emit events
      if(element.options.showFiles) updateDndList(element);
      else {
        updateDndAreaMessage(element);
        Util.addClass(element.area[0], 'ddf__area--file-dropped');
      }
      Util.removeClass(element.area[0], 'ddf__area--file-hover');
      emitCustomEvents(element, 'filesUploaded', false);
    };
  
    function preventDefaults(event) {
      event.preventDefault();
      event.stopPropagation();
    };
  
    function filterUploadedFiles(element) {
      // check max weight
      if(element.options.maxSize) filterMaxWeight(element);
      // check file format
      if(element.options.acceptFile.length > 0) filterAcceptFile(element);
    };
  
    function filterMaxWeight(element) { // filter files by size
      var rejected = [];
      for(var i = element.lastDroppedFiles.length - 1; i >= 0; i--) {
        if(element.lastDroppedFiles[i].size > element.options.maxSize*1000) {
          var rejectedFile = element.lastDroppedFiles.splice(i, 1);
          rejected.push(rejectedFile[0].name);
        }
      }
      if(rejected.length > 0) {
        emitCustomEvents(element, 'rejectedWeight', rejected);
      }
    };
  
    function filterAcceptFile(element) { // filter files by format
      var rejected = [];
      for(var i = element.lastDroppedFiles.length - 1; i >= 0; i--) {
        if( !formatInList(element, i) ) {
          var rejectedFile = element.lastDroppedFiles.splice(i, 1);
          rejected.push(rejectedFile[0].name);
        }
      }
  
      if(rejected.length > 0) {
        emitCustomEvents(element, 'rejectedFormat', rejected);
      }
    };
  
    function formatInList(element, index) {
      var formatArray = element.lastDroppedFiles[index].type.split('/'),
        type = formatArray[0]+'/*',
        extension = formatArray.length > 1 ? formatArray[1]: false;
  
      var accepted = false;
      for(var i = 0; i < element.options.acceptFile.length; i++) {
        if(element.lastDroppedFiles[index].type == element.options.acceptFile[i] || type == element.options.acceptFile[i] || (extension && extension == element.options.acceptFile[i]) ) {
          accepted = true;
          break;
        }
  
        if(extension && extensionInList(extension, element.options.acceptFile[i])) { // extension could be list of format; e.g. for the svg it is svg+xml
          accepted = true;
          break;
        }
      }
      return accepted;
    };
  
    function extensionInList(extensionList, extension) {
      // extension could be .svg, .pdf, ..
      // extensionList could be png, svg+xml, ...
      if('.'+extensionList  == extension) return true;
      var accepted = false;
      var extensionListArray = extensionList.split('+');
      for(var i = 0; i < extensionListArray.length; i++) {
        if('.'+extensionListArray[i] == extension) {
          accepted = true;
          break;
        }
      }
      return accepted;
    }
  
    function filterMaxFiles(element) { // check number of uploaded files
      if(element.options.maxFiles >= element.droppedFiles.length) return; 
      var rejected = [];
      while (element.droppedFiles.length > element.options.maxFiles) {
        var rejectedFile = element.droppedFiles.pop();
        element.lastDroppedFiles.pop();
        rejected.push(rejectedFile.name);
      }
  
      if(rejected.length > 0) {
        emitCustomEvents(element, 'rejectedNumber', rejected);
      }
    };
  
    function updateDndAreaMessage(element) {
      if(element.progress && element.progress[0]) { // reset progress bar 
        element.progressObj[0].setProgressBarValue(0);
        Util.toggleClass(element.progress[0], 'is-hidden', element.droppedFiles.length == 0);
        Util.removeClass(element.progress[0], element.progressCompleteClass);
      }
  
      if(element.droppedFiles.length > 0 && element.labelEndMessage) {
        var finalMessage = element.labelEnd.innerHTML;
        if(element.labelEndMessage.length > 3) {
          finalMessage = element.droppedFiles.length > 1 
            ? element.labelEndMessage[0] + element.labelEndMessage[2] + element.labelEndMessage[3]
            : element.labelEndMessage[0] + element.labelEndMessage[1] + element.labelEndMessage[3];
        }
        element.labelEnd[0].innerHTML = finalMessage.replace('{n}', element.droppedFiles.length);
      }
    };
  
    function updateDndList(element) {
      // create new list of files to be appended
      if(!element.fileItems || element.fileItems.length == 0) return
      var clone = element.fileItems[0].cloneNode(true),
        string = '';
      Util.removeClass(clone, 'is-hidden');
      for(var i = 0; i < element.lastDroppedFiles.length; i++) {
        clone.getElementsByClassName('js-ddf__file-name')[0].textContent = element.lastDroppedFiles[i].name;
        string = clone.outerHTML + string;
      }
  
      if(element.options.replaceFiles) { // replace all files in list with new files
        string = element.fileItems[0].outerHTML + string;
        element.filesList[0].innerHTML = string;
      } else {
        element.fileItems[0].insertAdjacentHTML('afterend', string);
      }
  
      if(element.options.upload) storeMultipleProgress(element);
  
      Util.toggleClass(element.filesList[0], 'is-hidden', element.droppedFiles.length == 0);
    };
  
    function initRemoveFile(element) { // if list of files is visible - option to remove file from list
      element.filesList[0].addEventListener('click', function(event){
        if(!event.target.closest('.js-ddf__remove-btn')) return;
        event.preventDefault();
        var item = event.target.closest('.js-ddf__item'),
          index = Util.getIndexInArray(element.filesList[0].getElementsByClassName('js-ddf__item'), item);
        
        var removedFile = element.droppedFiles.splice(element.droppedFiles.length - index, 1);
        if(element.progress && element.progress.length > element.droppedFiles.length - index) {
          element.progress.splice();
        }
        // check if we need to remove items form the lastDroppedFiles array
        var lastDroppedIndex = element.lastDroppedFiles.length - index;
        if(lastDroppedIndex >= 0 && lastDroppedIndex < element.lastDroppedFiles.length - 1) {
          element.lastDroppedFiles.splice(element.lastDroppedFiles.length - index, 1);
        }
        item.remove();
        emitCustomEvents(element, 'fileRemoved', removedFile);
      });
  
    };
  
    function storeMultipleProgress(element) { // handle progress bar elements
      element.progress = [];
      var delta = element.droppedFiles.length - element.lastDroppedFiles.length;
      for(var i = 0; i < element.lastDroppedFiles.length; i++) {
        element.progress[i] = element.fileItems[element.droppedFiles.length - delta - i].getElementsByClassName('js-ddf__progress')[0];
      }
      initProgress(element, 0, element.lastDroppedFiles.length, true);
    };
  
    function initProgress(element, start, end, bool) {
      element.progressObj = [];
      if(!element.progress || element.progress.length == 0) return;
      for(var i = start; i < end; i++) {(function(i){
        element.progressObj.push(new CProgressBar(element.progress[i]));
        if(bool) Util.removeClass(element.progress[i], 'is-hidden');
        // listen for 100% progress
        element.progress[i].addEventListener('updateProgress', function(event){
          if(event.detail.value == 100 ) Util.addClass(element.progress[i], element.progressCompleteClass);
        });
      })(i);}
    };
  
    function emitCustomEvents(element, eventName, detail) {
      var event = new CustomEvent(eventName, {detail: detail});
      element.element.dispatchEvent(event);
    };
    
    Ddf.defaults = {
      element : '',
      maxFiles: false, // max number of files
      maxSize: false, // max weight - set in kb
      showFiles: false, // show list of selected files
      replaceFiles: true, // when new files are loaded -> they replace the old ones
      upload: false // show progress bar for the upload process
    };
  
    window.Ddf = Ddf;
  }());
// File#: _2_draggable-img-gallery
// Usage: codyhouse.co/license
(function() {
  var DragGallery = function(element) {
    this.element = element;
    this.list = this.element.getElementsByTagName('ul')[0];
    this.imgs = this.list.children;
    this.gestureHint = this.element.getElementsByClassName('drag-gallery__gesture-hint');// drag gesture hint
    this.galleryWidth = getGalleryWidth(this); 
    this.translate = 0; // store container translate value
    this.dragStart = false; // start dragging position
    // drag momentum option
    this.dragMStart = false;
    this.dragTimeMStart = false;
    this.dragTimeMEnd = false;
    this.dragMSpeed = false;
    this.dragAnimId = false;
    initDragGalleryEvents(this); 
  };

  function initDragGalleryEvents(gallery) {
    initDragging(gallery); // init dragging

    gallery.element.addEventListener('update-gallery-width', function(event){ // window resize
      gallery.galleryWidth = getGalleryWidth(gallery); 
      // reset translate value if not acceptable
      checkTranslateValue(gallery);
      setTranslate(gallery);
    });
     
    if(intersectionObsSupported) initOpacityAnim(gallery); // init image animation

    if(!reducedMotion && gallery.gestureHint.length > 0) initHintGesture(gallery); // init hint gesture element animation

    initKeyBoardNav(gallery);
  };

  function getGalleryWidth(gallery) {
    return gallery.list.scrollWidth - gallery.list.offsetWidth;
  };

  function initDragging(gallery) { // gallery drag
    new SwipeContent(gallery.element);
    gallery.element.addEventListener('dragStart', function(event){
      window.cancelAnimationFrame(gallery.dragAnimId);
      Util.addClass(gallery.element, 'drag-gallery--is-dragging'); 
      gallery.dragStart = event.detail.x;
      gallery.dragMStart = event.detail.x;
      gallery.dragTimeMStart = new Date().getTime();
      gallery.dragTimeMEnd = false;
      gallery.dragMSpeed = false;
      initDragEnd(gallery);
    });

    gallery.element.addEventListener('dragging', function(event){
      if(!gallery.dragStart) return;
      if(Math.abs(event.detail.x - gallery.dragStart) < 5) return;
      gallery.translate = Math.round(event.detail.x - gallery.dragStart + gallery.translate);
      gallery.dragStart = event.detail.x;
      checkTranslateValue(gallery);
      setTranslate(gallery);
    });
  };

  function initDragEnd(gallery) {
    gallery.element.addEventListener('dragEnd', function cb(event){
      gallery.element.removeEventListener('dragEnd', cb);
      Util.removeClass(gallery.element, 'drag-gallery--is-dragging');
      initMomentumDrag(gallery); // drag momentum
      gallery.dragStart = false;
    });
  };

  function initKeyBoardNav(gallery) {
    gallery.element.setAttribute('tabindex', 0);
    // navigate gallery using right/left arrows
    gallery.element.addEventListener('keyup', function(event){
      if( event.keyCode && event.keyCode == 39 || event.key && event.key.toLowerCase() == 'arrowright' ) {
        keyboardNav(gallery, 'right');
      } else if(event.keyCode && event.keyCode == 37 || event.key && event.key.toLowerCase() == 'arrowleft') {
        keyboardNav(gallery, 'left');
      }
    });
  };

  function keyboardNav(gallery, direction) {
    var delta = parseFloat(window.getComputedStyle(gallery.imgs[0]).marginRight) + gallery.imgs[0].offsetWidth;
    gallery.translate = (direction == 'right') ? gallery.translate - delta : gallery.translate + delta;
    checkTranslateValue(gallery);
    setTranslate(gallery);
  };

  function checkTranslateValue(gallery) { // make sure translate is in the right interval
    if(gallery.translate > 0) {
      gallery.translate = 0;
      gallery.dragMSpeed = 0;
    }
    if(Math.abs(gallery.translate) > gallery.galleryWidth) {
      gallery.translate = gallery.galleryWidth*-1;
      gallery.dragMSpeed = 0;
    }
  };

  function setTranslate(gallery) {
    gallery.list.style.transform = 'translateX('+gallery.translate+'px)';
    gallery.list.style.msTransform = 'translateX('+gallery.translate+'px)';
  };

  function initOpacityAnim(gallery) { // animate img opacities on drag
    for(var i = 0; i < gallery.imgs.length; i++) {
      var observer = new IntersectionObserver(opacityCallback.bind(gallery.imgs[i]), { threshold: [0, 0.1] });
      observer.observe(gallery.imgs[i]);
    }
  };

  function opacityCallback(entries, observer) { // reveal images when they enter the viewport
    var threshold = entries[0].intersectionRatio.toFixed(1);
    if(threshold > 0) {
      Util.addClass(this, 'drag-gallery__item--visible');
      observer.unobserve(this);
    }
  };

  function initMomentumDrag(gallery) {
    // momentum effect when drag is over
    if(reducedMotion) return;
    var timeNow = new Date().getTime();
    gallery.dragMSpeed = 0.95*(gallery.dragStart - gallery.dragMStart)/(timeNow - gallery.dragTimeMStart);

    var currentTime = false;

    function animMomentumDrag(timestamp) {
      if (!currentTime) currentTime = timestamp;         
      var progress = timestamp - currentTime;
      currentTime = timestamp;
      if(Math.abs(gallery.dragMSpeed) < 0.01) {
        gallery.dragAnimId = false;
        return;
      } else {
        gallery.translate = Math.round(gallery.translate + (gallery.dragMSpeed*progress));
        checkTranslateValue(gallery);
        setTranslate(gallery);
        gallery.dragMSpeed = gallery.dragMSpeed*0.95;
        gallery.dragAnimId = window.requestAnimationFrame(animMomentumDrag);
      }
    };

    gallery.dragAnimId = window.requestAnimationFrame(animMomentumDrag);
  };

  function initHintGesture(gallery) { // show user a hint about gallery dragging
    var observer = new IntersectionObserver(hintGestureCallback.bind(gallery.gestureHint[0]), { threshold: [0, 1] });
    observer.observe(gallery.gestureHint[0]);
  };

  function hintGestureCallback(entries, observer) {
    var threshold = entries[0].intersectionRatio.toFixed(1);
    if(threshold > 0) {
      Util.addClass(this, 'drag-gallery__gesture-hint--animate');
      observer.unobserve(this);
    }
  };

  //initialize the DragGallery objects
  var dragGallery = document.getElementsByClassName('js-drag-gallery'),
    intersectionObsSupported = ('IntersectionObserver' in window && 'IntersectionObserverEntry' in window && 'intersectionRatio' in window.IntersectionObserverEntry.prototype),
    reducedMotion = Util.osHasReducedMotion();

  if( dragGallery.length > 0 ) {
    var dragGalleryArray = [];
    for( var i = 0; i < dragGallery.length; i++) {
      (function(i){ 
        if(!intersectionObsSupported || reducedMotion) Util.addClass(dragGallery[i], 'drag-gallery--anim-off');
        dragGalleryArray.push(new DragGallery(dragGallery[i]));
      })(i);
    }

    // resize event
    var resizingId = false,
      customEvent = new CustomEvent('update-gallery-width');
    
    window.addEventListener('resize', function() {
      clearTimeout(resizingId);
      resizingId = setTimeout(doneResizing, 500);
    });

    function doneResizing() {
      for( var i = 0; i < dragGalleryArray.length; i++) {
        (function(i){dragGalleryArray[i].element.dispatchEvent(customEvent)})(i);
      };
    };
  }
}());
// File#: _2_drawer-navigation
// Usage: codyhouse.co/license
(function() {
    function initDrNavControl(element) {
      var circle = element.getElementsByTagName('circle');
      if(circle.length > 0) {
        // set svg attributes to create fill-in animation on click
        initCircleAttributes(element, circle[0]);
      }
  
      var drawerId = element.getAttribute('aria-controls'),
        drawer = document.getElementById(drawerId);
      if(drawer) {
        // when the drawer is closed without click (e.g., user presses 'Esc') -> reset trigger status
        drawer.addEventListener('drawerIsClose', function(event){ 
          if(!event.detail || (event.detail && !event.detail.closest('.js-dr-nav-control[aria-controls="'+drawerId+'"]')) ) resetTrigger(element);
        });
      }
    };
  
    function initCircleAttributes(element, circle) {
      // set circle stroke-dashoffset/stroke-dasharray values
      var circumference = (2*Math.PI*circle.getAttribute('r')).toFixed(2);
      circle.setAttribute('stroke-dashoffset', circumference);
      circle.setAttribute('stroke-dasharray', circumference);
      Util.addClass(element, 'dr-nav-control--ready-to-animate');
    };
  
    function resetTrigger(element) {
      Util.removeClass(element, 'anim-menu-btn--state-b'); 
    };
  
    var drNavControl = document.getElementsByClassName('js-dr-nav-control');
    if(drNavControl.length > 0) initDrNavControl(drNavControl[0]);
  }());
// File#: _2_dropdown
// Usage: codyhouse.co/license
(function() {
	var Dropdown = function(element) {
		this.element = element;
		this.trigger = this.element.getElementsByClassName('dropdown__trigger')[0];
		this.dropdown = this.element.getElementsByClassName('dropdown__menu')[0];
		this.triggerFocus = false;
		this.dropdownFocus = false;
		this.hideInterval = false;
		// sublevels
		this.dropdownSubElements = this.element.getElementsByClassName('dropdown__sub-wrapperu');
		this.prevFocus = false; // store element that was in focus before focus changed
		this.addDropdownEvents();
	};
	
	Dropdown.prototype.addDropdownEvents = function(){
		//place dropdown
		var self = this;
		this.placeElement();
		this.element.addEventListener('placeDropdown', function(event){
			self.placeElement();
		});
		// init dropdown
		this.initElementEvents(this.trigger, this.triggerFocus); // this is used to trigger the primary dropdown
		this.initElementEvents(this.dropdown, this.dropdownFocus); // this is used to trigger the primary dropdown
		// init sublevels
		this.initSublevels(); // if there are additional sublevels -> bind hover/focus events
	};

	Dropdown.prototype.placeElement = function() {
		var triggerPosition = this.trigger.getBoundingClientRect(),
			isRight = (window.innerWidth < triggerPosition.left + parseInt(getComputedStyle(this.dropdown).getPropertyValue('width')));

		var xPosition = isRight ? 'right: 0px; left: auto;' : 'left: 0px; right: auto;';
		this.dropdown.setAttribute('style', xPosition);
	};

	Dropdown.prototype.initElementEvents = function(element, bool) {
		var self = this;
		element.addEventListener('mouseenter', function(){
			bool = true;
			self.showDropdown();
		});
		element.addEventListener('focus', function(){
			self.showDropdown();
		});
		element.addEventListener('mouseleave', function(){
			bool = false;
			self.hideDropdown();
		});
		element.addEventListener('focusout', function(){
			self.hideDropdown();
		});
	};

	Dropdown.prototype.showDropdown = function(){
		if(this.hideInterval) clearInterval(this.hideInterval);
		this.showLevel(this.dropdown, true);
	};

	Dropdown.prototype.hideDropdown = function(){
		var self = this;
		if(this.hideInterval) clearInterval(this.hideInterval);
		this.hideInterval = setTimeout(function(){
			var dropDownFocus = document.activeElement.closest('.js-dropdown'),
				inFocus = dropDownFocus && (dropDownFocus == self.element);
			// if not in focus and not hover -> hide
			if(!self.triggerFocus && !self.dropdownFocus && !inFocus) {
				self.hideLevel(self.dropdown);
				// make sure to hide sub/dropdown
				self.hideSubLevels();
				self.prevFocus = false;
			}
		}, 300);
	};

	Dropdown.prototype.initSublevels = function(){
		var self = this;
		var dropdownMenu = this.element.getElementsByClassName('dropdown__menu');
		for(var i = 0; i < dropdownMenu.length; i++) {
			var listItems = dropdownMenu[i].children;
			// bind hover
	    new menuAim({
	      menu: dropdownMenu[i],
	      activate: function(row) {
	      	var subList = row.getElementsByClassName('dropdown__menu')[0];
	      	if(!subList) return;
	      	Util.addClass(row.querySelector('a'), 'dropdown__item--hover');
	      	self.showLevel(subList);
	      },
	      deactivate: function(row) {
	      	var subList = row.getElementsByClassName('dropdown__menu')[0];
	      	if(!subList) return;
	      	Util.removeClass(row.querySelector('a'), 'dropdown__item--hover');
	      	self.hideLevel(subList);
	      },
	      submenuSelector: '.dropdown__sub-wrapper',
	    });
		}
		// store focus element before change in focus
		this.element.addEventListener('keydown', function(event) { 
			if( event.keyCode && event.keyCode == 9 || event.key && event.key == 'Tab' ) {
				self.prevFocus = document.activeElement;
			}
		});
		// make sure that sublevel are visible when their items are in focus
		this.element.addEventListener('keyup', function(event) {
			if( event.keyCode && event.keyCode == 9 || event.key && event.key == 'Tab' ) {
				// focus has been moved -> make sure the proper classes are added to subnavigation
				var focusElement = document.activeElement,
					focusElementParent = focusElement.closest('.dropdown__menu'),
					focusElementSibling = focusElement.nextElementSibling;

				// if item in focus is inside submenu -> make sure it is visible
				if(focusElementParent && !Util.hasClass(focusElementParent, 'dropdown__menu--is-visible')) {
					self.showLevel(focusElementParent);
				}
				// if item in focus triggers a submenu -> make sure it is visible
				if(focusElementSibling && !Util.hasClass(focusElementSibling, 'dropdown__menu--is-visible')) {
					self.showLevel(focusElementSibling);
				}

				// check previous element in focus -> hide sublevel if required 
				if( !self.prevFocus) return;
				var prevFocusElementParent = self.prevFocus.closest('.dropdown__menu'),
					prevFocusElementSibling = self.prevFocus.nextElementSibling;
				
				if( !prevFocusElementParent ) return;
				
				// element in focus and element prev in focus are siblings
				if( focusElementParent && focusElementParent == prevFocusElementParent) {
					if(prevFocusElementSibling) self.hideLevel(prevFocusElementSibling);
					return;
				}

				// element in focus is inside submenu triggered by element prev in focus
				if( prevFocusElementSibling && focusElementParent && focusElementParent == prevFocusElementSibling) return;
				
				// shift tab -> element in focus triggers the submenu of the element prev in focus
				if( focusElementSibling && prevFocusElementParent && focusElementSibling == prevFocusElementParent) return;
				
				var focusElementParentParent = focusElementParent.parentNode.closest('.dropdown__menu');
				
				// shift tab -> element in focus is inside the dropdown triggered by a siblings of the element prev in focus
				if(focusElementParentParent && focusElementParentParent == prevFocusElementParent) {
					if(prevFocusElementSibling) self.hideLevel(prevFocusElementSibling);
					return;
				}
				
				if(prevFocusElementParent && Util.hasClass(prevFocusElementParent, 'dropdown__menu--is-visible')) {
					self.hideLevel(prevFocusElementParent);
				}
			}
		});
	};

	Dropdown.prototype.hideSubLevels = function(){
		var visibleSubLevels = this.dropdown.getElementsByClassName('dropdown__menu--is-visible');
		if(visibleSubLevels.length == 0) return;
		while (visibleSubLevels[0]) {
			this.hideLevel(visibleSubLevels[0]);
	 	}
	 	var hoveredItems = this.dropdown.getElementsByClassName('dropdown__item--hover');
	 	while (hoveredItems[0]) {
			Util.removeClass(hoveredItems[0], 'dropdown__item--hover');
	 	}
	};

	Dropdown.prototype.showLevel = function(level, bool){
		if(bool == undefined) {
			//check if the sublevel needs to be open to the left
			Util.removeClass(level, 'dropdown__menu--left');
			var boundingRect = level.getBoundingClientRect();
			if(window.innerWidth - boundingRect.right < 5 && boundingRect.left + window.scrollX > 2*boundingRect.width) Util.addClass(level, 'dropdown__menu--left');
		}
		Util.addClass(level, 'dropdown__menu--is-visible');
		Util.removeClass(level, 'dropdown__menu--is-hidden');
	};

	Dropdown.prototype.hideLevel = function(level){
		if(!Util.hasClass(level, 'dropdown__menu--is-visible')) return;
		Util.removeClass(level, 'dropdown__menu--is-visible');
		Util.addClass(level, 'dropdown__menu--is-hidden');
		
		level.addEventListener('animationend', function cb(){
			level.removeEventListener('animationend', cb);
			Util.removeClass(level, 'dropdown__menu--is-hidden dropdown__menu--left');
		});
	};


	var dropdown = document.getElementsByClassName('js-dropdown');
	if( dropdown.length > 0 ) { // init Dropdown objects
		for( var i = 0; i < dropdown.length; i++) {
			(function(i){new Dropdown(dropdown[i]);})(i);
		}
	}
}());
// File#: _2_flexi-header
// Usage: codyhouse.co/license
(function() {
  var flexHeader = document.getElementsByClassName('js-f-header');
	if(flexHeader.length > 0) {
		var menuTrigger = flexHeader[0].getElementsByClassName('js-anim-menu-btn')[0],
			firstFocusableElement = getMenuFirstFocusable();

		// we'll use these to store the node that needs to receive focus when the mobile menu is closed 
		var focusMenu = false;

		menuTrigger.addEventListener('anim-menu-btn-clicked', function(event){ // toggle menu visibility an small devices
			Util.toggleClass(document.getElementsByClassName('f-header__nav')[0], 'f-header__nav--is-visible', event.detail);
			menuTrigger.setAttribute('aria-expanded', event.detail);
			if(event.detail) firstFocusableElement.focus(); // move focus to first focusable element
			else if(focusMenu) {
				focusMenu.focus();
				focusMenu = false;
			}
		});

		// listen for key events
		window.addEventListener('keyup', function(event){
			// listen for esc key
			if( (event.keyCode && event.keyCode == 27) || (event.key && event.key.toLowerCase() == 'escape' )) {
				// close navigation on mobile if open
				if(menuTrigger.getAttribute('aria-expanded') == 'true' && isVisible(menuTrigger)) {
					focusMenu = menuTrigger; // move focus to menu trigger when menu is close
					menuTrigger.click();
				}
			}
			// listen for tab key
			if( (event.keyCode && event.keyCode == 9) || (event.key && event.key.toLowerCase() == 'tab' )) {
				// close navigation on mobile if open when nav loses focus
				if(menuTrigger.getAttribute('aria-expanded') == 'true' && isVisible(menuTrigger) && !document.activeElement.closest('.js-f-header')) menuTrigger.click();
			}
		});

		function getMenuFirstFocusable() {
			var focusableEle = flexHeader[0].getElementsByClassName('f-header__nav')[0].querySelectorAll('[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex]:not([tabindex="-1"]), [contenteditable], audio[controls], video[controls], summary'),
				firstFocusable = false;
			for(var i = 0; i < focusableEle.length; i++) {
				if( focusableEle[i].offsetWidth || focusableEle[i].offsetHeight || focusableEle[i].getClientRects().length ) {
					firstFocusable = focusableEle[i];
					break;
				}
			}

			return firstFocusable;
    };
    
    function isVisible(element) {
      return (element.offsetWidth || element.offsetHeight || element.getClientRects().length);
    };
	}
}());
// File#: _2_interactive-table
// Usage: codyhouse.co/license
(function() {
    var IntTable = function(element) {
      this.element = element;
      this.header = this.element.getElementsByClassName('js-int-table__header')[0];
      this.headerCols = this.header.getElementsByTagName('tr')[0].children;
      this.body = this.element.getElementsByClassName('js-int-table__body')[0];
      this.sortingRows = this.element.getElementsByClassName('js-int-table__sort-row');
      initIntTable(this);
    };
  
    function initIntTable(table) {
      // check if there are checkboxes to select/deselect a row/all rows
      var selectAll = table.element.getElementsByClassName('js-int-table__select-all');
      if(selectAll.length > 0) initIntTableSelection(table, selectAll);
      
      // check if there are sortable columns
      table.sortableCols = table.element.getElementsByClassName('js-int-table__cell--sort');
      if(table.sortableCols.length > 0) {
        // add a data-order attribute to all rows so that we can reset the order
        setDataRowOrder(table);
        // listen to the click event on a sortable column
        table.header.addEventListener('click', function(event){
          var selectedCol = event.target.closest('.js-int-table__cell--sort');
          if(!selectedCol || event.target.tagName.toLowerCase() == 'input') return;
          sortColumns(table, selectedCol);
        });
        table.header.addEventListener('change', function(event){ // detect change in selected checkbox (SR only)
          var selectedCol = event.target.closest('.js-int-table__cell--sort');
          if(!selectedCol) return;
          sortColumns(table, selectedCol, event.target.value);
        });
        table.header.addEventListener('keydown', function(event){ // keyboard navigation - change sorting on enter
          if( event.keyCode && event.keyCode == 13 || event.key && event.key.toLowerCase() == 'enter') {
            var selectedCol = event.target.closest('.js-int-table__cell--sort');
            if(!selectedCol) return;
            sortColumns(table, selectedCol);
          }
        });
  
        // change cell style when in focus
        table.header.addEventListener('focusin', function(event){
          var closestCell = document.activeElement.closest('.js-int-table__cell--sort');
          if(closestCell) Util.addClass(closestCell, 'int-table__cell--focus');
        });
        table.header.addEventListener('focusout', function(event){
          for(var i = 0; i < table.sortableCols.length; i++) {
            Util.removeClass(table.sortableCols[i], 'int-table__cell--focus');
          }
        });
      }
    };
  
    function initIntTableSelection(table, select) { // checkboxes for rows selection
      table.selectAll = select[0];
      table.selectRow = table.element.getElementsByClassName('js-int-table__select-row');
      // select/deselect all rows
      table.selectAll.addEventListener('click', function(event){ // we cannot use the 'change' event as on IE/Edge the change from "indeterminate" to either "checked" or "unchecked"  does not trigger that event
        toggleRowSelection(table);
      });
      // select/deselect single row - reset all row selector 
      table.body.addEventListener('change', function(event){
        if(!event.target.closest('.js-int-table__select-row')) return;
        toggleAllSelection(table);
      });
    };
  
    function toggleRowSelection(table) { // 'Select All Rows' checkbox has been selected/deselected
      var status = table.selectAll.checked;
      for(var i = 0; i < table.selectRow.length; i++) {
        table.selectRow[i].checked = status;
        Util.toggleClass(table.selectRow[i].closest('.int-table__row'), 'int-table__row--checked', status);
      }
    };
  
    function toggleAllSelection(table) { // Single row has been selected/deselected
      var allChecked = true,
        oneChecked = false;
      for(var i = 0; i < table.selectRow.length; i++) {
        if(!table.selectRow[i].checked) {allChecked = false;}
        else {oneChecked = true;}
        Util.toggleClass(table.selectRow[i].closest('.int-table__row'), 'int-table__row--checked', table.selectRow[i].checked);
      }
      table.selectAll.checked = oneChecked;
      // if status if false but one input is checked -> set an indeterminate state for the 'Select All' checkbox
      if(!allChecked) table.selectAll.indeterminate = oneChecked;
    };
  
    function setDataRowOrder(table) { // add a data-order to rows element - will be used when resetting the sorting 
      var rowsArray = table.body.getElementsByTagName('tr');
      for(var i = 0; i < rowsArray.length; i++) {
        rowsArray[i].setAttribute('data-order', i);
      }
    };
  
    function sortColumns(table, selectedCol, customOrder) {
      // determine sorting order (asc/desc/reset)
      var order = customOrder || getSortingOrder(selectedCol),
        colIndex = Util.getIndexInArray(table.headerCols, selectedCol);
      // sort table
      sortTableContent(table, order, colIndex, selectedCol);
      
      // reset appearance of the th column that was previously sorted (if any) 
      for(var i = 0; i < table.headerCols.length; i++) {
        Util.removeClass(table.headerCols[i], 'int-table__cell--asc int-table__cell--desc');
      }
      // reset appearance for the selected th column
      if(order == 'asc') Util.addClass(selectedCol, 'int-table__cell--asc');
      if(order == 'desc') Util.addClass(selectedCol, 'int-table__cell--desc');
      // reset checkbox selection
      if(!customOrder) selectedCol.querySelector('input[value="'+order+'"]').checked = true;
    };
  
    function getSortingOrder(selectedCol) { // determine sorting order
      if( Util.hasClass(selectedCol, 'int-table__cell--asc') ) return 'desc';
      if( Util.hasClass(selectedCol, 'int-table__cell--desc') ) return 'none';
      return 'asc';
    };
  
    function sortTableContent(table, order, index, selctedCol) { // determine the new order of the rows
      var rowsArray = table.body.getElementsByTagName('tr'),
        switching = true,
        i = 0,
        shouldSwitch;
      while (switching) {
        switching = false;
        for (i = 0; i < rowsArray.length - 1; i++) {
          var contentOne = (order == 'none') ? rowsArray[i].getAttribute('data-order') : rowsArray[i].children[index].textContent.trim(),
            contentTwo = (order == 'none') ? rowsArray[i+1].getAttribute('data-order') : rowsArray[i+1].children[index].textContent.trim();
  
          shouldSwitch = compareValues(contentOne, contentTwo, order, selctedCol);
          if(shouldSwitch) {
            table.body.insertBefore(rowsArray[i+1], rowsArray[i]);
            switching = true;
            break;
          }
        }
      }
    };
  
    function compareValues(val1, val2, order, selctedCol) {
      var compare,
        dateComparison = selctedCol.getAttribute('data-date-format');
      if( dateComparison && order != 'none') { // comparing dates
        compare =  (order == 'asc' || order == 'none') ? parseCustomDate(val1, dateComparison) > parseCustomDate(val2, dateComparison) : parseCustomDate(val2, dateComparison) > parseCustomDate(val1, dateComparison);
      } else if( !isNaN(val1) && !isNaN(val2) ) { // comparing numbers
        compare =  (order == 'asc' || order == 'none') ? Number(val1) > Number(val2) : Number(val2) > Number(val1);
      } else { // comparing strings
        compare =  (order == 'asc' || order == 'none') 
          ? val2.toString().localeCompare(val1) < 0
          : val1.toString().localeCompare(val2) < 0;
      }
      return compare;
    };
  
    function parseCustomDate(date, format) {
      var parts = date.match(/(\d+)/g), 
        i = 0, fmt = {};
      // extract date-part indexes from the format
      format.replace(/(yyyy|dd|mm)/g, function(part) { fmt[part] = i++; });
  
      return new Date(parts[fmt['yyyy']], parts[fmt['mm']]-1, parts[fmt['dd']]);
    };
  
    //initialize the IntTable objects
    var intTable = document.getElementsByClassName('js-int-table');
    if( intTable.length > 0 ) {
      for( var i = 0; i < intTable.length; i++) {
        (function(i){new IntTable(intTable[i]);})(i);
      }
    }
  }());
// File#: _2_menu-bar
// Usage: codyhouse.co/license
(function() {
    var MenuBar = function(element) {
      this.element = element;
      this.items = Util.getChildrenByClassName(this.element, 'menu-bar__item');
      this.mobHideItems = this.element.getElementsByClassName('menu-bar__item--hide');
      this.moreItemsTrigger = this.element.getElementsByClassName('js-menu-bar__trigger');
      initMenuBar(this);
    };
  
    function initMenuBar(menu) {
      setMenuTabIndex(menu); // set correct tabindexes for menu item
      initMenuBarMarkup(menu); // create additional markup
      checkMenuLayout(menu); // set menu layout
      Util.addClass(menu.element, 'menu-bar--loaded'); // reveal menu
  
      // custom event emitted when window is resized
      menu.element.addEventListener('update-menu-bar', function(event){
        checkMenuLayout(menu);
        if(menu.menuInstance) menu.menuInstance.toggleMenu(false, false); // close dropdown
      });
  
      // keyboard events 
      // open dropdown when pressing Enter on trigger element
      if(menu.moreItemsTrigger.length > 0) {
        menu.moreItemsTrigger[0].addEventListener('keydown', function(event) {
          if( (event.keyCode && event.keyCode == 13) || (event.key && event.key.toLowerCase() == 'enter') ) {
            if(!menu.menuInstance) return;
            menu.menuInstance.selectedTrigger = menu.moreItemsTrigger[0];
            menu.menuInstance.toggleMenu(!Util.hasClass(menu.subMenu, 'menu--is-visible'), true);
          }
        });
  
        // close dropdown on esc
        menu.subMenu.addEventListener('keydown', function(event) {
          if((event.keyCode && event.keyCode == 27) || (event.key && event.key.toLowerCase() == 'escape')) { // close submenu on esc
            if(menu.menuInstance) menu.menuInstance.toggleMenu(false, true);
          }
        });
      }
      
      // navigate menu items using left/right arrows
      menu.element.addEventListener('keydown', function(event) {
        if( (event.keyCode && event.keyCode == 39) || (event.key && event.key.toLowerCase() == 'arrowright') ) {
          navigateItems(menu.items, event, 'next');
        } else if( (event.keyCode && event.keyCode == 37) || (event.key && event.key.toLowerCase() == 'arrowleft') ) {
          navigateItems(menu.items, event, 'prev');
        }
      });
    };
  
    function setMenuTabIndex(menu) { // set tabindexes for the menu items to allow keyboard navigation
      var nextItem = false;
      for(var i = 0; i < menu.items.length; i++ ) {
        if(i == 0 || nextItem) menu.items[i].setAttribute('tabindex', '0');
        else menu.items[i].setAttribute('tabindex', '-1');
        if(i == 0 && menu.moreItemsTrigger.length > 0) nextItem = true;
        else nextItem = false;
      }
    };
  
    function initMenuBarMarkup(menu) {
      if(menu.mobHideItems.length == 0 ) { // no items to hide on mobile - remove trigger
        if(menu.moreItemsTrigger.length > 0) menu.element.removeChild(menu.moreItemsTrigger[0]);
        return;
      }
  
      if(menu.moreItemsTrigger.length == 0) return;
  
      // create the markup for the Menu element
      var content = '';
      menu.menuControlId = 'submenu-bar-'+Date.now();
      for(var i = 0; i < menu.mobHideItems.length; i++) {
        var item = menu.mobHideItems[i].cloneNode(true),
          svg = item.getElementsByTagName('svg')[0],
          label = item.getElementsByClassName('menu-bar__label')[0];
  
        svg.setAttribute('class', 'icon menu__icon');
        content = content + '<li role="menuitem"><span class="menu__content js-menu__content">'+svg.outerHTML+'<span>'+label.innerHTML+'</span></span></li>';
      }
  
      Util.setAttributes(menu.moreItemsTrigger[0], {'role': 'button', 'aria-expanded': 'false', 'aria-controls': menu.menuControlId, 'aria-haspopup': 'true'});
  
      var subMenu = document.createElement('menu'),
        customClass = menu.element.getAttribute('data-menu-class');
      Util.setAttributes(subMenu, {'id': menu.menuControlId, 'class': 'menu js-menu '+customClass});
      subMenu.innerHTML = content;
      document.body.appendChild(subMenu);
  
      menu.subMenu = subMenu;
      menu.subItems = subMenu.getElementsByTagName('li');
  
      menu.menuInstance = new Menu(menu.subMenu); // this will handle the dropdown behaviour
    };
  
    function checkMenuLayout(menu) { // switch from compressed to expanded layout and viceversa
      var layout = getComputedStyle(menu.element, ':before').getPropertyValue('content').replace(/\'|"/g, '');
      Util.toggleClass(menu.element, 'menu-bar--collapsed', layout == 'collapsed');
    };
  
    function navigateItems(list, event, direction, prevIndex) { // keyboard navigation among menu items
      event.preventDefault();
      var index = (typeof prevIndex !== 'undefined') ? prevIndex : Util.getIndexInArray(list, event.target),
        nextIndex = direction == 'next' ? index + 1 : index - 1;
      if(nextIndex < 0) nextIndex = list.length - 1;
      if(nextIndex > list.length - 1) nextIndex = 0;
      // check if element is visible before moving focus
      (list[nextIndex].offsetParent === null) ? navigateItems(list, event, direction, nextIndex) : Util.moveFocus(list[nextIndex]);
    };
  
    function checkMenuClick(menu, target) { // close dropdown when clicking outside the menu element
      if(menu.menuInstance && !menu.moreItemsTrigger[0].contains(target) && !menu.subMenu.contains(target)) menu.menuInstance.toggleMenu(false, false);
    };
  
    // init MenuBars objects
    var menuBars = document.getElementsByClassName('js-menu-bar');
    if( menuBars.length > 0 ) {
      var j = 0,
        menuBarArray = [];
      for( var i = 0; i < menuBars.length; i++) {
        var beforeContent = getComputedStyle(menuBars[i], ':before').getPropertyValue('content');
        if(beforeContent && beforeContent !='' && beforeContent !='none') {
          (function(i){menuBarArray.push(new MenuBar(menuBars[i]));})(i);
          j = j + 1;
        }
      }
      
      if(j > 0) {
        var resizingId = false,
          customEvent = new CustomEvent('update-menu-bar');
        // update Menu Bar layout on resize  
        window.addEventListener('resize', function(event){
          clearTimeout(resizingId);
          resizingId = setTimeout(doneResizing, 150);
        });
  
        // close menu when clicking outside it
        window.addEventListener('click', function(event){
          menuBarArray.forEach(function(element){
            checkMenuClick(element, event.target);
          });
        });
  
        function doneResizing() {
          for( var i = 0; i < menuBars.length; i++) {
            (function(i){menuBars[i].dispatchEvent(customEvent)})(i);
          };
        };
      }
    }
  }());
// File#: _2_multiple-custom-select
// Usage: codyhouse.co/license
(function() {
    var MultiCustomSelect = function(element) {
      this.element = element;
      this.select = this.element.getElementsByTagName('select')[0];
      this.optGroups = this.select.getElementsByTagName('optgroup');
      this.options = this.select.getElementsByTagName('option');
      this.selectId = this.select.getAttribute('id');
      this.trigger = false;
      this.dropdown = false;
      this.customOptions = false;
      this.arrowIcon = this.element.getElementsByTagName('svg');
      this.label = document.querySelector('[for="'+this.selectId+'"]');
      this.selectedOptCounter = 0;
  
      this.optionIndex = 0; // used while building the custom dropdown
  
      // label options
      this.noSelectText = this.element.getAttribute('data-no-select-text') || 'Select';
      this.multiSelectText = this.element.getAttribute('data-multi-select-text') || '{n} items selected'; 
      this.nMultiSelect = this.element.getAttribute('data-n-multi-select') || 1;
      this.noUpdateLabel = this.element.getAttribute('data-update-text') && this.element.getAttribute('data-update-text') == 'off';
      this.insetLabel = this.element.getAttribute('data-inset-label') && this.element.getAttribute('data-inset-label') == 'on';
  
      // init
      initCustomSelect(this); // init markup
      initCustomSelectEvents(this); // init event listeners
    };
    
    function initCustomSelect(select) {
      // create the HTML for the custom dropdown element
      select.element.insertAdjacentHTML('beforeend', initButtonSelect(select) + initListSelect(select));
      
      // save custom elements
      select.dropdown = select.element.getElementsByClassName('js-multi-select__dropdown')[0];
      select.trigger = select.element.getElementsByClassName('js-multi-select__button')[0];
      select.customOptions = select.dropdown.getElementsByClassName('js-multi-select__option');
      
      // hide default select
      Util.addClass(select.select, 'is-hidden');
      if(select.arrowIcon.length > 0 ) select.arrowIcon[0].style.display = 'none';
    };
  
    function initCustomSelectEvents(select) {
      // option selection in dropdown
      initSelection(select);
  
      // click events
      select.trigger.addEventListener('click', function(event){
        event.preventDefault();
        toggleCustomSelect(select, false);
      });
      if(select.label) {
        // move focus to custom trigger when clicking on <select> label
        select.label.addEventListener('click', function(){
          Util.moveFocus(select.trigger);
        });
      }
      // keyboard navigation
      select.dropdown.addEventListener('keydown', function(event){
        if(event.keyCode && event.keyCode == 38 || event.key && event.key.toLowerCase() == 'arrowup') {
          keyboardCustomSelect(select, 'prev', event);
        } else if(event.keyCode && event.keyCode == 40 || event.key && event.key.toLowerCase() == 'arrowdown') {
          keyboardCustomSelect(select, 'next', event);
        }
      });
    };
  
    function toggleCustomSelect(select, bool) {
      var ariaExpanded;
      if(bool) {
        ariaExpanded = bool;
      } else {
        ariaExpanded = select.trigger.getAttribute('aria-expanded') == 'true' ? 'false' : 'true';
      }
      select.trigger.setAttribute('aria-expanded', ariaExpanded);
      if(ariaExpanded == 'true') {
        var selectedOption = getSelectedOption(select);
        Util.moveFocus(selectedOption); // fallback if transition is not supported
        select.dropdown.addEventListener('transitionend', function cb(){
          Util.moveFocus(selectedOption);
          select.dropdown.removeEventListener('transitionend', cb);
        });
        placeDropdown(select); // place dropdown based on available space
      }
    };
  
    function placeDropdown(select) {
      var triggerBoundingRect = select.trigger.getBoundingClientRect();
      Util.toggleClass(select.dropdown, 'multi-select__dropdown--right', (window.innerWidth < triggerBoundingRect.left + select.dropdown.offsetWidth));
      // check if there's enough space up or down
      var moveUp = (window.innerHeight - triggerBoundingRect.bottom) < triggerBoundingRect.top;
      Util.toggleClass(select.dropdown, 'multi-select__dropdown--up', moveUp);
      // check if we need to set a max height
      var maxHeight = moveUp ? triggerBoundingRect.top - 20 : window.innerHeight - triggerBoundingRect.bottom - 20;
      // set max-height (based on available space) and width
      select.dropdown.setAttribute('style', 'max-height: '+maxHeight+'px; width: '+triggerBoundingRect.width+'px;');
    };
  
    function keyboardCustomSelect(select, direction, event) { // navigate custom dropdown with keyboard
      event.preventDefault();
      var index = Util.getIndexInArray(select.customOptions, document.activeElement.closest('.js-multi-select__option'));
      index = (direction == 'next') ? index + 1 : index - 1;
      if(index < 0) index = select.customOptions.length - 1;
      if(index >= select.customOptions.length) index = 0;
      Util.moveFocus(select.customOptions[index].getElementsByClassName('js-multi-select__checkbox')[0]);
    };
  
    function initSelection(select) { // option selection
      select.dropdown.addEventListener('change', function(event){
        var option = event.target.closest('.js-multi-select__option');
        if(!option) return;
        selectOption(select, option);
      });
      select.dropdown.addEventListener('click', function(event){
        var option = event.target.closest('.js-multi-select__option');
        if(!option || !Util.hasClass(event.target, 'js-multi-select__option')) return;
        selectOption(select, option);
      });
    };
    
    function selectOption(select, option) {
      if(option.hasAttribute('aria-selected') && option.getAttribute('aria-selected') == 'true') {
        // deselecting that option
        option.setAttribute('aria-selected', 'false');
        // update native select element
        updateNativeSelect(select, option.getAttribute('data-index'), false);
      } else { 
        option.setAttribute('aria-selected', 'true');
        // update native select element
        updateNativeSelect(select, option.getAttribute('data-index'), true);
        
      }
      var triggerLabel = getSelectedOptionText(select);
      select.trigger.getElementsByClassName('js-multi-select__label')[0].innerHTML = triggerLabel[0]; // update trigger label
      Util.toggleClass(select.trigger, 'multi-select__button--active', select.selectedOptCounter > 0);
      updateTriggerAria(select, triggerLabel[1]); // update trigger arai-label
    };
  
    function updateNativeSelect(select, index, bool) {
      select.options[index].selected = bool;
      select.select.dispatchEvent(new CustomEvent('change', {bubbles: true})); // trigger change event
    };
  
    function updateTriggerAria(select, ariaLabel) { // new label for custom triegger
      select.trigger.setAttribute('aria-label', ariaLabel);
    };
  
    function getSelectedOptionText(select) {// used to initialize the label of the custom select button
      var noSelectionText = '<span class="multi-select__term">'+select.noSelectText+'</span>';
      if(select.noUpdateLabel) return [noSelectionText, select.noSelectText];
      var label = '';
      var ariaLabel = '';
      select.selectedOptCounter = 0;
  
      for (var i = 0; i < select.options.length; i++) {
        if(select.options[i].selected) {
          if(select.selectedOptCounter != 0 ) label = label + ', '
          label = label + '' + select.options[i].text;
          select.selectedOptCounter = select.selectedOptCounter + 1;
        } 
      }
  
      if(select.selectedOptCounter > select.nMultiSelect) {
        label = '<span class="multi-select__details">'+select.multiSelectText.replace('{n}', select.selectedOptCounter)+'</span>';
        ariaLabel = select.multiSelectText.replace('{n}', select.selectedOptCounter)+', '+select.noSelectText;
      } else if( select.selectedOptCounter > 0) {
        ariaLabel = label + ', ' +select.noSelectText;
        label = '<span class="multi-select__details">'+label+'</span>';
      } else {
        label = noSelectionText;
        ariaLabel = select.noSelectText;
      }
  
      if(select.insetLabel && select.selectedOptCounter > 0) label = noSelectionText+label;
      return [label, ariaLabel];
    };
    
    function initButtonSelect(select) { // create the button element -> custom select trigger
      // check if we need to add custom classes to the button trigger
      var customClasses = select.element.getAttribute('data-trigger-class') ? ' '+select.element.getAttribute('data-trigger-class') : '';
  
      var triggerLabel = getSelectedOptionText(select);	
      var activeSelectionClass = select.selectedOptCounter > 0 ? ' multi-select__button--active' : '';
      
      var button = '<button class="js-multi-select__button multi-select__button'+customClasses+activeSelectionClass+'" aria-label="'+triggerLabel[1]+'" aria-expanded="false" aria-controls="'+select.selectId+'-dropdown"><span aria-hidden="true" class="js-multi-select__label multi-select__label">'+triggerLabel[0]+'</span>';
      if(select.arrowIcon.length > 0 && select.arrowIcon[0].outerHTML) {
        button = button +select.arrowIcon[0].outerHTML;
      }
      
      return button+'</button>';
  
    };
  
    function initListSelect(select) { // create custom select dropdown
      var list = '<div class="js-multi-select__dropdown multi-select__dropdown" aria-describedby="'+select.selectId+'-description" id="'+select.selectId+'-dropdown">';
      list = list + getSelectLabelSR(select);
      if(select.optGroups.length > 0) {
        for(var i = 0; i < select.optGroups.length; i++) {
          var optGroupList = select.optGroups[i].getElementsByTagName('option'),
            optGroupLabel = '<li><span class="multi-select__item multi-select__item--optgroup">'+select.optGroups[i].getAttribute('label')+'</span></li>';
          list = list + '<ul class="multi-select__list" role="listbox" aria-multiselectable="true">'+optGroupLabel+getOptionsList(select, optGroupList) + '</ul>';
        }
      } else {
        list = list + '<ul class="multi-select__list" role="listbox" aria-multiselectable="true">'+getOptionsList(select, select.options) + '</ul>';
      }
      return list;
    };
  
    function getSelectLabelSR(select) {
      if(select.label) {
        return '<p class="sr-only" id="'+select.selectId+'-description">'+select.label.textContent+'</p>'
      } else {
        return '';
      }
    };
  
    function getOptionsList(select, options) {
      var list = '';
      for(var i = 0; i < options.length; i++) {
        var selected = options[i].hasAttribute('selected') ? ' aria-selected="true"' : ' aria-selected="false"',
          checked = options[i].hasAttribute('selected') ? 'checked' : '';
        list = list + '<li class="js-multi-select__option" role="option" data-value="'+options[i].value+'" '+selected+' data-label="'+options[i].text+'" data-index="'+select.optionIndex+'"><input aria-hidden="true" class="checkbox js-multi-select__checkbox" type="checkbox" id="'+options[i].value+'-'+select.optionIndex+'" '+checked+'><label class="multi-select__item multi-select__item--option" aria-hidden="true" for="'+options[i].value+'-'+select.optionIndex+'"><span>'+options[i].text+'</span></label></li>';
        select.optionIndex = select.optionIndex + 1;
      };
      return list;
    };
  
    function getSelectedOption(select) { // return first selected option
      var option = select.dropdown.querySelector('[aria-selected="true"]');
      if(option) return option.getElementsByClassName('js-multi-select__checkbox')[0];
      else return select.dropdown.getElementsByClassName('js-multi-select__option')[0].getElementsByClassName('js-multi-select__checkbox')[0];
    };
  
    function moveFocusToSelectTrigger(select) {
      if(!document.activeElement.closest('.js-multi-select')) return
      select.trigger.focus();
    };
    
    function checkCustomSelectClick(select, target) { // close select when clicking outside it
      if( !select.element.contains(target) ) toggleCustomSelect(select, 'false');
    };
    
    //initialize the CustomSelect objects
    var customSelect = document.getElementsByClassName('js-multi-select');
    if( customSelect.length > 0 ) {
      var selectArray = [];
      for( var i = 0; i < customSelect.length; i++) {
        (function(i){selectArray.push(new MultiCustomSelect(customSelect[i]));})(i);
      }
  
      // listen for key events
      window.addEventListener('keyup', function(event){
        if( event.keyCode && event.keyCode == 27 || event.key && event.key.toLowerCase() == 'escape' ) {
          // close custom select on 'Esc'
          selectArray.forEach(function(element){
            moveFocusToSelectTrigger(element); // if focus is within dropdown, move it to dropdown trigger
            toggleCustomSelect(element, 'false'); // close dropdown
          });
        } 
      });
      // close custom select when clicking outside it
      window.addEventListener('click', function(event){
        selectArray.forEach(function(element){
          checkCustomSelectClick(element, event.target);
        });
      });
    }
  }());
// File#: _2_sticky-sharebar
// Usage: codyhouse.co/license
(function() {
    var StickyShareBar = function(element) {
      this.element = element;
      this.contentTarget = document.getElementsByClassName('js-sticky-sharebar-target');
      this.showClass = 'sticky-sharebar--on-target';
      this.threshold = '50%'; // Share Bar will be revealed when .js-sticky-sharebar-target element reaches 50% of the viewport
      initShareBar(this);
    };
  
    function initShareBar(shareBar) {
      if(shareBar.contentTarget.length < 1) {
        Util.addClass(shareBar.element, shareBar.showClass);
        return;
      }
      if(intersectionObserverSupported) {
        initObserver(shareBar); // update anchor appearance on scroll
      } else {
        Util.addClass(shareBar.element, shareBar.showClass);
      }
    };
  
    function initObserver(shareBar) {
      var observer = new IntersectionObserver(
        function(entries, observer) { 
          Util.toggleClass(shareBar.element, shareBar.showClass, entries[0].isIntersecting);
        }, 
        {rootMargin: "0px 0px -"+shareBar.threshold+" 0px"}
      );
      observer.observe(shareBar.contentTarget[0]);
    };
  
    //initialize the StickyShareBar objects
    var stickyShareBar = document.getElementsByClassName('js-sticky-sharebar'),
      intersectionObserverSupported = ('IntersectionObserver' in window && 'IntersectionObserverEntry' in window && 'intersectionRatio' in window.IntersectionObserverEntry.prototype);
    
    if( stickyShareBar.length > 0 ) {
      for( var i = 0; i < stickyShareBar.length; i++) {
        (function(i){ new StickyShareBar(stickyShareBar[i]); })(i);
      }
    }
  }());
// File#: _2_table-of-contents
// Usage: codyhouse.co/license
(function() {
    var Toc = function(element) {
      this.element = element;
      this.list = this.element.getElementsByClassName('js-toc__list')[0];
      this.anchors = this.list.querySelectorAll('a[href^="#"]');
      this.sections = getSections(this);
      this.clickScrolling = false;
      this.intervalID = false;
      initToc(this);
    };
  
    function getSections(toc) {
      var sections = [];
      // get all content sections
      for(var i = 0; i < toc.anchors.length; i++) {
        var section = document.getElementById(toc.anchors[i].getAttribute('href').replace('#', ''));
        if(section) sections.push(section);
      }
      return sections;
    };
  
    function initToc(toc) {
      // listen for click on anchors
      toc.list.addEventListener('click', function(event){
        var anchor = event.target.closest('a[href^="#"]');
        if(!anchor) return;
        // reset link apperance 
        toc.clickScrolling = true;
        resetAnchors(toc, anchor);
      });
  
      // check when a new section enters the viewport
      var observer = new IntersectionObserver(
        function(entries, observer) { 
          entries.forEach(function(entry){
            if(!toc.clickScrolling) { // do not update classes if user clicked on a link
              getVisibleSection(toc);
            }
          });
        }, 
        {
          threshold: [0, 0.1],
          rootMargin: "0px 0px -70% 0px"
        }
      );
  
      for(var i = 0; i < toc.sections.length; i++) {
        observer.observe(toc.sections[i]);
      }
  
      // detect the end of scrolling -> reactivate IntersectionObserver on scroll
      toc.element.addEventListener('toc-scroll', function(event){
        toc.clickScrolling = false;
      });
    };
  
    function resetAnchors(toc, anchor) {
      if(!anchor) return;
      for(var i = 0; i < toc.anchors.length; i++) Util.removeClass(toc.anchors[i], 'toc__link--selected');
      Util.addClass(anchor, 'toc__link--selected');
    };
  
    function getVisibleSection(toc) {
      if(toc.intervalID) {
        clearInterval(toc.intervalID);
      }
      toc.intervalID = setTimeout(function(){
        var halfWindowHeight = window.innerHeight/2,
        index = -1;
        for(var i = 0; i < toc.sections.length; i++) {
          var top = toc.sections[i].getBoundingClientRect().top;
          if(top < halfWindowHeight) index = i;
        }
        if(index > -1) {
          resetAnchors(toc, toc.anchors[index]);
        }
        toc.intervalID = false;
      }, 100);
    };
    
    var tocs = document.getElementsByClassName('js-toc'),
      intersectionObserverSupported = ('IntersectionObserver' in window && 'IntersectionObserverEntry' in window && 'intersectionRatio' in window.IntersectionObserverEntry.prototype);
  
    var tocsArray = [];
    if( tocs.length > 0 && intersectionObserverSupported) {
      for( var i = 0; i < tocs.length; i++) {
        (function(i){ tocsArray.push(new Toc(tocs[i])); })(i);
      }
  
      // listen to window scroll -> reset clickScrolling property
      var scrollId = false,
        customEvent = new CustomEvent('toc-scroll');
        
      window.addEventListener('scroll', function() {
        clearTimeout(scrollId);
        scrollId = setTimeout(doneScrolling, 100);
      });
  
      function doneScrolling() {
        for( var i = 0; i < tocsArray.length; i++) {
          (function(i){tocsArray[i].element.dispatchEvent(customEvent)})(i);
        };
      };
    }
  }());
// File#: _3_dashboard-navigation
// Usage: codyhouse.co/license
(function() {
    var appUi = document.getElementsByClassName('js-app-ui');
    if(appUi.length > 0) {
      var appMenuBtn = appUi[0].getElementsByClassName('js-app-ui__menu-btn');
      if(appMenuBtn.length < 1) return;
      var appExpandedClass = 'app-ui--nav-expanded';
      var firstFocusableElement = false,
        // we'll use these to store the node that needs to receive focus when the mobile menu is closed 
        focusMenu = false;
  
      // toggle navigation on mobile
      appMenuBtn[0].addEventListener('click', function(event) {
        var openMenu = !Util.hasClass(appUi[0], appExpandedClass);
        Util.toggleClass(appUi[0], appExpandedClass, openMenu);
        appMenuBtn[0].setAttribute('aria-expanded', openMenu);
        if(openMenu) {
          firstFocusableElement = getMenuFirstFocusable();
          if(firstFocusableElement) firstFocusableElement.focus(); // move focus to first focusable element
        } else if(focusMenu) {
          focusMenu.focus();
          focusMenu = false;
        }
      });
  
      // listen for key events
      window.addEventListener('keyup', function(event){
        // listen for esc key
        if( (event.keyCode && event.keyCode == 27) || (event.key && event.key.toLowerCase() == 'escape' )) {
          // close navigation on mobile if open
          if(appMenuBtn[0].getAttribute('aria-expanded') == 'true' && isVisible(appMenuBtn[0])) {
            focusMenu = appMenuBtn[0]; // move focus to menu trigger when menu is close
            appMenuBtn[0].click();
          }
        }
        // listen for tab key
        if( (event.keyCode && event.keyCode == 9) || (event.key && event.key.toLowerCase() == 'tab' )) {
          // close navigation on mobile if open when nav loses focus
          if(appMenuBtn[0].getAttribute('aria-expanded') == 'true' && isVisible(appMenuBtn[0]) && !document.activeElement.closest('.js-app-ui__nav')) appMenuBtn[0].click();
        }
      });
      
      // listen for resize
      var resizingId = false;
      window.addEventListener('resize', function() {
        clearTimeout(resizingId);
        resizingId = setTimeout(doneResizing, 500);
      });
  
      function doneResizing() {
        if( !isVisible(appMenuBtn[0]) && Util.hasClass(appUi[0], appExpandedClass)) appMenuBtn[0].click();
      };
  
      function getMenuFirstFocusable() {
        var mobileNav = appUi[0].getElementsByClassName('js-app-ui__nav');
        if(mobileNav.length < 1) return false;
        var focusableEle = mobileNav[0].querySelectorAll('[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), [tabindex]:not([tabindex="-1"]), [controls], summary'),
          firstFocusable = false;
        for(var i = 0; i < focusableEle.length; i++) {
          if( focusableEle[i].offsetWidth || focusableEle[i].offsetHeight || focusableEle[i].getClientRects().length ) {
            firstFocusable = focusableEle[i];
            break;
          }
        }
        
        return firstFocusable;
      };
      
      function isVisible(element) {
        return (element.offsetWidth || element.offsetHeight || element.getClientRects().length);
      };
    }
  }());
// File#: _2_hiding-nav
// Usage: codyhouse.co/license
(function() {
  var hidingNav = document.getElementsByClassName('js-hide-nav');
  if(hidingNav.length > 0 && window.requestAnimationFrame) {
    var mainNav = Array.prototype.filter.call(hidingNav, function(element) {
      return Util.hasClass(element, 'js-hide-nav--main');
    }),
    subNav = Array.prototype.filter.call(hidingNav, function(element) {
      return Util.hasClass(element, 'js-hide-nav--sub');
    });
    
    var scrolling = false,
      previousTop = window.scrollY,
      currentTop = window.scrollY,
      scrollDelta = 10,
      scrollOffset = 150, // scrollY needs to be bigger than scrollOffset to hide navigation
      headerHeight = 0; 

    var navIsFixed = false; // check if main navigation is fixed
    if(mainNav.length > 0 && Util.hasClass(mainNav[0], 'hide-nav--fixed')) navIsFixed = true;

    // store button that triggers navigation on mobile
    var triggerMobile = getTriggerMobileMenu();
    
    // init navigation and listen to window scroll event
    initSecondaryNav();
    resetHideNav();
    window.addEventListener('scroll', function(event){
      if(scrolling) return;
      scrolling = true;
      window.requestAnimationFrame(resetHideNav);
    });

    window.addEventListener('resize', function(event){
      if(scrolling) return;
      scrolling = true;
      window.requestAnimationFrame(function(){
        if(headerHeight > 0 && subNav.length > 0) {
          headerHeight = mainNav[0].offsetHeight;
          subNav[0].style.top = headerHeight+'px';
        }
        // reset both navigation
        hideNavScrollUp();

        scrolling = false;
      });
    });

    function initSecondaryNav() { // if there's a secondary nav, set its top equal to the header height
      if(subNav.length < 1 || mainNav.length < 1) return;
      headerHeight = mainNav[0].offsetHeight;
      subNav[0].style.top = headerHeight+'px';
    };

    function resetHideNav() { // check if navs need to be hidden/revealed
      currentTop = window.scrollY;
      if(currentTop - previousTop > scrollDelta && currentTop > scrollOffset) {
        hideNavScrollDown();
      } else if( previousTop - currentTop > scrollDelta || (previousTop - currentTop > 0 && currentTop < scrollOffset) ) {
        hideNavScrollUp();
      } else if( previousTop - currentTop > 0 && subNav.length > 0 && subNav[0].getBoundingClientRect().top > 0) {
        setTranslate(subNav[0], '0%');
      }
      // if primary nav is fixed -> toggle bg class
      if(navIsFixed) {
        var scrollTop = window.scrollY || window.pageYOffset;
        Util.toggleClass(mainNav[0], 'hide-nav--has-bg', (scrollTop > headerHeight));
      }
      previousTop = currentTop;
      scrolling = false;
    };

    function hideNavScrollDown() {
      // if there's a secondary nav -> it has to reach the top before hiding nav
      if( subNav.length  > 0 && subNav[0].getBoundingClientRect().top > headerHeight) return;
      // on mobile -> hide navigation only if dropdown is not open
      if(triggerMobile && triggerMobile.getAttribute('aria-expanded') == "true") return;
      if( mainNav.length > 0 ) {
        setTranslate(mainNav[0], '-100%'); 
        mainNav[0].addEventListener('transitionend', addOffCanvasClass);

      }
      if( subNav.length  > 0 ) setTranslate(subNav[0], '-'+headerHeight+'px');
    };

    function hideNavScrollUp() {
      if( mainNav.length > 0 ) {setTranslate(mainNav[0], '0%'); Util.removeClass(mainNav[0], 'hide-nav--off-canvas');mainNav[0].removeEventListener('transitionend', addOffCanvasClass);}
      if( subNav.length  > 0 ) setTranslate(subNav[0], '0%');
    };

    function addOffCanvasClass() {
      mainNav[0].removeEventListener('transitionend', addOffCanvasClass);
      Util.addClass(mainNav[0], 'hide-nav--off-canvas');
    };

    function setTranslate(element, val) {
      element.style.transform = 'translateY('+val+')';
    };

    function getTriggerMobileMenu() {
      // store trigger that toggle mobile navigation dropdown
      var triggerMobileClass = hidingNav[0].getAttribute('data-mobile-trigger');
      if(!triggerMobileClass) return false;
      var trigger = hidingNav[0].getElementsByClassName(triggerMobileClass);
      if(trigger.length > 0) return trigger[0];
      return false;
    };
    
  } else {
    // if window requestAnimationFrame is not supported -> add bg class to fixed header
    var mainNav = document.getElementsByClassName('js-hide-nav--main');
    if(mainNav.length < 1) return;
    if(Util.hasClass(mainNav[0], 'hide-nav--fixed')) Util.addClass(mainNav[0], 'hide-nav--has-bg');
  }
}());
// File#: _3_interactive-table
// Usage: codyhouse.co/license
(function() {
    var IntTable = function(element) {
      this.element = element;
      this.header = this.element.getElementsByClassName('js-int-table__header')[0];
      this.headerCols = this.header.getElementsByTagName('tr')[0].children;
      this.body = this.element.getElementsByClassName('js-int-table__body')[0];
      this.sortingRows = this.element.getElementsByClassName('js-int-table__sort-row');
      initIntTable(this);
    };
  
    function initIntTable(table) {
      // check if table has actions
      initIntTableActions(table);
      // check if there are checkboxes to select/deselect a row/all rows
      var selectAll = table.element.getElementsByClassName('js-int-table__select-all');
      if(selectAll.length > 0) initIntTableSelection(table, selectAll);
      // check if there are sortable columns
      table.sortableCols = table.element.getElementsByClassName('js-int-table__cell--sort');
      if(table.sortableCols.length > 0) {
        // add a data-order attribute to all rows so that we can reset the order
        setDataRowOrder(table);
        // listen to the click event on a sortable column
        table.header.addEventListener('click', function(event){
          var selectedCol = event.target.closest('.js-int-table__cell--sort');
          if(!selectedCol || event.target.tagName.toLowerCase() == 'input') return;
          sortColumns(table, selectedCol);
        });
        table.header.addEventListener('change', function(event){ // detect change in selected checkbox (SR only)
          var selectedCol = event.target.closest('.js-int-table__cell--sort');
          if(!selectedCol) return;
          sortColumns(table, selectedCol, event.target.value);
        });
        table.header.addEventListener('keydown', function(event){ // keyboard navigation - change sorting on enter
          if( event.keyCode && event.keyCode == 13 || event.key && event.key.toLowerCase() == 'enter') {
            var selectedCol = event.target.closest('.js-int-table__cell--sort');
            if(!selectedCol) return;
            sortColumns(table, selectedCol);
          }
        });
  
        // change cell style when in focus
        table.header.addEventListener('focusin', function(event){
          var closestCell = document.activeElement.closest('.js-int-table__cell--sort');
          if(closestCell) Util.addClass(closestCell, 'int-table__cell--focus');
        });
        table.header.addEventListener('focusout', function(event){
          for(var i = 0; i < table.sortableCols.length; i++) {
            Util.removeClass(table.sortableCols[i], 'int-table__cell--focus');
          }
        });
      }
    };
  
    function initIntTableActions(table) {
      // check if table has actions and store them
      var tableId = table.element.getAttribute('id');
      if(!tableId) return;
      var tableActions = document.querySelector('[data-table-controls="'+tableId+'"]');
      if(!tableActions) return;
      table.actionsSelection = tableActions.getElementsByClassName('js-int-table-actions__items-selected');
      table.actionsNoSelection = tableActions.getElementsByClassName('js-int-table-actions__no-items-selected');
    };
  
    function initIntTableSelection(table, select) { // checkboxes for rows selection
      table.selectAll = select[0];
      table.selectRow = table.element.getElementsByClassName('js-int-table__select-row');
      // select/deselect all rows
      table.selectAll.addEventListener('click', function(event){ // we cannot use the 'change' event as on IE/Edge the change from "indeterminate" to either "checked" or "unchecked"  does not trigger that event
        toggleRowSelection(table);
      });
      // select/deselect single row - reset all row selector 
      table.body.addEventListener('change', function(event){
        if(!event.target.closest('.js-int-table__select-row')) return;
        toggleAllSelection(table);
      });
      // toggle actions
      toggleActions(table, table.element.getElementsByClassName('int-table__row--checked').length > 0);
    };
  
    function toggleRowSelection(table) { // 'Select All Rows' checkbox has been selected/deselected
      var status = table.selectAll.checked;
      for(var i = 0; i < table.selectRow.length; i++) {
        table.selectRow[i].checked = status;
        Util.toggleClass(table.selectRow[i].closest('.int-table__row'), 'int-table__row--checked', status);
      }
      toggleActions(table, status);
    };
  
    function toggleAllSelection(table) { // Single row has been selected/deselected
      var allChecked = true,
        oneChecked = false;
      for(var i = 0; i < table.selectRow.length; i++) {
        if(!table.selectRow[i].checked) {allChecked = false;}
        else {oneChecked = true;}
        Util.toggleClass(table.selectRow[i].closest('.int-table__row'), 'int-table__row--checked', table.selectRow[i].checked);
      }
      table.selectAll.checked = oneChecked;
      // if status if false but one input is checked -> set an indeterminate state for the 'Select All' checkbox
      if(!allChecked) table.selectAll.indeterminate = oneChecked;
      toggleActions(table, oneChecked);
    };
  
    function setDataRowOrder(table) { // add a data-order to rows element - will be used when resetting the sorting 
      var rowsArray = table.body.getElementsByTagName('tr');
      for(var i = 0; i < rowsArray.length; i++) {
        rowsArray[i].setAttribute('data-order', i);
      }
    };
  
    function sortColumns(table, selectedCol, customOrder) {
      // determine sorting order (asc/desc/reset)
      var order = customOrder || getSortingOrder(selectedCol),
        colIndex = Util.getIndexInArray(table.headerCols, selectedCol);
      // sort table
      sortTableContent(table, order, colIndex, selectedCol);
      
      // reset appearance of the th column that was previously sorted (if any) 
      for(var i = 0; i < table.headerCols.length; i++) {
        Util.removeClass(table.headerCols[i], 'int-table__cell--asc int-table__cell--desc');
      }
      // reset appearance for the selected th column
      if(order == 'asc') Util.addClass(selectedCol, 'int-table__cell--asc');
      if(order == 'desc') Util.addClass(selectedCol, 'int-table__cell--desc');
      // reset checkbox selection
      if(!customOrder) selectedCol.querySelector('input[value="'+order+'"]').checked = true;
    };
  
    function getSortingOrder(selectedCol) { // determine sorting order
      if( Util.hasClass(selectedCol, 'int-table__cell--asc') ) return 'desc';
      if( Util.hasClass(selectedCol, 'int-table__cell--desc') ) return 'none';
      return 'asc';
    };
  
    function sortTableContent(table, order, index, selctedCol) { // determine the new order of the rows
      var rowsArray = table.body.getElementsByTagName('tr'),
        switching = true,
        i = 0,
        shouldSwitch;
      while (switching) {
        switching = false;
        for (i = 0; i < rowsArray.length - 1; i++) {
          var contentOne = (order == 'none') ? rowsArray[i].getAttribute('data-order') : rowsArray[i].children[index].textContent.trim(),
            contentTwo = (order == 'none') ? rowsArray[i+1].getAttribute('data-order') : rowsArray[i+1].children[index].textContent.trim();
  
          shouldSwitch = compareValues(contentOne, contentTwo, order, selctedCol);
          if(shouldSwitch) {
            table.body.insertBefore(rowsArray[i+1], rowsArray[i]);
            switching = true;
            break;
          }
        }
      }
    };
  
    function compareValues(val1, val2, order, selctedCol) {
      var compare,
        dateComparison = selctedCol.getAttribute('data-date-format');
      if( dateComparison && order != 'none') { // comparing dates
        compare =  (order == 'asc' || order == 'none') ? parseCustomDate(val1, dateComparison) > parseCustomDate(val2, dateComparison) : parseCustomDate(val2, dateComparison) > parseCustomDate(val1, dateComparison);
      } else if( !isNaN(val1) && !isNaN(val2) ) { // comparing numbers
        compare =  (order == 'asc' || order == 'none') ? Number(val1) > Number(val2) : Number(val2) > Number(val1);
      } else { // comparing strings
        compare =  (order == 'asc' || order == 'none') 
          ? val2.toString().localeCompare(val1) < 0
          : val1.toString().localeCompare(val2) < 0;
      }
      return compare;
    };
  
    function parseCustomDate(date, format) {
      var parts = date.match(/(\d+)/g), 
        i = 0, fmt = {};
      // extract date-part indexes from the format
      format.replace(/(yyyy|dd|mm)/g, function(part) { fmt[part] = i++; });
  
      return new Date(parts[fmt['yyyy']], parts[fmt['mm']]-1, parts[fmt['dd']]);
    };
  
    function toggleActions(table, selection) {
      if(table.actionsSelection && table.actionsSelection.length > 0) {
        Util.toggleClass(table.actionsSelection[0], 'is-hidden', !selection);
      }
      if(table.actionsNoSelection && table.actionsNoSelection.length > 0) {
        Util.toggleClass(table.actionsNoSelection[0], 'is-hidden', selection);
      }
    };
  
    //initialize the IntTable objects
    var intTable = document.getElementsByClassName('js-int-table');
    if( intTable.length > 0 ) {
      for( var i = 0; i < intTable.length; i++) {
        (function(i){new IntTable(intTable[i]);})(i);
      }
    }
  }());
// File#: _3_main-header-v2
// Usage: codyhouse.co/license
(function() {
  var Submenu = function(element) {
    this.element = element;
    this.trigger = this.element.getElementsByClassName('header-v2__nav-link')[0];
    this.dropdown = this.element.getElementsByClassName('header-v2__nav-dropdown')[0];
    this.triggerFocus = false;
    this.dropdownFocus = false;
    this.hideInterval = false;
    this.prevFocus = false; // nested dropdown - store element that was in focus before focus changed
    
    if (typeof this.trigger !== 'undefined' && typeof this.dropdown !== 'undefined') {
      initSubmenu(this);
      initNestedDropdown(this);
    }
  };

  function initSubmenu(list) {
    // initElementEvents(list, list.trigger);
    initElementEvents(list, list.dropdown);
  };

  function initElementEvents(list, element, bool) {
    element.addEventListener('focus', function(){
      bool = true;
      showDropdown(list);
    });
    element.addEventListener('focusout', function(event){
      bool = false;
      hideDropdown(list, event);
    });
  };

  function showDropdown(list) {
    if(list.hideInterval) clearInterval(list.hideInterval);
    Util.addClass(list.dropdown, 'header-v2__nav-list--is-visible');
    resetDropdownStyle(list.dropdown, true);
  };

  function hideDropdown(list, event) {
    if(list.hideInterval) clearInterval(this.hideInterval);
    list.hideInterval = setTimeout(function(){
      var submenuFocus = document.activeElement.closest('.header-v2__nav-item--main'),
        inFocus = submenuFocus && (submenuFocus == list.element);
      if(!list.triggerFocus && !list.dropdownFocus && !inFocus) { // hide if focus is outside submenu
        Util.removeClass(list.dropdown, 'header-v2__nav-list--is-visible');
        resetDropdownStyle(list.dropdown, false);
        hideSubLevels(list);
        list.prevFocus = false;
      }
    }, 100);
  };

  function initNestedDropdown(list) {
    var dropdownMenu = list.element.getElementsByClassName('header-v2__nav-list');
    for(var i = 0; i < dropdownMenu.length; i++) {
      var listItems = dropdownMenu[i].children;
      // bind hover
      new menuAim({
        menu: dropdownMenu[i],
        activate: function(row) {
            var subList = row.getElementsByClassName('header-v2__nav-dropdown')[0];
            if(!subList) return;
            Util.addClass(row.querySelector('a.header-v2__nav-link'), 'header-v2__nav-link--hover');
            showLevel(list, subList);
        },
        deactivate: function(row) {
            var subList = row.getElementsByClassName('header-v2__nav-dropdown')[0];
            if(!subList) return;
            Util.removeClass(row.querySelector('a.header-v2__nav-link'), 'header-v2__nav-link--hover');
            hideLevel(list, subList);
        },
        exitMenu: function() {
          return true;
        },
        submenuSelector: '.header-v2__nav-item--has-children',
      });
    }
    // store focus element before change in focus
    list.element.addEventListener('keydown', function(event) { 
      if( event.keyCode && event.keyCode == 9 || event.key && event.key == 'Tab' ) {
        list.prevFocus = document.activeElement;
      }
    });
    // make sure that sublevel are visible when their items are in focus
    list.element.addEventListener('keyup', function(event) {
      if( event.keyCode && event.keyCode == 9 || event.key && event.key == 'Tab' ) {
        // focus has been moved -> make sure the proper classes are added to subnavigation
        var focusElement = document.activeElement,
          focusElementParent = focusElement.closest('.header-v2__nav-dropdown'),
          focusElementSibling = focusElement.nextElementSibling;

        // if item in focus is inside submenu -> make sure it is visible
        if(focusElementParent && !Util.hasClass(focusElementParent, 'header-v2__nav-list--is-visible')) {
          showLevel(list, focusElementParent);
        }
        // if item in focus triggers a submenu -> make sure it is visible
        if(focusElementSibling && !Util.hasClass(focusElementSibling, 'header-v2__nav-list--is-visible')) {
          showLevel(list, focusElementSibling);
        }

        // check previous element in focus -> hide sublevel if required 
        if( !list.prevFocus) return;
        var prevFocusElementParent = list.prevFocus.closest('.header-v2__nav-dropdown'),
          prevFocusElementSibling = list.prevFocus.nextElementSibling;
        
        if( !prevFocusElementParent ) return;
        
        // element in focus and element prev in focus are siblings
        if( focusElementParent && focusElementParent == prevFocusElementParent) {
          if(prevFocusElementSibling) hideLevel(list, prevFocusElementSibling);
          return;
        }

        // element in focus is inside submenu triggered by element prev in focus
        if( prevFocusElementSibling && focusElementParent && focusElementParent == prevFocusElementSibling) return;
        
        // shift tab -> element in focus triggers the submenu of the element prev in focus
        if( focusElementSibling && prevFocusElementParent && focusElementSibling == prevFocusElementParent) return;
        
        var focusElementParentParent = focusElementParent.parentNode.closest('.header-v2__nav-dropdown');
        
        // shift tab -> element in focus is inside the dropdown triggered by a siblings of the element prev in focus
        if(focusElementParentParent && focusElementParentParent == prevFocusElementParent) {
          if(prevFocusElementSibling) hideLevel(list, prevFocusElementSibling);
          return;
        }
        
        if(prevFocusElementParent && Util.hasClass(prevFocusElementParent, 'header-v2__nav-list--is-visible')) {
          hideLevel(list, prevFocusElementParent);
        }
      }
    });
  };

  function hideSubLevels(list) {
    var visibleSubLevels = list.dropdown.getElementsByClassName('header-v2__nav-list--is-visible');
    if(visibleSubLevels.length == 0) return;
    while (visibleSubLevels[0]) {
      hideLevel(list, visibleSubLevels[0]);
       }
       var hoveredItems = list.dropdown.getElementsByClassName('header-v2__nav-link--hover');
       while (hoveredItems[0]) {
      Util.removeClass(hoveredItems[0], 'header-v2__nav-link--hover');
       }
  };

  function showLevel(list, level, bool) {
    if(bool == undefined) {
      //check if the sublevel needs to be open to the left
      Util.removeClass(level, 'header-v2__nav-dropdown--nested-left');
      var boundingRect = level.getBoundingClientRect();
      if(window.innerWidth - boundingRect.right < 5 && boundingRect.left + window.scrollX > 2*boundingRect.width) Util.addClass(level, 'header-v2__nav-dropdown--nested-left');
    }
    Util.addClass(level, 'header-v2__nav-list--is-visible');
  };

  function hideLevel(list, level) {
    if(!Util.hasClass(level, 'header-v2__nav-list--is-visible')) return;
    Util.removeClass(level, 'header-v2__nav-list--is-visible');
    
    level.addEventListener('transition', function cb(){
      level.removeEventListener('transition', cb);
      Util.removeClass(level, 'header-v2__nav-dropdown--nested-left');
    });
  };

  var mainHeader = document.getElementsByClassName('js-header-v2');
  if(mainHeader.length > 0) {
    var menuTrigger = mainHeader[0].getElementsByClassName('js-anim-menu-btn');

    // we'll use these to store the node that needs to receive focus when the mobile menu is closed 
    var focusMenu = false;

    // Version 2: To support multiple sub menus
    for (var i=0; i < menuTrigger.length; i++) {
      menuTrigger[i].addEventListener('anim-menu-btn-clicked', function(event){ // toggle menu visibility an small devices
        // Get destination menu
        var targetMenu = document.getElementById(this.getAttribute('menu-target'));

        // Check if current target is opened
        var isExpanded = Util.hasClass(targetMenu, 'header-v2__nav--is-visible');

        // Check if other menu is already opened
        var isExpandedOther = document.getElementsByClassName('header-v2__nav--is-visible').length > 0 ? true : false;

        // Hide all other menus
        var subMenus = mainHeader[0].getElementsByClassName('header-v2__nav--is-visible');
        for (var j=0; j < subMenus.length; j++) {
          Util.removeClass(subMenus[j], 'header-v2__nav--is-visible');
        }

        // Reset all menu trigger button switch
        var triggers = mainHeader[0].getElementsByClassName('js-anim-menu-btn');
        for (var j=0; j < triggers.length; j++) {
          if (triggers[j] !== this) {
            triggers[j].setAttribute('aria-expanded', false);
          }
        }
        var openedTriggers1 = mainHeader[0].getElementsByClassName('anim-menu-btn--state-b');
        for (var j=0; j < openedTriggers1.length; j++) {
          if (openedTriggers1[j] !== this) {
            Util.removeClass(openedTriggers1[j], 'anim-menu-btn--state-b');
          }
        }
        var openedTriggers2 = mainHeader[0].getElementsByClassName('switch-icon--state-b');
        for (var j=0; j < openedTriggers2.length; j++) {
          if (openedTriggers2[j] !== this) {
            Util.removeClass(openedTriggers2[j], 'switch-icon--state-b');
          }
        }

        // Show/Hide for Chosen Submenu
        if (!isExpanded) {
          Util.addClass(targetMenu, 'header-v2__nav--is-visible', event.detail);
        }

        if (isExpanded || !isExpandedOther)
          Util.toggleClass(mainHeader[0], 'header-v2--expanded', event.detail);

        firstFocusableElement = getMenuFirstFocusable(targetMenu);

        this.setAttribute('aria-expanded', event.detail);
        if(event.detail) firstFocusableElement.focus(); // move focus to first focusable element
        else if(focusMenu) {
          focusMenu.focus();
          focusMenu = false;
        }
      });
    }

    // take care of submenu
    var mainList = mainHeader[0].getElementsByClassName('header-v2__nav-list--main');
    if(mainList.length > 0) {
      for( var i = 0; i < mainList.length; i++) {
        (function(i){
          new menuAim({ // use diagonal movement detection for main submenu
            menu: mainList[i],
            activate: function(row) {
                var submenu = row.getElementsByClassName('header-v2__nav-dropdown');
                if(submenu.length == 0 ) return;
                Util.addClass(submenu[0], 'header-v2__nav-list--is-visible');
                resetDropdownStyle(submenu[0], true);
            },
            deactivate: function(row) {
                var submenu = row.getElementsByClassName('header-v2__nav-dropdown');
                if(submenu.length == 0 ) return;
                Util.removeClass(submenu[0], 'header-v2__nav-list--is-visible');
                resetDropdownStyle(submenu[0], false);
            },
            exitMenu: function() {
              return true;
            },
            submenuSelector: '.header-v2__nav-item--has-children',
            submenuDirection: 'below'
          });

          // take care of focus event for main submenu
          var subMenu = mainList[i].getElementsByClassName('header-v2__nav-item--main');
          for(var j = 0; j < subMenu.length; j++) {(function(j){if(Util.hasClass(subMenu[j], 'header-v2__nav-item--has-children')) new Submenu(subMenu[j]);})(j);};
        })(i);
      }
    }

    // if data-animation-offset is set -> check scrolling
    var animateHeader = mainHeader[0].getAttribute('data-animation');
    if(animateHeader && animateHeader == 'on') {
      var scrolling = false,
        scrollOffset = (mainHeader[0].getAttribute('data-animation-offset')) ? parseInt(mainHeader[0].getAttribute('data-animation-offset')) : 400,
        mainHeaderHeight = mainHeader[0].offsetHeight,
        mainHeaderWrapper = mainHeader[0].getElementsByClassName('header-v2__wrapper')[0];

      window.addEventListener("scroll", function(event) {
        if( !scrolling ) {
          scrolling = true;
          (!window.requestAnimationFrame) ? setTimeout(function(){checkMainHeader();}, 250) : window.requestAnimationFrame(checkMainHeader);
        }
      });

      function checkMainHeader() {
        var windowTop = window.scrollY || document.documentElement.scrollTop;
        Util.toggleClass(mainHeaderWrapper, 'header-v2__wrapper--is-fixed', windowTop >= mainHeaderHeight);
        Util.toggleClass(mainHeaderWrapper, 'header-v2__wrapper--slides-down', windowTop >= scrollOffset);
        scrolling = false;
      };
    }

    // listen for key events
    window.addEventListener('keyup', function(event){
      for (var i=0; i < menuTrigger.length; i++) {
        // listen for esc key
        if( (event.keyCode && event.keyCode == 27) || (event.key && event.key.toLowerCase() == 'escape' )) {
          // close navigation on mobile if open
          if(menuTrigger[i].getAttribute('aria-expanded') == 'true' && isVisible(menuTrigger[i])) {
            focusMenu = menuTrigger[i]; // move focus to menu trigger when menu is close
            menuTrigger[i].click();
          }
        }
        // listen for tab key
        if( (event.keyCode && event.keyCode == 9) || (event.key && event.key.toLowerCase() == 'tab' )) {
          // close navigation on mobile if open when nav loses focus
          if(menuTrigger[i].getAttribute('aria-expanded') == 'true' && isVisible(menuTrigger[i]) && !document.activeElement.closest('.js-header-v2')) menuTrigger[i].click();
        }
      }
    });

    window.addEventListener('click', function(event){
      for (var i=0; i < menuTrigger.length; i++) {
        // listen for esc key
        if(!event.target.closest('.js-header-v2')) {
          // close navigation on mobile if open
          if(menuTrigger[i].getAttribute('aria-expanded') == 'true' && isVisible(menuTrigger[i])) {
            focusMenu = menuTrigger[i]; // move focus to menu trigger when menu is close
            menuTrigger[i].click();
          }
        }
      }
    });

    function getMenuFirstFocusable(targetMenu) {
      var focusableEle = targetMenu.querySelectorAll('[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex]:not([tabindex="-1"]), [contenteditable], audio[controls], video[controls], summary'),
        firstFocusable = false;
      for(var i = 0; i < focusableEle.length; i++) {
        if( focusableEle[i].offsetWidth || focusableEle[i].offsetHeight || focusableEle[i].getClientRects().length ) {
          firstFocusable = focusableEle[i];
          break;
        }
      }

      return firstFocusable;
    };
  }

  function resetDropdownStyle(dropdown, bool) {
    if(!bool) {
      dropdown.addEventListener('transitionend', function cb(){
        dropdown.removeAttribute('style');
        dropdown.removeEventListener('transitionend', cb);
      });
    } else {
      var boundingRect = dropdown.getBoundingClientRect();
      if(window.innerWidth - boundingRect.right < 5 && boundingRect.left + window.scrollX > 2*boundingRect.width) {
        var left = parseFloat(window.getComputedStyle(dropdown).getPropertyValue('left'));
        dropdown.style.left = (left + window.innerWidth - boundingRect.right - 5) + 'px';
      }
    }
  };

  function isVisible(element) {
    return (element.offsetWidth || element.offsetHeight || element.getClientRects().length);
  };
}());
// File#: _3_mega-site-navigation
// Usage: codyhouse.co/license
(function() {
  var MegaNav = function(element) {
    this.element = element;
    this.search = this.element.getElementsByClassName('js-mega-nav__search');
    this.searchActiveController = false;
    this.menu = this.element.getElementsByClassName('js-mega-nav__nav');
    this.menuItems = this.menu[0].getElementsByClassName('js-mega-nav__item');
    this.menuActiveController = false;
    this.itemExpClass = 'mega-nav__item--expanded';
    this.classIconBtn = 'mega-nav__icon-btn--state-b';
    this.classSearchVisible = 'mega-nav__search--is-visible';
    this.classNavVisible = 'mega-nav__nav--is-visible';
    this.classMobileLayout = 'mega-nav--mobile';
    this.classDesktopLayout = 'mega-nav--desktop';
    this.layout = 'mobile';
    // store dropdown elements (if present)
    this.dropdown = this.element.getElementsByClassName('js-dropdown');
    // expanded class - added to header when subnav is open
    this.expandedClass = 'mega-nav--expanded';
    initMegaNav(this);
  };

  function initMegaNav(megaNav) {
    setMegaNavLayout(megaNav); // switch between mobile/desktop layout
    initSearch(megaNav); // controll search navigation
    initMenu(megaNav); // control main menu nav - mobile only
    initSubNav(megaNav); // toggle sub navigation visibility
    
    megaNav.element.addEventListener('update-menu-layout', function(event){
      setMegaNavLayout(megaNav); // window resize - update layout
    });
  };

  function setMegaNavLayout(megaNav) {
    var layout = getComputedStyle(megaNav.element, ':before').getPropertyValue('content').replace(/\'|"/g, '');
    if(layout == megaNav.layout) return;
    megaNav.layout = layout;
    Util.toggleClass(megaNav.element, megaNav.classDesktopLayout, megaNav.layout == 'desktop');
    Util.toggleClass(megaNav.element, megaNav.classMobileLayout, megaNav.layout != 'desktop');
    if(megaNav.layout == 'desktop') {
      closeSubNav(megaNav, false);
      // if the mega navigation has dropdown elements -> make sure they are in the right position (viewport awareness)
      triggerDropdownPosition(megaNav);
    } 
    closeSearch(megaNav, false);
    resetMegaNavOffset(megaNav); // reset header offset top value
    resetNavAppearance(megaNav); // reset nav expanded appearance
  };

  function resetMegaNavOffset(megaNav) {
    document.documentElement.style.setProperty('--mega-nav-offset-y', megaNav.element.getBoundingClientRect().top+'px');
  };

  function closeNavigation(megaNav) { // triggered by Esc key press
    // close search
    closeSearch(megaNav);
    // close nav
    if(Util.hasClass(megaNav.menu[0], megaNav.classNavVisible)) {
      toggleMenu(megaNav, megaNav.menu[0], 'menuActiveController', megaNav.classNavVisible, megaNav.menuActiveController, true);
    }
    //close subnav 
    closeSubNav(megaNav, false);
    resetNavAppearance(megaNav); // reset nav expanded appearance
  };

  function closeFocusNavigation(megaNav) { // triggered by Tab key pressed
    // close search when focus is lost
    if(Util.hasClass(megaNav.search[0], megaNav.classSearchVisible) && !document.activeElement.closest('.js-mega-nav__search')) {
      toggleMenu(megaNav, megaNav.search[0], 'searchActiveController', megaNav.classSearchVisible, megaNav.searchActiveController, true);
    }
    // close nav when focus is lost
    if(Util.hasClass(megaNav.menu[0], megaNav.classNavVisible) && !document.activeElement.closest('.js-mega-nav__nav')) {
      toggleMenu(megaNav, megaNav.menu[0], 'menuActiveController', megaNav.classNavVisible, megaNav.menuActiveController, true);
    }
    // close subnav when focus is lost
    for(var i = 0; i < megaNav.menuItems.length; i++) {
      if(!Util.hasClass(megaNav.menuItems[i], megaNav.itemExpClass)) continue;
      var parentItem = document.activeElement.closest('.js-mega-nav__item');
      if(parentItem && parentItem == megaNav.menuItems[i]) continue;
      closeSingleSubnav(megaNav, i);
    }
    resetNavAppearance(megaNav); // reset nav expanded appearance
  };

  function closeSearch(megaNav, bool) {
    if(Util.hasClass(megaNav.search[0], megaNav.classSearchVisible)) {
      toggleMenu(megaNav, megaNav.search[0], 'searchActiveController', megaNav.classSearchVisible, megaNav.searchActiveController, bool);
    }
  } ;

  function initSearch(megaNav) {
    if(megaNav.search.length == 0) return;
    // toggle search
    megaNav.searchToggles = document.querySelectorAll('[aria-controls="'+megaNav.search[0].getAttribute('id')+'"]');
    for(var i = 0; i < megaNav.searchToggles.length; i++) {(function(i){
      megaNav.searchToggles[i].addEventListener('click', function(event){
        // toggle search
        toggleMenu(megaNav, megaNav.search[0], 'searchActiveController', megaNav.classSearchVisible, megaNav.searchToggles[i], true);
        // close nav if it was open
        if(Util.hasClass(megaNav.menu[0], megaNav.classNavVisible)) {
          toggleMenu(megaNav, megaNav.menu[0], 'menuActiveController', megaNav.classNavVisible, megaNav.menuActiveController, false);
        }
        // close subnavigation if open
        closeSubNav(megaNav, false);
        resetNavAppearance(megaNav); // reset nav expanded appearance
      });
    })(i);}
  };

  function initMenu(megaNav) {
    if(megaNav.menu.length == 0) return;
    // toggle nav
    megaNav.menuToggles = document.querySelectorAll('[aria-controls="'+megaNav.menu[0].getAttribute('id')+'"]');
    for(var i = 0; i < megaNav.menuToggles.length; i++) {(function(i){
      megaNav.menuToggles[i].addEventListener('click', function(event){
        // toggle nav
        toggleMenu(megaNav, megaNav.menu[0], 'menuActiveController', megaNav.classNavVisible, megaNav.menuToggles[i], true);
        // close search if it was open
        if(Util.hasClass(megaNav.search[0], megaNav.classSearchVisible)) {
          toggleMenu(megaNav, megaNav.search[0], 'searchActiveController', megaNav.classSearchVisible, megaNav.searchActiveController, false);
        }
        resetNavAppearance(megaNav); // reset nav expanded appearance
      });
    })(i);}
  };

  function toggleMenu(megaNav, element, controller, visibleClass, toggle, moveFocus) {
    var menuIsVisible = Util.hasClass(element, visibleClass);
    Util.toggleClass(element, visibleClass, !menuIsVisible);
    Util.toggleClass(toggle, megaNav.classIconBtn, !menuIsVisible);
    menuIsVisible ? toggle.removeAttribute('aria-expanded') : toggle.setAttribute('aria-expanded', 'true');
    if(menuIsVisible) {
      if(toggle && moveFocus) toggle.focus();
      megaNav[controller] = false;
    } else {
      if(toggle) megaNav[controller] = toggle;
			getFirstFocusable(element).focus(); // move focus to first focusable element
    }
  };

  function getFirstFocusable(element) {
    var focusableEle = element.querySelectorAll('[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex]:not([tabindex="-1"]), [contenteditable], audio[controls], video[controls], summary'),
		  firstFocusable = false;
    for(var i = 0; i < focusableEle.length; i++) {
      if( focusableEle[i].offsetWidth || focusableEle[i].offsetHeight || focusableEle[i].getClientRects().length ) {
        firstFocusable = focusableEle[i];
        break;
      }
    }
    return firstFocusable;
  };

  function initSubNav(megaNav) {
    // toggle subnavigation visibility
    megaNav.element.addEventListener('click', function(event){
      var triggerBtn = event.target.closest('.js-mega-nav__control');
      if(!triggerBtn) return;
      var mainItem = triggerBtn.closest('.js-mega-nav__item');
      if(!mainItem) return;
      var itemExpanded = Util.hasClass(mainItem, megaNav.itemExpClass);
      Util.toggleClass(mainItem, megaNav.itemExpClass, !itemExpanded);
      itemExpanded ? triggerBtn.removeAttribute('aria-expanded') : triggerBtn.setAttribute('aria-expanded', 'true');
      if(megaNav.layout == 'desktop' && !itemExpanded) closeSubNav(megaNav, mainItem);
      // close search if open
      closeSearch(megaNav, false);
      resetNavAppearance(megaNav); // reset nav expanded appearance
    });
  };

  function closeSubNav(megaNav, selectedItem) {
    // close subnav when a new sub nav element is open
    if(megaNav.menuItems.length == 0 ) return;
    for(var i = 0; i < megaNav.menuItems.length; i++) {
      if(megaNav.menuItems[i] != selectedItem) closeSingleSubnav(megaNav, i);
    }
  };

  function closeSingleSubnav(megaNav, index) {
    Util.removeClass(megaNav.menuItems[index], megaNav.itemExpClass);
    var triggerBtn = megaNav.menuItems[index].getElementsByClassName('js-mega-nav__control');
    if(triggerBtn.length > 0) triggerBtn[0].removeAttribute('aria-expanded');
  };

  function triggerDropdownPosition(megaNav) {
    // emit custom event to properly place dropdown elements - viewport awarness
    if(megaNav.dropdown.length == 0) return;
    for(var i = 0; i < megaNav.dropdown.length; i++) {
      megaNav.dropdown[i].dispatchEvent(new CustomEvent('placeDropdown'));
    }
  };

  function resetNavAppearance(megaNav) {
    ( (megaNav.element.getElementsByClassName(megaNav.itemExpClass).length > 0 && megaNav.layout == 'desktop') || megaNav.element.getElementsByClassName(megaNav.classSearchVisible).length > 0 ||(megaNav.element.getElementsByClassName(megaNav.classNavVisible).length > 0 && megaNav.layout == 'mobile'))
      ? Util.addClass(megaNav.element, megaNav.expandedClass)
      : Util.removeClass(megaNav.element, megaNav.expandedClass);
  };

  //initialize the MegaNav objects
  var megaNav = document.getElementsByClassName('js-mega-nav');
  if(megaNav.length > 0) {
    var megaNavArray = [];
    for(var i = 0; i < megaNav.length; i++) {
      (function(i){megaNavArray.push(new MegaNav(megaNav[i]));})(i);
    }

    // key events
    window.addEventListener('keyup', function(event){
			if( (event.keyCode && event.keyCode == 27) || (event.key && event.key.toLowerCase() == 'escape' )) { // listen for esc key events
        for(var i = 0; i < megaNavArray.length; i++) {(function(i){
          closeNavigation(megaNavArray[i]);
        })(i);}
			}
			// listen for tab key
			if( (event.keyCode && event.keyCode == 9) || (event.key && event.key.toLowerCase() == 'tab' )) { // close search or nav if it looses focus
        for(var i = 0; i < megaNavArray.length; i++) {(function(i){
          closeFocusNavigation(megaNavArray[i]);
        })(i);}
			}
    });

    window.addEventListener('click', function(event){
      if(!event.target.closest('.js-mega-nav')) closeNavigation(megaNavArray[0]);
    });
    
    // resize - update menu layout
    var resizingId = false,
      customEvent = new CustomEvent('update-menu-layout');
    window.addEventListener('resize', function(event){
      clearTimeout(resizingId);
      resizingId = setTimeout(doneResizing, 200);
    });

    function doneResizing() {
      for( var i = 0; i < megaNavArray.length; i++) {
        (function(i){megaNavArray[i].element.dispatchEvent(customEvent)})(i);
      };
    };
  }
}());
(function() {
    //Login/Signup modal window - by CodyHouse.co
    function ModalSignin(element) {
        this.element = element;
        this.blocks = this.element.getElementsByClassName(
            "js-signin-modal-block"
        );
        this.switchers = this.element
            .getElementsByClassName("js-signin-modal-switcher")[0]
            .getElementsByTagName("a");
        this.triggers = document.getElementsByClassName(
            "js-signin-modal-trigger"
        );
        this.hidePassword = this.element.getElementsByClassName(
            "js-hide-password"
        );
        this.init();
    }

    ModalSignin.prototype.init = function() {
        var self = this;
        //open modal/switch form
        for (var i = 0; i < this.triggers.length; i++) {
            (function(i) {
                self.triggers[i].addEventListener("click", function(event) {
                    if (event.target.hasAttribute("data-signin")) {
                        event.preventDefault();
                        self.showSigninForm(
                            event.target.getAttribute("data-signin")
                        );
                    }
                });
            })(i);
        }

        //close modal
        this.element.addEventListener("click", function(event) {
            if (
                hasClass(event.target, "js-signin-modal") ||
                hasClass(event.target, "js-close")
            ) {
                event.preventDefault();
                removeClass(self.element, "cd-signin-modal--is-visible");
            }
        });
        //close modal when clicking the esc keyboard button
        document.addEventListener("keydown", function(event) {
            event.which == "27" &&
                removeClass(self.element, "cd-signin-modal--is-visible");
        });

        //hide/show password
        for (var i = 0; i < this.hidePassword.length; i++) {
            (function(i) {
                self.hidePassword[i].addEventListener("click", function(event) {
                    self.togglePassword(self.hidePassword[i]);
                });
            })(i);
        }

        //IMPORTANT - REMOVE THIS - it's just to show/hide error messages in the demo
        /* this.blocks[0]
            .getElementsByTagName("form")[0]
            .addEventListener("submit", function(event) {
                event.preventDefault();
                console.log("submitted!", this);
                self.toggleError(document.getElementById('signin-email'), true);
            });
        this.blocks[1]
            .getElementsByTagName("form")[0]
            .addEventListener("submit", function(event) {
                event.preventDefault();
                console.log("submitted!", this);
                self.toggleError(document.getElementById('signup-username'), true);
            }); */
    };

    ModalSignin.prototype.togglePassword = function(target) {
        var password = target.previousElementSibling;
        "password" == password.getAttribute("type")
            ? password.setAttribute("type", "text")
            : password.setAttribute("type", "password");
        target.textContent = "Hide" == target.textContent ? "Show" : "Hide";
        putCursorAtEnd(password);
    };

    ModalSignin.prototype.showSigninForm = function(type) {
        // show modal if not visible
        !hasClass(this.element, "cd-signin-modal--is-visible") &&
            addClass(this.element, "cd-signin-modal--is-visible");
        // show selected form
        for (var i = 0; i < this.blocks.length; i++) {
            this.blocks[i].getAttribute("data-type") == type
                ? addClass(
                      this.blocks[i],
                      "cd-signin-modal__block--is-selected"
                  )
                : removeClass(
                      this.blocks[i],
                      "cd-signin-modal__block--is-selected"
                  );
        }
        //update switcher appearance
        var switcherType = type == "signup" ? "signup" : "login";
        for (var i = 0; i < this.switchers.length; i++) {
            this.switchers[i].getAttribute("data-type") == switcherType
                ? addClass(this.switchers[i], "cd-selected")
                : removeClass(this.switchers[i], "cd-selected");
        }
    };

    ModalSignin.prototype.toggleError = function(input, bool) {
        // used to show error messages in the form
        toggleClass(input, "cd-signin-modal__input--has-error", bool);
        toggleClass(
            input.nextElementSibling,
            "cd-signin-modal__error--is-visible",
            bool
        );
    };

    var signinModal = document.getElementsByClassName("js-signin-modal")[0];
    if (signinModal) {
        new ModalSignin(signinModal);
    }

    // toggle main navigation on mobile
    var mainNav = document.getElementsByClassName("js-main-nav")[0];
    if (mainNav) {
        mainNav.addEventListener("click", function(event) {
            if (hasClass(event.target, "js-main-nav")) {
                var navList = mainNav.getElementsByTagName("ul")[0];
                toggleClass(
                    navList,
                    "cd-main-nav__list--is-visible",
                    !hasClass(navList, "cd-main-nav__list--is-visible")
                );
            }
        });
    }

    //class manipulations - needed if classList is not supported
    function hasClass(el, className) {
        if (el.classList) return el.classList.contains(className);
        else
            return !!el.className.match(
                new RegExp("(\\s|^)" + className + "(\\s|$)")
            );
    }
    function addClass(el, className) {
        var classList = className.split(" ");
        if (el.classList) el.classList.add(classList[0]);
        else if (!hasClass(el, classList[0]))
            el.className += " " + classList[0];
        if (classList.length > 1) addClass(el, classList.slice(1).join(" "));
    }
    function removeClass(el, className) {
        var classList = className.split(" ");
        if (el.classList) el.classList.remove(classList[0]);
        else if (hasClass(el, classList[0])) {
            var reg = new RegExp("(\\s|^)" + classList[0] + "(\\s|$)");
            el.className = el.className.replace(reg, " ");
        }
        if (classList.length > 1) removeClass(el, classList.slice(1).join(" "));
    }
    function toggleClass(el, className, bool) {
        if (bool) addClass(el, className);
        else removeClass(el, className);
    }

    //credits http://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
    function putCursorAtEnd(el) {
        if (el.setSelectionRange) {
            var len = el.value.length * 2;
            el.focus();
            el.setSelectionRange(len, len);
        } else {
            el.value = el.value;
        }
    }
})();

(function(){
	var stickyMenu = document.getElementsByClassName('js-cs-sticky-menu');
	if(stickyMenu.length > 0) {
		var 
			stickyMenuBody = stickyMenu[0].getElementsByClassName('cs-sticky-menu__body')[0],
			stickyMenuList = stickyMenuBody.getElementsByTagName('ul')[0],
			stickyMenuListItems = stickyMenuList.getElementsByClassName('cs-sticky-menu__item');
			initStickyMenuEvents();

		function initStickyMenuEvents() {
			// open/close stickyMenu
			stickyMenu[0].getElementsByClassName('cs-sticky-menu__trigger')[0].addEventListener('click', function(event){
				event.preventDefault();
				toggleMenu();
			});

			stickyMenu[0].addEventListener('click', function(event) {
				if(event.target == stickyMenu[0]) { // close stickyMenu when clicking on bg layer
					stickyMenu[0].getElementsByClassName('cs-sticky-menu__trigger')[0].click();
				}
			});
		};

		function toggleMenu(bool) { // toggle stickyMenu visibility
			var stickyMenuIsOpen = ( typeof bool === 'undefined' ) ? Util.hasClass(stickyMenu[0], 'cs-sticky-menu--open') : bool;
		
			if( stickyMenuIsOpen ) {
				Util.removeClass(stickyMenu[0], 'cs-sticky-menu--open');
			} else {
				Util.addClass(stickyMenu[0], 'cs-sticky-menu--open');
			}
		};
	}
})();

(function() {
  var StickySubMenu = function(element) {
    this.element = element;
    this.wrapper = this.element.closest(".cs-sticky-menu__body");
    this.innerElement = this.element.getElementsByClassName('js-cs-sticky-submenu__inner');
    this.trigger = document.querySelector('[aria-controls="'+this.element.getAttribute('id')+'"]');
    this.autocompleteInput = false;
    this.autocompleteList = false;
    this.animationDuration = parseFloat(getComputedStyle(this.element).getPropertyValue('--cs-sticky-submenu-transition-duration')) || 0.3;
    // store some basic classes
    this.menuIsVisibleClass = 'cs-sticky-submenu--is-visible';
    this.menuLevelClass = 'js-cs-sticky-submenu__list';
    this.menuBtnInClass = 'js-cs-sticky-submenu__btn--sublist-control';
    this.menuBtnOutClass = 'js-cs-sticky-submenu__btn--back';
    this.levelInClass = 'cs-sticky-submenu__list--in';
    this.levelOutClass = 'cs-sticky-submenu__list--out';
    // store the max height of the element
    this.maxHeight = false;
    // store drop menu layout 
    this.layout = false;
    // vertical gap - desktop layout
    this.verticalGap = parseInt(getComputedStyle(this.element).getPropertyValue('--cs-sticky-submenu-gap-y')) || 4;
    // store autocomplete search results
    this.searchResults = [];
    // focusable elements
    this.focusableElements = [];
    initStickySubMenu(this);
  };

  function initStickySubMenu(menu) {
    // trigger drop menu opening/closing
    toggleStickySubMenu(menu);
    // toggle sublevels
    menu.element.addEventListener('click', function(event){
      // check if we need to show a new sublevel
      var menuBtnIn = event.target.closest('.'+menu.menuBtnInClass);
      if(menuBtnIn) showSubLevel(menu, menuBtnIn);
      // check if we need to go back to a previous level
      var menuBtnOut = event.target.closest('.'+menu.menuBtnOutClass);
      if(menuBtnOut) hideSubLevel(menu, menuBtnOut);
    });
    // init automplete search
    initAutocomplete(menu);
    // close drop menu on focus out
    initFocusOut(menu);
  };

  function toggleStickySubMenu(menu) { // toggle drop menu
    if(!menu.trigger) return;
    // actions to be performed when closing the drop menu
    menu.stickySubMenuClosed = function(event) {
      // if(event.propertyName != 'visibility') return;
      // if(getComputedStyle(menu.element).getPropertyValue('visibility') != 'hidden') return;
      if(event.propertyName != 'color') return;
      menu.element.removeEventListener('transitionend', menu.stickySubMenuClosed);
      menu.element.removeAttribute('style');
      resetAllLevels(menu); // go back to main list
      resetAutocomplete(menu); // if autocomplte is enabled -> reset input fields
    };

    // click on trigger
    menu.trigger.addEventListener('click', function(event){
      menu.element.removeEventListener('transitionend', menu.stickySubMenuClosed);
      var isVisible = stickySubMenuVisible(menu);
      Util.toggleClass(menu.element, menu.menuIsVisibleClass, !isVisible);
      isVisible ? menu.trigger.removeAttribute('aria-expanded') : menu.trigger.setAttribute('aria-expanded', true);
      if(isVisible) {
        menu.element.addEventListener('transitionend', menu.stickySubMenuClosed);
      } else {
        menu.element.addEventListener('transitionend', function cb(){
          menu.element.removeEventListener('transitionend', cb);
          // focusFirstElement(menu, menu.element);
        });
        getLayoutValue(menu);
        placeStickySubMenu(menu); // desktop only
      }
    });
  };

  function stickySubMenuVisible(menu) {
    return Util.hasClass(menu.element, menu.menuIsVisibleClass);
  };

  function showSubLevel(menu, menuBtn) {
    var mainLevel = menuBtn.closest('.'+menu.menuLevelClass),
      subLevel = Util.getChildrenByClassName(menuBtn.parentNode, menu.menuLevelClass);
    if(!mainLevel || subLevel.length == 0 ) return;
    // trigger classes
    Util.addClass(subLevel[0], menu.levelInClass);
    Util.addClass(mainLevel, menu.levelOutClass);
    Util.removeClass(mainLevel, menu.levelInClass);
    // animate height of main element
    animateStickySubMenu(menu, mainLevel.offsetHeight, subLevel[0].offsetHeight, function(){
      focusFirstElement(menu, subLevel[0]);
    });
  };

  function hideSubLevel(menu, menuBtn) {
    var subLevel = menuBtn.closest('.'+menu.menuLevelClass),
      mainLevel = subLevel.parentNode.closest('.'+menu.menuLevelClass);
    if(!mainLevel || !subLevel) return;
    // trigger classes
    Util.removeClass(subLevel, menu.levelInClass);
    Util.addClass(mainLevel, menu.levelInClass);
    Util.removeClass(mainLevel, menu.levelOutClass);
    // animate height of main element
    animateStickySubMenu(menu, subLevel.offsetHeight, mainLevel.offsetHeight, function(){
      var menuBtnIn = Util.getChildrenByClassName(subLevel.parentNode, menu.menuBtnInClass);
      if(menuBtnIn.length > 0) menuBtnIn[0].focus();
      // if primary level -> reset height of element + inner element
      if(Util.hasClass(mainLevel, 'js-cs-sticky-submenu__list--main') && menu.layout == 'desktop') {
        menu.element.style.height = '';
        if(menu.innerElement.length > 0) menu.innerElement[0].style.height = '';
      }
    });
  };

  function animateStickySubMenu(menu, initHeight, finalHeight, cb) {
    if(menu.innerElement.length < 1 || menu.layout == 'mobile') {
      if(cb) setTimeout(function(){cb();}, menu.animationDuration*1000);
      return;
    }
    // make sure init and final height are smaller than max height
    if(initHeight > menu.maxHeight) initHeight = menu.maxHeight;
    if(finalHeight > menu.maxHeight) {
      finalHeight = menu.maxHeight;
    }
    var currentTime = null,
      duration = menu.animationDuration*1000;

    var animateHeight = function(timestamp){  
      if (!currentTime) currentTime = timestamp;         
      var progress = timestamp - currentTime;
      if(progress > duration) progress = duration;
      if(progress < duration) {
        window.requestAnimationFrame(animateHeight);
      } else {
        if(cb) cb();
      }
    };
    
    //set the height of the element before starting animation -> fix bug on Safari
    window.requestAnimationFrame(animateHeight);
  };

  function resetAllLevels(menu) {
    var openLevels = menu.element.getElementsByClassName(menu.levelInClass),
      closeLevels = menu.element.getElementsByClassName(menu.levelOutClass);
    while(openLevels[0]) {
      Util.removeClass(openLevels[0], menu.levelInClass);
    }
    while(closeLevels[0]) {
      Util.removeClass(closeLevels[0], menu.levelOutClass);
    }
  };

  function focusFirstElement(menu, level) {
    var element = getFirstFocusable(level);
    element.focus();
  };

  function getFirstFocusable(element) {
    var elements = element.querySelectorAll(focusableElString);
    for(var i = 0; i < elements.length; i++) {
			if(elements[i].offsetWidth || elements[i].offsetHeight || elements[i].getClientRects().length) {
				return elements[i];
			}
		}
  };

  function getFocusableElements(menu) { // all visible focusable elements
    var elements = menu.element.querySelectorAll(focusableElString);
    menu.focusableElements = [];
    for(var i = 0; i < elements.length; i++) {
			if( isVisible(menu, elements[i]) ) menu.focusableElements.push(elements[i]);
		}
  };

  function isVisible(menu, element) {
    var elementVisible = false;
    if( (element.offsetWidth || element.offsetHeight || element.getClientRects().length) && getComputedStyle(element).getPropertyValue('visibility') == 'visible') {
      elementVisible = true;
      if(menu.element.contains(element) && element.parentNode) elementVisible = isVisible(menu, element.parentNode);
    }
    return elementVisible;
  };

  function initAutocomplete(menu) {
    if(!Util.hasClass(menu.element, 'js-autocomplete')) return;
    // get list of search results
    getSearchResults(menu);
    var autocompleteCharacters = 1;
    menu.autocompleteInput = menu.element.getElementsByClassName('js-autocomplete__input');
    menu.autocompleteList = menu.element.getElementsByClassName('js-autocomplete__results');
    new Autocomplete({
      element: menu.element,
      characters: autocompleteCharacters,
      searchData: function(query, cb) {
        var data = [];
        if(query.length >= autocompleteCharacters) {
          data = menu.searchResults.filter(function(item){
            return item['label'].toLowerCase().indexOf(query.toLowerCase()) > -1;
          });
        }
        cb(data);
      }
    });
  };

  function resetAutocomplete(menu) {
    if(menu.autocompleteInput && menu.autocompleteInput.length > 0) {
      menu.autocompleteInput[0].value = '';
    }
  };

  function getSearchResults(menu) {
    var anchors = menu.element.getElementsByClassName('cs-sticky-submenu__link');
    for(var i = 0; i < anchors.length; i++) {
      menu.searchResults.push({label: anchors[i].textContent, url: anchors[i].getAttribute('href')});
    }
  };

  function getLayoutValue(menu) {
    menu.layout = getComputedStyle(menu.element, ':before').getPropertyValue('content').replace(/\'|"/g, '');
  };

  function placeStickySubMenu(menu) {
    menu.element.style.top = '0px';
    menu.element.style.left = '0px';
    menu.element.style.right = 'auto';
  };

  function initFocusOut(menu) {
    menu.element.addEventListener('keydown', function(event){
      if( event.keyCode && event.keyCode == 9 || event.key && event.key == 'Tab' ) {
        getFocusableElements(menu);
			}
    });
  };

  // init StickySubMenu objects
  var stickySubMenus = document.getElementsByClassName('js-cs-sticky-submenu');
  var focusableElString = '[href], input:not([disabled]), select:not([disabled]), button:not([disabled]), [tabindex]:not([tabindex="-1"]), [contenteditable], summary';
  if( stickySubMenus.length > 0 ) {
    var stickySubMenusArray = [];
    for( var i = 0; i < stickySubMenus.length; i++) {(function(i){
      stickySubMenusArray.push(new StickySubMenu(stickySubMenus[i]));
    })(i);}
  }
}());