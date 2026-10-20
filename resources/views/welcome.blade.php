<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neighbourhood — Your Community Hub</title>

    <style>
        :root {
            --green: #47785b;
            --dark-green: #294d38;
            --sage: #e5ecdc;
            --cream: #f8f8f1;
            --white: #ffffff;
            --text: #304537;
            --muted: #788579;
            --border: #e6e9df;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; scroll-padding-top: 70px; }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--cream);
            color: var(--text);
            line-height: 1.6;
        }

        a { color: inherit; text-decoration: none; }
        button { font: inherit; cursor: pointer; }
        :focus-visible { outline: 2px solid var(--green); outline-offset: 2px; }

        .container { width: min(1120px, 92%); margin: auto; }

        /* ---------- Header ---------- */
        header {
            background: rgba(255, 255, 255, 0.92);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(8px);
        }

        .navbar {
            min-height: 70px;
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

        .nav-links a:hover { color: var(--green); }
        .nav-links form { display: inline; }
        .nav-user { color: var(--dark-green); font-weight: 650; }

        .btn {
            border: none;
            border-radius: 999px;
            padding: 10px 18px;
            display: inline-block;
            font-size: 14px;
            font-weight: 650;
            transition: 0.2s;
        }

        .btn-primary { background: var(--green); color: white; }
        .btn-primary:hover { background: var(--dark-green); }
        .btn-light { background: white; color: var(--dark-green); border: 1px solid var(--border); }
        .btn-light:hover { background: var(--sage); }

        /* ---------- Notifications ---------- */
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
        .notification-bell::-webkit-details-marker { display: none; }
        .notification-bell:hover { background: #d5e2ce; }

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
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-panel {
            position: absolute;
            top: 50px;
            right: 0;
            width: min(340px, 90vw);
            max-height: 420px;
            overflow-y: auto;
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 12px 35px rgba(41, 77, 56, 0.13);
            z-index: 1000;
            color: var(--text);
        }

        .notification-panel-title {
            padding: 16px;
            font-weight: 750;
            color: var(--dark-green);
            border-bottom: 1px solid var(--border);
        }

        .notification-entry {
            display: flex;
            flex-direction: column;
            gap: 5px;
            padding: 13px 16px;
            border-bottom: 1px solid var(--border);
        }
        .notification-entry:hover { background: var(--cream); }
        .notification-entry strong { font-size: 13px; color: var(--dark-green); }
        .notification-entry span { font-size: 12px; color: var(--muted); line-height: 1.5; }

        .notification-empty { padding: 22px 16px; text-align: center; color: var(--muted); font-size: 13px; }

        .notification-footer {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 14px 16px;
            background: var(--cream);
        }
        .notification-footer a { font-size: 12px; font-weight: 700; color: var(--green); }

        /* ---------- User trigger + side drawer ---------- */
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
            transition: 0.2s;
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
            font-size: 15px;
        }

        .drawer-overlay {
            position: fixed;
            inset: 0;
            background: rgba(41, 77, 56, 0.35);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.25s;
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
            transition: transform 0.28s ease;
            padding: 22px 16px 18px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            box-shadow: 12px 0 40px rgba(41, 77, 56, 0.15);
            visibility: hidden;
        }

        body.drawer-open .drawer { transform: none; visibility: visible; }
        body.drawer-open .drawer-overlay { opacity: 1; pointer-events: auto; }
        body.drawer-open { overflow: hidden; }

        .drawer-close {
            align-self: flex-end;
            width: 34px;
            height: 34px;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.7);
            color: var(--dark-green);
            font-size: 16px;
        }
        .drawer-close:hover { background: white; }

        .drawer-profile { text-align: center; margin: 2px 0 18px; }
        .avatar-lg {
            width: 92px;
            height: 92px;
            margin: 0 auto 12px;
            border-radius: 50%;
            background: var(--green);
            color: white;
            border: 4px solid white;
            box-shadow: 0 8px 18px rgba(41, 77, 56, 0.15);
            display: grid;
            place-items: center;
            font-size: 40px;
            font-weight: 750;
        }
        .drawer-profile h2 { color: var(--dark-green); font-size: 19px; line-height: 1.3; overflow-wrap: anywhere; }
        .drawer-profile p { color: var(--muted); font-size: 13px; }

        .drawer-nav { display: grid; gap: 6px; }

        .drawer-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 16px;
            color: var(--dark-green);
            font-weight: 650;
            font-size: 15px;
            transition: 0.2s;
        }
        .drawer-link .ic { font-size: 19px; width: 24px; text-align: center; }
        a.drawer-link:hover { background: rgba(255, 255, 255, 0.65); }
        .drawer-link.active { background: var(--green); color: white; box-shadow: 0 6px 14px rgba(71, 120, 91, 0.3); }
        .drawer-link.soon { opacity: 0.6; cursor: default; }
        .soon-tag {
            margin-left: auto;
            background: rgba(255, 255, 255, 0.8);
            color: var(--green);
            font-size: 10px;
            font-weight: 750;
            padding: 2px 8px;
            border-radius: 999px;
        }

        .drawer-bottom { margin-top: auto; padding-top: 18px; display: grid; gap: 10px; }
        .drawer-card {
            background: rgba(255, 255, 255, 0.75);
            border-radius: 22px;
            padding: 16px;
            text-align: center;
            color: var(--dark-green);
            font-weight: 650;
            font-size: 14px;
        }
        .drawer-card .big { display: block; font-size: 32px; margin-bottom: 4px; }
        .drawer-card small { display: block; color: var(--muted); font-weight: 500; font-size: 12px; margin-top: 4px; }
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
        .drawer-logout:hover { background: #fbe5e5; }

        /* ---------- Notice ---------- */
        .notice {
            margin-top: 18px;
            padding: 12px 16px;
            border-radius: 12px;
            background: #edf4e9;
            color: var(--dark-green);
            font-size: 14px;
        }

        /* ---------- Full-screen sections ---------- */
        .screen {
            display: flex;
            flex-direction: column;
            padding: 26px 0;
        }

        .screen-head {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }
        .screen-head h2 {
            color: var(--dark-green);
            font-size: clamp(24px, 2.6vw, 30px);
            letter-spacing: -1px;
            line-height: 1.15;
        }
        .screen-head p { color: var(--muted); font-size: 14px; margin-top: 2px; }

        .text-link { color: var(--green); font-size: 14px; font-weight: 700; white-space: nowrap; }
        .text-link:hover { color: var(--dark-green); }

        /* ---------- Hero (original look, bigger) ---------- */
        .hero-card {
            background: var(--sage);
            border-radius: 30px;
            padding: clamp(26px, 4vw, 46px);
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            align-items: center;
            gap: 32px;
            overflow: hidden;
        }

        .eyebrow {
            display: inline-block;
            background: white;
            color: var(--green);
            padding: 7px 14px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 750;
            letter-spacing: 1px;
            margin-bottom: 16px;
        }

        .hero h1 {
            color: var(--dark-green);
            font-size: clamp(32px, 4vw, 50px);
            line-height: 1.1;
            letter-spacing: -1.6px;
            margin-bottom: 14px;
        }

        .hero p { color: #607361; font-size: 16px; max-width: 460px; margin-bottom: 24px; }

        .hero-buttons { display: flex; gap: 12px; flex-wrap: wrap; }
        .hero-buttons .btn { padding: 12px 22px; font-size: 15px; }

        .hero-art {
            align-self: stretch;
            min-height: 250px;
            background: #d2dfc9;
            border-radius: 45% 45% 30px 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .hero-art::before, .hero-art::after {
            content: "";
            position: absolute;
            background: #b7cba9;
            border-radius: 50%;
        }
        .hero-art::before { width: 230px; height: 230px; top: -85px; right: -30px; }
        .hero-art::after { width: 170px; height: 170px; bottom: -78px; left: -28px; background: #ecddbd; }

        .art-house {
            position: relative;
            z-index: 1;
            font-size: 120px;
            filter: drop-shadow(0 14px 10px rgba(41, 77, 56, 0.14));
        }

        /* ---------- Stats ---------- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-top: 16px;
        }
        .stat-card:nth-child(1) { background: #f1f6ec; }
        .stat-card:nth-child(2) { background: #fbf5e6; }
        .stat-card:nth-child(3) { background: #f6efe4; }
        .stat-card:nth-child(4) { background: #eaf3ec; }
        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 16px 18px;
            display: flex;
            align-items: center;
            gap: 13px;
        }
        .stat-icon {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            background: var(--sage);
            border-radius: 14px;
            display: grid;
            place-items: center;
            font-size: 22px;
        }
        .stat-number { font-size: 26px; color: var(--dark-green); font-weight: 750; line-height: 1.1; }
        .stat-label { color: var(--muted); font-size: 12px; }

        /* ---------- Filter chips ---------- */
        .chips {
            display: flex;
            gap: 8px;
            margin-bottom: 14px;
            overflow-x: auto;
            padding-bottom: 4px;
            scrollbar-width: none;
        }
        .chips::-webkit-scrollbar { display: none; }

        .chip {
            border: 1px solid var(--border);
            background: white;
            color: #617164;
            border-radius: 999px;
            padding: 7px 16px;
            font-size: 13px;
            font-weight: 650;
            white-space: nowrap;
            transition: 0.2s;
        }
        .chip:hover { background: var(--sage); }
        .chip.active { background: var(--green); border-color: var(--green); color: white; }

        .chips-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }
        .chips-row .chips { margin-bottom: 0; flex: 1; min-width: 0; }
        .chips-row .btn { padding: 8px 16px; font-size: 13px; white-space: nowrap; flex-shrink: 0; }

        /* ---------- Tags ---------- */
        .tag {
            display: inline-block;
            color: var(--green);
            background: #edf4e9;
            padding: 4px 11px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 750;
            margin-bottom: 8px;
        }
        .tag-warning { color: #8c6a30; background: #f7efdc; }
        .tag-ended { color: #68716a; background: #eef0ec; }
        .tag-cancelled { color: #a12d2d; background: #fbe5e5; }

        .empty-state { padding: 26px 0; color: var(--muted); font-size: 15px; grid-column: 1 / -1; }

        /* ---------- Events ---------- */
        .events-layout {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 18px;
            align-items: stretch;
        }
        .events-main { min-width: 0; display: flex; flex-direction: column; }
        .events-side { display: flex; flex-direction: column; gap: 18px; }

        .event-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            align-content: start;
        }

        .side-panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 18px;
        }
        .side-panel h3 { color: var(--dark-green); font-size: 16px; margin-bottom: 10px; }

.cal-panel { position: sticky; top: 90px; }

        .cal-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 12px;
        }
        .cal-top h3 { margin: 0; font-size: 16px; }
        .cal-nav { display: flex; gap: 6px; align-items: center; }
        .cal-nav button {
            min-width: 30px;
            height: 30px;
            padding: 0 8px;
            border-radius: 999px;
            border: 1px solid var(--border);
            background: white;
            color: var(--dark-green);
            font-size: 15px;
            font-weight: 700;
            line-height: 1;
        }
        .cal-nav button:hover { background: var(--sage); }
        .cal-nav .cal-today { font-size: 12px; }

        .cal-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            text-align: center;
            font-size: 12px;
        }
        .cal-head { color: var(--muted); font-weight: 700; font-size: 12px; padding-bottom: 2px; }
        .cal-cell { position: relative; }

        .cal-day {
            width: 100%;
            aspect-ratio: 1;
            display: grid;
            place-items: center;
            border: none;
            border-radius: 50%;
            background: none;
            color: var(--text);
            font: inherit;
            font-size: 12px;
            position: relative;
        }
        .cal-day.has-event { background: var(--sage); font-weight: 750; color: var(--dark-green); cursor: pointer; }
        .cal-day.has-event::after {
            content: "";
            position: absolute;
            bottom: 4px;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--green);
        }
        .cal-day.today { background: var(--green); color: white; font-weight: 750; }
        .cal-day.today::after { background: white; }

        .cal-tip {
            position: absolute;
            bottom: calc(100% + 8px);
            left: 50%;
            transform: translateX(-50%);
            min-width: 150px;
            max-width: 220px;
            background: var(--dark-green);
            color: white;
            border-radius: 12px;
            padding: 9px 12px;
            font-size: 12px;
            line-height: 1.4;
            text-align: left;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.15s;
            z-index: 30;
            box-shadow: 0 10px 24px rgba(41, 77, 56, 0.25);
            overflow-wrap: anywhere;
        }
        .cal-tip.align-left { left: 0; transform: none; }
        .cal-tip.align-right { left: auto; right: 0; transform: none; }
        .cal-tip div + div { margin-top: 6px; padding-top: 6px; border-top: 1px solid rgba(255, 255, 255, 0.2); }

        .cal-cell:hover .cal-tip,
        .cal-day:focus + .cal-tip { opacity: 1; visibility: visible; }

        .cal-legend { margin-top: 12px; font-size: 12px; color: var(--muted); }

        .event-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 18px;
            display: flex;
            gap: 14px;
            min-width: 0;
        }
        .event-card.is-cancelled { opacity: 0.85; }
        .event-card.is-cancelled h3 { text-decoration: line-through; text-decoration-color: #c75b5b; }

        .date-block {
            width: 60px;
            flex-shrink: 0;
            text-align: center;
            background: var(--sage);
            border-radius: 16px;
            padding: 8px 0;
            align-self: flex-start;
        }
        .date-block .day { display: block; font-size: 24px; font-weight: 750; color: var(--dark-green); line-height: 1.1; }
        .date-block .month { display: block; font-size: 12px; color: var(--green); font-weight: 700; }
        .date-block .tbd { font-size: 30px; line-height: 1.6; }

        .item-info { flex: 1; min-width: 0; }
        .item-info h3 { color: var(--dark-green); font-size: 16px; margin-bottom: 5px; overflow-wrap: anywhere; line-height: 1.3; }
        .item-info p { color: var(--muted); font-size: 13px; overflow-wrap: anywhere; margin-bottom: 4px; }
        .item-info p.desc {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .cancellation-notice {
            margin-top: 10px;
            padding: 11px 13px;
            border-left: 3px solid #c75b5b;
            border-radius: 6px;
            background: #fff1ef;
            color: #8d3535;
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        .links-row { display: flex; gap: 24px; flex-wrap: wrap; margin-top: 22px; }

        /* ---------- Issues board ---------- */
        .issue-board {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .issue-col {
            background: white;
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 18px;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .issue-col-head {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--dark-green);
            font-weight: 750;
            font-size: 15px;
            margin-bottom: 12px;
        }
        .issue-col-head .dot { width: 12px; height: 12px; border-radius: 50%; }
        .dot-reported { background: #c9a24f; }
        .dot-progress { background: #5b8fb0; }
        .dot-resolved { background: var(--green); }

        .issue-card {
            flex: 1;
            background: var(--cream);
            border-radius: 18px;
            padding: 18px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 6px;
        }
        .issue-card .big-icon {
            width: 50px;
            height: 50px;
            border-radius: 16px;
            background: var(--sage);
            display: grid;
            place-items: center;
            font-size: 25px;
            margin-bottom: 8px;
        }
        .issue-card h3 { color: var(--dark-green); font-size: 17px; line-height: 1.3; }
        .issue-card p { color: var(--muted); font-size: 13px; }

        .issue-cta {
            margin-top: 14px;
            background: var(--sage);
            border-radius: 20px;
            padding: 14px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }
        .issue-cta p { color: var(--dark-green); font-weight: 650; font-size: 14px; }

        /* ---------- Marketplace ---------- */
        .borrow-links { display: flex; gap: 10px; flex-wrap: wrap; }
        .borrow-pill {
            background: white;
            border: 1px solid var(--border);
            border-radius: 999px;
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 650;
            color: var(--dark-green);
        }
        .borrow-pill:hover { background: var(--sage); }
        .borrow-pill b {
            background: var(--green);
            color: white;
            border-radius: 999px;
            padding: 1px 9px;
            font-size: 12px;
            margin-left: 4px;
        }

        .market-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .market-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 12px;
            transition: 0.2s;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }
        .add-card {
            border: 2px dashed #c9d8c0;
            background: #fbfdf8;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 6px;
            min-height: 240px;
            color: var(--dark-green);
        }
        .add-card:hover { background: var(--sage); border-color: var(--green); }
        .add-card .plus {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--sage);
            display: grid;
            place-items: center;
            font-size: 28px;
            color: var(--green);
            font-weight: 700;
            margin-bottom: 6px;
        }
        .add-card strong { font-size: 15px; }
        .add-card span.sub { color: var(--muted); font-size: 12px; }
        .market-card .market-bottom { margin-top: auto; padding-top: 14px; }
        .market-card:hover { transform: translateY(-4px); box-shadow: 0 12px 28px rgba(41, 77, 56, 0.08); }

        .product-art {
            height: 130px;
            background: var(--sage);
            border-radius: 16px;
            display: grid;
            place-items: center;
            font-size: 50px;
            margin-bottom: 11px;
            overflow: hidden;
        }
        .product-art img { display: block; width: 100%; height: 100%; object-fit: cover; }

        .market-card h3 { color: var(--dark-green); font-size: 15px; margin: 2px 0 4px; overflow-wrap: anywhere; }
        .market-card p { color: var(--muted); font-size: 12px; overflow-wrap: anywhere; }

        .market-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 14px;
        }
        .market-bottom span { font-size: 13px; color: var(--green); font-weight: 750; }

        .small-btn {
            background: #edf4e9;
            color: var(--dark-green);
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }
        .small-btn:hover { background: var(--sage); }

        /* ---------- Banner + footer ---------- */
        footer { padding: 30px 0; text-align: center; color: var(--muted); font-size: 12px; }

        /* ---------- Bottom nav (mobile only) ---------- */
        .bottom-nav { display: none; }

        /* ---------- Responsive ---------- */
        @media (max-width: 1000px) {
            .events-layout { grid-template-columns: 1fr; }
            .market-grid { grid-template-columns: repeat(3, 1fr); }
            .cal-panel { position: static; }
            .events-side { flex-direction: row; }
            .events-side > * { flex: 1; }
            .issue-board { grid-template-columns: 1fr; }
            .issue-card { flex-direction: row; align-items: center; gap: 16px; }
            .issue-card .big-icon { margin-bottom: 0; flex-shrink: 0; }
        }

        @media (max-width: 800px) {
            .hero-card { grid-template-columns: 1fr; }
            .hero-art { min-height: 230px; order: -1; }
            .art-house { font-size: 120px; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .event-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 700px) {
            body { padding-bottom: 70px; }

            .navbar { min-height: 60px; }
            .nav-text-link, .user-label { display: none; }
            .cal-panel { position: static; }
            .user-trigger { padding: 4px; }
            .events-side { flex-direction: column; }
            .product-art { height: 120px; }
            .nav-links { gap: 10px; }
            .screen { padding: 20px 0; }

            .hero p { font-size: 16px; }
            .stat-card { padding: 16px; gap: 12px; flex-direction: column; align-items: flex-start; }

            .event-card { padding: 18px; gap: 14px; }
            .date-block { width: 62px; }

            .market-grid {
                display: flex;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                gap: 12px;
                padding-bottom: 8px;
                scrollbar-width: none;
            }
            .market-grid::-webkit-scrollbar { display: none; }
            .market-card { flex: 0 0 72%; scroll-snap-align: start; }
            .market-grid .empty-state { flex: 1; }


            .notification-panel { right: -60px; }

            .bottom-nav {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                position: fixed;
                left: 0;
                right: 0;
                bottom: 0;
                background: white;
                border-top: 1px solid var(--border);
                z-index: 60;
                padding: 6px 0 calc(6px + env(safe-area-inset-bottom, 0px));
            }
            .bottom-nav a {
                display: flex;
                flex-direction: column;
                align-items: center;
                font-size: 11px;
                color: #617164;
            }
            .bottom-nav a span.ic { font-size: 20px; line-height: 1.3; }
        }

        @media (prefers-reduced-motion: reduce) {
            * { transition: none !important; }
            html { scroll-behavior: auto; }
        }
    </style>
</head>

<body>
    <header>
        <div class="container navbar">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-icon">🌿</span>
                Neighbourhood
            </a>

            <nav class="nav-links">
                <a href="#community" class="nav-text-link">Community</a>
                <a href="#issues" class="nav-text-link">Issues</a>
                <a href="#marketplace" class="nav-text-link">Marketplace</a>

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

                    <details class="notification-dropdown">
                        <summary class="notification-bell" aria-label="Notifications">
                            🔔

                            @if ($notificationCount > 0)
                                <span class="notification-badge">
                                    {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                                </span>
                            @endif
                        </summary>

                        <div class="notification-panel">
                            <div class="notification-panel-title">Notifications</div>

                            @foreach ($incomingRequests as $booking)
                                <a href="{{ route('borrow.owner-requests') }}" class="notification-entry">
                                    <strong>📦 New Borrow Request</strong>
                                    <span>
                                        {{ $booking->borrower?->name ?? 'A neighbour' }}
                                        wants to borrow
                                        {{ $booking->communityItem?->name ?? 'your item' }}.
                                    </span>
                                </a>
                            @endforeach

                            @foreach ($myUpdates as $booking)
                                <a href="{{ route('borrow.my-requests') }}" class="notification-entry">
                                    <strong>
                                        {{ $booking->status === 'approved' ? '✅ Booking Approved' : '❌ Booking Rejected' }}
                                    </strong>
                                    <span>
                                        Your request for
                                        {{ $booking->communityItem?->name ?? 'an item' }}
                                        was {{ $booking->status }}.
                                    </span>
                                </a>
                            @endforeach

                            @if ($incomingRequests->isEmpty() && $myUpdates->isEmpty())
                                <p class="notification-empty">No notifications yet 🌿</p>
                            @endif

                            <div class="notification-footer">
                                <a href="{{ route('borrow.owner-requests') }}">Received Requests →</a>
                                <a href="{{ route('borrow.my-requests') }}">My Borrow Requests →</a>
                            </div>
                        </div>
                    </details>

                    <button
                        type="button"
                        class="user-trigger"
                        id="drawerOpen"
                        aria-haspopup="dialog"
                        aria-controls="userDrawer"
                        aria-expanded="false"
                    >
                        <span class="avatar-sm">{{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}</span>
                        <span class="user-label">Hi, {{ Auth::user()->name }} 🌿</span>
                    </button>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light">Log In</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                @endauth
            </nav>
        </div>
    </header>

    @auth
        @php
            $drawerLinks = [
                ['icon' => '🏠', 'label' => 'Home',        'href' => route('home'),         'soon' => false],
                ['icon' => '📦', 'label' => 'My Items',    'href' => url('/my-items'),      'soon' => false],
                ['icon' => '📅', 'label' => 'My Events',   'href' => route('events.mine'),  'soon' => false],
                ['icon' => '📣', 'label' => 'My Complain', 'href' => url('/my-complain'),   'soon' => true],
                ['icon' => '💬', 'label' => 'Messages',    'href' => url('/messages'),      'soon' => true],
                ['icon' => '⚙️', 'label' => 'Settings',    'href' => url('/settings'),      'soon' => true],
            ];
        @endphp

        <div class="drawer-overlay" id="drawerOverlay"></div>

        <aside class="drawer" id="userDrawer" role="dialog" aria-modal="true" aria-label="My account" aria-hidden="true">
            <button type="button" class="drawer-close" id="drawerClose" aria-label="Close menu">✕</button>

            <div class="drawer-profile">
                <div class="avatar-lg">{{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}</div>
                <h2>Hi, {{ Auth::user()->name }}! 👋</h2>
                <p>Good to see you again</p>
            </div>

            <nav class="drawer-nav">
                @foreach ($drawerLinks as $link)
                    @if ($link['soon'])
                        <span class="drawer-link soon" aria-disabled="true">
                            <span class="ic">{{ $link['icon'] }}</span>
                            {{ $link['label'] }}
                            <span class="soon-tag">Soon</span>
                        </span>
                    @else
                        <a href="{{ $link['href'] }}"
                           class="drawer-link {{ url()->current() === $link['href'] ? 'active' : '' }}">
                            <span class="ic">{{ $link['icon'] }}</span>
                            {{ $link['label'] }}
                        </a>
                    @endif
                @endforeach
            </nav>

            <div class="drawer-bottom">
                <div class="drawer-card">
                    <span class="big">💚</span>
                    Small acts. Stronger communities.
                    <small>A better neighbourhood begins with all of us.</small>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="drawer-logout">Log Out</button>
                </form>
            </div>
        </aside>
    @endauth

    <main class="container">
        @if (session('success'))
            <div class="notice">{{ session('success') }}</div>
        @endif

        @php
            $visibleEvents = isset($events)
                ? $events->filter(fn ($event) => $event->current_status !== 'archived')
                : collect();

            $visibleItems = $items ?? collect();
        @endphp

        {{-- SCREEN 1: Hero + stats --}}
        <section class="screen hero" id="top">
            <div class="hero-card">
                <div>
                    <span class="eyebrow">WELCOME TO NEIGHBOURHOOD! 🌱</span>
                    <h1>Better neighbourhoods start with us.</h1>
                    <p>
                        Discover local events, help your neighbours,
                        report community issues and share useful things.
                    </p>

                    <div class="hero-buttons">
                        <a href="#community" class="btn btn-primary">Explore community event ↗</a>

                        @auth
                            <a href="{{ route('events.create') }}" class="btn btn-light">Create an event +</a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-light">Join the community +</a>
                        @endauth
                    </div>
                </div>

                <div class="hero-art" aria-label="Neighbourhood illustration">
                    <span class="art-house">🏡</span>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">📅</div>
                    <div>
                        <div class="stat-number">{{ $visibleEvents->count() }}</div>
                        <div class="stat-label">Community activities</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">📦</div>
                    <div>
                        <div class="stat-number">{{ $visibleItems->count() }}</div>
                        <div class="stat-label">Items to share</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">📣</div>
                    <div>
                        <div class="stat-number">4</div>
                        <div class="stat-label">Community issues</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">💚</div>
                    <div>
                        <div class="stat-number">28</div>
                        <div class="stat-label">Neighbours helping</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- SCREEN 2: Community events --}}
        <section class="screen" id="community">
            <div class="screen-head">
                <div>
                    <h2>What's happening? 🌼</h2>
                    <p>News and activities around your neighbourhood.</p>
                </div>

            </div>

            <div class="events-layout">
            <div class="events-main">
            <div class="chips-row">
            <div class="chips" data-filter-group="events">
                <button type="button" class="chip active" data-filter="all">All</button>
                <button type="button" class="chip" data-filter="upcoming">Upcoming</button>
                <button type="button" class="chip" data-filter="ongoing">Ongoing</button>
                <button type="button" class="chip" data-filter="ended">Ended</button>
                <button type="button" class="chip" data-filter="cancelled">Cancelled</button>
            </div>

            @auth
                <a href="{{ route('events.create') }}" class="btn btn-primary">+ Create event</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-light">Log in to create</a>
            @endauth
            </div>

            <div class="event-grid" id="eventGrid">
                @forelse ($visibleEvents as $event)
                    @php
                        $statusLabel = match ($event->current_status) {
                            'upcoming' => 'UPCOMING',
                            'ongoing' => 'ONGOING',
                            'ended' => 'ENDED',
                            'cancelled' => 'CANCELLED',
                            'archived' => 'ARCHIVED',
                            default => strtoupper($event->current_status),
                        };

                        $statusClass = match ($event->current_status) {
                            'ongoing' => 'tag-warning',
                            'ended', 'archived' => 'tag-ended',
                            'cancelled' => 'tag-cancelled',
                            default => '',
                        };

                        $eventDate = $event->start_date ?? $event->event_date;
                    @endphp

                    <article
                        class="event-card {{ $event->current_status === 'cancelled' ? 'is-cancelled' : '' }}"
                        data-status="{{ $event->current_status }}"
                    >
                        <div class="date-block">
                            @if ($eventDate)
                                <span class="day">{{ $eventDate->format('d') }}</span>
                                <span class="month">{{ $eventDate->format('M') }}</span>
                            @else
                                <span class="tbd">🗓️</span>
                            @endif
                        </div>

                        <div class="item-info">
                            <span class="tag {{ $statusClass }}">{{ $statusLabel }}</span>

                            <h3>{{ $event->title }}</h3>

                            <p>
                                @if ($eventDate)
                                    {{ $eventDate->format('D, d M Y · g:i A') }}
                                @else
                                    Date and time to be announced
                                @endif
                            </p>

                            @if ($event->location)
                                <p>📍 {{ $event->location }}</p>
                            @endif

                            @if ($event->description)
                                <p class="desc">{{ $event->description }}</p>
                            @endif

                            @if ($event->status === 'cancelled' && $event->cancellation_reason)
                                <div class="cancellation-notice">
                                    <strong>Cancellation reason:</strong>
                                    {{ $event->cancellation_reason }}
                                </div>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="empty-state">
                        <p>No community activities yet.</p>
                        <p>Check back later for updates from your neighbours. 🌱</p>
                    </div>
                @endforelse

                <p class="empty-state" id="eventFilterEmpty" hidden>
                    No events in this category right now.
                </p>
            </div>

            </div>

            <aside class="events-side">
                @php
                    $calendarEvents = $visibleEvents
                        ->map(fn ($e) => [
                            'date' => ($e->start_date ?? $e->event_date)?->format('Y-m-d'),
                            'title' => $e->title,
                        ])
                        ->filter(fn ($e) => $e['date'])
                        ->values();
                @endphp

                <div class="side-panel cal-panel" id="calendar">
                    <div class="cal-top">
                        <h3 class="cal-title"></h3>
                        <div class="cal-nav">
                            <button type="button" data-cal="prev" aria-label="Previous month">‹</button>
                            <button type="button" data-cal="today" class="cal-today">Today</button>
                            <button type="button" data-cal="next" aria-label="Next month">›</button>
                        </div>
                    </div>

                    <div class="cal-grid"></div>

                    <p class="cal-legend">Hover a highlighted date to see its events.</p>
                </div>
            </aside>
            </div>
        </section>

        {{-- SCREEN 3: Neighbourhood issues --}}
        <section class="screen" id="issues">
            <div class="screen-head">
                <div>
                    <h2>Neighbourhood issues 📣</h2>
                    <p>Stay informed about local concerns.</p>
                </div>
            </div>

            <div class="issue-board">
                <div class="issue-col">
                    <div class="issue-col-head"><span class="dot dot-reported"></span> Reported</div>

                    <article class="issue-card">
                        <div class="big-icon">💧</div>
                        <div>
                            <h3>Water supply disruption</h3>
                            <p>Utilities</p>
                        </div>
                    </article>
                </div>

                <div class="issue-col">
                    <div class="issue-col-head"><span class="dot dot-progress"></span> In progress</div>

                    <article class="issue-card">
                        <div class="big-icon">🛣️</div>
                        <div>
                            <h3>Pothole on main road</h3>
                            <p>Road & infrastructure</p>
                        </div>
                    </article>
                </div>

                <div class="issue-col">
                    <div class="issue-col-head"><span class="dot dot-resolved"></span> Resolved</div>

                    <article class="issue-card">
                        <div class="big-icon">💡</div>
                        <div>
                            <h3>Street light repaired</h3>
                            <p>Public facilities</p>
                        </div>
                    </article>
                </div>
            </div>

            <div class="issue-cta">
                <p>Spotted something that needs fixing? Let your neighbours know.</p>
                <a href="#issues" class="btn btn-primary">View all issues →</a>
            </div>
        </section>

        {{-- SCREEN 4: Marketplace --}}
        <section class="screen" id="marketplace">
            <div class="screen-head">
                <div>
                    <h2>Little things, shared together 🌿</h2>
                    <p>Buy, sell, borrow, lend or give away.</p>
                </div>

                <div class="borrow-links">
                    @auth
                        <a href="{{ route('borrow.owner-requests') }}" class="borrow-pill">
                            Received requests <b>{{ $incomingCount }}</b>
                        </a>
                        <a href="{{ route('borrow.my-requests') }}" class="borrow-pill">
                            My requests <b>{{ $myUpdatesCount }}</b>
                        </a>
                    @endauth
                    <a href="{{ route('community.index') }}" class="text-link" style="align-self:center;">Explore all →</a>
                </div>
            </div>

            <div class="chips" data-filter-group="market">
                <button type="button" class="chip active" data-filter="all">All</button>
                <button type="button" class="chip" data-filter="give_away">Free</button>
                <button type="button" class="chip" data-filter="borrow">Borrow</button>
                <button type="button" class="chip" data-filter="sell">For sale</button>
            </div>

            <div class="market-grid" id="marketGrid">
                @forelse ($visibleItems as $item)
                    @php
                        $itemType = match ($item->type) {
                            'give_away' => 'GIVE AWAY',
                            'borrow' => 'BORROW',
                            'sell' => 'FOR SALE',
                            default => 'COMMUNITY ITEM',
                        };

                        $itemIcon = match (strtolower($item->category ?? '')) {
                            'books', 'book' => '📚',
                            'tools', 'tools & diy' => '🧰',
                            'home & garden', 'plants', 'plant' => '🪴',
                            'electronics', 'electronic' => '📱',
                            'clothing', 'clothes' => '👕',
                            'food' => '🍱',
                            default => '📦',
                        };
                    @endphp

                    <article class="market-card" data-type="{{ $item->type }}">
                        <div class="product-art">
                            @if ($item->image_path)
                                <img
                                    src="{{ asset('storage/' . $item->image_path) }}"
                                    alt="{{ $item->name }}"
                                    loading="lazy"
                                >
                            @else
                                {{ $itemIcon }}
                            @endif
                        </div>

                        <span class="tag">{{ $itemType }}</span>

                        <h3>{{ $item->name }}</h3>

                        <p>
                            {{ $item->category ?: 'Community item' }}
                            @if ($item->location)
                                · 📍 {{ $item->location }}
                            @endif
                        </p>

                        <div class="market-bottom">
                            <span>
                                @if ($item->type === 'sell' && $item->price !== null)
                                    RM {{ number_format((float) $item->price, 2) }}
                                @elseif ($item->type === 'borrow')
                                    Free to borrow
                                @else
                                    Free
                                @endif
                            </span>

                            <a href="{{ route('community.index') }}" class="small-btn">View item</a>
                        </div>
                    </article>
                @empty
                    <p class="empty-state">
                        No community items yet. Be the first to share something! 🌱
                    </p>
                @endforelse

                <a href="{{ auth()->check() ? url('/my-items') : route('login') }}" class="market-card add-card">
                    <span class="plus">+</span>
                    <strong>Share an item</strong>
                    <span class="sub">Give, lend or sell to neighbours</span>
                </a>

                <p class="empty-state" id="marketFilterEmpty" hidden>
                    No items in this category right now.
                </p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            Neighbourhood · Made for neighbours, by neighbours 🌿
        </div>
    </footer>

    {{-- Bottom nav (mobile) --}}
    <nav class="bottom-nav" aria-label="Main navigation">
        <a href="#top"><span class="ic">🏠</span>Home</a>
        <a href="#community"><span class="ic">📅</span>Events</a>
        <a href="#issues"><span class="ic">📣</span>Issues</a>
        <a href="#marketplace"><span class="ic">📦</span>Items</a>
    </nav>

    <script>
        // Generic chip filter: [chips group] -> items inside target container
        function setupFilter(groupName, containerId, itemSelector, attr, emptyId) {
            var group = document.querySelector('[data-filter-group="' + groupName + '"]');
            var container = document.getElementById(containerId);
            var emptyMsg = document.getElementById(emptyId);
            if (!group || !container) return;

            group.addEventListener('click', function (e) {
                var chip = e.target.closest('.chip');
                if (!chip) return;

                group.querySelectorAll('.chip').forEach(function (c) { c.classList.remove('active'); });
                chip.classList.add('active');

                var filter = chip.dataset.filter;
                var shown = 0;

                container.querySelectorAll(itemSelector).forEach(function (el) {
                    var match = filter === 'all' || el.dataset[attr] === filter;
                    el.style.display = match ? '' : 'none';
                    if (match) shown++;
                });

                if (emptyMsg) emptyMsg.hidden = shown > 0;
            });
        }

        // Event calendar: month navigation + hover list of event titles
        (function () {
            var root = document.getElementById('calendar');
            if (!root) return;

            var calEvents = {{ \Illuminate\Support\Js::from($calendarEvents) }};
            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
                          'August', 'September', 'October', 'November', 'December'];
            var grid = root.querySelector('.cal-grid');
            var title = root.querySelector('.cal-title');

            var byDate = {};
            calEvents.forEach(function (e) {
                (byDate[e.date] = byDate[e.date] || []).push(e.title);
            });

            var now = new Date();
            var view = new Date(now.getFullYear(), now.getMonth(), 1);

            function pad(n) { return n < 10 ? '0' + n : '' + n; }

            function render() {
                var y = view.getFullYear();
                var m = view.getMonth();
                title.textContent = months[m] + ' ' + y;
                grid.innerHTML = '';

                ['M', 'T', 'W', 'T', 'F', 'S', 'S'].forEach(function (d) {
                    var h = document.createElement('span');
                    h.className = 'cal-head';
                    h.textContent = d;
                    grid.appendChild(h);
                });

                var lead = (view.getDay() + 6) % 7;
                for (var i = 0; i < lead; i++) grid.appendChild(document.createElement('span'));

                var days = new Date(y, m + 1, 0).getDate();
                for (var d = 1; d <= days; d++) {
                    var key = y + '-' + pad(m + 1) + '-' + pad(d);
                    var titles = byDate[key];
                    var isToday = d === now.getDate() && m === now.getMonth() && y === now.getFullYear();
                    var cell = document.createElement('div');
                    cell.className = 'cal-cell';

                    if (titles) {
                        var btn = document.createElement('button');
                        btn.type = 'button';
                        btn.className = 'cal-day has-event' + (isToday ? ' today' : '');
                        btn.textContent = d;
                        btn.setAttribute('aria-label', d + ' ' + months[m] + ': ' + titles.join(', '));

                        var tip = document.createElement('div');
                        tip.className = 'cal-tip';
                        tip.setAttribute('role', 'tooltip');
                        titles.forEach(function (t) {
                            var line = document.createElement('div');
                            line.textContent = t;
                            tip.appendChild(line);
                        });

                        var col = (lead + d - 1) % 7;
                        if (col <= 1) tip.classList.add('align-left');
                        else if (col >= 5) tip.classList.add('align-right');

                        cell.appendChild(btn);
                        cell.appendChild(tip);
                    } else {
                        var span = document.createElement('span');
                        span.className = 'cal-day' + (isToday ? ' today' : '');
                        span.textContent = d;
                        cell.appendChild(span);
                    }

                    grid.appendChild(cell);
                }
            }

            root.addEventListener('click', function (e) {
                var b = e.target.closest('[data-cal]');
                if (!b) return;
                var act = b.dataset.cal;
                if (act === 'prev') view = new Date(view.getFullYear(), view.getMonth() - 1, 1);
                if (act === 'next') view = new Date(view.getFullYear(), view.getMonth() + 1, 1);
                if (act === 'today') view = new Date(now.getFullYear(), now.getMonth(), 1);
                render();
            });

            render();
        })();

        // Side drawer (logged-in user menu)
        (function () {
            var openBtn = document.getElementById('drawerOpen');
            var closeBtn = document.getElementById('drawerClose');
            var overlay = document.getElementById('drawerOverlay');
            var drawer = document.getElementById('userDrawer');
            if (!openBtn || !drawer) return;

            function setOpen(open) {
                document.body.classList.toggle('drawer-open', open);
                openBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
                drawer.setAttribute('aria-hidden', open ? 'false' : 'true');
                (open ? closeBtn : openBtn).focus();
            }

            openBtn.addEventListener('click', function () { setOpen(true); });
            closeBtn.addEventListener('click', function () { setOpen(false); });
            overlay.addEventListener('click', function () { setOpen(false); });
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && document.body.classList.contains('drawer-open')) setOpen(false);
            });
        })();

        setupFilter('events', 'eventGrid', '.event-card', 'status', 'eventFilterEmpty');
        setupFilter('market', 'marketGrid', '.market-card', 'type', 'marketFilterEmpty');
    </script>
</body>
</html>