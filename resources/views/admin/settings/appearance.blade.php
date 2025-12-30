<x-layouts.dashboard>
	<x-settings.layout :heading="__("Appearance")" :subheading="__("Customize the dashboard look and feel")">
		<form method="POST" action="{{ route("admin.settings.appearance.update") }}" class="space-y-4">
			@csrf
			<div>
				<label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="theme">{{ __("Theme") }}</label>
				<select id="theme" name="theme"
					class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
					@php($currentTheme = old("theme", session("theme", "system")))
					<option value="system" {{ $currentTheme === "system" ? "selected" : "" }}>{{ __("System") }}</option>
					<option value="light" {{ $currentTheme === "light" ? "selected" : "" }}>{{ __("Light") }}</option>
					<option value="dark" {{ $currentTheme === "dark" ? "selected" : "" }}>{{ __("Dark") }}</option>
				</select>
				@error("theme")
					<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
				@enderror
			</div>

			<div class="flex items-center justify-between">
				<button type="submit"
					class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
					{{ __("Save appearance") }}
				</button>
				@if (session("status"))
					<span class="text-sm text-green-600">{{ session("status") }}</span>
				@endif
			</div>
		</form>
	</x-settings.layout>
</x-layouts.dashboard>
