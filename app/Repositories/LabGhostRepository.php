<?php

namespace App\Repositories;

use App\Models\LabGhost;
use App\Repositories\BaseRepository;

class LabGhostRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return LabGhost::class;
    }
}
