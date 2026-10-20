<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Neighbourhood</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f8f8f1;
            color: #304537;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .card {
            width: 100%;
            max-width: 440px;
            background: white;
            border: 1px solid #e6e9df;
            border-radius: 24px;
            padding: 32px;
        }

        .brand {
            color: #47785b;
            font-weight: 800;
            font-size: 14px;
            margin-bottom: 20px;
        }

        h1 {
            color: #294d38;
            font-size: 29px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #788579;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 650;
            margin-bottom: 7px;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #e6e9df;
            border-radius: 12px;
            font: inherit;
        }

        input:focus {
            outline: 2px solid #e5ecdc;
            border-color: #47785b;
        }

        .errors {
            background: #fff0ee;
            color: #b42318;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .btn {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 999px;
            background: #47785b;
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn:hover {
            background: #294d38;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 22px;
        }

        a {
            color: #47785b;
            font-weight: 700;
            text-decoration: none;
        }

        .back {
            display: block;
            margin-top: 18px;
            text-align: center;
        }
    </style>
</head>

<body>
    <main class="card">
        <div class="brand">🌿 NEIGHBOURHOOD</div>

        <h1>Welcome back</h1>
        <p class="subtitle">
            Log in to connect with your community.
        </p>

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div class="group">
                <label for="email">Email address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    required
                >
            </div>

            <div class="group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >
            </div>

            <button type="submit" class="btn">
                Log In 🌱
            </button>
        </form>

        <p class="footer">
            Don't have an account?
            <a href="{{ route('register') }}">Create account</a>
        </p>

        <a href="{{ route('home') }}" class="back">
            ← Back to homepage
        </a>
    </main>
</body>
</html>
