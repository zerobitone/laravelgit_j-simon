
<html>
	<head>
		<title>Blade Templates</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
			  integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q="
			  crossorigin="anonymous" />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"
				integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI="
				crossorigin="anonymous"	>
		</script>

	</head>
	
	<body>
		@include('layouts.header')
		
		<div class="ui container">
			@yield('content')
		</div>
		
	</body>
</html>
