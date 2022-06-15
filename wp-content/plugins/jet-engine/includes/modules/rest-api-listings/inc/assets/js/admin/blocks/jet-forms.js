!function(e){var t={};function n(r){if(t[r])return t[r].exports;var a=t[r]={i:r,l:!1,exports:{}};return e[r].call(a.exports,a,a.exports,n),a.l=!0,a.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)n.d(r,a,function(t){return e[t]}.bind(null,a));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=2)}({2:function(e,t){function n(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var n=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null==n)return;var r,a,l=[],o=!0,i=!1;try{for(n=n.call(e);!(o=(r=n.next()).done)&&(l.push(r.value),!t||l.length!==t);o=!0);}catch(e){i=!0,a=e}finally{try{o||null==n.return||n.return()}finally{if(i)throw a}}return l}(e,t)||function(e,t){if(!e)return;if("string"==typeof e)return r(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return r(e,t)}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function r(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}var a=wp.components,l=a.TextControl,o=a.SelectControl,i=a.TextareaControl,u=a.ToggleControl,c=wp.element,p=c.useState,s=c.useEffect,m=JetFBActions,f=m.addAction,d=m.getFormFieldsBlocks,h=m.Tools.withPlaceholder,b=JetFBComponents,y=(b.ActionFieldsMap,b.WrapperRequiredControl,b.MacrosInserter),g=wp.hooks,_=g.applyFilters,w=g.addFilter;f("rest_api_request",(function(e){var t=e.settings,r=e.label,a=e.help,c=e.source,m=e.onChangeSetting,f=n(p([]),2),b=f[0],g=f[1];return s((function(){g(d())}),[]),wp.element.createElement(React.Fragment,null,wp.element.createElement("div",{className:"jet-form-editor__macros-wrap"},wp.element.createElement(i,{className:"jet-border-unset",label:r("url"),value:t.url,help:a("url"),onChange:function(e){return m(e,"url")}}),wp.element.createElement(y,{fields:b,onFieldClick:function(e){var n=(t.url||"")+"%"+e+"%";m(n,"url")}})),wp.element.createElement("div",{className:"jet-form-editor__macros-wrap"},wp.element.createElement(i,{label:r("body"),value:t.body,onChange:function(e){return m(e,"body")}}),wp.element.createElement(y,{fields:b,onFieldClick:function(e){var n=(t.body||"")+"%"+e+"%";m(n,"body")}})),wp.element.createElement("p",{className:"components-base-control__help",style:{marginTop:"0px",color:"rgb(117, 117, 117)"},dangerouslySetInnerHTML:{__html:a("body")}}),wp.element.createElement(u,{label:r("authorization"),checked:t.authorization,onChange:function(e){return m(e,"authorization")}}),t.authorization&&wp.element.createElement(React.Fragment,null,wp.element.createElement(o,{label:r("auth_type"),labelPosition:"side",value:t.auth_type,onChange:function(e){m(e,"auth_type")},options:h(c.auth_types)}),"application-password"===t.auth_type&&wp.element.createElement(React.Fragment,null,wp.element.createElement(l,{label:r("application_pass"),help:a("application_pass"),value:t.application_pass,onChange:function(e){return m(e,"application_pass")}})),_("jet.engine.restapi.authorization.fields.".concat(t.auth_type),wp.element.createElement(React.Fragment,null),e)))})),w("jet.engine.restapi.authorization.fields.rapidapi","jet-engine",(function(e,t){var n=t.settings,r=t.label,a=t.help,o=(t.source,t.onChangeSetting);return wp.element.createElement(React.Fragment,null,wp.element.createElement(l,{label:r("rapidapi_key"),help:a("rapidapi_key"),value:n.rapidapi_key,onChange:function(e){return o(e,"rapidapi_key")}}),wp.element.createElement(l,{label:r("rapidapi_host"),help:a("rapidapi_host"),value:n.rapidapi_host,onChange:function(e){return o(e,"rapidapi_host")}}))})),w("jet.engine.restapi.authorization.fields.bearer-token","jet-engine",(function(e,t){var n=t.settings,r=t.label,a=t.help,o=(t.source,t.onChangeSetting);return wp.element.createElement(React.Fragment,null,wp.element.createElement(l,{label:r("bearer_token"),help:a("bearer_token"),value:n.bearer_token,onChange:function(e){return o(e,"bearer_token")}}))}))}});