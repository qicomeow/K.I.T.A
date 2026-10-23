<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title','Admin') — K.I.T.A.</title>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&display=swap" rel="stylesheet">
<style>
:root{--green:#47785b;--dark:#294d38;--sage:#e5ecdc;--cream:#f8f8f1;--border:#e2e9df;--muted:#708073}
*{box-sizing:border-box}body{margin:0;background:var(--cream);color:var(--dark);font:15px 'Segoe UI',Arial,sans-serif}body.drawer-open,body.modal-open{overflow:hidden}a{text-decoration:none;color:inherit}button,input,select,textarea{font:inherit}button{cursor:pointer}
header{background:#fff;border-bottom:1px solid var(--border);position:sticky;top:0;z-index:20}.top{max-width:1200px;margin:auto;padding:11px 22px;display:flex;justify-content:space-between;align-items:center;gap:16px}.brand{display:flex;align-items:center;gap:10px;flex-shrink:0}.brand-icon{width:52px;height:52px;display:grid;place-items:center;background:#fff;border-radius:15px;overflow:hidden;box-shadow:0 5px 18px #0000000c}.brand-icon img{width:100%;height:100%;object-fit:contain}.brand-text{display:inline-flex;align-items:baseline;gap:1px;font:700 27px Fredoka,sans-serif;letter-spacing:-1.2px}.brand-text span{display:inline-block}.brand-text .k{color:#FFE047;transform:rotate(-6deg)}.brand-text .i{color:#6DE0BF;transform:rotate(4deg)}.brand-text .t{color:#FF9C68;transform:rotate(-5deg)}.brand-text .a{color:#4CC9DF;transform:rotate(5deg)}.admin-tag{font-size:10px;letter-spacing:1px;font-weight:800;color:var(--muted);background:var(--cream);padding:5px 7px;border-radius:7px}
.header-right{display:flex;align-items:center;gap:17px}.nav{display:flex;align-items:center;gap:8px}.nav a{border-radius:12px;padding:11px 15px;color:var(--dark);font-weight:700}.nav a:hover,.nav a.active{background:var(--sage)}.profile-trigger{display:flex;align-items:center;gap:9px;border:1px solid var(--border);background:#fff;border-radius:30px;padding:5px 11px 5px 5px;color:var(--dark);font-weight:700}.profile-trigger:hover{background:var(--cream)}.avatar{width:38px;height:38px;flex-shrink:0;border-radius:50%;display:grid;place-items:center;overflow:hidden;background:#dbe8dc;color:var(--dark);font-weight:800}.avatar img{width:100%;height:100%;object-fit:cover}.profile-label{max-width:130px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.wrap{max-width:1200px;margin:32px auto;padding:0 22px 90px}h1{font-size:29px;margin:0 0 8px}h2{font-size:20px;margin:0 0 18px}.sub{color:var(--muted);margin:0 0 25px}.stats{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:14px;margin:24px 0}.stat,.panel{background:#fff;border:1px solid var(--border);border-radius:19px;padding:21px;box-shadow:0 5px 18px #294d3807}.stat strong{display:block;font-size:30px;margin-top:8px}.stat small{color:var(--muted)}.panel{margin-bottom:20px}.scroll{overflow-x:auto}table{width:100%;border-collapse:collapse;min-width:680px}th,td{padding:14px 12px;border-bottom:1px solid var(--border);text-align:left;vertical-align:top}th{color:var(--muted);font-size:12px;text-transform:uppercase}td{font-size:14px}.badge{display:inline-block;padding:6px 10px;border-radius:99px;background:#edf1eb;font-size:12px;font-weight:700}.badge.pending,.badge.reported{background:#fff0d9;color:#9b681d}.badge.in_progress{background:#e3efff;color:#315c9b}.badge.resolved{background:#e3f3e5;color:#347548}.badge.rejected,.badge.cancelled{background:#fbe8e8;color:#9d4545}.btn{display:inline-block;background:var(--green);color:#fff;border:0;border-radius:11px;padding:11px 16px;font-weight:700;cursor:pointer}.btn:hover{background:var(--dark)}.btn.soft{background:var(--sage);color:var(--dark)}.btn.danger{background:#a83f47}.btn.danger:hover{background:#842d34}input,select,textarea{width:100%;border:1px solid #d7e1d6;border-radius:11px;padding:11px;background:white;color:var(--dark)}label{display:block;font-size:13px;font-weight:650;margin-bottom:6px}.field{margin-bottom:14px}.filters{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:18px}.filters a{background:white;border:1px solid var(--border);padding:9px 13px;border-radius:30px;font-size:13px}.filters a.active{background:var(--green);color:white}.alert{padding:14px 17px;border-radius:12px;margin-bottom:20px;background:#e2f3e5;color:#295c38}.alert.error{background:#fce8e8;color:#a03c3c}.grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}.muted{color:var(--muted)}.pagination{margin-top:20px}.detail{background:#f7faf5;padding:15px;border-radius:12px;margin:12px 0}.detail p{margin:7px 0;overflow-wrap:anywhere}.actions{display:flex;gap:9px;flex-wrap:wrap;align-items:center}
.drawer-overlay{position:fixed;inset:0;background:#13291da8;z-index:39;opacity:0;visibility:hidden;transition:.25s}.drawer{position:fixed;right:0;top:0;bottom:0;width:min(370px,90vw);background:#fff;z-index:40;transform:translateX(105%);visibility:hidden;transition:transform .3s,visibility .3s;box-shadow:-10px 0 40px #0002;padding:24px;display:flex;flex-direction:column;gap:15px}.drawer-open .drawer-overlay{opacity:1;visibility:visible}.drawer-open .drawer{transform:translateX(0);visibility:visible}.drawer-top{display:flex;justify-content:space-between;align-items:center}.icon-close{border:0;background:var(--sage);border-radius:50%;width:37px;height:37px;font-size:22px}.drawer-user{background:var(--cream);border-radius:20px;padding:25px 16px;text-align:center}.drawer-user .avatar{width:80px;height:80px;font-size:28px;margin:0 auto 12px}.drawer-user h2{margin:0 0 5px;font-size:22px}.drawer-user p{color:var(--muted);margin:0;overflow-wrap:anywhere}.drawer-action{width:100%;display:flex;align-items:center;gap:12px;text-align:left;background:#fff;border:1px solid var(--border);border-radius:13px;padding:14px 16px;font-weight:700;color:var(--dark)}.drawer-action:hover{background:var(--cream)}.drawer-action.danger{color:#a34848}.drawer-bottom{margin-top:auto}
.modal{position:fixed;inset:0;background:#182d21a8;z-index:50;display:none;align-items:center;justify-content:center;padding:18px}.modal.open{display:flex}.modal-card{width:min(560px,100%);max-height:90dvh;overflow:auto;background:white;padding:25px;border-radius:20px}.modal-head{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:20px}.close{border:0;background:var(--sage);border-radius:50%;width:35px;height:35px;cursor:pointer;font-size:20px}.settings-avatar{display:flex;align-items:center;gap:13px;margin-bottom:18px}.settings-avatar .avatar{width:64px;height:64px}.danger-zone{border-top:1px solid var(--border);margin-top:25px;padding-top:20px}.help-text{font-size:12px;color:var(--muted);line-height:1.5;margin:7px 0 12px}.bottom-nav{display:none}
@media(max-width:900px){.stats{grid-template-columns:repeat(3,minmax(0,1fr))}}@media(max-width:650px){.top{padding:9px 15px;gap:8px}.brand{gap:7px}.brand-icon{width:42px;height:42px;border-radius:12px}.brand-text{font-size:21px}.admin-tag{font-size:9px;padding:4px}.nav{display:none}.profile-trigger{padding:4px;border:0}.profile-trigger .avatar{width:39px;height:39px}.profile-label,.profile-arrow{display:none}.header-right{gap:5px}.wrap{padding:0 15px 110px;margin-top:24px}.stats{grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}.grid{grid-template-columns:1fr}.stat,.panel{padding:16px}h1{font-size:25px}.bottom-nav{position:fixed;bottom:0;left:0;right:0;display:grid;grid-template-columns:repeat(2,minmax(0,1fr));background:#fff;border-top:1px solid var(--border);z-index:25;padding:9px 12px max(9px,env(safe-area-inset-bottom));box-shadow:0 -5px 20px #0000000b}.bottom-nav a{display:flex;align-items:center;justify-content:center;gap:8px;border-radius:12px;padding:12px 8px;font-size:13px;font-weight:700}.bottom-nav a.active{background:var(--sage)}.modal-card{padding:20px}.actions{align-items:flex-start}}@media(max-width:370px){.admin-tag{display:none}.brand-text{font-size:20px}}
</style>
</head>
<body>
@php
    // Admin and residents currently use Laravel's default web guard.
    $adminUser = auth()->user();
    $adminName = $adminUser?->full_name ?: ($adminUser?->name ?? 'Admin');
    $adminShortName = $adminUser?->name ?: (explode(' ', trim($adminName))[0] ?? 'Admin');
    $adminPhoto = $adminUser?->profile_photo ?? $adminUser?->profile_picture ?? $adminUser?->avatar ?? null;
    $adminPhotoUrl = $adminPhoto ? (\Illuminate\Support\Str::startsWith($adminPhoto, ['http://','https://','/']) ? $adminPhoto : asset('storage/'.$adminPhoto)) : null;
@endphp
<header><div class="top">
    <a class="brand" href="{{ route('admin.dashboard') }}" aria-label="K.I.T.A. Admin Dashboard">
        <span class="brand-icon"><img src="{{ asset('images/kita-full-logo.png') }}" alt="K.I.T.A. logo"></span>
        <span class="brand-text" aria-label="K.I.T.A."><span class="k">K.</span><span class="i">I.</span><span class="t">T.</span><span class="a">A.</span></span>
        <span class="admin-tag">ADMIN</span>
    </a>
    <div class="header-right"><nav class="nav" aria-label="Admin navigation">
        <a class="{{ request()->routeIs('admin.requests*') ? 'active' : '' }}" href="{{ route('admin.requests') }}">Requests</a>
        <a class="{{ request()->routeIs('admin.technicians*') ? 'active' : '' }}" href="{{ route('admin.technicians') }}">Technicians</a>
    </nav>
    <button type="button" class="profile-trigger" id="drawerOpen" aria-label="Open admin profile" aria-controls="adminDrawer" aria-expanded="false"><span class="avatar">@if($adminPhotoUrl)<img src="{{ $adminPhotoUrl }}" alt="Admin profile photo">@else{{ strtoupper(mb_substr($adminShortName,0,1)) }}@endif</span><span class="profile-label">{{ $adminShortName }}</span><span class="profile-arrow">⌄</span></button></div>
</div></header>
<main class="wrap">
@if(session('success'))<div class="alert">{{ session('success') }}</div>@endif
@if($errors->any())<div class="alert error"><strong>Please check:</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
@yield('content')
</main>
<nav class="bottom-nav" aria-label="Mobile admin navigation"><a href="{{ route('admin.requests') }}" class="{{ request()->routeIs('admin.requests*') ? 'active' : '' }}">📋 Requests</a><a href="{{ route('admin.technicians') }}" class="{{ request()->routeIs('admin.technicians*') ? 'active' : '' }}">🛠️ Technicians</a></nav>
<div class="drawer-overlay" id="drawerOverlay"></div>
<aside class="drawer" id="adminDrawer" aria-hidden="true" aria-label="Admin profile menu">
    <div class="drawer-top"><strong>My Profile</strong><button type="button" class="icon-close" id="drawerClose" aria-label="Close profile menu">×</button></div>
    <div class="drawer-user"><div class="avatar">@if($adminPhotoUrl)<img src="{{ $adminPhotoUrl }}" alt="Admin profile photo">@else{{ strtoupper(mb_substr($adminShortName,0,1)) }}@endif</div><h2>Hi, {{ $adminShortName }}! 👋</h2><p>{{ $adminUser?->email ?? 'K.I.T.A. Administrator' }}</p></div>
    <button type="button" class="drawer-action" id="settingsOpen">⚙️ <span>Settings</span></button>
    <div class="drawer-bottom"><form method="POST" action="{{ route('admin.logout') }}">@csrf<button type="submit" class="drawer-action danger">↪ <span>Log Out</span></button></form></div>
</aside>
<div class="modal" id="settingsModal" role="dialog" aria-modal="true" aria-labelledby="settingsTitle" aria-hidden="true"><div class="modal-card">
    <div class="modal-head"><h2 id="settingsTitle" style="margin:0">Account Settings</h2><button type="button" class="close" id="settingsClose" aria-label="Close settings">×</button></div>
    <div class="settings-avatar"><span class="avatar">@if($adminPhotoUrl)<img src="{{ $adminPhotoUrl }}" alt="Current profile photo">@else{{ strtoupper(mb_substr($adminShortName,0,1)) }}@endif</span><div><strong>{{ $adminName }}</strong><div class="muted" style="font-size:12px">Administrator</div></div></div>
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="field"><label for="admin_full_name">Full Name</label><input id="admin_full_name" name="full_name" value="{{ old('full_name', $adminUser?->full_name ?: $adminUser?->name) }}" required></div>
        <div class="field"><label for="admin_name">Short Name</label><input id="admin_name" name="name" value="{{ old('name', $adminUser?->name) }}" required></div>
        <div class="field"><label for="admin_email">Email Address</label><input type="email" id="admin_email" name="email" value="{{ old('email', $adminUser?->email) }}" required></div>
        <div class="field"><label for="admin_photo">Profile Picture</label><input type="file" id="admin_photo" name="profile_photo" accept="image/png,image/jpeg,image/webp"></div>
        <button class="btn" type="submit">Save Changes</button>
    </form>
    <div class="danger-zone"><h2 style="color:#a34848;margin-bottom:6px">Delete Account</h2><p class="help-text">Admin account deletion is not enabled to protect management records.</p></div>
</div></div>
@yield('scripts')
<script>
(function(){
    const body=document.body,openBtn=document.getElementById('drawerOpen'),closeBtn=document.getElementById('drawerClose'),overlay=document.getElementById('drawerOverlay'),drawer=document.getElementById('adminDrawer');
    const settings=document.getElementById('settingsModal'),settingsOpen=document.getElementById('settingsOpen'),settingsClose=document.getElementById('settingsClose');
    function setDrawer(open){body.classList.toggle('drawer-open',open);openBtn.setAttribute('aria-expanded',String(open));drawer.setAttribute('aria-hidden',String(!open));if(open)closeBtn.focus();}
    function setSettings(open){settings.classList.toggle('open',open);settings.setAttribute('aria-hidden',String(!open));body.classList.toggle('modal-open',open);if(open)settingsClose.focus();else settingsOpen.focus();}
    openBtn.addEventListener('click',()=>setDrawer(true));closeBtn.addEventListener('click',()=>setDrawer(false));overlay.addEventListener('click',()=>setDrawer(false));
    settingsOpen.addEventListener('click',()=>{setDrawer(false);setSettings(true)});settingsClose.addEventListener('click',()=>setSettings(false));settings.addEventListener('click',e=>{if(e.target===settings)setSettings(false)});
    document.addEventListener('keydown',e=>{if(e.key==='Escape'){if(settings.classList.contains('open'))setSettings(false);else if(body.classList.contains('drawer-open'))setDrawer(false)}});
    @if($errors->any()) setSettings(true); @endif
})();
</script>
</body>
</html>