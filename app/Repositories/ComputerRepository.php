<?php

namespace App\Repositories;

use App\Models\Computer;
use App\Repositories\BaseRepository;

class ComputerRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Computer::class;
    }
}
