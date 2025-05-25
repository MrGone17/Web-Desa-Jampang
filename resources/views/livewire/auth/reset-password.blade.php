<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-700 to-blue-900 relative overflow-hidden">
    <div class="rain">
        @for ($i = 0; $i < 100; $i++)
            <div class="raindrop" style="
                left: {{ rand(0, 100) }}%;
                animation-duration: {{ rand(2, 5) }}s;
                animation-delay: -{{ rand(0, 5) }}s;">
            </div>
        @endfor
    </div>

    <div wire:loading wire:target="resetPassword" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80">
        <div class="flex flex-col items-center h-full justify-center">
            <img src="{{ asset('image/bogor.png') }}" alt="Loading..." class="h-32 w-32 animate-pulse mb-4">
            <div class="flex space-x-2">
                <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce"></span>
                <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.2s]"></span>
                <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.4s]"></span>
            </div>
        </div>
    </div>

    <div class="backdrop-blur-lg bg-white/10 border border-white/30 rounded-2xl shadow-2xl p-8 w-full max-w-md z-10">
        <div class="flex justify-center items-center">
            <img src="{{ asset('image/bogor.png') }}" class="w-16 h-16 md:w-20 md:h-20" />
        </div>
        <h2 class="text-2xl font-bold text-white mb-6 text-center drop-shadow">Reset Password</h2>

        @if (session()->has('success'))
            <div class="mb-4 text-green-200 bg-green-500/20 border border-green-300 px-4 py-2 rounded text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mb-4 text-red-200 bg-red-500/20 border border-red-300 px-4 py-2 rounded text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form wire:submit.prevent="resetPassword" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-white mb-1">Password Baru</label>
                <input type="password" wire:model.defer="password"
                    class="w-full bg-white/30 text-white placeholder-white/70 border border-white/30 focus:ring-white focus:border-white px-4 py-2 rounded-lg shadow-sm backdrop-blur-md"
                    required>
                @error('password') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-1">Konfirmasi Password</label>
                <input type="password" wire:model.defer="password_confirmation"
                    class="w-full bg-white/30 text-white placeholder-white/70 border border-white/30 focus:ring-white focus:border-white px-4 py-2 rounded-lg shadow-sm backdrop-blur-md"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-white/20 text-white py-2 rounded-lg hover:bg-white/30 transition duration-200 font-semibold">
                Reset Password
            </button>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-sm text-white hover:underline">
                    Kembali ke Login
                </a>
            </div>
        </form>
    </div>

    <style>
        .rain {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .raindrop {
            position: absolute;
            width: 2px;
            height: 15px;
            background: rgba(255, 255, 255, 0.3);
            animation: fall linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(100vh);
            }
        }
    </style>
</div>