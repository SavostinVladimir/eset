YUI.add("eset-atto_emoticon-button",function(i,t){var o={EMOTE:"atto_emoticon_emote",MAP:"atto_emoticon_map"},n=".atto_emoticon_emote";i.namespace("M.atto_emoticon").Button=i.Base.create("button",i.M.editor_atto.EditorPlugin,[],{_currentSelection:null,initializer:function(){this.addButton({icon:"e/emoticons",callback:this._displayDialogue})},_displayDialogue:function(){this._currentSelection=this.get("host").getSelection(),!1!==this._currentSelection&&this.getDialogue({headerContent:M.util.get_string("insertemoticon","atto_emoticon"),focusAfterHide:!0},!0).set("bodyContent",this._getDialogueContent()).show()},_insertEmote:function(t){var e,i=t.target.ancestor(n,!0),o=this.get("host");t.preventDefault(),this.getDialogue({focusAfterHide:null}).hide(),e=" "+i.getData("text")+" ",o.setSelection(this._currentSelection),o.insertContentAtFocusPoint(e),this.markUpdated()},_getDialogueContent:function(){var t=i.Handlebars.compile('<div class="{{CSS.MAP}}"><ul>{{#each emoticons}}<li><div><a href="#" class="{{../CSS.EMOTE}}" data-text="{{text}}"><img src="{{image_url imagename imagecomponent}}" alt="{{get_string altidentifier altcomponent}}"/></a></div><div>{{text}}</div><div>{{get_string altidentifier altcomponent}}</div></li>{{/each}}</ul></div>'),e=i.Node.create(t({emoticons:this.get("emoticons"),CSS:o}));return e.delegate("click",this._insertEmote,n,this),e.delegate("key",this._insertEmote,"32",n,this),e}},{ATTRS:{emoticons:{value:{}}}})},"@VERSION@",{requires:["eset-editor_atto-plugin"]});