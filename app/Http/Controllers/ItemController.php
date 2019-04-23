<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }
    public function create()
    {
        $categories = Category::listOfOptions();

        return view('items.create', compact('categories'));

    }
    public function store(Request $request)
    {
        $messages = [
            'required' => '骨の入力は必須です',
            'unique'=> '同じ骨は納骨できません',
            'max'=>'2文字以下の骨で登録してください'
        ];

        Validator::make($request->all(), [
            'name' => 'required|unique:items|max:1',
        ],$messages)->validate();


        $category = Category::find($request->input('category_id'));

        $category->items()->create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('items.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::listOfOptions();

        return view('items.edit', compact('item', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item->name = $request->input('name');

        $category = Category::find($request->input('category_id'));

        $category->items()->save($item);


        return redirect()->route('items.index');

    }
    public function update2(Request $request, Category $category)
    {
        $category->update([
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('items.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index');

    }


}
