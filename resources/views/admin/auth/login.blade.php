<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-secondary to-third py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-4xl bg-white shadow-xl rounded-lg overflow-hidden">
            <!-- Image Section -->
            <div class="w-full md:w-1/2 h-64 md:h-auto bg-gradient-to-br from-blue-600 to-primary relative">
                <img src="{{ asset('images/japanese-woman-posing-restaurant.webp') }}" alt="Restaurant Scene"
                    class="w-full h-full object-cover opacity-90">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                    <div>
                        <h1 class="text-3xl font-bold text-white">Welcome</h1>
                        <p class="text-purple-100 mt-2">Continue your journey</p>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="w-full md:w-1/2 p-8 md:p-10">
                <div class="text-center mb-8">
                    <div class="mx-auto flex items-center justify-center mb-8">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/uniearn.png') }}" alt="uniEarn Logo" class="h-12">
                            <span class="ml-2 text-2xl font-bold text-[#3674B5]">uniEarn</span>
                        </div>
                    </div>
                    <h2 class="text-3xl font-extrabold text-gray-900">
                        Admin Login
                    </h2>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4 p-4 bg-green-50 text-green-700 rounded-lg" :status="session('status')" />

                <form class="space-y-6" method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf

                    <div class="space-y-4">
                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                    value="{{ old('email') }}"
                                    placeholder="email@example.com">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input id="password" name="password" type="password" autocomplete="current-password" required
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                    placeholder="••••••••">
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>
                    </div>



                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Login
                        </button>
                    </div>

                </form>


            </div>
        </div>
    </div>
</x-guest-layout>
