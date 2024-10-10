<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Bulletin;

class BulletinController extends Controller
{
    private static function validate_(Request $request)
    {
        return Validator::make($request->all(), [
            'type' => 'required|string|max:10',
            'title' => 'required|string|max:100',
            'contents' => 'required|string|max:1000'
        ]);
    }

    public function index()
    {
        $bulletins = Bulletin::all()->sortBy('updated_at', descending: true)->map(function ($bulletin) {
            $bulletin->type_chinese = Bulletin::getTypeToChinese($bulletin->type);
            return $bulletin;
        });

        return view('bulletin.list', ['bulletins' => $bulletins]);
    }

    public function create()
    {
        return view('bulletin.add');
    }

    public function store(Request $request)
    {
        $validator = $this->validate_($request);

        if($validator->fails())
        {
            return redirect('/')->with('fail', '公告新增失敗：<br />' . implode('<br />', $validator->messages()->all()));
        }
        else
        {
            $newBulletin = Bulletin::create([
                'type' => $request->type,
                'title' => $request->title,
                'content' => $request->contents
            ]);

            if($newBulletin)
            {
                return redirect('/')->with('success', '公告「' . $newBulletin->title . '」已新增');
            }
            else
            {
                return redirect('/')->with('fail', '公告 ' . $newBulletin->title . ' 新增失敗');
            }
        }
    }

    public function show(int $id)
    {
        $bulletin = Bulletin::find($id);

        if($bulletin)
        {
            $bulletin->type_chinese = Bulletin::getTypeToChinese($bulletin->type);
        }

        return view('bulletin.show', ['bulletin' => $bulletin]);
    }

    public function edit(int $id)
    {
        $bulletin = Bulletin::find($id);

        if($bulletin)
        {
            $bulletin->type_chinese = Bulletin::getTypeToChinese($bulletin->type);
        }

        return view('bulletin.edit', ['bulletin' => $bulletin]);
    }

    public function update(Request $request, int $id)
    {
        $validator = $this->validate_($request);

        if($validator->fails())
        {
            return redirect()->back()->with('fail', '公告編輯失敗：<br />' . implode('<br />', $validator->messages()->all()));
        }
        else
        {
            $bulletin = Bulletin::find($id);

            if($bulletin)
            {
                $bulletin->update([
                    'type' => $request->type,
                    'title' => $request->title,
                    'content' => $request->contents
                ]);

                return redirect("/$id")->with('success', '公告「' . $bulletin->title . '」已編輯');
            }
            else
            {
                return redirect()->back()->with('fail', '公告編輯失敗：該則公告不存在，因此無法編輯');
            }
        }
    }

    public function delete_confirm(int $id)
    {
        $bulletin = Bulletin::find($id);

        if($bulletin)
        {
            $bulletin->type_chinese = Bulletin::getTypeToChinese($bulletin->type);
        }

        return view('bulletin.delete', ['bulletin' => $bulletin]);
    }

    public function delete(int $id)
    {
        $bulletin = Bulletin::find($id);

        if($bulletin)
        {
            $bulletin->delete();
        }

        return redirect('/');
    }
}
