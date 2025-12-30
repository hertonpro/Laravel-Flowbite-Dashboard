<x-layouts.dashboard>
	<x-settings.layout :heading="__("Password")" :subheading="__("Change your account password")">
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
				@if (session("status"))
					<span class="text-sm text-green-600">{{ session("status") }}</span>
				@endif
			</div>
		</form>
	</x-settings.layout>
</x-layouts.dashboard>
