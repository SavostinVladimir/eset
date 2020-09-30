YUI.add("eset-editor_atto-menu",function(i,e){var s='<div class="open {{config.buttonClass}} atto_menu" style="min-width:{{config.innerOverlayWidth}};"><ul class="dropdown-menu">{{#each config.items}}<li role="presentation" class="atto_menuentry"><a href="#" role="menuitem" data-index="{{@index}}" {{#each data}}data-{{@key}}="{{this}}"{{/each}}>{{{text}}}</a></li>{{/each}}</ul></div>',t=function(){t.superclass.constructor.apply(this,arguments)};i.extend(t,M.core.dialogue,{_menuHandlers:null,initializer:function(e){var t,n,o,a;this._menuHandlers=[],o=i.Handlebars.compile(s),a=i.Node.create(o({config:e})),this.set("bodyContent",a),(n=this.get("boundingBox")).addClass("editor_atto_controlmenu"),n.addClass("editor_atto_menu"),n.one(".eset-dialogue-wrap").removeClass("eset-dialogue-wrap").addClass("eset-dialogue-content"),t=i.Node.create("<h3/>").addClass("accesshide").setHTML(this.get("headerText")),this.get("bodyContent").prepend(t),this.headerNode.hide(),this.footerNode.hide(),this._setupHandlers()},_setupHandlers:function(){var e=this.get("contentBox");this._menuHandlers.push(e.delegate("key",this._chooseMenuItem,"32, enter",".atto_menuentry",this),e.delegate("key",this._handleKeyboardEvent,"down:38,40",".dropdown-menu",this),e.on("focusoutside",this.hide,this),e.delegate("key",this.hide,"down:37,39,esc",".dropdown-menu",this))},_chooseMenuItem:function(e){e.target.simulate("click"),e.preventDefault()},hide:function(e){if(!0!==this.get("preventHideMenu"))return e&&e.preventDefault(),t.superclass.hide.call(this,arguments)},_handleKeyboardEvent:function(e){var t,n,o,a,i,s,d;for(e.preventDefault(),t=e.currentTarget.all('a[role="menuitem"]'),n=!1,a=1,i=o=0,s=e.target.ancestor('a[role="menuitem"]',!0);!n&&o<t.size();)t.item(o)===s?n=!0:o++;if(n){for(38===e.keyCode&&(a=-1);(o+=a)<0?o=t.size()-1:o>=t.size()&&(o=0),d=t.item(o),++i<t.size()&&d!==s&&d.hasAttribute("hidden"););d&&d.focus(),e.preventDefault(),e.stopImmediatePropagation()}}},{NAME:"menu",ATTRS:{headerText:{value:""}}}),i.Base.modifyAttrs(t,{width:{value:"auto"},hideOn:{value:[{eventName:"clickoutside"}]},extraClasses:{value:["editor_atto_menu"]},responsive:{value:!1},visible:{value:!1},center:{value:!1},closeButton:{value:!1}}),i.namespace("M.editor_atto").Menu=t},"@VERSION@",{requires:["eset-core-notification-dialogue","node","event","event-custom"]});