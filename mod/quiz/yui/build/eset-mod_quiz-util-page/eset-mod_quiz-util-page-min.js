YUI.add("eset-mod_quiz-util-page",function(n,e){n.namespace("Eset.mod_quiz.util.page"),n.Eset.mod_quiz.util.page={CSS:{PAGE:"page"},CONSTANTS:{ACTIONMENUIDPREFIX:"action-menu-",ACTIONMENUBARIDSUFFIX:"-menubar",ACTIONMENUMENUIDSUFFIX:"-menu",PAGEIDPREFIX:"page-",PAGENUMBERPREFIX:M.util.get_string("page","eset")+" "},SELECTORS:{ACTIONMENU:"div.eset-actionmenu",ACTIONMENUBAR:".menubar",ACTIONMENUMENU:".menu",ADDASECTION:'[data-action="addasection"]',PAGE:"li.page",INSTANCENAME:".instancename",NUMBER:"h4"},getPageFromComponent:function(e){return n.one(e).ancestor(this.SELECTORS.PAGE,!0)},getPageFromSlot:function(e){return n.one(e).previous(this.SELECTORS.PAGE)},getId:function(e){var t=e.get("id").replace(this.CONSTANTS.PAGEIDPREFIX,"");return!("number"!=typeof(t=parseInt(t,10))||!isFinite(t))&&t},setId:function(e,t){e.set("id",this.CONSTANTS.PAGEIDPREFIX+t)},getName:function(e){var t=e.one(this.SELECTORS.INSTANCENAME);return t?t.get("firstChild").get("data"):null},getNumber:function(e){var t=e.one(this.SELECTORS.NUMBER).get("text").replace(this.CONSTANTS.PAGENUMBERPREFIX,"");return!("number"!=typeof(t=parseInt(t,10))||!isFinite(t))&&t},setNumber:function(e,t){e.one(this.SELECTORS.NUMBER).set("text",this.CONSTANTS.PAGENUMBERPREFIX+t)},getPages:function(){return n.all(n.Eset.mod_quiz.util.slot.SELECTORS.PAGECONTENT+" "+n.Eset.mod_quiz.util.slot.SELECTORS.SECTIONUL+" "+this.SELECTORS.PAGE)},isPage:function(e){return!!e&&e.hasClass(this.CSS.PAGE)},isEmpty:function(e){var t=e.next("li.activity");return!t||!t.hasClass("slot")},add:function(e){var i,t=this.getNumber(this.getPageFromSlot(e))+1,o=M.mod_quiz.resource_toolbox.get("config").pagehtml;return o=o.replace(/%%PAGENUMBER%%/g,t),i=n.Node.create(o),YUI().use("dd-drop",function(e){var t=new e.DD.Drop({node:i,groups:M.mod_quiz.dragres.groups});i.drop=t}),e.insert(i,"after"),"undefined"!=typeof M.core.actionmenu&&M.core.actionmenu.newDOMNode(i),i},remove:function(e,t){var i=e.previous(n.Eset.mod_quiz.util.slot.SELECTORS.SLOT);!t&&i&&n.Eset.mod_quiz.util.slot.removePageBreak(i),e.remove()},reorderPages:function(){var e=this.getPages(),i=0;e.each(function(e){if(this.isEmpty(e)){var t=!!e.next("li.slot");this.remove(e,t)}else i++,this.setNumber(e,i),this.setId(e,i)},this),this.reorderActionMenus()},reorderActionMenus:function(){var s=this.getActionMenus();s.each(function(e,t){var i,o,n=s.item(t-1),E=0;n&&(E=this.getActionMenuId(n)),i=E+1,this.setActionMenuId(e,i),e.one(this.SELECTORS.ACTIONMENUBAR).set("id",this.CONSTANTS.ACTIONMENUIDPREFIX+i+this.CONSTANTS.ACTIONMENUBARIDSUFFIX),(o=e.one(this.SELECTORS.ACTIONMENUMENU)).set("id",this.CONSTANTS.ACTIONMENUIDPREFIX+i+this.CONSTANTS.ACTIONMENUMENUIDSUFFIX),o.one(this.SELECTORS.ADDASECTION).set("href",o.one(this.SELECTORS.ADDASECTION).get("href").replace(/\baddsectionatpage=\d+\b/,"addsectionatpage="+i))},this)},getActionMenus:function(){return n.all(n.Eset.mod_quiz.util.slot.SELECTORS.PAGECONTENT+" "+n.Eset.mod_quiz.util.slot.SELECTORS.SECTIONUL+" "+this.SELECTORS.ACTIONMENU)},getActionMenuId:function(e){var t=e.get("id").replace(this.CONSTANTS.ACTIONMENUIDPREFIX,"");return!("number"!=typeof(t=parseInt(t,10))||!isFinite(t))&&t},setActionMenuId:function(e,t){e.set("id",this.CONSTANTS.ACTIONMENUIDPREFIX+t)}}},"@VERSION@",{requires:["node","eset-mod_quiz-util-base"]});