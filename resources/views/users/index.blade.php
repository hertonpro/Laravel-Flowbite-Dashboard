<x-layouts.dashboard>
    <div class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Utilisateurs
            </h1>
            @can('create users')
                <a href="{{ route('users.create') }}"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                    Ajouter un utilisateur
                </a>
            @endcan
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Nom</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Rôle</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($users ?? [] as $user)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                                                alt="" loading="lazy">
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
                                    {{ $user->roles->pluck('name')->implode(', ') }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @can('edit users')
                                        <a href="{{ route('users.edit', $user) }}"
                                            class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                            Modifier
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
