<x-layouts.dashboard>
	<div class="shadow-xs rounded-lg bg-white p-4 dark:bg-gray-800">
		<div class="mb-6 flex items-center justify-between">
			<h1 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
				{{ __("Users") }}
			</h1>
			<div class="flex space-x-3">
				@can("create users")
					<a href="{{ route("admin.users.create") }}"
						class="focus:shadow-outline-blue rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-blue-700 focus:outline-none active:bg-blue-600">
						<svg class="mr-2 inline h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
						</svg>
						{{ __("Add User") }}
					</a>
				@endcan
				@can("edit users")
					<a href="{{ route("admin.permissions.index") }}"
						class="focus:shadow-outline-purple rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none active:bg-purple-600">
						<svg class="mr-2 inline h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
						</svg>
						{{ __("Manage Permissions") }}
					</a>
				@endcan
			</div>
		</div>

		<div class="shadow-xs w-full overflow-hidden rounded-lg">
			<div class="w-full overflow-x-auto">
				<table class="whitespace-no-wrap w-full">
					<thead>
						<tr
							class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
							<th class="px-4 py-3">{{ __("Name") }}</th>
							<th class="px-4 py-3">{{ __("Email") }}</th>
							<th class="px-4 py-3">{{ __("Role") }}</th>
							<th class="px-4 py-3">{{ __("Actions") }}</th>
						</tr>
					</thead>
					<tbody class="divide-y bg-white dark:divide-gray-700 dark:bg-gray-800">
						@forelse ($users ?? [] as $user)
							<tr class="text-gray-700 dark:text-gray-400">
								<td class="px-4 py-3">
									<div class="flex items-center text-sm">
										<div class="relative mr-3 hidden h-8 w-8 rounded-full md:block">
											<img class="h-full w-full rounded-full object-cover"
												src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" alt="" loading="lazy">
										</div>
										<div>
											<p class="font-semibold">{{ $user->name }}</p>
										</div>
									</div>
								</td>
								<td class="px-4 py-3 text-sm">
									{{ $user->email }}
								</td>
								<td class="px-4 py-3 text-sm">
									@if ($user->roles->count() > 0)
										<span
											class="inline-flex rounded-full bg-blue-100 px-2 text-xs font-semibold leading-5 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
											{{ $user->roles->pluck("name")->implode(", ") }}
										</span>
									@else
										<span class="text-gray-400">{{ __("No role") }}</span>
									@endif
								</td>
								<td class="px-4 py-3">
									<div class="flex items-center space-x-2">
										@can("edit users")
											<a href="{{ route("admin.users.edit", $user) }}"
												class="inline-flex items-center rounded-lg bg-yellow-100 px-3 py-2 text-sm font-medium text-yellow-800 hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-200 dark:hover:bg-yellow-800">
												<svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
												</svg>
												{{ __("Edit") }}
											</a>
										@endcan
										@can("delete users")
											@if ($user->id !== auth()->id())
												<form method="POST" action="{{ route("admin.users.destroy", $user) }}" class="inline"
													x-data="{
			    confirmDelete() {
			        if (confirm('{{ __("Are you sure you want to delete this user?") }}')) {
			            $refs.deleteForm.submit();
			        }
			    }
			}" x-ref="deleteForm">
													@csrf
													@method("DELETE")
													<button type="button" @click="confirmDelete()"
														class="inline-flex items-center rounded-lg bg-red-100 px-3 py-2 text-sm font-medium text-red-800 hover:bg-red-200 dark:bg-red-900 dark:text-red-200 dark:hover:bg-red-800">
														<svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
														</svg>
														{{ __("Delete") }}
													</button>
												</form>
											@endif
										@endcan
									</div>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="4" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
									{{ __("No users found") }}
								</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
			@if (isset($users) && method_exists($users, "links"))
				<div class="mt-4">
					{{ $users->links() }}
				</div>
			@endif
		</div>
	</div>
</x-layouts.dashboard>
