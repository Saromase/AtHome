<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CustomerUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $customer = $request->route()->parameters()['customer'];
        $currentCustomer = $request->session()->get('customer');
        
        if ($customer) {
            URL::defaults([
                'customer' => $customer->name,
            ]);
        }

        dump($currentCustomer, Config::get('database.connections.mysql'));
        
        
        if ($currentCustomer === null) {
            $request->session()->put('customer', $customer->name);
            DB::disconnect();
            Config::set('database.connections.mysql.database', $customer->name); 
            DB::reconnect();

        } elseif ($currentCustomer !== $customer->name) {
            $request->session()->invalidate();
            return redirect()->route(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
