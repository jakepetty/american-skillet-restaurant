<?php

namespace App\Http\Controllers;

use App\MenuItem;
use Illuminate\Http\Request;
use App\MenuCategory;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $html = file_get_contents('https://american-skillet.vexcon.net/');

        // $dom = new \DomDocument();
        // $dom->preserveWhiteSpace = false;

        // libxml_use_internal_errors(true);
        // $dom->loadHTML($html);
        // libxml_clear_errors();
        // $path = new \DomXPath($dom);
        // $details = $path->query('//details');
        // $data = [];
        // for ($i = 0; $i < $details->length; $i++) {
        //     $detail = $details->item($i);
        //     $summary = $path->query("./summary", $detail)->item(0);
        //     $price =  $path->query("./strong", $summary)->item(0);
        //     $name = trim(str_replace($price->nodeValue, '', $summary->nodeValue));
        //     $price = str_replace('$', null, $price->nodeValue);
        //     $p = @trim($path->query("./p", $detail)->item(0)->nodeValue);
        //     $category_id = 1;
        //     if ($p) {
        //         $caption = trim(implode(' ', explode("\n", $p)));
        //         if (!stristr($price, '-') && !stristr($price, '·')) {
        //             MenuItem::create(compact('name','category_id', 'price', 'caption'));
        //         }
        //     }
        // }
        //
        $menu_items = MenuItem::all();

        return view('admin.menu_items.index', compact('menu_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = MenuCategory::all()->pluck('name', 'id')->toArray();

        return view('admin.menu_items.create', compact('categories'));
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
            'name' => 'required',
            'menu_category_id' => 'required|numeric',
            'price' => 'required|numeric',
            'caption' => 'required'
        ]);
        $menu_item = MenuItem::create($data);

        return redirect(route('menu_items.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\MenuItem  $menu_item
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menu_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuItem  $menu_item
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menu_item)
    {
        //
        return view('admin.menu_items.edit', compact('menu_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuItem  $menu_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItem $menu_item)
    {
        //
        //
        $data = $request->validate([
            'name' => 'required',
            'menu_category_id' => 'required|numeric',
            'price' => 'required|numeric',
            'caption' => 'required'
        ]);
        $menu_item->update($data);

        return redirect(route('menu_items.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuItem  $menu_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menu_item)
    {
        //
        $menu_item->delete();

        return redirect(route('menu_items.index'));
    }

    public function reorder(Request $request)
    {
        foreach ($request->order as $order) {
            $menu_item = MenuItem::where('id', $order['id'])->first();
            $menu_item->order = $order['position'];
            $menu_item->update();
        }
        return response(['status' => 200], 200);
    }
}
