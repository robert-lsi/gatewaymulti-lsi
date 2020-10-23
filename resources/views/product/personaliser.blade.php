<!doctype html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Personaliser</title>
		
		<style>
			body, html {
				padding: 0; margin: 0; width: 100%; height: 100%;
			}
			
			#personaliser, iframe {
				width: 100%; height: 100%; border: 0;
			}
		</style>
	</head>
	
	<body>
		<div id="personaliser">
			<iframe src="" id="personaliser-iframe"></iframe>
		</div>

		<script src="{{ asset('js/app.js') }}"></script>

		<script>
			$(function(){
				let iframeOrigin = '<?php echo $iframeOrigin; ?>';
				let iframeUrl = '<?php echo $iframeUrl; ?>';

				let meo = location.origin;
				let mei = Math.random().toString(16).substr(2);

				window.addEventListener("message", e => {
					if(e.origin == iframeOrigin && e.data.id == mei){
						switch(e.data.name){
							case 'ADD_TO_CART_CALLBACK':
							// handle the callback
							var jqxhr = $.post('{{ $addToBasketUrl }}', { data: e.data.body.items[0] });
							jqxhr.done(function(){
								window.parent.location.href = jqxhr.responseText;
							});
							break;
						}
					}
				});

				let iframe = document.getElementById('personaliser-iframe');
				iframe.src = iframeUrl + "&meo=" + meo + "&mei=" + mei;
			});
		</script>
	</body>
</html>