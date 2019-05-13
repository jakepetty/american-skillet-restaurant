<?php

namespace App\Http\Controllers;

use App\MenuCategory;
use Illuminate\Http\Request;
use Image;

class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menu_categories = MenuCategory::all();
        return view('admin.menu_categories.index', compact('menu_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.menu_categories.create');
    }

    public function all()
    {
        $menu_categories = MenuCategory::all();
        if (date('H') > 13) {

            $date = 'tomorrow';
            $id = date('N') + 1;
        } else {
            $date = 'today';
            $id = date('N');
        }
        $event = \App\Event::where('id', $id)->first();
        $date = new \DateTime($date . ' ' . $event->start_time); // Date tomorrow midnight
        $special = [
            'date' => $date->format('H:i A l - d F Y'),
            'hour' => $date->format('H'),
            'minute' => $date->format('i'),
            'second' => $date->format('s'),
            'month' => $date->format('m'),
            'day' => $date->format('d'),
            'year' => $date->format('Y')
        ];
        return view('menu_categories.all', compact('menu_categories', 'special', 'event'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required'
        ]);
        $menu_category = MenuCategory::create($data);

        return redirect(route('menu_categories.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\MenuCategory  $menu_category
     * @return \Illuminate\Http\Response
     */
    public function show(MenuCategory $menu_category)
    {
        //
        return view('menu_categories.show', compact('menu_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuCategory  $menu_category
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuCategory $menu_category)
    {
        //
        return view('admin.menu_categories.edit', compact('menu_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuCategory  $menu_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuCategory $menu_category)
    {
        //
        //
        $data = $request->validate([
            'name' => 'required'
        ]);
        $data["seo_url"] = str_slug($data['name']);
        $menu_category->update($data);

        return redirect(route('menu_categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuCategory  $menu_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuCategory $menu_category)
    {
        //
        $menu_category->delete();

        return redirect(route('menu_categories.index'));
    }

    public function reorder(Request $request)
    {
        foreach ($request->order as $order) {
            $menu_category = MenuCategory::where('id', $order['id'])->first();
            $menu_category->order = $order['position'];
            $menu_category->update();
        }
        return response(['status' => 200], 200);
    }
}
