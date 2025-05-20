<?php

namespace App\Providers\Filament;

use App\Filament\Resources\AboutResource;
use App\Filament\Resources\AchievementResource;
use App\Filament\Resources\AgendaResource;
use App\Filament\Resources\AlbumResource;
use App\Filament\Resources\AlurppdbResource;
use App\Filament\Resources\AnnouncementResource;
use App\Filament\Resources\BackgroundResource;
use App\Filament\Resources\BedanamaResource;
use App\Filament\Resources\BeritaResource;
use App\Filament\Resources\DivisidesaResource;
use App\Filament\Resources\EducatorResource;
use App\Filament\Resources\EskulResource;
use App\Filament\Resources\ExtracurricularResource;
use App\Filament\Resources\GraduateResource;
use App\Filament\Resources\InfobansosResource;
use App\Filament\Resources\KalenderAkademikResource;
use App\Filament\Resources\KalenderResource;
use App\Filament\Resources\KontakResource;
use App\Filament\Resources\KriteriabansosResource;
use App\Filament\Resources\KurikulumResource;
use App\Filament\Resources\KuskurResource;
use App\Filament\Resources\LayananadmResource;
use App\Filament\Resources\MediaSosialResource;
use App\Filament\Resources\PariwisataResource;
use App\Filament\Resources\PendahuluanadministrasiResource;
use App\Filament\Resources\PendahuluansuratResource;
use App\Filament\Resources\PengajuansuratResource;
use App\Filament\Resources\PhotoResource;
use App\Filament\Resources\FacilityResource;
use App\Filament\Resources\InfoppdbResource;
use App\Filament\Resources\InstagramPostResource;
use App\Filament\Resources\JadwalppdbResource;
use App\Filament\Resources\LayananpublikResource;
use App\Filament\Resources\MediaBeritaResource;
use App\Filament\Resources\MediaFotoResource;
use App\Filament\Resources\MedsosResource;
use App\Filament\Resources\MetodeResource;
use App\Filament\Resources\NewsResource;
use App\Filament\Resources\PetaResource;
use App\Filament\Resources\PointKurikulumResource;
use App\Filament\Resources\PpdbResource;
use App\Filament\Resources\PrinsipResource;
use App\Filament\Resources\ProbriResource;
use App\Filament\Resources\ProgramResource;
use App\Filament\Resources\RwResource;
use App\Filament\Resources\SambutanResource;
use App\Filament\Resources\SeragamResource;
use App\Filament\Resources\SliderResource;
use App\Filament\Resources\SosmedResource;
use App\Filament\Resources\StrukturpemdesaResource;
use App\Filament\Resources\StrukturResource;
use App\Filament\Resources\SuratahliwarisResource;
use App\Filament\Resources\SuratBelumMenikahResource;
use App\Filament\Resources\SuratbuataktalahirResource;
use App\Filament\Resources\SuratdomisiliResource;
use App\Filament\Resources\SuratDuplikatSuratNikahResource;
use App\Filament\Resources\SuratIzinKeramaianResource;
use App\Filament\Resources\SuratKematianResource;
use App\Filament\Resources\SuratKeteranganMenikahResource;
use App\Filament\Resources\SuratketeranganpendudukResource;
use App\Filament\Resources\SuratKeteranganTelahMenikahResource;
use App\Filament\Resources\SuratKeteranganWaliHakimResource;
use App\Filament\Resources\SuratKeteranganWaliResource;
use App\Filament\Resources\SuratKetJandaDudaResource;
use App\Filament\Resources\SuratKetLajangResource;
use App\Filament\Resources\SuratKetPernahMenikahResource;
use App\Filament\Resources\SuratKuasaPengasuhanAnakResource;
use App\Filament\Resources\SuratkuasaResource;
use App\Filament\Resources\SuratmatidanlahirResource;
use App\Filament\Resources\SuratnikahResource;
use App\Filament\Resources\SuratnoaktalahirResource;
use App\Filament\Resources\SuratNumpangNikahResource;
use App\Filament\Resources\SuratPembuatanAktaLahirResource;
use App\Filament\Resources\SuratPembuatanPengakuanAnakResource;
use App\Filament\Resources\SuratPengantarNikahResource;
use App\Filament\Resources\SuratPermohonanCeraiResource;
use App\Filament\Resources\SuratpermohonankkResource;
use App\Filament\Resources\SuratperubahankkResource;
use App\Filament\Resources\SuratpindahpendudukResource;
use App\Filament\Resources\SuratprosesktpResource;
use App\Filament\Resources\SuratRujukCeraiResource;
use App\Filament\Resources\SurattidakpunyadokumenpendudukResource;
use App\Filament\Resources\SyaratketentuanResource;
use App\Filament\Resources\SyaratppdbResource;
use App\Filament\Resources\TentangdesaResource;
use App\Filament\Resources\TestimoniResource;
use App\Filament\Resources\UmkmResource;
use App\Filament\Resources\VideoResource;
use App\Filament\Resources\ViewResource;
use App\Filament\Resources\VisiMisiResource;
use App\Filament\Resources\WargaResource;
use App\Livewire\Auth\Login;
use App\Models\KalenderAgenda;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\NavigationManager;
use Filament\Pages;
use Filament\Pages\Dashboard;
use Filament\Pages\SubNavigationPosition;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->spa()
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => Color::Indigo,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->font('Poppins')
            ->brandName('Admin Desa Jampang')
            ->favicon(asset('image/bogor.png'))
            ->sidebarFullyCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])  

            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make()
                        ->items([
                            NavigationItem::make('Dasbor')
                                ->icon('heroicon-o-home')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.pages.dashboard'))
                                ->url(fn(): string => Dashboard::getUrl()),
                            NavigationItem::make('Akun Warga')
                                ->icon('heroicon-o-user-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.wargas.index'))
                                ->url(WargaResource::getUrl()),
                        ]),
                    NavigationGroup::make('Layanan Kependudukan')
                        ->items([
                            NavigationItem::make('Surat Nikah')
                                ->icon('heroicon-o-wallet')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratnikahs.index'))
                                ->url(SuratnikahResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Beda Nama')
                                ->icon('heroicon-o-wallet')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.bedanamas.index'))
                                ->url(BedanamaResource::getUrl()),
                            NavigationItem::make('Surat Domisili')
                                ->icon('heroicon-o-wallet')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratdomisilis.index'))
                                ->url(SuratdomisiliResource::getUrl()),
                            NavigationItem::make('Surat Permohonan Kartu Keluarga')
                                ->icon('heroicon-o-wallet')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratpermohonankks.index'))
                                ->url(SuratpermohonankkResource::getUrl()),
                            NavigationItem::make('Surat Keterangan KTP Dalam Proses')
                                ->icon('heroicon-o-wallet')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratprosesktps.index'))
                                ->url(SuratprosesktpResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Penduduk')
                                ->icon('heroicon-o-wallet')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratketeranganpenduduks.index'))
                                ->url(SuratketeranganpendudukResource::getUrl()),
                            NavigationItem::make('Surat Perubahan Kartu Keluarga')
                                ->icon('heroicon-o-wallet')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratperubahankks.index'))
                                ->url(SuratperubahankkResource::getUrl()),
                            NavigationItem::make('Surat Tidak Memiliki Dokumen Penduduk')
                                ->icon('heroicon-o-wallet')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.surattidakpunyadokumenpenduduks.index'))
                                ->url(SurattidakpunyadokumenpendudukResource::getUrl()),
                            NavigationItem::make('Surat Kuasa Layanan Penduduk')
                                ->icon('heroicon-o-wallet')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratkuasas.index'))
                                ->url(SuratkuasaResource::getUrl()),
                            NavigationItem::make('Surat Pindah Penduduk')
                                ->icon('heroicon-o-wallet')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratpindahpenduduks.index'))
                                ->url(SuratpindahpendudukResource::getUrl()),
                        ]),
                    NavigationGroup::make('Layanan Catatan Sipil')
                        ->items([
                            NavigationItem::make('Surat Ahli Waris')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratahliwariss.index'))
                                ->url(SuratahliwarisResource::getUrl()),
                            NavigationItem::make('Surat Tidak Punya Akta Lahir')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratnoaktalahirs.index'))
                                ->url(SuratnoaktalahirResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Kelahiran')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratbuataktalahirs.index'))
                                ->url(SuratbuataktalahirResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Lahir & Mati')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratmatidanlahirs.index'))
                                ->url(SuratmatidanlahirResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Kematian')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratkematians.index'))
                                ->url(SuratKematianResource::getUrl()),
                            NavigationItem::make('Surat Kuasa Pengasuhan Anak')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratpengasuhananaks.index'))
                                ->url(SuratKuasaPengasuhanAnakResource::getUrl()),
                            NavigationItem::make('Surat Pembuatan Akta Kelahiran')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratpembuatanaktalahirs.index'))
                                ->url(SuratPembuatanAktaLahirResource::getUrl()),
                            NavigationItem::make('Surat Pengakuan Anak')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratpembuatanpengakuananaks.index'))
                                ->url(SuratPembuatanPengakuanAnakResource::getUrl()),
                        ]),
                    NavigationGroup::make('Layanan Pernikahan')
                        ->items([
                            NavigationItem::make('Surat Belum Menikah')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratbelummenikahs.index'))
                                ->url(SuratBelumMenikahResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Sudah Menikah')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratketeranganmenikahs.index'))
                                ->url(SuratKeteranganMenikahResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Numpang Menikah')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratnumpangnikahs.index'))
                                ->url(SuratNumpangNikahResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Rujuk Cerai')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratrujukcerais.index'))
                                ->url(SuratRujukCeraiResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Telah Menikah')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratketerangantelahmenikahs.index'))
                                ->url(SuratKeteranganTelahMenikahResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Wali')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratketeranganwalis.index'))
                                ->url(SuratKeteranganWaliResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Wali Hakim')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratketeranganwalihakims.index'))
                                ->url(SuratKeteranganWaliHakimResource::getUrl()),
                            NavigationItem::make('Surat Pengantar Nikah')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratpengantarnikahs.index'))
                                ->url(SuratPengantarNikahResource::getUrl()),
                            NavigationItem::make('Surat Permohonan Cerai')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratpermohonancerais.index'))
                                ->url(SuratPermohonanCeraiResource::getUrl()),
                            NavigationItem::make('Surat Duplikat Surat Nikah')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratduplikatsuratnikahs.index'))
                                ->url(SuratDuplikatSuratNikahResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Janda Duda')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.suratketjandadudas.index'))
                                ->url(SuratKetJandaDudaResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Lajang')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.surat-ket-lajangs.index'))
                                ->url(SuratKetLajangResource::getUrl()),
                            NavigationItem::make('Surat Keterangan Pernah Menikah')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.surat-ket-pernah-menikahs.index'))
                                ->url(SuratKetPernahMenikahResource::getUrl()),
                        ]),
                    NavigationGroup::make('Layanan Umum')
                        ->items([
                            NavigationItem::make('Surat Izin Keramaian')
                                ->icon('heroicon-o-document-text')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.surat-izin-keramaians.index'))
                                ->url(SuratIzinKeramaianResource::getUrl()),
                        ]),
                    NavigationGroup::make('Page Beranda')
                        ->items([
                            NavigationItem::make('Slider')
                                ->icon('heroicon-o-arrows-right-left')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.sliders.index'))
                                ->url(SliderResource::getUrl()),
                            NavigationItem::make('Sambutan')
                                ->icon('heroicon-o-sparkles')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.sambutans.index'))
                                ->url(SambutanResource::getUrl()),
                            NavigationItem::make('Data Penduduk')
                                ->icon('heroicon-o-user')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.rws.index'))
                                ->url(RwResource::getUrl()),
                            NavigationItem::make('Layanan Publik')
                            ->icon('heroicon-o-chat-bubble-left-right')
                            ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.layananpubliks.index'))
                            ->url(LayananpublikResource::getUrl()),
                        ]),
                    NavigationGroup::make('Page Visi & Misi')
                        ->items([
                            NavigationItem::make('Tentang Desa')
                                ->icon('heroicon-o-globe-alt')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.tentangdesas.index'))
                                ->url(TentangdesaResource::getUrl()),
                            NavigationItem::make('Visi Misi')
                                ->icon('heroicon-o-megaphone')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.visimisis.index'))
                                ->url(VisiMisiResource::getUrl()),
                            NavigationItem::make('Prinsip')
                                ->icon('heroicon-o-receipt-percent')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.prinsips.index'))
                                ->url(PrinsipResource::getUrl()),
                        ]),
                    NavigationGroup::make('Page Struktur Desa')
                        ->items([
                            NavigationItem::make('Gambar Struktur Desa')
                                ->icon('heroicon-o-rectangle-group')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.strukturpemdesas.index'))
                                ->url(StrukturpemdesaResource::getUrl()),
                            NavigationItem::make('Aparatur Desa')
                                ->icon('heroicon-o-user-group')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.divisidesas.index'))
                                ->url(DivisidesaResource::getUrl()),
                        ]),
                    NavigationGroup::make('Page Administrasi Desa')
                        ->items([
                            NavigationItem::make('Pendahuluan Administrasi')
                                ->icon('heroicon-o-book-open')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.pendahuluanadministrasis.index'))
                                ->url(PendahuluanadministrasiResource::getUrl()),
                            NavigationItem::make('Layanan Administrasi')
                                ->icon('heroicon-o-window')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.layananadms.index'))
                                ->url(LayananadmResource::getUrl()),
                            NavigationItem::make('Syarat & Ketentuan')
                                ->icon('heroicon-o-wallet')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.syaratketentuans.index'))
                                ->url(SyaratketentuanResource::getUrl()),
                        ]),
                    NavigationGroup::make('Page Bantuan Sosial')
                        ->items([
                            NavigationItem::make('Info Bansos')
                                ->icon('heroicon-o-shopping-cart')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.infobansos.index'))
                                ->url(InfobansosResource::getUrl()),
                            NavigationItem::make('Kriteria Bansos')
                                ->icon('heroicon-o-shield-check')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.kriteriabansos.index'))
                                ->url(KriteriabansosResource::getUrl()),    
                        ]),
                    NavigationGroup::make('Page Pembuatan Surat')
                        ->items([
                            NavigationItem::make('Pendahuluan Surat')
                                ->icon('heroicon-o-paper-airplane')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.pendahuluansurats.index'))
                                ->url(PendahuluansuratResource::getUrl()),
                            NavigationItem::make('Pengajuan Surat')
                                ->icon('heroicon-o-pencil-square')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.pengajuansurats.index'))
                                ->url(PengajuansuratResource::getUrl()),
                        ]),
                    NavigationGroup::make('Page Media')
                        ->items([
                            NavigationItem::make('Berita')
                                ->icon('heroicon-o-newspaper')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.beritas.index'))
                                ->url(BeritaResource::getUrl()),
                            NavigationItem::make('Foto')
                                ->icon('heroicon-o-photo')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.albums.index'))
                                ->url(AlbumResource::getUrl()),
                            NavigationItem::make('Video')
                                ->icon('heroicon-o-video-camera')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.videos.index'))
                                ->url(VideoResource::getUrl()),
                        ]),
                    NavigationGroup::make('Page Potensi Desa')
                        ->items([
                            NavigationItem::make('Umkm')
                                ->icon('heroicon-o-shopping-bag')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.umkms.index'))
                                ->url(UmkmResource::getUrl()),
                            NavigationItem::make('pariwisata')
                                ->icon('heroicon-o-map')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.pariwisatas.index'))
                                ->url(PariwisataResource::getUrl()),
                        ]),
                    NavigationGroup::make('Page Kontak')
                        ->items([
                            NavigationItem::make('Kontak')
                                ->icon('heroicon-o-phone')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.kontaks.index'))
                                ->url(KontakResource::getUrl()),
                            NavigationItem::make('Sosial Media')
                                ->icon('heroicon-o-wifi')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.sosmeds.index'))
                                ->url(SosmedResource::getUrl()),
                        ]),
                ]);
            })
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
