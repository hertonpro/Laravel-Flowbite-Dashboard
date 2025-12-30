<!DOCTYPE html>
@auth
	<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" x-data="darkMode" :class="{ 'dark': darkMode }">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="theme" content="{{ session("theme", "system") }}">

		<title>{{ config("app.name", "Laravel") }}</title>

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

		<!-- Scripts -->
		@vite(["resources/css/app.css", "resources/js/app.js"])
	</head>

	<body class="bg-gray-50 font-sans antialiased dark:bg-gray-900">
		<!-- Sidebar -->
		<x-sidebar />

		<!-- Navbar -->
		<x-navbar />

		<!-- Content -->
		<div class="flex overflow-hidden bg-gray-50 pt-16 dark:bg-gray-900">
			<div id="main-content" class="relative h-full w-full overflow-y-auto bg-gray-50 dark:bg-gray-900 lg:ml-64">
				<main>
					{{ $slot }}
				</main>
			</div>
		</div>

		@stack("modals")
		@stack("scripts")
	</body>

	</html>
@else
	<script>
		window.location.href = "{{ route("login") }}";
	</script>
@endauth
