<?php

namespace App\Http\Controllers\Manager;

use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{
    public function index()
    {
        $labs = Auth::user()->managedLabs;
        $equipments = Equipment::whereIn('lab_id', $labs->pluck('id'))->paginate(10);

        return view('manager.equipments.index', compact('equipments'));
    }

}
