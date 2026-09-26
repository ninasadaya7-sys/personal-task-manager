@extends('layouts.app')

@section('title', 'MyTask Dashboard')

@section('content')

@php
    $totalTasks = $tasks->count();

    $pendingTasks = $tasks
        ->where('status', 'Pending')
        ->count();

    $completedTasks = $tasks
        ->where('status', 'Completed')
        ->count();
@endphp

<style>
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 20px;

        margin-bottom: 24px;
    }

    .dashboard-title h2 {
        color: #3b1d5c;

        font-size: 30px;

        margin-bottom: 6px;
    }

    .dashboard-title p {
        color: #8b77a8;

        font-size: 14px;
    }

    .stats-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 18px;

        margin-bottom: 24px;
    }

    .stat-card {
        padding: 22px;

        background:
            rgba(255, 255, 255, 0.92);

        border-radius: 20px;

        border:
            1px solid
            #e8dcfa;

        box-shadow:
            0 12px 35px
            rgba(93, 57, 145, 0.08);
    }

    .stat-label {
        color: #8b77a8;

        font-size: 12px;
        font-weight: bold;

        text-transform: uppercase;

        letter-spacing: 0.8px;
    }

    .stat-number {
        margin-top: 10px;

        font-size: 32px;
        font-weight: bold;
    }

    .total-number {
        color: #7c3aed;
    }

    .pending-number {
        color: #d97706;
    }

    .completed-number {
        color: #16a34a;
    }

    .task-section {
        padding: 24px;
    }

    .task-section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 20px;
    }

    .task-section-header h3 {
        color: #43275f;

        font-size: 20px;
    }

    .task-list {
        display: grid;
        gap: 14px;
    }

    .task-card {
        display: grid;

        grid-template-columns:
            1fr auto;

        gap: 20px;

        padding: 18px 20px;

        border-radius: 16px;

        background: #ffffff;

        border:
            1px solid
            #eee5fb;

        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }

    .task-card:hover {
        transform:
            translateY(-2px);

        box-shadow:
            0 12px 25px
            rgba(93, 57, 145, 0.10);
    }

    .task-name {
        color: #3d2457;

        font-size: 17px;
        font-weight: bold;

        margin-bottom: 7px;
    }

    .task-description {
        color: #7d6a96;

        font-size: 13px;

        line-height: 1.5;

        margin-bottom: 10px;
    }

    .task-meta {
        display: flex;

        gap: 10px;

        flex-wrap: wrap;

        align-items: center;
    }

    .status {
        padding: 5px 10px;

        border-radius: 50px;

        font-size: 11px;
        font-weight: bold;
    }

    .status-pending {
        background: #fff7ed;
        color: #c2410c;
    }

    .status-completed {
        background: #ecfdf5;
        color: #15803d;
    }

    .due-date {
        color: #8b77a8;

        font-size: 12px;
    }

    .task-actions {
        display: flex;

        flex-direction: column;

        gap: 8px;

        min-width: 145px;
    }

    .task-actions .btn {
        text-align: center;
        width: 100%;
    }

    .status-button {
        border: none;

        background: #ede9fe;

        color: #6d28d9;

        padding: 9px 12px;

        border-radius: 10px;

        cursor: pointer;

        font-size: 12px;
        font-weight: bold;
    }

    .empty-state {
        text-align: center;

        padding: 55px 20px;

        color: #8b77a8;
    }

    .empty-icon {
        font-size: 42px;

        margin-bottom: 12px;
    }

    .empty-state h3 {
        color: #5f437a;

        margin-bottom: 7px;
    }

    @media (max-width: 800px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .dashboard-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .task-card {
            grid-template-columns: 1fr;
        }

        .task-actions {
            flex-direction: row;
            flex-wrap: wrap;
        }
    }
</style>

<div class="dashboard-header">

    <div class="dashboard-title">

        <h2>
            My Tasks
        </h2>

        <p>
            Stay organized and keep track
            of everything you need to complete.
        </p>

    </div>

    <a
        href="{{ route('tasks.create') }}"
        class="btn btn-primary"
    >
        + Add New Task
    </a>

</div>

<div class="stats-grid">

    <div class="stat-card">

        <div class="stat-label">
            Total Tasks
        </div>

        <div class="stat-number total-number">
            {{ $totalTasks }}
        </div>

    </div>

    <div class="stat-card">

        <div class="stat-label">
            Pending
        </div>

        <div class="stat-number pending-number">
            {{ $pendingTasks }}
        </div>

    </div>

    <div class="stat-card">

        <div class="stat-label">
            Completed
        </div>

        <div class="stat-number completed-number">
            {{ $completedTasks }}
        </div>

    </div>

</div>

<div class="page-card task-section">

    <div class="task-section-header">

        <h3>
            Task List
        </h3>

    </div>

    <div class="task-list">

        @forelse ($tasks as $task)

            <div class="task-card">

                <div>

                    <div class="task-name">
                        {{ $task->task_name }}
                    </div>

                    @if ($task->description)

                        <div class="task-description">
                            {{ $task->description }}
                        </div>

                    @endif

                    <div class="task-meta">

                        @if ($task->status === 'Completed')

                            <span
                                class="status status-completed"
                            >
                                Completed
                            </span>

                        @else

                            <span
                                class="status status-pending"
                            >
                                Pending
                            </span>

                        @endif

                        <span class="due-date">

                            Due:
                            {{ $task->due_date->format('M d, Y') }}

                        </span>

                    </div>

                </div>

                <div class="task-actions">

                    <a
                        href="{{ route('tasks.edit', $task) }}"
                        class="btn btn-light"
                    >
                        Edit Task
                    </a>

                    <form
                        action="{{ route('tasks.status', $task) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PATCH')

                        <input
                            type="hidden"
                            name="status"
                            value="{{ $task->status === 'Pending'
                                ? 'Completed'
                                : 'Pending' }}"
                        >

                        <button
                            type="submit"
                            class="status-button"
                        >

                            {{ $task->status === 'Pending'
                                ? 'Mark Completed'
                                : 'Mark Pending' }}

                        </button>

                    </form>

                    <form
                        action="{{ route('tasks.destroy', $task) }}"
                        method="POST"
                        onsubmit="
                            return confirm(
                                'Are you sure you want to delete this task?'
                            );
                        "
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger"
                        >
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="empty-state">

                <div class="empty-icon">
                    ✓
                </div>

                <h3>
                    No tasks yet
                </h3>

                <p>
                    Add your first task
                    to start organizing your day.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection