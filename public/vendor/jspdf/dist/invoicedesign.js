



/*! jQuery UI - v1.11.1 - 2014-08-13
* http://jqueryui.com
* Includes: core.js, widget.js, mouse.js, position.js, accordion.js, autocomplete.js, button.js, datepicker.js, dialog.js, draggable.js, droppable.js, effect.js, effect-blind.js, effect-bounce.js, effect-clip.js, effect-drop.js, effect-explode.js, effect-fade.js, effect-fold.js, effect-highlight.js, effect-puff.js, effect-pulsate.js, effect-scale.js, effect-shake.js, effect-size.js, effect-slide.js, effect-transfer.js, menu.js, progressbar.js, resizable.js, selectable.js, selectmenu.js, slider.js, sortable.js, spinner.js, tabs.js, tooltip.js
* Copyright 2014 jQuery Foundation and other contributors; Licensed MIT */

(function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e(jQuery)})(function(e){function t(t,s){var n,a,o,r=t.nodeName.toLowerCase();return"area"===r?(n=t.parentNode,a=n.name,t.href&&a&&"map"===n.nodeName.toLowerCase()?(o=e("img[usemap='#"+a+"']")[0],!!o&&i(o)):!1):(/input|select|textarea|button|object/.test(r)?!t.disabled:"a"===r?t.href||s:s)&&i(t)}function i(t){return e.expr.filters.visible(t)&&!e(t).parents().addBack().filter(function(){return"hidden"===e.css(this,"visibility")}).length}function s(e){for(var t,i;e.length&&e[0]!==document;){if(t=e.css("position"),("absolute"===t||"relative"===t||"fixed"===t)&&(i=parseInt(e.css("zIndex"),10),!isNaN(i)&&0!==i))return i;e=e.parent()}return 0}function n(){this._curInst=null,this._keyEvent=!1,this._disabledInputs=[],this._datepickerShowing=!1,this._inDialog=!1,this._mainDivId="ui-datepicker-div",this._inlineClass="ui-datepicker-inline",this._appendClass="ui-datepicker-append",this._triggerClass="ui-datepicker-trigger",this._dialogClass="ui-datepicker-dialog",this._disableClass="ui-datepicker-disabled",this._unselectableClass="ui-datepicker-unselectable",this._currentClass="ui-datepicker-current-day",this._dayOverClass="ui-datepicker-days-cell-over",this.regional=[],this.regional[""]={closeText:"Done",prevText:"Prev",nextText:"Next",currentText:"Today",monthNames:["January","February","March","April","May","June","July","August","September","October","November","December"],monthNamesShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],dayNames:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],dayNamesShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],dayNamesMin:["Su","Mo","Tu","We","Th","Fr","Sa"],weekHeader:"Wk",dateFormat:"mm/dd/yy",firstDay:0,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""},this._defaults={showOn:"focus",showAnim:"fadeIn",showOptions:{},defaultDate:null,appendText:"",buttonText:"...",buttonImage:"",buttonImageOnly:!1,hideIfNoPrevNext:!1,navigationAsDateFormat:!1,gotoCurrent:!1,changeMonth:!1,changeYear:!1,yearRange:"c-10:c+10",showOtherMonths:!1,selectOtherMonths:!1,showWeek:!1,calculateWeek:this.iso8601Week,shortYearCutoff:"+10",minDate:null,maxDate:null,duration:"fast",beforeShowDay:null,beforeShow:null,onSelect:null,onChangeMonthYear:null,onClose:null,numberOfMonths:1,showCurrentAtPos:0,stepMonths:1,stepBigMonths:12,altField:"",altFormat:"",constrainInput:!0,showButtonPanel:!1,autoSize:!1,disabled:!1},e.extend(this._defaults,this.regional[""]),this.regional.en=e.extend(!0,{},this.regional[""]),this.regional["en-US"]=e.extend(!0,{},this.regional.en),this.dpDiv=a(e("<div id='"+this._mainDivId+"' class='ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>"))}function a(t){var i="button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a";return t.delegate(i,"mouseout",function(){e(this).removeClass("ui-state-hover"),-1!==this.className.indexOf("ui-datepicker-prev")&&e(this).removeClass("ui-datepicker-prev-hover"),-1!==this.className.indexOf("ui-datepicker-next")&&e(this).removeClass("ui-datepicker-next-hover")}).delegate(i,"mouseover",o)}function o(){e.datepicker._isDisabledDatepicker(v.inline?v.dpDiv.parent()[0]:v.input[0])||(e(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover"),e(this).addClass("ui-state-hover"),-1!==this.className.indexOf("ui-datepicker-prev")&&e(this).addClass("ui-datepicker-prev-hover"),-1!==this.className.indexOf("ui-datepicker-next")&&e(this).addClass("ui-datepicker-next-hover"))}function r(t,i){e.extend(t,i);for(var s in i)null==i[s]&&(t[s]=i[s]);return t}function h(e){return function(){var t=this.element.val();e.apply(this,arguments),this._refresh(),t!==this.element.val()&&this._trigger("change")}}e.ui=e.ui||{},e.extend(e.ui,{version:"1.11.1",keyCode:{BACKSPACE:8,COMMA:188,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,LEFT:37,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SPACE:32,TAB:9,UP:38}}),e.fn.extend({scrollParent:function(t){var i=this.css("position"),s="absolute"===i,n=t?/(auto|scroll|hidden)/:/(auto|scroll)/,a=this.parents().filter(function(){var t=e(this);return s&&"static"===t.css("position")?!1:n.test(t.css("overflow")+t.css("overflow-y")+t.css("overflow-x"))}).eq(0);return"fixed"!==i&&a.length?a:e(this[0].ownerDocument||document)},uniqueId:function(){var e=0;return function(){return this.each(function(){this.id||(this.id="ui-id-"+ ++e)})}}(),removeUniqueId:function(){return this.each(function(){/^ui-id-\d+$/.test(this.id)&&e(this).removeAttr("id")})}}),e.extend(e.expr[":"],{data:e.expr.createPseudo?e.expr.createPseudo(function(t){return function(i){return!!e.data(i,t)}}):function(t,i,s){return!!e.data(t,s[3])},focusable:function(i){return t(i,!isNaN(e.attr(i,"tabindex")))},tabbable:function(i){var s=e.attr(i,"tabindex"),n=isNaN(s);return(n||s>=0)&&t(i,!n)}}),e("<a>").outerWidth(1).jquery||e.each(["Width","Height"],function(t,i){function s(t,i,s,a){return e.each(n,function(){i-=parseFloat(e.css(t,"padding"+this))||0,s&&(i-=parseFloat(e.css(t,"border"+this+"Width"))||0),a&&(i-=parseFloat(e.css(t,"margin"+this))||0)}),i}var n="Width"===i?["Left","Right"]:["Top","Bottom"],a=i.toLowerCase(),o={innerWidth:e.fn.innerWidth,innerHeight:e.fn.innerHeight,outerWidth:e.fn.outerWidth,outerHeight:e.fn.outerHeight};e.fn["inner"+i]=function(t){return void 0===t?o["inner"+i].call(this):this.each(function(){e(this).css(a,s(this,t)+"px")})},e.fn["outer"+i]=function(t,n){return"number"!=typeof t?o["outer"+i].call(this,t):this.each(function(){e(this).css(a,s(this,t,!0,n)+"px")})}}),e.fn.addBack||(e.fn.addBack=function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}),e("<a>").data("a-b","a").removeData("a-b").data("a-b")&&(e.fn.removeData=function(t){return function(i){return arguments.length?t.call(this,e.camelCase(i)):t.call(this)}}(e.fn.removeData)),e.ui.ie=!!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()),e.fn.extend({focus:function(t){return function(i,s){return"number"==typeof i?this.each(function(){var t=this;setTimeout(function(){e(t).focus(),s&&s.call(t)},i)}):t.apply(this,arguments)}}(e.fn.focus),disableSelection:function(){var e="onselectstart"in document.createElement("div")?"selectstart":"mousedown";return function(){return this.bind(e+".ui-disableSelection",function(e){e.preventDefault()})}}(),enableSelection:function(){return this.unbind(".ui-disableSelection")},zIndex:function(t){if(void 0!==t)return this.css("zIndex",t);if(this.length)for(var i,s,n=e(this[0]);n.length&&n[0]!==document;){if(i=n.css("position"),("absolute"===i||"relative"===i||"fixed"===i)&&(s=parseInt(n.css("zIndex"),10),!isNaN(s)&&0!==s))return s;n=n.parent()}return 0}}),e.ui.plugin={add:function(t,i,s){var n,a=e.ui[t].prototype;for(n in s)a.plugins[n]=a.plugins[n]||[],a.plugins[n].push([i,s[n]])},call:function(e,t,i,s){var n,a=e.plugins[t];if(a&&(s||e.element[0].parentNode&&11!==e.element[0].parentNode.nodeType))for(n=0;a.length>n;n++)e.options[a[n][0]]&&a[n][1].apply(e.element,i)}};var l=0,u=Array.prototype.slice;e.cleanData=function(t){return function(i){var s,n,a;for(a=0;null!=(n=i[a]);a++)try{s=e._data(n,"events"),s&&s.remove&&e(n).triggerHandler("remove")}catch(o){}t(i)}}(e.cleanData),e.widget=function(t,i,s){var n,a,o,r,h={},l=t.split(".")[0];return t=t.split(".")[1],n=l+"-"+t,s||(s=i,i=e.Widget),e.expr[":"][n.toLowerCase()]=function(t){return!!e.data(t,n)},e[l]=e[l]||{},a=e[l][t],o=e[l][t]=function(e,t){return this._createWidget?(arguments.length&&this._createWidget(e,t),void 0):new o(e,t)},e.extend(o,a,{version:s.version,_proto:e.extend({},s),_childConstructors:[]}),r=new i,r.options=e.widget.extend({},r.options),e.each(s,function(t,s){return e.isFunction(s)?(h[t]=function(){var e=function(){return i.prototype[t].apply(this,arguments)},n=function(e){return i.prototype[t].apply(this,e)};return function(){var t,i=this._super,a=this._superApply;return this._super=e,this._superApply=n,t=s.apply(this,arguments),this._super=i,this._superApply=a,t}}(),void 0):(h[t]=s,void 0)}),o.prototype=e.widget.extend(r,{widgetEventPrefix:a?r.widgetEventPrefix||t:t},h,{constructor:o,namespace:l,widgetName:t,widgetFullName:n}),a?(e.each(a._childConstructors,function(t,i){var s=i.prototype;e.widget(s.namespace+"."+s.widgetName,o,i._proto)}),delete a._childConstructors):i._childConstructors.push(o),e.widget.bridge(t,o),o},e.widget.extend=function(t){for(var i,s,n=u.call(arguments,1),a=0,o=n.length;o>a;a++)for(i in n[a])s=n[a][i],n[a].hasOwnProperty(i)&&void 0!==s&&(t[i]=e.isPlainObject(s)?e.isPlainObject(t[i])?e.widget.extend({},t[i],s):e.widget.extend({},s):s);return t},e.widget.bridge=function(t,i){var s=i.prototype.widgetFullName||t;e.fn[t]=function(n){var a="string"==typeof n,o=u.call(arguments,1),r=this;return n=!a&&o.length?e.widget.extend.apply(null,[n].concat(o)):n,a?this.each(function(){var i,a=e.data(this,s);return"instance"===n?(r=a,!1):a?e.isFunction(a[n])&&"_"!==n.charAt(0)?(i=a[n].apply(a,o),i!==a&&void 0!==i?(r=i&&i.jquery?r.pushStack(i.get()):i,!1):void 0):e.error("no such method '"+n+"' for "+t+" widget instance"):e.error("cannot call methods on "+t+" prior to initialization; "+"attempted to call method '"+n+"'")}):this.each(function(){var t=e.data(this,s);t?(t.option(n||{}),t._init&&t._init()):e.data(this,s,new i(n,this))}),r}},e.Widget=function(){},e.Widget._childConstructors=[],e.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",defaultElement:"<div>",options:{disabled:!1,create:null},_createWidget:function(t,i){i=e(i||this.defaultElement||this)[0],this.element=e(i),this.uuid=l++,this.eventNamespace="."+this.widgetName+this.uuid,this.options=e.widget.extend({},this.options,this._getCreateOptions(),t),this.bindings=e(),this.hoverable=e(),this.focusable=e(),i!==this&&(e.data(i,this.widgetFullName,this),this._on(!0,this.element,{remove:function(e){e.target===i&&this.destroy()}}),this.document=e(i.style?i.ownerDocument:i.document||i),this.window=e(this.document[0].defaultView||this.document[0].parentWindow)),this._create(),this._trigger("create",null,this._getCreateEventData()),this._init()},_getCreateOptions:e.noop,_getCreateEventData:e.noop,_create:e.noop,_init:e.noop,destroy:function(){this._destroy(),this.element.unbind(this.eventNamespace).removeData(this.widgetFullName).removeData(e.camelCase(this.widgetFullName)),this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName+"-disabled "+"ui-state-disabled"),this.bindings.unbind(this.eventNamespace),this.hoverable.removeClass("ui-state-hover"),this.focusable.removeClass("ui-state-focus")},_destroy:e.noop,widget:function(){return this.element},option:function(t,i){var s,n,a,o=t;if(0===arguments.length)return e.widget.extend({},this.options);if("string"==typeof t)if(o={},s=t.split("."),t=s.shift(),s.length){for(n=o[t]=e.widget.extend({},this.options[t]),a=0;s.length-1>a;a++)n[s[a]]=n[s[a]]||{},n=n[s[a]];if(t=s.pop(),1===arguments.length)return void 0===n[t]?null:n[t];n[t]=i}else{if(1===arguments.length)return void 0===this.options[t]?null:this.options[t];o[t]=i}return this._setOptions(o),this},_setOptions:function(e){var t;for(t in e)this._setOption(t,e[t]);return this},_setOption:function(e,t){return this.options[e]=t,"disabled"===e&&(this.widget().toggleClass(this.widgetFullName+"-disabled",!!t),t&&(this.hoverable.removeClass("ui-state-hover"),this.focusable.removeClass("ui-state-focus"))),this},enable:function(){return this._setOptions({disabled:!1})},disable:function(){return this._setOptions({disabled:!0})},_on:function(t,i,s){var n,a=this;"boolean"!=typeof t&&(s=i,i=t,t=!1),s?(i=n=e(i),this.bindings=this.bindings.add(i)):(s=i,i=this.element,n=this.widget()),e.each(s,function(s,o){function r(){return t||a.options.disabled!==!0&&!e(this).hasClass("ui-state-disabled")?("string"==typeof o?a[o]:o).apply(a,arguments):void 0}"string"!=typeof o&&(r.guid=o.guid=o.guid||r.guid||e.guid++);var h=s.match(/^([\w:-]*)\s*(.*)$/),l=h[1]+a.eventNamespace,u=h[2];u?n.delegate(u,l,r):i.bind(l,r)})},_off:function(e,t){t=(t||"").split(" ").join(this.eventNamespace+" ")+this.eventNamespace,e.unbind(t).undelegate(t)},_delay:function(e,t){function i(){return("string"==typeof e?s[e]:e).apply(s,arguments)}var s=this;return setTimeout(i,t||0)},_hoverable:function(t){this.hoverable=this.hoverable.add(t),this._on(t,{mouseenter:function(t){e(t.currentTarget).addClass("ui-state-hover")},mouseleave:function(t){e(t.currentTarget).removeClass("ui-state-hover")}})},_focusable:function(t){this.focusable=this.focusable.add(t),this._on(t,{focusin:function(t){e(t.currentTarget).addClass("ui-state-focus")},focusout:function(t){e(t.currentTarget).removeClass("ui-state-focus")}})},_trigger:function(t,i,s){var n,a,o=this.options[t];if(s=s||{},i=e.Event(i),i.type=(t===this.widgetEventPrefix?t:this.widgetEventPrefix+t).toLowerCase(),i.target=this.element[0],a=i.originalEvent)for(n in a)n in i||(i[n]=a[n]);return this.element.trigger(i,s),!(e.isFunction(o)&&o.apply(this.element[0],[i].concat(s))===!1||i.isDefaultPrevented())}},e.each({show:"fadeIn",hide:"fadeOut"},function(t,i){e.Widget.prototype["_"+t]=function(s,n,a){"string"==typeof n&&(n={effect:n});var o,r=n?n===!0||"number"==typeof n?i:n.effect||i:t;n=n||{},"number"==typeof n&&(n={duration:n}),o=!e.isEmptyObject(n),n.complete=a,n.delay&&s.delay(n.delay),o&&e.effects&&e.effects.effect[r]?s[t](n):r!==t&&s[r]?s[r](n.duration,n.easing,a):s.queue(function(i){e(this)[t](),a&&a.call(s[0]),i()})}}),e.widget;var d=!1;e(document).mouseup(function(){d=!1}),e.widget("ui.mouse",{version:"1.11.1",options:{cancel:"input,textarea,button,select,option",distance:1,delay:0},_mouseInit:function(){var t=this;this.element.bind("mousedown."+this.widgetName,function(e){return t._mouseDown(e)}).bind("click."+this.widgetName,function(i){return!0===e.data(i.target,t.widgetName+".preventClickEvent")?(e.removeData(i.target,t.widgetName+".preventClickEvent"),i.stopImmediatePropagation(),!1):void 0}),this.started=!1},_mouseDestroy:function(){this.element.unbind("."+this.widgetName),this._mouseMoveDelegate&&this.document.unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate)},_mouseDown:function(t){if(!d){this._mouseStarted&&this._mouseUp(t),this._mouseDownEvent=t;var i=this,s=1===t.which,n="string"==typeof this.options.cancel&&t.target.nodeName?e(t.target).closest(this.options.cancel).length:!1;return s&&!n&&this._mouseCapture(t)?(this.mouseDelayMet=!this.options.delay,this.mouseDelayMet||(this._mouseDelayTimer=setTimeout(function(){i.mouseDelayMet=!0},this.options.delay)),this._mouseDistanceMet(t)&&this._mouseDelayMet(t)&&(this._mouseStarted=this._mouseStart(t)!==!1,!this._mouseStarted)?(t.preventDefault(),!0):(!0===e.data(t.target,this.widgetName+".preventClickEvent")&&e.removeData(t.target,this.widgetName+".preventClickEvent"),this._mouseMoveDelegate=function(e){return i._mouseMove(e)},this._mouseUpDelegate=function(e){return i._mouseUp(e)},this.document.bind("mousemove."+this.widgetName,this._mouseMoveDelegate).bind("mouseup."+this.widgetName,this._mouseUpDelegate),t.preventDefault(),d=!0,!0)):!0}},_mouseMove:function(t){return e.ui.ie&&(!document.documentMode||9>document.documentMode)&&!t.button?this._mouseUp(t):t.which?this._mouseStarted?(this._mouseDrag(t),t.preventDefault()):(this._mouseDistanceMet(t)&&this._mouseDelayMet(t)&&(this._mouseStarted=this._mouseStart(this._mouseDownEvent,t)!==!1,this._mouseStarted?this._mouseDrag(t):this._mouseUp(t)),!this._mouseStarted):this._mouseUp(t)},_mouseUp:function(t){return this.document.unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate),this._mouseStarted&&(this._mouseStarted=!1,t.target===this._mouseDownEvent.target&&e.data(t.target,this.widgetName+".preventClickEvent",!0),this._mouseStop(t)),d=!1,!1},_mouseDistanceMet:function(e){return Math.max(Math.abs(this._mouseDownEvent.pageX-e.pageX),Math.abs(this._mouseDownEvent.pageY-e.pageY))>=this.options.distance},_mouseDelayMet:function(){return this.mouseDelayMet},_mouseStart:function(){},_mouseDrag:function(){},_mouseStop:function(){},_mouseCapture:function(){return!0}}),function(){function t(e,t,i){return[parseFloat(e[0])*(p.test(e[0])?t/100:1),parseFloat(e[1])*(p.test(e[1])?i/100:1)]}function i(t,i){return parseInt(e.css(t,i),10)||0}function s(t){var i=t[0];return 9===i.nodeType?{width:t.width(),height:t.height(),offset:{top:0,left:0}}:e.isWindow(i)?{width:t.width(),height:t.height(),offset:{top:t.scrollTop(),left:t.scrollLeft()}}:i.preventDefault?{width:0,height:0,offset:{top:i.pageY,left:i.pageX}}:{width:t.outerWidth(),height:t.outerHeight(),offset:t.offset()}}e.ui=e.ui||{};var n,a,o=Math.max,r=Math.abs,h=Math.round,l=/left|center|right/,u=/top|center|bottom/,d=/[\+\-]\d+(\.[\d]+)?%?/,c=/^\w+/,p=/%$/,f=e.fn.position;e.position={scrollbarWidth:function(){if(void 0!==n)return n;var t,i,s=e("<div style='display:block;position:absolute;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"),a=s.children()[0];return e("body").append(s),t=a.offsetWidth,s.css("overflow","scroll"),i=a.offsetWidth,t===i&&(i=s[0].clientWidth),s.remove(),n=t-i},getScrollInfo:function(t){var i=t.isWindow||t.isDocument?"":t.element.css("overflow-x"),s=t.isWindow||t.isDocument?"":t.element.css("overflow-y"),n="scroll"===i||"auto"===i&&t.width<t.element[0].scrollWidth,a="scroll"===s||"auto"===s&&t.height<t.element[0].scrollHeight;return{width:a?e.position.scrollbarWidth():0,height:n?e.position.scrollbarWidth():0}},getWithinInfo:function(t){var i=e(t||window),s=e.isWindow(i[0]),n=!!i[0]&&9===i[0].nodeType;return{element:i,isWindow:s,isDocument:n,offset:i.offset()||{left:0,top:0},scrollLeft:i.scrollLeft(),scrollTop:i.scrollTop(),width:s||n?i.width():i.outerWidth(),height:s||n?i.height():i.outerHeight()}}},e.fn.position=function(n){if(!n||!n.of)return f.apply(this,arguments);n=e.extend({},n);var p,m,g,v,y,b,_=e(n.of),x=e.position.getWithinInfo(n.within),w=e.position.getScrollInfo(x),k=(n.collision||"flip").split(" "),T={};return b=s(_),_[0].preventDefault&&(n.at="left top"),m=b.width,g=b.height,v=b.offset,y=e.extend({},v),e.each(["my","at"],function(){var e,t,i=(n[this]||"").split(" ");1===i.length&&(i=l.test(i[0])?i.concat(["center"]):u.test(i[0])?["center"].concat(i):["center","center"]),i[0]=l.test(i[0])?i[0]:"center",i[1]=u.test(i[1])?i[1]:"center",e=d.exec(i[0]),t=d.exec(i[1]),T[this]=[e?e[0]:0,t?t[0]:0],n[this]=[c.exec(i[0])[0],c.exec(i[1])[0]]}),1===k.length&&(k[1]=k[0]),"right"===n.at[0]?y.left+=m:"center"===n.at[0]&&(y.left+=m/2),"bottom"===n.at[1]?y.top+=g:"center"===n.at[1]&&(y.top+=g/2),p=t(T.at,m,g),y.left+=p[0],y.top+=p[1],this.each(function(){var s,l,u=e(this),d=u.outerWidth(),c=u.outerHeight(),f=i(this,"marginLeft"),b=i(this,"marginTop"),D=d+f+i(this,"marginRight")+w.width,S=c+b+i(this,"marginBottom")+w.height,M=e.extend({},y),N=t(T.my,u.outerWidth(),u.outerHeight());"right"===n.my[0]?M.left-=d:"center"===n.my[0]&&(M.left-=d/2),"bottom"===n.my[1]?M.top-=c:"center"===n.my[1]&&(M.top-=c/2),M.left+=N[0],M.top+=N[1],a||(M.left=h(M.left),M.top=h(M.top)),s={marginLeft:f,marginTop:b},e.each(["left","top"],function(t,i){e.ui.position[k[t]]&&e.ui.position[k[t]][i](M,{targetWidth:m,targetHeight:g,elemWidth:d,elemHeight:c,collisionPosition:s,collisionWidth:D,collisionHeight:S,offset:[p[0]+N[0],p[1]+N[1]],my:n.my,at:n.at,within:x,elem:u})}),n.using&&(l=function(e){var t=v.left-M.left,i=t+m-d,s=v.top-M.top,a=s+g-c,h={target:{element:_,left:v.left,top:v.top,width:m,height:g},element:{element:u,left:M.left,top:M.top,width:d,height:c},horizontal:0>i?"left":t>0?"right":"center",vertical:0>a?"top":s>0?"bottom":"middle"};d>m&&m>r(t+i)&&(h.horizontal="center"),c>g&&g>r(s+a)&&(h.vertical="middle"),h.important=o(r(t),r(i))>o(r(s),r(a))?"horizontal":"vertical",n.using.call(this,e,h)}),u.offset(e.extend(M,{using:l}))})},e.ui.position={fit:{left:function(e,t){var i,s=t.within,n=s.isWindow?s.scrollLeft:s.offset.left,a=s.width,r=e.left-t.collisionPosition.marginLeft,h=n-r,l=r+t.collisionWidth-a-n;t.collisionWidth>a?h>0&&0>=l?(i=e.left+h+t.collisionWidth-a-n,e.left+=h-i):e.left=l>0&&0>=h?n:h>l?n+a-t.collisionWidth:n:h>0?e.left+=h:l>0?e.left-=l:e.left=o(e.left-r,e.left)},top:function(e,t){var i,s=t.within,n=s.isWindow?s.scrollTop:s.offset.top,a=t.within.height,r=e.top-t.collisionPosition.marginTop,h=n-r,l=r+t.collisionHeight-a-n;t.collisionHeight>a?h>0&&0>=l?(i=e.top+h+t.collisionHeight-a-n,e.top+=h-i):e.top=l>0&&0>=h?n:h>l?n+a-t.collisionHeight:n:h>0?e.top+=h:l>0?e.top-=l:e.top=o(e.top-r,e.top)}},flip:{left:function(e,t){var i,s,n=t.within,a=n.offset.left+n.scrollLeft,o=n.width,h=n.isWindow?n.scrollLeft:n.offset.left,l=e.left-t.collisionPosition.marginLeft,u=l-h,d=l+t.collisionWidth-o-h,c="left"===t.my[0]?-t.elemWidth:"right"===t.my[0]?t.elemWidth:0,p="left"===t.at[0]?t.targetWidth:"right"===t.at[0]?-t.targetWidth:0,f=-2*t.offset[0];0>u?(i=e.left+c+p+f+t.collisionWidth-o-a,(0>i||r(u)>i)&&(e.left+=c+p+f)):d>0&&(s=e.left-t.collisionPosition.marginLeft+c+p+f-h,(s>0||d>r(s))&&(e.left+=c+p+f))},top:function(e,t){var i,s,n=t.within,a=n.offset.top+n.scrollTop,o=n.height,h=n.isWindow?n.scrollTop:n.offset.top,l=e.top-t.collisionPosition.marginTop,u=l-h,d=l+t.collisionHeight-o-h,c="top"===t.my[1],p=c?-t.elemHeight:"bottom"===t.my[1]?t.elemHeight:0,f="top"===t.at[1]?t.targetHeight:"bottom"===t.at[1]?-t.targetHeight:0,m=-2*t.offset[1];0>u?(s=e.top+p+f+m+t.collisionHeight-o-a,e.top+p+f+m>u&&(0>s||r(u)>s)&&(e.top+=p+f+m)):d>0&&(i=e.top-t.collisionPosition.marginTop+p+f+m-h,e.top+p+f+m>d&&(i>0||d>r(i))&&(e.top+=p+f+m))}},flipfit:{left:function(){e.ui.position.flip.left.apply(this,arguments),e.ui.position.fit.left.apply(this,arguments)},top:function(){e.ui.position.flip.top.apply(this,arguments),e.ui.position.fit.top.apply(this,arguments)}}},function(){var t,i,s,n,o,r=document.getElementsByTagName("body")[0],h=document.createElement("div");t=document.createElement(r?"div":"body"),s={visibility:"hidden",width:0,height:0,border:0,margin:0,background:"none"},r&&e.extend(s,{position:"absolute",left:"-1000px",top:"-1000px"});for(o in s)t.style[o]=s[o];t.appendChild(h),i=r||document.documentElement,i.insertBefore(t,i.firstChild),h.style.cssText="position: absolute; left: 10.7432222px;",n=e(h).offset().left,a=n>10&&11>n,t.innerHTML="",i.removeChild(t)}()}(),e.ui.position,e.widget("ui.accordion",{version:"1.11.1",options:{active:0,animate:{},collapsible:!1,event:"click",header:"> li > :first-child,> :not(li):even",heightStyle:"auto",icons:{activeHeader:"ui-icon-triangle-1-s",header:"ui-icon-triangle-1-e"},activate:null,beforeActivate:null},hideProps:{borderTopWidth:"hide",borderBottomWidth:"hide",paddingTop:"hide",paddingBottom:"hide",height:"hide"},showProps:{borderTopWidth:"show",borderBottomWidth:"show",paddingTop:"show",paddingBottom:"show",height:"show"},_create:function(){var t=this.options;this.prevShow=this.prevHide=e(),this.element.addClass("ui-accordion ui-widget ui-helper-reset").attr("role","tablist"),t.collapsible||t.active!==!1&&null!=t.active||(t.active=0),this._processPanels(),0>t.active&&(t.active+=this.headers.length),this._refresh()},_getCreateEventData:function(){return{header:this.active,panel:this.active.length?this.active.next():e()}},_createIcons:function(){var t=this.options.icons;t&&(e("<span>").addClass("ui-accordion-header-icon ui-icon "+t.header).prependTo(this.headers),this.active.children(".ui-accordion-header-icon").removeClass(t.header).addClass(t.activeHeader),this.headers.addClass("ui-accordion-icons"))},_destroyIcons:function(){this.headers.removeClass("ui-accordion-icons").children(".ui-accordion-header-icon").remove()},_destroy:function(){var e;this.element.removeClass("ui-accordion ui-widget ui-helper-reset").removeAttr("role"),this.headers.removeClass("ui-accordion-header ui-accordion-header-active ui-state-default ui-corner-all ui-state-active ui-state-disabled ui-corner-top").removeAttr("role").removeAttr("aria-expanded").removeAttr("aria-selected").removeAttr("aria-controls").removeAttr("tabIndex").removeUniqueId(),this._destroyIcons(),e=this.headers.next().removeClass("ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content ui-accordion-content-active ui-state-disabled").css("display","").removeAttr("role").removeAttr("aria-hidden").removeAttr("aria-labelledby").removeUniqueId(),"content"!==this.options.heightStyle&&e.css("height","")},_setOption:function(e,t){return"active"===e?(this._activate(t),void 0):("event"===e&&(this.options.event&&this._off(this.headers,this.options.event),this._setupEvents(t)),this._super(e,t),"collapsible"!==e||t||this.options.active!==!1||this._activate(0),"icons"===e&&(this._destroyIcons(),t&&this._createIcons()),"disabled"===e&&(this.element.toggleClass("ui-state-disabled",!!t).attr("aria-disabled",t),this.headers.add(this.headers.next()).toggleClass("ui-state-disabled",!!t)),void 0)},_keydown:function(t){if(!t.altKey&&!t.ctrlKey){var i=e.ui.keyCode,s=this.headers.length,n=this.headers.index(t.target),a=!1;switch(t.keyCode){case i.RIGHT:case i.DOWN:a=this.headers[(n+1)%s];break;case i.LEFT:case i.UP:a=this.headers[(n-1+s)%s];break;case i.SPACE:case i.ENTER:this._eventHandler(t);break;case i.HOME:a=this.headers[0];break;case i.END:a=this.headers[s-1]}a&&(e(t.target).attr("tabIndex",-1),e(a).attr("tabIndex",0),a.focus(),t.preventDefault())}},_panelKeyDown:function(t){t.keyCode===e.ui.keyCode.UP&&t.ctrlKey&&e(t.currentTarget).prev().focus()},refresh:function(){var t=this.options;this._processPanels(),t.active===!1&&t.collapsible===!0||!this.headers.length?(t.active=!1,this.active=e()):t.active===!1?this._activate(0):this.active.length&&!e.contains(this.element[0],this.active[0])?this.headers.length===this.headers.find(".ui-state-disabled").length?(t.active=!1,this.active=e()):this._activate(Math.max(0,t.active-1)):t.active=this.headers.index(this.active),this._destroyIcons(),this._refresh()},_processPanels:function(){this.headers=this.element.find(this.options.header).addClass("ui-accordion-header ui-state-default ui-corner-all"),this.headers.next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").filter(":not(.ui-accordion-content-active)").hide()},_refresh:function(){var t,i=this.options,s=i.heightStyle,n=this.element.parent();this.active=this._findActive(i.active).addClass("ui-accordion-header-active ui-state-active ui-corner-top").removeClass("ui-corner-all"),this.active.next().addClass("ui-accordion-content-active").show(),this.headers.attr("role","tab").each(function(){var t=e(this),i=t.uniqueId().attr("id"),s=t.next(),n=s.uniqueId().attr("id");t.attr("aria-controls",n),s.attr("aria-labelledby",i)}).next().attr("role","tabpanel"),this.headers.not(this.active).attr({"aria-selected":"false","aria-expanded":"false",tabIndex:-1}).next().attr({"aria-hidden":"true"}).hide(),this.active.length?this.active.attr({"aria-selected":"true","aria-expanded":"true",tabIndex:0}).next().attr({"aria-hidden":"false"}):this.headers.eq(0).attr("tabIndex",0),this._createIcons(),this._setupEvents(i.event),"fill"===s?(t=n.height(),this.element.siblings(":visible").each(function(){var i=e(this),s=i.css("position");"absolute"!==s&&"fixed"!==s&&(t-=i.outerHeight(!0))}),this.headers.each(function(){t-=e(this).outerHeight(!0)}),this.headers.next().each(function(){e(this).height(Math.max(0,t-e(this).innerHeight()+e(this).height()))}).css("overflow","auto")):"auto"===s&&(t=0,this.headers.next().each(function(){t=Math.max(t,e(this).css("height","").height())}).height(t))},_activate:function(t){var i=this._findActive(t)[0];i!==this.active[0]&&(i=i||this.active[0],this._eventHandler({target:i,currentTarget:i,preventDefault:e.noop}))},_findActive:function(t){return"number"==typeof t?this.headers.eq(t):e()},_setupEvents:function(t){var i={keydown:"_keydown"};t&&e.each(t.split(" "),function(e,t){i[t]="_eventHandler"}),this._off(this.headers.add(this.headers.next())),this._on(this.headers,i),this._on(this.headers.next(),{keydown:"_panelKeyDown"}),this._hoverable(this.headers),this._focusable(this.headers)},_eventHandler:function(t){var i=this.options,s=this.active,n=e(t.currentTarget),a=n[0]===s[0],o=a&&i.collapsible,r=o?e():n.next(),h=s.next(),l={oldHeader:s,oldPanel:h,newHeader:o?e():n,newPanel:r};t.preventDefault(),a&&!i.collapsible||this._trigger("beforeActivate",t,l)===!1||(i.active=o?!1:this.headers.index(n),this.active=a?e():n,this._toggle(l),s.removeClass("ui-accordion-header-active ui-state-active"),i.icons&&s.children(".ui-accordion-header-icon").removeClass(i.icons.activeHeader).addClass(i.icons.header),a||(n.removeClass("ui-corner-all").addClass("ui-accordion-header-active ui-state-active ui-corner-top"),i.icons&&n.children(".ui-accordion-header-icon").removeClass(i.icons.header).addClass(i.icons.activeHeader),n.next().addClass("ui-accordion-content-active")))},_toggle:function(t){var i=t.newPanel,s=this.prevShow.length?this.prevShow:t.oldPanel;this.prevShow.add(this.prevHide).stop(!0,!0),this.prevShow=i,this.prevHide=s,this.options.animate?this._animate(i,s,t):(s.hide(),i.show(),this._toggleComplete(t)),s.attr({"aria-hidden":"true"}),s.prev().attr("aria-selected","false"),i.length&&s.length?s.prev().attr({tabIndex:-1,"aria-expanded":"false"}):i.length&&this.headers.filter(function(){return 0===e(this).attr("tabIndex")}).attr("tabIndex",-1),i.attr("aria-hidden","false").prev().attr({"aria-selected":"true",tabIndex:0,"aria-expanded":"true"})},_animate:function(e,t,i){var s,n,a,o=this,r=0,h=e.length&&(!t.length||e.index()<t.index()),l=this.options.animate||{},u=h&&l.down||l,d=function(){o._toggleComplete(i)};return"number"==typeof u&&(a=u),"string"==typeof u&&(n=u),n=n||u.easing||l.easing,a=a||u.duration||l.duration,t.length?e.length?(s=e.show().outerHeight(),t.animate(this.hideProps,{duration:a,easing:n,step:function(e,t){t.now=Math.round(e)}}),e.hide().animate(this.showProps,{duration:a,easing:n,complete:d,step:function(e,i){i.now=Math.round(e),"height"!==i.prop?r+=i.now:"content"!==o.options.heightStyle&&(i.now=Math.round(s-t.outerHeight()-r),r=0)}}),void 0):t.animate(this.hideProps,a,n,d):e.animate(this.showProps,a,n,d)},_toggleComplete:function(e){var t=e.oldPanel;t.removeClass("ui-accordion-content-active").prev().removeClass("ui-corner-top").addClass("ui-corner-all"),t.length&&(t.parent()[0].className=t.parent()[0].className),this._trigger("activate",null,e)}}),e.widget("ui.menu",{version:"1.11.1",defaultElement:"<ul>",delay:300,options:{icons:{submenu:"ui-icon-carat-1-e"},items:"> *",menus:"ul",position:{my:"left-1 top",at:"right top"},role:"menu",blur:null,focus:null,select:null},_create:function(){this.activeMenu=this.element,this.mouseHandled=!1,this.element.uniqueId().addClass("ui-menu ui-widget ui-widget-content").toggleClass("ui-menu-icons",!!this.element.find(".ui-icon").length).attr({role:this.options.role,tabIndex:0}),this.options.disabled&&this.element.addClass("ui-state-disabled").attr("aria-disabled","true"),this._on({"mousedown .ui-menu-item":function(e){e.preventDefault()},"click .ui-menu-item":function(t){var i=e(t.target);!this.mouseHandled&&i.not(".ui-state-disabled").length&&(this.select(t),t.isPropagationStopped()||(this.mouseHandled=!0),i.has(".ui-menu").length?this.expand(t):!this.element.is(":focus")&&e(this.document[0].activeElement).closest(".ui-menu").length&&(this.element.trigger("focus",[!0]),this.active&&1===this.active.parents(".ui-menu").length&&clearTimeout(this.timer)))},"mouseenter .ui-menu-item":function(t){var i=e(t.currentTarget);i.siblings(".ui-state-active").removeClass("ui-state-active"),this.focus(t,i)},mouseleave:"collapseAll","mouseleave .ui-menu":"collapseAll",focus:function(e,t){var i=this.active||this.element.find(this.options.items).eq(0);t||this.focus(e,i)},blur:function(t){this._delay(function(){e.contains(this.element[0],this.document[0].activeElement)||this.collapseAll(t)})},keydown:"_keydown"}),this.refresh(),this._on(this.document,{click:function(e){this._closeOnDocumentClick(e)&&this.collapseAll(e),this.mouseHandled=!1
}})},_destroy:function(){this.element.removeAttr("aria-activedescendant").find(".ui-menu").addBack().removeClass("ui-menu ui-widget ui-widget-content ui-menu-icons ui-front").removeAttr("role").removeAttr("tabIndex").removeAttr("aria-labelledby").removeAttr("aria-expanded").removeAttr("aria-hidden").removeAttr("aria-disabled").removeUniqueId().show(),this.element.find(".ui-menu-item").removeClass("ui-menu-item").removeAttr("role").removeAttr("aria-disabled").removeUniqueId().removeClass("ui-state-hover").removeAttr("tabIndex").removeAttr("role").removeAttr("aria-haspopup").children().each(function(){var t=e(this);t.data("ui-menu-submenu-carat")&&t.remove()}),this.element.find(".ui-menu-divider").removeClass("ui-menu-divider ui-widget-content")},_keydown:function(t){function i(e){return e.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g,"\\$&")}var s,n,a,o,r,h=!0;switch(t.keyCode){case e.ui.keyCode.PAGE_UP:this.previousPage(t);break;case e.ui.keyCode.PAGE_DOWN:this.nextPage(t);break;case e.ui.keyCode.HOME:this._move("first","first",t);break;case e.ui.keyCode.END:this._move("last","last",t);break;case e.ui.keyCode.UP:this.previous(t);break;case e.ui.keyCode.DOWN:this.next(t);break;case e.ui.keyCode.LEFT:this.collapse(t);break;case e.ui.keyCode.RIGHT:this.active&&!this.active.is(".ui-state-disabled")&&this.expand(t);break;case e.ui.keyCode.ENTER:case e.ui.keyCode.SPACE:this._activate(t);break;case e.ui.keyCode.ESCAPE:this.collapse(t);break;default:h=!1,n=this.previousFilter||"",a=String.fromCharCode(t.keyCode),o=!1,clearTimeout(this.filterTimer),a===n?o=!0:a=n+a,r=RegExp("^"+i(a),"i"),s=this.activeMenu.find(this.options.items).filter(function(){return r.test(e(this).text())}),s=o&&-1!==s.index(this.active.next())?this.active.nextAll(".ui-menu-item"):s,s.length||(a=String.fromCharCode(t.keyCode),r=RegExp("^"+i(a),"i"),s=this.activeMenu.find(this.options.items).filter(function(){return r.test(e(this).text())})),s.length?(this.focus(t,s),s.length>1?(this.previousFilter=a,this.filterTimer=this._delay(function(){delete this.previousFilter},1e3)):delete this.previousFilter):delete this.previousFilter}h&&t.preventDefault()},_activate:function(e){this.active.is(".ui-state-disabled")||(this.active.is("[aria-haspopup='true']")?this.expand(e):this.select(e))},refresh:function(){var t,i,s=this,n=this.options.icons.submenu,a=this.element.find(this.options.menus);this.element.toggleClass("ui-menu-icons",!!this.element.find(".ui-icon").length),a.filter(":not(.ui-menu)").addClass("ui-menu ui-widget ui-widget-content ui-front").hide().attr({role:this.options.role,"aria-hidden":"true","aria-expanded":"false"}).each(function(){var t=e(this),i=t.parent(),s=e("<span>").addClass("ui-menu-icon ui-icon "+n).data("ui-menu-submenu-carat",!0);i.attr("aria-haspopup","true").prepend(s),t.attr("aria-labelledby",i.attr("id"))}),t=a.add(this.element),i=t.find(this.options.items),i.not(".ui-menu-item").each(function(){var t=e(this);s._isDivider(t)&&t.addClass("ui-widget-content ui-menu-divider")}),i.not(".ui-menu-item, .ui-menu-divider").addClass("ui-menu-item").uniqueId().attr({tabIndex:-1,role:this._itemRole()}),i.filter(".ui-state-disabled").attr("aria-disabled","true"),this.active&&!e.contains(this.element[0],this.active[0])&&this.blur()},_itemRole:function(){return{menu:"menuitem",listbox:"option"}[this.options.role]},_setOption:function(e,t){"icons"===e&&this.element.find(".ui-menu-icon").removeClass(this.options.icons.submenu).addClass(t.submenu),"disabled"===e&&this.element.toggleClass("ui-state-disabled",!!t).attr("aria-disabled",t),this._super(e,t)},focus:function(e,t){var i,s;this.blur(e,e&&"focus"===e.type),this._scrollIntoView(t),this.active=t.first(),s=this.active.addClass("ui-state-focus").removeClass("ui-state-active"),this.options.role&&this.element.attr("aria-activedescendant",s.attr("id")),this.active.parent().closest(".ui-menu-item").addClass("ui-state-active"),e&&"keydown"===e.type?this._close():this.timer=this._delay(function(){this._close()},this.delay),i=t.children(".ui-menu"),i.length&&e&&/^mouse/.test(e.type)&&this._startOpening(i),this.activeMenu=t.parent(),this._trigger("focus",e,{item:t})},_scrollIntoView:function(t){var i,s,n,a,o,r;this._hasScroll()&&(i=parseFloat(e.css(this.activeMenu[0],"borderTopWidth"))||0,s=parseFloat(e.css(this.activeMenu[0],"paddingTop"))||0,n=t.offset().top-this.activeMenu.offset().top-i-s,a=this.activeMenu.scrollTop(),o=this.activeMenu.height(),r=t.outerHeight(),0>n?this.activeMenu.scrollTop(a+n):n+r>o&&this.activeMenu.scrollTop(a+n-o+r))},blur:function(e,t){t||clearTimeout(this.timer),this.active&&(this.active.removeClass("ui-state-focus"),this.active=null,this._trigger("blur",e,{item:this.active}))},_startOpening:function(e){clearTimeout(this.timer),"true"===e.attr("aria-hidden")&&(this.timer=this._delay(function(){this._close(),this._open(e)},this.delay))},_open:function(t){var i=e.extend({of:this.active},this.options.position);clearTimeout(this.timer),this.element.find(".ui-menu").not(t.parents(".ui-menu")).hide().attr("aria-hidden","true"),t.show().removeAttr("aria-hidden").attr("aria-expanded","true").position(i)},collapseAll:function(t,i){clearTimeout(this.timer),this.timer=this._delay(function(){var s=i?this.element:e(t&&t.target).closest(this.element.find(".ui-menu"));s.length||(s=this.element),this._close(s),this.blur(t),this.activeMenu=s},this.delay)},_close:function(e){e||(e=this.active?this.active.parent():this.element),e.find(".ui-menu").hide().attr("aria-hidden","true").attr("aria-expanded","false").end().find(".ui-state-active").not(".ui-state-focus").removeClass("ui-state-active")},_closeOnDocumentClick:function(t){return!e(t.target).closest(".ui-menu").length},_isDivider:function(e){return!/[^\-\u2014\u2013\s]/.test(e.text())},collapse:function(e){var t=this.active&&this.active.parent().closest(".ui-menu-item",this.element);t&&t.length&&(this._close(),this.focus(e,t))},expand:function(e){var t=this.active&&this.active.children(".ui-menu ").find(this.options.items).first();t&&t.length&&(this._open(t.parent()),this._delay(function(){this.focus(e,t)}))},next:function(e){this._move("next","first",e)},previous:function(e){this._move("prev","last",e)},isFirstItem:function(){return this.active&&!this.active.prevAll(".ui-menu-item").length},isLastItem:function(){return this.active&&!this.active.nextAll(".ui-menu-item").length},_move:function(e,t,i){var s;this.active&&(s="first"===e||"last"===e?this.active["first"===e?"prevAll":"nextAll"](".ui-menu-item").eq(-1):this.active[e+"All"](".ui-menu-item").eq(0)),s&&s.length&&this.active||(s=this.activeMenu.find(this.options.items)[t]()),this.focus(i,s)},nextPage:function(t){var i,s,n;return this.active?(this.isLastItem()||(this._hasScroll()?(s=this.active.offset().top,n=this.element.height(),this.active.nextAll(".ui-menu-item").each(function(){return i=e(this),0>i.offset().top-s-n}),this.focus(t,i)):this.focus(t,this.activeMenu.find(this.options.items)[this.active?"last":"first"]())),void 0):(this.next(t),void 0)},previousPage:function(t){var i,s,n;return this.active?(this.isFirstItem()||(this._hasScroll()?(s=this.active.offset().top,n=this.element.height(),this.active.prevAll(".ui-menu-item").each(function(){return i=e(this),i.offset().top-s+n>0}),this.focus(t,i)):this.focus(t,this.activeMenu.find(this.options.items).first())),void 0):(this.next(t),void 0)},_hasScroll:function(){return this.element.outerHeight()<this.element.prop("scrollHeight")},select:function(t){this.active=this.active||e(t.target).closest(".ui-menu-item");var i={item:this.active};this.active.has(".ui-menu").length||this.collapseAll(t,!0),this._trigger("select",t,i)}}),e.widget("ui.autocomplete",{version:"1.11.1",defaultElement:"<input>",options:{appendTo:null,autoFocus:!1,delay:300,minLength:1,position:{my:"left top",at:"left bottom",collision:"none"},source:null,change:null,close:null,focus:null,open:null,response:null,search:null,select:null},requestIndex:0,pending:0,_create:function(){var t,i,s,n=this.element[0].nodeName.toLowerCase(),a="textarea"===n,o="input"===n;this.isMultiLine=a?!0:o?!1:this.element.prop("isContentEditable"),this.valueMethod=this.element[a||o?"val":"text"],this.isNewMenu=!0,this.element.addClass("ui-autocomplete-input").attr("autocomplete","off"),this._on(this.element,{keydown:function(n){if(this.element.prop("readOnly"))return t=!0,s=!0,i=!0,void 0;t=!1,s=!1,i=!1;var a=e.ui.keyCode;switch(n.keyCode){case a.PAGE_UP:t=!0,this._move("previousPage",n);break;case a.PAGE_DOWN:t=!0,this._move("nextPage",n);break;case a.UP:t=!0,this._keyEvent("previous",n);break;case a.DOWN:t=!0,this._keyEvent("next",n);break;case a.ENTER:this.menu.active&&(t=!0,n.preventDefault(),this.menu.select(n));break;case a.TAB:this.menu.active&&this.menu.select(n);break;case a.ESCAPE:this.menu.element.is(":visible")&&(this.isMultiLine||this._value(this.term),this.close(n),n.preventDefault());break;default:i=!0,this._searchTimeout(n)}},keypress:function(s){if(t)return t=!1,(!this.isMultiLine||this.menu.element.is(":visible"))&&s.preventDefault(),void 0;if(!i){var n=e.ui.keyCode;switch(s.keyCode){case n.PAGE_UP:this._move("previousPage",s);break;case n.PAGE_DOWN:this._move("nextPage",s);break;case n.UP:this._keyEvent("previous",s);break;case n.DOWN:this._keyEvent("next",s)}}},input:function(e){return s?(s=!1,e.preventDefault(),void 0):(this._searchTimeout(e),void 0)},focus:function(){this.selectedItem=null,this.previous=this._value()},blur:function(e){return this.cancelBlur?(delete this.cancelBlur,void 0):(clearTimeout(this.searching),this.close(e),this._change(e),void 0)}}),this._initSource(),this.menu=e("<ul>").addClass("ui-autocomplete ui-front").appendTo(this._appendTo()).menu({role:null}).hide().menu("instance"),this._on(this.menu.element,{mousedown:function(t){t.preventDefault(),this.cancelBlur=!0,this._delay(function(){delete this.cancelBlur});var i=this.menu.element[0];e(t.target).closest(".ui-menu-item").length||this._delay(function(){var t=this;this.document.one("mousedown",function(s){s.target===t.element[0]||s.target===i||e.contains(i,s.target)||t.close()})})},menufocus:function(t,i){var s,n;return this.isNewMenu&&(this.isNewMenu=!1,t.originalEvent&&/^mouse/.test(t.originalEvent.type))?(this.menu.blur(),this.document.one("mousemove",function(){e(t.target).trigger(t.originalEvent)}),void 0):(n=i.item.data("ui-autocomplete-item"),!1!==this._trigger("focus",t,{item:n})&&t.originalEvent&&/^key/.test(t.originalEvent.type)&&this._value(n.value),s=i.item.attr("aria-label")||n.value,s&&e.trim(s).length&&(this.liveRegion.children().hide(),e("<div>").text(s).appendTo(this.liveRegion)),void 0)},menuselect:function(e,t){var i=t.item.data("ui-autocomplete-item"),s=this.previous;this.element[0]!==this.document[0].activeElement&&(this.element.focus(),this.previous=s,this._delay(function(){this.previous=s,this.selectedItem=i})),!1!==this._trigger("select",e,{item:i})&&this._value(i.value),this.term=this._value(),this.close(e),this.selectedItem=i}}),this.liveRegion=e("<span>",{role:"status","aria-live":"assertive","aria-relevant":"additions"}).addClass("ui-helper-hidden-accessible").appendTo(this.document[0].body),this._on(this.window,{beforeunload:function(){this.element.removeAttr("autocomplete")}})},_destroy:function(){clearTimeout(this.searching),this.element.removeClass("ui-autocomplete-input").removeAttr("autocomplete"),this.menu.element.remove(),this.liveRegion.remove()},_setOption:function(e,t){this._super(e,t),"source"===e&&this._initSource(),"appendTo"===e&&this.menu.element.appendTo(this._appendTo()),"disabled"===e&&t&&this.xhr&&this.xhr.abort()},_appendTo:function(){var t=this.options.appendTo;return t&&(t=t.jquery||t.nodeType?e(t):this.document.find(t).eq(0)),t&&t[0]||(t=this.element.closest(".ui-front")),t.length||(t=this.document[0].body),t},_initSource:function(){var t,i,s=this;e.isArray(this.options.source)?(t=this.options.source,this.source=function(i,s){s(e.ui.autocomplete.filter(t,i.term))}):"string"==typeof this.options.source?(i=this.options.source,this.source=function(t,n){s.xhr&&s.xhr.abort(),s.xhr=e.ajax({url:i,data:t,dataType:"json",success:function(e){n(e)},error:function(){n([])}})}):this.source=this.options.source},_searchTimeout:function(e){clearTimeout(this.searching),this.searching=this._delay(function(){var t=this.term===this._value(),i=this.menu.element.is(":visible"),s=e.altKey||e.ctrlKey||e.metaKey||e.shiftKey;(!t||t&&!i&&!s)&&(this.selectedItem=null,this.search(null,e))},this.options.delay)},search:function(e,t){return e=null!=e?e:this._value(),this.term=this._value(),e.length<this.options.minLength?this.close(t):this._trigger("search",t)!==!1?this._search(e):void 0},_search:function(e){this.pending++,this.element.addClass("ui-autocomplete-loading"),this.cancelSearch=!1,this.source({term:e},this._response())},_response:function(){var t=++this.requestIndex;return e.proxy(function(e){t===this.requestIndex&&this.__response(e),this.pending--,this.pending||this.element.removeClass("ui-autocomplete-loading")},this)},__response:function(e){e&&(e=this._normalize(e)),this._trigger("response",null,{content:e}),!this.options.disabled&&e&&e.length&&!this.cancelSearch?(this._suggest(e),this._trigger("open")):this._close()},close:function(e){this.cancelSearch=!0,this._close(e)},_close:function(e){this.menu.element.is(":visible")&&(this.menu.element.hide(),this.menu.blur(),this.isNewMenu=!0,this._trigger("close",e))},_change:function(e){this.previous!==this._value()&&this._trigger("change",e,{item:this.selectedItem})},_normalize:function(t){return t.length&&t[0].label&&t[0].value?t:e.map(t,function(t){return"string"==typeof t?{label:t,value:t}:e.extend({},t,{label:t.label||t.value,value:t.value||t.label})})},_suggest:function(t){var i=this.menu.element.empty();this._renderMenu(i,t),this.isNewMenu=!0,this.menu.refresh(),i.show(),this._resizeMenu(),i.position(e.extend({of:this.element},this.options.position)),this.options.autoFocus&&this.menu.next()},_resizeMenu:function(){var e=this.menu.element;e.outerWidth(Math.max(e.width("").outerWidth()+1,this.element.outerWidth()))},_renderMenu:function(t,i){var s=this;e.each(i,function(e,i){s._renderItemData(t,i)})},_renderItemData:function(e,t){return this._renderItem(e,t).data("ui-autocomplete-item",t)},_renderItem:function(t,i){return e("<li>").text(i.label).appendTo(t)},_move:function(e,t){return this.menu.element.is(":visible")?this.menu.isFirstItem()&&/^previous/.test(e)||this.menu.isLastItem()&&/^next/.test(e)?(this.isMultiLine||this._value(this.term),this.menu.blur(),void 0):(this.menu[e](t),void 0):(this.search(null,t),void 0)},widget:function(){return this.menu.element},_value:function(){return this.valueMethod.apply(this.element,arguments)},_keyEvent:function(e,t){(!this.isMultiLine||this.menu.element.is(":visible"))&&(this._move(e,t),t.preventDefault())}}),e.extend(e.ui.autocomplete,{escapeRegex:function(e){return e.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g,"\\$&")},filter:function(t,i){var s=RegExp(e.ui.autocomplete.escapeRegex(i),"i");return e.grep(t,function(e){return s.test(e.label||e.value||e)})}}),e.widget("ui.autocomplete",e.ui.autocomplete,{options:{messages:{noResults:"No search results.",results:function(e){return e+(e>1?" results are":" result is")+" available, use up and down arrow keys to navigate."}}},__response:function(t){var i;this._superApply(arguments),this.options.disabled||this.cancelSearch||(i=t&&t.length?this.options.messages.results(t.length):this.options.messages.noResults,this.liveRegion.children().hide(),e("<div>").text(i).appendTo(this.liveRegion))}}),e.ui.autocomplete;var c,p="ui-button ui-widget ui-state-default ui-corner-all",f="ui-button-icons-only ui-button-icon-only ui-button-text-icons ui-button-text-icon-primary ui-button-text-icon-secondary ui-button-text-only",m=function(){var t=e(this);setTimeout(function(){t.find(":ui-button").button("refresh")},1)},g=function(t){var i=t.name,s=t.form,n=e([]);return i&&(i=i.replace(/'/g,"\\'"),n=s?e(s).find("[name='"+i+"'][type=radio]"):e("[name='"+i+"'][type=radio]",t.ownerDocument).filter(function(){return!this.form})),n};e.widget("ui.button",{version:"1.11.1",defaultElement:"<button>",options:{disabled:null,text:!0,label:null,icons:{primary:null,secondary:null}},_create:function(){this.element.closest("form").unbind("reset"+this.eventNamespace).bind("reset"+this.eventNamespace,m),"boolean"!=typeof this.options.disabled?this.options.disabled=!!this.element.prop("disabled"):this.element.prop("disabled",this.options.disabled),this._determineButtonType(),this.hasTitle=!!this.buttonElement.attr("title");var t=this,i=this.options,s="checkbox"===this.type||"radio"===this.type,n=s?"":"ui-state-active";null===i.label&&(i.label="input"===this.type?this.buttonElement.val():this.buttonElement.html()),this._hoverable(this.buttonElement),this.buttonElement.addClass(p).attr("role","button").bind("mouseenter"+this.eventNamespace,function(){i.disabled||this===c&&e(this).addClass("ui-state-active")}).bind("mouseleave"+this.eventNamespace,function(){i.disabled||e(this).removeClass(n)}).bind("click"+this.eventNamespace,function(e){i.disabled&&(e.preventDefault(),e.stopImmediatePropagation())}),this._on({focus:function(){this.buttonElement.addClass("ui-state-focus")},blur:function(){this.buttonElement.removeClass("ui-state-focus")}}),s&&this.element.bind("change"+this.eventNamespace,function(){t.refresh()}),"checkbox"===this.type?this.buttonElement.bind("click"+this.eventNamespace,function(){return i.disabled?!1:void 0}):"radio"===this.type?this.buttonElement.bind("click"+this.eventNamespace,function(){if(i.disabled)return!1;e(this).addClass("ui-state-active"),t.buttonElement.attr("aria-pressed","true");var s=t.element[0];g(s).not(s).map(function(){return e(this).button("widget")[0]}).removeClass("ui-state-active").attr("aria-pressed","false")}):(this.buttonElement.bind("mousedown"+this.eventNamespace,function(){return i.disabled?!1:(e(this).addClass("ui-state-active"),c=this,t.document.one("mouseup",function(){c=null}),void 0)}).bind("mouseup"+this.eventNamespace,function(){return i.disabled?!1:(e(this).removeClass("ui-state-active"),void 0)}).bind("keydown"+this.eventNamespace,function(t){return i.disabled?!1:((t.keyCode===e.ui.keyCode.SPACE||t.keyCode===e.ui.keyCode.ENTER)&&e(this).addClass("ui-state-active"),void 0)}).bind("keyup"+this.eventNamespace+" blur"+this.eventNamespace,function(){e(this).removeClass("ui-state-active")}),this.buttonElement.is("a")&&this.buttonElement.keyup(function(t){t.keyCode===e.ui.keyCode.SPACE&&e(this).click()})),this._setOption("disabled",i.disabled),this._resetButton()},_determineButtonType:function(){var e,t,i;this.type=this.element.is("[type=checkbox]")?"checkbox":this.element.is("[type=radio]")?"radio":this.element.is("input")?"input":"button","checkbox"===this.type||"radio"===this.type?(e=this.element.parents().last(),t="label[for='"+this.element.attr("id")+"']",this.buttonElement=e.find(t),this.buttonElement.length||(e=e.length?e.siblings():this.element.siblings(),this.buttonElement=e.filter(t),this.buttonElement.length||(this.buttonElement=e.find(t))),this.element.addClass("ui-helper-hidden-accessible"),i=this.element.is(":checked"),i&&this.buttonElement.addClass("ui-state-active"),this.buttonElement.prop("aria-pressed",i)):this.buttonElement=this.element},widget:function(){return this.buttonElement},_destroy:function(){this.element.removeClass("ui-helper-hidden-accessible"),this.buttonElement.removeClass(p+" ui-state-active "+f).removeAttr("role").removeAttr("aria-pressed").html(this.buttonElement.find(".ui-button-text").html()),this.hasTitle||this.buttonElement.removeAttr("title")},_setOption:function(e,t){return this._super(e,t),"disabled"===e?(this.widget().toggleClass("ui-state-disabled",!!t),this.element.prop("disabled",!!t),t&&("checkbox"===this.type||"radio"===this.type?this.buttonElement.removeClass("ui-state-focus"):this.buttonElement.removeClass("ui-state-focus ui-state-active")),void 0):(this._resetButton(),void 0)},refresh:function(){var t=this.element.is("input, button")?this.element.is(":disabled"):this.element.hasClass("ui-button-disabled");t!==this.options.disabled&&this._setOption("disabled",t),"radio"===this.type?g(this.element[0]).each(function(){e(this).is(":checked")?e(this).button("widget").addClass("ui-state-active").attr("aria-pressed","true"):e(this).button("widget").removeClass("ui-state-active").attr("aria-pressed","false")}):"checkbox"===this.type&&(this.element.is(":checked")?this.buttonElement.addClass("ui-state-active").attr("aria-pressed","true"):this.buttonElement.removeClass("ui-state-active").attr("aria-pressed","false"))},_resetButton:function(){if("input"===this.type)return this.options.label&&this.element.val(this.options.label),void 0;var t=this.buttonElement.removeClass(f),i=e("<span></span>",this.document[0]).addClass("ui-button-text").html(this.options.label).appendTo(t.empty()).text(),s=this.options.icons,n=s.primary&&s.secondary,a=[];s.primary||s.secondary?(this.options.text&&a.push("ui-button-text-icon"+(n?"s":s.primary?"-primary":"-secondary")),s.primary&&t.prepend("<span class='ui-button-icon-primary ui-icon "+s.primary+"'></span>"),s.secondary&&t.append("<span class='ui-button-icon-secondary ui-icon "+s.secondary+"'></span>"),this.options.text||(a.push(n?"ui-button-icons-only":"ui-button-icon-only"),this.hasTitle||t.attr("title",e.trim(i)))):a.push("ui-button-text-only"),t.addClass(a.join(" "))}}),e.widget("ui.buttonset",{version:"1.11.1",options:{items:"button, input[type=button], input[type=submit], input[type=reset], input[type=checkbox], input[type=radio], a, :data(ui-button)"},_create:function(){this.element.addClass("ui-buttonset")},_init:function(){this.refresh()},_setOption:function(e,t){"disabled"===e&&this.buttons.button("option",e,t),this._super(e,t)},refresh:function(){var t="rtl"===this.element.css("direction"),i=this.element.find(this.options.items),s=i.filter(":ui-button");i.not(":ui-button").button(),s.button("refresh"),this.buttons=i.map(function(){return e(this).button("widget")[0]}).removeClass("ui-corner-all ui-corner-left ui-corner-right").filter(":first").addClass(t?"ui-corner-right":"ui-corner-left").end().filter(":last").addClass(t?"ui-corner-left":"ui-corner-right").end().end()},_destroy:function(){this.element.removeClass("ui-buttonset"),this.buttons.map(function(){return e(this).button("widget")[0]}).removeClass("ui-corner-left ui-corner-right").end().button("destroy")}}),e.ui.button,e.extend(e.ui,{datepicker:{version:"1.11.1"}});var v;e.extend(n.prototype,{markerClassName:"hasDatepicker",maxRows:4,_widgetDatepicker:function(){return this.dpDiv},setDefaults:function(e){return r(this._defaults,e||{}),this},_attachDatepicker:function(t,i){var s,n,a;s=t.nodeName.toLowerCase(),n="div"===s||"span"===s,t.id||(this.uuid+=1,t.id="dp"+this.uuid),a=this._newInst(e(t),n),a.settings=e.extend({},i||{}),"input"===s?this._connectDatepicker(t,a):n&&this._inlineDatepicker(t,a)},_newInst:function(t,i){var s=t[0].id.replace(/([^A-Za-z0-9_\-])/g,"\\\\$1");return{id:s,input:t,selectedDay:0,selectedMonth:0,selectedYear:0,drawMonth:0,drawYear:0,inline:i,dpDiv:i?a(e("<div class='"+this._inlineClass+" ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")):this.dpDiv}},_connectDatepicker:function(t,i){var s=e(t);i.append=e([]),i.trigger=e([]),s.hasClass(this.markerClassName)||(this._attachments(s,i),s.addClass(this.markerClassName).keydown(this._doKeyDown).keypress(this._doKeyPress).keyup(this._doKeyUp),this._autoSize(i),e.data(t,"datepicker",i),i.settings.disabled&&this._disableDatepicker(t))},_attachments:function(t,i){var s,n,a,o=this._get(i,"appendText"),r=this._get(i,"isRTL");i.append&&i.append.remove(),o&&(i.append=e("<span class='"+this._appendClass+"'>"+o+"</span>"),t[r?"before":"after"](i.append)),t.unbind("focus",this._showDatepicker),i.trigger&&i.trigger.remove(),s=this._get(i,"showOn"),("focus"===s||"both"===s)&&t.focus(this._showDatepicker),("button"===s||"both"===s)&&(n=this._get(i,"buttonText"),a=this._get(i,"buttonImage"),i.trigger=e(this._get(i,"buttonImageOnly")?e("<img/>").addClass(this._triggerClass).attr({src:a,alt:n,title:n}):e("<button type='button'></button>").addClass(this._triggerClass).html(a?e("<img/>").attr({src:a,alt:n,title:n}):n)),t[r?"before":"after"](i.trigger),i.trigger.click(function(){return e.datepicker._datepickerShowing&&e.datepicker._lastInput===t[0]?e.datepicker._hideDatepicker():e.datepicker._datepickerShowing&&e.datepicker._lastInput!==t[0]?(e.datepicker._hideDatepicker(),e.datepicker._showDatepicker(t[0])):e.datepicker._showDatepicker(t[0]),!1}))},_autoSize:function(e){if(this._get(e,"autoSize")&&!e.inline){var t,i,s,n,a=new Date(2009,11,20),o=this._get(e,"dateFormat");o.match(/[DM]/)&&(t=function(e){for(i=0,s=0,n=0;e.length>n;n++)e[n].length>i&&(i=e[n].length,s=n);return s},a.setMonth(t(this._get(e,o.match(/MM/)?"monthNames":"monthNamesShort"))),a.setDate(t(this._get(e,o.match(/DD/)?"dayNames":"dayNamesShort"))+20-a.getDay())),e.input.attr("size",this._formatDate(e,a).length)}},_inlineDatepicker:function(t,i){var s=e(t);s.hasClass(this.markerClassName)||(s.addClass(this.markerClassName).append(i.dpDiv),e.data(t,"datepicker",i),this._setDate(i,this._getDefaultDate(i),!0),this._updateDatepicker(i),this._updateAlternate(i),i.settings.disabled&&this._disableDatepicker(t),i.dpDiv.css("display","block"))},_dialogDatepicker:function(t,i,s,n,a){var o,h,l,u,d,c=this._dialogInst;return c||(this.uuid+=1,o="dp"+this.uuid,this._dialogInput=e("<input type='text' id='"+o+"' style='position: absolute; top: -100px; width: 0px;'/>"),this._dialogInput.keydown(this._doKeyDown),e("body").append(this._dialogInput),c=this._dialogInst=this._newInst(this._dialogInput,!1),c.settings={},e.data(this._dialogInput[0],"datepicker",c)),r(c.settings,n||{}),i=i&&i.constructor===Date?this._formatDate(c,i):i,this._dialogInput.val(i),this._pos=a?a.length?a:[a.pageX,a.pageY]:null,this._pos||(h=document.documentElement.clientWidth,l=document.documentElement.clientHeight,u=document.documentElement.scrollLeft||document.body.scrollLeft,d=document.documentElement.scrollTop||document.body.scrollTop,this._pos=[h/2-100+u,l/2-150+d]),this._dialogInput.css("left",this._pos[0]+20+"px").css("top",this._pos[1]+"px"),c.settings.onSelect=s,this._inDialog=!0,this.dpDiv.addClass(this._dialogClass),this._showDatepicker(this._dialogInput[0]),e.blockUI&&e.blockUI(this.dpDiv),e.data(this._dialogInput[0],"datepicker",c),this},_destroyDatepicker:function(t){var i,s=e(t),n=e.data(t,"datepicker");s.hasClass(this.markerClassName)&&(i=t.nodeName.toLowerCase(),e.removeData(t,"datepicker"),"input"===i?(n.append.remove(),n.trigger.remove(),s.removeClass(this.markerClassName).unbind("focus",this._showDatepicker).unbind("keydown",this._doKeyDown).unbind("keypress",this._doKeyPress).unbind("keyup",this._doKeyUp)):("div"===i||"span"===i)&&s.removeClass(this.markerClassName).empty())},_enableDatepicker:function(t){var i,s,n=e(t),a=e.data(t,"datepicker");n.hasClass(this.markerClassName)&&(i=t.nodeName.toLowerCase(),"input"===i?(t.disabled=!1,a.trigger.filter("button").each(function(){this.disabled=!1}).end().filter("img").css({opacity:"1.0",cursor:""})):("div"===i||"span"===i)&&(s=n.children("."+this._inlineClass),s.children().removeClass("ui-state-disabled"),s.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled",!1)),this._disabledInputs=e.map(this._disabledInputs,function(e){return e===t?null:e}))},_disableDatepicker:function(t){var i,s,n=e(t),a=e.data(t,"datepicker");n.hasClass(this.markerClassName)&&(i=t.nodeName.toLowerCase(),"input"===i?(t.disabled=!0,a.trigger.filter("button").each(function(){this.disabled=!0}).end().filter("img").css({opacity:"0.5",cursor:"default"})):("div"===i||"span"===i)&&(s=n.children("."+this._inlineClass),s.children().addClass("ui-state-disabled"),s.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled",!0)),this._disabledInputs=e.map(this._disabledInputs,function(e){return e===t?null:e}),this._disabledInputs[this._disabledInputs.length]=t)},_isDisabledDatepicker:function(e){if(!e)return!1;for(var t=0;this._disabledInputs.length>t;t++)if(this._disabledInputs[t]===e)return!0;return!1},_getInst:function(t){try{return e.data(t,"datepicker")}catch(i){throw"Missing instance data for this datepicker"}},_optionDatepicker:function(t,i,s){var n,a,o,h,l=this._getInst(t);return 2===arguments.length&&"string"==typeof i?"defaults"===i?e.extend({},e.datepicker._defaults):l?"all"===i?e.extend({},l.settings):this._get(l,i):null:(n=i||{},"string"==typeof i&&(n={},n[i]=s),l&&(this._curInst===l&&this._hideDatepicker(),a=this._getDateDatepicker(t,!0),o=this._getMinMaxDate(l,"min"),h=this._getMinMaxDate(l,"max"),r(l.settings,n),null!==o&&void 0!==n.dateFormat&&void 0===n.minDate&&(l.settings.minDate=this._formatDate(l,o)),null!==h&&void 0!==n.dateFormat&&void 0===n.maxDate&&(l.settings.maxDate=this._formatDate(l,h)),"disabled"in n&&(n.disabled?this._disableDatepicker(t):this._enableDatepicker(t)),this._attachments(e(t),l),this._autoSize(l),this._setDate(l,a),this._updateAlternate(l),this._updateDatepicker(l)),void 0)},_changeDatepicker:function(e,t,i){this._optionDatepicker(e,t,i)},_refreshDatepicker:function(e){var t=this._getInst(e);t&&this._updateDatepicker(t)},_setDateDatepicker:function(e,t){var i=this._getInst(e);i&&(this._setDate(i,t),this._updateDatepicker(i),this._updateAlternate(i))},_getDateDatepicker:function(e,t){var i=this._getInst(e);return i&&!i.inline&&this._setDateFromField(i,t),i?this._getDate(i):null},_doKeyDown:function(t){var i,s,n,a=e.datepicker._getInst(t.target),o=!0,r=a.dpDiv.is(".ui-datepicker-rtl");if(a._keyEvent=!0,e.datepicker._datepickerShowing)switch(t.keyCode){case 9:e.datepicker._hideDatepicker(),o=!1;break;case 13:return n=e("td."+e.datepicker._dayOverClass+":not(."+e.datepicker._currentClass+")",a.dpDiv),n[0]&&e.datepicker._selectDay(t.target,a.selectedMonth,a.selectedYear,n[0]),i=e.datepicker._get(a,"onSelect"),i?(s=e.datepicker._formatDate(a),i.apply(a.input?a.input[0]:null,[s,a])):e.datepicker._hideDatepicker(),!1;case 27:e.datepicker._hideDatepicker();break;case 33:e.datepicker._adjustDate(t.target,t.ctrlKey?-e.datepicker._get(a,"stepBigMonths"):-e.datepicker._get(a,"stepMonths"),"M");break;case 34:e.datepicker._adjustDate(t.target,t.ctrlKey?+e.datepicker._get(a,"stepBigMonths"):+e.datepicker._get(a,"stepMonths"),"M");break;case 35:(t.ctrlKey||t.metaKey)&&e.datepicker._clearDate(t.target),o=t.ctrlKey||t.metaKey;break;case 36:(t.ctrlKey||t.metaKey)&&e.datepicker._gotoToday(t.target),o=t.ctrlKey||t.metaKey;break;case 37:(t.ctrlKey||t.metaKey)&&e.datepicker._adjustDate(t.target,r?1:-1,"D"),o=t.ctrlKey||t.metaKey,t.originalEvent.altKey&&e.datepicker._adjustDate(t.target,t.ctrlKey?-e.datepicker._get(a,"stepBigMonths"):-e.datepicker._get(a,"stepMonths"),"M");break;case 38:(t.ctrlKey||t.metaKey)&&e.datepicker._adjustDate(t.target,-7,"D"),o=t.ctrlKey||t.metaKey;break;case 39:(t.ctrlKey||t.metaKey)&&e.datepicker._adjustDate(t.target,r?-1:1,"D"),o=t.ctrlKey||t.metaKey,t.originalEvent.altKey&&e.datepicker._adjustDate(t.target,t.ctrlKey?+e.datepicker._get(a,"stepBigMonths"):+e.datepicker._get(a,"stepMonths"),"M");break;case 40:(t.ctrlKey||t.metaKey)&&e.datepicker._adjustDate(t.target,7,"D"),o=t.ctrlKey||t.metaKey;break;default:o=!1}else 36===t.keyCode&&t.ctrlKey?e.datepicker._showDatepicker(this):o=!1;o&&(t.preventDefault(),t.stopPropagation())},_doKeyPress:function(t){var i,s,n=e.datepicker._getInst(t.target);return e.datepicker._get(n,"constrainInput")?(i=e.datepicker._possibleChars(e.datepicker._get(n,"dateFormat")),s=String.fromCharCode(null==t.charCode?t.keyCode:t.charCode),t.ctrlKey||t.metaKey||" ">s||!i||i.indexOf(s)>-1):void 0},_doKeyUp:function(t){var i,s=e.datepicker._getInst(t.target);if(s.input.val()!==s.lastVal)try{i=e.datepicker.parseDate(e.datepicker._get(s,"dateFormat"),s.input?s.input.val():null,e.datepicker._getFormatConfig(s)),i&&(e.datepicker._setDateFromField(s),e.datepicker._updateAlternate(s),e.datepicker._updateDatepicker(s))
}catch(n){}return!0},_showDatepicker:function(t){if(t=t.target||t,"input"!==t.nodeName.toLowerCase()&&(t=e("input",t.parentNode)[0]),!e.datepicker._isDisabledDatepicker(t)&&e.datepicker._lastInput!==t){var i,n,a,o,h,l,u;i=e.datepicker._getInst(t),e.datepicker._curInst&&e.datepicker._curInst!==i&&(e.datepicker._curInst.dpDiv.stop(!0,!0),i&&e.datepicker._datepickerShowing&&e.datepicker._hideDatepicker(e.datepicker._curInst.input[0])),n=e.datepicker._get(i,"beforeShow"),a=n?n.apply(t,[t,i]):{},a!==!1&&(r(i.settings,a),i.lastVal=null,e.datepicker._lastInput=t,e.datepicker._setDateFromField(i),e.datepicker._inDialog&&(t.value=""),e.datepicker._pos||(e.datepicker._pos=e.datepicker._findPos(t),e.datepicker._pos[1]+=t.offsetHeight),o=!1,e(t).parents().each(function(){return o|="fixed"===e(this).css("position"),!o}),h={left:e.datepicker._pos[0],top:e.datepicker._pos[1]},e.datepicker._pos=null,i.dpDiv.empty(),i.dpDiv.css({position:"absolute",display:"block",top:"-1000px"}),e.datepicker._updateDatepicker(i),h=e.datepicker._checkOffset(i,h,o),i.dpDiv.css({position:e.datepicker._inDialog&&e.blockUI?"static":o?"fixed":"absolute",display:"none",left:h.left+"px",top:h.top+"px"}),i.inline||(l=e.datepicker._get(i,"showAnim"),u=e.datepicker._get(i,"duration"),i.dpDiv.css("z-index",s(e(t))+1),e.datepicker._datepickerShowing=!0,e.effects&&e.effects.effect[l]?i.dpDiv.show(l,e.datepicker._get(i,"showOptions"),u):i.dpDiv[l||"show"](l?u:null),e.datepicker._shouldFocusInput(i)&&i.input.focus(),e.datepicker._curInst=i))}},_updateDatepicker:function(t){this.maxRows=4,v=t,t.dpDiv.empty().append(this._generateHTML(t)),this._attachHandlers(t);var i,s=this._getNumberOfMonths(t),n=s[1],a=17,r=t.dpDiv.find("."+this._dayOverClass+" a");r.length>0&&o.apply(r.get(0)),t.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width(""),n>1&&t.dpDiv.addClass("ui-datepicker-multi-"+n).css("width",a*n+"em"),t.dpDiv[(1!==s[0]||1!==s[1]?"add":"remove")+"Class"]("ui-datepicker-multi"),t.dpDiv[(this._get(t,"isRTL")?"add":"remove")+"Class"]("ui-datepicker-rtl"),t===e.datepicker._curInst&&e.datepicker._datepickerShowing&&e.datepicker._shouldFocusInput(t)&&t.input.focus(),t.yearshtml&&(i=t.yearshtml,setTimeout(function(){i===t.yearshtml&&t.yearshtml&&t.dpDiv.find("select.ui-datepicker-year:first").replaceWith(t.yearshtml),i=t.yearshtml=null},0))},_shouldFocusInput:function(e){return e.input&&e.input.is(":visible")&&!e.input.is(":disabled")&&!e.input.is(":focus")},_checkOffset:function(t,i,s){var n=t.dpDiv.outerWidth(),a=t.dpDiv.outerHeight(),o=t.input?t.input.outerWidth():0,r=t.input?t.input.outerHeight():0,h=document.documentElement.clientWidth+(s?0:e(document).scrollLeft()),l=document.documentElement.clientHeight+(s?0:e(document).scrollTop());return i.left-=this._get(t,"isRTL")?n-o:0,i.left-=s&&i.left===t.input.offset().left?e(document).scrollLeft():0,i.top-=s&&i.top===t.input.offset().top+r?e(document).scrollTop():0,i.left-=Math.min(i.left,i.left+n>h&&h>n?Math.abs(i.left+n-h):0),i.top-=Math.min(i.top,i.top+a>l&&l>a?Math.abs(a+r):0),i},_findPos:function(t){for(var i,s=this._getInst(t),n=this._get(s,"isRTL");t&&("hidden"===t.type||1!==t.nodeType||e.expr.filters.hidden(t));)t=t[n?"previousSibling":"nextSibling"];return i=e(t).offset(),[i.left,i.top]},_hideDatepicker:function(t){var i,s,n,a,o=this._curInst;!o||t&&o!==e.data(t,"datepicker")||this._datepickerShowing&&(i=this._get(o,"showAnim"),s=this._get(o,"duration"),n=function(){e.datepicker._tidyDialog(o)},e.effects&&(e.effects.effect[i]||e.effects[i])?o.dpDiv.hide(i,e.datepicker._get(o,"showOptions"),s,n):o.dpDiv["slideDown"===i?"slideUp":"fadeIn"===i?"fadeOut":"hide"](i?s:null,n),i||n(),this._datepickerShowing=!1,a=this._get(o,"onClose"),a&&a.apply(o.input?o.input[0]:null,[o.input?o.input.val():"",o]),this._lastInput=null,this._inDialog&&(this._dialogInput.css({position:"absolute",left:"0",top:"-100px"}),e.blockUI&&(e.unblockUI(),e("body").append(this.dpDiv))),this._inDialog=!1)},_tidyDialog:function(e){e.dpDiv.removeClass(this._dialogClass).unbind(".ui-datepicker-calendar")},_checkExternalClick:function(t){if(e.datepicker._curInst){var i=e(t.target),s=e.datepicker._getInst(i[0]);(i[0].id!==e.datepicker._mainDivId&&0===i.parents("#"+e.datepicker._mainDivId).length&&!i.hasClass(e.datepicker.markerClassName)&&!i.closest("."+e.datepicker._triggerClass).length&&e.datepicker._datepickerShowing&&(!e.datepicker._inDialog||!e.blockUI)||i.hasClass(e.datepicker.markerClassName)&&e.datepicker._curInst!==s)&&e.datepicker._hideDatepicker()}},_adjustDate:function(t,i,s){var n=e(t),a=this._getInst(n[0]);this._isDisabledDatepicker(n[0])||(this._adjustInstDate(a,i+("M"===s?this._get(a,"showCurrentAtPos"):0),s),this._updateDatepicker(a))},_gotoToday:function(t){var i,s=e(t),n=this._getInst(s[0]);this._get(n,"gotoCurrent")&&n.currentDay?(n.selectedDay=n.currentDay,n.drawMonth=n.selectedMonth=n.currentMonth,n.drawYear=n.selectedYear=n.currentYear):(i=new Date,n.selectedDay=i.getDate(),n.drawMonth=n.selectedMonth=i.getMonth(),n.drawYear=n.selectedYear=i.getFullYear()),this._notifyChange(n),this._adjustDate(s)},_selectMonthYear:function(t,i,s){var n=e(t),a=this._getInst(n[0]);a["selected"+("M"===s?"Month":"Year")]=a["draw"+("M"===s?"Month":"Year")]=parseInt(i.options[i.selectedIndex].value,10),this._notifyChange(a),this._adjustDate(n)},_selectDay:function(t,i,s,n){var a,o=e(t);e(n).hasClass(this._unselectableClass)||this._isDisabledDatepicker(o[0])||(a=this._getInst(o[0]),a.selectedDay=a.currentDay=e("a",n).html(),a.selectedMonth=a.currentMonth=i,a.selectedYear=a.currentYear=s,this._selectDate(t,this._formatDate(a,a.currentDay,a.currentMonth,a.currentYear)))},_clearDate:function(t){var i=e(t);this._selectDate(i,"")},_selectDate:function(t,i){var s,n=e(t),a=this._getInst(n[0]);i=null!=i?i:this._formatDate(a),a.input&&a.input.val(i),this._updateAlternate(a),s=this._get(a,"onSelect"),s?s.apply(a.input?a.input[0]:null,[i,a]):a.input&&a.input.trigger("change"),a.inline?this._updateDatepicker(a):(this._hideDatepicker(),this._lastInput=a.input[0],"object"!=typeof a.input[0]&&a.input.focus(),this._lastInput=null)},_updateAlternate:function(t){var i,s,n,a=this._get(t,"altField");a&&(i=this._get(t,"altFormat")||this._get(t,"dateFormat"),s=this._getDate(t),n=this.formatDate(i,s,this._getFormatConfig(t)),e(a).each(function(){e(this).val(n)}))},noWeekends:function(e){var t=e.getDay();return[t>0&&6>t,""]},iso8601Week:function(e){var t,i=new Date(e.getTime());return i.setDate(i.getDate()+4-(i.getDay()||7)),t=i.getTime(),i.setMonth(0),i.setDate(1),Math.floor(Math.round((t-i)/864e5)/7)+1},parseDate:function(t,i,s){if(null==t||null==i)throw"Invalid arguments";if(i="object"==typeof i?""+i:i+"",""===i)return null;var n,a,o,r,h=0,l=(s?s.shortYearCutoff:null)||this._defaults.shortYearCutoff,u="string"!=typeof l?l:(new Date).getFullYear()%100+parseInt(l,10),d=(s?s.dayNamesShort:null)||this._defaults.dayNamesShort,c=(s?s.dayNames:null)||this._defaults.dayNames,p=(s?s.monthNamesShort:null)||this._defaults.monthNamesShort,f=(s?s.monthNames:null)||this._defaults.monthNames,m=-1,g=-1,v=-1,y=-1,b=!1,_=function(e){var i=t.length>n+1&&t.charAt(n+1)===e;return i&&n++,i},x=function(e){var t=_(e),s="@"===e?14:"!"===e?20:"y"===e&&t?4:"o"===e?3:2,n="y"===e?s:1,a=RegExp("^\\d{"+n+","+s+"}"),o=i.substring(h).match(a);if(!o)throw"Missing number at position "+h;return h+=o[0].length,parseInt(o[0],10)},w=function(t,s,n){var a=-1,o=e.map(_(t)?n:s,function(e,t){return[[t,e]]}).sort(function(e,t){return-(e[1].length-t[1].length)});if(e.each(o,function(e,t){var s=t[1];return i.substr(h,s.length).toLowerCase()===s.toLowerCase()?(a=t[0],h+=s.length,!1):void 0}),-1!==a)return a+1;throw"Unknown name at position "+h},k=function(){if(i.charAt(h)!==t.charAt(n))throw"Unexpected literal at position "+h;h++};for(n=0;t.length>n;n++)if(b)"'"!==t.charAt(n)||_("'")?k():b=!1;else switch(t.charAt(n)){case"d":v=x("d");break;case"D":w("D",d,c);break;case"o":y=x("o");break;case"m":g=x("m");break;case"M":g=w("M",p,f);break;case"y":m=x("y");break;case"@":r=new Date(x("@")),m=r.getFullYear(),g=r.getMonth()+1,v=r.getDate();break;case"!":r=new Date((x("!")-this._ticksTo1970)/1e4),m=r.getFullYear(),g=r.getMonth()+1,v=r.getDate();break;case"'":_("'")?k():b=!0;break;default:k()}if(i.length>h&&(o=i.substr(h),!/^\s+/.test(o)))throw"Extra/unparsed characters found in date: "+o;if(-1===m?m=(new Date).getFullYear():100>m&&(m+=(new Date).getFullYear()-(new Date).getFullYear()%100+(u>=m?0:-100)),y>-1)for(g=1,v=y;;){if(a=this._getDaysInMonth(m,g-1),a>=v)break;g++,v-=a}if(r=this._daylightSavingAdjust(new Date(m,g-1,v)),r.getFullYear()!==m||r.getMonth()+1!==g||r.getDate()!==v)throw"Invalid date";return r},ATOM:"yy-mm-dd",COOKIE:"D, dd M yy",ISO_8601:"yy-mm-dd",RFC_822:"D, d M y",RFC_850:"DD, dd-M-y",RFC_1036:"D, d M y",RFC_1123:"D, d M yy",RFC_2822:"D, d M yy",RSS:"D, d M y",TICKS:"!",TIMESTAMP:"@",W3C:"yy-mm-dd",_ticksTo1970:1e7*60*60*24*(718685+Math.floor(492.5)-Math.floor(19.7)+Math.floor(4.925)),formatDate:function(e,t,i){if(!t)return"";var s,n=(i?i.dayNamesShort:null)||this._defaults.dayNamesShort,a=(i?i.dayNames:null)||this._defaults.dayNames,o=(i?i.monthNamesShort:null)||this._defaults.monthNamesShort,r=(i?i.monthNames:null)||this._defaults.monthNames,h=function(t){var i=e.length>s+1&&e.charAt(s+1)===t;return i&&s++,i},l=function(e,t,i){var s=""+t;if(h(e))for(;i>s.length;)s="0"+s;return s},u=function(e,t,i,s){return h(e)?s[t]:i[t]},d="",c=!1;if(t)for(s=0;e.length>s;s++)if(c)"'"!==e.charAt(s)||h("'")?d+=e.charAt(s):c=!1;else switch(e.charAt(s)){case"d":d+=l("d",t.getDate(),2);break;case"D":d+=u("D",t.getDay(),n,a);break;case"o":d+=l("o",Math.round((new Date(t.getFullYear(),t.getMonth(),t.getDate()).getTime()-new Date(t.getFullYear(),0,0).getTime())/864e5),3);break;case"m":d+=l("m",t.getMonth()+1,2);break;case"M":d+=u("M",t.getMonth(),o,r);break;case"y":d+=h("y")?t.getFullYear():(10>t.getYear()%100?"0":"")+t.getYear()%100;break;case"@":d+=t.getTime();break;case"!":d+=1e4*t.getTime()+this._ticksTo1970;break;case"'":h("'")?d+="'":c=!0;break;default:d+=e.charAt(s)}return d},_possibleChars:function(e){var t,i="",s=!1,n=function(i){var s=e.length>t+1&&e.charAt(t+1)===i;return s&&t++,s};for(t=0;e.length>t;t++)if(s)"'"!==e.charAt(t)||n("'")?i+=e.charAt(t):s=!1;else switch(e.charAt(t)){case"d":case"m":case"y":case"@":i+="0123456789";break;case"D":case"M":return null;case"'":n("'")?i+="'":s=!0;break;default:i+=e.charAt(t)}return i},_get:function(e,t){return void 0!==e.settings[t]?e.settings[t]:this._defaults[t]},_setDateFromField:function(e,t){if(e.input.val()!==e.lastVal){var i=this._get(e,"dateFormat"),s=e.lastVal=e.input?e.input.val():null,n=this._getDefaultDate(e),a=n,o=this._getFormatConfig(e);try{a=this.parseDate(i,s,o)||n}catch(r){s=t?"":s}e.selectedDay=a.getDate(),e.drawMonth=e.selectedMonth=a.getMonth(),e.drawYear=e.selectedYear=a.getFullYear(),e.currentDay=s?a.getDate():0,e.currentMonth=s?a.getMonth():0,e.currentYear=s?a.getFullYear():0,this._adjustInstDate(e)}},_getDefaultDate:function(e){return this._restrictMinMax(e,this._determineDate(e,this._get(e,"defaultDate"),new Date))},_determineDate:function(t,i,s){var n=function(e){var t=new Date;return t.setDate(t.getDate()+e),t},a=function(i){try{return e.datepicker.parseDate(e.datepicker._get(t,"dateFormat"),i,e.datepicker._getFormatConfig(t))}catch(s){}for(var n=(i.toLowerCase().match(/^c/)?e.datepicker._getDate(t):null)||new Date,a=n.getFullYear(),o=n.getMonth(),r=n.getDate(),h=/([+\-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g,l=h.exec(i);l;){switch(l[2]||"d"){case"d":case"D":r+=parseInt(l[1],10);break;case"w":case"W":r+=7*parseInt(l[1],10);break;case"m":case"M":o+=parseInt(l[1],10),r=Math.min(r,e.datepicker._getDaysInMonth(a,o));break;case"y":case"Y":a+=parseInt(l[1],10),r=Math.min(r,e.datepicker._getDaysInMonth(a,o))}l=h.exec(i)}return new Date(a,o,r)},o=null==i||""===i?s:"string"==typeof i?a(i):"number"==typeof i?isNaN(i)?s:n(i):new Date(i.getTime());return o=o&&"Invalid Date"==""+o?s:o,o&&(o.setHours(0),o.setMinutes(0),o.setSeconds(0),o.setMilliseconds(0)),this._daylightSavingAdjust(o)},_daylightSavingAdjust:function(e){return e?(e.setHours(e.getHours()>12?e.getHours()+2:0),e):null},_setDate:function(e,t,i){var s=!t,n=e.selectedMonth,a=e.selectedYear,o=this._restrictMinMax(e,this._determineDate(e,t,new Date));e.selectedDay=e.currentDay=o.getDate(),e.drawMonth=e.selectedMonth=e.currentMonth=o.getMonth(),e.drawYear=e.selectedYear=e.currentYear=o.getFullYear(),n===e.selectedMonth&&a===e.selectedYear||i||this._notifyChange(e),this._adjustInstDate(e),e.input&&e.input.val(s?"":this._formatDate(e))},_getDate:function(e){var t=!e.currentYear||e.input&&""===e.input.val()?null:this._daylightSavingAdjust(new Date(e.currentYear,e.currentMonth,e.currentDay));return t},_attachHandlers:function(t){var i=this._get(t,"stepMonths"),s="#"+t.id.replace(/\\\\/g,"\\");t.dpDiv.find("[data-handler]").map(function(){var t={prev:function(){e.datepicker._adjustDate(s,-i,"M")},next:function(){e.datepicker._adjustDate(s,+i,"M")},hide:function(){e.datepicker._hideDatepicker()},today:function(){e.datepicker._gotoToday(s)},selectDay:function(){return e.datepicker._selectDay(s,+this.getAttribute("data-month"),+this.getAttribute("data-year"),this),!1},selectMonth:function(){return e.datepicker._selectMonthYear(s,this,"M"),!1},selectYear:function(){return e.datepicker._selectMonthYear(s,this,"Y"),!1}};e(this).bind(this.getAttribute("data-event"),t[this.getAttribute("data-handler")])})},_generateHTML:function(e){var t,i,s,n,a,o,r,h,l,u,d,c,p,f,m,g,v,y,b,_,x,w,k,T,D,S,M,N,C,A,I,P,z,H,F,E,j,O,W,L=new Date,R=this._daylightSavingAdjust(new Date(L.getFullYear(),L.getMonth(),L.getDate())),Y=this._get(e,"isRTL"),B=this._get(e,"showButtonPanel"),J=this._get(e,"hideIfNoPrevNext"),q=this._get(e,"navigationAsDateFormat"),K=this._getNumberOfMonths(e),V=this._get(e,"showCurrentAtPos"),U=this._get(e,"stepMonths"),Q=1!==K[0]||1!==K[1],G=this._daylightSavingAdjust(e.currentDay?new Date(e.currentYear,e.currentMonth,e.currentDay):new Date(9999,9,9)),X=this._getMinMaxDate(e,"min"),$=this._getMinMaxDate(e,"max"),Z=e.drawMonth-V,et=e.drawYear;if(0>Z&&(Z+=12,et--),$)for(t=this._daylightSavingAdjust(new Date($.getFullYear(),$.getMonth()-K[0]*K[1]+1,$.getDate())),t=X&&X>t?X:t;this._daylightSavingAdjust(new Date(et,Z,1))>t;)Z--,0>Z&&(Z=11,et--);for(e.drawMonth=Z,e.drawYear=et,i=this._get(e,"prevText"),i=q?this.formatDate(i,this._daylightSavingAdjust(new Date(et,Z-U,1)),this._getFormatConfig(e)):i,s=this._canAdjustMonth(e,-1,et,Z)?"<a class='ui-datepicker-prev ui-corner-all' data-handler='prev' data-event='click' title='"+i+"'><span class='ui-icon ui-icon-circle-triangle-"+(Y?"e":"w")+"'>"+i+"</span></a>":J?"":"<a class='ui-datepicker-prev ui-corner-all ui-state-disabled' title='"+i+"'><span class='ui-icon ui-icon-circle-triangle-"+(Y?"e":"w")+"'>"+i+"</span></a>",n=this._get(e,"nextText"),n=q?this.formatDate(n,this._daylightSavingAdjust(new Date(et,Z+U,1)),this._getFormatConfig(e)):n,a=this._canAdjustMonth(e,1,et,Z)?"<a class='ui-datepicker-next ui-corner-all' data-handler='next' data-event='click' title='"+n+"'><span class='ui-icon ui-icon-circle-triangle-"+(Y?"w":"e")+"'>"+n+"</span></a>":J?"":"<a class='ui-datepicker-next ui-corner-all ui-state-disabled' title='"+n+"'><span class='ui-icon ui-icon-circle-triangle-"+(Y?"w":"e")+"'>"+n+"</span></a>",o=this._get(e,"currentText"),r=this._get(e,"gotoCurrent")&&e.currentDay?G:R,o=q?this.formatDate(o,r,this._getFormatConfig(e)):o,h=e.inline?"":"<button type='button' class='ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all' data-handler='hide' data-event='click'>"+this._get(e,"closeText")+"</button>",l=B?"<div class='ui-datepicker-buttonpane ui-widget-content'>"+(Y?h:"")+(this._isInRange(e,r)?"<button type='button' class='ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all' data-handler='today' data-event='click'>"+o+"</button>":"")+(Y?"":h)+"</div>":"",u=parseInt(this._get(e,"firstDay"),10),u=isNaN(u)?0:u,d=this._get(e,"showWeek"),c=this._get(e,"dayNames"),p=this._get(e,"dayNamesMin"),f=this._get(e,"monthNames"),m=this._get(e,"monthNamesShort"),g=this._get(e,"beforeShowDay"),v=this._get(e,"showOtherMonths"),y=this._get(e,"selectOtherMonths"),b=this._getDefaultDate(e),_="",w=0;K[0]>w;w++){for(k="",this.maxRows=4,T=0;K[1]>T;T++){if(D=this._daylightSavingAdjust(new Date(et,Z,e.selectedDay)),S=" ui-corner-all",M="",Q){if(M+="<div class='ui-datepicker-group",K[1]>1)switch(T){case 0:M+=" ui-datepicker-group-first",S=" ui-corner-"+(Y?"right":"left");break;case K[1]-1:M+=" ui-datepicker-group-last",S=" ui-corner-"+(Y?"left":"right");break;default:M+=" ui-datepicker-group-middle",S=""}M+="'>"}for(M+="<div class='ui-datepicker-header ui-widget-header ui-helper-clearfix"+S+"'>"+(/all|left/.test(S)&&0===w?Y?a:s:"")+(/all|right/.test(S)&&0===w?Y?s:a:"")+this._generateMonthYearHeader(e,Z,et,X,$,w>0||T>0,f,m)+"</div><table class='ui-datepicker-calendar'><thead>"+"<tr>",N=d?"<th class='ui-datepicker-week-col'>"+this._get(e,"weekHeader")+"</th>":"",x=0;7>x;x++)C=(x+u)%7,N+="<th scope='col'"+((x+u+6)%7>=5?" class='ui-datepicker-week-end'":"")+">"+"<span title='"+c[C]+"'>"+p[C]+"</span></th>";for(M+=N+"</tr></thead><tbody>",A=this._getDaysInMonth(et,Z),et===e.selectedYear&&Z===e.selectedMonth&&(e.selectedDay=Math.min(e.selectedDay,A)),I=(this._getFirstDayOfMonth(et,Z)-u+7)%7,P=Math.ceil((I+A)/7),z=Q?this.maxRows>P?this.maxRows:P:P,this.maxRows=z,H=this._daylightSavingAdjust(new Date(et,Z,1-I)),F=0;z>F;F++){for(M+="<tr>",E=d?"<td class='ui-datepicker-week-col'>"+this._get(e,"calculateWeek")(H)+"</td>":"",x=0;7>x;x++)j=g?g.apply(e.input?e.input[0]:null,[H]):[!0,""],O=H.getMonth()!==Z,W=O&&!y||!j[0]||X&&X>H||$&&H>$,E+="<td class='"+((x+u+6)%7>=5?" ui-datepicker-week-end":"")+(O?" ui-datepicker-other-month":"")+(H.getTime()===D.getTime()&&Z===e.selectedMonth&&e._keyEvent||b.getTime()===H.getTime()&&b.getTime()===D.getTime()?" "+this._dayOverClass:"")+(W?" "+this._unselectableClass+" ui-state-disabled":"")+(O&&!v?"":" "+j[1]+(H.getTime()===G.getTime()?" "+this._currentClass:"")+(H.getTime()===R.getTime()?" ui-datepicker-today":""))+"'"+(O&&!v||!j[2]?"":" title='"+j[2].replace(/'/g,"&#39;")+"'")+(W?"":" data-handler='selectDay' data-event='click' data-month='"+H.getMonth()+"' data-year='"+H.getFullYear()+"'")+">"+(O&&!v?"&#xa0;":W?"<span class='ui-state-default'>"+H.getDate()+"</span>":"<a class='ui-state-default"+(H.getTime()===R.getTime()?" ui-state-highlight":"")+(H.getTime()===G.getTime()?" ui-state-active":"")+(O?" ui-priority-secondary":"")+"' href='#'>"+H.getDate()+"</a>")+"</td>",H.setDate(H.getDate()+1),H=this._daylightSavingAdjust(H);M+=E+"</tr>"}Z++,Z>11&&(Z=0,et++),M+="</tbody></table>"+(Q?"</div>"+(K[0]>0&&T===K[1]-1?"<div class='ui-datepicker-row-break'></div>":""):""),k+=M}_+=k}return _+=l,e._keyEvent=!1,_},_generateMonthYearHeader:function(e,t,i,s,n,a,o,r){var h,l,u,d,c,p,f,m,g=this._get(e,"changeMonth"),v=this._get(e,"changeYear"),y=this._get(e,"showMonthAfterYear"),b="<div class='ui-datepicker-title'>",_="";if(a||!g)_+="<span class='ui-datepicker-month'>"+o[t]+"</span>";else{for(h=s&&s.getFullYear()===i,l=n&&n.getFullYear()===i,_+="<select class='ui-datepicker-month' data-handler='selectMonth' data-event='change'>",u=0;12>u;u++)(!h||u>=s.getMonth())&&(!l||n.getMonth()>=u)&&(_+="<option value='"+u+"'"+(u===t?" selected='selected'":"")+">"+r[u]+"</option>");_+="</select>"}if(y||(b+=_+(!a&&g&&v?"":"&#xa0;")),!e.yearshtml)if(e.yearshtml="",a||!v)b+="<span class='ui-datepicker-year'>"+i+"</span>";else{for(d=this._get(e,"yearRange").split(":"),c=(new Date).getFullYear(),p=function(e){var t=e.match(/c[+\-].*/)?i+parseInt(e.substring(1),10):e.match(/[+\-].*/)?c+parseInt(e,10):parseInt(e,10);return isNaN(t)?c:t},f=p(d[0]),m=Math.max(f,p(d[1]||"")),f=s?Math.max(f,s.getFullYear()):f,m=n?Math.min(m,n.getFullYear()):m,e.yearshtml+="<select class='ui-datepicker-year' data-handler='selectYear' data-event='change'>";m>=f;f++)e.yearshtml+="<option value='"+f+"'"+(f===i?" selected='selected'":"")+">"+f+"</option>";e.yearshtml+="</select>",b+=e.yearshtml,e.yearshtml=null}return b+=this._get(e,"yearSuffix"),y&&(b+=(!a&&g&&v?"":"&#xa0;")+_),b+="</div>"},_adjustInstDate:function(e,t,i){var s=e.drawYear+("Y"===i?t:0),n=e.drawMonth+("M"===i?t:0),a=Math.min(e.selectedDay,this._getDaysInMonth(s,n))+("D"===i?t:0),o=this._restrictMinMax(e,this._daylightSavingAdjust(new Date(s,n,a)));e.selectedDay=o.getDate(),e.drawMonth=e.selectedMonth=o.getMonth(),e.drawYear=e.selectedYear=o.getFullYear(),("M"===i||"Y"===i)&&this._notifyChange(e)},_restrictMinMax:function(e,t){var i=this._getMinMaxDate(e,"min"),s=this._getMinMaxDate(e,"max"),n=i&&i>t?i:t;return s&&n>s?s:n},_notifyChange:function(e){var t=this._get(e,"onChangeMonthYear");t&&t.apply(e.input?e.input[0]:null,[e.selectedYear,e.selectedMonth+1,e])},_getNumberOfMonths:function(e){var t=this._get(e,"numberOfMonths");return null==t?[1,1]:"number"==typeof t?[1,t]:t},_getMinMaxDate:function(e,t){return this._determineDate(e,this._get(e,t+"Date"),null)},_getDaysInMonth:function(e,t){return 32-this._daylightSavingAdjust(new Date(e,t,32)).getDate()},_getFirstDayOfMonth:function(e,t){return new Date(e,t,1).getDay()},_canAdjustMonth:function(e,t,i,s){var n=this._getNumberOfMonths(e),a=this._daylightSavingAdjust(new Date(i,s+(0>t?t:n[0]*n[1]),1));return 0>t&&a.setDate(this._getDaysInMonth(a.getFullYear(),a.getMonth())),this._isInRange(e,a)},_isInRange:function(e,t){var i,s,n=this._getMinMaxDate(e,"min"),a=this._getMinMaxDate(e,"max"),o=null,r=null,h=this._get(e,"yearRange");return h&&(i=h.split(":"),s=(new Date).getFullYear(),o=parseInt(i[0],10),r=parseInt(i[1],10),i[0].match(/[+\-].*/)&&(o+=s),i[1].match(/[+\-].*/)&&(r+=s)),(!n||t.getTime()>=n.getTime())&&(!a||t.getTime()<=a.getTime())&&(!o||t.getFullYear()>=o)&&(!r||r>=t.getFullYear())},_getFormatConfig:function(e){var t=this._get(e,"shortYearCutoff");return t="string"!=typeof t?t:(new Date).getFullYear()%100+parseInt(t,10),{shortYearCutoff:t,dayNamesShort:this._get(e,"dayNamesShort"),dayNames:this._get(e,"dayNames"),monthNamesShort:this._get(e,"monthNamesShort"),monthNames:this._get(e,"monthNames")}},_formatDate:function(e,t,i,s){t||(e.currentDay=e.selectedDay,e.currentMonth=e.selectedMonth,e.currentYear=e.selectedYear);var n=t?"object"==typeof t?t:this._daylightSavingAdjust(new Date(s,i,t)):this._daylightSavingAdjust(new Date(e.currentYear,e.currentMonth,e.currentDay));return this.formatDate(this._get(e,"dateFormat"),n,this._getFormatConfig(e))}}),e.fn.datepicker=function(t){if(!this.length)return this;e.datepicker.initialized||(e(document).mousedown(e.datepicker._checkExternalClick),e.datepicker.initialized=!0),0===e("#"+e.datepicker._mainDivId).length&&e("body").append(e.datepicker.dpDiv);var i=Array.prototype.slice.call(arguments,1);return"string"!=typeof t||"isDisabled"!==t&&"getDate"!==t&&"widget"!==t?"option"===t&&2===arguments.length&&"string"==typeof arguments[1]?e.datepicker["_"+t+"Datepicker"].apply(e.datepicker,[this[0]].concat(i)):this.each(function(){"string"==typeof t?e.datepicker["_"+t+"Datepicker"].apply(e.datepicker,[this].concat(i)):e.datepicker._attachDatepicker(this,t)}):e.datepicker["_"+t+"Datepicker"].apply(e.datepicker,[this[0]].concat(i))},e.datepicker=new n,e.datepicker.initialized=!1,e.datepicker.uuid=(new Date).getTime(),e.datepicker.version="1.11.1",e.datepicker,e.widget("ui.draggable",e.ui.mouse,{version:"1.11.1",widgetEventPrefix:"drag",options:{addClasses:!0,appendTo:"parent",axis:!1,connectToSortable:!1,containment:!1,cursor:"auto",cursorAt:!1,grid:!1,handle:!1,helper:"original",iframeFix:!1,opacity:!1,refreshPositions:!1,revert:!1,revertDuration:500,scope:"default",scroll:!0,scrollSensitivity:20,scrollSpeed:20,snap:!1,snapMode:"both",snapTolerance:20,stack:!1,zIndex:!1,drag:null,start:null,stop:null},_create:function(){"original"!==this.options.helper||/^(?:r|a|f)/.test(this.element.css("position"))||(this.element[0].style.position="relative"),this.options.addClasses&&this.element.addClass("ui-draggable"),this.options.disabled&&this.element.addClass("ui-draggable-disabled"),this._setHandleClassName(),this._mouseInit()},_setOption:function(e,t){this._super(e,t),"handle"===e&&(this._removeHandleClassName(),this._setHandleClassName())},_destroy:function(){return(this.helper||this.element).is(".ui-draggable-dragging")?(this.destroyOnClear=!0,void 0):(this.element.removeClass("ui-draggable ui-draggable-dragging ui-draggable-disabled"),this._removeHandleClassName(),this._mouseDestroy(),void 0)},_mouseCapture:function(t){var i=this.document[0],s=this.options;try{i.activeElement&&"body"!==i.activeElement.nodeName.toLowerCase()&&e(i.activeElement).blur()}catch(n){}return this.helper||s.disabled||e(t.target).closest(".ui-resizable-handle").length>0?!1:(this.handle=this._getHandle(t),this.handle?(e(s.iframeFix===!0?"iframe":s.iframeFix).each(function(){e("<div class='ui-draggable-iframeFix' style='background: #fff;'></div>").css({width:this.offsetWidth+"px",height:this.offsetHeight+"px",position:"absolute",opacity:"0.001",zIndex:1e3}).css(e(this).offset()).appendTo("body")}),!0):!1)},_mouseStart:function(t){var i=this.options;return this.helper=this._createHelper(t),this.helper.addClass("ui-draggable-dragging"),this._cacheHelperProportions(),e.ui.ddmanager&&(e.ui.ddmanager.current=this),this._cacheMargins(),this.cssPosition=this.helper.css("position"),this.scrollParent=this.helper.scrollParent(!0),this.offsetParent=this.helper.offsetParent(),this.offsetParentCssPosition=this.offsetParent.css("position"),this.offset=this.positionAbs=this.element.offset(),this.offset={top:this.offset.top-this.margins.top,left:this.offset.left-this.margins.left},this.offset.scroll=!1,e.extend(this.offset,{click:{left:t.pageX-this.offset.left,top:t.pageY-this.offset.top},parent:this._getParentOffset(),relative:this._getRelativeOffset()}),this.originalPosition=this.position=this._generatePosition(t,!1),this.originalPageX=t.pageX,this.originalPageY=t.pageY,i.cursorAt&&this._adjustOffsetFromHelper(i.cursorAt),this._setContainment(),this._trigger("start",t)===!1?(this._clear(),!1):(this._cacheHelperProportions(),e.ui.ddmanager&&!i.dropBehaviour&&e.ui.ddmanager.prepareOffsets(this,t),this._mouseDrag(t,!0),e.ui.ddmanager&&e.ui.ddmanager.dragStart(this,t),!0)},_mouseDrag:function(t,i){if("fixed"===this.offsetParentCssPosition&&(this.offset.parent=this._getParentOffset()),this.position=this._generatePosition(t,!0),this.positionAbs=this._convertPositionTo("absolute"),!i){var s=this._uiHash();if(this._trigger("drag",t,s)===!1)return this._mouseUp({}),!1;this.position=s.position}return this.helper[0].style.left=this.position.left+"px",this.helper[0].style.top=this.position.top+"px",e.ui.ddmanager&&e.ui.ddmanager.drag(this,t),!1},_mouseStop:function(t){var i=this,s=!1;return e.ui.ddmanager&&!this.options.dropBehaviour&&(s=e.ui.ddmanager.drop(this,t)),this.dropped&&(s=this.dropped,this.dropped=!1),"invalid"===this.options.revert&&!s||"valid"===this.options.revert&&s||this.options.revert===!0||e.isFunction(this.options.revert)&&this.options.revert.call(this.element,s)?e(this.helper).animate(this.originalPosition,parseInt(this.options.revertDuration,10),function(){i._trigger("stop",t)!==!1&&i._clear()}):this._trigger("stop",t)!==!1&&this._clear(),!1},_mouseUp:function(t){return e("div.ui-draggable-iframeFix").each(function(){this.parentNode.removeChild(this)}),e.ui.ddmanager&&e.ui.ddmanager.dragStop(this,t),this.element.focus(),e.ui.mouse.prototype._mouseUp.call(this,t)},cancel:function(){return this.helper.is(".ui-draggable-dragging")?this._mouseUp({}):this._clear(),this},_getHandle:function(t){return this.options.handle?!!e(t.target).closest(this.element.find(this.options.handle)).length:!0},_setHandleClassName:function(){this.handleElement=this.options.handle?this.element.find(this.options.handle):this.element,this.handleElement.addClass("ui-draggable-handle")},_removeHandleClassName:function(){this.handleElement.removeClass("ui-draggable-handle")},_createHelper:function(t){var i=this.options,s=e.isFunction(i.helper)?e(i.helper.apply(this.element[0],[t])):"clone"===i.helper?this.element.clone().removeAttr("id"):this.element;return s.parents("body").length||s.appendTo("parent"===i.appendTo?this.element[0].parentNode:i.appendTo),s[0]===this.element[0]||/(fixed|absolute)/.test(s.css("position"))||s.css("position","absolute"),s},_adjustOffsetFromHelper:function(t){"string"==typeof t&&(t=t.split(" ")),e.isArray(t)&&(t={left:+t[0],top:+t[1]||0}),"left"in t&&(this.offset.click.left=t.left+this.margins.left),"right"in t&&(this.offset.click.left=this.helperProportions.width-t.right+this.margins.left),"top"in t&&(this.offset.click.top=t.top+this.margins.top),"bottom"in t&&(this.offset.click.top=this.helperProportions.height-t.bottom+this.margins.top)},_isRootNode:function(e){return/(html|body)/i.test(e.tagName)||e===this.document[0]},_getParentOffset:function(){var t=this.offsetParent.offset(),i=this.document[0];return"absolute"===this.cssPosition&&this.scrollParent[0]!==i&&e.contains(this.scrollParent[0],this.offsetParent[0])&&(t.left+=this.scrollParent.scrollLeft(),t.top+=this.scrollParent.scrollTop()),this._isRootNode(this.offsetParent[0])&&(t={top:0,left:0}),{top:t.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:t.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}},_getRelativeOffset:function(){if("relative"!==this.cssPosition)return{top:0,left:0};var e=this.element.position(),t=this._isRootNode(this.scrollParent[0]);return{top:e.top-(parseInt(this.helper.css("top"),10)||0)+(t?0:this.scrollParent.scrollTop()),left:e.left-(parseInt(this.helper.css("left"),10)||0)+(t?0:this.scrollParent.scrollLeft())}},_cacheMargins:function(){this.margins={left:parseInt(this.element.css("marginLeft"),10)||0,top:parseInt(this.element.css("marginTop"),10)||0,right:parseInt(this.element.css("marginRight"),10)||0,bottom:parseInt(this.element.css("marginBottom"),10)||0}},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}},_setContainment:function(){var t,i,s,n=this.options,a=this.document[0];return this.relativeContainer=null,n.containment?"window"===n.containment?(this.containment=[e(window).scrollLeft()-this.offset.relative.left-this.offset.parent.left,e(window).scrollTop()-this.offset.relative.top-this.offset.parent.top,e(window).scrollLeft()+e(window).width()-this.helperProportions.width-this.margins.left,e(window).scrollTop()+(e(window).height()||a.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top],void 0):"document"===n.containment?(this.containment=[0,0,e(a).width()-this.helperProportions.width-this.margins.left,(e(a).height()||a.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top],void 0):n.containment.constructor===Array?(this.containment=n.containment,void 0):("parent"===n.containment&&(n.containment=this.helper[0].parentNode),i=e(n.containment),s=i[0],s&&(t="hidden"!==i.css("overflow"),this.containment=[(parseInt(i.css("borderLeftWidth"),10)||0)+(parseInt(i.css("paddingLeft"),10)||0),(parseInt(i.css("borderTopWidth"),10)||0)+(parseInt(i.css("paddingTop"),10)||0),(t?Math.max(s.scrollWidth,s.offsetWidth):s.offsetWidth)-(parseInt(i.css("borderRightWidth"),10)||0)-(parseInt(i.css("paddingRight"),10)||0)-this.helperProportions.width-this.margins.left-this.margins.right,(t?Math.max(s.scrollHeight,s.offsetHeight):s.offsetHeight)-(parseInt(i.css("borderBottomWidth"),10)||0)-(parseInt(i.css("paddingBottom"),10)||0)-this.helperProportions.height-this.margins.top-this.margins.bottom],this.relativeContainer=i),void 0):(this.containment=null,void 0)},_convertPositionTo:function(e,t){t||(t=this.position);var i="absolute"===e?1:-1,s=this._isRootNode(this.scrollParent[0]);return{top:t.top+this.offset.relative.top*i+this.offset.parent.top*i-("fixed"===this.cssPosition?-this.offset.scroll.top:s?0:this.offset.scroll.top)*i,left:t.left+this.offset.relative.left*i+this.offset.parent.left*i-("fixed"===this.cssPosition?-this.offset.scroll.left:s?0:this.offset.scroll.left)*i}
},_generatePosition:function(e,t){var i,s,n,a,o=this.options,r=this._isRootNode(this.scrollParent[0]),h=e.pageX,l=e.pageY;return r&&this.offset.scroll||(this.offset.scroll={top:this.scrollParent.scrollTop(),left:this.scrollParent.scrollLeft()}),t&&(this.containment&&(this.relativeContainer?(s=this.relativeContainer.offset(),i=[this.containment[0]+s.left,this.containment[1]+s.top,this.containment[2]+s.left,this.containment[3]+s.top]):i=this.containment,e.pageX-this.offset.click.left<i[0]&&(h=i[0]+this.offset.click.left),e.pageY-this.offset.click.top<i[1]&&(l=i[1]+this.offset.click.top),e.pageX-this.offset.click.left>i[2]&&(h=i[2]+this.offset.click.left),e.pageY-this.offset.click.top>i[3]&&(l=i[3]+this.offset.click.top)),o.grid&&(n=o.grid[1]?this.originalPageY+Math.round((l-this.originalPageY)/o.grid[1])*o.grid[1]:this.originalPageY,l=i?n-this.offset.click.top>=i[1]||n-this.offset.click.top>i[3]?n:n-this.offset.click.top>=i[1]?n-o.grid[1]:n+o.grid[1]:n,a=o.grid[0]?this.originalPageX+Math.round((h-this.originalPageX)/o.grid[0])*o.grid[0]:this.originalPageX,h=i?a-this.offset.click.left>=i[0]||a-this.offset.click.left>i[2]?a:a-this.offset.click.left>=i[0]?a-o.grid[0]:a+o.grid[0]:a),"y"===o.axis&&(h=this.originalPageX),"x"===o.axis&&(l=this.originalPageY)),{top:l-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+("fixed"===this.cssPosition?-this.offset.scroll.top:r?0:this.offset.scroll.top),left:h-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+("fixed"===this.cssPosition?-this.offset.scroll.left:r?0:this.offset.scroll.left)}},_clear:function(){this.helper.removeClass("ui-draggable-dragging"),this.helper[0]===this.element[0]||this.cancelHelperRemoval||this.helper.remove(),this.helper=null,this.cancelHelperRemoval=!1,this.destroyOnClear&&this.destroy()},_trigger:function(t,i,s){return s=s||this._uiHash(),e.ui.plugin.call(this,t,[i,s,this],!0),"drag"===t&&(this.positionAbs=this._convertPositionTo("absolute")),e.Widget.prototype._trigger.call(this,t,i,s)},plugins:{},_uiHash:function(){return{helper:this.helper,position:this.position,originalPosition:this.originalPosition,offset:this.positionAbs}}}),e.ui.plugin.add("draggable","connectToSortable",{start:function(t,i,s){var n=s.options,a=e.extend({},i,{item:s.element});s.sortables=[],e(n.connectToSortable).each(function(){var i=e(this).sortable("instance");i&&!i.options.disabled&&(s.sortables.push({instance:i,shouldRevert:i.options.revert}),i.refreshPositions(),i._trigger("activate",t,a))})},stop:function(t,i,s){var n=e.extend({},i,{item:s.element});e.each(s.sortables,function(){this.instance.isOver?(this.instance.isOver=0,s.cancelHelperRemoval=!0,this.instance.cancelHelperRemoval=!1,this.shouldRevert&&(this.instance.options.revert=this.shouldRevert),this.instance._mouseStop(t),this.instance.options.helper=this.instance.options._helper,"original"===s.options.helper&&this.instance.currentItem.css({top:"auto",left:"auto"})):(this.instance.cancelHelperRemoval=!1,this.instance._trigger("deactivate",t,n))})},drag:function(t,i,s){var n=this;e.each(s.sortables,function(){var a=!1,o=this;this.instance.positionAbs=s.positionAbs,this.instance.helperProportions=s.helperProportions,this.instance.offset.click=s.offset.click,this.instance._intersectsWith(this.instance.containerCache)&&(a=!0,e.each(s.sortables,function(){return this.instance.positionAbs=s.positionAbs,this.instance.helperProportions=s.helperProportions,this.instance.offset.click=s.offset.click,this!==o&&this.instance._intersectsWith(this.instance.containerCache)&&e.contains(o.instance.element[0],this.instance.element[0])&&(a=!1),a})),a?(this.instance.isOver||(this.instance.isOver=1,this.instance.currentItem=e(n).clone().removeAttr("id").appendTo(this.instance.element).data("ui-sortable-item",!0),this.instance.options._helper=this.instance.options.helper,this.instance.options.helper=function(){return i.helper[0]},t.target=this.instance.currentItem[0],this.instance._mouseCapture(t,!0),this.instance._mouseStart(t,!0,!0),this.instance.offset.click.top=s.offset.click.top,this.instance.offset.click.left=s.offset.click.left,this.instance.offset.parent.left-=s.offset.parent.left-this.instance.offset.parent.left,this.instance.offset.parent.top-=s.offset.parent.top-this.instance.offset.parent.top,s._trigger("toSortable",t),s.dropped=this.instance.element,s.currentItem=s.element,this.instance.fromOutside=s),this.instance.currentItem&&this.instance._mouseDrag(t)):this.instance.isOver&&(this.instance.isOver=0,this.instance.cancelHelperRemoval=!0,this.instance.options.revert=!1,this.instance._trigger("out",t,this.instance._uiHash(this.instance)),this.instance._mouseStop(t,!0),this.instance.options.helper=this.instance.options._helper,this.instance.currentItem.remove(),this.instance.placeholder&&this.instance.placeholder.remove(),s._trigger("fromSortable",t),s.dropped=!1)})}}),e.ui.plugin.add("draggable","cursor",{start:function(t,i,s){var n=e("body"),a=s.options;n.css("cursor")&&(a._cursor=n.css("cursor")),n.css("cursor",a.cursor)},stop:function(t,i,s){var n=s.options;n._cursor&&e("body").css("cursor",n._cursor)}}),e.ui.plugin.add("draggable","opacity",{start:function(t,i,s){var n=e(i.helper),a=s.options;n.css("opacity")&&(a._opacity=n.css("opacity")),n.css("opacity",a.opacity)},stop:function(t,i,s){var n=s.options;n._opacity&&e(i.helper).css("opacity",n._opacity)}}),e.ui.plugin.add("draggable","scroll",{start:function(e,t,i){i.scrollParentNotHidden||(i.scrollParentNotHidden=i.helper.scrollParent(!1)),i.scrollParentNotHidden[0]!==i.document[0]&&"HTML"!==i.scrollParentNotHidden[0].tagName&&(i.overflowOffset=i.scrollParentNotHidden.offset())},drag:function(t,i,s){var n=s.options,a=!1,o=s.scrollParentNotHidden[0],r=s.document[0];o!==r&&"HTML"!==o.tagName?(n.axis&&"x"===n.axis||(s.overflowOffset.top+o.offsetHeight-t.pageY<n.scrollSensitivity?o.scrollTop=a=o.scrollTop+n.scrollSpeed:t.pageY-s.overflowOffset.top<n.scrollSensitivity&&(o.scrollTop=a=o.scrollTop-n.scrollSpeed)),n.axis&&"y"===n.axis||(s.overflowOffset.left+o.offsetWidth-t.pageX<n.scrollSensitivity?o.scrollLeft=a=o.scrollLeft+n.scrollSpeed:t.pageX-s.overflowOffset.left<n.scrollSensitivity&&(o.scrollLeft=a=o.scrollLeft-n.scrollSpeed))):(n.axis&&"x"===n.axis||(t.pageY-e(r).scrollTop()<n.scrollSensitivity?a=e(r).scrollTop(e(r).scrollTop()-n.scrollSpeed):e(window).height()-(t.pageY-e(r).scrollTop())<n.scrollSensitivity&&(a=e(r).scrollTop(e(r).scrollTop()+n.scrollSpeed))),n.axis&&"y"===n.axis||(t.pageX-e(r).scrollLeft()<n.scrollSensitivity?a=e(r).scrollLeft(e(r).scrollLeft()-n.scrollSpeed):e(window).width()-(t.pageX-e(r).scrollLeft())<n.scrollSensitivity&&(a=e(r).scrollLeft(e(r).scrollLeft()+n.scrollSpeed)))),a!==!1&&e.ui.ddmanager&&!n.dropBehaviour&&e.ui.ddmanager.prepareOffsets(s,t)}}),e.ui.plugin.add("draggable","snap",{start:function(t,i,s){var n=s.options;s.snapElements=[],e(n.snap.constructor!==String?n.snap.items||":data(ui-draggable)":n.snap).each(function(){var t=e(this),i=t.offset();this!==s.element[0]&&s.snapElements.push({item:this,width:t.outerWidth(),height:t.outerHeight(),top:i.top,left:i.left})})},drag:function(t,i,s){var n,a,o,r,h,l,u,d,c,p,f=s.options,m=f.snapTolerance,g=i.offset.left,v=g+s.helperProportions.width,y=i.offset.top,b=y+s.helperProportions.height;for(c=s.snapElements.length-1;c>=0;c--)h=s.snapElements[c].left,l=h+s.snapElements[c].width,u=s.snapElements[c].top,d=u+s.snapElements[c].height,h-m>v||g>l+m||u-m>b||y>d+m||!e.contains(s.snapElements[c].item.ownerDocument,s.snapElements[c].item)?(s.snapElements[c].snapping&&s.options.snap.release&&s.options.snap.release.call(s.element,t,e.extend(s._uiHash(),{snapItem:s.snapElements[c].item})),s.snapElements[c].snapping=!1):("inner"!==f.snapMode&&(n=m>=Math.abs(u-b),a=m>=Math.abs(d-y),o=m>=Math.abs(h-v),r=m>=Math.abs(l-g),n&&(i.position.top=s._convertPositionTo("relative",{top:u-s.helperProportions.height,left:0}).top-s.margins.top),a&&(i.position.top=s._convertPositionTo("relative",{top:d,left:0}).top-s.margins.top),o&&(i.position.left=s._convertPositionTo("relative",{top:0,left:h-s.helperProportions.width}).left-s.margins.left),r&&(i.position.left=s._convertPositionTo("relative",{top:0,left:l}).left-s.margins.left)),p=n||a||o||r,"outer"!==f.snapMode&&(n=m>=Math.abs(u-y),a=m>=Math.abs(d-b),o=m>=Math.abs(h-g),r=m>=Math.abs(l-v),n&&(i.position.top=s._convertPositionTo("relative",{top:u,left:0}).top-s.margins.top),a&&(i.position.top=s._convertPositionTo("relative",{top:d-s.helperProportions.height,left:0}).top-s.margins.top),o&&(i.position.left=s._convertPositionTo("relative",{top:0,left:h}).left-s.margins.left),r&&(i.position.left=s._convertPositionTo("relative",{top:0,left:l-s.helperProportions.width}).left-s.margins.left)),!s.snapElements[c].snapping&&(n||a||o||r||p)&&s.options.snap.snap&&s.options.snap.snap.call(s.element,t,e.extend(s._uiHash(),{snapItem:s.snapElements[c].item})),s.snapElements[c].snapping=n||a||o||r||p)}}),e.ui.plugin.add("draggable","stack",{start:function(t,i,s){var n,a=s.options,o=e.makeArray(e(a.stack)).sort(function(t,i){return(parseInt(e(t).css("zIndex"),10)||0)-(parseInt(e(i).css("zIndex"),10)||0)});o.length&&(n=parseInt(e(o[0]).css("zIndex"),10)||0,e(o).each(function(t){e(this).css("zIndex",n+t)}),this.css("zIndex",n+o.length))}}),e.ui.plugin.add("draggable","zIndex",{start:function(t,i,s){var n=e(i.helper),a=s.options;n.css("zIndex")&&(a._zIndex=n.css("zIndex")),n.css("zIndex",a.zIndex)},stop:function(t,i,s){var n=s.options;n._zIndex&&e(i.helper).css("zIndex",n._zIndex)}}),e.ui.draggable,e.widget("ui.resizable",e.ui.mouse,{version:"1.11.1",widgetEventPrefix:"resize",options:{alsoResize:!1,animate:!1,animateDuration:"slow",animateEasing:"swing",aspectRatio:!1,autoHide:!1,containment:!1,ghost:!1,grid:!1,handles:"e,s,se",helper:!1,maxHeight:null,maxWidth:null,minHeight:10,minWidth:10,zIndex:90,resize:null,start:null,stop:null},_num:function(e){return parseInt(e,10)||0},_isNumber:function(e){return!isNaN(parseInt(e,10))},_hasScroll:function(t,i){if("hidden"===e(t).css("overflow"))return!1;var s=i&&"left"===i?"scrollLeft":"scrollTop",n=!1;return t[s]>0?!0:(t[s]=1,n=t[s]>0,t[s]=0,n)},_create:function(){var t,i,s,n,a,o=this,r=this.options;if(this.element.addClass("ui-resizable"),e.extend(this,{_aspectRatio:!!r.aspectRatio,aspectRatio:r.aspectRatio,originalElement:this.element,_proportionallyResizeElements:[],_helper:r.helper||r.ghost||r.animate?r.helper||"ui-resizable-helper":null}),this.element[0].nodeName.match(/canvas|textarea|input|select|button|img/i)&&(this.element.wrap(e("<div class='ui-wrapper' style='overflow: hidden;'></div>").css({position:this.element.css("position"),width:this.element.outerWidth(),height:this.element.outerHeight(),top:this.element.css("top"),left:this.element.css("left")})),this.element=this.element.parent().data("ui-resizable",this.element.resizable("instance")),this.elementIsWrapper=!0,this.element.css({marginLeft:this.originalElement.css("marginLeft"),marginTop:this.originalElement.css("marginTop"),marginRight:this.originalElement.css("marginRight"),marginBottom:this.originalElement.css("marginBottom")}),this.originalElement.css({marginLeft:0,marginTop:0,marginRight:0,marginBottom:0}),this.originalResizeStyle=this.originalElement.css("resize"),this.originalElement.css("resize","none"),this._proportionallyResizeElements.push(this.originalElement.css({position:"static",zoom:1,display:"block"})),this.originalElement.css({margin:this.originalElement.css("margin")}),this._proportionallyResize()),this.handles=r.handles||(e(".ui-resizable-handle",this.element).length?{n:".ui-resizable-n",e:".ui-resizable-e",s:".ui-resizable-s",w:".ui-resizable-w",se:".ui-resizable-se",sw:".ui-resizable-sw",ne:".ui-resizable-ne",nw:".ui-resizable-nw"}:"e,s,se"),this.handles.constructor===String)for("all"===this.handles&&(this.handles="n,e,s,w,se,sw,ne,nw"),t=this.handles.split(","),this.handles={},i=0;t.length>i;i++)s=e.trim(t[i]),a="ui-resizable-"+s,n=e("<div class='ui-resizable-handle "+a+"'></div>"),n.css({zIndex:r.zIndex}),"se"===s&&n.addClass("ui-icon ui-icon-gripsmall-diagonal-se"),this.handles[s]=".ui-resizable-"+s,this.element.append(n);this._renderAxis=function(t){var i,s,n,a;t=t||this.element;for(i in this.handles)this.handles[i].constructor===String&&(this.handles[i]=this.element.children(this.handles[i]).first().show()),this.elementIsWrapper&&this.originalElement[0].nodeName.match(/textarea|input|select|button/i)&&(s=e(this.handles[i],this.element),a=/sw|ne|nw|se|n|s/.test(i)?s.outerHeight():s.outerWidth(),n=["padding",/ne|nw|n/.test(i)?"Top":/se|sw|s/.test(i)?"Bottom":/^e$/.test(i)?"Right":"Left"].join(""),t.css(n,a),this._proportionallyResize()),e(this.handles[i]).length},this._renderAxis(this.element),this._handles=e(".ui-resizable-handle",this.element).disableSelection(),this._handles.mouseover(function(){o.resizing||(this.className&&(n=this.className.match(/ui-resizable-(se|sw|ne|nw|n|e|s|w)/i)),o.axis=n&&n[1]?n[1]:"se")}),r.autoHide&&(this._handles.hide(),e(this.element).addClass("ui-resizable-autohide").mouseenter(function(){r.disabled||(e(this).removeClass("ui-resizable-autohide"),o._handles.show())}).mouseleave(function(){r.disabled||o.resizing||(e(this).addClass("ui-resizable-autohide"),o._handles.hide())})),this._mouseInit()},_destroy:function(){this._mouseDestroy();var t,i=function(t){e(t).removeClass("ui-resizable ui-resizable-disabled ui-resizable-resizing").removeData("resizable").removeData("ui-resizable").unbind(".resizable").find(".ui-resizable-handle").remove()};return this.elementIsWrapper&&(i(this.element),t=this.element,this.originalElement.css({position:t.css("position"),width:t.outerWidth(),height:t.outerHeight(),top:t.css("top"),left:t.css("left")}).insertAfter(t),t.remove()),this.originalElement.css("resize",this.originalResizeStyle),i(this.originalElement),this},_mouseCapture:function(t){var i,s,n=!1;for(i in this.handles)s=e(this.handles[i])[0],(s===t.target||e.contains(s,t.target))&&(n=!0);return!this.options.disabled&&n},_mouseStart:function(t){var i,s,n,a=this.options,o=this.element;return this.resizing=!0,this._renderProxy(),i=this._num(this.helper.css("left")),s=this._num(this.helper.css("top")),a.containment&&(i+=e(a.containment).scrollLeft()||0,s+=e(a.containment).scrollTop()||0),this.offset=this.helper.offset(),this.position={left:i,top:s},this.size=this._helper?{width:this.helper.width(),height:this.helper.height()}:{width:o.width(),height:o.height()},this.originalSize=this._helper?{width:o.outerWidth(),height:o.outerHeight()}:{width:o.width(),height:o.height()},this.sizeDiff={width:o.outerWidth()-o.width(),height:o.outerHeight()-o.height()},this.originalPosition={left:i,top:s},this.originalMousePosition={left:t.pageX,top:t.pageY},this.aspectRatio="number"==typeof a.aspectRatio?a.aspectRatio:this.originalSize.width/this.originalSize.height||1,n=e(".ui-resizable-"+this.axis).css("cursor"),e("body").css("cursor","auto"===n?this.axis+"-resize":n),o.addClass("ui-resizable-resizing"),this._propagate("start",t),!0},_mouseDrag:function(t){var i,s,n=this.originalMousePosition,a=this.axis,o=t.pageX-n.left||0,r=t.pageY-n.top||0,h=this._change[a];return this._updatePrevProperties(),h?(i=h.apply(this,[t,o,r]),this._updateVirtualBoundaries(t.shiftKey),(this._aspectRatio||t.shiftKey)&&(i=this._updateRatio(i,t)),i=this._respectSize(i,t),this._updateCache(i),this._propagate("resize",t),s=this._applyChanges(),!this._helper&&this._proportionallyResizeElements.length&&this._proportionallyResize(),e.isEmptyObject(s)||(this._updatePrevProperties(),this._trigger("resize",t,this.ui()),this._applyChanges()),!1):!1},_mouseStop:function(t){this.resizing=!1;var i,s,n,a,o,r,h,l=this.options,u=this;return this._helper&&(i=this._proportionallyResizeElements,s=i.length&&/textarea/i.test(i[0].nodeName),n=s&&this._hasScroll(i[0],"left")?0:u.sizeDiff.height,a=s?0:u.sizeDiff.width,o={width:u.helper.width()-a,height:u.helper.height()-n},r=parseInt(u.element.css("left"),10)+(u.position.left-u.originalPosition.left)||null,h=parseInt(u.element.css("top"),10)+(u.position.top-u.originalPosition.top)||null,l.animate||this.element.css(e.extend(o,{top:h,left:r})),u.helper.height(u.size.height),u.helper.width(u.size.width),this._helper&&!l.animate&&this._proportionallyResize()),e("body").css("cursor","auto"),this.element.removeClass("ui-resizable-resizing"),this._propagate("stop",t),this._helper&&this.helper.remove(),!1},_updatePrevProperties:function(){this.prevPosition={top:this.position.top,left:this.position.left},this.prevSize={width:this.size.width,height:this.size.height}},_applyChanges:function(){var e={};return this.position.top!==this.prevPosition.top&&(e.top=this.position.top+"px"),this.position.left!==this.prevPosition.left&&(e.left=this.position.left+"px"),this.size.width!==this.prevSize.width&&(e.width=this.size.width+"px"),this.size.height!==this.prevSize.height&&(e.height=this.size.height+"px"),this.helper.css(e),e},_updateVirtualBoundaries:function(e){var t,i,s,n,a,o=this.options;a={minWidth:this._isNumber(o.minWidth)?o.minWidth:0,maxWidth:this._isNumber(o.maxWidth)?o.maxWidth:1/0,minHeight:this._isNumber(o.minHeight)?o.minHeight:0,maxHeight:this._isNumber(o.maxHeight)?o.maxHeight:1/0},(this._aspectRatio||e)&&(t=a.minHeight*this.aspectRatio,s=a.minWidth/this.aspectRatio,i=a.maxHeight*this.aspectRatio,n=a.maxWidth/this.aspectRatio,t>a.minWidth&&(a.minWidth=t),s>a.minHeight&&(a.minHeight=s),a.maxWidth>i&&(a.maxWidth=i),a.maxHeight>n&&(a.maxHeight=n)),this._vBoundaries=a},_updateCache:function(e){this.offset=this.helper.offset(),this._isNumber(e.left)&&(this.position.left=e.left),this._isNumber(e.top)&&(this.position.top=e.top),this._isNumber(e.height)&&(this.size.height=e.height),this._isNumber(e.width)&&(this.size.width=e.width)},_updateRatio:function(e){var t=this.position,i=this.size,s=this.axis;return this._isNumber(e.height)?e.width=e.height*this.aspectRatio:this._isNumber(e.width)&&(e.height=e.width/this.aspectRatio),"sw"===s&&(e.left=t.left+(i.width-e.width),e.top=null),"nw"===s&&(e.top=t.top+(i.height-e.height),e.left=t.left+(i.width-e.width)),e},_respectSize:function(e){var t=this._vBoundaries,i=this.axis,s=this._isNumber(e.width)&&t.maxWidth&&t.maxWidth<e.width,n=this._isNumber(e.height)&&t.maxHeight&&t.maxHeight<e.height,a=this._isNumber(e.width)&&t.minWidth&&t.minWidth>e.width,o=this._isNumber(e.height)&&t.minHeight&&t.minHeight>e.height,r=this.originalPosition.left+this.originalSize.width,h=this.position.top+this.size.height,l=/sw|nw|w/.test(i),u=/nw|ne|n/.test(i);return a&&(e.width=t.minWidth),o&&(e.height=t.minHeight),s&&(e.width=t.maxWidth),n&&(e.height=t.maxHeight),a&&l&&(e.left=r-t.minWidth),s&&l&&(e.left=r-t.maxWidth),o&&u&&(e.top=h-t.minHeight),n&&u&&(e.top=h-t.maxHeight),e.width||e.height||e.left||!e.top?e.width||e.height||e.top||!e.left||(e.left=null):e.top=null,e},_getPaddingPlusBorderDimensions:function(e){for(var t=0,i=[],s=[e.css("borderTopWidth"),e.css("borderRightWidth"),e.css("borderBottomWidth"),e.css("borderLeftWidth")],n=[e.css("paddingTop"),e.css("paddingRight"),e.css("paddingBottom"),e.css("paddingLeft")];4>t;t++)i[t]=parseInt(s[t],10)||0,i[t]+=parseInt(n[t],10)||0;return{height:i[0]+i[2],width:i[1]+i[3]}},_proportionallyResize:function(){if(this._proportionallyResizeElements.length)for(var e,t=0,i=this.helper||this.element;this._proportionallyResizeElements.length>t;t++)e=this._proportionallyResizeElements[t],this.outerDimensions||(this.outerDimensions=this._getPaddingPlusBorderDimensions(e)),e.css({height:i.height()-this.outerDimensions.height||0,width:i.width()-this.outerDimensions.width||0})},_renderProxy:function(){var t=this.element,i=this.options;this.elementOffset=t.offset(),this._helper?(this.helper=this.helper||e("<div style='overflow:hidden;'></div>"),this.helper.addClass(this._helper).css({width:this.element.outerWidth()-1,height:this.element.outerHeight()-1,position:"absolute",left:this.elementOffset.left+"px",top:this.elementOffset.top+"px",zIndex:++i.zIndex}),this.helper.appendTo("body").disableSelection()):this.helper=this.element},_change:{e:function(e,t){return{width:this.originalSize.width+t}},w:function(e,t){var i=this.originalSize,s=this.originalPosition;return{left:s.left+t,width:i.width-t}},n:function(e,t,i){var s=this.originalSize,n=this.originalPosition;return{top:n.top+i,height:s.height-i}},s:function(e,t,i){return{height:this.originalSize.height+i}},se:function(t,i,s){return e.extend(this._change.s.apply(this,arguments),this._change.e.apply(this,[t,i,s]))},sw:function(t,i,s){return e.extend(this._change.s.apply(this,arguments),this._change.w.apply(this,[t,i,s]))},ne:function(t,i,s){return e.extend(this._change.n.apply(this,arguments),this._change.e.apply(this,[t,i,s]))},nw:function(t,i,s){return e.extend(this._change.n.apply(this,arguments),this._change.w.apply(this,[t,i,s]))}},_propagate:function(t,i){e.ui.plugin.call(this,t,[i,this.ui()]),"resize"!==t&&this._trigger(t,i,this.ui())},plugins:{},ui:function(){return{originalElement:this.originalElement,element:this.element,helper:this.helper,position:this.position,size:this.size,originalSize:this.originalSize,originalPosition:this.originalPosition}}}),e.ui.plugin.add("resizable","animate",{stop:function(t){var i=e(this).resizable("instance"),s=i.options,n=i._proportionallyResizeElements,a=n.length&&/textarea/i.test(n[0].nodeName),o=a&&i._hasScroll(n[0],"left")?0:i.sizeDiff.height,r=a?0:i.sizeDiff.width,h={width:i.size.width-r,height:i.size.height-o},l=parseInt(i.element.css("left"),10)+(i.position.left-i.originalPosition.left)||null,u=parseInt(i.element.css("top"),10)+(i.position.top-i.originalPosition.top)||null;i.element.animate(e.extend(h,u&&l?{top:u,left:l}:{}),{duration:s.animateDuration,easing:s.animateEasing,step:function(){var s={width:parseInt(i.element.css("width"),10),height:parseInt(i.element.css("height"),10),top:parseInt(i.element.css("top"),10),left:parseInt(i.element.css("left"),10)};n&&n.length&&e(n[0]).css({width:s.width,height:s.height}),i._updateCache(s),i._propagate("resize",t)}})}}),e.ui.plugin.add("resizable","containment",{start:function(){var t,i,s,n,a,o,r,h=e(this).resizable("instance"),l=h.options,u=h.element,d=l.containment,c=d instanceof e?d.get(0):/parent/.test(d)?u.parent().get(0):d;c&&(h.containerElement=e(c),/document/.test(d)||d===document?(h.containerOffset={left:0,top:0},h.containerPosition={left:0,top:0},h.parentData={element:e(document),left:0,top:0,width:e(document).width(),height:e(document).height()||document.body.parentNode.scrollHeight}):(t=e(c),i=[],e(["Top","Right","Left","Bottom"]).each(function(e,s){i[e]=h._num(t.css("padding"+s))}),h.containerOffset=t.offset(),h.containerPosition=t.position(),h.containerSize={height:t.innerHeight()-i[3],width:t.innerWidth()-i[1]},s=h.containerOffset,n=h.containerSize.height,a=h.containerSize.width,o=h._hasScroll(c,"left")?c.scrollWidth:a,r=h._hasScroll(c)?c.scrollHeight:n,h.parentData={element:c,left:s.left,top:s.top,width:o,height:r}))},resize:function(t){var i,s,n,a,o=e(this).resizable("instance"),r=o.options,h=o.containerOffset,l=o.position,u=o._aspectRatio||t.shiftKey,d={top:0,left:0},c=o.containerElement,p=!0;c[0]!==document&&/static/.test(c.css("position"))&&(d=h),l.left<(o._helper?h.left:0)&&(o.size.width=o.size.width+(o._helper?o.position.left-h.left:o.position.left-d.left),u&&(o.size.height=o.size.width/o.aspectRatio,p=!1),o.position.left=r.helper?h.left:0),l.top<(o._helper?h.top:0)&&(o.size.height=o.size.height+(o._helper?o.position.top-h.top:o.position.top),u&&(o.size.width=o.size.height*o.aspectRatio,p=!1),o.position.top=o._helper?h.top:0),n=o.containerElement.get(0)===o.element.parent().get(0),a=/relative|absolute/.test(o.containerElement.css("position")),n&&a?(o.offset.left=o.parentData.left+o.position.left,o.offset.top=o.parentData.top+o.position.top):(o.offset.left=o.element.offset().left,o.offset.top=o.element.offset().top),i=Math.abs(o.sizeDiff.width+(o._helper?o.offset.left-d.left:o.offset.left-h.left)),s=Math.abs(o.sizeDiff.height+(o._helper?o.offset.top-d.top:o.offset.top-h.top)),i+o.size.width>=o.parentData.width&&(o.size.width=o.parentData.width-i,u&&(o.size.height=o.size.width/o.aspectRatio,p=!1)),s+o.size.height>=o.parentData.height&&(o.size.height=o.parentData.height-s,u&&(o.size.width=o.size.height*o.aspectRatio,p=!1)),p||(o.position.left=o.prevPosition.left,o.position.top=o.prevPosition.top,o.size.width=o.prevSize.width,o.size.height=o.prevSize.height)},stop:function(){var t=e(this).resizable("instance"),i=t.options,s=t.containerOffset,n=t.containerPosition,a=t.containerElement,o=e(t.helper),r=o.offset(),h=o.outerWidth()-t.sizeDiff.width,l=o.outerHeight()-t.sizeDiff.height;t._helper&&!i.animate&&/relative/.test(a.css("position"))&&e(this).css({left:r.left-n.left-s.left,width:h,height:l}),t._helper&&!i.animate&&/static/.test(a.css("position"))&&e(this).css({left:r.left-n.left-s.left,width:h,height:l})}}),e.ui.plugin.add("resizable","alsoResize",{start:function(){var t=e(this).resizable("instance"),i=t.options,s=function(t){e(t).each(function(){var t=e(this);t.data("ui-resizable-alsoresize",{width:parseInt(t.width(),10),height:parseInt(t.height(),10),left:parseInt(t.css("left"),10),top:parseInt(t.css("top"),10)})})};"object"!=typeof i.alsoResize||i.alsoResize.parentNode?s(i.alsoResize):i.alsoResize.length?(i.alsoResize=i.alsoResize[0],s(i.alsoResize)):e.each(i.alsoResize,function(e){s(e)})},resize:function(t,i){var s=e(this).resizable("instance"),n=s.options,a=s.originalSize,o=s.originalPosition,r={height:s.size.height-a.height||0,width:s.size.width-a.width||0,top:s.position.top-o.top||0,left:s.position.left-o.left||0},h=function(t,s){e(t).each(function(){var t=e(this),n=e(this).data("ui-resizable-alsoresize"),a={},o=s&&s.length?s:t.parents(i.originalElement[0]).length?["width","height"]:["width","height","top","left"];e.each(o,function(e,t){var i=(n[t]||0)+(r[t]||0);i&&i>=0&&(a[t]=i||null)}),t.css(a)})};"object"!=typeof n.alsoResize||n.alsoResize.nodeType?h(n.alsoResize):e.each(n.alsoResize,function(e,t){h(e,t)})},stop:function(){e(this).removeData("resizable-alsoresize")}}),e.ui.plugin.add("resizable","ghost",{start:function(){var t=e(this).resizable("instance"),i=t.options,s=t.size;t.ghost=t.originalElement.clone(),t.ghost.css({opacity:.25,display:"block",position:"relative",height:s.height,width:s.width,margin:0,left:0,top:0}).addClass("ui-resizable-ghost").addClass("string"==typeof i.ghost?i.ghost:""),t.ghost.appendTo(t.helper)},resize:function(){var t=e(this).resizable("instance");t.ghost&&t.ghost.css({position:"relative",height:t.size.height,width:t.size.width})},stop:function(){var t=e(this).resizable("instance");t.ghost&&t.helper&&t.helper.get(0).removeChild(t.ghost.get(0))}}),e.ui.plugin.add("resizable","grid",{resize:function(){var t,i=e(this).resizable("instance"),s=i.options,n=i.size,a=i.originalSize,o=i.originalPosition,r=i.axis,h="number"==typeof s.grid?[s.grid,s.grid]:s.grid,l=h[0]||1,u=h[1]||1,d=Math.round((n.width-a.width)/l)*l,c=Math.round((n.height-a.height)/u)*u,p=a.width+d,f=a.height+c,m=s.maxWidth&&p>s.maxWidth,g=s.maxHeight&&f>s.maxHeight,v=s.minWidth&&s.minWidth>p,y=s.minHeight&&s.minHeight>f;s.grid=h,v&&(p+=l),y&&(f+=u),m&&(p-=l),g&&(f-=u),/^(se|s|e)$/.test(r)?(i.size.width=p,i.size.height=f):/^(ne)$/.test(r)?(i.size.width=p,i.size.height=f,i.position.top=o.top-c):/^(sw)$/.test(r)?(i.size.width=p,i.size.height=f,i.position.left=o.left-d):((0>=f-u||0>=p-l)&&(t=i._getPaddingPlusBorderDimensions(this)),f-u>0?(i.size.height=f,i.position.top=o.top-c):(f=u-t.height,i.size.height=f,i.position.top=o.top+a.height-f),p-l>0?(i.size.width=p,i.position.left=o.left-d):(p=u-t.height,i.size.width=p,i.position.left=o.left+a.width-p))}}),e.ui.resizable,e.widget("ui.dialog",{version:"1.11.1",options:{appendTo:"body",autoOpen:!0,buttons:[],closeOnEscape:!0,closeText:"Close",dialogClass:"",draggable:!0,hide:null,height:"auto",maxHeight:null,maxWidth:null,minHeight:150,minWidth:150,modal:!1,position:{my:"center",at:"center",of:window,collision:"fit",using:function(t){var i=e(this).css(t).offset().top;0>i&&e(this).css("top",t.top-i)}},resizable:!0,show:null,title:null,width:300,beforeClose:null,close:null,drag:null,dragStart:null,dragStop:null,focus:null,open:null,resize:null,resizeStart:null,resizeStop:null},sizeRelatedOptions:{buttons:!0,height:!0,maxHeight:!0,maxWidth:!0,minHeight:!0,minWidth:!0,width:!0},resizableRelatedOptions:{maxHeight:!0,maxWidth:!0,minHeight:!0,minWidth:!0},_create:function(){this.originalCss={display:this.element[0].style.display,width:this.element[0].style.width,minHeight:this.element[0].style.minHeight,maxHeight:this.element[0].style.maxHeight,height:this.element[0].style.height},this.originalPosition={parent:this.element.parent(),index:this.element.parent().children().index(this.element)},this.originalTitle=this.element.attr("title"),this.options.title=this.options.title||this.originalTitle,this._createWrapper(),this.element.show().removeAttr("title").addClass("ui-dialog-content ui-widget-content").appendTo(this.uiDialog),this._createTitlebar(),this._createButtonPane(),this.options.draggable&&e.fn.draggable&&this._makeDraggable(),this.options.resizable&&e.fn.resizable&&this._makeResizable(),this._isOpen=!1,this._trackFocus()},_init:function(){this.options.autoOpen&&this.open()},_appendTo:function(){var t=this.options.appendTo;return t&&(t.jquery||t.nodeType)?e(t):this.document.find(t||"body").eq(0)},_destroy:function(){var e,t=this.originalPosition;this._destroyOverlay(),this.element.removeUniqueId().removeClass("ui-dialog-content ui-widget-content").css(this.originalCss).detach(),this.uiDialog.stop(!0,!0).remove(),this.originalTitle&&this.element.attr("title",this.originalTitle),e=t.parent.children().eq(t.index),e.length&&e[0]!==this.element[0]?e.before(this.element):t.parent.append(this.element)},widget:function(){return this.uiDialog},disable:e.noop,enable:e.noop,close:function(t){var i,s=this;if(this._isOpen&&this._trigger("beforeClose",t)!==!1){if(this._isOpen=!1,this._focusedElement=null,this._destroyOverlay(),this._untrackInstance(),!this.opener.filter(":focusable").focus().length)try{i=this.document[0].activeElement,i&&"body"!==i.nodeName.toLowerCase()&&e(i).blur()}catch(n){}this._hide(this.uiDialog,this.options.hide,function(){s._trigger("close",t)})}},isOpen:function(){return this._isOpen},moveToTop:function(){this._moveToTop()},_moveToTop:function(t,i){var s=!1,n=this.uiDialog.siblings(".ui-front:visible").map(function(){return+e(this).css("z-index")}).get(),a=Math.max.apply(null,n);return a>=+this.uiDialog.css("z-index")&&(this.uiDialog.css("z-index",a+1),s=!0),s&&!i&&this._trigger("focus",t),s},open:function(){var t=this;return this._isOpen?(this._moveToTop()&&this._focusTabbable(),void 0):(this._isOpen=!0,this.opener=e(this.document[0].activeElement),this._size(),this._position(),this._createOverlay(),this._moveToTop(null,!0),this.overlay&&this.overlay.css("z-index",this.uiDialog.css("z-index")-1),this._show(this.uiDialog,this.options.show,function(){t._focusTabbable(),t._trigger("focus")}),this._makeFocusTarget(),this._trigger("open"),void 0)},_focusTabbable:function(){var e=this._focusedElement;e||(e=this.element.find("[autofocus]")),e.length||(e=this.element.find(":tabbable")),e.length||(e=this.uiDialogButtonPane.find(":tabbable")),e.length||(e=this.uiDialogTitlebarClose.filter(":tabbable")),e.length||(e=this.uiDialog),e.eq(0).focus()},_keepFocus:function(t){function i(){var t=this.document[0].activeElement,i=this.uiDialog[0]===t||e.contains(this.uiDialog[0],t);i||this._focusTabbable()}t.preventDefault(),i.call(this),this._delay(i)},_createWrapper:function(){this.uiDialog=e("<div>").addClass("ui-dialog ui-widget ui-widget-content ui-corner-all ui-front "+this.options.dialogClass).hide().attr({tabIndex:-1,role:"dialog"}).appendTo(this._appendTo()),this._on(this.uiDialog,{keydown:function(t){if(this.options.closeOnEscape&&!t.isDefaultPrevented()&&t.keyCode&&t.keyCode===e.ui.keyCode.ESCAPE)return t.preventDefault(),this.close(t),void 0;
if(t.keyCode===e.ui.keyCode.TAB&&!t.isDefaultPrevented()){var i=this.uiDialog.find(":tabbable"),s=i.filter(":first"),n=i.filter(":last");t.target!==n[0]&&t.target!==this.uiDialog[0]||t.shiftKey?t.target!==s[0]&&t.target!==this.uiDialog[0]||!t.shiftKey||(this._delay(function(){n.focus()}),t.preventDefault()):(this._delay(function(){s.focus()}),t.preventDefault())}},mousedown:function(e){this._moveToTop(e)&&this._focusTabbable()}}),this.element.find("[aria-describedby]").length||this.uiDialog.attr({"aria-describedby":this.element.uniqueId().attr("id")})},_createTitlebar:function(){var t;this.uiDialogTitlebar=e("<div>").addClass("ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix").prependTo(this.uiDialog),this._on(this.uiDialogTitlebar,{mousedown:function(t){e(t.target).closest(".ui-dialog-titlebar-close")||this.uiDialog.focus()}}),this.uiDialogTitlebarClose=e("<button type='button'></button>").button({label:this.options.closeText,icons:{primary:"ui-icon-closethick"},text:!1}).addClass("ui-dialog-titlebar-close").appendTo(this.uiDialogTitlebar),this._on(this.uiDialogTitlebarClose,{click:function(e){e.preventDefault(),this.close(e)}}),t=e("<span>").uniqueId().addClass("ui-dialog-title").prependTo(this.uiDialogTitlebar),this._title(t),this.uiDialog.attr({"aria-labelledby":t.attr("id")})},_title:function(e){this.options.title||e.html("&#160;"),e.text(this.options.title)},_createButtonPane:function(){this.uiDialogButtonPane=e("<div>").addClass("ui-dialog-buttonpane ui-widget-content ui-helper-clearfix"),this.uiButtonSet=e("<div>").addClass("ui-dialog-buttonset").appendTo(this.uiDialogButtonPane),this._createButtons()},_createButtons:function(){var t=this,i=this.options.buttons;return this.uiDialogButtonPane.remove(),this.uiButtonSet.empty(),e.isEmptyObject(i)||e.isArray(i)&&!i.length?(this.uiDialog.removeClass("ui-dialog-buttons"),void 0):(e.each(i,function(i,s){var n,a;s=e.isFunction(s)?{click:s,text:i}:s,s=e.extend({type:"button"},s),n=s.click,s.click=function(){n.apply(t.element[0],arguments)},a={icons:s.icons,text:s.showText},delete s.icons,delete s.showText,e("<button></button>",s).button(a).appendTo(t.uiButtonSet)}),this.uiDialog.addClass("ui-dialog-buttons"),this.uiDialogButtonPane.appendTo(this.uiDialog),void 0)},_makeDraggable:function(){function t(e){return{position:e.position,offset:e.offset}}var i=this,s=this.options;this.uiDialog.draggable({cancel:".ui-dialog-content, .ui-dialog-titlebar-close",handle:".ui-dialog-titlebar",containment:"document",start:function(s,n){e(this).addClass("ui-dialog-dragging"),i._blockFrames(),i._trigger("dragStart",s,t(n))},drag:function(e,s){i._trigger("drag",e,t(s))},stop:function(n,a){var o=a.offset.left-i.document.scrollLeft(),r=a.offset.top-i.document.scrollTop();s.position={my:"left top",at:"left"+(o>=0?"+":"")+o+" "+"top"+(r>=0?"+":"")+r,of:i.window},e(this).removeClass("ui-dialog-dragging"),i._unblockFrames(),i._trigger("dragStop",n,t(a))}})},_makeResizable:function(){function t(e){return{originalPosition:e.originalPosition,originalSize:e.originalSize,position:e.position,size:e.size}}var i=this,s=this.options,n=s.resizable,a=this.uiDialog.css("position"),o="string"==typeof n?n:"n,e,s,w,se,sw,ne,nw";this.uiDialog.resizable({cancel:".ui-dialog-content",containment:"document",alsoResize:this.element,maxWidth:s.maxWidth,maxHeight:s.maxHeight,minWidth:s.minWidth,minHeight:this._minHeight(),handles:o,start:function(s,n){e(this).addClass("ui-dialog-resizing"),i._blockFrames(),i._trigger("resizeStart",s,t(n))},resize:function(e,s){i._trigger("resize",e,t(s))},stop:function(n,a){var o=i.uiDialog.offset(),r=o.left-i.document.scrollLeft(),h=o.top-i.document.scrollTop();s.height=i.uiDialog.height(),s.width=i.uiDialog.width(),s.position={my:"left top",at:"left"+(r>=0?"+":"")+r+" "+"top"+(h>=0?"+":"")+h,of:i.window},e(this).removeClass("ui-dialog-resizing"),i._unblockFrames(),i._trigger("resizeStop",n,t(a))}}).css("position",a)},_trackFocus:function(){this._on(this.widget(),{focusin:function(t){this._makeFocusTarget(),this._focusedElement=e(t.target)}})},_makeFocusTarget:function(){this._untrackInstance(),this._trackingInstances().unshift(this)},_untrackInstance:function(){var t=this._trackingInstances(),i=e.inArray(this,t);-1!==i&&t.splice(i,1)},_trackingInstances:function(){var e=this.document.data("ui-dialog-instances");return e||(e=[],this.document.data("ui-dialog-instances",e)),e},_minHeight:function(){var e=this.options;return"auto"===e.height?e.minHeight:Math.min(e.minHeight,e.height)},_position:function(){var e=this.uiDialog.is(":visible");e||this.uiDialog.show(),this.uiDialog.position(this.options.position),e||this.uiDialog.hide()},_setOptions:function(t){var i=this,s=!1,n={};e.each(t,function(e,t){i._setOption(e,t),e in i.sizeRelatedOptions&&(s=!0),e in i.resizableRelatedOptions&&(n[e]=t)}),s&&(this._size(),this._position()),this.uiDialog.is(":data(ui-resizable)")&&this.uiDialog.resizable("option",n)},_setOption:function(e,t){var i,s,n=this.uiDialog;"dialogClass"===e&&n.removeClass(this.options.dialogClass).addClass(t),"disabled"!==e&&(this._super(e,t),"appendTo"===e&&this.uiDialog.appendTo(this._appendTo()),"buttons"===e&&this._createButtons(),"closeText"===e&&this.uiDialogTitlebarClose.button({label:""+t}),"draggable"===e&&(i=n.is(":data(ui-draggable)"),i&&!t&&n.draggable("destroy"),!i&&t&&this._makeDraggable()),"position"===e&&this._position(),"resizable"===e&&(s=n.is(":data(ui-resizable)"),s&&!t&&n.resizable("destroy"),s&&"string"==typeof t&&n.resizable("option","handles",t),s||t===!1||this._makeResizable()),"title"===e&&this._title(this.uiDialogTitlebar.find(".ui-dialog-title")))},_size:function(){var e,t,i,s=this.options;this.element.show().css({width:"auto",minHeight:0,maxHeight:"none",height:0}),s.minWidth>s.width&&(s.width=s.minWidth),e=this.uiDialog.css({height:"auto",width:s.width}).outerHeight(),t=Math.max(0,s.minHeight-e),i="number"==typeof s.maxHeight?Math.max(0,s.maxHeight-e):"none","auto"===s.height?this.element.css({minHeight:t,maxHeight:i,height:"auto"}):this.element.height(Math.max(0,s.height-e)),this.uiDialog.is(":data(ui-resizable)")&&this.uiDialog.resizable("option","minHeight",this._minHeight())},_blockFrames:function(){this.iframeBlocks=this.document.find("iframe").map(function(){var t=e(this);return e("<div>").css({position:"absolute",width:t.outerWidth(),height:t.outerHeight()}).appendTo(t.parent()).offset(t.offset())[0]})},_unblockFrames:function(){this.iframeBlocks&&(this.iframeBlocks.remove(),delete this.iframeBlocks)},_allowInteraction:function(t){return e(t.target).closest(".ui-dialog").length?!0:!!e(t.target).closest(".ui-datepicker").length},_createOverlay:function(){if(this.options.modal){var t=!0;this._delay(function(){t=!1}),this.document.data("ui-dialog-overlays")||this._on(this.document,{focusin:function(e){t||this._allowInteraction(e)||(e.preventDefault(),this._trackingInstances()[0]._focusTabbable())}}),this.overlay=e("<div>").addClass("ui-widget-overlay ui-front").appendTo(this._appendTo()),this._on(this.overlay,{mousedown:"_keepFocus"}),this.document.data("ui-dialog-overlays",(this.document.data("ui-dialog-overlays")||0)+1)}},_destroyOverlay:function(){if(this.options.modal&&this.overlay){var e=this.document.data("ui-dialog-overlays")-1;e?this.document.data("ui-dialog-overlays",e):this.document.unbind("focusin").removeData("ui-dialog-overlays"),this.overlay.remove(),this.overlay=null}}}),e.widget("ui.droppable",{version:"1.11.1",widgetEventPrefix:"drop",options:{accept:"*",activeClass:!1,addClasses:!0,greedy:!1,hoverClass:!1,scope:"default",tolerance:"intersect",activate:null,deactivate:null,drop:null,out:null,over:null},_create:function(){var t,i=this.options,s=i.accept;this.isover=!1,this.isout=!0,this.accept=e.isFunction(s)?s:function(e){return e.is(s)},this.proportions=function(){return arguments.length?(t=arguments[0],void 0):t?t:t={width:this.element[0].offsetWidth,height:this.element[0].offsetHeight}},this._addToManager(i.scope),i.addClasses&&this.element.addClass("ui-droppable")},_addToManager:function(t){e.ui.ddmanager.droppables[t]=e.ui.ddmanager.droppables[t]||[],e.ui.ddmanager.droppables[t].push(this)},_splice:function(e){for(var t=0;e.length>t;t++)e[t]===this&&e.splice(t,1)},_destroy:function(){var t=e.ui.ddmanager.droppables[this.options.scope];this._splice(t),this.element.removeClass("ui-droppable ui-droppable-disabled")},_setOption:function(t,i){if("accept"===t)this.accept=e.isFunction(i)?i:function(e){return e.is(i)};else if("scope"===t){var s=e.ui.ddmanager.droppables[this.options.scope];this._splice(s),this._addToManager(i)}this._super(t,i)},_activate:function(t){var i=e.ui.ddmanager.current;this.options.activeClass&&this.element.addClass(this.options.activeClass),i&&this._trigger("activate",t,this.ui(i))},_deactivate:function(t){var i=e.ui.ddmanager.current;this.options.activeClass&&this.element.removeClass(this.options.activeClass),i&&this._trigger("deactivate",t,this.ui(i))},_over:function(t){var i=e.ui.ddmanager.current;i&&(i.currentItem||i.element)[0]!==this.element[0]&&this.accept.call(this.element[0],i.currentItem||i.element)&&(this.options.hoverClass&&this.element.addClass(this.options.hoverClass),this._trigger("over",t,this.ui(i)))},_out:function(t){var i=e.ui.ddmanager.current;i&&(i.currentItem||i.element)[0]!==this.element[0]&&this.accept.call(this.element[0],i.currentItem||i.element)&&(this.options.hoverClass&&this.element.removeClass(this.options.hoverClass),this._trigger("out",t,this.ui(i)))},_drop:function(t,i){var s=i||e.ui.ddmanager.current,n=!1;return s&&(s.currentItem||s.element)[0]!==this.element[0]?(this.element.find(":data(ui-droppable)").not(".ui-draggable-dragging").each(function(){var i=e(this).droppable("instance");return i.options.greedy&&!i.options.disabled&&i.options.scope===s.options.scope&&i.accept.call(i.element[0],s.currentItem||s.element)&&e.ui.intersect(s,e.extend(i,{offset:i.element.offset()}),i.options.tolerance,t)?(n=!0,!1):void 0}),n?!1:this.accept.call(this.element[0],s.currentItem||s.element)?(this.options.activeClass&&this.element.removeClass(this.options.activeClass),this.options.hoverClass&&this.element.removeClass(this.options.hoverClass),this._trigger("drop",t,this.ui(s)),this.element):!1):!1},ui:function(e){return{draggable:e.currentItem||e.element,helper:e.helper,position:e.position,offset:e.positionAbs}}}),e.ui.intersect=function(){function e(e,t,i){return e>=t&&t+i>e}return function(t,i,s,n){if(!i.offset)return!1;var a=(t.positionAbs||t.position.absolute).left,o=(t.positionAbs||t.position.absolute).top,r=a+t.helperProportions.width,h=o+t.helperProportions.height,l=i.offset.left,u=i.offset.top,d=l+i.proportions().width,c=u+i.proportions().height;switch(s){case"fit":return a>=l&&d>=r&&o>=u&&c>=h;case"intersect":return a+t.helperProportions.width/2>l&&d>r-t.helperProportions.width/2&&o+t.helperProportions.height/2>u&&c>h-t.helperProportions.height/2;case"pointer":return e(n.pageY,u,i.proportions().height)&&e(n.pageX,l,i.proportions().width);case"touch":return(o>=u&&c>=o||h>=u&&c>=h||u>o&&h>c)&&(a>=l&&d>=a||r>=l&&d>=r||l>a&&r>d);default:return!1}}}(),e.ui.ddmanager={current:null,droppables:{"default":[]},prepareOffsets:function(t,i){var s,n,a=e.ui.ddmanager.droppables[t.options.scope]||[],o=i?i.type:null,r=(t.currentItem||t.element).find(":data(ui-droppable)").addBack();e:for(s=0;a.length>s;s++)if(!(a[s].options.disabled||t&&!a[s].accept.call(a[s].element[0],t.currentItem||t.element))){for(n=0;r.length>n;n++)if(r[n]===a[s].element[0]){a[s].proportions().height=0;continue e}a[s].visible="none"!==a[s].element.css("display"),a[s].visible&&("mousedown"===o&&a[s]._activate.call(a[s],i),a[s].offset=a[s].element.offset(),a[s].proportions({width:a[s].element[0].offsetWidth,height:a[s].element[0].offsetHeight}))}},drop:function(t,i){var s=!1;return e.each((e.ui.ddmanager.droppables[t.options.scope]||[]).slice(),function(){this.options&&(!this.options.disabled&&this.visible&&e.ui.intersect(t,this,this.options.tolerance,i)&&(s=this._drop.call(this,i)||s),!this.options.disabled&&this.visible&&this.accept.call(this.element[0],t.currentItem||t.element)&&(this.isout=!0,this.isover=!1,this._deactivate.call(this,i)))}),s},dragStart:function(t,i){t.element.parentsUntil("body").bind("scroll.droppable",function(){t.options.refreshPositions||e.ui.ddmanager.prepareOffsets(t,i)})},drag:function(t,i){t.options.refreshPositions&&e.ui.ddmanager.prepareOffsets(t,i),e.each(e.ui.ddmanager.droppables[t.options.scope]||[],function(){if(!this.options.disabled&&!this.greedyChild&&this.visible){var s,n,a,o=e.ui.intersect(t,this,this.options.tolerance,i),r=!o&&this.isover?"isout":o&&!this.isover?"isover":null;r&&(this.options.greedy&&(n=this.options.scope,a=this.element.parents(":data(ui-droppable)").filter(function(){return e(this).droppable("instance").options.scope===n}),a.length&&(s=e(a[0]).droppable("instance"),s.greedyChild="isover"===r)),s&&"isover"===r&&(s.isover=!1,s.isout=!0,s._out.call(s,i)),this[r]=!0,this["isout"===r?"isover":"isout"]=!1,this["isover"===r?"_over":"_out"].call(this,i),s&&"isout"===r&&(s.isout=!1,s.isover=!0,s._over.call(s,i)))}})},dragStop:function(t,i){t.element.parentsUntil("body").unbind("scroll.droppable"),t.options.refreshPositions||e.ui.ddmanager.prepareOffsets(t,i)}},e.ui.droppable;var y="ui-effects-",b=e;e.effects={effect:{}},function(e,t){function i(e,t,i){var s=d[t.type]||{};return null==e?i||!t.def?null:t.def:(e=s.floor?~~e:parseFloat(e),isNaN(e)?t.def:s.mod?(e+s.mod)%s.mod:0>e?0:e>s.max?s.max:e)}function s(i){var s=l(),n=s._rgba=[];return i=i.toLowerCase(),f(h,function(e,a){var o,r=a.re.exec(i),h=r&&a.parse(r),l=a.space||"rgba";return h?(o=s[l](h),s[u[l].cache]=o[u[l].cache],n=s._rgba=o._rgba,!1):t}),n.length?("0,0,0,0"===n.join()&&e.extend(n,a.transparent),s):a[i]}function n(e,t,i){return i=(i+1)%1,1>6*i?e+6*(t-e)*i:1>2*i?t:2>3*i?e+6*(t-e)*(2/3-i):e}var a,o="backgroundColor borderBottomColor borderLeftColor borderRightColor borderTopColor color columnRuleColor outlineColor textDecorationColor textEmphasisColor",r=/^([\-+])=\s*(\d+\.?\d*)/,h=[{re:/rgba?\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,parse:function(e){return[e[1],e[2],e[3],e[4]]}},{re:/rgba?\(\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,parse:function(e){return[2.55*e[1],2.55*e[2],2.55*e[3],e[4]]}},{re:/#([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})/,parse:function(e){return[parseInt(e[1],16),parseInt(e[2],16),parseInt(e[3],16)]}},{re:/#([a-f0-9])([a-f0-9])([a-f0-9])/,parse:function(e){return[parseInt(e[1]+e[1],16),parseInt(e[2]+e[2],16),parseInt(e[3]+e[3],16)]}},{re:/hsla?\(\s*(\d+(?:\.\d+)?)\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,space:"hsla",parse:function(e){return[e[1],e[2]/100,e[3]/100,e[4]]}}],l=e.Color=function(t,i,s,n){return new e.Color.fn.parse(t,i,s,n)},u={rgba:{props:{red:{idx:0,type:"byte"},green:{idx:1,type:"byte"},blue:{idx:2,type:"byte"}}},hsla:{props:{hue:{idx:0,type:"degrees"},saturation:{idx:1,type:"percent"},lightness:{idx:2,type:"percent"}}}},d={"byte":{floor:!0,max:255},percent:{max:1},degrees:{mod:360,floor:!0}},c=l.support={},p=e("<p>")[0],f=e.each;p.style.cssText="background-color:rgba(1,1,1,.5)",c.rgba=p.style.backgroundColor.indexOf("rgba")>-1,f(u,function(e,t){t.cache="_"+e,t.props.alpha={idx:3,type:"percent",def:1}}),l.fn=e.extend(l.prototype,{parse:function(n,o,r,h){if(n===t)return this._rgba=[null,null,null,null],this;(n.jquery||n.nodeType)&&(n=e(n).css(o),o=t);var d=this,c=e.type(n),p=this._rgba=[];return o!==t&&(n=[n,o,r,h],c="array"),"string"===c?this.parse(s(n)||a._default):"array"===c?(f(u.rgba.props,function(e,t){p[t.idx]=i(n[t.idx],t)}),this):"object"===c?(n instanceof l?f(u,function(e,t){n[t.cache]&&(d[t.cache]=n[t.cache].slice())}):f(u,function(t,s){var a=s.cache;f(s.props,function(e,t){if(!d[a]&&s.to){if("alpha"===e||null==n[e])return;d[a]=s.to(d._rgba)}d[a][t.idx]=i(n[e],t,!0)}),d[a]&&0>e.inArray(null,d[a].slice(0,3))&&(d[a][3]=1,s.from&&(d._rgba=s.from(d[a])))}),this):t},is:function(e){var i=l(e),s=!0,n=this;return f(u,function(e,a){var o,r=i[a.cache];return r&&(o=n[a.cache]||a.to&&a.to(n._rgba)||[],f(a.props,function(e,i){return null!=r[i.idx]?s=r[i.idx]===o[i.idx]:t})),s}),s},_space:function(){var e=[],t=this;return f(u,function(i,s){t[s.cache]&&e.push(i)}),e.pop()},transition:function(e,t){var s=l(e),n=s._space(),a=u[n],o=0===this.alpha()?l("transparent"):this,r=o[a.cache]||a.to(o._rgba),h=r.slice();return s=s[a.cache],f(a.props,function(e,n){var a=n.idx,o=r[a],l=s[a],u=d[n.type]||{};null!==l&&(null===o?h[a]=l:(u.mod&&(l-o>u.mod/2?o+=u.mod:o-l>u.mod/2&&(o-=u.mod)),h[a]=i((l-o)*t+o,n)))}),this[n](h)},blend:function(t){if(1===this._rgba[3])return this;var i=this._rgba.slice(),s=i.pop(),n=l(t)._rgba;return l(e.map(i,function(e,t){return(1-s)*n[t]+s*e}))},toRgbaString:function(){var t="rgba(",i=e.map(this._rgba,function(e,t){return null==e?t>2?1:0:e});return 1===i[3]&&(i.pop(),t="rgb("),t+i.join()+")"},toHslaString:function(){var t="hsla(",i=e.map(this.hsla(),function(e,t){return null==e&&(e=t>2?1:0),t&&3>t&&(e=Math.round(100*e)+"%"),e});return 1===i[3]&&(i.pop(),t="hsl("),t+i.join()+")"},toHexString:function(t){var i=this._rgba.slice(),s=i.pop();return t&&i.push(~~(255*s)),"#"+e.map(i,function(e){return e=(e||0).toString(16),1===e.length?"0"+e:e}).join("")},toString:function(){return 0===this._rgba[3]?"transparent":this.toRgbaString()}}),l.fn.parse.prototype=l.fn,u.hsla.to=function(e){if(null==e[0]||null==e[1]||null==e[2])return[null,null,null,e[3]];var t,i,s=e[0]/255,n=e[1]/255,a=e[2]/255,o=e[3],r=Math.max(s,n,a),h=Math.min(s,n,a),l=r-h,u=r+h,d=.5*u;return t=h===r?0:s===r?60*(n-a)/l+360:n===r?60*(a-s)/l+120:60*(s-n)/l+240,i=0===l?0:.5>=d?l/u:l/(2-u),[Math.round(t)%360,i,d,null==o?1:o]},u.hsla.from=function(e){if(null==e[0]||null==e[1]||null==e[2])return[null,null,null,e[3]];var t=e[0]/360,i=e[1],s=e[2],a=e[3],o=.5>=s?s*(1+i):s+i-s*i,r=2*s-o;return[Math.round(255*n(r,o,t+1/3)),Math.round(255*n(r,o,t)),Math.round(255*n(r,o,t-1/3)),a]},f(u,function(s,n){var a=n.props,o=n.cache,h=n.to,u=n.from;l.fn[s]=function(s){if(h&&!this[o]&&(this[o]=h(this._rgba)),s===t)return this[o].slice();var n,r=e.type(s),d="array"===r||"object"===r?s:arguments,c=this[o].slice();return f(a,function(e,t){var s=d["object"===r?e:t.idx];null==s&&(s=c[t.idx]),c[t.idx]=i(s,t)}),u?(n=l(u(c)),n[o]=c,n):l(c)},f(a,function(t,i){l.fn[t]||(l.fn[t]=function(n){var a,o=e.type(n),h="alpha"===t?this._hsla?"hsla":"rgba":s,l=this[h](),u=l[i.idx];return"undefined"===o?u:("function"===o&&(n=n.call(this,u),o=e.type(n)),null==n&&i.empty?this:("string"===o&&(a=r.exec(n),a&&(n=u+parseFloat(a[2])*("+"===a[1]?1:-1))),l[i.idx]=n,this[h](l)))})})}),l.hook=function(t){var i=t.split(" ");f(i,function(t,i){e.cssHooks[i]={set:function(t,n){var a,o,r="";if("transparent"!==n&&("string"!==e.type(n)||(a=s(n)))){if(n=l(a||n),!c.rgba&&1!==n._rgba[3]){for(o="backgroundColor"===i?t.parentNode:t;(""===r||"transparent"===r)&&o&&o.style;)try{r=e.css(o,"backgroundColor"),o=o.parentNode}catch(h){}n=n.blend(r&&"transparent"!==r?r:"_default")}n=n.toRgbaString()}try{t.style[i]=n}catch(h){}}},e.fx.step[i]=function(t){t.colorInit||(t.start=l(t.elem,i),t.end=l(t.end),t.colorInit=!0),e.cssHooks[i].set(t.elem,t.start.transition(t.end,t.pos))}})},l.hook(o),e.cssHooks.borderColor={expand:function(e){var t={};return f(["Top","Right","Bottom","Left"],function(i,s){t["border"+s+"Color"]=e}),t}},a=e.Color.names={aqua:"#00ffff",black:"#000000",blue:"#0000ff",fuchsia:"#ff00ff",gray:"#808080",green:"#008000",lime:"#00ff00",maroon:"#800000",navy:"#000080",olive:"#808000",purple:"#800080",red:"#ff0000",silver:"#c0c0c0",teal:"#008080",white:"#ffffff",yellow:"#ffff00",transparent:[null,null,null,0],_default:"#ffffff"}}(b),function(){function t(t){var i,s,n=t.ownerDocument.defaultView?t.ownerDocument.defaultView.getComputedStyle(t,null):t.currentStyle,a={};if(n&&n.length&&n[0]&&n[n[0]])for(s=n.length;s--;)i=n[s],"string"==typeof n[i]&&(a[e.camelCase(i)]=n[i]);else for(i in n)"string"==typeof n[i]&&(a[i]=n[i]);return a}function i(t,i){var s,a,o={};for(s in i)a=i[s],t[s]!==a&&(n[s]||(e.fx.step[s]||!isNaN(parseFloat(a)))&&(o[s]=a));return o}var s=["add","remove","toggle"],n={border:1,borderBottom:1,borderColor:1,borderLeft:1,borderRight:1,borderTop:1,borderWidth:1,margin:1,padding:1};e.each(["borderLeftStyle","borderRightStyle","borderBottomStyle","borderTopStyle"],function(t,i){e.fx.step[i]=function(e){("none"!==e.end&&!e.setAttr||1===e.pos&&!e.setAttr)&&(b.style(e.elem,i,e.end),e.setAttr=!0)}}),e.fn.addBack||(e.fn.addBack=function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}),e.effects.animateClass=function(n,a,o,r){var h=e.speed(a,o,r);return this.queue(function(){var a,o=e(this),r=o.attr("class")||"",l=h.children?o.find("*").addBack():o;l=l.map(function(){var i=e(this);return{el:i,start:t(this)}}),a=function(){e.each(s,function(e,t){n[t]&&o[t+"Class"](n[t])})},a(),l=l.map(function(){return this.end=t(this.el[0]),this.diff=i(this.start,this.end),this}),o.attr("class",r),l=l.map(function(){var t=this,i=e.Deferred(),s=e.extend({},h,{queue:!1,complete:function(){i.resolve(t)}});return this.el.animate(this.diff,s),i.promise()}),e.when.apply(e,l.get()).done(function(){a(),e.each(arguments,function(){var t=this.el;e.each(this.diff,function(e){t.css(e,"")})}),h.complete.call(o[0])})})},e.fn.extend({addClass:function(t){return function(i,s,n,a){return s?e.effects.animateClass.call(this,{add:i},s,n,a):t.apply(this,arguments)}}(e.fn.addClass),removeClass:function(t){return function(i,s,n,a){return arguments.length>1?e.effects.animateClass.call(this,{remove:i},s,n,a):t.apply(this,arguments)}}(e.fn.removeClass),toggleClass:function(t){return function(i,s,n,a,o){return"boolean"==typeof s||void 0===s?n?e.effects.animateClass.call(this,s?{add:i}:{remove:i},n,a,o):t.apply(this,arguments):e.effects.animateClass.call(this,{toggle:i},s,n,a)}}(e.fn.toggleClass),switchClass:function(t,i,s,n,a){return e.effects.animateClass.call(this,{add:i,remove:t},s,n,a)}})}(),function(){function t(t,i,s,n){return e.isPlainObject(t)&&(i=t,t=t.effect),t={effect:t},null==i&&(i={}),e.isFunction(i)&&(n=i,s=null,i={}),("number"==typeof i||e.fx.speeds[i])&&(n=s,s=i,i={}),e.isFunction(s)&&(n=s,s=null),i&&e.extend(t,i),s=s||i.duration,t.duration=e.fx.off?0:"number"==typeof s?s:s in e.fx.speeds?e.fx.speeds[s]:e.fx.speeds._default,t.complete=n||i.complete,t}function i(t){return!t||"number"==typeof t||e.fx.speeds[t]?!0:"string"!=typeof t||e.effects.effect[t]?e.isFunction(t)?!0:"object"!=typeof t||t.effect?!1:!0:!0}e.extend(e.effects,{version:"1.11.1",save:function(e,t){for(var i=0;t.length>i;i++)null!==t[i]&&e.data(y+t[i],e[0].style[t[i]])},restore:function(e,t){var i,s;for(s=0;t.length>s;s++)null!==t[s]&&(i=e.data(y+t[s]),void 0===i&&(i=""),e.css(t[s],i))},setMode:function(e,t){return"toggle"===t&&(t=e.is(":hidden")?"show":"hide"),t},getBaseline:function(e,t){var i,s;switch(e[0]){case"top":i=0;break;case"middle":i=.5;break;case"bottom":i=1;break;default:i=e[0]/t.height}switch(e[1]){case"left":s=0;break;case"center":s=.5;break;case"right":s=1;break;default:s=e[1]/t.width}return{x:s,y:i}},createWrapper:function(t){if(t.parent().is(".ui-effects-wrapper"))return t.parent();var i={width:t.outerWidth(!0),height:t.outerHeight(!0),"float":t.css("float")},s=e("<div></div>").addClass("ui-effects-wrapper").css({fontSize:"100%",background:"transparent",border:"none",margin:0,padding:0}),n={width:t.width(),height:t.height()},a=document.activeElement;try{a.id}catch(o){a=document.body}return t.wrap(s),(t[0]===a||e.contains(t[0],a))&&e(a).focus(),s=t.parent(),"static"===t.css("position")?(s.css({position:"relative"}),t.css({position:"relative"})):(e.extend(i,{position:t.css("position"),zIndex:t.css("z-index")}),e.each(["top","left","bottom","right"],function(e,s){i[s]=t.css(s),isNaN(parseInt(i[s],10))&&(i[s]="auto")}),t.css({position:"relative",top:0,left:0,right:"auto",bottom:"auto"})),t.css(n),s.css(i).show()},removeWrapper:function(t){var i=document.activeElement;return t.parent().is(".ui-effects-wrapper")&&(t.parent().replaceWith(t),(t[0]===i||e.contains(t[0],i))&&e(i).focus()),t},setTransition:function(t,i,s,n){return n=n||{},e.each(i,function(e,i){var a=t.cssUnit(i);a[0]>0&&(n[i]=a[0]*s+a[1])}),n}}),e.fn.extend({effect:function(){function i(t){function i(){e.isFunction(a)&&a.call(n[0]),e.isFunction(t)&&t()}var n=e(this),a=s.complete,r=s.mode;(n.is(":hidden")?"hide"===r:"show"===r)?(n[r](),i()):o.call(n[0],s,i)}var s=t.apply(this,arguments),n=s.mode,a=s.queue,o=e.effects.effect[s.effect];return e.fx.off||!o?n?this[n](s.duration,s.complete):this.each(function(){s.complete&&s.complete.call(this)}):a===!1?this.each(i):this.queue(a||"fx",i)},show:function(e){return function(s){if(i(s))return e.apply(this,arguments);var n=t.apply(this,arguments);return n.mode="show",this.effect.call(this,n)}}(e.fn.show),hide:function(e){return function(s){if(i(s))return e.apply(this,arguments);var n=t.apply(this,arguments);return n.mode="hide",this.effect.call(this,n)}}(e.fn.hide),toggle:function(e){return function(s){if(i(s)||"boolean"==typeof s)return e.apply(this,arguments);var n=t.apply(this,arguments);return n.mode="toggle",this.effect.call(this,n)}}(e.fn.toggle),cssUnit:function(t){var i=this.css(t),s=[];return e.each(["em","px","%","pt"],function(e,t){i.indexOf(t)>0&&(s=[parseFloat(i),t])}),s}})}(),function(){var t={};e.each(["Quad","Cubic","Quart","Quint","Expo"],function(e,i){t[i]=function(t){return Math.pow(t,e+2)}}),e.extend(t,{Sine:function(e){return 1-Math.cos(e*Math.PI/2)},Circ:function(e){return 1-Math.sqrt(1-e*e)},Elastic:function(e){return 0===e||1===e?e:-Math.pow(2,8*(e-1))*Math.sin((80*(e-1)-7.5)*Math.PI/15)},Back:function(e){return e*e*(3*e-2)},Bounce:function(e){for(var t,i=4;((t=Math.pow(2,--i))-1)/11>e;);return 1/Math.pow(4,3-i)-7.5625*Math.pow((3*t-2)/22-e,2)}}),e.each(t,function(t,i){e.easing["easeIn"+t]=i,e.easing["easeOut"+t]=function(e){return 1-i(1-e)},e.easing["easeInOut"+t]=function(e){return.5>e?i(2*e)/2:1-i(-2*e+2)/2}})}(),e.effects,e.effects.effect.blind=function(t,i){var s,n,a,o=e(this),r=/up|down|vertical/,h=/up|left|vertical|horizontal/,l=["position","top","bottom","left","right","height","width"],u=e.effects.setMode(o,t.mode||"hide"),d=t.direction||"up",c=r.test(d),p=c?"height":"width",f=c?"top":"left",m=h.test(d),g={},v="show"===u;o.parent().is(".ui-effects-wrapper")?e.effects.save(o.parent(),l):e.effects.save(o,l),o.show(),s=e.effects.createWrapper(o).css({overflow:"hidden"}),n=s[p](),a=parseFloat(s.css(f))||0,g[p]=v?n:0,m||(o.css(c?"bottom":"right",0).css(c?"top":"left","auto").css({position:"absolute"}),g[f]=v?a:n+a),v&&(s.css(p,0),m||s.css(f,a+n)),s.animate(g,{duration:t.duration,easing:t.easing,queue:!1,complete:function(){"hide"===u&&o.hide(),e.effects.restore(o,l),e.effects.removeWrapper(o),i()}})},e.effects.effect.bounce=function(t,i){var s,n,a,o=e(this),r=["position","top","bottom","left","right","height","width"],h=e.effects.setMode(o,t.mode||"effect"),l="hide"===h,u="show"===h,d=t.direction||"up",c=t.distance,p=t.times||5,f=2*p+(u||l?1:0),m=t.duration/f,g=t.easing,v="up"===d||"down"===d?"top":"left",y="up"===d||"left"===d,b=o.queue(),_=b.length;for((u||l)&&r.push("opacity"),e.effects.save(o,r),o.show(),e.effects.createWrapper(o),c||(c=o["top"===v?"outerHeight":"outerWidth"]()/3),u&&(a={opacity:1},a[v]=0,o.css("opacity",0).css(v,y?2*-c:2*c).animate(a,m,g)),l&&(c/=Math.pow(2,p-1)),a={},a[v]=0,s=0;p>s;s++)n={},n[v]=(y?"-=":"+=")+c,o.animate(n,m,g).animate(a,m,g),c=l?2*c:c/2;l&&(n={opacity:0},n[v]=(y?"-=":"+=")+c,o.animate(n,m,g)),o.queue(function(){l&&o.hide(),e.effects.restore(o,r),e.effects.removeWrapper(o),i()}),_>1&&b.splice.apply(b,[1,0].concat(b.splice(_,f+1))),o.dequeue()},e.effects.effect.clip=function(t,i){var s,n,a,o=e(this),r=["position","top","bottom","left","right","height","width"],h=e.effects.setMode(o,t.mode||"hide"),l="show"===h,u=t.direction||"vertical",d="vertical"===u,c=d?"height":"width",p=d?"top":"left",f={};e.effects.save(o,r),o.show(),s=e.effects.createWrapper(o).css({overflow:"hidden"}),n="IMG"===o[0].tagName?s:o,a=n[c](),l&&(n.css(c,0),n.css(p,a/2)),f[c]=l?a:0,f[p]=l?0:a/2,n.animate(f,{queue:!1,duration:t.duration,easing:t.easing,complete:function(){l||o.hide(),e.effects.restore(o,r),e.effects.removeWrapper(o),i()}})},e.effects.effect.drop=function(t,i){var s,n=e(this),a=["position","top","bottom","left","right","opacity","height","width"],o=e.effects.setMode(n,t.mode||"hide"),r="show"===o,h=t.direction||"left",l="up"===h||"down"===h?"top":"left",u="up"===h||"left"===h?"pos":"neg",d={opacity:r?1:0};e.effects.save(n,a),n.show(),e.effects.createWrapper(n),s=t.distance||n["top"===l?"outerHeight":"outerWidth"](!0)/2,r&&n.css("opacity",0).css(l,"pos"===u?-s:s),d[l]=(r?"pos"===u?"+=":"-=":"pos"===u?"-=":"+=")+s,n.animate(d,{queue:!1,duration:t.duration,easing:t.easing,complete:function(){"hide"===o&&n.hide(),e.effects.restore(n,a),e.effects.removeWrapper(n),i()}})},e.effects.effect.explode=function(t,i){function s(){b.push(this),b.length===d*c&&n()}function n(){p.css({visibility:"visible"}),e(b).remove(),m||p.hide(),i()}var a,o,r,h,l,u,d=t.pieces?Math.round(Math.sqrt(t.pieces)):3,c=d,p=e(this),f=e.effects.setMode(p,t.mode||"hide"),m="show"===f,g=p.show().css("visibility","hidden").offset(),v=Math.ceil(p.outerWidth()/c),y=Math.ceil(p.outerHeight()/d),b=[];for(a=0;d>a;a++)for(h=g.top+a*y,u=a-(d-1)/2,o=0;c>o;o++)r=g.left+o*v,l=o-(c-1)/2,p.clone().appendTo("body").wrap("<div></div>").css({position:"absolute",visibility:"visible",left:-o*v,top:-a*y}).parent().addClass("ui-effects-explode").css({position:"absolute",overflow:"hidden",width:v,height:y,left:r+(m?l*v:0),top:h+(m?u*y:0),opacity:m?0:1}).animate({left:r+(m?0:l*v),top:h+(m?0:u*y),opacity:m?1:0},t.duration||500,t.easing,s)},e.effects.effect.fade=function(t,i){var s=e(this),n=e.effects.setMode(s,t.mode||"toggle");s.animate({opacity:n},{queue:!1,duration:t.duration,easing:t.easing,complete:i})},e.effects.effect.fold=function(t,i){var s,n,a=e(this),o=["position","top","bottom","left","right","height","width"],r=e.effects.setMode(a,t.mode||"hide"),h="show"===r,l="hide"===r,u=t.size||15,d=/([0-9]+)%/.exec(u),c=!!t.horizFirst,p=h!==c,f=p?["width","height"]:["height","width"],m=t.duration/2,g={},v={};e.effects.save(a,o),a.show(),s=e.effects.createWrapper(a).css({overflow:"hidden"}),n=p?[s.width(),s.height()]:[s.height(),s.width()],d&&(u=parseInt(d[1],10)/100*n[l?0:1]),h&&s.css(c?{height:0,width:u}:{height:u,width:0}),g[f[0]]=h?n[0]:u,v[f[1]]=h?n[1]:0,s.animate(g,m,t.easing).animate(v,m,t.easing,function(){l&&a.hide(),e.effects.restore(a,o),e.effects.removeWrapper(a),i()})},e.effects.effect.highlight=function(t,i){var s=e(this),n=["backgroundImage","backgroundColor","opacity"],a=e.effects.setMode(s,t.mode||"show"),o={backgroundColor:s.css("backgroundColor")};"hide"===a&&(o.opacity=0),e.effects.save(s,n),s.show().css({backgroundImage:"none",backgroundColor:t.color||"#ffff99"}).animate(o,{queue:!1,duration:t.duration,easing:t.easing,complete:function(){"hide"===a&&s.hide(),e.effects.restore(s,n),i()}})},e.effects.effect.size=function(t,i){var s,n,a,o=e(this),r=["position","top","bottom","left","right","width","height","overflow","opacity"],h=["position","top","bottom","left","right","overflow","opacity"],l=["width","height","overflow"],u=["fontSize"],d=["borderTopWidth","borderBottomWidth","paddingTop","paddingBottom"],c=["borderLeftWidth","borderRightWidth","paddingLeft","paddingRight"],p=e.effects.setMode(o,t.mode||"effect"),f=t.restore||"effect"!==p,m=t.scale||"both",g=t.origin||["middle","center"],v=o.css("position"),y=f?r:h,b={height:0,width:0,outerHeight:0,outerWidth:0};"show"===p&&o.show(),s={height:o.height(),width:o.width(),outerHeight:o.outerHeight(),outerWidth:o.outerWidth()},"toggle"===t.mode&&"show"===p?(o.from=t.to||b,o.to=t.from||s):(o.from=t.from||("show"===p?b:s),o.to=t.to||("hide"===p?b:s)),a={from:{y:o.from.height/s.height,x:o.from.width/s.width},to:{y:o.to.height/s.height,x:o.to.width/s.width}},("box"===m||"both"===m)&&(a.from.y!==a.to.y&&(y=y.concat(d),o.from=e.effects.setTransition(o,d,a.from.y,o.from),o.to=e.effects.setTransition(o,d,a.to.y,o.to)),a.from.x!==a.to.x&&(y=y.concat(c),o.from=e.effects.setTransition(o,c,a.from.x,o.from),o.to=e.effects.setTransition(o,c,a.to.x,o.to))),("content"===m||"both"===m)&&a.from.y!==a.to.y&&(y=y.concat(u).concat(l),o.from=e.effects.setTransition(o,u,a.from.y,o.from),o.to=e.effects.setTransition(o,u,a.to.y,o.to)),e.effects.save(o,y),o.show(),e.effects.createWrapper(o),o.css("overflow","hidden").css(o.from),g&&(n=e.effects.getBaseline(g,s),o.from.top=(s.outerHeight-o.outerHeight())*n.y,o.from.left=(s.outerWidth-o.outerWidth())*n.x,o.to.top=(s.outerHeight-o.to.outerHeight)*n.y,o.to.left=(s.outerWidth-o.to.outerWidth)*n.x),o.css(o.from),("content"===m||"both"===m)&&(d=d.concat(["marginTop","marginBottom"]).concat(u),c=c.concat(["marginLeft","marginRight"]),l=r.concat(d).concat(c),o.find("*[width]").each(function(){var i=e(this),s={height:i.height(),width:i.width(),outerHeight:i.outerHeight(),outerWidth:i.outerWidth()};
f&&e.effects.save(i,l),i.from={height:s.height*a.from.y,width:s.width*a.from.x,outerHeight:s.outerHeight*a.from.y,outerWidth:s.outerWidth*a.from.x},i.to={height:s.height*a.to.y,width:s.width*a.to.x,outerHeight:s.height*a.to.y,outerWidth:s.width*a.to.x},a.from.y!==a.to.y&&(i.from=e.effects.setTransition(i,d,a.from.y,i.from),i.to=e.effects.setTransition(i,d,a.to.y,i.to)),a.from.x!==a.to.x&&(i.from=e.effects.setTransition(i,c,a.from.x,i.from),i.to=e.effects.setTransition(i,c,a.to.x,i.to)),i.css(i.from),i.animate(i.to,t.duration,t.easing,function(){f&&e.effects.restore(i,l)})})),o.animate(o.to,{queue:!1,duration:t.duration,easing:t.easing,complete:function(){0===o.to.opacity&&o.css("opacity",o.from.opacity),"hide"===p&&o.hide(),e.effects.restore(o,y),f||("static"===v?o.css({position:"relative",top:o.to.top,left:o.to.left}):e.each(["top","left"],function(e,t){o.css(t,function(t,i){var s=parseInt(i,10),n=e?o.to.left:o.to.top;return"auto"===i?n+"px":s+n+"px"})})),e.effects.removeWrapper(o),i()}})},e.effects.effect.scale=function(t,i){var s=e(this),n=e.extend(!0,{},t),a=e.effects.setMode(s,t.mode||"effect"),o=parseInt(t.percent,10)||(0===parseInt(t.percent,10)?0:"hide"===a?0:100),r=t.direction||"both",h=t.origin,l={height:s.height(),width:s.width(),outerHeight:s.outerHeight(),outerWidth:s.outerWidth()},u={y:"horizontal"!==r?o/100:1,x:"vertical"!==r?o/100:1};n.effect="size",n.queue=!1,n.complete=i,"effect"!==a&&(n.origin=h||["middle","center"],n.restore=!0),n.from=t.from||("show"===a?{height:0,width:0,outerHeight:0,outerWidth:0}:l),n.to={height:l.height*u.y,width:l.width*u.x,outerHeight:l.outerHeight*u.y,outerWidth:l.outerWidth*u.x},n.fade&&("show"===a&&(n.from.opacity=0,n.to.opacity=1),"hide"===a&&(n.from.opacity=1,n.to.opacity=0)),s.effect(n)},e.effects.effect.puff=function(t,i){var s=e(this),n=e.effects.setMode(s,t.mode||"hide"),a="hide"===n,o=parseInt(t.percent,10)||150,r=o/100,h={height:s.height(),width:s.width(),outerHeight:s.outerHeight(),outerWidth:s.outerWidth()};e.extend(t,{effect:"scale",queue:!1,fade:!0,mode:n,complete:i,percent:a?o:100,from:a?h:{height:h.height*r,width:h.width*r,outerHeight:h.outerHeight*r,outerWidth:h.outerWidth*r}}),s.effect(t)},e.effects.effect.pulsate=function(t,i){var s,n=e(this),a=e.effects.setMode(n,t.mode||"show"),o="show"===a,r="hide"===a,h=o||"hide"===a,l=2*(t.times||5)+(h?1:0),u=t.duration/l,d=0,c=n.queue(),p=c.length;for((o||!n.is(":visible"))&&(n.css("opacity",0).show(),d=1),s=1;l>s;s++)n.animate({opacity:d},u,t.easing),d=1-d;n.animate({opacity:d},u,t.easing),n.queue(function(){r&&n.hide(),i()}),p>1&&c.splice.apply(c,[1,0].concat(c.splice(p,l+1))),n.dequeue()},e.effects.effect.shake=function(t,i){var s,n=e(this),a=["position","top","bottom","left","right","height","width"],o=e.effects.setMode(n,t.mode||"effect"),r=t.direction||"left",h=t.distance||20,l=t.times||3,u=2*l+1,d=Math.round(t.duration/u),c="up"===r||"down"===r?"top":"left",p="up"===r||"left"===r,f={},m={},g={},v=n.queue(),y=v.length;for(e.effects.save(n,a),n.show(),e.effects.createWrapper(n),f[c]=(p?"-=":"+=")+h,m[c]=(p?"+=":"-=")+2*h,g[c]=(p?"-=":"+=")+2*h,n.animate(f,d,t.easing),s=1;l>s;s++)n.animate(m,d,t.easing).animate(g,d,t.easing);n.animate(m,d,t.easing).animate(f,d/2,t.easing).queue(function(){"hide"===o&&n.hide(),e.effects.restore(n,a),e.effects.removeWrapper(n),i()}),y>1&&v.splice.apply(v,[1,0].concat(v.splice(y,u+1))),n.dequeue()},e.effects.effect.slide=function(t,i){var s,n=e(this),a=["position","top","bottom","left","right","width","height"],o=e.effects.setMode(n,t.mode||"show"),r="show"===o,h=t.direction||"left",l="up"===h||"down"===h?"top":"left",u="up"===h||"left"===h,d={};e.effects.save(n,a),n.show(),s=t.distance||n["top"===l?"outerHeight":"outerWidth"](!0),e.effects.createWrapper(n).css({overflow:"hidden"}),r&&n.css(l,u?isNaN(s)?"-"+s:-s:s),d[l]=(r?u?"+=":"-=":u?"-=":"+=")+s,n.animate(d,{queue:!1,duration:t.duration,easing:t.easing,complete:function(){"hide"===o&&n.hide(),e.effects.restore(n,a),e.effects.removeWrapper(n),i()}})},e.effects.effect.transfer=function(t,i){var s=e(this),n=e(t.to),a="fixed"===n.css("position"),o=e("body"),r=a?o.scrollTop():0,h=a?o.scrollLeft():0,l=n.offset(),u={top:l.top-r,left:l.left-h,height:n.innerHeight(),width:n.innerWidth()},d=s.offset(),c=e("<div class='ui-effects-transfer'></div>").appendTo(document.body).addClass(t.className).css({top:d.top-r,left:d.left-h,height:s.innerHeight(),width:s.innerWidth(),position:a?"fixed":"absolute"}).animate(u,t.duration,t.easing,function(){c.remove(),i()})},e.widget("ui.progressbar",{version:"1.11.1",options:{max:100,value:0,change:null,complete:null},min:0,_create:function(){this.oldValue=this.options.value=this._constrainedValue(),this.element.addClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").attr({role:"progressbar","aria-valuemin":this.min}),this.valueDiv=e("<div class='ui-progressbar-value ui-widget-header ui-corner-left'></div>").appendTo(this.element),this._refreshValue()},_destroy:function(){this.element.removeClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow"),this.valueDiv.remove()},value:function(e){return void 0===e?this.options.value:(this.options.value=this._constrainedValue(e),this._refreshValue(),void 0)},_constrainedValue:function(e){return void 0===e&&(e=this.options.value),this.indeterminate=e===!1,"number"!=typeof e&&(e=0),this.indeterminate?!1:Math.min(this.options.max,Math.max(this.min,e))},_setOptions:function(e){var t=e.value;delete e.value,this._super(e),this.options.value=this._constrainedValue(t),this._refreshValue()},_setOption:function(e,t){"max"===e&&(t=Math.max(this.min,t)),"disabled"===e&&this.element.toggleClass("ui-state-disabled",!!t).attr("aria-disabled",t),this._super(e,t)},_percentage:function(){return this.indeterminate?100:100*(this.options.value-this.min)/(this.options.max-this.min)},_refreshValue:function(){var t=this.options.value,i=this._percentage();this.valueDiv.toggle(this.indeterminate||t>this.min).toggleClass("ui-corner-right",t===this.options.max).width(i.toFixed(0)+"%"),this.element.toggleClass("ui-progressbar-indeterminate",this.indeterminate),this.indeterminate?(this.element.removeAttr("aria-valuenow"),this.overlayDiv||(this.overlayDiv=e("<div class='ui-progressbar-overlay'></div>").appendTo(this.valueDiv))):(this.element.attr({"aria-valuemax":this.options.max,"aria-valuenow":t}),this.overlayDiv&&(this.overlayDiv.remove(),this.overlayDiv=null)),this.oldValue!==t&&(this.oldValue=t,this._trigger("change")),t===this.options.max&&this._trigger("complete")}}),e.widget("ui.selectable",e.ui.mouse,{version:"1.11.1",options:{appendTo:"body",autoRefresh:!0,distance:0,filter:"*",tolerance:"touch",selected:null,selecting:null,start:null,stop:null,unselected:null,unselecting:null},_create:function(){var t,i=this;this.element.addClass("ui-selectable"),this.dragged=!1,this.refresh=function(){t=e(i.options.filter,i.element[0]),t.addClass("ui-selectee"),t.each(function(){var t=e(this),i=t.offset();e.data(this,"selectable-item",{element:this,$element:t,left:i.left,top:i.top,right:i.left+t.outerWidth(),bottom:i.top+t.outerHeight(),startselected:!1,selected:t.hasClass("ui-selected"),selecting:t.hasClass("ui-selecting"),unselecting:t.hasClass("ui-unselecting")})})},this.refresh(),this.selectees=t.addClass("ui-selectee"),this._mouseInit(),this.helper=e("<div class='ui-selectable-helper'></div>")},_destroy:function(){this.selectees.removeClass("ui-selectee").removeData("selectable-item"),this.element.removeClass("ui-selectable ui-selectable-disabled"),this._mouseDestroy()},_mouseStart:function(t){var i=this,s=this.options;this.opos=[t.pageX,t.pageY],this.options.disabled||(this.selectees=e(s.filter,this.element[0]),this._trigger("start",t),e(s.appendTo).append(this.helper),this.helper.css({left:t.pageX,top:t.pageY,width:0,height:0}),s.autoRefresh&&this.refresh(),this.selectees.filter(".ui-selected").each(function(){var s=e.data(this,"selectable-item");s.startselected=!0,t.metaKey||t.ctrlKey||(s.$element.removeClass("ui-selected"),s.selected=!1,s.$element.addClass("ui-unselecting"),s.unselecting=!0,i._trigger("unselecting",t,{unselecting:s.element}))}),e(t.target).parents().addBack().each(function(){var s,n=e.data(this,"selectable-item");return n?(s=!t.metaKey&&!t.ctrlKey||!n.$element.hasClass("ui-selected"),n.$element.removeClass(s?"ui-unselecting":"ui-selected").addClass(s?"ui-selecting":"ui-unselecting"),n.unselecting=!s,n.selecting=s,n.selected=s,s?i._trigger("selecting",t,{selecting:n.element}):i._trigger("unselecting",t,{unselecting:n.element}),!1):void 0}))},_mouseDrag:function(t){if(this.dragged=!0,!this.options.disabled){var i,s=this,n=this.options,a=this.opos[0],o=this.opos[1],r=t.pageX,h=t.pageY;return a>r&&(i=r,r=a,a=i),o>h&&(i=h,h=o,o=i),this.helper.css({left:a,top:o,width:r-a,height:h-o}),this.selectees.each(function(){var i=e.data(this,"selectable-item"),l=!1;i&&i.element!==s.element[0]&&("touch"===n.tolerance?l=!(i.left>r||a>i.right||i.top>h||o>i.bottom):"fit"===n.tolerance&&(l=i.left>a&&r>i.right&&i.top>o&&h>i.bottom),l?(i.selected&&(i.$element.removeClass("ui-selected"),i.selected=!1),i.unselecting&&(i.$element.removeClass("ui-unselecting"),i.unselecting=!1),i.selecting||(i.$element.addClass("ui-selecting"),i.selecting=!0,s._trigger("selecting",t,{selecting:i.element}))):(i.selecting&&((t.metaKey||t.ctrlKey)&&i.startselected?(i.$element.removeClass("ui-selecting"),i.selecting=!1,i.$element.addClass("ui-selected"),i.selected=!0):(i.$element.removeClass("ui-selecting"),i.selecting=!1,i.startselected&&(i.$element.addClass("ui-unselecting"),i.unselecting=!0),s._trigger("unselecting",t,{unselecting:i.element}))),i.selected&&(t.metaKey||t.ctrlKey||i.startselected||(i.$element.removeClass("ui-selected"),i.selected=!1,i.$element.addClass("ui-unselecting"),i.unselecting=!0,s._trigger("unselecting",t,{unselecting:i.element})))))}),!1}},_mouseStop:function(t){var i=this;return this.dragged=!1,e(".ui-unselecting",this.element[0]).each(function(){var s=e.data(this,"selectable-item");s.$element.removeClass("ui-unselecting"),s.unselecting=!1,s.startselected=!1,i._trigger("unselected",t,{unselected:s.element})}),e(".ui-selecting",this.element[0]).each(function(){var s=e.data(this,"selectable-item");s.$element.removeClass("ui-selecting").addClass("ui-selected"),s.selecting=!1,s.selected=!0,s.startselected=!0,i._trigger("selected",t,{selected:s.element})}),this._trigger("stop",t),this.helper.remove(),!1}}),e.widget("ui.selectmenu",{version:"1.11.1",defaultElement:"<select>",options:{appendTo:null,disabled:null,icons:{button:"ui-icon-triangle-1-s"},position:{my:"left top",at:"left bottom",collision:"none"},width:null,change:null,close:null,focus:null,open:null,select:null},_create:function(){var e=this.element.uniqueId().attr("id");this.ids={element:e,button:e+"-button",menu:e+"-menu"},this._drawButton(),this._drawMenu(),this.options.disabled&&this.disable()},_drawButton:function(){var t=this,i=this.element.attr("tabindex");this.label=e("label[for='"+this.ids.element+"']").attr("for",this.ids.button),this._on(this.label,{click:function(e){this.button.focus(),e.preventDefault()}}),this.element.hide(),this.button=e("<span>",{"class":"ui-selectmenu-button ui-widget ui-state-default ui-corner-all",tabindex:i||this.options.disabled?-1:0,id:this.ids.button,role:"combobox","aria-expanded":"false","aria-autocomplete":"list","aria-owns":this.ids.menu,"aria-haspopup":"true"}).insertAfter(this.element),e("<span>",{"class":"ui-icon "+this.options.icons.button}).prependTo(this.button),this.buttonText=e("<span>",{"class":"ui-selectmenu-text"}).appendTo(this.button),this._setText(this.buttonText,this.element.find("option:selected").text()),this._resizeButton(),this._on(this.button,this._buttonEvents),this.button.one("focusin",function(){t.menuItems||t._refreshMenu()}),this._hoverable(this.button),this._focusable(this.button)},_drawMenu:function(){var t=this;this.menu=e("<ul>",{"aria-hidden":"true","aria-labelledby":this.ids.button,id:this.ids.menu}),this.menuWrap=e("<div>",{"class":"ui-selectmenu-menu ui-front"}).append(this.menu).appendTo(this._appendTo()),this.menuInstance=this.menu.menu({role:"listbox",select:function(e,i){e.preventDefault(),t._select(i.item.data("ui-selectmenu-item"),e)},focus:function(e,i){var s=i.item.data("ui-selectmenu-item");null!=t.focusIndex&&s.index!==t.focusIndex&&(t._trigger("focus",e,{item:s}),t.isOpen||t._select(s,e)),t.focusIndex=s.index,t.button.attr("aria-activedescendant",t.menuItems.eq(s.index).attr("id"))}}).menu("instance"),this.menu.addClass("ui-corner-bottom").removeClass("ui-corner-all"),this.menuInstance._off(this.menu,"mouseleave"),this.menuInstance._closeOnDocumentClick=function(){return!1},this.menuInstance._isDivider=function(){return!1}},refresh:function(){this._refreshMenu(),this._setText(this.buttonText,this._getSelectedItem().text()),this.options.width||this._resizeButton()},_refreshMenu:function(){this.menu.empty();var e,t=this.element.find("option");t.length&&(this._parseOptions(t),this._renderMenu(this.menu,this.items),this.menuInstance.refresh(),this.menuItems=this.menu.find("li").not(".ui-selectmenu-optgroup"),e=this._getSelectedItem(),this.menuInstance.focus(null,e),this._setAria(e.data("ui-selectmenu-item")),this._setOption("disabled",this.element.prop("disabled")))},open:function(e){this.options.disabled||(this.menuItems?(this.menu.find(".ui-state-focus").removeClass("ui-state-focus"),this.menuInstance.focus(null,this._getSelectedItem())):this._refreshMenu(),this.isOpen=!0,this._toggleAttr(),this._resizeMenu(),this._position(),this._on(this.document,this._documentClick),this._trigger("open",e))},_position:function(){this.menuWrap.position(e.extend({of:this.button},this.options.position))},close:function(e){this.isOpen&&(this.isOpen=!1,this._toggleAttr(),this._off(this.document),this._trigger("close",e))},widget:function(){return this.button},menuWidget:function(){return this.menu},_renderMenu:function(t,i){var s=this,n="";e.each(i,function(i,a){a.optgroup!==n&&(e("<li>",{"class":"ui-selectmenu-optgroup ui-menu-divider"+(a.element.parent("optgroup").prop("disabled")?" ui-state-disabled":""),text:a.optgroup}).appendTo(t),n=a.optgroup),s._renderItemData(t,a)})},_renderItemData:function(e,t){return this._renderItem(e,t).data("ui-selectmenu-item",t)},_renderItem:function(t,i){var s=e("<li>");return i.disabled&&s.addClass("ui-state-disabled"),this._setText(s,i.label),s.appendTo(t)},_setText:function(e,t){t?e.text(t):e.html("&#160;")},_move:function(e,t){var i,s,n=".ui-menu-item";this.isOpen?i=this.menuItems.eq(this.focusIndex):(i=this.menuItems.eq(this.element[0].selectedIndex),n+=":not(.ui-state-disabled)"),s="first"===e||"last"===e?i["first"===e?"prevAll":"nextAll"](n).eq(-1):i[e+"All"](n).eq(0),s.length&&this.menuInstance.focus(t,s)},_getSelectedItem:function(){return this.menuItems.eq(this.element[0].selectedIndex)},_toggle:function(e){this[this.isOpen?"close":"open"](e)},_documentClick:{mousedown:function(t){this.isOpen&&(e(t.target).closest(".ui-selectmenu-menu, #"+this.ids.button).length||this.close(t))}},_buttonEvents:{mousedown:function(e){e.preventDefault()},click:"_toggle",keydown:function(t){var i=!0;switch(t.keyCode){case e.ui.keyCode.TAB:case e.ui.keyCode.ESCAPE:this.close(t),i=!1;break;case e.ui.keyCode.ENTER:this.isOpen&&this._selectFocusedItem(t);break;case e.ui.keyCode.UP:t.altKey?this._toggle(t):this._move("prev",t);break;case e.ui.keyCode.DOWN:t.altKey?this._toggle(t):this._move("next",t);break;case e.ui.keyCode.SPACE:this.isOpen?this._selectFocusedItem(t):this._toggle(t);break;case e.ui.keyCode.LEFT:this._move("prev",t);break;case e.ui.keyCode.RIGHT:this._move("next",t);break;case e.ui.keyCode.HOME:case e.ui.keyCode.PAGE_UP:this._move("first",t);break;case e.ui.keyCode.END:case e.ui.keyCode.PAGE_DOWN:this._move("last",t);break;default:this.menu.trigger(t),i=!1}i&&t.preventDefault()}},_selectFocusedItem:function(e){var t=this.menuItems.eq(this.focusIndex);t.hasClass("ui-state-disabled")||this._select(t.data("ui-selectmenu-item"),e)},_select:function(e,t){var i=this.element[0].selectedIndex;this.element[0].selectedIndex=e.index,this._setText(this.buttonText,e.label),this._setAria(e),this._trigger("select",t,{item:e}),e.index!==i&&this._trigger("change",t,{item:e}),this.close(t)},_setAria:function(e){var t=this.menuItems.eq(e.index).attr("id");this.button.attr({"aria-labelledby":t,"aria-activedescendant":t}),this.menu.attr("aria-activedescendant",t)},_setOption:function(e,t){"icons"===e&&this.button.find("span.ui-icon").removeClass(this.options.icons.button).addClass(t.button),this._super(e,t),"appendTo"===e&&this.menuWrap.appendTo(this._appendTo()),"disabled"===e&&(this.menuInstance.option("disabled",t),this.button.toggleClass("ui-state-disabled",t).attr("aria-disabled",t),this.element.prop("disabled",t),t?(this.button.attr("tabindex",-1),this.close()):this.button.attr("tabindex",0)),"width"===e&&this._resizeButton()},_appendTo:function(){var t=this.options.appendTo;return t&&(t=t.jquery||t.nodeType?e(t):this.document.find(t).eq(0)),t&&t[0]||(t=this.element.closest(".ui-front")),t.length||(t=this.document[0].body),t},_toggleAttr:function(){this.button.toggleClass("ui-corner-top",this.isOpen).toggleClass("ui-corner-all",!this.isOpen).attr("aria-expanded",this.isOpen),this.menuWrap.toggleClass("ui-selectmenu-open",this.isOpen),this.menu.attr("aria-hidden",!this.isOpen)},_resizeButton:function(){var e=this.options.width;e||(e=this.element.show().outerWidth(),this.element.hide()),this.button.outerWidth(e)},_resizeMenu:function(){this.menu.outerWidth(Math.max(this.button.outerWidth(),this.menu.width("").outerWidth()+1))},_getCreateOptions:function(){return{disabled:this.element.prop("disabled")}},_parseOptions:function(t){var i=[];t.each(function(t,s){var n=e(s),a=n.parent("optgroup");i.push({element:n,index:t,value:n.attr("value"),label:n.text(),optgroup:a.attr("label")||"",disabled:a.prop("disabled")||n.prop("disabled")})}),this.items=i},_destroy:function(){this.menuWrap.remove(),this.button.remove(),this.element.show(),this.element.removeUniqueId(),this.label.attr("for",this.ids.element)}}),e.widget("ui.slider",e.ui.mouse,{version:"1.11.1",widgetEventPrefix:"slide",options:{animate:!1,distance:0,max:100,min:0,orientation:"horizontal",range:!1,step:1,value:0,values:null,change:null,slide:null,start:null,stop:null},numPages:5,_create:function(){this._keySliding=!1,this._mouseSliding=!1,this._animateOff=!0,this._handleIndex=null,this._detectOrientation(),this._mouseInit(),this.element.addClass("ui-slider ui-slider-"+this.orientation+" ui-widget"+" ui-widget-content"+" ui-corner-all"),this._refresh(),this._setOption("disabled",this.options.disabled),this._animateOff=!1},_refresh:function(){this._createRange(),this._createHandles(),this._setupEvents(),this._refreshValue()},_createHandles:function(){var t,i,s=this.options,n=this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"),a="<span class='ui-slider-handle ui-state-default ui-corner-all' tabindex='0'></span>",o=[];for(i=s.values&&s.values.length||1,n.length>i&&(n.slice(i).remove(),n=n.slice(0,i)),t=n.length;i>t;t++)o.push(a);this.handles=n.add(e(o.join("")).appendTo(this.element)),this.handle=this.handles.eq(0),this.handles.each(function(t){e(this).data("ui-slider-handle-index",t)})},_createRange:function(){var t=this.options,i="";t.range?(t.range===!0&&(t.values?t.values.length&&2!==t.values.length?t.values=[t.values[0],t.values[0]]:e.isArray(t.values)&&(t.values=t.values.slice(0)):t.values=[this._valueMin(),this._valueMin()]),this.range&&this.range.length?this.range.removeClass("ui-slider-range-min ui-slider-range-max").css({left:"",bottom:""}):(this.range=e("<div></div>").appendTo(this.element),i="ui-slider-range ui-widget-header ui-corner-all"),this.range.addClass(i+("min"===t.range||"max"===t.range?" ui-slider-range-"+t.range:""))):(this.range&&this.range.remove(),this.range=null)},_setupEvents:function(){this._off(this.handles),this._on(this.handles,this._handleEvents),this._hoverable(this.handles),this._focusable(this.handles)},_destroy:function(){this.handles.remove(),this.range&&this.range.remove(),this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-widget ui-widget-content ui-corner-all"),this._mouseDestroy()},_mouseCapture:function(t){var i,s,n,a,o,r,h,l,u=this,d=this.options;return d.disabled?!1:(this.elementSize={width:this.element.outerWidth(),height:this.element.outerHeight()},this.elementOffset=this.element.offset(),i={x:t.pageX,y:t.pageY},s=this._normValueFromMouse(i),n=this._valueMax()-this._valueMin()+1,this.handles.each(function(t){var i=Math.abs(s-u.values(t));(n>i||n===i&&(t===u._lastChangedValue||u.values(t)===d.min))&&(n=i,a=e(this),o=t)}),r=this._start(t,o),r===!1?!1:(this._mouseSliding=!0,this._handleIndex=o,a.addClass("ui-state-active").focus(),h=a.offset(),l=!e(t.target).parents().addBack().is(".ui-slider-handle"),this._clickOffset=l?{left:0,top:0}:{left:t.pageX-h.left-a.width()/2,top:t.pageY-h.top-a.height()/2-(parseInt(a.css("borderTopWidth"),10)||0)-(parseInt(a.css("borderBottomWidth"),10)||0)+(parseInt(a.css("marginTop"),10)||0)},this.handles.hasClass("ui-state-hover")||this._slide(t,o,s),this._animateOff=!0,!0))},_mouseStart:function(){return!0},_mouseDrag:function(e){var t={x:e.pageX,y:e.pageY},i=this._normValueFromMouse(t);return this._slide(e,this._handleIndex,i),!1},_mouseStop:function(e){return this.handles.removeClass("ui-state-active"),this._mouseSliding=!1,this._stop(e,this._handleIndex),this._change(e,this._handleIndex),this._handleIndex=null,this._clickOffset=null,this._animateOff=!1,!1},_detectOrientation:function(){this.orientation="vertical"===this.options.orientation?"vertical":"horizontal"},_normValueFromMouse:function(e){var t,i,s,n,a;return"horizontal"===this.orientation?(t=this.elementSize.width,i=e.x-this.elementOffset.left-(this._clickOffset?this._clickOffset.left:0)):(t=this.elementSize.height,i=e.y-this.elementOffset.top-(this._clickOffset?this._clickOffset.top:0)),s=i/t,s>1&&(s=1),0>s&&(s=0),"vertical"===this.orientation&&(s=1-s),n=this._valueMax()-this._valueMin(),a=this._valueMin()+s*n,this._trimAlignValue(a)},_start:function(e,t){var i={handle:this.handles[t],value:this.value()};return this.options.values&&this.options.values.length&&(i.value=this.values(t),i.values=this.values()),this._trigger("start",e,i)},_slide:function(e,t,i){var s,n,a;this.options.values&&this.options.values.length?(s=this.values(t?0:1),2===this.options.values.length&&this.options.range===!0&&(0===t&&i>s||1===t&&s>i)&&(i=s),i!==this.values(t)&&(n=this.values(),n[t]=i,a=this._trigger("slide",e,{handle:this.handles[t],value:i,values:n}),s=this.values(t?0:1),a!==!1&&this.values(t,i))):i!==this.value()&&(a=this._trigger("slide",e,{handle:this.handles[t],value:i}),a!==!1&&this.value(i))},_stop:function(e,t){var i={handle:this.handles[t],value:this.value()};this.options.values&&this.options.values.length&&(i.value=this.values(t),i.values=this.values()),this._trigger("stop",e,i)},_change:function(e,t){if(!this._keySliding&&!this._mouseSliding){var i={handle:this.handles[t],value:this.value()};this.options.values&&this.options.values.length&&(i.value=this.values(t),i.values=this.values()),this._lastChangedValue=t,this._trigger("change",e,i)}},value:function(e){return arguments.length?(this.options.value=this._trimAlignValue(e),this._refreshValue(),this._change(null,0),void 0):this._value()},values:function(t,i){var s,n,a;if(arguments.length>1)return this.options.values[t]=this._trimAlignValue(i),this._refreshValue(),this._change(null,t),void 0;if(!arguments.length)return this._values();if(!e.isArray(arguments[0]))return this.options.values&&this.options.values.length?this._values(t):this.value();for(s=this.options.values,n=arguments[0],a=0;s.length>a;a+=1)s[a]=this._trimAlignValue(n[a]),this._change(null,a);this._refreshValue()},_setOption:function(t,i){var s,n=0;switch("range"===t&&this.options.range===!0&&("min"===i?(this.options.value=this._values(0),this.options.values=null):"max"===i&&(this.options.value=this._values(this.options.values.length-1),this.options.values=null)),e.isArray(this.options.values)&&(n=this.options.values.length),"disabled"===t&&this.element.toggleClass("ui-state-disabled",!!i),this._super(t,i),t){case"orientation":this._detectOrientation(),this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-"+this.orientation),this._refreshValue(),this.handles.css("horizontal"===i?"bottom":"left","");break;case"value":this._animateOff=!0,this._refreshValue(),this._change(null,0),this._animateOff=!1;break;case"values":for(this._animateOff=!0,this._refreshValue(),s=0;n>s;s+=1)this._change(null,s);this._animateOff=!1;break;case"min":case"max":this._animateOff=!0,this._refreshValue(),this._animateOff=!1;break;case"range":this._animateOff=!0,this._refresh(),this._animateOff=!1}},_value:function(){var e=this.options.value;return e=this._trimAlignValue(e)},_values:function(e){var t,i,s;if(arguments.length)return t=this.options.values[e],t=this._trimAlignValue(t);if(this.options.values&&this.options.values.length){for(i=this.options.values.slice(),s=0;i.length>s;s+=1)i[s]=this._trimAlignValue(i[s]);return i}return[]},_trimAlignValue:function(e){if(this._valueMin()>=e)return this._valueMin();if(e>=this._valueMax())return this._valueMax();var t=this.options.step>0?this.options.step:1,i=(e-this._valueMin())%t,s=e-i;return 2*Math.abs(i)>=t&&(s+=i>0?t:-t),parseFloat(s.toFixed(5))},_valueMin:function(){return this.options.min},_valueMax:function(){return this.options.max},_refreshValue:function(){var t,i,s,n,a,o=this.options.range,r=this.options,h=this,l=this._animateOff?!1:r.animate,u={};this.options.values&&this.options.values.length?this.handles.each(function(s){i=100*((h.values(s)-h._valueMin())/(h._valueMax()-h._valueMin())),u["horizontal"===h.orientation?"left":"bottom"]=i+"%",e(this).stop(1,1)[l?"animate":"css"](u,r.animate),h.options.range===!0&&("horizontal"===h.orientation?(0===s&&h.range.stop(1,1)[l?"animate":"css"]({left:i+"%"},r.animate),1===s&&h.range[l?"animate":"css"]({width:i-t+"%"},{queue:!1,duration:r.animate})):(0===s&&h.range.stop(1,1)[l?"animate":"css"]({bottom:i+"%"},r.animate),1===s&&h.range[l?"animate":"css"]({height:i-t+"%"},{queue:!1,duration:r.animate}))),t=i}):(s=this.value(),n=this._valueMin(),a=this._valueMax(),i=a!==n?100*((s-n)/(a-n)):0,u["horizontal"===this.orientation?"left":"bottom"]=i+"%",this.handle.stop(1,1)[l?"animate":"css"](u,r.animate),"min"===o&&"horizontal"===this.orientation&&this.range.stop(1,1)[l?"animate":"css"]({width:i+"%"},r.animate),"max"===o&&"horizontal"===this.orientation&&this.range[l?"animate":"css"]({width:100-i+"%"},{queue:!1,duration:r.animate}),"min"===o&&"vertical"===this.orientation&&this.range.stop(1,1)[l?"animate":"css"]({height:i+"%"},r.animate),"max"===o&&"vertical"===this.orientation&&this.range[l?"animate":"css"]({height:100-i+"%"},{queue:!1,duration:r.animate}))},_handleEvents:{keydown:function(t){var i,s,n,a,o=e(t.target).data("ui-slider-handle-index");switch(t.keyCode){case e.ui.keyCode.HOME:case e.ui.keyCode.END:case e.ui.keyCode.PAGE_UP:case e.ui.keyCode.PAGE_DOWN:case e.ui.keyCode.UP:case e.ui.keyCode.RIGHT:case e.ui.keyCode.DOWN:case e.ui.keyCode.LEFT:if(t.preventDefault(),!this._keySliding&&(this._keySliding=!0,e(t.target).addClass("ui-state-active"),i=this._start(t,o),i===!1))return}switch(a=this.options.step,s=n=this.options.values&&this.options.values.length?this.values(o):this.value(),t.keyCode){case e.ui.keyCode.HOME:n=this._valueMin();break;case e.ui.keyCode.END:n=this._valueMax();break;case e.ui.keyCode.PAGE_UP:n=this._trimAlignValue(s+(this._valueMax()-this._valueMin())/this.numPages);break;case e.ui.keyCode.PAGE_DOWN:n=this._trimAlignValue(s-(this._valueMax()-this._valueMin())/this.numPages);break;case e.ui.keyCode.UP:case e.ui.keyCode.RIGHT:if(s===this._valueMax())return;n=this._trimAlignValue(s+a);break;case e.ui.keyCode.DOWN:case e.ui.keyCode.LEFT:if(s===this._valueMin())return;n=this._trimAlignValue(s-a)}this._slide(t,o,n)},keyup:function(t){var i=e(t.target).data("ui-slider-handle-index");this._keySliding&&(this._keySliding=!1,this._stop(t,i),this._change(t,i),e(t.target).removeClass("ui-state-active"))}}}),e.widget("ui.sortable",e.ui.mouse,{version:"1.11.1",widgetEventPrefix:"sort",ready:!1,options:{appendTo:"parent",axis:!1,connectWith:!1,containment:!1,cursor:"auto",cursorAt:!1,dropOnEmpty:!0,forcePlaceholderSize:!1,forceHelperSize:!1,grid:!1,handle:!1,helper:"original",items:"> *",opacity:!1,placeholder:!1,revert:!1,scroll:!0,scrollSensitivity:20,scrollSpeed:20,scope:"default",tolerance:"intersect",zIndex:1e3,activate:null,beforeStop:null,change:null,deactivate:null,out:null,over:null,receive:null,remove:null,sort:null,start:null,stop:null,update:null},_isOverAxis:function(e,t,i){return e>=t&&t+i>e},_isFloating:function(e){return/left|right/.test(e.css("float"))||/inline|table-cell/.test(e.css("display"))},_create:function(){var e=this.options;this.containerCache={},this.element.addClass("ui-sortable"),this.refresh(),this.floating=this.items.length?"x"===e.axis||this._isFloating(this.items[0].item):!1,this.offset=this.element.offset(),this._mouseInit(),this._setHandleClassName(),this.ready=!0},_setOption:function(e,t){this._super(e,t),"handle"===e&&this._setHandleClassName()},_setHandleClassName:function(){this.element.find(".ui-sortable-handle").removeClass("ui-sortable-handle"),e.each(this.items,function(){(this.instance.options.handle?this.item.find(this.instance.options.handle):this.item).addClass("ui-sortable-handle")})},_destroy:function(){this.element.removeClass("ui-sortable ui-sortable-disabled").find(".ui-sortable-handle").removeClass("ui-sortable-handle"),this._mouseDestroy();for(var e=this.items.length-1;e>=0;e--)this.items[e].item.removeData(this.widgetName+"-item");return this},_mouseCapture:function(t,i){var s=null,n=!1,a=this;return this.reverting?!1:this.options.disabled||"static"===this.options.type?!1:(this._refreshItems(t),e(t.target).parents().each(function(){return e.data(this,a.widgetName+"-item")===a?(s=e(this),!1):void 0}),e.data(t.target,a.widgetName+"-item")===a&&(s=e(t.target)),s?!this.options.handle||i||(e(this.options.handle,s).find("*").addBack().each(function(){this===t.target&&(n=!0)}),n)?(this.currentItem=s,this._removeCurrentsFromItems(),!0):!1:!1)},_mouseStart:function(t,i,s){var n,a,o=this.options;if(this.currentContainer=this,this.refreshPositions(),this.helper=this._createHelper(t),this._cacheHelperProportions(),this._cacheMargins(),this.scrollParent=this.helper.scrollParent(),this.offset=this.currentItem.offset(),this.offset={top:this.offset.top-this.margins.top,left:this.offset.left-this.margins.left},e.extend(this.offset,{click:{left:t.pageX-this.offset.left,top:t.pageY-this.offset.top},parent:this._getParentOffset(),relative:this._getRelativeOffset()}),this.helper.css("position","absolute"),this.cssPosition=this.helper.css("position"),this.originalPosition=this._generatePosition(t),this.originalPageX=t.pageX,this.originalPageY=t.pageY,o.cursorAt&&this._adjustOffsetFromHelper(o.cursorAt),this.domPosition={prev:this.currentItem.prev()[0],parent:this.currentItem.parent()[0]},this.helper[0]!==this.currentItem[0]&&this.currentItem.hide(),this._createPlaceholder(),o.containment&&this._setContainment(),o.cursor&&"auto"!==o.cursor&&(a=this.document.find("body"),this.storedCursor=a.css("cursor"),a.css("cursor",o.cursor),this.storedStylesheet=e("<style>*{ cursor: "+o.cursor+" !important; }</style>").appendTo(a)),o.opacity&&(this.helper.css("opacity")&&(this._storedOpacity=this.helper.css("opacity")),this.helper.css("opacity",o.opacity)),o.zIndex&&(this.helper.css("zIndex")&&(this._storedZIndex=this.helper.css("zIndex")),this.helper.css("zIndex",o.zIndex)),this.scrollParent[0]!==document&&"HTML"!==this.scrollParent[0].tagName&&(this.overflowOffset=this.scrollParent.offset()),this._trigger("start",t,this._uiHash()),this._preserveHelperProportions||this._cacheHelperProportions(),!s)for(n=this.containers.length-1;n>=0;n--)this.containers[n]._trigger("activate",t,this._uiHash(this));
return e.ui.ddmanager&&(e.ui.ddmanager.current=this),e.ui.ddmanager&&!o.dropBehaviour&&e.ui.ddmanager.prepareOffsets(this,t),this.dragging=!0,this.helper.addClass("ui-sortable-helper"),this._mouseDrag(t),!0},_mouseDrag:function(t){var i,s,n,a,o=this.options,r=!1;for(this.position=this._generatePosition(t),this.positionAbs=this._convertPositionTo("absolute"),this.lastPositionAbs||(this.lastPositionAbs=this.positionAbs),this.options.scroll&&(this.scrollParent[0]!==document&&"HTML"!==this.scrollParent[0].tagName?(this.overflowOffset.top+this.scrollParent[0].offsetHeight-t.pageY<o.scrollSensitivity?this.scrollParent[0].scrollTop=r=this.scrollParent[0].scrollTop+o.scrollSpeed:t.pageY-this.overflowOffset.top<o.scrollSensitivity&&(this.scrollParent[0].scrollTop=r=this.scrollParent[0].scrollTop-o.scrollSpeed),this.overflowOffset.left+this.scrollParent[0].offsetWidth-t.pageX<o.scrollSensitivity?this.scrollParent[0].scrollLeft=r=this.scrollParent[0].scrollLeft+o.scrollSpeed:t.pageX-this.overflowOffset.left<o.scrollSensitivity&&(this.scrollParent[0].scrollLeft=r=this.scrollParent[0].scrollLeft-o.scrollSpeed)):(t.pageY-e(document).scrollTop()<o.scrollSensitivity?r=e(document).scrollTop(e(document).scrollTop()-o.scrollSpeed):e(window).height()-(t.pageY-e(document).scrollTop())<o.scrollSensitivity&&(r=e(document).scrollTop(e(document).scrollTop()+o.scrollSpeed)),t.pageX-e(document).scrollLeft()<o.scrollSensitivity?r=e(document).scrollLeft(e(document).scrollLeft()-o.scrollSpeed):e(window).width()-(t.pageX-e(document).scrollLeft())<o.scrollSensitivity&&(r=e(document).scrollLeft(e(document).scrollLeft()+o.scrollSpeed))),r!==!1&&e.ui.ddmanager&&!o.dropBehaviour&&e.ui.ddmanager.prepareOffsets(this,t)),this.positionAbs=this._convertPositionTo("absolute"),this.options.axis&&"y"===this.options.axis||(this.helper[0].style.left=this.position.left+"px"),this.options.axis&&"x"===this.options.axis||(this.helper[0].style.top=this.position.top+"px"),i=this.items.length-1;i>=0;i--)if(s=this.items[i],n=s.item[0],a=this._intersectsWithPointer(s),a&&s.instance===this.currentContainer&&n!==this.currentItem[0]&&this.placeholder[1===a?"next":"prev"]()[0]!==n&&!e.contains(this.placeholder[0],n)&&("semi-dynamic"===this.options.type?!e.contains(this.element[0],n):!0)){if(this.direction=1===a?"down":"up","pointer"!==this.options.tolerance&&!this._intersectsWithSides(s))break;this._rearrange(t,s),this._trigger("change",t,this._uiHash());break}return this._contactContainers(t),e.ui.ddmanager&&e.ui.ddmanager.drag(this,t),this._trigger("sort",t,this._uiHash()),this.lastPositionAbs=this.positionAbs,!1},_mouseStop:function(t,i){if(t){if(e.ui.ddmanager&&!this.options.dropBehaviour&&e.ui.ddmanager.drop(this,t),this.options.revert){var s=this,n=this.placeholder.offset(),a=this.options.axis,o={};a&&"x"!==a||(o.left=n.left-this.offset.parent.left-this.margins.left+(this.offsetParent[0]===document.body?0:this.offsetParent[0].scrollLeft)),a&&"y"!==a||(o.top=n.top-this.offset.parent.top-this.margins.top+(this.offsetParent[0]===document.body?0:this.offsetParent[0].scrollTop)),this.reverting=!0,e(this.helper).animate(o,parseInt(this.options.revert,10)||500,function(){s._clear(t)})}else this._clear(t,i);return!1}},cancel:function(){if(this.dragging){this._mouseUp({target:null}),"original"===this.options.helper?this.currentItem.css(this._storedCSS).removeClass("ui-sortable-helper"):this.currentItem.show();for(var t=this.containers.length-1;t>=0;t--)this.containers[t]._trigger("deactivate",null,this._uiHash(this)),this.containers[t].containerCache.over&&(this.containers[t]._trigger("out",null,this._uiHash(this)),this.containers[t].containerCache.over=0)}return this.placeholder&&(this.placeholder[0].parentNode&&this.placeholder[0].parentNode.removeChild(this.placeholder[0]),"original"!==this.options.helper&&this.helper&&this.helper[0].parentNode&&this.helper.remove(),e.extend(this,{helper:null,dragging:!1,reverting:!1,_noFinalSort:null}),this.domPosition.prev?e(this.domPosition.prev).after(this.currentItem):e(this.domPosition.parent).prepend(this.currentItem)),this},serialize:function(t){var i=this._getItemsAsjQuery(t&&t.connected),s=[];return t=t||{},e(i).each(function(){var i=(e(t.item||this).attr(t.attribute||"id")||"").match(t.expression||/(.+)[\-=_](.+)/);i&&s.push((t.key||i[1]+"[]")+"="+(t.key&&t.expression?i[1]:i[2]))}),!s.length&&t.key&&s.push(t.key+"="),s.join("&")},toArray:function(t){var i=this._getItemsAsjQuery(t&&t.connected),s=[];return t=t||{},i.each(function(){s.push(e(t.item||this).attr(t.attribute||"id")||"")}),s},_intersectsWith:function(e){var t=this.positionAbs.left,i=t+this.helperProportions.width,s=this.positionAbs.top,n=s+this.helperProportions.height,a=e.left,o=a+e.width,r=e.top,h=r+e.height,l=this.offset.click.top,u=this.offset.click.left,d="x"===this.options.axis||s+l>r&&h>s+l,c="y"===this.options.axis||t+u>a&&o>t+u,p=d&&c;return"pointer"===this.options.tolerance||this.options.forcePointerForContainers||"pointer"!==this.options.tolerance&&this.helperProportions[this.floating?"width":"height"]>e[this.floating?"width":"height"]?p:t+this.helperProportions.width/2>a&&o>i-this.helperProportions.width/2&&s+this.helperProportions.height/2>r&&h>n-this.helperProportions.height/2},_intersectsWithPointer:function(e){var t="x"===this.options.axis||this._isOverAxis(this.positionAbs.top+this.offset.click.top,e.top,e.height),i="y"===this.options.axis||this._isOverAxis(this.positionAbs.left+this.offset.click.left,e.left,e.width),s=t&&i,n=this._getDragVerticalDirection(),a=this._getDragHorizontalDirection();return s?this.floating?a&&"right"===a||"down"===n?2:1:n&&("down"===n?2:1):!1},_intersectsWithSides:function(e){var t=this._isOverAxis(this.positionAbs.top+this.offset.click.top,e.top+e.height/2,e.height),i=this._isOverAxis(this.positionAbs.left+this.offset.click.left,e.left+e.width/2,e.width),s=this._getDragVerticalDirection(),n=this._getDragHorizontalDirection();return this.floating&&n?"right"===n&&i||"left"===n&&!i:s&&("down"===s&&t||"up"===s&&!t)},_getDragVerticalDirection:function(){var e=this.positionAbs.top-this.lastPositionAbs.top;return 0!==e&&(e>0?"down":"up")},_getDragHorizontalDirection:function(){var e=this.positionAbs.left-this.lastPositionAbs.left;return 0!==e&&(e>0?"right":"left")},refresh:function(e){return this._refreshItems(e),this._setHandleClassName(),this.refreshPositions(),this},_connectWith:function(){var e=this.options;return e.connectWith.constructor===String?[e.connectWith]:e.connectWith},_getItemsAsjQuery:function(t){function i(){r.push(this)}var s,n,a,o,r=[],h=[],l=this._connectWith();if(l&&t)for(s=l.length-1;s>=0;s--)for(a=e(l[s]),n=a.length-1;n>=0;n--)o=e.data(a[n],this.widgetFullName),o&&o!==this&&!o.options.disabled&&h.push([e.isFunction(o.options.items)?o.options.items.call(o.element):e(o.options.items,o.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"),o]);for(h.push([e.isFunction(this.options.items)?this.options.items.call(this.element,null,{options:this.options,item:this.currentItem}):e(this.options.items,this.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"),this]),s=h.length-1;s>=0;s--)h[s][0].each(i);return e(r)},_removeCurrentsFromItems:function(){var t=this.currentItem.find(":data("+this.widgetName+"-item)");this.items=e.grep(this.items,function(e){for(var i=0;t.length>i;i++)if(t[i]===e.item[0])return!1;return!0})},_refreshItems:function(t){this.items=[],this.containers=[this];var i,s,n,a,o,r,h,l,u=this.items,d=[[e.isFunction(this.options.items)?this.options.items.call(this.element[0],t,{item:this.currentItem}):e(this.options.items,this.element),this]],c=this._connectWith();if(c&&this.ready)for(i=c.length-1;i>=0;i--)for(n=e(c[i]),s=n.length-1;s>=0;s--)a=e.data(n[s],this.widgetFullName),a&&a!==this&&!a.options.disabled&&(d.push([e.isFunction(a.options.items)?a.options.items.call(a.element[0],t,{item:this.currentItem}):e(a.options.items,a.element),a]),this.containers.push(a));for(i=d.length-1;i>=0;i--)for(o=d[i][1],r=d[i][0],s=0,l=r.length;l>s;s++)h=e(r[s]),h.data(this.widgetName+"-item",o),u.push({item:h,instance:o,width:0,height:0,left:0,top:0})},refreshPositions:function(t){this.offsetParent&&this.helper&&(this.offset.parent=this._getParentOffset());var i,s,n,a;for(i=this.items.length-1;i>=0;i--)s=this.items[i],s.instance!==this.currentContainer&&this.currentContainer&&s.item[0]!==this.currentItem[0]||(n=this.options.toleranceElement?e(this.options.toleranceElement,s.item):s.item,t||(s.width=n.outerWidth(),s.height=n.outerHeight()),a=n.offset(),s.left=a.left,s.top=a.top);if(this.options.custom&&this.options.custom.refreshContainers)this.options.custom.refreshContainers.call(this);else for(i=this.containers.length-1;i>=0;i--)a=this.containers[i].element.offset(),this.containers[i].containerCache.left=a.left,this.containers[i].containerCache.top=a.top,this.containers[i].containerCache.width=this.containers[i].element.outerWidth(),this.containers[i].containerCache.height=this.containers[i].element.outerHeight();return this},_createPlaceholder:function(t){t=t||this;var i,s=t.options;s.placeholder&&s.placeholder.constructor!==String||(i=s.placeholder,s.placeholder={element:function(){var s=t.currentItem[0].nodeName.toLowerCase(),n=e("<"+s+">",t.document[0]).addClass(i||t.currentItem[0].className+" ui-sortable-placeholder").removeClass("ui-sortable-helper");return"tr"===s?t.currentItem.children().each(function(){e("<td>&#160;</td>",t.document[0]).attr("colspan",e(this).attr("colspan")||1).appendTo(n)}):"img"===s&&n.attr("src",t.currentItem.attr("src")),i||n.css("visibility","hidden"),n},update:function(e,n){(!i||s.forcePlaceholderSize)&&(n.height()||n.height(t.currentItem.innerHeight()-parseInt(t.currentItem.css("paddingTop")||0,10)-parseInt(t.currentItem.css("paddingBottom")||0,10)),n.width()||n.width(t.currentItem.innerWidth()-parseInt(t.currentItem.css("paddingLeft")||0,10)-parseInt(t.currentItem.css("paddingRight")||0,10)))}}),t.placeholder=e(s.placeholder.element.call(t.element,t.currentItem)),t.currentItem.after(t.placeholder),s.placeholder.update(t,t.placeholder)},_contactContainers:function(t){var i,s,n,a,o,r,h,l,u,d,c=null,p=null;for(i=this.containers.length-1;i>=0;i--)if(!e.contains(this.currentItem[0],this.containers[i].element[0]))if(this._intersectsWith(this.containers[i].containerCache)){if(c&&e.contains(this.containers[i].element[0],c.element[0]))continue;c=this.containers[i],p=i}else this.containers[i].containerCache.over&&(this.containers[i]._trigger("out",t,this._uiHash(this)),this.containers[i].containerCache.over=0);if(c)if(1===this.containers.length)this.containers[p].containerCache.over||(this.containers[p]._trigger("over",t,this._uiHash(this)),this.containers[p].containerCache.over=1);else{for(n=1e4,a=null,u=c.floating||this._isFloating(this.currentItem),o=u?"left":"top",r=u?"width":"height",d=u?"clientX":"clientY",s=this.items.length-1;s>=0;s--)e.contains(this.containers[p].element[0],this.items[s].item[0])&&this.items[s].item[0]!==this.currentItem[0]&&(h=this.items[s].item.offset()[o],l=!1,t[d]-h>this.items[s][r]/2&&(l=!0),n>Math.abs(t[d]-h)&&(n=Math.abs(t[d]-h),a=this.items[s],this.direction=l?"up":"down"));if(!a&&!this.options.dropOnEmpty)return;if(this.currentContainer===this.containers[p])return;a?this._rearrange(t,a,null,!0):this._rearrange(t,null,this.containers[p].element,!0),this._trigger("change",t,this._uiHash()),this.containers[p]._trigger("change",t,this._uiHash(this)),this.currentContainer=this.containers[p],this.options.placeholder.update(this.currentContainer,this.placeholder),this.containers[p]._trigger("over",t,this._uiHash(this)),this.containers[p].containerCache.over=1}},_createHelper:function(t){var i=this.options,s=e.isFunction(i.helper)?e(i.helper.apply(this.element[0],[t,this.currentItem])):"clone"===i.helper?this.currentItem.clone():this.currentItem;return s.parents("body").length||e("parent"!==i.appendTo?i.appendTo:this.currentItem[0].parentNode)[0].appendChild(s[0]),s[0]===this.currentItem[0]&&(this._storedCSS={width:this.currentItem[0].style.width,height:this.currentItem[0].style.height,position:this.currentItem.css("position"),top:this.currentItem.css("top"),left:this.currentItem.css("left")}),(!s[0].style.width||i.forceHelperSize)&&s.width(this.currentItem.width()),(!s[0].style.height||i.forceHelperSize)&&s.height(this.currentItem.height()),s},_adjustOffsetFromHelper:function(t){"string"==typeof t&&(t=t.split(" ")),e.isArray(t)&&(t={left:+t[0],top:+t[1]||0}),"left"in t&&(this.offset.click.left=t.left+this.margins.left),"right"in t&&(this.offset.click.left=this.helperProportions.width-t.right+this.margins.left),"top"in t&&(this.offset.click.top=t.top+this.margins.top),"bottom"in t&&(this.offset.click.top=this.helperProportions.height-t.bottom+this.margins.top)},_getParentOffset:function(){this.offsetParent=this.helper.offsetParent();var t=this.offsetParent.offset();return"absolute"===this.cssPosition&&this.scrollParent[0]!==document&&e.contains(this.scrollParent[0],this.offsetParent[0])&&(t.left+=this.scrollParent.scrollLeft(),t.top+=this.scrollParent.scrollTop()),(this.offsetParent[0]===document.body||this.offsetParent[0].tagName&&"html"===this.offsetParent[0].tagName.toLowerCase()&&e.ui.ie)&&(t={top:0,left:0}),{top:t.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:t.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}},_getRelativeOffset:function(){if("relative"===this.cssPosition){var e=this.currentItem.position();return{top:e.top-(parseInt(this.helper.css("top"),10)||0)+this.scrollParent.scrollTop(),left:e.left-(parseInt(this.helper.css("left"),10)||0)+this.scrollParent.scrollLeft()}}return{top:0,left:0}},_cacheMargins:function(){this.margins={left:parseInt(this.currentItem.css("marginLeft"),10)||0,top:parseInt(this.currentItem.css("marginTop"),10)||0}},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}},_setContainment:function(){var t,i,s,n=this.options;"parent"===n.containment&&(n.containment=this.helper[0].parentNode),("document"===n.containment||"window"===n.containment)&&(this.containment=[0-this.offset.relative.left-this.offset.parent.left,0-this.offset.relative.top-this.offset.parent.top,e("document"===n.containment?document:window).width()-this.helperProportions.width-this.margins.left,(e("document"===n.containment?document:window).height()||document.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top]),/^(document|window|parent)$/.test(n.containment)||(t=e(n.containment)[0],i=e(n.containment).offset(),s="hidden"!==e(t).css("overflow"),this.containment=[i.left+(parseInt(e(t).css("borderLeftWidth"),10)||0)+(parseInt(e(t).css("paddingLeft"),10)||0)-this.margins.left,i.top+(parseInt(e(t).css("borderTopWidth"),10)||0)+(parseInt(e(t).css("paddingTop"),10)||0)-this.margins.top,i.left+(s?Math.max(t.scrollWidth,t.offsetWidth):t.offsetWidth)-(parseInt(e(t).css("borderLeftWidth"),10)||0)-(parseInt(e(t).css("paddingRight"),10)||0)-this.helperProportions.width-this.margins.left,i.top+(s?Math.max(t.scrollHeight,t.offsetHeight):t.offsetHeight)-(parseInt(e(t).css("borderTopWidth"),10)||0)-(parseInt(e(t).css("paddingBottom"),10)||0)-this.helperProportions.height-this.margins.top])},_convertPositionTo:function(t,i){i||(i=this.position);var s="absolute"===t?1:-1,n="absolute"!==this.cssPosition||this.scrollParent[0]!==document&&e.contains(this.scrollParent[0],this.offsetParent[0])?this.scrollParent:this.offsetParent,a=/(html|body)/i.test(n[0].tagName);return{top:i.top+this.offset.relative.top*s+this.offset.parent.top*s-("fixed"===this.cssPosition?-this.scrollParent.scrollTop():a?0:n.scrollTop())*s,left:i.left+this.offset.relative.left*s+this.offset.parent.left*s-("fixed"===this.cssPosition?-this.scrollParent.scrollLeft():a?0:n.scrollLeft())*s}},_generatePosition:function(t){var i,s,n=this.options,a=t.pageX,o=t.pageY,r="absolute"!==this.cssPosition||this.scrollParent[0]!==document&&e.contains(this.scrollParent[0],this.offsetParent[0])?this.scrollParent:this.offsetParent,h=/(html|body)/i.test(r[0].tagName);return"relative"!==this.cssPosition||this.scrollParent[0]!==document&&this.scrollParent[0]!==this.offsetParent[0]||(this.offset.relative=this._getRelativeOffset()),this.originalPosition&&(this.containment&&(t.pageX-this.offset.click.left<this.containment[0]&&(a=this.containment[0]+this.offset.click.left),t.pageY-this.offset.click.top<this.containment[1]&&(o=this.containment[1]+this.offset.click.top),t.pageX-this.offset.click.left>this.containment[2]&&(a=this.containment[2]+this.offset.click.left),t.pageY-this.offset.click.top>this.containment[3]&&(o=this.containment[3]+this.offset.click.top)),n.grid&&(i=this.originalPageY+Math.round((o-this.originalPageY)/n.grid[1])*n.grid[1],o=this.containment?i-this.offset.click.top>=this.containment[1]&&i-this.offset.click.top<=this.containment[3]?i:i-this.offset.click.top>=this.containment[1]?i-n.grid[1]:i+n.grid[1]:i,s=this.originalPageX+Math.round((a-this.originalPageX)/n.grid[0])*n.grid[0],a=this.containment?s-this.offset.click.left>=this.containment[0]&&s-this.offset.click.left<=this.containment[2]?s:s-this.offset.click.left>=this.containment[0]?s-n.grid[0]:s+n.grid[0]:s)),{top:o-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+("fixed"===this.cssPosition?-this.scrollParent.scrollTop():h?0:r.scrollTop()),left:a-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+("fixed"===this.cssPosition?-this.scrollParent.scrollLeft():h?0:r.scrollLeft())}},_rearrange:function(e,t,i,s){i?i[0].appendChild(this.placeholder[0]):t.item[0].parentNode.insertBefore(this.placeholder[0],"down"===this.direction?t.item[0]:t.item[0].nextSibling),this.counter=this.counter?++this.counter:1;var n=this.counter;this._delay(function(){n===this.counter&&this.refreshPositions(!s)})},_clear:function(e,t){function i(e,t,i){return function(s){i._trigger(e,s,t._uiHash(t))}}this.reverting=!1;var s,n=[];if(!this._noFinalSort&&this.currentItem.parent().length&&this.placeholder.before(this.currentItem),this._noFinalSort=null,this.helper[0]===this.currentItem[0]){for(s in this._storedCSS)("auto"===this._storedCSS[s]||"static"===this._storedCSS[s])&&(this._storedCSS[s]="");this.currentItem.css(this._storedCSS).removeClass("ui-sortable-helper")}else this.currentItem.show();for(this.fromOutside&&!t&&n.push(function(e){this._trigger("receive",e,this._uiHash(this.fromOutside))}),!this.fromOutside&&this.domPosition.prev===this.currentItem.prev().not(".ui-sortable-helper")[0]&&this.domPosition.parent===this.currentItem.parent()[0]||t||n.push(function(e){this._trigger("update",e,this._uiHash())}),this!==this.currentContainer&&(t||(n.push(function(e){this._trigger("remove",e,this._uiHash())}),n.push(function(e){return function(t){e._trigger("receive",t,this._uiHash(this))}}.call(this,this.currentContainer)),n.push(function(e){return function(t){e._trigger("update",t,this._uiHash(this))}}.call(this,this.currentContainer)))),s=this.containers.length-1;s>=0;s--)t||n.push(i("deactivate",this,this.containers[s])),this.containers[s].containerCache.over&&(n.push(i("out",this,this.containers[s])),this.containers[s].containerCache.over=0);if(this.storedCursor&&(this.document.find("body").css("cursor",this.storedCursor),this.storedStylesheet.remove()),this._storedOpacity&&this.helper.css("opacity",this._storedOpacity),this._storedZIndex&&this.helper.css("zIndex","auto"===this._storedZIndex?"":this._storedZIndex),this.dragging=!1,this.cancelHelperRemoval){if(!t){for(this._trigger("beforeStop",e,this._uiHash()),s=0;n.length>s;s++)n[s].call(this,e);this._trigger("stop",e,this._uiHash())}return this.fromOutside=!1,!1}if(t||this._trigger("beforeStop",e,this._uiHash()),this.placeholder[0].parentNode.removeChild(this.placeholder[0]),this.helper[0]!==this.currentItem[0]&&this.helper.remove(),this.helper=null,!t){for(s=0;n.length>s;s++)n[s].call(this,e);this._trigger("stop",e,this._uiHash())}return this.fromOutside=!1,!0},_trigger:function(){e.Widget.prototype._trigger.apply(this,arguments)===!1&&this.cancel()},_uiHash:function(t){var i=t||this;return{helper:i.helper,placeholder:i.placeholder||e([]),position:i.position,originalPosition:i.originalPosition,offset:i.positionAbs,item:i.currentItem,sender:t?t.element:null}}}),e.widget("ui.spinner",{version:"1.11.1",defaultElement:"<input>",widgetEventPrefix:"spin",options:{culture:null,icons:{down:"ui-icon-triangle-1-s",up:"ui-icon-triangle-1-n"},incremental:!0,max:null,min:null,numberFormat:null,page:10,step:1,change:null,spin:null,start:null,stop:null},_create:function(){this._setOption("max",this.options.max),this._setOption("min",this.options.min),this._setOption("step",this.options.step),""!==this.value()&&this._value(this.element.val(),!0),this._draw(),this._on(this._events),this._refresh(),this._on(this.window,{beforeunload:function(){this.element.removeAttr("autocomplete")}})},_getCreateOptions:function(){var t={},i=this.element;return e.each(["min","max","step"],function(e,s){var n=i.attr(s);void 0!==n&&n.length&&(t[s]=n)}),t},_events:{keydown:function(e){this._start(e)&&this._keydown(e)&&e.preventDefault()},keyup:"_stop",focus:function(){this.previous=this.element.val()},blur:function(e){return this.cancelBlur?(delete this.cancelBlur,void 0):(this._stop(),this._refresh(),this.previous!==this.element.val()&&this._trigger("change",e),void 0)},mousewheel:function(e,t){if(t){if(!this.spinning&&!this._start(e))return!1;this._spin((t>0?1:-1)*this.options.step,e),clearTimeout(this.mousewheelTimer),this.mousewheelTimer=this._delay(function(){this.spinning&&this._stop(e)},100),e.preventDefault()}},"mousedown .ui-spinner-button":function(t){function i(){var e=this.element[0]===this.document[0].activeElement;e||(this.element.focus(),this.previous=s,this._delay(function(){this.previous=s}))}var s;s=this.element[0]===this.document[0].activeElement?this.previous:this.element.val(),t.preventDefault(),i.call(this),this.cancelBlur=!0,this._delay(function(){delete this.cancelBlur,i.call(this)}),this._start(t)!==!1&&this._repeat(null,e(t.currentTarget).hasClass("ui-spinner-up")?1:-1,t)},"mouseup .ui-spinner-button":"_stop","mouseenter .ui-spinner-button":function(t){return e(t.currentTarget).hasClass("ui-state-active")?this._start(t)===!1?!1:(this._repeat(null,e(t.currentTarget).hasClass("ui-spinner-up")?1:-1,t),void 0):void 0},"mouseleave .ui-spinner-button":"_stop"},_draw:function(){var e=this.uiSpinner=this.element.addClass("ui-spinner-input").attr("autocomplete","off").wrap(this._uiSpinnerHtml()).parent().append(this._buttonHtml());this.element.attr("role","spinbutton"),this.buttons=e.find(".ui-spinner-button").attr("tabIndex",-1).button().removeClass("ui-corner-all"),this.buttons.height()>Math.ceil(.5*e.height())&&e.height()>0&&e.height(e.height()),this.options.disabled&&this.disable()},_keydown:function(t){var i=this.options,s=e.ui.keyCode;switch(t.keyCode){case s.UP:return this._repeat(null,1,t),!0;case s.DOWN:return this._repeat(null,-1,t),!0;case s.PAGE_UP:return this._repeat(null,i.page,t),!0;case s.PAGE_DOWN:return this._repeat(null,-i.page,t),!0}return!1},_uiSpinnerHtml:function(){return"<span class='ui-spinner ui-widget ui-widget-content ui-corner-all'></span>"},_buttonHtml:function(){return"<a class='ui-spinner-button ui-spinner-up ui-corner-tr'><span class='ui-icon "+this.options.icons.up+"'>&#9650;</span>"+"</a>"+"<a class='ui-spinner-button ui-spinner-down ui-corner-br'>"+"<span class='ui-icon "+this.options.icons.down+"'>&#9660;</span>"+"</a>"},_start:function(e){return this.spinning||this._trigger("start",e)!==!1?(this.counter||(this.counter=1),this.spinning=!0,!0):!1},_repeat:function(e,t,i){e=e||500,clearTimeout(this.timer),this.timer=this._delay(function(){this._repeat(40,t,i)},e),this._spin(t*this.options.step,i)},_spin:function(e,t){var i=this.value()||0;this.counter||(this.counter=1),i=this._adjustValue(i+e*this._increment(this.counter)),this.spinning&&this._trigger("spin",t,{value:i})===!1||(this._value(i),this.counter++)},_increment:function(t){var i=this.options.incremental;return i?e.isFunction(i)?i(t):Math.floor(t*t*t/5e4-t*t/500+17*t/200+1):1},_precision:function(){var e=this._precisionOf(this.options.step);return null!==this.options.min&&(e=Math.max(e,this._precisionOf(this.options.min))),e},_precisionOf:function(e){var t=""+e,i=t.indexOf(".");return-1===i?0:t.length-i-1},_adjustValue:function(e){var t,i,s=this.options;return t=null!==s.min?s.min:0,i=e-t,i=Math.round(i/s.step)*s.step,e=t+i,e=parseFloat(e.toFixed(this._precision())),null!==s.max&&e>s.max?s.max:null!==s.min&&s.min>e?s.min:e},_stop:function(e){this.spinning&&(clearTimeout(this.timer),clearTimeout(this.mousewheelTimer),this.counter=0,this.spinning=!1,this._trigger("stop",e))},_setOption:function(e,t){if("culture"===e||"numberFormat"===e){var i=this._parse(this.element.val());return this.options[e]=t,this.element.val(this._format(i)),void 0}("max"===e||"min"===e||"step"===e)&&"string"==typeof t&&(t=this._parse(t)),"icons"===e&&(this.buttons.first().find(".ui-icon").removeClass(this.options.icons.up).addClass(t.up),this.buttons.last().find(".ui-icon").removeClass(this.options.icons.down).addClass(t.down)),this._super(e,t),"disabled"===e&&(this.widget().toggleClass("ui-state-disabled",!!t),this.element.prop("disabled",!!t),this.buttons.button(t?"disable":"enable"))},_setOptions:h(function(e){this._super(e)}),_parse:function(e){return"string"==typeof e&&""!==e&&(e=window.Globalize&&this.options.numberFormat?Globalize.parseFloat(e,10,this.options.culture):+e),""===e||isNaN(e)?null:e},_format:function(e){return""===e?"":window.Globalize&&this.options.numberFormat?Globalize.format(e,this.options.numberFormat,this.options.culture):e},_refresh:function(){this.element.attr({"aria-valuemin":this.options.min,"aria-valuemax":this.options.max,"aria-valuenow":this._parse(this.element.val())})},isValid:function(){var e=this.value();return null===e?!1:e===this._adjustValue(e)},_value:function(e,t){var i;""!==e&&(i=this._parse(e),null!==i&&(t||(i=this._adjustValue(i)),e=this._format(i))),this.element.val(e),this._refresh()},_destroy:function(){this.element.removeClass("ui-spinner-input").prop("disabled",!1).removeAttr("autocomplete").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow"),this.uiSpinner.replaceWith(this.element)},stepUp:h(function(e){this._stepUp(e)}),_stepUp:function(e){this._start()&&(this._spin((e||1)*this.options.step),this._stop())},stepDown:h(function(e){this._stepDown(e)}),_stepDown:function(e){this._start()&&(this._spin((e||1)*-this.options.step),this._stop())},pageUp:h(function(e){this._stepUp((e||1)*this.options.page)}),pageDown:h(function(e){this._stepDown((e||1)*this.options.page)}),value:function(e){return arguments.length?(h(this._value).call(this,e),void 0):this._parse(this.element.val())},widget:function(){return this.uiSpinner}}),e.widget("ui.tabs",{version:"1.11.1",delay:300,options:{active:null,collapsible:!1,event:"click",heightStyle:"content",hide:null,show:null,activate:null,beforeActivate:null,beforeLoad:null,load:null},_isLocal:function(){var e=/#.*$/;return function(t){var i,s;t=t.cloneNode(!1),i=t.href.replace(e,""),s=location.href.replace(e,"");try{i=decodeURIComponent(i)}catch(n){}try{s=decodeURIComponent(s)}catch(n){}return t.hash.length>1&&i===s}}(),_create:function(){var t=this,i=this.options;this.running=!1,this.element.addClass("ui-tabs ui-widget ui-widget-content ui-corner-all").toggleClass("ui-tabs-collapsible",i.collapsible),this._processTabs(),i.active=this._initialActive(),e.isArray(i.disabled)&&(i.disabled=e.unique(i.disabled.concat(e.map(this.tabs.filter(".ui-state-disabled"),function(e){return t.tabs.index(e)}))).sort()),this.active=this.options.active!==!1&&this.anchors.length?this._findActive(i.active):e(),this._refresh(),this.active.length&&this.load(i.active)},_initialActive:function(){var t=this.options.active,i=this.options.collapsible,s=location.hash.substring(1);return null===t&&(s&&this.tabs.each(function(i,n){return e(n).attr("aria-controls")===s?(t=i,!1):void 0}),null===t&&(t=this.tabs.index(this.tabs.filter(".ui-tabs-active"))),(null===t||-1===t)&&(t=this.tabs.length?0:!1)),t!==!1&&(t=this.tabs.index(this.tabs.eq(t)),-1===t&&(t=i?!1:0)),!i&&t===!1&&this.anchors.length&&(t=0),t},_getCreateEventData:function(){return{tab:this.active,panel:this.active.length?this._getPanelForTab(this.active):e()}},_tabKeydown:function(t){var i=e(this.document[0].activeElement).closest("li"),s=this.tabs.index(i),n=!0;if(!this._handlePageNav(t)){switch(t.keyCode){case e.ui.keyCode.RIGHT:case e.ui.keyCode.DOWN:s++;break;case e.ui.keyCode.UP:case e.ui.keyCode.LEFT:n=!1,s--;break;case e.ui.keyCode.END:s=this.anchors.length-1;break;case e.ui.keyCode.HOME:s=0;break;case e.ui.keyCode.SPACE:return t.preventDefault(),clearTimeout(this.activating),this._activate(s),void 0;case e.ui.keyCode.ENTER:return t.preventDefault(),clearTimeout(this.activating),this._activate(s===this.options.active?!1:s),void 0;default:return}t.preventDefault(),clearTimeout(this.activating),s=this._focusNextTab(s,n),t.ctrlKey||(i.attr("aria-selected","false"),this.tabs.eq(s).attr("aria-selected","true"),this.activating=this._delay(function(){this.option("active",s)},this.delay))}},_panelKeydown:function(t){this._handlePageNav(t)||t.ctrlKey&&t.keyCode===e.ui.keyCode.UP&&(t.preventDefault(),this.active.focus())},_handlePageNav:function(t){return t.altKey&&t.keyCode===e.ui.keyCode.PAGE_UP?(this._activate(this._focusNextTab(this.options.active-1,!1)),!0):t.altKey&&t.keyCode===e.ui.keyCode.PAGE_DOWN?(this._activate(this._focusNextTab(this.options.active+1,!0)),!0):void 0},_findNextTab:function(t,i){function s(){return t>n&&(t=0),0>t&&(t=n),t}for(var n=this.tabs.length-1;-1!==e.inArray(s(),this.options.disabled);)t=i?t+1:t-1;return t},_focusNextTab:function(e,t){return e=this._findNextTab(e,t),this.tabs.eq(e).focus(),e},_setOption:function(e,t){return"active"===e?(this._activate(t),void 0):"disabled"===e?(this._setupDisabled(t),void 0):(this._super(e,t),"collapsible"===e&&(this.element.toggleClass("ui-tabs-collapsible",t),t||this.options.active!==!1||this._activate(0)),"event"===e&&this._setupEvents(t),"heightStyle"===e&&this._setupHeightStyle(t),void 0)},_sanitizeSelector:function(e){return e?e.replace(/[!"$%&'()*+,.\/:;<=>?@\[\]\^`{|}~]/g,"\\$&"):""},refresh:function(){var t=this.options,i=this.tablist.children(":has(a[href])");t.disabled=e.map(i.filter(".ui-state-disabled"),function(e){return i.index(e)}),this._processTabs(),t.active!==!1&&this.anchors.length?this.active.length&&!e.contains(this.tablist[0],this.active[0])?this.tabs.length===t.disabled.length?(t.active=!1,this.active=e()):this._activate(this._findNextTab(Math.max(0,t.active-1),!1)):t.active=this.tabs.index(this.active):(t.active=!1,this.active=e()),this._refresh()},_refresh:function(){this._setupDisabled(this.options.disabled),this._setupEvents(this.options.event),this._setupHeightStyle(this.options.heightStyle),this.tabs.not(this.active).attr({"aria-selected":"false","aria-expanded":"false",tabIndex:-1}),this.panels.not(this._getPanelForTab(this.active)).hide().attr({"aria-hidden":"true"}),this.active.length?(this.active.addClass("ui-tabs-active ui-state-active").attr({"aria-selected":"true","aria-expanded":"true",tabIndex:0}),this._getPanelForTab(this.active).show().attr({"aria-hidden":"false"})):this.tabs.eq(0).attr("tabIndex",0)},_processTabs:function(){var t=this;this.tablist=this._getList().addClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all").attr("role","tablist").delegate("> li","mousedown"+this.eventNamespace,function(t){e(this).is(".ui-state-disabled")&&t.preventDefault()}).delegate(".ui-tabs-anchor","focus"+this.eventNamespace,function(){e(this).closest("li").is(".ui-state-disabled")&&this.blur()}),this.tabs=this.tablist.find("> li:has(a[href])").addClass("ui-state-default ui-corner-top").attr({role:"tab",tabIndex:-1}),this.anchors=this.tabs.map(function(){return e("a",this)[0]
}).addClass("ui-tabs-anchor").attr({role:"presentation",tabIndex:-1}),this.panels=e(),this.anchors.each(function(i,s){var n,a,o,r=e(s).uniqueId().attr("id"),h=e(s).closest("li"),l=h.attr("aria-controls");t._isLocal(s)?(n=s.hash,o=n.substring(1),a=t.element.find(t._sanitizeSelector(n))):(o=h.attr("aria-controls")||e({}).uniqueId()[0].id,n="#"+o,a=t.element.find(n),a.length||(a=t._createPanel(o),a.insertAfter(t.panels[i-1]||t.tablist)),a.attr("aria-live","polite")),a.length&&(t.panels=t.panels.add(a)),l&&h.data("ui-tabs-aria-controls",l),h.attr({"aria-controls":o,"aria-labelledby":r}),a.attr("aria-labelledby",r)}),this.panels.addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").attr("role","tabpanel")},_getList:function(){return this.tablist||this.element.find("ol,ul").eq(0)},_createPanel:function(t){return e("<div>").attr("id",t).addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").data("ui-tabs-destroy",!0)},_setupDisabled:function(t){e.isArray(t)&&(t.length?t.length===this.anchors.length&&(t=!0):t=!1);for(var i,s=0;i=this.tabs[s];s++)t===!0||-1!==e.inArray(s,t)?e(i).addClass("ui-state-disabled").attr("aria-disabled","true"):e(i).removeClass("ui-state-disabled").removeAttr("aria-disabled");this.options.disabled=t},_setupEvents:function(t){var i={};t&&e.each(t.split(" "),function(e,t){i[t]="_eventHandler"}),this._off(this.anchors.add(this.tabs).add(this.panels)),this._on(!0,this.anchors,{click:function(e){e.preventDefault()}}),this._on(this.anchors,i),this._on(this.tabs,{keydown:"_tabKeydown"}),this._on(this.panels,{keydown:"_panelKeydown"}),this._focusable(this.tabs),this._hoverable(this.tabs)},_setupHeightStyle:function(t){var i,s=this.element.parent();"fill"===t?(i=s.height(),i-=this.element.outerHeight()-this.element.height(),this.element.siblings(":visible").each(function(){var t=e(this),s=t.css("position");"absolute"!==s&&"fixed"!==s&&(i-=t.outerHeight(!0))}),this.element.children().not(this.panels).each(function(){i-=e(this).outerHeight(!0)}),this.panels.each(function(){e(this).height(Math.max(0,i-e(this).innerHeight()+e(this).height()))}).css("overflow","auto")):"auto"===t&&(i=0,this.panels.each(function(){i=Math.max(i,e(this).height("").height())}).height(i))},_eventHandler:function(t){var i=this.options,s=this.active,n=e(t.currentTarget),a=n.closest("li"),o=a[0]===s[0],r=o&&i.collapsible,h=r?e():this._getPanelForTab(a),l=s.length?this._getPanelForTab(s):e(),u={oldTab:s,oldPanel:l,newTab:r?e():a,newPanel:h};t.preventDefault(),a.hasClass("ui-state-disabled")||a.hasClass("ui-tabs-loading")||this.running||o&&!i.collapsible||this._trigger("beforeActivate",t,u)===!1||(i.active=r?!1:this.tabs.index(a),this.active=o?e():a,this.xhr&&this.xhr.abort(),l.length||h.length||e.error("jQuery UI Tabs: Mismatching fragment identifier."),h.length&&this.load(this.tabs.index(a),t),this._toggle(t,u))},_toggle:function(t,i){function s(){a.running=!1,a._trigger("activate",t,i)}function n(){i.newTab.closest("li").addClass("ui-tabs-active ui-state-active"),o.length&&a.options.show?a._show(o,a.options.show,s):(o.show(),s())}var a=this,o=i.newPanel,r=i.oldPanel;this.running=!0,r.length&&this.options.hide?this._hide(r,this.options.hide,function(){i.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active"),n()}):(i.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active"),r.hide(),n()),r.attr("aria-hidden","true"),i.oldTab.attr({"aria-selected":"false","aria-expanded":"false"}),o.length&&r.length?i.oldTab.attr("tabIndex",-1):o.length&&this.tabs.filter(function(){return 0===e(this).attr("tabIndex")}).attr("tabIndex",-1),o.attr("aria-hidden","false"),i.newTab.attr({"aria-selected":"true","aria-expanded":"true",tabIndex:0})},_activate:function(t){var i,s=this._findActive(t);s[0]!==this.active[0]&&(s.length||(s=this.active),i=s.find(".ui-tabs-anchor")[0],this._eventHandler({target:i,currentTarget:i,preventDefault:e.noop}))},_findActive:function(t){return t===!1?e():this.tabs.eq(t)},_getIndex:function(e){return"string"==typeof e&&(e=this.anchors.index(this.anchors.filter("[href$='"+e+"']"))),e},_destroy:function(){this.xhr&&this.xhr.abort(),this.element.removeClass("ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible"),this.tablist.removeClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all").removeAttr("role"),this.anchors.removeClass("ui-tabs-anchor").removeAttr("role").removeAttr("tabIndex").removeUniqueId(),this.tablist.unbind(this.eventNamespace),this.tabs.add(this.panels).each(function(){e.data(this,"ui-tabs-destroy")?e(this).remove():e(this).removeClass("ui-state-default ui-state-active ui-state-disabled ui-corner-top ui-corner-bottom ui-widget-content ui-tabs-active ui-tabs-panel").removeAttr("tabIndex").removeAttr("aria-live").removeAttr("aria-busy").removeAttr("aria-selected").removeAttr("aria-labelledby").removeAttr("aria-hidden").removeAttr("aria-expanded").removeAttr("role")}),this.tabs.each(function(){var t=e(this),i=t.data("ui-tabs-aria-controls");i?t.attr("aria-controls",i).removeData("ui-tabs-aria-controls"):t.removeAttr("aria-controls")}),this.panels.show(),"content"!==this.options.heightStyle&&this.panels.css("height","")},enable:function(t){var i=this.options.disabled;i!==!1&&(void 0===t?i=!1:(t=this._getIndex(t),i=e.isArray(i)?e.map(i,function(e){return e!==t?e:null}):e.map(this.tabs,function(e,i){return i!==t?i:null})),this._setupDisabled(i))},disable:function(t){var i=this.options.disabled;if(i!==!0){if(void 0===t)i=!0;else{if(t=this._getIndex(t),-1!==e.inArray(t,i))return;i=e.isArray(i)?e.merge([t],i).sort():[t]}this._setupDisabled(i)}},load:function(t,i){t=this._getIndex(t);var s=this,n=this.tabs.eq(t),a=n.find(".ui-tabs-anchor"),o=this._getPanelForTab(n),r={tab:n,panel:o};this._isLocal(a[0])||(this.xhr=e.ajax(this._ajaxSettings(a,i,r)),this.xhr&&"canceled"!==this.xhr.statusText&&(n.addClass("ui-tabs-loading"),o.attr("aria-busy","true"),this.xhr.success(function(e){setTimeout(function(){o.html(e),s._trigger("load",i,r)},1)}).complete(function(e,t){setTimeout(function(){"abort"===t&&s.panels.stop(!1,!0),n.removeClass("ui-tabs-loading"),o.removeAttr("aria-busy"),e===s.xhr&&delete s.xhr},1)})))},_ajaxSettings:function(t,i,s){var n=this;return{url:t.attr("href"),beforeSend:function(t,a){return n._trigger("beforeLoad",i,e.extend({jqXHR:t,ajaxSettings:a},s))}}},_getPanelForTab:function(t){var i=e(t).attr("aria-controls");return this.element.find(this._sanitizeSelector("#"+i))}}),e.widget("ui.tooltip",{version:"1.11.1",options:{content:function(){var t=e(this).attr("title")||"";return e("<a>").text(t).html()},hide:!0,items:"[title]:not([disabled])",position:{my:"left top+15",at:"left bottom",collision:"flipfit flip"},show:!0,tooltipClass:null,track:!1,close:null,open:null},_addDescribedBy:function(t,i){var s=(t.attr("aria-describedby")||"").split(/\s+/);s.push(i),t.data("ui-tooltip-id",i).attr("aria-describedby",e.trim(s.join(" ")))},_removeDescribedBy:function(t){var i=t.data("ui-tooltip-id"),s=(t.attr("aria-describedby")||"").split(/\s+/),n=e.inArray(i,s);-1!==n&&s.splice(n,1),t.removeData("ui-tooltip-id"),s=e.trim(s.join(" ")),s?t.attr("aria-describedby",s):t.removeAttr("aria-describedby")},_create:function(){this._on({mouseover:"open",focusin:"open"}),this.tooltips={},this.parents={},this.options.disabled&&this._disable(),this.liveRegion=e("<div>").attr({role:"log","aria-live":"assertive","aria-relevant":"additions"}).addClass("ui-helper-hidden-accessible").appendTo(this.document[0].body)},_setOption:function(t,i){var s=this;return"disabled"===t?(this[i?"_disable":"_enable"](),this.options[t]=i,void 0):(this._super(t,i),"content"===t&&e.each(this.tooltips,function(e,t){s._updateContent(t)}),void 0)},_disable:function(){var t=this;e.each(this.tooltips,function(i,s){var n=e.Event("blur");n.target=n.currentTarget=s[0],t.close(n,!0)}),this.element.find(this.options.items).addBack().each(function(){var t=e(this);t.is("[title]")&&t.data("ui-tooltip-title",t.attr("title")).removeAttr("title")})},_enable:function(){this.element.find(this.options.items).addBack().each(function(){var t=e(this);t.data("ui-tooltip-title")&&t.attr("title",t.data("ui-tooltip-title"))})},open:function(t){var i=this,s=e(t?t.target:this.element).closest(this.options.items);s.length&&!s.data("ui-tooltip-id")&&(s.attr("title")&&s.data("ui-tooltip-title",s.attr("title")),s.data("ui-tooltip-open",!0),t&&"mouseover"===t.type&&s.parents().each(function(){var t,s=e(this);s.data("ui-tooltip-open")&&(t=e.Event("blur"),t.target=t.currentTarget=this,i.close(t,!0)),s.attr("title")&&(s.uniqueId(),i.parents[this.id]={element:this,title:s.attr("title")},s.attr("title",""))}),this._updateContent(s,t))},_updateContent:function(e,t){var i,s=this.options.content,n=this,a=t?t.type:null;return"string"==typeof s?this._open(t,e,s):(i=s.call(e[0],function(i){e.data("ui-tooltip-open")&&n._delay(function(){t&&(t.type=a),this._open(t,e,i)})}),i&&this._open(t,e,i),void 0)},_open:function(t,i,s){function n(e){l.of=e,a.is(":hidden")||a.position(l)}var a,o,r,h,l=e.extend({},this.options.position);if(s){if(a=this._find(i),a.length)return a.find(".ui-tooltip-content").html(s),void 0;i.is("[title]")&&(t&&"mouseover"===t.type?i.attr("title",""):i.removeAttr("title")),a=this._tooltip(i),this._addDescribedBy(i,a.attr("id")),a.find(".ui-tooltip-content").html(s),this.liveRegion.children().hide(),s.clone?(h=s.clone(),h.removeAttr("id").find("[id]").removeAttr("id")):h=s,e("<div>").html(h).appendTo(this.liveRegion),this.options.track&&t&&/^mouse/.test(t.type)?(this._on(this.document,{mousemove:n}),n(t)):a.position(e.extend({of:i},this.options.position)),this.hiding=!1,this.closing=!1,a.hide(),this._show(a,this.options.show),this.options.show&&this.options.show.delay&&(r=this.delayedShow=setInterval(function(){a.is(":visible")&&(n(l.of),clearInterval(r))},e.fx.interval)),this._trigger("open",t,{tooltip:a}),o={keyup:function(t){if(t.keyCode===e.ui.keyCode.ESCAPE){var s=e.Event(t);s.currentTarget=i[0],this.close(s,!0)}}},i[0]!==this.element[0]&&(o.remove=function(){this._removeTooltip(a)}),t&&"mouseover"!==t.type||(o.mouseleave="close"),t&&"focusin"!==t.type||(o.focusout="close"),this._on(!0,i,o)}},close:function(t){var i=this,s=e(t?t.currentTarget:this.element),n=this._find(s);this.closing||(clearInterval(this.delayedShow),s.data("ui-tooltip-title")&&!s.attr("title")&&s.attr("title",s.data("ui-tooltip-title")),this._removeDescribedBy(s),this.hiding=!0,n.stop(!0),this._hide(n,this.options.hide,function(){i._removeTooltip(e(this)),this.hiding=!1,this.closing=!1}),s.removeData("ui-tooltip-open"),this._off(s,"mouseleave focusout keyup"),s[0]!==this.element[0]&&this._off(s,"remove"),this._off(this.document,"mousemove"),t&&"mouseleave"===t.type&&e.each(this.parents,function(t,s){e(s.element).attr("title",s.title),delete i.parents[t]}),this.closing=!0,this._trigger("close",t,{tooltip:n}),this.hiding||(this.closing=!1))},_tooltip:function(t){var i=e("<div>").attr("role","tooltip").addClass("ui-tooltip ui-widget ui-corner-all ui-widget-content "+(this.options.tooltipClass||"")),s=i.uniqueId().attr("id");return e("<div>").addClass("ui-tooltip-content").appendTo(i),i.appendTo(this.document[0].body),this.tooltips[s]=t,i},_find:function(t){var i=t.data("ui-tooltip-id");return i?e("#"+i):e()},_removeTooltip:function(e){e.remove(),delete this.tooltips[e.attr("id")]},_destroy:function(){var t=this;e.each(this.tooltips,function(i,s){var n=e.Event("blur");n.target=n.currentTarget=s[0],t.close(n,!0),e("#"+i).remove(),s.data("ui-tooltip-title")&&(s.attr("title")||s.attr("title",s.data("ui-tooltip-title")),s.removeData("ui-tooltip-title"))}),this.liveRegion.remove()}})});





/*! DataTables 1.10.0
* ©2008-2014 SpryMedia Ltd - datatables.net/license
*/

/**
* @summary     DataTables
* @description Paginate, search and order HTML tables
* @version     1.10.0
* @file        jquery.dataTables.js
* @author      SpryMedia Ltd (www.sprymedia.co.uk)
* @contact     www.sprymedia.co.uk/contact
* @copyright   Copyright 2008-2014 SpryMedia Ltd.
*
* This source file is free software, available under the following license:
*   MIT license - http://datatables.net/license

* * This source file is distributed in the hope that it will be useful, but
* WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
* or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.
*
* For details please refer to: http://www.datatables.net
*/

/*jslint evil: true, undef: true, browser: true */
/*globals $,require,jQuery,define,_selector_run,_selector_opts,_selector_first,_selector_row_indexes,_ext,_Api,_api_register,_api_registerPlural,_re_new_lines,_re_html,_re_formatted_numeric,_re_escape_regex,_empty,_intVal,_numToDecimal,_isNumber,_isHtml,_htmlNumeric,_pluck,_pluck_order,_range,_stripHtml,_unique,_fnBuildAjax,_fnAjaxUpdate,_fnAjaxParameters,_fnAjaxUpdateDraw,_fnAjaxDataSrc,_fnAddColumn,_fnColumnOptions,_fnAdjustColumnSizing,_fnVisibleToColumnIndex,_fnColumnIndexToVisible,_fnVisbleColumns,_fnGetColumns,_fnColumnTypes,_fnApplyColumnDefs,_fnHungarianMap,_fnCamelToHungarian,_fnLanguageCompat,_fnBrowserDetect,_fnAddData,_fnAddTr,_fnNodeToDataIndex,_fnNodeToColumnIndex,_fnGetCellData,_fnSetCellData,_fnSplitObjNotation,_fnGetObjectDataFn,_fnSetObjectDataFn,_fnGetDataMaster,_fnClearTable,_fnDeleteIndex,_fnInvalidateRow,_fnGetRowElements,_fnCreateTr,_fnBuildHead,_fnDrawHead,_fnDraw,_fnReDraw,_fnAddOptionsHtml,_fnDetectHeader,_fnGetUniqueThs,_fnFeatureHtmlFilter,_fnFilterComplete,_fnFilterCustom,_fnFilterColumn,_fnFilter,_fnFilterCreateSearch,_fnEscapeRegex,_fnFilterData,_fnFeatureHtmlInfo,_fnUpdateInfo,_fnInfoMacros,_fnInitialise,_fnInitComplete,_fnLengthChange,_fnFeatureHtmlLength,_fnFeatureHtmlPaginate,_fnPageChange,_fnFeatureHtmlProcessing,_fnProcessingDisplay,_fnFeatureHtmlTable,_fnScrollDraw,_fnApplyToChildren,_fnCalculateColumnWidths,_fnThrottle,_fnConvertToWidth,_fnScrollingWidthAdjust,_fnGetWidestNode,_fnGetMaxLenString,_fnStringToCss,_fnScrollBarWidth,_fnSortFlatten,_fnSort,_fnSortAria,_fnSortListener,_fnSortAttachListener,_fnSortingClasses,_fnSortData,_fnSaveState,_fnLoadState,_fnSettingsFromNode,_fnLog,_fnMap,_fnBindAction,_fnCallbackReg,_fnCallbackFire,_fnLengthOverflow,_fnRenderer,_fnDataSource,_fnRowAttributes*/

(/** @lends <global> */function( window, document, undefined ) {

(function( factory ) {
"use strict";

if ( typeof define === 'function' && define.amd ) {
  // Define as an AMD module if possible
  define( 'datatables', ['jquery'], factory );
}
else if ( typeof exports === 'object' ) {
    // Node/CommonJS
    factory( require( 'jquery' ) );
}
else if ( jQuery && !jQuery.fn.dataTable ) {
  // Define using browser globals otherwise
  // Prevent multiple instantiations if the script is loaded twice
  factory( jQuery );
}
}
(/** @lends <global> */function( $ ) {
"use strict";

/**
 * DataTables is a plug-in for the jQuery Javascript library. It is a highly
 * flexible tool, based upon the foundations of progressive enhancement,
 * which will add advanced interaction controls to any HTML table. For a
 * full list of features please refer to
 * [DataTables.net](href="http://datatables.net).
 *
 * Note that the `DataTable` object is not a global variable but is aliased
 * to `jQuery.fn.DataTable` and `jQuery.fn.dataTable` through which it may
 * be  accessed.
 *
 *  @class
 *  @param {object} [init={}] Configuration object for DataTables. Options
 *    are defined by {@link DataTable.defaults}
 *  @requires jQuery 1.7+
 *
 *  @example
 *    // Basic initialisation
 *    $(document).ready( function {
 *      $('#example').dataTable();
 *    } );
 *
 *  @example
 *    // Initialisation with configuration options - in this case, disable
 *    // pagination and sorting.
 *    $(document).ready( function {
 *      $('#example').dataTable( {
 *        "paginate": false,
 *        "sort": false
 *      } );
 *    } );
 */
var DataTable;


/*
 * It is useful to have variables which are scoped locally so only the
 * DataTables functions can access them and they don't leak into global space.
 * At the same time these functions are often useful over multiple files in the
 * core and API, so we list, or at least document, all variables which are used
 * by DataTables as private variables here. This also ensures that there is no
 * clashing of variable names and that they can easily referenced for reuse.
 */


// Defined else where
//  _selector_run
//  _selector_opts
//  _selector_first
//  _selector_row_indexes

var _ext; // DataTable.ext
var _Api; // DataTable.Api
var _api_register; // DataTable.Api.register
var _api_registerPlural; // DataTable.Api.registerPlural

var _re_dic = {};
var _re_new_lines = /[\r\n]/g;
var _re_html = /<.*?>/g;
var _re_date_start = /^[\d\+\-a-zA-Z]/;

// Escape regular expression special characters
var _re_escape_regex = new RegExp( '(\\' + [ '/', '.', '*', '+', '?', '|', '(', ')', '[', ']', '{', '}', '\\', '$', '^', '-' ].join('|\\') + ')', 'g' );

// U+2009 is thin space and U+202F is narrow no-break space, both used in many
// standards as thousands separators
var _re_formatted_numeric = /[',$£€¥%\u2009\u202F]/g;


var _empty = function ( d ) {
  return !d || d === '-' ? true : false;
};


var _intVal = function ( s ) {
  var integer = parseInt( s, 10 );
  return !isNaN(integer) && isFinite(s) ? integer : null;
};

// Convert from a formatted number with characters other than `.` as the
// decimal place, to a Javascript number
var _numToDecimal = function ( num, decimalPoint ) {
  // Cache created regular expressions for speed as this function is called often
  if ( ! _re_dic[ decimalPoint ] ) {
    _re_dic[ decimalPoint ] = new RegExp( _fnEscapeRegex( decimalPoint ), 'g' );
  }
  return typeof num === 'string' ?
    num.replace( /\./g, '' ).replace( _re_dic[ decimalPoint ], '.' ) :
    num;
};


var _isNumber = function ( d, decimalPoint, formatted ) {
  var strType = typeof d === 'string';

  if ( decimalPoint && strType ) {
    d = _numToDecimal( d, decimalPoint );
  }

  if ( formatted && strType ) {
    d = d.replace( _re_formatted_numeric, '' );
  }

  return !d || d==='-' || (!isNaN( parseFloat(d) ) && isFinite( d ));
};


// A string without HTML in it can be considered to be HTML still
var _isHtml = function ( d ) {
  return !d || typeof d === 'string';
};


var _htmlNumeric = function ( d, decimalPoint, formatted ) {
  if ( _empty( d ) ) {
    return true;
  }

  var html = _isHtml( d );
  return ! html ?
    null :
    _isNumber( _stripHtml( d ), decimalPoint, formatted ) ?
      true :
      null;
};


var _pluck = function ( a, prop, prop2 ) {
  var out = [];
  var i=0, ien=a.length;

  // Could have the test in the loop for slightly smaller code, but speed
  // is essential here
  if ( prop2 !== undefined ) {
    for ( ; i<ien ; i++ ) {
      if ( a[i] && a[i][ prop ] ) {
        out.push( a[i][ prop ][ prop2 ] );
      }
    }
  }
  else {
    for ( ; i<ien ; i++ ) {
      if ( a[i] ) {
        out.push( a[i][ prop ] );
      }
    }
  }

  return out;
};


// Basically the same as _pluck, but rather than looping over `a` we use `order`
// as the indexes to pick from `a`
var _pluck_order = function ( a, order, prop, prop2 )
{
  var out = [];
  var i=0, ien=order.length;

  // Could have the test in the loop for slightly smaller code, but speed
  // is essential here
  if ( prop2 !== undefined ) {
    for ( ; i<ien ; i++ ) {
      out.push( a[ order[i] ][ prop ][ prop2 ] );
    }
  }
  else {
    for ( ; i<ien ; i++ ) {
      out.push( a[ order[i] ][ prop ] );
    }
  }

  return out;
};


var _range = function ( len, start )
{
  var out = [];
  var end;

  if ( start === undefined ) {
    start = 0;
    end = len;
  }
  else {
    end = start;
    start = len;
  }

  for ( var i=start ; i<end ; i++ ) {
    out.push( i );
  }

  return out;
};


var _stripHtml = function ( d ) {
  return d.replace( _re_html, '' );
};


/**
 * Find the unique elements in a source array.
 *
 * @param  {array} src Source array
 * @return {array} Array of unique items
 * @ignore
 */
var _unique = function ( src )
{
  // A faster unique method is to use object keys to identify used values,
  // but this doesn't work with arrays or objects, which we must also
  // consider. See jsperf.com/compare-array-unique-versions/4 for more
  // information.
  var
    out = [],
    val,
    i, ien=src.length,
    j, k=0;

  again: for ( i=0 ; i<ien ; i++ ) {
    val = src[i];

    for ( j=0 ; j<k ; j++ ) {
      if ( out[j] === val ) {
        continue again;
      }
    }

    out.push( val );
    k++;
  }

  return out;
};



/**
 * Create a mapping object that allows camel case parameters to be looked up
 * for their Hungarian counterparts. The mapping is stored in a private
 * parameter called `_hungarianMap` which can be accessed on the source object.
 *  @param {object} o
 *  @memberof DataTable#oApi
 */
function _fnHungarianMap ( o )
{
  var
    hungarian = 'a aa ai ao as b fn i m o s ',
    match,
    newKey,
    map = {};

  $.each( o, function (key, val) {
    match = key.match(/^([^A-Z]+?)([A-Z])/);

    if ( match && hungarian.indexOf(match[1]+' ') !== -1 )
    {
      newKey = key.replace( match[0], match[2].toLowerCase() );
      map[ newKey ] = key;

      //console.log( key, match );
      if ( match[1] === 'o' )
      {
        _fnHungarianMap( o[key] );
      }
    }
  } );

  o._hungarianMap = map;
}


/**
 * Convert from camel case parameters to Hungarian, based on a Hungarian map
 * created by _fnHungarianMap.
 *  @param {object} src The model object which holds all parameters that can be
 *    mapped.
 *  @param {object} user The object to convert from camel case to Hungarian.
 *  @param {boolean} force When set to `true`, properties which already have a
 *    Hungarian value in the `user` object will be overwritten. Otherwise they
 *    won't be.
 *  @memberof DataTable#oApi
 */
function _fnCamelToHungarian ( src, user, force )
{
  if ( ! src._hungarianMap ) {
    _fnHungarianMap( src );
  }

  var hungarianKey;

  $.each( user, function (key, val) {
    hungarianKey = src._hungarianMap[ key ];

    if ( hungarianKey !== undefined && (force || user[hungarianKey] === undefined) )
    {
      // For objects, we need to buzz down into the object to copy parameters
      if ( hungarianKey.charAt(0) === 'o' )
      {
        // Copy the camelCase options over to the hungarian
        if ( ! user[ hungarianKey ] ) {
          user[ hungarianKey ] = {};
        }
        $.extend( true, user[hungarianKey], user[key] );

        _fnCamelToHungarian( src[hungarianKey], user[hungarianKey], force );
      }
      else {
        user[hungarianKey] = user[ key ];
      }
    }
  } );
}


/**
 * Language compatibility - when certain options are given, and others aren't, we
 * need to duplicate the values over, in order to provide backwards compatibility
 * with older language files.
 *  @param {object} oSettings dataTables settings object
 *  @memberof DataTable#oApi
 */
function _fnLanguageCompat( lang )
{
  var defaults = DataTable.defaults.oLanguage;
  var zeroRecords = lang.sZeroRecords;

  /* Backwards compatibility - if there is no sEmptyTable given, then use the same as
   * sZeroRecords - assuming that is given.
   */
  if ( ! lang.sEmptyTable && zeroRecords &&
    defaults.sEmptyTable === "No data available in table" )
  {
    _fnMap( lang, lang, 'sZeroRecords', 'sEmptyTable' );
  }

  /* Likewise with loading records */
  if ( ! lang.sLoadingRecords && zeroRecords &&
    defaults.sLoadingRecords === "Loading..." )
  {
    _fnMap( lang, lang, 'sZeroRecords', 'sLoadingRecords' );
  }

  // Old parameter name of the thousands separator mapped onto the new
  if ( lang.sInfoThousands ) {
    lang.sThousands = lang.sInfoThousands;
  }

  var decimal = lang.sDecimal;
  if ( decimal ) {
    _addNumericSort( decimal );
  }
}


/**
 * Map one parameter onto another
 *  @param {object} o Object to map
 *  @param {*} knew The new parameter name
 *  @param {*} old The old parameter name
 */
var _fnCompatMap = function ( o, knew, old ) {
  if ( o[ knew ] !== undefined ) {
    o[ old ] = o[ knew ];
  }
};


/**
 * Provide backwards compatibility for the main DT options. Note that the new
 * options are mapped onto the old parameters, so this is an external interface
 * change only.
 *  @param {object} init Object to map
 */
function _fnCompatOpts ( init )
{
  _fnCompatMap( init, 'ordering',      'bSort' );
  _fnCompatMap( init, 'orderMulti',    'bSortMulti' );
  _fnCompatMap( init, 'orderClasses',  'bSortClasses' );
  _fnCompatMap( init, 'orderCellsTop', 'bSortCellsTop' );
  _fnCompatMap( init, 'order',         'aaSorting' );
  _fnCompatMap( init, 'orderFixed',    'aaSortingFixed' );
  _fnCompatMap( init, 'paging',        'bPaginate' );
  _fnCompatMap( init, 'pagingType',    'sPaginationType' );
  _fnCompatMap( init, 'pageLength',    'iDisplayLength' );
  _fnCompatMap( init, 'searching',     'bFilter' );
}


/**
 * Provide backwards compatibility for column options. Note that the new options
 * are mapped onto the old parameters, so this is an external interface change
 * only.
 *  @param {object} init Object to map
 */
function _fnCompatCols ( init )
{
  _fnCompatMap( init, 'orderable',     'bSortable' );
  _fnCompatMap( init, 'orderData',     'aDataSort' );
  _fnCompatMap( init, 'orderSequence', 'asSorting' );
  _fnCompatMap( init, 'orderDataType', 'sortDataType' );
}


/**
 * Browser feature detection for capabilities, quirks
 *  @param {object} settings dataTables settings object
 *  @memberof DataTable#oApi
 */
function _fnBrowserDetect( settings )
{
  var browser = settings.oBrowser;

  // Scrolling feature / quirks detection
  var n = $('<div/>')
    .css( {
      position: 'absolute',
      top: 0,
      left: 0,
      height: 1,
      width: 1,
      overflow: 'hidden'
    } )
    .append(
      $('<div/>')
        .css( {
          position: 'absolute',
          top: 1,
          left: 1,
          width: 100,
          overflow: 'scroll'
        } )
        .append(
          $('<div class="test"/>')
            .css( {
              width: '100%',
              height: 10
            } )
        )
    )
    .appendTo( 'body' );

  var test = n.find('.test');

  // IE6/7 will oversize a width 100% element inside a scrolling element, to
  // include the width of the scrollbar, while other browsers ensure the inner
  // element is contained without forcing scrolling
  browser.bScrollOversize = test[0].offsetWidth === 100;

  // In rtl text layout, some browsers (most, but not all) will place the
  // scrollbar on the left, rather than the right.
  browser.bScrollbarLeft = test.offset().left !== 1;

  n.remove();
}


/**
 * Array.prototype reduce[Right] method, used for browsers which don't support
 * JS 1.6. Done this way to reduce code size, since we iterate either way
 *  @param {object} settings dataTables settings object
 *  @memberof DataTable#oApi
 */
function _fnReduce ( that, fn, init, start, end, inc )
{
  var
    i = start,
    value,
    isSet = false;

  if ( init !== undefined ) {
    value = init;
    isSet = true;
  }

  while ( i !== end ) {
    if ( ! that.hasOwnProperty(i) ) {
      continue;
    }

    value = isSet ?
      fn( value, that[i], i, that ) :
      that[i];

    isSet = true;
    i += inc;
  }

  return value;
}

/**
 * Add a column to the list used for the table with default values
 *  @param {object} oSettings dataTables settings object
 *  @param {node} nTh The th element for this column
 *  @memberof DataTable#oApi
 */
function _fnAddColumn( oSettings, nTh )
{
  // Add column to aoColumns array
  var oDefaults = DataTable.defaults.column;
  var iCol = oSettings.aoColumns.length;
  var oCol = $.extend( {}, DataTable.models.oColumn, oDefaults, {
    "nTh": nTh ? nTh : document.createElement('th'),
    "sTitle":    oDefaults.sTitle    ? oDefaults.sTitle    : nTh ? nTh.innerHTML : '',
    "aDataSort": oDefaults.aDataSort ? oDefaults.aDataSort : [iCol],
    "mData": oDefaults.mData ? oDefaults.mData : iCol,
    idx: iCol
  } );
  oSettings.aoColumns.push( oCol );

  // Add search object for column specific search. Note that the `searchCols[ iCol ]`
  // passed into extend can be undefined. This allows the user to give a default
  // with only some of the parameters defined, and also not give a default
  var searchCols = oSettings.aoPreSearchCols;
  searchCols[ iCol ] = $.extend( {}, DataTable.models.oSearch, searchCols[ iCol ] );

  // Use the default column options function to initialise classes etc
  _fnColumnOptions( oSettings, iCol, null );
}


/**
 * Apply options for a column
 *  @param {object} oSettings dataTables settings object
 *  @param {int} iCol column index to consider
 *  @param {object} oOptions object with sType, bVisible and bSearchable etc
 *  @memberof DataTable#oApi
 */
function _fnColumnOptions( oSettings, iCol, oOptions )
{
  var oCol = oSettings.aoColumns[ iCol ];
  var oClasses = oSettings.oClasses;
  var th = $(oCol.nTh);

  // Try to get width information from the DOM. We can't get it from CSS
  // as we'd need to parse the CSS stylesheet. `width` option can override
  if ( ! oCol.sWidthOrig ) {
    // Width attribute
    oCol.sWidthOrig = th.attr('width') || null;

    // Style attribute
    var t = (th.attr('style') || '').match(/width:\s*(\d+[pxem%])/);
    if ( t ) {
      oCol.sWidthOrig = t[1];
    }
  }

  /* User specified column options */
  if ( oOptions !== undefined && oOptions !== null )
  {
    // Backwards compatibility
    _fnCompatCols( oOptions );

    // Map camel case parameters to their Hungarian counterparts
    _fnCamelToHungarian( DataTable.defaults.column, oOptions );

    /* Backwards compatibility for mDataProp */
    if ( oOptions.mDataProp !== undefined && !oOptions.mData )
    {
      oOptions.mData = oOptions.mDataProp;
    }

    if ( oOptions.sType )
    {
      oCol._sManualType = oOptions.sType;
    }

    // `class` is a reserved word in Javascript, so we need to provide
    // the ability to use a valid name for the camel case input
    if ( oOptions.className && ! oOptions.sClass )
    {
      oOptions.sClass = oOptions.className;
    }

    $.extend( oCol, oOptions );
    _fnMap( oCol, oOptions, "sWidth", "sWidthOrig" );

    /* iDataSort to be applied (backwards compatibility), but aDataSort will take
     * priority if defined
     */
    if ( typeof oOptions.iDataSort === 'number' )
    {
      oCol.aDataSort = [ oOptions.iDataSort ];
    }
    _fnMap( oCol, oOptions, "aDataSort" );
  }

  /* Cache the data get and set functions for speed */
  var mDataSrc = oCol.mData;
  var mData = _fnGetObjectDataFn( mDataSrc );
  var mRender = oCol.mRender ? _fnGetObjectDataFn( oCol.mRender ) : null;

  var attrTest = function( src ) {
    return typeof src === 'string' && src.indexOf('@') !== -1;
  };
  oCol._bAttrSrc = $.isPlainObject( mDataSrc ) && (
    attrTest(mDataSrc.sort) || attrTest(mDataSrc.type) || attrTest(mDataSrc.filter)
  );

  oCol.fnGetData = function (oData, sSpecific) {
    var innerData = mData( oData, sSpecific );

    if ( oCol.mRender && (sSpecific && sSpecific !== '') )
    {
      return mRender( innerData, sSpecific, oData );
    }
    return innerData;
  };
  oCol.fnSetData = _fnSetObjectDataFn( mDataSrc );

  /* Feature sorting overrides column specific when off */
  if ( !oSettings.oFeatures.bSort )
  {
    oCol.bSortable = false;
    th.addClass( oClasses.sSortableNone ); // Have to add class here as order event isn't called
  }

  /* Check that the class assignment is correct for sorting */
  var bAsc = $.inArray('asc', oCol.asSorting) !== -1;
  var bDesc = $.inArray('desc', oCol.asSorting) !== -1;
  if ( !oCol.bSortable || (!bAsc && !bDesc) )
  {
    oCol.sSortingClass = oClasses.sSortableNone;
    oCol.sSortingClassJUI = "";
  }
  else if ( bAsc && !bDesc )
  {
    oCol.sSortingClass = oClasses.sSortableAsc;
    oCol.sSortingClassJUI = oClasses.sSortJUIAscAllowed;
  }
  else if ( !bAsc && bDesc )
  {
    oCol.sSortingClass = oClasses.sSortableDesc;
    oCol.sSortingClassJUI = oClasses.sSortJUIDescAllowed;
  }
  else
  {
    oCol.sSortingClass = oClasses.sSortable;
    oCol.sSortingClassJUI = oClasses.sSortJUI;
  }
}


/**
 * Adjust the table column widths for new data. Note: you would probably want to
 * do a redraw after calling this function!
 *  @param {object} settings dataTables settings object
 *  @memberof DataTable#oApi
 */
function _fnAdjustColumnSizing ( settings )
{
  /* Not interested in doing column width calculation if auto-width is disabled */
  if ( settings.oFeatures.bAutoWidth !== false )
  {
    var columns = settings.aoColumns;

    _fnCalculateColumnWidths( settings );
    for ( var i=0 , iLen=columns.length ; i<iLen ; i++ )
    {
      columns[i].nTh.style.width = columns[i].sWidth;
    }
  }

  var scroll = settings.oScroll;
  if ( scroll.sY !== '' || scroll.sX !== '')
  {
    _fnScrollDraw( settings );
  }

  _fnCallbackFire( settings, null, 'column-sizing', [settings] );
}


/**
 * Covert the index of a visible column to the index in the data array (take account
 * of hidden columns)
 *  @param {object} oSettings dataTables settings object
 *  @param {int} iMatch Visible column index to lookup
 *  @returns {int} i the data index
 *  @memberof DataTable#oApi
 */
function _fnVisibleToColumnIndex( oSettings, iMatch )
{
  var aiVis = _fnGetColumns( oSettings, 'bVisible' );

  return typeof aiVis[iMatch] === 'number' ?
    aiVis[iMatch] :
    null;
}


/**
 * Covert the index of an index in the data array and convert it to the visible
 *   column index (take account of hidden columns)
 *  @param {int} iMatch Column index to lookup
 *  @param {object} oSettings dataTables settings object
 *  @returns {int} i the data index
 *  @memberof DataTable#oApi
 */
function _fnColumnIndexToVisible( oSettings, iMatch )
{
  var aiVis = _fnGetColumns( oSettings, 'bVisible' );
  var iPos = $.inArray( iMatch, aiVis );

  return iPos !== -1 ? iPos : null;
}


/**
 * Get the number of visible columns
 *  @param {object} oSettings dataTables settings object
 *  @returns {int} i the number of visible columns
 *  @memberof DataTable#oApi
 */
function _fnVisbleColumns( oSettings )
{
  return _fnGetColumns( oSettings, 'bVisible' ).length;
}


/**
 * Get an array of column indexes that match a given property
 *  @param {object} oSettings dataTables settings object
 *  @param {string} sParam Parameter in aoColumns to look for - typically
 *    bVisible or bSearchable
 *  @returns {array} Array of indexes with matched properties
 *  @memberof DataTable#oApi
 */
function _fnGetColumns( oSettings, sParam )
{
  var a = [];

  $.map( oSettings.aoColumns, function(val, i) {
    if ( val[sParam] ) {
      a.push( i );
    }
  } );

  return a;
}


/**
 * Calculate the 'type' of a column
 *  @param {object} settings dataTables settings object
 *  @memberof DataTable#oApi
 */
function _fnColumnTypes ( settings )
{
  var columns = settings.aoColumns;
  var data = settings.aoData;
  var types = DataTable.ext.type.detect;
  var i, ien, j, jen, k, ken;
  var col, cell, detectedType, cache;

  // For each column, spin over the 
  for ( i=0, ien=columns.length ; i<ien ; i++ ) {
    col = columns[i];
    cache = [];

    if ( ! col.sType && col._sManualType ) {
      col.sType = col._sManualType;
    }
    else if ( ! col.sType ) {
      for ( j=0, jen=types.length ; j<jen ; j++ ) {
        for ( k=0, ken=data.length ; k<ken ; k++ ) {
          // Use a cache array so we only need to get the type data
          // from the formatter once (when using multiple detectors)
          if ( cache[k] === undefined ) {
            cache[k] = _fnGetCellData( settings, k, i, 'type' );
          }

          detectedType = types[j]( cache[k], settings );

          // Doesn't match, so break early, since this type can't
          // apply to this column. Also, HTML is a special case since
          // it is so similar to `string`. Just a single match is
          // needed for a column to be html type
          if ( ! detectedType || detectedType === 'html' ) {
            break;
          }
        }

        // Type is valid for all data points in the column - use this
        // type
        if ( detectedType ) {
          col.sType = detectedType;
          break;
        }
      }

      // Fall back - if no type was detected, always use string
      if ( ! col.sType ) {
        col.sType = 'string';
      }
    }
  }
}


/**
 * Take the column definitions and static columns arrays and calculate how
 * they relate to column indexes. The callback function will then apply the
 * definition found for a column to a suitable configuration object.
 *  @param {object} oSettings dataTables settings object
 *  @param {array} aoColDefs The aoColumnDefs array that is to be applied
 *  @param {array} aoCols The aoColumns array that defines columns individually
 *  @param {function} fn Callback function - takes two parameters, the calculated
 *    column index and the definition for that column.
 *  @memberof DataTable#oApi
 */
function _fnApplyColumnDefs( oSettings, aoColDefs, aoCols, fn )
{
  var i, iLen, j, jLen, k, kLen, def;
  var columns = oSettings.aoColumns;

  // Column definitions with aTargets
  if ( aoColDefs )
  {
    /* Loop over the definitions array - loop in reverse so first instance has priority */
    for ( i=aoColDefs.length-1 ; i>=0 ; i-- )
    {
      def = aoColDefs[i];

      /* Each definition can target multiple columns, as it is an array */
      var aTargets = def.targets !== undefined ?
        def.targets :
        def.aTargets;

      if ( ! $.isArray( aTargets ) )
      {
        aTargets = [ aTargets ];
      }

      for ( j=0, jLen=aTargets.length ; j<jLen ; j++ )
      {
        if ( typeof aTargets[j] === 'number' && aTargets[j] >= 0 )
        {
          /* Add columns that we don't yet know about */
          while( columns.length <= aTargets[j] )
          {
            _fnAddColumn( oSettings );
          }

          /* Integer, basic index */
          fn( aTargets[j], def );
        }
        else if ( typeof aTargets[j] === 'number' && aTargets[j] < 0 )
        {
          /* Negative integer, right to left column counting */
          fn( columns.length+aTargets[j], def );
        }
        else if ( typeof aTargets[j] === 'string' )
        {
          /* Class name matching on TH element */
          for ( k=0, kLen=columns.length ; k<kLen ; k++ )
          {
            if ( aTargets[j] == "_all" ||
                 $(columns[k].nTh).hasClass( aTargets[j] ) )
            {
              fn( k, def );
            }
          }
        }
      }
    }
  }

  // Statically defined columns array
  if ( aoCols )
  {
    for ( i=0, iLen=aoCols.length ; i<iLen ; i++ )
    {
      fn( i, aoCols[i] );
    }
  }
}

/**
 * Add a data array to the table, creating DOM node etc. This is the parallel to
 * _fnGatherData, but for adding rows from a Javascript source, rather than a
 * DOM source.
 *  @param {object} oSettings dataTables settings object
 *  @param {array} aData data array to be added
 *  @param {node} [nTr] TR element to add to the table - optional. If not given,
 *    DataTables will create a row automatically
 *  @param {array} [anTds] Array of TD|TH elements for the row - must be given
 *    if nTr is.
 *  @returns {int} >=0 if successful (index of new aoData entry), -1 if failed
 *  @memberof DataTable#oApi
 */
function _fnAddData ( oSettings, aDataIn, nTr, anTds )
{
  /* Create the object for storing information about this new row */
  var iRow = oSettings.aoData.length;
  var oData = $.extend( true, {}, DataTable.models.oRow, {
    src: nTr ? 'dom' : 'data'
  } );

  oData._aData = aDataIn;
  oSettings.aoData.push( oData );

  /* Create the cells */
  var nTd, sThisType;
  var columns = oSettings.aoColumns;
  for ( var i=0, iLen=columns.length ; i<iLen ; i++ )
  {
    // When working with a row, the data source object must be populated. In
    // all other cases, the data source object is already populated, so we
    // don't overwrite it, which might break bindings etc
    if ( nTr ) {
      _fnSetCellData( oSettings, iRow, i, _fnGetCellData( oSettings, iRow, i ) );
    }
    columns[i].sType = null;
  }

  /* Add to the display array */
  oSettings.aiDisplayMaster.push( iRow );

  /* Create the DOM information */
  if ( !oSettings.oFeatures.bDeferRender )
  {
    _fnCreateTr( oSettings, iRow, nTr, anTds );
  }

  return iRow;
}


/**
 * Add one or more TR elements to the table. Generally we'd expect to
 * use this for reading data from a DOM sourced table, but it could be
 * used for an TR element. Note that if a TR is given, it is used (i.e.
 * it is not cloned).
 *  @param {object} settings dataTables settings object
 *  @param {array|node|jQuery} trs The TR element(s) to add to the table
 *  @returns {array} Array of indexes for the added rows
 *  @memberof DataTable#oApi
 */
function _fnAddTr( settings, trs )
{
  var row;

  // Allow an individual node to be passed in
  if ( ! (trs instanceof $) ) {
    trs = $(trs);
  }

  return trs.map( function (i, el) {
    row = _fnGetRowElements( settings, el );
    return _fnAddData( settings, row.data, el, row.cells );
  } );
}


/**
 * Take a TR element and convert it to an index in aoData
 *  @param {object} oSettings dataTables settings object
 *  @param {node} n the TR element to find
 *  @returns {int} index if the node is found, null if not
 *  @memberof DataTable#oApi
 */
function _fnNodeToDataIndex( oSettings, n )
{
  return (n._DT_RowIndex!==undefined) ? n._DT_RowIndex : null;
}


/**
 * Take a TD element and convert it into a column data index (not the visible index)
 *  @param {object} oSettings dataTables settings object
 *  @param {int} iRow The row number the TD/TH can be found in
 *  @param {node} n The TD/TH element to find
 *  @returns {int} index if the node is found, -1 if not
 *  @memberof DataTable#oApi
 */
function _fnNodeToColumnIndex( oSettings, iRow, n )
{
  return $.inArray( n, oSettings.aoData[ iRow ].anCells );
}


/**
 * Get the data for a given cell from the internal cache, taking into account data mapping
 *  @param {object} oSettings dataTables settings object
 *  @param {int} iRow aoData row id
 *  @param {int} iCol Column index
 *  @param {string} sSpecific data get type ('display', 'type' 'filter' 'sort')
 *  @returns {*} Cell data
 *  @memberof DataTable#oApi
 */
function _fnGetCellData( oSettings, iRow, iCol, sSpecific )
{
  var oCol = oSettings.aoColumns[iCol];
  var oData = oSettings.aoData[iRow]._aData;
  var sData = oCol.fnGetData( oData, sSpecific );

  if ( sData === undefined )
  {
    if ( oSettings.iDrawError != oSettings.iDraw && oCol.sDefaultContent === null )
    {
      _fnLog( oSettings, 0, "Requested unknown parameter "+
        (typeof oCol.mData=='function' ? '{function}' : "'"+oCol.mData+"'")+
        " for row "+iRow, 4 );
      oSettings.iDrawError = oSettings.iDraw;
    }
    return oCol.sDefaultContent;
  }

  /* When the data source is null, we can use default column data */
  if ( (sData === oData || sData === null) && oCol.sDefaultContent !== null )
  {
    sData = oCol.sDefaultContent;
  }
  else if ( typeof sData === 'function' )
  {
    // If the data source is a function, then we run it and use the return
    return sData();
  }

  if ( sData === null && sSpecific == 'display' )
  {
    return '';
  }
  return sData;
}


/**
 * Set the value for a specific cell, into the internal data cache
 *  @param {object} oSettings dataTables settings object
 *  @param {int} iRow aoData row id
 *  @param {int} iCol Column index
 *  @param {*} val Value to set
 *  @memberof DataTable#oApi
 */
function _fnSetCellData( oSettings, iRow, iCol, val )
{
  var oCol = oSettings.aoColumns[iCol];
  var oData = oSettings.aoData[iRow]._aData;

  oCol.fnSetData( oData, val );
}


// Private variable that is used to match action syntax in the data property object
var __reArray = /\[.*?\]$/;
var __reFn = /\(\)$/;

/**
 * Split string on periods, taking into account escaped periods
 * @param  {string} str String to split
 * @return {array} Split string
 */
function _fnSplitObjNotation( str )
{
  return $.map( str.match(/(\\.|[^\.])+/g), function ( s ) {
    return s.replace('\\.', '.');
  } );
}


/**
 * Return a function that can be used to get data from a source object, taking
 * into account the ability to use nested objects as a source
 *  @param {string|int|function} mSource The data source for the object
 *  @returns {function} Data get function
 *  @memberof DataTable#oApi
 */
function _fnGetObjectDataFn( mSource )
{
  if ( $.isPlainObject( mSource ) )
  {
    /* Build an object of get functions, and wrap them in a single call */
    var o = {};
    $.each( mSource, function (key, val) {
      if ( val ) {
        o[key] = _fnGetObjectDataFn( val );
      }
    } );

    return function (data, type, extra) {
      var t = o[type] || o._;
      return t !== undefined ?
        t(data, type, extra) :
        data;
    };
  }
  else if ( mSource === null )
  {
    /* Give an empty string for rendering / sorting etc */
    return function (data, type) {
      return data;
    };
  }
  else if ( typeof mSource === 'function' )
    {
      return function (data, type, extra) {
        return mSource( data, type, extra );
      };
    }
    else if ( typeof mSource === 'string' && (mSource.indexOf('.') !== -1 ||
            mSource.indexOf('[') !== -1 || mSource.indexOf('(') !== -1) )
    {
      /* If there is a . in the source string then the data source is in a
       * nested object so we loop over the data for each level to get the next
       * level down. On each loop we test for undefined, and if found immediately
       * return. This allows entire objects to be missing and sDefaultContent to
       * be used if defined, rather than throwing an error
       */
      var fetchData = function (data, type, src) {
        var arrayNotation, funcNotation, out, innerSrc;
  
        if ( src !== "" )
        {
          var a = _fnSplitObjNotation( src );
  
          for ( var i=0, iLen=a.length ; i<iLen ; i++ )
          {
            // Check if we are dealing with special notation
            arrayNotation = a[i].match(__reArray);
            funcNotation = a[i].match(__reFn);
  
            if ( arrayNotation )
            {
              // Array notation
              a[i] = a[i].replace(__reArray, '');
  
              // Condition allows simply [] to be passed in
              if ( a[i] !== "" ) {
                data = data[ a[i] ];
              }
              out = [];
  
              // Get the remainder of the nested object to get
              a.splice( 0, i+1 );
              innerSrc = a.join('.');
  
              // Traverse each entry in the array getting the properties requested
              for ( var j=0, jLen=data.length ; j<jLen ; j++ ) {
                out.push( fetchData( data[j], type, innerSrc ) );
              }
  
              // If a string is given in between the array notation indicators, that
              // is used to join the strings together, otherwise an array is returned
              var join = arrayNotation[0].substring(1, arrayNotation[0].length-1);
              data = (join==="") ? out : out.join(join);
  
              // The inner call to fetchData has already traversed through the remainder
              // of the source requested, so we exit from the loop
              break;
            }
            else if ( funcNotation )
            {
              // Function call
              a[i] = a[i].replace(__reFn, '');
              data = data[ a[i] ]();
              continue;
            }
  
            if ( data === null || data[ a[i] ] === undefined )
            {
              return undefined;
            }
            data = data[ a[i] ];
          }
        }
  
        return data;
      };
  
      return function (data, type) {
        return fetchData( data, type, mSource );
      };
    }
    else
    {
      /* Array or flat object mapping */
      return function (data, type) {
        return data[mSource];
      };
    }
  }
  
  
  /**
   * Return a function that can be used to set data from a source object, taking
   * into account the ability to use nested objects as a source
   *  @param {string|int|function} mSource The data source for the object
   *  @returns {function} Data set function
   *  @memberof DataTable#oApi
   */
  function _fnSetObjectDataFn( mSource )
  {
    if ( $.isPlainObject( mSource ) )
    {
      /* Unlike get, only the underscore (global) option is used for for
       * setting data since we don't know the type here. This is why an object
       * option is not documented for `mData` (which is read/write), but it is
       * for `mRender` which is read only.
       */
      return _fnSetObjectDataFn( mSource._ );
    }
    else if ( mSource === null )
    {
      /* Nothing to do when the data source is null */
      return function (data, val) {};
    }
    else if ( typeof mSource === 'function' )
    {
      return function (data, val) {
        mSource( data, 'set', val );
      };
    }
    else if ( typeof mSource === 'string' && (mSource.indexOf('.') !== -1 ||
            mSource.indexOf('[') !== -1 || mSource.indexOf('(') !== -1) )
    {
      /* Like the get, we need to get data from a nested object */
      var setData = function (data, val, src) {
        var a = _fnSplitObjNotation( src ), b;
        var aLast = a[a.length-1];
        var arrayNotation, funcNotation, o, innerSrc;
  
        for ( var i=0, iLen=a.length-1 ; i<iLen ; i++ )
        {
          // Check if we are dealing with an array notation request
          arrayNotation = a[i].match(__reArray);
          funcNotation = a[i].match(__reFn);
  
          if ( arrayNotation )
          {
            a[i] = a[i].replace(__reArray, '');
            data[ a[i] ] = [];
  
            // Get the remainder of the nested object to set so we can recurse
            b = a.slice();
            b.splice( 0, i+1 );
            innerSrc = b.join('.');
  
            // Traverse each entry in the array setting the properties requested
            for ( var j=0, jLen=val.length ; j<jLen ; j++ )
            {
              o = {};
              setData( o, val[j], innerSrc );
              data[ a[i] ].push( o );
            }
  
            // The inner call to setData has already traversed through the remainder
            // of the source and has set the data, thus we can exit here
            return;
          }
          else if ( funcNotation )
          {
            // Function call
            a[i] = a[i].replace(__reFn, '');
            data = data[ a[i] ]( val );
          }
  
          // If the nested object doesn't currently exist - since we are
          // trying to set the value - create it
          if ( data[ a[i] ] === null || data[ a[i] ] === undefined )
          {
            data[ a[i] ] = {};
          }
          data = data[ a[i] ];
        }
  
        // Last item in the input - i.e, the actual set
        if ( aLast.match(__reFn ) )
        {
          // Function call
          data = data[ aLast.replace(__reFn, '') ]( val );
        }
        else
        {
          // If array notation is used, we just want to strip it and use the property name
          // and assign the value. If it isn't used, then we get the result we want anyway
          data[ aLast.replace(__reArray, '') ] = val;
        }
      };
  
      return function (data, val) {
        return setData( data, val, mSource );
      };
    }
    else
    {
      /* Array or flat object mapping */
      return function (data, val) {
        data[mSource] = val;
      };
    }
  }
  
  
  /**
   * Return an array with the full table data
   *  @param {object} oSettings dataTables settings object
   *  @returns array {array} aData Master data array
   *  @memberof DataTable#oApi
   */
  function _fnGetDataMaster ( settings )
  {
    return _pluck( settings.aoData, '_aData' );
  }
  
  
  /**
   * Nuke the table
   *  @param {object} oSettings dataTables settings object
   *  @memberof DataTable#oApi
   */
  function _fnClearTable( settings )
  {
    settings.aoData.length = 0;
    settings.aiDisplayMaster.length = 0;
    settings.aiDisplay.length = 0;
  }
  
  
   /**
   * Take an array of integers (index array) and remove a target integer (value - not
   * the key!)
   *  @param {array} a Index array to target
   *  @param {int} iTarget value to find
   *  @memberof DataTable#oApi
   */
  function _fnDeleteIndex( a, iTarget, splice )
  {
    var iTargetIndex = -1;
  
    for ( var i=0, iLen=a.length ; i<iLen ; i++ )
    {
      if ( a[i] == iTarget )
      {
        iTargetIndex = i;
      }
      else if ( a[i] > iTarget )
      {
        a[i]--;
      }
    }
  
    if ( iTargetIndex != -1 && splice === undefined )
    {
      a.splice( iTargetIndex, 1 );
    }
  }
  
  
  /**
   * Mark cached data as invalid such that a re-read of the data will occur when
   * the cached data is next requested. Also update from the data source object.
   *
   * @param {object} settings DataTables settings object
   * @param  {int}    rowIdx   Row index to invalidate
   * @memberof DataTable#oApi
   *
   * @todo For the modularisation of v1.11 this will need to become a callback, so
   *   the sort and filter methods can subscribe to it. That will required
   *   initialisation options for sorting, which is why it is not already baked in
   */
  function _fnInvalidateRow( settings, rowIdx, src, column )
  {
    var row = settings.aoData[ rowIdx ];
    var i, ien;
  
    // Are we reading last data from DOM or the data object?
    if ( src === 'dom' || ((! src || src === 'auto') && row.src === 'dom') ) {
      // Read the data from the DOM
      row._aData = _fnGetRowElements( settings, row ).data;
    }
    else {
      // Reading from data object, update the DOM
      var cells = row.anCells;
  
      if ( cells ) {
        for ( i=0, ien=cells.length ; i<ien ; i++ ) {
          cells[i].innerHTML = _fnGetCellData( settings, rowIdx, i, 'display' );
        }
      }
    }
  
    row._aSortData = null;
    row._aFilterData = null;
  
    // Invalidate the type for a specific column (if given) or all columns since
    // the data might have changed
    var cols = settings.aoColumns;
    if ( column !== undefined ) {
      cols[ column ].sType = null;
    }
    else {
      for ( i=0, ien=cols.length ; i<ien ; i++ ) {
        cols[i].sType = null;
      }
    }
  
    // Update DataTables special `DT_*` attributes for the row
    _fnRowAttributes( row );
  }
  
  
  /**
   * Build a data source object from an HTML row, reading the contents of the
   * cells that are in the row.
   *
   * @param {object} settings DataTables settings object
   * @param {node|object} TR element from which to read data or existing row
   *   object from which to re-read the data from the cells
   * @returns {object} Object with two parameters: `data` the data read, in
   *   document order, and `cells` and array of nodes (they can be useful to the
   *   caller, so rather than needing a second traversal to get them, just return
   *   them from here).
   * @memberof DataTable#oApi
   */
  function _fnGetRowElements( settings, row )
  {
    var
      d = [],
      tds = [],
      td = row.firstChild,
      name, col, o, i=0, contents,
      columns = settings.aoColumns;
  
    var attr = function ( str, data, td  ) {
      if ( typeof str === 'string' ) {
        var idx = str.indexOf('@');
  
        if ( idx !== -1 ) {
          var src = str.substring( idx+1 );
          o[ '@'+src ] = td.getAttribute( src );
        }
      }
    };
  
    var cellProcess = function ( cell ) {
      col = columns[i];
      contents = $.trim(cell.innerHTML);
  
      if ( col && col._bAttrSrc ) {
        o = {
          display: contents
        };
  
        attr( col.mData.sort, o, cell );
        attr( col.mData.type, o, cell );
        attr( col.mData.filter, o, cell );
  
        d.push( o );
      }
      else {
        d.push( contents );
      }
  
      tds.push( cell );
      i++;
    };
  
    if ( td ) {
      // `tr` element passed in
      while ( td ) {
        name = td.nodeName.toUpperCase();
  
        if ( name == "TD" || name == "TH" ) {
          cellProcess( td );
        }
  
        td = td.nextSibling;
      }
    }
    else {
      // Existing row object passed in
      tds = row.anCells;
      
      for ( var j=0, jen=tds.length ; j<jen ; j++ ) {
        cellProcess( tds[j] );
      }
    }
  
    return {
      data: d,
      cells: tds
    };
  }
  /**
   * Create a new TR element (and it's TD children) for a row
   *  @param {object} oSettings dataTables settings object
   *  @param {int} iRow Row to consider
   *  @param {node} [nTrIn] TR element to add to the table - optional. If not given,
   *    DataTables will create a row automatically
   *  @param {array} [anTds] Array of TD|TH elements for the row - must be given
   *    if nTr is.
   *  @memberof DataTable#oApi
   */
  function _fnCreateTr ( oSettings, iRow, nTrIn, anTds )
  {
    var
      row = oSettings.aoData[iRow],
      rowData = row._aData,
      cells = [],
      nTr, nTd, oCol,
      i, iLen;
  
    if ( row.nTr === null )
    {
      nTr = nTrIn || document.createElement('tr');
  
      row.nTr = nTr;
      row.anCells = cells;
  
      /* Use a private property on the node to allow reserve mapping from the node
       * to the aoData array for fast look up
       */
      nTr._DT_RowIndex = iRow;
  
      /* Special parameters can be given by the data source to be used on the row */
      _fnRowAttributes( row );
  
      /* Process each column */
      for ( i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
      {
        oCol = oSettings.aoColumns[i];
  
        nTd = nTrIn ? anTds[i] : document.createElement( oCol.sCellType );
        cells.push( nTd );
  
        // Need to create the HTML if new, or if a rendering function is defined
        if ( !nTrIn || oCol.mRender || oCol.mData !== i )
        {
          nTd.innerHTML = _fnGetCellData( oSettings, iRow, i, 'display' );
        }
  
        /* Add user defined class */
        if ( oCol.sClass )
        {
          nTd.className += ' '+oCol.sClass;
        }
  
        // Visibility - add or remove as required
        if ( oCol.bVisible && ! nTrIn )
        {
          nTr.appendChild( nTd );
        }
        else if ( ! oCol.bVisible && nTrIn )
        {
          nTd.parentNode.removeChild( nTd );
        }
  
        if ( oCol.fnCreatedCell )
        {
          oCol.fnCreatedCell.call( oSettings.oInstance,
            nTd, _fnGetCellData( oSettings, iRow, i, 'display' ), rowData, iRow, i
          );
        }
      }
  
      _fnCallbackFire( oSettings, 'aoRowCreatedCallback', null, [nTr, rowData, iRow] );
    }
  
    // Remove once webkit bug 131819 and Chromium bug 365619 have been resolved
    // and deployed
    row.nTr.setAttribute( 'role', 'row' );
  }
  
  
  /**
   * Add attributes to a row based on the special `DT_*` parameters in a data
   * source object.
   *  @param {object} DataTables row object for the row to be modified
   *  @memberof DataTable#oApi
   */
  function _fnRowAttributes( row )
  {
    var tr = row.nTr;
    var data = row._aData;
  
    if ( tr ) {
      if ( data.DT_RowId ) {
        tr.id = data.DT_RowId;
      }
  
      if ( data.DT_RowClass ) {
        // Remove any classes added by DT_RowClass before
        var a = data.DT_RowClass.split(' ');
        row.__rowc = row.__rowc ?
          _unique( row.__rowc.concat( a ) ) :
          a;
  
        $(tr)
          .removeClass( row.__rowc.join(' ') )
          .addClass( data.DT_RowClass );
      }
  
      if ( data.DT_RowData ) {
        $(tr).data( data.DT_RowData );
      }
    }
  }
  
  
  /**
   * Create the HTML header for the table
   *  @param {object} oSettings dataTables settings object
   *  @memberof DataTable#oApi
   */
  function _fnBuildHead( oSettings )
  {
    var i, ien, cell, row, column;
    var thead = oSettings.nTHead;
    var tfoot = oSettings.nTFoot;
    var createHeader = $('th, td', thead).length === 0;
    var classes = oSettings.oClasses;
    var columns = oSettings.aoColumns;
  
    if ( createHeader ) {
      row = $('<tr/>').appendTo( thead );
    }
  
    for ( i=0, ien=columns.length ; i<ien ; i++ ) {
      column = columns[i];
      cell = $( column.nTh ).addClass( column.sClass );
  
      if ( createHeader ) {
        cell.appendTo( row );
      }
  
      // 1.11 move into sorting
      if ( oSettings.oFeatures.bSort ) {
        cell.addClass( column.sSortingClass );
  
        if ( column.bSortable !== false ) {
          cell
            .attr( 'tabindex', oSettings.iTabIndex )
            .attr( 'aria-controls', oSettings.sTableId );
  
          _fnSortAttachListener( oSettings, column.nTh, i );
        }
      }
  
      if ( column.sTitle != cell.html() ) {
        cell.html( column.sTitle );
      }
  
      _fnRenderer( oSettings, 'header' )(
        oSettings, cell, column, classes
      );
    }
  
    if ( createHeader ) {
      _fnDetectHeader( oSettings.aoHeader, thead );
    }
    
    /* ARIA role for the rows */
    $(thead).find('>tr').attr('role', 'row');
  
    /* Deal with the footer - add classes if required */
    $(thead).find('>tr>th, >tr>td').addClass( classes.sHeaderTH );
    $(tfoot).find('>tr>th, >tr>td').addClass( classes.sFooterTH );
  
    // Cache the footer cells. Note that we only take the cells from the first
    // row in the footer. If there is more than one row the user wants to
    // interact with, they need to use the table().foot() method. Note also this
    // allows cells to be used for multiple columns using colspan
    if ( tfoot !== null ) {
      var cells = oSettings.aoFooter[0];
  
      for ( i=0, ien=cells.length ; i<ien ; i++ ) {
        column = columns[i];
        column.nTf = cells[i].cell;
  
        if ( column.sClass ) {
          $(column.nTf).addClass( column.sClass );
        }
      }
    }
  }
  
  
  /**
   * Draw the header (or footer) element based on the column visibility states. The
   * methodology here is to use the layout array from _fnDetectHeader, modified for
   * the instantaneous column visibility, to construct the new layout. The grid is
   * traversed over cell at a time in a rows x columns grid fashion, although each
   * cell insert can cover multiple elements in the grid - which is tracks using the
   * aApplied array. Cell inserts in the grid will only occur where there isn't
   * already a cell in that position.
   *  @param {object} oSettings dataTables settings object
   *  @param array {objects} aoSource Layout array from _fnDetectHeader
   *  @param {boolean} [bIncludeHidden=false] If true then include the hidden columns in the calc,
   *  @memberof DataTable#oApi
   */
  function _fnDrawHead( oSettings, aoSource, bIncludeHidden )
  {
    var i, iLen, j, jLen, k, kLen, n, nLocalTr;
    var aoLocal = [];
    var aApplied = [];
    var iColumns = oSettings.aoColumns.length;
    var iRowspan, iColspan;
  
    if ( ! aoSource )
    {
      return;
    }
  
    if (  bIncludeHidden === undefined )
    {
      bIncludeHidden = false;
    }
  
    /* Make a copy of the master layout array, but without the visible columns in it */
    for ( i=0, iLen=aoSource.length ; i<iLen ; i++ )
    {
      aoLocal[i] = aoSource[i].slice();
      aoLocal[i].nTr = aoSource[i].nTr;
  
      /* Remove any columns which are currently hidden */
      for ( j=iColumns-1 ; j>=0 ; j-- )
      {
        if ( !oSettings.aoColumns[j].bVisible && !bIncludeHidden )
        {
          aoLocal[i].splice( j, 1 );
        }
      }
  
      /* Prep the applied array - it needs an element for each row */
      aApplied.push( [] );
    }
  
    for ( i=0, iLen=aoLocal.length ; i<iLen ; i++ )
    {
      nLocalTr = aoLocal[i].nTr;
  
      /* All cells are going to be replaced, so empty out the row */
      if ( nLocalTr )
      {
        while( (n = nLocalTr.firstChild) )
        {
          nLocalTr.removeChild( n );
        }
      }
  
      for ( j=0, jLen=aoLocal[i].length ; j<jLen ; j++ )
      {
        iRowspan = 1;
        iColspan = 1;
  
        /* Check to see if there is already a cell (row/colspan) covering our target
         * insert point. If there is, then there is nothing to do.
         */
        if ( aApplied[i][j] === undefined )
        {
          nLocalTr.appendChild( aoLocal[i][j].cell );
          aApplied[i][j] = 1;
  
          /* Expand the cell to cover as many rows as needed */
          while ( aoLocal[i+iRowspan] !== undefined &&
                  aoLocal[i][j].cell == aoLocal[i+iRowspan][j].cell )
          {
            aApplied[i+iRowspan][j] = 1;
            iRowspan++;
          }
  
          /* Expand the cell to cover as many columns as needed */
          while ( aoLocal[i][j+iColspan] !== undefined &&
                  aoLocal[i][j].cell == aoLocal[i][j+iColspan].cell )
          {
            /* Must update the applied array over the rows for the columns */
            for ( k=0 ; k<iRowspan ; k++ )
            {
              aApplied[i+k][j+iColspan] = 1;
            }
            iColspan++;
          }
  
          /* Do the actual expansion in the DOM */
          $(aoLocal[i][j].cell)
            .attr('rowspan', iRowspan)
            .attr('colspan', iColspan);
        }
      }
    }
  }
  
  
  /**
   * Insert the required TR nodes into the table for display
   *  @param {object} oSettings dataTables settings object
   *  @memberof DataTable#oApi
   */
  function _fnDraw( oSettings )
  {
    /* Provide a pre-callback function which can be used to cancel the draw is false is returned */
    var aPreDraw = _fnCallbackFire( oSettings, 'aoPreDrawCallback', 'preDraw', [oSettings] );
    if ( $.inArray( false, aPreDraw ) !== -1 )
    {
      _fnProcessingDisplay( oSettings, false );
      return;
    }
  
    var i, iLen, n;
    var anRows = [];
    var iRowCount = 0;
    var asStripeClasses = oSettings.asStripeClasses;
    var iStripes = asStripeClasses.length;
    var iOpenRows = oSettings.aoOpenRows.length;
    var oLang = oSettings.oLanguage;
    var iInitDisplayStart = oSettings.iInitDisplayStart;
    var bServerSide = _fnDataSource( oSettings ) == 'ssp';
    var aiDisplay = oSettings.aiDisplay;
  
    oSettings.bDrawing = true;
  
    /* Check and see if we have an initial draw position from state saving */
    if ( iInitDisplayStart !== undefined && iInitDisplayStart !== -1 )
    {
      oSettings._iDisplayStart = bServerSide ?
        iInitDisplayStart :
        iInitDisplayStart >= oSettings.fnRecordsDisplay() ?
          0 :
          iInitDisplayStart;
  
      oSettings.iInitDisplayStart = -1;
    }
  
    var iDisplayStart = oSettings._iDisplayStart;
    var iDisplayEnd = oSettings.fnDisplayEnd();
  
    /* Server-side processing draw intercept */
    if ( oSettings.bDeferLoading )
    {
      oSettings.bDeferLoading = false;
      oSettings.iDraw++;
      _fnProcessingDisplay( oSettings, false );
    }
    else if ( !bServerSide )
    {
      oSettings.iDraw++;
    }
    else if ( !oSettings.bDestroying && !_fnAjaxUpdate( oSettings ) )
    {
      return;
    }
  
    if ( aiDisplay.length !== 0 )
    {
      var iStart = bServerSide ? 0 : iDisplayStart;
      var iEnd = bServerSide ? oSettings.aoData.length : iDisplayEnd;
  
      for ( var j=iStart ; j<iEnd ; j++ )
      {
        var iDataIndex = aiDisplay[j];
        var aoData = oSettings.aoData[ iDataIndex ];
        if ( aoData.nTr === null )
        {
          _fnCreateTr( oSettings, iDataIndex );
        }
  
        var nRow = aoData.nTr;
  
        /* Remove the old striping classes and then add the new one */
        if ( iStripes !== 0 )
        {
          var sStripe = asStripeClasses[ iRowCount % iStripes ];
          if ( aoData._sRowStripe != sStripe )
          {
            $(nRow).removeClass( aoData._sRowStripe ).addClass( sStripe );
            aoData._sRowStripe = sStripe;
          }
        }
  
        /* Row callback functions - might want to manipulate the row */
        _fnCallbackFire( oSettings, 'aoRowCallback', null,
          [nRow, aoData._aData, iRowCount, j] );
  
        anRows.push( nRow );
        iRowCount++;
      }
    }
    else
    {
      /* Table is empty - create a row with an empty message in it */
      var sZero = oLang.sZeroRecords;
      if ( oSettings.iDraw == 1 &&  _fnDataSource( oSettings ) == 'ajax' )
      {
        sZero = oLang.sLoadingRecords;
      }
      else if ( oLang.sEmptyTable && oSettings.fnRecordsTotal() === 0 )
      {
        sZero = oLang.sEmptyTable;
      }
  
      anRows[ 0 ] = $( '<tr/>', { 'class': iStripes ? asStripeClasses[0] : '' } )
        .append( $('<td />', {
          'valign':  'top',
          'colSpan': _fnVisbleColumns( oSettings ),
          'class':   oSettings.oClasses.sRowEmpty
        } ).html( sZero ) )[0];
    }
  
    /* Header and footer callbacks */
    _fnCallbackFire( oSettings, 'aoHeaderCallback', 'header', [ $(oSettings.nTHead).children('tr')[0],
      _fnGetDataMaster( oSettings ), iDisplayStart, iDisplayEnd, aiDisplay ] );
  
    _fnCallbackFire( oSettings, 'aoFooterCallback', 'footer', [ $(oSettings.nTFoot).children('tr')[0],
      _fnGetDataMaster( oSettings ), iDisplayStart, iDisplayEnd, aiDisplay ] );
  
    var body = $(oSettings.nTBody);
  
    body.children().detach();
    body.append( $(anRows) );
  
    /* Call all required callback functions for the end of a draw */
    _fnCallbackFire( oSettings, 'aoDrawCallback', 'draw', [oSettings] );
  
    /* Draw is complete, sorting and filtering must be as well */
    oSettings.bSorted = false;
    oSettings.bFiltered = false;
    oSettings.bDrawing = false;
  }
  
  
  /**
   * Redraw the table - taking account of the various features which are enabled
   *  @param {object} oSettings dataTables settings object
   *  @param {boolean} [holdPosition] Keep the current paging position. By default
   *    the paging is reset to the first page
   *  @memberof DataTable#oApi
   */
  function _fnReDraw( settings, holdPosition )
  {
    var
      features = settings.oFeatures,
      sort     = features.bSort,
      filter   = features.bFilter;
  
    if ( sort ) {
      _fnSort( settings );
    }
  
    if ( filter ) {
      _fnFilterComplete( settings, settings.oPreviousSearch );
    }
    else {
      // No filtering, so we want to just use the display master
      settings.aiDisplay = settings.aiDisplayMaster.slice();
    }
  
    if ( holdPosition !== true ) {
      settings._iDisplayStart = 0;
    }
  
    _fnDraw( settings );
  }
  
  
  /**
   * Add the options to the page HTML for the table
   *  @param {object} oSettings dataTables settings object
   *  @memberof DataTable#oApi
   */
  function _fnAddOptionsHtml ( oSettings )
  {
    var classes = oSettings.oClasses;
    var table = $(oSettings.nTable);
    var holding = $('<div/>').insertBefore( table ); // Holding element for speed
    var features = oSettings.oFeatures;
  
    // All DataTables are wrapped in a div
    var insert = $('<div/>', {
      id:      oSettings.sTableId+'_wrapper',
      'class': classes.sWrapper + (oSettings.nTFoot ? '' : ' '+classes.sNoFooter)
    } );
  
    oSettings.nHolding = holding[0];
    oSettings.nTableWrapper = insert[0];
    oSettings.nTableReinsertBefore = oSettings.nTable.nextSibling;
  
    /* Loop over the user set positioning and place the elements as needed */
    var aDom = oSettings.sDom.split('');
    var featureNode, cOption, nNewNode, cNext, sAttr, j;
    for ( var i=0 ; i<aDom.length ; i++ )
    {
      featureNode = null;
      cOption = aDom[i];
  
      if ( cOption == '<' )
      {
        /* New container div */
        nNewNode = $('<div/>')[0];
  
        /* Check to see if we should append an id and/or a class name to the container */
        cNext = aDom[i+1];
        if ( cNext == "'" || cNext == '"' )
        {
          sAttr = "";
          j = 2;
          while ( aDom[i+j] != cNext )
          {
            sAttr += aDom[i+j];
            j++;
          }
  
          /* Replace jQuery UI constants @todo depreciated */
          if ( sAttr == "H" )
          {
            sAttr = classes.sJUIHeader;
          }
          else if ( sAttr == "F" )
          {
            sAttr = classes.sJUIFooter;
          }
  
          /* The attribute can be in the format of "#id.class", "#id" or "class" This logic
           * breaks the string into parts and applies them as needed
           */
          if ( sAttr.indexOf('.') != -1 )
          {
            var aSplit = sAttr.split('.');
            nNewNode.id = aSplit[0].substr(1, aSplit[0].length-1);
            nNewNode.className = aSplit[1];
          }
          else if ( sAttr.charAt(0) == "#" )
          {
            nNewNode.id = sAttr.substr(1, sAttr.length-1);
          }
          else
          {
            nNewNode.className = sAttr;
          }
  
          i += j; /* Move along the position array */
        }
  
        insert.append( nNewNode );
        insert = $(nNewNode);
      }
      else if ( cOption == '>' )
      {
        /* End container div */
        insert = insert.parent();
      }
      // @todo Move options into their own plugins?
      else if ( cOption == 'l' && features.bPaginate && features.bLengthChange )
      {
        /* Length */
        featureNode = _fnFeatureHtmlLength( oSettings );
      }
      else if ( cOption == 'f' && features.bFilter )
      {
        /* Filter */
        featureNode = _fnFeatureHtmlFilter( oSettings );
      }
      else if ( cOption == 'r' && features.bProcessing )
      {
        /* pRocessing */
        featureNode = _fnFeatureHtmlProcessing( oSettings );
      }
      else if ( cOption == 't' )
      {
        /* Table */
        featureNode = _fnFeatureHtmlTable( oSettings );
      }
      else if ( cOption ==  'i' && features.bInfo )
      {
        /* Info */
        featureNode = _fnFeatureHtmlInfo( oSettings );
      }
      else if ( cOption == 'p' && features.bPaginate )
      {
        /* Pagination */
        featureNode = _fnFeatureHtmlPaginate( oSettings );
      }
      else if ( DataTable.ext.feature.length !== 0 )
      {
        /* Plug-in features */
        var aoFeatures = DataTable.ext.feature;
        for ( var k=0, kLen=aoFeatures.length ; k<kLen ; k++ )
        {
          if ( cOption == aoFeatures[k].cFeature )
          {
            featureNode = aoFeatures[k].fnInit( oSettings );
            break;
          }
        }
      }
  
      /* Add to the 2D features array */
      if ( featureNode )
      {
        var aanFeatures = oSettings.aanFeatures;
  
        if ( ! aanFeatures[cOption] )
        {
          aanFeatures[cOption] = [];
        }
  
        aanFeatures[cOption].push( featureNode );
        insert.append( featureNode );
      }
    }
  
    /* Built our DOM structure - replace the holding div with what we want */
    holding.replaceWith( insert );
  }
  
  
  /**
   * Use the DOM source to create up an array of header cells. The idea here is to
   * create a layout grid (array) of rows x columns, which contains a reference
   * to the cell that that point in the grid (regardless of col/rowspan), such that
   * any column / row could be removed and the new grid constructed
   *  @param array {object} aLayout Array to store the calculated layout in
   *  @param {node} nThead The header/footer element for the table
   *  @memberof DataTable#oApi
   */
  function _fnDetectHeader ( aLayout, nThead )
  {
    var nTrs = $(nThead).children('tr');
    var nTr, nCell;
    var i, k, l, iLen, jLen, iColShifted, iColumn, iColspan, iRowspan;
    var bUnique;
    var fnShiftCol = function ( a, i, j ) {
      var k = a[i];
                  while ( k[j] ) {
        j++;
      }
      return j;
    };
  
    aLayout.splice( 0, aLayout.length );
  
    /* We know how many rows there are in the layout - so prep it */
    for ( i=0, iLen=nTrs.length ; i<iLen ; i++ )
    {
      aLayout.push( [] );
    }
  
    /* Calculate a layout array */
    for ( i=0, iLen=nTrs.length ; i<iLen ; i++ )
    {
      nTr = nTrs[i];
      iColumn = 0;
  
      /* For every cell in the row... */
      nCell = nTr.firstChild;
      while ( nCell ) {
        if ( nCell.nodeName.toUpperCase() == "TD" ||
             nCell.nodeName.toUpperCase() == "TH" )
        {
          /* Get the col and rowspan attributes from the DOM and sanitise them */
          iColspan = nCell.getAttribute('colspan') * 1;
          iRowspan = nCell.getAttribute('rowspan') * 1;
          iColspan = (!iColspan || iColspan===0 || iColspan===1) ? 1 : iColspan;
          iRowspan = (!iRowspan || iRowspan===0 || iRowspan===1) ? 1 : iRowspan;
  
          /* There might be colspan cells already in this row, so shift our target
           * accordingly
           */
          iColShifted = fnShiftCol( aLayout, i, iColumn );
  
          /* Cache calculation for unique columns */
          bUnique = iColspan === 1 ? true : false;
  
          /* If there is col / rowspan, copy the information into the layout grid */
          for ( l=0 ; l<iColspan ; l++ )
          {
            for ( k=0 ; k<iRowspan ; k++ )
            {
              aLayout[i+k][iColShifted+l] = {
                "cell": nCell,
                "unique": bUnique
              };
              aLayout[i+k].nTr = nTr;
            }
          }
        }
        nCell = nCell.nextSibling;
      }
    }
  }
  
  
  /**
   * Get an array of unique th elements, one for each column
   *  @param {object} oSettings dataTables settings object
   *  @param {node} nHeader automatically detect the layout from this node - optional
   *  @param {array} aLayout thead/tfoot layout from _fnDetectHeader - optional
   *  @returns array {node} aReturn list of unique th's
   *  @memberof DataTable#oApi
   */
  function _fnGetUniqueThs ( oSettings, nHeader, aLayout )
  {
    var aReturn = [];
    if ( !aLayout )
    {
      aLayout = oSettings.aoHeader;
      if ( nHeader )
      {
        aLayout = [];
        _fnDetectHeader( aLayout, nHeader );
      }
    }
  
    for ( var i=0, iLen=aLayout.length ; i<iLen ; i++ )
    {
      for ( var j=0, jLen=aLayout[i].length ; j<jLen ; j++ )
      {
        if ( aLayout[i][j].unique &&
           (!aReturn[j] || !oSettings.bSortCellsTop) )
        {
          aReturn[j] = aLayout[i][j].cell;
        }
      }
    }
  
    return aReturn;
  }
  
  
  
  /**
   * Create an Ajax call based on the table's settings, taking into account that
   * parameters can have multiple forms, and backwards compatibility.
   *
   * @param {object} oSettings dataTables settings object
   * @param {array} data Data to send to the server, required by
   *     DataTables - may be augmented by developer callbacks
   * @param {function} fn Callback function to run when data is obtained
   */
  function _fnBuildAjax( oSettings, data, fn )
  {
    // Compatibility with 1.9-, allow fnServerData and event to manipulate
    _fnCallbackFire( oSettings, 'aoServerParams', 'serverParams', [data] );
  
    // Convert to object based for 1.10+ if using the old array scheme which can
    // come from server-side processing or serverParams
    if ( data && $.isArray(data) ) {
      var tmp = {};
      var rbracket = /(.*?)\[\]$/;
  
      $.each( data, function (key, val) {
        var match = val.name.match(rbracket);
  
        if ( match ) {
          // Support for arrays
          var name = match[0];
  
          if ( ! tmp[ name ] ) {
            tmp[ name ] = [];
          }
          tmp[ name ].push( val.value );
        }
        else {
          tmp[val.name] = val.value;
        }
      } );
      data = tmp;
    }
  
    var ajaxData;
    var ajax = oSettings.ajax;
    var instance = oSettings.oInstance;
  
    if ( $.isPlainObject( ajax ) && ajax.data )
    {
      ajaxData = ajax.data;
  
      var newData = $.isFunction( ajaxData ) ?
        ajaxData( data ) :  // fn can manipulate data or return an object
        ajaxData;           // object or array to merge
  
      // If the function returned an object, use that alone
      data = $.isFunction( ajaxData ) && newData ?
        newData :
        $.extend( true, data, newData );
  
      // Remove the data property as we've resolved it already and don't want
      // jQuery to do it again (it is restored at the end of the function)
      delete ajax.data;
    }
  
    var baseAjax = {
      "data": data,
      "success": function (json) {
        var error = json.error || json.sError;
        if ( error ) {
          oSettings.oApi._fnLog( oSettings, 0, error );
        }
  
        oSettings.json = json;
        _fnCallbackFire( oSettings, null, 'xhr', [oSettings, json] );
        fn( json );
      },
      "dataType": "json",
      "cache": false,
      "type": oSettings.sServerMethod,
      "error": function (xhr, error, thrown) {
        var log = oSettings.oApi._fnLog;
  
        if ( error == "parsererror" ) {
          log( oSettings, 0, 'Invalid JSON response', 1 );
        }
        else if ( xhr.readyState === 4 ) {
          log( oSettings, 0, 'Ajax error', 7 );
        }
  
        _fnProcessingDisplay( oSettings, false );
      }
    };
  
    // Store the data submitted for the API
    oSettings.oAjaxData = data;
  
    // Allow plug-ins and external processes to modify the data
    _fnCallbackFire( oSettings, null, 'preXhr', [oSettings, data] );
  
    if ( oSettings.fnServerData )
    {
      // DataTables 1.9- compatibility
      oSettings.fnServerData.call( instance,
        oSettings.sAjaxSource,
        $.map( data, function (val, key) { // Need to convert back to 1.9 trad format
          return { name: key, value: val };
        } ),
        fn,
        oSettings
      );
    }
    else if ( oSettings.sAjaxSource || typeof ajax === 'string' )
    {
      // DataTables 1.9- compatibility
      oSettings.jqXHR = $.ajax( $.extend( baseAjax, {
        url: ajax || oSettings.sAjaxSource
      } ) );
    }
    else if ( $.isFunction( ajax ) )
    {
      // Is a function - let the caller define what needs to be done
      oSettings.jqXHR = ajax.call( instance, data, fn, oSettings );
    }
    else
    {
      // Object to extend the base settings
      oSettings.jqXHR = $.ajax( $.extend( baseAjax, ajax ) );
  
      // Restore for next time around
      ajax.data = ajaxData;
    }
  }
  
  
  /**
   * Update the table using an Ajax call
   *  @param {object} oSettings dataTables settings object
   *  @returns {boolean} Block the table drawing or not
   *  @memberof DataTable#oApi
   */
  function _fnAjaxUpdate( oSettings )
  {
    if ( oSettings.bAjaxDataGet )
    {
      oSettings.iDraw++;
      _fnProcessingDisplay( oSettings, true );
      var iColumns = oSettings.aoColumns.length;
      var aoData = _fnAjaxParameters( oSettings );
  
      _fnBuildAjax( oSettings, aoData, function(json) {
        _fnAjaxUpdateDraw( oSettings, json );
      }, oSettings );
  
      return false;
    }
    return true;
  }
  
  
  /**
   * Build up the parameters in an object needed for a server-side processing
   * request. Note that this is basically done twice, is different ways - a modern
   * method which is used by default in DataTables 1.10 which uses objects and
   * arrays, or the 1.9- method with is name / value pairs. 1.9 method is used if
   * the sAjaxSource option is used in the initialisation, or the legacyAjax
   * option is set.
   *  @param {object} oSettings dataTables settings object
   *  @returns {bool} block the table drawing or not
   *  @memberof DataTable#oApi
   */
  function _fnAjaxParameters( settings )
  {
    var
      columns = settings.aoColumns,
      columnCount = columns.length,
      features = settings.oFeatures,
      preSearch = settings.oPreviousSearch,
      preColSearch = settings.aoPreSearchCols,
      i, data = [], dataProp, column, columnSearch,
      sort = _fnSortFlatten( settings ),
      displayStart = settings._iDisplayStart,
      displayLength = features.bPaginate !== false ?
        settings._iDisplayLength :
        -1;
  
    var param = function ( name, value ) {
      data.push( { 'name': name, 'value': value } );
    };
  
    // DataTables 1.9- compatible method
    param( 'sEcho',          settings.iDraw );
    param( 'iColumns',       columnCount );
    param( 'sColumns',       _pluck( columns, 'sName' ).join(',') );
    param( 'iDisplayStart',  displayStart );
    param( 'iDisplayLength', displayLength );
  
    // DataTables 1.10+ method
    var d = {
      draw:    settings.iDraw,
      columns: [],
      order:   [],
      start:   displayStart,
      length:  displayLength,
      search:  {
        value: preSearch.sSearch,
        regex: preSearch.bRegex
      }
    };
  
    for ( i=0 ; i<columnCount ; i++ ) {
      column = columns[i];
      columnSearch = preColSearch[i];
      dataProp = typeof column.mData=="function" ? 'function' : column.mData ;
  
      d.columns.push( {
        data:       dataProp,
        name:       column.sName,
        searchable: column.bSearchable,
        orderable:  column.bSortable,
        search:     {
          value: columnSearch.sSearch,
          regex: columnSearch.bRegex
        }
      } );
  
      param( "mDataProp_"+i, dataProp );
  
      if ( features.bFilter ) {
        param( 'sSearch_'+i,     columnSearch.sSearch );
        param( 'bRegex_'+i,      columnSearch.bRegex );
        param( 'bSearchable_'+i, column.bSearchable );
      }
  
      if ( features.bSort ) {
        param( 'bSortable_'+i, column.bSortable );
      }
    }
  
    if ( features.bFilter ) {
      param( 'sSearch', preSearch.sSearch );
      param( 'bRegex', preSearch.bRegex );
    }
  
    if ( features.bSort ) {
      $.each( sort, function ( i, val ) {
        d.order.push( { column: val.col, dir: val.dir } );
  
        param( 'iSortCol_'+i, val.col );
        param( 'sSortDir_'+i, val.dir );
      } );
  
      param( 'iSortingCols', sort.length );
    }
  
    // If the legacy.ajax parameter is null, then we automatically decide which
    // form to use, based on sAjaxSource
    var legacy = DataTable.ext.legacy.ajax;
    if ( legacy === null ) {
      return settings.sAjaxSource ? data : d;
    }
  
    // Otherwise, if legacy has been specified then we use that to decide on the
    // form
    return legacy ? data : d;
  }
  
  
  /**
   * Data the data from the server (nuking the old) and redraw the table
   *  @param {object} oSettings dataTables settings object
   *  @param {object} json json data return from the server.
   *  @param {string} json.sEcho Tracking flag for DataTables to match requests
   *  @param {int} json.iTotalRecords Number of records in the data set, not accounting for filtering
   *  @param {int} json.iTotalDisplayRecords Number of records in the data set, accounting for filtering
   *  @param {array} json.aaData The data to display on this page
   *  @param {string} [json.sColumns] Column ordering (sName, comma separated)
   *  @memberof DataTable#oApi
   */
  function _fnAjaxUpdateDraw ( settings, json )
  {
    // v1.10 uses camelCase variables, while 1.9 uses Hungarian notation.
    // Support both
    var compat = function ( old, modern ) {
      return json[old] !== undefined ? json[old] : json[modern];
    };
  
    var draw            = compat( 'sEcho',                'draw' );
    var recordsTotal    = compat( 'iTotalRecords',        'recordsTotal' );
    var rocordsFiltered = compat( 'iTotalDisplayRecords', 'recordsFiltered' );
  
    if ( draw ) {
      // Protect against out of sequence returns
      if ( draw*1 < settings.iDraw ) {
        return;
      }
      settings.iDraw = draw * 1;
    }
  
    _fnClearTable( settings );
    settings._iRecordsTotal   = parseInt(recordsTotal, 10);
    settings._iRecordsDisplay = parseInt(rocordsFiltered, 10);
  
    var data = _fnAjaxDataSrc( settings, json );
    for ( var i=0, ien=data.length ; i<ien ; i++ ) {
      _fnAddData( settings, data[i] );
    }
    settings.aiDisplay = settings.aiDisplayMaster.slice();
  
    settings.bAjaxDataGet = false;
    _fnDraw( settings );
  
    if ( ! settings._bInitComplete ) {
      _fnInitComplete( settings, json );
    }
  
    settings.bAjaxDataGet = true;
    _fnProcessingDisplay( settings, false );
  }
  
  
  /**
   * Get the data from the JSON data source to use for drawing a table. Using
   * `_fnGetObjectDataFn` allows the data to be sourced from a property of the
   * source object, or from a processing function.
   *  @param {object} oSettings dataTables settings object
   *  @param  {object} json Data source object / array from the server
   *  @return {array} Array of data to use
   */
  function _fnAjaxDataSrc ( oSettings, json )
  {
    var dataSrc = $.isPlainObject( oSettings.ajax ) && oSettings.ajax.dataSrc !== undefined ?
      oSettings.ajax.dataSrc :
      oSettings.sAjaxDataProp; // Compatibility with 1.9-.
  
    // Compatibility with 1.9-. In order to read from aaData, check if the
    // default has been changed, if not, check for aaData
    if ( dataSrc === 'data' ) {
      return json.aaData || json[dataSrc];
    }
  
    return dataSrc !== "" ?
      _fnGetObjectDataFn( dataSrc )( json ) :
      json;
  }
  
  
  /**
   * Generate the node required for filtering text
   *  @returns {node} Filter control element
   *  @param {object} oSettings dataTables settings object
   *  @memberof DataTable#oApi
   */
  function _fnFeatureHtmlFilter ( settings )
  {
    var classes = settings.oClasses;
    var tableId = settings.sTableId;
    var previousSearch = settings.oPreviousSearch;
    var features = settings.aanFeatures;
    var input = '<input type="search" class="'+classes.sFilterInput+'"/>';
  
    var str = settings.oLanguage.sSearch;
    str = str.match(/_INPUT_/) ?
      str.replace('_INPUT_', input) :
      str+input;
  
    var filter = $('<div/>', {
        'id': ! features.f ? tableId+'_filter' : null,
        'class': classes.sFilter
      } )
      .append( $('<label/>' ).append( str ) );
  
    var searchFn = function() {
      /* Update all other filter input elements for the new display */
      var n = features.f;
      var val = !this.value ? "" : this.value; // mental IE8 fix :-(
  
      /* Now do the filter */
      if ( val != previousSearch.sSearch ) {
        _fnFilterComplete( settings, {
          "sSearch": val,
          "bRegex": previousSearch.bRegex,
          "bSmart": previousSearch.bSmart ,
          "bCaseInsensitive": previousSearch.bCaseInsensitive
        } );
  
        // Need to redraw, without resorting
        settings._iDisplayStart = 0;
        _fnDraw( settings );
      }
    };
    var jqFilter = $('input', filter)
      .val( previousSearch.sSearch.replace('"','&quot;') )
      .bind(
        'keyup.DT search.DT input.DT paste.DT cut.DT',
        _fnDataSource( settings ) === 'ssp' ?
          _fnThrottle( searchFn, 400 ):
          searchFn
      )
      .bind( 'keypress.DT', function(e) {
        /* Prevent form submission */
        if ( e.keyCode == 13 ) {
          return false;
        }
      } )
      .attr('aria-controls', tableId);
  
    // Update the input elements whenever the table is filtered
    $(settings.nTable).on( 'filter.DT', function () {
      // IE9 throws an 'unknown error' if document.activeElement is used
      // inside an iframe or frame...
      try {
        if ( jqFilter[0] !== document.activeElement ) {
          jqFilter.val( previousSearch.sSearch );
        }
      }
      catch ( e ) {}
    } );
  
    return filter[0];
  }
  
  
  /**
   * Filter the table using both the global filter and column based filtering
   *  @param {object} oSettings dataTables settings object
   *  @param {object} oSearch search information
   *  @param {int} [iForce] force a research of the master array (1) or not (undefined or 0)
   *  @memberof DataTable#oApi
   */
  function _fnFilterComplete ( oSettings, oInput, iForce )
  {
    var oPrevSearch = oSettings.oPreviousSearch;
    var aoPrevSearch = oSettings.aoPreSearchCols;
    var fnSaveFilter = function ( oFilter ) {
      /* Save the filtering values */
      oPrevSearch.sSearch = oFilter.sSearch;
      oPrevSearch.bRegex = oFilter.bRegex;
      oPrevSearch.bSmart = oFilter.bSmart;
      oPrevSearch.bCaseInsensitive = oFilter.bCaseInsensitive;
    };
    var fnRegex = function ( o ) {
      // Backwards compatibility with the bEscapeRegex option
      return o.bEscapeRegex !== undefined ? !o.bEscapeRegex : o.bRegex;
    };
  
    // Resolve any column types that are unknown due to addition or invalidation
    // @todo As per sort - can this be moved into an event handler?
    _fnColumnTypes( oSettings );
  
    /* In server-side processing all filtering is done by the server, so no point hanging around here */
    if ( _fnDataSource( oSettings ) != 'ssp' )
    {
      /* Global filter */
      _fnFilter( oSettings, oInput.sSearch, iForce, fnRegex(oInput), oInput.bSmart, oInput.bCaseInsensitive );
      fnSaveFilter( oInput );
  
      /* Now do the individual column filter */
      for ( var i=0 ; i<aoPrevSearch.length ; i++ )
      {
        _fnFilterColumn( oSettings, aoPrevSearch[i].sSearch, i, fnRegex(aoPrevSearch[i]),
          aoPrevSearch[i].bSmart, aoPrevSearch[i].bCaseInsensitive );
      }
  
      /* Custom filtering */
      _fnFilterCustom( oSettings );
    }
    else
    {
      fnSaveFilter( oInput );
    }
  
    /* Tell the draw function we have been filtering */
    oSettings.bFiltered = true;
    _fnCallbackFire( oSettings, null, 'search', [oSettings] );
  }
  
  
  /**
   * Apply custom filtering functions
   *  @param {object} oSettings dataTables settings object
   *  @memberof DataTable#oApi
   */
  function _fnFilterCustom( settings )
  {
    var filters = DataTable.ext.search;
    var displayRows = settings.aiDisplay;
    var row, rowIdx;
  
    for ( var i=0, iLen=filters.length ; i<iLen ; i++ ) {
      for ( var j=displayRows.length-1 ; j>=0 ; j-- ) {
        rowIdx = displayRows[ j ];
        row = settings.aoData[ rowIdx ];
  
        if ( ! filters[i]( settings, row._aFilterData, rowIdx, row._aData ) ) {
          displayRows.splice( j, 1 );
        }
      }
    }
  }
  
  
  /**
   * Filter the table on a per-column basis
   *  @param {object} oSettings dataTables settings object
   *  @param {string} sInput string to filter on
   *  @param {int} iColumn column to filter
   *  @param {bool} bRegex treat search string as a regular expression or not
   *  @param {bool} bSmart use smart filtering or not
   *  @param {bool} bCaseInsensitive Do case insenstive matching or not
   *  @memberof DataTable#oApi
   */
  function _fnFilterColumn ( settings, searchStr, colIdx, regex, smart, caseInsensitive )
  {
    if ( searchStr === '' ) {
      return;
    }
  
    var data;
    var display = settings.aiDisplay;
    var rpSearch = _fnFilterCreateSearch( searchStr, regex, smart, caseInsensitive );
  
    for ( var i=display.length-1 ; i>=0 ; i-- ) {
      data = settings.aoData[ display[i] ]._aFilterData[ colIdx ];
  
      if ( ! rpSearch.test( data ) ) {
        display.splice( i, 1 );
      }
    }
  }
  
  
  /**
   * Filter the data table based on user input and draw the table
   *  @param {object} settings dataTables settings object
   *  @param {string} input string to filter on
   *  @param {int} force optional - force a research of the master array (1) or not (undefined or 0)
   *  @param {bool} regex treat as a regular expression or not
   *  @param {bool} smart perform smart filtering or not
   *  @param {bool} caseInsensitive Do case insenstive matching or not
   *  @memberof DataTable#oApi
   */
  function _fnFilter( settings, input, force, regex, smart, caseInsensitive )
  {
    var rpSearch = _fnFilterCreateSearch( input, regex, smart, caseInsensitive );
    var prevSearch = settings.oPreviousSearch.sSearch;
    var displayMaster = settings.aiDisplayMaster;
    var display, invalidated, i;
  
    // Need to take account of custom filtering functions - always filter
    if ( DataTable.ext.search.length !== 0 ) {
      force = true;
    }
  
    // Check if any of the rows were invalidated
    invalidated = _fnFilterData( settings );
  
    // If the input is blank - we just want the full data set
    if ( input.length <= 0 ) {
      settings.aiDisplay = displayMaster.slice();
    }
    else {
      // New search - start from the master array
      if ( invalidated ||
         force ||
         prevSearch.length > input.length ||
         input.indexOf(prevSearch) !== 0 ||
         settings.bSorted // On resort, the display master needs to be
                          // re-filtered since indexes will have changed
      ) {
        settings.aiDisplay = displayMaster.slice();
      }
  
      // Search the display array
      display = settings.aiDisplay;
  
      for ( i=display.length-1 ; i>=0 ; i-- ) {
        if ( ! rpSearch.test( settings.aoData[ display[i] ]._sFilterRow ) ) {
          display.splice( i, 1 );
        }
      }
    }
  }
  
  
  /**
   * Build a regular expression object suitable for searching a table
   *  @param {string} sSearch string to search for
   *  @param {bool} bRegex treat as a regular expression or not
   *  @param {bool} bSmart perform smart filtering or not
   *  @param {bool} bCaseInsensitive Do case insensitive matching or not
   *  @returns {RegExp} constructed object
   *  @memberof DataTable#oApi
   */
  function _fnFilterCreateSearch( search, regex, smart, caseInsensitive )
  {
    search = regex ?
      search :
      _fnEscapeRegex( search );
    
    if ( smart ) {
      /* For smart filtering we want to allow the search to work regardless of
       * word order. We also want double quoted text to be preserved, so word
       * order is important - a la google. So this is what we want to
       * generate:
       * 
       * ^(?=.*?\bone\b)(?=.*?\btwo three\b)(?=.*?\bfour\b).*$
       */
      var a = $.map( search.match( /"[^"]+"|[^ ]+/g ) || '', function ( word ) {
        return word.charAt(0) === '"' ?
          word.match( /^"(.*)"$/ )[1] :
          word;
      } );
  
      search = '^(?=.*?'+a.join( ')(?=.*?' )+').*$';
    }
  
    return new RegExp( search, caseInsensitive ? 'i' : '' );
  }
  
  
  /**
   * scape a string such that it can be used in a regular expression
   *  @param {string} sVal string to escape
   *  @returns {string} escaped string
   *  @memberof DataTable#oApi
   */
  function _fnEscapeRegex ( sVal )
  {
    return sVal.replace( _re_escape_regex, '\\$1' );
  }
  
  
  
  var __filter_div = $('<div>')[0];
  var __filter_div_textContent = __filter_div.textContent !== undefined;
  
  // Update the filtering data for each row if needed (by invalidation or first run)
  function _fnFilterData ( settings )
  {
    var columns = settings.aoColumns;
    var column;
    var i, j, ien, jen, filterData, cellData, row;
    var fomatters = DataTable.ext.type.search;
    var wasInvalidated = false;
  
    for ( i=0, ien=settings.aoData.length ; i<ien ; i++ ) {
      row = settings.aoData[i];
  
      if ( ! row._aFilterData ) {
        filterData = [];
  
        for ( j=0, jen=columns.length ; j<jen ; j++ ) {
          column = columns[j];
  
          if ( column.bSearchable ) {
            cellData = _fnGetCellData( settings, i, j, 'filter' );
  
            cellData = fomatters[ column.sType ] ?
              fomatters[ column.sType ]( cellData ) :
              cellData !== null ?
                cellData :
                '';
          }
          else {
            cellData = '';
          }
  
          // If it looks like there is an HTML entity in the string,
          // attempt to decode it so sorting works as expected. Note that
          // we could use a single line of jQuery to do this, but the DOM
          // method used here is much faster http://jsperf.com/html-decode
          if ( cellData.indexOf && cellData.indexOf('&') !== -1 ) {
            __filter_div.innerHTML = cellData;
            cellData = __filter_div_textContent ?
              __filter_div.textContent :
              __filter_div.innerText;
          }
  
          if ( cellData.replace ) {
            cellData = cellData.replace(/[\r\n]/g, '');
          }
  
          filterData.push( cellData );
        }
  
        row._aFilterData = filterData;
        row._sFilterRow = filterData.join('  ');
        wasInvalidated = true;
      }
    }
  
    return wasInvalidated;
  }
  
  /**
   * Generate the node required for the info display
   *  @param {object} oSettings dataTables settings object
   *  @returns {node} Information element
   *  @memberof DataTable#oApi
   */
  function _fnFeatureHtmlInfo ( settings )
  {
    var
      tid = settings.sTableId,
      nodes = settings.aanFeatures.i,
      n = $('<div/>', {
        'class': settings.oClasses.sInfo,
        'id': ! nodes ? tid+'_info' : null
      } );
  
    if ( ! nodes ) {
      // Update display on each draw
      settings.aoDrawCallback.push( {
        "fn": _fnUpdateInfo,
        "sName": "information"
      } );
  
      n
        .attr( 'role', 'status' )
        .attr( 'aria-live', 'polite' );
  
      // Table is described by our info div
      $(settings.nTable).attr( 'aria-describedby', tid+'_info' );
    }
  
    return n[0];
  }
  
  
  /**
   * Update the information elements in the display
   *  @param {object} settings dataTables settings object
   *  @memberof DataTable#oApi
   */
  function _fnUpdateInfo ( settings )
  {
    /* Show information about the table */
    var nodes = settings.aanFeatures.i;
    if ( nodes.length === 0 ) {
      return;
    }
  
    var
      lang  = settings.oLanguage,
      start = settings._iDisplayStart+1,
      end   = settings.fnDisplayEnd(),
      max   = settings.fnRecordsTotal(),
      total = settings.fnRecordsDisplay(),
      out   = total ?
        lang.sInfo :
        lang.sInfoEmpty;
  
    if ( total !== max ) {
      /* Record set after filtering */
      out += ' ' + lang.sInfoFiltered;
    }
  
    // Convert the macros
    out += lang.sInfoPostFix;
    out = _fnInfoMacros( settings, out );
  
    var callback = lang.fnInfoCallback;
    if ( callback !== null ) {
      out = callback.call( settings.oInstance,
        settings, start, end, max, total, out
      );
    }
  
    $(nodes).html( out );
  }
  
  
  function _fnInfoMacros ( settings, str )
  {
    // When infinite scrolling, we are always starting at 1. _iDisplayStart is used only
    // internally
    var
      formatter  = settings.fnFormatNumber,
      start      = settings._iDisplayStart+1,
      len        = settings._iDisplayLength,
      vis        = settings.fnRecordsDisplay(),
      all        = len === -1;
  
    return str.
      replace(/_START_/g, formatter.call( settings, start ) ).
      replace(/_END_/g,   formatter.call( settings, settings.fnDisplayEnd() ) ).
      replace(/_MAX_/g,   formatter.call( settings, settings.fnRecordsTotal() ) ).
      replace(/_TOTAL_/g, formatter.call( settings, vis ) ).
      replace(/_PAGE_/g,  formatter.call( settings, all ? 1 : Math.ceil( start / len ) ) ).
      replace(/_PAGES_/g, formatter.call( settings, all ? 1 : Math.ceil( vis / len ) ) );
  }
  
  
  
  /**
   * Draw the table for the first time, adding all required features
   *  @param {object} settings dataTables settings object
   *  @memberof DataTable#oApi
   */
  function _fnInitialise ( settings )
  {
    var i, iLen, iAjaxStart=settings.iInitDisplayStart;
    var columns = settings.aoColumns, column;
    var features = settings.oFeatures;
  
    /* Ensure that the table data is fully initialised */
    if ( ! settings.bInitialised ) {
      setTimeout( function(){ _fnInitialise( settings ); }, 200 );
      return;
    }
  
    /* Show the display HTML options */
    _fnAddOptionsHtml( settings );
  
    /* Build and draw the header / footer for the table */
    _fnBuildHead( settings );
    _fnDrawHead( settings, settings.aoHeader );
    _fnDrawHead( settings, settings.aoFooter );
  
    /* Okay to show that something is going on now */
    _fnProcessingDisplay( settings, true );
  
    /* Calculate sizes for columns */
    if ( features.bAutoWidth ) {
      _fnCalculateColumnWidths( settings );
    }
  
    for ( i=0, iLen=columns.length ; i<iLen ; i++ ) {
      column = columns[i];
  
      if ( column.sWidth ) {
        column.nTh.style.width = _fnStringToCss( column.sWidth );
      }
    }
  
    // If there is default sorting required - let's do it. The sort function
    // will do the drawing for us. Otherwise we draw the table regardless of the
    // Ajax source - this allows the table to look initialised for Ajax sourcing
    // data (show 'loading' message possibly)
    _fnReDraw( settings );
  
    // Server-side processing init complete is done by _fnAjaxUpdateDraw
    var dataSrc = _fnDataSource( settings );
    if ( dataSrc != 'ssp' ) {
      // if there is an ajax source load the data
      if ( dataSrc == 'ajax' ) {
        _fnBuildAjax( settings, [], function(json) {
          var aData = _fnAjaxDataSrc( settings, json );
  
          // Got the data - add it to the table
          for ( i=0 ; i<aData.length ; i++ ) {
            _fnAddData( settings, aData[i] );
          }
  
          // Reset the init display for cookie saving. We've already done
          // a filter, and therefore cleared it before. So we need to make
          // it appear 'fresh'
          settings.iInitDisplayStart = iAjaxStart;
  
          _fnReDraw( settings );
  
          _fnProcessingDisplay( settings, false );
          _fnInitComplete( settings, json );
        }, settings );
      }
      else {
        _fnProcessingDisplay( settings, false );
        _fnInitComplete( settings );
      }
    }
  }
  
  
  /**
   * Draw the table for the first time, adding all required features
   *  @param {object} oSettings dataTables settings object
   *  @param {object} [json] JSON from the server that completed the table, if using Ajax source
   *    with client-side processing (optional)
   *  @memberof DataTable#oApi
   */
  function _fnInitComplete ( settings, json )
  {
    settings._bInitComplete = true;
  
    // On an Ajax load we now have data and therefore want to apply the column
    // sizing
    if ( json ) {
      _fnAdjustColumnSizing( settings );
    }
  
    _fnCallbackFire( settings, 'aoInitComplete', 'init', [settings, json] );
  }
  
  
  function _fnLengthChange ( settings, val )
  {
    var len = parseInt( val, 10 );
    settings._iDisplayLength = len;
  
    _fnLengthOverflow( settings );
  
    // Fire length change event
    _fnCallbackFire( settings, null, 'length', [settings, len] );
  }
  
  
  /**
   * Generate the node required for user display length changing
   *  @param {object} settings dataTables settings object
   *  @returns {node} Display length feature node
   *  @memberof DataTable#oApi
   */
  function _fnFeatureHtmlLength ( settings )
  {
    var
      classes  = settings.oClasses,
      tableId  = settings.sTableId,
      menu     = settings.aLengthMenu,
      d2       = $.isArray( menu[0] ),
      lengths  = d2 ? menu[0] : menu,
      language = d2 ? menu[1] : menu;
  
    var select = $('<select/>', {
      'name':          tableId+'_length',
      'aria-controls': tableId,
      'class':         classes.sLengthSelect
    } );
  
    for ( var i=0, ien=lengths.length ; i<ien ; i++ ) {
      select[0][ i ] = new Option( language[i], lengths[i] );
    }
  
    var div = $('<div><label/></div>').addClass( classes.sLength );
    if ( ! settings.aanFeatures.l ) {
      div[0].id = tableId+'_length';
    }
  
    var a = settings.oLanguage.sLengthMenu.split(/(_MENU_)/);
    div.children().append( a.length > 1 ?
      [ a[0], select, a[2] ] :
      a[0]
    );
  
    // Can't use `select` variable, as user might provide their own select menu
    $('select', div)
      .val( settings._iDisplayLength )
      .bind( 'change.DT', function(e) {
        _fnLengthChange( settings, $(this).val() );
        _fnDraw( settings );
      } );
  
    // Update node value whenever anything changes the table's length
    $(settings.nTable).bind( 'length.dt.DT', function (e, s, len) {
      $('select', div).val( len );
    } );
  
    return div[0];
  }
  
  
  
  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   * Note that most of the paging logic is done in
   * DataTable.ext.pager
   */
  
  /**
   * Generate the node required for default pagination
   *  @param {object} oSettings dataTables settings object
   *  @returns {node} Pagination feature node
   *  @memberof DataTable#oApi
   */
  function _fnFeatureHtmlPaginate ( settings )
  {
    var
      type   = settings.sPaginationType,
      plugin = DataTable.ext.pager[ type ],
      modern = typeof plugin === 'function',
      redraw = function( settings ) {
        _fnDraw( settings );
      },
      node = $('<div/>').addClass( settings.oClasses.sPaging + type )[0],
      features = settings.aanFeatures;
  
    if ( ! modern ) {
      plugin.fnInit( settings, node, redraw );
    }
  
    /* Add a draw callback for the pagination on first instance, to update the paging display */
    if ( ! features.p )
    {
      node.id = settings.sTableId+'_paginate';
  
      settings.aoDrawCallback.push( {
        "fn": function( settings ) {
          if ( modern ) {
            var
              start      = settings._iDisplayStart,
              len        = settings._iDisplayLength,
              visRecords = settings.fnRecordsDisplay(),
              all        = len === -1,
              page = all ? 0 : Math.ceil( start / len ),
              pages = all ? 1 : Math.ceil( visRecords / len ),
              buttons = plugin(page, pages),
              i, ien;
  
            for ( i=0, ien=features.p.length ; i<ien ; i++ ) {
              _fnRenderer( settings, 'pageButton' )(
                settings, features.p[i], i, buttons, page, pages
              );
            }
          }
          else {
            plugin.fnUpdate( settings, redraw );
          }
        },
        "sName": "pagination"
      } );
    }
  
    return node;
  }
  
  
  /**
   * Alter the display settings to change the page
   *  @param {object} settings DataTables settings object
   *  @param {string|int} action Paging action to take: "first", "previous",
   *    "next" or "last" or page number to jump to (integer)
   *  @param [bool] redraw Automatically draw the update or not
   *  @returns {bool} true page has changed, false - no change
   *  @memberof DataTable#oApi
   */
  function _fnPageChange ( settings, action, redraw )
  {
    var
      start     = settings._iDisplayStart,
      len       = settings._iDisplayLength,
      records   = settings.fnRecordsDisplay();
  
    if ( records === 0 || len === -1 )
    {
      start = 0;
    }
    else if ( typeof action === "number" )
    {
      start = action * len;
  
      if ( start > records )
      {
        start = 0;
      }
    }
    else if ( action == "first" )
    {
      start = 0;
    }
    else if ( action == "previous" )
    {
      start = len >= 0 ?
        start - len :
        0;
  
      if ( start < 0 )
      {
        start = 0;
      }
    }
    else if ( action == "next" )
    {
      if ( start + len < records )
      {
        start += len;
      }
    }
    else if ( action == "last" )
    {
      start = Math.floor( (records-1) / len) * len;
    }
    else
    {
      _fnLog( settings, 0, "Unknown paging action: "+action, 5 );
    }
  
    var changed = settings._iDisplayStart !== start;
    settings._iDisplayStart = start;
  
    if ( changed ) {
      _fnCallbackFire( settings, null, 'page', [settings] );
  
      if ( redraw ) {
        _fnDraw( settings );
      }
    }
  
    return changed;
  }
  
  
  
  /**
   * Generate the node required for the processing node
   *  @param {object} settings dataTables settings object
   *  @returns {node} Processing element
   *  @memberof DataTable#oApi
   */
  function _fnFeatureHtmlProcessing ( settings )
  {
    return $('<div/>', {
        'id': ! settings.aanFeatures.r ? settings.sTableId+'_processing' : null,
        'class': settings.oClasses.sProcessing
      } )
      .html( settings.oLanguage.sProcessing )
      .insertBefore( settings.nTable )[0];
  }
  
  
  /**
   * Display or hide the processing indicator
   *  @param {object} settings dataTables settings object
   *  @param {bool} show Show the processing indicator (true) or not (false)
   *  @memberof DataTable#oApi
   */
  function _fnProcessingDisplay ( settings, show )
  {
    if ( settings.oFeatures.bProcessing ) {
      $(settings.aanFeatures.r).css( 'display', show ? 'block' : 'none' );
    }
  
    _fnCallbackFire( settings, null, 'processing', [settings, show] );
  }
  
  /**
   * Add any control elements for the table - specifically scrolling
   *  @param {object} settings dataTables settings object
   *  @returns {node} Node to add to the DOM
   *  @memberof DataTable#oApi
   */
  function _fnFeatureHtmlTable ( settings )
  {
    var table = $(settings.nTable);
  
    // Add the ARIA grid role to the table
    table.attr( 'role', 'grid' );
  
    // Scrolling from here on in
    var scroll = settings.oScroll;
  
    if ( scroll.sX === '' && scroll.sY === '' ) {
      return settings.nTable;
    }
  
    var scrollX = scroll.sX;
    var scrollY = scroll.sY;
    var classes = settings.oClasses;
    var caption = table.children('caption');
    var captionSide = caption.length ? caption[0]._captionSide : null;
    var headerClone = $( table[0].cloneNode(false) );
    var footerClone = $( table[0].cloneNode(false) );
    var footer = table.children('tfoot');
    var _div = '<div/>';
    var size = function ( s ) {
      return !s ? null : _fnStringToCss( s );
    };
  
    // This is fairly messy, but with x scrolling enabled, if the table has a
    // width attribute, regardless of any width applied using the column width
    // options, the browser will shrink or grow the table as needed to fit into
    // that 100%. That would make the width options useless. So we remove it.
    // This is okay, under the assumption that width:100% is applied to the
    // table in CSS (it is in the default stylesheet) which will set the table
    // width as appropriate (the attribute and css behave differently...)
    if ( scroll.sX && table.attr('width') === '100%' ) {
      table.removeAttr('width');
    }
  
    if ( ! footer.length ) {
      footer = null;
    }
  
    /*
     * The HTML structure that we want to generate in this function is:
     *  div - scroller
     *    div - scroll head
     *      div - scroll head inner
     *        table - scroll head table
     *          thead - thead
     *    div - scroll body
     *      table - table (master table)
     *        thead - thead clone for sizing
     *        tbody - tbody
     *    div - scroll foot
     *      div - scroll foot inner
     *        table - scroll foot table
     *          tfoot - tfoot
     */
    var scroller = $( _div, { 'class': classes.sScrollWrapper } )
      .append(
        $(_div, { 'class': classes.sScrollHead } )
          .css( {
            overflow: 'hidden',
            position: 'relative',
            border: 0,
            width: scrollX ? size(scrollX) : '100%'
          } )
          .append(
            $(_div, { 'class': classes.sScrollHeadInner } )
              .css( {
                'box-sizing': 'content-box',
                width: scroll.sXInner || '100%'
              } )
              .append(
                headerClone
                  .removeAttr('id')
                  .css( 'margin-left', 0 )
                  .append(
                    table.children('thead')
                  )
              )
          )
          .append( captionSide === 'top' ? caption : null )
      )
      .append(
        $(_div, { 'class': classes.sScrollBody } )
          .css( {
            overflow: 'auto',
            height: size( scrollY ),
            width: size( scrollX )
          } )
          .append( table )
      );
  
    if ( footer ) {
      scroller.append(
        $(_div, { 'class': classes.sScrollFoot } )
          .css( {
            overflow: 'hidden',
            border: 0,
            width: scrollX ? size(scrollX) : '100%'
          } )
          .append(
            $(_div, { 'class': classes.sScrollFootInner } )
              .append(
                footerClone
                  .removeAttr('id')
                  .css( 'margin-left', 0 )
                  .append(
                    table.children('tfoot')
                  )
              )
          )
          .append( captionSide === 'bottom' ? caption : null )
      );
    }
  
    var children = scroller.children();
    var scrollHead = children[0];
    var scrollBody = children[1];
    var scrollFoot = footer ? children[2] : null;
  
    // When the body is scrolled, then we also want to scroll the headers
    if ( scrollX ) {
      $(scrollBody).scroll( function (e) {
        var scrollLeft = this.scrollLeft;
  
        scrollHead.scrollLeft = scrollLeft;
  
        if ( footer ) {
          scrollFoot.scrollLeft = scrollLeft;
        }
      } );
    }
  
    settings.nScrollHead = scrollHead;
    settings.nScrollBody = scrollBody;
    settings.nScrollFoot = scrollFoot;
  
    // On redraw - align columns
    settings.aoDrawCallback.push( {
      "fn": _fnScrollDraw,
      "sName": "scrolling"
    } );
  
    return scroller[0];
  }
  
  
  
  /**
   * Update the header, footer and body tables for resizing - i.e. column
   * alignment.
   *
   * Welcome to the most horrible function DataTables. The process that this
   * function follows is basically:
   *   1. Re-create the table inside the scrolling div
   *   2. Take live measurements from the DOM
   *   3. Apply the measurements to align the columns
   *   4. Clean up
   *
   *  @param {object} settings dataTables settings object
   *  @memberof DataTable#oApi
   */
  function _fnScrollDraw ( settings )
  {
    // Given that this is such a monster function, a lot of variables are use
    // to try and keep the minimised size as small as possible
    var
      scroll         = settings.oScroll,
      scrollX        = scroll.sX,
      scrollXInner   = scroll.sXInner,
      scrollY        = scroll.sY,
      barWidth       = scroll.iBarWidth,
      divHeader      = $(settings.nScrollHead),
      divHeaderStyle = divHeader[0].style,
      divHeaderInner = divHeader.children('div'),
      divHeaderInnerStyle = divHeaderInner[0].style,
      divHeaderTable = divHeaderInner.children('table'),
      divBodyEl      = settings.nScrollBody,
      divBody        = $(divBodyEl),
      divBodyStyle   = divBodyEl.style,
      divFooter      = $(settings.nScrollFoot),
      divFooterInner = divFooter.children('div'),
      divFooterTable = divFooterInner.children('table'),
      header         = $(settings.nTHead),
      table          = $(settings.nTable),
      tableEl        = table[0],
      tableStyle     = tableEl.style,
      footer         = settings.nTFoot ? $(settings.nTFoot) : null,
      browser        = settings.oBrowser,
      ie67           = browser.bScrollOversize,
      headerTrgEls, footerTrgEls,
      headerSrcEls, footerSrcEls,
      headerCopy, footerCopy,
      headerWidths=[], footerWidths=[],
      headerContent=[],
      idx, correction, sanityWidth,
      zeroOut = function(nSizer) {
        var style = nSizer.style;
        style.paddingTop = "0";
        style.paddingBottom = "0";
        style.borderTopWidth = "0";
        style.borderBottomWidth = "0";
        style.height = 0;
      };
  
    /*
     * 1. Re-create the table inside the scrolling div
     */
  
    // Remove the old minimised thead and tfoot elements in the inner table
    table.children('thead, tfoot').remove();
  
    // Clone the current header and footer elements and then place it into the inner table
    headerCopy = header.clone().prependTo( table );
    headerTrgEls = header.find('tr'); // original header is in its own table
    headerSrcEls = headerCopy.find('tr');
    headerCopy.find('th, td').removeAttr('tabindex');
  
    if ( footer ) {
      footerCopy = footer.clone().prependTo( table );
      footerTrgEls = footer.find('tr'); // the original tfoot is in its own table and must be sized
      footerSrcEls = footerCopy.find('tr');
    }
  
  
    /*
     * 2. Take live measurements from the DOM - do not alter the DOM itself!
     */
  
    // Remove old sizing and apply the calculated column widths
    // Get the unique column headers in the newly created (cloned) header. We want to apply the
    // calculated sizes to this header
    if ( ! scrollX )
    {
      divBodyStyle.width = '100%';
      divHeader[0].style.width = '100%';
    }
  
    $.each( _fnGetUniqueThs( settings, headerCopy ), function ( i, el ) {
      idx = _fnVisibleToColumnIndex( settings, i );
      el.style.width = settings.aoColumns[idx].sWidth;
    } );
  
    if ( footer ) {
      _fnApplyToChildren( function(n) {
        n.style.width = "";
      }, footerSrcEls );
    }
  
    // If scroll collapse is enabled, when we put the headers back into the body for sizing, we
    // will end up forcing the scrollbar to appear, making our measurements wrong for when we
    // then hide it (end of this function), so add the header height to the body scroller.
    if ( scroll.bCollapse && scrollY !== "" ) {
      divBodyStyle.height = (divBody[0].offsetHeight + header[0].offsetHeight)+"px";
    }
  
    // Size the table as a whole
    sanityWidth = table.outerWidth();
    if ( scrollX === "" ) {
      // No x scrolling
      tableStyle.width = "100%";
  
      // IE7 will make the width of the table when 100% include the scrollbar
      // - which is shouldn't. When there is a scrollbar we need to take this
      // into account.
      if ( ie67 && (table.find('tbody').height() > divBodyEl.offsetHeight ||
        divBody.css('overflow-y') == "scroll")
      ) {
        tableStyle.width = _fnStringToCss( table.outerWidth() - barWidth);
      }
    }
    else
    {
      // x scrolling
      if ( scrollXInner !== "" ) {
        // x scroll inner has been given - use it
        tableStyle.width = _fnStringToCss(scrollXInner);
      }
      else if ( sanityWidth == divBody.width() && divBody.height() < table.height() ) {
        // There is y-scrolling - try to take account of the y scroll bar
        tableStyle.width = _fnStringToCss( sanityWidth-barWidth );
        if ( table.outerWidth() > sanityWidth-barWidth ) {
          // Not possible to take account of it
          tableStyle.width = _fnStringToCss( sanityWidth );
        }
      }
      else {
        // When all else fails
        tableStyle.width = _fnStringToCss( sanityWidth );
      }
    }
  
    // Recalculate the sanity width - now that we've applied the required width,
    // before it was a temporary variable. This is required because the column
    // width calculation is done before this table DOM is created.
    sanityWidth = table.outerWidth();
  
    // Hidden header should have zero height, so remove padding and borders. Then
    // set the width based on the real headers
  
    // Apply all styles in one pass
    _fnApplyToChildren( zeroOut, headerSrcEls );
  
    // Read all widths in next pass
    _fnApplyToChildren( function(nSizer) {
      headerContent.push( nSizer.innerHTML );
      headerWidths.push( _fnStringToCss( $(nSizer).css('width') ) );
    }, headerSrcEls );
  
    // Apply all widths in final pass
    _fnApplyToChildren( function(nToSize, i) {
      nToSize.style.width = headerWidths[i];
    }, headerTrgEls );
  
    $(headerSrcEls).height(0);
  
    /* Same again with the footer if we have one */
    if ( footer )
    {
      _fnApplyToChildren( zeroOut, footerSrcEls );
  
      _fnApplyToChildren( function(nSizer) {
        footerWidths.push( _fnStringToCss( $(nSizer).css('width') ) );
      }, footerSrcEls );
  
      _fnApplyToChildren( function(nToSize, i) {
        nToSize.style.width = footerWidths[i];
      }, footerTrgEls );
  
      $(footerSrcEls).height(0);
    }
  
  
    /*
     * 3. Apply the measurements
     */
  
    // "Hide" the header and footer that we used for the sizing. We need to keep
    // the content of the cell so that the width applied to the header and body
    // both match, but we want to hide it completely. We want to also fix their
    // width to what they currently are
    _fnApplyToChildren( function(nSizer, i) {
      nSizer.innerHTML = '<div class="dataTables_sizing" style="height:0;overflow:hidden;">'+headerContent[i]+'</div>';
      nSizer.style.width = headerWidths[i];
    }, headerSrcEls );
  
    if ( footer )
    {
      _fnApplyToChildren( function(nSizer, i) {
        nSizer.innerHTML = "";
        nSizer.style.width = footerWidths[i];
      }, footerSrcEls );
    }
  
    // Sanity check that the table is of a sensible width. If not then we are going to get
    // misalignment - try to prevent this by not allowing the table to shrink below its min width
    if ( table.outerWidth() < sanityWidth )
    {
      // The min width depends upon if we have a vertical scrollbar visible or not */
      correction = ((divBodyEl.scrollHeight > divBodyEl.offsetHeight ||
        divBody.css('overflow-y') == "scroll")) ?
          sanityWidth+barWidth :
          sanityWidth;
  
      // IE6/7 are a law unto themselves...
      if ( ie67 && (divBodyEl.scrollHeight >
        divBodyEl.offsetHeight || divBody.css('overflow-y') == "scroll")
      ) {
        tableStyle.width = _fnStringToCss( correction-barWidth );
      }
  
      // And give the user a warning that we've stopped the table getting too small
      if ( scrollX === "" || scrollXInner !== "" ) {
        _fnLog( settings, 1, 'Possible column misalignment', 6 );
      }
    }
    else
    {
      correction = '100%';
    }
  
    // Apply to the container elements
    divBodyStyle.width = _fnStringToCss( correction );
    divHeaderStyle.width = _fnStringToCss( correction );
  
    if ( footer ) {
      settings.nScrollFoot.style.width = _fnStringToCss( correction );
    }
  
  
    /*
     * 4. Clean up
     */
    if ( ! scrollY ) {
      /* IE7< puts a vertical scrollbar in place (when it shouldn't be) due to subtracting
       * the scrollbar height from the visible display, rather than adding it on. We need to
       * set the height in order to sort this. Don't want to do it in any other browsers.
       */
      if ( ie67 ) {
        divBodyStyle.height = _fnStringToCss( tableEl.offsetHeight+barWidth );
      }
    }
  
    if ( scrollY && scroll.bCollapse ) {
      divBodyStyle.height = _fnStringToCss( scrollY );
  
      var iExtra = (scrollX && tableEl.offsetWidth > divBodyEl.offsetWidth) ?
        barWidth :
        0;
  
      if ( tableEl.offsetHeight < divBodyEl.offsetHeight ) {
        divBodyStyle.height = _fnStringToCss( tableEl.offsetHeight+iExtra );
      }
    }
  
    /* Finally set the width's of the header and footer tables */
    var iOuterWidth = table.outerWidth();
    divHeaderTable[0].style.width = _fnStringToCss( iOuterWidth );
    divHeaderInnerStyle.width = _fnStringToCss( iOuterWidth );
  
    // Figure out if there are scrollbar present - if so then we need a the header and footer to
    // provide a bit more space to allow "overflow" scrolling (i.e. past the scrollbar)
    var bScrolling = table.height() > divBodyEl.clientHeight || divBody.css('overflow-y') == "scroll";
    var padding = 'padding' + (browser.bScrollbarLeft ? 'Left' : 'Right' );
    divHeaderInnerStyle[ padding ] = bScrolling ? barWidth+"px" : "0px";
  
    if ( footer ) {
      divFooterTable[0].style.width = _fnStringToCss( iOuterWidth );
      divFooterInner[0].style.width = _fnStringToCss( iOuterWidth );
      divFooterInner[0].style[padding] = bScrolling ? barWidth+"px" : "0px";
    }
  
    /* Adjust the position of the header in case we loose the y-scrollbar */
    divBody.scroll();
  
    /* If sorting or filtering has occurred, jump the scrolling back to the top */
    if ( settings.bSorted || settings.bFiltered ) {
      divBodyEl.scrollTop = 0;
    }
  }
  
  
  
  /**
   * Apply a given function to the display child nodes of an element array (typically
   * TD children of TR rows
   *  @param {function} fn Method to apply to the objects
   *  @param array {nodes} an1 List of elements to look through for display children
   *  @param array {nodes} an2 Another list (identical structure to the first) - optional
   *  @memberof DataTable#oApi
   */
  function _fnApplyToChildren( fn, an1, an2 )
  {
    var index=0, i=0, iLen=an1.length;
    var nNode1, nNode2;
  
    while ( i < iLen ) {
      nNode1 = an1[i].firstChild;
      nNode2 = an2 ? an2[i].firstChild : null;
  
      while ( nNode1 ) {
        if ( nNode1.nodeType === 1 ) {
          if ( an2 ) {
            fn( nNode1, nNode2, index );
          }
          else {
            fn( nNode1, index );
          }
  
          index++;
        }
  
        nNode1 = nNode1.nextSibling;
        nNode2 = an2 ? nNode2.nextSibling : null;
      }
  
      i++;
    }
  }
  
  
  
  var __re_html_remove = /<.*?>/g;
  
  
  /**
   * Calculate the width of columns for the table
   *  @param {object} oSettings dataTables settings object
   *  @memberof DataTable#oApi
   */
  function _fnCalculateColumnWidths ( oSettings )
  {
    var
      table = oSettings.nTable,
      columns = oSettings.aoColumns,
      scroll = oSettings.oScroll,
      scrollY = scroll.sY,
      scrollX = scroll.sX,
      scrollXInner = scroll.sXInner,
      columnCount = columns.length,
      visibleColumns = _fnGetColumns( oSettings, 'bVisible' ),
      headerCells = $('th', oSettings.nTHead),
      tableWidthAttr = table.getAttribute('width'),
      tableContainer = table.parentNode,
      userInputs = false,
      i, column, columnIdx, width, outerWidth;
  
    /* Convert any user input sizes into pixel sizes */
    for ( i=0 ; i<visibleColumns.length ; i++ ) {
      column = columns[ visibleColumns[i] ];
  
      if ( column.sWidth !== null ) {
        column.sWidth = _fnConvertToWidth( column.sWidthOrig, tableContainer );
  
        userInputs = true;
      }
    }
  
    /* If the number of columns in the DOM equals the number that we have to
     * process in DataTables, then we can use the offsets that are created by
     * the web- browser. No custom sizes can be set in order for this to happen,
     * nor scrolling used
     */
    if ( ! userInputs && ! scrollX && ! scrollY &&
        columnCount == _fnVisbleColumns( oSettings ) &&
      columnCount == headerCells.length
    ) {
      for ( i=0 ; i<columnCount ; i++ ) {
        columns[i].sWidth = _fnStringToCss( headerCells.eq(i).width() );
      }
    }
    else
    {
      // Otherwise construct a single row table with the widest node in the
      // data, assign any user defined widths, then insert it into the DOM and
      // allow the browser to do all the hard work of calculating table widths
      var tmpTable = $( table.cloneNode( false ) )
        .css( 'visibility', 'hidden' )
        .removeAttr( 'id' )
        .append( $(oSettings.nTHead).clone( false ) )
        .append( $(oSettings.nTFoot).clone( false ) )
        .append( $('<tbody><tr/></tbody>') );
  
      // Remove any assigned widths from the footer (from scrolling)
      tmpTable.find('tfoot th, tfoot td').css('width', '');
  
      var tr = tmpTable.find( 'tbody tr' );
  
      // Apply custom sizing to the cloned header
      headerCells = _fnGetUniqueThs( oSettings, tmpTable.find('thead')[0] );
  
      for ( i=0 ; i<visibleColumns.length ; i++ ) {
        column = columns[ visibleColumns[i] ];
  
        headerCells[i].style.width = column.sWidthOrig !== null && column.sWidthOrig !== '' ?
          _fnStringToCss( column.sWidthOrig ) :
          '';
      }
  
      // Find the widest cell for each column and put it into the table
      if ( oSettings.aoData.length ) {
        for ( i=0 ; i<visibleColumns.length ; i++ ) {
          columnIdx = visibleColumns[i];
          column = columns[ columnIdx ];
  
          $( _fnGetWidestNode( oSettings, columnIdx ) )
            .clone( false )
            .append( column.sContentPadding )
            .appendTo( tr );
        }
      }
  
      // Table has been built, attach to the document so we can work with it
      tmpTable.appendTo( tableContainer );
  
      // When scrolling (X or Y) we want to set the width of the table as 
      // appropriate. However, when not scrolling leave the table width as it
      // is. This results in slightly different, but I think correct behaviour
      if ( scrollX && scrollXInner ) {
        tmpTable.width( scrollXInner );
      }
      else if ( scrollX ) {
        tmpTable.css( 'width', 'auto' );
  
        if ( tmpTable.width() < tableContainer.offsetWidth ) {
          tmpTable.width( tableContainer.offsetWidth );
        }
      }
      else if ( scrollY ) {
        tmpTable.width( tableContainer.offsetWidth );
      }
      else if ( tableWidthAttr ) {
        tmpTable.width( tableWidthAttr );
      }
  
      // Take into account the y scrollbar
      _fnScrollingWidthAdjust( oSettings, tmpTable[0] );
  
      // Browsers need a bit of a hand when a width is assigned to any columns
      // when x-scrolling as they tend to collapse the table to the min-width,
      // even if we sent the column widths. So we need to keep track of what
      // the table width should be by summing the user given values, and the
      // automatic values
      if ( scrollX )
      {
        var total = 0;
  
        for ( i=0 ; i<visibleColumns.length ; i++ ) {
          column = columns[ visibleColumns[i] ];
          outerWidth = $(headerCells[i]).outerWidth();
  
          total += column.sWidthOrig === null ?
            outerWidth :
            parseInt( column.sWidth, 10 ) + outerWidth - $(headerCells[i]).width();
        }
  
        tmpTable.width( _fnStringToCss( total ) );
        table.style.width = _fnStringToCss( total );
      }
  
      // Get the width of each column in the constructed table
      for ( i=0 ; i<visibleColumns.length ; i++ ) {
        column = columns[ visibleColumns[i] ];
        width = $(headerCells[i]).width();
  
        if ( width ) {
          column.sWidth = _fnStringToCss( width );
        }
      }
  
      table.style.width = _fnStringToCss( tmpTable.css('width') );
  
      // Finished with the table - ditch it
      tmpTable.remove();
    }
  
    // If there is a width attr, we want to attach an event listener which
    // allows the table sizing to automatically adjust when the window is
    // resized. Use the width attr rather than CSS, since we can't know if the
    // CSS is a relative value or absolute - DOM read is always px.
    if ( tableWidthAttr ) {
      table.style.width = _fnStringToCss( tableWidthAttr );
    }
  
    if ( (tableWidthAttr || scrollX) && ! oSettings._reszEvt ) {
      $(window).bind('resize.DT-'+oSettings.sInstance, _fnThrottle( function () {
        _fnAdjustColumnSizing( oSettings );
      } ) );
  
      oSettings._reszEvt = true;
    }
  }
  
  
  /**
   * Throttle the calls to a function. Arguments and context are maintained for
   * the throttled function
   *  @param {function} fn Function to be called
   *  @param {int} [freq=200] call frequency in mS
   *  @returns {function} wrapped function
   *  @memberof DataTable#oApi
   */
  function _fnThrottle( fn, freq ) {
    var
      frequency = freq || 200,
      last,
      timer;
  
    return function () {
      var
        that = this,
        now  = +new Date(),
        args = arguments;
  
      if ( last && now < last + frequency ) {
        clearTimeout( timer );
  
        timer = setTimeout( function () {
          last = undefined;
          fn.apply( that, args );
        }, frequency );
      }
      else if ( last ) {
        last = now;
        fn.apply( that, args );
      }
      else {
        last = now;
      }
    };
  }
  
  
  /**
   * Convert a CSS unit width to pixels (e.g. 2em)
   *  @param {string} width width to be converted
   *  @param {node} parent parent to get the with for (required for relative widths) - optional
   *  @returns {int} width in pixels
   *  @memberof DataTable#oApi
   */
  function _fnConvertToWidth ( width, parent )
  {
    if ( ! width ) {
      return 0;
    }
  
    var n = $('<div/>')
      .css( 'width', _fnStringToCss( width ) )
      .appendTo( parent || document.body );
  
    var val = n[0].offsetWidth;
    n.remove();
  
    return val;
  }
  
  
  /**
   * Adjust a table's width to take account of vertical scroll bar
   *  @param {object} oSettings dataTables settings object
   *  @param {node} n table node
   *  @memberof DataTable#oApi
   */
  
  function _fnScrollingWidthAdjust ( settings, n )
  {
    var scroll = settings.oScroll;
  
    if ( scroll.sX || scroll.sY ) {
      // When y-scrolling only, we want to remove the width of the scroll bar
      // so the table + scroll bar will fit into the area available, otherwise
      // we fix the table at its current size with no adjustment
      var correction = ! scroll.sX ? scroll.iBarWidth : 0;
      n.style.width = _fnStringToCss( $(n).outerWidth() - correction );
    }
  }
  
  
  /**
   * Get the widest node
   *  @param {object} settings dataTables settings object
   *  @param {int} colIdx column of interest
   *  @returns {node} widest table node
   *  @memberof DataTable#oApi
   */
  function _fnGetWidestNode( settings, colIdx )
  {
    var idx = _fnGetMaxLenString( settings, colIdx );
    if ( idx < 0 ) {
      return null;
    }
  
    var data = settings.aoData[ idx ];
    return ! data.nTr ? // Might not have been created when deferred rendering
      $('<td/>').html( _fnGetCellData( settings, idx, colIdx, 'display' ) )[0] :
      data.anCells[ colIdx ];
  }
  
  
  /**
   * Get the maximum strlen for each data column
   *  @param {object} settings dataTables settings object
   *  @param {int} colIdx column of interest
   *  @returns {string} max string length for each column
   *  @memberof DataTable#oApi
   */
  function _fnGetMaxLenString( settings, colIdx )
  {
    var s, max=-1, maxIdx = -1;
  
    for ( var i=0, ien=settings.aoData.length ; i<ien ; i++ ) {
      s = _fnGetCellData( settings, i, colIdx, 'display' )+'';
      s = s.replace( __re_html_remove, '' );
  
      if ( s.length > max ) {
        max = s.length;
        maxIdx = i;
      }
    }
  
    return maxIdx;
  }
  
  
  /**
   * Append a CSS unit (only if required) to a string
   *  @param {string} value to css-ify
   *  @returns {string} value with css unit
   *  @memberof DataTable#oApi
   */
  function _fnStringToCss( s )
  {
    if ( s === null ) {
      return '0px';
    }
  
    if ( typeof s == 'number' ) {
      return s < 0 ?
        '0px' :
        s+'px';
    }
  
    // Check it has a unit character already
    return s.match(/\d$/) ?
      s+'px' :
      s;
  }
  
  
  /**
   * Get the width of a scroll bar in this browser being used
   *  @returns {int} width in pixels
   *  @memberof DataTable#oApi
   */
  function _fnScrollBarWidth ()
  {
    // On first run a static variable is set, since this is only needed once.
    // Subsequent runs will just use the previously calculated value
    if ( ! DataTable.__scrollbarWidth ) {
      var inner = $('<p/>').css( {
        width: '100%',
        height: 200,
        padding: 0
      } )[0];
  
      var outer = $('<div/>')
        .css( {
          position: 'absolute',
          top: 0,
          left: 0,
          width: 200,
          height: 150,
          padding: 0,
          overflow: 'hidden',
          visibility: 'hidden'
        } )
        .append( inner )
        .appendTo( 'body' );
  
      var w1 = inner.offsetWidth;
      outer.css( 'overflow', 'scroll' );
      var w2 = inner.offsetWidth;
  
      if ( w1 === w2 ) {
        w2 = outer[0].clientWidth;
      }
  
      outer.remove();
  
      DataTable.__scrollbarWidth = w1 - w2;
    }
  
    return DataTable.__scrollbarWidth;
  }
  
  
  
  function _fnSortFlatten ( settings )
  {
    var
      i, iLen, k, kLen,
      aSort = [],
      aiOrig = [],
      aoColumns = settings.aoColumns,
      aDataSort, iCol, sType, srcCol,
      fixed = settings.aaSortingFixed,
      fixedObj = $.isPlainObject( fixed ),
      nestedSort = [],
      add = function ( a ) {
        if ( a.length && ! $.isArray( a[0] ) ) {
          // 1D array
          nestedSort.push( a );
        }
        else {
          // 2D array
          nestedSort.push.apply( nestedSort, a );
        }
      };
  
    // Build the sort array, with pre-fix and post-fix options if they have been
    // specified
    if ( $.isArray( fixed ) ) {
      add( fixed );
    }
  
    if ( fixedObj && fixed.pre ) {
      add( fixed.pre );
    }
  
    add( settings.aaSorting );
  
    if (fixedObj && fixed.post ) {
      add( fixed.post );
    }
  
    for ( i=0 ; i<nestedSort.length ; i++ )
    {
      srcCol = nestedSort[i][0];
      aDataSort = aoColumns[ srcCol ].aDataSort;
  
      for ( k=0, kLen=aDataSort.length ; k<kLen ; k++ )
      {
        iCol = aDataSort[k];
        sType = aoColumns[ iCol ].sType || 'string';
  
        aSort.push( {
          src:       srcCol,
          col:       iCol,
          dir:       nestedSort[i][1],
          index:     nestedSort[i][2],
          type:      sType,
          formatter: DataTable.ext.type.order[ sType+"-pre" ]
        } );
      }
    }
  
    return aSort;
  }
  
  /**
   * Change the order of the table
   *  @param {object} oSettings dataTables settings object
   *  @memberof DataTable#oApi
   *  @todo This really needs split up!
   */
  function _fnSort ( oSettings )
  {
    var
      i, ien, iLen, j, jLen, k, kLen,
      sDataType, nTh,
      aiOrig = [],
      oExtSort = DataTable.ext.type.order,
      aoData = oSettings.aoData,
      aoColumns = oSettings.aoColumns,
      aDataSort, data, iCol, sType, oSort,
      formatters = 0,
      sortCol,
      displayMaster = oSettings.aiDisplayMaster,
      aSort;
  
    // Resolve any column types that are unknown due to addition or invalidation
    // @todo Can this be moved into a 'data-ready' handler which is called when
    //   data is going to be used in the table?
    _fnColumnTypes( oSettings );
  
    aSort = _fnSortFlatten( oSettings );
  
    for ( i=0, ien=aSort.length ; i<ien ; i++ ) {
      sortCol = aSort[i];
  
      // Track if we can use the fast sort algorithm
      if ( sortCol.formatter ) {
        formatters++;
      }
  
      // Load the data needed for the sort, for each cell
      _fnSortData( oSettings, sortCol.col );
    }
  
    /* No sorting required if server-side or no sorting array */
    if ( _fnDataSource( oSettings ) != 'ssp' && aSort.length !== 0 )
    {
      // Create a value - key array of the current row positions such that we can use their
      // current position during the sort, if values match, in order to perform stable sorting
      for ( i=0, iLen=displayMaster.length ; i<iLen ; i++ ) {
        aiOrig[ displayMaster[i] ] = i;
      }
  
      /* Do the sort - here we want multi-column sorting based on a given data source (column)
       * and sorting function (from oSort) in a certain direction. It's reasonably complex to
       * follow on it's own, but this is what we want (example two column sorting):
       *  fnLocalSorting = function(a,b){
       *    var iTest;
       *    iTest = oSort['string-asc']('data11', 'data12');
       *      if (iTest !== 0)
       *        return iTest;
       *    iTest = oSort['numeric-desc']('data21', 'data22');
       *    if (iTest !== 0)
       *      return iTest;
       *    return oSort['numeric-asc']( aiOrig[a], aiOrig[b] );
       *  }
       * Basically we have a test for each sorting column, if the data in that column is equal,
       * test the next column. If all columns match, then we use a numeric sort on the row
       * positions in the original data array to provide a stable sort.
       *
       * Note - I know it seems excessive to have two sorting methods, but the first is around
       * 15% faster, so the second is only maintained for backwards compatibility with sorting
       * methods which do not have a pre-sort formatting function.
       */
      if ( formatters === aSort.length ) {
        // All sort types have formatting functions
        displayMaster.sort( function ( a, b ) {
          var
            x, y, k, test, sort,
            len=aSort.length,
            dataA = aoData[a]._aSortData,
            dataB = aoData[b]._aSortData;
  
          for ( k=0 ; k<len ; k++ ) {
            sort = aSort[k];
  
            x = dataA[ sort.col ];
            y = dataB[ sort.col ];
  
            test = x<y ? -1 : x>y ? 1 : 0;
            if ( test !== 0 ) {
              return sort.dir === 'asc' ? test : -test;
            }
          }
  
          x = aiOrig[a];
          y = aiOrig[b];
          return x<y ? -1 : x>y ? 1 : 0;
        } );
      }
      else {
        // Depreciated - remove in 1.11 (providing a plug-in option)
        // Not all sort types have formatting methods, so we have to call their sorting
        // methods.
        displayMaster.sort( function ( a, b ) {
          var
            x, y, k, l, test, sort, fn,
            len=aSort.length,
            dataA = aoData[a]._aSortData,
            dataB = aoData[b]._aSortData;
  
          for ( k=0 ; k<len ; k++ ) {
            sort = aSort[k];
  
            x = dataA[ sort.col ];
            y = dataB[ sort.col ];
  
            fn = oExtSort[ sort.type+"-"+sort.dir ] || oExtSort[ "string-"+sort.dir ];
            test = fn( x, y );
            if ( test !== 0 ) {
              return test;
            }
          }
  
          x = aiOrig[a];
          y = aiOrig[b];
          return x<y ? -1 : x>y ? 1 : 0;
        } );
      }
    }
  
    /* Tell the draw function that we have sorted the data */
    oSettings.bSorted = true;
  }
  
  
  function _fnSortAria ( settings )
  {
    var label;
    var nextSort;
    var columns = settings.aoColumns;
    var aSort = _fnSortFlatten( settings );
    var oAria = settings.oLanguage.oAria;
  
    // ARIA attributes - need to loop all columns, to update all (removing old
    // attributes as needed)
    for ( var i=0, iLen=columns.length ; i<iLen ; i++ )
    {
      var col = columns[i];
      var asSorting = col.asSorting;
      var sTitle = col.sTitle.replace( /<.*?>/g, "" );
      var th = col.nTh;
  
      // IE7 is throwing an error when setting these properties with jQuery's
      // attr() and removeAttr() methods...
      th.removeAttribute('aria-sort');
  
      /* In ARIA only the first sorting column can be marked as sorting - no multi-sort option */
      if ( col.bSortable ) {
        if ( aSort.length > 0 && aSort[0].col == i ) {
          th.setAttribute('aria-sort', aSort[0].dir=="asc" ? "ascending" : "descending" );
          nextSort = asSorting[ aSort[0].index+1 ] || asSorting[0];
        }
        else {
          nextSort = asSorting[0];
        }
  
        label = sTitle + ( nextSort === "asc" ?
          oAria.sSortAscending :
          oAria.sSortDescending
        );
      }
      else {
        label = sTitle;
      }
  
      th.setAttribute('aria-label', label);
    }
  }
  
  
  /**
   * Function to run on user sort request
   *  @param {object} settings dataTables settings object
   *  @param {node} attachTo node to attach the handler to
   *  @param {int} colIdx column sorting index
   *  @param {boolean} [append=false] Append the requested sort to the existing
   *    sort if true (i.e. multi-column sort)
   *  @param {function} [callback] callback function
   *  @memberof DataTable#oApi
   */
  function _fnSortListener ( settings, colIdx, append, callback )
  {
    var col = settings.aoColumns[ colIdx ];
    var sorting = settings.aaSorting;
    var asSorting = col.asSorting;
    var nextSortIdx;
    var next = function ( a ) {
      var idx = a._idx;
      if ( idx === undefined ) {
        idx = $.inArray( a[1], asSorting );
      }
  
      return idx+1 >= asSorting.length ? 0 : idx+1;
    };
  
    // If appending the sort then we are multi-column sorting
    if ( append && settings.oFeatures.bSortMulti ) {
      // Are we already doing some kind of sort on this column?
      var sortIdx = $.inArray( colIdx, _pluck(sorting, '0') );
  
      if ( sortIdx !== -1 ) {
        // Yes, modify the sort
        nextSortIdx = next( sorting[sortIdx] );
  
        sorting[sortIdx][1] = asSorting[ nextSortIdx ];
        sorting[sortIdx]._idx = nextSortIdx;
      }
      else {
        // No sort on this column yet
        sorting.push( [ colIdx, asSorting[0], 0 ] );
        sorting[sorting.length-1]._idx = 0;
      }
    }
    else if ( sorting.length && sorting[0][0] == colIdx ) {
      // Single column - already sorting on this column, modify the sort
      nextSortIdx = next( sorting[0] );
  
      sorting.length = 1;
      sorting[0][1] = asSorting[ nextSortIdx ];
      sorting[0]._idx = nextSortIdx;
    }
    else {
      // Single column - sort only on this column
      sorting.length = 0;
      sorting.push( [ colIdx, asSorting[0] ] );
      sorting[0]._idx = 0;
    }
  
    // Run the sort by calling a full redraw
    _fnReDraw( settings );
  
    // callback used for async user interaction
    if ( typeof callback == 'function' ) {
      callback( settings );
    }
  }
  
  
  /**
   * Attach a sort handler (click) to a node
   *  @param {object} settings dataTables settings object
   *  @param {node} attachTo node to attach the handler to
   *  @param {int} colIdx column sorting index
   *  @param {function} [callback] callback function
   *  @memberof DataTable#oApi
   */
  function _fnSortAttachListener ( settings, attachTo, colIdx, callback )
  {
    var col = settings.aoColumns[ colIdx ];
  
    _fnBindAction( attachTo, {}, function (e) {
      /* If the column is not sortable - don't to anything */
      if ( col.bSortable === false ) {
        return;
      }
  
      // If processing is enabled use a timeout to allow the processing
      // display to be shown - otherwise to it synchronously
      if ( settings.oFeatures.bProcessing ) {
        _fnProcessingDisplay( settings, true );
  
        setTimeout( function() {
          _fnSortListener( settings, colIdx, e.shiftKey, callback );
  
          // In server-side processing, the draw callback will remove the
          // processing display
          if ( _fnDataSource( settings ) !== 'ssp' ) {
            _fnProcessingDisplay( settings, false );
          }
        }, 0 );
      }
      else {
        _fnSortListener( settings, colIdx, e.shiftKey, callback );
      }
    } );
  }
  
  
  /**
   * Set the sorting classes on table's body, Note: it is safe to call this function
   * when bSort and bSortClasses are false
   *  @param {object} oSettings dataTables settings object
   *  @memberof DataTable#oApi
   */
  function _fnSortingClasses( settings )
  {
    var oldSort = settings.aLastSort;
    var sortClass = settings.oClasses.sSortColumn;
    var sort = _fnSortFlatten( settings );
    var features = settings.oFeatures;
    var i, ien, colIdx;
  
    if ( features.bSort && features.bSortClasses ) {
      // Remove old sorting classes
      for ( i=0, ien=oldSort.length ; i<ien ; i++ ) {
        colIdx = oldSort[i].src;
  
        // Remove column sorting
        $( _pluck( settings.aoData, 'anCells', colIdx ) )
          .removeClass( sortClass + (i<2 ? i+1 : 3) );
      }
  
      // Add new column sorting
      for ( i=0, ien=sort.length ; i<ien ; i++ ) {
        colIdx = sort[i].src;
  
        $( _pluck( settings.aoData, 'anCells', colIdx ) )
          .addClass( sortClass + (i<2 ? i+1 : 3) );
      }
    }
  
    settings.aLastSort = sort;
  }
  
  
  // Get the data to sort a column, be it from cache, fresh (populating the
  // cache), or from a sort formatter
  function _fnSortData( settings, idx )
  {
    // Custom sorting function - provided by the sort data type
    var column = settings.aoColumns[ idx ];
    var customSort = DataTable.ext.order[ column.sSortDataType ];
    var customData;
  
    if ( customSort ) {
      customData = customSort.call( settings.oInstance, settings, idx,
        _fnColumnIndexToVisible( settings, idx )
      );
    }
  
    // Use / populate cache
    var row, cellData;
    var formatter = DataTable.ext.type.order[ column.sType+"-pre" ];
  
    for ( var i=0, ien=settings.aoData.length ; i<ien ; i++ ) {
      row = settings.aoData[i];
  
      if ( ! row._aSortData ) {
        row._aSortData = [];
      }
  
      if ( ! row._aSortData[idx] || customSort ) {
        cellData = customSort ?
          customData[i] : // If there was a custom sort function, use data from there
          _fnGetCellData( settings, i, idx, 'sort' );
  
        row._aSortData[ idx ] = formatter ?
          formatter( cellData ) :
          cellData;
      }
    }
  }
  
  
  
  /**
   * Save the state of a table
   *  @param {object} oSettings dataTables settings object
   *  @memberof DataTable#oApi
   */
  function _fnSaveState ( oSettings )
  {
    if ( !oSettings.oFeatures.bStateSave || oSettings.bDestroying )
    {
      return;
    }
  
    /* Store the interesting variables */
    var i, iLen;
    var oState = {
      "iCreate":      +new Date(),
      "iStart":       oSettings._iDisplayStart,
      "iLength":      oSettings._iDisplayLength,
      "aaSorting":    $.extend( true, [], oSettings.aaSorting ),
      "oSearch":      $.extend( true, {}, oSettings.oPreviousSearch ),
      "aoSearchCols": $.extend( true, [], oSettings.aoPreSearchCols ),
      "abVisCols":    _pluck( oSettings.aoColumns, 'bVisible' )
    };
  
    _fnCallbackFire( oSettings, "aoStateSaveParams", 'stateSaveParams', [oSettings, oState] );
  
    oSettings.fnStateSaveCallback.call( oSettings.oInstance, oSettings, oState );
  }
  
  
  /**
   * Attempt to load a saved table state
   *  @param {object} oSettings dataTables settings object
   *  @param {object} oInit DataTables init object so we can override settings
   *  @memberof DataTable#oApi
   */
  function _fnLoadState ( oSettings, oInit )
  {
    var i, ien;
    var columns = oSettings.aoColumns;
  
    if ( ! oSettings.oFeatures.bStateSave ) {
      return;
    }
  
    var oData = oSettings.fnStateLoadCallback.call( oSettings.oInstance, oSettings );
    if ( !oData ) {
      return;
    }
  
    /* Allow custom and plug-in manipulation functions to alter the saved data set and
     * cancelling of loading by returning false
     */
    var abStateLoad = _fnCallbackFire( oSettings, 'aoStateLoadParams', 'stateLoadParams', [oSettings, oData] );
    if ( $.inArray( false, abStateLoad ) !== -1 ) {
      return;
    }
  
    /* Reject old data */
    var duration = oSettings.iStateDuration;
    if ( duration > 0 && oData.iCreate < +new Date() - (duration*1000) ) {
      return;
    }
  
    // Number of columns have changed - all bets are off, no restore of settings
    if ( columns.length !== oData.aoSearchCols.length ) {
      return;
    }
  
    /* Store the saved state so it might be accessed at any time */
    oSettings.oLoadedState = $.extend( true, {}, oData );
  
    /* Restore key features */
    oSettings._iDisplayStart    = oData.iStart;
    oSettings.iInitDisplayStart = oData.iStart;
    oSettings._iDisplayLength   = oData.iLength;
    oSettings.aaSorting = $.map( oData.aaSorting, function ( col, i ) {
      return col[0] >= columns.length ?
        [ 0, col[1] ] :
        col;
    } );
  
    /* Search filtering  */
    $.extend( oSettings.oPreviousSearch, oData.oSearch );
    $.extend( true, oSettings.aoPreSearchCols, oData.aoSearchCols );
  
    /* Column visibility state */
    var visColumns = oData.abVisCols;
    for ( i=0, ien=visColumns.length ; i<ien ; i++ ) {
      columns[i].bVisible = visColumns[i];
    }
  
    _fnCallbackFire( oSettings, 'aoStateLoaded', 'stateLoaded', [oSettings, oData] );
  }
  
  
  /**
   * Return the settings object for a particular table
   *  @param {node} table table we are using as a dataTable
   *  @returns {object} Settings object - or null if not found
   *  @memberof DataTable#oApi
   */
  function _fnSettingsFromNode ( table )
  {
    var settings = DataTable.settings;
    var idx = $.inArray( table, _pluck( settings, 'nTable' ) );
  
    return idx !== -1 ?
      settings[ idx ] :
      null;
  }
  
  
  /**
   * Log an error message
   *  @param {object} settings dataTables settings object
   *  @param {int} level log error messages, or display them to the user
   *  @param {string} msg error message
   *  @param {int} tn Technical note id to get more information about the error.
   *  @memberof DataTable#oApi
   */
  function _fnLog( settings, level, msg, tn )
  {
    msg = 'DataTables warning: '+
      (settings!==null ? 'table id='+settings.sTableId+' - ' : '')+msg;
  
    if ( tn ) {
      msg += '. For more information about this error, please see '+
      'http://datatables.net/tn/'+tn;
    }
  
    if ( ! level  ) {
      // Backwards compatibility pre 1.10
      var ext = DataTable.ext;
      var type = ext.sErrMode || ext.errMode;
  
      if ( type == 'alert' ) {
        alert( msg );
      }
      else {
        throw new Error(msg);
      }
    }
    else if ( window.console && console.log ) {
      console.log( msg );
    }
  }
  
  
  /**
   * See if a property is defined on one object, if so assign it to the other object
   *  @param {object} ret target object
   *  @param {object} src source object
   *  @param {string} name property
   *  @param {string} [mappedName] name to map too - optional, name used if not given
   *  @memberof DataTable#oApi
   */
  function _fnMap( ret, src, name, mappedName )
  {
    if ( $.isArray( name ) ) {
      $.each( name, function (i, val) {
        if ( $.isArray( val ) ) {
          _fnMap( ret, src, val[0], val[1] );
        }
        else {
          _fnMap( ret, src, val );
        }
      } );
  
      return;
    }
  
    if ( mappedName === undefined ) {
      mappedName = name;
    }
  
    if ( src[name] !== undefined ) {
      ret[mappedName] = src[name];
    }
  }
  
  
  /**
   * Extend objects - very similar to jQuery.extend, but deep copy objects, and
   * shallow copy arrays. The reason we need to do this, is that we don't want to
   * deep copy array init values (such as aaSorting) since the dev wouldn't be
   * able to override them, but we do want to deep copy arrays.
   *  @param {object} out Object to extend
   *  @param {object} extender Object from which the properties will be applied to
   *      out
   *  @param {boolean} breakRefs If true, then arrays will be sliced to take an
   *      independent copy with the exception of the `data` or `aaData` parameters
   *      if they are present. This is so you can pass in a collection to
   *      DataTables and have that used as your data source without breaking the
   *      references
   *  @returns {object} out Reference, just for convenience - out === the return.
   *  @memberof DataTable#oApi
   *  @todo This doesn't take account of arrays inside the deep copied objects.
   */
  function _fnExtend( out, extender, breakRefs )
  {
    var val;
  
    for ( var prop in extender ) {
      if ( extender.hasOwnProperty(prop) ) {
        val = extender[prop];
  
        if ( $.isPlainObject( val ) ) {
          if ( ! $.isPlainObject( out[prop] ) ) {
            out[prop] = {};
          }
          $.extend( true, out[prop], val );
        }
        else if ( breakRefs && prop !== 'data' && prop !== 'aaData' && $.isArray(val) ) {
          out[prop] = val.slice();
        }
        else {
          out[prop] = val;
        }
      }
    }
  
    return out;
  }
  
  
  /**
   * Bind an event handers to allow a click or return key to activate the callback.
   * This is good for accessibility since a return on the keyboard will have the
   * same effect as a click, if the element has focus.
   *  @param {element} n Element to bind the action to
   *  @param {object} oData Data object to pass to the triggered function
   *  @param {function} fn Callback function for when the event is triggered
   *  @memberof DataTable#oApi
   */
  function _fnBindAction( n, oData, fn )
  {
    $(n)
      .bind( 'click.DT', oData, function (e) {
          n.blur(); // Remove focus outline for mouse users
          fn(e);
        } )
      .bind( 'keypress.DT', oData, function (e){
          if ( e.which === 13 ) {
            e.preventDefault();
            fn(e);
          }
        } )
      .bind( 'selectstart.DT', function () {
          /* Take the brutal approach to cancelling text selection */
          return false;
        } );
  }
  
  
  /**
   * Register a callback function. Easily allows a callback function to be added to
   * an array store of callback functions that can then all be called together.
   *  @param {object} oSettings dataTables settings object
   *  @param {string} sStore Name of the array storage for the callbacks in oSettings
   *  @param {function} fn Function to be called back
   *  @param {string} sName Identifying name for the callback (i.e. a label)
   *  @memberof DataTable#oApi
   */
  function _fnCallbackReg( oSettings, sStore, fn, sName )
  {
    if ( fn )
    {
      oSettings[sStore].push( {
        "fn": fn,
        "sName": sName
      } );
    }
  }
  
  
  /**
   * Fire callback functions and trigger events. Note that the loop over the
   * callback array store is done backwards! Further note that you do not want to
   * fire off triggers in time sensitive applications (for example cell creation)
   * as its slow.
   *  @param {object} settings dataTables settings object
   *  @param {string} callbackArr Name of the array storage for the callbacks in
   *      oSettings
   *  @param {string} event Name of the jQuery custom event to trigger. If null no
   *      trigger is fired
   *  @param {array} args Array of arguments to pass to the callback function /
   *      trigger
   *  @memberof DataTable#oApi
   */
  function _fnCallbackFire( settings, callbackArr, event, args )
  {
    var ret = [];
  
    if ( callbackArr ) {
      ret = $.map( settings[callbackArr].slice().reverse(), function (val, i) {
        return val.fn.apply( settings.oInstance, args );
      } );
    }
  
    if ( event !== null ) {
      $(settings.nTable).trigger( event+'.dt', args );
    }
  
    return ret;
  }
  
  
  function _fnLengthOverflow ( settings )
  {
    var
      start = settings._iDisplayStart,
      end = settings.fnDisplayEnd(),
      len = settings._iDisplayLength;
  
    /* If we have space to show extra rows (backing up from the end point - then do so */
    if ( end === settings.fnRecordsDisplay() )
    {
      start = end - len;
    }
  
    if ( len === -1 || start < 0 )
    {
      start = 0;
    }
  
    settings._iDisplayStart = start;
  }
  
  
  function _fnRenderer( settings, type )
  {
    var renderer = settings.renderer;
    var host = DataTable.ext.renderer[type];
  
    if ( $.isPlainObject( renderer ) && renderer[type] ) {
      // Specific renderer for this type. If available use it, otherwise use
      // the default.
      return host[renderer[type]] || host._;
    }
    else if ( typeof renderer === 'string' ) {
      // Common renderer - if there is one available for this type use it,
      // otherwise use the default
      return host[renderer] || host._;
    }
  
    // Use the default
    return host._;
  }
  
  
  /**
   * Detect the data source being used for the table. Used to simplify the code
   * a little (ajax) and to make it compress a little smaller.
   *
   *  @param {object} settings dataTables settings object
   *  @returns {string} Data source
   *  @memberof DataTable#oApi
   */
  function _fnDataSource ( settings )
  {
    if ( settings.oFeatures.bServerSide ) {
      return 'ssp';
    }
    else if ( settings.ajax || settings.sAjaxSource ) {
      return 'ajax';
    }
    return 'dom';
  }
  

  DataTable = function( options )
  {
    /**
     * Perform a jQuery selector action on the table's TR elements (from the tbody) and
     * return the resulting jQuery object.
     *  @param {string|node|jQuery} sSelector jQuery selector or node collection to act on
     *  @param {object} [oOpts] Optional parameters for modifying the rows to be included
     *  @param {string} [oOpts.filter=none] Select TR elements that meet the current filter
     *    criterion ("applied") or all TR elements (i.e. no filter).
     *  @param {string} [oOpts.order=current] Order of the TR elements in the processed array.
     *    Can be either 'current', whereby the current sorting of the table is used, or
     *    'original' whereby the original order the data was read into the table is used.
     *  @param {string} [oOpts.page=all] Limit the selection to the currently displayed page
     *    ("current") or not ("all"). If 'current' is given, then order is assumed to be
     *    'current' and filter is 'applied', regardless of what they might be given as.
     *  @returns {object} jQuery object, filtered by the given selector.
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *
     *      // Highlight every second row
     *      oTable.$('tr:odd').css('backgroundColor', 'blue');
     *    } );
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *
     *      // Filter to rows with 'Webkit' in them, add a background colour and then
     *      // remove the filter, thus highlighting the 'Webkit' rows only.
     *      oTable.fnFilter('Webkit');
     *      oTable.$('tr', {"search": "applied"}).css('backgroundColor', 'blue');
     *      oTable.fnFilter('');
     *    } );
     */
    this.$ = function ( sSelector, oOpts )
    {
      return this.api(true).$( sSelector, oOpts );
    };
    
    
    /**
     * Almost identical to $ in operation, but in this case returns the data for the matched
     * rows - as such, the jQuery selector used should match TR row nodes or TD/TH cell nodes
     * rather than any descendants, so the data can be obtained for the row/cell. If matching
     * rows are found, the data returned is the original data array/object that was used to
     * create the row (or a generated array if from a DOM source).
     *
     * This method is often useful in-combination with $ where both functions are given the
     * same parameters and the array indexes will match identically.
     *  @param {string|node|jQuery} sSelector jQuery selector or node collection to act on
     *  @param {object} [oOpts] Optional parameters for modifying the rows to be included
     *  @param {string} [oOpts.filter=none] Select elements that meet the current filter
     *    criterion ("applied") or all elements (i.e. no filter).
     *  @param {string} [oOpts.order=current] Order of the data in the processed array.
     *    Can be either 'current', whereby the current sorting of the table is used, or
     *    'original' whereby the original order the data was read into the table is used.
     *  @param {string} [oOpts.page=all] Limit the selection to the currently displayed page
     *    ("current") or not ("all"). If 'current' is given, then order is assumed to be
     *    'current' and filter is 'applied', regardless of what they might be given as.
     *  @returns {array} Data for the matched elements. If any elements, as a result of the
     *    selector, were not TR, TD or TH elements in the DataTable, they will have a null
     *    entry in the array.
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *
     *      // Get the data from the first row in the table
     *      var data = oTable._('tr:first');
     *
     *      // Do something useful with the data
     *      alert( "First cell is: "+data[0] );
     *    } );
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *
     *      // Filter to 'Webkit' and get all data for
     *      oTable.fnFilter('Webkit');
     *      var data = oTable._('tr', {"search": "applied"});
     *
     *      // Do something with the data
     *      alert( data.length+" rows matched the search" );
     *    } );
     */
    this._ = function ( sSelector, oOpts )
    {
      return this.api(true).rows( sSelector, oOpts ).data();
    };
    
    
    /**
     * Create a DataTables Api instance, with the currently selected tables for
     * the Api's context.
     * @param {boolean} [traditional=false] Set the API instance's context to be
     *   only the table referred to by the `DataTable.ext.iApiIndex` option, as was
     *   used in the API presented by DataTables 1.9- (i.e. the traditional mode),
     *   or if all tables captured in the jQuery object should be used.
     * @return {DataTables.Api}
     */
    this.api = function ( traditional )
    {
      return traditional ?
        new _Api(
          _fnSettingsFromNode( this[ _ext.iApiIndex ] )
        ) :
        new _Api( this );
    };
    
    
    /**
     * Add a single new row or multiple rows of data to the table. Please note
     * that this is suitable for client-side processing only - if you are using
     * server-side processing (i.e. "bServerSide": true), then to add data, you
     * must add it to the data source, i.e. the server-side, through an Ajax call.
     *  @param {array|object} data The data to be added to the table. This can be:
     *    <ul>
     *      <li>1D array of data - add a single row with the data provided</li>
     *      <li>2D array of arrays - add multiple rows in a single call</li>
     *      <li>object - data object when using <i>mData</i></li>
     *      <li>array of objects - multiple data objects when using <i>mData</i></li>
     *    </ul>
     *  @param {bool} [redraw=true] redraw the table or not
     *  @returns {array} An array of integers, representing the list of indexes in
     *    <i>aoData</i> ({@link DataTable.models.oSettings}) that have been added to
     *    the table.
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    // Global var for counter
     *    var giCount = 2;
     *
     *    $(document).ready(function() {
     *      $('#example').dataTable();
     *    } );
     *
     *    function fnClickAddRow() {
     *      $('#example').dataTable().fnAddData( [
     *        giCount+".1",
     *        giCount+".2",
     *        giCount+".3",
     *        giCount+".4" ]
     *      );
     *
     *      giCount++;
     *    }
     */
    this.fnAddData = function( data, redraw )
    {
      var api = this.api( true );
    
      /* Check if we want to add multiple rows or not */
      var rows = $.isArray(data) && ( $.isArray(data[0]) || $.isPlainObject(data[0]) ) ?
        api.rows.add( data ) :
        api.row.add( data );
    
      if ( redraw === undefined || redraw ) {
        api.draw();
      }
    
      return rows.flatten().toArray();
    };
    
    
    /**
     * This function will make DataTables recalculate the column sizes, based on the data
     * contained in the table and the sizes applied to the columns (in the DOM, CSS or
     * through the sWidth parameter). This can be useful when the width of the table's
     * parent element changes (for example a window resize).
     *  @param {boolean} [bRedraw=true] Redraw the table or not, you will typically want to
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable( {
     *        "sScrollY": "200px",
     *        "bPaginate": false
     *      } );
     *
     *      $(window).bind('resize', function () {
     *        oTable.fnAdjustColumnSizing();
     *      } );
     *    } );
     */
    this.fnAdjustColumnSizing = function ( bRedraw )
    {
      var api = this.api( true ).columns.adjust();
      var settings = api.settings()[0];
      var scroll = settings.oScroll;
    
      if ( bRedraw === undefined || bRedraw ) {
        api.draw( false );
      }
      else if ( scroll.sX !== "" || scroll.sY !== "" ) {
        /* If not redrawing, but scrolling, we want to apply the new column sizes anyway */
        _fnScrollDraw( settings );
      }
    };
    
    
    /**
     * Quickly and simply clear a table
     *  @param {bool} [bRedraw=true] redraw the table or not
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *
     *      // Immediately 'nuke' the current rows (perhaps waiting for an Ajax callback...)
     *      oTable.fnClearTable();
     *    } );
     */
    this.fnClearTable = function( bRedraw )
    {
      var api = this.api( true ).clear();
    
      if ( bRedraw === undefined || bRedraw ) {
        api.draw();
      }
    };
    
    
    /**
     * The exact opposite of 'opening' a row, this function will close any rows which
     * are currently 'open'.
     *  @param {node} nTr the table row to 'close'
     *  @returns {int} 0 on success, or 1 if failed (can't find the row)
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable;
     *
     *      // 'open' an information row when a row is clicked on
     *      $('#example tbody tr').click( function () {
     *        if ( oTable.fnIsOpen(this) ) {
     *          oTable.fnClose( this );
     *        } else {
     *          oTable.fnOpen( this, "Temporary row opened", "info_row" );
     *        }
     *      } );
     *
     *      oTable = $('#example').dataTable();
     *    } );
     */
    this.fnClose = function( nTr )
    {
      this.api( true ).row( nTr ).child.hide();
    };
    
    
    /**
     * Remove a row for the table
     *  @param {mixed} target The index of the row from aoData to be deleted, or
     *    the TR element you want to delete
     *  @param {function|null} [callBack] Callback function
     *  @param {bool} [redraw=true] Redraw the table or not
     *  @returns {array} The row that was deleted
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *
     *      // Immediately remove the first row
     *      oTable.fnDeleteRow( 0 );
     *    } );
     */
    this.fnDeleteRow = function( target, callback, redraw )
    {
      var api = this.api( true );
      var rows = api.rows( target );
      var settings = rows.settings()[0];
      var data = settings.aoData[ rows[0][0] ];
    
      rows.remove();
    
      if ( callback ) {
        callback.call( this, settings, data );
      }
    
      if ( redraw === undefined || redraw ) {
        api.draw();
      }
    
      return data;
    };
    
    
    /**
     * Restore the table to it's original state in the DOM by removing all of DataTables
     * enhancements, alterations to the DOM structure of the table and event listeners.
     *  @param {boolean} [remove=false] Completely remove the table from the DOM
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      // This example is fairly pointless in reality, but shows how fnDestroy can be used
     *      var oTable = $('#example').dataTable();
     *      oTable.fnDestroy();
     *    } );
     */
    this.fnDestroy = function ( remove )
    {
      this.api( true ).destroy( remove );
    };
    
    
    /**
     * Redraw the table
     *  @param {bool} [complete=true] Re-filter and resort (if enabled) the table before the draw.
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *
     *      // Re-draw the table - you wouldn't want to do it here, but it's an example :-)
     *      oTable.fnDraw();
     *    } );
     */
    this.fnDraw = function( complete )
    {
      // Note that this isn't an exact match to the old call to _fnDraw - it takes
      // into account the new data, but can old position.
      this.api( true ).draw( ! complete );
    };
    
    
    /**
     * Filter the input based on data
     *  @param {string} sInput String to filter the table on
     *  @param {int|null} [iColumn] Column to limit filtering to
     *  @param {bool} [bRegex=false] Treat as regular expression or not
     *  @param {bool} [bSmart=true] Perform smart filtering or not
     *  @param {bool} [bShowGlobal=true] Show the input global filter in it's input box(es)
     *  @param {bool} [bCaseInsensitive=true] Do case-insensitive matching (true) or not (false)
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *
     *      // Sometime later - filter...
     *      oTable.fnFilter( 'test string' );
     *    } );
     */
    this.fnFilter = function( sInput, iColumn, bRegex, bSmart, bShowGlobal, bCaseInsensitive )
    {
      var api = this.api( true );
    
      if ( iColumn === null || iColumn === undefined ) {
        api.search( sInput, bRegex, bSmart, bCaseInsensitive );
      }
      else {
        api.column( iColumn ).search( sInput, bRegex, bSmart, bCaseInsensitive );
      }
    
      api.draw();
    };
    
    
    /**
     * Get the data for the whole table, an individual row or an individual cell based on the
     * provided parameters.
     *  @param {int|node} [src] A TR row node, TD/TH cell node or an integer. If given as
     *    a TR node then the data source for the whole row will be returned. If given as a
     *    TD/TH cell node then iCol will be automatically calculated and the data for the
     *    cell returned. If given as an integer, then this is treated as the aoData internal
     *    data index for the row (see fnGetPosition) and the data for that row used.
     *  @param {int} [col] Optional column index that you want the data of.
     *  @returns {array|object|string} If mRow is undefined, then the data for all rows is
     *    returned. If mRow is defined, just data for that row, and is iCol is
     *    defined, only data for the designated cell is returned.
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    // Row data
     *    $(document).ready(function() {
     *      oTable = $('#example').dataTable();
     *
     *      oTable.$('tr').click( function () {
     *        var data = oTable.fnGetData( this );
     *        // ... do something with the array / object of data for the row
     *      } );
     *    } );
     *
     *  @example
     *    // Individual cell data
     *    $(document).ready(function() {
     *      oTable = $('#example').dataTable();
     *
     *      oTable.$('td').click( function () {
     *        var sData = oTable.fnGetData( this );
     *        alert( 'The cell clicked on had the value of '+sData );
     *      } );
     *    } );
     */
    this.fnGetData = function( src, col )
    {
      var api = this.api( true );
    
      if ( src !== undefined ) {
        var type = src.nodeName ? src.nodeName.toLowerCase() : '';
    
        return col !== undefined || type == 'td' || type == 'th' ?
          api.cell( src, col ).data() :
          api.row( src ).data() || null;
      }
    
      return api.data().toArray();
    };
    
    
    /**
     * Get an array of the TR nodes that are used in the table's body. Note that you will
     * typically want to use the '$' API method in preference to this as it is more
     * flexible.
     *  @param {int} [iRow] Optional row index for the TR element you want
     *  @returns {array|node} If iRow is undefined, returns an array of all TR elements
     *    in the table's body, or iRow is defined, just the TR element requested.
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *
     *      // Get the nodes from the table
     *      var nNodes = oTable.fnGetNodes( );
     *    } );
     */
    this.fnGetNodes = function( iRow )
    {
      var api = this.api( true );
    
      return iRow !== undefined ?
        api.row( iRow ).node() :
        api.rows().nodes().flatten().toArray();
    };
    
    
    /**
     * Get the array indexes of a particular cell from it's DOM element
     * and column index including hidden columns
     *  @param {node} node this can either be a TR, TD or TH in the table's body
     *  @returns {int} If nNode is given as a TR, then a single index is returned, or
     *    if given as a cell, an array of [row index, column index (visible),
     *    column index (all)] is given.
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      $('#example tbody td').click( function () {
     *        // Get the position of the current data from the node
     *        var aPos = oTable.fnGetPosition( this );
     *
     *        // Get the data array for this row
     *        var aData = oTable.fnGetData( aPos[0] );
     *
     *        // Update the data array and return the value
     *        aData[ aPos[1] ] = 'clicked';
     *        this.innerHTML = 'clicked';
     *      } );
     *
     *      // Init DataTables
     *      oTable = $('#example').dataTable();
     *    } );
     */
    this.fnGetPosition = function( node )
    {
      var api = this.api( true );
      var nodeName = node.nodeName.toUpperCase();
    
      if ( nodeName == 'TR' ) {
        return api.row( node ).index();
      }
      else if ( nodeName == 'TD' || nodeName == 'TH' ) {
        var cell = api.cell( node ).index();
    
        return [
          cell.row,
          cell.columnVisible,
          cell.column
        ];
      }
      return null;
    };
    
    
    /**
     * Check to see if a row is 'open' or not.
     *  @param {node} nTr the table row to check
     *  @returns {boolean} true if the row is currently open, false otherwise
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable;
     *
     *      // 'open' an information row when a row is clicked on
     *      $('#example tbody tr').click( function () {
     *        if ( oTable.fnIsOpen(this) ) {
     *          oTable.fnClose( this );
     *        } else {
     *          oTable.fnOpen( this, "Temporary row opened", "info_row" );
     *        }
     *      } );
     *
     *      oTable = $('#example').dataTable();
     *    } );
     */
    this.fnIsOpen = function( nTr )
    {
      return this.api( true ).row( nTr ).child.isShown();
    };
    
    
    /**
     * This function will place a new row directly after a row which is currently
     * on display on the page, with the HTML contents that is passed into the
     * function. This can be used, for example, to ask for confirmation that a
     * particular record should be deleted.
     *  @param {node} nTr The table row to 'open'
     *  @param {string|node|jQuery} mHtml The HTML to put into the row
     *  @param {string} sClass Class to give the new TD cell
     *  @returns {node} The row opened. Note that if the table row passed in as the
     *    first parameter, is not found in the table, this method will silently
     *    return.
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable;
     *
     *      // 'open' an information row when a row is clicked on
     *      $('#example tbody tr').click( function () {
     *        if ( oTable.fnIsOpen(this) ) {
     *          oTable.fnClose( this );
     *        } else {
     *          oTable.fnOpen( this, "Temporary row opened", "info_row" );
     *        }
     *      } );
     *
     *      oTable = $('#example').dataTable();
     *    } );
     */
    this.fnOpen = function( nTr, mHtml, sClass )
    {
      return this.api( true )
        .row( nTr )
        .child( mHtml, sClass )
        .show()
        .child()[0];
    };
    
    
    /**
     * Change the pagination - provides the internal logic for pagination in a simple API
     * function. With this function you can have a DataTables table go to the next,
     * previous, first or last pages.
     *  @param {string|int} mAction Paging action to take: "first", "previous", "next" or "last"
     *    or page number to jump to (integer), note that page 0 is the first page.
     *  @param {bool} [bRedraw=true] Redraw the table or not
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *      oTable.fnPageChange( 'next' );
     *    } );
     */
    this.fnPageChange = function ( mAction, bRedraw )
    {
      var api = this.api( true ).page( mAction );
    
      if ( bRedraw === undefined || bRedraw ) {
        api.draw(false);
      }
    };
    
    
    /**
     * Show a particular column
     *  @param {int} iCol The column whose display should be changed
     *  @param {bool} bShow Show (true) or hide (false) the column
     *  @param {bool} [bRedraw=true] Redraw the table or not
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *
     *      // Hide the second column after initialisation
     *      oTable.fnSetColumnVis( 1, false );
     *    } );
     */
    this.fnSetColumnVis = function ( iCol, bShow, bRedraw )
    {
      var api = this.api( true ).column( iCol ).visible( bShow );
    
      if ( bRedraw === undefined || bRedraw ) {
        api.columns.adjust().draw();
      }
    };
    
    
    /**
     * Get the settings for a particular table for external manipulation
     *  @returns {object} DataTables settings object. See
     *    {@link DataTable.models.oSettings}
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *      var oSettings = oTable.fnSettings();
     *
     *      // Show an example parameter from the settings
     *      alert( oSettings._iDisplayStart );
     *    } );
     */
    this.fnSettings = function()
    {
      return _fnSettingsFromNode( this[_ext.iApiIndex] );
    };
    
    
    /**
     * Sort the table by a particular column
     *  @param {int} iCol the data index to sort on. Note that this will not match the
     *    'display index' if you have hidden data entries
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *
     *      // Sort immediately with columns 0 and 1
     *      oTable.fnSort( [ [0,'asc'], [1,'asc'] ] );
     *    } );
     */
    this.fnSort = function( aaSort )
    {
      this.api( true ).order( aaSort ).draw();
    };
    
    
    /**
     * Attach a sort listener to an element for a given column
     *  @param {node} nNode the element to attach the sort listener to
     *  @param {int} iColumn the column that a click on this node will sort on
     *  @param {function} [fnCallback] callback function when sort is run
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *
     *      // Sort on column 1, when 'sorter' is clicked on
     *      oTable.fnSortListener( document.getElementById('sorter'), 1 );
     *    } );
     */
    this.fnSortListener = function( nNode, iColumn, fnCallback )
    {
      this.api( true ).order.listener( nNode, iColumn, fnCallback );
    };
    
    
    /**
     * Update a table cell or row - this method will accept either a single value to
     * update the cell with, an array of values with one element for each column or
     * an object in the same format as the original data source. The function is
     * self-referencing in order to make the multi column updates easier.
     *  @param {object|array|string} mData Data to update the cell/row with
     *  @param {node|int} mRow TR element you want to update or the aoData index
     *  @param {int} [iColumn] The column to update, give as null or undefined to
     *    update a whole row.
     *  @param {bool} [bRedraw=true] Redraw the table or not
     *  @param {bool} [bAction=true] Perform pre-draw actions or not
     *  @returns {int} 0 on success, 1 on error
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *      oTable.fnUpdate( 'Example update', 0, 0 ); // Single cell
     *      oTable.fnUpdate( ['a', 'b', 'c', 'd', 'e'], $('tbody tr')[0] ); // Row
     *    } );
     */
    this.fnUpdate = function( mData, mRow, iColumn, bRedraw, bAction )
    {
      var api = this.api( true );
    
      if ( iColumn === undefined || iColumn === null ) {
        api.row( mRow ).data( mData );
      }
      else {
        api.cell( mRow, iColumn ).data( mData );
      }
    
      if ( bAction === undefined || bAction ) {
        api.columns.adjust();
      }
    
      if ( bRedraw === undefined || bRedraw ) {
        api.draw();
      }
      return 0;
    };
    
    
    /**
     * Provide a common method for plug-ins to check the version of DataTables being used, in order
     * to ensure compatibility.
     *  @param {string} sVersion Version string to check for, in the format "X.Y.Z". Note that the
     *    formats "X" and "X.Y" are also acceptable.
     *  @returns {boolean} true if this version of DataTables is greater or equal to the required
     *    version, or false if this version of DataTales is not suitable
     *  @method
     *  @dtopt API
     *  @deprecated Since v1.10
     *
     *  @example
     *    $(document).ready(function() {
     *      var oTable = $('#example').dataTable();
     *      alert( oTable.fnVersionCheck( '1.9.0' ) );
     *    } );
     */
    this.fnVersionCheck = _ext.fnVersionCheck;
    

    var _that = this;
    var emptyInit = options === undefined;
    var len = this.length;

    if ( emptyInit ) {
      options = {};
    }

    this.oApi = this.internal = _ext.internal;

    // Extend with old style plug-in API methods
    for ( var fn in DataTable.ext.internal ) {
      if ( fn ) {
        this[fn] = _fnExternApiFunc(fn);
      }
    }

    this.each(function() {
      // For each initialisation we want to give it a clean initialisation
      // object that can be bashed around
      var o = {};
      var oInit = len > 1 ? // optimisation for single table case
        _fnExtend( o, options, true ) :
        options;

      /*global oInit,_that,emptyInit*/
      var i=0, iLen, j, jLen, k, kLen;
      var sId = this.getAttribute( 'id' );
      var bInitHandedOff = false;
      var defaults = DataTable.defaults;
      
      
      /* Sanity check */
      if ( this.nodeName.toLowerCase() != 'table' )
      {
        _fnLog( null, 0, 'Non-table node initialisation ('+this.nodeName+')', 2 );
        return;
      }
      
      /* Backwards compatibility for the defaults */
      _fnCompatOpts( defaults );
      _fnCompatCols( defaults.column );
      
      /* Convert the camel-case defaults to Hungarian */
      _fnCamelToHungarian( defaults, defaults, true );
      _fnCamelToHungarian( defaults.column, defaults.column, true );
      
      /* Setting up the initialisation object */
      _fnCamelToHungarian( defaults, oInit );
      
      /* Check to see if we are re-initialising a table */
      var allSettings = DataTable.settings;
      for ( i=0, iLen=allSettings.length ; i<iLen ; i++ )
      {
        /* Base check on table node */
        if ( allSettings[i].nTable == this )
        {
          var bRetrieve = oInit.bRetrieve !== undefined ? oInit.bRetrieve : defaults.bRetrieve;
          var bDestroy = oInit.bDestroy !== undefined ? oInit.bDestroy : defaults.bDestroy;
      
          if ( emptyInit || bRetrieve )
          {
            return allSettings[i].oInstance;
          }
          else if ( bDestroy )
          {
            allSettings[i].oInstance.fnDestroy();
            break;
          }
          else
          {
            _fnLog( allSettings[i], 0, 'Cannot reinitialise DataTable', 3 );
            return;
          }
        }
      
        /* If the element we are initialising has the same ID as a table which was previously
         * initialised, but the table nodes don't match (from before) then we destroy the old
         * instance by simply deleting it. This is under the assumption that the table has been
         * destroyed by other methods. Anyone using non-id selectors will need to do this manually
         */
        if ( allSettings[i].sTableId == this.id )
        {
          allSettings.splice( i, 1 );
          break;
        }
      }
      
      /* Ensure the table has an ID - required for accessibility */
      if ( sId === null || sId === "" )
      {
        sId = "DataTables_Table_"+(DataTable.ext._unique++);
        this.id = sId;
      }
      
      /* Create the settings object for this table and set some of the default parameters */
      var oSettings = $.extend( true, {}, DataTable.models.oSettings, {
        "nTable":        this,
        "oApi":          _that.internal,
        "oInit":         oInit,
        "sDestroyWidth": $(this)[0].style.width,
        "sInstance":     sId,
        "sTableId":      sId
      } );
      allSettings.push( oSettings );
      
      // Need to add the instance after the instance after the settings object has been added
      // to the settings array, so we can self reference the table instance if more than one
      oSettings.oInstance = (_that.length===1) ? _that : $(this).dataTable();
      
      // Backwards compatibility, before we apply all the defaults
      _fnCompatOpts( oInit );
      
      if ( oInit.oLanguage )
      {
        _fnLanguageCompat( oInit.oLanguage );
      }
      
      // If the length menu is given, but the init display length is not, use the length menu
      if ( oInit.aLengthMenu && ! oInit.iDisplayLength )
      {
        oInit.iDisplayLength = $.isArray( oInit.aLengthMenu[0] ) ?
          oInit.aLengthMenu[0][0] : oInit.aLengthMenu[0];
      }
      
      // Apply the defaults and init options to make a single init object will all
      // options defined from defaults and instance options.
      oInit = _fnExtend( $.extend( true, {}, defaults ), oInit );
      
      
      // Map the initialisation options onto the settings object
      _fnMap( oSettings.oFeatures, oInit, [
        "bPaginate",
        "bLengthChange",
        "bFilter",
        "bSort",
        "bSortMulti",
        "bInfo",
        "bProcessing",
        "bAutoWidth",
        "bSortClasses",
        "bServerSide",
        "bDeferRender"
      ] );
      _fnMap( oSettings, oInit, [
        "asStripeClasses",
        "ajax",
        "fnServerData",
        "fnFormatNumber",
        "sServerMethod",
        "aaSorting",
        "aaSortingFixed",
        "aLengthMenu",
        "sPaginationType",
        "sAjaxSource",
        "sAjaxDataProp",
        "iStateDuration",
        "sDom",
        "bSortCellsTop",
        "iTabIndex",
        "fnStateLoadCallback",
        "fnStateSaveCallback",
        "renderer",
        [ "iCookieDuration", "iStateDuration" ], // backwards compat
        [ "oSearch", "oPreviousSearch" ],
        [ "aoSearchCols", "aoPreSearchCols" ],
        [ "iDisplayLength", "_iDisplayLength" ],
        [ "bJQueryUI", "bJUI" ]
      ] );
      _fnMap( oSettings.oScroll, oInit, [
        [ "sScrollX", "sX" ],
        [ "sScrollXInner", "sXInner" ],
        [ "sScrollY", "sY" ],
        [ "bScrollCollapse", "bCollapse" ]
      ] );
      _fnMap( oSettings.oLanguage, oInit, "fnInfoCallback" );
      
      /* Callback functions which are array driven */
      _fnCallbackReg( oSettings, 'aoDrawCallback',       oInit.fnDrawCallback,      'user' );
      _fnCallbackReg( oSettings, 'aoServerParams',       oInit.fnServerParams,      'user' );
      _fnCallbackReg( oSettings, 'aoStateSaveParams',    oInit.fnStateSaveParams,   'user' );
      _fnCallbackReg( oSettings, 'aoStateLoadParams',    oInit.fnStateLoadParams,   'user' );
      _fnCallbackReg( oSettings, 'aoStateLoaded',        oInit.fnStateLoaded,       'user' );
      _fnCallbackReg( oSettings, 'aoRowCallback',        oInit.fnRowCallback,       'user' );
      _fnCallbackReg( oSettings, 'aoRowCreatedCallback', oInit.fnCreatedRow,        'user' );
      _fnCallbackReg( oSettings, 'aoHeaderCallback',     oInit.fnHeaderCallback,    'user' );
      _fnCallbackReg( oSettings, 'aoFooterCallback',     oInit.fnFooterCallback,    'user' );
      _fnCallbackReg( oSettings, 'aoInitComplete',       oInit.fnInitComplete,      'user' );
      _fnCallbackReg( oSettings, 'aoPreDrawCallback',    oInit.fnPreDrawCallback,   'user' );
      
      var oClasses = oSettings.oClasses;
      
      // @todo Remove in 1.11
      if ( oInit.bJQueryUI )
      {
        /* Use the JUI classes object for display. You could clone the oStdClasses object if
         * you want to have multiple tables with multiple independent classes
         */
        $.extend( oClasses, DataTable.ext.oJUIClasses, oInit.oClasses );
      
        if ( oInit.sDom === defaults.sDom && defaults.sDom === "lfrtip" )
        {
          /* Set the DOM to use a layout suitable for jQuery UI's theming */
          oSettings.sDom = '<"H"lfr>t<"F"ip>';
        }
      
        if ( ! oSettings.renderer ) {
          oSettings.renderer = 'jqueryui';
        }
        else if ( $.isPlainObject( oSettings.renderer ) && ! oSettings.renderer.header ) {
          oSettings.renderer.header = 'jqueryui';
        }
      }
      else
      {
        $.extend( oClasses, DataTable.ext.classes, oInit.oClasses );
      }
      $(this).addClass( oClasses.sTable );
      
      /* Calculate the scroll bar width and cache it for use later on */
      if ( oSettings.oScroll.sX !== "" || oSettings.oScroll.sY !== "" )
      {
        oSettings.oScroll.iBarWidth = _fnScrollBarWidth();
      }
      if ( oSettings.oScroll.sX === true ) { // Easy initialisation of x-scrolling
        oSettings.oScroll.sX = '100%';
      }
      
      if ( oSettings.iInitDisplayStart === undefined )
      {
        /* Display start point, taking into account the save saving */
        oSettings.iInitDisplayStart = oInit.iDisplayStart;
        oSettings._iDisplayStart = oInit.iDisplayStart;
      }
      
      if ( oInit.iDeferLoading !== null )
      {
        oSettings.bDeferLoading = true;
        var tmp = $.isArray( oInit.iDeferLoading );
        oSettings._iRecordsDisplay = tmp ? oInit.iDeferLoading[0] : oInit.iDeferLoading;
        oSettings._iRecordsTotal = tmp ? oInit.iDeferLoading[1] : oInit.iDeferLoading;
      }
      
      /* Language definitions */
      if ( oInit.oLanguage.sUrl !== "" )
      {
        /* Get the language definitions from a file - because this Ajax call makes the language
         * get async to the remainder of this function we use bInitHandedOff to indicate that
         * _fnInitialise will be fired by the returned Ajax handler, rather than the constructor
         */
        oSettings.oLanguage.sUrl = oInit.oLanguage.sUrl;
        $.getJSON( oSettings.oLanguage.sUrl, null, function( json ) {
          _fnLanguageCompat( json );
          _fnCamelToHungarian( defaults.oLanguage, json );
          $.extend( true, oSettings.oLanguage, oInit.oLanguage, json );
          _fnInitialise( oSettings );
        } );
        bInitHandedOff = true;
      }
      else
      {
        $.extend( true, oSettings.oLanguage, oInit.oLanguage );
      }
      
      
      /*
       * Stripes
       */
      if ( oInit.asStripeClasses === null )
      {
        oSettings.asStripeClasses =[
          oClasses.sStripeOdd,
          oClasses.sStripeEven
        ];
      }
      
      /* Remove row stripe classes if they are already on the table row */
      var stripeClasses = oSettings.asStripeClasses;
      var rowOne = $('tbody tr:eq(0)', this);
      if ( $.inArray( true, $.map( stripeClasses, function(el, i) {
        return rowOne.hasClass(el);
      } ) ) !== -1 ) {
        $('tbody tr', this).removeClass( stripeClasses.join(' ') );
        oSettings.asDestroyStripes = stripeClasses.slice();
      }
      
      /*
       * Columns
       * See if we should load columns automatically or use defined ones
       */
      var anThs = [];
      var aoColumnsInit;
      var nThead = this.getElementsByTagName('thead');
      if ( nThead.length !== 0 )
      {
        _fnDetectHeader( oSettings.aoHeader, nThead[0] );
        anThs = _fnGetUniqueThs( oSettings );
      }
      
      /* If not given a column array, generate one with nulls */
      if ( oInit.aoColumns === null )
      {
        aoColumnsInit = [];
        for ( i=0, iLen=anThs.length ; i<iLen ; i++ )
        {
          aoColumnsInit.push( null );
        }
      }
      else
      {
        aoColumnsInit = oInit.aoColumns;
      }
      
      /* Add the columns */
      for ( i=0, iLen=aoColumnsInit.length ; i<iLen ; i++ )
      {
        _fnAddColumn( oSettings, anThs ? anThs[i] : null );
      }
      
      /* Apply the column definitions */
      _fnApplyColumnDefs( oSettings, oInit.aoColumnDefs, aoColumnsInit, function (iCol, oDef) {
        _fnColumnOptions( oSettings, iCol, oDef );
      } );
      
      /* HTML5 attribute detection - build an mData object automatically if the
       * attributes are found
       */
      if ( rowOne.length ) {
        var a = function ( cell, name ) {
          return cell.getAttribute( 'data-'+name ) ? name : null;
        };
      
        $.each( _fnGetRowElements( oSettings, rowOne[0] ).cells, function (i, cell) {
          var col = oSettings.aoColumns[i];
      
          if ( col.mData === i ) {
            var sort = a( cell, 'sort' ) || a( cell, 'order' );
            var filter = a( cell, 'filter' ) || a( cell, 'search' );
      
            if ( sort !== null || filter !== null ) {
              col.mData = {
                _:      i+'.display',
                sort:   sort !== null   ? i+'.@data-'+sort   : undefined,
                type:   sort !== null   ? i+'.@data-'+sort   : undefined,
                filter: filter !== null ? i+'.@data-'+filter : undefined
              };
      
              _fnColumnOptions( oSettings, i );
            }
          }
        } );
      }
      
      var features = oSettings.oFeatures;
      
      /* Must be done after everything which can be overridden by the state saving! */
      if ( oInit.bStateSave )
      {
        features.bStateSave = true;
        _fnLoadState( oSettings, oInit );
        _fnCallbackReg( oSettings, 'aoDrawCallback', _fnSaveState, 'state_save' );
      }
      
      
      /*
       * Sorting
       * @todo For modularisation (1.11) this needs to do into a sort start up handler
       */
      
      // If aaSorting is not defined, then we use the first indicator in asSorting
      // in case that has been altered, so the default sort reflects that option
      if ( oInit.aaSorting === undefined )
      {
        var sorting = oSettings.aaSorting;
        for ( i=0, iLen=sorting.length ; i<iLen ; i++ )
        {
          sorting[i][1] = oSettings.aoColumns[ i ].asSorting[0];
        }
      }
      
      /* Do a first pass on the sorting classes (allows any size changes to be taken into
       * account, and also will apply sorting disabled classes if disabled
       */
      _fnSortingClasses( oSettings );
      
      if ( features.bSort )
      {
        _fnCallbackReg( oSettings, 'aoDrawCallback', function () {
          if ( oSettings.bSorted ) {
            var aSort = _fnSortFlatten( oSettings );
            var sortedColumns = {};
      
            $.each( aSort, function (i, val) {
              sortedColumns[ val.src ] = val.dir;
            } );
      
            _fnCallbackFire( oSettings, null, 'order', [oSettings, aSort, sortedColumns] );
            _fnSortAria( oSettings );
          }
        } );
      }
      
      _fnCallbackReg( oSettings, 'aoDrawCallback', function () {
        if ( oSettings.bSorted || _fnDataSource( oSettings ) === 'ssp' || features.bDeferRender ) {
          _fnSortingClasses( oSettings );
        }
      }, 'sc' );
      
      
      /*
       * Final init
       * Cache the header, body and footer as required, creating them if needed
       */
      
      /* Browser support detection */
      _fnBrowserDetect( oSettings );
      
      // Work around for Webkit bug 83867 - store the caption-side before removing from doc
      var captions = $(this).children('caption').each( function () {
        this._captionSide = $(this).css('caption-side');
      } );
      
      var thead = $(this).children('thead');
      if ( thead.length === 0 )
      {
        thead = $('<thead/>').appendTo(this);
      }
      oSettings.nTHead = thead[0];
      
      var tbody = $(this).children('tbody');
      if ( tbody.length === 0 )
      {
        tbody = $('<tbody/>').appendTo(this);
      }
      oSettings.nTBody = tbody[0];
      
      var tfoot = $(this).children('tfoot');
      if ( tfoot.length === 0 && captions.length > 0 && (oSettings.oScroll.sX !== "" || oSettings.oScroll.sY !== "") )
      {
        // If we are a scrolling table, and no footer has been given, then we need to create
        // a tfoot element for the caption element to be appended to
        tfoot = $('<tfoot/>').appendTo(this);
      }
      
      if ( tfoot.length === 0 || tfoot.children().length === 0 ) {
        $(this).addClass( oClasses.sNoFooter );
      }
      else if ( tfoot.length > 0 ) {
        oSettings.nTFoot = tfoot[0];
        _fnDetectHeader( oSettings.aoFooter, oSettings.nTFoot );
      }
      
      /* Check if there is data passing into the constructor */
      if ( oInit.aaData )
      {
        for ( i=0 ; i<oInit.aaData.length ; i++ )
        {
          _fnAddData( oSettings, oInit.aaData[ i ] );
        }
      }
      else if ( oSettings.bDeferLoading || _fnDataSource( oSettings ) == 'dom' )
      {
        /* Grab the data from the page - only do this when deferred loading or no Ajax
         * source since there is no point in reading the DOM data if we are then going
         * to replace it with Ajax data
         */
        _fnAddTr( oSettings, $(oSettings.nTBody).children('tr') );
      }
      
      /* Copy the data index array */
      oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
      
      /* Initialisation complete - table can be drawn */
      oSettings.bInitialised = true;
      
      /* Check if we need to initialise the table (it might not have been handed off to the
       * language processor)
       */
      if ( bInitHandedOff === false )
      {
        _fnInitialise( oSettings );
      }
    } );
    _that = null;
    return this;
  };

  
  
  /**
   * Computed structure of the DataTables API, defined by the options passed to
   * `DataTable.Api.register()` when building the API.
   *
   * The structure is built in order to speed creation and extension of the Api
   * objects since the extensions are effectively pre-parsed.
   *
   * The array is an array of objects with the following structure, where this
   * base array represents the Api prototype base:
   *
   *     [
   *       {
   *         name:      'data'                -- string   - Property name
   *         val:       function () {},       -- function - Api method (or undefined if just an object
   *         methodExt: [ ... ],              -- array    - Array of Api object definitions to extend the method result
   *         propExt:   [ ... ]               -- array    - Array of Api object definitions to extend the property
   *       },
   *       {
   *         name:     'row'
   *         val:       {},
   *         methodExt: [ ... ],
   *         propExt:   [
   *           {
   *             name:      'data'
   *             val:       function () {},
   *             methodExt: [ ... ],
   *             propExt:   [ ... ]
   *           },
   *           ...
   *         ]
   *       }
   *     ]
   *
   * @type {Array}
   * @ignore
   */
  var __apiStruct = [];
  
  
  /**
   * `Array.prototype` reference.
   *
   * @type object
   * @ignore
   */
  var __arrayProto = Array.prototype;
  
  
  /**
   * Abstraction for `context` parameter of the `Api` constructor to allow it to
   * take several different forms for ease of use.
   *
   * Each of the input parameter types will be converted to a DataTables settings
   * object where possible.
   *
   * @param  {string|node|jQuery|object} mixed DataTable identifier. Can be one
   *   of:
   *
   *   * `string` - jQuery selector. Any DataTables' matching the given selector
   *     with be found and used.
   *   * `node` - `TABLE` node which has already been formed into a DataTable.
   *   * `jQuery` - A jQuery object of `TABLE` nodes.
   *   * `object` - DataTables settings object
   *   * `DataTables.Api` - API instance
   * @return {array|null} Matching DataTables settings objects. `null` or
   *   `undefined` is returned if no matching DataTable is found.
   * @ignore
   */
  var _toSettings = function ( mixed )
  {
    var idx, jq;
    var settings = DataTable.settings;
    var tables = $.map( settings, function (el, i) {
      return el.nTable;
    } );
  
    if ( ! mixed ) {
      return [];
    }
    else if ( mixed.nTable && mixed.oApi ) {
      // DataTables settings object
      return [ mixed ];
    }
    else if ( mixed.nodeName && mixed.nodeName.toLowerCase() === 'table' ) {
      // Table node
      idx = $.inArray( mixed, tables );
      return idx !== -1 ? [ settings[idx] ] : null;
    }
    else if ( mixed && typeof mixed.settings === 'function' ) {
      return mixed.settings().toArray();
    }
    else if ( typeof mixed === 'string' ) {
      // jQuery selector
      jq = $(mixed);
    }
    else if ( mixed instanceof $ ) {
      // jQuery object (also DataTables instance)
      jq = mixed;
    }
  
    if ( jq ) {
      return jq.map( function(i) {
        idx = $.inArray( this, tables );
        return idx !== -1 ? settings[idx] : null;
      } ).toArray();
    }
  };
  
  
  /**
   * DataTables API class - used to control and interface with  one or more
   * DataTables enhanced tables.
   *
   * The API class is heavily based on jQuery, presenting a chainable interface
   * that you can use to interact with tables. Each instance of the API class has
   * a "context" - i.e. the tables that it will operate on. This could be a single
   * table, all tables on a page or a sub-set thereof.
   *
   * Additionally the API is designed to allow you to easily work with the data in
   * the tables, retrieving and manipulating it as required. This is done by
   * presenting the API class as an array like interface. The contents of the
   * array depend upon the actions requested by each method (for example
   * `rows().nodes()` will return an array of nodes, while `rows().data()` will
   * return an array of objects or arrays depending upon your table's
   * configuration). The API object has a number of array like methods (`push`,
   * `pop`, `reverse` etc) as well as additional helper methods (`each`, `pluck`,
   * `unique` etc) to assist your working with the data held in a table.
   *
   * Most methods (those which return an Api instance) are chainable, which means
   * the return from a method call also has all of the methods available that the
   * top level object had. For example, these two calls are equivalent:
   *
   *     // Not chained
   *     api.row.add( {...} );
   *     api.draw();
   *
   *     // Chained
   *     api.row.add( {...} ).draw();
   *
   * @class DataTable.Api
   * @param {array|object|string|jQuery} context DataTable identifier. This is
   *   used to define which DataTables enhanced tables this API will operate on.
   *   Can be one of:
   *
   *   * `string` - jQuery selector. Any DataTables' matching the given selector
   *     with be found and used.
   *   * `node` - `TABLE` node which has already been formed into a DataTable.
   *   * `jQuery` - A jQuery object of `TABLE` nodes.
   *   * `object` - DataTables settings object
   * @param {array} [data] Data to initialise the Api instance with.
   *
   * @example
   *   // Direct initialisation during DataTables construction
   *   var api = $('#example').DataTable();
   *
   * @example
   *   // Initialisation using a DataTables jQuery object
   *   var api = $('#example').dataTable().api();
   *
   * @example
   *   // Initialisation as a constructor
   *   var api = new $.fn.DataTable.Api( 'table.dataTable' );
   */
  DataTable.Api = _Api = function ( context, data )
  {
    if ( ! this instanceof _Api ) {
      throw 'DT API must be constructed as a new object';
      // or should it do the 'new' for the caller?
      // return new _Api.apply( this, arguments );
    }
  
    var settings = [];
    var ctxSettings = function ( o ) {
      var a = _toSettings( o );
      if ( a ) {
        settings.push.apply( settings, a );
      }
    };
  
    if ( $.isArray( context ) ) {
      for ( var i=0, ien=context.length ; i<ien ; i++ ) {
        ctxSettings( context[i] );
      }
    }
    else {
      ctxSettings( context );
    }
  
    // Remove duplicates
    this.context = _unique( settings );
  
    // Initial data
    if ( data ) {
      this.push.apply( this, data.toArray ? data.toArray() : data );
    }
  
    // selector
    this.selector = {
      rows: null,
      cols: null,
      opts: null
    };
  
    _Api.extend( this, this, __apiStruct );
  };
  
  
  _Api.prototype = /** @lends DataTables.Api */{
    /**
     * Return a new Api instance, comprised of the data held in the current
     * instance, join with the other array(s) and/or value(s).
     *
     * An alias for `Array.prototype.concat`.
     *
     * @type method
     * @param {*} value1 Arrays and/or values to concatenate.
     * @param {*} [...] Additional arrays and/or values to concatenate.
     * @returns {DataTables.Api} New API instance, comprising of the combined
     *   array.
     */
    concat:  __arrayProto.concat,
  
  
    context: [], // array of table settings objects
  
  
    each: function ( fn )
    {
      if ( __arrayProto.forEach ) {
        // Where possible, use the built-in forEach
        __arrayProto.forEach.call( this, fn, this );
      }
      else {
        // Compatibility for browsers without EMCA-252-5 (JS 1.6)
        for ( var i=0, ien=this.length ; i<ien; i++ ) {
          // In strict mode the execution scope is the passed value
          fn.call( this, this[i], i, this );
        }
      }
  
      return this;
    },
  
  
    eq: function ( idx )
    {
      var ctx = this.context;
  
      return ctx.length > idx ?
        new _Api( ctx[idx], this[idx] ) :
        null;
    },
  
  
    filter: function ( fn )
    {
      var a = [];
  
      if ( __arrayProto.filter ) {
        a = __arrayProto.filter.call( this, fn, this );
      }
      else {
        // Compatibility for browsers without EMCA-252-5 (JS 1.6)
        for ( var i=0, ien=this.length ; i<ien ; i++ ) {
          if ( fn.call( this, this[i], i, this ) ) {
            a.push( this[i] );
          }
        }
      }
  
      return new _Api( this.context, a );
    },
  
  
    flatten: function ()
    {
      var a = [];
      return new _Api( this.context, a.concat.apply( a, this.toArray() ) );
    },
  
  
    join:    __arrayProto.join,
  
  
    indexOf: __arrayProto.indexOf || function (obj, start)
    {
      for ( var i=(start || 0), ien=this.length ; i<ien ; i++ ) {
        if ( this[i] === obj ) {
          return i;
        }
      }
      return -1;
    },
  
    // Internal only at the moment - relax?
    iterator: function ( flatten, type, fn ) {
      var
        a = [], ret,
        i, ien, j, jen,
        context = this.context,
        rows, items, item,
        selector = this.selector;
  
      // Argument shifting
      if ( typeof flatten === 'string' ) {
        fn = type;
        type = flatten;
        flatten = false;
      }
  
      for ( i=0, ien=context.length ; i<ien ; i++ ) {
        if ( type === 'table' ) {
          ret = fn( context[i], i );
  
          if ( ret !== undefined ) {
            a.push( ret );
          }
        }
        else if ( type === 'columns' || type === 'rows' ) {
          // this has same length as context - one entry for each table
          ret = fn( context[i], this[i], i );
  
          if ( ret !== undefined ) {
            a.push( ret );
          }
        }
        else if ( type === 'column' || type === 'column-rows' || type === 'row' || type === 'cell' ) {
          // columns and rows share the same structure.
          // 'this' is an array of column indexes for each context
          items = this[i];
  
          if ( type === 'column-rows' ) {
            rows = _selector_row_indexes( context[i], selector.opts );
          }
  
          for ( j=0, jen=items.length ; j<jen ; j++ ) {
            item = items[j];
  
            if ( type === 'cell' ) {
              ret = fn( context[i], item.row, item.column, i, j );
            }
            else {
              ret = fn( context[i], item, i, j, rows );
            }
  
            if ( ret !== undefined ) {
              a.push( ret );
            }
          }
        }
      }
  
      if ( a.length ) {
        var api = new _Api( context, flatten ? a.concat.apply( [], a ) : a );
        var apiSelector = api.selector;
        apiSelector.rows = selector.rows;
        apiSelector.cols = selector.cols;
        apiSelector.opts = selector.opts;
        return api;
      }
      return this;
    },
  
  
    lastIndexOf: __arrayProto.lastIndexOf || function (obj, start)
    {
      // Bit cheeky...
      return this.indexOf.apply( this.toArray.reverse(), arguments );
    },
  
  
    length:  0,
  
  
    map: function ( fn )
    {
      var a = [];
  
      if ( __arrayProto.map ) {
        a = __arrayProto.map.call( this, fn, this );
      }
      else {
        // Compatibility for browsers without EMCA-252-5 (JS 1.6)
        for ( var i=0, ien=this.length ; i<ien ; i++ ) {
          a.push( fn.call( this, this[i], i ) );
        }
      }
  
      return new _Api( this.context, a );
    },
  
  
    pluck: function ( prop )
    {
      return this.map( function ( el ) {
        return el[ prop ];
      } );
    },
  
    pop:     __arrayProto.pop,
  
  
    push:    __arrayProto.push,
  
  
    // Does not return an API instance
    reduce: __arrayProto.reduce || function ( fn, init )
    {
      return _fnReduce( this, fn, init, 0, this.length, 1 );
    },
  
  
    reduceRight: __arrayProto.reduceRight || function ( fn, init )
    {
      return _fnReduce( this, fn, init, this.length-1, -1, -1 );
    },
  
  
    reverse: __arrayProto.reverse,
  
  
    // Object with rows, columns and opts
    selector: null,
  
  
    shift:   __arrayProto.shift,
  
  
    sort:    __arrayProto.sort, // ? name - order?
  
  
    splice:  __arrayProto.splice,
  
  
    toArray: function ()
    {
      return __arrayProto.slice.call( this );
    },
  
  
    to$: function ()
    {
      return $( this );
    },
  
  
    toJQuery: function ()
    {
      return $( this );
    },
  
  
    unique: function ()
    {
      return new _Api( this.context, _unique(this) );
    },
  
  
    unshift: __arrayProto.unshift
  };
  
  
  _Api.extend = function ( scope, obj, ext )
  {
    // Only extend API instances and static properties of the API
    if ( ! obj || ( ! (obj instanceof _Api) && ! obj.__dt_wrapper ) ) {
      return;
    }
  
    var
      i, ien,
      j, jen,
      struct, inner,
      methodScoping = function ( fn, struc ) {
        return function () {
          var ret = fn.apply( scope, arguments );
  
          // Method extension
          _Api.extend( ret, ret, struc.methodExt );
          return ret;
        };
      };
  
    for ( i=0, ien=ext.length ; i<ien ; i++ ) {
      struct = ext[i];
  
      // Value
      obj[ struct.name ] = typeof struct.val === 'function' ?
        methodScoping( struct.val, struct ) :
        $.isPlainObject( struct.val ) ?
          {} :
          struct.val;
  
      obj[ struct.name ].__dt_wrapper = true;
  
      // Property extension
      _Api.extend( scope, obj[ struct.name ], struct.propExt );
    }
  };
  
  
  // @todo - Is there need for an augment function?
  // _Api.augment = function ( inst, name )
  // {
  //  // Find src object in the structure from the name
  //  var parts = name.split('.');
  
  //  _Api.extend( inst, obj );
  // };
  
  
  //     [
  //       {
  //         name:      'data'                -- string   - Property name
  //         val:       function () {},       -- function - Api method (or undefined if just an object
  //         methodExt: [ ... ],              -- array    - Array of Api object definitions to extend the method result
  //         propExt:   [ ... ]               -- array    - Array of Api object definitions to extend the property
  //       },
  //       {
  //         name:     'row'
  //         val:       {},
  //         methodExt: [ ... ],
  //         propExt:   [
  //           {
  //             name:      'data'
  //             val:       function () {},
  //             methodExt: [ ... ],
  //             propExt:   [ ... ]
  //           },
  //           ...
  //         ]
  //       }
  //     ]
  
  _Api.register = _api_register = function ( name, val )
  {
    if ( $.isArray( name ) ) {
      for ( var j=0, jen=name.length ; j<jen ; j++ ) {
        _Api.register( name[j], val );
      }
      return;
    }
  
    var
      i, ien,
      heir = name.split('.'),
      struct = __apiStruct,
      key, method;
  
    var find = function ( src, name ) {
      for ( var i=0, ien=src.length ; i<ien ; i++ ) {
        if ( src[i].name === name ) {
          return src[i];
        }
      }
      return null;
    };
  
    for ( i=0, ien=heir.length ; i<ien ; i++ ) {
      method = heir[i].indexOf('()') !== -1;
      key = method ?
        heir[i].replace('()', '') :
        heir[i];
  
      var src = find( struct, key );
      if ( ! src ) {
        src = {
          name:      key,
          val:       {},
          methodExt: [],
          propExt:   []
        };
        struct.push( src );
      }
  
      if ( i === ien-1 ) {
        src.val = val;
      }
      else {
        struct = method ?
          src.methodExt :
          src.propExt;
      }
    }
  
    // Rebuild the API with the new construct
    if ( _Api.ready ) {
      DataTable.api.build();
    }
  };
  
  
  _Api.registerPlural = _api_registerPlural = function ( pluralName, singularName, val ) {
    _Api.register( pluralName, val );
  
    _Api.register( singularName, function () {
      var ret = val.apply( this, arguments );
  
      if ( ret === this ) {
        // Returned item is the API instance that was passed in, return it
        return this;
      }
      else if ( ret instanceof _Api ) {
        // New API instance returned, want the value from the first item
        // in the returned array for the singular result.
        return ret.length ?
          $.isArray( ret[0] ) ?
            new _Api( ret.context, ret[0] ) : // Array results are 'enhanced'
            ret[0] :
          undefined;
      }
  
      // Non-API return - just fire it back
      return ret;
    } );
  };
  
  
  /**
   * Selector for HTML tables. Apply the given selector to the give array of
   * DataTables settings objects.
   *
   * @param {string|integer} [selector] jQuery selector string or integer
   * @param  {array} Array of DataTables settings objects to be filtered
   * @return {array}
   * @ignore
   */
  var __table_selector = function ( selector, a )
  {
    // Integer is used to pick out a table by index
    if ( typeof selector === 'number' ) {
      return [ a[ selector ] ];
    }
  
    // Perform a jQuery selector on the table nodes
    var nodes = $.map( a, function (el, i) {
      return el.nTable;
    } );
  
    return $(nodes)
      .filter( selector )
      .map( function (i) {
        // Need to translate back from the table node to the settings
        var idx = $.inArray( this, nodes );
        return a[ idx ];
      } )
      .toArray();
  };
  
  
  
  /**
   * Context selector for the API's context (i.e. the tables the API instance
   * refers to.
   *
   * @name    DataTable.Api#tables
   * @param {string|integer} [selector] Selector to pick which tables the iterator
   *   should operate on. If not given, all tables in the current context are
   *   used. This can be given as a jQuery selector (for example `':gt(0)'`) to
   *   select multiple tables or as an integer to select a single table.
   * @returns {DataTable.Api} Returns a new API instance if a selector is given.
   */
  _api_register( 'tables()', function ( selector ) {
    // A new instance is created if there was a selector specified
    return selector ?
      new _Api( __table_selector( selector, this.context ) ) :
      this;
  } );
  
  
  _api_register( 'table()', function ( selector ) {
    var tables = this.tables( selector );
    var ctx = tables.context;
  
    // Truncate to the first matched table
    return ctx.length ?
      new _Api( ctx[0] ) :
      tables;
  } );
  
  
  _api_registerPlural( 'tables().nodes()', 'table().node()' , function () {
    return this.iterator( 'table', function ( ctx ) {
      return ctx.nTable;
    } );
  } );
  
  
  _api_registerPlural( 'tables().body()', 'table().body()' , function () {
    return this.iterator( 'table', function ( ctx ) {
      return ctx.nTBody;
    } );
  } );
  
  
  _api_registerPlural( 'tables().header()', 'table().header()' , function () {
    return this.iterator( 'table', function ( ctx ) {
      return ctx.nTHead;
    } );
  } );
  
  
  _api_registerPlural( 'tables().footer()', 'table().footer()' , function () {
    return this.iterator( 'table', function ( ctx ) {
      return ctx.nTFoot;
    } );
  } );
  
  
  
  /**
   * Redraw the tables in the current context.
   *
   * @param {boolean} [reset=true] Reset (default) or hold the current paging
   *   position. A full re-sort and re-filter is performed when this method is
   *   called, which is why the pagination reset is the default action.
   * @returns {DataTables.Api} this
   */
  _api_register( 'draw()', function ( resetPaging ) {
    return this.iterator( 'table', function ( settings ) {
      _fnReDraw( settings, resetPaging===false );
    } );
  } );
  
  
  
  /**
   * Get the current page index.
   *
   * @return {integer} Current page index (zero based)
   *//**
   * Set the current page.
   *
   * Note that if you attempt to show a page which does not exist, DataTables will
   * not throw an error, but rather reset the paging.
   *
   * @param {integer|string} action The paging action to take. This can be one of:
   *  * `integer` - The page index to jump to
   *  * `string` - An action to take:
   *    * `first` - Jump to first page.
   *    * `next` - Jump to the next page
   *    * `previous` - Jump to previous page
   *    * `last` - Jump to the last page.
   * @returns {DataTables.Api} this
   */
  _api_register( 'page()', function ( action ) {
    if ( action === undefined ) {
      return this.page.info().page; // not an expensive call
    }
  
    // else, have an action to take on all tables
    return this.iterator( 'table', function ( settings ) {
      _fnPageChange( settings, action );
    } );
  } );
  
  
  /**
   * Paging information for the first table in the current context.
   *
   * If you require paging information for another table, use the `table()` method
   * with a suitable selector.
   *
   * @return {object} Object with the following properties set:
   *  * `page` - Current page index (zero based - i.e. the first page is `0`)
   *  * `pages` - Total number of pages
   *  * `start` - Display index for the first record shown on the current page
   *  * `end` - Display index for the last record shown on the current page
   *  * `length` - Display length (number of records). Note that generally `start
   *    + length = end`, but this is not always true, for example if there are
   *    only 2 records to show on the final page, with a length of 10.
   *  * `recordsTotal` - Full data set length
   *  * `recordsDisplay` - Data set length once the current filtering criterion
   *    are applied.
   */
  _api_register( 'page.info()', function ( action ) {
    if ( this.context.length === 0 ) {
      return undefined;
    }
  
    var
      settings   = this.context[0],
      start      = settings._iDisplayStart,
      len        = settings._iDisplayLength,
      visRecords = settings.fnRecordsDisplay(),
      all        = len === -1;
  
    return {
      "page":           all ? 0 : Math.floor( start / len ),
      "pages":          all ? 1 : Math.ceil( visRecords / len ),
      "start":          start,
      "end":            settings.fnDisplayEnd(),
      "length":         len,
      "recordsTotal":   settings.fnRecordsTotal(),
      "recordsDisplay": visRecords
    };
  } );
  
  
  /**
   * Get the current page length.
   *
   * @return {integer} Current page length. Note `-1` indicates that all records
   *   are to be shown.
   *//**
   * Set the current page length.
   *
   * @param {integer} Page length to set. Use `-1` to show all records.
   * @returns {DataTables.Api} this
   */
  _api_register( 'page.len()', function ( len ) {
    // Note that we can't call this function 'length()' because `length`
    // is a Javascript property of functions which defines how many arguments
    // the function expects.
    if ( len === undefined ) {
      return this.context.length !== 0 ?
        this.context[0]._iDisplayLength :
        undefined;
    }
  
    // else, set the page length
    return this.iterator( 'table', function ( settings ) {
      _fnLengthChange( settings, len );
    } );
  } );
  
  
  
  var __reload = function ( settings, holdPosition, callback ) {
    if ( _fnDataSource( settings ) == 'ssp' ) {
      _fnReDraw( settings, holdPosition );
    }
    else {
      // Trigger xhr
      _fnProcessingDisplay( settings, true );
  
      _fnBuildAjax( settings, [], function( json ) {
        _fnClearTable( settings );
  
        var data = _fnAjaxDataSrc( settings, json );
        for ( var i=0, ien=data.length ; i<ien ; i++ ) {
          _fnAddData( settings, data[i] );
        }
  
        _fnReDraw( settings, holdPosition );
        _fnProcessingDisplay( settings, false );
      } );
    }
  
    // Use the draw event to trigger a callback, regardless of if it is an async
    // or sync draw
    if ( callback ) {
      var api = new _Api( settings );
  
      api.one( 'draw', function () {
        callback( api.ajax.json() );
      } );
    }
  };
  
  
  /**
   * Get the JSON response from the last Ajax request that DataTables made to the
   * server. Note that this returns the JSON from the first table in the current
   * context.
   *
   * @return {object} JSON received from the server.
   */
  _api_register( 'ajax.json()', function () {
    var ctx = this.context;
  
    if ( ctx.length > 0 ) {
      return ctx[0].json;
    }
  
    // else return undefined;
  } );
  
  
  /**
   * Get the data submitted in the last Ajax request
   */
  _api_register( 'ajax.params()', function () {
    var ctx = this.context;
  
    if ( ctx.length > 0 ) {
      return ctx[0].oAjaxData;
    }
  
    // else return undefined;
  } );
  
  
  /**
   * Reload tables from the Ajax data source. Note that this function will
   * automatically re-draw the table when the remote data has been loaded.
   *
   * @param {boolean} [reset=true] Reset (default) or hold the current paging
   *   position. A full re-sort and re-filter is performed when this method is
   *   called, which is why the pagination reset is the default action.
   * @returns {DataTables.Api} this
   */
  _api_register( 'ajax.reload()', function ( callback, resetPaging ) {
    return this.iterator( 'table', function (settings) {
      __reload( settings, resetPaging===false, callback );
    } );
  } );
  
  
  /**
   * Get the current Ajax URL. Note that this returns the URL from the first
   * table in the current context.
   *
   * @return {string} Current Ajax source URL
   *//**
   * Set the Ajax URL. Note that this will set the URL for all tables in the
   * current context.
   *
   * @param {string} url URL to set.
   * @returns {DataTables.Api} this
   */
  _api_register( 'ajax.url()', function ( url ) {
    var ctx = this.context;
  
    if ( url === undefined ) {
      // get
      if ( ctx.length === 0 ) {
        return undefined;
      }
      ctx = ctx[0];
  
      return ctx.ajax ?
        $.isPlainObject( ctx.ajax ) ?
          ctx.ajax.url :
          ctx.ajax :
        ctx.sAjaxSource;
    }
  
    // set
    return this.iterator( 'table', function ( settings ) {
      if ( $.isPlainObject( settings.ajax ) ) {
        settings.ajax.url = url;
      }
      else {
        settings.ajax = url;
      }
      // No need to consider sAjaxSource here since DataTables gives priority
      // to `ajax` over `sAjaxSource`. So setting `ajax` here, renders any
      // value of `sAjaxSource` redundant.
    } );
  } );
  
  
  /**
   * Load data from the newly set Ajax URL. Note that this method is only
   * available when `ajax.url()` is used to set a URL. Additionally, this method
   * has the same effect as calling `ajax.reload()` but is provided for
   * convenience when setting a new URL. Like `ajax.reload()` it will
   * automatically redraw the table once the remote data has been loaded.
   *
   * @returns {DataTables.Api} this
   */
  _api_register( 'ajax.url().load()', function ( callback, resetPaging ) {
    // Same as a reload, but makes sense to present it for easy access after a
    // url change
    return this.iterator( 'table', function ( ctx ) {
      __reload( ctx, resetPaging===false, callback );
    } );
  } );
  
  
  
  
  var _selector_run = function ( selector, select )
  {
    var
      out = [], res,
      a, i, ien, j, jen;
  
    // Can't just check for isArray here, as an API or jQuery instance might be
    // given with their array like look
    if ( ! selector || typeof selector === 'string' || selector.length === undefined ) {
      selector = [ selector ];
    }
  
    for ( i=0, ien=selector.length ; i<ien ; i++ ) {
      a = selector[i] && selector[i].split ?
        selector[i].split(',') :
        [ selector[i] ];
  
      for ( j=0, jen=a.length ; j<jen ; j++ ) {
        res = select( typeof a[j] === 'string' ? $.trim(a[j]) : a[j] );
  
        if ( res && res.length ) {
          out.push.apply( out, res );
        }
      }
    }
  
    return out;
  };
  
  
  var _selector_opts = function ( opts )
  {
    if ( ! opts ) {
      opts = {};
    }
  
    // Backwards compatibility for 1.9- which used the terminology filter rather
    // than search
    if ( opts.filter && ! opts.search ) {
      opts.search = opts.filter;
    }
  
    return {
      search: opts.search || 'none',
      order:  opts.order  || 'current',
      page:   opts.page   || 'all'
    };
  };
  
  
  var _selector_first = function ( inst )
  {
    // Reduce the API instance to the first item found
    for ( var i=0, ien=inst.length ; i<ien ; i++ ) {
      if ( inst[i].length > 0 ) {
        // Assign the first element to the first item in the instance
        // and truncate the instance and context
        inst[0] = inst[i];
        inst.length = 1;
        inst.context = [ inst.context[i] ];
  
        return inst;
      }
    }
  
    // Not found - return an empty instance
    inst.length = 0;
    return inst;
  };
  
  
  var _selector_row_indexes = function ( settings, opts )
  {
    var
      i, ien, tmp, a=[],
      displayFiltered = settings.aiDisplay,
      displayMaster = settings.aiDisplayMaster;
  
    var
      search = opts.search,  // none, applied, removed
      order  = opts.order,   // applied, current, index (original - compatibility with 1.9)
      page   = opts.page;    // all, current
  
    if ( _fnDataSource( settings ) == 'ssp' ) {
      // In server-side processing mode, most options are irrelevant since
      // rows not shown don't exist and the index order is the applied order
      // Removed is a special case - for consistency just return an empty
      // array
      return search === 'removed' ?
        [] :
        _range( 0, displayMaster.length );
    }
    else if ( page == 'current' ) {
      // Current page implies that order=current and fitler=applied, since it is
      // fairly senseless otherwise, regardless of what order and search actually
      // are
      for ( i=settings._iDisplayStart, ien=settings.fnDisplayEnd() ; i<ien ; i++ ) {
        a.push( displayFiltered[i] );
      }
    }
    else if ( order == 'current' || order == 'applied' ) {
      a = search == 'none' ?
        displayMaster.slice() :                      // no search
        search == 'applied' ?
          displayFiltered.slice() :                // applied search
          $.map( displayMaster, function (el, i) { // removed search
            return $.inArray( el, displayFiltered ) === -1 ? el : null;
          } );
    }
    else if ( order == 'index' || order == 'original' ) {
      for ( i=0, ien=settings.aoData.length ; i<ien ; i++ ) {
        if ( search == 'none' ) {
          a.push( i );
        }
        else { // applied | removed
          tmp = $.inArray( i, displayFiltered );
  
          if ((tmp === -1 && search == 'removed') ||
            (tmp === 1  && search == 'applied') )
          {
            a.push( i );
          }
        }
      }
    }
  
    return a;
  };
  
  
  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   * Rows
   *
   * {}          - no selector - use all available rows
   * {integer}   - row aoData index
   * {node}      - TR node
   * {string}    - jQuery selector to apply to the TR elements
   * {array}     - jQuery array of nodes, or simply an array of TR nodes
   *
   */
  
  
  var __row_selector = function ( settings, selector, opts )
  {
    return _selector_run( selector, function ( sel ) {
      var selInt = _intVal( sel );
  
      // Short cut - selector is a number and no options provided (default is
      // all records, so no need to check if the index is in there, since it
      // must be - dev error if the index doesn't exist).
      if ( selInt !== null && ! opts ) {
        return [ selInt ];
      }
  
      var rows = _selector_row_indexes( settings, opts );
  
      if ( selInt !== null && $.inArray( selInt, rows ) !== -1 ) {
        // Selector - integer
        return [ selInt ];
      }
      else if ( ! sel ) {
        // Selector - none
        return rows;
      }
  
      // Get nodes in the order from the `rows` array (can't use `pluck`) @todo - use pluck_order
      var nodes = [];
      for ( var i=0, ien=rows.length ; i<ien ; i++ ) {
        nodes.push( settings.aoData[ rows[i] ].nTr );
      }
  
      if ( sel.nodeName ) {
        // Selector - node
        if ( $.inArray( sel, nodes ) !== -1 ) {
          return [ sel._DT_RowIndex ];// sel is a TR node that is in the table
                      // and DataTables adds a prop for fast lookup
        }
      }
  
      // Selector - jQuery selector string, array of nodes or jQuery object/
      // As jQuery's .filter() allows jQuery objects to be passed in filter,
      // it also allows arrays, so this will cope with all three options
      return $(nodes)
        .filter( sel )
        .map( function () {
          return this._DT_RowIndex;
        } )
        .toArray();
    } );
  };
  
  
  /**
   *
   */
  _api_register( 'rows()', function ( selector, opts ) {
    // argument shifting
    if ( selector === undefined ) {
      selector = '';
    }
    else if ( $.isPlainObject( selector ) ) {
      opts = selector;
      selector = '';
    }
  
    opts = _selector_opts( opts );
  
    var inst = this.iterator( 'table', function ( settings ) {
      return __row_selector( settings, selector, opts );
    } );
  
    // Want argument shifting here and in __row_selector?
    inst.selector.rows = selector;
    inst.selector.opts = opts;
  
    return inst;
  } );
  
  
  _api_register( 'rows().nodes()', function () {
    return this.iterator( 'row', function ( settings, row ) {
      return settings.aoData[ row ].nTr || undefined;
    } );
  } );
  
  _api_register( 'rows().data()', function () {
    return this.iterator( true, 'rows', function ( settings, rows ) {
      return _pluck_order( settings.aoData, rows, '_aData' );
    } );
  } );
  
  _api_registerPlural( 'rows().cache()', 'row().cache()', function ( type ) {
    return this.iterator( 'row', function ( settings, row ) {
      var r = settings.aoData[ row ];
      return type === 'search' ? r._aFilterData : r._aSortData;
    } );
  } );
  
  _api_registerPlural( 'rows().invalidate()', 'row().invalidate()', function ( src ) {
    return this.iterator( 'row', function ( settings, row ) {
      _fnInvalidateRow( settings, row, src );
    } );
  } );
  
  _api_registerPlural( 'rows().indexes()', 'row().index()', function () {
    return this.iterator( 'row', function ( settings, row ) {
      return row;
    } );
  } );
  
  _api_registerPlural( 'rows().remove()', 'row().remove()', function () {
    var that = this;
  
    return this.iterator( 'row', function ( settings, row, thatIdx ) {
      var data = settings.aoData;
  
      data.splice( row, 1 );
  
      // Update the _DT_RowIndex parameter on all rows in the table
      for ( var i=0, ien=data.length ; i<ien ; i++ ) {
        if ( data[i].nTr !== null ) {
          data[i].nTr._DT_RowIndex = i;
        }
      }
  
      // Remove the target row from the search array
      var displayIndex = $.inArray( row, settings.aiDisplay );
  
      // Delete from the display arrays
      _fnDeleteIndex( settings.aiDisplayMaster, row );
      _fnDeleteIndex( settings.aiDisplay, row );
      _fnDeleteIndex( that[ thatIdx ], row, false ); // maintain local indexes
  
      // Check for an 'overflow' they case for displaying the table
      _fnLengthOverflow( settings );
    } );
  } );
  
  
  _api_register( 'rows.add()', function ( rows ) {
    var newRows = this.iterator( 'table', function ( settings ) {
        var row, i, ien;
        var out = [];
  
        for ( i=0, ien=rows.length ; i<ien ; i++ ) {
          row = rows[i];
  
          if ( row.nodeName && row.nodeName.toUpperCase() === 'TR' ) {
            out.push( _fnAddTr( settings, row )[0] );
          }
          else {
            out.push( _fnAddData( settings, row ) );
          }
        }
  
        return out;
      } );
  
    // Return an Api.rows() extended instance, so rows().nodes() etc can be used
    var modRows = this.rows( -1 );
    modRows.pop();
    modRows.push.apply( modRows, newRows.toArray() );
  
    return modRows;
  } );
  
  
  
  
  
  /**
   *
   */
  _api_register( 'row()', function ( selector, opts ) {
    return _selector_first( this.rows( selector, opts ) );
  } );
  
  
  _api_register( 'row().data()', function ( data ) {
    var ctx = this.context;
  
    if ( data === undefined ) {
      // Get
      return ctx.length && this.length ?
        ctx[0].aoData[ this[0] ]._aData :
        undefined;
    }
  
    // Set
    ctx[0].aoData[ this[0] ]._aData = data;
  
    // Automatically invalidate
    _fnInvalidateRow( ctx[0], this[0], 'data' );
  
    return this;
  } );
  
  
  _api_register( 'row().node()', function () {
    var ctx = this.context;
  
    return ctx.length && this.length ?
      ctx[0].aoData[ this[0] ].nTr || null :
      null;
  } );
  
  
  _api_register( 'row.add()', function ( row ) {
    // Allow a jQuery object to be passed in - only a single row is added from
    // it though - the first element in the set
    if ( row instanceof $ && row.length ) {
      row = row[0];
    }
  
    var rows = this.iterator( 'table', function ( settings ) {
      if ( row.nodeName && row.nodeName.toUpperCase() === 'TR' ) {
        return _fnAddTr( settings, row )[0];
      }
      return _fnAddData( settings, row );
    } );
  
    // Return an Api.rows() extended instance, with the newly added row selected
    return this.row( rows[0] );
  } );
  
  
  
  var __details_add = function ( ctx, row, data, klass )
  {
    // Convert to array of TR elements
    var rows = [];
    var addRow = function ( r, k ) {
      // If we get a TR element, then just add it directly - up to the dev
      // to add the correct number of columns etc
      if ( r.nodeName && r.nodeName.toLowerCase() === 'tr' ) {
        rows.push( r );
      }
      else {
        // Otherwise create a row with a wrapper
        var created = $('<tr><td/></tr>');
        $('td', created)
          .addClass( k )
          .html( r )
          [0].colSpan = _fnVisbleColumns( ctx );
  
        rows.push( created[0] );
      }
    };
  
    if ( $.isArray( data ) || data instanceof $ ) {
      for ( var i=0, ien=data.length ; i<ien ; i++ ) {
        addRow( data[i], klass );
      }
    }
    else {
      addRow( data, klass );
    }
  
    if ( row._details ) {
      row._details.remove();
    }
  
    row._details = $(rows);
  
    // If the children were already shown, that state should be retained
    if ( row._detailsShow ) {
      row._details.insertAfter( row.nTr );
    }
  };
  
  
  var __details_display = function ( show ) {
    var ctx = this.context;
  
    if ( ctx.length && this.length ) {
      var row = ctx[0].aoData[ this[0] ];
  
      if ( row._details ) {
        row._detailsShow = show;
        if ( show ) {
          row._details.insertAfter( row.nTr );
        }
        else {
          row._details.remove();
        }
  
        __details_events( ctx[0] );
      }
    }
  
    return this;
  };
  
  
  var __details_events = function ( settings )
  {
    var api = new _Api( settings );
    var namespace = '.dt.DT_details';
    var drawEvent = 'draw'+namespace;
    var colvisEvent = 'column-visibility'+namespace;
  
    api.off( drawEvent +' '+ colvisEvent );
  
    if ( _pluck( settings.aoData, '_details' ).length > 0 ) {
      // On each draw, insert the required elements into the document
      api.on( drawEvent, function () {
        api.rows( {page:'current'} ).eq(0).each( function (idx) {
          // Internal data grab
          var row = settings.aoData[ idx ];
  
          if ( row._detailsShow ) {
            row._details.insertAfter( row.nTr );
          }
        } );
      } );
  
      // Column visibility change - update the colspan
      api.on( colvisEvent, function ( e, settings, idx, vis ) {
        // Update the colspan for the details rows (note, only if it already has
        // a colspan)
        var row, visible = _fnVisbleColumns( settings );
  
        for ( var i=0, ien=settings.aoData.length ; i<ien ; i++ ) {
          row = settings.aoData[i];
  
          if ( row._details ) {
            row._details.children('td[colspan]').attr('colspan', visible );
          }
        }
      } );
    }
  };
  
  // data can be:
  //  tr
  //  string
  //  jQuery or array of any of the above
  _api_register( 'row().child()', function ( data, klass ) {
    var ctx = this.context;
  
    if ( data === undefined ) {
      // get
      return ctx.length && this.length ?
        ctx[0].aoData[ this[0] ]._details :
        undefined;
    }
    else if ( ctx.length && this.length ) {
      // set
      __details_add( ctx[0], ctx[0].aoData[ this[0] ], data, klass );
    }
  
    return this;
  } );
  
  _api_register( [
    'row().child.show()',
    'row().child().show()'
  ], function () {
    __details_display.call( this, true );
    return this;
  } );
  
  _api_register( [
    'row().child.hide()',
    'row().child().hide()'
  ], function () {
    __details_display.call( this, false );
    return this;
  } );
  
  _api_register( 'row().child.isShown()', function () {
    var ctx = this.context;
  
    if ( ctx.length && this.length ) {
      // _detailsShown as false or undefined will fall through to return false
      return ctx[0].aoData[ this[0] ]._detailsShow || false;
    }
    return false;
  } );
  
  
  
  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   * Columns
   *
   * {integer}           - column index (>=0 count from left, <0 count from right)
   * "{integer}:visIdx"  - visible column index (i.e. translate to column index)  (>=0 count from left, <0 count from right)
   * "{integer}:visible" - alias for {integer}:visIdx  (>=0 count from left, <0 count from right)
   * "{string}:name"     - column name
   * "{string}"          - jQuery selector on column header nodes
   *
   */
  
  // can be an array of these items, comma separated list, or an array of comma
  // separated lists
  
  var __re_column_selector = /^(.*):(name|visIdx|visible)$/;
  
  var __column_selector = function ( settings, selector, opts )
  {
    var
      columns = settings.aoColumns,
      names = _pluck( columns, 'sName' ),
      nodes = _pluck( columns, 'nTh' );
  
    return _selector_run( selector, function ( s ) {
      var selInt = _intVal( s );
  
      if ( s === '' ) {
        // All columns
        return _range( columns.length );
      }
      else if ( selInt !== null ) {
        // Integer selector
        return [ selInt >= 0 ?
          selInt : // Count from left
          columns.length + selInt // Count from right (+ because its a negative value)
        ];
      }
      else {
        var match = typeof s === 'string' ?
          s.match( __re_column_selector ) :
          '';
  
        if ( match ) {
          switch( match[2] ) {
            case 'visIdx':
            case 'visible':
              var idx = parseInt( match[1], 10 );
              // Visible index given, convert to column index
              if ( idx < 0 ) {
                // Counting from the right
                var visColumns = $.map( columns, function (col,i) {
                  return col.bVisible ? i : null;
                } );
                return [ visColumns[ visColumns.length + idx ] ];
              }
              // Counting from the left
              return [ _fnVisibleToColumnIndex( settings, idx ) ];
  
            case 'name':
              // match by name. `names` is column index complete and in order
              return $.map( names, function (name, i) {
                return name === match[1] ? i : null;
              } );
          }
        }
        else {
          // jQuery selector on the TH elements for the columns
          return $( nodes )
            .filter( s )
            .map( function () {
              return $.inArray( this, nodes ); // `nodes` is column index complete and in order
            } )
            .toArray();
        }
      }
    } );
  };
  
  
  
  
  
  var __setColumnVis = function ( settings, column, vis ) {
    var
      cols = settings.aoColumns,
      col  = cols[ column ],
      data = settings.aoData,
      row, cells, i, ien, tr;
  
    // Get
    if ( vis === undefined ) {
      return col.bVisible;
    }
  
    // Set
    // No change
    if ( col.bVisible === vis ) {
      return;
    }
  
    if ( vis ) {
      // Insert column
      // Need to decide if we should use appendChild or insertBefore
      var insertBefore = $.inArray( true, _pluck(cols, 'bVisible'), column+1 );
  
      for ( i=0, ien=data.length ; i<ien ; i++ ) {
        tr = data[i].nTr;
        cells = data[i].anCells;
  
        if ( tr ) {
          // insertBefore can act like appendChild if 2nd arg is null
          tr.insertBefore( cells[ column ], cells[ insertBefore ] || null );
        }
      }
    }
    else {
      // Remove column
      $( _pluck( settings.aoData, 'anCells', column ) ).detach();
  
      col.bVisible = false;
      _fnDrawHead( settings, settings.aoHeader );
      _fnDrawHead( settings, settings.aoFooter );
  
      _fnSaveState( settings );
    }
  
    // Common actions
    col.bVisible = vis;
    _fnDrawHead( settings, settings.aoHeader );
    _fnDrawHead( settings, settings.aoFooter );
  
    // Automatically adjust column sizing
    _fnAdjustColumnSizing( settings );
  
    // Realign columns for scrolling
    if ( settings.oScroll.sX || settings.oScroll.sY ) {
      _fnScrollDraw( settings );
    }
  
    _fnCallbackFire( settings, null, 'column-visibility', [settings, column, vis] );
  
    _fnSaveState( settings );
  };
  
  
  /**
   *
   */
  _api_register( 'columns()', function ( selector, opts ) {
    // argument shifting
    if ( selector === undefined ) {
      selector = '';
    }
    else if ( $.isPlainObject( selector ) ) {
      opts = selector;
      selector = '';
    }
  
    opts = _selector_opts( opts );
  
    var inst = this.iterator( 'table', function ( settings ) {
      return __column_selector( settings, selector, opts );
    } );
  
    // Want argument shifting here and in _row_selector?
    inst.selector.cols = selector;
    inst.selector.opts = opts;
  
    return inst;
  } );
  
  
  /**
   *
   */
  _api_registerPlural( 'columns().header()', 'column().header()', function ( selector, opts ) {
    return this.iterator( 'column', function ( settings, column ) {
      return settings.aoColumns[column].nTh;
    } );
  } );
  
  
  /**
   *
   */
  _api_registerPlural( 'columns().footer()', 'column().footer()', function ( selector, opts ) {
    return this.iterator( 'column', function ( settings, column ) {
      return settings.aoColumns[column].nTf;
    } );
  } );
  
  
  /**
   *
   */
  _api_registerPlural( 'columns().data()', 'column().data()', function () {
    return this.iterator( 'column-rows', function ( settings, column, i, j, rows ) {
      var a = [];
      for ( var row=0, ien=rows.length ; row<ien ; row++ ) {
        a.push( _fnGetCellData( settings, rows[row], column, '' ) );
      }
      return a;
    } );
  } );
  
  
  _api_registerPlural( 'columns().cache()', 'column().cache()', function ( type ) {
    return this.iterator( 'column-rows', function ( settings, column, i, j, rows ) {
      return _pluck_order( settings.aoData, rows,
        type === 'search' ? '_aFilterData' : '_aSortData', column
      );
    } );
  } );
  
  
  _api_registerPlural( 'columns().nodes()', 'column().nodes()', function () {
    return this.iterator( 'column-rows', function ( settings, column, i, j, rows ) {
      return _pluck_order( settings.aoData, rows, 'anCells', column ) ;
    } );
  } );
  
  
  
  _api_registerPlural( 'columns().visible()', 'column().visible()', function ( vis ) {
    return this.iterator( 'column', function ( settings, column ) {
      return vis === undefined ?
        settings.aoColumns[ column ].bVisible :
        __setColumnVis( settings, column, vis );
    } );
  } );
  
  
  
  _api_registerPlural( 'columns().indexes()', 'column().index()', function ( type ) {
    return this.iterator( 'column', function ( settings, column ) {
      return type === 'visible' ?
        _fnColumnIndexToVisible( settings, column ) :
        column;
    } );
  } );
  
  
  // _api_register( 'columns().show()', function () {
  //  var selector = this.selector;
  //  return this.columns( selector.cols, selector.opts ).visible( true );
  // } );
  
  
  // _api_register( 'columns().hide()', function () {
  //  var selector = this.selector;
  //  return this.columns( selector.cols, selector.opts ).visible( false );
  // } );
  
  
  
  _api_register( 'columns.adjust()', function () {
    return this.iterator( 'table', function ( settings ) {
      _fnAdjustColumnSizing( settings );
    } );
  } );
  
  
  // Convert from one column index type, to another type
  _api_register( 'column.index()', function ( type, idx ) {
    if ( this.context.length !== 0 ) {
      var ctx = this.context[0];
  
      if ( type === 'fromVisible' || type === 'toData' ) {
        return _fnVisibleToColumnIndex( ctx, idx );
      }
      else if ( type === 'fromData' || type === 'toVisible' ) {
        return _fnColumnIndexToVisible( ctx, idx );
      }
    }
  } );
  
  
  _api_register( 'column()', function ( selector, opts ) {
    return _selector_first( this.columns( selector, opts ) );
  } );
  
  
  
  
  var __cell_selector = function ( settings, selector, opts )
  {
    var data = settings.aoData;
    var rows = _selector_row_indexes( settings, opts );
    var cells = _pluck_order( data, rows, 'anCells' );
    var allCells = $( [].concat.apply([], cells) );
    var row;
    var columns = settings.aoColumns.length;
    var a, i, ien, j;
  
    return _selector_run( selector, function ( s ) {
      if ( ! s ) {
        // All cells
        a = [];
  
        for ( i=0, ien=rows.length ; i<ien ; i++ ) {
          row = rows[i];
  
          for ( j=0 ; j<columns ; j++ ) {
            a.push( {
              row: row,
              column: j
            } );
          }
        }
  
        return a;
      }
      else if ( $.isPlainObject( s ) ) {
        return [s];
      }
  
      // jQuery filtered cells
      return allCells
        .filter( s )
        .map( function (i, el) {
          row = el.parentNode._DT_RowIndex;
  
          return {
            row: row,
            column: $.inArray( el, data[ row ].anCells )
          };
        } )
        .toArray();
    } );
  };
  
  
  
  
  _api_register( 'cells()', function ( rowSelector, columnSelector, opts ) {
    // Argument shifting
    if ( $.isPlainObject( rowSelector ) ) {
      // If passing in a cell index
      if ( rowSelector.row ) {
        opts = columnSelector;
        columnSelector = null;
      }
      else {
        opts = rowSelector;
        rowSelector = null;
      }
    }
    if ( $.isPlainObject( columnSelector ) ) {
      opts = columnSelector;
      columnSelector = null;
    }
  
    // Cell selector
    if ( columnSelector === null || columnSelector === undefined ) {
      return this.iterator( 'table', function ( settings ) {
        return __cell_selector( settings, rowSelector, _selector_opts( opts ) );
      } );
    }
  
    // Row + column selector
    var columns = this.columns( columnSelector, opts );
    var rows = this.rows( rowSelector, opts );
    var a, i, ien, j, jen;
  
    var cells = this.iterator( 'table', function ( settings, idx ) {
      a = [];
  
      for ( i=0, ien=rows[idx].length ; i<ien ; i++ ) {
        for ( j=0, jen=columns[idx].length ; j<jen ; j++ ) {
          a.push( {
            row:    rows[idx][i],
            column: columns[idx][j]
          } );
        }
      }
  
      return a;
    } );
  
    $.extend( cells.selector, {
      cols: columnSelector,
      rows: rowSelector,
      opts: opts
    } );
  
    return cells;
  } );
  
  
  _api_registerPlural( 'cells().nodes()', 'cell().node()', function () {
    return this.iterator( 'cell', function ( settings, row, column ) {
      return settings.aoData[ row ].anCells[ column ];
    } );
  } );
  
  
  _api_register( 'cells().data()', function () {
    return this.iterator( 'cell', function ( settings, row, column ) {
      return _fnGetCellData( settings, row, column );
    } );
  } );
  
  
  _api_registerPlural( 'cells().cache()', 'cell().cache()', function ( type ) {
    type = type === 'search' ? '_aFilterData' : '_aSortData';
  
    return this.iterator( 'cell', function ( settings, row, column ) {
      return settings.aoData[ row ][ type ][ column ];
    } );
  } );
  
  
  _api_registerPlural( 'cells().indexes()', 'cell().index()', function () {
    return this.iterator( 'cell', function ( settings, row, column ) {
      return {
        row: row,
        column: column,
        columnVisible: _fnColumnIndexToVisible( settings, column )
      };
    } );
  } );
  
  
  _api_register( [
    'cells().invalidate()',
    'cell().invalidate()'
  ], function ( src ) {
    var selector = this.selector;
  
    // Use the rows method of the instance to perform the invalidation, rather
    // than doing it here. This avoids needing to handle duplicate rows from
    // the cells.
    this.rows( selector.rows, selector.opts ).invalidate( src );
  
    return this;
  } );
  
  
  
  
  _api_register( 'cell()', function ( rowSelector, columnSelector, opts ) {
    return _selector_first( this.cells( rowSelector, columnSelector, opts ) );
  } );
  
  
  
  _api_register( 'cell().data()', function ( data ) {
    var ctx = this.context;
    var cell = this[0];
  
    if ( data === undefined ) {
      // Get
      return ctx.length && cell.length ?
        _fnGetCellData( ctx[0], cell[0].row, cell[0].column ) :
        undefined;
    }
  
    // Set
    _fnSetCellData( ctx[0], cell[0].row, cell[0].column, data );
    _fnInvalidateRow( ctx[0], cell[0].row, 'data', cell[0].column );
  
    return this;
  } );
  
  
  
  /**
   * Get current ordering (sorting) that has been applied to the table.
   *
   * @returns {array} 2D array containing the sorting information for the first
   *   table in the current context. Each element in the parent array represents
   *   a column being sorted upon (i.e. multi-sorting with two columns would have
   *   2 inner arrays). The inner arrays may have 2 or 3 elements. The first is
   *   the column index that the sorting condition applies to, the second is the
   *   direction of the sort (`desc` or `asc`) and, optionally, the third is the
   *   index of the sorting order from the `column.sorting` initialisation array.
   *//**
   * Set the ordering for the table.
   *
   * @param {integer} order Column index to sort upon.
   * @param {string} direction Direction of the sort to be applied (`asc` or `desc`)
   * @returns {DataTables.Api} this
   *//**
   * Set the ordering for the table.
   *
   * @param {array} order 1D array of sorting information to be applied.
   * @param {array} [...] Optional additional sorting conditions
   * @returns {DataTables.Api} this
   *//**
   * Set the ordering for the table.
   *
   * @param {array} order 2D array of sorting information to be applied.
   * @returns {DataTables.Api} this
   */
  _api_register( 'order()', function ( order, dir ) {
    var ctx = this.context;
  
    if ( order === undefined ) {
      // get
      return ctx.length !== 0 ?
        ctx[0].aaSorting :
        undefined;
    }
  
    // set
    if ( typeof order === 'number' ) {
      // Simple column / direction passed in
      order = [ [ order, dir ] ];
    }
    else if ( ! $.isArray( order[0] ) ) {
      // Arguments passed in (list of 1D arrays)
      order = Array.prototype.slice.call( arguments );
    }
    // otherwise a 2D array was passed in
  
    return this.iterator( 'table', function ( settings ) {
      settings.aaSorting = order.slice();
    } );
  } );
  
  
  /**
   * Attach a sort listener to an element for a given column
   *
   * @param {node|jQuery|string} node Identifier for the element(s) to attach the
   *   listener to. This can take the form of a single DOM node, a jQuery
   *   collection of nodes or a jQuery selector which will identify the node(s).
   * @param {integer} column the column that a click on this node will sort on
   * @param {function} [callback] callback function when sort is run
   * @returns {DataTables.Api} this
   */
  _api_register( 'order.listener()', function ( node, column, callback ) {
    return this.iterator( 'table', function ( settings ) {
      _fnSortAttachListener( settings, node, column, callback );
    } );
  } );
  
  
  // Order by the selected column(s)
  _api_register( [
    'columns().order()',
    'column().order()'
  ], function ( dir ) {
    var that = this;
  
    return this.iterator( 'table', function ( settings, i ) {
      var sort = [];
  
      $.each( that[i], function (j, col) {
        sort.push( [ col, dir ] );
      } );
  
      settings.aaSorting = sort;
    } );
  } );
  
  
  
  _api_register( 'search()', function ( input, regex, smart, caseInsen ) {
    var ctx = this.context;
  
    if ( input === undefined ) {
      // get
      return ctx.length !== 0 ?
        ctx[0].oPreviousSearch.sSearch :
        undefined;
    }
  
    // set
    return this.iterator( 'table', function ( settings ) {
      if ( ! settings.oFeatures.bFilter ) {
        return;
      }
  
      _fnFilterComplete( settings, $.extend( {}, settings.oPreviousSearch, {
        "sSearch": input+"",
        "bRegex":  regex === null ? false : regex,
        "bSmart":  smart === null ? true  : smart,
        "bCaseInsensitive": caseInsen === null ? true : caseInsen
      } ), 1 );
    } );
  } );
  
  
  _api_register( [
    'columns().search()',
    'column().search()'
  ], function ( input, regex, smart, caseInsen ) {
    return this.iterator( 'column', function ( settings, column ) {
      var preSearch = settings.aoPreSearchCols;
  
      if ( input === undefined ) {
        // get
        return preSearch[ column ].sSearch;
      }
  
      // set
      if ( ! settings.oFeatures.bFilter ) {
        return;
      }
  
      $.extend( preSearch[ column ], {
        "sSearch": input+"",
        "bRegex":  regex === null ? false : regex,
        "bSmart":  smart === null ? true  : smart,
        "bCaseInsensitive": caseInsen === null ? true : caseInsen
      } );
  
      _fnFilterComplete( settings, settings.oPreviousSearch, 1 );
    } );
  } );
  
  
  
  /**
   * Provide a common method for plug-ins to check the version of DataTables being
   * used, in order to ensure compatibility.
   *
   *  @param {string} version Version string to check for, in the format "X.Y.Z".
   *    Note that the formats "X" and "X.Y" are also acceptable.
   *  @returns {boolean} true if this version of DataTables is greater or equal to
   *    the required version, or false if this version of DataTales is not
   *    suitable
   *  @static
   *  @dtopt API-Static
   *
   *  @example
   *    alert( $.fn.dataTable.versionCheck( '1.9.0' ) );
   */
  DataTable.versionCheck = DataTable.fnVersionCheck = function( version )
  {
    var aThis = DataTable.version.split('.');
    var aThat = version.split('.');
    var iThis, iThat;
  
    for ( var i=0, iLen=aThat.length ; i<iLen ; i++ ) {
      iThis = parseInt( aThis[i], 10 ) || 0;
      iThat = parseInt( aThat[i], 10 ) || 0;
  
      // Parts are the same, keep comparing
      if (iThis === iThat) {
        continue;
      }
  
      // Parts are different, return immediately
      return iThis > iThat;
    }
  
    return true;
  };
  
  
  /**
   * Check if a `<table>` node is a DataTable table already or not.
   *
   *  @param {node|jquery|string} table Table node, jQuery object or jQuery
   *      selector for the table to test. Note that if more than more than one
   *      table is passed on, only the first will be checked
   *  @returns {boolean} true the table given is a DataTable, or false otherwise
   *  @static
   *  @dtopt API-Static
   *
   *  @example
   *    if ( ! $.fn.DataTable.isDataTable( '#example' ) ) {
   *      $('#example').dataTable();
   *    }
   */
  DataTable.isDataTable = DataTable.fnIsDataTable = function ( table )
  {
    var t = $(table).get(0);
    var is = false;
  
    $.each( DataTable.settings, function (i, o) {
      if ( o.nTable === t || o.nScrollHead === t || o.nScrollFoot === t ) {
        is = true;
      }
    } );
  
    return is;
  };
  
  
  /**
   * Get all DataTable tables that have been initialised - optionally you can
   * select to get only currently visible tables.
   *
   *  @param {boolean} [visible=false] Flag to indicate if you want all (default)
   *    or visible tables only.
   *  @returns {array} Array of `table` nodes (not DataTable instances) which are
   *    DataTables
   *  @static
   *  @dtopt API-Static
   *
   *  @example
   *    $.each( $.fn.dataTable.tables(true), function () {
   *      $(table).DataTable().columns.adjust();
   *    } );
   */
  DataTable.tables = DataTable.fnTables = function ( visible )
  {
    return jQuery.map( DataTable.settings, function (o) {
      if ( !visible || (visible && $(o.nTable).is(':visible')) ) {
        return o.nTable;
      }
    } );
  };
  
  
  /**
   * Convert from camel case parameters to Hungarian notation. This is made public
   * for the extensions to provide the same ability as DataTables core to accept
   * either the 1.9 style Hungarian notation, or the 1.10+ style camelCase
   * parameters.
   *
   *  @param {object} src The model object which holds all parameters that can be
   *    mapped.
   *  @param {object} user The object to convert from camel case to Hungarian.
   *  @param {boolean} force When set to `true`, properties which already have a
   *    Hungarian value in the `user` object will be overwritten. Otherwise they
   *    won't be.
   */
  DataTable.camelToHungarian = _fnCamelToHungarian;
  
  
  
  /**
   *
   */
  _api_register( '$()', function ( selector, opts ) {
    var
      rows   = this.rows( opts ).nodes(), // Get all rows
      jqRows = $(rows);
  
    return $( [].concat(
      jqRows.filter( selector ).toArray(),
      jqRows.find( selector ).toArray()
    ) );
  } );
  
  
  // jQuery functions to operate on the tables
  $.each( [ 'on', 'one', 'off' ], function (i, key) {
    _api_register( key+'()', function ( /* event, handler */ ) {
      var args = Array.prototype.slice.call(arguments);
  
      // Add the `dt` namespace automatically if it isn't already present
      if ( args[0].indexOf( '.dt' ) === -1 ) {
        args[0] += '.dt';
      }
  
      var inst = $( this.tables().nodes() );
      inst[key].apply( inst, args );
      return this;
    } );
  } );
  
  
  _api_register( 'clear()', function () {
    return this.iterator( 'table', function ( settings ) {
      _fnClearTable( settings );
    } );
  } );
  
  
  _api_register( 'settings()', function () {
    return new _Api( this.context, this.context );
  } );
  
  
  _api_register( 'data()', function () {
    return this.iterator( 'table', function ( settings ) {
      return _pluck( settings.aoData, '_aData' );
    } ).flatten();
  } );
  
  
  _api_register( 'destroy()', function ( remove ) {
    remove = remove || false;
  
    return this.iterator( 'table', function ( settings ) {
      var orig      = settings.nTableWrapper.parentNode;
      var classes   = settings.oClasses;
      var table     = settings.nTable;
      var tbody     = settings.nTBody;
      var thead     = settings.nTHead;
      var tfoot     = settings.nTFoot;
      var jqTable   = $(table);
      var jqTbody   = $(tbody);
      var jqWrapper = $(settings.nTableWrapper);
      var rows      = $.map( settings.aoData, function (r) { return r.nTr; } );
      var i, ien;
  
      // Flag to note that the table is currently being destroyed - no action
      // should be taken
      settings.bDestroying = true;
  
      // Fire off the destroy callbacks for plug-ins etc
      _fnCallbackFire( settings, "aoDestroyCallback", "destroy", [settings] );
  
      // If not being removed from the document, make all columns visible
      if ( ! remove ) {
        new _Api( settings ).columns().visible( true );
      }
  
      // Blitz all `DT` namespaced events (these are internal events, the
      // lowercase, `dt` events are user subscribed and they are responsible
      // for removing them
      jqWrapper.unbind('.DT').find(':not(tbody *)').unbind('.DT');
      $(window).unbind('.DT-'+settings.sInstance);
  
      // When scrolling we had to break the table up - restore it
      if ( table != thead.parentNode ) {
        jqTable.children('thead').detach();
        jqTable.append( thead );
      }
  
      if ( tfoot && table != tfoot.parentNode ) {
        jqTable.children('tfoot').detach();
        jqTable.append( tfoot );
      }
  
      // Remove the DataTables generated nodes, events and classes
      jqTable.detach();
      jqWrapper.detach();
  
      settings.aaSorting = [];
      settings.aaSortingFixed = [];
      _fnSortingClasses( settings );
  
      $( rows ).removeClass( settings.asStripeClasses.join(' ') );
  
      $('th, td', thead).removeClass( classes.sSortable+' '+
        classes.sSortableAsc+' '+classes.sSortableDesc+' '+classes.sSortableNone
      );
  
      if ( settings.bJUI ) {
        $('th span.'+classes.sSortIcon+ ', td span.'+classes.sSortIcon, thead).detach();
        $('th, td', thead).each( function () {
          var wrapper = $('div.'+classes.sSortJUIWrapper, this);
          $(this).append( wrapper.contents() );
          wrapper.detach();
        } );
      }
  
      if ( ! remove && orig ) {
        // insertBefore acts like appendChild if !arg[1]
        orig.insertBefore( table, settings.nTableReinsertBefore );
      }
  
      // Add the TR elements back into the table in their original order
      jqTbody.children().detach();
      jqTbody.append( rows );
  
      // Restore the width of the original table - was read from the style property,
      // so we can restore directly to that
      jqTable
        .css( 'width', settings.sDestroyWidth )
        .removeClass( classes.sTable );
  
      // If the were originally stripe classes - then we add them back here.
      // Note this is not fool proof (for example if not all rows had stripe
      // classes - but it's a good effort without getting carried away
      ien = settings.asDestroyStripes.length;
  
      if ( ien ) {
        jqTbody.children().each( function (i) {
          $(this).addClass( settings.asDestroyStripes[i % ien] );
        } );
      }
  
      /* Remove the settings object from the settings array */
      var idx = $.inArray( settings, DataTable.settings );
      if ( idx !== -1 ) {
        DataTable.settings.splice( idx, 1 );
      }
    } );
  } );
  

  /**
   * Version string for plug-ins to check compatibility. Allowed format is
   * `a.b.c-d` where: a:int, b:int, c:int, d:string(dev|beta|alpha). `d` is used
   * only for non-release builds. See http://semver.org/ for more information.
   *  @member
   *  @type string
   *  @default Version number
   */
  DataTable.version = "1.10.0";

  /**
   * Private data store, containing all of the settings objects that are
   * created for the tables on a given page.
   *
   * Note that the `DataTable.settings` object is aliased to
   * `jQuery.fn.dataTableExt` through which it may be accessed and
   * manipulated, or `jQuery.fn.dataTable.settings`.
   *  @member
   *  @type array
   *  @default []
   *  @private
   */
  DataTable.settings = [];

  /**
   * Object models container, for the various models that DataTables has
   * available to it. These models define the objects that are used to hold
   * the active state and configuration of the table.
   *  @namespace
   */
  DataTable.models = {};
  
  
  
  /**
   * Template object for the way in which DataTables holds information about
   * search information for the global filter and individual column filters.
   *  @namespace
   */
  DataTable.models.oSearch = {
    /**
     * Flag to indicate if the filtering should be case insensitive or not
     *  @type boolean
     *  @default true
     */
    "bCaseInsensitive": true,
  
    /**
     * Applied search term
     *  @type string
     *  @default <i>Empty string</i>
     */
    "sSearch": "",
  
    /**
     * Flag to indicate if the search term should be interpreted as a
     * regular expression (true) or not (false) and therefore and special
     * regex characters escaped.
     *  @type boolean
     *  @default false
     */
    "bRegex": false,
  
    /**
     * Flag to indicate if DataTables is to use its smart filtering or not.
     *  @type boolean
     *  @default true
     */
    "bSmart": true
  };
  
  
  
  
  /**
   * Template object for the way in which DataTables holds information about
   * each individual row. This is the object format used for the settings
   * aoData array.
   *  @namespace
   */
  DataTable.models.oRow = {
    /**
     * TR element for the row
     *  @type node
     *  @default null
     */
    "nTr": null,
  
    /**
     * Array of TD elements for each row. This is null until the row has been
     * created.
     *  @type array nodes
     *  @default []
     */
    "anCells": null,
  
    /**
     * Data object from the original data source for the row. This is either
     * an array if using the traditional form of DataTables, or an object if
     * using mData options. The exact type will depend on the passed in
     * data from the data source, or will be an array if using DOM a data
     * source.
     *  @type array|object
     *  @default []
     */
    "_aData": [],
  
    /**
     * Sorting data cache - this array is ostensibly the same length as the
     * number of columns (although each index is generated only as it is
     * needed), and holds the data that is used for sorting each column in the
     * row. We do this cache generation at the start of the sort in order that
     * the formatting of the sort data need be done only once for each cell
     * per sort. This array should not be read from or written to by anything
     * other than the master sorting methods.
     *  @type array
     *  @default null
     *  @private
     */
    "_aSortData": null,
  
    /**
     * Per cell filtering data cache. As per the sort data cache, used to
     * increase the performance of the filtering in DataTables
     *  @type array
     *  @default null
     *  @private
     */
    "_aFilterData": null,
  
    /**
     * Filtering data cache. This is the same as the cell filtering cache, but
     * in this case a string rather than an array. This is easily computed with
     * a join on `_aFilterData`, but is provided as a cache so the join isn't
     * needed on every search (memory traded for performance)
     *  @type array
     *  @default null
     *  @private
     */
    "_sFilterRow": null,
  
    /**
     * Cache of the class name that DataTables has applied to the row, so we
     * can quickly look at this variable rather than needing to do a DOM check
     * on className for the nTr property.
     *  @type string
     *  @default <i>Empty string</i>
     *  @private
     */
    "_sRowStripe": "",
  
    /**
     * Denote if the original data source was from the DOM, or the data source
     * object. This is used for invalidating data, so DataTables can
     * automatically read data from the original source, unless uninstructed
     * otherwise.
     *  @type string
     *  @default null
     *  @private
     */
    "src": null
  };
  
  
  /**
   * Template object for the column information object in DataTables. This object
   * is held in the settings aoColumns array and contains all the information that
   * DataTables needs about each individual column.
   *
   * Note that this object is related to {@link DataTable.defaults.column}
   * but this one is the internal data store for DataTables's cache of columns.
   * It should NOT be manipulated outside of DataTables. Any configuration should
   * be done through the initialisation options.
   *  @namespace
   */
  DataTable.models.oColumn = {
    /**
     * Column index. This could be worked out on-the-fly with $.inArray, but it
     * is faster to just hold it as a variable
     *  @type integer
     *  @default null
     */
    "idx": null,
  
    /**
     * A list of the columns that sorting should occur on when this column
     * is sorted. That this property is an array allows multi-column sorting
     * to be defined for a column (for example first name / last name columns
     * would benefit from this). The values are integers pointing to the
     * columns to be sorted on (typically it will be a single integer pointing
     * at itself, but that doesn't need to be the case).
     *  @type array
     */
    "aDataSort": null,
  
    /**
     * Define the sorting directions that are applied to the column, in sequence
     * as the column is repeatedly sorted upon - i.e. the first value is used
     * as the sorting direction when the column if first sorted (clicked on).
     * Sort it again (click again) and it will move on to the next index.
     * Repeat until loop.
     *  @type array
     */
    "asSorting": null,
  
    /**
     * Flag to indicate if the column is searchable, and thus should be included
     * in the filtering or not.
     *  @type boolean
     */
    "bSearchable": null,
  
    /**
     * Flag to indicate if the column is sortable or not.
     *  @type boolean
     */
    "bSortable": null,
  
    /**
     * Flag to indicate if the column is currently visible in the table or not
     *  @type boolean
     */
    "bVisible": null,
  
    /**
     * Store for manual type assignment using the `column.type` option. This
     * is held in store so we can manipulate the column's `sType` property.
     *  @type string
     *  @default null
     *  @private
     */
    "_sManualType": null,
  
    /**
     * Flag to indicate if HTML5 data attributes should be used as the data
     * source for filtering or sorting. True is either are.
     *  @type boolean
     *  @default false
     *  @private
     */
    "_bAttrSrc": false,
  
    /**
     * Developer definable function that is called whenever a cell is created (Ajax source,
     * etc) or processed for input (DOM source). This can be used as a compliment to mRender
     * allowing you to modify the DOM element (add background colour for example) when the
     * element is available.
     *  @type function
     *  @param {element} nTd The TD node that has been created
     *  @param {*} sData The Data for the cell
     *  @param {array|object} oData The data for the whole row
     *  @param {int} iRow The row index for the aoData data store
     *  @default null
     */
    "fnCreatedCell": null,
  
    /**
     * Function to get data from a cell in a column. You should <b>never</b>
     * access data directly through _aData internally in DataTables - always use
     * the method attached to this property. It allows mData to function as
     * required. This function is automatically assigned by the column
     * initialisation method
     *  @type function
     *  @param {array|object} oData The data array/object for the array
     *    (i.e. aoData[]._aData)
     *  @param {string} sSpecific The specific data type you want to get -
     *    'display', 'type' 'filter' 'sort'
     *  @returns {*} The data for the cell from the given row's data
     *  @default null
     */
    "fnGetData": null,
  
    /**
     * Function to set data for a cell in the column. You should <b>never</b>
     * set the data directly to _aData internally in DataTables - always use
     * this method. It allows mData to function as required. This function
     * is automatically assigned by the column initialisation method
     *  @type function
     *  @param {array|object} oData The data array/object for the array
     *    (i.e. aoData[]._aData)
     *  @param {*} sValue Value to set
     *  @default null
     */
    "fnSetData": null,
  
    /**
     * Property to read the value for the cells in the column from the data
     * source array / object. If null, then the default content is used, if a
     * function is given then the return from the function is used.
     *  @type function|int|string|null
     *  @default null
     */
    "mData": null,
  
    /**
     * Partner property to mData which is used (only when defined) to get
     * the data - i.e. it is basically the same as mData, but without the
     * 'set' option, and also the data fed to it is the result from mData.
     * This is the rendering method to match the data method of mData.
     *  @type function|int|string|null
     *  @default null
     */
    "mRender": null,
  
    /**
     * Unique header TH/TD element for this column - this is what the sorting
     * listener is attached to (if sorting is enabled.)
     *  @type node
     *  @default null
     */
    "nTh": null,
  
    /**
     * Unique footer TH/TD element for this column (if there is one). Not used
     * in DataTables as such, but can be used for plug-ins to reference the
     * footer for each column.
     *  @type node
     *  @default null
     */
    "nTf": null,
  
    /**
     * The class to apply to all TD elements in the table's TBODY for the column
     *  @type string
     *  @default null
     */
    "sClass": null,
  
    /**
     * When DataTables calculates the column widths to assign to each column,
     * it finds the longest string in each column and then constructs a
     * temporary table and reads the widths from that. The problem with this
     * is that "mmm" is much wider then "iiii", but the latter is a longer
     * string - thus the calculation can go wrong (doing it properly and putting
     * it into an DOM object and measuring that is horribly(!) slow). Thus as
     * a "work around" we provide this option. It will append its value to the
     * text that is found to be the longest string for the column - i.e. padding.
     *  @type string
     */
    "sContentPadding": null,
  
    /**
     * Allows a default value to be given for a column's data, and will be used
     * whenever a null data source is encountered (this can be because mData
     * is set to null, or because the data source itself is null).
     *  @type string
     *  @default null
     */
    "sDefaultContent": null,
  
    /**
     * Name for the column, allowing reference to the column by name as well as
     * by index (needs a lookup to work by name).
     *  @type string
     */
    "sName": null,
  
    /**
     * Custom sorting data type - defines which of the available plug-ins in
     * afnSortData the custom sorting will use - if any is defined.
     *  @type string
     *  @default std
     */
    "sSortDataType": 'std',
  
    /**
     * Class to be applied to the header element when sorting on this column
     *  @type string
     *  @default null
     */
    "sSortingClass": null,
  
    /**
     * Class to be applied to the header element when sorting on this column -
     * when jQuery UI theming is used.
     *  @type string
     *  @default null
     */
    "sSortingClassJUI": null,
  
    /**
     * Title of the column - what is seen in the TH element (nTh).
     *  @type string
     */
    "sTitle": null,
  
    /**
     * Column sorting and filtering type
     *  @type string
     *  @default null
     */
    "sType": null,
  
    /**
     * Width of the column
     *  @type string
     *  @default null
     */
    "sWidth": null,
  
    /**
     * Width of the column when it was first "encountered"
     *  @type string
     *  @default null
     */
    "sWidthOrig": null
  };
  
  
  /*
   * Developer note: The properties of the object below are given in Hungarian
   * notation, that was used as the interface for DataTables prior to v1.10, however
   * from v1.10 onwards the primary interface is camel case. In order to avoid
   * breaking backwards compatibility utterly with this change, the Hungarian
   * version is still, internally the primary interface, but is is not documented
   * - hence the @name tags in each doc comment. This allows a Javascript function
   * to create a map from Hungarian notation to camel case (going the other direction
   * would require each property to be listed, which would at around 3K to the size
   * of DataTables, while this method is about a 0.5K hit.
   *
   * Ultimately this does pave the way for Hungarian notation to be dropped
   * completely, but that is a massive amount of work and will break current
   * installs (therefore is on-hold until v2).
   */
  
  /**
   * Initialisation options that can be given to DataTables at initialisation
   * time.
   *  @namespace
   */
  DataTable.defaults = {
    /**
     * An array of data to use for the table, passed in at initialisation which
     * will be used in preference to any data which is already in the DOM. This is
     * particularly useful for constructing tables purely in Javascript, for
     * example with a custom Ajax call.
     *  @type array
     *  @default null
     *
     *  @dtopt Option
     *  @name DataTable.defaults.data
     *
     *  @example
     *    // Using a 2D array data source
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "data": [
     *          ['Trident', 'Internet Explorer 4.0', 'Win 95+', 4, 'X'],
     *          ['Trident', 'Internet Explorer 5.0', 'Win 95+', 5, 'C'],
     *        ],
     *        "columns": [
     *          { "title": "Engine" },
     *          { "title": "Browser" },
     *          { "title": "Platform" },
     *          { "title": "Version" },
     *          { "title": "Grade" }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using an array of objects as a data source (`data`)
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "data": [
     *          {
     *            "engine":   "Trident",
     *            "browser":  "Internet Explorer 4.0",
     *            "platform": "Win 95+",
     *            "version":  4,
     *            "grade":    "X"
     *          },
     *          {
     *            "engine":   "Trident",
     *            "browser":  "Internet Explorer 5.0",
     *            "platform": "Win 95+",
     *            "version":  5,
     *            "grade":    "C"
     *          }
     *        ],
     *        "columns": [
     *          { "title": "Engine",   "data": "engine" },
     *          { "title": "Browser",  "data": "browser" },
     *          { "title": "Platform", "data": "platform" },
     *          { "title": "Version",  "data": "version" },
     *          { "title": "Grade",    "data": "grade" }
     *        ]
     *      } );
     *    } );
     */
    "aaData": null,
  
  
    /**
     * If ordering is enabled, then DataTables will perform a first pass sort on
     * initialisation. You can define which column(s) the sort is performed
     * upon, and the sorting direction, with this variable. The `sorting` array
     * should contain an array for each column to be sorted initially containing
     * the column's index and a direction string ('asc' or 'desc').
     *  @type array
     *  @default [[0,'asc']]
     *
     *  @dtopt Option
     *  @name DataTable.defaults.order
     *
     *  @example
     *    // Sort by 3rd column first, and then 4th column
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "order": [[2,'asc'], [3,'desc']]
     *      } );
     *    } );
     *
     *    // No initial sorting
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "order": []
     *      } );
     *    } );
     */
    "aaSorting": [[0,'asc']],
  
  
    /**
     * This parameter is basically identical to the `sorting` parameter, but
     * cannot be overridden by user interaction with the table. What this means
     * is that you could have a column (visible or hidden) which the sorting
     * will always be forced on first - any sorting after that (from the user)
     * will then be performed as required. This can be useful for grouping rows
     * together.
     *  @type array
     *  @default null
     *
     *  @dtopt Option
     *  @name DataTable.defaults.orderFixed
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "orderFixed": [[0,'asc']]
     *      } );
     *    } )
     */
    "aaSortingFixed": [],
  
  
    /**
     * DataTables can be instructed to load data to display in the table from a
     * Ajax source. This option defines how that Ajax call is made and where to.
     *
     * The `ajax` property has three different modes of operation, depending on
     * how it is defined. These are:
     *
     * * `string` - Set the URL from where the data should be loaded from.
     * * `object` - Define properties for `jQuery.ajax`.
     * * `function` - Custom data get function
     *
     * `string`
     * --------
     *
     * As a string, the `ajax` property simply defines the URL from which
     * DataTables will load data.
     *
     * `object`
     * --------
     *
     * As an object, the parameters in the object are passed to
     * [jQuery.ajax](http://api.jquery.com/jQuery.ajax/) allowing fine control
     * of the Ajax request. DataTables has a number of default parameters which
     * you can override using this option. Please refer to the jQuery
     * documentation for a full description of the options available, although
     * the following parameters provide additional options in DataTables or
     * require special consideration:
     *
     * * `data` - As with jQuery, `data` can be provided as an object, but it
     *   can also be used as a function to manipulate the data DataTables sends
     *   to the server. The function takes a single parameter, an object of
     *   parameters with the values that DataTables has readied for sending. An
     *   object may be returned which will be merged into the DataTables
     *   defaults, or you can add the items to the object that was passed in and
     *   not return anything from the function. This supersedes `fnServerParams`
     *   from DataTables 1.9-.
     *
     * * `dataSrc` - By default DataTables will look for the property `data` (or
     *   `aaData` for compatibility with DataTables 1.9-) when obtaining data
     *   from an Ajax source or for server-side processing - this parameter
     *   allows that property to be changed. You can use Javascript dotted
     *   object notation to get a data source for multiple levels of nesting, or
     *   it my be used as a function. As a function it takes a single parameter,
     *   the JSON returned from the server, which can be manipulated as
     *   required, with the returned value being that used by DataTables as the
     *   data source for the table. This supersedes `sAjaxDataProp` from
     *   DataTables 1.9-.
     *
     * * `success` - Should not be overridden it is used internally in
     *   DataTables. To manipulate / transform the data returned by the server
     *   use `ajax.dataSrc`, or use `ajax` as a function (see below).
     *
     * `function`
     * ----------
     *
     * As a function, making the Ajax call is left up to yourself allowing
     * complete control of the Ajax request. Indeed, if desired, a method other
     * than Ajax could be used to obtain the required data, such as Web storage
     * or an AIR database.
     *
     * The function is given four parameters and no return is required. The
     * parameters are:
     *
     * 1. _object_ - Data to send to the server
     * 2. _function_ - Callback function that must be executed when the required
     *    data has been obtained. That data should be passed into the callback
     *    as the only parameter
     * 3. _object_ - DataTables settings object for the table
     *
     * Note that this supersedes `fnServerData` from DataTables 1.9-.
     *
     *  @type string|object|function
     *  @default null
     *
     *  @dtopt Option
     *  @name DataTable.defaults.ajax
     *  @since 1.10.0
     *
     * @example
     *   // Get JSON data from a file via Ajax.
     *   // Note DataTables expects data in the form `{ data: [ ...data... ] }` by default).
     *   $('#example').dataTable( {
     *     "ajax": "data.json"
     *   } );
     *
     * @example
     *   // Get JSON data from a file via Ajax, using `dataSrc` to change
     *   // `data` to `tableData` (i.e. `{ tableData: [ ...data... ] }`)
     *   $('#example').dataTable( {
     *     "ajax": {
     *       "url": "data.json",
     *       "dataSrc": "tableData"
     *     }
     *   } );
     *
     * @example
     *   // Get JSON data from a file via Ajax, using `dataSrc` to read data
     *   // from a plain array rather than an array in an object
     *   $('#example').dataTable( {
     *     "ajax": {
     *       "url": "data.json",
     *       "dataSrc": ""
     *     }
     *   } );
     *
     * @example
     *   // Manipulate the data returned from the server - add a link to data
     *   // (note this can, should, be done using `render` for the column - this
     *   // is just a simple example of how the data can be manipulated).
     *   $('#example').dataTable( {
     *     "ajax": {
     *       "url": "data.json",
     *       "dataSrc": function ( json ) {
     *         for ( var i=0, ien=json.length ; i<ien ; i++ ) {
     *           json[i][0] = '<a href="/message/'+json[i][0]+'>View message</a>';
     *         }
     *         return json;
     *       }
     *     }
     *   } );
     *
     * @example
     *   // Add data to the request
     *   $('#example').dataTable( {
     *     "ajax": {
     *       "url": "data.json",
     *       "data": function ( d ) {
     *         return {
     *           "extra_search": $('#extra').val()
     *         };
     *       }
     *     }
     *   } );
     *
     * @example
     *   // Send request as POST
     *   $('#example').dataTable( {
     *     "ajax": {
     *       "url": "data.json",
     *       "type": "POST"
     *     }
     *   } );
     *
     * @example
     *   // Get the data from localStorage (could interface with a form for
     *   // adding, editing and removing rows).
     *   $('#example').dataTable( {
     *     "ajax": function (data, callback, settings) {
     *       callback(
     *         JSON.parse( localStorage.getItem('dataTablesData') )
     *       );
     *     }
     *   } );
     */
    "ajax": null,
  
  
    /**
     * This parameter allows you to readily specify the entries in the length drop
     * down menu that DataTables shows when pagination is enabled. It can be
     * either a 1D array of options which will be used for both the displayed
     * option and the value, or a 2D array which will use the array in the first
     * position as the value, and the array in the second position as the
     * displayed options (useful for language strings such as 'All').
     *
     * Note that the `pageLength` property will be automatically set to the
     * first value given in this array, unless `pageLength` is also provided.
     *  @type array
     *  @default [ 10, 25, 50, 100 ]
     *
     *  @dtopt Option
     *  @name DataTable.defaults.lengthMenu
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
     *      } );
     *    } );
     */
    "aLengthMenu": [ 10, 25, 50, 100 ],
  
  
    /**
     * The `columns` option in the initialisation parameter allows you to define
     * details about the way individual columns behave. For a full list of
     * column options that can be set, please see
     * {@link DataTable.defaults.column}. Note that if you use `columns` to
     * define your columns, you must have an entry in the array for every single
     * column that you have in your table (these can be null if you don't which
     * to specify any options).
     *  @member
     *
     *  @name DataTable.defaults.column
     */
    "aoColumns": null,
  
    /**
     * Very similar to `columns`, `columnDefs` allows you to target a specific
     * column, multiple columns, or all columns, using the `targets` property of
     * each object in the array. This allows great flexibility when creating
     * tables, as the `columnDefs` arrays can be of any length, targeting the
     * columns you specifically want. `columnDefs` may use any of the column
     * options available: {@link DataTable.defaults.column}, but it _must_
     * have `targets` defined in each object in the array. Values in the `targets`
     * array may be:
     *   <ul>
     *     <li>a string - class name will be matched on the TH for the column</li>
     *     <li>0 or a positive integer - column index counting from the left</li>
     *     <li>a negative integer - column index counting from the right</li>
     *     <li>the string "_all" - all columns (i.e. assign a default)</li>
     *   </ul>
     *  @member
     *
     *  @name DataTable.defaults.columnDefs
     */
    "aoColumnDefs": null,
  
  
    /**
     * Basically the same as `search`, this parameter defines the individual column
     * filtering state at initialisation time. The array must be of the same size
     * as the number of columns, and each element be an object with the parameters
     * `search` and `escapeRegex` (the latter is optional). 'null' is also
     * accepted and the default will be used.
     *  @type array
     *  @default []
     *
     *  @dtopt Option
     *  @name DataTable.defaults.searchCols
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "searchCols": [
     *          null,
     *          { "search": "My filter" },
     *          null,
     *          { "search": "^[0-9]", "escapeRegex": false }
     *        ]
     *      } );
     *    } )
     */
    "aoSearchCols": [],
  
  
    /**
     * An array of CSS classes that should be applied to displayed rows. This
     * array may be of any length, and DataTables will apply each class
     * sequentially, looping when required.
     *  @type array
     *  @default null <i>Will take the values determined by the `oClasses.stripe*`
     *    options</i>
     *
     *  @dtopt Option
     *  @name DataTable.defaults.stripeClasses
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "stripeClasses": [ 'strip1', 'strip2', 'strip3' ]
     *      } );
     *    } )
     */
    "asStripeClasses": null,
  
  
    /**
     * Enable or disable automatic column width calculation. This can be disabled
     * as an optimisation (it takes some time to calculate the widths) if the
     * tables widths are passed in using `columns`.
     *  @type boolean
     *  @default true
     *
     *  @dtopt Features
     *  @name DataTable.defaults.autoWidth
     *
     *  @example
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "autoWidth": false
     *      } );
     *    } );
     */
    "bAutoWidth": true,
  
  
    /**
     * Deferred rendering can provide DataTables with a huge speed boost when you
     * are using an Ajax or JS data source for the table. This option, when set to
     * true, will cause DataTables to defer the creation of the table elements for
     * each row until they are needed for a draw - saving a significant amount of
     * time.
     *  @type boolean
     *  @default false
     *
     *  @dtopt Features
     *  @name DataTable.defaults.deferRender
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "ajax": "sources/arrays.txt",
     *        "deferRender": true
     *      } );
     *    } );
     */
    "bDeferRender": false,
  
  
    /**
     * Replace a DataTable which matches the given selector and replace it with
     * one which has the properties of the new initialisation object passed. If no
     * table matches the selector, then the new DataTable will be constructed as
     * per normal.
     *  @type boolean
     *  @default false
     *
     *  @dtopt Options
     *  @name DataTable.defaults.destroy
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "srollY": "200px",
     *        "paginate": false
     *      } );
     *
     *      // Some time later....
     *      $('#example').dataTable( {
     *        "filter": false,
     *        "destroy": true
     *      } );
     *    } );
     */
    "bDestroy": false,
  
  
    /**
     * Enable or disable filtering of data. Filtering in DataTables is "smart" in
     * that it allows the end user to input multiple words (space separated) and
     * will match a row containing those words, even if not in the order that was
     * specified (this allow matching across multiple columns). Note that if you
     * wish to use filtering in DataTables this must remain 'true' - to remove the
     * default filtering input box and retain filtering abilities, please use
     * {@link DataTable.defaults.dom}.
     *  @type boolean
     *  @default true
     *
     *  @dtopt Features
     *  @name DataTable.defaults.searching
     *
     *  @example
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "searching": false
     *      } );
     *    } );
     */
    "bFilter": true,
  
  
    /**
     * Enable or disable the table information display. This shows information
     * about the data that is currently visible on the page, including information
     * about filtered data if that action is being performed.
     *  @type boolean
     *  @default true
     *
     *  @dtopt Features
     *  @name DataTable.defaults.info
     *
     *  @example
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "info": false
     *      } );
     *    } );
     */
    "bInfo": true,
  
  
    /**
     * Enable jQuery UI ThemeRoller support (required as ThemeRoller requires some
     * slightly different and additional mark-up from what DataTables has
     * traditionally used).
     *  @type boolean
     *  @default false
     *
     *  @dtopt Features
     *  @name DataTable.defaults.jQueryUI
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "jQueryUI": true
     *      } );
     *    } );
     */
    "bJQueryUI": false,
  
  
    /**
     * Allows the end user to select the size of a formatted page from a select
     * menu (sizes are 10, 25, 50 and 100). Requires pagination (`paginate`).
     *  @type boolean
     *  @default true
     *
     *  @dtopt Features
     *  @name DataTable.defaults.lengthChange
     *
     *  @example
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "lengthChange": false
     *      } );
     *    } );
     */
    "bLengthChange": true,
  
  
    /**
     * Enable or disable pagination.
     *  @type boolean
     *  @default true
     *
     *  @dtopt Features
     *  @name DataTable.defaults.paging
     *
     *  @example
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "paging": false
     *      } );
     *    } );
     */
    "bPaginate": true,
  
  
    /**
     * Enable or disable the display of a 'processing' indicator when the table is
     * being processed (e.g. a sort). This is particularly useful for tables with
     * large amounts of data where it can take a noticeable amount of time to sort
     * the entries.
     *  @type boolean
     *  @default false
     *
     *  @dtopt Features
     *  @name DataTable.defaults.processing
     *
     *  @example
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "processing": true
     *      } );
     *    } );
     */
    "bProcessing": false,
  
  
    /**
     * Retrieve the DataTables object for the given selector. Note that if the
     * table has already been initialised, this parameter will cause DataTables
     * to simply return the object that has already been set up - it will not take
     * account of any changes you might have made to the initialisation object
     * passed to DataTables (setting this parameter to true is an acknowledgement
     * that you understand this). `destroy` can be used to reinitialise a table if
     * you need.
     *  @type boolean
     *  @default false
     *
     *  @dtopt Options
     *  @name DataTable.defaults.retrieve
     *
     *  @example
     *    $(document).ready( function() {
     *      initTable();
     *      tableActions();
     *    } );
     *
     *    function initTable ()
     *    {
     *      return $('#example').dataTable( {
     *        "scrollY": "200px",
     *        "paginate": false,
     *        "retrieve": true
     *      } );
     *    }
     *
     *    function tableActions ()
     *    {
     *      var table = initTable();
     *      // perform API operations with oTable
     *    }
     */
    "bRetrieve": false,
  
  
    /**
     * When vertical (y) scrolling is enabled, DataTables will force the height of
     * the table's viewport to the given height at all times (useful for layout).
     * However, this can look odd when filtering data down to a small data set,
     * and the footer is left "floating" further down. This parameter (when
     * enabled) will cause DataTables to collapse the table's viewport down when
     * the result set will fit within the given Y height.
     *  @type boolean
     *  @default false
     *
     *  @dtopt Options
     *  @name DataTable.defaults.scrollCollapse
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "scrollY": "200",
     *        "scrollCollapse": true
     *      } );
     *    } );
     */
    "bScrollCollapse": false,
  
  
    /**
     * Configure DataTables to use server-side processing. Note that the
     * `ajax` parameter must also be given in order to give DataTables a
     * source to obtain the required data for each draw.
     *  @type boolean
     *  @default false
     *
     *  @dtopt Features
     *  @dtopt Server-side
     *  @name DataTable.defaults.serverSide
     *
     *  @example
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "serverSide": true,
     *        "ajax": "xhr.php"
     *      } );
     *    } );
     */
    "bServerSide": false,
  
  
    /**
     * Enable or disable sorting of columns. Sorting of individual columns can be
     * disabled by the `sortable` option for each column.
     *  @type boolean
     *  @default true
     *
     *  @dtopt Features
     *  @name DataTable.defaults.ordering
     *
     *  @example
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "ordering": false
     *      } );
     *    } );
     */
    "bSort": true,
  
  
    /**
     * Enable or display DataTables' ability to sort multiple columns at the
     * same time (activated by shift-click by the user).
     *  @type boolean
     *  @default true
     *
     *  @dtopt Options
     *  @name DataTable.defaults.orderMulti
     *
     *  @example
     *    // Disable multiple column sorting ability
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "orderMulti": false
     *      } );
     *    } );
     */
    "bSortMulti": true,
  
  
    /**
     * Allows control over whether DataTables should use the top (true) unique
     * cell that is found for a single column, or the bottom (false - default).
     * This is useful when using complex headers.
     *  @type boolean
     *  @default false
     *
     *  @dtopt Options
     *  @name DataTable.defaults.orderCellsTop
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "orderCellsTop": true
     *      } );
     *    } );
     */
    "bSortCellsTop": false,
  
  
    /**
     * Enable or disable the addition of the classes `sorting\_1`, `sorting\_2` and
     * `sorting\_3` to the columns which are currently being sorted on. This is
     * presented as a feature switch as it can increase processing time (while
     * classes are removed and added) so for large data sets you might want to
     * turn this off.
     *  @type boolean
     *  @default true
     *
     *  @dtopt Features
     *  @name DataTable.defaults.orderClasses
     *
     *  @example
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "orderClasses": false
     *      } );
     *    } );
     */
    "bSortClasses": true,
  
  
    /**
     * Enable or disable state saving. When enabled HTML5 `localStorage` will be
     * used to save table display information such as pagination information,
     * display length, filtering and sorting. As such when the end user reloads
     * the page the display display will match what thy had previously set up.
     *
     * Due to the use of `localStorage` the default state saving is not supported
     * in IE6 or 7. If state saving is required in those browsers, use
     * `stateSaveCallback` to provide a storage solution such as cookies.
     *  @type boolean
     *  @default false
     *
     *  @dtopt Features
     *  @name DataTable.defaults.stateSave
     *
     *  @example
     *    $(document).ready( function () {
     *      $('#example').dataTable( {
     *        "stateSave": true
     *      } );
     *    } );
     */
    "bStateSave": false,
  
  
    /**
     * This function is called when a TR element is created (and all TD child
     * elements have been inserted), or registered if using a DOM source, allowing
     * manipulation of the TR element (adding classes etc).
     *  @type function
     *  @param {node} row "TR" element for the current row
     *  @param {array} data Raw data array for this row
     *  @param {int} dataIndex The index of this row in the internal aoData array
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.createdRow
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "createdRow": function( row, data, dataIndex ) {
     *          // Bold the grade for all 'A' grade browsers
     *          if ( data[4] == "A" )
     *          {
     *            $('td:eq(4)', row).html( '<b>A</b>' );
     *          }
     *        }
     *      } );
     *    } );
     */
    "fnCreatedRow": null,
  
  
    /**
     * This function is called on every 'draw' event, and allows you to
     * dynamically modify any aspect you want about the created DOM.
     *  @type function
     *  @param {object} settings DataTables settings object
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.drawCallback
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "drawCallback": function( settings ) {
     *          alert( 'DataTables has redrawn the table' );
     *        }
     *      } );
     *    } );
     */
    "fnDrawCallback": null,
  
  
    /**
     * Identical to fnHeaderCallback() but for the table footer this function
     * allows you to modify the table footer on every 'draw' event.
     *  @type function
     *  @param {node} foot "TR" element for the footer
     *  @param {array} data Full table data (as derived from the original HTML)
     *  @param {int} start Index for the current display starting point in the
     *    display array
     *  @param {int} end Index for the current display ending point in the
     *    display array
     *  @param {array int} display Index array to translate the visual position
     *    to the full data array
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.footerCallback
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "footerCallback": function( tfoot, data, start, end, display ) {
     *          tfoot.getElementsByTagName('th')[0].innerHTML = "Starting index is "+start;
     *        }
     *      } );
     *    } )
     */
    "fnFooterCallback": null,
  
  
    /**
     * When rendering large numbers in the information element for the table
     * (i.e. "Showing 1 to 10 of 57 entries") DataTables will render large numbers
     * to have a comma separator for the 'thousands' units (e.g. 1 million is
     * rendered as "1,000,000") to help readability for the end user. This
     * function will override the default method DataTables uses.
     *  @type function
     *  @member
     *  @param {int} toFormat number to be formatted
     *  @returns {string} formatted string for DataTables to show the number
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.formatNumber
     *
     *  @example
     *    // Format a number using a single quote for the separator (note that
     *    // this can also be done with the language.thousands option)
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "formatNumber": function ( toFormat ) {
     *          return toFormat.toString().replace(
     *            /\B(?=(\d{3})+(?!\d))/g, "'"
     *          );
     *        };
     *      } );
     *    } );
     */
    "fnFormatNumber": function ( toFormat ) {
      return toFormat.toString().replace(
        /\B(?=(\d{3})+(?!\d))/g,
        this.oLanguage.sThousands
      );
    },
  
  
    /**
     * This function is called on every 'draw' event, and allows you to
     * dynamically modify the header row. This can be used to calculate and
     * display useful information about the table.
     *  @type function
     *  @param {node} head "TR" element for the header
     *  @param {array} data Full table data (as derived from the original HTML)
     *  @param {int} start Index for the current display starting point in the
     *    display array
     *  @param {int} end Index for the current display ending point in the
     *    display array
     *  @param {array int} display Index array to translate the visual position
     *    to the full data array
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.headerCallback
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "fheaderCallback": function( head, data, start, end, display ) {
     *          head.getElementsByTagName('th')[0].innerHTML = "Displaying "+(end-start)+" records";
     *        }
     *      } );
     *    } )
     */
    "fnHeaderCallback": null,
  
  
    /**
     * The information element can be used to convey information about the current
     * state of the table. Although the internationalisation options presented by
     * DataTables are quite capable of dealing with most customisations, there may
     * be times where you wish to customise the string further. This callback
     * allows you to do exactly that.
     *  @type function
     *  @param {object} oSettings DataTables settings object
     *  @param {int} start Starting position in data for the draw
     *  @param {int} end End position in data for the draw
     *  @param {int} max Total number of rows in the table (regardless of
     *    filtering)
     *  @param {int} total Total number of rows in the data set, after filtering
     *  @param {string} pre The string that DataTables has formatted using it's
     *    own rules
     *  @returns {string} The string to be displayed in the information element.
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.infoCallback
     *
     *  @example
     *    $('#example').dataTable( {
     *      "infoCallback": function( settings, start, end, max, total, pre ) {
     *        return start +" to "+ end;
     *      }
     *    } );
     */
    "fnInfoCallback": null,
  
  
    /**
     * Called when the table has been initialised. Normally DataTables will
     * initialise sequentially and there will be no need for this function,
     * however, this does not hold true when using external language information
     * since that is obtained using an async XHR call.
     *  @type function
     *  @param {object} settings DataTables settings object
     *  @param {object} json The JSON object request from the server - only
     *    present if client-side Ajax sourced data is used
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.initComplete
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "initComplete": function(settings, json) {
     *          alert( 'DataTables has finished its initialisation.' );
     *        }
     *      } );
     *    } )
     */
    "fnInitComplete": null,
  
  
    /**
     * Called at the very start of each table draw and can be used to cancel the
     * draw by returning false, any other return (including undefined) results in
     * the full draw occurring).
     *  @type function
     *  @param {object} settings DataTables settings object
     *  @returns {boolean} False will cancel the draw, anything else (including no
     *    return) will allow it to complete.
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.preDrawCallback
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "preDrawCallback": function( settings ) {
     *          if ( $('#test').val() == 1 ) {
     *            return false;
     *          }
     *        }
     *      } );
     *    } );
     */
    "fnPreDrawCallback": null,
  
  
    /**
     * This function allows you to 'post process' each row after it have been
     * generated for each table draw, but before it is rendered on screen. This
     * function might be used for setting the row class name etc.
     *  @type function
     *  @param {node} row "TR" element for the current row
     *  @param {array} data Raw data array for this row
     *  @param {int} displayIndex The display index for the current table draw
     *  @param {int} displayIndexFull The index of the data in the full list of
     *    rows (after filtering)
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.rowCallback
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "rowCallback": function( row, data, displayIndex, displayIndexFull ) {
     *          // Bold the grade for all 'A' grade browsers
     *          if ( data[4] == "A" ) {
     *            $('td:eq(4)', row).html( '<b>A</b>' );
     *          }
     *        }
     *      } );
     *    } );
     */
    "fnRowCallback": null,
  
  
    /**
     * __Deprecated__ The functionality provided by this parameter has now been
     * superseded by that provided through `ajax`, which should be used instead.
     *
     * This parameter allows you to override the default function which obtains
     * the data from the server so something more suitable for your application.
     * For example you could use POST data, or pull information from a Gears or
     * AIR database.
     *  @type function
     *  @member
     *  @param {string} source HTTP source to obtain the data from (`ajax`)
     *  @param {array} data A key/value pair object containing the data to send
     *    to the server
     *  @param {function} callback to be called on completion of the data get
     *    process that will draw the data on the page.
     *  @param {object} settings DataTables settings object
     *
     *  @dtopt Callbacks
     *  @dtopt Server-side
     *  @name DataTable.defaults.serverData
     *
     *  @deprecated 1.10. Please use `ajax` for this functionality now.
     */
    "fnServerData": null,
  
  
    /**
     * __Deprecated__ The functionality provided by this parameter has now been
     * superseded by that provided through `ajax`, which should be used instead.
     *
     *  It is often useful to send extra data to the server when making an Ajax
     * request - for example custom filtering information, and this callback
     * function makes it trivial to send extra information to the server. The
     * passed in parameter is the data set that has been constructed by
     * DataTables, and you can add to this or modify it as you require.
     *  @type function
     *  @param {array} data Data array (array of objects which are name/value
     *    pairs) that has been constructed by DataTables and will be sent to the
     *    server. In the case of Ajax sourced data with server-side processing
     *    this will be an empty array, for server-side processing there will be a
     *    significant number of parameters!
     *  @returns {undefined} Ensure that you modify the data array passed in,
     *    as this is passed by reference.
     *
     *  @dtopt Callbacks
     *  @dtopt Server-side
     *  @name DataTable.defaults.serverParams
     *
     *  @deprecated 1.10. Please use `ajax` for this functionality now.
     */
    "fnServerParams": null,
  
  
    /**
     * Load the table state. With this function you can define from where, and how, the
     * state of a table is loaded. By default DataTables will load from `localStorage`
     * but you might wish to use a server-side database or cookies.
     *  @type function
     *  @member
     *  @param {object} settings DataTables settings object
     *  @return {object} The DataTables state object to be loaded
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.stateLoadCallback
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "stateSave": true,
     *        "stateLoadCallback": function (settings) {
     *          var o;
     *
     *          // Send an Ajax request to the server to get the data. Note that
     *          // this is a synchronous request.
     *          $.ajax( {
     *            "url": "/state_load",
     *            "async": false,
     *            "dataType": "json",
     *            "success": function (json) {
     *              o = json;
     *            }
     *          } );
     *
     *          return o;
     *        }
     *      } );
     *    } );
     */
    "fnStateLoadCallback": function ( settings ) {
      try {
        return JSON.parse(
          (settings.iStateDuration === -1 ? sessionStorage : localStorage).getItem(
            'DataTables_'+settings.sInstance+'_'+location.pathname
          )
        );
      } catch (e) {}
    },
  
  
    /**
     * Callback which allows modification of the saved state prior to loading that state.
     * This callback is called when the table is loading state from the stored data, but
     * prior to the settings object being modified by the saved state. Note that for
     * plug-in authors, you should use the `stateLoadParams` event to load parameters for
     * a plug-in.
     *  @type function
     *  @param {object} settings DataTables settings object
     *  @param {object} data The state object that is to be loaded
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.stateLoadParams
     *
     *  @example
     *    // Remove a saved filter, so filtering is never loaded
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "stateSave": true,
     *        "stateLoadParams": function (settings, data) {
     *          data.oSearch.sSearch = "";
     *        }
     *      } );
     *    } );
     *
     *  @example
     *    // Disallow state loading by returning false
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "stateSave": true,
     *        "stateLoadParams": function (settings, data) {
     *          return false;
     *        }
     *      } );
     *    } );
     */
    "fnStateLoadParams": null,
  
  
    /**
     * Callback that is called when the state has been loaded from the state saving method
     * and the DataTables settings object has been modified as a result of the loaded state.
     *  @type function
     *  @param {object} settings DataTables settings object
     *  @param {object} data The state object that was loaded
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.stateLoaded
     *
     *  @example
     *    // Show an alert with the filtering value that was saved
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "stateSave": true,
     *        "stateLoaded": function (settings, data) {
     *          alert( 'Saved filter was: '+data.oSearch.sSearch );
     *        }
     *      } );
     *    } );
     */
    "fnStateLoaded": null,
  
  
    /**
     * Save the table state. This function allows you to define where and how the state
     * information for the table is stored By default DataTables will use `localStorage`
     * but you might wish to use a server-side database or cookies.
     *  @type function
     *  @member
     *  @param {object} settings DataTables settings object
     *  @param {object} data The state object to be saved
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.stateSaveCallback
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "stateSave": true,
     *        "stateSaveCallback": function (settings, data) {
     *          // Send an Ajax request to the server with the state object
     *          $.ajax( {
     *            "url": "/state_save",
     *            "data": data,
     *            "dataType": "json",
     *            "method": "POST"
     *            "success": function () {}
     *          } );
     *        }
     *      } );
     *    } );
     */
    "fnStateSaveCallback": function ( settings, data ) {
      try {
        (settings.iStateDuration === -1 ? sessionStorage : localStorage).setItem(
          'DataTables_'+settings.sInstance+'_'+location.pathname,
          JSON.stringify( data )
        );
      } catch (e) {}
    },
  
  
    /**
     * Callback which allows modification of the state to be saved. Called when the table
     * has changed state a new state save is required. This method allows modification of
     * the state saving object prior to actually doing the save, including addition or
     * other state properties or modification. Note that for plug-in authors, you should
     * use the `stateSaveParams` event to save parameters for a plug-in.
     *  @type function
     *  @param {object} settings DataTables settings object
     *  @param {object} data The state object to be saved
     *
     *  @dtopt Callbacks
     *  @name DataTable.defaults.stateSaveParams
     *
     *  @example
     *    // Remove a saved filter, so filtering is never saved
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "stateSave": true,
     *        "stateSaveParams": function (settings, data) {
     *          data.oSearch.sSearch = "";
     *        }
     *      } );
     *    } );
     */
    "fnStateSaveParams": null,
  
  
    /**
     * Duration for which the saved state information is considered valid. After this period
     * has elapsed the state will be returned to the default.
     * Value is given in seconds.
     *  @type int
     *  @default 7200 <i>(2 hours)</i>
     *
     *  @dtopt Options
     *  @name DataTable.defaults.stateDuration
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "stateDuration": 60*60*24; // 1 day
     *      } );
     *    } )
     */
    "iStateDuration": 7200,
  
  
    /**
     * When enabled DataTables will not make a request to the server for the first
     * page draw - rather it will use the data already on the page (no sorting etc
     * will be applied to it), thus saving on an XHR at load time. `deferLoading`
     * is used to indicate that deferred loading is required, but it is also used
     * to tell DataTables how many records there are in the full table (allowing
     * the information element and pagination to be displayed correctly). In the case
     * where a filtering is applied to the table on initial load, this can be
     * indicated by giving the parameter as an array, where the first element is
     * the number of records available after filtering and the second element is the
     * number of records without filtering (allowing the table information element
     * to be shown correctly).
     *  @type int | array
     *  @default null
     *
     *  @dtopt Options
     *  @name DataTable.defaults.deferLoading
     *
     *  @example
     *    // 57 records available in the table, no filtering applied
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "serverSide": true,
     *        "ajax": "scripts/server_processing.php",
     *        "deferLoading": 57
     *      } );
     *    } );
     *
     *  @example
     *    // 57 records after filtering, 100 without filtering (an initial filter applied)
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "serverSide": true,
     *        "ajax": "scripts/server_processing.php",
     *        "deferLoading": [ 57, 100 ],
     *        "search": {
     *          "search": "my_filter"
     *        }
     *      } );
     *    } );
     */
    "iDeferLoading": null,
  
  
    /**
     * Number of rows to display on a single page when using pagination. If
     * feature enabled (`lengthChange`) then the end user will be able to override
     * this to a custom setting using a pop-up menu.
     *  @type int
     *  @default 10
     *
     *  @dtopt Options
     *  @name DataTable.defaults.pageLength
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "pageLength": 50
     *      } );
     *    } )
     */
    "iDisplayLength": 10,
  
  
    /**
     * Define the starting point for data display when using DataTables with
     * pagination. Note that this parameter is the number of records, rather than
     * the page number, so if you have 10 records per page and want to start on
     * the third page, it should be "20".
     *  @type int
     *  @default 0
     *
     *  @dtopt Options
     *  @name DataTable.defaults.displayStart
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "displayStart": 20
     *      } );
     *    } )
     */
    "iDisplayStart": 0,
  
  
    /**
     * By default DataTables allows keyboard navigation of the table (sorting, paging,
     * and filtering) by adding a `tabindex` attribute to the required elements. This
     * allows you to tab through the controls and press the enter key to activate them.
     * The tabindex is default 0, meaning that the tab follows the flow of the document.
     * You can overrule this using this parameter if you wish. Use a value of -1 to
     * disable built-in keyboard navigation.
     *  @type int
     *  @default 0
     *
     *  @dtopt Options
     *  @name DataTable.defaults.tabIndex
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "tabIndex": 1
     *      } );
     *    } );
     */
    "iTabIndex": 0,
  
  
    /**
     * Classes that DataTables assigns to the various components and features
     * that it adds to the HTML table. This allows classes to be configured
     * during initialisation in addition to through the static
     * {@link DataTable.ext.oStdClasses} object).
     *  @namespace
     *  @name DataTable.defaults.classes
     */
    "oClasses": {},
  
  
    /**
     * All strings that DataTables uses in the user interface that it creates
     * are defined in this object, allowing you to modified them individually or
     * completely replace them all as required.
     *  @namespace
     *  @name DataTable.defaults.language
     */
    "oLanguage": {
      /**
       * Strings that are used for WAI-ARIA labels and controls only (these are not
       * actually visible on the page, but will be read by screenreaders, and thus
       * must be internationalised as well).
       *  @namespace
       *  @name DataTable.defaults.language.aria
       */
      "oAria": {
        /**
         * ARIA label that is added to the table headers when the column may be
         * sorted ascending by activing the column (click or return when focused).
         * Note that the column header is prefixed to this string.
         *  @type string
         *  @default : activate to sort column ascending
         *
         *  @dtopt Language
         *  @name DataTable.defaults.language.aria.sortAscending
         *
         *  @example
         *    $(document).ready( function() {
         *      $('#example').dataTable( {
         *        "language": {
         *          "aria": {
         *            "sortAscending": " - click/return to sort ascending"
         *          }
         *        }
         *      } );
         *    } );
         */
        "sSortAscending": ": activate to sort column ascending",
  
        /**
         * ARIA label that is added to the table headers when the column may be
         * sorted descending by activing the column (click or return when focused).
         * Note that the column header is prefixed to this string.
         *  @type string
         *  @default : activate to sort column ascending
         *
         *  @dtopt Language
         *  @name DataTable.defaults.language.aria.sortDescending
         *
         *  @example
         *    $(document).ready( function() {
         *      $('#example').dataTable( {
         *        "language": {
         *          "aria": {
         *            "sortDescending": " - click/return to sort descending"
         *          }
         *        }
         *      } );
         *    } );
         */
        "sSortDescending": ": activate to sort column descending"
      },
  
      /**
       * Pagination string used by DataTables for the built-in pagination
       * control types.
       *  @namespace
       *  @name DataTable.defaults.language.paginate
       */
      "oPaginate": {
        /**
         * Text to use when using the 'full_numbers' type of pagination for the
         * button to take the user to the first page.
         *  @type string
         *  @default First
         *
         *  @dtopt Language
         *  @name DataTable.defaults.language.paginate.first
         *
         *  @example
         *    $(document).ready( function() {
         *      $('#example').dataTable( {
         *        "language": {
         *          "paginate": {
         *            "first": "First page"
         *          }
         *        }
         *      } );
         *    } );
         */
        "sFirst": "First",
  
  
        /**
         * Text to use when using the 'full_numbers' type of pagination for the
         * button to take the user to the last page.
         *  @type string
         *  @default Last
         *
         *  @dtopt Language
         *  @name DataTable.defaults.language.paginate.last
         *
         *  @example
         *    $(document).ready( function() {
         *      $('#example').dataTable( {
         *        "language": {
         *          "paginate": {
         *            "last": "Last page"
         *          }
         *        }
         *      } );
         *    } );
         */
        "sLast": "Last",
  
  
        /**
         * Text to use for the 'next' pagination button (to take the user to the
         * next page).
         *  @type string
         *  @default Next
         *
         *  @dtopt Language
         *  @name DataTable.defaults.language.paginate.next
         *
         *  @example
         *    $(document).ready( function() {
         *      $('#example').dataTable( {
         *        "language": {
         *          "paginate": {
         *            "next": "Next page"
         *          }
         *        }
         *      } );
         *    } );
         */
        "sNext": "Next",
  
  
        /**
         * Text to use for the 'previous' pagination button (to take the user to
         * the previous page).
         *  @type string
         *  @default Previous
         *
         *  @dtopt Language
         *  @name DataTable.defaults.language.paginate.previous
         *
         *  @example
         *    $(document).ready( function() {
         *      $('#example').dataTable( {
         *        "language": {
         *          "paginate": {
         *            "previous": "Previous page"
         *          }
         *        }
         *      } );
         *    } );
         */
        "sPrevious": "Previous"
      },
  
      /**
       * This string is shown in preference to `zeroRecords` when the table is
       * empty of data (regardless of filtering). Note that this is an optional
       * parameter - if it is not given, the value of `zeroRecords` will be used
       * instead (either the default or given value).
       *  @type string
       *  @default No data available in table
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.emptyTable
       *
       *  @example
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "emptyTable": "No data available in table"
       *        }
       *      } );
       *    } );
       */
      "sEmptyTable": "No data available in table",
  
  
      /**
       * This string gives information to the end user about the information
       * that is current on display on the page. The following tokens can be
       * used in the string and will be dynamically replaced as the table
       * display updates. This tokens can be placed anywhere in the string, or
       * removed as needed by the language requires:
       *
       * * `\_START\_` - Display index of the first record on the current page
       * * `\_END\_` - Display index of the last record on the current page
       * * `\_TOTAL\_` - Number of records in the table after filtering
       * * `\_MAX\_` - Number of records in the table without filtering
       * * `\_PAGE\_` - Current page number
       * * `\_PAGES\_` - Total number of pages of data in the table
       *
       *  @type string
       *  @default Showing _START_ to _END_ of _TOTAL_ entries
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.info
       *
       *  @example
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "info": "Showing page _PAGE_ of _PAGES_"
       *        }
       *      } );
       *    } );
       */
      "sInfo": "Desplegando de _START_ a _END_, total de registros _TOTAL_.",
  
  
      /**
       * Display information string for when the table is empty. Typically the
       * format of this string should match `info`.
       *  @type string
       *  @default Showing 0 to 0 of 0 entries
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.infoEmpty
       *
       *  @example
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "infoEmpty": "No entries to show"
       *        }
       *      } );
       *    } );
       */
      "sInfoEmpty": "",
  
  
      /**
       * When a user filters the information in a table, this string is appended
       * to the information (`info`) to give an idea of how strong the filtering
       * is. The variable _MAX_ is dynamically updated.
       *  @type string
       *  @default (filtered from _MAX_ total entries)
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.infoFiltered
       *
       *  @example
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "infoFiltered": " - filtering from _MAX_ records"
       *        }
       *      } );
       *    } );
       */
      "sInfoFiltered": "(filtered from _MAX_ total entries)",
  
  
      /**
       * If can be useful to append extra information to the info string at times,
       * and this variable does exactly that. This information will be appended to
       * the `info` (`infoEmpty` and `infoFiltered` in whatever combination they are
       * being used) at all times.
       *  @type string
       *  @default <i>Empty string</i>
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.infoPostFix
       *
       *  @example
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "infoPostFix": "All records shown are derived from real information."
       *        }
       *      } );
       *    } );
       */
      "sInfoPostFix": "",
  
  
      /**
       * This decimal place operator is a little different from the other
       * language options since DataTables doesn't output floating point
       * numbers, so it won't ever use this for display of a number. Rather,
       * what this parameter does is modify the sort methods of the table so
       * that numbers which are in a format which has a character other than
       * a period (`.`) as a decimal place will be sorted numerically.
       *
       * Note that numbers with different decimal places cannot be shown in
       * the same table and still be sortable, the table must be consistent.
       * However, multiple different tables on the page can use different
       * decimal place characters.
       *  @type string
       *  @default 
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.decimal
       *
       *  @example
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "decimal": ","
       *          "thousands": "."
       *        }
       *      } );
       *    } );
       */
      "sDecimal": "",
  
  
      /**
       * DataTables has a build in number formatter (`formatNumber`) which is
       * used to format large numbers that are used in the table information.
       * By default a comma is used, but this can be trivially changed to any
       * character you wish with this parameter.
       *  @type string
       *  @default ,
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.thousands
       *
       *  @example
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "thousands": "'"
       *        }
       *      } );
       *    } );
       */
      "sThousands": ",",
  
  
      /**
       * Detail the action that will be taken when the drop down menu for the
       * pagination length option is changed. The '_MENU_' variable is replaced
       * with a default select list of 10, 25, 50 and 100, and can be replaced
       * with a custom select box if required.
       *  @type string
       *  @default Show _MENU_ entries
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.lengthMenu
       *
       *  @example
       *    // Language change only
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "lengthMenu": "Display _MENU_ records"
       *        }
       *      } );
       *    } );
       *
       *  @example
       *    // Language and options change
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "lengthMenu": 'Display <select>'+
       *            '<option value="10">10</option>'+
       *            '<option value="20">20</option>'+
       *            '<option value="30">30</option>'+
       *            '<option value="40">40</option>'+
       *            '<option value="50">50</option>'+
       *            '<option value="-1">All</option>'+
       *            '</select> records'
       *        }
       *      } );
       *    } );
       */
      "sLengthMenu": "Show _MENU_ entries",
  
  
      /**
       * When using Ajax sourced data and during the first draw when DataTables is
       * gathering the data, this message is shown in an empty row in the table to
       * indicate to the end user the the data is being loaded. Note that this
       * parameter is not used when loading data by server-side processing, just
       * Ajax sourced data with client-side processing.
       *  @type string
       *  @default Loading...
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.loadingRecords
       *
       *  @example
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "loadingRecords": "Please wait - loading..."
       *        }
       *      } );
       *    } );
       */
      "sLoadingRecords": "Loading...",
  
  
      /**
       * Text which is displayed when the table is processing a user action
       * (usually a sort command or similar).
       *  @type string
       *  @default Processing...
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.processing
       *
       *  @example
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "processing": "DataTables is currently busy"
       *        }
       *      } );
       *    } );
       */
      "sProcessing": "Processing...",
  
  
      /**
       * Details the actions that will be taken when the user types into the
       * filtering input text box. The variable "_INPUT_", if used in the string,
       * is replaced with the HTML text box for the filtering input allowing
       * control over where it appears in the string. If "_INPUT_" is not given
       * then the input box is appended to the string automatically.
       *  @type string
       *  @default Search:
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.search
       *
       *  @example
       *    // Input text box will be appended at the end automatically
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "search": "Filter records:"
       *        }
       *      } );
       *    } );
       *
       *  @example
       *    // Specify where the filter should appear
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "search": "Apply filter _INPUT_ to table"
       *        }
       *      } );
       *    } );
       */
      "sSearch": "Search:",
  
  
      /**
       * All of the language information can be stored in a file on the
       * server-side, which DataTables will look up if this parameter is passed.
       * It must store the URL of the language file, which is in a JSON format,
       * and the object has the same properties as the oLanguage object in the
       * initialiser object (i.e. the above parameters). Please refer to one of
       * the example language files to see how this works in action.
       *  @type string
       *  @default <i>Empty string - i.e. disabled</i>
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.url
       *
       *  @example
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "url": "http://www.sprymedia.co.uk/dataTables/lang.txt"
       *        }
       *      } );
       *    } );
       */
      "sUrl": "",
  
  
      /**
       * Text shown inside the table records when the is no information to be
       * displayed after filtering. `emptyTable` is shown when there is simply no
       * information in the table at all (regardless of filtering).
       *  @type string
       *  @default No matching records found
       *
       *  @dtopt Language
       *  @name DataTable.defaults.language.zeroRecords
       *
       *  @example
       *    $(document).ready( function() {
       *      $('#example').dataTable( {
       *        "language": {
       *          "zeroRecords": "No records to display"
       *        }
       *      } );
       *    } );
       */
      "sZeroRecords": "No matching records found"
    },
  
  
    /**
     * This parameter allows you to have define the global filtering state at
     * initialisation time. As an object the `search` parameter must be
     * defined, but all other parameters are optional. When `regex` is true,
     * the search string will be treated as a regular expression, when false
     * (default) it will be treated as a straight string. When `smart`
     * DataTables will use it's smart filtering methods (to word match at
     * any point in the data), when false this will not be done.
     *  @namespace
     *  @extends DataTable.models.oSearch
     *
     *  @dtopt Options
     *  @name DataTable.defaults.search
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "search": {"search": "Initial search"}
     *      } );
     *    } )
     */
    "oSearch": $.extend( {}, DataTable.models.oSearch ),
  
  
    /**
     * __Deprecated__ The functionality provided by this parameter has now been
     * superseded by that provided through `ajax`, which should be used instead.
     *
     * By default DataTables will look for the property `data` (or `aaData` for
     * compatibility with DataTables 1.9-) when obtaining data from an Ajax
     * source or for server-side processing - this parameter allows that
     * property to be changed. You can use Javascript dotted object notation to
     * get a data source for multiple levels of nesting.
     *  @type string
     *  @default data
     *
     *  @dtopt Options
     *  @dtopt Server-side
     *  @name DataTable.defaults.ajaxDataProp
     *
     *  @deprecated 1.10. Please use `ajax` for this functionality now.
     */
    "sAjaxDataProp": "data",
  
  
    /**
     * __Deprecated__ The functionality provided by this parameter has now been
     * superseded by that provided through `ajax`, which should be used instead.
     *
     * You can instruct DataTables to load data from an external
     * source using this parameter (use aData if you want to pass data in you
     * already have). Simply provide a url a JSON object can be obtained from.
     *  @type string
     *  @default null
     *
     *  @dtopt Options
     *  @dtopt Server-side
     *  @name DataTable.defaults.ajaxSource
     *
     *  @deprecated 1.10. Please use `ajax` for this functionality now.
     */
    "sAjaxSource": null,
  
  
    /**
     * This initialisation variable allows you to specify exactly where in the
     * DOM you want DataTables to inject the various controls it adds to the page
     * (for example you might want the pagination controls at the top of the
     * table). DIV elements (with or without a custom class) can also be added to
     * aid styling. The follow syntax is used:
     *   <ul>
     *     <li>The following options are allowed:
     *       <ul>
     *         <li>'l' - Length changing</li>
     *         <li>'f' - Filtering input</li>
     *         <li>'t' - The table!</li>
     *         <li>'i' - Information</li>
     *         <li>'p' - Pagination</li>
     *         <li>'r' - pRocessing</li>
     *       </ul>
     *     </li>
     *     <li>The following constants are allowed:
     *       <ul>
     *         <li>'H' - jQueryUI theme "header" classes ('fg-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix')</li>
     *         <li>'F' - jQueryUI theme "footer" classes ('fg-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix')</li>
     *       </ul>
     *     </li>
     *     <li>The following syntax is expected:
     *       <ul>
     *         <li>'&lt;' and '&gt;' - div elements</li>
     *         <li>'&lt;"class" and '&gt;' - div with a class</li>
     *         <li>'&lt;"#id" and '&gt;' - div with an ID</li>
     *       </ul>
     *     </li>
     *     <li>Examples:
     *       <ul>
     *         <li>'&lt;"wrapper"flipt&gt;'</li>
     *         <li>'&lt;lf&lt;t&gt;ip&gt;'</li>
     *       </ul>
     *     </li>
     *   </ul>
     *  @type string
     *  @default lfrtip <i>(when `jQueryUI` is false)</i> <b>or</b>
     *    <"H"lfr>t<"F"ip> <i>(when `jQueryUI` is true)</i>
     *
     *  @dtopt Options
     *  @name DataTable.defaults.dom
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "dom": '&lt;"top"i&gt;rt&lt;"bottom"flp&gt;&lt;"clear"&gt;'
     *      } );
     *    } );
     */
    "sDom": "lfrtip",
  
  
    /**
     * DataTables features four different built-in options for the buttons to
     * display for pagination control:
     *
     * * `simple` - 'Previous' and 'Next' buttons only
     * * 'simple_numbers` - 'Previous' and 'Next' buttons, plus page numbers
     * * `full` - 'First', 'Previous', 'Next' and 'Last' buttons
     * * `full_numbers` - 'First', 'Previous', 'Next' and 'Last' buttons, plus
     *   page numbers
     *  
     * Further methods can be added using {@link DataTable.ext.oPagination}.
     *  @type string
     *  @default simple_numbers
     *
     *  @dtopt Options
     *  @name DataTable.defaults.pagingType
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "pagingType": "full_numbers"
     *      } );
     *    } )
     */
    "sPaginationType": "simple_numbers",
  
  
    /**
     * Enable horizontal scrolling. When a table is too wide to fit into a
     * certain layout, or you have a large number of columns in the table, you
     * can enable x-scrolling to show the table in a viewport, which can be
     * scrolled. This property can be `true` which will allow the table to
     * scroll horizontally when needed, or any CSS unit, or a number (in which
     * case it will be treated as a pixel measurement). Setting as simply `true`
     * is recommended.
     *  @type boolean|string
     *  @default <i>blank string - i.e. disabled</i>
     *
     *  @dtopt Features
     *  @name DataTable.defaults.scrollX
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "scrollX": true,
     *        "scrollCollapse": true
     *      } );
     *    } );
     */
    "sScrollX": "",
  
  
    /**
     * This property can be used to force a DataTable to use more width than it
     * might otherwise do when x-scrolling is enabled. For example if you have a
     * table which requires to be well spaced, this parameter is useful for
     * "over-sizing" the table, and thus forcing scrolling. This property can by
     * any CSS unit, or a number (in which case it will be treated as a pixel
     * measurement).
     *  @type string
     *  @default <i>blank string - i.e. disabled</i>
     *
     *  @dtopt Options
     *  @name DataTable.defaults.scrollXInner
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "scrollX": "100%",
     *        "scrollXInner": "110%"
     *      } );
     *    } );
     */
    "sScrollXInner": "",
  
  
    /**
     * Enable vertical scrolling. Vertical scrolling will constrain the DataTable
     * to the given height, and enable scrolling for any data which overflows the
     * current viewport. This can be used as an alternative to paging to display
     * a lot of data in a small area (although paging and scrolling can both be
     * enabled at the same time). This property can be any CSS unit, or a number
     * (in which case it will be treated as a pixel measurement).
     *  @type string
     *  @default <i>blank string - i.e. disabled</i>
     *
     *  @dtopt Features
     *  @name DataTable.defaults.scrollY
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "scrollY": "200px",
     *        "paginate": false
     *      } );
     *    } );
     */
    "sScrollY": "",
  
  
    /**
     * __Deprecated__ The functionality provided by this parameter has now been
     * superseded by that provided through `ajax`, which should be used instead.
     *
     * Set the HTTP method that is used to make the Ajax call for server-side
     * processing or Ajax sourced data.
     *  @type string
     *  @default GET
     *
     *  @dtopt Options
     *  @dtopt Server-side
     *  @name DataTable.defaults.serverMethod
     *
     *  @deprecated 1.10. Please use `ajax` for this functionality now.
     */
    "sServerMethod": "GET",
  
  
    /**
     * DataTables makes use of renderers when displaying HTML elements for
     * a table. These renderers can be added or modified by plug-ins to
     * generate suitable mark-up for a site. For example the Bootstrap
     * integration plug-in for DataTables uses a paging button renderer to
     * display pagination buttons in the mark-up required by Bootstrap.
     *
     * For further information about the renderers available see
     * DataTable.ext.renderer
     *  @type string|object
     *  @default null
     *
     *  @name DataTable.defaults.renderer
     *
     */
    "renderer": null
  };
  
  _fnHungarianMap( DataTable.defaults );
  
  
  
  /*
   * Developer note - See note in model.defaults.js about the use of Hungarian
   * notation and camel case.
   */
  
  /**
   * Column options that can be given to DataTables at initialisation time.
   *  @namespace
   */
  DataTable.defaults.column = {
    /**
     * Define which column(s) an order will occur on for this column. This
     * allows a column's ordering to take multiple columns into account when
     * doing a sort or use the data from a different column. For example first
     * name / last name columns make sense to do a multi-column sort over the
     * two columns.
     *  @type array|int
     *  @default null <i>Takes the value of the column index automatically</i>
     *
     *  @name DataTable.defaults.column.orderData
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columnDefs`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [
     *          { "orderData": [ 0, 1 ], "targets": [ 0 ] },
     *          { "orderData": [ 1, 0 ], "targets": [ 1 ] },
     *          { "orderData": 2, "targets": [ 2 ] }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          { "orderData": [ 0, 1 ] },
     *          { "orderData": [ 1, 0 ] },
     *          { "orderData": 2 },
     *          null,
     *          null
     *        ]
     *      } );
     *    } );
     */
    "aDataSort": null,
    "iDataSort": -1,
  
  
    /**
     * You can control the default ordering direction, and even alter the
     * behaviour of the sort handler (i.e. only allow ascending ordering etc)
     * using this parameter.
     *  @type array
     *  @default [ 'asc', 'desc' ]
     *
     *  @name DataTable.defaults.column.orderSequence
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columnDefs`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [
     *          { "orderSequence": [ "asc" ], "targets": [ 1 ] },
     *          { "orderSequence": [ "desc", "asc", "asc" ], "targets": [ 2 ] },
     *          { "orderSequence": [ "desc" ], "targets": [ 3 ] }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          null,
     *          { "orderSequence": [ "asc" ] },
     *          { "orderSequence": [ "desc", "asc", "asc" ] },
     *          { "orderSequence": [ "desc" ] },
     *          null
     *        ]
     *      } );
     *    } );
     */
    "asSorting": [ 'asc', 'desc' ],
  
  
    /**
     * Enable or disable filtering on the data in this column.
     *  @type boolean
     *  @default true
     *
     *  @name DataTable.defaults.column.searchable
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columnDefs`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [
     *          { "searchable": false, "targets": [ 0 ] }
     *        ] } );
     *    } );
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          { "searchable": false },
     *          null,
     *          null,
     *          null,
     *          null
     *        ] } );
     *    } );
     */
    "bSearchable": true,
  
  
    /**
     * Enable or disable ordering on this column.
     *  @type boolean
     *  @default true
     *
     *  @name DataTable.defaults.column.orderable
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columnDefs`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [
     *          { "orderable": false, "targets": [ 0 ] }
     *        ] } );
     *    } );
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          { "orderable": false },
     *          null,
     *          null,
     *          null,
     *          null
     *        ] } );
     *    } );
     */
    "bSortable": true,
  
  
    /**
     * Enable or disable the display of this column.
     *  @type boolean
     *  @default true
     *
     *  @name DataTable.defaults.column.visible
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columnDefs`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [
     *          { "visible": false, "targets": [ 0 ] }
     *        ] } );
     *    } );
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          { "visible": false },
     *          null,
     *          null,
     *          null,
     *          null
     *        ] } );
     *    } );
     */
    "bVisible": true,
  
  
    /**
     * Developer definable function that is called whenever a cell is created (Ajax source,
     * etc) or processed for input (DOM source). This can be used as a compliment to mRender
     * allowing you to modify the DOM element (add background colour for example) when the
     * element is available.
     *  @type function
     *  @param {element} td The TD node that has been created
     *  @param {*} cellData The Data for the cell
     *  @param {array|object} rowData The data for the whole row
     *  @param {int} row The row index for the aoData data store
     *  @param {int} col The column index for aoColumns
     *
     *  @name DataTable.defaults.column.createdCell
     *  @dtopt Columns
     *
     *  @example
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [ {
     *          "targets": [3],
     *          "createdCell": function (td, cellData, rowData, row, col) {
     *            if ( cellData == "1.7" ) {
     *              $(td).css('color', 'blue')
     *            }
     *          }
     *        } ]
     *      });
     *    } );
     */
    "fnCreatedCell": null,
  
  
    /**
     * This parameter has been replaced by `data` in DataTables to ensure naming
     * consistency. `dataProp` can still be used, as there is backwards
     * compatibility in DataTables for this option, but it is strongly
     * recommended that you use `data` in preference to `dataProp`.
     *  @name DataTable.defaults.column.dataProp
     */
  
  
    /**
     * This property can be used to read data from any data source property,
     * including deeply nested objects / properties. `data` can be given in a
     * number of different ways which effect its behaviour:
     *
     * * `integer` - treated as an array index for the data source. This is the
     *   default that DataTables uses (incrementally increased for each column).
     * * `string` - read an object property from the data source. There are
     *   three 'special' options that can be used in the string to alter how
     *   DataTables reads the data from the source object:
     *    * `.` - Dotted Javascript notation. Just as you use a `.` in
     *      Javascript to read from nested objects, so to can the options
     *      specified in `data`. For example: `browser.version` or
     *      `browser.name`. If your object parameter name contains a period, use
     *      `\\` to escape it - i.e. `first\\.name`.
     *    * `[]` - Array notation. DataTables can automatically combine data
     *      from and array source, joining the data with the characters provided
     *      between the two brackets. For example: `name[, ]` would provide a
     *      comma-space separated list from the source array. If no characters
     *      are provided between the brackets, the original array source is
     *      returned.
     *    * `()` - Function notation. Adding `()` to the end of a parameter will
     *      execute a function of the name given. For example: `browser()` for a
     *      simple function on the data source, `browser.version()` for a
     *      function in a nested property or even `browser().version` to get an
     *      object property if the function called returns an object. Note that
     *      function notation is recommended for use in `render` rather than
     *      `data` as it is much simpler to use as a renderer.
     * * `null` - use the original data source for the row rather than plucking
     *   data directly from it. This action has effects on two other
     *   initialisation options:
     *    * `defaultContent` - When null is given as the `data` option and
     *      `defaultContent` is specified for the column, the value defined by
     *      `defaultContent` will be used for the cell.
     *    * `render` - When null is used for the `data` option and the `render`
     *      option is specified for the column, the whole data source for the
     *      row is used for the renderer.
     * * `function` - the function given will be executed whenever DataTables
     *   needs to set or get the data for a cell in the column. The function
     *   takes three parameters:
     *    * Parameters:
     *      * `{array|object}` The data source for the row
     *      * `{string}` The type call data requested - this will be 'set' when
     *        setting data or 'filter', 'display', 'type', 'sort' or undefined
     *        when gathering data. Note that when `undefined` is given for the
     *        type DataTables expects to get the raw data for the object back<
     *      * `{*}` Data to set when the second parameter is 'set'.
     *    * Return:
     *      * The return value from the function is not required when 'set' is
     *        the type of call, but otherwise the return is what will be used
     *        for the data requested.
     *
     * Note that `data` is a getter and setter option. If you just require
     * formatting of data for output, you will likely want to use `render` which
     * is simply a getter and thus simpler to use.
     *
     * Note that prior to DataTables 1.9.2 `data` was called `mDataProp`. The
     * name change reflects the flexibility of this property and is consistent
     * with the naming of mRender. If 'mDataProp' is given, then it will still
     * be used by DataTables, as it automatically maps the old name to the new
     * if required.
     *
     *  @type string|int|function|null
     *  @default null <i>Use automatically calculated column index</i>
     *
     *  @name DataTable.defaults.column.data
     *  @dtopt Columns
     *
     *  @example
     *    // Read table data from objects
     *    // JSON structure for each row:
     *    //   {
     *    //      "engine": {value},
     *    //      "browser": {value},
     *    //      "platform": {value},
     *    //      "version": {value},
     *    //      "grade": {value}
     *    //   }
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "ajaxSource": "sources/objects.txt",
     *        "columns": [
     *          { "data": "engine" },
     *          { "data": "browser" },
     *          { "data": "platform" },
     *          { "data": "version" },
     *          { "data": "grade" }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Read information from deeply nested objects
     *    // JSON structure for each row:
     *    //   {
     *    //      "engine": {value},
     *    //      "browser": {value},
     *    //      "platform": {
     *    //         "inner": {value}
     *    //      },
     *    //      "details": [
     *    //         {value}, {value}
     *    //      ]
     *    //   }
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "ajaxSource": "sources/deep.txt",
     *        "columns": [
     *          { "data": "engine" },
     *          { "data": "browser" },
     *          { "data": "platform.inner" },
     *          { "data": "platform.details.0" },
     *          { "data": "platform.details.1" }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using `data` as a function to provide different information for
     *    // sorting, filtering and display. In this case, currency (price)
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [ {
     *          "targets": [ 0 ],
     *          "data": function ( source, type, val ) {
     *            if (type === 'set') {
     *              source.price = val;
     *              // Store the computed dislay and filter values for efficiency
     *              source.price_display = val=="" ? "" : "$"+numberFormat(val);
     *              source.price_filter  = val=="" ? "" : "$"+numberFormat(val)+" "+val;
     *              return;
     *            }
     *            else if (type === 'display') {
     *              return source.price_display;
     *            }
     *            else if (type === 'filter') {
     *              return source.price_filter;
     *            }
     *            // 'sort', 'type' and undefined all just use the integer
     *            return source.price;
     *          }
     *        } ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using default content
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [ {
     *          "targets": [ 0 ],
     *          "data": null,
     *          "defaultContent": "Click to edit"
     *        } ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using array notation - outputting a list from an array
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [ {
     *          "targets": [ 0 ],
     *          "data": "name[, ]"
     *        } ]
     *      } );
     *    } );
     *
     */
    "mData": null,
  
  
    /**
     * This property is the rendering partner to `data` and it is suggested that
     * when you want to manipulate data for display (including filtering,
     * sorting etc) without altering the underlying data for the table, use this
     * property. `render` can be considered to be the the read only companion to
     * `data` which is read / write (then as such more complex). Like `data`
     * this option can be given in a number of different ways to effect its
     * behaviour:
     *
     * * `integer` - treated as an array index for the data source. This is the
     *   default that DataTables uses (incrementally increased for each column).
     * * `string` - read an object property from the data source. There are
     *   three 'special' options that can be used in the string to alter how
     *   DataTables reads the data from the source object:
     *    * `.` - Dotted Javascript notation. Just as you use a `.` in
     *      Javascript to read from nested objects, so to can the options
     *      specified in `data`. For example: `browser.version` or
     *      `browser.name`. If your object parameter name contains a period, use
     *      `\\` to escape it - i.e. `first\\.name`.
     *    * `[]` - Array notation. DataTables can automatically combine data
     *      from and array source, joining the data with the characters provided
     *      between the two brackets. For example: `name[, ]` would provide a
     *      comma-space separated list from the source array. If no characters
     *      are provided between the brackets, the original array source is
     *      returned.
     *    * `()` - Function notation. Adding `()` to the end of a parameter will
     *      execute a function of the name given. For example: `browser()` for a
     *      simple function on the data source, `browser.version()` for a
     *      function in a nested property or even `browser().version` to get an
     *      object property if the function called returns an object.
     * * `object` - use different data for the different data types requested by
     *   DataTables ('filter', 'display', 'type' or 'sort'). The property names
     *   of the object is the data type the property refers to and the value can
     *   defined using an integer, string or function using the same rules as
     *   `render` normally does. Note that an `_` option _must_ be specified.
     *   This is the default value to use if you haven't specified a value for
     *   the data type requested by DataTables.
     * * `function` - the function given will be executed whenever DataTables
     *   needs to set or get the data for a cell in the column. The function
     *   takes three parameters:
     *    * Parameters:
     *      * {array|object} The data source for the row (based on `data`)
     *      * {string} The type call data requested - this will be 'filter',
     *        'display', 'type' or 'sort'.
     *      * {array|object} The full data source for the row (not based on
     *        `data`)
     *    * Return:
     *      * The return value from the function is what will be used for the
     *        data requested.
     *
     *  @type string|int|function|object|null
     *  @default null Use the data source value.
     *
     *  @name DataTable.defaults.column.render
     *  @dtopt Columns
     *
     *  @example
     *    // Create a comma separated list from an array of objects
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "ajaxSource": "sources/deep.txt",
     *        "columns": [
     *          { "data": "engine" },
     *          { "data": "browser" },
     *          {
     *            "data": "platform",
     *            "render": "[, ].name"
     *          }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Execute a function to obtain data
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [ {
     *          "targets": [ 0 ],
     *          "data": null, // Use the full data source object for the renderer's source
     *          "render": "browserName()"
     *        } ]
     *      } );
     *    } );
     *
     *  @example
     *    // As an object, extracting different data for the different types
     *    // This would be used with a data source such as:
     *    //   { "phone": 5552368, "phone_filter": "5552368 555-2368", "phone_display": "555-2368" }
     *    // Here the `phone` integer is used for sorting and type detection, while `phone_filter`
     *    // (which has both forms) is used for filtering for if a user inputs either format, while
     *    // the formatted phone number is the one that is shown in the table.
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [ {
     *          "targets": [ 0 ],
     *          "data": null, // Use the full data source object for the renderer's source
     *          "render": {
     *            "_": "phone",
     *            "filter": "phone_filter",
     *            "display": "phone_display"
     *          }
     *        } ]
     *      } );
     *    } );
     *
     *  @example
     *    // Use as a function to create a link from the data source
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [ {
     *          "targets": [ 0 ],
     *          "data": "download_link",
     *          "render": function ( data, type, full ) {
     *            return '<a href="'+data+'">Download</a>';
     *          }
     *        } ]
     *      } );
     *    } );
     */
    "mRender": null,
  
  
    /**
     * Change the cell type created for the column - either TD cells or TH cells. This
     * can be useful as TH cells have semantic meaning in the table body, allowing them
     * to act as a header for a row (you may wish to add scope='row' to the TH elements).
     *  @type string
     *  @default td
     *
     *  @name DataTable.defaults.column.cellType
     *  @dtopt Columns
     *
     *  @example
     *    // Make the first column use TH cells
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [ {
     *          "targets": [ 0 ],
     *          "cellType": "th"
     *        } ]
     *      } );
     *    } );
     */
    "sCellType": "td",
  
  
    /**
     * Class to give to each cell in this column.
     *  @type string
     *  @default <i>Empty string</i>
     *
     *  @name DataTable.defaults.column.class
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columnDefs`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [
     *          { "class": "my_class", "targets": [ 0 ] }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          { "class": "my_class" },
     *          null,
     *          null,
     *          null,
     *          null
     *        ]
     *      } );
     *    } );
     */
    "sClass": "",
  
    /**
     * When DataTables calculates the column widths to assign to each column,
     * it finds the longest string in each column and then constructs a
     * temporary table and reads the widths from that. The problem with this
     * is that "mmm" is much wider then "iiii", but the latter is a longer
     * string - thus the calculation can go wrong (doing it properly and putting
     * it into an DOM object and measuring that is horribly(!) slow). Thus as
     * a "work around" we provide this option. It will append its value to the
     * text that is found to be the longest string for the column - i.e. padding.
     * Generally you shouldn't need this!
     *  @type string
     *  @default <i>Empty string<i>
     *
     *  @name DataTable.defaults.column.contentPadding
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          null,
     *          null,
     *          null,
     *          {
     *            "contentPadding": "mmm"
     *          }
     *        ]
     *      } );
     *    } );
     */
    "sContentPadding": "",
  
  
    /**
     * Allows a default value to be given for a column's data, and will be used
     * whenever a null data source is encountered (this can be because `data`
     * is set to null, or because the data source itself is null).
     *  @type string
     *  @default null
     *
     *  @name DataTable.defaults.column.defaultContent
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columnDefs`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [
     *          {
     *            "data": null,
     *            "defaultContent": "Edit",
     *            "targets": [ -1 ]
     *          }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          null,
     *          null,
     *          null,
     *          {
     *            "data": null,
     *            "defaultContent": "Edit"
     *          }
     *        ]
     *      } );
     *    } );
     */
    "sDefaultContent": null,
  
  
    /**
     * This parameter is only used in DataTables' server-side processing. It can
     * be exceptionally useful to know what columns are being displayed on the
     * client side, and to map these to database fields. When defined, the names
     * also allow DataTables to reorder information from the server if it comes
     * back in an unexpected order (i.e. if you switch your columns around on the
     * client-side, your server-side code does not also need updating).
     *  @type string
     *  @default <i>Empty string</i>
     *
     *  @name DataTable.defaults.column.name
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columnDefs`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [
     *          { "name": "engine", "targets": [ 0 ] },
     *          { "name": "browser", "targets": [ 1 ] },
     *          { "name": "platform", "targets": [ 2 ] },
     *          { "name": "version", "targets": [ 3 ] },
     *          { "name": "grade", "targets": [ 4 ] }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          { "name": "engine" },
     *          { "name": "browser" },
     *          { "name": "platform" },
     *          { "name": "version" },
     *          { "name": "grade" }
     *        ]
     *      } );
     *    } );
     */
    "sName": "",
  
  
    /**
     * Defines a data source type for the ordering which can be used to read
     * real-time information from the table (updating the internally cached
     * version) prior to ordering. This allows ordering to occur on user
     * editable elements such as form inputs.
     *  @type string
     *  @default std
     *
     *  @name DataTable.defaults.column.orderDataType
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columnDefs`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [
     *          { "orderDataType": "dom-text", "targets": [ 2, 3 ] },
     *          { "type": "numeric", "targets": [ 3 ] },
     *          { "orderDataType": "dom-select", "targets": [ 4 ] },
     *          { "orderDataType": "dom-checkbox", "targets": [ 5 ] }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          null,
     *          null,
     *          { "orderDataType": "dom-text" },
     *          { "orderDataType": "dom-text", "type": "numeric" },
     *          { "orderDataType": "dom-select" },
     *          { "orderDataType": "dom-checkbox" }
     *        ]
     *      } );
     *    } );
     */
    "sSortDataType": "std",
  
  
    /**
     * The title of this column.
     *  @type string
     *  @default null <i>Derived from the 'TH' value for this column in the
     *    original HTML table.</i>
     *
     *  @name DataTable.defaults.column.title
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columnDefs`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [
     *          { "title": "My column title", "targets": [ 0 ] }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          { "title": "My column title" },
     *          null,
     *          null,
     *          null,
     *          null
     *        ]
     *      } );
     *    } );
     */
    "sTitle": null,
  
  
    /**
     * The type allows you to specify how the data for this column will be
     * ordered. Four types (string, numeric, date and html (which will strip
     * HTML tags before ordering)) are currently available. Note that only date
     * formats understood by Javascript's Date() object will be accepted as type
     * date. For example: "Mar 26, 2008 5:03 PM". May take the values: 'string',
     * 'numeric', 'date' or 'html' (by default). Further types can be adding
     * through plug-ins.
     *  @type string
     *  @default null <i>Auto-detected from raw data</i>
     *
     *  @name DataTable.defaults.column.type
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columnDefs`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [
     *          { "type": "html", "targets": [ 0 ] }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          { "type": "html" },
     *          null,
     *          null,
     *          null,
     *          null
     *        ]
     *      } );
     *    } );
     */
    "sType": null,
  
  
    /**
     * Defining the width of the column, this parameter may take any CSS value
     * (3em, 20px etc). DataTables applies 'smart' widths to columns which have not
     * been given a specific width through this interface ensuring that the table
     * remains readable.
     *  @type string
     *  @default null <i>Automatic</i>
     *
     *  @name DataTable.defaults.column.width
     *  @dtopt Columns
     *
     *  @example
     *    // Using `columnDefs`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columnDefs": [
     *          { "width": "20%", "targets": [ 0 ] }
     *        ]
     *      } );
     *    } );
     *
     *  @example
     *    // Using `columns`
     *    $(document).ready( function() {
     *      $('#example').dataTable( {
     *        "columns": [
     *          { "width": "20%" },
     *          null,
     *          null,
     *          null,
     *          null
     *        ]
     *      } );
     *    } );
     */
    "sWidth": null
  };
  
  _fnHungarianMap( DataTable.defaults.column );
  
  
  
  /**
   * DataTables settings object - this holds all the information needed for a
   * given table, including configuration, data and current application of the
   * table options. DataTables does not have a single instance for each DataTable
   * with the settings attached to that instance, but rather instances of the
   * DataTable "class" are created on-the-fly as needed (typically by a
   * $().dataTable() call) and the settings object is then applied to that
   * instance.
   *
   * Note that this object is related to {@link DataTable.defaults} but this
   * one is the internal data store for DataTables's cache of columns. It should
   * NOT be manipulated outside of DataTables. Any configuration should be done
   * through the initialisation options.
   *  @namespace
   *  @todo Really should attach the settings object to individual instances so we
   *    don't need to create new instances on each $().dataTable() call (if the
   *    table already exists). It would also save passing oSettings around and
   *    into every single function. However, this is a very significant
   *    architecture change for DataTables and will almost certainly break
   *    backwards compatibility with older installations. This is something that
   *    will be done in 2.0.
   */
  DataTable.models.oSettings = {
    /**
     * Primary features of DataTables and their enablement state.
     *  @namespace
     */
    "oFeatures": {
  
      /**
       * Flag to say if DataTables should automatically try to calculate the
       * optimum table and columns widths (true) or not (false).
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bAutoWidth": null,
  
      /**
       * Delay the creation of TR and TD elements until they are actually
       * needed by a driven page draw. This can give a significant speed
       * increase for Ajax source and Javascript source data, but makes no
       * difference at all fro DOM and server-side processing tables.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bDeferRender": null,
  
      /**
       * Enable filtering on the table or not. Note that if this is disabled
       * then there is no filtering at all on the table, including fnFilter.
       * To just remove the filtering input use sDom and remove the 'f' option.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bFilter": null,
  
      /**
       * Table information element (the 'Showing x of y records' div) enable
       * flag.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bInfo": null,
  
      /**
       * Present a user control allowing the end user to change the page size
       * when pagination is enabled.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bLengthChange": null,
  
      /**
       * Pagination enabled or not. Note that if this is disabled then length
       * changing must also be disabled.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bPaginate": null,
  
      /**
       * Processing indicator enable flag whenever DataTables is enacting a
       * user request - typically an Ajax request for server-side processing.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bProcessing": null,
  
      /**
       * Server-side processing enabled flag - when enabled DataTables will
       * get all data from the server for every draw - there is no filtering,
       * sorting or paging done on the client-side.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bServerSide": null,
  
      /**
       * Sorting enablement flag.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bSort": null,
  
      /**
       * Multi-column sorting
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bSortMulti": null,
  
      /**
       * Apply a class to the columns which are being sorted to provide a
       * visual highlight or not. This can slow things down when enabled since
       * there is a lot of DOM interaction.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bSortClasses": null,
  
      /**
       * State saving enablement flag.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bStateSave": null
    },
  
  
    /**
     * Scrolling settings for a table.
     *  @namespace
     */
    "oScroll": {
      /**
       * When the table is shorter in height than sScrollY, collapse the
       * table container down to the height of the table (when true).
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type boolean
       */
      "bCollapse": null,
  
      /**
       * Width of the scrollbar for the web-browser's platform. Calculated
       * during table initialisation.
       *  @type int
       *  @default 0
       */
      "iBarWidth": 0,
  
      /**
       * Viewport width for horizontal scrolling. Horizontal scrolling is
       * disabled if an empty string.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type string
       */
      "sX": null,
  
      /**
       * Width to expand the table to when using x-scrolling. Typically you
       * should not need to use this.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type string
       *  @deprecated
       */
      "sXInner": null,
  
      /**
       * Viewport height for vertical scrolling. Vertical scrolling is disabled
       * if an empty string.
       * Note that this parameter will be set by the initialisation routine. To
       * set a default use {@link DataTable.defaults}.
       *  @type string
       */
      "sY": null
    },
  
    /**
     * Language information for the table.
     *  @namespace
     *  @extends DataTable.defaults.oLanguage
     */
    "oLanguage": {
      /**
       * Information callback function. See
       * {@link DataTable.defaults.fnInfoCallback}
       *  @type function
       *  @default null
       */
      "fnInfoCallback": null
    },
  
    /**
     * Browser support parameters
     *  @namespace
     */
    "oBrowser": {
      /**
       * Indicate if the browser incorrectly calculates width:100% inside a
       * scrolling element (IE6/7)
       *  @type boolean
       *  @default false
       */
      "bScrollOversize": false,
  
      /**
       * Determine if the vertical scrollbar is on the right or left of the
       * scrolling container - needed for rtl language layout, although not
       * all browsers move the scrollbar (Safari).
       *  @type boolean
       *  @default false
       */
      "bScrollbarLeft": false
    },
  
  
    "ajax": null,
  
  
    /**
     * Array referencing the nodes which are used for the features. The
     * parameters of this object match what is allowed by sDom - i.e.
     *   <ul>
     *     <li>'l' - Length changing</li>
     *     <li>'f' - Filtering input</li>
     *     <li>'t' - The table!</li>
     *     <li>'i' - Information</li>
     *     <li>'p' - Pagination</li>
     *     <li>'r' - pRocessing</li>
     *   </ul>
     *  @type array
     *  @default []
     */
    "aanFeatures": [],
  
    /**
     * Store data information - see {@link DataTable.models.oRow} for detailed
     * information.
     *  @type array
     *  @default []
     */
    "aoData": [],
  
    /**
     * Array of indexes which are in the current display (after filtering etc)
     *  @type array
     *  @default []
     */
    "aiDisplay": [],
  
    /**
     * Array of indexes for display - no filtering
     *  @type array
     *  @default []
     */
    "aiDisplayMaster": [],
  
    /**
     * Store information about each column that is in use
     *  @type array
     *  @default []
     */
    "aoColumns": [],
  
    /**
     * Store information about the table's header
     *  @type array
     *  @default []
     */
    "aoHeader": [],
  
    /**
     * Store information about the table's footer
     *  @type array
     *  @default []
     */
    "aoFooter": [],
  
    /**
     * Store the applied global search information in case we want to force a
     * research or compare the old search to a new one.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @namespace
     *  @extends DataTable.models.oSearch
     */
    "oPreviousSearch": {},
  
    /**
     * Store the applied search for each column - see
     * {@link DataTable.models.oSearch} for the format that is used for the
     * filtering information for each column.
     *  @type array
     *  @default []
     */
    "aoPreSearchCols": [],
  
    /**
     * Sorting that is applied to the table. Note that the inner arrays are
     * used in the following manner:
     * <ul>
     *   <li>Index 0 - column number</li>
     *   <li>Index 1 - current sorting direction</li>
     * </ul>
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type array
     *  @todo These inner arrays should really be objects
     */
    "aaSorting": null,
  
    /**
     * Sorting that is always applied to the table (i.e. prefixed in front of
     * aaSorting).
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type array
     *  @default []
     */
    "aaSortingFixed": [],
  
    /**
     * Classes to use for the striping of a table.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type array
     *  @default []
     */
    "asStripeClasses": null,
  
    /**
     * If restoring a table - we should restore its striping classes as well
     *  @type array
     *  @default []
     */
    "asDestroyStripes": [],
  
    /**
     * If restoring a table - we should restore its width
     *  @type int
     *  @default 0
     */
    "sDestroyWidth": 0,
  
    /**
     * Callback functions array for every time a row is inserted (i.e. on a draw).
     *  @type array
     *  @default []
     */
    "aoRowCallback": [],
  
    /**
     * Callback functions for the header on each draw.
     *  @type array
     *  @default []
     */
    "aoHeaderCallback": [],
  
    /**
     * Callback function for the footer on each draw.
     *  @type array
     *  @default []
     */
    "aoFooterCallback": [],
  
    /**
     * Array of callback functions for draw callback functions
     *  @type array
     *  @default []
     */
    "aoDrawCallback": [],
  
    /**
     * Array of callback functions for row created function
     *  @type array
     *  @default []
     */
    "aoRowCreatedCallback": [],
  
    /**
     * Callback functions for just before the table is redrawn. A return of
     * false will be used to cancel the draw.
     *  @type array
     *  @default []
     */
    "aoPreDrawCallback": [],
  
    /**
     * Callback functions for when the table has been initialised.
     *  @type array
     *  @default []
     */
    "aoInitComplete": [],
  
  
    /**
     * Callbacks for modifying the settings to be stored for state saving, prior to
     * saving state.
     *  @type array
     *  @default []
     */
    "aoStateSaveParams": [],
  
    /**
     * Callbacks for modifying the settings that have been stored for state saving
     * prior to using the stored values to restore the state.
     *  @type array
     *  @default []
     */
    "aoStateLoadParams": [],
  
    /**
     * Callbacks for operating on the settings object once the saved state has been
     * loaded
     *  @type array
     *  @default []
     */
    "aoStateLoaded": [],
  
    /**
     * Cache the table ID for quick access
     *  @type string
     *  @default <i>Empty string</i>
     */
    "sTableId": "",
  
    /**
     * The TABLE node for the main table
     *  @type node
     *  @default null
     */
    "nTable": null,
  
    /**
     * Permanent ref to the thead element
     *  @type node
     *  @default null
     */
    "nTHead": null,
  
    /**
     * Permanent ref to the tfoot element - if it exists
     *  @type node
     *  @default null
     */
    "nTFoot": null,
  
    /**
     * Permanent ref to the tbody element
     *  @type node
     *  @default null
     */
    "nTBody": null,
  
    /**
     * Cache the wrapper node (contains all DataTables controlled elements)
     *  @type node
     *  @default null
     */
    "nTableWrapper": null,
  
    /**
     * Indicate if when using server-side processing the loading of data
     * should be deferred until the second draw.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type boolean
     *  @default false
     */
    "bDeferLoading": false,
  
    /**
     * Indicate if all required information has been read in
     *  @type boolean
     *  @default false
     */
    "bInitialised": false,
  
    /**
     * Information about open rows. Each object in the array has the parameters
     * 'nTr' and 'nParent'
     *  @type array
     *  @default []
     */
    "aoOpenRows": [],
  
    /**
     * Dictate the positioning of DataTables' control elements - see
     * {@link DataTable.model.oInit.sDom}.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type string
     *  @default null
     */
    "sDom": null,
  
    /**
     * Which type of pagination should be used.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type string
     *  @default two_button
     */
    "sPaginationType": "two_button",
  
    /**
     * The state duration (for `stateSave`) in seconds.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type int
     *  @default 0
     */
    "iStateDuration": 0,
  
    /**
     * Array of callback functions for state saving. Each array element is an
     * object with the following parameters:
     *   <ul>
     *     <li>function:fn - function to call. Takes two parameters, oSettings
     *       and the JSON string to save that has been thus far created. Returns
     *       a JSON string to be inserted into a json object
     *       (i.e. '"param": [ 0, 1, 2]')</li>
     *     <li>string:sName - name of callback</li>
     *   </ul>
     *  @type array
     *  @default []
     */
    "aoStateSave": [],
  
    /**
     * Array of callback functions for state loading. Each array element is an
     * object with the following parameters:
     *   <ul>
     *     <li>function:fn - function to call. Takes two parameters, oSettings
     *       and the object stored. May return false to cancel state loading</li>
     *     <li>string:sName - name of callback</li>
     *   </ul>
     *  @type array
     *  @default []
     */
    "aoStateLoad": [],
  
    /**
     * State that was loaded. Useful for back reference
     *  @type object
     *  @default null
     */
    "oLoadedState": null,
  
    /**
     * Source url for AJAX data for the table.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type string
     *  @default null
     */
    "sAjaxSource": null,
  
    /**
     * Property from a given object from which to read the table data from. This
     * can be an empty string (when not server-side processing), in which case
     * it is  assumed an an array is given directly.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type string
     */
    "sAjaxDataProp": null,
  
    /**
     * Note if draw should be blocked while getting data
     *  @type boolean
     *  @default true
     */
    "bAjaxDataGet": true,
  
    /**
     * The last jQuery XHR object that was used for server-side data gathering.
     * This can be used for working with the XHR information in one of the
     * callbacks
     *  @type object
     *  @default null
     */
    "jqXHR": null,
  
    /**
     * JSON returned from the server in the last Ajax request
     *  @type object
     *  @default undefined
     */
    "json": undefined,
  
    /**
     * Data submitted as part of the last Ajax request
     *  @type object
     *  @default undefined
     */
    "oAjaxData": undefined,
  
    /**
     * Function to get the server-side data.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type function
     */
    "fnServerData": null,
  
    /**
     * Functions which are called prior to sending an Ajax request so extra
     * parameters can easily be sent to the server
     *  @type array
     *  @default []
     */
    "aoServerParams": [],
  
    /**
     * Send the XHR HTTP method - GET or POST (could be PUT or DELETE if
     * required).
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type string
     */
    "sServerMethod": null,
  
    /**
     * Format numbers for display.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type function
     */
    "fnFormatNumber": null,
  
    /**
     * List of options that can be used for the user selectable length menu.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type array
     *  @default []
     */
    "aLengthMenu": null,
  
    /**
     * Counter for the draws that the table does. Also used as a tracker for
     * server-side processing
     *  @type int
     *  @default 0
     */
    "iDraw": 0,
  
    /**
     * Indicate if a redraw is being done - useful for Ajax
     *  @type boolean
     *  @default false
     */
    "bDrawing": false,
  
    /**
     * Draw index (iDraw) of the last error when parsing the returned data
     *  @type int
     *  @default -1
     */
    "iDrawError": -1,
  
    /**
     * Paging display length
     *  @type int
     *  @default 10
     */
    "_iDisplayLength": 10,
  
    /**
     * Paging start point - aiDisplay index
     *  @type int
     *  @default 0
     */
    "_iDisplayStart": 0,
  
    /**
     * Server-side processing - number of records in the result set
     * (i.e. before filtering), Use fnRecordsTotal rather than
     * this property to get the value of the number of records, regardless of
     * the server-side processing setting.
     *  @type int
     *  @default 0
     *  @private
     */
    "_iRecordsTotal": 0,
  
    /**
     * Server-side processing - number of records in the current display set
     * (i.e. after filtering). Use fnRecordsDisplay rather than
     * this property to get the value of the number of records, regardless of
     * the server-side processing setting.
     *  @type boolean
     *  @default 0
     *  @private
     */
    "_iRecordsDisplay": 0,
  
    /**
     * Flag to indicate if jQuery UI marking and classes should be used.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type boolean
     */
    "bJUI": null,
  
    /**
     * The classes to use for the table
     *  @type object
     *  @default {}
     */
    "oClasses": {},
  
    /**
     * Flag attached to the settings object so you can check in the draw
     * callback if filtering has been done in the draw. Deprecated in favour of
     * events.
     *  @type boolean
     *  @default false
     *  @deprecated
     */
    "bFiltered": false,
  
    /**
     * Flag attached to the settings object so you can check in the draw
     * callback if sorting has been done in the draw. Deprecated in favour of
     * events.
     *  @type boolean
     *  @default false
     *  @deprecated
     */
    "bSorted": false,
  
    /**
     * Indicate that if multiple rows are in the header and there is more than
     * one unique cell per column, if the top one (true) or bottom one (false)
     * should be used for sorting / title by DataTables.
     * Note that this parameter will be set by the initialisation routine. To
     * set a default use {@link DataTable.defaults}.
     *  @type boolean
     */
    "bSortCellsTop": null,
  
    /**
     * Initialisation object that is used for the table
     *  @type object
     *  @default null
     */
    "oInit": null,
  
    /**
     * Destroy callback functions - for plug-ins to attach themselves to the
     * destroy so they can clean up markup and events.
     *  @type array
     *  @default []
     */
    "aoDestroyCallback": [],
  
  
    /**
     * Get the number of records in the current record set, before filtering
     *  @type function
     */
    "fnRecordsTotal": function ()
    {
      return _fnDataSource( this ) == 'ssp' ?
        this._iRecordsTotal * 1 :
        this.aiDisplayMaster.length;
    },
  
    /**
     * Get the number of records in the current record set, after filtering
     *  @type function
     */
    "fnRecordsDisplay": function ()
    {
      return _fnDataSource( this ) == 'ssp' ?
        this._iRecordsDisplay * 1 :
        this.aiDisplay.length;
    },
  
    /**
     * Get the display end point - aiDisplay index
     *  @type function
     */
    "fnDisplayEnd": function ()
    {
      var
        len      = this._iDisplayLength,
        start    = this._iDisplayStart,
        calc     = start + len,
        records  = this.aiDisplay.length,
        features = this.oFeatures,
        paginate = features.bPaginate;
  
      if ( features.bServerSide ) {
        return paginate === false || len === -1 ?
          start + records :
          Math.min( start+len, this._iRecordsDisplay );
      }
      else {
        return ! paginate || calc>records || len===-1 ?
          records :
          calc;
      }
    },
  
    /**
     * The DataTables object for this table
     *  @type object
     *  @default null
     */
    "oInstance": null,
  
    /**
     * Unique identifier for each instance of the DataTables object. If there
     * is an ID on the table node, then it takes that value, otherwise an
     * incrementing internal counter is used.
     *  @type string
     *  @default null
     */
    "sInstance": null,
  
    /**
     * tabindex attribute value that is added to DataTables control elements, allowing
     * keyboard navigation of the table and its controls.
     */
    "iTabIndex": 0,
  
    /**
     * DIV container for the footer scrolling table if scrolling
     */
    "nScrollHead": null,
  
    /**
     * DIV container for the footer scrolling table if scrolling
     */
    "nScrollFoot": null,
  
    /**
     * Last applied sort
     *  @type array
     *  @default []
     */
    "aLastSort": [],
  
    /**
     * Stored plug-in instances
     *  @type object
     *  @default {}
     */
    "oPlugins": {}
  };

  /**
   * Extension object for DataTables that is used to provide all extension
   * options.
   *
   * Note that the `DataTable.ext` object is available through
   * `jQuery.fn.dataTable.ext` where it may be accessed and manipulated. It is
   * also aliased to `jQuery.fn.dataTableExt` for historic reasons.
   *  @namespace
   *  @extends DataTable.models.ext
   */
  
  
  /**
   * DataTables extensions
   * 
   * This namespace acts as a collection area for plug-ins that can be used to
   * extend DataTables capabilities. Indeed many of the build in methods
   * use this method to provide their own capabilities (sorting methods for
   * example).
   *
   * Note that this namespace is aliased to `jQuery.fn.dataTableExt` for legacy
   * reasons
   *
   *  @namespace
   */
  DataTable.ext = _ext = {
    /**
     * Element class names
     *
     *  @type object
     *  @default {}
     */
    classes: {},
  
  
    /**
     * Error reporting.
     * 
     * How should DataTables report an error. Can take the value 'alert' or
     * 'throw'
     *
     *  @type string
     *  @default alert
     */
    errMode: "alert",
  
  
    /**
     * Feature plug-ins.
     * 
     * This is an array of objects which describe the feature plug-ins that are
     * available to DataTables. These feature plug-ins are then available for
     * use through the `dom` initialisation option.
     * 
     * Each feature plug-in is described by an object which must have the
     * following properties:
     * 
     * * `fnInit` - function that is used to initialise the plug-in,
     * * `cFeature` - a character so the feature can be enabled by the `dom`
     *   instillation option. This is case sensitive.
     *
     * The `fnInit` function has the following input parameters:
     *
     * 1. `{object}` DataTables settings object: see
     *    {@link DataTable.models.oSettings}
     *
     * And the following return is expected:
     * 
     * * {node|null} The element which contains your feature. Note that the
     *   return may also be void if your plug-in does not require to inject any
     *   DOM elements into DataTables control (`dom`) - for example this might
     *   be useful when developing a plug-in which allows table control via
     *   keyboard entry
     *
     *  @type array
     *
     *  @example
     *    $.fn.dataTable.ext.features.push( {
     *      "fnInit": function( oSettings ) {
     *        return new TableTools( { "oDTSettings": oSettings } );
     *      },
     *      "cFeature": "T"
     *    } );
     */
    feature: [],
  
  
    /**
     * Row searching.
     * 
     * This method of searching is complimentary to the default type based
     * searching, and a lot more comprehensive as it allows you complete control
     * over the searching logic. Each element in this array is a function
     * (parameters described below) that is called for every row in the table,
     * and your logic decides if it should be included in the searching data set
     * or not.
     *
     * Searching functions have the following input parameters:
     *
     * 1. `{object}` DataTables settings object: see
     *    {@link DataTable.models.oSettings}
     * 2. `{array|object}` Data for the row to be processed (same as the
     *    original format that was passed in as the data source, or an array
     *    from a DOM data source
     * 3. `{int}` Row index ({@link DataTable.models.oSettings.aoData}), which
     *    can be useful to retrieve the `TR` element if you need DOM interaction.
     *
     * And the following return is expected:
     *
     * * {boolean} Include the row in the searched result set (true) or not
     *   (false)
     *
     * Note that as with the main search ability in DataTables, technically this
     * is "filtering", since it is subtractive. However, for consistency in
     * naming we call it searching here.
     *
     *  @type array
     *  @default []
     *
     *  @example
     *    // The following example shows custom search being applied to the
     *    // fourth column (i.e. the data[3] index) based on two input values
     *    // from the end-user, matching the data in a certain range.
     *    $.fn.dataTable.ext.search.push(
     *      function( settings, data, dataIndex ) {
     *        var min = document.getElementById('min').value * 1;
     *        var max = document.getElementById('max').value * 1;
     *        var version = data[3] == "-" ? 0 : data[3]*1;
     *
     *        if ( min == "" && max == "" ) {
     *          return true;
     *        }
     *        else if ( min == "" && version < max ) {
     *          return true;
     *        }
     *        else if ( min < version && "" == max ) {
     *          return true;
     *        }
     *        else if ( min < version && version < max ) {
     *          return true;
     *        }
     *        return false;
     *      }
     *    );
     */
    search: [],
  
  
    /**
     * Internal functions, exposed for used in plug-ins.
     * 
     * Please note that you should not need to use the internal methods for
     * anything other than a plug-in (and even then, try to avoid if possible).
     * The internal function may change between releases.
     *
     *  @type object
     *  @default {}
     */
    internal: {},
  
  
    /**
     * Legacy configuration options. Enable and disable legacy options that
     * are available in DataTables.
     *
     *  @type object
     */
    legacy: {
      /**
       * Enable / disable DataTables 1.9 compatible server-side processing
       * requests
       *
       *  @type boolean
       *  @default null
       */
      ajax: null
    },
  
  
    /**
     * Pagination plug-in methods.
     * 
     * Each entry in this object is a function and defines which buttons should
     * be shown by the pagination rendering method that is used for the table:
     * {@link DataTable.ext.renderer.pageButton}. The renderer addresses how the
     * buttons are displayed in the document, while the functions here tell it
     * what buttons to display. This is done by returning an array of button
     * descriptions (what each button will do).
     *
     * Pagination types (the four built in options and any additional plug-in
     * options defined here) can be used through the `paginationType`
     * initialisation parameter.
     *
     * The functions defined take two parameters:
     *
     * 1. `{int} page` The current page index
     * 2. `{int} pages` The number of pages in the table
     *
     * Each function is expected to return an array where each element of the
     * array can be one of:
     *
     * * `first` - Jump to first page when activated
     * * `last` - Jump to last page when activated
     * * `previous` - Show previous page when activated
     * * `next` - Show next page when activated
     * * `{int}` - Show page of the index given
     * * `{array}` - A nested array containing the above elements to add a
     *   containing 'DIV' element (might be useful for styling).
     *
     * Note that DataTables v1.9- used this object slightly differently whereby
     * an object with two functions would be defined for each plug-in. That
     * ability is still supported by DataTables 1.10+ to provide backwards
     * compatibility, but this option of use is now decremented and no longer
     * documented in DataTables 1.10+.
     *
     *  @type object
     *  @default {}
     *
     *  @example
     *    // Show previous, next and current page buttons only
     *    $.fn.dataTableExt.oPagination.current = function ( page, pages ) {
     *      return [ 'previous', page, 'next' ];
     *    };
     */
    pager: {},
  
  
    renderer: {
      pageButton: {},
      header: {}
    },
  
  
    /**
     * Ordering plug-ins - custom data source
     * 
     * The extension options for ordering of data available here is complimentary
     * to the default type based ordering that DataTables typically uses. It
     * allows much greater control over the the data that is being used to
     * order a column, but is necessarily therefore more complex.
     * 
     * This type of ordering is useful if you want to do ordering based on data
     * live from the DOM (for example the contents of an 'input' element) rather
     * than just the static string that DataTables knows of.
     * 
     * The way these plug-ins work is that you create an array of the values you
     * wish to be ordering for the column in question and then return that
     * array. The data in the array much be in the index order of the rows in
     * the table (not the currently ordering order!). Which order data gathering
     * function is run here depends on the `dt-init columns.orderDataType`
     * parameter that is used for the column (if any).
     *
     * The functions defined take two parameters:
     *
     * 1. `{object}` DataTables settings object: see
     *    {@link DataTable.models.oSettings}
     * 2. `{int}` Target column index
     *
     * Each function is expected to return an array:
     *
     * * `{array}` Data for the column to be ordering upon
     *
     *  @type array
     *
     *  @example
     *    // Ordering using `input` node values
     *    $.fn.dataTable.ext.order['dom-text'] = function  ( settings, col )
     *    {
     *      return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
     *        return $('input', td).val();
     *      } );
     *    }
     */
    order: {},
  
  
    /**
     * Type based plug-ins.
     *
     * Each column in DataTables has a type assigned to it, either by automatic
     * detection or by direct assignment using the `type` option for the column.
     * The type of a column will effect how it is ordering and search (plug-ins
     * can also make use of the column type if required).
     *
     * @namespace
     */
    type: {
      /**
       * Type detection functions.
       *
       * The functions defined in this object are used to automatically detect
       * a column's type, making initialisation of DataTables super easy, even
       * when complex data is in the table.
       *
       * The functions defined take two parameters:
       *
         *  1. `{*}` Data from the column cell to be analysed
         *  2. `{settings}` DataTables settings object. This can be used to
         *     perform context specific type detection - for example detection
         *     based on language settings such as using a comma for a decimal
         *     place. Generally speaking the options from the settings will not
         *     be required
       *
       * Each function is expected to return:
       *
       * * `{string|null}` Data type detected, or null if unknown (and thus
       *   pass it on to the other type detection functions.
       *
       *  @type array
       *
       *  @example
       *    // Currency type detection plug-in:
       *    $.fn.dataTable.ext.type.detect.push(
       *      function ( data, settings ) {
       *        // Check the numeric part
       *        if ( ! $.isNumeric( data.substring(1) ) ) {
       *          return null;
       *        }
       *
       *        // Check prefixed by currency
       *        if ( data.charAt(0) == '$' || data.charAt(0) == '&pound;' ) {
       *          return 'currency';
       *        }
       *        return null;
       *      }
       *    );
       */
      detect: [],
  
  
      /**
       * Type based search formatting.
       *
       * The type based searching functions can be used to pre-format the
       * data to be search on. For example, it can be used to strip HTML
       * tags or to de-format telephone numbers for numeric only searching.
       *
       * Note that is a search is not defined for a column of a given type,
       * no search formatting will be performed.
       * 
       * Pre-processing of searching data plug-ins - When you assign the sType
       * for a column (or have it automatically detected for you by DataTables
       * or a type detection plug-in), you will typically be using this for
       * custom sorting, but it can also be used to provide custom searching
       * by allowing you to pre-processing the data and returning the data in
       * the format that should be searched upon. This is done by adding
       * functions this object with a parameter name which matches the sType
       * for that target column. This is the corollary of <i>afnSortData</i>
       * for searching data.
       *
       * The functions defined take a single parameter:
       *
         *  1. `{*}` Data from the column cell to be prepared for searching
       *
       * Each function is expected to return:
       *
       * * `{string|null}` Formatted string that will be used for the searching.
       *
       *  @type object
       *  @default {}
       *
       *  @example
       *    $.fn.dataTable.ext.type.search['title-numeric'] = function ( d ) {
       *      return d.replace(/\n/g," ").replace( /<.*?>/g, "" );
       *    }
       */
      search: {},
  
  
      /**
       * Type based ordering.
       *
       * The column type tells DataTables what ordering to apply to the table
       * when a column is sorted upon. The order for each type that is defined,
       * is defined by the functions available in this object.
       *
       * Each ordering option can be described by three properties added to
       * this object:
       *
       * * `{type}-pre` - Pre-formatting function
       * * `{type}-asc` - Ascending order function
       * * `{type}-desc` - Descending order function
       *
       * All three can be used together, only `{type}-pre` or only
       * `{type}-asc` and `{type}-desc` together. It is generally recommended
       * that only `{type}-pre` is used, as this provides the optimal
       * implementation in terms of speed, although the others are provided
       * for compatibility with existing Javascript sort functions.
       *
       * `{type}-pre`: Functions defined take a single parameter:
       *
         *  1. `{*}` Data from the column cell to be prepared for ordering
       *
       * And return:
       *
       * * `{*}` Data to be sorted upon
       *
       * `{type}-asc` and `{type}-desc`: Functions are typical Javascript sort
       * functions, taking two parameters:
       *
         *  1. `{*}` Data to compare to the second parameter
         *  2. `{*}` Data to compare to the first parameter
       *
       * And returning:
       *
       * * `{*}` Ordering match: <0 if first parameter should be sorted lower
       *   than the second parameter, ===0 if the two parameters are equal and
       *   >0 if the first parameter should be sorted height than the second
       *   parameter.
       * 
       *  @type object
       *  @default {}
       *
       *  @example
       *    // Numeric ordering of formatted numbers with a pre-formatter
       *    $.extend( $.fn.dataTable.ext.type.order, {
       *      "string-pre": function(x) {
       *        a = (a === "-" || a === "") ? 0 : a.replace( /[^\d\-\.]/g, "" );
       *        return parseFloat( a );
       *      }
       *    } );
       *
       *  @example
       *    // Case-sensitive string ordering, with no pre-formatting method
       *    $.extend( $.fn.dataTable.ext.order, {
       *      "string-case-asc": function(x,y) {
       *        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
       *      },
       *      "string-case-desc": function(x,y) {
       *        return ((x < y) ? 1 : ((x > y) ? -1 : 0));
       *      }
       *    } );
       */
      order: {}
    },
  
    /**
     * Unique DataTables instance counter
     *
     * @type int
     * @private
     */
    _unique: 0,
  
  
    //
    // Depreciated
    // The following properties are retained for backwards compatiblity only.
    // The should not be used in new projects and will be removed in a future
    // version
    //
  
    /**
     * Version check function.
     *  @type function
     *  @depreciated Since 1.10
     */
    fnVersionCheck: DataTable.fnVersionCheck,
  
  
    /**
     * Index for what 'this' index API functions should use
     *  @type int
     *  @deprecated Since v1.10
     */
    iApiIndex: 0,
  
  
    /**
     * jQuery UI class container
     *  @type object
     *  @deprecated Since v1.10
     */
    oJUIClasses: {},
  
  
    /**
     * Software version
     *  @type string
     *  @deprecated Since v1.10
     */
    sVersion: DataTable.version
  };
  
  
  //
  // Backwards compatibility. Alias to pre 1.10 Hungarian notation counter parts
  //
  $.extend( _ext, {
    afnFiltering: _ext.search,
    aTypes:       _ext.type.detect,
    ofnSearch:    _ext.type.search,
    oSort:        _ext.type.order,
    afnSortData:  _ext.order,
    aoFeatures:   _ext.feature,
    oApi:         _ext.internal,
    oStdClasses:  _ext.classes,
    oPagination:  _ext.pager
  } );
  
  
  $.extend( DataTable.ext.classes, {
    "sTable": "dataTable",
    "sNoFooter": "no-footer",
  
    /* Paging buttons */
    "sPageButton": "paginate_button",
    "sPageButtonActive": "current",
    "sPageButtonDisabled": "disabled",
  
    /* Striping classes */
    "sStripeOdd": "odd",
    "sStripeEven": "even",
  
    /* Empty row */
    "sRowEmpty": "dataTables_empty",
  
    /* Features */
    "sWrapper": "dataTables_wrapper",
    "sFilter": "dataTables_filter",
    "sInfo": "dataTables_info",
    "sPaging": "dataTables_paginate paging_", /* Note that the type is postfixed */
    "sLength": "dataTables_length",
    "sProcessing": "dataTables_processing",
  
    /* Sorting */
    "sSortAsc": "sorting_asc",
    "sSortDesc": "sorting_desc",
    "sSortable": "sorting", /* Sortable in both directions */
    "sSortableAsc": "sorting_asc_disabled",
    "sSortableDesc": "sorting_desc_disabled",
    "sSortableNone": "sorting_disabled",
    "sSortColumn": "sorting_", /* Note that an int is postfixed for the sorting order */
  
    /* Filtering */
    "sFilterInput": "",
  
    /* Page length */
    "sLengthSelect": "",
  
    /* Scrolling */
    "sScrollWrapper": "dataTables_scroll",
    "sScrollHead": "dataTables_scrollHead",
    "sScrollHeadInner": "dataTables_scrollHeadInner",
    "sScrollBody": "dataTables_scrollBody",
    "sScrollFoot": "dataTables_scrollFoot",
    "sScrollFootInner": "dataTables_scrollFootInner",
  
    /* Misc */
    "sHeaderTH": "",
    "sFooterTH": "",
  
    // Deprecated
    "sSortJUIAsc": "",
    "sSortJUIDesc": "",
    "sSortJUI": "",
    "sSortJUIAscAllowed": "",
    "sSortJUIDescAllowed": "",
    "sSortJUIWrapper": "",
    "sSortIcon": "",
    "sJUIHeader": "",
    "sJUIFooter": ""
  } );
  
  
  (function() {
  
  // Reused strings for better compression. Closure compiler appears to have a
  // weird edge case where it is trying to expand strings rather than use the
  // variable version. This results in about 200 bytes being added, for very
  // little preference benefit since it this run on script load only.
  var _empty = '';
  _empty = '';
  
  var _stateDefault = _empty + 'ui-state-default';
  var _sortIcon     = _empty + 'css_right ui-icon ui-icon-';
  var _headerFooter = _empty + 'fg-toolbar ui-toolbar ui-widget-header ui-helper-clearfix';
  
  $.extend( DataTable.ext.oJUIClasses, DataTable.ext.classes, {
    /* Full numbers paging buttons */
    "sPageButton":         "fg-button ui-button "+_stateDefault,
    "sPageButtonActive":   "ui-state-disabled",
    "sPageButtonDisabled": "ui-state-disabled",
  
    /* Features */
    "sPaging": "dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi "+
      "ui-buttonset-multi paging_", /* Note that the type is postfixed */
  
    /* Sorting */
    "sSortAsc":            _stateDefault+" sorting_asc",
    "sSortDesc":           _stateDefault+" sorting_desc",
    "sSortable":           _stateDefault+" sorting",
    "sSortableAsc":        _stateDefault+" sorting_asc_disabled",
    "sSortableDesc":       _stateDefault+" sorting_desc_disabled",
    "sSortableNone":       _stateDefault+" sorting_disabled",
    "sSortJUIAsc":         _sortIcon+"triangle-1-n",
    "sSortJUIDesc":        _sortIcon+"triangle-1-s",
    "sSortJUI":            _sortIcon+"carat-2-n-s",
    "sSortJUIAscAllowed":  _sortIcon+"carat-1-n",
    "sSortJUIDescAllowed": _sortIcon+"carat-1-s",
    "sSortJUIWrapper":     "DataTables_sort_wrapper",
    "sSortIcon":           "DataTables_sort_icon",
  
    /* Scrolling */
    "sScrollHead": "dataTables_scrollHead "+_stateDefault,
    "sScrollFoot": "dataTables_scrollFoot "+_stateDefault,
  
    /* Misc */
    "sHeaderTH":  _stateDefault,
    "sFooterTH":  _stateDefault,
    "sJUIHeader": _headerFooter+" ui-corner-tl ui-corner-tr",
    "sJUIFooter": _headerFooter+" ui-corner-bl ui-corner-br"
  } );
  
  }());
  
  
  
  var extPagination = DataTable.ext.pager;
  
  function _numbers ( page, pages ) {
    var
      numbers = [],
      buttons = extPagination.numbers_length,
      half = Math.floor( buttons / 2 ),
      i = 1;
  
    if ( pages <= buttons ) {
      numbers = _range( 0, pages );
    }
    else if ( page <= half ) {
      numbers = _range( 0, buttons-2 );
      numbers.push( 'ellipsis' );
      numbers.push( pages-1 );
    }
    else if ( page >= pages - 1 - half ) {
      numbers = _range( pages-(buttons-2), pages );
      numbers.splice( 0, 0, 'ellipsis' ); // no unshift in ie6
      numbers.splice( 0, 0, 0 );
    }
    else {
      numbers = _range( page-1, page+2 );
      numbers.push( 'ellipsis' );
      numbers.push( pages-1 );
      numbers.splice( 0, 0, 'ellipsis' );
      numbers.splice( 0, 0, 0 );
    }
  
    numbers.DT_el = 'span';
    return numbers;
  }
  
  
  $.extend( extPagination, {
    simple: function ( page, pages ) {
      return [ 'previous', 'next' ];
    },
  
    full: function ( page, pages ) {
      return [  'first', 'previous', 'next', 'last' ];
    },
  
    simple_numbers: function ( page, pages ) {
      return [ 'previous', _numbers(page, pages), 'next' ];
    },
  
    full_numbers: function ( page, pages ) {
      return [ 'first', 'previous', _numbers(page, pages), 'next', 'last' ];
    },
  
    // For testing and plug-ins to use
    _numbers: _numbers,
    numbers_length: 7
  } );
  
  
  $.extend( true, DataTable.ext.renderer, {
    pageButton: {
      _: function ( settings, host, idx, buttons, page, pages ) {
        var classes = settings.oClasses;
        var lang = settings.oLanguage.oPaginate;
        var btnDisplay, btnClass, counter=0;
  
        var attach = function( container, buttons ) {
          var i, ien, node, button;
          var clickHandler = function ( e ) {
            _fnPageChange( settings, e.data.action, true );
          };
  
          for ( i=0, ien=buttons.length ; i<ien ; i++ ) {
            button = buttons[i];
  
            if ( $.isArray( button ) ) {
              var inner = $( '<'+(button.DT_el || 'div')+'/>' )
                .appendTo( container );
              attach( inner, button );
            }
            else {
              btnDisplay = '';
              btnClass = '';
  
              switch ( button ) {
                case 'ellipsis':
                  container.append('<span>&hellip;</span>');
                  break;
  
                case 'first':
                  btnDisplay = lang.sFirst;
                  btnClass = button + (page > 0 ?
                    '' : ' '+classes.sPageButtonDisabled);
                  break;
  
                case 'previous':
                  btnDisplay = lang.sPrevious;
                  btnClass = button + (page > 0 ?
                    '' : ' '+classes.sPageButtonDisabled);
                  break;
  
                case 'next':
                  btnDisplay = lang.sNext;
                  btnClass = button + (page < pages-1 ?
                    '' : ' '+classes.sPageButtonDisabled);
                  break;
  
                case 'last':
                  btnDisplay = lang.sLast;
                  btnClass = button + (page < pages-1 ?
                    '' : ' '+classes.sPageButtonDisabled);
                  break;
  
                default:
                  btnDisplay = button + 1;
                  btnClass = page === button ?
                    classes.sPageButtonActive : '';
                  break;
              }
  
              if ( btnDisplay ) {
                node = $('<a>', {
                    'class': classes.sPageButton+' '+btnClass,
                    'aria-controls': settings.sTableId,
                    'data-dt-idx': counter,
                    'tabindex': settings.iTabIndex,
                    'id': idx === 0 && typeof button === 'string' ?
                      settings.sTableId +'_'+ button :
                      null
                  } )
                  .html( btnDisplay )
                  .appendTo( container );
  
                _fnBindAction(
                  node, {action: button}, clickHandler
                );
  
                counter++;
              }
            }
          }
        };
  
        // Because this approach is destroying and recreating the paging
        // elements, focus is lost on the select button which is bad for
        // accessibility. So we want to restore focus once the draw has
        // completed
        var activeEl = $(document.activeElement).data('dt-idx');
  
        attach( $(host).empty(), buttons );
  
        if ( activeEl !== null ) {
          $(host).find( '[data-dt-idx='+activeEl+']' ).focus();
        }
      }
    }
  } );
  
  
  
  var __numericReplace = function ( d, decimalPlace, re1, re2 ) {
    if ( !d || d === '-' ) {
      return -Infinity;
    }
  
    // If a decimal place other than `.` is used, it needs to be given to the
    // function so we can detect it and replace with a `.` which is the only
    // decimal place Javascript recognises - it is not locale aware.
    if ( decimalPlace ) {
      d = _numToDecimal( d, decimalPlace );
    }
  
    if ( d.replace ) {
      if ( re1 ) {
        d = d.replace( re1, '' );
      }
  
      if ( re2 ) {
        d = d.replace( re2, '' );
      }
    }
  
    return d * 1;
  };
  
  
  // Add the numeric 'deformatting' functions for sorting. This is done in a
  // function to provide an easy ability for the language options to add
  // additional methods if a non-period decimal place is used.
  function _addNumericSort ( decimalPlace ) {
    $.each(
      {
        // Plain numbers
        "num": function ( d ) {
          return __numericReplace( d, decimalPlace );
        },
  
        // Formatted numbers
        "num-fmt": function ( d ) {
          return __numericReplace( d, decimalPlace, _re_formatted_numeric );
        },
  
        // HTML numeric
        "html-num": function ( d ) {
          return __numericReplace( d, decimalPlace, _re_html );
        },
  
        // HTML numeric, formatted
        "html-num-fmt": function ( d ) {
          return __numericReplace( d, decimalPlace, _re_html, _re_formatted_numeric );
        }
      },
      function ( key, fn ) {
        _ext.type.order[ key+decimalPlace+'-pre' ] = fn;
      }
    );
  }
  
  
  // Default sort methods
  $.extend( _ext.type.order, {
    // Dates
    "date-pre": function ( d ) {
      return Date.parse( d ) || 0;
    },
  
    // html
    "html-pre": function ( a ) {
      return ! a ?
        '' :
        a.replace ?
          a.replace( /<.*?>/g, "" ).toLowerCase() :
          a+'';
    },
  
    // string
    "string-pre": function ( a ) {
      return typeof a === 'string' ?
        a.toLowerCase() :
        ! a || ! a.toString ?
          '' :
          a.toString();
    },
  
    // string-asc and -desc are retained only for compatibility with the old
    // sort methods
    "string-asc": function ( x, y ) {
      return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    },
  
    "string-desc": function ( x, y ) {
      return ((x < y) ? 1 : ((x > y) ? -1 : 0));
    }
  } );
  
  
  // Numeric sorting types - order doesn't matter here
  _addNumericSort( '' );
  
  
  // Built in type detection. See model.ext.aTypes for information about
  // what is required from this methods.
  $.extend( DataTable.ext.type.detect, [
    // Plain numbers - first since V8 detects some plain numbers as dates
    // e.g. Date.parse('55') (but not all, e.g. Date.parse('22')...).
    function ( d, settings )
    {
      var decimal = settings.oLanguage.sDecimal;
      return _isNumber( d, decimal ) ? 'num'+decimal : null;
    },
  
    // Dates (only those recognised by the browser's Date.parse)
    function ( d, settings )
    {
      // V8 will remove any unknown characters at the start of the expression,
      // leading to false matches such as `$245.12` being a valid date. See
      // forum thread 18941 for detail.
      if ( d && ! _re_date_start.test(d) ) {
        return null;
      }
      var parsed = Date.parse(d);
      return (parsed !== null && !isNaN(parsed)) || _empty(d) ? 'date' : null;
    },
  
    // Formatted numbers
    function ( d, settings )
    {
      var decimal = settings.oLanguage.sDecimal;
      return _isNumber( d, decimal, true ) ? 'num-fmt'+decimal : null;
    },
  
    // HTML numeric
    function ( d, settings )
    {
      var decimal = settings.oLanguage.sDecimal;
      return _htmlNumeric( d, decimal ) ? 'html-num'+decimal : null;
    },
  
    // HTML numeric, formatted
    function ( d, settings )
    {
      var decimal = settings.oLanguage.sDecimal;
      return _htmlNumeric( d, decimal, true ) ? 'html-num-fmt'+decimal : null;
    },
  
    // HTML (this is strict checking - there must be html)
    function ( d, settings )
    {
      return _empty( d ) || (typeof d === 'string' && d.indexOf('<') !== -1) ?
        'html' : null;
    }
  ] );
  
  
  
  // Filter formatting functions. See model.ext.ofnSearch for information about
  // what is required from these methods.
  
  
  $.extend( DataTable.ext.type.search, {
    html: function ( data ) {
      return _empty(data) ?
        '' :
        typeof data === 'string' ?
          data
            .replace( _re_new_lines, " " )
            .replace( _re_html, "" ) :
          '';
    },
  
    string: function ( data ) {
      return _empty(data) ?
        '' :
        typeof data === 'string' ?
          data.replace( _re_new_lines, " " ) :
          data;
    }
  } );
  
  
  
  $.extend( true, DataTable.ext.renderer, {
    header: {
      _: function ( settings, cell, column, classes ) {
        // No additional mark-up required
        // Attach a sort listener to update on sort - note that using the
        // `DT` namespace will allow the event to be removed automatically
        // on destroy, while the `dt` namespaced event is the one we are
        // listening for
        $(settings.nTable).on( 'order.dt.DT', function ( e, settings, sorting, columns ) {
          var colIdx = column.idx;
  
          cell
            .removeClass(
              column.sSortingClass +' '+
              classes.sSortAsc +' '+
              classes.sSortDesc
            )
            .addClass( columns[ colIdx ] == 'asc' ?
              classes.sSortAsc : columns[ colIdx ] == 'desc' ?
                classes.sSortDesc :
                column.sSortingClass
            );
        } );
      },
  
      jqueryui: function ( settings, cell, column, classes ) {
        var colIdx = column.idx;
  
        $('<div/>')
          .addClass( classes.sSortJUIWrapper )
          .append( cell.contents() )
          .append( $('<span/>')
            .addClass( classes.sSortIcon+' '+column.sSortingClassJUI )
          )
          .appendTo( cell );
  
        // Attach a sort listener to update on sort
        $(settings.nTable).on( 'order.dt.DT', function ( e, settings, sorting, columns ) {
          cell
            .removeClass( classes.sSortAsc +" "+classes.sSortDesc )
            .addClass( columns[ colIdx ] == 'asc' ?
              classes.sSortAsc : columns[ colIdx ] == 'desc' ?
                classes.sSortDesc :
                column.sSortingClass
            );
  
          cell
            .find( 'span.'+classes.sSortIcon )
            .removeClass(
              classes.sSortJUIAsc +" "+
              classes.sSortJUIDesc +" "+
              classes.sSortJUI +" "+
              classes.sSortJUIAscAllowed +" "+
              classes.sSortJUIDescAllowed
            )
            .addClass( columns[ colIdx ] == 'asc' ?
              classes.sSortJUIAsc : columns[ colIdx ] == 'desc' ?
                classes.sSortJUIDesc :
                column.sSortingClassJUI
            );
        } );
      }
    }
  } );
  
  /*
   * Public helper functions. These aren't used internally by DataTables, or
   * called by any of the options passed into DataTables, but they can be used
   * externally by developers working with DataTables. They are helper functions
   * to make working with DataTables a little bit easier.
   */
  
  /**
   * Helpers for `columns.render`.
   *
   * The options defined here can be used with the `columns.render` initialisation
   * option to provide a display renderer. The following functions are defined:
   *
   * * `number` - Will format numeric data (defined by `columns.data`) for
   *   display, retaining the original unformatted data for sorting and filtering.
   *   It takes 4 parameters:
   *   * `string` - Thousands grouping separator
   *   * `string` - Decimal point indicator
   *   * `integer` - Number of decimal points to show
   *   * `string` (optional) - Prefix.
   *
   * @example
   *   // Column definition using the number renderer
   *   {
   *     data: "salary",
   *     render: $.fn.dataTable.render.number( '\'', '.', 0, '$' )
   *   }
   *
   * @namespace
   */
  DataTable.render = {
    number: function ( thousands, decimal, precision, prefix ) {
      return {
        display: function ( d ) {
          d = parseFloat( d );
          var intPart = parseInt( d, 10 );
          var floatPart = precision ?
            (decimal+(d - intPart).toFixed( precision )).substring( 2 ):
            '';
  
          return (prefix||'') +
            intPart.toString().replace(
              /\B(?=(\d{3})+(?!\d))/g, thousands
            ) +
            floatPart;
        }
      };
    }
  };
  
  
  /*
   * This is really a good bit rubbish this method of exposing the internal methods
   * publicly... - To be fixed in 2.0 using methods on the prototype
   */
  
  
  /**
   * Create a wrapper function for exporting an internal functions to an external API.
   *  @param {string} fn API function name
   *  @returns {function} wrapped function
   *  @memberof DataTable#internal
   */
  function _fnExternApiFunc (fn)
  {
    return function() {
      var args = [_fnSettingsFromNode( this[DataTable.ext.iApiIndex] )].concat(
        Array.prototype.slice.call(arguments)
      );
      return DataTable.ext.internal[fn].apply( this, args );
    };
  }
  
  
  /**
   * Reference to internal functions for use by plug-in developers. Note that
   * these methods are references to internal functions and are considered to be
   * private. If you use these methods, be aware that they are liable to change
   * between versions.
   *  @namespace
   */
  $.extend( DataTable.ext.internal, {
    _fnExternApiFunc: _fnExternApiFunc,
    _fnBuildAjax: _fnBuildAjax,
    _fnAjaxUpdate: _fnAjaxUpdate,
    _fnAjaxParameters: _fnAjaxParameters,
    _fnAjaxUpdateDraw: _fnAjaxUpdateDraw,
    _fnAjaxDataSrc: _fnAjaxDataSrc,
    _fnAddColumn: _fnAddColumn,
    _fnColumnOptions: _fnColumnOptions,
    _fnAdjustColumnSizing: _fnAdjustColumnSizing,
    _fnVisibleToColumnIndex: _fnVisibleToColumnIndex,
    _fnColumnIndexToVisible: _fnColumnIndexToVisible,
    _fnVisbleColumns: _fnVisbleColumns,
    _fnGetColumns: _fnGetColumns,
    _fnColumnTypes: _fnColumnTypes,
    _fnApplyColumnDefs: _fnApplyColumnDefs,
    _fnHungarianMap: _fnHungarianMap,
    _fnCamelToHungarian: _fnCamelToHungarian,
    _fnLanguageCompat: _fnLanguageCompat,
    _fnBrowserDetect: _fnBrowserDetect,
    _fnAddData: _fnAddData,
    _fnAddTr: _fnAddTr,
    _fnNodeToDataIndex: _fnNodeToDataIndex,
    _fnNodeToColumnIndex: _fnNodeToColumnIndex,
    _fnGetCellData: _fnGetCellData,
    _fnSetCellData: _fnSetCellData,
    _fnSplitObjNotation: _fnSplitObjNotation,
    _fnGetObjectDataFn: _fnGetObjectDataFn,
    _fnSetObjectDataFn: _fnSetObjectDataFn,
    _fnGetDataMaster: _fnGetDataMaster,
    _fnClearTable: _fnClearTable,
    _fnDeleteIndex: _fnDeleteIndex,
    _fnInvalidateRow: _fnInvalidateRow,
    _fnGetRowElements: _fnGetRowElements,
    _fnCreateTr: _fnCreateTr,
    _fnBuildHead: _fnBuildHead,
    _fnDrawHead: _fnDrawHead,
    _fnDraw: _fnDraw,
    _fnReDraw: _fnReDraw,
    _fnAddOptionsHtml: _fnAddOptionsHtml,
    _fnDetectHeader: _fnDetectHeader,
    _fnGetUniqueThs: _fnGetUniqueThs,
    _fnFeatureHtmlFilter: _fnFeatureHtmlFilter,
    _fnFilterComplete: _fnFilterComplete,
    _fnFilterCustom: _fnFilterCustom,
    _fnFilterColumn: _fnFilterColumn,
    _fnFilter: _fnFilter,
    _fnFilterCreateSearch: _fnFilterCreateSearch,
    _fnEscapeRegex: _fnEscapeRegex,
    _fnFilterData: _fnFilterData,
    _fnFeatureHtmlInfo: _fnFeatureHtmlInfo,
    _fnUpdateInfo: _fnUpdateInfo,
    _fnInfoMacros: _fnInfoMacros,
    _fnInitialise: _fnInitialise,
    _fnInitComplete: _fnInitComplete,
    _fnLengthChange: _fnLengthChange,
    _fnFeatureHtmlLength: _fnFeatureHtmlLength,
    _fnFeatureHtmlPaginate: _fnFeatureHtmlPaginate,
    _fnPageChange: _fnPageChange,
    _fnFeatureHtmlProcessing: _fnFeatureHtmlProcessing,
    _fnProcessingDisplay: _fnProcessingDisplay,
    _fnFeatureHtmlTable: _fnFeatureHtmlTable,
    _fnScrollDraw: _fnScrollDraw,
    _fnApplyToChildren: _fnApplyToChildren,
    _fnCalculateColumnWidths: _fnCalculateColumnWidths,
    _fnThrottle: _fnThrottle,
    _fnConvertToWidth: _fnConvertToWidth,
    _fnScrollingWidthAdjust: _fnScrollingWidthAdjust,
    _fnGetWidestNode: _fnGetWidestNode,
    _fnGetMaxLenString: _fnGetMaxLenString,
    _fnStringToCss: _fnStringToCss,
    _fnScrollBarWidth: _fnScrollBarWidth,
    _fnSortFlatten: _fnSortFlatten,
    _fnSort: _fnSort,
    _fnSortAria: _fnSortAria,
    _fnSortListener: _fnSortListener,
    _fnSortAttachListener: _fnSortAttachListener,
    _fnSortingClasses: _fnSortingClasses,
    _fnSortData: _fnSortData,
    _fnSaveState: _fnSaveState,
    _fnLoadState: _fnLoadState,
    _fnSettingsFromNode: _fnSettingsFromNode,
    _fnLog: _fnLog,
    _fnMap: _fnMap,
    _fnBindAction: _fnBindAction,
    _fnCallbackReg: _fnCallbackReg,
    _fnCallbackFire: _fnCallbackFire,
    _fnLengthOverflow: _fnLengthOverflow,
    _fnRenderer: _fnRenderer,
    _fnDataSource: _fnDataSource,
    _fnRowAttributes: _fnRowAttributes,
    _fnCalculateEnd: function () {} // Used by a lot of plug-ins, but redundant
                                    // in 1.10, so this dead-end function is
                                    // added to prevent errors
  } );
  

  // jQuery access
  $.fn.dataTable = DataTable;

  // Legacy aliases
  $.fn.dataTableSettings = DataTable.settings;
  $.fn.dataTableExt = DataTable.ext;

  // With a capital `D` we return a DataTables API instance rather than a
  // jQuery object
  $.fn.DataTable = function ( opts ) {
    return $(this).dataTable( opts ).api();
  };

  // All properties that are available to $.fn.dataTable should also be
  // available on $.fn.DataTable
  $.each( DataTable, function ( prop, val ) {
    $.fn.DataTable[ prop ] = val;
  } );


  // Information about events fired by DataTables - for documentation.
  /**
   * Draw event, fired whenever the table is redrawn on the page, at the same
   * point as fnDrawCallback. This may be useful for binding events or
   * performing calculations when the table is altered at all.
   *  @name DataTable#draw.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
   */

  /**
   * Search event, fired when the searching applied to the table (using the
   * built-in global search, or column filters) is altered.
   *  @name DataTable#search.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
   */

  /**
   * Page change event, fired when the paging of the table is altered.
   *  @name DataTable#page.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
   */

  /**
   * Order event, fired when the ordering applied to the table is altered.
   *  @name DataTable#order.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
   */

  /**
   * DataTables initialisation complete event, fired when the table is fully
   * drawn, including Ajax data loaded, if Ajax data is required.
   *  @name DataTable#init.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} oSettings DataTables settings object
   *  @param {object} json The JSON object request from the server - only
   *    present if client-side Ajax sourced data is used</li></ol>
   */

  /**
   * State save event, fired when the table has changed state a new state save
   * is required. This event allows modification of the state saving object
   * prior to actually doing the save, including addition or other state
   * properties (for plug-ins) or modification of a DataTables core property.
   *  @name DataTable#stateSaveParams.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} oSettings DataTables settings object
   *  @param {object} json The state information to be saved
   */

  /**
   * State load event, fired when the table is loading state from the stored
   * data, but prior to the settings object being modified by the saved state
   * - allowing modification of the saved state is required or loading of
   * state for a plug-in.
   *  @name DataTable#stateLoadParams.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} oSettings DataTables settings object
   *  @param {object} json The saved state information
   */

  /**
   * State loaded event, fired when state has been loaded from stored data and
   * the settings object has been modified by the loaded data.
   *  @name DataTable#stateLoaded.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} oSettings DataTables settings object
   *  @param {object} json The saved state information
   */

  /**
   * Processing event, fired when DataTables is doing some kind of processing
   * (be it, order, searcg or anything else). It can be used to indicate to
   * the end user that there is something happening, or that something has
   * finished.
   *  @name DataTable#processing.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} oSettings DataTables settings object
   *  @param {boolean} bShow Flag for if DataTables is doing processing or not
   */

  /**
   * Ajax (XHR) event, fired whenever an Ajax request is completed from a
   * request to made to the server for new data. This event is called before
   * DataTables processed the returned data, so it can also be used to pre-
   * process the data returned from the server, if needed.
   *
   * Note that this trigger is called in `fnServerData`, if you override
   * `fnServerData` and which to use this event, you need to trigger it in you
   * success function.
   *  @name DataTable#xhr.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
   *  @param {object} json JSON returned from the server
   *
   *  @example
   *     // Use a custom property returned from the server in another DOM element
   *     $('#table').dataTable().on('xhr.dt', function (e, settings, json) {
   *       $('#status').html( json.status );
   *     } );
   *
   *  @example
   *     // Pre-process the data returned from the server
   *     $('#table').dataTable().on('xhr.dt', function (e, settings, json) {
   *       for ( var i=0, ien=json.aaData.length ; i<ien ; i++ ) {
   *         json.aaData[i].sum = json.aaData[i].one + json.aaData[i].two;
   *       }
   *       // Note no return - manipulate the data directly in the JSON object.
   *     } );
   */

  /**
   * Destroy event, fired when the DataTable is destroyed by calling fnDestroy
   * or passing the bDestroy:true parameter in the initialisation object. This
   * can be used to remove bound events, added DOM nodes, etc.
   *  @name DataTable#destroy.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
   */

  /**
   * Page length change event, fired when number of records to show on each
   * page (the length) is changed.
   *  @name DataTable#length.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
   *  @param {integer} len New length
   */

  /**
   * Column sizing has changed.
   *  @name DataTable#column-sizing.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
   */

  /**
   * Column visibility has changed.
   *  @name DataTable#column-visibility.dt
   *  @event
   *  @param {event} e jQuery event object
   *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
   *  @param {int} column Column index
   *  @param {bool} vis `false` if column now hidden, or `true` if visible
   */

  return $.fn.dataTable;
}));

}(window, document));


(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery','datatables'], factory);
    }
    else {
        factory(jQuery);
    }
}(function ($) {
    /* Set the defaults for DataTables initialisation */
  $.extend( true, $.fn.dataTable.defaults, {
    "sDom": "<'row'<'col-sm-12'<'pull-right'f><'pull-left'l>r<'clearfix'>>>t<'row'<'col-sm-12'<'pull-left'i><'pull-right'p><'clearfix'>>>",
    "sPaginationType": "bs_normal",
    /* At the moment, this is the easiest way I could find to sneak these into oSettings without them getting wiped by _fnMap. */
    "oLanguage": {
      "sIconClassFirst": "glyphicon glyphicon-backward",
      "sIconClassLast": "glyphicon glyphicon-forward",
      "sIconClassPrevious": "glyphicon glyphicon-chevron-left",
      "sIconClassNext": "glyphicon glyphicon-chevron-right"
    }
  } );

  /* Default class modification */
  $.extend( $.fn.dataTableExt.oStdClasses, {
    "sWrapper": "dataTables_wrapper form-inline"
  } );

  /* API method to get paging information */
  $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
  {
    return {
      "iStart":         oSettings._iDisplayStart,
      "iEnd":           oSettings.fnDisplayEnd(),
      "iLength":        oSettings._iDisplayLength,
      "iTotal":         oSettings.fnRecordsTotal(),
      "iFilteredTotal": oSettings.fnRecordsDisplay(),
      "iPage":          oSettings._iDisplayLength === -1 ?
        0 : Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
      "iTotalPages":    oSettings._iDisplayLength === -1 ?
        0 : Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
    };
  };

  /* Bootstrap style pagination control */
  $.extend( $.fn.dataTableExt.oPagination, {
    "bs_normal": {
      "fnInit": function( oSettings, nPaging, fnDraw ) {
        var oLang = oSettings.oLanguage.oPaginate;
        var fnClickHandler = function ( e ) {
          e.preventDefault();
          if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
            fnDraw( oSettings );
          }
        };
        $(nPaging).append(
          '<ul class="pagination">'+
            '<li class="prev disabled"><a href="#"><span class="'+oSettings.oLanguage.sIconClassPrevious+'"></span>&nbsp;'+oLang.sPrevious+'</a></li>'+
            '<li class="next disabled"><a href="#">'+oLang.sNext+'&nbsp;<span class="'+oSettings.oLanguage.sIconClassNext+'"></span></a></li>'+
          '</ul>'
        );
        var els = $('a', nPaging);
        $(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
        $(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
      },
      "fnUpdate": function ( oSettings, fnDraw ) {
        var iListLength = 5;
        var oPaging = oSettings.oInstance.fnPagingInfo();
        var an = oSettings.aanFeatures.p;
        var i, ien, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);
        if ( oPaging.iTotalPages < iListLength) {
          iStart = 1;
          iEnd = oPaging.iTotalPages;
        }
        else if ( oPaging.iPage <= iHalf ) {
          iStart = 1;
          iEnd = iListLength;
        } else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
          iStart = oPaging.iTotalPages - iListLength + 1;
          iEnd = oPaging.iTotalPages;
        } else {
          iStart = oPaging.iPage - iHalf + 1;
          iEnd = iStart + iListLength - 1;
        }
        for ( i=0, ien=an.length ; i<ien ; i++ ) {
          $('li:gt(0)', an[i]).filter(':not(:last)').remove();
          for ( j=iStart ; j<=iEnd ; j++ ) {
            sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
            $('<li '+sClass+'><a href="#">'+j+'</a></li>')
              .insertBefore( $('li:last', an[i])[0] )
              .bind('click', function (e) {
                e.preventDefault();
                if ( oSettings.oApi._fnPageChange(oSettings, parseInt($('a', this).text(),10)-1) ) {
                  fnDraw( oSettings );
                }
              } );
          }
          if ( oPaging.iPage === 0 ) {
            $('li:first', an[i]).addClass('disabled');
          } else {
            $('li:first', an[i]).removeClass('disabled');
          }

          if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
            $('li:last', an[i]).addClass('disabled');
          } else {
            $('li:last', an[i]).removeClass('disabled');
          }
        }
      }
    },  
    "bs_two_button": {
      "fnInit": function ( oSettings, nPaging, fnCallbackDraw )
      {
        var oLang = oSettings.oLanguage.oPaginate;
        var oClasses = oSettings.oClasses;
        var fnClickHandler = function ( e ) {
          if ( oSettings.oApi._fnPageChange( oSettings, e.data.action ) )
          {
            fnCallbackDraw( oSettings );
          }
        };
        var sAppend = '<ul class="pagination">'+
          '<li class="prev"><a class="'+oSettings.oClasses.sPagePrevDisabled+'" tabindex="'+oSettings.iTabIndex+'" role="button"><span class="'+oSettings.oLanguage.sIconClassPrevious+'"></span>&nbsp;'+oLang.sPrevious+'</a></li>'+
          '<li class="next"><a class="'+oSettings.oClasses.sPageNextDisabled+'" tabindex="'+oSettings.iTabIndex+'" role="button">'+oLang.sNext+'&nbsp;<span class="'+oSettings.oLanguage.sIconClassNext+'"></span></a></li>'+
          '</ul>';
        $(nPaging).append( sAppend );
        var els = $('a', nPaging);
        var nPrevious = els[0],
          nNext = els[1];
        oSettings.oApi._fnBindAction( nPrevious, {action: "previous"}, fnClickHandler );
        oSettings.oApi._fnBindAction( nNext,     {action: "next"},     fnClickHandler );
        if ( !oSettings.aanFeatures.p )
        {
          nPaging.id = oSettings.sTableId+'_paginate';
          nPrevious.id = oSettings.sTableId+'_previous';
          nNext.id = oSettings.sTableId+'_next';
          nPrevious.setAttribute('aria-controls', oSettings.sTableId);
          nNext.setAttribute('aria-controls', oSettings.sTableId);
        }
      },
      "fnUpdate": function ( oSettings, fnCallbackDraw )
      {
        if ( !oSettings.aanFeatures.p )
        {
          return;
        }
        var oPaging = oSettings.oInstance.fnPagingInfo();
        var oClasses = oSettings.oClasses;
        var an = oSettings.aanFeatures.p;
        var nNode;
        for ( var i=0, iLen=an.length ; i<iLen ; i++ )
        {
          if ( oPaging.iPage === 0 ) {
            $('li:first', an[i]).addClass('disabled');
          } else {
            $('li:first', an[i]).removeClass('disabled');
          }

          if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
            $('li:last', an[i]).addClass('disabled');
          } else {
            $('li:last', an[i]).removeClass('disabled');
          }
        }
      }
    },
    "bs_four_button": {
      "fnInit": function ( oSettings, nPaging, fnCallbackDraw )
        {
          var oLang = oSettings.oLanguage.oPaginate;
          var oClasses = oSettings.oClasses;
          var fnClickHandler = function ( e ) {
            e.preventDefault()
            if ( oSettings.oApi._fnPageChange( oSettings, e.data.action ) )
            {
              fnCallbackDraw( oSettings );
            }
          };
          $(nPaging).append(
            '<ul class="pagination">'+
            '<li class="disabled"><a  tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageFirst+'"><span class="'+oSettings.oLanguage.sIconClassFirst+'"></span>&nbsp;'+oLang.sFirst+'</a></li>'+
            '<li class="disabled"><a  tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPagePrevious+'"><span class="'+oSettings.oLanguage.sIconClassPrevious+'"></span>&nbsp;'+oLang.sPrevious+'</a></li>'+
            '<li><a tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageNext+'">'+oLang.sNext+'&nbsp;<span class="'+oSettings.oLanguage.sIconClassNext+'"></span></a></li>'+
            '<li><a tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageLast+'">'+oLang.sLast+'&nbsp;<span class="'+oSettings.oLanguage.sIconClassLast+'"></span></a></li>'+
            '</ul>'
          );
          var els = $('a', nPaging);
          var nFirst = els[0],
            nPrev = els[1],
            nNext = els[2],
            nLast = els[3];
          oSettings.oApi._fnBindAction( nFirst, {action: "first"},    fnClickHandler );
          oSettings.oApi._fnBindAction( nPrev,  {action: "previous"}, fnClickHandler );
          oSettings.oApi._fnBindAction( nNext,  {action: "next"},     fnClickHandler );
          oSettings.oApi._fnBindAction( nLast,  {action: "last"},     fnClickHandler );
          if ( !oSettings.aanFeatures.p )
          {
            nPaging.id = oSettings.sTableId+'_paginate';
            nFirst.id =oSettings.sTableId+'_first';
            nPrev.id =oSettings.sTableId+'_previous';
            nNext.id =oSettings.sTableId+'_next';
            nLast.id =oSettings.sTableId+'_last';
          }
        },
      "fnUpdate": function ( oSettings, fnCallbackDraw )
        {
          if ( !oSettings.aanFeatures.p )
          {
            return;
          }
          var oPaging = oSettings.oInstance.fnPagingInfo();
          var oClasses = oSettings.oClasses;
          var an = oSettings.aanFeatures.p;
          var nNode;
          for ( var i=0, iLen=an.length ; i<iLen ; i++ )
          {
            if ( oPaging.iPage === 0 ) {
              $('li:eq(0)', an[i]).addClass('disabled');
              $('li:eq(1)', an[i]).addClass('disabled');
            } else {
              $('li:eq(0)', an[i]).removeClass('disabled');
              $('li:eq(1)', an[i]).removeClass('disabled');
            }

            if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
              $('li:eq(2)', an[i]).addClass('disabled');
              $('li:eq(3)', an[i]).addClass('disabled');
            } else {
              $('li:eq(2)', an[i]).removeClass('disabled');
              $('li:eq(3)', an[i]).removeClass('disabled');
            }
          }
        }
    },
    "bs_full": {
      "fnInit": function ( oSettings, nPaging, fnCallbackDraw )
        {
          var oLang = oSettings.oLanguage.oPaginate;
          var oClasses = oSettings.oClasses;
          var fnClickHandler = function ( e ) {
            if ( oSettings.oApi._fnPageChange( oSettings, e.data.action ) )
            {
              fnCallbackDraw( oSettings );
            }
          };
          $(nPaging).append(
            '<ul class="pagination">'+
            '<li class="disabled"><a  tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageFirst+'">'+oLang.sFirst+'</a></li>'+
            '<li class="disabled"><a  tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPagePrevious+'">'+oLang.sPrevious+'</a></li>'+
            '<li><a tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageNext+'">'+oLang.sNext+'</a></li>'+
            '<li><a tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageLast+'">'+oLang.sLast+'</a></li>'+
            '</ul>'
          );
          var els = $('a', nPaging);
          var nFirst = els[0],
            nPrev = els[1],
            nNext = els[2],
            nLast = els[3];
          oSettings.oApi._fnBindAction( nFirst, {action: "first"},    fnClickHandler );
          oSettings.oApi._fnBindAction( nPrev,  {action: "previous"}, fnClickHandler );
          oSettings.oApi._fnBindAction( nNext,  {action: "next"},     fnClickHandler );
          oSettings.oApi._fnBindAction( nLast,  {action: "last"},     fnClickHandler );
          if ( !oSettings.aanFeatures.p )
          {
            nPaging.id = oSettings.sTableId+'_paginate';
            nFirst.id =oSettings.sTableId+'_first';
            nPrev.id =oSettings.sTableId+'_previous';
            nNext.id =oSettings.sTableId+'_next';
            nLast.id =oSettings.sTableId+'_last';
          }
        },
      "fnUpdate": function ( oSettings, fnCallbackDraw )
        {
          if ( !oSettings.aanFeatures.p )
          {
            return;
          }
          var oPaging = oSettings.oInstance.fnPagingInfo();
          var iPageCount = $.fn.dataTableExt.oPagination.iFullNumbersShowPages;
          var iPageCountHalf = Math.floor(iPageCount / 2);
          var iPages = Math.ceil((oSettings.fnRecordsDisplay()) / oSettings._iDisplayLength);
          var iCurrentPage = Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength) + 1;
          var sList = "";
          var iStartButton, iEndButton, i, iLen;
          var oClasses = oSettings.oClasses;
          var anButtons, anStatic, nPaginateList, nNode;
          var an = oSettings.aanFeatures.p;
          var fnBind = function (j) {
            oSettings.oApi._fnBindAction( this, {"page": j+iStartButton-1}, function(e) {
              if( oSettings.oApi._fnPageChange( oSettings, e.data.page ) ){
                fnCallbackDraw( oSettings );
              }
              e.preventDefault();
            } );
          };
          if ( oSettings._iDisplayLength === -1 )
          {
            iStartButton = 1;
            iEndButton = 1;
            iCurrentPage = 1;
          }
          else if (iPages < iPageCount)
          {
            iStartButton = 1;
            iEndButton = iPages;
          }
          else if (iCurrentPage <= iPageCountHalf)
          {
            iStartButton = 1;
            iEndButton = iPageCount;
          }
          else if (iCurrentPage >= (iPages - iPageCountHalf))
          {
            iStartButton = iPages - iPageCount + 1;
            iEndButton = iPages;
          }
          else
          {
            iStartButton = iCurrentPage - Math.ceil(iPageCount / 2) + 1;
            iEndButton = iStartButton + iPageCount - 1;
          }
          for ( i=iStartButton ; i<=iEndButton ; i++ )
          {
            sList += (iCurrentPage !== i) ?
              '<li><a tabindex="'+oSettings.iTabIndex+'">'+oSettings.fnFormatNumber(i)+'</a></li>' :
              '<li class="active"><a tabindex="'+oSettings.iTabIndex+'">'+oSettings.fnFormatNumber(i)+'</a></li>';
          }
          for ( i=0, iLen=an.length ; i<iLen ; i++ )
          {
            nNode = an[i];
            if ( !nNode.hasChildNodes() )
            {
              continue;
            }
            $('li:gt(1)', an[i]).filter(':not(li:eq(-2))').filter(':not(li:eq(-1))').remove();
            if ( oPaging.iPage === 0 ) {
              $('li:eq(0)', an[i]).addClass('disabled');
              $('li:eq(1)', an[i]).addClass('disabled');
            } else {
              $('li:eq(0)', an[i]).removeClass('disabled');
              $('li:eq(1)', an[i]).removeClass('disabled');
            }
            if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
              $('li:eq(-1)', an[i]).addClass('disabled');
              $('li:eq(-2)', an[i]).addClass('disabled');
            } else {
              $('li:eq(-1)', an[i]).removeClass('disabled');
              $('li:eq(-2)', an[i]).removeClass('disabled');
            }
            $(sList)
              .insertBefore($('li:eq(-2)', an[i]))
              .bind('click', function (e) {
                e.preventDefault();
                if ( oSettings.oApi._fnPageChange(oSettings, parseInt($('a', this).text(),10)-1) ) {
                  fnCallbackDraw( oSettings );
                }
              });
          }
        }
    } 
  } );


  /*
   * TableTools Bootstrap compatibility
   * Required TableTools 2.1+
   */
  if ( $.fn.DataTable.TableTools ) {
    // Set the classes that TableTools uses to something suitable for Bootstrap
    $.extend( true, $.fn.DataTable.TableTools.classes, {
      "container": "DTTT btn-group",
      "buttons": {
        "normal": "btn",
        "disabled": "disabled"
      },
      "collection": {
        "container": "DTTT_dropdown dropdown-menu",
        "buttons": {
          "normal": "",
          "disabled": "disabled"
        }
      },
      "print": {
        "info": "DTTT_print_info modal"
      },
      "select": {
        "row": "active"
      }
    } );

    // Have the collection use a bootstrap compatible dropdown
    $.extend( true, $.fn.DataTable.TableTools.DEFAULTS.oTags, {
      "collection": {
        "container": "ul",
        "button": "li",
        "liner": "a"
      }
    } );
  }
}));








// http://stackoverflow.com/questions/9847580/how-to-detect-safari-chrome-ie-firefox-and-opera-browser
var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
var isChrome = !!window.chrome && !isOpera;              // Chrome 1+
var isChromium = isChrome && navigator.userAgent.indexOf('Chromium') >= 0;
var isIE = /*@cc_on!@*/false || !!document.documentMode; // At least IE6


var invoiceOld;
function generatePDF(invoice, javascript, logo, x, y, force) {
  invoice = calculateAmounts(invoice);  
  var a = copyInvoice(invoice);
  var b = copyInvoice(invoiceOld);
  if (!force && _.isEqual(a, b)) {
    return;
  }
  invoiceOld = invoice;
  doc = GetPdf(invoice, javascript, logo, x, y);
  return doc;
}

function copyInvoice(orig) {
  if (!orig) return false;
  var copy = JSON.stringify(orig);
  var copy = JSON.parse(copy);
  return copy;
}


function GetPdf(invoice, javascript, logo, x, y){
  
  var layout = {
    accountTop: 40,

    marginLeft: 30,
    marginRight: 586,
    headerTop: 60,

    headerLeft: 360,
    headerRight: 555,
    rowHeight: 15,

    tableRowHeight: 6,
    footerLeft: 420,
    tablePadding: 8,
    tableTop: 190,

    descriptionLeft: 162,
    unitCostRight: 410,
    qtyRight: 480,
    taxRight: 480,
    lineTotalRight: 550
  };

  if (invoice.has_taxes)
  {
    layout.descriptionLeft -= 20;
    layout.unitCostRight -= 40;
    layout.qtyRight -= 40;
  }  
  invoice.status = 1;

 	if (!invoice.branch_name)
  	{
		var account = invoice.account;
		var branches = invoice.branches;
		var client = invoice.client;
  		invoice.account_name = account.name;
  		invoice.account_uniper = account.uniper;

		invoice.branch_name = invoice.branch_id;
		invoice.branch_name = invoice.ale;

		var k = 0;
		for (var i=0; i<branches.length; i++) {
			var branch = branches[i];
			if (branch.public_id == invoice.branch_id) {
				k = i;
				break;
			}
		}
		invoice.branch_name = branches[k].name;
	    invoice.address2 = branches[k].address2;
	    invoice.address1 = branches[k].address1;
	    invoice.phone = branches[k].postal_code;
	    invoice.city = branches[k].city;
	    invoice.state = branches[k].state;
	    invoice.number_autho = branches[k].number_autho;
	    invoice.deadline = branches[k].deadline;
	    invoice.activity_pri = branches[k].activity_pri;
	    invoice.aux1 = branches[k].aux2;
		invoice.third = branches[k].third;
	    invoice.account_nit = account.nit;
	    invoice.invoice_number = '0';

	    invoice.client_name = client.name;
	    invoice.client_nit = client.nit;
	    invoice.control_code = '00-00-00-00';
	    invoice.status = 0;
  	}


  /*
   @param orientation One of "portrait" or "landscape" (or shortcuts "p" (Default), "l")
   @param unit Measurement unit to be used when coordinates are specified. One of "pt" (points), "mm" (Default), "cm", "in"
   @param format One of 'a3', 'a4' (Default),'a5' ,'letter' ,'legal'
   @returns {jsPDF}
   */
  var doc = new jsPDF('p', 'pt', 'letter');

  //doc.getStringUnitWidth = function(param) { console.log('getStringUnitWidth: %s', param); return 0};

  //Set PDF properities
  doc.setProperties({
      title: 'Factura ' + invoice.invoice_number,
      subject: '',
      author: 'facturavirtual.com.bo',
      keywords: 'pdf, factura',
      creator: 'facturavirtual.com.bo'
  });

  //set default style for report
  doc.setFont('Helvetica','');


 	if(logo)
	{
  		eval("doc.addImage('" + logo + "', 'JPEG', " + x + ", " + y + ");");
	}
	console.log("after this part all is ok");
  //eval(javascript);
  displaytittle(doc, invoice, layout);

	displayHeader(doc, invoice, layout);

	doc.setFontSize(11);
	doc.setFontType('normal');
	invoice.economic_activity = "sin actividad economica";
	var activi = invoice.economic_activity;
	var activityX = 565 - (doc.getStringUnitWidth(activi) * doc.internal.getFontSize());
	doc.text(activityX, layout.headerTop+45, activi);

	var aleguisf_date = getInvoiceDate(invoice);

	layout.headerTop = 50;
	layout.tableTop = 190;
	doc.setLineWidth(0.8);        
	doc.setFillColor(255, 255, 255);
	doc.roundedRect(layout.marginLeft - layout.tablePadding, layout.headerTop+95, 572, 35, 2, 2, 'FD');

	var marginLeft1=30;
	var marginLeft2=80;
	var marginLeft3=180;
	var marginLeft4=220;

	datos1y = 160;
	datos1xy = 15;
	doc.setFontSize(11);
	doc.setFontType('bold');
	doc.text(marginLeft1, datos1y, 'Fecha : ');
	doc.setFontType('normal');

	doc.text(marginLeft2-5, datos1y, aleguisf_date);

	doc.setFontType('bold');
	doc.text(marginLeft1, datos1y+datos1xy, 'Señor(es) :');
	doc.setFontType('normal');
	doc.text(marginLeft2+15, datos1y+datos1xy, invoice.client_name);

	doc.setFontType('bold');
	doc.text(marginLeft3+240, datos1y+datos1xy, 'NIT/CI :');
	doc.setFontType('normal');
	doc.text(marginLeft4+245, datos1y+datos1xy, invoice.client_nit);

	doc.setDrawColor(241,241,241);
	doc.setFillColor(241,241,241);
	doc.rect(layout.marginLeft - layout.tablePadding, layout.headerTop+140, 572, 20, 'FD');

	doc.setFontSize(10);
	doc.setFontType('bold');
	invoice.branch_type_id=1;
	if(invoice.branch_type_id==1)
	{

	    displayInvoiceHeader(doc, invoice, layout);
		var y = displayInvoiceItems(doc, invoice, layout);
		displayQR(doc, layout, invoice, y);
		y += displaySubtotals(doc, layout, invoice, y+15, layout.unitCostRight+35);
	}
	if(invoice.branch_type_id==2)
	{
	    displayInvoiceHeader2(doc, invoice, layout);
		var y = displayInvoiceItems2(doc, invoice, layout);
		displayQR(doc, layout, invoice, y);
		y += displaySubtotals2(doc, layout, invoice, y+15, layout.unitCostRight+35);
	}

	y -=10;		
	displayNotesAndTerms(doc, layout, invoice, y);

  return doc;
}


function SetPdfColor(color, doc, role){
  /*if (role === 'primary' && NINJA.primaryColor) {
    return setDocHexColor(doc, NINJA.primaryColor);
  } else if (role === 'secondary' && NINJA.secondaryColor) {
    return setDocHexColor(doc, NINJA.secondaryColor);
  }*/

  if (color=='LightBlue') {
      return doc.setTextColor(41,156, 194);
  }

  if (color=='Black') {
      return doc.setTextColor(46,43,43);//select color black
  }
  if (color=='GrayLogo') {
      return doc.setTextColor(207,241, 241);//select color Custom Report GRAY
  }

  if (color=='GrayBackground') {
      return doc.setTextColor(251,251, 251);//select color Custom Report GRAY
  }

  if (color=='GrayText') {
      return doc.setTextColor(161,160,160);//select color Custom Report GRAY Colour
  }

  if (color=='White') {
      return doc.setTextColor(255,255,255);//select color Custom Report GRAY Colour
  }

  if (color=='SomeGreen') {
      return doc.setTextColor(54,164,152);//select color Custom Report GRAY Colour
  }

  if (color=='LightGrayReport2-gray') {
      return doc.setTextColor(240,240,240);//select color Custom Report GRAY Colour
  }

  if (color=='LightGrayReport2-white') {
      return doc.setTextColor(251,251,251);//select color Custom Report GRAY Colour
  }

  if (color=='orange') {
      return doc.setTextColor(234,121,45);//select color Custom Report GRAY Colour
  }

  if (color=='Green') {
      return doc.setTextColor(55,109,69);
  }
}


/* Handle converting variables in the invoices (ie, MONTH+1) */
function processVariables(str) {
  if (!str) return '';
  var variables = ['MONTH','QUARTER','YEAR'];
  for (var i=0; i<variables.length; i++) {
    var variable = variables[i];        
        var regexp = new RegExp(':' + variable + '[+-]?[\\d]*', 'g');
        var matches = str.match(regexp);        
        if (!matches) {
             continue;  
        }
        for (var j=0; j<matches.length; j++) {
            var match = matches[j];
            var offset = 0;                
            if (match.split('+').length > 1) {
                offset = match.split('+')[1];
            } else if (match.split('-').length > 1) {
                offset = parseInt(match.split('-')[1]) * -1;
            }
            str = str.replace(match, getDatePart(variable, offset));            
        }
  }   
  
  return str;
}

function getDatePart(part, offset) {
    offset = parseInt(offset);
    if (!offset) {
        offset = 0;
    }
  if (part == 'MONTH') {
    return getMonth(offset);
  } else if (part == 'QUARTER') {
    return getQuarter(offset);
  } else if (part == 'YEAR') {
    return getYear(offset);
  }
}

function getMonth(offset) {
  var today = new Date();
  var months = [ "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December" ];
  var month = today.getMonth();
    month = parseInt(month) + offset;    
    month = month % 12;
    if (month < 0) {
      month += 12;
    }
    return months[month];
}

function getYear(offset) {
  var today = new Date();
  var year = today.getFullYear();
  return parseInt(year) + offset;
}

function getQuarter(offset) {
  var today = new Date();
  var quarter = Math.floor((today.getMonth() + 3) / 3);
  quarter += offset;
    quarter = quarter % 4;
    if (quarter == 0) {
         quarter = 4;   
    }
    return 'Q' + quarter;
}


/* Default class modification */
if ($.fn.dataTableExt) {
  $.extend( $.fn.dataTableExt.oStdClasses, {
    "sWrapper": "dataTables_wrapper form-inline"
  } );


  /* API method to get paging information */
  $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
  {
    return {
      "iStart":         oSettings._iDisplayStart,
      "iEnd":           oSettings.fnDisplayEnd(),
      "iLength":        oSettings._iDisplayLength,
      "iTotal":         oSettings.fnRecordsTotal(),
      "iFilteredTotal": oSettings.fnRecordsDisplay(),
      "iPage":          oSettings._iDisplayLength === -1 ?
        0 : Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
      "iTotalPages":    oSettings._iDisplayLength === -1 ?
        0 : Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
    };
  };


  /* Bootstrap style pagination control */
  $.extend( $.fn.dataTableExt.oPagination, {
    "bootstrap": {
      "fnInit": function( oSettings, nPaging, fnDraw ) {
        var oLang = oSettings.oLanguage.oPaginate;
        var fnClickHandler = function ( e ) {
          e.preventDefault();
          if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
            fnDraw( oSettings );
          }
        };

        $(nPaging).addClass('pagination').append(
          '<ul class="pagination">'+
            '<li class="prev disabled"><a href="#">&laquo;</a></li>'+
            '<li class="next disabled"><a href="#">&raquo;</a></li>'+
          '</ul>'
        );
        var els = $('a', nPaging);
        $(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
        $(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
      },

      "fnUpdate": function ( oSettings, fnDraw ) {
        var iListLength = 5;
        var oPaging = oSettings.oInstance.fnPagingInfo();
        var an = oSettings.aanFeatures.p;
        var i, ien, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

        if ( oPaging.iTotalPages < iListLength) {
          iStart = 1;
          iEnd = oPaging.iTotalPages;
        }
        else if ( oPaging.iPage <= iHalf ) {
          iStart = 1;
          iEnd = iListLength;
        } else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
          iStart = oPaging.iTotalPages - iListLength + 1;
          iEnd = oPaging.iTotalPages;
        } else {
          iStart = oPaging.iPage - iHalf + 1;
          iEnd = iStart + iListLength - 1;
        }

        for ( i=0, ien=an.length ; i<ien ; i++ ) {
          // Remove the middle elements
          $('li:gt(0)', an[i]).filter(':not(:last)').remove();

          // Add the new list items and their event handlers
          for ( j=iStart ; j<=iEnd ; j++ ) {
            sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
            $('<li '+sClass+'><a href="#">'+j+'</a></li>')
              .insertBefore( $('li:last', an[i])[0] )
              .bind('click', function (e) {
                e.preventDefault();
                oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
                fnDraw( oSettings );
              } );
          }

          // Add / remove disabled classes from the static elements
          if ( oPaging.iPage === 0 ) {
            $('li:first', an[i]).addClass('disabled');
          } else {
            $('li:first', an[i]).removeClass('disabled');
          }

          if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
            $('li:last', an[i]).addClass('disabled');
          } else {
            $('li:last', an[i]).removeClass('disabled');
          }
        }
      }
    }
  } );
}

/*
 * TableTools Bootstrap compatibility
 * Required TableTools 2.1+
 */
if ( $.fn.DataTable.TableTools ) {
  // Set the classes that TableTools uses to something suitable for Bootstrap
  $.extend( true, $.fn.DataTable.TableTools.classes, {
    "container": "DTTT btn-group",
    "buttons": {
      "normal": "btn",
      "disabled": "disabled"
    },
    "collection": {
      "container": "DTTT_dropdown dropdown-menu",
      "buttons": {
        "normal": "",
        "disabled": "disabled"
      }
    },
    "print": {
      "info": "DTTT_print_info modal"
    },
    "select": {
      "row": "active"
    }
  } );

  // Have the collection use a bootstrap compatible dropdown
  $.extend( true, $.fn.DataTable.TableTools.DEFAULTS.oTags, {
    "collection": {
      "container": "ul",
      "button": "li",
      "liner": "a"
    }
  } );
}

/*
$(document).ready(function() {
  $('#example').dataTable( {
    "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
    "sPaginationType": "bootstrap",
    "oLanguage": {
      "sLengthMenu": "_MENU_ records per page"
    }
  } );
} );
*/

function isStorageSupported() {
  try {
      return 'localStorage' in window && window['localStorage'] !== null;
  } catch (e) {
      return false;
  }
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};

$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


function enableHoverClick($combobox, $entityId, url) {
  /*
  $combobox.mouseleave(function() {
    $combobox.css('text-decoration','none');
  }).on('mouseenter', function(e) {
    setAsLink($combobox, $combobox.closest('.combobox-container').hasClass('combobox-selected'));
  }).on('focusout mouseleave', function(e) {
    setAsLink($combobox, false);
  }).on('click', function() {
    var clientId = $entityId.val();
    if ($(combobox).closest('.combobox-container').hasClass('combobox-selected')) {       
      if (parseInt(clientId) > 0) {
        window.open(url + '/' + clientId, '_blank');
      } else {
        $('#myModal').modal('show');
      }
    };
  });
  */
}

function setAsLink($input, enable) {
  if (enable) {
    $input.css('text-decoration','underline');
    $input.css('cursor','pointer'); 
  } else {
    $input.css('text-decoration','none');
    $input.css('cursor','text');  
  }
}

function setComboboxValue($combobox, id, name) {
  $combobox.find('input').val(id);
  $combobox.find('input.form-control').val(name);
  if (id && name) {
    $combobox.find('select').combobox('setSelected');
    $combobox.find('.combobox-container').addClass('combobox-selected');
  } else {
    $combobox.find('.combobox-container').removeClass('combobox-selected');
  }
}


var BASE64_MARKER = ';base64,';
function convertDataURIToBinary(dataURI) {
  var base64Index = dataURI.indexOf(BASE64_MARKER) + BASE64_MARKER.length;
  var base64 = dataURI.substring(base64Index);
  return base64DecToArr(base64);
}

if (window.ko) {
  ko.bindingHandlers.dropdown = {
      init: function (element, valueAccessor, allBindingsAccessor) {
         var options = allBindingsAccessor().dropdownOptions|| {};
         var value = ko.utils.unwrapObservable(valueAccessor());
         var id = (value && value.public_id) ? value.public_id() : (value && value.id) ? value.id() : value ? value : false;
         if (id) $(element).val(id);
         //console.log("combo-init: %s", id);
         $(element).combobox(options);       

         /*
          ko.utils.registerEventHandler(element, "change", function () {
            console.log("change: %s", $(element).val());          
            //var  
            valueAccessor($(element).val());
              //$(element).combobox('refresh');
          });
          */
      },
      update: function (element, valueAccessor) {     
        var value = ko.utils.unwrapObservable(valueAccessor());
        var id = (value && value.public_id) ? value.public_id() : (value && value.id) ? value.id() : value ? value : false;
          //console.log("combo-update: %s", id);
        if (id) { 
          $(element).val(id);       
          $(element).combobox('refresh');
        } else {
          $(element).combobox('clearTarget');       
          $(element).combobox('clearElement');        
        }       
      }    
  };


  ko.bindingHandlers.datePicker = {
      init: function (element, valueAccessor, allBindingsAccessor) {
         var value = ko.utils.unwrapObservable(valueAccessor());       
         if (value) $(element).datepicker('update', value);
         $(element).change(function() { 
            var value = valueAccessor();
            value($(element).val());
         })
      },
      update: function (element, valueAccessor) {     
         var value = ko.utils.unwrapObservable(valueAccessor());
         if (value) $(element).datepicker('update', value);
      }    
  };
}

function wordWrapText(value, width)
{
  var doc = new jsPDF('p', 'pt');
  doc.setFont('Helvetica','');
  doc.setFontSize(10);

  var lines = value.split("\n");
  for (var i = 0; i < lines.length; i++) {
    var numLines = doc.splitTextToSize(lines[i], width).length;
    if (numLines <= 1) continue;
    var j = 0; space = lines[i].length;
    while (j++ < lines[i].length) {
      if (lines[i].charAt(j) === ' ') space = j;
    }
    if (space == lines[i].length) space = width/6;    
    lines[i + 1] = lines[i].substring(space + 1) + ' ' + (lines[i + 1] || '');
    lines[i] = lines[i].substring(0, space);
  }
  
  var newValue = (lines.join("\n")).trim();

  if (value == newValue) {
    return newValue;
  } else {
    return wordWrapText(newValue, width);
  }
}

function getClientDisplayName(client)
{
  var contact = client.contacts ? client.contacts[0] : false;
  if (client.name) {
    return client.name;
  } else if (contact) {
    if (contact.first_name || contact.last_name) {
      return contact.first_name + ' ' + contact.last_name;
    } else {
      return contact.email;
    }
  }
  return '';
}

function populateInvoiceComboboxes(clientId, invoiceId) {
  var clientMap = {};
  var invoiceMap = {};
  var invoicesForClientMap = {};
  var $clientSelect = $('select#client');   
  
  for (var i=0; i<invoices.length; i++) {
    var invoice = invoices[i];
    var client = invoice.client;      

    if (!invoicesForClientMap.hasOwnProperty(client.public_id)) {
      invoicesForClientMap[client.public_id] = [];        
    }

    invoicesForClientMap[client.public_id].push(invoice);
    invoiceMap[invoice.public_id] = invoice;
  }

  for (var i=0; i<clients.length; i++) {
    var client = clients[i];
    clientMap[client.public_id] = client;
  }

  $clientSelect.append(new Option('', '')); 
  for (var i=0; i<clients.length; i++) {
    var client = clients[i];
    $clientSelect.append(new Option(getClientDisplayName(client), client.public_id));
  } 

  if (clientId) {
    $clientSelect.val(clientId);
  }

  $clientSelect.combobox();
  $clientSelect.on('change', function(e) {            
    var clientId = $('input[name=client]').val();
    var invoiceId = $('input[name=invoice]').val();           
    var invoice = invoiceMap[invoiceId];
    if (invoice && invoice.client.public_id == clientId) {
      e.preventDefault();
      return;
    }
    setComboboxValue($('.invoice-select'), '', '');       
    $invoiceCombobox = $('select#invoice');
    $invoiceCombobox.find('option').remove().end().combobox('refresh');     
    $invoiceCombobox.append(new Option('', ''));
    var list = clientId ? (invoicesForClientMap.hasOwnProperty(clientId) ? invoicesForClientMap[clientId] : []) : invoices;
    for (var i=0; i<list.length; i++) {
      var invoice = list[i];
      var client = clientMap[invoice.client.public_id];
      if (!client) continue; // client is deleted/archived
      $invoiceCombobox.append(new Option(invoice.invoice_number + ' - ' + invoice.invoice_status.name + ' - ' +
                getClientDisplayName(client) + ' - ' + formatMoney(invoice.amount, invoice.currency_id) + ' | ' +
                formatMoney(invoice.balance, invoice.currency_id),  invoice.public_id));
    }
    $('select#invoice').combobox('refresh');
  });

  var $invoiceSelect = $('select#invoice').on('change', function(e) {     
    $clientCombobox = $('select#client');
    var invoiceId = $('input[name=invoice]').val();           
    if (invoiceId) {
      var invoice = invoiceMap[invoiceId];        
      var client = clientMap[invoice.client.public_id];
      setComboboxValue($('.client-select'), client.public_id, getClientDisplayName(client));
      if (!parseFloat($('#amount').val())) {
        $('#amount').val(parseFloat(invoice.balance).toFixed(2));
      }
    }
  });

  $invoiceSelect.combobox();  

  if (invoiceId) {
    var invoice = invoiceMap[invoiceId];
    var client = clientMap[invoice.client.public_id];
    setComboboxValue($('.invoice-select'), invoice.public_id, (invoice.invoice_number + ' - ' +
            invoice.invoice_status.name + ' - ' + getClientDisplayName(client) + ' - ' +
            formatMoney(invoice.amount, invoice.currency_id) + ' | ' + formatMoney(invoice.balance, invoice.currency_id)));
    $invoiceSelect.trigger('change');
  } else if (clientId) {
    var client = clientMap[clientId];
    setComboboxValue($('.client-select'), client.public_id, getClientDisplayName(client));
    $clientSelect.trigger('change');
  } else {
    $clientSelect.trigger('change');
  } 
}


var CONSTS = {};
CONSTS.INVOICE_STATUS_DRAFT = 1;
CONSTS.INVOICE_STATUS_SENT = 2;
CONSTS.INVOICE_STATUS_VIEWED = 3;
CONSTS.INVOICE_STATUS_PARTIAL = 4;
CONSTS.INVOICE_STATUS_PAID = 5;
console.log($.fn.datepicker.defaults);
$.fn.datepicker.defaults.autoclose = true;
$.fn.datepicker.defaults.todayHighlight = true;





function displayAccount(doc, invoice, x, y, layout) {
  var account = invoice.account;

  if (!account) {
    return;
  }

  var data1 = [
    account.name,
    account.vat_number,
    account.work_email,
    account.work_phone
  ];

  var data2 = [
    concatStrings(account.address1, account.address2),
    concatStrings(account.city, account.state, account.postal_code),    
    account.country ? account.country.name : false,
    invoice.account.custom_value1 ? invoice.account['custom_label1'] + ' ' + invoice.account.custom_value1 : false, 
    invoice.account.custom_value2 ? invoice.account['custom_label2'] + ' ' + invoice.account.custom_value2 : false,     
  ];

  if (layout.singleColumn) {

    displayGrid(doc, invoice, data1.concat(data2), x, y, layout, {hasHeader:true});

  } else {

    displayGrid(doc, invoice, data1, x, y, layout, {hasHeader:true});

    var nameWidth = account.name ? (doc.getStringUnitWidth(account.name) * doc.internal.getFontSize() * 1.1) : 0;
    var emailWidth = account.work_email ? (doc.getStringUnitWidth(account.work_email) * doc.internal.getFontSize() * 1.1) : 0;
    width = Math.max(emailWidth, nameWidth, 120);
    x += width;

    displayGrid(doc, invoice, data2, x, y, layout);  
  }
}


function displayClient(doc, invoice, x, y, layout) {
  var client = invoice.client;
  if (!client) {
    return;
  }  
  var data = [
    getClientDisplayName(client),
    client.vat_number,
    concatStrings(client.address1, client.address2),
    concatStrings(client.city, client.state, client.postal_code),
    client.country ? client.country.name : false,
    client.contacts && getClientDisplayName(client) != client.contacts[0].email ? client.contacts[0].email : false,
    invoice.client.custom_value1 ? invoice.account['custom_client_label1'] + ' ' + invoice.client.custom_value1 : false, 
    invoice.client.custom_value2 ? invoice.account['custom_client_label2'] + ' ' + invoice.client.custom_value2 : false, 
  ];
  return displayGrid(doc, invoice, data, x, y, layout, {hasheader:true});
}

function displayInvoice(doc, invoice, x, y, layout, rightAlignX) {
  if (!invoice) {
    return;
  }

  var data = getInvoiceDetails(invoice);
  var options = {
    hasheader: true,
    rightAlignX: rightAlignX,
  };

  return displayGrid(doc, invoice, data, x, y, layout, options);
}

function getInvoiceDetails(invoice) {
  return [
    {'invoice_number': invoice.invoice_number},
    {'po_number': invoice.po_number},
    {'invoice_date': invoice.invoice_date},
    {'due_date': invoice.due_date},
    {'balance_due': formatMoney(invoice.balance_amount, invoice.client.currency_id)},
  ]; 
}

function getInvoiceDetailsHeight(invoice, layout) {
  var data = getInvoiceDetails(invoice);
  var count = 0;
  for (var key in data) {
    if (!data.hasOwnProperty(key)) {
      continue;
    }
    var obj = data[key];
    for (var subKey in obj) {
      if (!obj.hasOwnProperty(subKey)) {
        continue;
      }
      if (obj[subKey]) {
        count++;
      }
    }
  }
  return count * layout.rowHeight;
}



function displaySubtotals(doc, layout, invoice, y, rightAlignTitleX)
{
  if (!invoice) {
    return;
  }
  if(formatMoney(invoice.discount_amount, 1) == 0){
  var data = [
    {'subtotal': formatMoney(invoice.subtotal_amount, 1)}
    ];
  }else{
  	var data = [
  	{'paid_to_date': formatMoney(invoice.subtotal_amount, 1)},
  	{'discount': formatMoney(invoice.discount_amount, 1)},
  	{'subtotal': formatMoney(invoice.amount, 1)},

    ];
  }

  // if (parseFloat(invoice.custom_value1) && invoice.custom_taxes1 == '1') {    
  //   data.push({'custom_invoice_label1': formatMoney(invoice.custom_value1, invoice.client.currency_id) })
  // }
  // if (parseFloat(invoice.custom_value2) && invoice.custom_taxes2 == '1') {
  //   data.push({'custom_invoice_label2': formatMoney(invoice.custom_value2, invoice.client.currency_id) }) 
  // }

  // data.push({'tax': invoice.tax_amount > 0 ? formatMoney(invoice.tax_amount, invoice.client.currency_id) : false});

  // if (parseFloat(invoice.custom_value1) && invoice.custom_taxes1 != '1') {    
  //   data.push({'custom_invoice_label1': formatMoney(invoice.custom_value1, invoice.client.currency_id) })
  // }
  // if (parseFloat(invoice.custom_value2) && invoice.custom_taxes2 != '1') {
  //   data.push({'custom_invoice_label2': formatMoney(invoice.custom_value2, invoice.client.currency_id) }) 
  // }

  // var paid = invoice.amount - invoice.balance;
  // if (invoice.account.hide_paid_to_date != '1' || paid) {
  //   data.push({'paid_to_date': formatMoney(paid, invoice.client.currency_id)});
  // }

  var options = {
    hasheader: true,
    rightAlignX: 555,
    rightAlignTitleX: rightAlignTitleX    
  };

  return displayGrid(doc, invoice, data, 300, y-18, layout, options) + 12;
}


function displaySubtotals2(doc, layout, invoice, y, rightAlignTitleX)
{
  if (!invoice) {
    return;
  }
  if(formatMoney(invoice.discount_amount, 1) == 0){
  var data = [
    {'subtotal': formatMoney(invoice.subtotal_amount, 1)}
    ];
  }else{
  	var data = [
  	{'paid_to_date': formatMoney(invoice.subtotal_amount, 1)},
  	{'discount': formatMoney(invoice.discount_amount, 1)},
  	{'subtotal': formatMoney(invoice.amount, 1)},

    ];
  }

  // if (parseFloat(invoice.custom_value1) && invoice.custom_taxes1 == '1') {    
  //   data.push({'custom_invoice_label1': formatMoney(invoice.custom_value1, invoice.client.currency_id) })
  // }
  // if (parseFloat(invoice.custom_value2) && invoice.custom_taxes2 == '1') {
  //   data.push({'custom_invoice_label2': formatMoney(invoice.custom_value2, invoice.client.currency_id) }) 
  // }

  // data.push({'tax': invoice.tax_amount > 0 ? formatMoney(invoice.tax_amount, invoice.client.currency_id) : false});

  // if (parseFloat(invoice.custom_value1) && invoice.custom_taxes1 != '1') {    
  //   data.push({'custom_invoice_label1': formatMoney(invoice.custom_value1, invoice.client.currency_id) })
  // }
  // if (parseFloat(invoice.custom_value2) && invoice.custom_taxes2 != '1') {
  //   data.push({'custom_invoice_label2': formatMoney(invoice.custom_value2, invoice.client.currency_id) }) 
  // }

  // var paid = invoice.amount - invoice.balance;
  // if (invoice.account.hide_paid_to_date != '1' || paid) {
  //   data.push({'paid_to_date': formatMoney(paid, invoice.client.currency_id)});
  // }

  var options = {
    hasheader: true,
    rightAlignX: 555,
    rightAlignTitleX: rightAlignTitleX-20  
  };

  return displayGrid2(doc, invoice, data, 300, y-18, layout, options) + 12;
}

function concatStrings() {
  var concatStr = '';
  var data = [];
  for (var i=0; i<arguments.length; i++) {
    var string = arguments[i];
    if (string) {
      data.push(string);
    }
  }
  for (var i=0; i<data.length; i++) {
    concatStr += data[i];
    if (i == 0 && data.length > 1) {
      concatStr += ', ';
    } else if (i < data.length -1) {
      concatStr += ' ';
    }
  }
  return data.length ? concatStr : false;
}

function displayGrid(doc, invoice, data, x, y, layout, options)  {
  var numLines = 0;
  var origY = y;
  doc.setLineWidth(0.8); 
  doc.setDrawColor(0,0,0);
  doc.line(layout.marginLeft - layout.tablePadding, y-13, layout.marginRight + layout.tablePadding, y-13);

  for (var i=0; i<data.length; i++) {
    doc.setFontType('normal');
      

    var row = data[i];
    console.log(row);
    if (!row) {
      continue;
    }

    if (options && (options.hasheader && i === 0 && !options.rightAlignTitleX)) {
      doc.setFontType('bold');
    }

    if (typeof row === 'object') {      
      for (var key in row) {
        if (row.hasOwnProperty(key)) {
          var value = row[key] ? row[key] + '' : false;
        }
      }
      if (!value) {
        continue;
      }  

      var marginLeft;
      if (options.rightAlignX) {
        marginLeft = options.rightAlignX - (doc.getStringUnitWidth(value) * doc.internal.getFontSize());          
      } else {
        marginLeft = x + 110;
      }
      doc.text(marginLeft, y, value);       
      
      doc.setFontType('normal');
      if (invoice.is_quote) {
        if (key == 'invoice_number') {
          key = 'quote_number';
        } else if (key == 'invoice_date') {
          key = 'quote_date';
        } else if (key == 'balance_due') {
          key = 'total';
        }
      }

      if (key.substring(0, 6) === 'custom') {
        key = invoice.account[key];
      } else if (key === 'tax' && invoice.tax_rate) {
        key = invoiceLabels[key] + ' ' + (invoice.tax_rate*1).toString() + '%';
      } else {
        key = invoiceLabels[key];
      }

      if (options.rightAlignTitleX) {
        marginLeft = options.rightAlignTitleX - (doc.getStringUnitWidth(key) * doc.internal.getFontSize());
      } else {
        marginLeft = x;
      }

      doc.text(marginLeft, y, key);      
    } else {
      doc.text(x, y, row);
    }
    doc.setLineWidth(0.5); 
	doc.setDrawColor(0,0,0);
	doc.line(layout.marginLeft - layout.tablePadding, y-14, layout.marginLeft - layout.tablePadding, y+5);
	doc.line(layout.marginLeft - layout.tablePadding+450, y-14, layout.marginLeft - layout.tablePadding+450, y+5);
	doc.line(layout.marginRight + layout.tablePadding, y-14, layout.marginRight + layout.tablePadding, y+5);

    doc.line(layout.marginLeft - layout.tablePadding, y+5, layout.marginRight + layout.tablePadding, y+5);

    numLines++;
    y += layout.rowHeight;
  }

	doc.setFontType('normal');
	doc.setFontSize(9);
	var numliteral = NumeroALetras(invoice.amount); 
	doc.text(30, y+2, 'Son: '+numliteral);

    doc.setLineWidth(0.5); 
	doc.setDrawColor(0,0,0);
	doc.line(layout.marginLeft - layout.tablePadding, y-10, layout.marginLeft - layout.tablePadding, y+5);
	doc.line(layout.marginRight + layout.tablePadding, y-10, layout.marginRight + layout.tablePadding, y+5);
    doc.line(layout.marginLeft - layout.tablePadding, y+5, layout.marginRight + layout.tablePadding, y+5);
	
  return numLines * layout.rowHeight;
}



function displayGrid2(doc, invoice, data, x, y, layout, options)  {
  var numLines = 0;
  var origY = y;
  doc.setLineWidth(0.8); 
  doc.setDrawColor(0,0,0);
  doc.line(layout.marginLeft - layout.tablePadding, y-13, layout.marginRight + layout.tablePadding, y-13);

  for (var i=0; i<data.length; i++) {
    doc.setFontType('normal');
      

    var row = data[i];
    if (!row) {
      continue;
    }

    if (options && (options.hasheader && i === 0 && !options.rightAlignTitleX)) {
      doc.setFontType('bold');
    }

    if (typeof row === 'object') {      
      for (var key in row) {
        if (row.hasOwnProperty(key)) {
          var value = row[key] ? row[key] + '' : false;
        }
      }
      if (!value) {
        continue;
      }  

      var marginLeft;
      if (options.rightAlignX) {
        marginLeft = options.rightAlignX - (doc.getStringUnitWidth(value) * doc.internal.getFontSize());          
      } else {
        marginLeft = x + 110;
      }
      doc.text(marginLeft, y, value);       
      
      doc.setFontType('normal');
      if (invoice.is_quote) {
        if (key == 'invoice_number') {
          key = 'quote_number';
        } else if (key == 'invoice_date') {
          key = 'quote_date';
        } else if (key == 'balance_due') {
          key = 'total';
        }
      }

      if (key.substring(0, 6) === 'custom') {
        key = invoice.account[key];
      } else if (key === 'tax' && invoice.tax_rate) {
        key = invoiceLabels[key] + ' ' + (invoice.tax_rate*1).toString() + '%';
      } else {
        key = invoiceLabels[key];
      }

      if (options.rightAlignTitleX) {
        marginLeft = options.rightAlignTitleX - (doc.getStringUnitWidth(key) * doc.internal.getFontSize());
      } else {
        marginLeft = x;
      }

      doc.text(marginLeft, y, key);      
    } else {
      doc.text(x, y, row);
    }
    doc.setLineWidth(0.5); 
	doc.setDrawColor(0,0,0);
	doc.line(layout.marginLeft - layout.tablePadding, y-14, layout.marginLeft - layout.tablePadding, y+5);
	doc.line(layout.marginLeft - layout.tablePadding+420, y-14, layout.marginLeft - layout.tablePadding+420, y+5);
	doc.line(layout.marginRight + layout.tablePadding, y-14, layout.marginRight + layout.tablePadding, y+5);

    doc.line(layout.marginLeft - layout.tablePadding, y+5, layout.marginRight + layout.tablePadding, y+5);

    numLines++;
    y += layout.rowHeight;
  }

	doc.setFontType('normal');
	doc.setFontSize(9);
	var numliteral = NumeroALetras(invoice.amount); 
	doc.text(30, y+2, 'Son: '+numliteral);

    doc.setLineWidth(0.5); 
	doc.setDrawColor(0,0,0);
	doc.line(layout.marginLeft - layout.tablePadding, y-10, layout.marginLeft - layout.tablePadding, y+5);
	doc.line(layout.marginRight + layout.tablePadding, y-10, layout.marginRight + layout.tablePadding, y+5);
    doc.line(layout.marginLeft - layout.tablePadding, y+5, layout.marginRight + layout.tablePadding, y+5);
	
  return numLines * layout.rowHeight;
}

function displayQR(doc, layout, invoice, y)
{
	if(formatMoney(invoice.discount_amount, 1) == 0){var qry=0;}else{var qry=30;}
 	if (invoice.status==0)
  	{
	invoice.qr = 'data:image/jpeg;base64,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';
	doc.addImage(invoice.qr, 'JPEG', layout.marginLeft-8, y+18+qry, 65, 65);
	}
	else
	{
	doc.addImage(invoice.qr, 'JPEG', layout.marginLeft-15, y+12+qry, 80, 80);
	}
}

function displayNotesAndTerms(doc, layout, invoice, y)
{
	doc.setFontType("normal");
	var origY = y;

	doc.setFontType('bold');
    doc.setFontSize(9);
    doc.text(layout.marginLeft - layout.tablePadding+65, y+15, 'CÓDIGO DE CONTROL:');
 	
 	doc.text(layout.marginLeft - layout.tablePadding+190, y+15, invoice.control_code);

    var anio = invoice.deadline.substr(0,4);
    var mes = invoice.deadline.substr(5,2);
    var dia = invoice.deadline.substr(8,2);
    var fecha_limite1 = dia+'/'+mes+'/'+anio;

    doc.text(layout.marginLeft - layout.tablePadding+65, y+30, 'FECHA LÍMITE DE EMISIÓN:');

    doc.text(layout.marginLeft - layout.tablePadding+190, y+30, fecha_limite1);


  	doc.setFontSize(8);
	doc.text(layout.marginLeft - layout.tablePadding+65, y+45, 'ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS. EL USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LEY');	

	


  if (invoice.public_notes) {
  	doc.setFontSize(8);
  	doc.setLineWidth(0.3); 
	doc.setDrawColor(0,0,0);
	doc.setFontType("bold");
	doc.line(layout.marginLeft+307, y+8, layout.marginLeft+307, y+38);
	doc.text(layout.marginLeft+310, y+15, 'Nota al Cliente');
	doc.setFontType("normal");
	doc.text(layout.marginLeft+310, y+25, invoice.public_notes);  


  }
    
  if (invoice.terms) {
  	doc.setLineWidth(0.3); 
    doc.setDrawColor(0,0,0);
    doc.setFontType("bold");
	doc.line(layout.marginLeft-8, y+65, layout.marginLeft-8, y+90);
    doc.text(layout.marginLeft-5, y+70, 'Términos y Condiciones');
    doc.setFontType("normal");
    doc.text(layout.marginLeft-5, y+80, invoice.terms);  
    y +=25;
  }

	doc.addImage(logoImages.logofooter, 'JPEG', layout.marginLeft+220, y+65, logoImages.imageLogoWidthf, logoImages.imageLogoHeightf);


	doc.line(layout.marginLeft - layout.tablePadding,y+80, layout.marginRight + layout.tablePadding,y+80);

	doc.setFontSize(8);
	doc.setFontType("normal");

	doc.text(layout.marginLeft - layout.tablePadding+135, y+90, 'Sistema de Facturación Virtual brindado por');

	doc.setFontSize(9);
	doc.setFontType("bold");

	doc.text(layout.marginLeft - layout.tablePadding+295, y+90, 'www.facturavirtual.com.bo');

  return y - origY;
}

function calculateAmounts(invoice) {
  var total = 0;
  var hasTaxes = false;

  for (var i=0; i<invoice.invoice_items.length; i++) {
    var item = invoice.invoice_items[i];
    var tax = 0;
    if (item.tax && parseFloat(item.tax.rate)) {
      tax = parseFloat(item.tax.rate);
    } else if (item.tax_rate && parseFloat(item.tax_rate)) {
      tax = parseFloat(item.tax_rate);
    }   

    var lineTotal = parseFloat(item.cost) * parseFloat(item.qty);
    if (tax) {
      lineTotal += roundToTwo(lineTotal * tax / 100);
    }
    if (lineTotal) {
      total += lineTotal;
    }

    if ((item.tax && item.tax.rate > 0) || (item.tax_rate && parseFloat(item.tax_rate) > 0)) {
      hasTaxes = true;
    }
  }

  invoice.subtotal_amount = total;

  // if (invoice.discount > 0) {
  //   var discount = roundToTwo(total * (invoice.discount/100));
  //   total -= discount;
  // }

  // custom fields with taxes
  if (parseFloat(invoice.custom_value1) && invoice.custom_taxes1 == '1') {    
    total += roundToTwo(invoice.custom_value1);    
  }
  if (parseFloat(invoice.custom_value2) && invoice.custom_taxes2 == '1') {
    total += roundToTwo(invoice.custom_value2);    
  }

  var tax = 0;
  if (invoice.tax && parseFloat(invoice.tax.rate)) {
    tax = parseFloat(invoice.tax.rate);
  } else if (invoice.tax_rate && parseFloat(invoice.tax_rate)) {
    tax = parseFloat(invoice.tax_rate);
  }

  if (tax) {
    var tax = roundToTwo(total * (tax/100));
    total = parseFloat(total) + parseFloat(tax);
  }

  // custom fields w/o with taxes
  if (parseFloat(invoice.custom_value1) && invoice.custom_taxes1 != '1') {    
    total += roundToTwo(invoice.custom_value1);    
  }
  if (parseFloat(invoice.custom_value2) && invoice.custom_taxes2 != '1') {
    total += roundToTwo(invoice.custom_value2);    
  }

  // invoice.balance_amount = roundToTwo(total) - (roundToTwo(invoice.amount) - roundToTwo(invoice.balance));

  // invoice.discount_amount = roundToTwo(invoice.subtotal_amount) - roundToTwo(invoice.amount);
  invoice.discount_amount = invoice.discountotal;
  invoice.amount = total - invoice.discountotal;

  invoice.tax_amount = tax;
  invoice.has_taxes = hasTaxes;

  return invoice;
}

function getInvoiceTaxRate(invoice) {
  var tax = 0;
  if (invoice.tax && parseFloat(invoice.tax.rate)) {
    tax = parseFloat(invoice.tax.rate);
  } else if (invoice.tax_rate && parseFloat(invoice.tax_rate)) {
    tax = parseFloat(invoice.tax_rate);
  }   
  return tax;
}

function displaytittle(doc, invoice, layout) {

		var datos1x = 30;
	   	var datos1y = 100;
	    var datos1xy = 13;

	    if(invoice.account_uniper)
	    {
	    	var datos1y = 90;
	    	doc.setFontType('bold');
		    doc.setFontSize(11); 
		    doc.text(datos1x, datos1y, invoice.account_name);  
		    datos1xy -= 2;
		    datos1y += datos1xy;
			
		   	doc.setFontSize(10);
		    doc.text(datos1x, datos1y, 'de ' + invoice.account_uniper);  
		    datos1y += datos1xy;
		    datos1xy -= 2;
		    
	    } 
	    else
	    {
		    doc.setFontType('bold');
		    doc.setFontSize(11); 
		    doc.text(datos1x, datos1y, invoice.account_name);  
		    datos1y += datos1xy;
		    datos1xy -= 4;
	    }

	    doc.setFontType('normal');
	   	doc.setFontSize(10);
	    doc.text(datos1x, datos1y, invoice.branch_name);    
	    datos1y += datos1xy;

	    doc.setFontSize(9);	 
	    doc.text(datos1x, datos1y, invoice.address2);
	    datos1y += datos1xy;

	    var zone = 'Zona/Barrio: ' + invoice.address1;

	    var phone = 'Teléfono: '+invoice.phone;
	    doc.text(datos1x, datos1y, zone+' '+phone);
	    datos1y += datos1xy;

	    var city = invoice.city+' - Bolivia';
	    doc.text(datos1x, datos1y, city);
}

function displayHeader(doc, invoice, layout) {

	    datos1x = 395;
	    datos1y = 15;
	    datos1xy = 16;

	    doc.setFontSize(10);
		doc.setLineWidth(1);  
	    doc.setFillColor(255, 255, 255);
	    doc.roundedRect(datos1x, datos1y, 200, 55, 3, 3, 'FD');

	    datos1x += 10;
	    datos1y += 15;
	    var datos1x1 = 95;
		var datos1x2 = 105;

		doc.setFontType('bold');
	    doc.text(datos1x, datos1y, 'NIT');
	    doc.text(datos1x+datos1x1, datos1y, ':');
	    doc.text(datos1x+datos1x2, datos1y, invoice.account_nit);
		datos1y += datos1xy;

	    doc.text(datos1x, datos1y, 'Nº FACTURA');
	    doc.text(datos1x+datos1x1, datos1y, ':');
	    doc.text(datos1x+datos1x2, datos1y, invoice.invoice_number);
		datos1y += datos1xy;

		doc.text(datos1x, datos1y, 'Nº AUTORIZACIÓN');
	    doc.text(datos1x+datos1x1, datos1y, ':');
	    doc.text(datos1x+datos1x2, datos1y, invoice.number_autho);
		datos1y += datos1xy;

	    doc.setFontSize(12);
	    doc.setFontType('bold');
	    doc.text(465, datos1y+10, 'ORIGINAL');

		if(invoice.third == 1)
		{
		    doc.setFontSize(18);
		    doc.setFontType('bold');
			doc.text(258, 65, 'FACTURA');
			doc.setFontSize(18);
		    doc.setFontType('bold');
			doc.text(230, 85, 'POR TERCEROS');
		}
		else
		{
		    doc.setFontSize(20);
		    doc.setFontType('bold');
			doc.text(258, 72, 'FACTURA');
		}



}

function getInvoiceDate(invoice) {
	
	var miVariable = invoice.invoice_date;    
 	if (invoice.status == 1)
  	{
  		var aleguisf_date = '';
	    var aleguisf_date_month = '';
	    var aleguisf_date_day = '';
	    var aleguisf_date_day_new = '';
	    var aleguisf_date_year = '';
	    miVariable = miVariable.split(' ');
	    if(miVariable[1]=='Jan'){aleguisf_date_month='Enero';}
	    if(miVariable[1]=='Feb'){aleguisf_date_month='Febrero';}
	    if(miVariable[1]=='Mar'){aleguisf_date_month='Marzo';}
	    if(miVariable[1]=='Apr'){aleguisf_date_month='Abril';}
	    if(miVariable[1]=='May'){aleguisf_date_month='Mayo';}
	    if(miVariable[1]=='Jun'){aleguisf_date_month='Junio';}
	    if(miVariable[1]=='Jul'){aleguisf_date_month='Julio';}
	    if(miVariable[1]=='Aug'){aleguisf_date_month='Agosto';}
	    if(miVariable[1]=='Sep'){aleguisf_date_month='Septiembre';}
	    if(miVariable[1]=='Oct'){aleguisf_date_month='Octubre';}
	    if(miVariable[1]=='Nov'){aleguisf_date_month='Noviembre';}
	    if(miVariable[1]=='Dec'){aleguisf_date_month='Diciembre';}	    
	    aleguisf_date_day = parseFloat(miVariable[0]);
	    aleguisf_date_year = miVariable[2];	    
	    aleguisf_date = invoice.state +', '+aleguisf_date_day+' de '+aleguisf_date_month+' de '+aleguisf_date_year;

  	}
  	else
  	{
	    var aleguisf_date = '';
	    var aleguisf_date_month = '';
	    var aleguisf_date_day = '';
	    var aleguisf_date_day_new = '';
	    var aleguisf_date_year = '';
	    miVariable = miVariable.split(' ');
	    if(miVariable[0]=='Jan'){aleguisf_date_month='Enero';}
	    if(miVariable[0]=='Feb'){aleguisf_date_month='Febrero';}
	    if(miVariable[0]=='Mar'){aleguisf_date_month='Marzo';}
	    if(miVariable[0]=='Apr'){aleguisf_date_month='Abril';}
	    if(miVariable[0]=='May'){aleguisf_date_month='Mayo';}
	    if(miVariable[0]=='Jun'){aleguisf_date_month='Junio';}
	    if(miVariable[0]=='Jul'){aleguisf_date_month='Julio';}
	    if(miVariable[0]=='Aug'){aleguisf_date_month='Agosto';}
	    if(miVariable[0]=='Sep'){aleguisf_date_month='Septiembre';}
	    if(miVariable[0]=='Oct'){aleguisf_date_month='Octubre';}
	    if(miVariable[0]=='Nov'){aleguisf_date_month='Noviembre';}
	    if(miVariable[0]=='Dec'){aleguisf_date_month='Diciembre';}	    
	    aleguisf_date_day = parseFloat(miVariable[1]);
	    aleguisf_date_year = miVariable[2];	    
	    aleguisf_date = invoice.state +', '+aleguisf_date_day+' de '+aleguisf_date_month+' de '+aleguisf_date_year;

	}
	return aleguisf_date;
}

function displayInvoiceHeader(doc, invoice, layout) {

  var costX = layout.unitCostRight - (doc.getStringUnitWidth(invoiceLabels.unit_cost) * doc.internal.getFontSize());
  var qtyX = layout.qtyRight - (doc.getStringUnitWidth(invoiceLabels.quantity) * doc.internal.getFontSize());
  var taxX = layout.taxRight - (doc.getStringUnitWidth(invoiceLabels.tax) * doc.internal.getFontSize());
  var totalX = layout.lineTotalRight - (doc.getStringUnitWidth(invoiceLabels.line_total) * doc.internal.getFontSize());

  doc.text(layout.marginLeft-4, layout.tableTop+15, 'CANTIDAD');
  doc.text(layout.descriptionLeft-60, layout.tableTop+15, 'CONCEPTO');
  doc.text(costX+30, layout.tableTop+15, 'PRECIO UNITARIO');
  doc.text(totalX, layout.tableTop+15, 'SUBTOTAL');

	doc.setLineWidth(0.5); 
	doc.setDrawColor(0,0,0);

	doc.line(layout.marginLeft - layout.tablePadding,layout.headerTop+140, layout.marginRight + layout.tablePadding,layout.headerTop+140);
	doc.line(layout.marginLeft - layout.tablePadding,layout.headerTop+160, layout.marginRight + layout.tablePadding,layout.headerTop+160);

	doc.line(layout.marginLeft - layout.tablePadding,layout.headerTop+140, layout.marginLeft - layout.tablePadding, layout.tableTop + 35);
	doc.line(layout.marginRight + layout.tablePadding,layout.headerTop+140, layout.marginRight + layout.tablePadding, layout.tableTop + 35);

	doc.line(layout.marginLeft - layout.tablePadding+60, layout.headerTop+140, layout.marginLeft - layout.tablePadding+60, layout.tableTop + 35);
	doc.line(layout.marginLeft - layout.tablePadding+345, layout.headerTop+140, layout.marginLeft - layout.tablePadding+345, layout.tableTop + 35);
	doc.line(layout.marginLeft - layout.tablePadding+450, layout.headerTop+140, layout.marginLeft - layout.tablePadding+450, layout.tableTop + 35);


  // if (invoice.account.hide_quantity != '1') {
  //   doc.text(qtyX, layout.tableTop, invoiceLabels.quantity);
  // }
  // doc.text(totalX, layout.tableTop, invoiceLabels.line_total);

  // if (invoice.has_taxes)
  // {
  //   doc.text(taxX, layout.tableTop, invoiceLabels.tax);
  // }

}

function displayInvoiceHeader2(doc, invoice, layout) {

	var costX = layout.unitCostRight - (doc.getStringUnitWidth(invoiceLabels.unit_cost) * doc.internal.getFontSize());
	var qtyX = layout.qtyRight - (doc.getStringUnitWidth(invoiceLabels.quantity) * doc.internal.getFontSize());
	var taxX = layout.taxRight - (doc.getStringUnitWidth(invoiceLabels.tax) * doc.internal.getFontSize());
	var totalX = layout.lineTotalRight - (doc.getStringUnitWidth(invoiceLabels.line_total) * doc.internal.getFontSize());

	doc.text(layout.descriptionLeft+40, layout.tableTop+15, 'CONCEPTO');
	doc.text(totalX-20, layout.tableTop+15, 'SUBTOTAL');

	doc.setLineWidth(0.5); 
	doc.setDrawColor(0,0,0);

	doc.line(layout.marginLeft - layout.tablePadding,layout.headerTop+140, layout.marginRight + layout.tablePadding,layout.headerTop+140);
	doc.line(layout.marginLeft - layout.tablePadding,layout.headerTop+160, layout.marginRight + layout.tablePadding,layout.headerTop+160);

	doc.line(layout.marginLeft - layout.tablePadding,layout.headerTop+140, layout.marginLeft - layout.tablePadding, layout.tableTop + 35);
	doc.line(layout.marginRight + layout.tablePadding,layout.headerTop+140, layout.marginRight + layout.tablePadding, layout.tableTop + 35);

	doc.line(layout.marginLeft - layout.tablePadding+420, layout.headerTop+140, layout.marginLeft - layout.tablePadding+420, layout.tableTop + 35);

  // if (invoice.account.hide_quantity != '1') {
  //   doc.text(qtyX, layout.tableTop, invoiceLabels.quantity);
  // }
  // doc.text(totalX, layout.tableTop, invoiceLabels.line_total);

  // if (invoice.has_taxes)
  // {
  //   doc.text(taxX, layout.tableTop, invoiceLabels.tax);
  // }

}

function displayInvoiceItems(doc, invoice, layout) {
  doc.setFontType("normal");

  var line = 1;
  var total = 0;
  var shownItem = false;
  var currencyId = invoice && invoice.client ? invoice.client.currency_id : 1;  
  var tableTop = layout.tableTop+6;
  var hideQuantity = invoice.account.hide_quantity == '1';  

  doc.setFontSize(10);
  for (var i=0; i<invoice.invoice_items.length; i++) {
    var item = invoice.invoice_items[i];
    var cost = formatMoney(item.cost, currencyId, true);
    var qty = parseFloat(item.qty) ? parseFloat(item.qty) + '' : '';
    var notes = item.notes;
    var productKey = item.product_key;
    var tax = 0;
    if (item.tax && parseFloat(item.tax.rate)) {
      tax = parseFloat(item.tax.rate);
    } else if (item.tax_rate && parseFloat(item.tax_rate)) {
      tax = parseFloat(item.tax_rate);
    }   

    // show at most one blank line
    if (shownItem && (!cost || cost == '0.00') && !notes && !productKey) {
      continue;
    }   
    shownItem = true;

    var numLines = doc.splitTextToSize(item.notes, 200).length + 2;
    //console.log('num lines %s', numLines);

    var y = tableTop + (line * layout.tableRowHeight) + (2 * layout.tablePadding);
    var top = y - layout.tablePadding;
    var newTop = top + (numLines * layout.tableRowHeight);

    if (newTop > 770) {
      line = 0;
      tableTop = layout.accountTop + layout.tablePadding;
      y = tableTop;
      top = y - layout.tablePadding;
      newTop = top + (numLines * layout.tableRowHeight);
      doc.addPage();
    }

    var left = layout.marginLeft - layout.tablePadding;
    var width = layout.marginRight + layout.tablePadding;

    // process date variables
    if (invoice.is_recurring) {
      notes = processVariables(notes);
      productKey = processVariables(productKey);
    }

    var lineTotal = parseFloat(item.cost) * parseFloat(item.qty);
    if (tax) {
      lineTotal += lineTotal * tax / 100;
    }
    if (lineTotal) {
      total += lineTotal;
    }
    lineTotal = formatMoney(lineTotal, 1);


    var costX = layout.unitCostRight - (doc.getStringUnitWidth(cost) * doc.internal.getFontSize());
    var qtyX = layout.qtyRight - (doc.getStringUnitWidth(qty) * doc.internal.getFontSize());
    var taxX = layout.taxRight - (doc.getStringUnitWidth(tax+'%') * doc.internal.getFontSize());
    var totalX = layout.lineTotalRight - (doc.getStringUnitWidth(lineTotal) * doc.internal.getFontSize());
    //if (i==0) y -= 4;

    line += numLines;

  	doc.setDrawColor(0,0,0);
    doc.setLineWidth(0.5); 

	doc.line(left, newTop, width, newTop); 

    doc.line(left, top, left, newTop);

    doc.line(width, top, width, newTop);

    doc.line(left+60, top, left+60, newTop);

    doc.line(left+345, top, left+345, newTop);

	doc.line(left+450, top, left+450, newTop);


    y += 4;

    SetPdfColor('Black', doc);
    doc.setFontType('normal');

    doc.text(layout.marginLeft+15, y+2, qty);
    doc.text(costX+25, y+2, cost);
	doc.text(layout.descriptionLeft-70, y, notes);
    doc.text(totalX+5, y+2, lineTotal);

    // doc.setFontType('normal');
    // SetPdfColor('Black', doc);
    // if (tax) {
    //   doc.text(taxX, y+2, tax+'%');
    // }
  }  	

  y = tableTop + (line * layout.tableRowHeight) + (3 * layout.tablePadding);
  var cutoff = 700;
  if (invoice.terms) {
    cutoff -= 50;
  }
  if (invoice.public_notes) {
    cutoff -= 50;
  }

  if (y > cutoff) {
    doc.addPage();
    return layout.marginLeft;
  }

  return y;
}

function displayInvoiceItems2(doc, invoice, layout) {
  doc.setFontType("normal");

  var line = 1;
  var total = 0;
  var shownItem = false;
  var currencyId = invoice && invoice.client ? invoice.client.currency_id : 1;  
  var tableTop = layout.tableTop+6;
  var hideQuantity = invoice.account.hide_quantity == '1';  

  doc.setFontSize(10);
  for (var i=0; i<invoice.invoice_items.length; i++) {
    var item = invoice.invoice_items[i];
    var cost = formatMoney(item.cost, currencyId, true);
    var qty = parseFloat(item.qty) ? parseFloat(item.qty) + '' : '';
    var notes = item.notes;
    var productKey = item.product_key;
    var tax = 0;
    if (item.tax && parseFloat(item.tax.rate)) {
      tax = parseFloat(item.tax.rate);
    } else if (item.tax_rate && parseFloat(item.tax_rate)) {
      tax = parseFloat(item.tax_rate);
    }   

    // show at most one blank line
    if (shownItem && (!cost || cost == '0.00') && !notes && !productKey) {
      continue;
    }   
    shownItem = true;

    var numLines = doc.splitTextToSize(item.notes, 200).length + 2;
    //console.log('num lines %s', numLines);

    var y = tableTop + (line * layout.tableRowHeight) + (2 * layout.tablePadding);
    var top = y - layout.tablePadding;
    var newTop = top + (numLines * layout.tableRowHeight);

    if (newTop > 770) {
      line = 0;
      tableTop = layout.accountTop + layout.tablePadding;
      y = tableTop;
      top = y - layout.tablePadding;
      newTop = top + (numLines * layout.tableRowHeight);
      doc.addPage();
    }

    var left = layout.marginLeft - layout.tablePadding;
    var width = layout.marginRight + layout.tablePadding;

    // process date variables
    if (invoice.is_recurring) {
      notes = processVariables(notes);
      productKey = processVariables(productKey);
    }

    var lineTotal = parseFloat(item.cost) * parseFloat(item.qty);
    if (tax) {
      lineTotal += lineTotal * tax / 100;
    }
    if (lineTotal) {
      total += lineTotal;
    }
    lineTotal = formatMoney(lineTotal, 1);


    var costX = layout.unitCostRight - (doc.getStringUnitWidth(cost) * doc.internal.getFontSize());
    var qtyX = layout.qtyRight - (doc.getStringUnitWidth(qty) * doc.internal.getFontSize());
    var taxX = layout.taxRight - (doc.getStringUnitWidth(tax+'%') * doc.internal.getFontSize());
    var totalX = layout.lineTotalRight - (doc.getStringUnitWidth(lineTotal) * doc.internal.getFontSize());
    //if (i==0) y -= 4;

    line += numLines;

  	doc.setDrawColor(0,0,0);
    doc.setLineWidth(0.5); 

	doc.line(left, newTop, width, newTop); 

    doc.line(left, top, left, newTop);

    doc.line(width, top, width, newTop);

    // doc.line(left+60, top, left+60, newTop);

    // doc.line(left+345, top, left+345, newTop);

	doc.line(left+420, top, left+420, newTop);


    y += 4;

    SetPdfColor('Black', doc);
    doc.setFontType('normal');

    // doc.text(layout.marginLeft+15, y+2, qty);
    // doc.text(costX+25, y+2, cost);
	doc.text(layout.descriptionLeft-130, y, notes);
    doc.text(totalX+5, y+2, lineTotal);

    // doc.setFontType('normal');
    // SetPdfColor('Black', doc);
    // if (tax) {
    //   doc.text(taxX, y+2, tax+'%');
    // }
  }  	

  y = tableTop + (line * layout.tableRowHeight) + (3 * layout.tablePadding);
  var cutoff = 700;
  if (invoice.terms) {
    cutoff -= 50;
  }
  if (invoice.public_notes) {
    cutoff -= 50;
  }

  if (y > cutoff) {
    doc.addPage();
    return layout.marginLeft;
  }

  return y;
}


// http://stackoverflow.com/questions/1068834/object-comparison-in-javascript
function objectEquals(x, y) {
    // if both are function
    if (x instanceof Function) {
        if (y instanceof Function) {
            return x.toString() === y.toString();
        }
        return false;
    }
    if (x === null || x === undefined || y === null || y === undefined) { return x === y; }
    if (x === y || x.valueOf() === y.valueOf()) { return true; }

    // if one of them is date, they must had equal valueOf
    if (x instanceof Date) { return false; }
    if (y instanceof Date) { return false; }

    // if they are not function or strictly equal, they both need to be Objects
    if (!(x instanceof Object)) { return false; }
    if (!(y instanceof Object)) { return false; }

    var p = Object.keys(x);
    return Object.keys(y).every(function (i) { return p.indexOf(i) !== -1; }) ?
            p.every(function (i) { return objectEquals(x[i], y[i]); }) : false;
}



/*\
|*|
|*|  Base64 / binary data / UTF-8 strings utilities
|*|
|*|  https://developer.mozilla.org/en-US/docs/Web/JavaScript/Base64_encoding_and_decoding
|*|
\*/

/* Array of bytes to base64 string decoding */

function b64ToUint6 (nChr) {

  return nChr > 64 && nChr < 91 ?
      nChr - 65
    : nChr > 96 && nChr < 123 ?
      nChr - 71
    : nChr > 47 && nChr < 58 ?
      nChr + 4
    : nChr === 43 ?
      62
    : nChr === 47 ?
      63
    :
      0;

}

function base64DecToArr (sBase64, nBlocksSize) {

  var
    sB64Enc = sBase64.replace(/[^A-Za-z0-9\+\/]/g, ""), nInLen = sB64Enc.length,
    nOutLen = nBlocksSize ? Math.ceil((nInLen * 3 + 1 >> 2) / nBlocksSize) * nBlocksSize : nInLen * 3 + 1 >> 2, taBytes = new Uint8Array(nOutLen);

  for (var nMod3, nMod4, nUint24 = 0, nOutIdx = 0, nInIdx = 0; nInIdx < nInLen; nInIdx++) {
    nMod4 = nInIdx & 3;
    nUint24 |= b64ToUint6(sB64Enc.charCodeAt(nInIdx)) << 18 - 6 * nMod4;
    if (nMod4 === 3 || nInLen - nInIdx === 1) {
      for (nMod3 = 0; nMod3 < 3 && nOutIdx < nOutLen; nMod3++, nOutIdx++) {
        taBytes[nOutIdx] = nUint24 >>> (16 >>> nMod3 & 24) & 255;
      }
      nUint24 = 0;

    }
  }

  return taBytes;
}

/* Base64 string to array encoding */

function uint6ToB64 (nUint6) {

  return nUint6 < 26 ?
      nUint6 + 65
    : nUint6 < 52 ?
      nUint6 + 71
    : nUint6 < 62 ?
      nUint6 - 4
    : nUint6 === 62 ?
      43
    : nUint6 === 63 ?
      47
    :
      65;

}

function base64EncArr (aBytes) {

  var nMod3 = 2, sB64Enc = "";

  for (var nLen = aBytes.length, nUint24 = 0, nIdx = 0; nIdx < nLen; nIdx++) {
    nMod3 = nIdx % 3;
    if (nIdx > 0 && (nIdx * 4 / 3) % 76 === 0) { sB64Enc += "\r\n"; }
    nUint24 |= aBytes[nIdx] << (16 >>> nMod3 & 24);
    if (nMod3 === 2 || aBytes.length - nIdx === 1) {
      sB64Enc += String.fromCharCode(uint6ToB64(nUint24 >>> 18 & 63), uint6ToB64(nUint24 >>> 12 & 63), uint6ToB64(nUint24 >>> 6 & 63), uint6ToB64(nUint24 & 63));
      nUint24 = 0;
    }
  }

  return sB64Enc.substr(0, sB64Enc.length - 2 + nMod3) + (nMod3 === 2 ? '' : nMod3 === 1 ? '=' : '==');

}

/* UTF-8 array to DOMString and vice versa */

function UTF8ArrToStr (aBytes) {

  var sView = "";

  for (var nPart, nLen = aBytes.length, nIdx = 0; nIdx < nLen; nIdx++) {
    nPart = aBytes[nIdx];
    sView += String.fromCharCode(
      nPart > 251 && nPart < 254 && nIdx + 5 < nLen ? /* six bytes */
        /* (nPart - 252 << 32) is not possible in ECMAScript! So...: */
        (nPart - 252) * 1073741824 + (aBytes[++nIdx] - 128 << 24) + (aBytes[++nIdx] - 128 << 18) + (aBytes[++nIdx] - 128 << 12) + (aBytes[++nIdx] - 128 << 6) + aBytes[++nIdx] - 128
      : nPart > 247 && nPart < 252 && nIdx + 4 < nLen ? /* five bytes */
        (nPart - 248 << 24) + (aBytes[++nIdx] - 128 << 18) + (aBytes[++nIdx] - 128 << 12) + (aBytes[++nIdx] - 128 << 6) + aBytes[++nIdx] - 128
      : nPart > 239 && nPart < 248 && nIdx + 3 < nLen ? /* four bytes */
        (nPart - 240 << 18) + (aBytes[++nIdx] - 128 << 12) + (aBytes[++nIdx] - 128 << 6) + aBytes[++nIdx] - 128
      : nPart > 223 && nPart < 240 && nIdx + 2 < nLen ? /* three bytes */
        (nPart - 224 << 12) + (aBytes[++nIdx] - 128 << 6) + aBytes[++nIdx] - 128
      : nPart > 191 && nPart < 224 && nIdx + 1 < nLen ? /* two bytes */
        (nPart - 192 << 6) + aBytes[++nIdx] - 128
      : /* nPart < 127 ? */ /* one byte */
        nPart
    );
  }

  return sView;

}

function strToUTF8Arr (sDOMStr) {

  var aBytes, nChr, nStrLen = sDOMStr.length, nArrLen = 0;

  /* mapping... */

  for (var nMapIdx = 0; nMapIdx < nStrLen; nMapIdx++) {
    nChr = sDOMStr.charCodeAt(nMapIdx);
    nArrLen += nChr < 0x80 ? 1 : nChr < 0x800 ? 2 : nChr < 0x10000 ? 3 : nChr < 0x200000 ? 4 : nChr < 0x4000000 ? 5 : 6;
  }

  aBytes = new Uint8Array(nArrLen);

  /* transcription... */

  for (var nIdx = 0, nChrIdx = 0; nIdx < nArrLen; nChrIdx++) {
    nChr = sDOMStr.charCodeAt(nChrIdx);
    if (nChr < 128) {
      /* one byte */
      aBytes[nIdx++] = nChr;
    } else if (nChr < 0x800) {
      /* two bytes */
      aBytes[nIdx++] = 192 + (nChr >>> 6);
      aBytes[nIdx++] = 128 + (nChr & 63);
    } else if (nChr < 0x10000) {
      /* three bytes */
      aBytes[nIdx++] = 224 + (nChr >>> 12);
      aBytes[nIdx++] = 128 + (nChr >>> 6 & 63);
      aBytes[nIdx++] = 128 + (nChr & 63);
    } else if (nChr < 0x200000) {
      /* four bytes */
      aBytes[nIdx++] = 240 + (nChr >>> 18);
      aBytes[nIdx++] = 128 + (nChr >>> 12 & 63);
      aBytes[nIdx++] = 128 + (nChr >>> 6 & 63);
      aBytes[nIdx++] = 128 + (nChr & 63);
    } else if (nChr < 0x4000000) {
      /* five bytes */
      aBytes[nIdx++] = 248 + (nChr >>> 24);
      aBytes[nIdx++] = 128 + (nChr >>> 18 & 63);
      aBytes[nIdx++] = 128 + (nChr >>> 12 & 63);
      aBytes[nIdx++] = 128 + (nChr >>> 6 & 63);
      aBytes[nIdx++] = 128 + (nChr & 63);
    } else /* if (nChr <= 0x7fffffff) */ {
      /* six bytes */
      aBytes[nIdx++] = 252 + /* (nChr >>> 32) is not possible in ECMAScript! So...: */ (nChr / 1073741824);
      aBytes[nIdx++] = 128 + (nChr >>> 24 & 63);
      aBytes[nIdx++] = 128 + (nChr >>> 18 & 63);
      aBytes[nIdx++] = 128 + (nChr >>> 12 & 63);
      aBytes[nIdx++] = 128 + (nChr >>> 6 & 63);
      aBytes[nIdx++] = 128 + (nChr & 63);
    }
  }

  return aBytes;

}



function hexToR(h) {return parseInt((cutHex(h)).substring(0,2),16)}
function hexToG(h) {return parseInt((cutHex(h)).substring(2,4),16)}
function hexToB(h) {return parseInt((cutHex(h)).substring(4,6),16)}
function cutHex(h) {return (h.charAt(0)=="#") ? h.substring(1,7):h}
function setDocHexColor(doc, hex) {
  var r = hexToR(hex);
  var g = hexToG(hex);
  var b = hexToB(hex);
  return doc.setTextColor(r, g, b);
}
function setDocHexFill(doc, hex) {
  var r = hexToR(hex);
  var g = hexToG(hex);
  var b = hexToB(hex);
  return doc.setFillColor(r, g, b);
}
function setDocHexDraw(doc, hex) {
  var r = hexToR(hex);
  var g = hexToG(hex);
  var b = hexToB(hex);
  return doc.setDrawColor(r, g, b);
}

function openUrl(url, track) {
  trackUrl(track ? track : url);
  window.open(url, '_blank');
}

function toggleDatePicker(field) {
  $('#'+field).datepicker('show');
}

function roundToTwo(num, toString) {
  var val = +(Math.round(num + "e+2")  + "e-2");
  return toString ? val.toFixed(2) : val;
}

function truncate(str, length) {  
  return (str && str.length > length) ? (str.substr(0, length-1) + '...') : str;
}

function Unidades(num){

    switch(num)
    {
      case 1: return "UNO";
      case 2: return "DOS";
      case 3: return "TRES";
      case 4: return "CUATRO";
      case 5: return "CINCO";
      case 6: return "SEIS";
      case 7: return "SIETE";
      case 8: return "OCHO";
      case 9: return "NUEVE";
    }

    return "";
  }

  function Decenas(num){

    decena = Math.floor(num/10);
    unidad = num - (decena * 10);

    switch(decena)
    {
      case 1:   
        switch(unidad)
        {
          case 0: return "DIEZ";
          case 1: return "ONCE";
          case 2: return "DOCE";
          case 3: return "TRECE";
          case 4: return "CATORCE";
          case 5: return "QUINCE";
          default: return "DIECI" + Unidades(unidad);
        }
      case 2:
        switch(unidad)
        {
          case 0: return "VEINTE";
          default: return "VEINTI" + Unidades(unidad);
        }
      case 3: return DecenasY("TREINTA", unidad);
      case 4: return DecenasY("CUARENTA", unidad);
      case 5: return DecenasY("CINCUENTA", unidad);
      case 6: return DecenasY("SESENTA", unidad);
      case 7: return DecenasY("SETENTA", unidad);
      case 8: return DecenasY("OCHENTA", unidad);
      case 9: return DecenasY("NOVENTA", unidad);
      case 0: return Unidades(unidad);
    }
  }//Unidades()

  function DecenasY(strSin, numUnidades){
    if (numUnidades > 0)
      return strSin + " Y " + Unidades(numUnidades)

    return strSin;
  }//DecenasY()

  function Centenas(num){

    centenas = Math.floor(num / 100);
    decenas = num - (centenas * 100);

    switch(centenas)
    {
      case 1:
        if (decenas > 0)
          return "CIENTO " + Decenas(decenas);
        return "CIEN";
      case 2: return "DOSCIENTOS " + Decenas(decenas);
      case 3: return "TRESCIENTOS " + Decenas(decenas);
      case 4: return "CUATROCIENTOS " + Decenas(decenas);
      case 5: return "QUINIENTOS " + Decenas(decenas);
      case 6: return "SEISCIENTOS " + Decenas(decenas);
      case 7: return "SETECIENTOS " + Decenas(decenas);
      case 8: return "OCHOCIENTOS " + Decenas(decenas);
      case 9: return "NOVECIENTOS " + Decenas(decenas);
    }

    return Decenas(decenas);
  }//Centenas()

  function Seccion(num, divisor, strSingular, strPlural){
    cientos = Math.floor(num / divisor)
    resto = num - (cientos * divisor)

    letras = "";

    if (cientos > 0)
      if (cientos > 1)
        letras = Centenas(cientos) + " " + strPlural;
      else
        letras = strSingular;

    if (resto > 0)
      letras += "";

    return letras;
  }//Seccion()

  function Miles(num){
    divisor = 1000;
    cientos = Math.floor(num / divisor)
    resto = num - (cientos * divisor)

    strMiles = Seccion(num, divisor, "UN MIL", "MIL");
    strCentenas = Centenas(resto);

    if(strMiles == "")
      return strCentenas;

    return strMiles + " " + strCentenas;

    //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
  }//Miles()

  function Millones(num){
    divisor = 1000000;
    cientos = Math.floor(num / divisor)
    resto = num - (cientos * divisor)

    strMillones = Seccion(num, divisor, "UN MILLÓN", "MILLONES");
    strMiles = Miles(resto);

    if(strMillones == "")
      return strMiles;

    return strMillones + " " + strMiles;

    //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
  }//Millones()

  function NumeroALetras(num){
    var data = {
      numero: num,
      enteros: Math.floor(num),
      centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
      letrasCentavos: "",
      letrasMonedaPlural: "",
      letrasMonedaSingular: ""
    };

    if (data.centavos > 0)
    {
      data.letrasCentavos = " " + data.centavos + "/100......Bolivianos";
    }
    else
    {
      data.letrasCentavos = " 00/100......Bolivianos";
    }

    if(data.enteros == 0)
      return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
    if (data.enteros == 1)
      return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
    else
      return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
  }

    function NumeroALetrasPOS(num){
    var data = {
      numero: num,
      enteros: Math.floor(num),
      centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
      letrasCentavos: "",
      letrasMonedaPlural: "",
      letrasMonedaSingular: ""
    };

    if (data.centavos > 0)
    {
      data.letrasCentavos = " " + data.centavos + "/100......Bolivianos";
    }
    else
    {
      data.letrasCentavos = "00/100......Bolivianos";
    }

    if(data.enteros == 0)
      return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
    if (data.enteros == 1)
      return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
    else
      return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
  }