<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login — K.I.T.A.</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{--forest:#294d38;--green:#47785b;--cream:#f8f8f1;--muted:#758579;--border:#e1e9df}
        *{box-sizing:border-box}
        body{margin:0;min-height:100vh;min-height:100dvh;display:grid;place-items:center;padding:32px 18px;background:radial-gradient(circle at 12% 15%,#e4efdf 0,transparent 35%),radial-gradient(circle at 92% 88%,#e8f0e5 0,transparent 35%),var(--cream);color:var(--forest);font:15px 'Segoe UI',Arial,sans-serif}
        button,input{font:inherit}
        .login-shell{width:min(100%,460px)}
        .brand{display:flex;align-items:center;justify-content:center;gap:12px;margin:0 auto 24px;text-decoration:none}
        .brand-icon{display:grid;place-items:center;width:58px;height:58px;background:#fff;border-radius:17px;box-shadow:0 6px 20px #294d3810;overflow:hidden;flex-shrink:0}
        .brand-icon img{width:100%;height:100%;object-fit:contain;display:block}
        .brand-text{display:inline-flex;align-items:baseline;gap:1px;font:700 32px/1 Fredoka,'Segoe UI',sans-serif;letter-spacing:-1.2px;white-space:nowrap}
        .brand-text .k{color:#FFE047;transform:rotate(-6deg)}
        .brand-text .i{color:#6DE0BF;transform:rotate(4deg)}
        .brand-text .t{color:#FF9C68;transform:rotate(-5deg)}
        .brand-text .a{color:#4CC9DF;transform:rotate(5deg)}
        .admin-tag{align-self:center;border:1px solid #d9e6d9;border-radius:20px;background:#fff;padding:5px 9px;font-size:10px;font-weight:800;letter-spacing:1px;color:#64816a}
        .card{background:#fff;border:1px solid var(--border);border-radius:25px;padding:36px;box-shadow:0 20px 55px #294d3811}
        .eyebrow{display:inline-flex;align-items:center;gap:8px;background:#edf5ea;color:#47785b;border-radius:99px;padding:8px 12px;font-size:11px;font-weight:800;letter-spacing:.8px}
        h1{font-size:29px;letter-spacing:-1px;margin:19px 0 8px}
        .intro{color:var(--muted);line-height:1.65;margin:0 0 26px;font-size:14px}
        label{display:block;font-size:13px;font-weight:700;margin:0 0 8px}
        .field{margin-bottom:18px}
        .input-wrap{position:relative}
        input{width:100%;height:51px;padding:0 15px;border:1.5px solid #dce6db;border-radius:13px;background:#fcfdfb;color:var(--forest);outline:none;transition:border-color .2s,box-shadow .2s}
        input:focus{border-color:var(--green);box-shadow:0 0 0 4px #47785b15;background:#fff}
        input::placeholder{color:#a0ada1}
        .password-input{padding-right:74px}
        .toggle-password{position:absolute;right:8px;top:50%;transform:translateY(-50%);border:0;border-radius:8px;padding:8px 9px;background:transparent;color:var(--green);font-size:12px;font-weight:750;cursor:pointer}
        .toggle-password:hover{background:#edf5ea}
        .submit{display:block;width:100%;height:52px;margin-top:24px;border:0;border-radius:13px;background:var(--green);color:#fff;font-size:14px;font-weight:750;cursor:pointer;transition:background .2s,transform .2s}
        .submit:hover{background:var(--forest);transform:translateY(-1px)}
        .submit:focus-visible,.toggle-password:focus-visible,.back:focus-visible{outline:3px solid #8db69a;outline-offset:3px}
        .alert{padding:12px 14px;border-radius:12px;margin:0 0 22px;font-size:13px;line-height:1.5}
        .alert.error{color:#a23d3d;background:#fff0f0;border:1px solid #f8d5d5}
        .alert.success{color:#2f7044;background:#e9f5eb;border:1px solid #cce6d1}
        .alert ul{margin:6px 0 0;padding-left:18px}
        .back{display:flex;align-items:center;justify-content:center;gap:8px;margin:24px auto 0;color:#577b60;text-decoration:none;font-size:13px;font-weight:700;width:fit-content}
        .back:hover{text-decoration:underline}
        .footer{text-align:center;color:#91a093;font-size:12px;margin:23px 0 0}
        @media(max-width:480px){body{padding:20px 14px}.brand{margin-bottom:20px;gap:9px}.brand-icon{width:48px;height:48px;border-radius:14px}.brand-text{font-size:26px}.admin-tag{font-size:9px;padding:4px 7px}.card{padding:27px 22px;border-radius:21px}h1{font-size:26px}.intro{font-size:13px}}
        @media(max-width:360px){.card{padding:23px 17px}.brand-text{font-size:24px}.brand-icon{width:43px;height:43px}}
        @media(prefers-reduced-motion:reduce){*,*::before,*::after{transition:none!important}}
    </style>
</head>
<body>
    <main class="login-shell">
        <a class="brand" href="{{ route('home') }}" aria-label="K.I.T.A. homepage">
            <span class="brand-icon"><img src="{{ asset('images/kita-full-logo.png') }}" alt="K.I.T.A. logo"></span>
            <span class="brand-text" aria-label="K.I.T.A."><span class="k">K.</span><span class="i">I.</span><span class="t">T.</span><span class="a">A.</span></span>
            <span class="admin-tag">ADMIN</span>
        </a>
        <section class="card" aria-labelledby="login-title">
            <span class="eyebrow">✦ ADMIN ACCESS</span>
            <h1 id="login-title">Welcome back.</h1>
            <p class="intro">Sign in to manage community requests and technicians.</p>

            @if ($errors->any())
                <div class="alert error" role="alert">
                    <strong>Unable to sign in.</strong>
                    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert success" role="status">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="field">
                    <label for="email">Email Address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Enter admin email" autocomplete="username" required autofocus>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <input class="password-input" id="password" name="password" type="password" placeholder="Enter your password" autocomplete="current-password" required>
                        <button class="toggle-password" type="button" id="togglePassword" aria-controls="password" aria-pressed="false" aria-label="Show password">Show</button>
                    </div>
                </div>
                <button class="submit" type="submit">Log In to Dashboard →</button>
            </form>
        </section>
        <a class="back" href="{{ route('home') }}">← Back to K.I.T.A. homepage</a>
        <p class="footer">© {{ date('Y') }} K.I.T.A. · Admin Portal</p>
    </main>
    <script>
        (function(){
            const toggle=document.getElementById('togglePassword');
            const input=document.getElementById('password');
            if(!toggle||!input)return;
            toggle.addEventListener('click',function(){
                const show=input.type==='password';
                input.type=show?'text':'password';
                toggle.textContent=show?'Hide':'Show';
                toggle.setAttribute('aria-label',show?'Hide password':'Show password');
                toggle.setAttribute('aria-pressed',String(show));
            });
        })();
    </script>
</body>
</html>