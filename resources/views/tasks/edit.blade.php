@extends('layouts.app')

@section('title', 'Edit Task - MyTask')

@section('content')

<style>
    .form-header {
        margin-bottom: 22px;
    }

    .form-header h2 {
        color: #3b1d5c;
        font-size: 28px;
        margin-bottom: 6px;
    }

    .form-header p {
        color: #8b77a8;
        font-size: 14px;
    }

    .form-card {
        max-width: 760px;
        margin: 0 auto;
        padding: 28px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 24px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    @media (max-width: 700px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="form-header">

    <h2>
        Edit Task
    </h2>

    <p>
        Update the task details below.
    </p>

</div>

<div class="page-card form-card">

    @if ($errors->any())

        <div class="error-box">

            <ul>
                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach
            </ul>

        </div>

    @endif

    <form
        action="{{ route('tasks.update', $task) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="form-group">

            <label for="task_name">
                Task Name
            </label>

            <input
                type="text"
                id="task_name"
                name="task_name"
                class="form-control"
                value="{{ old('task_name', $task->task_name) }}"
                placeholder="Enter task name"
                required
            >

        </div>

        <div class="form-group">

            <label for="description">
                Description
            </label>

            <textarea
                id="description"
                name="description"
                class="form-control"
                placeholder="Enter task description"
            >{{ old('description', $task->description) }}</textarea>

        </div>

        <div class="form-grid">

            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                    class="form-control"
                    required
                >

                    <option
                        value="Pending"
                        {{ old('status', $task->status) === 'Pending'
                            ? 'selected'
                            : '' }}
                    >
                        Pending
                    </option>

                    <option
                        value="Completed"
                        {{ old('status', $task->status) === 'Completed'
                            ? 'selected'
                            : '' }}
                    >
                        Completed
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label for="due_date">
                    Due Date
                </label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    class="form-control"
                    value="{{ old(
                        'due_date',
                        $task->due_date->format('Y-m-d')
                    ) }}"
                    required
                >

            </div>

        </div>

        <div class="form-actions">

            <a
                href="{{ route('tasks.index') }}"
                class="btn btn-light"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Save Changes
            </button>

        </div>

    </form>

</div>

@endsection