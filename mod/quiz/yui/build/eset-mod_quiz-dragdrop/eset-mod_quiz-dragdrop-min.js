YUI.add("eset-mod_quiz-dragdrop",function(p,e){var o,c=".actions",t="activity",h="mod-quiz-edit-content",g="editing_move",i="iconsmall",s="jumpmenu",r="left",d="movedown",a="moveup",n="page-content",l="right",u="slots",_="section-handle",m="slots",f="sectiondraggable",v="li.page",z="li.slot",q=function(){q.superclass.constructor.apply(this,arguments)};p.extend(q,M.core.dragdrop,{sectionlistselector:null,initializer:function(){if(this.groups=[f],this.samenodeclass="section",this.parentnodeclass="slots",p.Node.one("."+s))return!1;if(this.sectionlistselector="li.section",this.sectionlistselector){this.sectionlistselector="."+h+" "+this.sectionlistselector,this.setup_for_section(this.sectionlistselector);var e=new p.DD.Delegate({container:"."+h,nodes:"."+f,target:!0,handles:["."+r],dragConfig:{groups:this.groups}});e.dd.plug(p.Plugin.DDProxy,{moveOnEnd:!1}),e.dd.plug(p.Plugin.DDConstrained,{constrain:"#"+n,stickY:!0}),e.dd.plug(p.Plugin.DDWinScroll)}},setup_for_section:function(e){p.Node.all(e).each(function(e){var o,t,i,s,n=p.Eset.core_course.util.section.getId(e);0<n&&(o=e.one("."+l+" a."+d),t=e.one("."+l+" a."+a),i=M.util.get_string("movesection","eset",n),s=e.one("."+r),(o||t)&&s&&(s.setStyle("cursor","move"),s.appendChild(this.get_drag_handle(i,_,"icon",!0)),t&&t.remove(),o&&o.remove(),e.addClass(f)))},this)},drag_start:function(e){var o=e.target,t=p.Node.create('<ul class="slots"></ul>'),i=p.Node.create('<ul class="section"></ul>');i.setStyle("margin",0),i.setContent(o.get("node").get("innerHTML")),t.appendChild(i),o.get("dragNode").setContent(t),o.get("dragNode").addClass(h)},drag_dropmiss:function(e){this.drop_hit(e)},get_section_index:function(e){var o="."+h+" li.section",t=p.all(o);return t.indexOf(e)-t.indexOf(p.one("#section-0"))},drop_hit:function(r){var d,a,e,o,t,i,s=r.drag,n=s.get("node"),l=p.Eset.core_course.util.section.getId(n),u=l,c=this.get_section_index(n),g=c;if(l!==c){for(t in g<u&&(u=c,g=l),s.get("dragNode").removeClass(h),d=p.Node.all(this.sectionlistselector),a=M.util.add_lightbox(p,n),e={},o=this.get("config").pageparams)o.hasOwnProperty(t)&&(e[t]=o[t]);e.sesskey=M.cfg.sesskey,e.courseid=this.get("courseid"),e.quizid=this.get("quizid"),e["class"]="section",e.field="move",e.id=l,e.value=c,i=M.cfg.wwwroot+this.get("ajaxurl"),p.io(i,{method:"POST",data:e,on:{start:function(){a.show()},success:function(e,o){var t,i,s,n;try{(t=p.JSON.parse(o.responseText)).error&&new M.core.ajaxException(t),M.mod_quiz.edit.process_sections(p,d,t,u,g)}catch(r){}s=!1;do{for(s=!1,i=u;i<=g;i++)p.Eset.core_course.util.section.getId(d.item(i-1))>p.Eset.core_course.util.section.getId(d.item(i))&&(n=d.item(i-1).get("id"),d.item(i-1).set("id",d.item(i).get("id")),d.item(i).set("id",n),M.mod_quiz.edit.swap_sections(p,i-1,i),s=!0);--g}while(s);window.setTimeout(function(){a.hide()},250)},failure:function(e,o){this.ajax_failure(o),a.hide()}},context:this})}}},{NAME:"mod_quiz-dragdrop-section",ATTRS:{courseid:{value:null},quizid:{value:null},ajaxurl:{value:0},config:{value:0}}}),M.mod_quiz=M.mod_quiz||{},M.mod_quiz.init_section_dragdrop=function(e){new q(e)},o=function(){o.superclass.constructor.apply(this,arguments)},p.extend(o,M.core.dragdrop,{initializer:function(){var e,o;this.groups=["resource"],this.samenodeclass=t,this.parentnodeclass=u,this.samenodelabel={identifier:"dragtoafter",component:"quiz"},this.parentnodelabel={identifier:"dragtostart",component:"quiz"},this.setup_for_section(),e="li."+t,(o=new p.DD.Delegate({container:"."+h,nodes:e,target:!0,handles:["."+g],dragConfig:{groups:this.groups}})).dd.plug(p.Plugin.DDProxy,{moveOnEnd:!1,cloneNode:!0}),o.dd.plug(p.Plugin.DDConstrained,{constrain:"#"+m}),o.dd.plug(p.Plugin.DDWinScroll),M.mod_quiz.quizbase.register_module(this),M.mod_quiz.dragres=this},setup_for_section:function(){p.Node.all(".mod-quiz-edit-content ul.slots ul.section").each(function(e){e.setAttribute("data-draggroups",this.groups.join(" ")),new p.DD.Drop({node:e,groups:this.groups,padding:"20 0 20 0"}),this.setup_for_resource("li.activity")},this)},setup_for_resource:function(e){p.Node.all(e).each(function(e){var o,t=e.one("a."+g);t&&(o=this.get_drag_handle(M.util.get_string("move","eset"),g,i,!0),t.replace(o))},this)},drag_start:function(e){var o=e.target;o.get("dragNode").setContent(o.get("node").get("innerHTML")),o.get("dragNode").all(".icon").setStyle("vertical-align","baseline")},drag_dropmiss:function(e){this.drop_hit(e)},drop_hit:function(e){var o,t,i,s,n=e.drag,r=n.get("node"),d=r.one(c),a=M.util.add_spinner(p,d),l={},u=this.get("config").pageparams;for(o in u)l[o]=u[o];l.sesskey=M.cfg.sesskey,l.courseid=this.get("courseid"),l.quizid=this.get("quizid"),l["class"]="resource",l.field="move",l.id=Number(p.Eset.mod_quiz.util.slot.getId(r)),l.sectionId=p.Eset.core_course.util.section.getId(r.ancestor("li.section",!0)),(t=r.previous(z))&&(l.previousid=Number(p.Eset.mod_quiz.util.slot.getId(t))),(i=r.previous(v))&&(l.page=Number(p.Eset.mod_quiz.util.page.getId(i))),s=M.cfg.wwwroot+this.get("ajaxurl"),p.io(s,{method:"POST",data:l,on:{start:function(){this.lock_drag_handle(n,g),a.show()},success:function(e,o){var t=p.JSON.parse(o.responseText),i={element:r,visible:t.visible};M.mod_quiz.quizbase.invoke_function("set_visibility_resource_ui",i),this.unlock_drag_handle(n,g),window.setTimeout(function(){a.hide()},250),M.mod_quiz.resource_toolbox.reorganise_edit_page()},failure:function(e,o){this.ajax_failure(o),this.unlock_drag_handle(n,_),a.hide(),window.location.reload(!0)}},context:this})},global_drop_over:function(e){var o,t,i;e.drop&&e.drop.inGroup(this.groups)&&(o=e.drag.get("node"),t=e.drop.get("node"),this.lastdroptarget=e.drop,t.hasClass(this.samenodeclass)?(i=this.goingup?"before":"after",t.insert(o,i)):!t.hasClass(this.parentnodeclass)&&!t.test('[data-droptarget="1"]')||t.contains(o)||(this.goingup?t.append(o):t.prepend(o)),this.drop_over(e))}},{NAME:"mod_quiz-dragdrop-resource",ATTRS:{courseid:{value:null},quizid:{value:null},ajaxurl:{value:0},
config:{value:0}}}),M.mod_quiz=M.mod_quiz||{},M.mod_quiz.init_resource_dragdrop=function(e){new o(e)}},"@VERSION@",{requires:["base","node","io","dom","dd","dd-scroll","eset-core-dragdrop","eset-core-notification","eset-mod_quiz-quizbase","eset-mod_quiz-util-base","eset-mod_quiz-util-page","eset-mod_quiz-util-slot","eset-course-util"]});