(()=>{"use strict";const e=window.wp.blocks,l=JSON.parse('{"u2":"foxiz-elements/affiliate-list-item"}'),t=window.wp.element,a=window.wp.i18n,n=window.wp.components,o=window.wp.blockEditor;(0,e.registerBlockType)(l.u2,{edit:function(e){const{attributes:l,setAttributes:i}=e,{logo:r,logoURL:s,logoAlt:c,logoH:m,logoW:d,heading:g,price:p,salePrice:h,link:u,buttonLabel:E,isInternal:_,isSponsored:f}=l,b=(e,l)=>{i({[e]:l})},v=(0,o.useBlockProps)({className:"af-list-item"});return(0,t.createElement)("div",v,(0,t.createElement)(o.InspectorControls,null,(0,t.createElement)(n.PanelBody,{title:(0,a.__)("Details"),initialOpen:!0},(0,t.createElement)(n.BaseControl,null,(0,t.createElement)(n.Tip,null,(0,a.__)("You can control styling for all Affiliate List Items in the parent (Affiliate List) block."))),(0,t.createElement)(n.TextControl,{label:(0,a.__)("Brand Name"),value:g,onChange:e=>b("heading",e),placeholder:(0,a.__)("Enter brand name...")}),(0,t.createElement)(n.TextareaControl,{label:(0,a.__)("Add Custom Logo URL"),value:s,onChange:e=>b("logoURL",e),help:(0,a.__)("You can add logo or input custom image URL here."),placeholder:(0,a.__)("//website.com/.../image.jpg")}),(0,t.createElement)(n.TextControl,{label:(0,a.__)("Price"),placeholder:"99",value:p,onChange:e=>b("price",e)}),(0,t.createElement)(n.TextControl,{label:(0,a.__)("Discounted Price"),placeholder:"$49",value:h,onChange:e=>b("salePrice",e)}),(0,t.createElement)(n.TextControl,{label:(0,a.__)("Affiliate Link"),placeholder:(0,a.__)("https://..."),help:(0,a.__)("Input the full link, including the HTTPS protocol"),value:u,onChange:e=>b("link",e)}),(0,t.createElement)(n.TextControl,{label:(0,a.__)("Button Label"),value:E,onChange:e=>b("buttonLabel",e)}),(0,t.createElement)(n.ToggleControl,{label:(0,a.__)("Internal Link?"),checked:_,onChange:e=>b("isInternal",e),help:(0,a.__)("Disable opening in a new tab and remove the nofollow,sponsored attributes in the rel for internal links.")}),(0,t.createElement)(n.ToggleControl,{label:(0,a.__)("Sponsored?"),checked:f,onChange:e=>b("isSponsored",e),help:(0,a.__)("Tell the search engine bot your relationship with the linked page.")}))),(0,t.createElement)("div",{className:"af-list-item-inner"},(0,t.createElement)("div",{className:"af-list-item-left"},(0,t.createElement)("div",null,s&&!r&&(0,t.createElement)("img",{className:"af-list-logo",src:s,alt:"Download Image"}),(0,t.createElement)(o.MediaUploadCheck,null,(0,t.createElement)(o.MediaUpload,{onSelect:e=>function(e,l){i({[e]:l.url}),i({[e+"Alt"]:l.alt}),i({[e+"H"]:l.height}),i({[e+"W"]:l.width})}("logo",e),allowedTypes:["image"],value:r,render:({open:e})=>(0,t.createElement)("div",null,!r&&(0,t.createElement)(n.Button,{className:"rb-editor-media-add",onClick:e},(0,t.createElement)(n.Dashicon,{icon:"plus-alt2"}),(0,a.__)("Add Logo")),r&&(0,t.createElement)("div",{className:"rb-editor-media-preview"},(0,t.createElement)("img",{className:"af-list-logo",src:r,alt:c||"logo"}),(0,t.createElement)(n.Button,{className:"rb-editor-media-remove",onClick:()=>{return i({[e="logo"]:""}),i({[e+"Alt"]:""}),i({[e+"H"]:null}),void i({[e+"W"]:null});var e}},(0,t.createElement)(n.Dashicon,{icon:"minus"}),(0,a.__)("Remove Logo"))))}))),(0,t.createElement)(o.RichText,{tagName:"span",value:g,onChange:e=>b("heading",e),className:"gb-small-heading h4",placeholder:(0,a.__)("Enter brand name...")})),(0,t.createElement)("div",{className:"af-list-item-right"},h?(0,t.createElement)("span",{className:"af-price h4"},(0,t.createElement)("del",null,p),h):(0,t.createElement)("span",{className:"af-price h4"},p),E&&(0,t.createElement)("span",{className:"af-button is-btn"},E," "))))},save:function({attributes:e}){const{logo:l,logoURL:a,logoAlt:n,logoH:i,logoW:r,heading:s,price:c,salePrice:m,link:d,buttonLabel:g,isInternal:p,isSponsored:h}=e,u=o.useBlockProps.save({className:"af-list-item"});return(0,t.createElement)("div",u,(0,t.createElement)("div",{className:"af-list-item-inner"},(0,t.createElement)("div",{className:"af-list-item-left"},l?(0,t.createElement)("img",{loading:"lazy",className:"af-list-logo",src:l,height:i||"",width:r||"",alt:n||""}):a?(0,t.createElement)("img",{loading:"lazy",className:"af-list-logo",src:a,alt:""}):null,s&&(0,t.createElement)(o.RichText.Content,{tagName:"span",className:"gb-small-heading h4",value:s})),(0,t.createElement)("div",{className:"af-list-item-right"},m?(0,t.createElement)("span",{className:"af-price h4"},(0,t.createElement)("del",null,c),m):(0,t.createElement)("span",{className:"af-price h4"},c),g&&(0,t.createElement)("a",{href:d,target:p?null:"_blank",rel:p?null:h?"sponsored noopener":"noopener noreferrer nofollow",className:"af-button is-btn"},g))))}})})();