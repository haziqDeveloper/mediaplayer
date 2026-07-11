<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <style>
        body {
            align-items: center;
            background: #f4f6f8;
            color: #1f2937;
            display: flex;
            font-family: Arial, sans-serif;
            justify-content: center;
            margin: 0;
            min-height: 100vh;
        }

        .auth-panel {
            background: #fff;
            border: 1px solid #dfe3e8;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            max-width: 420px;
            padding: 32px;
            width: 100%;
        }

        h1 {
            font-size: 24px;
            margin: 0 0 24px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin: 16px 0 6px;
        }

        input {
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
            padding: 11px 12px;
            width: 100%;
        }

        button {
            background: #2563eb;
            border: 0;
            border-radius: 6px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            font-weight: 700;
            margin-top: 24px;
            padding: 12px 16px;
            width: 100%;
        }

        .error {
            color: #b91c1c;
            font-size: 13px;
            margin-top: 6px;
        }

        .footer-link {
            margin-top: 18px;
            text-align: center;
        }

        a {
            color: #2563eb;
        }
    </style>
</head>
<body>
    <main class="auth-panel">
        <h1>Create account</h1>

        <form method="POST" action="{{ route('register.custom') }}">
            @csrf

            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Register</button>
        </form>

        <div class="footer-link">
            <a href="{{ route('login') }}">Back to login</a>
        </div>
    </main>
</body>
</html>
