<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Items | NeighbourLink</title>

    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&display=swap" rel="stylesheet">
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

        /* ===== MOBILE RESPONSIVE OVERRIDES ===== */
        @media (max-width: 760px) {
            html, body { width: 100%; max-width: 100%; overflow-x: clip; }
            body { padding-bottom: 76px; }
            .site-header .navbar { width: 94%; min-height: 62px; flex-direction: row; align-items: center; justify-content: space-between; flex-wrap: nowrap; gap: 8px; padding: 7px 0; }
            .brand { font-size: 17px; gap: 7px; min-width: 0; }
            .brand-icon { width: 34px; height: 34px; font-size: 18px; border-radius: 11px; flex-shrink: 0; }
            .nav-links { width: auto; flex-wrap: nowrap; gap: 9px; margin-left: auto; }
            .nav-links > a:not(.nav-btn) { display: none; }
            .notification-bell { width: 36px; height: 36px; font-size: 17px; }
            .notification-panel { position: fixed; top: 62px; left: auto; right: 3vw; width: min(340px, 94vw); max-height: min(65vh, 430px); }
            .user-trigger { padding: 2px; }
            .user-trigger > span:not(.avatar-sm) { display: none; }
            .avatar-sm { width: 35px; height: 35px; }
            .container { width: 94%; margin: 20px auto; }
            .heading { align-items: flex-start; gap: 12px; margin-bottom: 18px; }
            .heading h2 { font-size: 25px; }
            .heading p { font-size: 13px; }
            .heading .btn { padding: 10px 13px; font-size: 12px; }
            .stats { grid-template-columns: repeat(3, minmax(0,1fr)); gap: 8px; margin-bottom: 18px; }
            .stat-card { min-width: 0; padding: 12px 9px; }
            .stat-card p { font-size: 11px; line-height: 1.35; margin-bottom: 7px; }
            .stat-card h3 { font-size: 24px; }
            .items-section { padding: 12px; }
            .section-heading { margin-bottom: 14px; }
            .section-heading h3 { font-size: 18px; }
            .my-items-layout, .my-items-layout.has-preview { display: block; }
            .my-items-layout .items-grid, .my-items-layout.has-preview .items-grid { display: grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 10px; }
            .my-items-layout .item-card { min-width: 0; }
            .my-items-layout .item-image, .my-items-layout .image-placeholder,
            .my-items-layout.has-preview .item-image, .my-items-layout.has-preview .image-placeholder { height: 120px; }
            .item-content, .my-items-layout.has-preview .item-content { padding: 10px; }
            .item-content h4 { font-size: 14px; margin-bottom: 7px; }
            .item-content p { font-size: 11px; margin-bottom: 5px; }
            .status { font-size: 10px; padding: 4px 7px; margin-bottom: 8px; }
            .item-actions, .my-items-layout.has-preview .item-actions { display: grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 6px; margin-top: 12px; }
            .item-actions > *, .my-items-layout.has-preview .item-actions > * { min-width: 0; width: 100%; }
            .item-actions form { grid-column: 1 / -1; }
            .action-btn { width: 100%; padding: 9px 5px; font-size: 11px; }
            .my-preview-panel { position: fixed; inset: auto 0 0; width: 100%; max-height: min(82dvh, 740px); border-radius: 22px 22px 0 0; z-index: 120; box-shadow: 0 -12px 45px rgba(0,0,0,.2); }
            .my-items-layout.has-preview .my-preview-panel { display: flex; }
            .my-preview-photo img { max-height: 190px; }
            .my-preview-header { padding: 12px 18px; }
            .my-preview-scroll { overscroll-behavior: contain; }
            .bottom-nav { display: grid; grid-template-columns: repeat(4,minmax(0,1fr)); position: fixed; left: 0; right: 0; bottom: 0; z-index: 60; background: #fff; border-top: 1px solid var(--border); padding: 7px 0 calc(7px + env(safe-area-inset-bottom,0px)); }
            .bottom-nav a { display: flex; flex-direction: column; align-items: center; gap: 2px; color: #617164; font-size: 10px; text-align: center; }
            .bottom-nav .ic { font-size: 20px; }
            footer { margin-top: 25px; padding: 20px 12px; font-size: 11px; }
        }
        @media (max-width: 370px) {
            .brand { font-size: 15px; }
            .brand-icon { width: 31px; height: 31px; }
            .stats { gap: 5px; }
            .stat-card { padding: 10px 6px; }
            .stat-card h3 { font-size: 21px; }
            .my-items-layout .items-grid, .my-items-layout.has-preview .items-grid { gap: 7px; }
            .items-section { padding: 8px; }
            .item-content { padding: 8px; }
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
    
/* Shared navigation styles */
.site-header .navbar{width:min(1120px,92%);margin:auto;min-height:70px;}
.site-header .nav-links{flex-wrap:nowrap;}
.site-header .brand{white-space:nowrap;}
.site-header .nav-text-link.active{color:#294d38;font-weight:750;}
.avatar-sm img,.avatar-lg img{width:100%;height:100%;object-fit:cover;}
@media(max-width:760px){.site-header .navbar{width:94%;min-height:60px;flex-direction:row;align-items:center;padding:8px 0}.site-header .nav-links{width:auto;flex-wrap:nowrap}.site-header .nav-text-link{display:none}.site-header .user-label{display:none}}
@media(max-width:700px){.bottom-nav{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));}.bottom-nav a{display:flex;flex-direction:column;align-items:center;gap:3px;font-size:10px;}.bottom-nav .ic{font-size:20px}}


/* My Items unified header */
.site-header .navbar{width:min(1120px,92%);min-height:70px;margin:auto;display:flex;flex-direction:row;align-items:center;justify-content:space-between}
.site-header .nav-links{display:flex;align-items:center;flex-wrap:nowrap;gap:18px}
.site-header .nav-text-link{color:#617164;text-decoration:none;font-size:14px}
.site-header .nav-text-link:hover{color:#47785b}
.site-header .avatar-sm,.site-header .avatar-lg{overflow:hidden}
.bottom-nav .active{color:#294d38;font-weight:800}
@media(max-width:760px){.site-header .navbar{width:94%;min-height:60px;padding:7px 0;flex-direction:row;align-items:center}.site-header .nav-links{width:auto;gap:9px;flex-wrap:nowrap}.site-header .nav-text-link{display:none}.site-header .user-label{display:none}.site-header .brand{font-size:17px}.site-header .brand-icon{width:34px;height:34px}.site-header .notification-panel{right:-55px;left:auto}.bottom-nav{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));position:fixed;bottom:0;left:0;right:0;background:white;border-top:1px solid var(--border);z-index:60;padding:7px 0 calc(7px + env(safe-area-inset-bottom,0px))}.bottom-nav a{display:flex;flex-direction:column;align-items:center;gap:3px;color:#617164;font-size:10px}.bottom-nav .ic{font-size:20px}}

    
/* Final K.I.T.A. navigation matching Messages reference */
.site-header .navbar{width:min(1120px,92%);margin:auto;min-height:70px;display:flex;flex-direction:row;align-items:center;justify-content:space-between;gap:20px}
.site-header .brand{display:flex;align-items:center;gap:11px;flex-shrink:0;text-decoration:none;font-size:inherit}
.site-header .brand-icon{width:52px;height:52px;display:flex;align-items:center;justify-content:center;background:#fff!important;padding:0!important;border-radius:15px;overflow:hidden;flex-shrink:0;box-shadow:0 5px 18px rgba(0,0,0,.07)}
.site-header .brand-icon img{display:block;width:100%;height:100%;object-fit:contain}
.site-header .brand-text{display:inline-flex;align-items:baseline;gap:1px;font-family:'Fredoka','Segoe UI',sans-serif;font-size:27px;font-weight:700;letter-spacing:-1.2px;line-height:1;white-space:nowrap}
.site-header .brand-text .k{color:#FFE047;transform:rotate(-6deg)}
.site-header .brand-text .i{color:#6DE0BF;transform:rotate(4deg)}
.site-header .brand-text .t{color:#FF9C68;transform:rotate(-5deg)}
.site-header .brand-text .a{color:#4CC9DF;transform:rotate(5deg)}
.bottom-nav{grid-template-columns:repeat(3,minmax(0,1fr))!important}
@media(max-width:760px){.site-header .navbar{width:92%;min-height:60px;flex-direction:row;align-items:center;padding:7px 0}.site-header .brand{gap:7px}.site-header .brand-icon{width:42px;height:42px;border-radius:12px}.site-header .brand-text{font-size:21px}.site-header .nav-links{gap:10px}.bottom-nav a{min-width:0}}
@media(max-width:390px){.site-header .brand-text{font-size:20px}.site-header .brand-icon{width:40px;height:40px}}

    </style>
</head>

<body>

    {{-- ===== HEADER ===== --}}

    <header class="site-header">
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

    <footer>
        NeighbourLink — Building a stronger community, one share at a time.
    </footer>

    <nav class="bottom-nav" aria-label="Main navigation"><a href="{{ url('/events') }}"><span class="ic">📅</span>Events</a><a href="{{ route('issues.index') }}"><span class="ic">📣</span>Issues</a><a href="{{ route('community.index') }}"><span class="ic">📦</span>Marketplace</a></nav>


    {{-- ===== DRAWER JAVASCRIPT ===== --}}

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