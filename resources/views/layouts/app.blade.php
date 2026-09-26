<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Personal Task Manager')
    </title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background:
                linear-gradient(
                    135deg,
                    #f8f5ff,
                    #eee7ff
                );
            color: #2d2140;
            min-height: 100vh;
        }

        .navbar {
            background:
                linear-gradient(
                    135deg,
                    #5b21b6,
                    #7c3aed,
                    #9333ea
                );

            color: white;
            padding: 18px 40px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            box-shadow:
                0 8px 24px
                rgba(91, 33, 182, 0.20);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 13px;
            background:
                rgba(255, 255, 255, 0.18);

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 20px;
            border:
                1px solid
                rgba(255, 255, 255, 0.22);
        }

        .brand-text h1 {
            font-size: 20px;
            letter-spacing: 0.4px;
        }

        .brand-text p {
            font-size: 11px;
            opacity: 0.78;
            margin-top: 2px;
        }

        .nav-badge {
            background:
                rgba(255, 255, 255, 0.15);

            padding: 9px 15px;
            border-radius: 50px;

            font-size: 12px;
            font-weight: bold;

            border:
                1px solid
                rgba(255, 255, 255, 0.20);
        }

        .page-wrapper {
            width: min(
                1180px,
                calc(100% - 40px)
            );

            margin: 34px auto;
        }

        .success-message {
            background: #ecfdf5;
            color: #047857;

            border:
                1px solid
                #a7f3d0;

            padding: 14px 18px;
            border-radius: 14px;

            margin-bottom: 20px;

            font-size: 14px;
            font-weight: bold;

            box-shadow:
                0 6px 20px
                rgba(16, 185, 129, 0.08);
        }

        .page-card {
            background:
                rgba(255, 255, 255, 0.88);

            border-radius: 22px;

            border:
                1px solid
                #e9ddff;

            box-shadow:
                0 18px 50px
                rgba(92, 45, 145, 0.10);
        }

        .btn {
            display: inline-block;

            padding: 11px 18px;

            border: none;
            border-radius: 12px;

            text-decoration: none;

            font-size: 13px;
            font-weight: bold;

            cursor: pointer;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                opacity 0.2s ease;
        }

        .btn:hover {
            transform:
                translateY(-1px);
        }

        .btn-primary {
            color: white;

            background:
                linear-gradient(
                    135deg,
                    #7c3aed,
                    #a855f7
                );

            box-shadow:
                0 8px 18px
                rgba(124, 58, 237, 0.22);
        }

        .btn-light {
            background: #f3e8ff;
            color: #6b21a8;
        }

        .btn-danger {
            background: #fee2e2;
            color: #b91c1c;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px;

            border-radius: 12px;

            border:
                1px solid
                #ddd0f7;

            background: #ffffff;
            color: #2d2140;

            font-size: 14px;
            outline: none;
        }

        .form-control:focus {
            border-color: #8b5cf6;

            box-shadow:
                0 0 0 4px
                rgba(139, 92, 246, 0.10);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 115px;
        }

        label {
            display: block;
            margin-bottom: 7px;

            color: #4c356c;

            font-size: 13px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .error-box {
            background: #fff1f2;
            color: #be123c;

            border:
                1px solid
                #fecdd3;

            border-radius: 13px;

            padding: 14px 18px;
            margin-bottom: 20px;
        }

        .error-box ul {
            padding-left: 20px;
        }

        .error-box li {
            margin: 5px 0;
            font-size: 13px;
        }

        .footer {
            text-align: center;

            color: #8b77a8;

            font-size: 12px;

            padding: 18px 20px 28px;
        }

        @media (max-width: 700px) {
            .navbar {
                padding: 16px 20px;
            }

            .nav-badge {
                display: none;
            }

            .page-wrapper {
                width:
                    calc(100% - 24px);

                margin: 22px auto;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="brand">

            <div class="brand-icon">
                ✓
            </div>

            <div class="brand-text">

                <h1>
                    MyTask
                </h1>

                <p>
                    Personal Task Manager
                </p>

            </div>

        </div>

        <div class="nav-badge">
            ORGANIZE • PLAN • COMPLETE
        </div>

    </nav>

    <main class="page-wrapper">

        @if (session('success'))

            <div class="success-message">
                {{ session('success') }}
            </div>

        @endif

        @yield('content')

    </main>

    <footer class="footer">

        Personal Task Manager
        • Laravel Project

    </footer>

</body>

</html>