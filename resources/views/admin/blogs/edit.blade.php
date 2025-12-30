<x-layouts.dashboard>
	<div
		class="block items-center justify-between border-b border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 sm:flex lg:mt-1.5">
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
								<a href="{{ route("admin.blogs.index") }}"
									class="hover:text-primary-600 ml-1 text-gray-700 dark:text-gray-300 dark:hover:text-white md:ml-2">{{ __("Blogs") }}</a>
							</div>
						</li>
						<li>
							<div class="flex items-center">
								<svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
										clip-rule="evenodd"></path>
								</svg>
								<span class="ml-1 text-gray-400 dark:text-gray-500 md:ml-2" aria-current="page">{{ __("Edit") }}</span>
							</div>
						</li>
					</ol>
				</nav>
				<h1 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">{{ __("Edit Blog") }}:
					{{ $blog->title }}</h1>
			</div>
		</div>
	</div>

	<div class="p-4">
		<div class="max-w-4xl">
			<form action="{{ route("admin.blogs.update", $blog) }}" method="POST" enctype="multipart/form-data"
				class="space-y-6">
				@csrf
				@method("PUT")

				<!-- Title -->
				<div>
					<label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">{{ __("Title") }}
						*</label>
					<input type="text" name="title" id="title"
						class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
						placeholder="{{ __("Enter blog title") }}" value="{{ old("title", $blog->title) }}" required>
					@error("title")
						<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<!-- Excerpt -->
				<div>
					<label for="excerpt"
						class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">{{ __("Excerpt") }}</label>
					<textarea name="excerpt" id="excerpt" rows="3"
					 class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
					 placeholder="{{ __("Short description of the blog") }}">{{ old("excerpt", $blog->excerpt) }}</textarea>
					@error("excerpt")
						<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<!-- Content -->
				<div>
					<label for="content" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">{{ __("Content") }}
						*</label>

					<!-- Éditeur Quill -->
					<div id="editor-container"
						class="rounded-lg border border-gray-300 bg-white dark:border-gray-600 dark:bg-gray-700">
						<div id="editor" style="min-height: 300px;">{!! old("content", $blog->content) !!}</div>
					</div>

					<!-- Champ caché pour stocker le contenu -->
					<textarea name="content" id="content" class="hidden" required>{{ old("content", $blog->content) }}</textarea>

					@error("content")
						<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<!-- Status -->
				<div>
					<label for="status" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">{{ __("Status") }}
						*</label>
					<select name="status" id="status"
						class="focus:ring-primary-500 focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
						required>
						<option value="">{{ __("Select status") }}</option>
						<option value="draft" {{ old("status", $blog->status) == "draft" ? "selected" : "" }}>{{ __("Draft") }}
						</option>
						<option value="published" {{ old("status", $blog->status) == "published" ? "selected" : "" }}>
							{{ __("Published") }}</option>
						<option value="archived" {{ old("status", $blog->status) == "archived" ? "selected" : "" }}>{{ __("Archived") }}
						</option>
					</select>
					@error("status")
						<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<!-- Current Featured Image -->
				@if ($blog->featured_image)
					<div>
						<label
							class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">{{ __("Current Featured Image") }}</label>
						<img src="{{ asset("storage/" . $blog->featured_image) }}" alt="{{ $blog->title }}"
							class="h-32 w-32 rounded-lg object-cover">
					</div>
				@endif

				<!-- Featured Image -->
				<div>
					<label for="featured_image" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
						@if ($blog->featured_image)
							{{ __("Change Featured Image") }}
						@else
							{{ __("Featured Image") }}
						@endif
					</label>
					<input type="file" name="featured_image" id="featured_image" accept="image/*"
						class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400">
					<p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ __("PNG, JPG or GIF (MAX. 2MB)") }}</p>
					@error("featured_image")
						<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<!-- Published At -->
				<div>
					<label for="published_at"
						class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">{{ __("Published Date") }}</label>
					<input type="datetime-local" name="published_at" id="published_at"
						class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
						value="{{ old("published_at", $blog->published_at ? $blog->published_at->format("Y-m-d\TH:i") : "") }}">
					@error("published_at")
						<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
					@enderror
				</div>

				<!-- Actions -->
				<div class="flex items-center space-x-4">
					<button type="submit"
						class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
						{{ __("Update Blog") }}
					</button>
					<a href="{{ route("admin.blogs.index") }}"
						class="focus:ring-primary-300 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">
						{{ __("Cancel") }}
					</a>
				</div>
			</form>
		</div>
	</div>

	<!-- Scripts Quill.js -->
	<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

	<script>
		// Configuration de l'éditeur Quill
		var quill = new Quill('#editor', {
			theme: 'snow',
			modules: {
				toolbar: [
					[{
						'header': [1, 2, 3, 4, 5, 6, false]
					}],
					[{
						'font': []
					}],
					[{
						'size': ['small', false, 'large', 'huge']
					}],
					['bold', 'italic', 'underline', 'strike'],
					[{
						'color': []
					}, {
						'background': []
					}],
					[{
						'list': 'ordered'
					}, {
						'list': 'bullet'
					}],
					[{
						'align': []
					}],
					['blockquote', 'code-block'],
					['link', 'image', 'video'],
					['clean']
				]
			},
			placeholder: '{!! json_encode(__("Write your blog content here...")) !!}'
		});

		// Synchroniser le contenu avec le textarea caché
		quill.on('text-change', function() {
			document.getElementById('content').value = quill.root.innerHTML;
		});

		// Initialiser le contenu au chargement
		document.addEventListener('DOMContentLoaded', function() {
			document.getElementById('content').value = quill.root.innerHTML;
		});

		// Gestionnaire d'upload d'images
		quill.getModule('toolbar').addHandler('image', function() {
			const input = document.createElement('input');
			input.setAttribute('type', 'file');
			input.setAttribute('accept', 'image/*');
			input.click();

			input.onchange = function() {
				const file = input.files[0];
				if (file) {
					const formData = new FormData();
					formData.append('image', file);
					formData.append('_token', '{!! csrf_token() !!}');

					fetch('{!! route("admin.blogs.upload-image") !!}', {
							method: 'POST',
							body: formData
						})
						.then(response => response.json())
						.then(data => {
							if (data.success) {
								const range = quill.getSelection();
								quill.insertEmbed(range.index, 'image', data.url);
							} else {
								alert('Erreur lors du téléchargement de l\'image');
							}
						})
						.catch(error => {
							console.error('Erreur:', error);
							alert('Erreur lors du téléchargement de l\'image');
						});
				}
			};
		});

		// S'assurer que le contenu est synchronisé avant la soumission
		document.querySelector('form').addEventListener('submit', function() {
			document.getElementById('content').value = quill.root.innerHTML;
		});
	</script>
</x-layouts.dashboard>
