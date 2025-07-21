<?php

namespace App\Repositories;

use App\Models\LeaveRequest;
use App\Repositories\BaseRepository;

class LeaveRequestRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return LeaveRequest::class;
    }
}
