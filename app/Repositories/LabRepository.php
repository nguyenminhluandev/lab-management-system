<?php

namespace App\Repositories;

use App\Models\Lab;
use App\Repositories\BaseRepository;

class LabRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Lab::class;
    }
}
