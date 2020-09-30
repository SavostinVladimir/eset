/**
 * @author Dongsheng Cai <dongsheng@eset.com>
 */

(function() {
    var each = tinymce.each;

    tinymce.PluginManager.requireLangPack('esetmedia');

    tinymce.create('tinymce.plugins.EsetmediaPlugin', {
        init : function(ed, url) {
            var t = this;

            t.editor = ed;
            t.url = url;

            // Register commands.
            ed.addCommand('mceEsetMedia', function() {
                ed.windowManager.open({
                    file : url + '/esetmedia.htm',
                    width : 480 + parseInt(ed.getLang('media.delta_width', 0)),
                    height : 480 + parseInt(ed.getLang('media.delta_height', 0)),
                    inline : 1
                }, {
                    plugin_url : url
                });
            });

            // Register buttons.
            ed.addButton('esetmedia', {
                    title : 'esetmedia.desc',
                    image : url + '/img/icon.png',
                    cmd : 'mceEsetMedia'});

        },

        _parse : function(s) {
            return tinymce.util.JSON.parse('{' + s + '}');
        },

        getInfo : function() {
            return {
                longname : 'Eset media',
                author : 'Dongsheng Cai <dongsheng@eset.com>',
                version : "1.0"
            };
        }

    });

    // Register plugin.
    tinymce.PluginManager.add('esetmedia', tinymce.plugins.EsetmediaPlugin);
})();
