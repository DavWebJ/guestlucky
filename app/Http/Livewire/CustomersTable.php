<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CustomersTable extends LivewireDatatable
{
    public $model = User::class;

    public function builder()
    {
        return User::query()
        ->where('role_id','=','3');
    }
    public function columns()
    {
                return [

            Column::name('id')
                 ->label('ID')
                 ->defaultSort('asc')
                 ->filterable(),


            Column::name('name')
                ->label('Nom')
                ->defaultSort('asc')
                ->filterable(),

            Column::name('email')
                ->label('Email')
                ->defaultSort('asc')
                ->filterable(),
                
                Column::delete()

        ];
    }
}