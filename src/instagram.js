/*
*
* Instaphotos 1.0
* Copyright 2013, Pedro Rogerio
* Licensed under the WTFPL licenses (http://www.wtfpl.net/).
*
*/
var Instaphotos = {
    init: function(config) {
		this.url = 'instaphotos.php?user=' + config.username + '&count=' + config.count + '';
		this.template = config.template;
        this.container = config.container;
        this.fetch();
    },
    attachTemplate: function() {
        var template = Handlebars.compile(this.template);

        this.container.empty().append(template(this.instagram));
    },
    fetch: function() {
        var self = this;
        
        $.getJSON(this.url, function(data) {
            self.instagram = $.map(data, function(photo) {
                return {
                    image: photo.image,
					url: photo.url,
                    description: photo.description,
                    likes: photo.likes
                };
            });

            self.attachTemplate();
        });
    }
};

Instaphotos.init({
    template: $('#instagram-template').html(),
    container: $('#container'),
    username: 'pinceladasdaweb',
    count: 12
});