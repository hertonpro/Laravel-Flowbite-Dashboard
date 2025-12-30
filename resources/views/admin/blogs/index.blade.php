<x-layouts.dashboard>
	<div
		class="m-4 block items-center justify-between border-b border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 sm:flex lg:mt-1.5">
		<div class="mb-1 w-full">
			<div class="mb-4">
				<nav class="mb-5 flex" aria-label="Breadcrumb">
					<ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
						<li class="inline-flex items-center">
							<a href="{{ route("admin.dashboard") }}"
								class="hover:text-primary-600 inline-flex items-center text-gray-700 dark:text-gray-300 dark:hover:text-white">
								<svg class="mr-2.5 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
									</path>
								</svg>
								{{ __("Dashboard") }}
							</a>
						</li>
						<li>
							<div class="flex items-center">
								<svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
										clip-rule="evenodd"></path>
								</svg>
								<span class="ml-1 text-gray-400 dark:text-gray-500 md:ml-2" aria-current="page">{{ __("Blogs") }}</span>
							</div>
						</li>
					</ol>
				</nav>
				<h1 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">{{ __("Blogs Management") }}</h1>
			</div>
			<div class="sm:flex">
				<div class="mb-3 hidden items-center dark:divide-gray-700 sm:mb-0 sm:flex sm:divide-x sm:divide-gray-100">
					<form class="lg:pr-3" action="#" method="GET">
						<label for="blogs-search" class="sr-only">Search</label>
						<div class="relative mt-1 lg:w-64 xl:w-96">
							<input type="text" name="search" id="blogs-search"
								class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 sm:text-sm"
								placeholder="{{ __("Search for blogs") }}">
						</div>
					</form>
				</div>
				<div class="ml-auto flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 inline-flex items-center justify-center rounded-lg ">
					@can("create blogs")
						<a href="{{ route("admin.blogs.create") }}"
							class="bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 inline-flex w-1/2 items-center justify-center rounded-lg px-3 py-2 text-center text-sm font-medium text-white focus:ring-4 sm:w-auto">
							<svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd"
									d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd">
								</path>
							</svg>
							{{ __("Add blog") }}
						</a>
					@endcan
				</div>
			</div>
		</div>
	</div>

	@if (session("success"))
		<div class="m-4 mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
			role="alert">
			{{ session("success") }}
		</div>
	@endif

	<div class="m-4 flex flex-col">
		<div class="overflow-x-auto">
			<div class="inline-block min-w-full align-middle">
				<div class="overflow-hidden shadow">
					<table class="min-w-full table-fixed divide-y divide-gray-200 dark:divide-gray-600">
						<thead class="bg-gray-100 dark:bg-gray-700">
							<tr>
								<th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">
									{{ __("Title") }}
								</th>
								<th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">
									{{ __("Author") }}
								</th>
								<th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">
									{{ __("Status") }}
								</th>
								<th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">
									{{ __("Created at") }}
								</th>
								<th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">
									{{ __("Actions") }}
								</th>
							</tr>
						</thead>
						<tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
							@forelse($blogs as $blog)
								<tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
									<td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
										<div class="text-base font-semibold text-gray-900 dark:text-white">{{ $blog->title }}</div>
										@if ($blog->excerpt)
											<div class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ Str::limit($blog->excerpt, 50) }}</div>
										@endif
									</td>
									<td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
										{{ $blog->user->name }}
									</td>
									<td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
										<span
											class="@if ($blog->status === "published") bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                                    @elseif($blog->status === "draft") bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                                    @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300 @endif inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium">
											{{ ucfirst($blog->status) }}
										</span>
									</td>
									<td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
										{{ $blog->created_at->format("d/m/Y H:i") }}
									</td>
									<td class="space-x-2 whitespace-nowrap p-4">
										@can("edit blogs")
											<a href="{{ route("admin.blogs.edit", $blog) }}"
												class="bg-green-500 hover:bg-green-800 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 inline-flex items-center rounded-lg px-3 py-2 text-center text-sm font-medium text-white focus:ring-4">
												<svg class="mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
													<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
													<path fill-rule="evenodd"
														d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
														clip-rule="evenodd"></path>
												</svg>
												{{ __("Edit") }}
											</a>
										@endcan
										@can("delete blogs")
											<form action="{{ route("admin.blogs.destroy", $blog) }}" method="POST" class="inline-block"
												onsubmit="return confirm('{{ __("Are you sure you want to delete this blog?") }}')">
												@csrf
												@method("DELETE")
												<button type="submit"
													class="inline-flex items-center rounded-lg bg-red-600 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
													<svg class="mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd"
															d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
															clip-rule="evenodd"></path>
													</svg>
													{{ __("Delete") }}
												</button>
											</form>
										@endcan
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
										{{ __("No blogs found") }}
									</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@if ($blogs->hasPages())
		<div
			class="sticky bottom-0 right-0 w-full items-center border-t border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 sm:flex sm:justify-between">
			{{ $blogs->links() }}
		</div>
	@endif
</x-layouts.dashboard>
