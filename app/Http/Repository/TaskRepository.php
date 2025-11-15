<?php 
namespace App\Http\Repository;
use App\Models\Task;
use Illuminate\Support\Str;

interface TaskRepositoryInterface {
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}

class TaskRepository implements TaskRepositoryInterface
{
    public function all()
    {
        return Task::all();
    }

    public function find($id)
    {
        return Task::find($id);
    }

    public function create(array $data)
    {
        $ulid = Str::ulid();

        $taskInfo = Task::create([
            'TaskId'   => $ulid,
            'TaskName' => $data['TaskName'],
            'TaskPrio' => $data['TaskPrio'],
            'TaskDiff' => $data['TaskDiff'],
        ]);

        return $taskInfo;
    }

    public function update($id, array $data)
    {
        $taskId = Task::findOrFail($id);

        $taskInfo = $taskId->update([
            'TaskName' => $data['TaskName'],
            'TaskPrio' => $data['TaskPrio'],
            'TaskDiff' => $data['TaskDiff'],
        ]);

        return $taskInfo;
    }

    public function delete($id){
        $taskId = Task::findOrFail($id);

        $delete = Task::withTrashed()
            ->where('id', $taskId->id)
            ->get();
        
        return $delete;
    }
}