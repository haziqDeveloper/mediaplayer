<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <style>
        body {
            background: #f4f6f8;
            color: #1f2937;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        header {
            align-items: center;
            background: #fff;
            border-bottom: 1px solid #dfe3e8;
            display: flex;
            justify-content: space-between;
            padding: 16px 24px;
        }

        main {
            margin: 32px auto;
            max-width: 960px;
            padding: 0 24px;
        }

        h1 {
            font-size: 26px;
            margin: 0;
        }

        .panel {
            background: #fff;
            border: 1px solid #dfe3e8;
            border-radius: 8px;
            padding: 24px;
        }

        a {
            color: #2563eb;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dashboard</h1>
        <a href="{{ route('signout') }}">Sign out</a>
    </header>

    <main>
        <section class="panel">
            <p>Signed in as {{ auth()->user()->name ?? auth()->user()->email ?? 'user' }}.</p>
        </section>
    </main>
</body>
</html>
