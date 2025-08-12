<?php

namespace App\Livewire\Pages\Domains;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Domain;

class DomainTable extends DataTableComponent
{
    protected $model = Domain::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("TTL", "ttl")
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
                ->sortable(),
            Column::make("SOA NS", "soa_ns")
                ->sortable(),
            Column::make("SOA Email", "soa_email")
                ->sortable(),
        ];
    }
}
