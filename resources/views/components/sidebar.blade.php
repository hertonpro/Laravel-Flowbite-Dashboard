<aside id="sidebar"
	class="transition-width fixed left-0 top-0 z-20 flex hidden h-full w-64 flex-shrink-0 flex-col pt-16 font-normal duration-75 lg:flex"
	aria-label="Sidebar">
	<div
		class="relative flex min-h-0 flex-1 flex-col border-r border-gray-200 bg-white pt-0 dark:border-gray-700 dark:bg-gray-800">
		<div class="flex flex-1 flex-col overflow-y-auto pb-4 pt-5">
			<div class="flex-1 space-y-1 divide-y divide-gray-200 bg-white px-3 dark:divide-gray-700 dark:bg-gray-800">
				<ul class="space-y-2 pb-2">
					<li>
						<a href="{{ route("admin.dashboard") }}"
							class="{{ request()->routeIs("admin.dashboard") ? "bg-gray-100 dark:bg-gray-700" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
							<svg
								class="{{ request()->routeIs("admin.dashboard") ? "text-blue-600 dark:text-blue-500" : "" }} h-6 w-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
								fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-8a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v8zm1-12h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1z" />
							</svg>
							<span
								class="{{ request()->routeIs("admin.dashboard") ? "text-blue-600 dark:text-blue-500" : "" }} ml-3 group-hover:text-gray-900 dark:group-hover:text-white"
								sidebar-toggle-item>Tableau de bord</span>
						</a>
					</li>
					@can("view users")
						<li>
							<a href="{{ route("admin.users.index") }}"
								class="{{ request()->routeIs("admin.users.*") ? "bg-gray-100 dark:bg-gray-700" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
								<svg
									class="{{ request()->routeIs("admin.users.*") ? "text-blue-600 dark:text-blue-500" : "" }} h-6 w-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
									fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
								</svg>
								<span
									class="{{ request()->routeIs("admin.users.*") ? "text-blue-600 dark:text-blue-500" : "" }} ml-3 group-hover:text-gray-900 dark:group-hover:text-white"
									sidebar-toggle-item>Utilisateurs</span>
							</a>
						</li>
					@endcan
					@can("view reports")
						<li>
							<a href="{{ route("admin.reports.index") }}"
								class="{{ request()->routeIs("admin.reports.*") ? "bg-gray-100 dark:bg-gray-700" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
								<svg
									class="{{ request()->routeIs("admin.reports.*") ? "text-blue-600 dark:text-blue-500" : "" }} h-6 w-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
									fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z" />
									<path d="M11 11h2v6h-2zm0-4h2v2h-2z" />
								</svg>
								<span
									class="{{ request()->routeIs("admin.reports.*") ? "text-blue-600 dark:text-blue-500" : "" }} ml-3 group-hover:text-gray-900 dark:group-hover:text-white"
									sidebar-toggle-item>Rapports</span>
							</a>
						</li>
					@endcan
					@can("view blogs")
						<li>
							<a href="{{ route("admin.blogs.index") }}"
								class="{{ request()->routeIs("admin.blogs.*") ? "bg-gray-100 dark:bg-gray-700" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
								<svg
									class="{{ request()->routeIs("admin.blogs.*") ? "text-blue-600 dark:text-blue-500" : "" }} h-6 w-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
									fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H4V7h16v12zM6 10h2v2H6zm0 3h2v2H6zm3-3h7v2H9zm0 3h7v2H9z" />
								</svg>
								<span
									class="{{ request()->routeIs("admin.blogs.*") ? "text-blue-600 dark:text-blue-500" : "" }} ml-3 group-hover:text-gray-900 dark:group-hover:text-white"
									sidebar-toggle-item>{{ __("Blogs") }}</span>
							</a>
						</li>
					@endcan
					@can("view permissions")
						<li>
							<a href="{{ route("admin.permissions.index") }}"
								class="{{ request()->routeIs("admin.permissions.*") ? "bg-gray-100 dark:bg-gray-700" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
								<svg
									class="{{ request()->routeIs("admin.permissions.*") ? "text-blue-600 dark:text-blue-500" : "" }} h-6 w-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
									fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.6 14.8,10V11.5C14.8,12.4 14.4,13.1 13.7,13.4V16.8C13.7,17.4 13.4,17.8 12.9,17.8H11.1C10.6,17.8 10.3,17.4 10.3,16.8V13.4C9.6,13.1 9.2,12.4 9.2,11.5V10C9.2,8.6 10.6,7 12,7M12,8.2C11.2,8.2 10.5,8.7 10.5,9.5V10.5C10.5,11.3 11.2,11.8 12,11.8C12.8,11.8 13.5,11.3 13.5,10.5V9.5C13.5,8.7 12.8,8.2 12,8.2Z" />
								</svg>
								<span
									class="{{ request()->routeIs("admin.permissions.*") ? "text-blue-600 dark:text-blue-500" : "" }} ml-3 group-hover:text-gray-900 dark:group-hover:text-white"
									sidebar-toggle-item>{{ __("Permissions") }}</span>
							</a>
						</li>
					@endcan
				</ul>
				@can("view settings")
					<div class="space-y-2 pt-2">
						<a href="{{ route("admin.settings.profile") }}"
							class="{{ request()->routeIs("admin.settings.*") ? "bg-gray-100 dark:bg-gray-700" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
							<svg
								class="{{ request()->routeIs("admin.settings.*") ? "text-blue-600 dark:text-blue-500" : "" }} h-6 w-6 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
								fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9-1.28 2.22-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24-1.3-2.21.8-.9a3 3 0 0 0 0-4l-.8-.9 1.28-2.2 1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24 1.28 2.22-.8.9a3 3 0 0 0 0 3.98Zm-6.77-6a4 4 0 1 0 4 4 4 4 0 0 0-4-4Zm0 6a2 2 0 1 1 2-2 2 2 0 0 1-2 2Z" />
							</svg>
							<span
								class="{{ request()->routeIs("admin.settings.*") ? "text-blue-600 dark:text-blue-500" : "" }} ml-3 group-hover:text-gray-900 dark:group-hover:text-white"
								sidebar-toggle-item>Paramètres</span>
						</a>
					</div>
				@endcan
			</div>
		</div>
	</div>
</aside>
