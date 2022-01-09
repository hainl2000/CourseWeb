<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class CategoryController extends Controller
{
    //
    public function getListCategories(Request $request)
    {   
        $lists = array();
        $listCategories = Category::all();
        foreach($listCategories as $category)
        {   
            // echo $category->Category_ID;
            $listTags = Tag::where('Category_ID','=',$category->Category_ID)->get();
            $list = array('category'=>$category,'tags'=>$listTags);
            array_push($lists,$list);
        }
        // echo $listCategories;
        return response()->json($lists,200);
    }
}
