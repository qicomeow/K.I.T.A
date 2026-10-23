<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Events | K.I.T.A.</title>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&display=swap" rel="stylesheet">
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

        footer {
            background: var(--sage);
            padding: 28px;
            text-align: center;
            color: #637365;
            font-size: 13px;
            margin-top: 40px;
        }

        /* ---------- Bottom nav (mobile only) ---------- */
        .bottom-nav { display: none; }

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

        /* MOBILE RESPONSIVE OVERRIDES - MY EVENTS */
        @media (max-width: 760px) {
            html, body { max-width: 100%; overflow-x: clip; }
            body { padding-bottom: 76px; }
            .navbar { width: calc(100% - 28px); min-height: 64px; flex-direction: row; align-items: center; justify-content: space-between; flex-wrap: nowrap; gap: 8px; padding: 8px 0; }
            .brand { font-size: 17px; gap: 7px; min-width: 0; }
            .brand-icon { width: 35px; height: 35px; font-size: 19px; flex-shrink: 0; }
            .nav-links { width: auto; margin-left: auto; flex-wrap: nowrap; gap: 9px; justify-content: flex-end; }
            .nav-links > a, .nav-links > form { display: none; }
            .nav-links .notification-dropdown, .nav-links .user-trigger { display: flex; }
            .notification-bell { width: 36px; height: 36px; font-size: 18px; }
            .notification-panel { position: fixed; top: 61px; left: auto; right: 10px; width: min(310px, calc(100vw - 20px)); max-width: none; }
            .user-trigger { padding: 2px; }
            .user-trigger > span:not(.avatar-sm) { display: none; }
            .avatar-sm { width: 35px; height: 35px; }
            .container { width: 100%; margin: 22px auto; padding: 0 15px; }
            .heading { gap: 12px; margin-bottom: 20px; }
            .heading h1 { font-size: 25px; }
            .heading > .button { padding: 10px 13px; font-size: 12px; }
            .events-layout { grid-template-columns: minmax(0,1fr); gap: 18px; }
            .events-list { min-width: 0; }
            .event-card { border-radius: 15px; }
            .event-toggle { gap: 11px; padding: 12px; }
            .event-date-box { width: 49px; min-width: 49px; height: 55px; }
            .event-date-box strong { font-size: 20px; }
            .event-title { font-size: 14px; }
            .event-content { padding: 14px; }
            .event-info { grid-template-columns: repeat(2,minmax(0,1fr)); gap: 12px; }
            .actions .button { flex: 1 1 135px; font-size: 12px; padding: 10px; }
            .calendar-card { position: static; width: 100%; min-width: 0; padding: 16px; }
            .calendar-grid, .calendar-weekdays { gap: 3px; }
            .calendar-day { min-height: 32px; font-size: 12px; }
            .status-tabs { display: flex; width: 100%; }
            .tabs-wrapper { width: 100%; }
            .status-tab { flex: 1; min-width: 0; padding: 11px 5px; font-size: 12px; }
            .modal-overlay { padding: 12px; }
            .modal-box { max-height: calc(100dvh - 24px); padding: 18px; }
            footer { padding: 20px 15px; font-size: 12px; }
            .bottom-nav { display: grid; position: fixed; left: 0; right: 0; bottom: 0; bottom: env(safe-area-inset-bottom, 0px); grid-template-columns: repeat(4,minmax(0,1fr)); align-items: center; min-height: 62px; padding: 6px 5px; background: rgba(255,255,255,.98); border-top: 1px solid var(--border); box-shadow: 0 -4px 16px rgba(41,77,56,.06); z-index: 70; }
            .bottom-nav a { display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px; min-width: 0; color: var(--muted); font-size: 10px; font-weight: 700; }
            .bottom-nav a .ic { font-size: 21px; line-height: 1.1; }
            .bottom-nav a.active { color: var(--green); }
            body.drawer-open { overflow: hidden; }
        }
        @media (max-width: 370px) {
            .brand { font-size: 15px; }
            .brand-icon { width: 32px; height: 32px; }
            .event-info { grid-template-columns: 1fr; }
            .heading > .button { font-size: 11px; }
        }
    
