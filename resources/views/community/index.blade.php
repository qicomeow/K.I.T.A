<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace | K.I.T.A.</title>

    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #F7F6F0;
            --surface: #FFFFFF;
            --ink: #26382D;
            --muted: #6B796E;
            --line: #E6E8DF;
            --green: #52765B;
            --green-dark: #3F6048;
            --sage: #E6EDE2;
            --mint: #CFE3D2;
            --sun: #F2C46B;
            --sun-soft: #FBEFD2;
            --sky: #D7E8EE;
            --radius: 20px;
            --shadow: 0 10px 30px rgba(52,72,59,.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--bg);
            color: var(--ink);
            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
            cursor: pointer;
        }

        /* =========================
           HEADER
        ========================= */

        .site-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(255,255,255,.94);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--line);
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
            color: #294d38;
            font-size: 21px;
            font-weight: 750;
            white-space: nowrap;
        }

        .brand-icon {
            background: #47785b;
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

        .nav-links > a:hover {
            color: #47785b;
        }

        .nav-links > a.active {
            color: #294d38;
            font-weight: 750;
        }

        .nav-links form {
            margin: 0;
        }

        .nav-btn {
            border: 1px solid var(--line);
            background: white;
            color: #294d38;
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 650;
        }

        .nav-btn:hover {
            background: #e5ecdc;
        }

        .nav-btn-primary {
            background: #47785b;
            color: white;
            border-color: #47785b;
        }

        .nav-btn-primary:hover {
            background: #294d38;
            color: white;
        }

        /* =========================
           NOTIFICATIONS
        ========================= */

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
            background: #e5ecdc;
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
            max-height: 300px;
            overflow-y: auto;
            background: white;
            border: 1px solid var(--line);
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(41,77,56,.13);
            z-index: 1000;
            color: #304537;
        }

        .notification-panel-title {
            padding: 11px 13px;
            font-weight: 750;
            color: #294d38;
            border-bottom: 1px solid var(--line);
            font-size: 13px;
        }

        .notification-entry {
            display: flex;
            flex-direction: column;
            gap: 3px;
            padding: 10px 13px;
            border-bottom: 1px solid var(--line);
        }

        .notification-entry:hover {
            background: #f8f8f1;
        }

        .notification-entry strong {
            font-size: 12px;
            color: #294d38;
        }

        .notification-entry span {
            font-size: 11px;
            color: #788579;
            line-height: 1.5;
        }

        .notification-empty {
            padding: 18px 13px;
            text-align: center;
            color: #788579;
            font-size: 12px;
        }

        .notification-footer {
            display: flex;
            flex-direction: column;
            gap: 7px;
            padding: 10px 13px;
            background: #f8f8f1;
        }

        .notification-footer a {
            font-size: 12px;
            font-weight: 700;
            color: #47785b;
        }

        /* =========================
           USER AVATAR
        ========================= */

        .user-trigger {
            display: flex;
            align-items: center;
            gap: 9px;
            background: none;
            border: none;
            color: #294d38;
            font-weight: 650;
            font-size: 14px;
            padding: 4px 12px 4px 4px;
            border-radius: 999px;
            transition: .2s;
        }

        .user-trigger:hover {
            background: #e5ecdc;
        }

        .avatar-sm {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #47785b;
            color: white;
            display: grid;
            place-items: center;
            font-weight: 750;
            font-size: 15px;
        }

        /* =========================
           SIDE DRAWER
        ========================= */

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
            background: #e5ecdc;
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
            transform: translateX(0);
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
            color: #294d38;
            font-size: 16px;
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
            background: #47785b;
            color: white;
            border: 4px solid white;
            box-shadow: 0 8px 18px rgba(41,77,56,.15);
            display: grid;
            place-items: center;
            font-size: 40px;
            font-weight: 750;
        }

        .drawer-profile h2 {
            color: #294d38;
            font-size: 19px;
            overflow-wrap: anywhere;
        }

        .drawer-profile p {
            color: #788579;
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
            color: #294d38;
            font-weight: 650;
            font-size: 15px;
            transition: background .2s;
        }

        a.drawer-link:hover {
            background: rgba(255,255,255,.65);
        }

        .drawer-link.active {
            background: #47785b;
            color: white;
            box-shadow: 0 6px 14px rgba(71,120,91,.25);
        }

        a.drawer-link.active:hover {
            background: #294d38;
            color: white;
        }

        .drawer-coming-soon {
            opacity: .65;
            cursor: default;
        }

        .soon-tag {
            margin-left: auto;
            background: rgba(255,255,255,.8);
            color: #47785b;
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
            color: #294d38;
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
            color: #788579;
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

        /* =========================
           COMMUNITY CONTENT
        ========================= */

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 36px 24px 20px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 22px;
            background: var(--green);
            color: white;
            border: none;
            border-radius: 999px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 700;
            transition: transform .15s, background .2s;
        }

        .btn:hover {
            background: var(--green-dark);
            transform: translateY(-1px);
        }

        .btn-light {
            background: white;
            color: var(--green-dark);
        }

        .btn-light:hover {
            background: var(--sun-soft);
        }

        .clear-btn {
            background: transparent;
            color: var(--muted);
            border: 1px solid var(--line);
        }

        .clear-btn:hover {
            background: var(--sage);
            color: var(--ink);
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg,#5C8565 0%,#3F6048 100%);
            color: white;
            border-radius: 28px;
            padding: 52px 48px;
            margin-bottom: 30px;
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 30px;
            align-items: center;
        }

        .hero::before,
        .hero::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .hero::before {
            width: 320px;
            height: 320px;
            right: -80px;
            top: -120px;
            background: rgba(255,255,255,.08);
        }

        .hero::after {
            width: 180px;
            height: 180px;
            right: 140px;
            bottom: -90px;
            background: rgba(242,196,107,.25);
        }

        .hero-copy,
        .hero-stats {
            position: relative;
            z-index: 1;
        }

        .hero-tag {
            display: inline-block;
            background: rgba(255,255,255,.16);
            padding: 7px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .4px;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-size: 40px;
            line-height: 1.12;
            letter-spacing: -.8px;
            margin-bottom: 14px;
        }

        .hero p {
            line-height: 1.7;
            color: rgba(255,255,255,.85);
            max-width: 520px;
        }

        .hero-actions {
            margin-top: 26px;
        }

        .hero-stats {
            display: grid;
            gap: 12px;
        }

        .stat {
            display: flex;
            align-items: center;
            gap: 14px;
            background: rgba(255,255,255,.13);
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 18px;
            padding: 14px 18px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: rgba(255,255,255,.18);
            font-size: 20px;
        }

        .stat strong {
            display: block;
            font-size: 20px;
        }

        .stat span {
            font-size: 12px;
            color: rgba(255,255,255,.8);
        }

        /* =========================
           ALERTS
        ========================= */

        .alert {
            padding: 14px 18px;
            border-radius: 14px;
            margin-bottom: 22px;
            background: #E0F1E3;
            color: #285D36;
            border: 1px solid #C6E3CB;
        }

        .alert-error {
            background: #FBE3E3;
            color: #922E2E;
            border-color: #F2C3C3;
        }

        /* =========================
           SEARCH AND FILTER
        ========================= */

        .filter-panel {
            background: white;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            padding: 18px;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
        }

        .filter-form {
            display: grid;
            grid-template-columns: minmax(200px,2fr) minmax(160px,1fr) auto;
            gap: 12px;
            align-items: center;
        }

        .search-wrap {
            position: relative;
        }

        .search-wrap span {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .filter-input,
        .filter-select {
            width: 100%;
            min-width: 0;
            height: 48px;
            padding: 0 16px;
            border: 1px solid var(--line);
            border-radius: 999px;
            background: var(--bg);
            color: var(--ink);
            font-size: 14px;
            font-family: inherit;
        }

        .filter-input {
            padding-left: 42px;
        }

        .filter-input:focus,
        .filter-select:focus {
            outline: none;
            background: white;
            border-color: var(--green);
            box-shadow: 0 0 0 4px rgba(82,118,91,.15);
        }

        .filter-actions {
            display: flex;
            gap: 8px;
        }

        .filter-actions .btn {
            height: 48px;
            white-space: nowrap;
        }

        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 14px;
            padding-top: 14px;
            border-top: 1px dashed var(--line);
        }

        .chip {
            padding: 9px 16px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            color: var(--ink);
            background: var(--bg);
            border: 1px solid var(--line);
        }

        .chip:hover {
            border-color: var(--green);
            color: var(--green-dark);
        }

        .chip.active {
            background: var(--green);
            border-color: var(--green);
            color: white;
        }

        .filter-summary {
            margin-top: 14px;
            font-size: 13px;
            line-height: 1.6;
            color: var(--muted);
        }

        /* =========================
           ITEMS
        ========================= */

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .section-heading h2 {
            font-size: 26px;
            letter-spacing: -.4px;
        }

        .count-pill {
            background: var(--sun-soft);
            color: #8A6313;
            font-size: 13px;
            font-weight: 700;
            padding: 8px 14px;
            border-radius: 999px;
        }

        .item-grid {
            display: grid;
            grid-template-columns: repeat(3,minmax(0,1fr));
            gap: 24px;
        }

        .item-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform .25s, box-shadow .25s;
        }

        .item-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 38px rgba(52,72,59,.14);
        }

        .item-media {
            position: relative;
            margin: 10px 10px 0;
            border-radius: 14px;
            overflow: hidden;
        }

        .item-image {
            display: block;
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: var(--sage);
            transition: transform .4s;
        }

        .item-card:hover .item-image {
            transform: scale(1.05);
        }

        .image-placeholder {
            height: 220px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg,var(--sage),var(--mint));
            font-size: 56px;
        }

        .item-type {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            background: white;
            color: var(--green-dark);
            box-shadow: 0 4px 12px rgba(0,0,0,.12);
        }

        .item-type.give_away {
            background: var(--mint);
            color: #2F5A3A;
        }

        .item-type.borrow {
            background: var(--sky);
            color: #2F5B6B;
        }

        .item-type.sell {
            background: var(--sun);
            color: #6B4B08;
        }

        .item-content {
            padding: 18px 20px 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .item-category {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .6px;
            color: var(--green);
            margin-bottom: 6px;
        }

        .item-content h3 {
            font-size: 19px;
            margin-bottom: 8px;
            overflow-wrap: anywhere;
        }

        .item-description {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 16px;
            white-space: pre-line;
            overflow-wrap: anywhere;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .item-details {
            margin-top: auto;
            display: grid;
            gap: 10px;
            padding-top: 14px;
            border-top: 1px solid #ECEDE7;
            font-size: 13px;
            color: var(--muted);
        }

        .item-price {
            display: inline-block;
            width: fit-content;
            background: var(--sun-soft);
            color: #8A6313;
            font-size: 15px;
            font-weight: 800;
            padding: 6px 12px;
            border-radius: 10px;
        }

        .meta-row {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .avatar {
            width: 24px;
            height: 24px;
            flex: none;
            border-radius: 50%;
            background: var(--sage);
            color: var(--green-dark);
            font-size: 11px;
            font-weight: 800;
            display: grid;
            place-items: center;
        }

        .view-item-btn {
            display: block;
            margin-top: 16px;
            padding: 12px 20px;
            background: var(--sage);
            color: var(--green-dark);
            text-align: center;
            font-weight: 700;
            border-radius: 999px;
            font-size: 14px;
        }

        .view-item-btn:hover {
            background: var(--green);
            color: white;
        }

        .empty-state {
            text-align: center;
            background: white;
            padding: 60px 20px;
            border-radius: var(--radius);
            border: 1px dashed #CBD3C6;
        }

        .empty-state .big {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .empty-state h3 {
            margin-bottom: 10px;
        }

        .empty-state p {
            color: var(--muted);
            line-height: 1.7;
            margin-bottom: 22px;
        }

        .pagination {
            margin-top: 32px;
        }

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

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {
            .hero {
                grid-template-columns: 1fr;
                padding: 40px 32px;
            }

            .hero-stats {
                grid-template-columns: repeat(3,1fr);
            }

            .stat {
                flex-direction: column;
                text-align: center;
            }

            .filter-form {
                grid-template-columns: 1fr 1fr;
            }

            .filter-actions {
                grid-column: 1 / -1;
            }

            .item-grid {
                grid-template-columns: repeat(2,minmax(0,1fr));
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
                gap: 12px;
                flex-wrap: wrap;
            }

            .notification-panel {
                right: auto;
                left: 0;
            }

            .user-trigger .user-label {
                font-size: 12px;
            }
        }

        @media (max-width: 580px) {
            .container {
                padding: 24px 16px 10px;
            }

            .hero {
                padding: 30px 22px;
                border-radius: 22px;
            }

            .hero h1 {
                font-size: 28px;
            }

            .hero-stats {
                grid-template-columns: 1fr;
            }

            .stat {
                flex-direction: row;
                text-align: left;
            }

            .filter-form {
                grid-template-columns: 1fr;
            }

            .filter-actions {
                grid-column: auto;
            }

            .filter-actions .btn {
                flex: 1;
            }

            .item-grid {
                grid-template-columns: 1fr;
            }

            .section-heading {
                flex-direction: column;
                align-items: flex-start;
            }
        }


        /* GOOGLE IMAGES-STYLE ITEM PREVIEW */
        .item-card-trigger {
            display: flex; flex-direction: column; width: 100%; height: 100%;
            border: 0; background: transparent; text-align: left;
            color: inherit; cursor: pointer; font: inherit;
        }
        .item-card-trigger:focus-visible { outline: 3px solid var(--green); outline-offset: -3px; }
        .item-card-trigger .item-content { width: 100%; padding: 13px 16px 16px; }
        .item-card-trigger .item-content h3 { margin-bottom: 0; font-size: 17px; }
        .item-card.selected { border-color: var(--green); box-shadow: 0 0 0 2px rgba(82,118,91,.2); }
        .item-preview-panel {
            position: fixed; top: 70px; right: 0; bottom: 0; width: 420px;
            max-width: 42vw; z-index: 45; background: white;
            border-left: 1px solid var(--line);
            box-shadow: -12px 0 35px rgba(41,77,56,.10);
            transform: translateX(105%); visibility: hidden;
            transition: transform .28s ease, visibility .28s;
            display: flex; flex-direction: column;
        }
        body.preview-open .item-preview-panel { transform: translateX(0); visibility: visible; }
        body.preview-open .container { margin-left: 0; margin-right: 420px; max-width: none; }
        body.preview-open .item-grid { grid-template-columns: repeat(2,minmax(0,1fr)); gap: 16px; }
        .preview-topbar {
            display: flex; align-items: center; justify-content: space-between;
            padding: 14px 20px; border-bottom: 1px solid var(--line); flex: none;
        }
        .preview-close { border: none; background: var(--sage); border-radius: 50%;
            width: 34px; height: 34px; color: var(--ink); font-size: 16px; }
        .preview-scroll { overflow-y: auto; flex: 1; }
        .preview-image-wrap { margin: 16px; border-radius: 15px; overflow: hidden; background: var(--sage); }
        .preview-image { width: 100%; max-height: 330px; object-fit: contain; display: block; }
        .preview-image-placeholder { height: 230px; display: grid; place-items: center; font-size: 65px; }
        .preview-info { padding: 4px 20px 30px; }
        .preview-info .preview-type { position: static; display: inline-block; margin-bottom: 16px; }
        .preview-info h2 { font-size: 24px; line-height: 1.25; margin: 5px 0 14px; overflow-wrap: anywhere; }
        .preview-info .item-price { margin-bottom: 14px; }
        .preview-subheading { font-size: 15px; margin: 18px 0 8px; }
        .preview-description { white-space: pre-line; color: var(--muted); line-height: 1.65; overflow-wrap: anywhere; }
        .preview-meta { padding: 12px 0; border-bottom: 1px solid var(--line); color: var(--muted); font-size: 14px; }
        .preview-view-btn { display: block; text-align: center; margin-top: 22px; padding: 14px;
            background: var(--green); color: white; border-radius: 999px; font-weight: 700; }
        .preview-view-btn:hover { background: var(--green-dark); }
        @media (min-width: 761px) and (max-width: 1100px) {
            .item-preview-panel { width: 38vw; }
            body.preview-open .container { margin-right: 38vw; padding-left: 16px; padding-right: 16px; }
            body.preview-open .item-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 760px) {
            .item-preview-panel { top: 0; width: min(430px, 100vw); max-width: 100vw; z-index: 85; }
            body.preview-open .container { margin-right: auto; }
            body.preview-open .item-grid { grid-template-columns: repeat(2,minmax(0,1fr)); }
        }
        @media (max-width: 580px) {
            body.preview-open .item-grid { grid-template-columns: 1fr; }
        }

        .preview-meta-label { display: block; color: var(--muted); font-size: 12px; margin-bottom: 5px; }
        .preview-meta strong { display: block; color: var(--ink); font-weight: 650; overflow-wrap: anywhere; }
        .preview-borrow-form { margin-top: 24px; padding: 18px; background: #f7fbf7; border: 1px solid #e5ece6; border-radius: 14px; }
        .preview-borrow-form h3 { font-size: 18px; margin-bottom: 16px; }
        .preview-borrow-form p { font-size: 14px; line-height: 1.6; }
        .preview-form-group { margin-bottom: 15px; }
        .preview-form-group label { display: block; font-size: 13px; font-weight: 650; margin-bottom: 7px; }
        .preview-form-group input, .preview-form-group textarea {
            width: 100%; padding: 11px 12px; border: 1px solid #d5e3d8;
            border-radius: 9px; background: white; color: var(--ink); font: inherit;
        }
        .preview-form-group textarea { resize: vertical; }
        .preview-borrow-form .preview-view-btn { width: 100%; border: 0; cursor: pointer; font: inherit; font-weight: 700; }
        .preview-notice { padding: 13px; margin-top: 18px; border-radius: 10px; background: var(--sage); font-size: 14px; }
        .preview-notice-error { background: #fff0ee; color: #a12b23; }

        /* Compact detail box below the search filters; two item cards per row */
        .marketplace-results-layout { display: grid; grid-template-columns: minmax(0, 1fr); gap: 18px; align-items: start; }
        .marketplace-results-list { min-width: 0; }
        .marketplace-results-list .item-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; }
        .marketplace-results-list .item-image,
        .marketplace-results-list .image-placeholder { height: 170px; }
        .item-preview-panel {
            position: sticky; top: 90px; right: auto; bottom: auto;
            width: auto; max-width: none; height: auto; max-height: calc(100vh - 110px);
            border: 1px solid var(--line); border-radius: 18px;
            box-shadow: var(--shadow); transform: none; visibility: visible;
            display: none; overflow: hidden; background: white; z-index: 1;
        }
        body.preview-open .marketplace-results-layout { grid-template-columns: minmax(0, 1fr) 330px; }
        body.preview-open .item-preview-panel { display: flex; transform: none; visibility: visible; }
        body.preview-open .container { max-width: 1200px; margin: 0 auto; padding-left: 24px; padding-right: 24px; }
        body.preview-open .marketplace-results-list .item-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; }
        .preview-scroll { min-height: 0; }
        .preview-image-wrap { margin: 12px; }
        .preview-image { max-height: 200px; }
        .preview-info { padding: 4px 15px 20px; }
        .preview-info h2 { font-size: 20px; }
        .preview-topbar { padding: 10px 14px; }
        @media (min-width: 701px) and (max-width: 1000px) {
            body:not(.preview-open) .marketplace-results-list .item-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media (max-width: 950px) {
            body.preview-open .marketplace-results-layout { grid-template-columns: minmax(0, 1fr) 290px; }
            body.preview-open .marketplace-results-list .item-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .marketplace-results-list .item-image, .marketplace-results-list .image-placeholder { height: 145px; }
        }
        @media (max-width: 700px) {
            body.preview-open .marketplace-results-layout { grid-template-columns: minmax(0, 1fr); }
            .item-preview-panel { position: static; max-height: 420px; }
            body.preview-open .item-preview-panel { grid-row: 1; }
            .marketplace-results-list .item-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            body.preview-open .marketplace-results-list .item-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            body.preview-open .container { padding-left: 16px; padding-right: 16px; }
        }

        /* ===== MOBILE RESPONSIVE FIX (Marketplace) ===== */
        html, body { max-width: 100%; overflow-x: clip; }
        .navbar, .nav-links, .marketplace-results-layout, .marketplace-results-list,
        .item-grid, .item-card { min-width: 0; }
        .item-card-trigger { min-width: 0; }
        .item-card-trigger .item-content h3 { overflow-wrap: anywhere; }
        @media (max-width: 760px) {
            .navbar { width: 94%; min-height: 64px; flex-direction: row; align-items: center;
                      justify-content: space-between; gap: 8px; padding: 8px 0; }
            .brand { font-size: 16px; gap: 7px; flex-shrink: 0; }
            .brand-icon { width: 34px; height: 34px; font-size: 19px; border-radius: 11px; }
            .nav-links { width: auto; flex: 0 1 auto; flex-wrap: nowrap; gap: 8px; justify-content: flex-end; }
            .nav-links > a { display: none; }
            .nav-links > form { display: none; }
            .notification-bell { width: 36px; height: 36px; font-size: 17px; }
            .notification-panel { left: auto; right: -55px; width: min(280px, calc(100vw - 22px)); }
            .user-trigger { padding: 2px; }
            .user-trigger .user-label { display: none; }
            .avatar-sm { width: 36px; height: 36px; }
            .nav-links > .nav-btn-primary { display: inline-flex; padding: 8px 12px; font-size: 12px; }
            .container { padding: 20px 14px 110px; }
            .hero { grid-template-columns: 1fr; padding: 26px 20px; gap: 22px; border-radius: 20px; }
            .hero h1 { font-size: clamp(26px, 7vw, 34px); }
            .hero p { font-size: 14px; }
            .hero-stats { grid-template-columns: 1fr; gap: 9px; }
            .stat { flex-direction: row; text-align: left; padding: 11px 13px; }
            .filter-panel { padding: 13px; margin-bottom: 22px; }
            .filter-form { grid-template-columns: 1fr; gap: 10px; }
            .filter-actions { grid-column: auto; }
            .filter-actions .btn { flex: 1; padding: 11px 12px; }
            .chips { gap: 7px; }
            .chip { padding: 8px 11px; font-size: 11px; }
            .section-heading { flex-direction: row; flex-wrap: wrap; gap: 10px; }
            .section-heading h2 { font-size: 21px; }
            .count-pill { font-size: 11px; padding: 7px 10px; }
            .marketplace-results-list .item-grid,
            body.preview-open .marketplace-results-list .item-grid { grid-template-columns: repeat(2,minmax(0,1fr)); gap: 10px; }
            .item-card { border-radius: 13px; }
            .item-media { margin: 6px 6px 0; border-radius: 10px; }
            .marketplace-results-list .item-image,
            .marketplace-results-list .image-placeholder { height: clamp(112px, 34vw, 170px); }
            .item-type { top: 6px; left: 6px; padding: 5px 7px; font-size: 10px; }
            .item-card-trigger .item-content { padding: 10px 9px 12px; }
            .item-card-trigger .item-content h3 { font-size: 14px; line-height: 1.35; }
            .item-category { font-size: 10px; letter-spacing: .2px; }
            /* Keep marketplace visible behind a compact bottom detail sheet. */
            body.preview-open .marketplace-results-layout { grid-template-columns: minmax(0,1fr); }
            body.preview-open .container { margin: 0 auto; padding-left: 14px; padding-right: 14px; }
            .item-preview-panel { position: fixed; top: auto; right: 0; bottom: 0; left: 0;
                width: 100%; max-width: none; height: min(74dvh, 620px); max-height: 74dvh;
                border-radius: 20px 20px 0 0; border: 1px solid var(--line);
                box-shadow: 0 -10px 40px rgba(41,77,56,.18); z-index: 80;
                display: none; overflow: hidden; }
            body.preview-open .item-preview-panel { display: flex; grid-row: auto; }
            .preview-topbar { padding: 11px 15px; }
            .preview-image-wrap { margin: 10px; }
            .preview-image { max-height: 175px; }
            .preview-image-placeholder { height: 145px; }
            .preview-info { padding: 5px 15px 24px; }
            .preview-info h2 { font-size: 19px; }
            .preview-borrow-form { padding: 12px; }
            .bottom-nav { display: flex; position: fixed; bottom: 0; left: 0; right: 0;
                z-index: 60; justify-content: space-around; align-items: center;
                background: rgba(255,255,255,.97); border-top: 1px solid var(--line);
                padding: 8px 5px max(8px, env(safe-area-inset-bottom)); }
            .bottom-nav a { display: flex; flex-direction: column; align-items: center;
                gap: 3px; font-size: 10px; color: var(--green-dark); font-weight: 650; }
            .bottom-nav .ic { font-size: 20px; }
            body.preview-open .bottom-nav { display: none; }
            footer { margin-top: 20px; padding: 20px 12px; font-size: 12px; }
        }
        @media (max-width: 360px) {
            .brand { font-size: 14px; }
            .brand-icon { width: 30px; height: 30px; }
            .nav-links { gap: 5px; }
            .item-type { font-size: 9px; }
            .item-card-trigger .item-content h3 { font-size: 13px; }
        }

        /* FIX: Both borrowing dates visible in the compact preview panel */
        .preview-borrow-form { display: flex; flex-direction: column; gap: 14px; overflow: visible; }
        .preview-borrow-form .preview-form-group { display: block; width: 100%; margin: 0; flex-shrink: 0; }
        .preview-borrow-form .preview-form-group label { display: block; margin-bottom: 8px; font-weight: 700; }
        .preview-borrow-form input[type="date"] { display: block; width: 100%; min-width: 0; min-height: 46px; padding: 10px 12px; color-scheme: light; }
        .preview-scroll { overflow-y: auto; min-height: 0; overscroll-behavior: contain; }
 :root{--green:#47785b;--dark-green:#294d38;--sage:#e5ecdc;--cream:#f8f8f1;--white:#fff;--text:#304537;--muted:#788579;--border:#e6e9df;}
.navbar a{color:inherit;text-decoration:none;} .nav-links{display:flex;} .nav-links a{color:#617164;} .brand{color:var(--dark-green)!important;} .avatar-sm,.avatar-lg{overflow:hidden;flex-shrink:0;} .profile-avatar-img{display:block;width:100%;height:100%;object-fit:cover;border-radius:50%;} 

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

/* Navigation integration for Marketplace */
.site-header .navbar{width:min(1120px,92%);margin:auto;min-height:70px;}
.site-header .nav-links{flex-wrap:nowrap;}
.site-header .brand{white-space:nowrap;}
.site-header .nav-text-link.active{color:#294d38;font-weight:750;}
.avatar-sm img,.avatar-lg img{width:100%;height:100%;object-fit:cover;}
@media(max-width:760px){.site-header .navbar{width:94%;min-height:60px;flex-direction:row;align-items:center;padding:8px 0}.site-header .nav-links{width:auto;flex-wrap:nowrap}.site-header .nav-text-link{display:none}.site-header .user-label{display:none}}
@media(max-width:700px){.bottom-nav{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));}.bottom-nav a{display:flex;flex-direction:column;align-items:center;gap:3px;font-size:10px;}.bottom-nav .ic{font-size:20px}}


/* FINAL FIX: compact single-row Marketplace header */
.site-header { position:sticky; top:0; z-index:50; background:rgba(255,255,255,.96); border-bottom:1px solid var(--border); }
.site-header .navbar { box-sizing:border-box; width:min(1120px,96%); max-width:1120px; min-height:68px; height:auto; padding:9px 0; margin:0 auto; display:flex; flex-direction:row; align-items:center; justify-content:space-between; gap:18px; }
.site-header .brand { flex-shrink:0; white-space:nowrap; font-size:20px; }
.site-header .brand-icon { flex-shrink:0; width:38px; height:38px; }
.site-header .nav-links { display:flex; flex-direction:row; flex-wrap:nowrap; align-items:center; justify-content:flex-end; gap:12px; min-width:0; margin-left:auto; }
.site-header .nav-text-link { white-space:nowrap; }
.site-header .user-trigger { display:flex; align-items:center; flex-shrink:0; white-space:nowrap; gap:8px; padding:3px 6px; }
.site-header .user-label { display:inline-block; white-space:nowrap; line-height:1.25; font-size:13px; font-weight:700; color:#294d38; }
.site-header .avatar-sm { flex-shrink:0; width:36px; height:36px; }
.site-header .notification-dropdown { flex-shrink:0; }
@media(max-width:900px) and (min-width:761px) { .site-header .navbar{gap:10px;width:96%}.site-header .nav-links{gap:10px}.site-header .brand{font-size:17px}.site-header .user-label{display:inline-block} }
@media(max-width:760px) { .site-header .navbar{width:94%;min-height:60px;padding:8px 0;gap:8px}.site-header .brand{font-size:17px}.site-header .brand-icon{width:34px;height:34px}.site-header .nav-links{gap:9px}.site-header .nav-text-link,.site-header .user-label{display:none}.site-header .user-trigger{padding:2px}.site-header .avatar-sm{width:35px;height:35px} }

/* K.I.T.A. Messages reference — final header and responsive navigation */
.site-header .navbar{width:min(1120px,92%);min-height:70px;display:flex;flex-direction:row;align-items:center;justify-content:space-between;gap:16px}
.site-header .brand{display:flex;align-items:center;gap:11px;flex-shrink:0;text-decoration:none;white-space:nowrap}
.site-header .brand-icon{width:52px;height:52px;display:flex;align-items:center;justify-content:center;background:#fff;border-radius:15px;overflow:hidden;flex-shrink:0;box-shadow:0 5px 18px rgba(0,0,0,.07)}
.site-header .brand-icon img{display:block;width:100%;height:100%;object-fit:contain}
.site-header .brand-text{display:inline-flex;align-items:baseline;gap:1px;font-family:'Fredoka','Segoe UI',sans-serif;font-size:27px;font-weight:700;letter-spacing:-1.2px;line-height:1;white-space:nowrap}
.site-header .brand-text .k{color:#FFE047;transform:rotate(-6deg)}
.site-header .brand-text .i{color:#6DE0BF;transform:rotate(4deg)}
.site-header .brand-text .t{color:#FF9C68;transform:rotate(-5deg)}
.site-header .brand-text .a{color:#4CC9DF;transform:rotate(5deg)}
.site-header .nav-links{display:flex;align-items:center;gap:18px;min-width:0;flex-wrap:nowrap}
.bottom-nav a.active{color:#294d38;font-weight:800}
@media(max-width:760px){
.site-header .navbar{width:92%;min-height:60px;gap:8px;padding:7px 0}
.site-header .brand{gap:7px}
.site-header .brand-icon{width:42px;height:42px;border-radius:12px}
.site-header .brand-text{font-size:21px}
.site-header .nav-links{gap:10px;width:auto}
.site-header .nav-text-link,.site-header .user-label{display:none}
.bottom-nav{display:grid!important;grid-template-columns:repeat(3,minmax(0,1fr))!important;align-items:center}
.bottom-nav a{min-width:0;text-align:center}
}
@media(min-width:761px){.bottom-nav{display:none!important}}

    </style>
</head>

<body>

    {{-- =========================
         HEADER
    ========================= --}}

    <header class="site-header">
        <div class="navbar">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-icon"><img src="{{ asset('images/kita-full-logo.png') }}" alt="K.I.T.A. logo"></span>
                <span class="brand-text" aria-label="K.I.T.A."><span class="k">K.</span><span class="i">I.</span><span class="t">T.</span><span class="a">A.</span></span>
            </a>

            <nav class="nav-links">
                <a href="{{ url('/events') }}" class="nav-text-link">Events</a>
                <a href="{{ route('issues.index') }}" class="nav-text-link">Issues</a>
                <a href="{{ route('community.index') }}" class="nav-text-link active" aria-current="page">Marketplace</a>

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
                ['icon' => '📦', 'label' => 'My Items',    'href' => url('/my-items'),      'soon' => false],
                ['icon' => '📅', 'label' => 'My Events',   'href' => route('events.mine'),  'soon' => false],
                ['icon' => '📣', 'label' => 'My Complain', 'href' => url('complaints'),   'soon' => false],
                ['icon' => '💬', 'label' => 'Messages',    'href' => url('/messages'),      'soon' => false],
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




{{-- =========================
         COMMUNITY MAIN CONTENT
    ========================= --}}

    <main class="container">

        {{-- HERO SECTION --}}

        <section class="hero">

            <div class="hero-copy">

                <span class="hero-tag">
                    🌱 COMMUNITY SHARING
                </span>

                <h1>
                    Share more, waste less.
                </h1>

                <p>
                    Give away things you no longer need, borrow items from
                    your neighbours, or share useful resources with your
                    community. Small actions can make a big difference.
                </p>

                <div class="hero-actions">

                    @auth

                        <a
                            href="{{ route('community.my-items') }}"
                            class="btn btn-light"
                        >
                            Go to My Items Dashboard →
                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="btn btn-light"
                        >
                            Login to View My Items →
                        </a>

                    @endauth

                </div>

            </div>

            <div class="hero-stats">

                <div class="stat">

                    <div class="stat-icon">
                        🎁
                    </div>

                    <div>
                        <strong>Give Away</strong>
                        <span>Pass it on for free</span>
                    </div>

                </div>

                <div class="stat">

                    <div class="stat-icon">
                        🤝
                    </div>

                    <div>
                        <strong>Borrow</strong>
                        <span>Use it, then return it</span>
                    </div>

                </div>

                <div class="stat">

                    <div class="stat-icon">
                        🏷️
                    </div>

                    <div>
                        <strong>For Sale</strong>
                        <span>Fair prices, local deals</span>
                    </div>

                </div>

            </div>

        </section>

        {{-- =========================
             SUCCESS / ERROR MESSAGES
        ========================= --}}

        @if (session('success'))

            <div class="alert">
                {{ session('success') }}
            </div>

        @endif

        @if ($errors->any())

            <div class="alert alert-error">

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>

        @endif

        {{-- =========================
             COMMUNITY ITEMS
        ========================= --}}

        <section>

            <div class="section-heading">

                <h2>
                    Items in Our Community
                </h2>

                <span class="count-pill">
                    {{ $items->total() }} items available
                </span>

            </div>

            {{-- =========================
                 SEARCH AND FILTER
            ========================= --}}

            <div class="filter-panel">

                <form
                    action="{{ route('community.index') }}"
                    method="GET"
                    class="filter-form"
                >

                    {{-- PRESERVE TYPE FILTER --}}

                    @if (request()->filled('type'))

                        <input
                            type="hidden"
                            name="type"
                            value="{{ request('type') }}"
                        >

                    @endif

                    {{-- SEARCH INPUT --}}

                    <div class="search-wrap">

                        <span>🔎</span>

                        <input
                            type="search"
                            id="search"
                            name="search"
                            class="filter-input"
                            placeholder="Search items, e.g. chair, books..."
                            aria-label="Search by name"
                            value="{{ request('search') }}"
                        >

                    </div>

                    {{-- CATEGORY FILTER --}}

                    <select
                        id="category"
                        name="category"
                        class="filter-select"
                        aria-label="Category"
                    >

                        <option value="">
                            All Categories
                        </option>

                        @foreach (($categories ?? collect()) as $category)

                            <option
                                value="{{ $category }}"
                                @selected(request('category') === $category)
                            >
                                {{ $category }}
                            </option>

                        @endforeach

                    </select>

                    {{-- SEARCH BUTTONS --}}

                    <div class="filter-actions">

                        <button
                            type="submit"
                            class="btn"
                        >
                            Search
                        </button>

                        <a
                            href="{{ route('community.index') }}"
                            class="btn clear-btn"
                        >
                            Clear
                        </a>

                    </div>

                </form>

                {{-- =========================
                     QUICK TYPE FILTERS
                ========================= --}}

                <div class="chips">

                    <a
                        href="{{ request()->fullUrlWithQuery(['type' => null, 'page' => null]) }}"
                        class="chip {{ request()->filled('type') ? '' : 'active' }}"
                    >
                        All
                    </a>

                    <a
                        href="{{ request()->fullUrlWithQuery(['type' => 'give_away', 'page' => null]) }}"
                        class="chip {{ request('type') === 'give_away' ? 'active' : '' }}"
                    >
                        🎁 Give Away
                    </a>

                    <a
                        href="{{ request()->fullUrlWithQuery(['type' => 'borrow', 'page' => null]) }}"
                        class="chip {{ request('type') === 'borrow' ? 'active' : '' }}"
                    >
                        🤝 Borrow
                    </a>

                    <a
                        href="{{ request()->fullUrlWithQuery(['type' => 'sell', 'page' => null]) }}"
                        class="chip {{ request('type') === 'sell' ? 'active' : '' }}"
                    >
                        🏷️ For Sale
                    </a>

                </div>

                {{-- FILTER SUMMARY --}}

                @if (
                    request()->filled('search') ||
                    request()->filled('category') ||
                    request()->filled('type')
                )

                    <p class="filter-summary">

                        Showing {{ $items->total() }} matching item(s).

                        @if (request()->filled('search'))

                            Search: "{{ request('search') }}"

                        @endif

                        @if (request()->filled('category'))

                            | Category: {{ request('category') }}

                        @endif

                        @if (request()->filled('type'))

                            | Type:

                            @switch(request('type'))

                                @case('give_away')
                                    Give Away
                                    @break

                                @case('borrow')
                                    Borrow
                                    @break

                                @case('sell')
                                    For Sale
                                    @break

                            @endswitch

                        @endif

                    </p>

                @endif

            </div>

            <div class="marketplace-results-layout">
                <div class="marketplace-results-list">

            {{-- =========================
                 ITEMS GRID
            ========================= --}}

            @if ($items->count() > 0)

                <div class="item-grid">

                    @foreach ($items as $item)
                        <article class="item-card">
                            <button type="button"
                                    class="item-card-trigger"
                                    aria-label="Preview {{ $item->name }}"
                                    aria-controls="itemPreviewPanel"
                                    aria-expanded="false"
                                    data-item-id="{{ $item->id }}">
                                <div class="item-media">
                                    @if ($item->image_path)
                                        <img src="{{ asset('storage/' . $item->image_path) }}"
                                             alt="{{ $item->name }}"
                                             class="item-image" loading="lazy">
                                    @else
                                        <div class="image-placeholder">🌿</div>
                                    @endif
                                    <span class="item-type {{ $item->type }}">
                                        @switch($item->type)
                                            @case('give_away') 🎁 Give Away @break
                                            @case('borrow') 🤝 Borrow @break
                                            @case('sell') 🏷️ For Sale @break
                                            @default Community Item
                                        @endswitch
                                    </span>
                                </div>
                                <div class="item-content">
                                    <div class="item-category">{{ $item->category }}</div>
                                    <h3>{{ $item->name }}</h3>
                                </div>
                            </button>
                            <template id="item-preview-{{ $item->id }}">
                                <div class="preview-image-wrap">
                                    @if ($item->image_path)
                                        <img src="{{ asset('storage/' . $item->image_path) }}"
                                             alt="{{ $item->name }}" class="preview-image">
                                    @else
                                        <div class="preview-image-placeholder">🌿</div>
                                    @endif
                                </div>
                                <div class="preview-info">
                                    <span class="preview-type item-type {{ $item->type }}">
                                        @switch($item->type)
                                            @case('give_away') 🎁 Give Away @break
                                            @case('borrow') 🤝 Borrow @break
                                            @case('sell') 🏷️ For Sale @break
                                            @default Community Item
                                        @endswitch
                                    </span>
                                    <h2>{{ $item->name }}</h2>
                                    @if ($item->type === 'sell' && $item->price !== null)
                                        <div class="item-price">RM {{ number_format((float) $item->price, 2) }}</div>
                                    @endif
                                    <div class="preview-meta"><span class="preview-meta-label">Category</span><strong>{{ $item->category }}</strong></div>
                                    <div class="preview-meta"><span class="preview-meta-label">Location</span><strong>{{ $item->location }}</strong></div>
                                    <div class="preview-meta"><span class="preview-meta-label">Shared by</span><strong>{{ $item->user?->name ?? 'Community Member' }}</strong></div>
                                    <div class="preview-meta"><span class="preview-meta-label">Status</span><strong>{{ ucfirst($item->status) }}</strong></div>
                                    <h3 class="preview-subheading">About this item</h3>
                                    <p class="preview-description">{{ $item->description ?: 'No description provided.' }}</p>
      
                                    {{-- CHAT OWNER - FOR ALL ITEM TYPES --}}
                                    @if (auth()->check() && auth()->id() !== $item->user_id)
                                        <form action="{{ route('messages.start-item', $item->id) }}"
                                            method="POST"
                                            style="margin-top: 18px;">
                                            @csrf

                                            <button type="submit"
                                                    class="preview-view-btn"
                                                    style="width:100%; border:0; cursor:pointer;">
                                                💬 Chat Owner
                                            </button>
                                        </form>
                                    @elseif (!auth()->check())
                                        <a href="{{ route('login') }}"
                                        class="preview-view-btn">
                                            💬 Login to Chat Owner
                                        </a>
                                    @endif

                                    @if ($item->type === 'borrow')
                                        @if ($item->status === 'available')
                                            @auth
                                                @if (auth()->id() !== $item->user_id)
                                                    <form action="{{ route('borrow.store', $item->id) }}"
                                                          method="POST" class="preview-borrow-form">
                                                        @csrf
                                                        <h3>Request to Borrow</h3>
                                                        <div class="preview-form-group">
                                                            <label for="preview-start-{{ $item->id }}">📅 Start Date</label>
                                                            <input type="date" id="preview-start-{{ $item->id }}"
                                                                   name="start_date" min="{{ now()->toDateString() }}"
                                                                   value="{{ old('start_date') }}" required>
                                                        </div>
                                                        <div class="preview-form-group">
                                                            <label for="preview-end-{{ $item->id }}">📅 Return Date</label>
                                                            <input type="date" id="preview-end-{{ $item->id }}"
                                                                   name="end_date" min="{{ now()->toDateString() }}"
                                                                   value="{{ old('end_date') }}" required>
                                                        </div>
                                                        <button type="submit" class="preview-view-btn">
                                                            Send Booking Request
                                                        </button>
                                                    </form>
                                                @else
                                                    <p class="preview-notice">This is your item.</p>
                                                @endif
                                            @else
                                                <div class="preview-borrow-form">
                                                    <h3>Want to borrow this item?</h3>
                                                    <p>Please login to send a booking request.</p>
                                                    <a href="{{ route('login') }}" class="preview-view-btn">Login to Borrow</a>
                                                </div>
                                            @endauth
                                        @else
                                            <p class="preview-notice preview-notice-error">
                                                This item is currently unavailable for borrowing.
                                            </p>
                                        @endif
                                    @endif
                                </div>
                            </template>
                        </article>
                    @endforeach

                </div>

                {{-- PAGINATION --}}

                <div class="pagination">
                    {{ $items->links() }}
                </div>

            @else

                {{-- NO ITEMS FOUND --}}

                <div class="empty-state">

                    <div class="big">
                        🌱
                    </div>

                    <h3>
                        No matching items found
                    </h3>

                    <p>
                        We couldn't find any available items matching
                        your search. Try changing your keywords or filters.
                    </p>

                    <a
                        href="{{ route('community.index') }}"
                        class="btn"
                    >
                        Clear Search & Filters
                    </a>

                </div>

            @endif

                </div>
    {{-- GOOGLE IMAGES-STYLE RIGHT PREVIEW --}}
    <aside class="item-preview-panel" id="itemPreviewPanel"
           aria-label="Item preview" aria-hidden="true">
        <div class="preview-topbar">
            <strong>Item Preview</strong>
            <button type="button" class="preview-close" id="itemPreviewClose"
                    aria-label="Close item preview">✕</button>
        </div>
        <div id="itemPreviewContent" class="preview-scroll"></div>
    </aside>

            </div>

        </section>

    </main>

    {{-- =========================
         FOOTER
    ========================= --}}

    <footer>
        NeighbourLink — Building a stronger community, one share at a time.
    </footer>

    <nav class="bottom-nav" aria-label="Main navigation"><a href="{{ url('/events') }}"><span class="ic">📅</span>Events</a><a href="{{ route('issues.index') }}"><span class="ic">📣</span>Issues</a><a href="{{ route('community.index') }}" class="active" aria-current="page"><span class="ic">📦</span>Marketplace</a></nav>
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
        // Show details in a right-side panel without leaving Marketplace.
        document.addEventListener('DOMContentLoaded', function () {
            const panel = document.getElementById('itemPreviewPanel');
            const content = document.getElementById('itemPreviewContent');
            const close = document.getElementById('itemPreviewClose');
            const triggers = document.querySelectorAll('.item-card-trigger');
            let activeTrigger = null;

            function closePreview() {
                document.body.classList.remove('preview-open');
                panel.setAttribute('aria-hidden', 'true');
                document.querySelectorAll('.item-card.selected').forEach(card => card.classList.remove('selected'));
                if (activeTrigger) {
                    activeTrigger.setAttribute('aria-expanded', 'false');
                    activeTrigger.focus();
                    activeTrigger = null;
                }
            }

            triggers.forEach(trigger => {
                trigger.addEventListener('click', function () {
                    const template = document.getElementById('item-preview-' + trigger.dataset.itemId);
                    if (!template) return;
                    if (activeTrigger) activeTrigger.setAttribute('aria-expanded', 'false');
                    document.querySelectorAll('.item-card.selected').forEach(card => card.classList.remove('selected'));
                    content.replaceChildren(template.content.cloneNode(true));
                    activeTrigger = trigger;
                    trigger.setAttribute('aria-expanded', 'true');
                    trigger.closest('.item-card').classList.add('selected');
                    panel.setAttribute('aria-hidden', 'false');
                    document.body.classList.add('preview-open');
                    content.scrollTop = 0;
                    const startDate = content.querySelector('input[name="start_date"]');
                    const endDate = content.querySelector('input[name="end_date"]');
                    if (startDate && endDate) {
                        startDate.addEventListener('change', () => {
                            endDate.min = startDate.value || startDate.min;
                            if (endDate.value && endDate.value < endDate.min) endDate.value = '';
                        });
                    }
                });
            });

            close.addEventListener('click', closePreview);
            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && document.body.classList.contains('preview-open')
                    && !document.body.classList.contains('drawer-open')) closePreview();
            });
        });

</script>
</body>
</html>