<?php

namespace App\Repositories;

use App\Models\IssueComputer;
use App\Repositories\BaseRepository;

class IssueComputerRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return IssueComputer::class;
    }
}
