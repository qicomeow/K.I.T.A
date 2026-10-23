<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | K.I.T.A.</title>

    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --forest: #284b39;
            --green: #47785b;
            --sage: #a9c5a9;
            --mint: #e6f0e4;
            --cream: #f8f7ef;
            --white: #ffffff;
            --text: #283e30;
            --muted: #819084;
            --border: #dfe8dc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            min-height: 100dvh;
            background: var(--forest);
            color: var(--text);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 35px;
            overflow-x: hidden;
        }

        /* BACKGROUND DECORATION */

        .background-shape {
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
            opacity: .15;
            background: #b6dbc2;
            filter: blur(2px);
        }

        .shape-one {
            width: 450px;
            height: 450px;
            top: -250px;
            right: -100px;
        }

        .shape-two {
            width: 350px;
            height: 350px;
            bottom: -200px;
            left: -120px;
        }

        /* MAIN LAYOUT */

        .login-container {
            width: 100%;
            max-width: 1120px;
            min-height: 650px;
            display: grid;
            grid-template-columns: 1.08fr .92fr;
            background: var(--white);
            border-radius: 35px;
            overflow: hidden;
            box-shadow: 0 30px 90px rgba(0,0,0,.18);
            position: relative;
            z-index: 1;
            animation: cardAppear .8s ease both;
        }

        /* LEFT SIDE */

        .visual-side {
            position: relative;
            background: var(--cream);
            padding: 35px 40px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            color: var(--forest);
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -.5px;
            z-index: 2;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            background: var(--forest);
            color: white;
            border-radius: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 23px;
        }

        .visual-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .visual-content h2 {
            font-size: clamp(27px, 3vw, 39px);
            line-height: 1.18;
            color: var(--forest);
            letter-spacing: -1.3px;
            margin-bottom: 14px;
        }

        .visual-content h2 span {
            color: var(--green);
        }

        .visual-content p {
            color: #7c8c7f;
            font-size: 14px;
            line-height: 1.8;
            max-width: 330px;
        }

        /* CSS COMMUNITY ILLUSTRATION */

        .illustration {
            width: 100%;
            max-width: 450px;
            height: 290px;
            margin: 30px auto 12px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }

        .illustration-circle {
            position: absolute;
            width: 285px;
            height: 245px;
            border-radius: 50%;
            background: #e1eddf;
            top: 5px;
            left: 50%;
            transform: translateX(-50%);
        }

        .sun {
            position: absolute;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #f3d992;
            top: 26px;
            right: 75px;
            animation: float 4s ease-in-out infinite;
        }

        .cloud {
            position: absolute;
            background: white;
            width: 65px;
            height: 20px;
            border-radius: 30px;
            top: 60px;
            left: 45px;
            opacity: .9;
            animation: float 5s ease-in-out infinite;
        }

        .cloud::before {
            content: "";
            position: absolute;
            width: 33px;
            height: 33px;
            background: white;
            border-radius: 50%;
            left: 15px;
            bottom: 5px;
        }

        .ground {
            position: absolute;
            width: 95%;
            height: 33px;
            background: #a8c8a3;
            border-radius: 50%;
            bottom: 12px;
            left: 2.5%;
        }

        .house {
            position: absolute;
            bottom: 35px;
            width: 125px;
            height: 125px;
            z-index: 2;
            animation: houseAppear 1s ease both;
        }

        .house-left {
            left: 38px;
            transform-origin: bottom center;
        }

        .house-right {
            right: 35px;
            transform-origin: bottom center;
            animation-delay: .2s;
        }

        .house-body {
            position: absolute;
            width: 110px;
            height: 90px;
            background: #f4c99b;
            bottom: 0;
            left: 7px;
            border-radius: 5px;
            border: 3px solid #52725b;
        }

        .house-right .house-body {
            background: #c6dcc3;
        }

        .roof {
            position: absolute;
            width: 90px;
            height: 90px;
            background: #47785b;
            transform: rotate(45deg);
            top: 0;
            left: 17px;
            border-radius: 5px;
        }

        .house-right .roof {
            background: #345c45;
        }

        .door {
            position: absolute;
            bottom: 0;
            left: 48px;
            width: 29px;
            height: 49px;
            background: #6d9b78;
            border: 3px solid #52725b;
            border-bottom: none;
            border-radius: 14px 14px 0 0;
        }

        .house-right .door {
            background: #e4b58c;
        }

        .window {
            position: absolute;
            width: 23px;
            height: 24px;
            background: #fff4c9;
            border: 3px solid #52725b;
            top: 50px;
            left: 15px;
            border-radius: 5px;
        }

        .house-right .window {
            left: 85px;
        }

        .tree {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            width: 95px;
            height: 155px;
            z-index: 3;
            animation: treeAppear 1s ease .4s both;
        }

        .tree-trunk {
            position: absolute;
            width: 19px;
            height: 75px;
            background: #8d6b4f;
            bottom: 0;
            left: 38px;
            border-radius: 5px;
        }

        .tree-top {
            position: absolute;
            width: 95px;
            height: 105px;
            background: #6b9c72;
            border-radius: 50% 50% 45% 45%;
            top: 0;
            box-shadow: inset -12px -10px 0 #598b63;
        }

        .tree-top::after {
            content: "♥";
            position: absolute;
            color: #f7d8b4;
            font-size: 22px;
            top: 35px;
            left: 37px;
        }

        .visual-bottom {
            font-size: 12px;
            color: #91a093;
            z-index: 2;
        }

        /* RIGHT LOGIN SIDE */

        .form-side {
            background: var(--white);
            padding: 60px clamp(30px, 5vw, 75px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .welcome-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #edf5eb;
            color: var(--green);
            font-size: 12px;
            font-weight: 750;
            border-radius: 50px;
            padding: 9px 15px;
            width: fit-content;
            margin-bottom: 22px;
        }

        .form-side h1 {
            font-size: clamp(31px, 3.5vw, 43px);
            letter-spacing: -1.5px;
            color: var(--forest);
            margin-bottom: 12px;
        }

        .form-subtitle {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 33px;
        }

        .group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
            color: var(--forest);
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            height: 52px;
            border: 1.5px solid var(--border);
            background: #f9fbf8;
            border-radius: 14px;
            padding: 0 45px 0 17px;
            font-family: inherit;
            font-size: 14px;
            color: var(--forest);
            transition: .25s ease;
        }

        .input-wrapper input:focus {
            outline: none;
            border-color: var(--green);
            background: white;
            box-shadow: 0 0 0 4px rgba(71,120,91,.09);
        }

        .input-wrapper input::placeholder {
            color: #a3ada4;
        }

        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #92a596;
            pointer-events: none;
            font-size: 17px;
        }

        .password-toggle {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: none;
            cursor: pointer;
            color: #7b9180;
            font-size: 18px;
            padding: 6px;
        }

        .login-btn {
            width: 100%;
            height: 54px;
            border: 0;
            border-radius: 14px;
            background: var(--green);
            color: white;
            font-size: 15px;
            font-weight: 750;
            cursor: pointer;
            margin-top: 8px;
            box-shadow: 0 10px 20px rgba(71,120,91,.17);
            transition: .25s ease;
        }

        .login-btn:hover {
            background: var(--forest);
            transform: translateY(-2px);
            box-shadow: 0 13px 25px rgba(71,120,91,.22);
        }

        .register-text {
            text-align: center;
            font-size: 13px;
            color: var(--muted);
            margin-top: 26px;
        }

        a {
            color: var(--green);
            font-weight: 750;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .back-home {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 32px;
            font-size: 13px;
            color: #849387;
        }

        .errors {
            background: #fff1ef;
            color: #b42318;
            border: 1px solid #ffd7d2;
            padding: 13px 16px;
            border-radius: 13px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .errors ul {
            padding-left: 18px;
        }

        /* SPLASH ANIMATION */

        .splash {
            position: fixed;
            inset: 0;
            background: var(--cream);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            transition: opacity .6s ease,
                        visibility .6s ease;
        }

        .splash.hide {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .splash-inner {
            text-align: center;
            animation: splashReveal 1s ease both;
        }

        .splash-logo {
            width: 105px;
            height: 105px;
            border-radius: 30px;
            background: var(--forest);
            color: white;
            font-size: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 22px;
            box-shadow: 0 18px 35px rgba(40,75,57,.18);
            animation: float 2.5s ease-in-out infinite;
        }

        .splash-title {
            font-size: clamp(25px, 5vw, 38px);
            font-weight: 850;
            letter-spacing: -1px;
            color: var(--forest);
        }

        .splash-caption {
            margin-top: 10px;
            font-size: 14px;
            color: #809184;
            line-height: 1.7;
        }

        @keyframes splashReveal {
            from {
                opacity: 0;
                transform: scale(.85) translateY(15px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes houseAppear {
            from {
                opacity: 0;
                translate: 0 30px;
            }
            to {
                opacity: 1;
                translate: 0 0;
            }
        }

        @keyframes treeAppear {
            from {
                opacity: 0;
                scale: .5;
            }
            to {
                opacity: 1;
                scale: 1;
            }
        }

        /* TABLET */

        @media (max-width: 900px) {
            body {
                padding: 20px;
            }

            .login-container {
                grid-template-columns: 1fr 1fr;
            }

            .visual-side {
                padding: 28px 22px;
            }

            .form-side {
                padding: 40px 28px;
            }

            .illustration {
                transform: scale(.8);
                margin: 0 auto;
            }

            .visual-content h2 {
                font-size: 27px;
            }
        }

        /* MOBILE */

        @media (max-width: 650px) {
            body {
                padding: 14px;
                align-items: flex-start;
            }

            .login-container {
                grid-template-columns: 1fr;
                min-height: auto;
                border-radius: 25px;
                margin: auto 0;
            }

            .visual-side {
                padding: 24px 22px 18px;
            }

            .brand {
                font-size: 15px;
            }

            .brand-icon {
                width: 36px;
                height: 36px;
                font-size: 19px;
            }

            .visual-content {
                padding-top: 22px;
            }

            .visual-content h2 {
                font-size: 27px;
                margin-bottom: 7px;
            }

            .visual-content p {
                font-size: 12px;
            }

            .illustration {
                height: 170px;
                width: 330px;
                max-width: 100%;
                margin: 10px auto -5px;
                transform: scale(.62);
                transform-origin: center bottom;
            }

            .visual-bottom {
                display: none;
            }

            .form-side {
                padding: 30px 25px 35px;
                border-radius: 25px 25px 0 0;
            }

            .form-side h1 {
                font-size: 31px;
            }

            .form-subtitle {
                margin-bottom: 25px;
            }

            .welcome-badge {
                margin-bottom: 15px;
            }

            .back-home {
                margin-top: 25px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }

        /* K.I.T.A. identity */
        .brand { text-decoration:none; font-size:inherit; gap:11px; }
        .brand-icon { width:52px;height:52px;background:#fff;border-radius:15px;overflow:hidden;box-shadow:0 5px 18px rgba(0,0,0,.07);flex-shrink:0; }
        .brand-icon img,.splash-logo img {width:100%;height:100%;object-fit:contain;display:block;}
        .brand-text,.splash-title {font-family:'Fredoka','Segoe UI',sans-serif;font-weight:700;display:inline-flex;align-items:baseline;gap:1px;letter-spacing:-1.2px;}
        .brand-text {font-size:27px;}
        .brand-text .k,.splash-title .k {color:#FFE047;transform:rotate(-6deg)}
        .brand-text .i,.splash-title .i {color:#6DE0BF;transform:rotate(4deg)}
        .brand-text .t,.splash-title .t {color:#FF9C68;transform:rotate(-5deg)}
        .brand-text .a,.splash-title .a {color:#4CC9DF;transform:rotate(5deg)}
        .splash-logo {background:white;padding:0;overflow:hidden;}
        .splash-title {font-size:clamp(32px,6vw,45px);justify-content:center;}
        @media(max-width:650px){.brand-icon{width:42px;height:42px;border-radius:12px}.brand-text{font-size:21px}}

        /* ADMIN LOGIN LINK */
        .admin-login-link {
            position: absolute;
            top: 22px;
            right: 24px;
            z-index: 5;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 13px;
            border: 1px solid var(--border);
            border-radius: 999px;
            background: var(--mint);
            color: var(--forest);
            font-size: 12px;
            font-weight: 700;
            transition: background .2s ease, transform .2s ease;
        }
        .admin-login-link:hover {
            background: var(--sage);
            text-decoration: none;
            transform: translateY(-2px);
        }
        @media (max-width: 650px) {
            .admin-login-link { top: 17px; right: 17px; padding: 8px 10px; font-size: 11px; }
            .form-side { padding-top: 65px; }
        }
    </style>
</head>

<body>

    <!-- BACKGROUND -->
    <div class="background-shape shape-one"></div>
    <div class="background-shape shape-two"></div>

    <!-- INTRO ANIMATION -->
    <div class="splash" id="splash">
        <div class="splash-inner">
            <div class="splash-logo"><img src="{{ asset('images/kita-full-logo.png') }}" alt="K.I.T.A. logo"></div>
            <div class="splash-title" aria-label="K.I.T.A."><span class="k">K.</span><span class="i">I.</span><span class="t">T.</span><span class="a">A.</span></div>
            <p class="splash-caption">
                Connecting Neighbours,<br>
                Building Communities.
            </p>
        </div>
    </div>

    <!-- LOGIN CONTAINER -->
    <main class="login-container">

        <!-- LEFT ILLUSTRATION -->
        <section class="visual-side">

            <a href="{{ route('home') }}" class="brand" aria-label="K.I.T.A. homepage">
                <span class="brand-icon"><img src="{{ asset('images/kita-full-logo.png') }}" alt="K.I.T.A. logo"></span>
                <span class="brand-text" aria-label="K.I.T.A."><span class="k">K.</span><span class="i">I.</span><span class="t">T.</span><span class="a">A.</span></span>
            </a>

            <div class="visual-content">

                <h2>
                    Better Together.<br>
                    <span>Closer Than Ever.</span>
                </h2>

                <p>
                    A little connection goes a long way.
                    Discover, share and grow with your neighbours.
                </p>

                <!-- CSS ILLUSTRATION -->
                <div class="illustration" aria-hidden="true">

                    <div class="illustration-circle"></div>
                    <div class="sun"></div>
                    <div class="cloud"></div>
                    <div class="ground"></div>

                    <div class="house house-left">
                        <div class="roof"></div>
                        <div class="house-body"></div>
                        <div class="window"></div>
                        <div class="door"></div>
                    </div>

                    <div class="house house-right">
                        <div class="roof"></div>
                        <div class="house-body"></div>
                        <div class="window"></div>
                        <div class="door"></div>
                    </div>

                    <div class="tree">
                        <div class="tree-trunk"></div>
                        <div class="tree-top"></div>
                    </div>

                </div>

            </div>

            <p class="visual-bottom">
                © {{ date('Y') }} K.I.T.A.
                Bringing communities closer.
            </p>

        </section>

        <!-- RIGHT LOGIN FORM -->
        <section class="form-side">
            <a href="{{ route('admin.login') }}" class="admin-login-link" aria-label="Go to admin login">
                <span aria-hidden="true">🔐</span> Admin Login
            </a>

            <div class="welcome-badge">
                ✨ YOUR COMMUNITY AWAITS
            </div>

            <h1>Welcome back! 👋</h1>

            <p class="form-subtitle">
                It's lovely to see you again.
                Sign in and stay connected with your community.
            </p>

            @if ($errors->any())
                <div class="errors" role="alert">
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
                    <label for="email">Email Address</label>

                    <div class="input-wrapper">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            autocomplete="email"
                            required
                        >
                        <span class="input-icon">✉</span>
                    </div>
                </div>

                <div class="group">
                    <label for="password">Password</label>

                    <div class="input-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            id="togglePassword"
                            aria-label="Show password"
                            aria-pressed="false"
                        >
                            ◉
                        </button>
                    </div>
                </div>

                <button type="submit" class="login-btn">
                    Log In &nbsp; →
                </button>
            </form>

            <p class="register-text">
                New to K.I.T.A.?
                <a href="{{ route('register') }}">
                    Create an account
                </a>
            </p>

            <a href="{{ route('home') }}" class="back-home">
                ← Back to homepage
            </a>

        </section>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // INTRO ANIMATION
            const splash = document.getElementById('splash');
            const hasErrors = @json($errors->any());

            if (hasErrors) {
                splash.remove();
            } else {
                setTimeout(function () {
                    splash.classList.add('hide');

                    setTimeout(function () {
                        splash.remove();
                    }, 650);
                }, 2300);
            }

            // SHOW / HIDE PASSWORD
            const toggle = document.getElementById('togglePassword');
            const password = document.getElementById('password');

            toggle.addEventListener('click', function () {
                const isHidden = password.type === 'password';

                password.type = isHidden ? 'text' : 'password';
                toggle.textContent = isHidden ? '◎' : '◉';
                toggle.setAttribute(
                    'aria-label',
                    isHidden ? 'Hide password' : 'Show password'
                );
                toggle.setAttribute('aria-pressed', String(isHidden));
            });

        });
    </script>

</body>
</html>