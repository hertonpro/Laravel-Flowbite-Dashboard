<x-layouts.public>
	<section class="grid gap-12 lg:grid-cols-2 lg:items-center">
		<div class="space-y-6">
			<p
				class="inline-flex items-center rounded-full bg-blue-50 px-4 py-2 text-sm font-semibold text-blue-700 dark:bg-blue-900/30 dark:text-blue-100">
				Starter Laravel + Flowbite
			</p>
			<h1 class="text-4xl font-bold leading-tight text-gray-900 dark:text-white">
				Accélérez vos sites avec un kit public et un espace admin séparé.
			</h1>
			<p class="text-lg text-gray-600 dark:text-gray-300">
				Personnalisez librement les pages publiques sans toucher à l'admin. Auth, rôles et thèmes sont déjà prêts.
			</p>
			<div class="flex flex-wrap gap-3">
				<a href="{{ route("register") }}"
					class="rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white shadow hover:bg-blue-700">Commencer</a>
				<a href="{{ route("login") }}"
					class="rounded-lg border border-gray-200 px-5 py-3 font-semibold text-gray-800 hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">Se
					connecter</a>
			</div>
		</div>
		<div
			class="rounded-2xl border border-gray-200 bg-white/70 p-6 shadow-lg backdrop-blur dark:border-gray-800 dark:bg-gray-900/70">
			<div class="mb-4 flex items-center justify-between">
				<div class="flex items-center gap-3">
					<div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600 font-bold text-white">FB</div>
					<div>
						<p class="text-sm text-gray-500 dark:text-gray-400">Admin</p>
						<p class="font-semibold text-gray-900 dark:text-white">Vue Dashboard</p>
					</div>
				</div>
				<span
					class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700 dark:bg-green-900/40 dark:text-green-200">Sécurisé</span>
			</div>
			<div class="space-y-3 text-sm text-gray-700 dark:text-gray-300">
				<div class="flex items-center justify-between rounded-lg border border-gray-200 px-4 py-3 dark:border-gray-700">
					<span>Espace public</span>
					<span
						class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700 dark:bg-blue-900/40 dark:text-blue-100">/</span>
				</div>
				<div class="flex items-center justify-between rounded-lg border border-gray-200 px-4 py-3 dark:border-gray-700">
					<span>Admin</span>
					<span
						class="rounded-full bg-purple-50 px-3 py-1 text-xs font-semibold text-purple-700 dark:bg-purple-900/40 dark:text-purple-100">/admin</span>
				</div>
				<div class="flex items-center justify-between rounded-lg border border-gray-200 px-4 py-3 dark:border-gray-700">
					<span>Rôles & permissions</span>
					<span
						class="rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700 dark:bg-amber-900/40 dark:text-amber-100">Spatie</span>
				</div>
			</div>
		</div>
	</section>
</x-layouts.public>
