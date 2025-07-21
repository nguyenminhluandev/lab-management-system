<?php

namespace App\Repositories;

use App\Models\Semester;
use App\Repositories\BaseRepository;

class SemesterRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Semester::class;
    }
}
