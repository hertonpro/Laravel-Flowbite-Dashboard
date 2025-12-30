<x-layouts.dashboard>
	<div
		class="block items-center justify-between border-b border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 sm:flex lg:mt-1.5">
		<div class="mb-1 w-full">
			<div class="mb-4">
				<h1 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
					{{ __("Rapports Analytics") }}
				</h1>
				<p class="text-base font-normal text-gray-500 dark:text-gray-400">
					Statistiques et analyses du site web
				</p>
			</div>
		</div>
	</div>

	<!-- Statistiques générales -->
	<div class="mb-4 grid grid-cols-1 gap-4 m-6 sm:grid-cols-2 lg:grid-cols-4">
		<div class="rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
			<div class="flex items-center">
				<div class="flex-shrink-0">
					<div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900">
						<svg class="h-4 w-4 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
							<path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
						</svg>
					</div>
				</div>
				<div class="ml-4">
					<p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pages vues (aujourd'hui)</p>
					<p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($stats["page_views"]["today"]) }}</p>
					@if ($stats["page_views"]["yesterday"] > 0)
						@php
							$change =
							    (($stats["page_views"]["today"] - $stats["page_views"]["yesterday"]) / $stats["page_views"]["yesterday"]) *
							    100;
						@endphp
						<p class="{{ $change >= 0 ? "text-green-600" : "text-red-600" }} text-sm">
							{{ $change >= 0 ? "+" : "" }}{{ number_format($change, 1) }}% vs hier
						</p>
					@endif
				</div>
			</div>
		</div>

		<div class="rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
			<div class="flex items-center">
				<div class="flex-shrink-0">
					<div class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-100 dark:bg-green-900">
						<svg class="h-4 w-4 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
							<path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
						</svg>
					</div>
				</div>
				<div class="ml-4">
					<p class="text-sm font-medium text-gray-500 dark:text-gray-400">Visiteurs uniques</p>
					<p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($stats["unique_visitors"]["today"]) }}
					</p>
					<p class="text-sm text-gray-500 dark:text-gray-400">Cette semaine:
						{{ number_format($stats["unique_visitors"]["this_week"]) }}</p>
				</div>
			</div>
		</div>

		<div class="rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
			<div class="flex items-center">
				<div class="flex-shrink-0">
					<div class="flex h-8 w-8 items-center justify-center rounded-lg bg-purple-100 dark:bg-purple-900">
						<svg class="h-4 w-4 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20">
							<path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
							<path fill-rule="evenodd"
								d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h.01a1 1 0 100-2H10z"
								clip-rule="evenodd"></path>
						</svg>
					</div>
				</div>
				<div class="ml-4">
					<p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total utilisateurs</p>
					<p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($generalStats["total_users"]) }}</p>
					<p class="text-sm text-gray-500 dark:text-gray-400">Articles: {{ number_format($generalStats["total_blogs"]) }}</p>
				</div>
			</div>
		</div>

		<div class="rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
			<div class="flex items-center">
				<div class="flex-shrink-0">
					<div class="flex h-8 w-8 items-center justify-center rounded-lg bg-yellow-100 dark:bg-yellow-900">
						<svg class="h-4 w-4 text-yellow-600 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
							<path fill-rule="evenodd"
								d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
								clip-rule="evenodd"></path>
						</svg>
					</div>
				</div>
				<div class="ml-4">
					<p class="text-sm font-medium text-gray-500 dark:text-gray-400">Activités (aujourd'hui)</p>
					<p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($stats["user_activities"]["today"]) }}
					</p>
					<p class="text-sm text-gray-500 dark:text-gray-400">Ce mois:
						{{ number_format($stats["user_activities"]["this_month"]) }}</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Pages populaires et Activités récentes -->
	<div class="mb-4 grid grid-cols-1 m-6 gap-4 xl:grid-cols-2">
		<!-- Pages populaires -->
		<div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
			<div class="mb-4 flex items-center justify-between">
				<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pages populaires</h3>
				<span class="text-sm text-gray-500 dark:text-gray-400">Cette semaine</span>
			</div>
			<div class="space-y-3">
				@forelse($stats['popular_pages'] as $page)
					<div class="flex items-center justify-between">
						<div class="min-w-0 flex-1">
							<p class="truncate text-sm font-medium text-gray-900 dark:text-white">
								{{ parse_url($page->url, PHP_URL_PATH) ?: "/" }}
							</p>
						</div>
						<div class="ml-3 flex items-center">
							<span class="text-sm text-gray-500 dark:text-gray-400">{{ number_format($page->views) }} vues</span>
						</div>
					</div>
					@if (!$loop->last)
						<div class="border-t border-gray-200 dark:border-gray-600"></div>
					@endif
				@empty
					<p class="py-4 text-center text-sm text-gray-500 dark:text-gray-400">Aucune donnée disponible</p>
				@endforelse
			</div>
		</div>

		<!-- Activités récentes -->
		<div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
			<div class="mb-4 flex items-center justify-between">
				<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Activités récentes</h3>
			</div>
			<div class="space-y-3">
				@forelse($stats['recent_activities'] as $activity)
					<div class="flex items-start space-x-3">
						<div class="flex-shrink-0">
							<div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-600">
								<span class="text-xs font-medium text-gray-600 dark:text-gray-300">
									{{ $activity->user ? substr($activity->user->name, 0, 2) : "?" }}
								</span>
							</div>
						</div>
						<div class="min-w-0 flex-1">
							<p class="text-sm font-medium text-gray-900 dark:text-white">
								{{ $activity->user ? $activity->user->name : "Utilisateur inconnu" }}
							</p>
							<p class="text-xs text-gray-500 dark:text-gray-400">
								{{ $activity->action }}
							</p>
							<p class="text-xs text-gray-400 dark:text-gray-500">
								{{ $activity->created_at->diffForHumans() }}
							</p>
						</div>
					</div>
				@empty
					<p class="py-4 text-center text-sm text-gray-500 dark:text-gray-400">Aucune activité récente</p>
				@endforelse
			</div>
		</div>
	</div>

	<!-- Articles récents -->
	<div class="rounded-lg border m-6 border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
		<div class="border-b border-gray-200 p-6 dark:border-gray-600">
			<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Articles récents</h3>
		</div>
		<div class="overflow-x-auto">
			<table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
				<thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
					<tr>
						<th scope="col" class="px-6 py-3">Titre</th>
						<th scope="col" class="px-6 py-3">Auteur</th>
						<th scope="col" class="px-6 py-3">Statut</th>
						<th scope="col" class="px-6 py-3">Date</th>
					</tr>
				</thead>
				<tbody>
					@forelse($recentBlogs as $blog)
						<tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
							<td class="px-6 py-4">
								<div class="font-medium text-gray-900 dark:text-white">
									{{ $blog->title }}
								</div>
								<div class="text-sm text-gray-500 dark:text-gray-400">
									{{ Str::limit($blog->excerpt, 50) }}
								</div>
							</td>
							<td class="px-6 py-4">{{ $blog->user->name }}</td>
							<td class="px-6 py-4">
								<span
									class="@if ($blog->status === "published") bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
									@elseif($blog->status === "draft") bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
									@else bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 @endif rounded-full px-2 py-1 text-xs font-medium">
									{{ ucfirst($blog->status) }}
								</span>
							</td>
							<td class="px-6 py-4">{{ $blog->created_at->format("d/m/Y") }}</td>
						</tr>
					@empty
						<tr>
							<td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
								Aucun article trouvé
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</x-layouts.dashboard>
