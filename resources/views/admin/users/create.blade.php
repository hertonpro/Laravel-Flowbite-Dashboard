<x-layouts.dashboard>
	<div class="rounded-lg bg-white p-6 shadow-sm dark:bg-gray-800">
		<div class="mb-6">
			<h1 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ __("Create User") }}</h1>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ __("Add a new user to the system") }}</p>
		</div>

		<form method="POST" action="{{ route("admin.users.store") }}" class="space-y-6">
			@csrf

			<!-- Name -->
			<div>
				<label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="name">{{ __("Name") }}</label>
				<input id="name" name="name" type="text" value="{{ old("name") }}" required
					class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
				@error("name")
					<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
				@enderror
			</div>

			<!-- Email -->
			<div>
				<label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="email">{{ __("Email") }}</label>
				<input id="email" name="email" type="email" value="{{ old("email") }}" required
					class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
				@error("email")
					<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
				@enderror
			</div>

			<!-- Password -->
			<div>
				<label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
					for="password">{{ __("Password") }}</label>
				<input id="password" name="password" type="password" required
					class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
				@error("password")
					<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
				@enderror
			</div>

			<!-- Password Confirmation -->
			<div>
				<label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
					for="password_confirmation">{{ __("Confirm Password") }}</label>
				<input id="password_confirmation" name="password_confirmation" type="password" required
					class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
			</div>

			<!-- Roles -->
			@if (isset($roles) && $roles->count() > 0)
				<div>
					<label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __("Roles") }}</label>
					<div class="mt-2 space-y-2">
						@foreach ($roles as $role)
							<label class="inline-flex items-center">
								<input type="checkbox" name="roles[]" value="{{ $role->name }}"
									class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900"
									{{ in_array($role->name, old("roles", [])) ? "checked" : "" }}>
								<span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ ucfirst($role->name) }}</span>
							</label>
						@endforeach
					</div>
					@error("roles")
						<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
					@enderror
				</div>
			@endif

			<!-- Buttons -->
			<div class="flex items-center justify-between">
				<a href="{{ route("admin.users.index") }}"
					class="inline-flex items-center rounded-lg bg-gray-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
					<svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
					</svg>
					{{ __("Back") }}
				</a>
				<button type="submit"
					class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
					<svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
					</svg>
					{{ __("Create User") }}
				</button>
			</div>
		</form>
	</div>
</x-layouts.dashboard>
