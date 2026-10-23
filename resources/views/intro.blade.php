<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#f8f8f1">
<title>Discover K.I.T.A.</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&display=swap" rel="stylesheet">
<style>
:root{--cream:#f8f8f1;--sage:#e5ecdc;--green:#47785b;--dark:#294d38;--muted:#788579;--ink:#304537}
*{box-sizing:border-box}
html,body{margin:0;width:100%;height:100%;overflow:hidden}
body{font-family:"Segoe UI",Arial,sans-serif;color:var(--dark);background:var(--cream)}
button,a{font:inherit}button{cursor:pointer}
button:focus-visible,a:focus-visible{outline:3px solid #6b9876;outline-offset:4px}
.bg{position:fixed;inset:0;overflow:hidden;pointer-events:none;background:radial-gradient(ellipse at 15% 20%,#e5efdc 0%,transparent 46%),radial-gradient(ellipse at 90% 80%,#f1e8d7 0%,transparent 44%),var(--cream)}
.orb{position:absolute;border-radius:50%;filter:blur(4px);opacity:.48;animation:float 10s ease-in-out infinite alternate}
.orb.one{width:340px;height:340px;background:#d9e8cf;left:-120px;top:7%}
.orb.two{width:240px;height:240px;background:#e8d9c4;right:-60px;bottom:0;animation-delay:-4s}
.orb.three{width:110px;height:110px;background:#b9d8bd;right:16%;top:13%;animation-delay:-7s}
.grain{position:fixed;inset:0;pointer-events:none;opacity:.13;background-image:radial-gradient(#5d765c 0.6px,transparent .6px);background-size:17px 17px;mask-image:linear-gradient(90deg,transparent,#000 45%,transparent)}
.shell{position:relative;isolation:isolate;display:flex;flex-direction:column;height:100dvh;min-height:440px}
.topbar{height:82px;display:flex;align-items:center;justify-content:space-between;gap:12px;padding:0 clamp(20px,5vw,76px);z-index:20}
/* Intro without top branding */
.logo{display:inline-flex;align-items:center;gap:12px;text-decoration:none;flex-shrink:0}
.logo-mark {
    width: 66px;
    height: 66px;
    background: #ffffff;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
    box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
}

.logo-mark img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 16px;
    display: block;
}
/* Keep the existing playful colored K.I.T.A. lettering */
.logo-text{display:inline-flex;align-items:baseline;gap:1px;font-family:'Fredoka','Trebuchet MS',sans-serif;font-size:27px;font-weight:700;letter-spacing:-1.3px;line-height:1}
.logo-text span{display:inline-block}
.logo-text .k{color:#ffe047;transform:rotate(-6deg)}
.logo-text .i{color:#6de0bf;transform:rotate(4deg)}
.logo-text .t{color:#ff9c68;transform:rotate(-5deg)}
.logo-text .a{color:#4cc9df;transform:rotate(5deg)}
.skip{border:1px solid #d3dfcf;background:#ffffff99;border-radius:100px;padding:10px 17px;color:var(--dark);font-size:13px;font-weight:700;transition:transform .2s,background .2s}
.skip:hover{transform:translateY(-2px);background:white}
.stage{flex:1;position:relative;min-height:0;display:grid;place-items:center;padding:18px 20px 45px;perspective:1300px;touch-action:pan-y}
.stack{width:min(530px,calc(100vw - 44px));height:min(570px,calc(100dvh - 210px));min-height:290px;position:relative;transform-style:preserve-3d}
.card{position:absolute;inset:0;border-radius:clamp(22px,3vw,36px);background:linear-gradient(145deg,#fff,#fbfcf7);border:1px solid #ffffff;box-shadow:0 22px 65px #294d381a,0 4px 15px #294d3808;overflow:hidden;display:flex;flex-direction:column;padding:clamp(24px,5vh,42px);transform-origin:center 115%;will-change:transform,opacity;transition:transform 850ms cubic-bezier(.2,.9,.15,1),opacity 650ms ease,filter 850ms ease;pointer-events:none}
.card::after{content:"";position:absolute;inset:0;border-radius:inherit;box-shadow:inset 0 0 0 1px #dbe5d755;pointer-events:none}
.card[data-pos="0"]{cursor:pointer;z-index:10;transform:translate3d(0,0,0) rotate(0deg) scale(1);opacity:1;pointer-events:auto;filter:none}
.card[data-pos="1"]{z-index:9;transform:translate3d(0,18px,-40px) rotate(-3deg) scale(.955);opacity:1;filter:saturate(.83)}
.card[data-pos="2"]{z-index:8;transform:translate3d(0,35px,-80px) rotate(3deg) scale(.91);opacity:.8;filter:saturate(.75)}
.card[data-pos="3"],.card[data-pos="4"]{z-index:7;transform:translate3d(0,47px,-110px) rotate(-1deg) scale(.87);opacity:0}
.card[data-pos="-1"],.card[data-pos="-2"],.card[data-pos="-3"],.card[data-pos="-4"]{z-index:11;transform:translate3d(-100px,-130vh,120px) rotate(-17deg) scale(.8);opacity:0}
.card-top{display:flex;align-items:center;justify-content:space-between;gap:10px;font-size:11px;font-weight:800;letter-spacing:2px;color:var(--green);text-transform:uppercase}
.card-number{letter-spacing:1px;color:#8b9b8a}
.art{flex:1;min-height:90px;position:relative;display:grid;place-items:center;isolation:isolate}
.art-circle{width:clamp(110px,23vh,185px);aspect-ratio:1;border-radius:50%;display:grid;place-items:center;background:radial-gradient(circle at 28% 25%,#f3f8ef,#dcebd7 70%);box-shadow:0 25px 50px #47785b15,inset 0 0 0 1px #fff;animation:artFloat 4s ease-in-out infinite}
.art-emoji{font-size:clamp(62px,12vh,100px);filter:drop-shadow(0 13px 12px #294d3820);animation:emojiWiggle 6s ease-in-out infinite}
.art .spark{position:absolute;font-size:23px;color:#91b394;animation:spark 3s ease-in-out infinite}
.spark.s1{top:20%;left:20%}.spark.s2{right:18%;top:28%;animation-delay:1s}.spark.s3{bottom:18%;right:26%;animation-delay:2s}
.card h1,.card h2{font-size:clamp(27px,4.3vh,42px);line-height:1.12;letter-spacing:-1.5px;text-align:center;margin:0 0 15px;color:var(--dark)}
.card p{max-width:370px;margin:0 auto;text-align:center;color:#788579;font-size:clamp(13px,1.85vh,16px);line-height:1.75}
.card-bottom{display:flex;align-items:center;justify-content:center;min-height:32px;margin-top:18px;color:#9aac9c;font-size:12px;letter-spacing:.4px}
.card[data-pos="0"] .card-top{animation:rise .65s .1s both}
.card[data-pos="0"] .art{animation:rise .8s .14s both}
.card[data-pos="0"] h1,.card[data-pos="0"] h2{animation:rise .7s .23s both}
.card[data-pos="0"] p{animation:rise .7s .32s both}
.card[data-pos="0"] .card-bottom{animation:rise .7s .42s both}
.card.c1 .art-circle{background:radial-gradient(circle at 30% 25%,#f5faef,#d5e8d2)}
.card.c2 .art-circle{background:radial-gradient(circle at 30% 25%,#f6f9ee,#dcead0)}
.card.c3 .art-circle{background:radial-gradient(circle at 30% 25%,#f1f8f6,#d8e9e4)}
.card.c4 .art-circle{background:radial-gradient(circle at 30% 25%,#faf7ee,#eadfc9)}
.card.c5 .art-circle{background:radial-gradient(circle at 30% 25%,#f5f8ec,#c9e5cf)}
.card.c5 .card-bottom{margin-top:18px}
.card.c5[data-pos="0"]{cursor:default}
.enter{display:inline-flex;align-items:center;justify-content:center;gap:10px;text-decoration:none;background:var(--green);color:white;border-radius:100px;padding:14px 23px;font-size:14px;font-weight:800;box-shadow:0 12px 28px #47785b30;transition:transform .2s,box-shadow .2s}
.enter:hover{transform:translateY(-3px);box-shadow:0 16px 30px #47785b40}
.controls{height:110px;padding:0 20px 18px;display:flex;align-items:center;justify-content:center;gap:24px;z-index:20}
.arrow{width:47px;height:47px;border-radius:50%;border:1px solid #d9e5d6;background:#ffffffb8;color:var(--dark);font-size:20px;display:grid;place-items:center;transition:transform .2s,background .2s}
.arrow:hover:not(:disabled){background:white;transform:scale(1.08)}
.arrow:disabled{opacity:.3;cursor:not-allowed}
.dots{display:flex;gap:9px;align-items:center}
.dot{width:8px;height:8px;border:0;border-radius:100px;background:#c7d6c5;padding:0;transition:width .35s,background .35s,transform .35s}
.dot.active{width:31px;background:var(--green)}
.hint{position:absolute;bottom:92px;left:50%;transform:translateX(-50%);white-space:nowrap;color:#93a292;font-size:11px;letter-spacing:1px;pointer-events:none;animation:hintFloat 2s infinite}
.progress{position:fixed;left:0;top:0;height:3px;background:var(--green);width:20%;transition:width .7s cubic-bezier(.2,.8,.2,1);z-index:40}
@keyframes float{to{transform:translate3d(45px,-45px,0) scale(1.12)}}
@keyframes artFloat{0%,100%{transform:translateY(0) rotate(-3deg)}50%{transform:translateY(-12px) rotate(3deg)}}
@keyframes emojiWiggle{0%,100%{transform:rotate(-5deg) scale(1)}50%{transform:rotate(5deg) scale(1.05)}}
@keyframes spark{0%,100%{transform:translateY(0) scale(.8);opacity:.4}50%{transform:translateY(-14px) scale(1.3);opacity:1}}
@keyframes rise{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
@keyframes hintFloat{50%{transform:translate(-50%,6px);opacity:.6}}
@media(max-width:600px){.topbar{height:68px;padding:0 20px}.logo{gap:9px}.logo-mark{width:46px;height:46px;border-radius:12px}.logo-text{font-size:23px}.stage{padding:5px 18px 35px}.stack{width:calc(100vw - 45px);height:min(570px,calc(100dvh - 185px));min-height:280px}.card{padding:clamp(20px,3.5vh,32px)}.card h1,.card h2{font-size:clamp(25px,4.1vh,35px)}.controls{height:90px}.hint{bottom:77px}}
@media(max-height:630px){.topbar{height:57px}.controls{height:72px}.stage{padding:0 15px 24px}.stack{height:calc(100dvh - 165px);min-height:245px}.card{padding:18px 24px}.art-circle{width:clamp(88px,18vh,125px)}.art-emoji{font-size:clamp(49px,9vh,74px)}.card h1,.card h2{font-size:clamp(23px,4.5vh,32px);margin-bottom:8px}.card p{font-size:12px;line-height:1.5}.card-bottom{margin-top:9px}.hint{display:none}}
@media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important;scroll-behavior:auto!important}}
.topbar{display:none!important}
.stage{padding-top:30px}
@media(max-width:600px){.stage{padding-top:15px}}
</style>
<script>
/* Mark the intro as seen only when the user enters Home or chooses Skip. */
function finishIntro(){
  try {
    sessionStorage.setItem('neighbour_intro_seen','1');
    sessionStorage.removeItem('neighbour_intro_loading');
  } catch(e){}
  window.location.assign(@json(route('home')));
}
</script>
</head>
<body>
<div class="bg" aria-hidden="true"><div class="orb one"></div><div class="orb two"></div><div class="orb three"></div></div>
<div class="grain" aria-hidden="true"></div>
<div class="progress" id="progress" aria-hidden="true"></div>
<div class="shell">
<main class="stage" id="stage" aria-label="K.I.T.A. introduction">
 <div class="stack" id="stack">
  <article class="card c1" data-pos="0" aria-label="Slide 1: About K.I.T.A.">
    <div class="card-top"><span>Our little community</span><span class="card-number">01 / 05</span></div>
    <div class="art"><span class="spark s1">✦</span><span class="spark s2">✧</span><div class="art-circle"><span class="art-emoji">🌿</span></div><span class="spark s3">✳</span></div>
    <div><h1>A little closer.<br>A lot stronger.</h1><p>Meet K.I.T.A — a little space for people to connect, share and grow together.</p></div>
    <div class="card-bottom">A place to belong ✨</div>
  </article>
  <article class="card c2" data-pos="1" aria-label="Slide 2: Community Events" aria-hidden="true">
    <div class="card-top"><span>Community events</span><span class="card-number">02 / 05</span></div>
    <div class="art"><span class="spark s1">✦</span><span class="spark s2">✧</span><div class="art-circle"><span class="art-emoji">🗓️</span></div><span class="spark s3">✳</span></div>
    <div><h2>Good things happen<br>together.</h2><p>Discover local activities, join exciting events and make memories with your neighbours.</p></div>
    <div class="card-bottom">Meet • Join • Celebrate</div>
  </article>
  <article class="card c3" data-pos="2" aria-label="Slide 3: Community Issues" aria-hidden="true">
    <div class="card-top"><span>Community issues</span><span class="card-number">03 / 05</span></div>
    <div class="art"><span class="spark s1">✦</span><span class="spark s2">✧</span><div class="art-circle"><span class="art-emoji">💬</span></div><span class="spark s3">✳</span></div>
    <div><h2>Every voice<br>matters.</h2><p>Report neighbourhood concerns, follow their progress and help make our community better.</p></div>
    <div class="card-bottom">Speak up • Make a difference</div>
  </article>
  <article class="card c4" data-pos="3" aria-label="Slide 4: Marketplace" aria-hidden="true">
    <div class="card-top"><span>Marketplace</span><span class="card-number">04 / 05</span></div>
    <div class="art"><span class="spark s1">✦</span><span class="spark s2">✧</span><div class="art-circle"><span class="art-emoji">📦</span></div><span class="spark s3">✳</span></div>
    <div><h2>Share more.<br>Waste less.</h2><p>Borrow, lend and share useful items with the people right around you.</p></div>
    <div class="card-bottom">Sharing is caring ♡</div>
  </article>
  <article class="card c5" data-pos="4" aria-label="Slide 5: Welcome" aria-hidden="true">
    <div class="card-top"><span>Your journey begins</span><span class="card-number">05 / 05</span></div>
    <div class="art"><span class="spark s1">✦</span><span class="spark s2">✧</span><div class="art-circle"><span class="art-emoji">🏡</span></div><span class="spark s3">✳</span></div>
    <div><h2>Welcome to<br>K.I.T.A.</h2><p>Every great community begins with a simple hello. Yours starts here.</p></div>
    <div class="card-bottom"><a class="enter" href="{{ route('home') }}" onclick="event.preventDefault();finishIntro()">Let's Get Started <span aria-hidden="true">→</span></a></div>
  </article>
 </div>
 
</main>
<nav class="controls" aria-label="Introduction navigation">
 <button class="arrow" id="prev" type="button" aria-label="Previous card" disabled>←</button>
 <div class="dots" id="dots" aria-label="Slide selection"></div>
 <button class="arrow" id="next" type="button" aria-label="Next card">→</button>
</nav>
</div>
<script>
(() => {
  const cards = Array.from(document.querySelectorAll('.card'));
  const dots = document.getElementById('dots');
  const prev = document.getElementById('prev');
  const next = document.getElementById('next');
  const progress = document.getElementById('progress');
  let current = 0;
  cards.forEach((card,i) => {
    const dot = document.createElement('button');
    dot.type = 'button'; dot.className = 'dot';
    dot.setAttribute('aria-label', `Go to card ${i+1}`);
    dot.addEventListener('click',()=>go(i));
    dots.appendChild(dot);
  });
  function go(index){
    const target = Math.max(0,Math.min(cards.length-1,index));
    if(target === current)return;
    current = target;
    cards.forEach((card,i)=>{
      card.dataset.pos = String(i-current);
      card.setAttribute('aria-hidden',i===current?'false':'true');
      card.inert = i!==current;
      if(i < cards.length - 1) card.tabIndex = i===current ? 0 : -1;
    });
    [...dots.children].forEach((dot,i)=>{
      dot.classList.toggle('active',i===current);
      dot.setAttribute('aria-current',i===current?'step':'false');
    });
    prev.disabled=current===0;
    next.disabled=current===cards.length-1;
    progress.style.width=`${(current+1)/cards.length*100}%`;
  }
  cards.forEach((card,i)=>{card.inert=i!==0});
  [...dots.children][0].classList.add('active');
  dots.children[0].setAttribute('aria-current','step');
  prev.addEventListener('click',()=>go(current-1));
  next.addEventListener('click',()=>go(current+1));
  // Clicking the visible card moves to the next card. The final card uses its CTA.
  cards.forEach((card, index) => {
    if (index === cards.length - 1) return;
    card.setAttribute('role', 'button');
    card.setAttribute('tabindex', index === 0 ? '0' : '-1');
    card.addEventListener('click', event => {
      if (event.target.closest('a, button')) return;
      if (current === index) go(index + 1);
    });
    card.addEventListener('keydown', event => {
      if ((event.key === 'Enter' || event.key === ' ') && current === index) {
        event.preventDefault(); go(index + 1);
      }
    });
  });
  window.addEventListener('keydown',e=>{
    if(['ArrowDown','ArrowRight','PageDown',' '].includes(e.key)){e.preventDefault();go(current+1)}
    if(['ArrowUp','ArrowLeft','PageUp'].includes(e.key)){e.preventDefault();go(current-1)}
    if(e.key==='Home'){e.preventDefault();go(0)}
    if(e.key==='End'){e.preventDefault();go(cards.length-1)}
  });
})();
</script>
</body>
</html>