<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Community Issues | K.I.T.A.</title>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&display=swap" rel="stylesheet">
<style>

:root{--green:#315d46;--dark:#234735;--light:#eaf2e9;--bg:#f7f8f4;--text:#263b2d;--muted:#78847b;--border:#e2e8df}
*{box-sizing:border-box}body{margin:0;font-family:Arial,sans-serif;background:var(--bg);color:var(--text)}a{text-decoration:none}button,input,select,textarea{font:inherit}button{cursor:pointer}.container{width:min(1180px,94%);margin:auto}
header{background:#fff;border-bottom:1px solid var(--border);position:sticky;top:0;z-index:20}.navbar{min-height:75px;display:flex;justify-content:space-between;align-items:center;gap:15px}.brand{display:flex;align-items:center;gap:10px;font-size:23px;font-weight:800;color:var(--green)}.brand-icon{background:var(--light);padding:10px;border-radius:12px}.toplinks{display:flex;align-items:center;gap:22px}.toplinks a{color:#526457;font-size:14px;font-weight:600}.avatar{width:38px;height:38px;display:grid;place-items:center;background:var(--green);color:white;border-radius:50%;font-weight:bold}
main{padding:35px 0 60px}.pagehead{display:flex;justify-content:space-between;align-items:center;gap:15px;margin-bottom:25px}.pagehead h1{margin:0 0 8px;font-size:30px}.pagehead p{color:var(--muted);margin:0;font-size:14px}.btn{border:0;border-radius:10px;padding:12px 18px;font-weight:700;font-size:13px;display:inline-flex;justify-content:center;align-items:center;gap:7px}.btn-primary{background:var(--green);color:#fff}.btn-primary:hover{background:var(--dark)}.btn-outline{background:#fff;color:var(--green);border:1px solid var(--border)}.btn-danger{background:#fff0ef;color:#ba3c34;border:1px solid #f4d4d0}.btn:disabled{opacity:.5;cursor:not-allowed}
.stats{display:grid;grid-template-columns:repeat(3,1fr);gap:15px;margin-bottom:30px}.stat{background:#fff;padding:22px;border:1px solid var(--border);border-radius:15px}.stat small{color:var(--muted);font-weight:600}.stat strong{display:block;font-size:30px;margin-top:10px}.section-title{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px}.section-title h2{margin:0;font-size:20px}
.workspace{display:grid;grid-template-columns:minmax(0,1fr);gap:18px;align-items:start}.workspace.panel-open{grid-template-columns:minmax(0,1fr) 370px}.complaints-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:15px}.workspace.panel-open .complaints-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.complaint-card{background:#fff;border:1px solid var(--border);border-radius:15px;overflow:hidden;min-width:0}.complaint-card.selected{border-color:var(--green);box-shadow:0 0 0 1px var(--green)}.card-image{height:150px;background:#e7eee5;display:grid;place-items:center;font-size:40px;overflow:hidden}.card-image img{width:100%;height:100%;object-fit:cover}.card-body{padding:17px}.card-category{color:var(--green);font-size:11px;font-weight:bold;text-transform:uppercase;letter-spacing:.5px}.card-body h3{font-size:16px;margin:9px 0;line-height:1.4;overflow-wrap:anywhere}.card-location{color:var(--muted);font-size:12px;margin-bottom:15px;overflow-wrap:anywhere}.card-footer{display:flex;justify-content:space-between;align-items:center;gap:8px;flex-wrap:wrap}.status{display:inline-block;border-radius:100px;padding:6px 10px;font-size:11px;font-weight:bold;text-transform:capitalize}.status-pending{background:#fff3d5;color:#946400}.status-in_progress{background:#e5efff;color:#3265aa}.status-resolved{background:#e2f5e8;color:#267443}.status-rejected{background:#ffe7e7;color:#b34444}.status-cancelled{background:#f0e9f7;color:#75519b}.view-btn{background:transparent;border:0;color:var(--green);font-size:12px;font-weight:800;padding:7px 0}
.detail-panel{display:none;position:sticky;top:95px;background:#fff;border:1px solid var(--border);border-radius:16px;overflow-y:auto;max-height:calc(100vh - 115px)}.workspace.panel-open .detail-panel{display:block}.panel-top{padding:17px 20px;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid var(--border)}.close-panel{background:#f1f4ef;border:0;border-radius:8px;width:31px;height:31px;font-size:18px}.panel-image{width:100%;max-height:230px;object-fit:cover;display:none}.panel-content{padding:20px}.panel-content h2{font-size:21px;margin:12px 0;overflow-wrap:anywhere}.detail-row{padding:13px 0;border-bottom:1px solid var(--border)}.detail-row small{display:block;color:var(--muted);margin-bottom:7px}.detail-row div{font-size:14px;line-height:1.6;white-space:pre-wrap;overflow-wrap:anywhere}.panel-actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:20px}.empty{background:#fff;border:1px dashed #cbd9cb;padding:55px 20px;text-align:center;border-radius:15px;color:var(--muted)}.empty h3{color:var(--text)}.pagination-wrap{margin-top:24px}.alert{padding:14px 18px;border-radius:10px;margin-bottom:20px;background:#e4f5e8;color:#24633a}.alert.error{background:#fff0ef;color:#a53333}
.modal-backdrop{position:fixed;inset:0;background:rgba(17,33,24,.6);z-index:100;display:none;align-items:center;justify-content:center;padding:16px}.modal-backdrop.open{display:flex}.modal{background:#fff;border-radius:18px;width:min(560px,100%);max-height:90vh;overflow-y:auto;box-shadow:0 18px 65px #0003}.modal-header{padding:22px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between}.modal-header h2{font-size:20px;margin:0}.modal-body{padding:24px}.field{margin-bottom:17px}.field label{display:block;font-size:13px;font-weight:700;margin-bottom:8px}.field input,.field select,.field textarea{width:100%;padding:12px;border:1px solid #cbd8cc;border-radius:9px;background:#fff;color:var(--text);outline:none}.field textarea{min-height:110px;resize:vertical}.field input:focus,.field select:focus,.field textarea:focus{border-color:var(--green)}.hint{font-size:12px;color:var(--muted);margin:7px 0 0}.modal-footer{display:flex;justify-content:flex-end;gap:10px;flex-wrap:wrap}.warning{background:#fff5e8;padding:13px;border-radius:9px;color:#865d19;font-size:13px;margin-bottom:18px}body.modal-open{overflow:hidden}
@media(max-width:1000px){.workspace.panel-open{grid-template-columns:minmax(0,1fr) 320px}}@media(max-width:800px){.toplinks .desktop{display:none}.complaints-grid,.workspace.panel-open .complaints-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.workspace.panel-open{grid-template-columns:minmax(0,1fr)}.detail-panel{position:fixed;inset:0 0 0 auto;width:min(420px,100%);max-height:none;z-index:50;border-radius:0;box-shadow:-10px 0 40px #0002}}@media(max-width:520px){.pagehead{align-items:flex-start;flex-direction:column}.pagehead h1{font-size:25px}.stats{grid-template-columns:repeat(2,1fr);gap:8px}.stat{padding:13px 10px}.stat strong{font-size:24px}.complaints-grid,.workspace.panel-open .complaints-grid{grid-template-columns:1fr}.toplinks{gap:12px}.toplinks a{font-size:12px}.brand{font-size:19px}.card-image{height:180px}}
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
                grid-template-columns: repeat(3, 1fr);
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
@media(max-width:700px){body{padding-bottom:75px}.navbar{min-height:60px}.nav-text-link,.user-label{display:none}.bottom-nav{display:grid;grid-template-columns:repeat(3,1fr);position:fixed;bottom:0;left:0;right:0;background:white;border-top:1px solid var(--border);z-index:60;padding:6px 0 calc(6px + env(safe-area-inset-bottom,0px))}.bottom-nav a{display:flex;flex-direction:column;align-items:center;color:#617164;font-size:11px;text-decoration:none}.bottom-nav a span.ic{font-size:20px}.notification-panel{right:-60px}}
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


/* COMMUNITY ISSUES — isolated from shared header/settings */
.issues-page.container{width:min(1120px,92%);max-width:1120px;margin:0 auto;padding:38px 0 60px}
.issues-heading{display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap;margin-bottom:25px}
.issues-heading h1{font-size:clamp(27px,4vw,38px);color:#294d38;margin:0 0 4px}
.issues-heading p{color:#788579;margin:0}
.issues-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}
.issue-card{background:#fff;border:1px solid #e6e9df;border-radius:22px;padding:22px;min-width:0}
.issue-card h3{color:#294d38;margin:14px 0 8px;overflow-wrap:anywhere}
.issue-card p{color:#788579;font-size:13px;margin-top:6px;overflow-wrap:anywhere}
.issue-status{display:inline-block;padding:5px 12px;border-radius:999px;font-size:12px;font-weight:750}
.issue-status-reported{background:#fbf0d7;color:#8c6a30}
.issue-status-in_progress{background:#e5f0fa;color:#32698d}
.issue-status-resolved{background:#edf4e9;color:#47785b}
.issues-pagination{margin-top:25px;overflow-x:auto}
.issues-empty{grid-column:1/-1;text-align:center;padding:55px 20px;background:#fff;border-radius:22px;color:#788579}
@media(max-width:850px){.issues-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(max-width:600px){.issues-grid{grid-template-columns:1fr}.issues-page.container{padding-top:25px}}

/* K.I.T.A. shared navbar — Community Issues */
.brand{display:flex;align-items:center;gap:11px;flex-shrink:0;text-decoration:none}
.brand-icon{width:52px;height:52px;display:flex;align-items:center;justify-content:center;background:#fff;border-radius:15px;overflow:hidden;flex-shrink:0;box-shadow:0 5px 18px rgba(0,0,0,.07);padding:0}
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
.nav-links .notification-dropdown{flex-shrink:0}
.bottom-nav a[aria-current="page"]{color:#294d38;font-weight:750}
@media(max-width:760px){
 .navbar{width:92%;min-height:60px}
 .brand{gap:7px}
 .brand-icon{width:42px;height:42px;border-radius:12px}
 .brand-text{font-size:21px}
 .nav-links{gap:10px}
 .bottom-nav{grid-template-columns:repeat(3,minmax(0,1fr))!important}
 .bottom-nav a{min-width:0}
 .issues-page.container{padding-bottom:100px}
}
@media(max-width:380px){.brand-icon{width:36px;height:36px}.brand-text{font-size:18px}.nav-links{gap:7px}}

/* Issue status filters and photos */
.issues-filters{display:flex;gap:9px;flex-wrap:wrap;margin:0 0 24px}
.issues-filter{border:1px solid #dce5d9;background:#fff;color:#47785b;border-radius:999px;padding:10px 17px;font-size:13px;font-weight:700;transition:.2s}
.issues-filter:hover,.issues-filter.active{background:#47785b;color:white;border-color:#47785b}
.issue-card{padding:0;overflow:hidden}
.issue-photo{height:190px;background:#edf3eb;display:flex;align-items:center;justify-content:center;overflow:hidden;position:relative}
.issue-photo img{width:100%;height:100%;object-fit:cover;display:block}
.issue-photo.no-image:after{content:'📷  Image unavailable';color:#788579;font-size:13px;position:absolute}
.issue-photo-placeholder{display:flex;flex-direction:column;align-items:center;gap:7px;font-size:30px;color:#829887}
.issue-photo-placeholder small{font-size:12px}
.issue-card-content{padding:20px 22px 22px}
.issue-status-pending{background:#fbf0d7;color:#8c6a30}
.issue-status-rejected{background:#ffe6e6;color:#a83e3e}
@media(max-width:600px){.issues-filters{gap:7px}.issues-filter{padding:9px 13px;font-size:12px}.issue-photo{height:210px}}
/* K.I.T.A. final shared header/mobile fixes */
header .navbar{width:min(1120px,92%);margin:auto;min-height:70px;display:flex;flex-direction:row;align-items:center;justify-content:space-between;gap:20px}
header .brand{display:flex;align-items:center;gap:11px;flex-shrink:0;text-decoration:none;font-size:inherit}
header .brand-icon{width:52px;height:52px;display:flex;align-items:center;justify-content:center;background:#fff!important;padding:0!important;border-radius:15px;overflow:hidden;flex-shrink:0;box-shadow:0 5px 18px rgba(0,0,0,.07)}
header .brand-icon img{display:block;width:100%;height:100%;object-fit:contain}
header .brand-text{display:inline-flex;align-items:baseline;gap:1px;font-family:'Fredoka','Segoe UI',sans-serif;font-size:27px;font-weight:700;letter-spacing:-1.2px;line-height:1;white-space:nowrap}
header .brand-text .k{color:#FFE047;transform:rotate(-6deg)}
header .brand-text .i{color:#6DE0BF;transform:rotate(4deg)}
header .brand-text .t{color:#FF9C68;transform:rotate(-5deg)}
header .brand-text .a{color:#4CC9DF;transform:rotate(5deg)}
.bottom-nav{grid-template-columns:repeat(3,minmax(0,1fr))!important}
@media(max-width:760px){header .navbar{width:92%;min-height:60px;flex-direction:row;align-items:center;padding:7px 0}header .brand{gap:7px}header .brand-icon{width:42px;height:42px;border-radius:12px}header .brand-text{font-size:21px}header .nav-links{gap:10px}.bottom-nav a{min-width:0}}
@media(max-width:390px){header .brand-text{font-size:20px}header .brand-icon{width:40px;height:40px}}

/* Admin feedback on complaints */
.admin-feedback-box{margin-top:15px;padding:15px 17px;background:#edf5ee;border-left:4px solid #6b9877;border-radius:12px;color:#304537}
.admin-feedback-box strong{display:block;font-size:13px;color:#294d38;margin-bottom:7px}
.admin-feedback-box .admin-feedback-message{margin:0!important;font-size:13px;line-height:1.65;color:#405449;white-space:pre-wrap;overflow-wrap:anywhere}
.admin-feedback-box small{display:block;margin-top:9px;color:#73877a;font-size:11px}
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



<main class="issues-page container">
  <div class="issues-heading">
    <div>
      <h1>Community Issues 📣</h1>
      <p>Explore neighbourhood concerns and their latest status.</p>
    </div>
  </div>

  <form method="GET" action="{{ route('issues.index') }}" class="issues-filters" aria-label="Filter issues by status">
    @foreach (['all' => 'All', 'pending' => 'Pending', 'in_progress' => 'In Progress', 'rejected' => 'Rejected', 'resolved' => 'Resolved'] as $value => $label)
      <button type="submit" name="status" value="{{ $value }}" class="issues-filter {{ request('status', 'all') === $value ? 'active' : '' }}" aria-pressed="{{ request('status', 'all') === $value ? 'true' : 'false' }}">{{ $label }}</button>
    @endforeach
  </form>

  <div class="issues-grid">
    @forelse ($issues as $issue)
      @php
        $status = strtolower($issue->status ?? 'pending');
        $status = $status === 'reported' ? 'pending' : $status;
        $statusClass = in_array($status, ['pending', 'in_progress', 'resolved', 'rejected']) ? $status : 'pending';
        // Change image_path below if your Complaint model uses a different image column.
        $imagePath = $issue->image_path ?? null;
        $imageUrl = $imagePath ? (filter_var($imagePath, FILTER_VALIDATE_URL) ? $imagePath : asset('storage/' . ltrim(preg_replace('#^/?storage/#', '', $imagePath), '/'))) : null;
      @endphp
      <article class="issue-card">
        <div class="issue-photo">
          @if ($imageUrl)
            <img src="{{ $imageUrl }}" alt="Photo of {{ $issue->title }}" loading="lazy" onerror="this.style.display='none';this.parentElement.classList.add('no-image')">
          @else
            <span class="issue-photo-placeholder">📷<small>No photo provided</small></span>
          @endif
        </div>
        <div class="issue-card-content">
          <span class="issue-status issue-status-{{ $statusClass }}">{{ ucwords(str_replace('_', ' ', $status)) }}</span>
          <h3>{{ $issue->title }}</h3>
          <p>📂 {{ $issue->category ?? 'Community Issue' }}</p>
          <p>📅 {{ $issue->created_at?->format('d M Y') ?? 'Date unavailable' }}</p>
          @if ($issue->description)
            <p>{{ \Illuminate\Support\Str::limit($issue->description, 150) }}</p>
          @endif
          @if (filled($issue->admin_remarks))
            <div class="admin-feedback-box">
              <strong>💬 Update from Admin</strong>
              <p class="admin-feedback-message">{{ $issue->admin_remarks }}</p>
              <small>K.I.T.A. Administration</small>
            </div>
          @endif
        </div>
      </article>
    @empty
      <div class="issues-empty"><h3>No issues found 🌿</h3><p>There are no issues for this status yet.</p></div>
    @endforelse
  </div>
  <div class="issues-pagination">{{ $issues->withQueryString()->links() }}</div>
</main>
<nav class="bottom-nav" aria-label="Main navigation"><a href="{{ url('/events') }}"><span class="ic">📅</span>Events</a><a href="{{ route('issues.index') }}" aria-current="page"><span class="ic">📣</span>Issues</a><a href="{{ route('community.index') }}"><span class="ic">📦</span>Marketplace</a></nav>
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

</body>
</html>