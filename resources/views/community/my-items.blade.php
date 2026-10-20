<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Items | NeighbourLink</title>

    <style>
        :root {
            --green: #47785b;
            --dark-green: #294d38;
            --sage: #e5ecdc;
            --cream: #f8f8f1;
            --text: #304537;
            --muted: #788579;
            --border: #e6e9df;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #F7F6F0;
            color: #333;
        }

        a { text-decoration: none; }
        button { font-family: inherit; cursor: pointer; }

        /* ===== HEADER SAME AS WELCOME ===== */

        .site-header {
            background: rgba(255,255,255,.92);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .navbar {
            width: min(1120px,92%);
            min-height: 70px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--dark-green);
            font-size: 21px;
            font-weight: 750;
            white-space: nowrap;
        }

        .brand-icon {
            background: var(--green);
            color: white;
            border-radius: 14px;
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            font-size: 22px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 18px;
            font-size: 14px;
            color: #617164;
        }

        .nav-links > a {
            color: inherit;
        }

        .nav-links > a:hover {
            color: var(--green);
        }

        .nav-links > a.active {
            color: var(--dark-green);
            font-weight: 750;
        }

        .nav-links form {
            margin: 0;
        }

        .nav-btn {
            border: 1px solid var(--border);
            background: white;
            color: var(--dark-green);
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 650;
        }

        .nav-btn:hover {
            background: var(--sage);
        }

        .nav-btn-primary {
            background: var(--green);
            color: white !important;
            border-color: var(--green);
        }

        /* ===== NOTIFICATION BELL ===== */

        .notification-dropdown {
            position: relative;
        }

        .notification-bell {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: var(--sage);
            border-radius: 50%;
            font-size: 19px;
            cursor: pointer;
            list-style: none;
        }

        .notification-bell::-webkit-details-marker {
            display: none;
        }

        .notification-bell:hover {
            background: #d5e2ce;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -6px;
            min-width: 19px;
            height: 19px;
            padding: 0 4px;
            border-radius: 999px;
            background: #c75050;
            color: white;
            font-size: 10px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-panel {
            position: absolute;
            top: 48px;
            right: 0;
            width: 280px;
            max-width: calc(100vw - 24px);
            max-height: 280px;
            overflow-y: auto;
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(41,77,56,.13);
            z-index: 1000;
            color: var(--text);
        }

        .notification-panel-title {
            padding: 11px 13px;
            font-weight: 750;
            color: var(--dark-green);
            border-bottom: 1px solid var(--border);
            font-size: 13px;
        }

        .notification-entry {
            display: flex;
            flex-direction: column;
            gap: 3px;
            padding: 10px 13px;
            border-bottom: 1px solid var(--border);
        }

        .notification-entry:hover {
            background: var(--cream);
        }

        .notification-entry strong {
            font-size: 12px;
            color: var(--dark-green);
        }

        .notification-entry span {
            font-size: 11px;
            color: var(--muted);
            line-height: 1.5;
        }

        .notification-empty {
            padding: 18px 13px;
            text-align: center;
            color: var(--muted);
            font-size: 12px;
        }

        .notification-footer {
            display: flex;
            flex-direction: column;
            gap: 7px;
            padding: 10px 13px;
            background: var(--cream);
        }

        .notification-footer a {
            font-size: 12px;
            font-weight: 700;
            color: var(--green);
        }

        /* ===== USER AVATAR ===== */

        .user-trigger {
            display: flex;
            align-items: center;
            gap: 9px;
            background: none;
            border: none;
            color: var(--dark-green);
            font-weight: 650;
            font-size: 14px;
            padding: 4px 12px 4px 4px;
            border-radius: 999px;
            transition: .2s;
        }

        .user-trigger:hover {
            background: var(--sage);
        }

        .avatar-sm {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--green);
            color: white;
            display: grid;
            place-items: center;
            font-weight: 750;
            font-size: 15px;
        }

        /* ===== SIDE DRAWER ===== */

        .drawer-overlay {
            position: fixed;
            inset: 0;
            background: rgba(41,77,56,.35);
            opacity: 0;
            pointer-events: none;
            transition: opacity .25s;
            z-index: 90;
        }

        .drawer {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: min(300px,86vw);
            background: var(--sage);
            border-radius: 0 30px 30px 0;
            z-index: 100;
            transform: translateX(-105%);
            transition: transform .28s ease;
            padding: 22px 16px 18px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            box-shadow: 12px 0 40px rgba(41,77,56,.15);
            visibility: hidden;
        }

        body.drawer-open .drawer {
            transform: none;
            visibility: visible;
        }

        body.drawer-open .drawer-overlay {
            opacity: 1;
            pointer-events: auto;
        }

        body.drawer-open {
            overflow: hidden;
        }

        .drawer-close {
            align-self: flex-end;
            width: 34px;
            height: 34px;
            border: none;
            border-radius: 50%;
            background: rgba(255,255,255,.7);
            color: var(--dark-green);
            font-size: 16px;
        }

        .drawer-close:hover {
            background: white;
        }

        .drawer-profile {
            text-align: center;
            margin: 2px 0 18px;
        }

        .avatar-lg {
            width: 92px;
            height: 92px;
            margin: 0 auto 12px;
            border-radius: 50%;
            background: var(--green);
            color: white;
            border: 4px solid white;
            box-shadow: 0 8px 18px rgba(41,77,56,.15);
            display: grid;
            place-items: center;
            font-size: 40px;
            font-weight: 750;
        }

        .drawer-profile h2 {
            color: var(--dark-green);
            font-size: 19px;
            overflow-wrap: anywhere;
        }

        .drawer-profile p {
            color: var(--muted);
            font-size: 13px;
            margin-top: 5px;
        }

        .drawer-nav {
            display: grid;
            gap: 6px;
        }

        .drawer-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 16px;
            color: var(--dark-green);
            font-weight: 650;
            font-size: 15px;
        }

        a.drawer-link:hover {
            background: rgba(255,255,255,.65);
        }

        .drawer-link.active {
            background: var(--green);
            color: white;
            box-shadow: 0 6px 14px rgba(71,120,91,.3);
        }

        .drawer-coming-soon {
            opacity: .65;
            cursor: default;
        }

        .soon-tag {
            margin-left: auto;
            background: rgba(255,255,255,.8);
            color: var(--green);
            font-size: 10px;
            font-weight: 750;
            padding: 3px 9px;
            border-radius: 999px;
        }

        .drawer-bottom {
            margin-top: auto;
            padding-top: 18px;
        }

        .drawer-card {
            background: rgba(255,255,255,.75);
            border-radius: 22px;
            padding: 16px;
            text-align: center;
            color: var(--dark-green);
            font-weight: 650;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .drawer-card .big {
            display: block;
            font-size: 32px;
            margin-bottom: 4px;
        }

        .drawer-card small {
            display: block;
            color: var(--muted);
            font-weight: 500;
            font-size: 12px;
            margin-top: 4px;
        }

        .drawer-logout {
            width: 100%;
            border: none;
            border-radius: 16px;
            padding: 12px;
            background: white;
            color: #a12d2d;
            font-weight: 700;
            font-size: 14px;
        }

        .drawer-logout:hover {
            background: #fbe5e5;
        }

        /* ===== MY ITEMS CONTENT ===== */

        .container {
            width: 86%;
            max-width: 1200px;
            margin: 35px auto;
        }

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 25px;
        }

        .heading h2 {
            font-size: 30px;
            color: #35563D;
            margin-bottom: 8px;
        }

        .heading p {
            color: #777;
            line-height: 1.5;
        }

        .btn {
            display: inline-block;
            background: #52765B;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            cursor: pointer;
        }

        .btn:hover {
            background: #3E6047;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 23px;
            border-radius: 12px;
            border: 1px solid #E3E6DC;
        }

        .stat-card p {
            color: #777;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .stat-card h3 {
            color: #35563D;
            font-size: 30px;
        }

        .items-section {
            background: white;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #E3E6DC;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 22px;
        }

        .section-heading h3 {
            color: #35563D;
            font-size: 21px;
        }

        .item-count {
            color: #777;
            font-size: 13px;
        }

        .items-grid {
            display: grid;
            grid-template-columns: repeat(3,minmax(0,1fr));
            gap: 20px;
        }

        .item-card {
            border: 1px solid #E3E6DC;
            border-radius: 10px;
            overflow: hidden;
            background: white;
        }

        .item-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background: #E6EDE2;
        }

        .image-placeholder {
            height: 180px;
            background: #E6EDE2;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 45px;
        }

        .item-content {
            padding: 17px;
        }

        .item-content h4 {
            font-size: 18px;
            color: #35563D;
            margin-bottom: 10px;
            overflow-wrap: anywhere;
        }

        .item-content p {
            font-size: 13px;
            color: #777;
            line-height: 1.6;
            margin-bottom: 8px;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-block;
            background: #E6EDE2;
            color: #35563D;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            margin-bottom: 12px;
        }

        .item-actions {
            display: flex;
            gap: 10px;
            margin-top: 18px;
        }

        .action-btn {
            flex: 1;
            display: inline-block;
            text-align: center;
            padding: 10px 12px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: bold;
            transition: .2s;
        }

        .view-btn {
            background: #E6EDE2;
            color: #35563D;
        }

        .view-btn:hover {
            background: #D5E3D1;
        }

        .edit-btn {
            background: #52765B;
            color: white;
        }

        .edit-btn:hover {
            background: #3E6047;
        }

        .delete-btn {
            width: 100%;
            background: #FBE9E7;
            color: #B33A32;
            border: none;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #F5D2CE;
        }

        .empty-state {
            text-align: center;
            padding: 55px 20px;
        }

        .empty-state .icon {
            font-size: 55px;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            color: #35563D;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #777;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .pagination {
            margin-top: 25px;
        }

        .pagination nav {
            justify-content: center;
        }

        .pagination a,
        .pagination span {
            color: #52765B;
        }

        .message {
            background: #E6EDE2;
            color: #35563D;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        @media (max-width: 900px) {
            .items-grid {
                grid-template-columns: repeat(2,minmax(0,1fr));
            }

            .stats {
                grid-template-columns: repeat(2,1fr);
            }
        }

        @media (max-width: 760px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 12px 0;
            }

            .nav-links {
                width: 100%;
                flex-wrap: wrap;
                gap: 12px;
            }

            .notification-panel {
                right: auto;
                left: 0;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: 92%;
                margin: 25px auto;
            }

            .heading h2 {
                font-size: 25px;
            }

            .items-grid,
            .stats {
                grid-template-columns: 1fr;
            }

            .items-section {
                padding: 17px;
            }
        }

        /* MY ITEMS: 3 cards normally, 2 cards with a compact details box */
        .my-items-layout { display: grid; grid-template-columns: minmax(0, 1fr); gap: 18px; align-items: start; }
        .my-items-list { min-width: 0; }
        .my-items-layout .items-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .my-items-layout .item-card { min-width: 0; }
        .my-item-preview-trigger { border: none; font: inherit; cursor: pointer; }
        .my-items-layout .item-card.is-preview-selected { border-color: var(--green); box-shadow: 0 0 0 2px rgba(71,120,91,.16); }
        .my-items-layout.has-preview { grid-template-columns: minmax(0, 1fr) 310px; }
        .my-items-layout.has-preview .items-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 13px; }
        .my-items-layout.has-preview .item-content { padding: 12px; }
        .my-items-layout.has-preview .item-image,
        .my-items-layout.has-preview .image-placeholder { height: 145px; }
        .my-preview-panel {
            display: none; position: sticky; top: 90px; max-height: calc(100vh - 110px);
            overflow: hidden; min-width: 0; border: 1px solid var(--border);
            background: white; border-radius: 14px;
            box-shadow: 0 8px 24px rgba(41,77,56,.08);
        }
        .my-items-layout.has-preview .my-preview-panel { display: flex; flex-direction: column; }
        .my-preview-header { display: flex; justify-content: space-between; align-items: center; padding: 12px 15px; border-bottom: 1px solid var(--border); }
        .my-preview-header strong { color: var(--dark-green); font-size: 14px; }
        .my-preview-header button { width: 30px; height: 30px; border: none; border-radius: 50%; background: var(--sage); color: var(--dark-green); }
        .my-preview-scroll { overflow-y: auto; min-height: 0; }
        .my-preview-photo { margin: 12px; border-radius: 10px; overflow: hidden; background: var(--sage); }
        .my-preview-photo img { width: 100%; max-height: 210px; object-fit: contain; display: block; }
        .my-preview-placeholder { height: 180px; display: grid; place-items: center; font-size: 50px; }
        .my-preview-details { padding: 5px 16px 20px; }
        .my-preview-type { display: inline-block; border-radius: 99px; padding: 6px 10px; background: var(--sage); color: var(--dark-green); font-size: 12px; font-weight: 700; }
        .my-preview-details h3 { font-size: 21px; color: var(--dark-green); margin: 12px 0; overflow-wrap: anywhere; }
        .my-preview-price { color: var(--green); font-weight: 750; font-size: 21px; margin-bottom: 10px; }
        .my-preview-field { padding: 10px 0; border-bottom: 1px solid var(--border); overflow-wrap: anywhere; }
        .my-preview-field small { display: block; color: var(--muted); font-size: 12px; margin-bottom: 4px; }
        .my-preview-field strong { color: var(--text); font-size: 14px; font-weight: 650; }
        .my-preview-details h4 { color: var(--dark-green); margin: 18px 0 7px; }
        .my-preview-description { color: var(--text); font-size: 14px; line-height: 1.7; white-space: pre-line; overflow-wrap: anywhere; }
        .my-preview-edit { display: block; background: var(--green); color: white; text-align: center; padding: 12px; margin-top: 18px; border-radius: 9px; font-size: 14px; font-weight: 700; }
        .my-preview-edit:hover { background: var(--dark-green); color: white; }
        @media (max-width: 1050px) {
            .my-items-layout.has-preview { grid-template-columns: minmax(0,1fr) 275px; }
            .my-items-layout.has-preview .items-grid { grid-template-columns: repeat(2,minmax(0,1fr)); }
        }
        @media (max-width: 760px) {
            .my-items-layout.has-preview { grid-template-columns: minmax(0,1fr); }
            .my-preview-panel { position: static; max-height: 430px; }
            .my-items-layout.has-preview .my-preview-panel { grid-row: 1; }
        }
        @media (max-width: 600px) {
            .my-items-layout .items-grid { grid-template-columns: 1fr; }
            .my-items-layout.has-preview .items-grid { grid-template-columns: repeat(2,minmax(0,1fr)); }
            .my-items-layout.has-preview .item-actions { flex-wrap: wrap; }
            .my-items-layout.has-preview .item-actions > * { min-width: 100%; }
        }
    </style>
