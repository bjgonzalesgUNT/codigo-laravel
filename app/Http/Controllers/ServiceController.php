<?php

namespace App\Http\Controllers;

use App\Events\ServiceSaved;
use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    public function index(): View
    {

        $services = Service::paginate(10);

        return view("services.index", compact("services"));
    }

    public function create(): View
    {
        $service = new Service();
        $categories = Category::all(['id', 'name']);
        return view('services.create', compact('service', 'categories'));
    }

    public function store(ServiceRequest $request)
    {
        $newService = new Service();

        $newService->title = $request->title;
        $newService->description = $request->description;
        $newService->category_id = $request->category_id;

        $newService->image = $request->file('image')->store('services', 'public');

        $newService->save();

        $manager = new ImageManager(new Driver());

        $image = $manager->read(public_path('storage/' . $newService->image))->scale(width: 600, height: 600)->colorize(0, 0, 0)->encode();

        Storage::put($newService->image, (string) $image);

        ServiceSaved::dispatch($newService);

        return redirect()->route('services.index')->with('status', 'service created successfully');
    }

    public function show(Service $service)
    {
        $categories = Category::all(['name', 'id']);
        return view('services.show', compact('service', 'categories'));
    }

    public function edit(Service $service): View
    {
        $categories = Category::all(['name', 'id']);
        return view('services.edit', compact('service', 'categories'));
    }

    public function update(ServiceRequest $request, Service $service)
    {

        if ($request->hasFile('image')) {
            Storage::delete($service->image);
            $service->fill($request->validated());
            $service->image = $request->file('image')->store('services', 'public');

            $manager = new ImageManager(new Driver());

            $image = $manager->read(public_path('storage/' . $service->image))->scale(width: 600, height: 600)->colorize(0, 0, 0)->encode();

            Storage::put($service->image, (string) $image);

            $service->save();
        } else {
            $service->update(array_filter($request->validated()));
        }

        ServiceSaved::dispatch($service);

        return redirect()->route('services.index')->with('status', 'service updated successfully');
    }

    public function destroy(Service $service)
    {
        Storage::delete($service->image);
        $service->delete();
        return redirect()->route('services.index')->with('status', 'service deleted successfully');
    }
}
