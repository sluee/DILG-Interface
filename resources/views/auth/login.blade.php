<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    </div>
        <div class="min-w-screen min-h-screen  flex items-center justify-center px-5 py-5">
            <div class="bg-white text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
                <div class="md:flex w-full ">
                    <div class="hidden md:flex md:flex-col md:items-center md:justify-center w-1/2 ">
                        <img src="/images/dilg-main.png" class="w-[200px] h-[200px] object-fit mx-auto mt-18" alt="">
                        <h1 class="font-bold text-2xl mx-auto mt-4">Department of the Interior</h1>
                        <h1 class="font-bold text-2xl mx-auto">and Local Government</h1>
                        <h1 class="font-bold text-2xl mx-auto">Bohol Province</h1>
                    </div>

                    <div class="w-full md:w-1/2 py-10 px-5 md:px-10  bg-blue-200">
                        <div class="text-center mb-10">

                            <h1 class="font-bold text-3xl text-gray-900">Login to DILG Issuances</h1>
                            <p class="mt-5">Enter your information to log in</p>
                            @if (session('message'))
                                <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                                    <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                    <div>
                                        <span class="font-medium">Info alert!</span> {{session('message')}}
                                    </div>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                    <div>
                                        <span class="font-medium">Danger alert!</span> {{session('error')}}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div>
                                    <x-input-label for="email" value="Email" />
                                    <x-text-input
                                        id="email"
                                        type="email" name="email" :value="old('email')"
                                        class="mt-1 block w-full"
                                        required
                                        autofocus
                                        autocomplete="email"
                                    />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="password" value="Password" />
                                    <x-text-input
                                        id="password"
                                        type="password"
                                        name="password"
                                        class="mt-1 block w-full"
                                        required
                                        autocomplete="current-password"
                                    />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded  border-gray-300  text-indigo-600 shadow-sm focus:ring-indigo-500 " name="remember">
                                        <span class="ms-2 text-sm text-gray-600 ">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <div class="flex items-center mt-4">
                                    <!-- <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Forgot your password?
                                    </Link> -->

                                    <button class="w-full justify-center inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        <span class="text-white">Login</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-guest-layout>
