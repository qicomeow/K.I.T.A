<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Events | NeighbourLink</title>

    <style>
        :root {
            --green: #47785b;
            --dark-green: #294d38;
            --sage: #e5ecdc;
            --cream: #F7F5ED;
            --white: #fff;
            --text: #29372D;
            --muted: #788278;
            --border: #E3E7DE;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--text);
            font-family: Arial, sans-serif;
        }

        a { text-decoration: none; }
        button, textarea { font: inherit; }
        button { cursor: pointer; }

        /* HEADER */

        .site-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(8px);
        }

        .navbar {
            width: min(1120px, 92%);
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

        .nav-links > a { color: inherit; }
        .nav-links > a:hover { color: var(--green); }
        .nav-links form { margin: 0; }

        .nav-btn {
            border: 1px solid var(--border);
            background: white;
            color: var(--dark-green);
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 650;
        }

        .nav-btn:hover { background: var(--sage); }

        .nav-btn-primary {
            background: var(--green);
            color: white !important;
            border-color: var(--green);
        }

        /* NOTIFICATIONS */

        .notification-dropdown { position: relative; }

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
            width: 290px;
            max-width: calc(100vw - 24px);
            max-height: 320px;
            overflow-y: auto;
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(41,77,56,.13);
            z-index: 1000;
        }

        .notification-panel-title {
            padding: 12px 14px;
            font-size: 13px;
            font-weight: 750;
            border-bottom: 1px solid var(--border);
        }

        .notification-entry {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: 11px 14px;
            border-bottom: 1px solid var(--border);
        }

        .notification-entry:hover { background: var(--cream); }

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
            gap: 8px;
            padding: 12px 14px;
            background: var(--cream);
        }

        .notification-footer a {
            font-size: 12px;
            font-weight: 700;
            color: var(--green);
        }

        /* USER PROFILE */

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
        }

        .user-trigger:hover { background: var(--sage); }

        .avatar-sm {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--green);
            color: white;
            display: grid;
            place-items: center;
            font-weight: 750;
        }

        /* SIDE DRAWER */

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
            width: min(300px, 86vw);
            background: var(--sage);
            border-radius: 0 30px 30px 0;
            z-index: 100;
            transform: translateX(-105%);
            transition: transform .28s ease;
            padding: 22px 16px 18px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            visibility: hidden;
        }

        body.drawer-open .drawer {
            transform: translateX(0);
            visibility: visible;
        }

        body.drawer-open .drawer-overlay {
            opacity: 1;
            pointer-events: auto;
        }

        .drawer-close {
            align-self: flex-end;
            width: 34px;
            height: 34px;
            border: none;
            border-radius: 50%;
            background: white;
            color: var(--dark-green);
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
            display: grid;
            place-items: center;
            font-size: 40px;
            font-weight: 750;
        }

        .drawer-profile h2 {
            font-size: 19px;
            color: var(--dark-green);
            margin: 0;
            overflow-wrap: anywhere;
        }

        .drawer-profile p {
            color: var(--muted);
            font-size: 13px;
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

        .drawer-link:hover {
            background: rgba(255,255,255,.65);
        }

        .drawer-link.active {
            background: var(--green);
            color: white;
        }

        .drawer-coming-soon {
            opacity: .65;
            cursor: default;
        }

        .soon-tag {
            margin-left: auto;
            background: white;
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
        }

        .drawer-card small {
            display: block;
            color: var(--muted);
            font-size: 12px;
            margin-top: 5px;
        }

        .drawer-logout {
            width: 100%;
            border: none;
            border-radius: 16px;
            padding: 12px;
            background: white;
            color: #a12d2d;
            font-weight: 700;
        }

        /* PAGE */

        .container {
            max-width: 1120px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .subtitle {
            color: var(--muted);
            margin: 0;
            font-size: 14px;
        }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border: none;
            border-radius: 10px;
            padding: 11px 16px;
            background: var(--green);
            color: white;
            font-size: 14px;
            font-weight: 700;
        }

        .button:hover { background: var(--dark-green); }

        .button-secondary {
            background: var(--sage);
            color: var(--dark-green);
        }

        .button-danger { background: #B84040; }
        .button-danger:hover { background: #922E2E; }

        .notice {
            padding: 14px;
            border-radius: 10px;
            background: #E4F2E5;
            color: #285A35;
            margin-bottom: 20px;
        }

        /* STATUS TABS */

        .tabs-wrapper {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 22px;
        }

        .status-tabs {
            display: inline-flex;
            gap: 4px;
            padding: 5px;
            background: #EBEDE9;
            border-radius: 999px;
        }

        .status-tab {
            border: none;
            background: transparent;
            color: #777;
            border-radius: 999px;
            padding: 12px 25px;
            font-size: 14px;
            font-weight: 700;
            transition: .2s;
        }

        .status-tab.active {
            background: white;
            color: var(--dark-green);
            box-shadow: 0 2px 6px rgba(0,0,0,.07);
        }

        /* MAIN TWO-COLUMN LAYOUT */

        .events-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 340px;
            gap: 22px;
            align-items: start;
        }

        .events-list {
            min-width: 0;
        }

        /* EVENT CARDS */

        .event-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            margin-bottom: 12px;
            overflow: hidden;
            transition: .2s;
        }

        .event-card:hover {
            border-color: #c8d7c9;
        }

        .event-card.open {
            box-shadow: 0 8px 24px rgba(41,77,56,.07);
        }

        .event-toggle {
            display: flex;
            align-items: center;
            gap: 15px;
            width: 100%;
            padding: 15px;
            border: none;
            background: transparent;
            text-align: left;
        }

        .event-date-box {
            width: 55px;
            min-width: 55px;
            height: 60px;
            background: var(--sage);
            border-radius: 13px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .event-date-box strong {
            font-size: 22px;
            color: var(--dark-green);
        }

        .event-date-box small {
            font-size: 11px;
            color: var(--green);
            font-weight: 700;
        }

        .event-main {
            flex: 1;
            min-width: 0;
        }

        .event-title {
            display: block;
            font-size: 15px;
            font-weight: 750;
            color: var(--dark-green);
            overflow-wrap: anywhere;
        }

        .event-arrow {
            font-size: 20px;
            color: var(--green);
            transition: transform .2s;
        }

        .event-card.open .event-arrow {
            transform: rotate(180deg);
        }

        .event-content {
            display: none;
            padding: 18px;
            border-top: 1px solid var(--border);
        }

        .event-card.open .event-content {
            display: block;
        }

        .tag {
            display: inline-block;
            border-radius: 999px;
            padding: 5px 9px;
            font-size: 10px;
            font-weight: 700;
            background: #E5F3E6;
            color: #2D713A;
            margin-bottom: 7px;
        }

        .tag-ongoing {
            background: #FFF0CC;
            color: #855B00;
        }

        .tag-ended {
            background: #E8E8E8;
            color: #555;
        }

        .tag-cancelled {
            background: #FBE3E3;
            color: #A22D2D;
        }

        .event-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .info-label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: var(--muted);
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 13px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .description-box {
            background: var(--cream);
            border-radius: 10px;
            padding: 14px;
            margin-bottom: 15px;
        }

        .description-box p {
            margin: 6px 0 0;
            font-size: 13px;
            line-height: 1.7;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .reason {
            background: #FFF0F0;
            color: #8D3030;
            border-radius: 10px;
            padding: 13px;
            font-size: 13px;
            margin-bottom: 15px;
            overflow-wrap: anywhere;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            padding-top: 14px;
            border-top: 1px solid var(--border);
        }

        .empty {
            padding: 45px 20px;
            text-align: center;
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            color: var(--muted);
        }

        /* CALENDAR - RIGHT SIDE */

        .calendar-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 20px;
            position: sticky;
            top: 95px;
        }

        .calendar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 18px;
        }

        .calendar-title {
            font-size: 15px;
            font-weight: 750;
            color: var(--dark-green);
        }

        .calendar-controls {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .calendar-btn {
            border: 1px solid var(--border);
            background: white;
            color: var(--dark-green);
            border-radius: 999px;
            min-width: 30px;
            height: 30px;
            padding: 0 8px;
            font-size: 12px;
            font-weight: 700;
        }

        .calendar-btn:hover { background: var(--sage); }

        .calendar-weekdays,
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, minmax(0, 1fr));
            gap: 5px;
        }

        .calendar-weekdays {
            margin-bottom: 10px;
        }

        .calendar-weekdays span {
            text-align: center;
            font-size: 11px;
            font-weight: 700;
            color: var(--muted);
        }

        .calendar-day {
            aspect-ratio: 1;
            min-height: 34px;
            border: none;
            background: transparent;
            border-radius: 50%;
            color: var(--text);
            font-size: 12px;
            position: relative;
            display: grid;
            place-items: center;
        }

        .calendar-day:disabled {
            cursor: default;
        }

        .calendar-day.has-event {
            background: var(--sage);
            color: var(--dark-green);
            font-weight: 700;
        }

        .calendar-day.has-event::after {
            content: '';
            position: absolute;
            width: 5px;
            height: 5px;
            background: var(--green);
            border-radius: 50%;
            bottom: 3px;
        }

        .calendar-day.today {
            outline: 1px solid var(--green);
        }

        .calendar-day.selected {
            background: var(--green);
            color: white;
        }

        .calendar-day.selected::after {
            background: white;
        }

        .calendar-day:not(:disabled):hover {
            background: #d5e2ce;
            color: var(--dark-green);
        }

        .calendar-note {
            font-size: 12px;
            color: var(--muted);
            margin: 18px 0 0;
            line-height: 1.6;
        }

        .calendar-selection {
            display: none;
            margin-top: 15px;
            padding: 12px;
            background: var(--cream);
            border-radius: 10px;
            font-size: 12px;
        }

        .calendar-selection.show { display: block; }

        .calendar-selection strong {
            color: var(--dark-green);
        }

        .calendar-event-link {
            display: block;
            border: none;
            background: transparent;
            color: var(--green);
            text-align: left;
            padding: 8px 0;
            font-weight: 700;
            width: 100%;
        }

        /* CANCEL POPUP */

        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 200;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(20,39,27,.6);
        }

        .modal-overlay.show { display: flex; }

        .modal-box {
            width: 100%;
            max-width: 470px;
            max-height: 90vh;
            overflow-y: auto;
            background: white;
            border-radius: 20px;
            padding: 26px;
            box-shadow: 0 20px 60px rgba(0,0,0,.2);
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 21px;
            color: var(--dark-green);
        }

        .modal-close {
            border: none;
            background: var(--sage);
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        .modal-event-name {
            padding: 13px;
            border-radius: 10px;
            background: var(--cream);
            font-size: 14px;
            font-weight: 700;
            color: var(--dark-green);
            margin: 16px 0;
            overflow-wrap: anywhere;
        }

        .modal-label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .modal-textarea {
            width: 100%;
            min-height: 120px;
            padding: 13px;
            border: 1px solid #D7DED5;
            border-radius: 10px;
            resize: vertical;
            outline: none;
        }

        .modal-textarea:focus {
            border-color: var(--green);
        }

        .modal-warning {
            font-size: 12px;
            color: #A14B4B;
            line-height: 1.6;
            margin: 12px 0 20px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        body.modal-open { overflow: hidden; }

        /* RESPONSIVE */

        @media (max-width: 850px) {
            .events-layout {
                grid-template-columns: 1fr;
            }

            .calendar-card {
                position: static;
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

        @media (max-width: 500px) {
            .container { margin-top: 25px; }
            h1 { font-size: 25px; }

            .status-tabs {
                width: 100%;
            }

            .status-tab {
                flex: 1;
                padding: 11px 8px;
                font-size: 12px;
            }

            .event-info {
                grid-template-columns: 1fr;
            }

            .calendar-card { padding: 15px; }
            .modal-box { padding: 20px; }
        }
    </style>
</head>

<body>

    {{-- HEADER --}}

    <header class="site-header">
        <div class="navbar">

            <a href="{{ route('home') }}" class="brand">
                <span class="brand-icon">🌿</span>
                Neighbourhood
            </a>

            <nav class="nav-links">

                <a href="{{ route('home') }}">Home</a>

                <a href="{{ route('community.index') }}">
                    Marketplace
                </a>

                @auth

                    @php
                        $incomingRequests = \App\Models\BorrowBooking::with([
                            'communityItem', 'borrower'
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

                        $myUpdates = \App\Models\BorrowBooking::with(
                            'communityItem'
                        )
                        ->where('borrower_id', auth()->id())
                        ->whereIn('status', ['approved', 'rejected'])
                        ->latest('updated_at')
                        ->take(5)
                        ->get();

                        $myUpdatesCount = \App\Models\BorrowBooking::where(
                            'borrower_id', auth()->id()
                        )
                        ->whereIn('status', ['approved', 'rejected'])
                        ->count();

                        $notificationCount = $incomingCount + $myUpdatesCount;
                    @endphp

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

                            @if (
                                $incomingRequests->isEmpty() &&
                                $myUpdates->isEmpty()
                            )
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

                    <button
                        type="button"
                        class="user-trigger"
                        id="drawerOpen"
                        aria-expanded="false"
                    >
                        <span class="avatar-sm">
                            {{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                        </span>

                        <span>
                            Hi, {{ Auth::user()->name }} 🌿
                        </span>
                    </button>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-btn">
                            Log Out
                        </button>
                    </form>

                @else

                    <a href="{{ route('login') }}">Log In</a>

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

    {{-- SIDE DRAWER --}}

    @auth

        <div
            class="drawer-overlay"
            id="drawerOverlay"
        ></div>

        <aside
            class="drawer"
            id="userDrawer"
            role="dialog"
            aria-modal="true"
            aria-hidden="true"
            aria-label="User menu"
        >

            <button
                type="button"
                class="drawer-close"
                id="drawerClose"
            >
                ✕
            </button>

            <div class="drawer-profile">

                <div class="avatar-lg">
                    {{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                </div>

                <h2>{{ Auth::user()->name }}</h2>

                <p>Neighbourhood Community Member 🌿</p>

            </div>

            <nav class="drawer-nav">

                <a
                    href="{{ route('community.my-items') }}"
                    class="drawer-link"
                >
                    <span>📦</span> My Items
                </a>

                <a
                    href="{{ url()->current() }}"
                    class="drawer-link active"
                >
                    <span>📅</span> My Events
                </a>

                <div class="drawer-link drawer-coming-soon">
                    <span>📋</span> My Complaints
                    <span class="soon-tag">Soon</span>
                </div>

                <div class="drawer-link drawer-coming-soon">
                    <span>💬</span> Messages
                    <span class="soon-tag">Soon</span>
                </div>

                <div class="drawer-link drawer-coming-soon">
                    <span>⚙️</span> Settings
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

    {{-- MY EVENTS PAGE --}}

    <main class="container">

        <div class="heading">

            <div>
                <h1>My Events</h1>

                <p class="subtitle">
                    Manage the community events you created.
                </p>
            </div>

            <a
                href="{{ route('events.create') }}"
                class="button"
            >
                + Create Event
            </a>

        </div>

        @if (session('success'))
            <div class="notice">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div
                class="notice"
                style="background:#FBE3E3;color:#922E2E;"
            >
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- STATUS TABS --}}

        <div class="tabs-wrapper">

            <div class="status-tabs" role="tablist">

                <button
                    type="button"
                    class="status-tab active"
                    data-tab="upcoming"
                    onclick="changeTab('upcoming')"
                    role="tab"
                    aria-selected="true"
                >
                    Upcoming
                </button>

                <button
                    type="button"
                    class="status-tab"
                    data-tab="ended"
                    onclick="changeTab('ended')"
                    role="tab"
                    aria-selected="false"
                >
                    Ended
                </button>

                <button
                    type="button"
                    class="status-tab"
                    data-tab="cancelled"
                    onclick="changeTab('cancelled')"
                    role="tab"
                    aria-selected="false"
                >
                    Cancelled
                </button>

            </div>

        </div>

        {{-- TWO COLUMN LAYOUT --}}

        <div class="events-layout">

            {{-- LEFT: EVENT LIST --}}

            <section class="events-list" id="eventsList">

                @forelse ($events as $event)

                    @php
                        $status = $event->current_status;

                        $statusLabel = match ($status) {
                            'upcoming' => 'UPCOMING',
                            'ongoing' => 'ONGOING',
                            'ended' => 'ENDED',
                            'cancelled' => 'CANCELLED',
                            default => strtoupper($status),
                        };

                        $statusClass = match ($status) {
                            'ongoing' => 'tag-ongoing',
                            'ended', 'archived' => 'tag-ended',
                            'cancelled' => 'tag-cancelled',
                            default => '',
                        };

                        $eventTab = match ($status) {
                            'cancelled' => 'cancelled',
                            'ended', 'archived' => 'ended',
                            default => 'upcoming',
                        };
                    @endphp

                    <article
                        class="event-card"
                        id="event-{{ $event->id }}"
                        data-status="{{ $eventTab }}"
                        data-start="{{ $event->start_date?->format('Y-m-d') }}"
                        data-end="{{ $event->end_date?->format('Y-m-d') }}"
                        data-title="{{ $event->title }}"
                        data-cancel-url="{{ route('events.cancel', $event) }}"
                        @if ($eventTab !== 'upcoming')
                            hidden
                        @endif
                    >

                        {{-- COMPACT TITLE --}}

                        <button
                            type="button"
                            class="event-toggle"
                            onclick="toggleEvent({{ $event->id }})"
                            aria-expanded="false"
                            aria-controls="event-details-{{ $event->id }}"
                        >

                            <span class="event-date-box">

                                <strong>
                                    {{ $event->start_date?->format('d') ?? '--' }}
                                </strong>

                                <small>
                                    {{ $event->start_date?->format('M') ?? '---' }}
                                </small>

                            </span>

                            <span class="event-main">

                                <span class="tag {{ $statusClass }}">
                                    {{ $statusLabel }}
                                </span>

                                <span class="event-title">
                                    {{ $event->title }}
                                </span>

                            </span>

                            <span class="event-arrow">⌄</span>

                        </button>

                        {{-- EXPANDABLE DETAILS --}}

                        <div
                            class="event-content"
                            id="event-details-{{ $event->id }}"
                        >

                            <div class="event-info">

                                <div>
                                    <span class="info-label">📅 Start Date</span>
                                    <div class="info-value">
                                        {{ $event->start_date?->format('d M Y, g:i A') ?? 'Not available' }}
                                    </div>
                                </div>

                                <div>
                                    <span class="info-label">📅 End Date</span>
                                    <div class="info-value">
                                        {{ $event->end_date?->format('d M Y, g:i A') ?? 'Not available' }}
                                    </div>
                                </div>

                                <div>
                                    <span class="info-label">📍 Location</span>
                                    <div class="info-value">
                                        {{ $event->location ?: 'Not specified' }}
                                    </div>
                                </div>

                                <div>
                                    <span class="info-label">🏷️ Category</span>
                                    <div class="info-value">
                                        {{ $event->category ?: 'Not specified' }}
                                    </div>
                                </div>

                            </div>

                            @if ($event->description)
                                <div class="description-box">
                                    <span class="info-label">
                                        📝 Description
                                    </span>
                                    <p>{{ $event->description }}</p>
                                </div>
                            @endif

                            @if (
                                $event->status === 'cancelled' &&
                                $event->cancellation_reason
                            )
                                <div class="reason">
                                    <strong>Cancellation Reason:</strong>
                                    <div>
                                        {{ $event->cancellation_reason }}
                                    </div>
                                </div>
                            @endif

                            @if ($event->status !== 'cancelled')

                                <div class="actions">

                                    <a
                                        href="{{ route('events.edit', $event) }}"
                                        class="button button-secondary"
                                    >
                                        ✏️ Edit Event
                                    </a>

                                    <button
                                        type="button"
                                        class="button button-danger"
                                        onclick="openCancelModal({{ $event->id }})"
                                    >
                                        ✕ Cancel Event
                                    </button>

                                </div>

                            @endif

                        </div>

                    </article>

                @empty
                @endforelse

                <div class="empty" id="emptyState" hidden>
                    <h3 id="emptyTitle">No upcoming events 🌱</h3>
                    <p id="emptyMessage">
                        No events found in this category.
                    </p>
                </div>

            </section>

            {{-- RIGHT: CALENDAR --}}

            <aside class="calendar-card">

                <div class="calendar-header">

                    <span
                        class="calendar-title"
                        id="calendarMonthTitle"
                    >
                        Calendar
                    </span>

                    <div class="calendar-controls">

                        <button
                            type="button"
                            class="calendar-btn"
                            onclick="changeMonth(-1)"
                            aria-label="Previous month"
                        >
                            ‹
                        </button>

                        <button
                            type="button"
                            class="calendar-btn"
                            onclick="goToday()"
                        >
                            Today
                        </button>

                        <button
                            type="button"
                            class="calendar-btn"
                            onclick="changeMonth(1)"
                            aria-label="Next month"
                        >
                            ›
                        </button>

                    </div>

                </div>

                <div class="calendar-weekdays">
                    <span>M</span>
                    <span>T</span>
                    <span>W</span>
                    <span>T</span>
                    <span>F</span>
                    <span>S</span>
                    <span>S</span>
                </div>

                <div
                    class="calendar-grid"
                    id="calendarGrid"
                ></div>

                <p class="calendar-note">
                    🌿 Highlighted dates have events.
                    Click a date to view its events.
                </p>

                <div
                    class="calendar-selection"
                    id="calendarSelection"
                    aria-live="polite"
                >
                    <strong id="selectedDateTitle"></strong>

                    <div id="selectedDateEvents"></div>
                </div>

            </aside>

        </div>

    </main>

    {{-- CANCEL EVENT POPUP --}}

    <div
        class="modal-overlay"
        id="cancelModal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="cancelModalTitle"
        aria-hidden="true"
    >

        <div class="modal-box">

            <div class="modal-header">

                <h2 id="cancelModalTitle">
                    Cancel Event
                </h2>

                <button
                    type="button"
                    class="modal-close"
                    onclick="closeCancelModal()"
                    aria-label="Close popup"
                >
                    ✕
                </button>

            </div>

            <p style="font-size:14px;color:var(--muted);line-height:1.6;">
                Are you sure you want to cancel this event?
                Please provide a reason.
            </p>

            <div
                class="modal-event-name"
                id="cancelEventTitle"
            ></div>

            <form
                id="cancelEventForm"
                method="POST"
            >
                @csrf
                @method('DELETE')

                <label
                    class="modal-label"
                    for="cancellationReason"
                >
                    Reason for Cancellation *
                </label>

                <textarea
                    id="cancellationReason"
                    name="cancellation_reason"
                    class="modal-textarea"
                    placeholder="Explain why you want to cancel this event..."
                    required
                    maxlength="2000"
                ></textarea>

                <p class="modal-warning">
                    ⚠️ Please make sure your reason is correct
                    before submitting.
                </p>

                <div class="modal-actions">

                    <button
                        type="button"
                        class="button button-secondary"
                        onclick="closeCancelModal()"
                    >
                        Back
                    </button>

                    <button
                        type="submit"
                        class="button button-danger"
                        id="submitCancellation"
                    >
                        Submit Cancellation
                    </button>

                </div>

            </form>

        </div>

    </div>

    {{-- JAVASCRIPT --}}

    <script>
        let activeTab = 'upcoming';
        let selectedDate = null;

        const now = new Date();

        let calendarYear = now.getFullYear();
        let calendarMonth = now.getMonth();

        const eventCards = [];

        function localDateString(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');

            return `${year}-${month}-${day}`;
        }

        document.addEventListener('DOMContentLoaded', function () {

            // COLLECT EVENTS FROM BLADE

            document.querySelectorAll('.event-card').forEach(card => {
                eventCards.push({
                    id: card.id.replace('event-', ''),
                    title: card.dataset.title,
                    status: card.dataset.status,
                    start: card.dataset.start,
                    end: card.dataset.end
                });
            });

            // SIDE DRAWER

            const openBtn = document.getElementById('drawerOpen');
            const closeBtn = document.getElementById('drawerClose');
            const overlay = document.getElementById('drawerOverlay');
            const drawer = document.getElementById('userDrawer');

            function closeDrawer() {
                if (!drawer) return;

                document.body.classList.remove('drawer-open');
                openBtn.setAttribute('aria-expanded', 'false');
                drawer.setAttribute('aria-hidden', 'true');
            }

            if (openBtn && closeBtn && overlay && drawer) {

                openBtn.addEventListener('click', () => {
                    document.body.classList.add('drawer-open');
                    openBtn.setAttribute('aria-expanded', 'true');
                    drawer.setAttribute('aria-hidden', 'false');
                    closeBtn.focus();
                });

                closeBtn.addEventListener('click', closeDrawer);
                overlay.addEventListener('click', closeDrawer);
            }

            // CANCEL POPUP

            const modal = document.getElementById('cancelModal');

            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    closeCancelModal();
                }
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    if (modal.classList.contains('show')) {
                        closeCancelModal();
                    } else {
                        closeDrawer();
                    }
                }
            });

            const form = document.getElementById('cancelEventForm');
            const textarea = document.getElementById('cancellationReason');

            textarea.addEventListener('input', function () {
                this.setCustomValidity('');
            });

            form.addEventListener('submit', function (event) {
                if (!textarea.value.trim()) {
                    event.preventDefault();

                    textarea.setCustomValidity(
                        'Please enter a cancellation reason.'
                    );

                    textarea.reportValidity();
                    return;
                }

                const submitBtn = document.getElementById(
                    'submitCancellation'
                );

                submitBtn.disabled = true;
                submitBtn.textContent = 'Submitting...';
            });

            changeTab('upcoming');
        });

        // STATUS TABS

        function changeTab(tab) {

            activeTab = tab;
            selectedDate = null;

            document.querySelectorAll('.status-tab').forEach(button => {
                const isActive = button.dataset.tab === tab;

                button.classList.toggle('active', isActive);
                button.setAttribute(
                    'aria-selected',
                    isActive ? 'true' : 'false'
                );
            });

            document.getElementById('calendarSelection')
                .classList.remove('show');

            filterEvents();
            renderCalendar();
        }

        function filterEvents() {

            let visibleCount = 0;

            document.querySelectorAll('.event-card').forEach(card => {

                const show = card.dataset.status === activeTab;

                card.hidden = !show;
                card.style.display = show ? '' : 'none';

                if (show) visibleCount++;
            });

            const empty = document.getElementById('emptyState');

            empty.hidden = visibleCount > 0;

            const titles = {
                upcoming: 'No upcoming events 🌱',
                ended: 'No ended events 📅',
                cancelled: 'No cancelled events 🌿'
            };

            document.getElementById('emptyTitle').textContent =
                titles[activeTab];
        }

        // EVENT ACCORDION

        function toggleEvent(id) {

            const card = document.getElementById('event-' + id);

            if (!card) return;

            const wasOpen = card.classList.contains('open');

            document.querySelectorAll('.event-card').forEach(item => {
                item.classList.remove('open');

                const button = item.querySelector('.event-toggle');

                if (button) {
                    button.setAttribute('aria-expanded', 'false');
                }
            });

            if (!wasOpen) {
                card.classList.add('open');

                card.querySelector('.event-toggle')
                    .setAttribute('aria-expanded', 'true');
            }
        }

        // CALENDAR

        function changeMonth(direction) {

            calendarMonth += direction;

            if (calendarMonth > 11) {
                calendarMonth = 0;
                calendarYear++;
            }

            if (calendarMonth < 0) {
                calendarMonth = 11;
                calendarYear--;
            }

            selectedDate = null;

            document.getElementById('calendarSelection')
                .classList.remove('show');

            renderCalendar();
        }

        function goToday() {

            const today = new Date();

            calendarYear = today.getFullYear();
            calendarMonth = today.getMonth();

            selectedDate = null;

            document.getElementById('calendarSelection')
                .classList.remove('show');

            renderCalendar();
        }

        function eventOccursOn(event, dateString) {

            if (!event.start) return false;

            // An event can span multiple calendar dates.

            const start = event.start;
            const end = event.end || event.start;

            return dateString >= start &&
                   dateString <= end;
        }

        function getEventsForDate(dateString) {

            return eventCards.filter(event => {
                return event.status === activeTab &&
                       eventOccursOn(event, dateString);
            });
        }

        function renderCalendar() {

            const grid = document.getElementById('calendarGrid');
            const title = document.getElementById('calendarMonthTitle');

            if (!grid || !title) return;

            grid.innerHTML = '';

            const monthName = new Date(
                calendarYear,
                calendarMonth,
                1
            ).toLocaleDateString('en-GB', {
                month: 'long',
                year: 'numeric'
            });

            title.textContent = monthName;

            const firstDay = new Date(
                calendarYear,
                calendarMonth,
                1
            );

            const daysInMonth = new Date(
                calendarYear,
                calendarMonth + 1,
                0
            ).getDate();

            // Monday as first weekday

            const offset = (firstDay.getDay() + 6) % 7;

            for (let i = 0; i < offset; i++) {
                const blank = document.createElement('span');
                grid.appendChild(blank);
            }

            const todayString = localDateString(new Date());

            for (let day = 1; day <= daysInMonth; day++) {

                const date = new Date(
                    calendarYear,
                    calendarMonth,
                    day
                );

                const dateString = localDateString(date);

                const dayEvents = getEventsForDate(dateString);

                const button = document.createElement('button');

                button.type = 'button';
                button.className = 'calendar-day';
                button.textContent = day;

                if (dateString === todayString) {
                    button.classList.add('today');
                }

                if (dayEvents.length > 0) {
                    button.classList.add('has-event');
                }

                if (dateString === selectedDate) {
                    button.classList.add('selected');
                }

                button.setAttribute(
                    'aria-label',
                    `${dateString}, ${dayEvents.length} events`
                );

                button.addEventListener('click', function () {
                    selectCalendarDate(dateString);
                });

                grid.appendChild(button);
            }
        }

        function selectCalendarDate(dateString) {

            selectedDate = dateString;

            renderCalendar();

            const selection = document.getElementById(
                'calendarSelection'
            );

            const title = document.getElementById(
                'selectedDateTitle'
            );

            const list = document.getElementById(
                'selectedDateEvents'
            );

            const events = getEventsForDate(dateString);

            const date = new Date(dateString + 'T12:00:00');

            title.textContent = date.toLocaleDateString('en-GB', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });

            list.innerHTML = '';

            if (events.length === 0) {

                const message = document.createElement('p');

                message.textContent = 'No events on this date.';
                message.style.color = 'var(--muted)';

                list.appendChild(message);

            } else {

                events.forEach(event => {

                    const button = document.createElement('button');

                    button.type = 'button';
                    button.className = 'calendar-event-link';
                    button.textContent = '📅 ' + event.title;

                    button.addEventListener('click', function () {
                        openEventFromCalendar(event.id);
                    });

                    list.appendChild(button);
                });
            }

            selection.classList.add('show');
        }

        function openEventFromCalendar(id) {

            const card = document.getElementById('event-' + id);

            if (!card) return;

            document.querySelectorAll('.event-card').forEach(item => {
                item.classList.remove('open');

                const toggle = item.querySelector('.event-toggle');

                if (toggle) {
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });

            card.classList.add('open');

            card.querySelector('.event-toggle')
                .setAttribute('aria-expanded', 'true');

            card.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }

        // CANCEL MODAL

        let previousFocus = null;

        function openCancelModal(id) {

            const card = document.getElementById('event-' + id);

            if (!card) return;

            previousFocus = document.activeElement;

            const modal = document.getElementById('cancelModal');
            const form = document.getElementById('cancelEventForm');
            const reason = document.getElementById('cancellationReason');
            const submitBtn = document.getElementById(
                'submitCancellation'
            );

            // Laravel-generated route from the event card

            form.action = card.dataset.cancelUrl;

            document.getElementById('cancelEventTitle').textContent =
                '📅 ' + card.dataset.title;

            reason.value = '';
            reason.setCustomValidity('');

            submitBtn.disabled = false;
            submitBtn.textContent = 'Submit Cancellation';

            modal.classList.add('show');
            modal.setAttribute('aria-hidden', 'false');

            document.body.classList.add('modal-open');

            reason.focus();
        }

        function closeCancelModal() {

            const modal = document.getElementById('cancelModal');

            modal.classList.remove('show');
            modal.setAttribute('aria-hidden', 'true');

            document.body.classList.remove('modal-open');

            document.getElementById('cancellationReason').value = '';

            if (previousFocus) {
                previousFocus.focus();
            }
        }
    </script>

</body>
</html>