/*jslint browser: true*/
/*global define, module, exports*/
(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return factory(root);
        });
    } else if (typeof exports === 'object') {
        module.exports = factory;
    } else {
        root.Instaphotos = factory(root);
    }
})(this, function () {
    "use strict";

    var Instaphotos = function (options) {
        if (!this || !(this instanceof Instaphotos)) {
            return new Instaphotos(options);
        }

        if (typeof options === 'string') {
            options = { key : options };
        }

        this.container = options.container;
        this.template  = options.template;
        this.endpoint  = '../request.php?user=' + options.username + '&count=' + options.count;

        this.fetch();
    };

    Instaphotos.init = function (options) {
        return new Instaphotos(options);
    };

    Instaphotos.prototype = {
        attachTemplate: function () {
            var template = Handlebars.compile(this.template);

            this.container.empty().append(template(this.instagram));
        },
        fetch: function () {
            var self = this;
            $.getJSON(self.endpoint, function (res) {
                var photos = res.data;

                self.instagram = $.map(photos, function (photo) {
                    return {
                        image: photo.images.low_resolution.url,
                        url: photo.link,
                        description: photo.caption.text,
                        likes: photo.likes.count
                    };
                });

                self.attachTemplate();
            });
        }
    }

    return Instaphotos;
});