<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | K.I.T.A.</title>

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

        /* BACKGROUND */

        .background-shape {
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
            opacity: .15;
            background: #b6dbc2;
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

        /* MAIN CONTAINER */

        .register-container {
            width: 100%;
            max-width: 1120px;
            min-height: 690px;
            display: grid;
            grid-template-columns: 1.08fr .92fr;
            background: white;
            border-radius: 35px;
            overflow: hidden;
            box-shadow: 0 30px 90px rgba(0,0,0,.18);
            position: relative;
            z-index: 1;
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

        /* NEIGHBOURHOOD ILLUSTRATION */

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
        }

        .house-left {
            left: 38px;
        }

        .house-right {
            right: 35px;
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
        }

        /* RIGHT REGISTER SIDE */

        .form-side {
            background: var(--white);
            padding: 42px clamp(30px, 5vw, 75px);
            display: flex;
            flex-direction: column;
            justify-content: center;
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
            margin-bottom: 18px;
        }

        .form-side h1 {
            font-size: clamp(30px, 3.5vw, 42px);
            letter-spacing: -1.5px;
            color: var(--forest);
            margin-bottom: 10px;
        }

        .form-subtitle {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--forest);
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            height: 49px;
            border: 1.5px solid var(--border);
            background: #f9fbf8;
            border-radius: 14px;
            padding: 0 45px 0 17px;
            font-family: inherit;
            font-size: 14px;
            color: var(--forest);
            transition: border-color .2s ease,
                        box-shadow .2s ease;
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
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: none;
            cursor: pointer;
            color: #7b9180;
            font-size: 13px;
            font-weight: 700;
            padding: 7px;
        }

        .password-hint {
            display: block;
            font-size: 11px;
            color: var(--muted);
            margin-top: 7px;
        }

        .password-match {
            display: block;
            font-size: 11px;
            margin-top: 7px;
            min-height: 14px;
        }

        .password-match.success {
            color: #32834a;
        }

        .password-match.error {
            color: #b42318;
        }

        .register-btn {
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
            transition: background .2s ease,
                        transform .2s ease;
        }

        .register-btn:hover {
            background: var(--forest);
            transform: translateY(-2px);
        }

        .login-text {
            text-align: center;
            font-size: 13px;
            color: var(--muted);
            margin-top: 23px;
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
            margin-top: 25px;
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

        /* TABLET */

        @media (max-width: 900px) {
            body {
                padding: 20px;
            }

            .register-container {
                grid-template-columns: 1fr 1fr;
            }

            .visual-side {
                padding: 28px 22px;
            }

            .form-side {
                padding: 35px 28px;
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

            .register-container {
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
                padding-top: 20px;
            }

            .visual-content h2 {
                font-size: 26px;
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
                padding: 28px 25px 35px;
                border-radius: 25px 25px 0 0;
            }

            .form-side h1 {
                font-size: 30px;
            }

            .form-subtitle {
                margin-bottom: 23px;
            }

            .welcome-badge {
                margin-bottom: 14px;
            }
        }

        @media (max-width: 360px) {
            .form-side {
                padding: 25px 18px 30px;
            }

            .visual-side {
                padding-left: 16px;
                padding-right: 16px;
            }

            .brand {
                font-size: 13px;
            }
        }

        /* K.I.T.A. brand */
        .brand { display:flex; align-items:center; gap:11px; }
        .brand-icon { width:52px; height:52px; padding:0; background:#fff; border-radius:15px; overflow:hidden; flex-shrink:0; box-shadow:0 5px 18px rgba(0,0,0,.07); }
        .brand-icon img { display:block; width:100%; height:100%; object-fit:contain; }
        .brand-text { display:inline-flex; align-items:baseline; gap:1px; font-family:'Fredoka','Segoe UI',sans-serif; font-size:27px; font-weight:700; letter-spacing:-1.2px; line-height:1; white-space:nowrap; }
        .brand-text .k { color:#FFE047; transform:rotate(-6deg); }
        .brand-text .i { color:#6DE0BF; transform:rotate(4deg); }
        .brand-text .t { color:#FF9C68; transform:rotate(-5deg); }
        .brand-text .a { color:#4CC9DF; transform:rotate(5deg); }
        @media(max-width:650px) { .brand-icon { width:42px; height:42px; border-radius:12px; } .brand-text { font-size:21px; } }
        @media(max-width:360px) { .brand-icon { width:40px; height:40px; } .brand-text { font-size:20px; } }
    </style>
</head>

<body>

    <!-- BACKGROUND -->
    <div class="background-shape shape-one"></div>
    <div class="background-shape shape-two"></div>

    <main class="register-container">

        <!-- LEFT ILLUSTRATION -->
        <section class="visual-side">

            <div class="brand">
                <span class="brand-icon"><img src="{{ asset('images/kita-full-logo.png') }}" alt="K.I.T.A. logo"></span>
                <span class="brand-text" aria-label="K.I.T.A."><span class="k">K.</span><span class="i">I.</span><span class="t">T.</span><span class="a">A.</span></span>
            </div>

            <div class="visual-content">

                <h2>
                    Your Community.<br>
                    <span>Your New Beginning.</span>
                </h2>

                <p>
                    Great neighbourhoods begin with a simple hello.
                    Join us and be part of something wonderful.
                </p>

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

        <!-- RIGHT REGISTER FORM -->
        <section class="form-side">

            <div class="welcome-badge">
                🌱 LET'S GET CONNECTED
            </div>

            <h1>Join the family! 💚</h1>

            <p class="form-subtitle">
                Create your account and start making
                meaningful connections with your neighbours.
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

            <form
                action="{{ route('register.store') }}"
                method="POST"
                id="registerForm"
            >
                @csrf

                <!-- FULL NAME -->
                <div class="group">
                    <label for="full_name">Full Name</label>
                    <div class="input-wrapper">
                        <input type="text" id="full_name" name="full_name"
                            value="{{ old('full_name') }}"
                            placeholder="Enter your full name"
                            autocomplete="name" maxlength="255" required>
                        <span class="input-icon">♙</span>
                    </div>
                </div>

                <!-- SHORT NAME -->
                <div class="group">
                    <label for="name">Short Name (2 words)</label>
                    <div class="input-wrapper">
                        <input type="text" id="name" name="name"
                            value="{{ old('name') }}"
                            placeholder="e.g. Izzati Aqilah"
                            maxlength="255" required
                            pattern="[^\s]+\s+[^\s]+"
                            title="Please enter exactly two words">
                        <span class="input-icon">♙</span>
                    </div>
                    <small class="password-hint">This name will appear on your profile.</small>
                </div>

                <!-- EMAIL -->
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

                <!-- PASSWORD -->
                <div class="group">
                    <label for="password">Password</label>

                    <div class="input-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Create a password"
                            autocomplete="new-password"
                            minlength="6"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            data-target="password"
                            aria-label="Show password"
                            aria-pressed="false"
                        >
                            Show
                        </button>
                    </div>

                    <small class="password-hint">
                        Use at least 6 characters.
                    </small>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="group">
                    <label for="password_confirmation">
                        Confirm Password
                    </label>

                    <div class="input-wrapper">
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Re-enter your password"
                            autocomplete="new-password"
                            minlength="6"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            data-target="password_confirmation"
                            aria-label="Show confirmation password"
                            aria-pressed="false"
                        >
                            Show
                        </button>
                    </div>

                    <small
                        class="password-match"
                        id="passwordMatch"
                        aria-live="polite"
                    ></small>
                </div>

                <button type="submit" class="register-btn">
                    Create My Account &nbsp; →
                </button>

            </form>

            <p class="login-text">
                Already part of K.I.T.A.?
                <a href="{{ route('login') }}">
                    Log in
                </a>
            </p>

            <a href="{{ route('home') }}" class="back-home">
                ← Back to homepage
            </a>

        </section>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // SHOW / HIDE PASSWORD
            document.querySelectorAll('.password-toggle')
                .forEach(function (button) {

                    button.addEventListener('click', function () {
                        const target = document.getElementById(
                            button.dataset.target
                        );

                        const isHidden = target.type === 'password';

                        target.type = isHidden ? 'text' : 'password';
                        button.textContent = isHidden ? 'Hide' : 'Show';

                        button.setAttribute(
                            'aria-pressed',
                            String(isHidden)
                        );
                    });
                });

            // PASSWORD MATCH VALIDATION
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById(
                'password_confirmation'
            );
            const matchText = document.getElementById('passwordMatch');
            const form = document.getElementById('registerForm');

            function checkPasswordMatch() {
                confirmPassword.setCustomValidity('');

                if (!confirmPassword.value) {
                    matchText.textContent = '';
                    matchText.className = 'password-match';
                    return;
                }

                if (password.value === confirmPassword.value) {
                    matchText.textContent = '✓ Passwords match';
                    matchText.className = 'password-match success';
                } else {
                    matchText.textContent = '✕ Passwords do not match';
                    matchText.className = 'password-match error';
                    confirmPassword.setCustomValidity(
                        'Passwords do not match.'
                    );
                }
            }

            password.addEventListener('input', checkPasswordMatch);
            confirmPassword.addEventListener('input', checkPasswordMatch);

            form.addEventListener('submit', function (event) {
                checkPasswordMatch();

                if (!form.checkValidity()) {
                    event.preventDefault();
                    form.reportValidity();
                }
            });

        });
    </script>

</body>
</html>