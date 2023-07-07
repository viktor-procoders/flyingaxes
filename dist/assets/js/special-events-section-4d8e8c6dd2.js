(()=>{"use strict";var p="(prefers-reduced-motion: reduce)";function O(t){t.length=0}function s(t,n,e){return Array.prototype.slice.call(t,n,e)}function I(t){return t.bind.apply(t,[null].concat(s(arguments,1)))}function rt(){}var h=setTimeout;function g(t){return requestAnimationFrame(t)}function e(t,n){return typeof n===t}function ut(t){return!r(t)&&e("object",t)}var o=Array.isArray,S=I(e,"function"),T=I(e,"string"),ct=I(e,"undefined");function r(t){return null===t}function m(t){try{return t instanceof(t.ownerDocument.defaultView||window).HTMLElement}catch(t){return!1}}function y(t){return o(t)?t:[t]}function v(t,n){y(t).forEach(n)}function b(t,n){return-1<t.indexOf(n)}function x(t,n){return t.push.apply(t,y(n)),t}function z(n,t,e){n&&v(t,function(t){t&&n.classList[e?"add":"remove"](t)})}function N(t,n){z(t,T(n)?n.split(" "):n,!0)}function k(t,n){v(n,t.appendChild.bind(t))}function C(t,e){v(t,function(t){var n=(e||t).parentNode;n&&n.insertBefore(t,e)})}function st(t,n){return m(t)&&(t.msMatchesSelector||t.matches).call(t,n)}function P(t,n){t=t?s(t.children):[];return n?t.filter(function(t){return st(t,n)}):t}function at(t,n){return n?P(t,n)[0]:t.firstElementChild}var A=Object.keys;function w(n,e,t){n&&(t?A(n).reverse():A(n)).forEach(function(t){"__proto__"!==t&&e(n[t],t)})}function _(i){return s(arguments,1).forEach(function(e){w(e,function(t,n){i[n]=e[n]})}),i}function d(e){return s(arguments,1).forEach(function(t){w(t,function(t,n){o(t)?e[n]=t.slice():ut(t)?e[n]=d({},ut(e[n])?e[n]:{},t):e[n]=t})}),e}function M(n,t){v(t||A(n),function(t){delete n[t]})}function F(t,e){v(t,function(n){v(e,function(t){n&&n.removeAttribute(t)})})}function j(e,n,i){ut(n)?w(n,function(t,n){j(e,n,t)}):v(e,function(t){r(i)||""===i?F(t,n):t.setAttribute(n,String(i))})}function D(t,n,e){t=document.createElement(t);return n&&(T(n)?N:j)(t,n),e&&k(e,t),t}function R(t,n,e){if(ct(e))return getComputedStyle(t)[n];r(e)||(t.style[n]=""+e)}function lt(t,n){R(t,"display",n)}function ft(t){t.setActive&&t.setActive()||t.focus({preventScroll:!0})}function W(t,n){return t.getAttribute(n)}function dt(t,n){return t&&t.classList.contains(n)}function B(t){return t.getBoundingClientRect()}function X(t){v(t,function(t){t&&t.parentNode&&t.parentNode.removeChild(t)})}function pt(t){return at((new DOMParser).parseFromString(t,"text/html").body)}function G(t,n){t.preventDefault(),n&&(t.stopPropagation(),t.stopImmediatePropagation())}function vt(t,n){return t&&t.querySelector(n)}function ht(t,n){return n?s(t.querySelectorAll(n)):[]}function H(t,n){z(t,n,!1)}function gt(t){return t.timeStamp}function L(t){return T(t)?t:t?t+"px":""}var E="splide",u="data-"+E;function mt(t,n){if(!t)throw new Error("["+E+"] "+(n||""))}var q=Math.min,yt=Math.max,bt=Math.floor,wt=Math.ceil,Y=Math.abs;function Et(t,n,e){return Y(t-n)<e}function St(t,n,e,i){var o=q(n,e),n=yt(n,e);return i?o<t&&t<n:o<=t&&t<=n}function U(t,n,e){var i=q(n,e),n=yt(n,e);return q(yt(i,t),n)}function xt(t){return(0<t)-(t<0)}function Pt(n,t){return v(t,function(t){n=n.replace("%s",""+t)}),n}function kt(t){return t<10?"0"+t:""+t}var Ct={};function Lt(){var c=[];function e(t,e,i){v(t,function(n){n&&v(e,function(t){t.split(" ").forEach(function(t){t=t.split(".");i(n,t[0],t[1])})})})}return{bind:function(t,n,r,u){e(t,n,function(t,n,e){var i="addEventListener"in t,o=i?t.removeEventListener.bind(t,n,r,u):t.removeListener.bind(t,r);i?t.addEventListener(n,r,u):t.addListener(r),c.push([t,n,e,r,o])})},unbind:function(t,n,o){e(t,n,function(n,e,i){c=c.filter(function(t){return!!(t[0]!==n||t[1]!==e||t[2]!==i||o&&t[3]!==o)||(t[4](),!1)})})},dispatch:function(t,n,e){var i;return"function"==typeof CustomEvent?i=new CustomEvent(n,{bubbles:!0,detail:e}):(i=document.createEvent("CustomEvent")).initCustomEvent(n,!0,!1,e),t.dispatchEvent(i),i},destroy:function(){c.forEach(function(t){t[4]()}),O(c)}}}var K="mounted",J="move",At="moved",V="refresh",Q="updated",_t="resize",Dt="resized",Mt="scroll",Z="scrolled",c="destroy",Ot="navigation:mounted",zt="autoplay:play",It="autoplay:pause",Tt="lazyload:loaded";function $(t){var e=t?t.event.bus:document.createDocumentFragment(),i=Lt();return t&&t.event.on(c,i.destroy),_(i,{bus:e,on:function(t,n){i.bind(e,y(t).join(" "),function(t){n.apply(n,o(t.detail)?t.detail:[])})},off:I(i.unbind,e),emit:function(t){i.dispatch(e,t,s(arguments,1))}})}function Nt(n,t,e,i){var o,r,u=Date.now,c=0,s=!0,a=0;function l(){if(!s){if(c=n?q((u()-o)/n,1):1,e&&e(c),1<=c&&(t(),o=u(),i)&&++a>=i)return f();r=g(l)}}function f(){s=!0}function d(){r&&cancelAnimationFrame(r),s=!(r=c=0)}return{start:function(t){t||d(),o=u()-(t?c*n:0),s=!1,r=g(l)},rewind:function(){o=u(),c=0,e&&e(c)},pause:f,cancel:d,set:function(t){n=t},isPaused:function(){return s}}}var t="Arrow",Ft=t+"Left",jt=t+"Right",i=t+"Up",t=t+"Down",Rt="ttb",a={width:["height"],left:["top","right"],right:["bottom","left"],x:["y"],X:["Y"],Y:["X"],ArrowLeft:[i,jt],ArrowRight:[t,Ft]},tt="role",nt="tabindex",n="aria-",Wt=n+"controls",Bt=n+"current",l=n+"selected",et=n+"label",Xt=n+"labelledby",Gt=n+"hidden",Ht=n+"orientation",qt=n+"roledescription",f=n+"live",Yt=n+"busy",Ut=n+"atomic",Kt=[tt,nt,"disabled",Wt,Bt,et,Xt,Gt,Ht,qt],n=E+"__",Jt=E,Vt=n+"track",Qt=n+"list",Zt=n+"slide",$t=Zt+"--clone",tn=Zt+"__container",nn=n+"arrows",en=n+"arrow",on=en+"--prev",rn=en+"--next",un=n+"pagination",cn=un+"__page",sn=n+"progress__bar",an=n+"toggle",ln=n+"sr",it="is-active",fn="is-prev",dn="is-next",pn="is-visible",vn="is-loading",hn="is-focus-in",gn="is-overflow",mn=[it,pn,fn,dn,vn,hn,gn],n={slide:Zt,clone:$t,arrows:nn,arrow:en,prev:on,next:rn,pagination:un,page:cn,spinner:n+"spinner"},yn="touchstart mousedown",bn="touchmove mousemove",wn="touchend touchcancel mouseup click",ot="slide",En="loop",Sn="fade",xn=u+"-interval",Pn={passive:!1,capture:!0},kn={Spacebar:" ",Right:jt,Left:Ft,Up:i,Down:t};function Cn(t){return t=T(t)?t:t.key,kn[t]||t}var Ln="keydown",An=u+"-lazy",_n=An+"-srcset",Dn="["+An+"], ["+_n+"]",Mn=[" ","Enter"],On=Object.freeze({__proto__:null,Media:function(i,t,o){var r=i.state,n=o.breakpoints||{},u=o.reducedMotion||{},e=Lt(),c=[];function s(t){t&&e.destroy()}function a(t,n){n=matchMedia(n);e.bind(n,"change",l),c.push([t,n])}function l(){var t=r.is(7),n=o.direction,e=c.reduce(function(t,n){return d(t,n[1].matches?n[0]:{})},{});M(o),f(e),o.destroy?i.destroy("completely"===o.destroy):t?(s(!0),i.mount()):n!==o.direction&&i.refresh()}function f(t,n,e){d(o,t),n&&d(Object.getPrototypeOf(o),t),!e&&r.is(1)||i.emit(Q,o)}return{setup:function(){var e="min"===o.mediaQuery;A(n).sort(function(t,n){return e?+t-+n:+n-+t}).forEach(function(t){a(n[t],"("+(e?"min":"max")+"-width:"+t+"px)")}),a(u,p),l()},destroy:s,reduce:function(t){matchMedia(p).matches&&(t?d(o,u):M(o,A(u)))},set:f}},Direction:function(t,n,o){return{resolve:function(t,n,e){var i="rtl"!==(e=e||o.direction)||n?e===Rt?0:-1:1;return a[t]&&a[t][i]||t.replace(/width|left|right/i,function(t,n){t=a[t.toLowerCase()][i]||t;return 0<n?t.charAt(0).toUpperCase()+t.slice(1):t})},orient:function(t){return t*("rtl"===o.direction?1:-1)}}},Elements:function(t,n,e){var i,o,r,u=$(t),c=u.on,s=u.bind,a=t.root,l=e.i18n,f={},d=[],p=[],v=[];function h(){var t,n;i=y("."+Vt),o=at(i,"."+Qt),mt(i&&o,"A track/list element is missing."),x(d,P(o,"."+Zt+":not(."+$t+")")),w({arrows:nn,pagination:un,prev:on,next:rn,bar:sn,toggle:an},function(t,n){f[n]=y("."+t)}),_(f,{root:a,track:i,list:o,slides:d}),t=a.id||""+E+kt(Ct[E]=(Ct[E]||0)+1),n=e.role,a.id=t,i.id=i.id||t+"-track",o.id=o.id||t+"-list",!W(a,tt)&&"SECTION"!==a.tagName&&n&&j(a,tt,n),j(a,qt,l.carousel),j(o,tt,"presentation"),m()}function g(t){var n=Kt.concat("style");O(d),H(a,p),H(i,v),F([i,o],n),F(a,t?n:["style",qt])}function m(){H(a,p),H(i,v),p=b(Jt),v=b(Vt),N(a,p),N(i,v),j(a,et,e.label),j(a,Xt,e.labelledby)}function y(t){t=vt(a,t);return t&&function(t,n){if(S(t.closest))return t.closest(n);for(var e=t;e&&1===e.nodeType&&!st(e,n);)e=e.parentElement;return e}(t,"."+Jt)===a?t:void 0}function b(t){return[t+"--"+e.type,t+"--"+e.direction,e.drag&&t+"--draggable",e.isNavigation&&t+"--nav",t===Jt&&it]}return _(f,{setup:h,mount:function(){c(V,g),c(V,h),c(Q,m),s(document,yn+" keydown",function(t){r="keydown"===t.type},{capture:!0}),s(a,"focusin",function(){z(a,hn,!!r)})},destroy:g})},Slides:function(D,o,r){var t=$(D),n=t.on,u=t.emit,c=t.bind,t=o.Elements,s=t.slides,a=t.list,M=[];function e(){s.forEach(function(t,n){l(t,n,-1)})}function i(){d(function(t){t.destroy()}),O(M)}function l(t,n,e){u=n,i=e,c=t,o=$(r=D),a=o.on,l=o.emit,f=o.bind,d=r.Components,p=r.root,v=r.options,h=v.isNavigation,g=v.updateOnMove,m=v.i18n,y=v.pagination,b=v.slideFocus,w=d.Direction.resolve,E=W(c,"style"),S=W(c,et),x=-1<i,P=at(c,"."+tn);var r,u,i,c,s,o,a,l,f,d,p,v,h,g,m,y,b,w,E,S,x,P,k,n=k={index:u,slideIndex:i,slide:c,container:P,isClone:x,mount:function(){x||(c.id=p.id+"-slide"+kt(u+1),j(c,tt,y?"tabpanel":"group"),j(c,qt,m.slide),j(c,et,S||Pt(m.slideLabel,[u+1,r.length]))),f(c,"click",I(l,"click",k)),f(c,"keydown",I(l,"sk",k)),a([At,"sh",Z],A),a(Ot,C),g&&a(J,L)},destroy:function(){s=!0,o.destroy(),H(c,mn),F(c,Kt),j(c,"style",E),j(c,et,S||"")},update:A,style:function(t,n,e){R(e&&P||c,t,n)},isWithin:function(t,n){t=Y(t-u);return(t=x||!v.rewind&&!r.is(En)?t:q(t,r.length-t))<=n}};function C(){var t=r.splides.map(function(t){t=t.splide.Components.Slides.getAt(u);return t?t.slide.id:""}).join(" ");j(c,et,Pt(m.slideX,(x?i:u)+1)),j(c,Wt,t),j(c,tt,b?"button":""),b&&F(c,qt)}function L(){s||A()}function A(){var t,n,e,i,o;s||(t=r.index,(o=_())!==dt(c,it)&&(z(c,it,o),j(c,Bt,h&&o||""),l(o?"active":"inactive",k)),i=!(e=r.is(Sn)?_():(n=B(d.Elements.track),i=B(c),e=w("left",!0),o=w("right",!0),bt(n[e])<=wt(i[e])&&bt(i[o])<=wt(n[o])))&&(!_()||x),r.state.is([4,5])||j(c,Gt,i||""),j(ht(c,v.focusableNodes||""),nt,i?-1:""),b&&j(c,nt,i?-1:0),e!==dt(c,pn)&&(z(c,pn,e),l(e?"visible":"hidden",k)),e||document.activeElement!==c||(n=d.Slides.getAt(r.index))&&ft(n.slide),z(c,fn,u===t-1),z(c,dn,u===t+1))}function _(){var t=r.index;return t===u||v.cloneStatus&&t===i}n.mount(),M.push(n),M.sort(function(t,n){return t.index-n.index})}function f(t){return t?p(function(t){return!t.isClone}):M}function d(t,n){f(n).forEach(t)}function p(n){return M.filter(S(n)?n:function(t){return T(n)?st(t.slide,n):b(y(n),t.index)})}return{mount:function(){e(),n(V,i),n(V,e)},destroy:i,update:function(){d(function(t){t.update()})},register:l,get:f,getIn:function(t){var n=o.Controller,e=n.toIndex(t),i=n.hasFocus()?1:r.perPage;return p(function(t){return St(t.index,e,e+i-1)})},getAt:function(t){return p(t)[0]},add:function(t,o){v(t,function(t){var n,e,i;m(t=T(t)?pt(t):t)&&((n=s[o])?C(t,n):k(a,t),N(t,r.classes.slide),n=t,e=I(u,_t),t=ht(n,"img"),(i=t.length)?t.forEach(function(t){c(t,"load error",function(){--i||e()})}):e())}),u(V)},remove:function(t){X(p(t).map(function(t){return t.slide})),u(V)},forEach:d,filter:p,style:function(n,e,i){d(function(t){t.style(n,e,i)})},getLength:function(t){return(t?s:M).length},isEnough:function(){return M.length>r.perPage}}},Layout:function(n,t,e){var i,o,r,u=$(n),c=u.on,s=u.bind,a=u.emit,u=t.Slides,l=t.Direction.resolve,t=t.Elements,f=t.root,d=t.track,p=t.list,v=u.getAt,h=u.style;function g(){i=e.direction===Rt,R(f,"maxWidth",L(e.width)),R(d,l("paddingLeft"),y(!1)),R(d,l("paddingRight"),y(!0)),m(!0)}function m(t){var n=B(f);!t&&o.width===n.width&&o.height===n.height||(R(d,"height",(t="",i&&(mt(t=b(),"height or heightRatio is missing."),t="calc("+t+" - "+y(!1)+" - "+y(!0)+")"),t)),h(l("marginRight"),L(e.gap)),h("width",e.autoWidth?null:L(e.fixedWidth)||(i?"":w())),h("height",L(e.fixedHeight)||(i?e.autoHeight?null:w():b()),!0),o=n,a(Dt),r===(r=C()))||(z(f,gn,r),a("overflow",r))}function y(t){var n=e.padding,t=l(t?"right":"left");return n&&L(n[t]||(ut(n)?0:n))||"0px"}function b(){return L(e.height||B(p).width*e.heightRatio)}function w(){var t=L(e.gap);return"calc((100%"+(t&&" + "+t)+")/"+(e.perPage||1)+(t&&" - "+t)+")"}function E(){return B(p)[l("width")]}function S(t,n){t=v(t||0);return t?B(t.slide)[l("width")]+(n?0:k()):0}function x(t,n){var e,t=v(t);return t?(t=B(t.slide)[l("right")],e=B(p)[l("left")],Y(t-e)+(n?0:k())):0}function P(t){return x(n.length-1)-x(0)+S(0,t)}function k(){var t=v(0);return t&&parseFloat(R(t.slide,l("marginRight")))||0}function C(){return n.is(Sn)||P(!0)>E()}return{mount:function(){var t,n;g(),s(window,"resize load",(t=I(a,_t),n=Nt(0,t,null,1),function(){n.isPaused()&&n.start()})),c([Q,V],g),c(_t,m)},resize:m,listSize:E,slideSize:S,sliderSize:P,totalSize:x,getPadding:function(t){return parseFloat(R(d,l("padding"+(t?"Right":"Left"))))||0},isOverflow:C}},Clones:function(c,e,s){var n,i=$(c),t=i.on,a=e.Elements,l=e.Slides,o=e.Direction.resolve,f=[];function r(){if(t(V,d),t([Q,_t],p),n=v()){var o=n,r=l.get().slice(),u=r.length;if(u){for(;r.length<o;)x(r,r);x(r.slice(-o),r.slice(0,o)).forEach(function(t,n){var e=n<o,i=function(t,n){t=t.cloneNode(!0);return N(t,s.classes.clone),t.id=c.root.id+"-clone"+kt(n+1),t}(t.slide,n);e?C(i,r[0].slide):k(a.list,i),x(f,i),l.register(i,n-o+(e?0:u),t.index)})}e.Layout.resize(!0)}}function d(){u(),r()}function u(){X(f),O(f),i.destroy()}function p(){var t=v();n!==t&&(n<t||!t)&&i.emit(V)}function v(){var t,n=s.clones;return c.is(En)?ct(n)&&(n=(t=s[o("fixedWidth")]&&e.Layout.slideSize(0))&&wt(B(a.track)[o("width")]/t)||s[o("autoWidth")]&&c.length||2*s.perPage):n=0,n}return{mount:r,destroy:u}},Move:function(o,c,i){var u,t=$(o),n=t.on,s=t.emit,a=o.state.set,t=c.Layout,r=t.slideSize,e=t.getPadding,l=t.totalSize,f=t.listSize,d=t.sliderSize,t=c.Direction,p=t.resolve,v=t.orient,t=c.Elements,h=t.list,g=t.track;function m(){c.Controller.isBusy()||(c.Scroll.cancel(),y(o.index),c.Slides.update())}function y(t){b(x(t,!0))}function b(t,n){var e,i;o.is(Sn)||(e=n?t:(n=t,n=o.is(En)&&(i=(e=S(n))>c.Controller.getEnd(),e<0||i)?w(n,i):n),R(h,"transform","translate"+p("X")+"("+e+"px)"),t!==e&&s("sh"))}function w(t,n){var e=t-k(n),i=d();return t-v(i*(wt(Y(e)/i)||1))*(n?1:-1)}function E(){b(P(),!0),u.cancel()}function S(t){for(var n=c.Slides.get(),e=0,i=1/0,o=0;o<n.length;o++){var r=n[o].index,u=Y(x(r,!0)-t);if(!(u<=i))break;i=u,e=r}return e}function x(t,n){var e=v(l(t-1)-(t=t,"center"===(e=i.focus)?(f()-r(t,!0))/2:+e*r(t)||0));return n?(t=e,t=i.trimSpace&&o.is(ot)?U(t,0,v(d(!0)-f())):t):e}function P(){var t=p("left");return B(h)[t]-B(g)[t]+v(e(!1))}function k(t){return x(t?c.Controller.getEnd():0,!!i.trimSpace)}return{mount:function(){u=c.Transition,n([K,Dt,Q,V],m)},move:function(t,n,e,i){var o,r;t!==n&&(o=e<t,r=v(w(P(),o)),o?0<=r:r<=h[p("scrollWidth")]-B(g)[p("width")])&&(E(),b(w(P(),e<t),!0)),a(4),s(J,n,e,t),u.start(n,function(){a(3),s(At,n,e,t),i&&i()})},jump:y,translate:b,shift:w,cancel:E,toIndex:S,toPosition:x,getPosition:P,getLimit:k,exceededLimit:function(t,n){n=ct(n)?P():n;var e=!0!==t&&v(n)<v(k(!1)),t=!1!==t&&v(n)>v(k(!0));return e||t},reposition:m}},Controller:function(o,r,u){var c,s,a,l,t=$(o),n=t.on,e=t.emit,f=r.Move,d=f.getPosition,i=f.getLimit,p=f.toPosition,t=r.Slides,v=t.isEnough,h=t.getLength,g=u.omitEnd,m=o.is(En),y=o.is(ot),b=I(k,!1),w=I(k,!0),E=u.start||0,S=E;function x(){s=h(!0),a=u.perMove,l=u.perPage,c=A();var t=U(E,0,g?c:s-1);t!==E&&(E=t,f.reposition())}function P(){c!==A()&&e("ei")}function k(t,n){var e=a||(O()?1:l),e=C(E+e*(t?-1:1),E,!(a||O()));return-1===e&&y&&!Et(d(),i(!t),1)?t?0:c:n?e:L(e)}function C(t,n,e){var i;return v()||O()?((i=function(t){if(y&&"move"===u.trimSpace&&t!==E)for(var n=d();n===p(t,!0)&&St(t,0,o.length-1,!u.rewind);)t<E?--t:++t;return t}(t))!==t&&(n=t,t=i,e=!1),t<0||c<t?t=a||!St(0,t,n,!0)&&!St(c,n,t,!0)?m?e?t<0?-(s%l||l):s:t:u.rewind?t<0?c:0:-1:_(D(t)):e&&t!==n&&(t=_(D(n)+(t<n?-1:1)))):t=-1,t}function L(t){return m?(t+s)%s||0:t}function A(){for(var t=s-(O()||m&&a?1:l);g&&0<t--;)if(p(s-1,!0)!==p(t,!0)){t++;break}return U(t,0,s-1)}function _(t){return U(O()?t:l*t,0,c)}function D(t){return O()?q(t,c):bt((c<=t?s-1:t)/l)}function M(t){t!==E&&(S=E,E=t)}function O(){return!ct(u.focus)||u.isNavigation}function z(){return o.state.is([4,5])&&!!u.waitForTransition}return{mount:function(){x(),n([Q,V,"ei"],x),n(Dt,P)},go:function(t,n,e){var i,o,r;z()||(r=E,T(t=t)?(i=(o=t.match(/([+\-<>])(\d+)?/)||[])[1],o=o[2],"+"===i||"-"===i?r=C(E+ +(""+i+(+o||1)),E):">"===i?r=o?_(+o):b(!0):"<"===i&&(r=w(!0))):r=m?t:U(t,0,c),-1<(i=L(o=r))&&(n||i!==E)&&(M(i),f.move(o,i,S,e)))},scroll:function(t,n,e,i){r.Scroll.scroll(t,n,e,function(){var t=L(f.toIndex(d()));M(g?q(t,c):t),i&&i()})},getNext:b,getPrev:w,getAdjacent:k,getEnd:A,setIndex:M,getIndex:function(t){return t?S:E},toIndex:_,toPage:D,toDest:function(t){t=f.toIndex(t);return y?U(t,0,c):t},hasFocus:O,isBusy:z}},Arrows:function(o,t,n){var e,i,r=$(o),u=r.on,c=r.bind,s=r.emit,a=n.classes,l=n.i18n,f=t.Elements,d=t.Controller,p=f.arrows,v=f.track,h=p,g=f.prev,m=f.next,y={};function b(){var t;!(t=n.arrows)||g&&m||(h=p||D("div",a.arrows),g=x(!0),m=x(!1),e=!0,k(h,[g,m]),p)||C(h,v),g&&m&&(_(y,{prev:g,next:m}),lt(h,t?"":"none"),N(h,i=nn+"--"+n.direction),t)&&(u([K,At,V,Z,"ei"],P),c(m,"click",I(S,">")),c(g,"click",I(S,"<")),P(),j([g,m],Wt,v.id),s("arrows:mounted",g,m)),u(Q,w)}function w(){E(),b()}function E(){r.destroy(),H(h,i),e?(X(p?[g,m]:h),g=m=null):F([g,m],Kt)}function S(t){d.go(t,!0)}function x(t){return pt('<button class="'+a.arrow+" "+(t?a.prev:a.next)+'" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false"><path d="'+(n.arrowPath||"m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z")+'" />')}function P(){var t,n,e,i;g&&m&&(i=o.index,t=d.getPrev(),n=d.getNext(),e=-1<t&&i<t?l.last:l.prev,i=-1<n&&n<i?l.first:l.next,g.disabled=t<0,m.disabled=n<0,j(g,et,e),j(m,et,i),s("arrows:updated",g,m,t,n))}return{arrows:y,mount:b,destroy:E,update:P}},Autoplay:function(t,n,e){var i,o,r=$(t),u=r.on,c=r.bind,s=r.emit,a=Nt(e.interval,t.go.bind(t,">"),function(t){var n=f.bar;n&&R(n,"width",100*t+"%"),s("autoplay:playing",t)}),l=a.isPaused,f=n.Elements,r=n.Elements,d=r.root,p=r.toggle,v=e.autoplay,h="pause"===v;function g(){l()&&n.Slides.isEnough()&&(a.start(!e.resetProgress),o=i=h=!1,b(),s(zt))}function m(t){h=!!(t=void 0===t?!0:t),b(),l()||(a.pause(),s(It))}function y(){h||(i||o?m(!1):g())}function b(){p&&(z(p,it,!h),j(p,et,e.i18n[h?"play":"pause"]))}function w(t){t=n.Slides.getAt(t);a.set(t&&+W(t.slide,xn)||e.interval)}return{mount:function(){v&&(e.pauseOnHover&&c(d,"mouseenter mouseleave",function(t){i="mouseenter"===t.type,y()}),e.pauseOnFocus&&c(d,"focusin focusout",function(t){o="focusin"===t.type,y()}),p&&c(p,"click",function(){h?g():m(!0)}),u([J,Mt,V],a.rewind),u(J,w),p&&j(p,Wt,f.track.id),h||g(),b())},destroy:a.cancel,play:g,pause:m,isPaused:l}},Cover:function(t,n,e){var i=$(t).on;function o(e){n.Slides.forEach(function(t){var n=at(t.container||t.slide,"img");n&&n.src&&r(e,n,t)})}function r(t,n,e){e.style("background",t?'center/cover no-repeat url("'+n.src+'")':"",!0),lt(n,t?"none":"")}return{mount:function(){e.cover&&(i(Tt,I(r,!0)),i([K,Q,V],I(o,!0)))},destroy:I(o,!1)}},Scroll:function(t,c,r){var s,a,n=$(t),e=n.on,l=n.emit,f=t.state.set,d=c.Move,p=d.getPosition,u=d.getLimit,v=d.exceededLimit,h=d.translate,g=t.is(ot),m=1;function y(t,n,e,i,o){var r,u=p(),e=(E(),!e||g&&v()||(e=c.Layout.sliderSize(),r=xt(t)*e*bt(Y(t)/e)||0,t=d.toPosition(c.Controller.toDest(t%e))+r),Et(u,t,1));m=1,n=e?0:n||yt(Y(t-u)/1.5,800),a=i,s=Nt(n,b,I(w,u,t,o),1),f(5),l(Mt),s.start()}function b(){f(3),a&&a(),l(Z)}function w(t,n,e,i){var o=p(),i=(t+(n-t)*(n=i,(t=r.easingFunc)?t(n):1-Math.pow(1-n,4))-o)*m;h(o+i),g&&!e&&v()&&(m*=.6,Y(i)<10)&&y(u(v(!0)),600,!1,a,!0)}function E(){s&&s.cancel()}function i(){s&&!s.isPaused()&&(E(),b())}return{mount:function(){e(J,E),e([Q,V],i)},destroy:E,scroll:y,cancel:i}},Drag:function(u,o,c){var s,n,r,a,l,f,d,p,t=$(u),e=t.on,v=t.emit,h=t.bind,g=t.unbind,m=u.state,y=o.Move,b=o.Scroll,w=o.Controller,E=o.Elements.track,S=o.Media.reduce,t=o.Direction,i=t.resolve,x=t.orient,P=y.getPosition,k=y.exceededLimit,C=!1;function N(){var t=c.drag;T(!t),a="free"===t}function F(t){var n,e,i;f=!1,d||(n=I(t),e=t.target,i=c.noDrag,st(e,"."+cn+", ."+en))||i&&st(e,i)||!n&&t.button||(w.isBusy()?G(t,!0):(p=n?E:window,l=m.is([4,5]),r=null,h(p,bn,L,Pn),h(p,wn,A,Pn),y.cancel(),b.cancel(),_(t)))}function L(t){var n,e,i,o,r;m.is(6)||(m.set(6),v("drag")),t.cancelable&&(l?(y.translate(s+D(t)/(C&&u.is(ot)?5:1)),r=200<M(t),n=C!==(C=k()),(r||n)&&_(t),f=!0,v("dragging"),G(t)):Y(D(r=t))>Y(D(r,!0))&&(n=t,e=c.dragMinThreshold,i=ut(e),o=i&&e.mouse||0,i=(i?e.touch:+e)||10,l=Y(D(n))>(I(n)?i:o),G(t)))}function A(t){var n,e,i;m.is(6)&&(m.set(3),v("dragged")),l&&(n=function(t){if(u.is(En)||!C){var n=M(t);if(n&&n<200)return D(t)/n}return 0}(t),e=n,e=P()+xt(e)*q(Y(e)*(c.flickPower||600),a?1/0:o.Layout.listSize()*(c.flickMaxPages||1)),i=c.rewind&&c.rewindByDrag,S(!1),a?w.scroll(e,0,c.snap):u.is(Sn)?w.go(x(xt(n))<0?i?"<":"-":i?">":"+"):u.is(ot)&&C&&i?w.go(k(!0)?">":"<"):w.go(w.toDest(e),!0),S(!0),G(t)),g(p,bn,L),g(p,wn,A),l=!1}function j(t){!d&&f&&G(t,!0)}function _(t){r=n,n=t,s=P()}function D(t,n){return z(t,n)-z(O(t),n)}function M(t){return gt(t)-gt(O(t))}function O(t){return n===t&&r||n}function z(t,n){return(I(t)?t.changedTouches[0]:t)["page"+i(n?"Y":"X")]}function I(t){return"undefined"!=typeof TouchEvent&&t instanceof TouchEvent}function T(t){d=t}return{mount:function(){h(E,bn,rt,Pn),h(E,wn,rt,Pn),h(E,yn,F,Pn),h(E,"click",j,{capture:!0}),h(E,"dragstart",G),e([K,Q],N)},disable:T,isDragging:function(){return l}}},Keyboard:function(n,t,e){var i,o,r=$(n),u=r.on,c=r.bind,s=r.unbind,a=n.root,l=t.Direction.resolve;function f(){var t=e.keyboard;t&&(i="global"===t?window:a,c(i,Ln,v))}function d(){s(i,Ln)}function p(){var t=o;o=!0,h(function(){o=t})}function v(t){o||((t=Cn(t))===l(Ft)?n.go("<"):t===l(jt)&&n.go(">"))}return{mount:function(){f(),u(Q,d),u(Q,f),u(J,p)},destroy:d,disable:function(t){o=t}}},LazyLoad:function(e,t,o){var n=$(e),i=n.on,r=n.off,u=n.bind,c=n.emit,s="sequential"===o.lazyLoad,a=[At,Z],l=[];function f(){O(l),t.Slides.forEach(function(i){ht(i.slide,Dn).forEach(function(t){var n=W(t,An),e=W(t,_n);n===t.src&&e===t.srcset||(n=o.classes.spinner,n=at(e=t.parentElement,"."+n)||D("span",n,e),l.push([t,i,n]),t.src)||lt(t,"none")})}),(s?h:(r(a),i(a,d),d))()}function d(){(l=l.filter(function(t){var n=o.perPage*((o.preloadPages||1)+1)-1;return!t[1].isWithin(e.index,n)||p(t)})).length||r(a)}function p(t){var n=t[0];N(t[1].slide,vn),u(n,"load error",I(v,t)),j(n,"src",W(n,An)),j(n,"srcset",W(n,_n)),F(n,An),F(n,_n)}function v(t,n){var e=t[0],i=t[1];H(i.slide,vn),"error"!==n.type&&(X(t[2]),lt(e,""),c(Tt,e,i),c(_t)),s&&h()}function h(){l.length&&p(l.shift())}return{mount:function(){o.lazyLoad&&(f(),i(V,f))},destroy:I(O,l),check:d}},Pagination:function(f,t,d){var p,v,n=$(f),h=n.on,g=n.emit,m=n.bind,y=t.Slides,b=t.Elements,w=t.Controller,E=w.hasFocus,i=w.getIndex,u=w.go,c=t.Direction.resolve,S=b.pagination,x=[];function P(){p&&(X(S?s(p.children):p),H(p,v),O(x),p=null),n.destroy()}function k(t){u(">"+t,!0)}function C(t,n){var e=x.length,i=Cn(n),o=L(),r=-1,o=(i===c(jt,!1,o)?r=++t%e:i===c(Ft,!1,o)?r=(--t+e)%e:"Home"===i?r=0:"End"===i&&(r=e-1),x[r]);o&&(ft(o.button),u(">"+r),G(n,!0))}function L(){return d.paginationDirection||d.direction}function A(t){return x[w.toPage(t)]}function _(){var t,n=A(i(!0)),e=A(i());n&&(H(t=n.button,it),F(t,l),j(t,nt,-1)),e&&(N(t=e.button,it),j(t,l,!0),j(t,nt,"")),g("pagination:updated",{list:p,items:x},n,e)}return{items:x,mount:function t(){P(),h([Q,V,"ei"],t);var n=d.pagination;if(S&&lt(S,n?"":"none"),n){h([J,Mt,Z],_);var n=f.length,e=d.classes,i=d.i18n,o=d.perPage,r=E()?w.getEnd()+1:wt(n/o);N(p=S||D("ul",e.pagination,b.track.parentElement),v=un+"--"+L()),j(p,tt,"tablist"),j(p,et,i.select),j(p,Ht,L()===Rt?"vertical":"");for(var u=0;u<r;u++){var c=D("li",null,p),s=D("button",{class:e.page,type:"button"},c),a=y.getIn(u).map(function(t){return t.slide.id}),l=!E()&&1<o?i.pageX:i.slideX;m(s,"click",I(k,u)),d.paginationKeyboard&&m(s,"keydown",I(C,u)),j(c,tt,"presentation"),j(s,tt,"tab"),j(s,Wt,a.join(" ")),j(s,et,Pt(l,u+1)),j(s,nt,-1),x.push({li:c,button:s,page:u})}_(),g("pagination:mounted",{list:p,items:x},A(f.index))}},destroy:P,getAt:A,update:_}},Sync:function(e,t,n){var i=n.isNavigation,o=n.slideFocus,r=[];function u(){var t,n;e.splides.forEach(function(t){t.isParent||(s(e,t.splide),s(t.splide,e))}),i&&((n=(t=$(e)).on)("click",l),n("sk",f),n([K,Q],a),r.push(t),t.emit(Ot,e.splides))}function c(){r.forEach(function(t){t.destroy()}),O(r)}function s(t,i){t=$(t);t.on(J,function(t,n,e){i.go(i.is(En)?e:t)}),r.push(t)}function a(){j(t.Elements.list,Ht,n.direction===Rt?"vertical":"")}function l(t){e.go(t.index)}function f(t,n){b(Mn,Cn(n))&&(l(t),G(n))}return{setup:I(t.Media.set,{slideFocus:ct(o)?i:o},!0),mount:u,destroy:c,remount:function(){c(),u()}}},Wheel:function(u,c,s){var t=$(u).bind,a=0;function n(t){var n,e,i,o,r;t.cancelable&&(n=(r=t.deltaY)<0,e=gt(t),i=s.wheelMinThreshold||0,o=s.wheelSleep||0,Y(r)>i&&o<e-a&&(u.go(n?"<":">"),a=e),r=n,s.releaseWheel&&!u.state.is(4)&&-1===c.Controller.getAdjacent(r)||G(t))}return{mount:function(){s.wheel&&t(c.Elements.track,"wheel",n,Pn)}}},Live:function(t,n,e){var i=$(t).on,o=n.Elements.track,r=e.live&&!e.isNavigation,u=D("span",ln),c=Nt(90,I(s,!1));function s(t){j(o,Yt,t),t?(k(o,u),c.start()):(X(u),c.cancel())}function a(t){r&&j(o,f,t?"off":"polite")}return{mount:function(){r&&(a(!n.Autoplay.isPaused()),j(o,Ut,!0),u.textContent="…",i(zt,I(a,!0)),i(It,I(a,!1)),i([At,Z],I(s,!0)))},disable:a,destroy:function(){F(o,[f,Ut,Yt]),X(u)}}}}),zn={type:"slide",role:"region",speed:400,perPage:1,cloneStatus:!0,arrows:!0,pagination:!0,paginationKeyboard:!0,interval:5e3,pauseOnHover:!0,pauseOnFocus:!0,resetProgress:!0,easing:"cubic-bezier(0.25, 1, 0.5, 1)",drag:!0,direction:"ltr",trimSpace:!0,focusableNodes:"a, button, textarea, input, select, iframe",live:!0,classes:n,i18n:{prev:"Previous slide",next:"Next slide",first:"Go to first slide",last:"Go to last slide",slideX:"Go to slide %s",pageX:"Go to page %s",play:"Start autoplay",pause:"Pause autoplay",carousel:"carousel",slide:"slide",select:"Select a slide to show",slideLabel:"%s of %s"},reducedMotion:{speed:0,rewindSpeed:0,autoplay:"pause"}};function In(t,n,e){var i=n.Slides;function o(){i.forEach(function(t){t.style("transform","translateX(-"+100*t.index+"%)")})}return{mount:function(){$(t).on([K,V],o)},start:function(t,n){i.style("transition","opacity "+e.speed+"ms "+e.easing),h(n)},cancel:rt}}function Tn(r,t,u){var c,s=t.Move,a=t.Controller,l=t.Scroll,n=t.Elements.list,f=I(R,n,"transition");function e(){f(""),l.cancel()}return{mount:function(){$(r).bind(n,"transitionend",function(t){t.target===n&&c&&(e(),c())})},start:function(t,n){var e=s.toPosition(t,!0),i=s.getPosition(),o=function(t){var n=u.rewindSpeed;if(r.is(ot)&&n){var e=a.getIndex(!0),i=a.getEnd();if(0===e&&i<=t||i<=e&&0===t)return n}return u.speed}(t);1<=Y(e-i)&&1<=o?u.useScroll?l.scroll(e,o,!1,n):(f("transform "+o+"ms "+u.easing),s.translate(e,!0),c=n):(s.jump(t),n())},cancel:e}}var Nn=function(){function o(t,n){this.event=$(),this.Components={},this.state=(e=1,{set:function(t){e=t},is:function(t){return b(y(t),e)}}),this.splides=[],this._o={},this._E={};var e,i=T(t)?vt(document,t):t;mt(i,i+" is invalid."),n=d({label:W(this.root=i,et)||"",labelledby:W(i,Xt)||""},zn,o.defaults,n||{});try{d(n,JSON.parse(W(i,u)))}catch(t){mt(!1,"Invalid JSON")}this._o=Object.create(d({},n))}for(var t=o.prototype,n=(t.mount=function(t,n){var e=this,i=this.state,o=this.Components;return mt(i.is([1,7]),"Already mounted!"),i.set(1),this._C=o,this._T=n||this._T||(this.is(Sn)?In:Tn),this._E=t||this._E,w(_({},On,this._E,{Transition:this._T}),function(t,n){t=t(e,o,e._o);(o[n]=t).setup&&t.setup()}),w(o,function(t){t.mount&&t.mount()}),this.emit(K),N(this.root,"is-initialized"),i.set(3),this.emit("ready"),this},t.sync=function(t){return this.splides.push({splide:t}),t.splides.push({splide:this,isParent:!0}),this.state.is(3)&&(this._C.Sync.remount(),t.Components.Sync.remount()),this},t.go=function(t){return this._C.Controller.go(t),this},t.on=function(t,n){return this.event.on(t,n),this},t.off=function(t){return this.event.off(t),this},t.emit=function(t){var n;return(n=this.event).emit.apply(n,[t].concat(s(arguments,1))),this},t.add=function(t,n){return this._C.Slides.add(t,n),this},t.remove=function(t){return this._C.Slides.remove(t),this},t.is=function(t){return this._o.type===t},t.refresh=function(){return this.emit(V),this},t.destroy=function(n){void 0===n&&(n=!0);var t=this.event,e=this.state;return e.is(1)?$(this).on("ready",this.destroy.bind(this,n)):(w(this._C,function(t){t.destroy&&t.destroy(n)},!0),t.emit(c),t.destroy(),n&&O(this.splides),e.set(7)),this},(t=o).prototype),e=[{key:"options",get:function(){return this._o},set:function(t){this._C.Media.set(t,!0,!0)}},{key:"length",get:function(){return this._C.Slides.getLength(!0)}},{key:"index",get:function(){return this._C.Controller.getIndex()}}],i=0;i<e.length;i++){var r=e[i];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(n,r.key,r)}return Object.defineProperty(t,"prototype",{writable:!1}),o}();function Fn(t,n,e){return Array.prototype.slice.call(t,n,e)}function jn(t){return t.bind.apply(t,[null].concat(Fn(arguments,1)))}function Rn(t){requestAnimationFrame(t)}function Wn(t,n){return typeof n===t}Nn.defaults={},Nn.STATES={CREATED:1,MOUNTED:2,IDLE:3,MOVING:4,SCROLLING:5,DRAGGING:6,DESTROYED:7};var Bn=Array.isArray;function Xn(t){return Bn(t)?t:[t]}function Gn(t,n){Xn(t).forEach(n)}jn(Wn,"function"),jn(Wn,"string"),jn(Wn,"undefined");var Hn=Object.keys,qn=Math.min,Yn="scrolled",Un="destroy";function Kn(t){var c,e=t?t.event.bus:document.createDocumentFragment(),i=(c=[],{bind:function(t,n,r,u){s(t,n,function(t,n,e){var i="addEventListener"in t,o=i?t.removeEventListener.bind(t,n,r,u):t.removeListener.bind(t,r);i?t.addEventListener(n,r,u):t.addListener(r),c.push([t,n,e,r,o])})},unbind:function(t,n,o){s(t,n,function(n,e,i){c=c.filter(function(t){return!!(t[0]!==n||t[1]!==e||t[2]!==i||o&&t[3]!==o)||(t[4](),!1)})})},dispatch:function(t,n,e){var i;return"function"==typeof CustomEvent?i=new CustomEvent(n,{bubbles:!0,detail:e}):(i=document.createEvent("CustomEvent")).initCustomEvent(n,!0,!1,e),t.dispatchEvent(i),i},destroy:function(){c.forEach(function(t){t[4]()}),c.length=0}});function s(t,e,i){Gn(t,function(n){n&&Gn(e,function(t){t.split(" ").forEach(function(t){t=t.split(".");i(n,t[0],t[1])})})})}return t&&t.event.on(Un,i.destroy),function(r){return Fn(arguments,1).forEach(function(t){var n=t;if(n)for(var e=Hn(n),i=0;i<e.length;i++){var o=e[i];"__proto__"!==o&&(n[o],r[o]=t[o])}}),r}(i,{bus:e,on:function(t,n){i.bind(e,Xn(t).join(" "),function(t){n.apply(n,Bn(t.detail)?t.detail:[])})},off:jn(i.unbind,e),emit:function(t){i.dispatch(e,t,Fn(arguments,1))}})}function Jn(n,t,e,i){var o,r,u=Date.now,c=0,s=!0,a=0;function l(){if(!s){if(c=n?qn((u()-o)/n,1):1,e&&e(c),1<=c&&(t(),o=u(),i)&&++a>=i)return f();Rn(l)}}function f(){s=!0}function d(){r&&cancelAnimationFrame(r),s=!(r=c=0)}return{start:function(t){t||d(),o=u()-(t?c*n:0),s=!1,Rn(l)},rewind:function(){o=u(),c=0,e&&e(c)},pause:f,cancel:d,set:function(t){n=t},isPaused:function(){return s}}}function Vn(t,n,e){return Array.prototype.slice.call(t,n,e)}function Qn(t){return t.bind(null,...Vn(arguments,1))}function Zn(t,n){return typeof n===t}function $n(t){return!ee(t)&&Zn("object",t)}const te=Array.isArray,ne=(Qn(Zn,"function"),Qn(Zn,"string"),Qn(Zn,"undefined"));function ee(t){return null===t}function ie(t,n){(te(t)?t:[t]).forEach(n)}const oe=Object.keys;function re(e,i,t){if(e){let n=oe(e);n=t?n.reverse():n;for(let t=0;t<n.length;t++){var o=n[t];if("__proto__"!==o&&!1===i(e[o],o))break}}}function ue(i){return Vn(arguments,1).forEach(e=>{re(e,(t,n)=>{i[n]=e[n]})}),i}function ce(e,n,i){$n(n)?re(n,(t,n)=>{ce(e,n,t)}):ie(e,t=>{var e;ee(i)||""===i?(e=n,ie(t,n=>{ie(e,t=>{n&&n.removeAttribute(t)})})):t.setAttribute(n,String(i))})}const{min:se,max:ae}=Math,le={speed:1,autoStart:!0,pauseOnHover:!0,pauseOnFocus:!0},fe={startScroll:"Start auto scroll",pauseScroll:"Pause auto scroll"};function de(u,c,s){const{on:t,off:n,bind:e,unbind:i}=Kn(u),{translate:a,getPosition:l,toIndex:f,getLimit:d}=c.Move,{setIndex:p,getIndex:v}=c.Controller,h=c.Direction["orient"],o=c.Elements["toggle"],r=c["Live"],g=u["root"],m=(y=c.Arrows.update,function(){b||(b=Jn(500,function(){y(),b=null},null,1)).start()});var y,b;let w,E,S,x,P,k,C={};function L(){u.is("fade")||w||!1===s.autoScroll||(w=Jn(0,z),C.pauseOnHover&&e(g,"mouseenter mouseleave",t=>{S="mouseenter"===t.type,O()}),C.pauseOnFocus&&e(g,"focusin focusout",t=>{x="focusin"===t.type,O()}),C.useToggleButton&&e(o,"click",()=>{(E?D:M)()}),t("updated",_),t(["move","drag","scroll"],()=>{M(!(P=!0))}),t(["moved","dragged",Yn],()=>{P=!1,O()}),C.autoStart&&("complete"===document.readyState?D():e(window,"load",D)))}function A(){w&&(w.cancel(),w=null,k=void 0,n(["move","drag","scroll","moved",Yn]),i(g,"mouseenter mouseleave focusin focusout"),i(o,"click"))}function _(){var t=s["autoScroll"];(!1!==t?(C=ue({},C,$n(t)?t:{}),L):A)(),w&&!ne(k)&&a(k)}function D(){T()&&(w.start(!0),r.disable(!0),x=S=E=!1,I())}function M(t=!0){E||(E=t,I(),T())||(w.pause(),r.disable(!1))}function O(){E||(S||x||P?M(!1):D())}function z(){var t,n,e,i,o=l(),r=(t=o,i=C.speed||1,t+=h(i),u.is("slide")&&(i=t,n=d(!1),r=d(!0),e=se(n,r),n=ae(n,r),t=se(ae(e,i),n)),t);o!==r?(a(r),e=k=l(),i=u.length,(e=(f(e)+i)%i)!==v()&&(p(e),c.Slides.update(),c.Pagination.update(),"nearby"===s.lazyLoad)&&c.LazyLoad.check()):(M(!1),C.rewind&&u.go(0<C.speed?0:c.Controller.getEnd())),m()}function I(){var t,n,e;o&&(t=E?"startScroll":"pauseScroll",e=!E,(n=o)&&ie("is-active",t=>{t&&n.classList[e?"add":"remove"](t)}),ce(o,"aria-label",s.i18n[t]||fe[t]))}function T(){return!w||w.isPaused()}return{setup:function(){var t=s["autoScroll"];C=ue({},le,$n(t)?t:{})},mount:L,destroy:A,play:D,pause:M,isPaused:T}}class pe{constructor(){this.sliderTop=document.querySelectorAll("[data-links-ticker-1]"),this.sliderBottom=document.querySelectorAll("[data-links-ticker-2]"),this.initSlider(this.sliderTop,this.sliderBottom)}initSlider(t,n){t.forEach(t=>{new Nn(t,{type:"loop",autoWidth:!0,rewind:!0,perPage:3,drag:"free",arrows:!1,pagination:!1,direction:"rtl",autoScroll:{speed:.5},breakpoints:{767:{perPage:2},1023:{perPage:3}}}).mount({AutoScroll:de})}),n.forEach(t=>{new Nn(t,{type:"loop",autoWidth:!0,rewind:!0,perPage:3,drag:"free",arrows:!1,pagination:!1,autoScroll:{speed:.5},breakpoints:{767:{perPage:2},1023:{perPage:3}}}).mount({AutoScroll:de})})}}document.addEventListener("DOMContentLoaded",function(){new pe})})();