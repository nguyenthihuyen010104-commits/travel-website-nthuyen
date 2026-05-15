<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\File; // Dùng để xóa ảnh cũ

class AdminPlaceController extends Controller
{
    // Cấp quyền dùng chung cho Controller này
    public function __construct()
    {
        // Có thể gộp check session vào middleware, nhưng theo đề ta sẽ check trực tiếp
    }

    private function checkAdmin()
    {
        if (!session('isLogin') || session('role') != 'admin') {
            abort(redirect('/login')->with('error', 'Bạn không có quyền truy cập trang quản trị'));
        }
    }

    public function index()
    {
        $this->checkAdmin();
        $places = Place::all();
        return view('admin.places.index', compact('places'));
    }

    public function create()
    {
        $this->checkAdmin();
        return view('admin.places.create');
    }

    public function store(Request $request)
    {
        $this->checkAdmin();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Place::create([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'image' => $imageName,
            'status' => $request->status ?? 1
        ]);
        return redirect('/admin/places')->with('success', 'Thêm địa điểm thành công!');
    }

    public function edit($id)
    {
        $this->checkAdmin();
        $place = Place::findOrFail($id);
        return view('admin.places.edit', compact('place'));
    }

    public function update(Request $request, $id)
    {
        $this->checkAdmin();
        $request->validate(['name' => 'required', 'description' => 'required', 'address' => 'required']);

        $place = Place::findOrFail($id);
        $imageName = $place->image;

        if ($request->hasFile('image')) {
            if ($place->image && File::exists(public_path('images/' . $place->image))) {
                File::delete(public_path('images/' . $place->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $place->update([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'image' => $imageName,
            'status' => $request->status ?? 0
        ]);
        return redirect('/admin/places')->with('success', 'Cập nhật thành công!');
    }

    public function delete($id)
    {
        $this->checkAdmin();
        $place = Place::findOrFail($id);
        if ($place->image && File::exists(public_path('images/' . $place->image))) {
            File::delete(public_path('images/' . $place->image));
        }
        $place->delete();
        return redirect('/admin/places')->with('success', 'Đã xóa địa điểm!');
    }
}
