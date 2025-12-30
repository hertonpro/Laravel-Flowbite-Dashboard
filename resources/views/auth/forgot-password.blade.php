<x-layouts.auth>
	<div class="pt:mt-0 mx-auto flex flex-col items-center justify-center px-6 pt-8 dark:bg-gray-900 md:h-screen">
		<a href="/" class="mb-8 flex items-center justify-center text-2xl font-semibold dark:text-white lg:mb-10">
			<x-app-logo />
		</a>
		<!-- Card -->
		<div class="w-full max-w-xl space-y-8 rounded-lg bg-white p-6 shadow dark:bg-gray-800 sm:p-8">
			<h2 class="text-2xl font-bold text-gray-900 dark:text-white">
				Mot de passe oublié ?
			</h2>
			<p class="text-sm text-gray-500 dark:text-gray-400">
				Pas de problème. Indiquez-nous votre adresse e-mail et nous vous enverrons un lien de réinitialisation de mot de
				passe qui vous permettra d'en choisir un nouveau.
			</p>

			<!-- Session Status -->
			@if (session("status"))
				<div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
					{{ session("status") }}
				</div>
			@endif

			<form class="mt-8 space-y-6" method="POST" action="{{ route("password.email") }}">
				@csrf

				<!-- Email Address -->
				<div>
					<label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
					<input type="email" name="email" id="email" value="{{ old("email") }}"
						class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error("email") border-red-500 dark:border-red-500 @enderror block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
						placeholder="name@company.com" required autofocus>
					@error("email")
						<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<div class="flex items-center justify-between">
					<button type="submit"
						class="focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 w-full rounded-lg bg-blue-700 px-5 py-3 text-center text-base font-medium text-white hover:bg-blue-800 focus:ring-4 sm:w-auto">
						Envoyer le lien de réinitialisation
					</button>
				</div>

				<div class="text-sm font-medium text-gray-500 dark:text-gray-400">
					Vous vous souvenez de votre mot de passe ?
					<a href="{{ route("login") }}" class="text-primary-700 dark:text-primary-500 hover:underline">
						Se connecter
					</a>
				</div>
			</form>
		</div>
	</div>
</x-layouts.auth>
