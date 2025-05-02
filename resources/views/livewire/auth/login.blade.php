<div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-xl flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div class="flex justify-center items-left">
                <img src="{{ asset('image/bogor.png') }}" class="w-12 h-12 md:w-20 md:h-20" />
            </div>
            <div class="flex flex-col items-center">
                <div class="w-full flex-1">
                    <div class="flex flex-col items-center">
                        @if (session('error'))
                            <div class="bg-rose-500 text-white p-2 rounded mb-4">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="my-6 border-b text-center">
                            <h1 class="text-4xl font-bold text-center mb-4">
                                Login CMS Desa Jampang
                            </h1>
                            <h3
                                class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                Login dengan E-mail Admin
                            </h3>
                        </div>

                        <form wire:submit.prevent="login" class="mx-auto max-w-xs">
                            <input wire:model="email"
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                type="email" placeholder="Email" />
                            @error('email')
                                <span class="text-rose-600 text-sm">{{ $message }}</span>
                            @enderror

                            <input wire:model="password"
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                type="password" placeholder="Password" />
                            @error('password')
                                <span class="text-rose-600 text-sm">{{ $message }}</span>
                            @enderror

                            <div class="mt-5">
                                <label for="remember" class="inline-flex items-center">
                                    <input wire:model="remember" type="checkbox" id="remember" class="form-checkbox">
                                    <span class="ml-2 text-sm">Ingat saya</span>
                                </label>
                            </div>

                            <button
                                class="mt-5 tracking-wide font-semibold bg-indigo-500 text-white w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <path d="M20 8v6M23 11h-6" />
                                </svg>
                                <span class="ml-2">
                                    Login
                                </span>
                            </button>
                        </form>

                        {{-- <p class="mt-6 text-xs text-gray-600 text-center">
                            I agree to abide by Cartesian Kinetics
                            <a href="#" class="border-b border-gray-500 border-dotted">
                                Terms of Service
                            </a>
                            and its
                            <a href="#" class="border-b border-gray-500 border-dotted">
                                Privacy Policy
                            </a>
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 bg-green-50 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat rounded-xl overflow-hidden"
                style="background-image: url('{{ asset('image/desadigital.jpg') }}');">
            </div>
        </div>
    </div>
</div>
