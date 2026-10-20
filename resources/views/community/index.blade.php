<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community | NeighbourLink</title>

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
    </style>
</head>

<body>

    {{-- =========================
         HEADER
    ========================= --}}

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

                <a
                    href="{{ route('community.index') }}"
                    class="active"
                    aria-current="page"
                >
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

                        $myUpdates = \App\Models\BorrowBooking::with(
                            'communityItem'
                        )
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

                    {{-- NOTIFICATION BELL --}}

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
                                    <strong>
                                        📦 New Borrow Request
                                    </strong>

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

                    {{-- USER AVATAR --}}

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

                        <span class="user-label">
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

    {{-- =========================
         SIDE DRAWER
    ========================= --}}

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

                <h2>
                    {{ Auth::user()->name }}
                </h2>

                <p>
                    Neighbourhood Community Member 🌿
                </p>

            </div>

            {{-- DRAWER MENU --}}

            <nav class="drawer-nav">

                {{-- MARKETPLACE - ACTIVE --}}

                <a
                    href="{{ route('community.index') }}"
                    class="drawer-link active"
                    aria-current="page"
                >
                    <span>🌿</span>
                    Marketplace
                </a>

                {{-- MY ITEMS --}}

                <a
                    href="{{ route('community.my-items') }}"
                    class="drawer-link"
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

                {{-- MY COMPLAIN - COMING SOON --}}

                <div class="drawer-link drawer-coming-soon">
                    <span>📋</span>
                    My Complain
                    <span class="soon-tag">Soon</span>
                </div>

                {{-- MESSAGES - COMING SOON --}}

                <div class="drawer-link drawer-coming-soon">
                    <span>💬</span>
                    Messages
                    <span class="soon-tag">Soon</span>
                </div>

                {{-- SETTINGS - COMING SOON --}}

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

            </div>

        </aside>

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

                                    @if ($item->type === 'borrow')
                                        @if ($item->status === 'available')
                                            @auth
                                                @if (auth()->id() !== $item->user_id)
                                                    <form action="{{ route('borrow.store', $item->id) }}"
                                                          method="POST" class="preview-borrow-form">
                                                        @csrf
                                                        <h3>Request to Borrow</h3>
                                                        <div class="preview-form-group">
                                                            <label for="preview-start-{{ $item->id }}">Start Date</label>
                                                            <input type="date" id="preview-start-{{ $item->id }}"
                                                                   name="start_date" min="{{ now()->toDateString() }}"
                                                                   value="{{ old('start_date') }}" required>
                                                        </div>
                                                        <div class="preview-form-group">
                                                            <label for="preview-end-{{ $item->id }}">Return Date</label>
                                                            <input type="date" id="preview-end-{{ $item->id }}"
                                                                   name="end_date" min="{{ now()->toDateString() }}"
                                                                   value="{{ old('end_date') }}" required>
                                                        </div>
                                                        <div class="preview-form-group">
                                                            <label for="preview-message-{{ $item->id }}">Message to Owner (Optional)</label>
                                                            <textarea id="preview-message-{{ $item->id }}" name="message"
                                                                      maxlength="1000" rows="3"
                                                                      placeholder="Write a message to the owner...">{{ old('message') }}</textarea>
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

    {{-- =========================
         DRAWER JAVASCRIPT
    ========================= --}}

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