<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Tanants extends Controller
{
    public function index(Request $request)
    {
        $q = Tenant::query()->with('room');

        // ✅ date filter (start_date)
        if ($request->filled('from_date')) {
            $q->whereDate('start_date', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $q->whereDate('start_date', '<=', $request->to_date);
        }

        // ✅ search
        if ($request->filled('search')) {
            $s = trim($request->search);

            $q->where(function ($qq) use ($s) {
                $qq->where('full_name', 'like', "%{$s}%")
                    ->orWhere('phone_number', 'like', "%{$s}%")
                    ->orWhere('email', 'like', "%{$s}%")
                    ->orWhere('payment_term', 'like', "%{$s}%")
                    ->orWhereHas('room', function ($r) use ($s) {
                        // TODO: កែ field តាម rooms table របស់អ្នក
                        $r->where('room_no', 'like', "%{$s}%")
                            ->orWhere('floor', 'like', "%{$s}%");
                    });
            });
        }

        $perPage = (int) ($request->per_page ?? 10);
        $perPage = in_array($perPage, [10, 25, 50]) ? $perPage : 10;

        $tenants = $q->orderByDesc('tenant_id')->paginate($perPage)->withQueryString();

        return view('tenants.tenants', compact('tenants'));
    }

    public function createblade()
    {
        // ✅ only show available rooms (កែ query តាម rooms schema របស់អ្នក)
        $rooms = Room::query()
            ->orderBy('room_no')
            ->get();

        return view('tenants.tenants_create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name'     => ['required', 'string', 'max:255'],
            'phone_number'  => ['required', 'string', 'max:50'],
            'age'           => ['nullable', 'integer', 'min:0'],
            'email'         => ['nullable', 'email', 'max:255'],
            'password'      => ['nullable', 'string', 'min:6'],
            'room_id'       => ['required', 'integer'],
            'start_date'    => ['required', 'date'],
            'end_date'      => ['nullable', 'date', 'after_or_equal:start_date'],
            'payment_term'  => ['required', 'string', 'max:50'],
        ]);

        // ✅ set default
        $data['status'] = 'Active';

        // ✅ hash password if provided
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = null;
        }

        $tenant = Tenant::create($data);

        // OPTIONAL: បើអ្នកមាន field room status => set occupied here
        // Room::where('id', $data['room_id'])->update(['status' => 'Occupied']);

        return redirect()->route('tanants.index')->with('success', 'Tenant created successfully.');
    }

    public function show(Tenant $tenant)
    {
        $tenant->load('room');
        return view('tenants.tenants_show', compact('tenant'));
    }

    public function edit(Tenant $tenant)
    {
        $tenant->load('room');

        $rooms = Room::query()
            ->orderBy('room_no')
            ->get();

        return view('tenants.tenants_edit', compact('tenant', 'rooms'));
    }

    public function update(Request $request, Tenant $tenant)
    {
        $data = $request->validate([
            'full_name'     => ['required', 'string', 'max:255'],
            'phone_number'  => ['required', 'string', 'max:50'],
            'age'           => ['nullable', 'integer', 'min:0'],
            'email'         => ['nullable', 'email', 'max:255'],
            'password'      => ['nullable', 'string', 'min:6'],
            'room_id'       => ['required', 'integer'],
            'start_date'    => ['required', 'date'],
            'end_date'      => ['nullable', 'date', 'after_or_equal:start_date'],
            'status'        => ['required', 'in:Active,Past,Evicted'],
            'payment_term'  => ['required', 'string', 'max:50'],
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // ✅ keep old password
        }

        $tenant->update($data);

        return redirect()->route('tanants.index')->with('success', 'Tenant updated successfully.');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tanants.index')->with('success', 'Tenant deleted successfully.');
    }
}
