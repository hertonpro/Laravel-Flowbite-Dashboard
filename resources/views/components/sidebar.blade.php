<aside id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
    aria-label="Sidebar">
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('dashboard') ? 'text-blue-600 dark:text-blue-500' : '' }}"
                                fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-8a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v8zm1-12h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1z" />
                            </svg>
                            <span
                                class="ml-3 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('dashboard') ? 'text-blue-600 dark:text-blue-500' : '' }}"
                                sidebar-toggle-item>Tableau de bord</span>
                        </a>
                    </li>
                    @can('view users')
                        <li>
                            <a href="{{ route('users.index') }}"
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('users.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('users.*') ? 'text-blue-600 dark:text-blue-500' : '' }}"
                                    fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                                </svg>
                                <span
                                    class="ml-3 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('users.*') ? 'text-blue-600 dark:text-blue-500' : '' }}"
                                    sidebar-toggle-item>Utilisateurs</span>
                            </a>
                        </li>
                    @endcan
                    @can('view projects')
                        <li>
                            <a href="{{ route('projects.index') }}"
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('projects.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('projects.*') ? 'text-blue-600 dark:text-blue-500' : '' }}"
                                    fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H4c-1.103 0-2 .897-2 2v11c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zM4 20V9h16l.001 11H4z" />
                                </svg>
                                <span
                                    class="ml-3 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('projects.*') ? 'text-blue-600 dark:text-blue-500' : '' }}"
                                    sidebar-toggle-item>Projets</span>
                            </a>
                        </li>
                    @endcan
                    @can('view reports')
                        <li>
                            <a href="{{ route('reports.index') }}"
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('reports.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('reports.*') ? 'text-blue-600 dark:text-blue-500' : '' }}"
                                    fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z" />
                                    <path d="M11 11h2v6h-2zm0-4h2v2h-2z" />
                                </svg>
                                <span
                                    class="ml-3 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('reports.*') ? 'text-blue-600 dark:text-blue-500' : '' }}"
                                    sidebar-toggle-item>Rapports</span>
                            </a>
                        </li>
                    @endcan
                </ul>
                @can('view settings')
                    <div class="pt-2 space-y-2">
                        <a href="{{ route('settings.index') }}"
                            class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('settings.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                            <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('settings.*') ? 'text-blue-600 dark:text-blue-500' : '' }}"
                                fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9-1.28 2.22-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24-1.3-2.21.8-.9a3 3 0 0 0 0-4l-.8-.9 1.28-2.2 1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24 1.28 2.22-.8.9a3 3 0 0 0 0 3.98Zm-6.77-6a4 4 0 1 0 4 4 4 4 0 0 0-4-4Zm0 6a2 2 0 1 1 2-2 2 2 0 0 1-2 2Z" />
                            </svg>
                            <span
                                class="ml-3 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('settings.*') ? 'text-blue-600 dark:text-blue-500' : '' }}"
                                sidebar-toggle-item>Paramètres</span>
                        </a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</aside>
