<?php

namespace App\Livewire\Pages\Domains;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\DnsRecord;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

class ZoneTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return DnsRecord::query()
        ->join('domains', 'dns_records.domain_id', '=', 'domains.id') // Join dns_records with domains
        ->where('domains.id', '=', Session::get('id_ses'))
        ->select(
            'dns_records.*',  // Select all fields from dns_records
            'domains.name as domain_name', // Select domain's name column as domain_name
            'domains.soa_serial', // Include other domain info
            'domains.soa_refresh',
            'domains.soa_retry',
            'domains.soa_expire',
            'domains.soa_minimum',
            'domains.soa_ns',
            'domains.soa_email'
        );
        }

    protected $listeners = ['re_render_table' => '$refresh'];



    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
        $this->setEagerLoadAllRelationsEnabled();
    }



    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
                // Column::make("Domain", "domains.name")
                // ->searchable()
                // ->sortable(),

            Column::make("Name", "name")
                ->searchable()
                ->sortable(),

            Column::make("TTL", "ttl")
                ->searchable()
                ->sortable(),
            Column::make("Aksi", "id")
                ->format(
                    fn($value, $row, Column $column) => view('components.table.custom.action-min')->withRow($row),
                ),


        ];
    }
}
