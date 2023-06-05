<x-app-layout>
    @section('title', "Create Product")
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Create new Product') }}
                            </h2>
                        </header>
                    
                        <form method="post" action="{{route('admin.product.store')}}" class="mt-6 space-y-6">
                            @csrf
                    
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{old('name')}}" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                    
                            <div>
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" value="{{old('price')}}" required autocomplete="price" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div>
                                <x-input-label for="product_categories_id" :value="__('Product Category')" />
                                <select id="countries" name="product_categories_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" selected disabled>Choose a country</option>
                                    <option value="" disabled>-----------</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('product_categories_id')" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea
                                    id="description"
                                    name="description"
                                    rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write your thoughts here..."
                                >{{ old('description') }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>

                            <div>
                                <x-input-label for="tags" :value="__('Tags')" />
                                <x-text-input id="tags" name="tags" type="text" class="mt-1 block w-full" value="{{old('tags')}}" required autofocus autocomplete="tags" />
                                <x-input-error class="mt-2" :messages="$errors->get('tags')" />
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
</x-app-layout>