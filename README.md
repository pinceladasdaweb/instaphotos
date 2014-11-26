[Instaphotos](http://www.pinceladasdaweb.com.br/blog/uploads/instaphotos/)
=================

Display Instagram user feed with PHP, jQuery and Handlebars Template.

##Usage

1 - Paste right before your page's closing `</body>` tag
```html
<!--[if lt IE 9]>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->
<!--[if (gte IE 9) | (!IE)]><!-->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.min.js"></script>
<script type="text/javascript" src="/path/to/instagram.min.js"></script>
```

2 - From within a script tag or a JS file
```javascript
	Instaphotos.init({
    	template: $('#instagram-template').html(),	// The ID of your template
    	container: $('#container'),					// domNode to attach to
    	username: 'pinceladasdaweb',				// Instagram username
    	count: 12									// Number of photos to display, default 12
	});
```

##Customize Template

1 - To customize the template open the index.html file and look for the following block of code:

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

## Compatibility

![IE](https://cloud.githubusercontent.com/assets/398893/3528325/20373e76-078e-11e4-8e3a-1cb86cf506f0.png) | ![Chrome](https://cloud.githubusercontent.com/assets/398893/3528328/23bc7bc4-078e-11e4-8752-ba2809bf5cce.png) | ![Firefox](https://cloud.githubusercontent.com/assets/398893/3528329/26283ab0-078e-11e4-84d4-db2cf1009953.png) | ![Opera](https://cloud.githubusercontent.com/assets/398893/3528330/27ec9fa8-078e-11e4-95cb-709fd11dac16.png) | ![Safari](https://cloud.githubusercontent.com/assets/398893/3528331/29df8618-078e-11e4-8e3e-ed8ac738693f.png)
--- | --- | --- | --- | --- |
IE 7+ ✔ | Latest ✔ | Latest ✔ | Latest ✔ | Latest ✔ |

## License
Instaphotos is licensed under the MIT License.