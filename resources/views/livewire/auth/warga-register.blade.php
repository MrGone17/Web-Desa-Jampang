<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-700 to-blue-900 relative overflow-hidden">
    <!-- Animasi hujan -->
    <div class="rain">
        @for ($i = 0; $i < 100; $i++)
            <div class="raindrop" style="
                left: {{ rand(0, 100) }}%;
                animation-duration: {{ rand(2, 5) }}s;
                animation-delay: -{{ rand(0, 5) }}s;">
            </div>
        @endfor
    </div>

    <!-- Form dengan efek glass -->
    <div class="backdrop-blur-lg bg-white/10 border border-white/30 rounded-2xl shadow-2xl p-8 w-full max-w-md z-10">
        <div class="flex justify-center items-center">
            <img src="{{ asset('image/bogor.png') }}" class="w-16 h-16 md:w-20 md:h-20" />
        </div>
        <h2 class="text-2xl font-bold text-white mb-6 text-center drop-shadow">Registrasi Warga</h2>

        @if (session()->has('success'))
            <div class="mb-4 text-green-200 bg-green-500/20 border border-green-300 px-4 py-2 rounded text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="register" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-white mb-1">Nama Lengkap</label>
                <input type="text" wire:model.defer="name"
                    class="w-full bg-white/30 text-white placeholder-white/70 border border-white/30 focus:ring-white focus:border-white px-4 py-2 rounded-lg shadow-sm backdrop-blur-md capitalize" placeholder="Masukan Nama Sesuai Nama Di KTP" />
                @error('name') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-1">Email</label>
                <input type="email" wire:model.defer="email"
                    class="w-full bg-white/30 text-white placeholder-white/70 border border-white/30 focus:ring-white focus:border-white px-4 py-2 rounded-lg shadow-sm backdrop-blur-md" placeholder="Masukan Email Resmi Yang Anda Punya"/>
                @error('email') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-1">Nomor Induk Kependudukan</label>
                <input type="nik" wire:model.defer="nik" wire:model.lazy="nik"
                    class="w-full bg-white/30 text-white placeholder-white/70 border border-white/30 focus:ring-white focus:border-white px-4 py-2 rounded-lg shadow-sm backdrop-blur-md" placeholder="Masukan NIK Sesuai KTP Anda" />
                @error('nik') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-1">Password</label>
                <input type="password" wire:model.defer="password"
                    class="w-full bg-white/30 text-white placeholder-white/70 border border-white/30 focus:ring-white focus:border-white px-4 py-2 rounded-lg shadow-sm backdrop-blur-md" placeholder="Masukan Password"/>
                @error('password') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
            </div>

            @if (!$showConfirmation)
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-2 rounded-xl hover:from-blue-600 hover:to-indigo-700 transition duration-300 font-semibold shadow-md">
                    Daftar
                </button>
            @else
                <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 p-4 rounded-xl shadow-sm mb-4">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13 16h-1v-4h-1m1-4h.01M12 6a9 9 0 110 18 9 9 0 010-18z" />
                        </svg>
                        <p class="font-medium">Konfirmasi Data</p>
                    </div>
                    <p class="mt-2 text-sm">Pastikan semua data yang Anda masukkan sudah benar. Data tidak dapat diubah setelah dikirim.</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <button wire:click="submitConfirmed"
                        class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-xl font-semibold transition duration-300 shadow-md">
                        ✅ Konfirmasi & Kirim
                    </button>
                    <button wire:click="$set('showConfirmation', false)"
                        class="w-full bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 rounded-xl font-semibold transition duration-300 shadow-md">
                        🔙 Kembali
                    </button>
                </div>
            @endif
            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-sm text-white hover:underline">
                    Sudah punya akun? Kembali Ke Login
                </a>
            </div>
        </form>
    </div>
    <style>
        /* Animasi hujan */
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

