<x-layouts.dashboard>
    <div class="px-4 pt-6">
        <!-- Statistiques -->
        <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
            <!-- Widget Statistiques -->
            <div
                class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Statistiques</h3>
                    <div class="flex-shrink-0">
                        <a href="#"
                            class="p-2 text-sm font-medium text-primary-700 rounded-lg hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                            Voir tout
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-2">
                    <div class="bg-primary-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center">
                            <div
                                class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-primary-600 bg-primary-100 rounded-lg dark:bg-primary-900 dark:text-primary-500">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">2,340</h3>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Nouveaux clients</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-orange-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center">
                            <div
                                class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-orange-600 bg-orange-100 rounded-lg dark:bg-orange-900 dark:text-orange-500">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">€8,753</h3>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Ventes totales</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 xl:grid-cols-4">
            <!-- Carte Membres -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                    <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.80443 5.60156C7.59109 5.60156 6.60749 6.58517 6.60749 7.79851C6.60749 9.01185 7.59109 9.99545 8.80443 9.99545C10.0178 9.99545 11.0014 9.01185 11.0014 7.79851C11.0014 6.58517 10.0178 5.60156 8.80443 5.60156ZM5.10749 7.79851C5.10749 5.75674 6.76267 4.10156 8.80443 4.10156C10.8462 4.10156 12.5014 5.75674 12.5014 7.79851C12.5014 9.84027 10.8462 11.4955 8.80443 11.4955C6.76267 11.4955 5.10749 9.84027 5.10749 7.79851Z"
                            fill="" />
                    </svg>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-bleu-500  dark:text-gray-400">Membres</span>
                        <h4 class="mt-2 text-title-sm font-bold text-blue-600 dark:text-white/90">
                            5066654
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Carte Total Épargnes -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                    <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z" />
                    </svg>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Total Épargnes</span>
                        <h4 class="mt-2 text-title-sm font-bold text-blue-600 dark:text-white/90">
                            378000 HTG
                        </h4>
                    </div>

                    <span
                        class="flex items-center gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                        <svg class="fill-current text-green-500" width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.56462 1.62393C5.70193 1.47072 5.90135 1.37432 6.12329 1.37432C6.1236 1.37432 6.12391 1.37432 6.12422 1.37432C6.31631 1.37415 6.50845 1.44731 6.65505 1.59381L9.65514 4.5918C9.94814 4.88459 9.94831 5.35947 9.65552 5.65246C9.36273 5.94546 8.88785 5.94562 8.59486 5.65283L6.87329 3.93247L6.87329 10.125C6.87329 10.5392 6.53751 10.875 6.12329 10.875C5.70908 10.875 5.37329 10.5392 5.37329 10.125L5.37329 3.93578L3.65516 5.65282C3.36218 5.94562 2.8873 5.94547 2.5945 5.65248C2.3017 5.35949 2.30185 4.88462 2.59484 4.59182L5.56462 1.62393Z"
                                fill="" />
                        </svg>
                        15.2%
                    </span>
                </div>
            </div>

            <!-- Carte Total Crédits -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                    <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.665 3.75621C11.8762 3.65064 12.1247 3.65064 12.3358 3.75621L18.7807 6.97856L12.3358 10.2009C12.1247 10.3065 11.8762 10.3065 11.665 10.2009L5.22014 6.97856L11.665 3.75621Z"
                            fill="" />
                    </svg>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Total Crédits</span>
                        <h4 class="mt-2 text-title-sm font-bold text-blue-600 dark:text-white/90">
                            23456 HTG
                        </h4>
                    </div>

                    <span
                        class="flex items-center gap-1 rounded-full bg-error-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500">
                        <svg class="fill-current text-red-500" width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.31462 10.3761C5.45194 10.5293 5.65136 10.6257 5.87329 10.6257C5.8736 10.6257 5.8739 10.6257 5.87421 10.6257C6.0663 10.6259 6.25845 10.5527 6.40505 10.4062L9.40514 7.4082C9.69814 7.11541 9.69831 6.64054 9.40552 6.34754C9.11273 6.05454 8.63785 6.05438 8.34486 6.34717L6.62329 8.06753L6.62329 1.875C6.62329 1.46079 6.28751 1.125 5.87329 1.125C5.45908 1.125 5.12329 1.46079 5.12329 1.875L5.12329 8.06422L3.40516 6.34719C3.11218 6.05439 2.6373 6.05454 2.3445 6.34752C2.0517 6.64051 2.05185 7.11538 2.34484 7.40818L5.31462 10.3761Z"
                                fill="" />
                        </svg>
                        8.5%
                    </span>
                </div>
            </div>

            <!-- Carte Crédits Actifs -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                    <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                    </svg>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Crédits Actifs</span>
                        <h4 class="mt-2 text-title-sm font-bold text-blue-600 dark:text-white/90">
                            23456
                        </h4>
                    </div>

                    <span
                        class="flex items-center gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                        <svg class="fill-current text-green-500" width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.56462 1.62393C5.70193 1.47072 5.90135 1.37432 6.12329 1.37432C6.1236 1.37432 6.12391 1.37432 6.12422 1.37432C6.31631 1.37415 6.50845 1.44731 6.65505 1.59381L9.65514 4.5918C9.94814 4.88459 9.94831 5.35947 9.65552 5.65246C9.36273 5.94546 8.88785 5.94562 8.59486 5.65283L6.87329 3.93247L6.87329 10.125C6.87329 10.5392 6.53751 10.875 6.12329 10.875C5.70908 10.875 5.37329 10.5392 5.37329 10.125L5.37329 3.93578L3.65516 5.65282C3.36218 5.94562 2.8873 5.94547 2.5945 5.65248C2.3017 5.35949 2.30185 4.88462 2.59484 4.59182L5.56462 1.62393Z"
                                fill="" />
                        </svg>
                        12.7%
                    </span>
                </div>
            </div>
        </div>
            <!-- Widget Activité Récente -->
            <div
                class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Activité Récente</h3>
                    <div class="flex-shrink-0">
                        <a href="#"
                            class="p-2 text-sm font-medium text-primary-700 rounded-lg hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                            Voir tout
                        </a>
                    </div>
                </div>
                <ol class="relative border-l border-gray-200 dark:border-gray-700">
                    <li class="mb-10 ml-4">
                        <div
                            class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-800 dark:bg-gray-700">
                        </div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Avril
                            2023</time>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Nouveau client ajouté</h3>
                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Client XYZ a rejoint la
                            plateforme</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div
                            class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-800 dark:bg-gray-700">
                        </div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Mars
                            2023</time>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Mise à jour du système</h3>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Nouvelle version déployée</p>
                    </li>
                </ol>
            </div>
            <!-- Widget Tâches -->
            <div
                class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tâches en cours</h3>
                    <div class="flex-shrink-0">
                        <a href="#"
                            class="p-2 text-sm font-medium text-primary-700 rounded-lg hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                            Voir tout
                        </a>
                    </div>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                                        <span class="text-primary-600 dark:text-primary-500">1</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        Mise à jour du site
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        En cours
                                    </p>
                                </div>
                                <div class="inline-flex items-center">
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        75%
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                                        <span class="text-primary-600 dark:text-primary-500">2</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        Optimisation SEO
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        En attente
                                    </p>
                                </div>
                                <div class="inline-flex items-center">
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                        30%
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
