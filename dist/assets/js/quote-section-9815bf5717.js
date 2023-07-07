(()=>{"use strict";var p="(prefers-reduced-motion: reduce)";function z(t){t.length=0}function c(t,n,e){return Array.prototype.slice.call(t,n,e)}function N(t){return t.bind.apply(t,[null].concat(c(arguments,1)))}function rt(){}var g=setTimeout;function v(t){return requestAnimationFrame(t)}function e(t,n){return typeof n===t}function ut(t){return!r(t)&&e("object",t)}var o=Array.isArray,S=N(e,"function"),I=N(e,"string"),st=N(e,"undefined");function r(t){return null===t}function m(t){try{return t instanceof(t.ownerDocument.defaultView||window).HTMLElement}catch(t){return!1}}function y(t){return o(t)?t:[t]}function h(t,n){y(t).forEach(n)}function b(t,n){return-1<t.indexOf(n)}function x(t,n){return t.push.apply(t,y(n)),t}function O(n,t,e){n&&h(t,function(t){t&&n.classList[e?"add":"remove"](t)})}function T(t,n){O(t,I(n)?n.split(" "):n,!0)}function P(t,n){h(n,t.appendChild.bind(t))}function k(t,e){h(t,function(t){var n=(e||t).parentNode;n&&n.insertBefore(t,e)})}function ct(t,n){return m(t)&&(t.msMatchesSelector||t.matches).call(t,n)}function C(t,n){t=t?c(t.children):[];return n?t.filter(function(t){return ct(t,n)}):t}function at(t,n){return n?C(t,n)[0]:t.firstElementChild}var _=Object.keys;function w(n,e,t){n&&(t?_(n).reverse():_(n)).forEach(function(t){"__proto__"!==t&&e(n[t],t)})}function A(i){return c(arguments,1).forEach(function(e){w(e,function(t,n){i[n]=e[n]})}),i}function d(e){return c(arguments,1).forEach(function(t){w(t,function(t,n){o(t)?e[n]=t.slice():ut(t)?e[n]=d({},ut(e[n])?e[n]:{},t):e[n]=t})}),e}function M(n,t){h(t||_(n),function(t){delete n[t]})}function F(t,e){h(t,function(n){h(e,function(t){n&&n.removeAttribute(t)})})}function j(e,n,i){ut(n)?w(n,function(t,n){j(e,n,t)}):h(e,function(t){r(i)||""===i?F(t,n):t.setAttribute(n,String(i))})}function D(t,n,e){t=document.createElement(t);return n&&(I(n)?T:j)(t,n),e&&P(e,t),t}function R(t,n,e){if(st(e))return getComputedStyle(t)[n];r(e)||(t.style[n]=""+e)}function lt(t,n){R(t,"display",n)}function ft(t){t.setActive&&t.setActive()||t.focus({preventScroll:!0})}function W(t,n){return t.getAttribute(n)}function dt(t,n){return t&&t.classList.contains(n)}function X(t){return t.getBoundingClientRect()}function G(t){h(t,function(t){t&&t.parentNode&&t.parentNode.removeChild(t)})}function pt(t){return at((new DOMParser).parseFromString(t,"text/html").body)}function B(t,n){t.preventDefault(),n&&(t.stopPropagation(),t.stopImmediatePropagation())}function ht(t,n){return t&&t.querySelector(n)}function gt(t,n){return n?c(t.querySelectorAll(n)):[]}function q(t,n){O(t,n,!1)}function vt(t){return t.timeStamp}function L(t){return I(t)?t:t?t+"px":""}var E="splide",u="data-"+E;function mt(t,n){if(!t)throw new Error("["+E+"] "+(n||""))}var H=Math.min,yt=Math.max,bt=Math.floor,wt=Math.ceil,Y=Math.abs;function Et(t,n,e){return Y(t-n)<e}function St(t,n,e,i){var o=H(n,e),n=yt(n,e);return i?o<t&&t<n:o<=t&&t<=n}function U(t,n,e){var i=H(n,e),n=yt(n,e);return H(yt(i,t),n)}function xt(t){return(0<t)-(t<0)}function Ct(n,t){return h(t,function(t){n=n.replace("%s",""+t)}),n}function Pt(t){return t<10?"0"+t:""+t}var kt={};function Lt(){var s=[];function e(t,e,i){h(t,function(n){n&&h(e,function(t){t.split(" ").forEach(function(t){t=t.split(".");i(n,t[0],t[1])})})})}return{bind:function(t,n,r,u){e(t,n,function(t,n,e){var i="addEventListener"in t,o=i?t.removeEventListener.bind(t,n,r,u):t.removeListener.bind(t,r);i?t.addEventListener(n,r,u):t.addListener(r),s.push([t,n,e,r,o])})},unbind:function(t,n,o){e(t,n,function(n,e,i){s=s.filter(function(t){return!!(t[0]!==n||t[1]!==e||t[2]!==i||o&&t[3]!==o)||(t[4](),!1)})})},dispatch:function(t,n,e){var i;return"function"==typeof CustomEvent?i=new CustomEvent(n,{bubbles:!0,detail:e}):(i=document.createEvent("CustomEvent")).initCustomEvent(n,!0,!1,e),t.dispatchEvent(i),i},destroy:function(){s.forEach(function(t){t[4]()}),z(s)}}}var K="mounted",J="move",_t="moved",V="refresh",Q="updated",At="resize",Dt="resized",Mt="scroll",Z="scrolled",s="destroy",zt="navigation:mounted",Ot="autoplay:play",Nt="autoplay:pause",It="lazyload:loaded";function $(t){var e=t?t.event.bus:document.createDocumentFragment(),i=Lt();return t&&t.event.on(s,i.destroy),A(i,{bus:e,on:function(t,n){i.bind(e,y(t).join(" "),function(t){n.apply(n,o(t.detail)?t.detail:[])})},off:N(i.unbind,e),emit:function(t){i.dispatch(e,t,c(arguments,1))}})}function Tt(n,t,e,i){var o,r,u=Date.now,s=0,c=!0,a=0;function l(){if(!c){if(s=n?H((u()-o)/n,1):1,e&&e(s),1<=s&&(t(),o=u(),i)&&++a>=i)return f();r=v(l)}}function f(){c=!0}function d(){r&&cancelAnimationFrame(r),c=!(r=s=0)}return{start:function(t){t||d(),o=u()-(t?s*n:0),c=!1,r=v(l)},rewind:function(){o=u(),s=0,e&&e(s)},pause:f,cancel:d,set:function(t){n=t},isPaused:function(){return c}}}var t="Arrow",Ft=t+"Left",jt=t+"Right",i=t+"Up",t=t+"Down",Rt="ttb",a={width:["height"],left:["top","right"],right:["bottom","left"],x:["y"],X:["Y"],Y:["X"],ArrowLeft:[i,jt],ArrowRight:[t,Ft]},tt="role",nt="tabindex",n="aria-",Wt=n+"controls",Xt=n+"current",l=n+"selected",et=n+"label",Gt=n+"labelledby",Bt=n+"hidden",qt=n+"orientation",Ht=n+"roledescription",f=n+"live",Yt=n+"busy",Ut=n+"atomic",Kt=[tt,nt,"disabled",Wt,Xt,et,Gt,Bt,qt,Ht],n=E+"__",Jt=E,Vt=n+"track",Qt=n+"list",Zt=n+"slide",$t=Zt+"--clone",tn=Zt+"__container",nn=n+"arrows",en=n+"arrow",on=en+"--prev",rn=en+"--next",un=n+"pagination",sn=un+"__page",cn=n+"progress__bar",an=n+"toggle",ln=n+"sr",it="is-active",fn="is-prev",dn="is-next",pn="is-visible",hn="is-loading",gn="is-focus-in",vn="is-overflow",mn=[it,pn,fn,dn,hn,gn,vn],n={slide:Zt,clone:$t,arrows:nn,arrow:en,prev:on,next:rn,pagination:un,page:sn,spinner:n+"spinner"},yn="touchstart mousedown",bn="touchmove mousemove",wn="touchend touchcancel mouseup click",ot="slide",En="loop",Sn="fade",xn=u+"-interval",Cn={passive:!1,capture:!0},Pn={Spacebar:" ",Right:jt,Left:Ft,Up:i,Down:t};function kn(t){return t=I(t)?t:t.key,Pn[t]||t}var Ln="keydown",_n=u+"-lazy",An=_n+"-srcset",Dn="["+_n+"], ["+An+"]",Mn=[" ","Enter"],zn=Object.freeze({__proto__:null,Media:function(i,t,o){var r=i.state,n=o.breakpoints||{},u=o.reducedMotion||{},e=Lt(),s=[];function c(t){t&&e.destroy()}function a(t,n){n=matchMedia(n);e.bind(n,"change",l),s.push([t,n])}function l(){var t=r.is(7),n=o.direction,e=s.reduce(function(t,n){return d(t,n[1].matches?n[0]:{})},{});M(o),f(e),o.destroy?i.destroy("completely"===o.destroy):t?(c(!0),i.mount()):n!==o.direction&&i.refresh()}function f(t,n,e){d(o,t),n&&d(Object.getPrototypeOf(o),t),!e&&r.is(1)||i.emit(Q,o)}return{setup:function(){var e="min"===o.mediaQuery;_(n).sort(function(t,n){return e?+t-+n:+n-+t}).forEach(function(t){a(n[t],"("+(e?"min":"max")+"-width:"+t+"px)")}),a(u,p),l()},destroy:c,reduce:function(t){matchMedia(p).matches&&(t?d(o,u):M(o,_(u)))},set:f}},Direction:function(t,n,o){return{resolve:function(t,n,e){var i="rtl"!==(e=e||o.direction)||n?e===Rt?0:-1:1;return a[t]&&a[t][i]||t.replace(/width|left|right/i,function(t,n){t=a[t.toLowerCase()][i]||t;return 0<n?t.charAt(0).toUpperCase()+t.slice(1):t})},orient:function(t){return t*("rtl"===o.direction?1:-1)}}},Elements:function(t,n,e){var i,o,r,u=$(t),s=u.on,c=u.bind,a=t.root,l=e.i18n,f={},d=[],p=[],h=[];function g(){var t,n;i=y("."+Vt),o=at(i,"."+Qt),mt(i&&o,"A track/list element is missing."),x(d,C(o,"."+Zt+":not(."+$t+")")),w({arrows:nn,pagination:un,prev:on,next:rn,bar:cn,toggle:an},function(t,n){f[n]=y("."+t)}),A(f,{root:a,track:i,list:o,slides:d}),t=a.id||""+E+Pt(kt[E]=(kt[E]||0)+1),n=e.role,a.id=t,i.id=i.id||t+"-track",o.id=o.id||t+"-list",!W(a,tt)&&"SECTION"!==a.tagName&&n&&j(a,tt,n),j(a,Ht,l.carousel),j(o,tt,"presentation"),m()}function v(t){var n=Kt.concat("style");z(d),q(a,p),q(i,h),F([i,o],n),F(a,t?n:["style",Ht])}function m(){q(a,p),q(i,h),p=b(Jt),h=b(Vt),T(a,p),T(i,h),j(a,et,e.label),j(a,Gt,e.labelledby)}function y(t){t=ht(a,t);return t&&function(t,n){if(S(t.closest))return t.closest(n);for(var e=t;e&&1===e.nodeType&&!ct(e,n);)e=e.parentElement;return e}(t,"."+Jt)===a?t:void 0}function b(t){return[t+"--"+e.type,t+"--"+e.direction,e.drag&&t+"--draggable",e.isNavigation&&t+"--nav",t===Jt&&it]}return A(f,{setup:g,mount:function(){s(V,v),s(V,g),s(Q,m),c(document,yn+" keydown",function(t){r="keydown"===t.type},{capture:!0}),c(a,"focusin",function(){O(a,gn,!!r)})},destroy:v})},Slides:function(D,o,r){var t=$(D),n=t.on,u=t.emit,s=t.bind,t=o.Elements,c=t.slides,a=t.list,M=[];function e(){c.forEach(function(t,n){l(t,n,-1)})}function i(){d(function(t){t.destroy()}),z(M)}function l(t,n,e){u=n,i=e,s=t,o=$(r=D),a=o.on,l=o.emit,f=o.bind,d=r.Components,p=r.root,h=r.options,g=h.isNavigation,v=h.updateOnMove,m=h.i18n,y=h.pagination,b=h.slideFocus,w=d.Direction.resolve,E=W(s,"style"),S=W(s,et),x=-1<i,C=at(s,"."+tn);var r,u,i,s,c,o,a,l,f,d,p,h,g,v,m,y,b,w,E,S,x,C,P,n=P={index:u,slideIndex:i,slide:s,container:C,isClone:x,mount:function(){x||(s.id=p.id+"-slide"+Pt(u+1),j(s,tt,y?"tabpanel":"group"),j(s,Ht,m.slide),j(s,et,S||Ct(m.slideLabel,[u+1,r.length]))),f(s,"click",N(l,"click",P)),f(s,"keydown",N(l,"sk",P)),a([_t,"sh",Z],_),a(zt,k),v&&a(J,L)},destroy:function(){c=!0,o.destroy(),q(s,mn),F(s,Kt),j(s,"style",E),j(s,et,S||"")},update:_,style:function(t,n,e){R(e&&C||s,t,n)},isWithin:function(t,n){t=Y(t-u);return(t=x||!h.rewind&&!r.is(En)?t:H(t,r.length-t))<=n}};function k(){var t=r.splides.map(function(t){t=t.splide.Components.Slides.getAt(u);return t?t.slide.id:""}).join(" ");j(s,et,Ct(m.slideX,(x?i:u)+1)),j(s,Wt,t),j(s,tt,b?"button":""),b&&F(s,Ht)}function L(){c||_()}function _(){var t,n,e,i,o;c||(t=r.index,(o=A())!==dt(s,it)&&(O(s,it,o),j(s,Xt,g&&o||""),l(o?"active":"inactive",P)),i=!(e=r.is(Sn)?A():(n=X(d.Elements.track),i=X(s),e=w("left",!0),o=w("right",!0),bt(n[e])<=wt(i[e])&&bt(i[o])<=wt(n[o])))&&(!A()||x),r.state.is([4,5])||j(s,Bt,i||""),j(gt(s,h.focusableNodes||""),nt,i?-1:""),b&&j(s,nt,i?-1:0),e!==dt(s,pn)&&(O(s,pn,e),l(e?"visible":"hidden",P)),e||document.activeElement!==s||(n=d.Slides.getAt(r.index))&&ft(n.slide),O(s,fn,u===t-1),O(s,dn,u===t+1))}function A(){var t=r.index;return t===u||h.cloneStatus&&t===i}n.mount(),M.push(n),M.sort(function(t,n){return t.index-n.index})}function f(t){return t?p(function(t){return!t.isClone}):M}function d(t,n){f(n).forEach(t)}function p(n){return M.filter(S(n)?n:function(t){return I(n)?ct(t.slide,n):b(y(n),t.index)})}return{mount:function(){e(),n(V,i),n(V,e)},destroy:i,update:function(){d(function(t){t.update()})},register:l,get:f,getIn:function(t){var n=o.Controller,e=n.toIndex(t),i=n.hasFocus()?1:r.perPage;return p(function(t){return St(t.index,e,e+i-1)})},getAt:function(t){return p(t)[0]},add:function(t,o){h(t,function(t){var n,e,i;m(t=I(t)?pt(t):t)&&((n=c[o])?k(t,n):P(a,t),T(t,r.classes.slide),n=t,e=N(u,At),t=gt(n,"img"),(i=t.length)?t.forEach(function(t){s(t,"load error",function(){--i||e()})}):e())}),u(V)},remove:function(t){G(p(t).map(function(t){return t.slide})),u(V)},forEach:d,filter:p,style:function(n,e,i){d(function(t){t.style(n,e,i)})},getLength:function(t){return(t?c:M).length},isEnough:function(){return M.length>r.perPage}}},Layout:function(n,t,e){var i,o,r,u=$(n),s=u.on,c=u.bind,a=u.emit,u=t.Slides,l=t.Direction.resolve,t=t.Elements,f=t.root,d=t.track,p=t.list,h=u.getAt,g=u.style;function v(){i=e.direction===Rt,R(f,"maxWidth",L(e.width)),R(d,l("paddingLeft"),y(!1)),R(d,l("paddingRight"),y(!0)),m(!0)}function m(t){var n=X(f);!t&&o.width===n.width&&o.height===n.height||(R(d,"height",(t="",i&&(mt(t=b(),"height or heightRatio is missing."),t="calc("+t+" - "+y(!1)+" - "+y(!0)+")"),t)),g(l("marginRight"),L(e.gap)),g("width",e.autoWidth?null:L(e.fixedWidth)||(i?"":w())),g("height",L(e.fixedHeight)||(i?e.autoHeight?null:w():b()),!0),o=n,a(Dt),r===(r=k()))||(O(f,vn,r),a("overflow",r))}function y(t){var n=e.padding,t=l(t?"right":"left");return n&&L(n[t]||(ut(n)?0:n))||"0px"}function b(){return L(e.height||X(p).width*e.heightRatio)}function w(){var t=L(e.gap);return"calc((100%"+(t&&" + "+t)+")/"+(e.perPage||1)+(t&&" - "+t)+")"}function E(){return X(p)[l("width")]}function S(t,n){t=h(t||0);return t?X(t.slide)[l("width")]+(n?0:P()):0}function x(t,n){var e,t=h(t);return t?(t=X(t.slide)[l("right")],e=X(p)[l("left")],Y(t-e)+(n?0:P())):0}function C(t){return x(n.length-1)-x(0)+S(0,t)}function P(){var t=h(0);return t&&parseFloat(R(t.slide,l("marginRight")))||0}function k(){return n.is(Sn)||C(!0)>E()}return{mount:function(){var t,n;v(),c(window,"resize load",(t=N(a,At),n=Tt(0,t,null,1),function(){n.isPaused()&&n.start()})),s([Q,V],v),s(At,m)},resize:m,listSize:E,slideSize:S,sliderSize:C,totalSize:x,getPadding:function(t){return parseFloat(R(d,l("padding"+(t?"Right":"Left"))))||0},isOverflow:k}},Clones:function(s,e,c){var n,i=$(s),t=i.on,a=e.Elements,l=e.Slides,o=e.Direction.resolve,f=[];function r(){if(t(V,d),t([Q,At],p),n=h()){var o=n,r=l.get().slice(),u=r.length;if(u){for(;r.length<o;)x(r,r);x(r.slice(-o),r.slice(0,o)).forEach(function(t,n){var e=n<o,i=function(t,n){t=t.cloneNode(!0);return T(t,c.classes.clone),t.id=s.root.id+"-clone"+Pt(n+1),t}(t.slide,n);e?k(i,r[0].slide):P(a.list,i),x(f,i),l.register(i,n-o+(e?0:u),t.index)})}e.Layout.resize(!0)}}function d(){u(),r()}function u(){G(f),z(f),i.destroy()}function p(){var t=h();n!==t&&(n<t||!t)&&i.emit(V)}function h(){var t,n=c.clones;return s.is(En)?st(n)&&(n=(t=c[o("fixedWidth")]&&e.Layout.slideSize(0))&&wt(X(a.track)[o("width")]/t)||c[o("autoWidth")]&&s.length||2*c.perPage):n=0,n}return{mount:r,destroy:u}},Move:function(o,s,i){var u,t=$(o),n=t.on,c=t.emit,a=o.state.set,t=s.Layout,r=t.slideSize,e=t.getPadding,l=t.totalSize,f=t.listSize,d=t.sliderSize,t=s.Direction,p=t.resolve,h=t.orient,t=s.Elements,g=t.list,v=t.track;function m(){s.Controller.isBusy()||(s.Scroll.cancel(),y(o.index),s.Slides.update())}function y(t){b(x(t,!0))}function b(t,n){var e,i;o.is(Sn)||(e=n?t:(n=t,n=o.is(En)&&(i=(e=S(n))>s.Controller.getEnd(),e<0||i)?w(n,i):n),R(g,"transform","translate"+p("X")+"("+e+"px)"),t!==e&&c("sh"))}function w(t,n){var e=t-P(n),i=d();return t-h(i*(wt(Y(e)/i)||1))*(n?1:-1)}function E(){b(C(),!0),u.cancel()}function S(t){for(var n=s.Slides.get(),e=0,i=1/0,o=0;o<n.length;o++){var r=n[o].index,u=Y(x(r,!0)-t);if(!(u<=i))break;i=u,e=r}return e}function x(t,n){var e=h(l(t-1)-(t=t,"center"===(e=i.focus)?(f()-r(t,!0))/2:+e*r(t)||0));return n?(t=e,t=i.trimSpace&&o.is(ot)?U(t,0,h(d(!0)-f())):t):e}function C(){var t=p("left");return X(g)[t]-X(v)[t]+h(e(!1))}function P(t){return x(t?s.Controller.getEnd():0,!!i.trimSpace)}return{mount:function(){u=s.Transition,n([K,Dt,Q,V],m)},move:function(t,n,e,i){var o,r;t!==n&&(o=e<t,r=h(w(C(),o)),o?0<=r:r<=g[p("scrollWidth")]-X(v)[p("width")])&&(E(),b(w(C(),e<t),!0)),a(4),c(J,n,e,t),u.start(n,function(){a(3),c(_t,n,e,t),i&&i()})},jump:y,translate:b,shift:w,cancel:E,toIndex:S,toPosition:x,getPosition:C,getLimit:P,exceededLimit:function(t,n){n=st(n)?C():n;var e=!0!==t&&h(n)<h(P(!1)),t=!1!==t&&h(n)>h(P(!0));return e||t},reposition:m}},Controller:function(o,r,u){var s,c,a,l,t=$(o),n=t.on,e=t.emit,f=r.Move,d=f.getPosition,i=f.getLimit,p=f.toPosition,t=r.Slides,h=t.isEnough,g=t.getLength,v=u.omitEnd,m=o.is(En),y=o.is(ot),b=N(P,!1),w=N(P,!0),E=u.start||0,S=E;function x(){c=g(!0),a=u.perMove,l=u.perPage,s=_();var t=U(E,0,v?s:c-1);t!==E&&(E=t,f.reposition())}function C(){s!==_()&&e("ei")}function P(t,n){var e=a||(z()?1:l),e=k(E+e*(t?-1:1),E,!(a||z()));return-1===e&&y&&!Et(d(),i(!t),1)?t?0:s:n?e:L(e)}function k(t,n,e){var i;return h()||z()?((i=function(t){if(y&&"move"===u.trimSpace&&t!==E)for(var n=d();n===p(t,!0)&&St(t,0,o.length-1,!u.rewind);)t<E?--t:++t;return t}(t))!==t&&(n=t,t=i,e=!1),t<0||s<t?t=a||!St(0,t,n,!0)&&!St(s,n,t,!0)?m?e?t<0?-(c%l||l):c:t:u.rewind?t<0?s:0:-1:A(D(t)):e&&t!==n&&(t=A(D(n)+(t<n?-1:1)))):t=-1,t}function L(t){return m?(t+c)%c||0:t}function _(){for(var t=c-(z()||m&&a?1:l);v&&0<t--;)if(p(c-1,!0)!==p(t,!0)){t++;break}return U(t,0,c-1)}function A(t){return U(z()?t:l*t,0,s)}function D(t){return z()?H(t,s):bt((s<=t?c-1:t)/l)}function M(t){t!==E&&(S=E,E=t)}function z(){return!st(u.focus)||u.isNavigation}function O(){return o.state.is([4,5])&&!!u.waitForTransition}return{mount:function(){x(),n([Q,V,"ei"],x),n(Dt,C)},go:function(t,n,e){var i,o,r;O()||(r=E,I(t=t)?(i=(o=t.match(/([+\-<>])(\d+)?/)||[])[1],o=o[2],"+"===i||"-"===i?r=k(E+ +(""+i+(+o||1)),E):">"===i?r=o?A(+o):b(!0):"<"===i&&(r=w(!0))):r=m?t:U(t,0,s),-1<(i=L(o=r))&&(n||i!==E)&&(M(i),f.move(o,i,S,e)))},scroll:function(t,n,e,i){r.Scroll.scroll(t,n,e,function(){var t=L(f.toIndex(d()));M(v?H(t,s):t),i&&i()})},getNext:b,getPrev:w,getAdjacent:P,getEnd:_,setIndex:M,getIndex:function(t){return t?S:E},toIndex:A,toPage:D,toDest:function(t){t=f.toIndex(t);return y?U(t,0,s):t},hasFocus:z,isBusy:O}},Arrows:function(o,t,n){var e,i,r=$(o),u=r.on,s=r.bind,c=r.emit,a=n.classes,l=n.i18n,f=t.Elements,d=t.Controller,p=f.arrows,h=f.track,g=p,v=f.prev,m=f.next,y={};function b(){var t;!(t=n.arrows)||v&&m||(g=p||D("div",a.arrows),v=x(!0),m=x(!1),e=!0,P(g,[v,m]),p)||k(g,h),v&&m&&(A(y,{prev:v,next:m}),lt(g,t?"":"none"),T(g,i=nn+"--"+n.direction),t)&&(u([K,_t,V,Z,"ei"],C),s(m,"click",N(S,">")),s(v,"click",N(S,"<")),C(),j([v,m],Wt,h.id),c("arrows:mounted",v,m)),u(Q,w)}function w(){E(),b()}function E(){r.destroy(),q(g,i),e?(G(p?[v,m]:g),v=m=null):F([v,m],Kt)}function S(t){d.go(t,!0)}function x(t){return pt('<button class="'+a.arrow+" "+(t?a.prev:a.next)+'" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false"><path d="'+(n.arrowPath||"m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z")+'" />')}function C(){var t,n,e,i;v&&m&&(i=o.index,t=d.getPrev(),n=d.getNext(),e=-1<t&&i<t?l.last:l.prev,i=-1<n&&n<i?l.first:l.next,v.disabled=t<0,m.disabled=n<0,j(v,et,e),j(m,et,i),c("arrows:updated",v,m,t,n))}return{arrows:y,mount:b,destroy:E,update:C}},Autoplay:function(t,n,e){var i,o,r=$(t),u=r.on,s=r.bind,c=r.emit,a=Tt(e.interval,t.go.bind(t,">"),function(t){var n=f.bar;n&&R(n,"width",100*t+"%"),c("autoplay:playing",t)}),l=a.isPaused,f=n.Elements,r=n.Elements,d=r.root,p=r.toggle,h=e.autoplay,g="pause"===h;function v(){l()&&n.Slides.isEnough()&&(a.start(!e.resetProgress),o=i=g=!1,b(),c(Ot))}function m(t){g=!!(t=void 0===t?!0:t),b(),l()||(a.pause(),c(Nt))}function y(){g||(i||o?m(!1):v())}function b(){p&&(O(p,it,!g),j(p,et,e.i18n[g?"play":"pause"]))}function w(t){t=n.Slides.getAt(t);a.set(t&&+W(t.slide,xn)||e.interval)}return{mount:function(){h&&(e.pauseOnHover&&s(d,"mouseenter mouseleave",function(t){i="mouseenter"===t.type,y()}),e.pauseOnFocus&&s(d,"focusin focusout",function(t){o="focusin"===t.type,y()}),p&&s(p,"click",function(){g?v():m(!0)}),u([J,Mt,V],a.rewind),u(J,w),p&&j(p,Wt,f.track.id),g||v(),b())},destroy:a.cancel,play:v,pause:m,isPaused:l}},Cover:function(t,n,e){var i=$(t).on;function o(e){n.Slides.forEach(function(t){var n=at(t.container||t.slide,"img");n&&n.src&&r(e,n,t)})}function r(t,n,e){e.style("background",t?'center/cover no-repeat url("'+n.src+'")':"",!0),lt(n,t?"none":"")}return{mount:function(){e.cover&&(i(It,N(r,!0)),i([K,Q,V],N(o,!0)))},destroy:N(o,!1)}},Scroll:function(t,s,r){var c,a,n=$(t),e=n.on,l=n.emit,f=t.state.set,d=s.Move,p=d.getPosition,u=d.getLimit,h=d.exceededLimit,g=d.translate,v=t.is(ot),m=1;function y(t,n,e,i,o){var r,u=p(),e=(E(),!e||v&&h()||(e=s.Layout.sliderSize(),r=xt(t)*e*bt(Y(t)/e)||0,t=d.toPosition(s.Controller.toDest(t%e))+r),Et(u,t,1));m=1,n=e?0:n||yt(Y(t-u)/1.5,800),a=i,c=Tt(n,b,N(w,u,t,o),1),f(5),l(Mt),c.start()}function b(){f(3),a&&a(),l(Z)}function w(t,n,e,i){var o=p(),i=(t+(n-t)*(n=i,(t=r.easingFunc)?t(n):1-Math.pow(1-n,4))-o)*m;g(o+i),v&&!e&&h()&&(m*=.6,Y(i)<10)&&y(u(h(!0)),600,!1,a,!0)}function E(){c&&c.cancel()}function i(){c&&!c.isPaused()&&(E(),b())}return{mount:function(){e(J,E),e([Q,V],i)},destroy:E,scroll:y,cancel:i}},Drag:function(u,o,s){var c,n,r,a,l,f,d,p,t=$(u),e=t.on,h=t.emit,g=t.bind,v=t.unbind,m=u.state,y=o.Move,b=o.Scroll,w=o.Controller,E=o.Elements.track,S=o.Media.reduce,t=o.Direction,i=t.resolve,x=t.orient,C=y.getPosition,P=y.exceededLimit,k=!1;function T(){var t=s.drag;I(!t),a="free"===t}function F(t){var n,e,i;f=!1,d||(n=N(t),e=t.target,i=s.noDrag,ct(e,"."+sn+", ."+en))||i&&ct(e,i)||!n&&t.button||(w.isBusy()?B(t,!0):(p=n?E:window,l=m.is([4,5]),r=null,g(p,bn,L,Cn),g(p,wn,_,Cn),y.cancel(),b.cancel(),A(t)))}function L(t){var n,e,i,o,r;m.is(6)||(m.set(6),h("drag")),t.cancelable&&(l?(y.translate(c+D(t)/(k&&u.is(ot)?5:1)),r=200<M(t),n=k!==(k=P()),(r||n)&&A(t),f=!0,h("dragging"),B(t)):Y(D(r=t))>Y(D(r,!0))&&(n=t,e=s.dragMinThreshold,i=ut(e),o=i&&e.mouse||0,i=(i?e.touch:+e)||10,l=Y(D(n))>(N(n)?i:o),B(t)))}function _(t){var n,e,i;m.is(6)&&(m.set(3),h("dragged")),l&&(n=function(t){if(u.is(En)||!k){var n=M(t);if(n&&n<200)return D(t)/n}return 0}(t),e=n,e=C()+xt(e)*H(Y(e)*(s.flickPower||600),a?1/0:o.Layout.listSize()*(s.flickMaxPages||1)),i=s.rewind&&s.rewindByDrag,S(!1),a?w.scroll(e,0,s.snap):u.is(Sn)?w.go(x(xt(n))<0?i?"<":"-":i?">":"+"):u.is(ot)&&k&&i?w.go(P(!0)?">":"<"):w.go(w.toDest(e),!0),S(!0),B(t)),v(p,bn,L),v(p,wn,_),l=!1}function j(t){!d&&f&&B(t,!0)}function A(t){r=n,n=t,c=C()}function D(t,n){return O(t,n)-O(z(t),n)}function M(t){return vt(t)-vt(z(t))}function z(t){return n===t&&r||n}function O(t,n){return(N(t)?t.changedTouches[0]:t)["page"+i(n?"Y":"X")]}function N(t){return"undefined"!=typeof TouchEvent&&t instanceof TouchEvent}function I(t){d=t}return{mount:function(){g(E,bn,rt,Cn),g(E,wn,rt,Cn),g(E,yn,F,Cn),g(E,"click",j,{capture:!0}),g(E,"dragstart",B),e([K,Q],T)},disable:I,isDragging:function(){return l}}},Keyboard:function(n,t,e){var i,o,r=$(n),u=r.on,s=r.bind,c=r.unbind,a=n.root,l=t.Direction.resolve;function f(){var t=e.keyboard;t&&(i="global"===t?window:a,s(i,Ln,h))}function d(){c(i,Ln)}function p(){var t=o;o=!0,g(function(){o=t})}function h(t){o||((t=kn(t))===l(Ft)?n.go("<"):t===l(jt)&&n.go(">"))}return{mount:function(){f(),u(Q,d),u(Q,f),u(J,p)},destroy:d,disable:function(t){o=t}}},LazyLoad:function(e,t,o){var n=$(e),i=n.on,r=n.off,u=n.bind,s=n.emit,c="sequential"===o.lazyLoad,a=[_t,Z],l=[];function f(){z(l),t.Slides.forEach(function(i){gt(i.slide,Dn).forEach(function(t){var n=W(t,_n),e=W(t,An);n===t.src&&e===t.srcset||(n=o.classes.spinner,n=at(e=t.parentElement,"."+n)||D("span",n,e),l.push([t,i,n]),t.src)||lt(t,"none")})}),(c?g:(r(a),i(a,d),d))()}function d(){(l=l.filter(function(t){var n=o.perPage*((o.preloadPages||1)+1)-1;return!t[1].isWithin(e.index,n)||p(t)})).length||r(a)}function p(t){var n=t[0];T(t[1].slide,hn),u(n,"load error",N(h,t)),j(n,"src",W(n,_n)),j(n,"srcset",W(n,An)),F(n,_n),F(n,An)}function h(t,n){var e=t[0],i=t[1];q(i.slide,hn),"error"!==n.type&&(G(t[2]),lt(e,""),s(It,e,i),s(At)),c&&g()}function g(){l.length&&p(l.shift())}return{mount:function(){o.lazyLoad&&(f(),i(V,f))},destroy:N(z,l),check:d}},Pagination:function(f,t,d){var p,h,n=$(f),g=n.on,v=n.emit,m=n.bind,y=t.Slides,b=t.Elements,w=t.Controller,E=w.hasFocus,i=w.getIndex,u=w.go,s=t.Direction.resolve,S=b.pagination,x=[];function C(){p&&(G(S?c(p.children):p),q(p,h),z(x),p=null),n.destroy()}function P(t){u(">"+t,!0)}function k(t,n){var e=x.length,i=kn(n),o=L(),r=-1,o=(i===s(jt,!1,o)?r=++t%e:i===s(Ft,!1,o)?r=(--t+e)%e:"Home"===i?r=0:"End"===i&&(r=e-1),x[r]);o&&(ft(o.button),u(">"+r),B(n,!0))}function L(){return d.paginationDirection||d.direction}function _(t){return x[w.toPage(t)]}function A(){var t,n=_(i(!0)),e=_(i());n&&(q(t=n.button,it),F(t,l),j(t,nt,-1)),e&&(T(t=e.button,it),j(t,l,!0),j(t,nt,"")),v("pagination:updated",{list:p,items:x},n,e)}return{items:x,mount:function t(){C(),g([Q,V,"ei"],t);var n=d.pagination;if(S&&lt(S,n?"":"none"),n){g([J,Mt,Z],A);var n=f.length,e=d.classes,i=d.i18n,o=d.perPage,r=E()?w.getEnd()+1:wt(n/o);T(p=S||D("ul",e.pagination,b.track.parentElement),h=un+"--"+L()),j(p,tt,"tablist"),j(p,et,i.select),j(p,qt,L()===Rt?"vertical":"");for(var u=0;u<r;u++){var s=D("li",null,p),c=D("button",{class:e.page,type:"button"},s),a=y.getIn(u).map(function(t){return t.slide.id}),l=!E()&&1<o?i.pageX:i.slideX;m(c,"click",N(P,u)),d.paginationKeyboard&&m(c,"keydown",N(k,u)),j(s,tt,"presentation"),j(c,tt,"tab"),j(c,Wt,a.join(" ")),j(c,et,Ct(l,u+1)),j(c,nt,-1),x.push({li:s,button:c,page:u})}A(),v("pagination:mounted",{list:p,items:x},_(f.index))}},destroy:C,getAt:_,update:A}},Sync:function(e,t,n){var i=n.isNavigation,o=n.slideFocus,r=[];function u(){var t,n;e.splides.forEach(function(t){t.isParent||(c(e,t.splide),c(t.splide,e))}),i&&((n=(t=$(e)).on)("click",l),n("sk",f),n([K,Q],a),r.push(t),t.emit(zt,e.splides))}function s(){r.forEach(function(t){t.destroy()}),z(r)}function c(t,i){t=$(t);t.on(J,function(t,n,e){i.go(i.is(En)?e:t)}),r.push(t)}function a(){j(t.Elements.list,qt,n.direction===Rt?"vertical":"")}function l(t){e.go(t.index)}function f(t,n){b(Mn,kn(n))&&(l(t),B(n))}return{setup:N(t.Media.set,{slideFocus:st(o)?i:o},!0),mount:u,destroy:s,remount:function(){s(),u()}}},Wheel:function(u,s,c){var t=$(u).bind,a=0;function n(t){var n,e,i,o,r;t.cancelable&&(n=(r=t.deltaY)<0,e=vt(t),i=c.wheelMinThreshold||0,o=c.wheelSleep||0,Y(r)>i&&o<e-a&&(u.go(n?"<":">"),a=e),r=n,c.releaseWheel&&!u.state.is(4)&&-1===s.Controller.getAdjacent(r)||B(t))}return{mount:function(){c.wheel&&t(s.Elements.track,"wheel",n,Cn)}}},Live:function(t,n,e){var i=$(t).on,o=n.Elements.track,r=e.live&&!e.isNavigation,u=D("span",ln),s=Tt(90,N(c,!1));function c(t){j(o,Yt,t),t?(P(o,u),s.start()):(G(u),s.cancel())}function a(t){r&&j(o,f,t?"off":"polite")}return{mount:function(){r&&(a(!n.Autoplay.isPaused()),j(o,Ut,!0),u.textContent="…",i(Ot,N(a,!0)),i(Nt,N(a,!1)),i([_t,Z],N(c,!0)))},disable:a,destroy:function(){F(o,[f,Ut,Yt]),G(u)}}}}),On={type:"slide",role:"region",speed:400,perPage:1,cloneStatus:!0,arrows:!0,pagination:!0,paginationKeyboard:!0,interval:5e3,pauseOnHover:!0,pauseOnFocus:!0,resetProgress:!0,easing:"cubic-bezier(0.25, 1, 0.5, 1)",drag:!0,direction:"ltr",trimSpace:!0,focusableNodes:"a, button, textarea, input, select, iframe",live:!0,classes:n,i18n:{prev:"Previous slide",next:"Next slide",first:"Go to first slide",last:"Go to last slide",slideX:"Go to slide %s",pageX:"Go to page %s",play:"Start autoplay",pause:"Pause autoplay",carousel:"carousel",slide:"slide",select:"Select a slide to show",slideLabel:"%s of %s"},reducedMotion:{speed:0,rewindSpeed:0,autoplay:"pause"}};function Nn(t,n,e){var i=n.Slides;function o(){i.forEach(function(t){t.style("transform","translateX(-"+100*t.index+"%)")})}return{mount:function(){$(t).on([K,V],o)},start:function(t,n){i.style("transition","opacity "+e.speed+"ms "+e.easing),g(n)},cancel:rt}}function In(r,t,u){var s,c=t.Move,a=t.Controller,l=t.Scroll,n=t.Elements.list,f=N(R,n,"transition");function e(){f(""),l.cancel()}return{mount:function(){$(r).bind(n,"transitionend",function(t){t.target===n&&s&&(e(),s())})},start:function(t,n){var e=c.toPosition(t,!0),i=c.getPosition(),o=function(t){var n=u.rewindSpeed;if(r.is(ot)&&n){var e=a.getIndex(!0),i=a.getEnd();if(0===e&&i<=t||i<=e&&0===t)return n}return u.speed}(t);1<=Y(e-i)&&1<=o?u.useScroll?l.scroll(e,o,!1,n):(f("transform "+o+"ms "+u.easing),c.translate(e,!0),s=n):(c.jump(t),n())},cancel:e}}var Tn=function(){function o(t,n){this.event=$(),this.Components={},this.state=(e=1,{set:function(t){e=t},is:function(t){return b(y(t),e)}}),this.splides=[],this._o={},this._E={};var e,i=I(t)?ht(document,t):t;mt(i,i+" is invalid."),n=d({label:W(this.root=i,et)||"",labelledby:W(i,Gt)||""},On,o.defaults,n||{});try{d(n,JSON.parse(W(i,u)))}catch(t){mt(!1,"Invalid JSON")}this._o=Object.create(d({},n))}for(var t=o.prototype,n=(t.mount=function(t,n){var e=this,i=this.state,o=this.Components;return mt(i.is([1,7]),"Already mounted!"),i.set(1),this._C=o,this._T=n||this._T||(this.is(Sn)?Nn:In),this._E=t||this._E,w(A({},zn,this._E,{Transition:this._T}),function(t,n){t=t(e,o,e._o);(o[n]=t).setup&&t.setup()}),w(o,function(t){t.mount&&t.mount()}),this.emit(K),T(this.root,"is-initialized"),i.set(3),this.emit("ready"),this},t.sync=function(t){return this.splides.push({splide:t}),t.splides.push({splide:this,isParent:!0}),this.state.is(3)&&(this._C.Sync.remount(),t.Components.Sync.remount()),this},t.go=function(t){return this._C.Controller.go(t),this},t.on=function(t,n){return this.event.on(t,n),this},t.off=function(t){return this.event.off(t),this},t.emit=function(t){var n;return(n=this.event).emit.apply(n,[t].concat(c(arguments,1))),this},t.add=function(t,n){return this._C.Slides.add(t,n),this},t.remove=function(t){return this._C.Slides.remove(t),this},t.is=function(t){return this._o.type===t},t.refresh=function(){return this.emit(V),this},t.destroy=function(n){void 0===n&&(n=!0);var t=this.event,e=this.state;return e.is(1)?$(this).on("ready",this.destroy.bind(this,n)):(w(this._C,function(t){t.destroy&&t.destroy(n)},!0),t.emit(s),t.destroy(),n&&z(this.splides),e.set(7)),this},(t=o).prototype),e=[{key:"options",get:function(){return this._o},set:function(t){this._C.Media.set(t,!0,!0)}},{key:"length",get:function(){return this._C.Slides.getLength(!0)}},{key:"index",get:function(){return this._C.Controller.getIndex()}}],i=0;i<e.length;i++){var r=e[i];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(n,r.key,r)}return Object.defineProperty(t,"prototype",{writable:!1}),o}();Tn.defaults={},Tn.STATES={CREATED:1,MOUNTED:2,IDLE:3,MOVING:4,SCROLLING:5,DRAGGING:6,DESTROYED:7},document.addEventListener("DOMContentLoaded",function(){}),new class{constructor(){this.slider=document.querySelectorAll(".quotes-slider"),this.initSlider(this.slider)}initSlider(t){t.forEach(t=>{new Tn(t,{type:"fade",speed:1500,autoplay:!0,rewind:!0,pagination:!1,arrows:!1}).mount()})}}})();