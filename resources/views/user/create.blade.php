<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

        {{-- <form method="POST" action="{{ route('register') }}"> --}}
            {{-- @csrf --}}
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="space-y-6">
                    <div class="block pl-12 font-semibold text-xl self-start text-gray-700">
                        <h1 class="leading-relaxed">User Details Form</h1>
                        <hr>
                    </div>

                    <div class="border-b border-gray-900/10 pb-12">
                        <!-- Your form fields with Alpine.js bindings -->
                        <!-- ... -->

                        <!-- Example: Binding input value to Alpine.js data -->
                        <div class="sm:col-span-1">
                            <label for="firstName" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                            <div class="mt-2">
                                <input type="text" x-model="form.firstName" name="firstName" id="firstName" autocomplete="firstName" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <div x-show="form.errors.firstName" class="text-sm text-red-500 italic" x-text="form.errors.firstName"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="position" :value="__('Position')" />
                <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" required autofocus autocomplete="position" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>


</x-app-layout>
