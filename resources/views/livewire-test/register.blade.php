<html>

<head>
		<link rel="stylesheet" href="{{ mix('css/app.css') }}">

		@livewireStyles

		<!-- Scripts -->
		<script src="{{ mix('js/app.js') }}" defer></script>

<body>
		livewireテスト <span class="text-blue-600">register</span>
		@livewire('register')
		@livewireScripts
</body>

</html>
