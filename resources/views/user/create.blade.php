<x-app-layout>
    @section('title', "Create User")
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Create new User') }}
                            </h2>
                        </header>
                    
                        <form method="post" action="{{route('admin.user.store')}}" class="mt-6 space-y-6">
                            @csrf
                    
                            <div>
                                <x-input-label for="name" :value="__('User Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"  required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="username" :value="__('Username')" />
                                <x-text-input id="username" name="username" type="text" class="mt-1 block w-full"  required autofocus autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('username')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('User Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"  required autofocus autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div>
                                <x-input-label for="password" :value="__('User Password')" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"  required autofocus autocomplete="password" />
                                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                            </div>

                            <div>
                                <x-input-label for="roles" :value="__('User Roles')" />
                                <select id="roles" name="roles" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" selected disabled>Choose a Role</option>
                                    <option value="" disabled>-----------</option>
                                    <option value="ADMIN">Admin</option>
                                    <option value="CUSTOMER">Customer</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('roles')" />
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