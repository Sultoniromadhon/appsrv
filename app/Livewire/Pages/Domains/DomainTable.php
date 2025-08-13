<?php

namespace App\Livewire\Pages\Domains;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Domain;

class DomainTable extends DataTableComponent
{
    protected $model = Domain::class;


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
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("TTL", "ttl")
                ->searchable()
                ->sortable(),
            Column::make("SOA Serial", "soa_serial")
                ->sortable(),
            Column::make("SOA Refresh", "soa_refresh")
                ->sortable(),
            Column::make("SOA Retry", "soa_retry")
                ->sortable(),
            Column::make("SOA Ex", "soa_expire")
                ->sortable(),
            Column::make("SOA Min", "soa_minimum")
                ->searchable()
                ->sortable(),
            Column::make("SOA NS", "soa_ns")
                ->searchable()
                ->sortable(),
            Column::make("SOA Email", "soa_email")
                ->searchable()
                ->sortable(),
            Column::make("Aksi", "id")
                ->format(
                    fn($value, $row, Column $column) => view('components.table.custom.action')->withRow($row),
                ),


        ];
    }
}
