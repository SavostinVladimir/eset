YUI.add("eset-atto_noautolink-button",function(t,n){t.namespace("M.atto_noautolink").Button=t.Base.create("button",t.M.editor_atto.EditorPlugin,[],{initializer:function(){this.addButton({icon:"e/prevent_autolink",callback:this._preventAutoLink,inlineFormat:!0,tags:".nolink"})},_preventAutoLink:function(){this.get("host").toggleInlineSelectionClass(["nolink"])}})},"@VERSION@",{requires:["eset-editor_atto-plugin"]});