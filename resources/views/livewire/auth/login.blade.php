<div class="min-h-screen bg-gradient-to-br from-blue-700 to-blue-900 text-white flex justify-center items-center py-10 px-4">
    <div wire:loading wire:target="login" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80">
        <div class="flex flex-col items-center h-full justify-center">
            <img src="{{ asset('image/bogor.png') }}" alt="Loading..." class="h-32 w-32 animate-pulse mb-4">
            <div class="flex space-x-2">
                <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce"></span>
                <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.2s]"></span>
                <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.4s]"></span>
            </div>
        </div>
    </div>  
    <div class="max-w-screen-xl bg-white/10 border border-white/20 backdrop-blur-lg shadow-2xl rounded-xl flex justify-center flex-1 overflow-hidden"> 
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div class="flex justify-center items-center mb-6">
                <img src="{{ asset('image/bogor.png') }}" class="w-16 h-16 md:w-20 md:h-20" />
            </div>
            
            <div class="flex flex-col items-center">
                <div class="w-full">
                    <div class="text-center mb-6">
                        @if (session('error'))
                            <div class="bg-red-600/80 text-white p-2 rounded mb-4 text-sm shadow">
                                {{ session('error') }}
                            </div>
                        @endif
                        <h1 class="text-3xl font-extrabold mb-2 drop-shadow">Login CMS Desa Jampang</h1>
                        <p class="text-sm text-blue-200 tracking-wide font-medium">Login dengan E-mail Admin</p>
                    </div>

                    <form wire:submit.prevent="login" class="mx-auto max-w-xs space-y-5">
                        <div>
                            <input wire:model="email"
                                class="w-full px-5 py-3 rounded-lg bg-white/20 border border-white/30 placeholder-white/70 text-sm focus:outline-none focus:ring-2 focus:ring-white"
                                type="email" placeholder="Email" />
                            @error('email')
                                <span class="text-red-300 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <input wire:model="password"
                                class="w-full px-5 py-3 rounded-lg bg-white/20 border border-white/30 placeholder-white/70 text-sm focus:outline-none focus:ring-2 focus:ring-white"
                                type="password" placeholder="Password" />
                            @error('password')
                                <span class="text-red-300 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center">
                            <input wire:model="remember" type="checkbox" id="remember"
                                class="form-checkbox text-blue-500 bg-white/10 border-white/30 focus:ring-white">
                            <label for="remember" class="ml-2 text-sm text-white/80">Ingat saya</label>
                        </div>

                        <button
                            class="w-full bg-blue-600 hover:bg-blue-700 transition-all duration-300 text-white py-3 rounded-lg font-semibold flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6 -ml-1 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <path d="M20 8v6M23 11h-6" />
                            </svg>
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex-1 hidden lg:flex items-center justify-center relative overflow-hidden bg-gradient-to-tr from-blue-700 to-blue-900">
            <!-- Blob animation -->
            <div class="absolute w-[600px] h-[600px] bg-blue-300 opacity-30 rounded-full mix-blend-lighten animate-blob animation-delay-2000"></div>
            <div class="absolute w-[500px] h-[500px] bg-blue-400 opacity-20 rounded-full mix-blend-lighten animate-blob"></div>
            <div class="absolute w-[400px] h-[400px] bg-blue-500 opacity-25 rounded-full mix-blend-lighten animate-blob animation-delay-4000"></div>
        </div>        
    </div>
    <style>
        @keyframes blob {
          0%, 100% {
            transform: translate(0px, 0px) scale(1);
          }
          33% {
            transform: translate(30px, -50px) scale(1.1);
          }
          66% {
            transform: translate(-20px, 20px) scale(0.9);
          }
        }
        
        .animate-blob {
          animation: blob 8s infinite ease-in-out;
        }
        
        .animation-delay-2000 {
          animation-delay: 2s;
        }
        .animation-delay-4000 {
          animation-delay: 4s;
        }
    </style>        
</div>
