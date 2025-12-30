<x-layouts.dashboard>
	<div class="px-4 pt-6">
		<!-- Statistiques -->
		<div class="mt-4 grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">
			<!-- Widget Statistiques -->
			<div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
				<div class="mb-4 flex items-center justify-between">
					<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Statistiques</h3>
					<div class="flex-shrink-0">
						<a href="#"
							class="text-primary-700 dark:text-primary-500 rounded-lg p-2 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700">
							Voir tout
						</a>
					</div>
				</div>
				<div class="grid grid-cols-2 gap-4 sm:grid-cols-2">
					<div class="bg-primary-50 rounded-lg p-4 dark:bg-gray-700">
						<div class="flex items-center">
							<div
								class="text-primary-600 bg-primary-100 dark:bg-primary-900 dark:text-primary-500 inline-flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg">
								<svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
								</svg>
							</div>
							<div class="ml-4">
								<h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
									{{ number_format($stats["page_views_today"] ?? 0) }}</h3>
								<p class="text-sm font-normal text-gray-500 dark:text-gray-400">Vues aujourd'hui</p>
							</div>
						</div>
					</div>
					<div class="rounded-lg bg-orange-50 p-4 dark:bg-gray-700">
						<div class="flex items-center">
							<div
								class="inline-flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-orange-100 text-orange-600 dark:bg-orange-900 dark:text-orange-500">
								<svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
								</svg>
							</div>
							<div class="ml-4">
								<h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
									{{ number_format($stats["unique_visitors_today"] ?? 0) }}</h3>
								<p class="text-sm font-normal text-gray-500 dark:text-gray-400">Visiteurs uniques</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 xl:grid-cols-4">
				<!-- Carte Utilisateurs -->
				<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
					<div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
						<svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd"
								d="M8.80443 5.60156C7.59109 5.60156 6.60749 6.58517 6.60749 7.79851C6.60749 9.01185 7.59109 9.99545 8.80443 9.99545C10.0178 9.99545 11.0014 9.01185 11.0014 7.79851C11.0014 6.58517 10.0178 5.60156 8.80443 5.60156ZM5.10749 7.79851C5.10749 5.75674 6.76267 4.10156 8.80443 4.10156C10.8462 4.10156 12.5014 5.75674 12.5014 7.79851C12.5014 9.84027 10.8462 11.4955 8.80443 11.4955C6.76267 11.4955 5.10749 9.84027 5.10749 7.79851Z"
								fill="" />
						</svg>
					</div>

					<div class="mt-5 flex items-end justify-between">
						<div>
							<span class="text-sm text-gray-500 dark:text-gray-400">Utilisateurs</span>
							<h4 class="text-title-sm mt-2 font-bold text-blue-600 dark:text-white/90">
								{{ number_format($stats["total_users"] ?? 0) }}
							</h4>
						</div>
					</div>
				</div>

				<!-- Carte Total Blogs -->
				<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
					<div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
						<svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" />
						</svg>
					</div>

					<div class="mt-5 flex items-end justify-between">
						<div>
							<span class="text-sm text-gray-500 dark:text-gray-400">Total Blogs</span>
							<h4 class="text-title-sm mt-2 font-bold text-blue-600 dark:text-white/90">
								{{ number_format($stats["total_blogs"] ?? 0) }}
							</h4>
						</div>

						<span
							class="bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500 flex items-center gap-1 rounded-full py-0.5 pl-2 pr-2.5 text-sm font-medium">
							<svg class="fill-current text-green-500" width="12" height="12" viewBox="0 0 12 12" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M5.56462 1.62393C5.70193 1.47072 5.90135 1.37432 6.12329 1.37432C6.1236 1.37432 6.12391 1.37432 6.12422 1.37432C6.31631 1.37415 6.50845 1.44731 6.65505 1.59381L9.65514 4.5918C9.94814 4.88459 9.94831 5.35947 9.65552 5.65246C9.36273 5.94546 8.88785 5.94562 8.59486 5.65283L6.87329 3.93247L6.87329 10.125C6.87329 10.5392 6.53751 10.875 6.12329 10.875C5.70908 10.875 5.37329 10.5392 5.37329 10.125L5.37329 3.93578L3.65516 5.65282C3.36218 5.94562 2.8873 5.94547 2.5945 5.65248C2.3017 5.35949 2.30185 4.88462 2.59484 4.59182L5.56462 1.62393Z"
									fill="" />
							</svg>
							Actif
						</span>
					</div>
				</div>

				<!-- Carte Vues Hebdomadaires -->
				<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
					<div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
						<svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
						</svg>
					</div>

					<div class="mt-5 flex items-end justify-between">
						<div>
							<span class="text-sm text-gray-500 dark:text-gray-400">Vues Semaine</span>
							<h4 class="text-title-sm mt-2 font-bold text-blue-600 dark:text-white/90">
								{{ number_format($stats["page_views_week"] ?? 0) }}
							</h4>
						</div>

						@php
							$weeklyChange = $stats["page_views_week"] > 0 ? "up" : "stable";
							$changePercent =
							    $stats["page_views_week"] > 100 ? "+" . round(($stats["page_views_week"] / 100) * 10, 1) . "%" : "Nouveau";
						@endphp

						<span
							class="{{ $weeklyChange === "up" ? "bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500" : "bg-gray-50 text-gray-600 dark:bg-gray-500/15 dark:text-gray-500" }} flex items-center gap-1 rounded-full py-0.5 pl-2 pr-2.5 text-sm font-medium">
							<svg class="{{ $weeklyChange === "up" ? "text-green-500" : "text-gray-500" }} fill-current" width="12"
								height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M5.56462 1.62393C5.70193 1.47072 5.90135 1.37432 6.12329 1.37432C6.1236 1.37432 6.12391 1.37432 6.12422 1.37432C6.31631 1.37415 6.50845 1.44731 6.65505 1.59381L9.65514 4.5918C9.94814 4.88459 9.94831 5.35947 9.65552 5.65246C9.36273 5.94546 8.88785 5.94562 8.59486 5.65283L6.87329 3.93247L6.87329 10.125C6.87329 10.5392 6.53751 10.875 6.12329 10.875C5.70908 10.875 5.37329 10.5392 5.37329 10.125L5.37329 3.93578L3.65516 5.65282C3.36218 5.94562 2.8873 5.94547 2.5945 5.65248C2.3017 5.35949 2.30185 4.88462 2.59484 4.59182L5.56462 1.62393Z"
									fill="" />
							</svg>
							{{ $changePercent }}
						</span>
					</div>
				</div>

				<!-- Carte Visiteurs Uniques Semaine -->
				<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
					<div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
						<svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-4h3v7H5a1 1 0 01-1-1zM18 10v11a1 1 0 01-1 1h-2v-7h3zM12.5 11.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5S11 9.17 11 10s.67 1.5 1.5 1.5zM17 8a2 2 0 11-4 0 2 2 0 014 0zM12.5 13c-1.33 0-4 .67-4 2v6h8v-6c0-1.33-2.67-2-4-2z" />
						</svg>
					</div>

					<div class="mt-5 flex items-end justify-between">
						<div>
							<span class="text-sm text-gray-500 dark:text-gray-400">Visiteurs Uniques</span>
							<h4 class="text-title-sm mt-2 font-bold text-blue-600 dark:text-white/90">
								{{ number_format($stats["unique_visitors_week"] ?? 0) }}
							</h4>
						</div>

						<span
							class="bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500 flex items-center gap-1 rounded-full py-0.5 pl-2 pr-2.5 text-sm font-medium">
							<svg class="fill-current text-green-500" width="12" height="12" viewBox="0 0 12 12" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M5.56462 1.62393C5.70193 1.47072 5.90135 1.37432 6.12329 1.37432C6.1236 1.37432 6.12391 1.37432 6.12422 1.37432C6.31631 1.37415 6.50845 1.44731 6.65505 1.59381L9.65514 4.5918C9.94814 4.88459 9.94831 5.35947 9.65552 5.65246C9.36273 5.94546 8.88785 5.94562 8.59486 5.65283L6.87329 3.93247L6.87329 10.125C6.87329 10.5392 6.53751 10.875 6.12329 10.875C5.70908 10.875 5.37329 10.5392 5.37329 10.125L5.37329 3.93578L3.65516 5.65282C3.36218 5.94562 2.8873 5.94547 2.5945 5.65248C2.3017 5.35949 2.30185 4.88462 2.59484 4.59182L5.56462 1.62393Z"
									fill="" />
							</svg>
							Semaine
						</span>
					</div>
				</div>
			</div>
			<!-- Widget Activité Récente -->
			<div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
				<div class="mb-4 flex items-center justify-between">
					<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Activité Récente</h3>
					<div class="flex-shrink-0">
						<a href="{{ route("admin.reports.index") }}"
							class="text-primary-700 dark:text-primary-500 rounded-lg p-2 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700">
							Voir tout
						</a>
					</div>
				</div>
				<ol class="relative border-l border-gray-200 dark:border-gray-700">
					@forelse($recentActivities as $activity)
						<li class="mb-10 ml-4">
							<div
								class="absolute -left-1.5 mt-1.5 h-3 w-3 rounded-full border border-white bg-gray-200 dark:border-gray-800 dark:bg-gray-700">
							</div>
							<time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
								{{ $activity->created_at->format("d M Y H:i") }}
							</time>
							<h3 class="text-lg font-semibold text-gray-900 dark:text-white">
								{{ ucfirst($activity->action) }}
							</h3>
							<p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
								@if ($activity->user)
									Par {{ $activity->user->name }}
								@else
									Utilisateur anonyme
								@endif
								@if ($activity->model_type)
									- {{ class_basename($activity->model_type) }}
								@endif
							</p>
						</li>
					@empty
						<li class="mb-10 ml-4">
							<div
								class="absolute -left-1.5 mt-1.5 h-3 w-3 rounded-full border border-white bg-gray-200 dark:border-gray-800 dark:bg-gray-700">
							</div>
							<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aucune activité récente</h3>
							<p class="text-base font-normal text-gray-500 dark:text-gray-400">
								Les activités des utilisateurs apparaîtront ici
							</p>
						</li>
					@endforelse
				</ol>
			</div>
			<!-- Widget Pages Populaires -->
			<div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
				<div class="mb-4 flex items-center justify-between">
					<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pages Populaires</h3>
					<div class="flex-shrink-0">
						<a href="{{ route("admin.reports.traffic") }}"
							class="text-primary-700 dark:text-primary-500 rounded-lg p-2 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700">
							Voir tout
						</a>
					</div>
				</div>
				<div class="flow-root">
					<ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
						@forelse($popularPages as $index => $page)
							<li class="py-3 sm:py-4">
								<div class="flex items-center space-x-4">
									<div class="flex-shrink-0">
										<div class="bg-primary-100 dark:bg-primary-900 flex h-8 w-8 items-center justify-center rounded-full">
											<span class="text-primary-600 dark:text-primary-500">{{ $index + 1 }}</span>
										</div>
									</div>
									<div class="min-w-0 flex-1">
										<p class="truncate text-sm font-medium text-gray-900 dark:text-white">
											{{ $page["url"] ?? "Page inconnue" }}
										</p>
										<p class="truncate text-sm text-gray-500 dark:text-gray-400">
											{{ number_format($page["views"] ?? 0) }} vues
										</p>
									</div>
									<div class="inline-flex items-center">
										<span
											class="mr-2 rounded bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">
											{{ $page["percentage"] ?? "0" }}%
										</span>
									</div>
								</div>
							</li>
						@empty
							<li class="py-3 sm:py-4">
								<div class="flex items-center space-x-4">
									<div class="flex-shrink-0">
										<div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-900">
											<span class="text-gray-600 dark:text-gray-500">-</span>
										</div>
									</div>
									<div class="min-w-0 flex-1">
										<p class="truncate text-sm font-medium text-gray-900 dark:text-white">
											Aucune donnée disponible
										</p>
										<p class="truncate text-sm text-gray-500 dark:text-gray-400">
											Les pages populaires apparaîtront ici
										</p>
									</div>
								</div>
							</li>
						@endforelse
					</ul>
				</div>
			</div>
		</div>
	</div>
</x-layouts.dashboard>
