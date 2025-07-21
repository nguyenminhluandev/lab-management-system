<?php

namespace App\Repositories;

use App\Models\Issue;
use App\Repositories\BaseRepository;

class IssueRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Issue::class;
    }
}
