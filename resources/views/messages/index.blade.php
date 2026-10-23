<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Messages — K.I.T.A.</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --green: #47785b;
            --dark: #294d38;
            --sage: #e5ecdc;
            --cream: #f8f8f1;
            --muted: #788579;
            --border: #e6e9df;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--dark);
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        a { text-decoration: none; color: inherit; }
        button, input, textarea { font: inherit; }
        button { cursor: pointer; }
        button:disabled { opacity: .5; cursor: not-allowed; }

        .container {
            width: min(1120px, 94%);
            margin: auto;
        }

        header {
            background: #ffffffed;
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .navbar {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .brand {
            font-size: 21px;
            font-weight: 750;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon {
            display: grid;
            place-items: center;
            background: var(--green);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 14px;
        }

        .toplinks {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 14px;
        }

        .toplinks a:hover { color: var(--green); }

        .avatar {
            background: var(--green);
            color: white;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            font-weight: 700;
            flex-shrink: 0;
        }

        .pagehead {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 24px 0 16px;
            gap: 12px;
        }

        .pagehead h1 { margin: 0; font-size: 28px; }

        .pagehead p {
            margin: 3px 0;
            color: var(--muted);
            font-size: 14px;
        }

        .back {
            border: 1px solid var(--border);
            padding: 10px 15px;
            background: white;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 650;
        }

        .chatlayout {
            display: grid;
            grid-template-columns: 340px minmax(0, 1fr);
            height: min(720px, calc(100dvh - 180px));
            min-height: 440px;
            border: 1px solid var(--border);
            background: white;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 8px 25px #294d380c;
        }

        .sidebar {
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            min-width: 0;
            min-height: 0;
        }

        .sidebar-head {
            padding: 18px;
            border-bottom: 1px solid var(--border);
        }

        .sidebar-head h2 {
            font-size: 17px;
            margin: 0 0 12px;
        }

        .searchbox {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--cream);
            padding: 11px;
            outline: none;
        }

        .searchbox:focus,
        .compose textarea:focus {
            border-color: var(--green);
        }

        .searchresults {
            max-height: 180px;
            overflow: auto;
        }

        .searchresult {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            padding: 10px 4px;
            border-bottom: 1px solid var(--border);
            font-size: 13px;
        }

        .searchresult button {
            background: var(--green);
            color: white;
            border: 0;
            border-radius: 20px;
            padding: 7px 12px;
        }

        .conversations {
            overflow: auto;
            flex: 1;
        }

        .conversation {
            display: flex;
            gap: 12px;
            padding: 15px;
            border-bottom: 1px solid var(--border);
            align-items: center;
        }

        .conversation:hover,
        .conversation.active {
            background: #edf4e9;
        }

        .conversation .details {
            min-width: 0;
            flex: 1;
        }

        .conversation strong,
        .conversation small {
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .conversation small {
            color: var(--muted);
            font-size: 12px;
            margin-top: 4px;
        }

        .emptylist {
            padding: 20px;
            color: var(--muted);
            font-size: 13px;
        }

        .chat {
            display: flex;
            flex-direction: column;
            min-width: 0;
            min-height: 0;
        }

        .chathead {
            padding: 15px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }

        .chathead strong { font-size: 16px; }

        .mobileback {
            display: none;
            border: 0;
            background: var(--sage);
            border-radius: 10px;
            padding: 8px;
        }

        .messages {
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: stretch;
            gap: 10px;
            background: #fcfdf9;
        }

        /* MESSAGE BUBBLE */

        .bubble {
            position: relative;
            display: block;
            flex: 0 0 auto;
            width: fit-content;
            height: auto;
            max-width: min(75%, 450px);
            padding: 10px 14px;
            border-radius: 16px;
            border-bottom-left-radius: 5px;
            background: var(--sage);
            color: var(--dark);
            align-self: flex-start;
            overflow-wrap: anywhere;
            font-size: 14px;
            line-height: 1.5;
        }

        .bubble.mine {
            align-self: flex-end;
            background: var(--green);
            color: white;
            border-radius: 16px;
            border-bottom-right-radius: 5px;
        }

        .bubble-text {
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .bubble-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 7px;
            margin-top: 5px;
            font-size: 10px;
            opacity: .75;
        }

        .deleted-text {
            font-style: italic;
            opacity: .8;
        }

        .bubble.deleted {
            background: #f0f1ed;
            color: #79847c;
            border: 1px solid #d9ded7;
        }

        .bubble.deleted.mine {
            align-self: flex-end;
        }

        /* EDIT / DELETE MENU */

        .message-top {
            display: flex;
            align-items: flex-start;
            gap: 9px;
        }

        .message-content {
            min-width: 0;
            flex: 1;
        }

        .message-actions {
            position: relative;
            flex-shrink: 0;
        }

        .menu-trigger {
            background: transparent;
            border: 0;
            color: inherit;
            opacity: .75;
            font-size: 19px;
            line-height: 1;
            padding: 0 2px;
            border-radius: 5px;
        }

        .menu-trigger:hover {
            opacity: 1;
            background: #ffffff22;
        }

        .message-menu {
            position: absolute;
            top: 26px;
            right: 0;
            z-index: 10;
            min-width: 125px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 8px 25px #00000022;
            overflow: hidden;
        }

        .message-menu button {
            display: block;
            width: 100%;
            padding: 10px 14px;
            border: 0;
            background: white;
            color: var(--dark);
            text-align: left;
            font-size: 13px;
        }

        .message-menu button:hover {
            background: var(--cream);
        }

        .message-menu .danger {
            color: #b23b3b;
        }

        .hidden { display: none !important; }

        /* EDIT FORM */

        .edit-area {
            width: min(300px, 60vw);
            min-height: 65px;
            max-width: 100%;
            resize: vertical;
            border: 1px solid #cdd8ca;
            border-radius: 9px;
            padding: 9px;
            outline: none;
            color: var(--dark);
            background: white;
            font-size: 14px;
        }

        .edit-buttons {
            display: flex;
            gap: 7px;
            justify-content: flex-end;
            margin-top: 8px;
        }

        .edit-buttons button {
            border: 0;
            border-radius: 8px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 650;
        }

        .edit-cancel {
            background: #edf0e9;
            color: var(--dark);
        }

        .edit-save {
            background: #294d38;
            color: white;
        }

        /* COMPOSER */

        .compose {
            display: flex;
            gap: 10px;
            padding: 14px;
            border-top: 1px solid var(--border);
            align-items: end;
            flex-shrink: 0;
        }

        .compose textarea {
            flex: 1;
            min-width: 0;
            resize: none;
            min-height: 44px;
            max-height: 110px;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 11px;
            outline: none;
        }

        .send {
            background: var(--green);
            color: white;
            border: 0;
            border-radius: 14px;
            padding: 12px 20px;
            font-weight: 700;
        }

        .welcome {
            flex: 1;
            display: grid;
            place-items: center;
            text-align: center;
            color: var(--muted);
            padding: 30px;
        }

        .welcome .big {
            font-size: 52px;
            display: block;
            margin-bottom: 10px;
        }

        .error {
            color: #a12d2d;
            font-size: 12px;
            padding: 0 16px 8px;
        }

        @media (max-width: 700px) {
            .toplinks .desktop { display: none; }
            .navbar { min-height: 60px; }
            .brand { font-size: 17px; }
            .pagehead { margin: 15px 0; }
            .pagehead h1 { font-size: 22px; }

            .chatlayout {
                grid-template-columns: 1fr;
                height: calc(100dvh - 145px);
                min-height: 350px;
            }

            .sidebar { border-right: 0; }
            .chat { display: none; }
            .chatlayout.open .sidebar { display: none; }
            .chatlayout.open .chat { display: flex; }
            .mobileback { display: block; }

            .messages {
                padding: 14px 11px;
                gap: 9px;
            }

            .bubble {
                max-width: 88%;
                padding: 9px 12px;
            }

            .compose { padding: 9px; }
            .send { padding: 12px; }
        }
    
/* Shared Neighbourhood navigation and profile components */



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

/* Messages-specific layout, keep chat functions unchanged */
.chatlayout{display:grid;grid-template-columns:340px minmax(0,1fr);height:min(720px,calc(100dvh - 180px));min-height:440px;border:1px solid var(--border);background:white;border-radius:22px;overflow:hidden}
.chatlayout .sidebar{display:flex;flex-direction:column;min-width:0;min-height:0}
.chatlayout .chat{display:flex;flex-direction:column;min-width:0;min-height:0}
.site-header .navbar{width:min(1220px,96%);min-height:66px;flex-direction:row;flex-wrap:nowrap;align-items:center;gap:12px}
.site-header .nav-links{display:flex;align-items:center;flex-wrap:nowrap;gap:clamp(8px,1.3vw,18px);margin-left:auto;width:auto}
.site-header .brand{font-size:clamp(17px,1.7vw,21px);white-space:nowrap}
.site-header .user-trigger{display:flex;align-items:center;gap:8px;white-space:nowrap}
.site-header .user-label{display:inline-block!important;white-space:nowrap}
@media(min-width:761px) and (max-width:1000px){.site-header .navbar{width:98%;gap:8px}.site-header .nav-links{gap:8px}.site-header .nav-links .nav-text-link{font-size:12px}.site-header .brand{font-size:17px}.site-header .user-label{display:inline-block!important;font-size:12px}}
@media(max-width:760px){body{padding-bottom:74px}.site-header .navbar{width:calc(100% - 28px);min-height:62px;flex-direction:row!important}.site-header .nav-links{width:auto!important;flex-wrap:nowrap!important}.site-header .nav-text-link,.site-header .user-label{display:none!important}.chatlayout{grid-template-columns:minmax(0,1fr);height:calc(100dvh - 205px);min-height:350px}.chatlayout .chat{display:none}.chatlayout.open .sidebar{display:none}.chatlayout.open .chat{display:flex}.chatlayout .mobileback{display:block}.pagehead{margin:15px 0}.pagehead h1{font-size:22px}}
@media(min-width:761px){.chatlayout .mobileback{display:none}}

/* Marketplace item attachment — isolated from existing shared styles */
.market-item-card{display:block;background:#fff;color:#294d38;border:1px solid #dbe6da;border-radius:13px;overflow:hidden;margin:0 0 9px;max-width:320px;text-decoration:none}
.market-item-card:hover{border-color:#47785b}
.market-item-row{display:flex;align-items:center;gap:11px;padding:10px}
.market-item-photo{width:78px;height:78px;flex-shrink:0;object-fit:cover;border-radius:9px;background:#e5ecdc}
.market-item-placeholder{width:78px;height:78px;flex-shrink:0;border-radius:9px;background:#e5ecdc;display:grid;place-items:center;font-size:30px}
.market-item-info{min-width:0;flex:1}
.market-item-info strong{display:block;font-size:13px;overflow-wrap:anywhere}
.market-item-info small{display:block;color:#647568;font-size:11px;margin-top:5px}
.market-item-info .market-item-price{font-weight:750;color:#47785b}
.market-item-foot{display:block;padding:7px 10px;background:#f2f7ef;color:#47785b;font-size:11px;font-weight:700}
.pending-item{margin:10px 14px 0;padding:10px 12px;border:1px dashed #96b29a;background:#f5faf3;border-radius:13px;flex-shrink:0}
.pending-item-head{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:8px;font-size:12px;font-weight:700}
.pending-item-remove{border:0;background:transparent;color:#a12d2d;font-weight:700;font-size:12px}
.pending-item .market-item-card{margin:0}
@media(max-width:700px){.pending-item{margin:8px 9px 0}.market-item-photo,.market-item-placeholder{width:65px;height:65px}}

/* K.I.T.A. shared navigation refinements — Messages page */
.brand{display:flex;align-items:center;gap:11px;flex-shrink:0;text-decoration:none}
.brand-icon{width:52px;height:52px;display:flex;align-items:center;justify-content:center;background:#fff;border-radius:15px;overflow:hidden;flex-shrink:0;box-shadow:0 5px 18px rgba(0,0,0,.07)}
.brand-icon img{display:block;width:100%;height:100%;object-fit:contain}
.brand-text{display:inline-flex;align-items:baseline;gap:1px;font-family:'Fredoka','Segoe UI',sans-serif;font-size:27px;font-weight:700;letter-spacing:-1.2px;line-height:1;white-space:nowrap}
.brand-text span{display:inline-block}
.brand-text .k{color:#FFE047;transform:rotate(-6deg)}
.brand-text .i{color:#6DE0BF;transform:rotate(4deg)}
.brand-text .t{color:#FF9C68;transform:rotate(-5deg)}
.brand-text .a{color:#4CC9DF;transform:rotate(5deg)}
.navbar{width:min(1120px,92%);margin:auto}
.nav-links{display:flex;align-items:center;gap:18px;min-width:0}
.nav-links .user-trigger{flex-shrink:0}
@media(max-width:760px){
 .navbar{width:92%;min-height:60px}
 .brand{gap:7px}
 .brand-icon{width:42px;height:42px;border-radius:12px}
 .brand-text{font-size:21px}
 .nav-links{gap:10px}
 .bottom-nav{grid-template-columns:repeat(3,minmax(0,1fr))!important}
 .bottom-nav a{min-width:0}
 .chatlayout{height:calc(100dvh - 205px)}
}
@media(max-width:380px){.brand-icon{width:36px;height:36px}.brand-text{font-size:18px}.nav-links{gap:7px}}

/* K.I.T.A. consistent header and mobile navigation */
header .navbar{width:min(1120px,92%);margin:auto;min-height:70px;display:flex;flex-direction:row;align-items:center;justify-content:space-between;gap:20px}
header .brand{display:flex;align-items:center;gap:11px;flex-shrink:0;text-decoration:none;font-size:inherit}
header .brand-icon{width:52px;height:52px;display:flex;align-items:center;justify-content:center;background:#fff!important;padding:0!important;border-radius:15px;overflow:hidden;flex-shrink:0;box-shadow:0 5px 18px rgba(0,0,0,.07)}
header .brand-icon img{display:block;width:100%;height:100%;object-fit:contain}
header .brand-text{display:inline-flex;align-items:baseline;gap:1px;font-family:'Fredoka','Segoe UI',sans-serif;font-size:27px;font-weight:700;letter-spacing:-1.2px;line-height:1;white-space:nowrap}
.bottom-nav{grid-template-columns:repeat(3,minmax(0,1fr))!important}
@media(max-width:700px){header .navbar{width:92%;min-height:60px;flex-direction:row;align-items:center;padding:7px 0}header .brand{gap:7px}header .brand-icon{width:42px;height:42px;border-radius:12px}header .brand-text{font-size:21px}header .nav-links{gap:10px}.bottom-nav a{min-width:0}}
@media(max-width:390px){header .brand-text{font-size:20px}header .brand-icon{width:40px;height:40px}}
</style></head>
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




<main class="container">

    <div class="pagehead">
        <div>
            <h1>💬 Messages</h1>
            <p>Connect with your neighbours</p>
        </div>
    </div>

    <div
        class="chatlayout {{ isset($conversation) ? 'open' : '' }}"
        id="chatLayout"
    >

        <aside class="sidebar">
            <div class="sidebar-head">
                <h2>Conversations</h2>

                <input
                    id="userSearch"
                    class="searchbox"
                    type="search"
                    placeholder="Search neighbours by name..."
                    autocomplete="off"
                >

                <div
                    id="searchResults"
                    class="searchresults"
                    aria-live="polite"
                ></div>
            </div>

            <div class="conversations">
                @forelse ($conversations as $thread)
                    @php
                        $other = $thread->otherUser(auth()->id());
                        $preview = $thread->latestMessage;
                    @endphp

                    <a
                        class="conversation {{ isset($conversation) && $conversation->id === $thread->id ? 'active' : '' }}"
                        href="{{ route('messages.show', $thread) }}"
                    >
                        <span class="avatar">
                            {{ mb_strtoupper(mb_substr($other?->name ?? '?', 0, 1)) }}
                        </span>

                        <span class="details">
                            <strong>{{ $other?->name ?? 'Unknown user' }}</strong>

                            <small>
                                @if ($preview?->deleted_at)
                                    Message deleted
                                @else
                                    {{ $preview?->body ?? 'Start chatting' }}
                                @endif
                            </small>
                        </span>
                    </a>
                @empty
                    <div class="emptylist">
                        No conversations yet. Search for a neighbour
                        to start chatting! 🌿
                    </div>
                @endforelse
            </div>
        </aside>

        <section class="chat" aria-label="Chat conversation">

            @isset ($conversation)
                @php
                    $other = $conversation->otherUser(auth()->id());
                @endphp

                <div class="chathead">
                    <button
                        type="button"
                        class="mobileback"
                        onclick="document.getElementById('chatLayout').classList.remove('open')"
                    >←</button>

                    <span class="avatar">
                        {{ mb_strtoupper(mb_substr($other?->name ?? '?', 0, 1)) }}
                    </span>

                    <div>
                        <strong>{{ $other?->name ?? 'Unknown user' }}</strong>
                    </div>
                </div>

                <div
                    class="messages"
                    id="messages"
                    aria-live="polite"
                >
                    @foreach ($messages as $message)
                        @php
                            $mine = (int) $message->sender_id === (int) auth()->id();
                            $deleted = $message->deleted_at !== null;
                        @endphp

                        <div
                            class="bubble {{ $mine ? 'mine' : '' }} {{ $deleted ? 'deleted' : '' }}"
                            data-id="{{ $message->id }}"
                        >
                            <div class="message-top">
                                <div class="message-content">
                                    @if ($deleted)
                                        <span class="deleted-text">
                                            {{ $message->sender?->name ?? 'User' }} has deleted this message
                                        </span>
                                    @else
                                        @if ($message->communityItem)
                                            @php $chatItem = $message->communityItem; @endphp
                                            <button class="market-item-card" type="button" data-item-modal data-item-name="{{ $chatItem->name }}" data-item-type="{{ $chatItem->type }}" data-item-price="{{ $chatItem->price }}" data-item-category="{{ $chatItem->category }}" data-item-location="{{ $chatItem->location }}" data-item-description="{{ $chatItem->description }}" data-item-status="{{ $chatItem->status }}" data-item-owner="{{ $chatItem->user?->name ?? 'Community Member' }}" data-item-image="{{ $chatItem->image_path ? asset('storage/' . $chatItem->image_path) : '' }}">
                                                <span class="market-item-row">
                                                    @if ($chatItem->image_path)
                                                        <img class="market-item-photo" src="{{ asset('storage/' . $chatItem->image_path) }}" alt="{{ $chatItem->name }}">
                                                    @else
                                                        <span class="market-item-placeholder">📦</span>
                                                    @endif
                                                    <span class="market-item-info">
                                                        <strong>{{ $chatItem->name }}</strong>
                                                        <small>{{ match($chatItem->type) {'sell'=>'For Sale','borrow'=>'Borrow','give_away'=>'Free',default=>ucfirst($chatItem->type)} }}</small>
                                                        @if ($chatItem->type === 'sell')
                                                            <small class="market-item-price">RM {{ number_format((float)$chatItem->price,2) }}</small>
                                                        @endif
                                                    </span>
                                                </span>
                                                <span class="market-item-foot">View Marketplace Item ↗</span>
                                            </button>
                                        @endif
                                        <span class="bubble-text">{{ $message->body }}</span>
                                    @endif
                                </div>

                                @if ($mine && !$deleted)
                                    <div class="message-actions">
                                        <button
                                            type="button"
                                            class="menu-trigger"
                                            aria-label="Message options"
                                            aria-expanded="false"
                                        >⋯</button>

                                        <div class="message-menu hidden">
                                            <button type="button" data-action="edit">
                                                ✏️ Edit
                                            </button>

                                            <button
                                                type="button"
                                                class="danger"
                                                data-action="delete"
                                            >
                                                🗑️ Delete
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="bubble-footer">
                                @if ($message->edited_at && !$deleted)
                                    <span>edited</span>
                                @endif

                                <time>
                                    {{ $message->created_at?->format('g:i A') }}
                                </time>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if (isset($pendingItem) && $pendingItem)
                    <div class="pending-item" id="pendingItemBox">
                        <div class="pending-item-head">
                            <span>📦 Item attached to your next message (not sent yet)</span>
                            <button type="button" class="pending-item-remove" id="removePendingItem">Remove ✕</button>
                        </div>
                        <button class="market-item-card" type="button" data-item-modal data-item-name="{{ $pendingItem->name }}" data-item-type="{{ $pendingItem->type }}" data-item-price="{{ $pendingItem->price }}" data-item-category="{{ $pendingItem->category }}" data-item-location="{{ $pendingItem->location }}" data-item-description="{{ $pendingItem->description }}" data-item-status="{{ $pendingItem->status }}" data-item-owner="{{ $pendingItem->user?->name ?? 'Community Member' }}" data-item-image="{{ $pendingItem->image_path ? asset('storage/' . $pendingItem->image_path) : '' }}">
                            <span class="market-item-row">
                                @if ($pendingItem->image_path)
                                    <img class="market-item-photo" src="{{ asset('storage/' . $pendingItem->image_path) }}" alt="{{ $pendingItem->name }}">
                                @else
                                    <span class="market-item-placeholder">📦</span>
                                @endif
                                <span class="market-item-info">
                                    <strong>{{ $pendingItem->name }}</strong>
                                    <small>{{ match($pendingItem->type) {'sell'=>'For Sale','borrow'=>'Borrow','give_away'=>'Free',default=>ucfirst($pendingItem->type)} }}</small>
                                    @if ($pendingItem->type === 'sell')
                                        <small class="market-item-price">RM {{ number_format((float)$pendingItem->price,2) }}</small>
                                    @endif
                                </span>
                            </span>
                            <span class="market-item-foot">View Marketplace Item ↗</span>
                        </button>
                    </div>
                @endif

                <form
                    class="compose"
                    id="messageForm"
                    action="{{ route('messages.store', $conversation) }}"
                    method="POST"
                >
                    @csrf

                    <textarea
                        name="body"
                        id="messageBody"
                        maxlength="5000"
                        required
                        placeholder="Type a message..."
                    ></textarea>

                    <button
                        class="send"
                        type="submit"
                        id="sendButton"
                    >Send ➤</button>
                </form>

                <div
                    class="error hidden"
                    id="sendError"
                    role="alert"
                ></div>
            @else
                <div class="welcome">
                    <div>
                        <span class="big">💬</span>
                        <strong>Your conversations start here</strong>
                        <p>Choose a conversation or search for someone to message.</p>
                    </div>
                </div>
            @endisset

        </section>
    </div>
</main>

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
    const csrf = document.querySelector(
        'meta[name="csrf-token"]'
    ).content;

    const search = document.getElementById('userSearch');
    const results = document.getElementById('searchResults');

    let searchTimer;

    // SEARCH NEIGHBOURS

    search.addEventListener('input', () => {
        clearTimeout(searchTimer);

        const q = search.value.trim();

        if (q.length < 2) {
            results.replaceChildren();
            return;
        }

        searchTimer = setTimeout(async () => {
            try {
                const response = await fetch(
                    `{{ route('messages.search') }}?q=${encodeURIComponent(q)}`,
                    {
                        headers: { 'Accept': 'application/json' }
                    }
                );

                if (!response.ok) throw new Error();

                const users = await response.json();

                if (search.value.trim() !== q) return;

                results.replaceChildren();

                if (!users.length) {
                    results.textContent = 'No users found.';
                    return;
                }

                users.forEach(user => {
                    const row = document.createElement('div');
                    row.className = 'searchresult';

                    const label = document.createElement('span');
                    label.textContent = user.name;

                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action =
                        `{{ url('/messages/start') }}/${encodeURIComponent(user.id)}`;

                    const token = document.createElement('input');
                    token.type = 'hidden';
                    token.name = '_token';
                    token.value = csrf;

                    const button = document.createElement('button');
                    button.type = 'submit';
                    button.textContent = 'Chat';

                    form.append(token, button);
                    row.append(label, form);
                    results.append(row);
                });
            } catch (error) {
                results.textContent = 'Could not search users.';
            }
        }, 300);
    });

    @if (isset($conversation))

    const messagesBox = document.getElementById('messages');
    const form = document.getElementById('messageForm');
    const body = document.getElementById('messageBody');
    const sendButton = document.getElementById('sendButton');
    const sendError = document.getElementById('sendError');

    let pendingItemId = @json(isset($pendingItem) && $pendingItem ? $pendingItem->id : null);
    const pendingItemBox = document.getElementById('pendingItemBox');
    const removePendingItem = document.getElementById('removePendingItem');
    function clearPendingItem(){
        pendingItemId = null;
        if (pendingItemBox) pendingItemBox.remove();
        const url = new URL(window.location.href);
        url.searchParams.delete('item');
        window.history.replaceState({}, '', url.pathname + url.search + url.hash);
    }
    if(removePendingItem) removePendingItem.addEventListener('click',clearPendingItem);

    const myId = Number(@json(auth()->id()));
    const fetchUrl = @json(route('messages.fetch', $conversation));
    const messageBaseUrl = @json(url('/messages/message'));

    let fetching = false;
    let busyMessageIds = new Set();

    function scrollBottom() {
        messagesBox.scrollTop = messagesBox.scrollHeight;
    }

    function messageUrl(id) {
        return `${messageBaseUrl}/${encodeURIComponent(id)}`;
    }

    function getBubble(id) {
        return Array.from(messagesBox.querySelectorAll('.bubble'))
            .find(el => Number(el.dataset.id) === Number(id));
    }

    function formatTime(dateString) {
        if (!dateString) return '';

        return new Date(dateString).toLocaleTimeString([], {
            hour: 'numeric',
            minute: '2-digit'
        });
    }

    function closeMenus() {
        messagesBox.querySelectorAll('.message-menu')
            .forEach(menu => menu.classList.add('hidden'));

        messagesBox.querySelectorAll('.menu-trigger')
            .forEach(button => button.setAttribute('aria-expanded', 'false'));
    }

    function makeItemCard(item) {
        const link = document.createElement('button');
        link.type = 'button';
        link.className = 'market-item-card';
        link.dataset.itemModal = '';
        for (const key of ['name','type','price','category','location','description','status','owner']) {
            link.dataset['item' + key[0].toUpperCase() + key.slice(1)] = item[key] ?? '';
        }
        link.dataset.itemImage = item.image_url || '';
        const row = document.createElement('span');
        row.className = 'market-item-row';
        let photo;
        if (item.image_url) {
            photo = document.createElement('img');
            photo.className = 'market-item-photo';
            photo.src = item.image_url;
            photo.alt = item.name || 'Marketplace item';
        } else {
            photo = document.createElement('span');
            photo.className = 'market-item-placeholder';
            photo.textContent = '📦';
        }
        const info = document.createElement('span');
        info.className = 'market-item-info';
        const name = document.createElement('strong');
        name.textContent = item.name || 'Marketplace item';
        const type = document.createElement('small');
        type.textContent = ({sell:'For Sale',borrow:'Borrow',give_away:'Free'})[item.type] || item.type || '';
        info.append(name,type);
        if (item.type === 'sell' && item.price !== null && item.price !== undefined) {
            const price = document.createElement('small');
            price.className = 'market-item-price';
            price.textContent = 'RM ' + Number(item.price).toFixed(2);
            info.append(price);
        }
        row.append(photo,info);
        const foot = document.createElement('span');
        foot.className = 'market-item-foot';
        foot.textContent = 'View Marketplace Item ↗';
        link.append(row,foot);
        return link;
    }

    function createMessageBubble(message) {
        const mine = Number(message.sender_id) === myId;
        const deleted = Boolean(message.deleted_at);

        const bubble = document.createElement('div');
        bubble.className =
            'bubble' +
            (mine ? ' mine' : '') +
            (deleted ? ' deleted' : '');

        bubble.dataset.id = message.id;

        const top = document.createElement('div');
        top.className = 'message-top';

        const content = document.createElement('div');
        content.className = 'message-content';

        const text = document.createElement('span');

        if (deleted) {
            text.className = 'deleted-text';
            text.textContent =
                `${message.sender_name || 'User'} has deleted this message`;
        } else {
            text.className = 'bubble-text';
            text.textContent = message.body || '';
        }

        if (!deleted && message.item) content.append(makeItemCard(message.item));
        content.append(text);
        top.append(content);

        if (mine && !deleted) {
            const actions = document.createElement('div');
            actions.className = 'message-actions';

            const trigger = document.createElement('button');
            trigger.type = 'button';
            trigger.className = 'menu-trigger';
            trigger.textContent = '⋯';
            trigger.setAttribute('aria-label', 'Message options');
            trigger.setAttribute('aria-expanded', 'false');

            const menu = document.createElement('div');
            menu.className = 'message-menu hidden';

            const edit = document.createElement('button');
            edit.type = 'button';
            edit.dataset.action = 'edit';
            edit.textContent = '✏️ Edit';

            const remove = document.createElement('button');
            remove.type = 'button';
            remove.className = 'danger';
            remove.dataset.action = 'delete';
            remove.textContent = '🗑️ Delete';

            menu.append(edit, remove);
            actions.append(trigger, menu);
            top.append(actions);
        }

        const footer = document.createElement('div');
        footer.className = 'bubble-footer';

        if (message.edited_at && !deleted) {
            const edited = document.createElement('span');
            edited.textContent = 'edited';
            footer.append(edited);
        }

        const time = document.createElement('time');
        time.textContent = formatTime(message.created_at);
        footer.append(time);

        bubble.append(top, footer);

        return bubble;
    }

    function renderMessage(message) {
        const existing = getBubble(message.id);

        if (busyMessageIds.has(Number(message.id))) {
            return;
        }

        const replacement = createMessageBubble(message);

        if (existing) {
            existing.replaceWith(replacement);
        } else {
            messagesBox.append(replacement);
        }
    }

    function showError(message) {
        sendError.textContent = message;
        sendError.classList.remove('hidden');
    }

    async function apiRequest(url, method, data = null) {
        const options = {
            method,
            headers: {
                'X-CSRF-TOKEN': csrf,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        };

        if (data !== null) {
            options.body = JSON.stringify(data);
        }

        const response = await fetch(url, options);
        const result = await response.json().catch(() => ({}));

        if (!response.ok) {
            throw new Error(
                result.message ||
                Object.values(result.errors || {}).flat()[0] ||
                'Something went wrong. Please try again.'
            );
        }

        return result;
    }

    // EDIT INLINE

    function startEditing(bubble) {
        const id = Number(bubble.dataset.id);
        const content = bubble.querySelector('.message-content');
        const text = content.querySelector('.bubble-text');

        if (!text) return;

        const original = text.textContent;

        busyMessageIds.add(id);
        closeMenus();

        const textarea = document.createElement('textarea');
        textarea.className = 'edit-area';
        textarea.maxLength = 5000;
        textarea.value = original;

        const buttons = document.createElement('div');
        buttons.className = 'edit-buttons';

        const cancel = document.createElement('button');
        cancel.type = 'button';
        cancel.className = 'edit-cancel';
        cancel.textContent = 'Cancel';

        const save = document.createElement('button');
        save.type = 'button';
        save.className = 'edit-save';
        save.textContent = 'Save';

        buttons.append(cancel, save);
        content.replaceChildren(textarea, buttons);

        function cancelEditing() {
            busyMessageIds.delete(id);
            content.replaceChildren(text);
        }

        cancel.addEventListener('click', cancelEditing);

        save.addEventListener('click', async () => {
            const updated = textarea.value.trim();

            if (!updated) {
                alert('Message cannot be empty.');
                return;
            }

            if (updated === original) {
                cancelEditing();
                return;
            }

            save.disabled = true;
            cancel.disabled = true;

            try {
                const message = await apiRequest(
                    messageUrl(id),
                    'PATCH',
                    { body: updated }
                );

                busyMessageIds.delete(id);
                renderMessage(message);
            } catch (error) {
                alert(error.message);
                save.disabled = false;
                cancel.disabled = false;
            }
        });

        textarea.focus();
        textarea.setSelectionRange(
            textarea.value.length,
            textarea.value.length
        );
    }

    // DELETE FOR EVERYONE

    async function deleteMessage(bubble) {
        const id = Number(bubble.dataset.id);

        const confirmed = confirm(
            'Delete this message for everyone?'
        );

        if (!confirmed) return;

        busyMessageIds.add(id);
        closeMenus();

        try {
            const message = await apiRequest(
                messageUrl(id),
                'DELETE'
            );

            busyMessageIds.delete(id);
            renderMessage(message);
        } catch (error) {
            busyMessageIds.delete(id);
            alert(error.message);
        }
    }

    // MESSAGE MENU EVENT DELEGATION

    messagesBox.addEventListener('click', event => {
        const trigger = event.target.closest('.menu-trigger');

        if (trigger) {
            const menu = trigger.parentElement
                .querySelector('.message-menu');

            const wasHidden = menu.classList.contains('hidden');

            closeMenus();

            if (wasHidden) {
                menu.classList.remove('hidden');
                trigger.setAttribute('aria-expanded', 'true');
            }

            return;
        }

        const action = event.target.closest('[data-action]');

        if (!action) return;

        const bubble = action.closest('.bubble');
        if (!bubble) return;

        if (action.dataset.action === 'edit') {
            startEditing(bubble);
        }

        if (action.dataset.action === 'delete') {
            deleteMessage(bubble);
        }
    });

    document.addEventListener('click', event => {
        if (!event.target.closest('.message-actions')) {
            closeMenus();
        }
    });

    // SEND NEW MESSAGE

    form.addEventListener('submit', async event => {
        event.preventDefault();

        const content = body.value.trim();
        if (!content) return;

        sendButton.disabled = true;
        sendError.classList.add('hidden');

        try {
            const message = await apiRequest(
                form.action,
                'POST',
                { body: content, community_item_id: pendingItemId }
            );

            renderMessage(message);
            body.value = '';
            if (pendingItemId !== null) clearPendingItem();
            scrollBottom();
        } catch (error) {
            showError(error.message);
        } finally {
            sendButton.disabled = false;
            body.focus();
        }
    });

    body.addEventListener('keydown', event => {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault();
            form.requestSubmit();
        }
    });

    // AUTO REFRESH INCLUDING EDITED AND DELETED MESSAGES

    async function fetchMessages() {
        if (fetching || document.hidden) return;

        fetching = true;

        try {
            const response = await fetch(
                `${fetchUrl}?sync=1`,
                {
                    headers: { 'Accept': 'application/json' }
                }
            );

            if (!response.ok) return;

            const messages = await response.json();

            const nearBottom =
                messagesBox.scrollHeight -
                messagesBox.scrollTop -
                messagesBox.clientHeight < 100;

            // Only update messages whose content has changed.
            messages.forEach(message => {
                const existing = getBubble(message.id);

                const signature = JSON.stringify([
                    message.body,
                    message.edited_at,
                    message.deleted_at,
                    message.sender_name,
                    message.item
                ]);

                if (existing && existing.dataset.signature === signature) {
                    return;
                }

                renderMessage(message);

                const rendered = getBubble(message.id);
                if (rendered) rendered.dataset.signature = signature;
            });

            if (nearBottom) scrollBottom();

        } catch (error) {
            // Try again on next refresh.
        } finally {
            fetching = false;
        }
    }

    // Initial messages are already rendered by Blade.
    // The first sync adds signatures and updates any changed messages.
    scrollBottom();
    setInterval(fetchMessages, 4000);

    @endif
</script>


<!-- Item details modal: no community.show view required -->
<div id="itemDetailModal" class="item-modal-overlay" hidden>
  <section class="item-modal" role="dialog" aria-modal="true" aria-labelledby="itemModalTitle" tabindex="-1">
    <button type="button" class="item-modal-close" aria-label="Close item details">✕</button>
    <div class="item-modal-grid">
      <div id="itemModalImage" class="item-modal-image"></div>
      <div class="item-modal-content">
        <span id="itemModalType" class="item-modal-tag"></span>
        <h2 id="itemModalTitle"></h2>
        <strong id="itemModalPrice" class="item-modal-price"></strong>
        <div class="item-modal-facts">
          <p><b>Category</b><span id="itemModalCategory"></span></p>
          <p><b>Location</b><span id="itemModalLocation"></span></p>
          <p><b>Shared by</b><span id="itemModalOwner"></span></p>
          <p><b>Status</b><span id="itemModalStatus"></span></p>
        </div>
        <h3>About this item</h3>
        <p id="itemModalDescription"></p>
      </div>
    </div>
  </section>
</div>
<style>
.market-item-card:is(button){width:100%;font:inherit;text-align:left;cursor:pointer}
.item-modal-overlay[hidden]{display:none!important}
.item-modal-overlay{position:fixed;inset:0;z-index:300;background:rgba(23,42,29,.62);display:grid;place-items:center;padding:18px;animation:itemFade .22s ease}
.item-modal{position:relative;width:min(820px,100%);max-height:90dvh;overflow:auto;border-radius:24px;background:#fff;padding:30px;box-shadow:0 24px 75px #10271940;animation:itemRise .28s ease;color:#294d38}
.item-modal-close{position:absolute;right:16px;top:16px;width:36px;height:36px;border:0;border-radius:50%;background:#e5ecdc;color:#294d38;z-index:1}
.item-modal-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:26px}
.item-modal-image{background:#edf4e9;border-radius:17px;min-height:300px;display:grid;place-items:center;font-size:65px;overflow:hidden}
.item-modal-image img{width:100%;height:100%;max-height:450px;object-fit:cover}
.item-modal-content h2{margin:12px 0;font-size:27px;overflow-wrap:anywhere}
.item-modal-content h3{margin:20px 0 7px;font-size:17px}
.item-modal-content p{line-height:1.6;overflow-wrap:anywhere}
.item-modal-tag{display:inline-block;padding:6px 12px;background:#e5f5e9;border-radius:30px;font-size:12px;font-weight:700;color:#287747}
.item-modal-price{display:block;color:#287747;font-size:23px;margin:8px 0}
.item-modal-price:empty{display:none}
.item-modal-facts{border-top:1px solid #e5ece6;margin-top:17px;padding-top:8px}
.item-modal-facts p{display:flex;justify-content:space-between;gap:12px;margin:9px 0;font-size:13px}
.item-modal-facts b{color:#788579;font-weight:500}
.item-modal-facts span{text-align:right;font-weight:650}
@keyframes itemFade{from{opacity:0}to{opacity:1}}
@keyframes itemRise{from{opacity:0;transform:translateY(15px) scale(.97)}to{opacity:1;transform:none}}
@media(max-width:700px){.item-modal{padding:20px;max-height:92dvh}.item-modal-grid{grid-template-columns:1fr;gap:16px}.item-modal-image{min-height:190px;max-height:260px}.item-modal-content h2{font-size:23px}}
@media(prefers-reduced-motion:reduce){.item-modal,.item-modal-overlay{animation:none}}
</style>
<script>
(() => {
 const overlay=document.getElementById('itemDetailModal');
 const dialog=overlay.querySelector('.item-modal');
 let previousFocus=null;
 const set=(id,value)=>{document.getElementById(id).textContent=value || 'Not provided';};
 const close=()=>{overlay.hidden=true;document.body.style.overflow='';previousFocus?.focus?.();};
 document.addEventListener('click',e=>{
   const trigger=e.target.closest('[data-item-modal]');
   if(!trigger)return;
   e.preventDefault();
   previousFocus=trigger;
   const d=trigger.dataset;
   set('itemModalTitle',d.itemName);
   set('itemModalType',({sell:'For Sale',borrow:'Borrow',give_away:'Give Away'})[d.itemType] || d.itemType);
   document.getElementById('itemModalPrice').textContent=d.itemType==='sell' && d.itemPrice!=='' && Number.isFinite(Number(d.itemPrice))?'RM '+Number(d.itemPrice).toFixed(2):'';
   for(const k of ['Category','Location','Owner','Status','Description'])set('itemModal'+k,d['item'+k]);
   const img=document.getElementById('itemModalImage');img.replaceChildren();
   if(d.itemImage){const el=document.createElement('img');el.src=d.itemImage;el.alt=d.itemName || 'Item photo';img.append(el)}else{img.textContent='📦'}
   overlay.hidden=false;document.body.style.overflow='hidden';dialog.focus();
 });
 overlay.querySelector('.item-modal-close').addEventListener('click',close);
 overlay.addEventListener('click',e=>{if(e.target===overlay)close()});
 document.addEventListener('keydown',e=>{if(overlay.hidden)return;if(e.key==='Escape')close();if(e.key==='Tab'){const els=[...dialog.querySelectorAll('button:not([disabled]),a[href],input,textarea,[tabindex="0"]')];if(!els.length){e.preventDefault();return}const first=els[0],last=els[els.length-1];if(e.shiftKey&&document.activeElement===first){e.preventDefault();last.focus()}else if(!e.shiftKey&&document.activeElement===last){e.preventDefault();first.focus()}}});
})();
</script>

</body>
</html>