<?php



use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Domains\Index as DomainsIndex;
use App\Livewire\Pages\Sites\Index as SitesIndex;
use App\Livewire\Pages\Security\Index as SecurityIndex;
use App\Livewire\Pages\UDisk\Index as UDiskIndex;
use App\Livewire\Pages\TQuotas\Index as TQuotasIndex;
use App\Livewire\Pages\SSL\Index as SSLIndex;



Route::get('/', Dashboard::class)->name('pages.dashboard');
Route::get('/domains', DomainsIndex::class)->name('pages.domains.index');
Route::get('/sites', SitesIndex::class)->name('pages.sites.index');
Route::get('/security', SecurityIndex::class)->name('pages.security.index');
Route::get('/udisk', UDiskIndex::class)->name('pages.udisk.index');
Route::get('/tquota', TQuotasIndex::class)->name('pages.tquotas.index');
Route::get('/ssl', SSLIndex::class)->name('pages.ssl.index');






