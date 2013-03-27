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
    	count: 12									// Number of photos to display
	});
```

##Customize Template

1. To customize the template open the index.html file and look for the following block of code:

```javascript
<script id="instagram-template" type="text/x-handlebars-template">
    {{#each this}}
    <div class="photo clearfix">
	{{#if description}}
		<a target="_blank" title="{{description}}" href="{{url}}"><img src="{{image}}" alt="{{description}}"></a><span class="heart">{{likes}}</span>
	{{else}}
		<a target="_blank" title="{{url}}" href="{{url}}"><img src="{{image}}" alt="{{url}}"></a><span class="heart">{{likes}}</span>
	{{/if}}
	</div>
    {{/each}}
</script>
```

Change the HTML as it deems necessary.

## Authentication

You can obtain a accessToken here [http://www.pinceladasdaweb.com.br/instagram/access-token/](http://www.pinceladasdaweb.com.br/instagram/access-token/)

##License

[WTFPL](http://www.wtfpl.net/)