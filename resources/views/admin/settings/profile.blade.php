<x-layouts.dashboard>
	<x-settings.layout :heading="__("Profile")" :subheading="__("Update your profile information")">
		<form method="POST" action="{{ route("admin.settings.profile.update") }}" class="space-y-4">
			@csrf
			<div>
				<label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="name">{{ __("Name") }}</label>
				<input id="name" name="name" type="text" value="{{ old("name", auth()->user()->name) }}" required
					class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
				@error("name")
					<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
				@enderror
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="email">{{ __("Email") }}</label>
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
				@if (session("status"))
					<span class="text-sm text-green-600">{{ session("status") }}</span>
				@endif
			</div>
		</form>
	</x-settings.layout>
</x-layouts.dashboard>
