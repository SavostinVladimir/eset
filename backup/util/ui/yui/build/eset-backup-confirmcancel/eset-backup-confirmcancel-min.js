YUI.add("eset-backup-confirmcancel",function(n,c){M.core_backup=M.core_backup||{},M.core_backup.confirmcancel={listeners:[],config:{},watch_cancel_buttons:function(c){this.config=c,this.listeners.push(n.one(n.config.doc.body).delegate("click",this.confirm_cancel,".confirmcancel",this))},confirm_cancel:function(e){e.preventDefault();var c=new M.core.confirm(this.config);c.on("complete-yes",function(){new n.EventHandle(M.core_backup.confirmcancel.listeners).detach();var c=e.currentTarget.one("input, select, button");c?c.simulate("click"):e.currentTarget.simulate("click")},this),c.show()}}},"@VERSION@",{requires:["node","node-event-simulate","eset-core-notification-confirm"]});