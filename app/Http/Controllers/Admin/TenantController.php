<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTenantRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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

    public function create()
    {
        return view('admin.tenants.create');
    }

    public function store(CreateTenantRequest $request)
    {
        try {
            $tenant = Tenant::create([
                'name' => $request->input('tenant_name'),
                'id' => $request->input('tenant_id'),
                '_tenancy_db_name' => $request->input('tenant_id')
            ]);
            $tenant->domains()->create(['domain' => $request->input('tenant_domain') . '.' . $request->input('tenant_subdomain')]);

            $tenant->run(function () use ($request) {
                // $request->validate([
                //     'name' => ['required', 'string', 'max:255'],
                //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                //     'password' => ['required', 'confirmed', Password::defaults()],
                // ]);

                User::create([
                    'name' => $request->input('administrator_name'),
                    'email' => $request->input('administrator_email'),
                    'password' => Hash::make($request->input('administrator_password'))
                ]);
            });
        } catch (\Throwable $th) {
            dd($th);
            return back()->with('errors', ucfirst(__('ajout impossible') . ' ' . $th->getMessage()));
        }


        
        return redirect()->route('tenants.index')->with('success', ucfirst(__('admin.tenants.tenant_was_added', ['name' => $request->input('tenant_name')])));

    }
    


    // public function show()é
}
