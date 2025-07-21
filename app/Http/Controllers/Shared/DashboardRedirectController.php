<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardRedirectController extends Controller
{
    public function handle()
    {
        $role = Auth::user()->role->name;

        return match ($role) {
            'admin' => redirect('/admin'),
            'manager' => redirect('/manager'),
            'teacher' => redirect('/teacher'),
            default => abort(403),
        };
    }
}
