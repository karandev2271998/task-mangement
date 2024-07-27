<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        $tasks = Task::where('user_id', $userId)->latest()->paginate(5);
        return view('dashboard', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //if the validation more than 3 to 4 field so then I go with the custom request
        $request->validate([
            'title' => 'required',
        ]);
        try {
            $userId = Auth::user()->id;
            $createTask = Task::create([
                'title' => $request->title,
                'user_id' => $userId,
                'description' => $request->description,
                'due_date' => $request->due_date
            ]);
            if($createTask){
                return redirect('/dashboard')->with('success', 'Task created successfully');
            }else{
                return redirect('/dashboard')->with('error', 'Something went wrong');
            }
        } catch (\Exception $e) {
            info('Exception error '. $e->getMessage());
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = $this->getTaskById($id, false);
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = $this->getTaskById($id);
        if($task){
            $task->update($request->all());
            return redirect('/dashboard')->with('success', 'Task updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $isTaskExist = $this->getTaskById($id);
            if($isTaskExist){
                $isTaskExist->delete();
                return redirect('/dashboard')->with('success', 'Task deleted successfully');
            }
        } catch (\Exception $e) {
            info('Error '. $e->getMessage());
        }
    }
    //This is functoin I can create in the helper file but just for one function I'm not follow that approach other wise common code will add in the helper.php file
    public function getTaskById($id, $isChangeDateFormat=true){
        $taskId = Crypt::decrypt($id);
        $isTaskExist = Task::findOrFail($taskId);
        if(!$isChangeDateFormat){
            // Disable accessor for the edit page
            $isTaskExist->setApplyDateFormatAccessor($isChangeDateFormat);
        }
        return $isTaskExist;
    }
}