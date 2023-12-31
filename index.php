<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->
  <style>
    html {
    height: 100vh;
    overflow: hidden;
}
body {
    width: 100vw;
    height: 100vh;
    margin:0;
    background: #222;
    perspective: 1px;
    transform-style: preserve-3d;
    overflow-x: hidden;
    overflow-y: scroll;
}
.section1, .section2 {
    width:100%;
    min-height: 100vh;
    position: relative;
    transform-style: preserve-3d;
}
.section1::before {
    content:"";
    width:100%;
    height: 90%;
    position: absolute;
    background: url("Profile/abc.webp") top center;
    background-size: cover;
    transform: translateZ(-1px) scale(2.2);
    filter: blur(2px);
}
.section1::after {
    content:"";
    width:100%;
    height: 100%;
    position: absolute;
    background: url("Profile/abctrs.png") top center;
    background-size: cover;
} 
.section1 .text {
    top:10%;
    padding-top: 20px;
    transform: translateZ(-0.5px) scale(1.5,1.6) translate(-33%,10%);
}
.section2 {
    content:"";
    width:100%;
    height: 100%;
    position: relative;
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("Profile/topo.webp") top center;
    background-size: auto;
  }
.text {
    top:30%;
    left:50%;
    position: absolute;
    font-family: 'Franklin Gothic Heavy';
    font-size: 15vw;
    text-align: center;
    color:white;
    text-shadow: 2px 2px 5px rgba(0,0,0,0.3),
    5px 5px 70px rgba(255,255,255,0.5);
    transform: scale(1,1.1) translate(-50%, 10%);
}
.parallax {
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    width: 100%;
    height: 100%;
}
.intro {
    background-image: url(./Profile/topo1.webp)
}

.cta {
    display: flex;
    justify-content: center;
    align-items: center; 
    flex-direction: column; 
    padding-top: 50px;
}
.title {
    padding-top: 200px;
    font-size: 5vw;
    font-family: 'Franklin Gothic Heavy';
    background-image: url(./Profile/topo1.webp);
    background-size: cover;
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    filter: invert(100%);
}
.ui-btn {
  --btn-default-bg: rgb(41, 41, 41);
  --btn-padding: 15px 20px;
  --btn-hover-bg: rgb(51, 51, 51);
  --btn-transition: .3s;
  --btn-letter-spacing: .1rem;
  --btn-animation-duration: 1.2s;
  --btn-shadow-color: rgba(0, 0, 0, 0.137);
  --btn-shadow: 0 2px 10px 0 var(--btn-shadow-color);
  --hover-btn-color: #FAC921;
  --default-btn-color: #fff;
  --font-size: 16px;
  /* 👆 this field should not be empty */
  --font-weight: 600;
  --font-family: Menlo,Roboto Mono,monospace;
  /* 👆 this field should not be empty */
}

/* button settings 👆 */

.ui-btn {
  box-sizing: border-box;
  padding: var(--btn-padding);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--default-btn-color);
  font: var(--font-weight) var(--font-size) var(--font-family);
  background: var(--btn-default-bg);
  border: none;
  cursor: pointer;
  transition: var(--btn-transition);
  overflow: hidden;
  box-shadow: var(--btn-shadow);
}

.ui-btn span {
  letter-spacing: var(--btn-letter-spacing);
  transition: var(--btn-transition);
  box-sizing: border-box;
  position: relative;
  background: inherit;
}

.ui-btn span::before {
  box-sizing: border-box;
  position: absolute;
  content: "";
  background: inherit;
}

.ui-btn:hover, .ui-btn:focus {
  background: var(--btn-hover-bg);
}

.ui-btn:hover span, .ui-btn:focus span {
  color: var(--hover-btn-color);
}

.ui-btn:hover span::before, .ui-btn:focus span::before {
  animation: chitchat linear both var(--btn-animation-duration);
}

@keyframes chitchat {
  0% {
    content: "#";
  }

  5% {
    content: ".";
  }

  10% {
    content: "^{";
  }

  15% {
    content: "-!";
  }

  20% {
    content: "#$_";
  }

  25% {
    content: "№:0";
  }

  30% {
    content: "#{+.";
  }

  35% {
    content: "@}-?";
  }

  40% {
    content: "?{4@%";
  }

  45% {
    content: "=.,^!";
  }

  50% {
    content: "?2@%";
  }

  55% {
    content: "\;1}]";
  }

  60% {
    content: "?{%:%";
    right: 0;
  }

  65% {
    content: "|{f[4";
    right: 0;
  }

  70% {
    content: "{4%0%";
    right: 0;
  }

  75% {
    content: "'1_0<";
    right: 0;
  }

  80% {
    content: "{0%";
    right: 0;
  }

  85% {
    content: "]>'";
    right: 0;
  }

  90% {
    content: "4";
    right: 0;
  }

  95% {
    content: "2";
    right: 0;
  }

  100% {
    content: "";
    right: 0;
  }
}
  </style>
</head>
<body>
<div class="section1">
  <div class="text">HELLO</div>
</div>
<div class="section2">
    <div class="maps">
        
    </div>
</div>
<div class="parallax intro">
    <div class="cta">
        <div class="cta title"><b>LET'S GET STARTED</b></div>
        <div>
            <a href="./main/LNR/login.php" class="ui-btn">
                <span>
                  Click Here
                </span>
            </a>
        </div>
    </div>
</div>
</body>
</html>
