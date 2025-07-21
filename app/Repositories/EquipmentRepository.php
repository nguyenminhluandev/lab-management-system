<?php

namespace App\Repositories;

use App\Models\Equipment;
use App\Repositories\BaseRepository;

class EquipmentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Equipment::class;
    }
}
