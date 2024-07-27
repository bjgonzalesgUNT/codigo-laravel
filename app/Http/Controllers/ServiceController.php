<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    public function index(): View
    {

        $services = Service::paginate(10);

        return view("services.index", ['services' => $services]);
    }

    public function create(): View
    {
        return view('services.create', ['service' => new Service()]);
    }

    public function store(ServiceRequest $request)
    {
        $newServie = new Service();

        $newServie->title = $request->title;
        $newServie->description = $request->description;

        $newServie->image = $request->file('image')->store('services', 'public');

        $newServie->save();

        return redirect()->route('services.index')->with('status', 'service created successfully');
    }

    public function show(Service $service)
    {
        return view('services.show', ['service' => $service]);
    }

    public function edit(Service $service): View
    {
        return view('services.edit', ['service' => $service]);
    }

    public function update(ServiceRequest $request, Service $service)
    {

        if ($request->hasFile('image')) {
            Storage::delete($service->image);
            $service->fill($request->validated());
            $service->image = $request->file('image')->store('services', 'public');
            $service->save();
        } else {
            $service->update(array_filter($request->validated()));
        }

        return redirect()->route('services.index')->with('status', 'service updated successfully');
    }

    public function destroy(Service $service)
    {
        Storage::delete($service->image);
        $service->delete();
        return redirect()->route('services.index')->with('status', 'service deleted successfully');
    }
}
