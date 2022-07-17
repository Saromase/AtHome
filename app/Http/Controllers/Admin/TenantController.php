<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    /**
     * Listes les clients.
     */
    public function index()
    {
        return view('admin.tenants.index');
    }


    /**
     * Affiche le formulaire de création d'un client.
     */
    public function create()
    {
        return view('admin.tenants.create');
    }


    /**
     * Enregistre un client
     * @param CreateTenantRequest $request Requete.
     */
    public function store(CreateTenantRequest $request)
    {
        try {
            $tenant = Tenant::create([
                'name' => $request->input('tenant_name'),
                'id' => $request->input('tenant_id'),
                '_tenancy_db_name' => $request->input('tenant_id')
            ]);
            $tenant->domains()->create(['domain' => $request->input('tenant_subdomain') . '.' . $request->input('tenant_domain')]);

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

    /**
     * Modifie un client.
     * @param Tenant $tenant Client.
     */
    public function edit(Tenant $tenant)
    {
        return view('admin.tenants.edit', [
            'tenant' => $tenant
        ]);
    }


    /**
     * Met à jour un client
     * @param UpdateTenantRequest $request Requete.
     * @param Tenant $tenant Requete.
     */
    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        $tenant->name = $request->name;
        $tenant->save();
        $tenant->domains->first()->domain = $request->subdomain . '.' . $request->domain;
        $tenant->domains->first()->save();

        return redirect()->back()->with('success', ucfirst(__('admin.tenants.tenant_was_updated', ['name' => $request->input('name')])));
    }

    /**
     * Montre un client.
     * @param Tenant $tenant Client.
     */
    public function show(Tenant $tenant)
    {
        return view('admin.tenants.show', [
            'tenant' => $tenant,
        ]);
    }


    /**
     * Supprime un client.
     * @param Tenant $tenant Client.
     */
    public function destroy(Tenant $tenant)
    {
        $name = $tenant->name;
        $tenant->delete();
        return redirect()->route('tenants.index')->with('error', ucfirst(__('admin.tenants.tenant_was_deleted', ['name' => $name])));
    }
}
