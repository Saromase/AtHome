<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Http\Controllers\Controller;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::get();

        dump($tenants);

        return view('admin.tenants.index', [
            'tenants' => $tenants
        ]);
    }


    // public function show()
}