/* CONSISTENT NEIGHBOURHOOD HEADER, DRAWER & SETTINGS */


        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #F7F6F0;
            color: #34483B;
        }

        .request-header {
            background: #FFFFFF;
            padding: 18px 7%;
            border-bottom: 1px solid #E6E8DF;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .request-logo {
            color: #52765B;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .back-link {
            color: #52765B;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .request-container {
            max-width: 850px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .page-heading {
            margin-bottom: 30px;
        }

        .page-heading h1 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        .page-heading p {
            margin: 0;
            color: #687568;
            line-height: 1.6;
        }

        .request-count {
            display: inline-block;
            margin-top: 18px;
            padding: 8px 14px;
            border-radius: 20px;
            background: #E6EDE2;
            color: #52765B;
            font-size: 13px;
            font-weight: bold;
        }

        .notification-card {
            display: flex;
            gap: 18px;
            margin-bottom: 16px;
            padding: 22px;
            background: #FFFFFF;
            border: 1px solid #E8E9E2;
            border-radius: 16px;
        }

        .notification-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #E6EDE2;
            font-size: 23px;
        }

        .notification-content {
            flex: 1;
            min-width: 0;
        }

        .notification-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
        }

        .notification-title {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .notification-text {
            margin: 8px 0;
            color: #687568;
            font-size: 14px;
            line-height: 1.6;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status-pending {
            background: #FFF1D6;
            color: #996600;
        }

        .status-approved {
            background: #E0F1E3;
            color: #287747;
        }

        .status-rejected {
            background: #FCE7E7;
            color: #A63D3D;
        }

        .request-details {
            margin-top: 15px;
            padding: 15px;
            border-radius: 10px;
            background: #F7F9F5;
        }

        .request-details p {
            margin: 7px 0;
            font-size: 14px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .request-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 18px;
        }

        .request-actions form {
            flex: 1;
        }

        .action-button {
            width: 100%;
            padding: 12px 16px;
            border-radius: 9px;
            border: none;
            font: inherit;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .chat-button {
            background: #E6EDE2;
            color: #3F6048;
            border: 1px solid #CFE0D0;
        }

        .chat-button:hover {
            background: #D6E6D6;
        }

        .approve-button {
            background: #52765B;
            color: #FFFFFF;
        }

        .approve-button:hover {
            background: #3F6048;
        }

        .reject-button {
            background: #FCE7E7;
            color: #A63D3D;
        }

        .reject-button:hover {
            background: #F8D2D2;
        }

        .request-alert {
            padding: 14px 18px;
            margin-bottom: 20px;
            border-radius: 10px;
            background: #E0F1E3;
            color: #285D36;
        }

        .request-alert-error {
            background: #FCE7E7;
            color: #A63D3D;
        }

        .empty-state {
            padding: 55px 25px;
            text-align: center;
            background: #FFFFFF;
            border: 1px solid #E8E9E2;
            border-radius: 16px;
        }

        .empty-state h3 {
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #687568;
        }

        @media (max-width: 600px) {
            .request-container {
                margin-top: 28px;
            }

            .notification-card {
                padding: 16px;
                gap: 12px;
            }

            .notification-icon {
                width: 40px;
                height: 40px;
                font-size: 19px;
            }

            .notification-top {
                flex-direction: column;
            }

            .request-actions {
                flex-direction: column;
            }
        }
    
 :root{--green:#47785b;--dark-green:#294d38;--sage:#e5ecdc;--cream:#f8f8f1;--white:#fff;--text:#304537;--muted:#788579;--border:#e6e9df;}
.navbar a{color:inherit;text-decoration:none;} .nav-links{display:flex;} .nav-links a{color:#617164;} .brand{color:var(--dark-green)!important;} .avatar-sm,.avatar-lg{overflow:hidden;flex-shrink:0;} .profile-avatar-img{display:block;width:100%;height:100%;object-fit:cover;border-radius:50%;} .container{width:min(1120px,92%);margin:auto;}

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

        
/* ---------- Bottom nav (mobile only) ---------- */
        .bottom-nav { display: none; }
   
        /* Profile picture for header and sidebar */
        .avatar-sm,
        .avatar-lg {
            overflow: hidden;
            flex-shrink: 0;
        }

        .profile-avatar-img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        
        
/* Settings modal */
        .settings-backdrop { position:fixed; inset:0; z-index:150; background:rgba(22,42,29,.58); display:none; align-items:center; justify-content:center; padding:16px; }
        .settings-backdrop.is-open { display:flex; }
        .settings-modal { background:#fff; width:min(620px,100%); max-height:min(92vh,850px); overflow-y:auto; border-radius:24px; box-shadow:0 24px 75px rgba(0,0,0,.22); padding:24px; }
        .settings-heading { display:flex; align-items:center; justify-content:space-between; margin-bottom:16px; }
        .settings-heading h2 { color:var(--dark-green); font-size:23px; }
        .settings-x { border:0; border-radius:50%; background:var(--sage); width:36px; height:36px; }
        .settings-photo { display:flex; gap:16px; align-items:center; margin-bottom:18px; }
        .settings-photo-preview { width:84px; height:84px; border-radius:50%; object-fit:cover; background:var(--sage); display:grid; place-items:center; font-size:32px; flex-shrink:0; }
        .settings-photo input { max-width:100%; font-size:12px; }
        .settings-grid { display:grid; grid-template-columns:1fr 1fr; gap:13px; }
        .settings-field { display:grid; gap:5px; min-width:0; }
        .settings-field.full { grid-column:1/-1; }
        .settings-field label { font-weight:650; font-size:13px; }
        .settings-field input,.settings-field textarea { width:100%; border:1px solid var(--border); border-radius:12px; padding:11px 12px; font:inherit; font-size:14px; background:#fcfdfb; color:var(--text); }
        .settings-field textarea { min-height:75px; resize:vertical; }
        .settings-actions { display:flex; justify-content:flex-end; gap:9px; margin-top:18px; }
        .settings-danger { border-top:1px solid var(--border); margin-top:22px; padding-top:17px; display:flex; justify-content:space-between; gap:12px; align-items:center; }
        .settings-danger p { color:var(--muted); font-size:12px; }
        .settings-delete { color:#a12d2d; background:#fff0f0; border:1px solid #f2c9c9; border-radius:12px; padding:10px 12px; font-weight:700; }
        .settings-errors { padding:12px; background:#fff0f0; color:#922; border-radius:12px; margin-bottom:15px; }
        body.settings-open { overflow:hidden; }
        @media(max-width:520px) { .settings-grid { grid-template-columns:1fr; } .settings-modal { padding:18px; } .settings-danger { align-items:flex-start; flex-direction:column; } }

        /* Profile photo cropping popup */
        .crop-backdrop { position:fixed; inset:0; z-index:220; background:rgba(20,36,25,.78); display:none; align-items:center; justify-content:center; padding:16px; }
        .crop-backdrop.is-open { display:flex; }
        .crop-dialog { width:min(440px,100%); background:#fff; padding:22px; border-radius:22px; color:var(--dark-green); box-shadow:0 24px 70px rgba(0,0,0,.25); }
        .crop-dialog h3 { margin-bottom:4px; }
        .crop-dialog p { font-size:13px; color:var(--muted); margin-bottom:14px; }
        .crop-stage { width:min(320px,100%); aspect-ratio:1; margin:auto; overflow:hidden; border-radius:50%; background:#e5ecdc; position:relative; cursor:grab; touch-action:none; user-select:none; }
        .crop-stage:active { cursor:grabbing; }
        .crop-stage img { position:absolute; left:50%; top:50%; max-width:none; max-height:none; pointer-events:none; transform-origin:center center; }
        .crop-zoom { display:flex; align-items:center; gap:12px; margin:20px 0 12px; font-size:13px; }
        .crop-zoom input { flex:1; accent-color:var(--green); min-width:0; }
        .crop-actions { display:flex; justify-content:flex-end; gap:10px; }
        .settings-photo-preview { overflow:hidden; }
    
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

        

/* Standard navbar overrides */
header{background:rgba(255,255,255,.92);position:sticky;top:0;z-index:50;backdrop-filter:blur(8px)}
.navbar{min-height:70px;display:flex;align-items:center;justify-content:space-between;gap:20px}
.nav-links{align-items:center;gap:18px;font-size:14px}
.nav-links .user-trigger{font-family:inherit}
@media(max-width:700px){body{padding-bottom:75px}.navbar{min-height:60px}.nav-text-link,.user-label{display:none}.bottom-nav{display:grid;grid-template-columns:repeat(4,1fr);position:fixed;bottom:0;left:0;right:0;background:white;border-top:1px solid var(--border);z-index:60;padding:6px 0 calc(6px + env(safe-area-inset-bottom,0px))}.bottom-nav a{display:flex;flex-direction:column;align-items:center;color:#617164;font-size:11px;text-decoration:none}.bottom-nav a span.ic{font-size:20px}.notification-panel{right:-60px}}
@media(max-width:390px){.brand{font-size:18px}.brand-icon{width:34px;height:34px}.nav-links{gap:7px}.notification-bell{width:35px;height:35px}}



        :root { --green:#47785b; --dark:#294d38; --sage:#e5ecdc; --cream:#f7f6f0; --border:#e1e7dd; --muted:#728175; }
        * { box-sizing:border-box; }
        body { margin:0; font-family:'Segoe UI',Arial,sans-serif; background:var(--cream); color:#304537; }
        a { color:inherit; text-decoration:none; }
        button,input,select,textarea { font:inherit; }
        .report-container { width:92%; max-width:1000px; margin:35px auto 70px; }
        .back { display:inline-flex; align-items:center; gap:7px; color:var(--green); font-size:14px; font-weight:650; margin-bottom:20px; }
        .heading { margin-bottom:24px; }
        .heading h1 { font-size:30px; margin:0 0 8px; color:var(--dark); }
        .heading p { margin:0; color:var(--muted); line-height:1.6; }
        .layout { display:grid; grid-template-columns:minmax(0,1fr) 280px; align-items:start; gap:22px; }
        .panel { background:#fff; border:1px solid var(--border); border-radius:16px; padding:26px; box-shadow:0 5px 20px rgba(41,77,56,.035); }
        .panel h2 { margin:0 0 6px; font-size:20px; color:var(--dark); }
        .panel .sub { color:var(--muted); margin:0 0 24px; font-size:13px; line-height:1.6; }
        .field { margin-bottom:19px; }
        label { display:block; font-weight:650; font-size:14px; margin-bottom:8px; }
        .required { color:#bd4a4a; }
        input[type=text],select,textarea { width:100%; border:1px solid #d6dfd4; border-radius:10px; padding:12px 13px; outline:none; background:white; color:#304537; transition:border .15s,box-shadow .15s; }
        input[type=text]:focus,select:focus,textarea:focus { border-color:var(--green); box-shadow:0 0 0 3px rgba(71,120,91,.12); }
        textarea { resize:vertical; min-height:145px; }
        .hint { color:var(--muted); font-size:12px; margin-top:7px; line-height:1.5; }
        .error { color:#b33030; font-size:12px; margin-top:7px; }
        .invalid { border-color:#c74d4d !important; }
        .upload { border:2px dashed #cad8ca; border-radius:12px; padding:23px 16px; text-align:center; background:#fbfcf9; }
        .upload .upload-icon { font-size:32px; margin-bottom:7px; }
        .upload input { max-width:100%; font-size:13px; margin-top:13px; }
        .upload strong { display:block; font-size:14px; }
        .upload small { display:block; color:var(--muted); margin-top:5px; }
        .preview { display:none; margin-top:15px; }
        .preview img { max-width:100%; max-height:240px; border-radius:10px; object-fit:contain; border:1px solid var(--border); }
        .actions { display:flex; justify-content:flex-end; gap:11px; flex-wrap:wrap; margin-top:28px; }
        .btn { border:0; border-radius:9px; padding:12px 20px; font-weight:700; font-size:14px; cursor:pointer; display:inline-flex; align-items:center; justify-content:center; }
        .btn-secondary { background:#eef1e9; color:var(--dark); }
        .btn-primary { background:var(--green); color:white; }
        .btn-primary:hover { background:var(--dark); }
        .btn-primary:disabled { opacity:.7; cursor:wait; }
        .side { display:grid; gap:17px; }
        .side .panel { padding:21px; }
        .side h3 { margin:0 0 12px; color:var(--dark); font-size:16px; }
        .side p { font-size:13px; line-height:1.7; color:#657567; margin:0; }
        .step { display:flex; gap:11px; align-items:flex-start; margin-top:14px; }
        .step-icon { flex:none; width:30px; height:30px; border-radius:50%; background:var(--sage); color:var(--dark); display:grid; place-items:center; font-weight:750; font-size:12px; }
        .step strong { display:block; font-size:13px; margin-bottom:3px; }
        .status { display:inline-block; border-radius:100px; padding:6px 12px; background:#fff0d7; color:#94631a; font-size:12px; font-weight:750; }
        .alert { padding:13px 16px; border-radius:10px; background:#fff1f1; color:#9c2929; margin-bottom:20px; font-size:13px; line-height:1.6; }
        @media(max-width:800px) { .layout { grid-template-columns:1fr; } .side { grid-template-columns:repeat(2,minmax(0,1fr)); } }
    
/* Report form responsive and navigation safeguards */
.report-container{width:92%;max-width:1000px;margin:35px auto 70px}
@media(max-width:700px){.report-container{margin-top:24px;margin-bottom:95px}}

/* ADD ITEM PAGE - isolated styles to preserve shared header/profile */
.add-item-container{width:min(800px,92%);margin:0 auto;padding:40px 0 65px}
.add-item-container .page-heading{margin-bottom:25px}
.add-item-container .page-heading h1{font-size:32px;margin:0 0 10px;color:#294d38}
.add-item-container .page-heading p{color:#687568;line-height:1.6;margin:0}
.add-item-container .form-card{background:#fff;padding:30px;border-radius:18px;border:1px solid #e8e9e2;box-shadow:0 8px 30px rgba(41,77,56,.05)}
.add-item-container .form-group{margin-bottom:22px}
.add-item-container .form-group label{display:block;font-size:14px;font-weight:700;margin-bottom:9px}
.add-item-container .required{color:#c64b42}
.add-item-container .form-group input:not([type=checkbox]),.add-item-container .form-group select,.add-item-container .form-group textarea{display:block;width:100%;padding:12px 14px;border:1px solid #d8ddd3;border-radius:9px;background:#fff;color:#34483b;font:inherit;font-size:14px}
.add-item-container .form-group input:focus,.add-item-container .form-group select:focus,.add-item-container .form-group textarea:focus{outline:none;border-color:#719477;box-shadow:0 0 0 3px rgba(113,148,119,.15)}
.add-item-container .form-group textarea{min-height:120px;resize:vertical}
.add-item-container .help-text{margin-top:7px;color:#7b857a;font-size:12px;line-height:1.5}
.add-item-container .error{color:#b42318;font-size:13px;margin-top:7px}
.add-item-container .alert{background:#fce8e6;color:#a12622;padding:14px 18px;border-radius:8px;margin-bottom:20px;line-height:1.6}
.add-item-container .form-actions{display:flex;justify-content:flex-end;align-items:center;gap:12px;flex-wrap:wrap;margin-top:30px}
.add-item-container .add-btn{display:inline-flex;align-items:center;justify-content:center;padding:12px 20px;border:0;border-radius:9px;font-size:14px;text-decoration:none;cursor:pointer;font-weight:700;font-family:inherit}
.add-item-container .add-btn-primary{background:#47785b;color:white}
.add-item-container .add-btn-primary:hover{background:#294d38}
.add-item-container .add-btn-secondary{background:#edf0e9;color:#34483b}
.add-item-container .add-btn-secondary:hover{background:#e1e6dc}
.add-item-container [hidden]{display:none!important}
/* Match My Items screenshot: keep profile name on desktop and avoid wrapping */
@media(min-width:701px){.navbar{width:min(1120px,92%);gap:16px}.nav-links{gap:16px;flex-wrap:nowrap;min-width:0}.nav-links .user-label{display:inline-block!important;white-space:nowrap;line-height:1.45;text-align:center;font-weight:700;color:#294d38}.nav-links .user-trigger{flex-shrink:0;white-space:nowrap}.nav-links .notification-dropdown{flex-shrink:0}.brand{white-space:nowrap;flex-shrink:0}}
@media(min-width:701px) and (max-width:980px){.brand{font-size:19px}.nav-links{gap:12px}.nav-links .nav-text-link{font-size:13px}.nav-links .user-trigger{gap:7px;padding-right:0}}
@media(max-width:700px){.add-item-container{padding:24px 0 100px}.add-item-container .page-heading h1{font-size:27px}.add-item-container .form-card{padding:22px 18px}.add-item-container .form-actions{flex-direction:column-reverse;align-items:stretch}.add-item-container .form-actions .add-btn{width:100%}}


/* My Borrow Requests page styling */
        .request-container {
            max-width: 850px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .page-heading {
            margin-bottom: 30px;
        }

        .page-heading h1 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        .page-heading p {
            margin: 0;
            color: #687568;
            line-height: 1.6;
        }

        .request-count {
            display: inline-block;
            margin-top: 18px;
            padding: 8px 14px;
            border-radius: 20px;
            background: #E6EDE2;
            color: #52765B;
            font-size: 13px;
            font-weight: bold;
        }

        .notification-card {
            display: flex;
            gap: 18px;
            margin-bottom: 16px;
            padding: 22px;
            background: #FFFFFF;
            border: 1px solid #E8E9E2;
            border-radius: 16px;
        }

        .notification-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #E6EDE2;
            font-size: 23px;
        }

        .notification-content {
            flex: 1;
            min-width: 0;
        }

        .notification-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
        }

        .notification-title {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .notification-text {
            margin: 8px 0;
            color: #687568;
            font-size: 14px;
            line-height: 1.6;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status-pending {
            background: #FFF1D6;
            color: #996600;
        }

        .status-approved {
            background: #E0F1E3;
            color: #287747;
        }

        .status-rejected {
            background: #FCE7E7;
            color: #A63D3D;
        }

        .request-details {
            margin-top: 15px;
            padding: 15px;
            border-radius: 10px;
            background: #F7F9F5;
        }

        .request-details p {
            margin: 7px 0;
            font-size: 14px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .status-message {
            margin-top: 15px;
            padding: 12px 14px;
            border-radius: 9px;
            font-size: 14px;
            line-height: 1.6;
        }

        .message-pending {
            background: #FFF8E8;
            color: #8A6500;
        }

        .message-approved {
            background: #E0F1E3;
            color: #287747;
        }

        .message-rejected {
            background: #FCE7E7;
            color: #A63D3D;
        }

        .empty-state {
            padding: 55px 25px;
            text-align: center;
            background: #FFFFFF;
            border: 1px solid #E8E9E2;
            border-radius: 16px;
        }

        .empty-state h3 {
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #687568;
            line-height: 1.7;
        }

        .browse-button {
            display: inline-block;
            margin-top: 18px;
            padding: 12px 20px;
            background: #52765B;
            color: #FFFFFF;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .browse-button:hover {
            background: #3F6048;
        }

        @media (max-width: 600px) {
            .request-container {
                margin-top: 28px;
            }

            .notification-card {
                padding: 16px;
                gap: 12px;
            }

            .notification-icon {
                width: 40px;
                height: 40px;
                font-size: 19px;
            }

            .notification-top {
                flex-direction: column;
            }
        }
    
@media(max-width:700px){.request-container{margin:24px auto 100px;padding:0 16px}}

/* Create Event — isolated form styles; shared header remains unchanged */
.event-create-container{max-width:760px;margin:0 auto;padding:35px 18px 90px;font-family:"Segoe UI",Arial,sans-serif;color:#304537}
.event-back{display:inline-block;color:#47785b;font-weight:700;text-decoration:none;margin-bottom:20px}
.event-back:hover{text-decoration:underline}
.event-form-card{background:#fff;border:1px solid #e6e9df;border-radius:24px;padding:32px;box-shadow:0 6px 24px rgba(30,60,40,.035)}
.event-brand{color:#47785b;font-size:14px;font-weight:750;margin-bottom:10px}
.event-form-card h1{color:#294d38;font-size:30px;line-height:1.25;margin:0 0 8px;font-weight:750}
.event-subtitle{color:#788579;font-size:14px;margin:0 0 28px}
.event-field{margin-bottom:20px}
.event-field label{display:block;font-weight:650;font-size:14px;margin-bottom:7px}
.event-field label span{color:#b42318}
.event-field input,.event-field select,.event-field textarea{display:block;width:100%;min-width:0;padding:12px 14px;border:1px solid #e6e9df;border-radius:12px;font:inherit;color:#304537;background:#fff}
.event-field input:focus,.event-field select:focus,.event-field textarea:focus{outline:2px solid #e5ecdc;border-color:#47785b}
.event-field textarea{resize:vertical;min-height:110px}
.event-date-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:16px}
.event-error{color:#b42318;font-size:12px;margin:5px 0 0}
.event-error-list{background:#fff0ee;color:#b42318;padding:14px 18px;border-radius:12px;margin-bottom:20px;font-size:14px}
.event-error-list ul{margin:8px 0 0;padding-left:22px}
.event-actions{display:flex;gap:12px;margin-top:25px;flex-wrap:wrap}
.event-btn{display:inline-flex;align-items:center;justify-content:center;border:0;border-radius:999px;padding:12px 20px;font:inherit;font-size:14px;font-weight:700;text-decoration:none;cursor:pointer}
.event-btn-primary{background:#47785b;color:white}.event-btn-primary:hover{background:#294d38}
.event-btn-light{background:#e5ecdc;color:#294d38}
@media(max-width:600px){.event-create-container{padding:24px 16px 110px}.event-form-card{padding:22px 18px;border-radius:18px}.event-date-grid{grid-template-columns:1fr;gap:0}.event-form-card h1{font-size:25px}.event-actions .event-btn{flex:1}}

/* My Events layout preservation */
.events-layout{display:grid;grid-template-columns:minmax(0,1fr) 340px;gap:22px;align-items:start}
@media(max-width:850px){.events-layout{grid-template-columns:minmax(0,1fr)}}
@media(min-width:761px){.navbar .user-label{display:inline-block!important;white-space:nowrap}}
@media(max-width:760px){.navbar{flex-direction:row!important;align-items:center!important}.nav-links{width:auto!important;flex-wrap:nowrap!important}.container{width:100%;max-width:1120px}.events-layout{grid-template-columns:minmax(0,1fr)}}

/* K.I.T.A. unified header and responsive navigation */
.kita-brand-logo{display:block;width:auto;height:43px;max-width:175px;object-fit:contain}
.navbar .brand{display:inline-flex;align-items:center;flex-shrink:0}
@media(max-width:760px){
  .kita-brand-logo{height:36px;max-width:145px}
  .navbar{width:calc(100% - 28px);min-height:62px;gap:8px}
  .nav-links{gap:9px}
  .bottom-nav{grid-template-columns:repeat(3,minmax(0,1fr))!important}
  .bottom-nav a{min-height:46px;gap:3px;text-align:center}
}
@media(max-width:370px){.kita-brand-logo{height:31px;max-width:125px}}

/* K.I.T.A. consistent header and mobile navigation */
.site-header .navbar, header .navbar{width:min(1120px,92%);margin:auto;min-height:70px;display:flex;flex-direction:row;align-items:center;justify-content:space-between;gap:20px}
.site-header .brand,header .brand{display:flex;align-items:center;gap:11px;flex-shrink:0;text-decoration:none;font-size:inherit}
.site-header .brand-icon,header .brand-icon{width:52px;height:52px;display:flex;align-items:center;justify-content:center;background:#fff!important;padding:0!important;border-radius:15px;overflow:hidden;flex-shrink:0;box-shadow:0 5px 18px rgba(0,0,0,.07)}
.site-header .brand-icon img,header .brand-icon img{display:block;width:100%;height:100%;object-fit:contain}
.site-header .brand-text,header .brand-text{display:inline-flex;align-items:baseline;gap:1px;font-family:'Fredoka','Segoe UI',sans-serif;font-size:27px;font-weight:700;letter-spacing:-1.2px;line-height:1;white-space:nowrap}
.brand-text .k{color:#FFE047;transform:rotate(-6deg)}.brand-text .i{color:#6DE0BF;transform:rotate(4deg)}.brand-text .t{color:#FF9C68;transform:rotate(-5deg)}.brand-text .a{color:#4CC9DF;transform:rotate(5deg)}
.bottom-nav{grid-template-columns:repeat(3,minmax(0,1fr))!important}
@media(max-width:760px){header .navbar{width:92%;min-height:60px;flex-direction:row;align-items:center;padding:7px 0}header .brand{gap:7px}header .brand-icon{width:42px;height:42px;border-radius:12px}header .brand-text{font-size:21px}header .nav-links{gap:10px} .bottom-nav a{min-width:0}}
@media(max-width:390px){header .brand-text{font-size:20px}header .brand-icon{width:40px;height:40px}}
</style>
</head>
<body>

    <header>
        <div class="container navbar">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-icon"><img src="{{ asset('images/kita-full-logo.png') }}" alt="K.I.T.A. logo"></span>
                <span class="brand-text" aria-label="K.I.T.A."><span class="k">K.</span><span class="i">I.</span><span class="t">T.</span><span class="a">A.</span></span>
            </a>

            <nav class="nav-links">
                <a href="{{ url('/events') }}" class="nav-text-link">Events</a>
                <a href="{{ route('issues.index') }}" class="nav-text-link">Issues</a>
                <a href="{{ route('community.index') }}" class="nav-text-link">Marketplace</a>

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

                    <span class="avatar-sm">
                        @if (Auth::user()->profile_photo)
                            <img
                                src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                alt="Profile Picture"
                                class="profile-avatar-img"
                            >
                        @else
                            {{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                        @endif
                    </span>

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
                ['icon' => '📦', 'label' => 'My Items',    'href' => route('community.my-items'),      'soon' => false],
                ['icon' => '📅', 'label' => 'My Events',   'href' => route('events.mine'),  'soon' => false],
                ['icon' => '📣', 'label' => 'My Complain', 'href' => route('complaints.index'),   'soon' => false],
                ['icon' => '💬', 'label' => 'Messages',    'href' => route('messages.index'),      'soon' => false],
                ['icon' => '⚙️', 'label' => 'Settings',    'href' => '#settings',          'soon' => false],
            ];
        @endphp

        <div class="drawer-overlay" id="drawerOverlay"></div>

        <aside class="drawer" id="userDrawer" role="dialog" aria-modal="true" aria-label="My account" aria-hidden="true">
            <button type="button" class="drawer-close" id="drawerClose" aria-label="Close menu">✕</button>

            <div class="drawer-profile">   
                <div class="avatar-lg">
                    @if (Auth::user()->profile_photo)
                        <img
                            src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                            alt="Profile Picture"
                            class="profile-avatar-img"
                        >
                    @else
                        {{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                    @endif
                </div>

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
                           class="drawer-link {{ url()->current() === $link['href'] ? 'active' : '' }}" {{ $link['label'] === 'Settings' ? 'id=settingsOpen' : '' }}>
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


    @auth
    <div class="settings-backdrop" id="settingsBackdrop" aria-hidden="true">
      <section class="settings-modal" id="settingsDialog" role="dialog" aria-modal="true" aria-labelledby="settingsTitle" tabindex="-1">
        <div class="settings-heading"><h2 id="settingsTitle">⚙️ Account Settings</h2><button type="button" class="settings-x" id="settingsClose" aria-label="Close settings">✕</button></div>
        @if ($errors->any())
          <div class="settings-errors" role="alert"><strong>Please check:</strong><ul style="padding-left:20px">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif
        <form id="settingsForm" action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="_settings_form" value="1">
          <div class="settings-photo">
            @if (Auth::user()->profile_photo)
              <img class="settings-photo-preview" id="settingsPreview" src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile picture">
            @else
              <div class="settings-photo-preview" id="settingsPreview">{{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}</div>
            @endif
            <div><strong>Profile Picture</strong><p style="font-size:12px;color:var(--muted)">JPG, PNG or WEBP · max 2MB</p><input type="file" name="profile_photo" id="settingsPhoto" accept="image/jpeg,image/png,image/webp"></div>
          </div>
          <div class="settings-grid">
            <div class="settings-field full">
                <label for="settingsName">Full Name</label>
                <input
                    type="text"
                    id="settingsName"
                    name="full_name"
                    value="{{ old('full_name', Auth::user()->full_name) }}"
                    maxlength="255"
                    required
                >
            </div>
            <div class="settings-field">
                <label for="settingsShort">Short Name (2 words)</label>
                <input
                    type="text"
                    id="settingsShort"
                    name="name"
                    value="{{ old('name', Auth::user()->name) }}"
                    maxlength="255"
                    required
                >
            </div>
            <div class="settings-field"><label for="settingsUsername">Username</label><input id="settingsUsername" name="username" value="{{ old('username', Auth::user()->username) }}" maxlength="50" pattern="[A-Za-z0-9_.]+" required></div>
            <div class="settings-field full"><label for="settingsEmail">Email</label><input type="email" id="settingsEmail" name="email" value="{{ old('email', Auth::user()->email) }}" required></div>
            <div class="settings-field full"><label for="settingsAddress">Address</label><textarea id="settingsAddress" name="address" maxlength="500">{{ old('address', Auth::user()->address) }}</textarea></div>
            <div class="settings-field full"><label for="settingsPhone">Phone Number</label><input type="tel" id="settingsPhone" name="phone" value="{{ old('phone', Auth::user()->phone) }}" maxlength="25"></div>
          </div>
          <div class="settings-actions"><button type="button" class="btn btn-light" id="settingsCancel">Cancel</button><button type="submit" class="btn btn-primary">Save Changes</button></div>
        </form>
        <div class="settings-danger"><div><strong style="color:#a12d2d">Delete Account</strong><p>This permanently removes your account and related data.</p></div><button type="button" class="settings-delete" id="settingsDeleteOpen">Delete Account</button></div>
      </section>
    </div>
    <div class="settings-backdrop" id="deleteBackdrop" aria-hidden="true" style="z-index:160">
      <section class="settings-modal" role="dialog" aria-modal="true" aria-labelledby="deleteTitle" style="max-width:430px">
        <div class="settings-heading"><h2 id="deleteTitle">Delete account?</h2><button type="button" class="settings-x" id="deleteClose">✕</button></div>
        <p>This cannot be undone. Enter your current password to confirm.</p>
        <form action="{{ route('settings.destroy') }}" method="POST" style="margin-top:14px">
          @csrf @method('DELETE')
          <div class="settings-field"><label for="deletePassword">Current password</label><input id="deletePassword" name="password" type="password" required autocomplete="current-password"></div>
          <div class="settings-actions"><button type="button" class="btn btn-light" id="deleteCancel">Cancel</button><button type="submit" class="settings-delete">Yes, Delete Account</button></div>
        </form>
      </section>
    </div>
    @endauth


    @auth
    <div class="crop-backdrop" id="profileCropBackdrop" aria-hidden="true">
      <section class="crop-dialog" role="dialog" aria-modal="true" aria-labelledby="cropTitle">
        <h3 id="cropTitle">Adjust Profile Picture</h3>
        <p>Drag gambar untuk ubah posisi, kemudian zoom ikut kesesuaian.</p>
        <div class="crop-stage" id="profileCropStage">
          <img id="profileCropImage" alt="Photo being cropped" draggable="false">
        </div>
        <label class="crop-zoom" for="profileCropZoom">Zoom
          <input id="profileCropZoom" type="range" min="1" max="3" step="0.01" value="1">
        </label>
        <div class="crop-actions">
          <button type="button" class="btn btn-light" id="profileCropCancel">Cancel</button>
          <button type="button" class="btn btn-primary" id="profileCropSave">Use This Photo</button>
        </div>
      </section>
    </div>
    @endauth




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

    <footer>
        NeighbourLink — Building a stronger community, one share at a time.
    </footer>


<nav class="bottom-nav" aria-label="Main navigation"><a href="{{ url('/events') }}"><span class="ic">📅</span>Events</a><a href="{{ route('issues.index') }}"><span class="ic">📣</span>Issues</a><a href="{{ route('community.index') }}"><span class="ic">📦</span>Marketplace</a></nav>

<script>

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


        // Settings modal inside the homepage
        (function () {
            const opener = document.getElementById('settingsOpen');
            const backdrop = document.getElementById('settingsBackdrop');
            if (!opener || !backdrop) return;
            const del = document.getElementById('deleteBackdrop');
            let previousFocus = null;
            function show(node) { node.classList.add('is-open'); node.setAttribute('aria-hidden','false'); document.body.classList.add('settings-open'); (node.querySelector('input,button') || node).focus(); }
            function hide(node) { node.classList.remove('is-open'); node.setAttribute('aria-hidden','true'); if (!backdrop.classList.contains('is-open') && !del.classList.contains('is-open')) document.body.classList.remove('settings-open'); }
            function openSettings(e) { if(e) e.preventDefault(); previousFocus=document.activeElement; document.body.classList.remove('drawer-open'); const drawer=document.getElementById('userDrawer'); if(drawer) drawer.setAttribute('aria-hidden','true'); const trigger=document.getElementById('drawerOpen'); if(trigger) trigger.setAttribute('aria-expanded','false'); show(backdrop); }
            function closeSettings() { hide(backdrop); if(previousFocus && previousFocus.isConnected) previousFocus.focus(); }
            opener.addEventListener('click',openSettings);
            document.getElementById('settingsClose').addEventListener('click',closeSettings);
            document.getElementById('settingsCancel').addEventListener('click',closeSettings);
            backdrop.addEventListener('click',e=>{if(e.target===backdrop)closeSettings();});
            document.getElementById('settingsDeleteOpen').addEventListener('click',()=>{hide(backdrop);show(del);});
            function closeDelete(){hide(del);show(backdrop);}
            document.getElementById('deleteClose').addEventListener('click',closeDelete);
            document.getElementById('deleteCancel').addEventListener('click',closeDelete);
            del.addEventListener('click',e=>{if(e.target===del)closeDelete();});
            document.addEventListener('keydown',e=>{if(e.key==='Escape'){if(del.classList.contains('is-open'))closeDelete();else if(backdrop.classList.contains('is-open'))closeSettings();}});
            // Let users drag and zoom before submitting their profile picture.
            (function () {
                const input = document.getElementById('settingsPhoto');
                const popup = document.getElementById('profileCropBackdrop');
                const stage = document.getElementById('profileCropStage');
                const photo = document.getElementById('profileCropImage');
                const zoom = document.getElementById('profileCropZoom');
                const save = document.getElementById('profileCropSave');
                const cancel = document.getElementById('profileCropCancel');
                const form = document.getElementById('settingsForm');
                let sourceUrl = null, baseScale = 1, scale = 1, x = 0, y = 0;
                let start = null, originalFile = null, confirmed = true;
                function stageSize() { return stage.getBoundingClientRect().width; }
                function constrain() {
                    const size = stageSize();
                    const halfX = Math.max(0, (photo.naturalWidth * scale - size) / 2);
                    const halfY = Math.max(0, (photo.naturalHeight * scale - size) / 2);
                    x = Math.max(-halfX, Math.min(halfX, x));
                    y = Math.max(-halfY, Math.min(halfY, y));
                }
                function render() {
                    constrain();
                    photo.style.width = photo.naturalWidth + 'px';
                    photo.style.height = photo.naturalHeight + 'px';
                    photo.style.transform = `translate(calc(-50% + ${x}px), calc(-50% + ${y}px)) scale(${scale})`;
                }
                function close(keep) {
                    popup.classList.remove('is-open');
                    popup.setAttribute('aria-hidden', 'true');
                    if (!keep) { input.value = ''; confirmed = true; }
                    if (sourceUrl) { URL.revokeObjectURL(sourceUrl); sourceUrl = null; }
                    start = null;
                }
                input.addEventListener('change', function () {
                    const file = input.files[0];
                    if (!file) return;
                    if (!['image/jpeg','image/png','image/webp'].includes(file.type) || file.size > 2 * 1024 * 1024) {
                        alert('Please choose a JPG, PNG or WEBP image under 2MB.');
                        input.value = '';
                        return;
                    }
                    originalFile = file;
                    confirmed = false;
                    if (sourceUrl) URL.revokeObjectURL(sourceUrl);
                    sourceUrl = URL.createObjectURL(file);
                    photo.onload = () => {
                        popup.classList.add('is-open');
                        popup.setAttribute('aria-hidden','false');
                        zoom.value = '1';
                        x = 0; y = 0;
                        baseScale = Math.max(stageSize()/photo.naturalWidth, stageSize()/photo.naturalHeight);
                        scale = baseScale;
                        render();
                        zoom.focus();
                    };
                    photo.onerror = () => { alert('Unable to read this image.'); close(false); };
                    photo.src = sourceUrl;
                });
                zoom.addEventListener('input', () => {
                    scale = baseScale * Number(zoom.value);
                    render();
                });
                stage.addEventListener('pointerdown', e => {
                    if (!popup.classList.contains('is-open')) return;
                    start = { id:e.pointerId, px:e.clientX, py:e.clientY, x, y };
                    stage.setPointerCapture(e.pointerId);
                });
                stage.addEventListener('pointermove', e => {
                    if (!start || e.pointerId !== start.id) return;
                    x = start.x + e.clientX - start.px;
                    y = start.y + e.clientY - start.py;
                    render();
                });
                ['pointerup','pointercancel','lostpointercapture'].forEach(name => stage.addEventListener(name, () => { start = null; }));
                cancel.addEventListener('click', () => close(false));
                save.addEventListener('click', () => {
                    if (!photo.complete || !photo.naturalWidth) return;
                    save.disabled = true;
                    const canvas = document.createElement('canvas');
                    canvas.width = canvas.height = 512;
                    const ctx = canvas.getContext('2d');
                    const factor = 512 / stageSize();
                    ctx.fillStyle = '#fff';
                    ctx.fillRect(0,0,512,512);
                    const w = photo.naturalWidth * scale * factor;
                    const h = photo.naturalHeight * scale * factor;
                    ctx.drawImage(photo, 256 + x*factor - w/2, 256 + y*factor - h/2, w, h);
                    canvas.toBlob(blob => {
                        save.disabled = false;
                        if (!blob) { alert('Unable to crop this image.'); return; }
                        const cropped = new File([blob], 'profile-photo.jpg', {type:'image/jpeg'});
                        const transfer = new DataTransfer();
                        transfer.items.add(cropped);
                        input.files = transfer.files;
                        confirmed = true;
                        let preview = document.getElementById('settingsPreview');
                        if (preview.tagName !== 'IMG') {
                            const img = document.createElement('img');
                            img.id = 'settingsPreview';
                            img.className = 'settings-photo-preview';
                            img.alt = 'Profile preview';
                            preview.replaceWith(img);
                            preview = img;
                        }
                        preview.src = URL.createObjectURL(blob);
                        preview.onload = () => URL.revokeObjectURL(preview.src);
                        close(true);
                    }, 'image/jpeg', 0.9);
                });
                form.addEventListener('submit', e => {
                    if (!confirmed) { e.preventDefault(); alert('Please finish adjusting your profile photo first.'); }
                });
                document.addEventListener('keydown', e => {
                    if (e.key === 'Escape' && popup.classList.contains('is-open')) { e.stopImmediatePropagation(); close(false); }
                }, true);
            })();
            @if($errors->any() && old('_settings_form'))
              openSettings();
            @endif
        })();




</script>
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
                        // Drawer handled by shared navigation script.
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