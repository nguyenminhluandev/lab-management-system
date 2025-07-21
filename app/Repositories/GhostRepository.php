<?php

namespace App\Repositories;

use App\Models\Ghost;
use App\Repositories\BaseRepository;

class GhostRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Ghost::class;
    }
}