</head>

<body>

    {{-- ===== HEADER ===== --}}

    <header class="site-header">
        <div class="navbar">

            <a href="{{ route('home') }}" class="brand">
                <span class="brand-icon">🌿</span>
                Neighbourhood
            </a>

            <nav class="nav-links">

                <a href="{{ route('home') }}">
                    Home
                </a>

                <a href="{{ route('community.index') }}">
                    Marketplace
                </a>

                @auth
                    @php
                        $incomingRequests = \App\Models\BorrowBooking::with([
                            'communityItem',
                            'borrower'
                        ])
                        ->whereHas('communityItem', function ($query) {
                            $query->where('user_id', auth()->id());
                        })
                        ->where('status', 'pending')
                        ->latest()
                        ->take(5)
                        ->get();

                        $incomingCount = \App\Models\BorrowBooking::whereHas(
                            'communityItem',
                            function ($query) {
                                $query->where('user_id', auth()->id());
                            }
                        )
                        ->where('status', 'pending')
                        ->count();

                        $myUpdates = \App\Models\BorrowBooking::with('communityItem')
                            ->where('borrower_id', auth()->id())
                            ->whereIn('status', ['approved', 'rejected'])
                            ->latest('updated_at')
                            ->take(5)
                            ->get();

                        $myUpdatesCount = \App\Models\BorrowBooking::where(
                            'borrower_id',
                            auth()->id()
                        )
                        ->whereIn('status', ['approved', 'rejected'])
                        ->count();

                        $notificationCount = $incomingCount + $myUpdatesCount;
                    @endphp

                    {{-- Notification Bell --}}

                    <details class="notification-dropdown">

                        <summary
                            class="notification-bell"
                            aria-label="Notifications"
                        >
                            🔔

                            @if ($notificationCount > 0)
                                <span class="notification-badge">
                                    {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                                </span>
                            @endif
                        </summary>

                        <div class="notification-panel">

                            <div class="notification-panel-title">
                                Notifications
                            </div>

                            @foreach ($incomingRequests as $booking)

                                <a
                                    href="{{ route('borrow.owner-requests') }}"
                                    class="notification-entry"
                                >
                                    <strong>📦 New Borrow Request</strong>

                                    <span>
                                        {{ $booking->borrower?->name ?? 'A neighbour' }}
                                        wants to borrow
                                        {{ $booking->communityItem?->name ?? 'your item' }}.
                                    </span>
                                </a>

                            @endforeach

                            @foreach ($myUpdates as $booking)

                                <a
                                    href="{{ route('borrow.my-requests') }}"
                                    class="notification-entry"
                                >
                                    <strong>
                                        {{ $booking->status === 'approved'
                                            ? '✅ Booking Approved'
                                            : '❌ Booking Rejected' }}
                                    </strong>

                                    <span>
                                        Your request for
                                        {{ $booking->communityItem?->name ?? 'an item' }}
                                        was {{ $booking->status }}.
                                    </span>
                                </a>

                            @endforeach

                            @if ($incomingRequests->isEmpty() && $myUpdates->isEmpty())

                                <p class="notification-empty">
                                    No notifications yet 🌿
                                </p>

                            @endif

                            <div class="notification-footer">

                                <a href="{{ route('borrow.owner-requests') }}">
                                    Received Requests →
                                </a>

                                <a href="{{ route('borrow.my-requests') }}">
                                    My Borrow Requests →
                                </a>

                            </div>

                        </div>
                    </details>

                    {{-- Avatar --}}

                    <button
                        type="button"
                        class="user-trigger"
                        id="drawerOpen"
                        aria-haspopup="dialog"
                        aria-controls="userDrawer"
                        aria-expanded="false"
                    >
                        <span class="avatar-sm">
                            {{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                        </span>

                        <span>
                            Hi, {{ Auth::user()->name }} 🌿
                        </span>
                    </button>

                @else

                    <a href="{{ route('login') }}">
                        Log In
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="nav-btn nav-btn-primary"
                    >
                        Sign Up
                    </a>

                @endauth

            </nav>

        </div>
    </header>

    {{-- ===== SIDE DRAWER ===== --}}

    @auth

        <div class="drawer-overlay" id="drawerOverlay"></div>

        <aside
            class="drawer"
            id="userDrawer"
            role="dialog"
            aria-modal="true"
            aria-label="User menu"
            aria-hidden="true"
        >

            <button
                type="button"
                class="drawer-close"
                id="drawerClose"
                aria-label="Close menu"
            >
                ✕
            </button>

            <div class="drawer-profile">

                <div class="avatar-lg">
                    {{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                </div>

                <h2>{{ Auth::user()->name }}</h2>

                <p>
                    Neighbourhood Community Member 🌿
                </p>

            </div>

            <nav class="drawer-nav">

                {{-- My Items --}}

                <a
                    href="{{ route('community.my-items') }}"
                    class="drawer-link active"
                >
                    <span>📦</span>
                    My Items
                </a>

                <a
                    href="{{ route('events.mine') }}"
                    class="drawer-link"
                    aria-current="page"
                >
                    <span>📅</span>
                    My Events
                </a>

                {{-- My Complaints - Coming Soon --}}

                <div class="drawer-link drawer-coming-soon">
                    <span>📋</span>
                    My Complaints
                    <span class="soon-tag">Soon</span>
                </div>

                {{-- Messages - Coming Soon --}}

                <div class="drawer-link drawer-coming-soon">
                    <span>💬</span>
                    Messages
                    <span class="soon-tag">Soon</span>
                </div>

                {{-- Settings - Coming Soon --}}

                <div class="drawer-link drawer-coming-soon">
                    <span>⚙️</span>
                    Settings
                    <span class="soon-tag">Soon</span>
                </div>

            </nav>

            <div class="drawer-bottom">

                <div class="drawer-card">
                    <span class="big">🌱</span>

                    Better together.

                    <small>
                        Share more, waste less, and grow your community.
                    </small>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="drawer-logout">
                        Log Out
                    </button>
                </form>

            </div>

        </aside>

    @endauth

    {{-- ===== MY ITEMS PAGE ===== --}}

    <main class="container">

        <div class="heading">

            <div>
                <h2>My Items</h2>

                <p>
                    Manage the items you share with your community.
                </p>
            </div>

            <a href="{{ route('community.create') }}" class="btn">
                + Add New Item
            </a>

        </div>

        {{-- Success Message --}}

        @if (session('success'))

            <div class="message">
                {{ session('success') }}
            </div>

        @endif

        {{-- Statistics --}}

        <section class="stats">

            <div class="stat-card">
                <p>Total My Items</p>

                <h3>{{ $items->total() }}</h3>
            </div>

            <div class="stat-card">
                <p>Available Items</p>

                <h3>
                    {{ $items->getCollection()->where('status', 'available')->count() }}
                </h3>
            </div>

            <div class="stat-card">
                <p>Other Statuses</p>

                <h3>
                    {{ $items->getCollection()->where('status', '!=', 'available')->count() }}
                </h3>
            </div>

        </section>

        {{-- Item List --}}

        <section class="items-section">

            <div class="section-heading">

                <h3>My Item List</h3>

                <span class="item-count">
                    {{ $items->total() }} item(s) in total
                </span>

            </div>

            @if ($items->count() > 0)

                <div class="my-items-layout">
                <div class="my-items-list">
                <div class="items-grid">

                    @foreach ($items as $item)

                        <article class="item-card">

                            @if ($item->image_path)

                                <img
                                    src="{{ asset('storage/' . $item->image_path) }}"
                                    alt="{{ $item->name }}"
                                    class="item-image"
                                >

                            @else

                                <div class="image-placeholder">
                                    📦
                                </div>

                            @endif

                            <div class="item-content">

                                <span class="status">
                                    {{ ucfirst(str_replace('_', ' ', $item->status)) }}
                                </span>

                                <h4>{{ $item->name }}</h4>

                                <p>
                                    <strong>Category:</strong>
                                    {{ $item->category }}
                                </p>

                                <p>
                                    <strong>Type:</strong>
                                    {{ ucfirst(str_replace('_', ' ', $item->type)) }}
                                </p>

                                @if ($item->type === 'sell' && $item->price !== null)

                                    <p>
                                        <strong>Price:</strong>
                                        RM {{ number_format((float) $item->price, 2) }}
                                    </p>

                                @endif

                                <p>
                                    <strong>Location:</strong>
                                    {{ $item->location }}
                                </p>

                                {{-- View, Edit, Delete --}}

                                <div class="item-actions">

                                    <button type="button" class="action-btn view-btn my-item-preview-trigger"
                                            data-preview-id="{{ $item->id }}"
                                            aria-controls="myItemPreviewPanel" aria-expanded="false">
                                        View
                                    </button>

                                    <a
                                        href="{{ route('community.edit', ['item' => $item->id, 'from' => 'my-items']) }}"
                                        class="action-btn edit-btn"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('community.destroy', $item) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this item?');"
                                        style="flex:1;"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn delete-btn"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </div>

                            <template id="my-item-preview-{{ $item->id }}">
                                <div class="my-preview-photo">
                                    @if ($item->image_path)
                                        <img src="{{ asset('storage/' . $item->image_path) }}"
                                             alt="{{ $item->name }}">
                                    @else
                                        <div class="my-preview-placeholder">📦</div>
                                    @endif
                                </div>
                                <div class="my-preview-details">
                                    <span class="my-preview-type">
                                        @switch($item->type)
                                            @case('give_away') 🎁 Give Away @break
                                            @case('borrow') 🤝 Borrow @break
                                            @case('sell') 🏷️ For Sale @break
                                            @default {{ ucfirst(str_replace('_', ' ', $item->type)) }}
                                        @endswitch
                                    </span>
                                    <h3>{{ $item->name }}</h3>
                                    @if ($item->type === 'sell' && $item->price !== null)
                                        <div class="my-preview-price">RM {{ number_format((float) $item->price, 2) }}</div>
                                    @endif
                                    <div class="my-preview-field"><small>Category</small><strong>{{ $item->category }}</strong></div>
                                    <div class="my-preview-field"><small>Location</small><strong>{{ $item->location ?: 'Not specified' }}</strong></div>
                                    <div class="my-preview-field"><small>Shared by</small><strong>{{ $item->user?->name ?? auth()->user()?->name ?? 'Community Member' }}</strong></div>
                                    <div class="my-preview-field"><small>Status</small><strong>{{ ucfirst(str_replace('_', ' ', $item->status)) }}</strong></div>
                                    <h4>About this item</h4>
                                    <p class="my-preview-description">{{ $item->description ?: 'No description provided.' }}</p>
                                    <a href="{{ route('community.edit', ['item' => $item->id, 'from' => 'my-items']) }}"
                                       class="my-preview-edit">✏️ Edit Item</a>
                                </div>
                            </template>
                        </article>

                    @endforeach

                </div>

                <div class="pagination">
                    {{ $items->links() }}
                </div>
                </div>
                <aside class="my-preview-panel" id="myItemPreviewPanel"
                       aria-label="Item details" aria-hidden="true">
                    <div class="my-preview-header">
                        <strong>Item Details</strong>
                        <button type="button" id="myPreviewClose" aria-label="Close item details">✕</button>
                    </div>
                    <div id="myPreviewContent" class="my-preview-scroll"></div>
                </aside>
                </div>

            @else

                <div class="empty-state">

                    <div class="icon">📦</div>

                    <h3>You haven't added any items yet</h3>

                    <p>
                        Start sharing, giving away, or selling items
                        to your community.
                    </p>

                    <a href="{{ route('community.create') }}" class="btn">
                        + Add Your First Item
                    </a>

                </div>

            @endif

        </section>

    </main>

    {{-- ===== DRAWER JAVASCRIPT ===== --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const openBtn = document.getElementById('drawerOpen');
            const closeBtn = document.getElementById('drawerClose');
            const overlay = document.getElementById('drawerOverlay');
            const drawer = document.getElementById('userDrawer');

            if (!openBtn || !closeBtn || !overlay || !drawer) {
                return;
            }

            function openDrawer() {
                document.body.classList.add('drawer-open');
                openBtn.setAttribute('aria-expanded', 'true');
                drawer.setAttribute('aria-hidden', 'false');
                closeBtn.focus();
            }

            function closeDrawer() {
                document.body.classList.remove('drawer-open');
                openBtn.setAttribute('aria-expanded', 'false');
                drawer.setAttribute('aria-hidden', 'true');
                openBtn.focus();
            }

            openBtn.addEventListener('click', openDrawer);
            closeBtn.addEventListener('click', closeDrawer);
            overlay.addEventListener('click', closeDrawer);

            document.addEventListener('keydown', function (event) {
                if (
                    event.key === 'Escape' &&
                    document.body.classList.contains('drawer-open')
                ) {
                    closeDrawer();
                }
            });

        });

        document.addEventListener('DOMContentLoaded', function () {
            const layout = document.querySelector('.my-items-layout');
            const panel = document.getElementById('myItemPreviewPanel');
            const content = document.getElementById('myPreviewContent');
            const closeButton = document.getElementById('myPreviewClose');
            if (!layout || !panel || !content || !closeButton) return;
            let activeButton = null;
            function closePreview() {
                layout.classList.remove('has-preview');
                panel.setAttribute('aria-hidden', 'true');
                layout.querySelectorAll('.is-preview-selected').forEach(card => card.classList.remove('is-preview-selected'));
                if (activeButton) {
                    activeButton.setAttribute('aria-expanded', 'false');
                    activeButton.focus();
                    activeButton = null;
                }
            }
            layout.querySelectorAll('.my-item-preview-trigger').forEach(button => {
                button.addEventListener('click', function () {
                    const template = document.getElementById('my-item-preview-' + button.dataset.previewId);
                    if (!template) return;
                    if (activeButton) activeButton.setAttribute('aria-expanded', 'false');
                    layout.querySelectorAll('.is-preview-selected').forEach(card => card.classList.remove('is-preview-selected'));
                    content.replaceChildren(template.content.cloneNode(true));
                    layout.classList.add('has-preview');
                    panel.setAttribute('aria-hidden', 'false');
                    button.setAttribute('aria-expanded', 'true');
                    button.closest('.item-card').classList.add('is-preview-selected');
                    activeButton = button;
                    content.scrollTop = 0;
                });
            });
            closeButton.addEventListener('click', closePreview);
            document.addEventListener('keydown', event => {
                if (event.key === 'Escape' && layout.classList.contains('has-preview')
                    && !document.body.classList.contains('drawer-open')) closePreview();
            });
        });
    </script>

</body>
</html>