@extends('layouts.app')

@section('title', 'Add Task - MyTask')

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
        Add New Task
    </h2>

    <p>
        Create a new task and keep your day organized.
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
        action="{{ route('tasks.store') }}"
        method="POST"
    >

        @csrf

        <div class="form-group">

            <label for="task_name">
                Task Name
            </label>

            <input
                type="text"
                id="task_name"
                name="task_name"
                class="form-control"
                value="{{ old('task_name') }}"
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
            >{{ old('description') }}</textarea>

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
                        {{ old('status', 'Pending') === 'Pending'
                            ? 'selected'
                            : '' }}
                    >
                        Pending
                    </option>

                    <option
                        value="Completed"
                        {{ old('status') === 'Completed'
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
                    value="{{ old('due_date') }}"
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
                Create Task
            </button>

        </div>

    </form>

</div>

@endsection