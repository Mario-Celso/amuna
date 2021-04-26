<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\ToolTag;
use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ToolController extends Controller
{
    public function index(Request $request)
    {
        $tools = Tool::where('deleted_at',null)
            ->orderBy('id', 'asc');

        $tag = $request->get('tag');
        if ($tag) {
            $tools->whereHas('tagsNode', function ($query) use ($tag) {
                return $query->where('tag', '=', $tag);
            });
        }

        return response()->json($tools->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $tool = Tool::where('id',$id)
            ->get();
        return response()->json($tool);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $tool = new Tool;
        $tool->title = $request->title;
        $tool->link = $request->link;
        $tool->description = $request->description;
        $tool->save();

        foreach ($request->tags as $tag) {
            $newTag = new ToolTag;
            $newTag->tag = $tag;
            $newTag->tool_id = $tool->id;
            $newTag->save();
        }

        return response()->json($tool);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $tool = Tool::findOrFail($id);
        $tool->title = $request->title;
        $tool->link = $request->link;
        $tool->description = $request->description;

        foreach ($tool->tagsNode as $tag){
            $tag->delete();
        }
        $tool->save();
        foreach ($request->tags as $t) {
            $newTag = new ToolTag;
            $newTag->tag = $t;
            $newTag->tool_id = $tool->id;
            $newTag->save();
        }

        return response()->json($tool);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $tool = Tool::findOrFail($id);

        if (!is_null($tool->deleted_at)){
            $tool->deleted_at = null;
            $tool->save();
            return response()->json('Reativado');
        }else{
            $tool->deleted_at = new DateTime();
            $tool->save();
            return response()->json('Deletado com sucesso');
        }
    }
}
