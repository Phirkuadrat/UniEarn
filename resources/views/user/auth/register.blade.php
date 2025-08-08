<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-secondary to-third py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-4xl bg-white shadow-xl rounded-lg overflow-hidden">
            <!-- Image Section - Fixed to touch top and bottom -->
            <div class="w-full md:w-1/2 h-full bg-gradient-to-br from-blue-600 to-primary relative">
                <img src="{{ asset('images/pictureforregist.jpg') }}" alt="Restaurant Scene"
                    class="w-full h-full object-cover object-center">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                    <div>
                        <h1 class="text-3xl font-bold text-white">Join Us</h1>
                        <p class="text-purple-100 mt-2">Start your journey with us</p>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="w-full md:w-1/2 p-8 md:p-10">
                <div class="text-center mb-8">
                    <div class="mx-auto flex items-center justify-center mb-5">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/uniearn.png') }}" alt="uniEarn Logo" class="h-12">
                            <span class="ml-2 text-2xl font-bold text-[#3674B5]">uniEarn</span>
                        </div>
                    </div>
                    <h2 class="text-3xl font-extrabold text-gray-900">
                        Create Your Account
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Fill in the form below to register
                    </p>
                </div>

                <!-- Validation Errors -->
                {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

                <form class="space-y-6" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="space-y-4">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input id="name" name="name" type="text" autocomplete="name" required
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                    value="{{ old('name') }}"
                                    placeholder="John Doe">
                            </div>
                        </div>

                        <!-- Email Address -->
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
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input id="password" name="password" type="password" autocomplete="new-password" required
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                    placeholder="At least 8 characters">
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                    placeholder="Retype your password">
                            </div>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    {{-- <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" required
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition-all">
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            I agree to the <a href="#" class="text-blue-600 hover:text-blue-500">Terms and Conditions</a>
                        </label>
                    </div> --}}

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <i class="fas fa-user-plus mr-2"></i>
                            Register
                        </button>
                    </div>

                    <div class="text-center">
                        <p class="mt-2 text-sm text-gray-600">
                            Already have an account?
                            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500 transition-colors">
                                Login here
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
