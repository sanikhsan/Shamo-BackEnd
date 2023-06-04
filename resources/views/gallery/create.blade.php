<x-app-layout>
    @section('title', "Image Product")
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Image Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Add an Image to Product :') }} {{$product->name}}
                            </h2>
                            @if ($errors->any())
                                <div class="text-red-800">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </header>
                    
                        <form method="post" action="{{route('admin.product.gallery.store', $product)}}" class="mt-6 space-y-6">
                            @csrf
                    
                            <div>
                                <x-input-label for="filepond" :value="__('Upload an Image')" />
                                <x-text-input id="products_id" name="products_id" type="hidden" class="mt-1 block w-full" value="{{$product->id}}" readonly />
                                <x-text-input id="filepond" name="image" type="file" class="mt-1 block w-full" required />
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>                    
                </div>
            </div>
        </div>
    </div>
    
    @push('styles')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    @endpush

    @push('scripts')
    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <!-- image editor -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <!-- filepond -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
    // register desired plugins...
    FilePond.registerPlugin(
        // validates the size of the file...
        FilePondPluginFileValidateSize,
        // validates the file type...
        FilePondPluginFileValidateType,
        // preview the image file type...
        FilePondPluginImagePreview,
    );
        // Filepond: Image Preview

    FilePond.create(document.querySelector('#filepond'), {
        server: {
            process: '{{route('admin.gallery.upload')}}',
            revert: '{{route('admin.gallery.cancel')}}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        },
        acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
        allowImagePreview: true,
    });
    </script>
    @endpush
</x-app-layout>