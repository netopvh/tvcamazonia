(()=>{"use strict";const e=window.wp.blocks,t=JSON.parse('{"u2":"foxiz-elements/accordion-item"}'),n=window.wp.element,c=window.wp.i18n,o=window.wp.blockEditor,a=window.wp.data;(0,e.registerBlockType)(t.u2,{edit:function(e){const{attributes:t,setAttributes:i,clientId:r}=e,{heading:l}=t,d=(e,t)=>{i({[e]:t})},{headingHTMLTag:s,tocAdded:m}=function(e){const t=(0,a.useSelect)((t=>t("core/block-editor").getBlockParents(e)[0]),[e]);return(0,a.useSelect)((e=>e("core/block-editor").getBlockAttributes(t)),[t])||{}}(r);(0,n.useEffect)((()=>{d("headingTag",s),d("tocAdded",m)}),[s,m]);const u=(0,o.useBlockProps)({className:"gb-accordion-item active"});return(0,n.createElement)("div",u,(0,n.createElement)("div",{className:"accordion-item-header"},(0,n.createElement)(o.RichText,{tagName:s||"h3",value:l,onChange:e=>d("heading",e),className:"accordion-title gb-heading",placeholder:(0,c.__)("Enter accordion title...")}),(0,n.createElement)("i",{className:"rbi rbi-angle-down gb-heading"})),(0,n.createElement)("div",{className:"accordion-item-content"},(0,n.createElement)(o.InnerBlocks,{templateLock:!1})))},save:function(){return(0,n.createElement)(o.InnerBlocks.Content,null)}})})();