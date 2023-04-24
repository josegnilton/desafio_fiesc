<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Observation;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user')->where('status', 'em andamento')
        ->orderBy('created_at', 'desc')
        ->paginate(6);
        $successMessage = session('success');
        return view('tasks.index', compact('tasks', 'successMessage'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string',
            'priority' => 'required|string',
        ]);

        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->type = $request->type;
        $task->priority = $request->priority;
        $task->status = 'em andamento';
        $task->user_id = auth()->id();
        $task->save();

        $request->session()->flash('success', 'A tarefa foi criada com sucesso.');

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso.');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->type = $request->input('type');
        $task->priority = $request->input('priority');
        $task->save();

        return redirect()->route('tasks.show', $task->id)->with('successMessage', 'Tarefa atualizada com sucesso.');
    }

    public function show($id)
    {
        $task = Task::with('observations.user')->findOrFail($id);

        return view('tasks.show', compact('task'));
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('successMessage', 'Tarefa deletada com sucesso.');
    }

    public function addObservation(Request $request, Task $task)
    {
        $observation = new Observation;
        $observation->text = $request->input('observation');
        $observation->created_at = now();
        $observation->task_id = $task->id;
        $observation->user_id = auth()->id();
        $observation->save();

        return redirect()->back();
    }

    public function updateObservation(Request $request, $taskId, $observationId)
    {
        $observation = Observation::where('id', $observationId)
            ->where('task_id', $taskId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $observation->text = $request->input('text');
        $observation->save();

        $task = Task::with('observations.user')->findOrFail($taskId);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'task' => $task,
            ]);
        } else {
            return redirect()->route('tasks.show', $taskId);
        }
    }

    public function assume(Task $task)
    {
        $task->user_id = Auth::id();
        $task->save();

        return redirect()->back()->with('success', 'Você assumiu a tarefa!');
    }


    public function finalize(Task $task, Request $request)
    {
        $task->status = 'finalizado';
        $task->save();

        $observation = new Observation;
        $observation->task_id = $task->id;
        $observation->user_id = auth()->id();
        $observation->text = $request->input('motivo');
        $observation->save();

        return redirect()->route('tasks.show', $task->id)->with('successMessage', 'Tarefa finalizada com sucesso!');
    }
}
