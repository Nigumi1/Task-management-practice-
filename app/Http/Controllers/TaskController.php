<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\TaskRepository;
use App\Http\Repository\TaskRepositoryInterface;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Database\QueryException;

class TaskController extends Controller
{
    protected $task;

    public function __construct(TaskRepositoryInterface $task)
    {
        $this->task = $task;
    }

    public function fetchTasks()
    {
        try {
            $result = $this->task->all();
            $response = [
                'data'   => $result,
                'isSuccess' => true,
                'message' => 'Tasks fetched successfully.',
            ];
            return response()->json($response, 200);
        } catch (QueryException $e) {
            $response = [
                'data'   => [],
                'isSuccess'  => false,
                'message' => 'Failed to fetch tasks.' . $e->getMessage(),
            ];
            return response()->json($response, 500);
        } catch (\Exception $e) {
            $response = [
                'data'   => [],
                'isSuccess'  => false,
                'message' => 'An unexpected error occurred.' . $e->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function fetchTaskItem($id)
    {
        try {
            $result = $this->task->find($id);
            $response = [
                'data'   => $result,
                'isSuccess'  => true,
                'message' => 'Task item fetched successfully.',
            ];
            return response()->json($response, 200);
        } catch (QueryException $e) {
            $response = [
                'data'   => [],
                'isSuccess'  => false,
                'message' => 'Failed to fetch tasks.' . $e->getMessage(),
            ];
            return response()->json($response, 500);
        } catch (\Exception $e) {
            $response = [
                'data'   => [],
                'isSuccess'  => false,
                'message' => 'An unexpected error occurred.' . $e->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function storeTask(StoreTaskRequest $request) {
        try {
            $result = $this->task->create($request->validated());
            $response = [
                'data'   => $result,
                'isSuccess'  => true,
                'message' => 'Task item added successfully.',
            ];
            return response()->json($response, 200);
        } catch (QueryException $e) {
            $response = [
                'data'   => [],
                'isSuccess'  => false,
                'message' => 'Failed to fetch tasks.' . $e->getMessage(),
            ];
            return response()->json($response, 500);
        } catch (\Exception $e) {
            $response = [
                'data'   => [],
                'isSuccess'  => false,
                'message' => 'An unexpected error occurred.' . $e->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function updateTask(StoreTaskRequest $request, $id) {
        try {
            $result = $this->task->update($id, $request->validated());
            $response = [
                'data'   => $result,
                'isSuccess'  => true,
                'message' => 'Task item updated successfully.',
            ];
            return response()->json($response, 200);
        } catch (QueryException $e) {
            $response = [
                'data'   => [],
                'isSuccess'  => false,
                'message' => 'Failed to fetch tasks.' . $e->getMessage(),
            ];
            return response()->json($response, 500);
        } catch (\Exception $e) {
            $response = [
                'data'   => [],
                'isSuccess'  => false,
                'message' => 'An unexpected error occurred.' . $e->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function deleteTask($id) {
        try {
            $result = $this->task->delete($id);
            $response = [
                'data'   => $result,
                'isSuccess'  => true,
                'message' => 'Task item deleted successfully.',
            ];
            return response()->json($response, 200);

        } catch (QueryException $e) {
            $response = [
                'data'   => [],
                'isSuccess'  => false,
                'message' => 'Failed to fetch tasks.' . $e->getMessage(),
            ];
            return response()->json($response, 500);
        } catch (\Exception $e) {
            $response = [
                'data'   => [],
                'isSuccess'  => false,
                'message' => 'An unexpected error occurred.' . $e->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
}
