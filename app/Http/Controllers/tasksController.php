<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\task;   // 2017/06/21 追加

class tasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = task::paginate(3)
                ->orderBy('id','asc')
                ->get();

        return view('tasks.index', ['tasks' => $tasks, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new task;

        return view('tasks.create', ['task' => $task, ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:10',      // 2017/06/22 追加
            'content' => 'required|max:255',    // 2017/06/22 追加
        ]);

        $request->user()->tasks()->create([     // 2017/06/30 create方式に変更
            'content' => $request->content,
            'status' => $request->status,
            'user_id' => $request->user_id,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = task::find($id);

        return view('tasks.show', ['task' => $task, ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = task::find($id);

        return view('tasks.edit', ['task' => $task, ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|max:10',      // 2017/06/22 追加
            'content' => 'required|max:255',    // 2017/06/22 追加
        ]);

        $request->user()->tasks()->where('id', $id)->update([     // 2017/06/30 update方式に変更
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = task::find($id);
        $task->delete();

        return redirect('/');
    }
}
