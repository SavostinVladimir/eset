YUI.add("eset-tool_lp-dragdrop-reorder",function(e,a){var r=function(){r.superclass.constructor.apply(this,arguments)},s="editing_move",o="iconsmall";e.extend(r,M.core.dragdrop,{initializer:function(r){e.one("."+r.parentNodeClass).all("."+r.dragHandleInsertClass).size()<=1||(this.groups=[r.group],this.samenodeclass=r.sameNodeClass,this.parentnodeclass=r.parentNodeClass,this.draghandleinsertclass=r.dragHandleInsertClass,this.samenodelabel=r.sameNodeLabel,this.parentnodelabel=r.parentNodeLabel,this.callback=r.callback,new e.DD.Delegate({container:"."+r.parentNodeClass,nodes:"."+r.sameNodeClass,target:!0,handles:["."+s],dragConfig:{groups:this.groups}}).dd.plug(e.Plugin.DDProxy),e.one("."+r.parentNodeClass).all("."+r.dragHandleInsertClass).each(function(e){var a=this.get_drag_handle(r.dragHandleText,s,o,!0);e.insert(a)},this))},drop_hit:function(e){this.callback(e)}},{NAME:"tool_lp-dragdrop-reorder",ATTRS:{}}),M.tool_lp=M.tool_lp||{},M.tool_lp.dragdrop_reorder=function(e){return new r(e)}},"@VERSION@",{requires:["eset-core-dragdrop"]});