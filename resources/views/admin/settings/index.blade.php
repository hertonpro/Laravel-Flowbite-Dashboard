<x-layouts.dashboard>
	<!-- Navigation des sections -->
	<div class="mb-8 rounded-lg border border-gray-200 bg-white m-4 p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
		<h1 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">{{ __("Settings") }}</h1>
		<nav class="flex space-x-4">
			<a href="#profile"
				class="inline-flex items-center rounded-lg bg-blue-100 px-3 py-2 text-sm font-medium text-blue-800 hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-200 dark:hover:bg-blue-800">
				<svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
				</svg>
				{{ __("Profile") }}
			</a>
			<a href="#password"
				class="inline-flex items-center rounded-lg bg-yellow-100 px-3 py-2 text-sm font-medium text-yellow-800 hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-200 dark:hover:bg-yellow-800">
				<svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
				</svg>
				{{ __("Password") }}
			</a>
			{{-- <a href="#appearance"
				class="inline-flex items-center rounded-lg bg-green-100 px-3 py-2 text-sm font-medium text-green-800 hover:bg-green-200 dark:bg-green-900 dark:text-green-200 dark:hover:bg-green-800">
				<svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z" />
				</svg>
				{{ __("Appearance") }}
			</a> --}}
		</nav>
	</div>

	<div class="space-y-8">
		<!-- Section Profile -->
		<div id="profile"
			class="m-6 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
			<div class="mb-6">
				<h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __("Profile") }}</h2>
				<p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ __("Update your profile information") }}</p>
			</div>
			<form method="POST" action="{{ route("admin.settings.profile.update") }}" class="space-y-4">
				@csrf
				<div>
					<label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
						for="name">{{ __("Name") }}</label>
					<input id="name" name="name" type="text" value="{{ old("name", auth()->user()->name) }}" required
						class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
					@error("name")
						<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
						for="email">{{ __("Email") }}</label>
					<input id="email" name="email" type="email" value="{{ old("email", auth()->user()->email) }}" required
						class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
					@error("email")
						<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
					@enderror
				</div>

				<div class="flex items-center justify-between">
					<button type="submit"
						class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
						{{ __("Save") }}
					</button>
					@if (session("profile_status"))
						<span class="text-sm text-green-600">{{ session("profile_status") }}</span>
					@endif
				</div>
			</form>
		</div>

		<!-- Section Password -->
		<div id="password"
			class="m-6 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
			<div class="mb-6">
				<h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __("Password") }}</h2>
				<p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ __("Change your account password") }}</p>
			</div>
			<form method="POST" action="{{ route("admin.settings.password.update") }}" class="space-y-4">
				@csrf

				<div>
					<label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
						for="current_password">{{ __("Current password") }}</label>
					<input id="current_password" name="current_password" type="password" required autocomplete="current-password"
						class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
					@error("current_password")
						<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
						for="password">{{ __("New password") }}</label>
					<input id="password" name="password" type="password" required autocomplete="new-password"
						class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
					@error("password")
						<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
					@enderror
				</div>

				<div>
					<label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
						for="password_confirmation">{{ __("Confirm password") }}</label>
					<input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
						class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
				</div>

				<div class="flex items-center justify-between">
					<button type="submit"
						class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
						{{ __("Update password") }}
					</button>
					@if (session("password_status"))
						<span class="text-sm text-green-600">{{ session("password_status") }}</span>
					@endif
				</div>
			</form>
		</div>
	</div>
</x-layouts.dashboard>
