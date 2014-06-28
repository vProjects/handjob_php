/*
jquery.flash v1.3.1 -  02/01/10
(c)2009 Stephen Belanger - MIT/GPL.
http://docs.jquery.com/License
*/
Array.prototype.indexOf = function (o, i) {
    for (var j = this.length, i = i < 0 ? i + j < 0 ? 0 : i + j : i || 0; i < j && this[i] !== o; i++);
    return j <= i ? -1 : i;
};
$.fn.extend({
    flash: function (opt) {
        var has, cv, ie;

        function attr(a, b) {
            return ' ' + a + '="' + b + '"';
        }

        function param(a, b) {
            return '<param name="' + a + '" value="' + b + '" />';
        }
        var p = navigator.plugins;
        if (p && p.length) {
            var f = p['Shockwave Flash'];
            if (f) {
                has = true;
                if (f.description) cv = f.description.replace(/([a-zA-Z]|\s)+/, "").replace(/(\s+r|\s+b[0-9]+)/, ".").split(".");
            }
            if (p['Shockwave Flash 2.0']) {
                has = true;
                cv = '2.0.0.11';
            }
        } else {
            try {
                var axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");
            } catch (e) {
                try {
                    var axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");
                    cv = [6, 0, 21];
                    has = true;
                } catch (e) {};
                try {
                    axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
                } catch (e) {};
            }
            if (axo != null) {
                cv = axo.GetVariable("$version").split(" ")[1].split(",");
                has = true;
                ie = true;
            }
        }
        $(this).each(function () {
            if (has) {
                var e = $(this),
                    s = $.extend({
                        'id': e.attr('id'),
                        'class': e.attr('class'),
                        'width': e.width(),
                        'height': e.height(),
                        'src': e.attr('href'),
                        'classid': 'clsid:D27CDB6E-AE6D-11cf-96B8-444553540000',
                        'pluginspace': 'http://get.adobe.com/flashplayer',
                        'availattrs': ['id', 'class', 'width', 'height', 'src'],
                        'availparams': ['src', 'bgcolor', 'quality', 'allowscriptaccess', 'allowfullscreen', 'flashvars', 'wmode'],
                        'version': '9.0.24'
                    }, opt),
                    a = s.availattrs,
                    b = s.availparams,
                    rv = s.version.split('.'),
                    o = '<object';
                if (!s.codebase) {
                    s.codebase = 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=' + rv.join(',');
                }
                if (s.express) {
                    for (var i in cv) {
                        if (parseInt(cv[i]) > parseInt(rv[i])) {
                            break;
                        }
                        if (parseInt(cv[i]) < parseInt(rv[i])) {
                            s.src = s.express;
                        }
                    }
                }
                if (s.flashvars) {
                    s.flashvars = unescape($.param(s.flashvars));
                }
                a = ie ? a.concat(['classid', 'codebase']) : a.concat(['pluginspage']);
                for (k in a) {
                    var n = (k == a.indexOf('src')) ? 'data' : a[k];
                    o += s[a[k]] ? attr(n, s[a[k]]) : '';
                };
                o += '>';
                for (k in b) {
                    var n = (k == b.indexOf('src')) ? 'movie' : b[k];
                    o += s[b[k]] ? param(n, s[b[k]]) : '';
                };
                o += '</object>';
                e.replaceWith(o);
            }
            return this;
        });
    }
});