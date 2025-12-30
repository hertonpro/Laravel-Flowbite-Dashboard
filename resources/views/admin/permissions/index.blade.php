<x-layouts.dashboard>
	<!-- Messages de feedback -->
	@if (session("success"))
		<div class="mb-4 rounded-lg bg-green-100 p-4 text-green-700 dark:bg-green-900 dark:text-green-200">
			{{ session("success") }}
		</div>
	@endif
	@if (session("error"))
		<div class="mb-4 rounded-lg bg-red-100 p-4 text-red-700 dark:bg-red-900 dark:text-red-200">
			{{ session("error") }}
		</div>
	@endif

	<!-- Navigation avec onglets -->
	<div class="mb-6 border-b border-gray-200 dark:border-gray-700" x-data="{ activeTab: 'roles' }">
		<nav class="-mb-px flex space-x-8">
			<button @click="activeTab = 'roles'"
				:class="activeTab === 'roles' ? 'border-blue-500 text-blue-600' :
				    'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
				class="whitespace-nowrap border-b-2 px-1 py-2 text-sm font-medium">
				{{ __("Roles & Permissions") }}
			</button>
			<button @click="activeTab = 'users'"
				:class="activeTab === 'users' ? 'border-blue-500 text-blue-600' :
				    'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
				class="whitespace-nowrap border-b-2 px-1 py-2 text-sm font-medium">
				{{ __("User Roles") }}
			</button>
		</nav>
	</div>

	<div x-data="{ activeTab: 'roles' }">
		<!-- Onglet Gestion des Rôles -->
		<div x-show="activeTab === 'roles'">
			<div class="grid gap-6 lg:grid-cols-2">
				<!-- Liste des rôles existants -->
				<div class="rounded-lg bg-white p-6 shadow-sm dark:bg-gray-800">
					<h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">{{ __("Existing Roles") }}</h2>

					<div class="space-y-4">
						@foreach ($roles as $role)
							<div class="rounded-lg border p-4 dark:border-gray-600" x-data="{ editing: false, permissions: {{ $role->permissions->pluck("name")->toJson() }} }">

								<!-- Mode affichage -->
								<div x-show="!editing">
									<div class="mb-2 flex items-center justify-between">
										<h3 class="font-semibold text-gray-900 dark:text-white">{{ ucfirst($role->name) }}</h3>
										<div class="flex space-x-2">
											<button @click="editing = true" class="text-blue-600 hover:text-blue-900 dark:text-blue-400">
												{{ __("Edit") }}
											</button>
											@if (!in_array($role->name, ["super-admin"]))
												<form method="POST" action="{{ route("admin.permissions.roles.destroy", $role) }}" class="inline">
													@csrf
													@method("DELETE")
													<button type="submit" onclick="return confirm('{{ __("Are you sure?") }}')"
														class="text-red-600 hover:text-red-900 dark:text-red-400">
														{{ __("Delete") }}
													</button>
												</form>
											@endif
										</div>
									</div>
									<div class="flex flex-wrap gap-1">
										@foreach ($role->permissions as $permission)
											<span
												class="inline-flex rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-200">
												{{ $permission->name }}
											</span>
										@endforeach
									</div>
								</div>

								<!-- Mode édition -->
								<div x-show="editing">
									<form method="POST" action="{{ route("admin.permissions.roles.update", $role) }}">
										@csrf
										@method("PUT")

										<div class="mb-4">
											<label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __("Role Name") }}</label>
											<input type="text" name="name" value="{{ $role->name }}"
												class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
										</div>

										<div class="mb-4">
											<label
												class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __("Permissions") }}</label>
											<div class="grid max-h-40 grid-cols-2 gap-2 overflow-y-auto">
												@foreach ($permissions as $group => $groupPermissions)
													<div class="col-span-2">
														<h4 class="font-medium capitalize text-gray-900 dark:text-white">{{ $group }}</h4>
													</div>
													@foreach ($groupPermissions as $permission)
														<label class="inline-flex items-center">
															<input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
																{{ $role->hasPermissionTo($permission->name) ? "checked" : "" }}
																class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
															<span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ $permission->name }}</span>
														</label>
													@endforeach
												@endforeach
											</div>
										</div>

										<div class="flex justify-end space-x-2">
											<button type="button" @click="editing = false" class="px-3 py-1 text-sm text-gray-600 hover:text-gray-900">
												{{ __("Cancel") }}
											</button>
											<button type="submit" class="rounded bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-700">
												{{ __("Save") }}
											</button>
										</div>
									</form>
								</div>
							</div>
						@endforeach
					</div>
				</div>

				<!-- Créer un nouveau rôle -->
				<div class="rounded-lg bg-white p-6 shadow-sm dark:bg-gray-800">
					<h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">{{ __("Create New Role") }}</h2>

					<form method="POST" action="{{ route("admin.permissions.roles.store") }}">
						@csrf

						<div class="mb-4">
							<label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __("Role Name") }}</label>
							<input type="text" name="name" required
								class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
							@error("name")
								<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
							@enderror
						</div>

						<div class="mb-4">
							<label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __("Permissions") }}</label>
							<div class="grid max-h-60 grid-cols-1 gap-2 overflow-y-auto rounded border p-3 dark:border-gray-600">
								@foreach ($permissions as $group => $groupPermissions)
									<div>
										<h4 class="mb-2 font-medium capitalize text-gray-900 dark:text-white">{{ $group }}</h4>
										<div class="ml-4 space-y-1">
											@foreach ($groupPermissions as $permission)
												<label class="inline-flex w-full items-center">
													<input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
														class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
													<span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ $permission->name }}</span>
												</label>
											@endforeach
										</div>
									</div>
								@endforeach
							</div>
						</div>

						<button type="submit"
							class="w-full rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
							{{ __("Create Role") }}
						</button>
					</form>
				</div>
			</div>
		</div>

		<!-- Onglet Gestion des rôles utilisateurs -->
		<div x-show="activeTab === 'users'">
			<div class="rounded-lg bg-white p-6 shadow-sm dark:bg-gray-800">
				<h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">{{ __("Assign Roles to Users") }}</h2>

				<div class="overflow-x-auto">
					<table class="whitespace-no-wrap w-full">
						<thead>
							<tr
								class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400">
								<th class="px-4 py-3">{{ __("User") }}</th>
								<th class="px-4 py-3">{{ __("Current Roles") }}</th>
								<th class="px-4 py-3">{{ __("Actions") }}</th>
							</tr>
						</thead>
						<tbody class="divide-y bg-white dark:divide-gray-700 dark:bg-gray-800">
							@foreach ($users as $user)
								<tr class="text-gray-700 dark:text-gray-400" x-data="{ editing: false }">
									<td class="px-4 py-3">
										<div class="flex items-center">
											<img class="mr-3 h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
												alt="">
											<div>
												<p class="font-semibold">{{ $user->name }}</p>
												<p class="text-xs text-gray-500">{{ $user->email }}</p>
											</div>
										</div>
									</td>
									<td class="px-4 py-3">
										<div x-show="!editing">
											@if ($user->roles->count() > 0)
												<div class="flex flex-wrap gap-1">
													@foreach ($user->roles as $role)
														<span
															class="inline-flex rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-200">
															{{ $role->name }}
														</span>
													@endforeach
												</div>
											@else
												<span class="text-gray-400">{{ __("No role") }}</span>
											@endif
										</div>

										<div x-show="editing">
											<form method="POST" action="{{ route("admin.permissions.users.update", $user) }}">
												@csrf
												@method("PUT")
												<div class="space-y-2">
													@foreach ($roles as $role)
														<label class="inline-flex items-center">
															<input type="checkbox" name="roles[]" value="{{ $role->name }}"
																{{ $user->hasRole($role->name) ? "checked" : "" }}
																class="rounded border-gray-300 text-blue-600 shadow-sm">
															<span class="ml-2 text-sm">{{ $role->name }}</span>
														</label>
													@endforeach
												</div>
												<div class="mt-3 flex space-x-2">
													<button type="submit" class="rounded bg-blue-600 px-3 py-1 text-xs text-white hover:bg-blue-700">
														{{ __("Save") }}
													</button>
													<button type="button" @click="editing = false"
														class="rounded bg-gray-600 px-3 py-1 text-xs text-white hover:bg-gray-700">
														{{ __("Cancel") }}
													</button>
												</div>
											</form>
										</div>
									</td>
									<td class="px-4 py-3">
										<button @click="editing = !editing" class="text-blue-600 hover:text-blue-900 dark:text-blue-400">
											<span x-text="editing ? '{{ __("Cancel") }}' : '{{ __("Edit") }}'"></span>
										</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</x-layouts.dashboard>
