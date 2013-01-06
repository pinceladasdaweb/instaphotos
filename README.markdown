[Instaphotos](http://www.pinceladasdaweb.com.br/blog/uploads/instaphotos/)
=================

Display Instagram user feed with PHP, jQuery and Handlebars Template.

##Usage

1. Paste right before your page's closing `</body>` tag
```html
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.0.rc.1/handlebars.min.js"></script>
<script type="text/javascript" src="src/instagram.js"></script>
```

2. From within a script tag or a JS file
```javascript	
	Instaphotos.init({
    	template: $('#instagram-template').html(),	// The ID of your template
    	container: $('#container'),					// domNode to attach to
    	username: 'pinceladasdaweb',				// Instagram username
    	count: '12'									// Number of photos to display
	});
```

## Authentication

You can obtain a accessToken registering a new Instagram API client app at [http://instagram.com/developer/clients/manage/](http://instagram.com/developer/clients/manage/)

##License

[WTFPL](http://www.wtfpl.net/)