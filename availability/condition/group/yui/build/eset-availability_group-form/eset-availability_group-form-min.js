YUI.add("eset-availability_group-form",function(t,i){M.availability_group=M.availability_group||{},M.availability_group.form=t.Object(M.core_availability.plugin),M.availability_group.form.groups=null,M.availability_group.form.initInner=function(i){this.groups=i},M.availability_group.form.getNode=function(i){var a,e,l,o='<label><span class="pr-3">'+M.util.get_string("title","availability_group")+'</span> <span class="availability-group"><select name="id" class="custom-select"><option value="choose">'+M.util.get_string("choosedots","eset")+'</option><option value="any">'+M.util.get_string("anygroup","availability_group")+"</option>";for(a=0;a<this.groups.length;a++)o+='<option value="'+(e=this.groups[a]).id+'">'+e.name+"</option>";return o+="</select></span></label>",l=t.Node.create('<span class="form-inline">'+o+"</span>"),i.creating===undefined&&(i.id!==undefined&&l.one("select[name=id] > option[value="+i.id+"]")?l.one("select[name=id]").set("value",""+i.id):i.id===undefined&&l.one("select[name=id]").set("value","any")),M.availability_group.form.addedEvents||(M.availability_group.form.addedEvents=!0,t.one(".availability-field").delegate("change",function(){M.core_availability.form.update()},".availability_group select")),l},M.availability_group.form.fillValue=function(i,a){var e=a.one("select[name=id]").get("value");"choose"===e?i.id="choose":"any"!==e&&(i.id=parseInt(e,10))},M.availability_group.form.fillErrors=function(i,a){var e={};this.fillValue(e,a),e.id&&"choose"===e.id&&i.push("availability_group:error_selectgroup")}},"@VERSION@",{requires:["base","node","event","eset-core_availability-form"]});