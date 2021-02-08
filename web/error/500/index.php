<?php session_start(); ?>

<html>
<head>
<title>404</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <style>
        body h1, p{
            text-align:center;
        }
        body {
            background: rgb(52,46,157);
background: linear-gradient(217deg, #212754 0%, #070c36 100%);
color: white;
height: 100%;
background-size: cover;
padding-top: 50px;
        }
        </style>
        <style> 
        .background {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  -o-object-fit: cover;
     object-fit: cover;
  width: 100%;
  opacity: 0;
  display: none;
  height: 100%;
 -webkit-mask-image: radial-gradient(white 0%, white 20%, transparent 90%, transparent);
          mask-image: radial-gradient(white 0%, white 20%, transparent 90%, transparent);
}

.circle-container {
  position: absolute;
  -webkit-transform: translateY(-10vh);
          transform: translateY(-10vh);
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
          animation-timing-function: linear;
}
.circle-container .circle {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  mix-blend-mode: screen;
  background-image: radial-gradient(#99ffff, #99ffff 10%, rgba(153, 255, 255, 0) 56%);
  -webkit-animation: fadein-frames 200ms infinite, scale-frames 2s infinite;
          animation: fadein-frames 200ms infinite, scale-frames 2s infinite;
}
.planet {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 1000px;
    height: 1000px;
    margin-left: -500px;
    margin-bottom: -500px;
    border-radius: 99999999px;
}
@-webkit-keyframes fade-frames {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0.7;
  }
  100% {
    opacity: 1;
  }
}
@keyframes fade-frames {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0.7;
  }
  100% {
    opacity: 1;
  }
}
@-webkit-keyframes scale-frames {
  0% {
    -webkit-transform: scale3d(0.4, 0.4, 1);
            transform: scale3d(0.4, 0.4, 1);
  }
  50% {
    -webkit-transform: scale3d(2.2, 2.2, 1);
            transform: scale3d(2.2, 2.2, 1);
  }
  100% {
    -webkit-transform: scale3d(0.4, 0.4, 1);
            transform: scale3d(0.4, 0.4, 1);
  }
}
@keyframes scale-frames {
  0% {
    -webkit-transform: scale3d(0.4, 0.4, 1);
            transform: scale3d(0.4, 0.4, 1);
  }
  50% {
    -webkit-transform: scale3d(2.2, 2.2, 1);
            transform: scale3d(2.2, 2.2, 1);
  }
  100% {
    -webkit-transform: scale3d(0.4, 0.4, 1);
            transform: scale3d(0.4, 0.4, 1);
  }
}
.circle-container:nth-child(1) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-1;
          animation-name: move-frames-1;
  -webkit-animation-duration: 35205ms;
          animation-duration: 35205ms;
  -webkit-animation-delay: 24021ms;
          animation-delay: 24021ms;
}
@-webkit-keyframes move-frames-1 {
  from {
    -webkit-transform: translate3d(61vw, 107vh, 0);
            transform: translate3d(61vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(94vw, -110vh, 0);
            transform: translate3d(94vw, -110vh, 0);
  }
}
@keyframes move-frames-1 {
  from {
    -webkit-transform: translate3d(61vw, 107vh, 0);
            transform: translate3d(61vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(94vw, -110vh, 0);
            transform: translate3d(94vw, -110vh, 0);
  }
}
.circle-container:nth-child(1) .circle {
  -webkit-animation-delay: 259ms;
          animation-delay: 259ms;
}
.circle-container:nth-child(2) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-2;
          animation-name: move-frames-2;
  -webkit-animation-duration: 31469ms;
          animation-duration: 31469ms;
  -webkit-animation-delay: 35618ms;
          animation-delay: 35618ms;
}
@-webkit-keyframes move-frames-2 {
  from {
    -webkit-transform: translate3d(85vw, 106vh, 0);
            transform: translate3d(85vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(37vw, -114vh, 0);
            transform: translate3d(37vw, -114vh, 0);
  }
}
@keyframes move-frames-2 {
  from {
    -webkit-transform: translate3d(85vw, 106vh, 0);
            transform: translate3d(85vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(37vw, -114vh, 0);
            transform: translate3d(37vw, -114vh, 0);
  }
}
.circle-container:nth-child(2) .circle {
  -webkit-animation-delay: 3778ms;
          animation-delay: 3778ms;
}
.circle-container:nth-child(3) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-3;
          animation-name: move-frames-3;
  -webkit-animation-duration: 31302ms;
          animation-duration: 31302ms;
  -webkit-animation-delay: 10020ms;
          animation-delay: 10020ms;
}
@-webkit-keyframes move-frames-3 {
  from {
    -webkit-transform: translate3d(5vw, 106vh, 0);
            transform: translate3d(5vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(15vw, -107vh, 0);
            transform: translate3d(15vw, -107vh, 0);
  }
}
@keyframes move-frames-3 {
  from {
    -webkit-transform: translate3d(5vw, 106vh, 0);
            transform: translate3d(5vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(15vw, -107vh, 0);
            transform: translate3d(15vw, -107vh, 0);
  }
}
.circle-container:nth-child(3) .circle {
  -webkit-animation-delay: 2229ms;
          animation-delay: 2229ms;
}
.circle-container:nth-child(4) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-4;
          animation-name: move-frames-4;
  -webkit-animation-duration: 30955ms;
          animation-duration: 30955ms;
  -webkit-animation-delay: 36906ms;
          animation-delay: 36906ms;
}
@-webkit-keyframes move-frames-4 {
  from {
    -webkit-transform: translate3d(34vw, 110vh, 0);
            transform: translate3d(34vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(1vw, -126vh, 0);
            transform: translate3d(1vw, -126vh, 0);
  }
}
@keyframes move-frames-4 {
  from {
    -webkit-transform: translate3d(34vw, 110vh, 0);
            transform: translate3d(34vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(1vw, -126vh, 0);
            transform: translate3d(1vw, -126vh, 0);
  }
}
.circle-container:nth-child(4) .circle {
  -webkit-animation-delay: 3504ms;
          animation-delay: 3504ms;
}
.circle-container:nth-child(5) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-5;
          animation-name: move-frames-5;
  -webkit-animation-duration: 35020ms;
          animation-duration: 35020ms;
  -webkit-animation-delay: 22356ms;
          animation-delay: 22356ms;
}
@-webkit-keyframes move-frames-5 {
  from {
    -webkit-transform: translate3d(34vw, 103vh, 0);
            transform: translate3d(34vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(90vw, -117vh, 0);
            transform: translate3d(90vw, -117vh, 0);
  }
}
@keyframes move-frames-5 {
  from {
    -webkit-transform: translate3d(34vw, 103vh, 0);
            transform: translate3d(34vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(90vw, -117vh, 0);
            transform: translate3d(90vw, -117vh, 0);
  }
}
.circle-container:nth-child(5) .circle {
  -webkit-animation-delay: 2163ms;
          animation-delay: 2163ms;
}
.circle-container:nth-child(6) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-6;
          animation-name: move-frames-6;
  -webkit-animation-duration: 29694ms;
          animation-duration: 29694ms;
  -webkit-animation-delay: 4541ms;
          animation-delay: 4541ms;
}
@-webkit-keyframes move-frames-6 {
  from {
    -webkit-transform: translate3d(9vw, 110vh, 0);
            transform: translate3d(9vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(7vw, -119vh, 0);
            transform: translate3d(7vw, -119vh, 0);
  }
}
@keyframes move-frames-6 {
  from {
    -webkit-transform: translate3d(9vw, 110vh, 0);
            transform: translate3d(9vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(7vw, -119vh, 0);
            transform: translate3d(7vw, -119vh, 0);
  }
}
.circle-container:nth-child(6) .circle {
  -webkit-animation-delay: 163ms;
          animation-delay: 163ms;
}
.circle-container:nth-child(7) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-7;
          animation-name: move-frames-7;
  -webkit-animation-duration: 34379ms;
          animation-duration: 34379ms;
  -webkit-animation-delay: 29850ms;
          animation-delay: 29850ms;
}
@-webkit-keyframes move-frames-7 {
  from {
    -webkit-transform: translate3d(42vw, 105vh, 0);
            transform: translate3d(42vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(62vw, -121vh, 0);
            transform: translate3d(62vw, -121vh, 0);
  }
}
@keyframes move-frames-7 {
  from {
    -webkit-transform: translate3d(42vw, 105vh, 0);
            transform: translate3d(42vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(62vw, -121vh, 0);
            transform: translate3d(62vw, -121vh, 0);
  }
}
.circle-container:nth-child(7) .circle {
  -webkit-animation-delay: 367ms;
          animation-delay: 367ms;
}
.circle-container:nth-child(8) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-8;
          animation-name: move-frames-8;
  -webkit-animation-duration: 32297ms;
          animation-duration: 32297ms;
  -webkit-animation-delay: 13777ms;
          animation-delay: 13777ms;
}
@-webkit-keyframes move-frames-8 {
  from {
    -webkit-transform: translate3d(28vw, 104vh, 0);
            transform: translate3d(28vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(3vw, -123vh, 0);
            transform: translate3d(3vw, -123vh, 0);
  }
}
@keyframes move-frames-8 {
  from {
    -webkit-transform: translate3d(28vw, 104vh, 0);
            transform: translate3d(28vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(3vw, -123vh, 0);
            transform: translate3d(3vw, -123vh, 0);
  }
}
.circle-container:nth-child(8) .circle {
  -webkit-animation-delay: 2131ms;
          animation-delay: 2131ms;
}
.circle-container:nth-child(9) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-9;
          animation-name: move-frames-9;
  -webkit-animation-duration: 34519ms;
          animation-duration: 34519ms;
  -webkit-animation-delay: 29812ms;
          animation-delay: 29812ms;
}
@-webkit-keyframes move-frames-9 {
  from {
    -webkit-transform: translate3d(16vw, 106vh, 0);
            transform: translate3d(16vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(55vw, -132vh, 0);
            transform: translate3d(55vw, -132vh, 0);
  }
}
@keyframes move-frames-9 {
  from {
    -webkit-transform: translate3d(16vw, 106vh, 0);
            transform: translate3d(16vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(55vw, -132vh, 0);
            transform: translate3d(55vw, -132vh, 0);
  }
}
.circle-container:nth-child(9) .circle {
  -webkit-animation-delay: 3007ms;
          animation-delay: 3007ms;
}
.circle-container:nth-child(10) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-10;
          animation-name: move-frames-10;
  -webkit-animation-duration: 33293ms;
          animation-duration: 33293ms;
  -webkit-animation-delay: 16365ms;
          animation-delay: 16365ms;
}
@-webkit-keyframes move-frames-10 {
  from {
    -webkit-transform: translate3d(100vw, 106vh, 0);
            transform: translate3d(100vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(31vw, -134vh, 0);
            transform: translate3d(31vw, -134vh, 0);
  }
}
@keyframes move-frames-10 {
  from {
    -webkit-transform: translate3d(100vw, 106vh, 0);
            transform: translate3d(100vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(31vw, -134vh, 0);
            transform: translate3d(31vw, -134vh, 0);
  }
}
.circle-container:nth-child(10) .circle {
  -webkit-animation-delay: 1466ms;
          animation-delay: 1466ms;
}
.circle-container:nth-child(11) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-11;
          animation-name: move-frames-11;
  -webkit-animation-duration: 28959ms;
          animation-duration: 28959ms;
  -webkit-animation-delay: 3882ms;
          animation-delay: 3882ms;
}
@-webkit-keyframes move-frames-11 {
  from {
    -webkit-transform: translate3d(8vw, 107vh, 0);
            transform: translate3d(8vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(11vw, -114vh, 0);
            transform: translate3d(11vw, -114vh, 0);
  }
}
@keyframes move-frames-11 {
  from {
    -webkit-transform: translate3d(8vw, 107vh, 0);
            transform: translate3d(8vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(11vw, -114vh, 0);
            transform: translate3d(11vw, -114vh, 0);
  }
}
.circle-container:nth-child(11) .circle {
  -webkit-animation-delay: 1084ms;
          animation-delay: 1084ms;
}
.circle-container:nth-child(12) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-12;
          animation-name: move-frames-12;
  -webkit-animation-duration: 32792ms;
          animation-duration: 32792ms;
  -webkit-animation-delay: 7526ms;
          animation-delay: 7526ms;
}
@-webkit-keyframes move-frames-12 {
  from {
    -webkit-transform: translate3d(20vw, 107vh, 0);
            transform: translate3d(20vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(55vw, -134vh, 0);
            transform: translate3d(55vw, -134vh, 0);
  }
}
@keyframes move-frames-12 {
  from {
    -webkit-transform: translate3d(20vw, 107vh, 0);
            transform: translate3d(20vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(55vw, -134vh, 0);
            transform: translate3d(55vw, -134vh, 0);
  }
}
.circle-container:nth-child(12) .circle {
  -webkit-animation-delay: 1903ms;
          animation-delay: 1903ms;
}
.circle-container:nth-child(13) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-13;
          animation-name: move-frames-13;
  -webkit-animation-duration: 32119ms;
          animation-duration: 32119ms;
  -webkit-animation-delay: 19886ms;
          animation-delay: 19886ms;
}
@-webkit-keyframes move-frames-13 {
  from {
    -webkit-transform: translate3d(79vw, 102vh, 0);
            transform: translate3d(79vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(29vw, -109vh, 0);
            transform: translate3d(29vw, -109vh, 0);
  }
}
@keyframes move-frames-13 {
  from {
    -webkit-transform: translate3d(79vw, 102vh, 0);
            transform: translate3d(79vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(29vw, -109vh, 0);
            transform: translate3d(29vw, -109vh, 0);
  }
}
.circle-container:nth-child(13) .circle {
  -webkit-animation-delay: 1761ms;
          animation-delay: 1761ms;
}
.circle-container:nth-child(14) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-14;
          animation-name: move-frames-14;
  -webkit-animation-duration: 30020ms;
          animation-duration: 30020ms;
  -webkit-animation-delay: 98ms;
          animation-delay: 98ms;
}
@-webkit-keyframes move-frames-14 {
  from {
    -webkit-transform: translate3d(73vw, 102vh, 0);
            transform: translate3d(73vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(72vw, -121vh, 0);
            transform: translate3d(72vw, -121vh, 0);
  }
}
@keyframes move-frames-14 {
  from {
    -webkit-transform: translate3d(73vw, 102vh, 0);
            transform: translate3d(73vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(72vw, -121vh, 0);
            transform: translate3d(72vw, -121vh, 0);
  }
}
.circle-container:nth-child(14) .circle {
  -webkit-animation-delay: 706ms;
          animation-delay: 706ms;
}
.circle-container:nth-child(15) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-15;
          animation-name: move-frames-15;
  -webkit-animation-duration: 29207ms;
          animation-duration: 29207ms;
  -webkit-animation-delay: 34989ms;
          animation-delay: 34989ms;
}
@-webkit-keyframes move-frames-15 {
  from {
    -webkit-transform: translate3d(31vw, 109vh, 0);
            transform: translate3d(31vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(77vw, -125vh, 0);
            transform: translate3d(77vw, -125vh, 0);
  }
}
@keyframes move-frames-15 {
  from {
    -webkit-transform: translate3d(31vw, 109vh, 0);
            transform: translate3d(31vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(77vw, -125vh, 0);
            transform: translate3d(77vw, -125vh, 0);
  }
}
.circle-container:nth-child(15) .circle {
  -webkit-animation-delay: 114ms;
          animation-delay: 114ms;
}
.circle-container:nth-child(16) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-16;
          animation-name: move-frames-16;
  -webkit-animation-duration: 34252ms;
          animation-duration: 34252ms;
  -webkit-animation-delay: 8467ms;
          animation-delay: 8467ms;
}
@-webkit-keyframes move-frames-16 {
  from {
    -webkit-transform: translate3d(83vw, 108vh, 0);
            transform: translate3d(83vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(26vw, -114vh, 0);
            transform: translate3d(26vw, -114vh, 0);
  }
}
@keyframes move-frames-16 {
  from {
    -webkit-transform: translate3d(83vw, 108vh, 0);
            transform: translate3d(83vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(26vw, -114vh, 0);
            transform: translate3d(26vw, -114vh, 0);
  }
}
.circle-container:nth-child(16) .circle {
  -webkit-animation-delay: 1436ms;
          animation-delay: 1436ms;
}
.circle-container:nth-child(17) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-17;
          animation-name: move-frames-17;
  -webkit-animation-duration: 34300ms;
          animation-duration: 34300ms;
  -webkit-animation-delay: 31756ms;
          animation-delay: 31756ms;
}
@-webkit-keyframes move-frames-17 {
  from {
    -webkit-transform: translate3d(66vw, 104vh, 0);
            transform: translate3d(66vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(78vw, -115vh, 0);
            transform: translate3d(78vw, -115vh, 0);
  }
}
@keyframes move-frames-17 {
  from {
    -webkit-transform: translate3d(66vw, 104vh, 0);
            transform: translate3d(66vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(78vw, -115vh, 0);
            transform: translate3d(78vw, -115vh, 0);
  }
}
.circle-container:nth-child(17) .circle {
  -webkit-animation-delay: 2346ms;
          animation-delay: 2346ms;
}
.circle-container:nth-child(18) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-18;
          animation-name: move-frames-18;
  -webkit-animation-duration: 35644ms;
          animation-duration: 35644ms;
  -webkit-animation-delay: 33365ms;
          animation-delay: 33365ms;
}
@-webkit-keyframes move-frames-18 {
  from {
    -webkit-transform: translate3d(62vw, 102vh, 0);
            transform: translate3d(62vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(5vw, -119vh, 0);
            transform: translate3d(5vw, -119vh, 0);
  }
}
@keyframes move-frames-18 {
  from {
    -webkit-transform: translate3d(62vw, 102vh, 0);
            transform: translate3d(62vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(5vw, -119vh, 0);
            transform: translate3d(5vw, -119vh, 0);
  }
}
.circle-container:nth-child(18) .circle {
  -webkit-animation-delay: 3463ms;
          animation-delay: 3463ms;
}
.circle-container:nth-child(19) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-19;
          animation-name: move-frames-19;
  -webkit-animation-duration: 35254ms;
          animation-duration: 35254ms;
  -webkit-animation-delay: 30214ms;
          animation-delay: 30214ms;
}
@-webkit-keyframes move-frames-19 {
  from {
    -webkit-transform: translate3d(49vw, 107vh, 0);
            transform: translate3d(49vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(50vw, -108vh, 0);
            transform: translate3d(50vw, -108vh, 0);
  }
}
@keyframes move-frames-19 {
  from {
    -webkit-transform: translate3d(49vw, 107vh, 0);
            transform: translate3d(49vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(50vw, -108vh, 0);
            transform: translate3d(50vw, -108vh, 0);
  }
}
.circle-container:nth-child(19) .circle {
  -webkit-animation-delay: 299ms;
          animation-delay: 299ms;
}
.circle-container:nth-child(20) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-20;
          animation-name: move-frames-20;
  -webkit-animation-duration: 29420ms;
          animation-duration: 29420ms;
  -webkit-animation-delay: 21958ms;
          animation-delay: 21958ms;
}
@-webkit-keyframes move-frames-20 {
  from {
    -webkit-transform: translate3d(4vw, 108vh, 0);
            transform: translate3d(4vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(17vw, -125vh, 0);
            transform: translate3d(17vw, -125vh, 0);
  }
}
@keyframes move-frames-20 {
  from {
    -webkit-transform: translate3d(4vw, 108vh, 0);
            transform: translate3d(4vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(17vw, -125vh, 0);
            transform: translate3d(17vw, -125vh, 0);
  }
}
.circle-container:nth-child(20) .circle {
  -webkit-animation-delay: 2886ms;
          animation-delay: 2886ms;
}
.circle-container:nth-child(21) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-21;
          animation-name: move-frames-21;
  -webkit-animation-duration: 32783ms;
          animation-duration: 32783ms;
  -webkit-animation-delay: 31952ms;
          animation-delay: 31952ms;
}
@-webkit-keyframes move-frames-21 {
  from {
    -webkit-transform: translate3d(35vw, 106vh, 0);
            transform: translate3d(35vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(100vw, -129vh, 0);
            transform: translate3d(100vw, -129vh, 0);
  }
}
@keyframes move-frames-21 {
  from {
    -webkit-transform: translate3d(35vw, 106vh, 0);
            transform: translate3d(35vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(100vw, -129vh, 0);
            transform: translate3d(100vw, -129vh, 0);
  }
}
.circle-container:nth-child(21) .circle {
  -webkit-animation-delay: 2233ms;
          animation-delay: 2233ms;
}
.circle-container:nth-child(22) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-22;
          animation-name: move-frames-22;
  -webkit-animation-duration: 36609ms;
          animation-duration: 36609ms;
  -webkit-animation-delay: 16449ms;
          animation-delay: 16449ms;
}
@-webkit-keyframes move-frames-22 {
  from {
    -webkit-transform: translate3d(84vw, 108vh, 0);
            transform: translate3d(84vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(38vw, -124vh, 0);
            transform: translate3d(38vw, -124vh, 0);
  }
}
@keyframes move-frames-22 {
  from {
    -webkit-transform: translate3d(84vw, 108vh, 0);
            transform: translate3d(84vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(38vw, -124vh, 0);
            transform: translate3d(38vw, -124vh, 0);
  }
}
.circle-container:nth-child(22) .circle {
  -webkit-animation-delay: 1762ms;
          animation-delay: 1762ms;
}
.circle-container:nth-child(23) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-23;
          animation-name: move-frames-23;
  -webkit-animation-duration: 31118ms;
          animation-duration: 31118ms;
  -webkit-animation-delay: 5593ms;
          animation-delay: 5593ms;
}
@-webkit-keyframes move-frames-23 {
  from {
    -webkit-transform: translate3d(9vw, 108vh, 0);
            transform: translate3d(9vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(37vw, -126vh, 0);
            transform: translate3d(37vw, -126vh, 0);
  }
}
@keyframes move-frames-23 {
  from {
    -webkit-transform: translate3d(9vw, 108vh, 0);
            transform: translate3d(9vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(37vw, -126vh, 0);
            transform: translate3d(37vw, -126vh, 0);
  }
}
.circle-container:nth-child(23) .circle {
  -webkit-animation-delay: 2749ms;
          animation-delay: 2749ms;
}
.circle-container:nth-child(24) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-24;
          animation-name: move-frames-24;
  -webkit-animation-duration: 35229ms;
          animation-duration: 35229ms;
  -webkit-animation-delay: 27730ms;
          animation-delay: 27730ms;
}
@-webkit-keyframes move-frames-24 {
  from {
    -webkit-transform: translate3d(18vw, 104vh, 0);
            transform: translate3d(18vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(41vw, -130vh, 0);
            transform: translate3d(41vw, -130vh, 0);
  }
}
@keyframes move-frames-24 {
  from {
    -webkit-transform: translate3d(18vw, 104vh, 0);
            transform: translate3d(18vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(41vw, -130vh, 0);
            transform: translate3d(41vw, -130vh, 0);
  }
}
.circle-container:nth-child(24) .circle {
  -webkit-animation-delay: 2346ms;
          animation-delay: 2346ms;
}
.circle-container:nth-child(25) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-25;
          animation-name: move-frames-25;
  -webkit-animation-duration: 33396ms;
          animation-duration: 33396ms;
  -webkit-animation-delay: 32094ms;
          animation-delay: 32094ms;
}
@-webkit-keyframes move-frames-25 {
  from {
    -webkit-transform: translate3d(48vw, 106vh, 0);
            transform: translate3d(48vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(21vw, -123vh, 0);
            transform: translate3d(21vw, -123vh, 0);
  }
}
@keyframes move-frames-25 {
  from {
    -webkit-transform: translate3d(48vw, 106vh, 0);
            transform: translate3d(48vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(21vw, -123vh, 0);
            transform: translate3d(21vw, -123vh, 0);
  }
}
.circle-container:nth-child(25) .circle {
  -webkit-animation-delay: 660ms;
          animation-delay: 660ms;
}
.circle-container:nth-child(26) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-26;
          animation-name: move-frames-26;
  -webkit-animation-duration: 32998ms;
          animation-duration: 32998ms;
  -webkit-animation-delay: 32021ms;
          animation-delay: 32021ms;
}
@-webkit-keyframes move-frames-26 {
  from {
    -webkit-transform: translate3d(51vw, 108vh, 0);
            transform: translate3d(51vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(19vw, -111vh, 0);
            transform: translate3d(19vw, -111vh, 0);
  }
}
@keyframes move-frames-26 {
  from {
    -webkit-transform: translate3d(51vw, 108vh, 0);
            transform: translate3d(51vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(19vw, -111vh, 0);
            transform: translate3d(19vw, -111vh, 0);
  }
}
.circle-container:nth-child(26) .circle {
  -webkit-animation-delay: 2007ms;
          animation-delay: 2007ms;
}
.circle-container:nth-child(27) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-27;
          animation-name: move-frames-27;
  -webkit-animation-duration: 31560ms;
          animation-duration: 31560ms;
  -webkit-animation-delay: 7118ms;
          animation-delay: 7118ms;
}
@-webkit-keyframes move-frames-27 {
  from {
    -webkit-transform: translate3d(41vw, 107vh, 0);
            transform: translate3d(41vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(90vw, -133vh, 0);
            transform: translate3d(90vw, -133vh, 0);
  }
}
@keyframes move-frames-27 {
  from {
    -webkit-transform: translate3d(41vw, 107vh, 0);
            transform: translate3d(41vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(90vw, -133vh, 0);
            transform: translate3d(90vw, -133vh, 0);
  }
}
.circle-container:nth-child(27) .circle {
  -webkit-animation-delay: 3477ms;
          animation-delay: 3477ms;
}
.circle-container:nth-child(28) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-28;
          animation-name: move-frames-28;
  -webkit-animation-duration: 30980ms;
          animation-duration: 30980ms;
  -webkit-animation-delay: 20052ms;
          animation-delay: 20052ms;
}
@-webkit-keyframes move-frames-28 {
  from {
    -webkit-transform: translate3d(79vw, 109vh, 0);
            transform: translate3d(79vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(75vw, -128vh, 0);
            transform: translate3d(75vw, -128vh, 0);
  }
}
@keyframes move-frames-28 {
  from {
    -webkit-transform: translate3d(79vw, 109vh, 0);
            transform: translate3d(79vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(75vw, -128vh, 0);
            transform: translate3d(75vw, -128vh, 0);
  }
}
.circle-container:nth-child(28) .circle {
  -webkit-animation-delay: 2008ms;
          animation-delay: 2008ms;
}
.circle-container:nth-child(29) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-29;
          animation-name: move-frames-29;
  -webkit-animation-duration: 28375ms;
          animation-duration: 28375ms;
  -webkit-animation-delay: 14573ms;
          animation-delay: 14573ms;
}
@-webkit-keyframes move-frames-29 {
  from {
    -webkit-transform: translate3d(8vw, 103vh, 0);
            transform: translate3d(8vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(55vw, -125vh, 0);
            transform: translate3d(55vw, -125vh, 0);
  }
}
@keyframes move-frames-29 {
  from {
    -webkit-transform: translate3d(8vw, 103vh, 0);
            transform: translate3d(8vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(55vw, -125vh, 0);
            transform: translate3d(55vw, -125vh, 0);
  }
}
.circle-container:nth-child(29) .circle {
  -webkit-animation-delay: 2793ms;
          animation-delay: 2793ms;
}
.circle-container:nth-child(30) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-30;
          animation-name: move-frames-30;
  -webkit-animation-duration: 29511ms;
          animation-duration: 29511ms;
  -webkit-animation-delay: 21109ms;
          animation-delay: 21109ms;
}
@-webkit-keyframes move-frames-30 {
  from {
    -webkit-transform: translate3d(54vw, 109vh, 0);
            transform: translate3d(54vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(90vw, -111vh, 0);
            transform: translate3d(90vw, -111vh, 0);
  }
}
@keyframes move-frames-30 {
  from {
    -webkit-transform: translate3d(54vw, 109vh, 0);
            transform: translate3d(54vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(90vw, -111vh, 0);
            transform: translate3d(90vw, -111vh, 0);
  }
}
.circle-container:nth-child(30) .circle {
  -webkit-animation-delay: 1926ms;
          animation-delay: 1926ms;
}
.circle-container:nth-child(31) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-31;
          animation-name: move-frames-31;
  -webkit-animation-duration: 35273ms;
          animation-duration: 35273ms;
  -webkit-animation-delay: 19061ms;
          animation-delay: 19061ms;
}
@-webkit-keyframes move-frames-31 {
  from {
    -webkit-transform: translate3d(25vw, 106vh, 0);
            transform: translate3d(25vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(29vw, -127vh, 0);
            transform: translate3d(29vw, -127vh, 0);
  }
}
@keyframes move-frames-31 {
  from {
    -webkit-transform: translate3d(25vw, 106vh, 0);
            transform: translate3d(25vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(29vw, -127vh, 0);
            transform: translate3d(29vw, -127vh, 0);
  }
}
.circle-container:nth-child(31) .circle {
  -webkit-animation-delay: 1756ms;
          animation-delay: 1756ms;
}
.circle-container:nth-child(32) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-32;
          animation-name: move-frames-32;
  -webkit-animation-duration: 29636ms;
          animation-duration: 29636ms;
  -webkit-animation-delay: 34649ms;
          animation-delay: 34649ms;
}
@-webkit-keyframes move-frames-32 {
  from {
    -webkit-transform: translate3d(20vw, 107vh, 0);
            transform: translate3d(20vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(8vw, -134vh, 0);
            transform: translate3d(8vw, -134vh, 0);
  }
}
@keyframes move-frames-32 {
  from {
    -webkit-transform: translate3d(20vw, 107vh, 0);
            transform: translate3d(20vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(8vw, -134vh, 0);
            transform: translate3d(8vw, -134vh, 0);
  }
}
.circle-container:nth-child(32) .circle {
  -webkit-animation-delay: 1328ms;
          animation-delay: 1328ms;
}
.circle-container:nth-child(33) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-33;
          animation-name: move-frames-33;
  -webkit-animation-duration: 28697ms;
          animation-duration: 28697ms;
  -webkit-animation-delay: 7867ms;
          animation-delay: 7867ms;
}
@-webkit-keyframes move-frames-33 {
  from {
    -webkit-transform: translate3d(9vw, 107vh, 0);
            transform: translate3d(9vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(67vw, -120vh, 0);
            transform: translate3d(67vw, -120vh, 0);
  }
}
@keyframes move-frames-33 {
  from {
    -webkit-transform: translate3d(9vw, 107vh, 0);
            transform: translate3d(9vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(67vw, -120vh, 0);
            transform: translate3d(67vw, -120vh, 0);
  }
}
.circle-container:nth-child(33) .circle {
  -webkit-animation-delay: 502ms;
          animation-delay: 502ms;
}
.circle-container:nth-child(34) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-34;
          animation-name: move-frames-34;
  -webkit-animation-duration: 30301ms;
          animation-duration: 30301ms;
  -webkit-animation-delay: 21735ms;
          animation-delay: 21735ms;
}
@-webkit-keyframes move-frames-34 {
  from {
    -webkit-transform: translate3d(6vw, 108vh, 0);
            transform: translate3d(6vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(43vw, -117vh, 0);
            transform: translate3d(43vw, -117vh, 0);
  }
}
@keyframes move-frames-34 {
  from {
    -webkit-transform: translate3d(6vw, 108vh, 0);
            transform: translate3d(6vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(43vw, -117vh, 0);
            transform: translate3d(43vw, -117vh, 0);
  }
}
.circle-container:nth-child(34) .circle {
  -webkit-animation-delay: 3808ms;
          animation-delay: 3808ms;
}
.circle-container:nth-child(35) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-35;
          animation-name: move-frames-35;
  -webkit-animation-duration: 28480ms;
          animation-duration: 28480ms;
  -webkit-animation-delay: 7807ms;
          animation-delay: 7807ms;
}
@-webkit-keyframes move-frames-35 {
  from {
    -webkit-transform: translate3d(32vw, 109vh, 0);
            transform: translate3d(32vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(79vw, -124vh, 0);
            transform: translate3d(79vw, -124vh, 0);
  }
}
@keyframes move-frames-35 {
  from {
    -webkit-transform: translate3d(32vw, 109vh, 0);
            transform: translate3d(32vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(79vw, -124vh, 0);
            transform: translate3d(79vw, -124vh, 0);
  }
}
.circle-container:nth-child(35) .circle {
  -webkit-animation-delay: 2200ms;
          animation-delay: 2200ms;
}
.circle-container:nth-child(36) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-36;
          animation-name: move-frames-36;
  -webkit-animation-duration: 35016ms;
          animation-duration: 35016ms;
  -webkit-animation-delay: 24121ms;
          animation-delay: 24121ms;
}
@-webkit-keyframes move-frames-36 {
  from {
    -webkit-transform: translate3d(56vw, 110vh, 0);
            transform: translate3d(56vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(71vw, -119vh, 0);
            transform: translate3d(71vw, -119vh, 0);
  }
}
@keyframes move-frames-36 {
  from {
    -webkit-transform: translate3d(56vw, 110vh, 0);
            transform: translate3d(56vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(71vw, -119vh, 0);
            transform: translate3d(71vw, -119vh, 0);
  }
}
.circle-container:nth-child(36) .circle {
  -webkit-animation-delay: 3009ms;
          animation-delay: 3009ms;
}
.circle-container:nth-child(37) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-37;
          animation-name: move-frames-37;
  -webkit-animation-duration: 30021ms;
          animation-duration: 30021ms;
  -webkit-animation-delay: 15228ms;
          animation-delay: 15228ms;
}
@-webkit-keyframes move-frames-37 {
  from {
    -webkit-transform: translate3d(39vw, 104vh, 0);
            transform: translate3d(39vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(59vw, -107vh, 0);
            transform: translate3d(59vw, -107vh, 0);
  }
}
@keyframes move-frames-37 {
  from {
    -webkit-transform: translate3d(39vw, 104vh, 0);
            transform: translate3d(39vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(59vw, -107vh, 0);
            transform: translate3d(59vw, -107vh, 0);
  }
}
.circle-container:nth-child(37) .circle {
  -webkit-animation-delay: 2142ms;
          animation-delay: 2142ms;
}
.circle-container:nth-child(38) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-38;
          animation-name: move-frames-38;
  -webkit-animation-duration: 32247ms;
          animation-duration: 32247ms;
  -webkit-animation-delay: 829ms;
          animation-delay: 829ms;
}
@-webkit-keyframes move-frames-38 {
  from {
    -webkit-transform: translate3d(67vw, 103vh, 0);
            transform: translate3d(67vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(21vw, -114vh, 0);
            transform: translate3d(21vw, -114vh, 0);
  }
}
@keyframes move-frames-38 {
  from {
    -webkit-transform: translate3d(67vw, 103vh, 0);
            transform: translate3d(67vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(21vw, -114vh, 0);
            transform: translate3d(21vw, -114vh, 0);
  }
}
.circle-container:nth-child(38) .circle {
  -webkit-animation-delay: 1425ms;
          animation-delay: 1425ms;
}
.circle-container:nth-child(39) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-39;
          animation-name: move-frames-39;
  -webkit-animation-duration: 34905ms;
          animation-duration: 34905ms;
  -webkit-animation-delay: 11723ms;
          animation-delay: 11723ms;
}
@-webkit-keyframes move-frames-39 {
  from {
    -webkit-transform: translate3d(26vw, 102vh, 0);
            transform: translate3d(26vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(59vw, -104vh, 0);
            transform: translate3d(59vw, -104vh, 0);
  }
}
@keyframes move-frames-39 {
  from {
    -webkit-transform: translate3d(26vw, 102vh, 0);
            transform: translate3d(26vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(59vw, -104vh, 0);
            transform: translate3d(59vw, -104vh, 0);
  }
}
.circle-container:nth-child(39) .circle {
  -webkit-animation-delay: 959ms;
          animation-delay: 959ms;
}
.circle-container:nth-child(40) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-40;
          animation-name: move-frames-40;
  -webkit-animation-duration: 31812ms;
          animation-duration: 31812ms;
  -webkit-animation-delay: 19020ms;
          animation-delay: 19020ms;
}
@-webkit-keyframes move-frames-40 {
  from {
    -webkit-transform: translate3d(50vw, 107vh, 0);
            transform: translate3d(50vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(85vw, -127vh, 0);
            transform: translate3d(85vw, -127vh, 0);
  }
}
@keyframes move-frames-40 {
  from {
    -webkit-transform: translate3d(50vw, 107vh, 0);
            transform: translate3d(50vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(85vw, -127vh, 0);
            transform: translate3d(85vw, -127vh, 0);
  }
}
.circle-container:nth-child(40) .circle {
  -webkit-animation-delay: 2656ms;
          animation-delay: 2656ms;
}
.circle-container:nth-child(41) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-41;
          animation-name: move-frames-41;
  -webkit-animation-duration: 31085ms;
          animation-duration: 31085ms;
  -webkit-animation-delay: 996ms;
          animation-delay: 996ms;
}
@-webkit-keyframes move-frames-41 {
  from {
    -webkit-transform: translate3d(59vw, 110vh, 0);
            transform: translate3d(59vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(1vw, -121vh, 0);
            transform: translate3d(1vw, -121vh, 0);
  }
}
@keyframes move-frames-41 {
  from {
    -webkit-transform: translate3d(59vw, 110vh, 0);
            transform: translate3d(59vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(1vw, -121vh, 0);
            transform: translate3d(1vw, -121vh, 0);
  }
}
.circle-container:nth-child(41) .circle {
  -webkit-animation-delay: 3505ms;
          animation-delay: 3505ms;
}
.circle-container:nth-child(42) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-42;
          animation-name: move-frames-42;
  -webkit-animation-duration: 32716ms;
          animation-duration: 32716ms;
  -webkit-animation-delay: 14717ms;
          animation-delay: 14717ms;
}
@-webkit-keyframes move-frames-42 {
  from {
    -webkit-transform: translate3d(16vw, 106vh, 0);
            transform: translate3d(16vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(87vw, -134vh, 0);
            transform: translate3d(87vw, -134vh, 0);
  }
}
@keyframes move-frames-42 {
  from {
    -webkit-transform: translate3d(16vw, 106vh, 0);
            transform: translate3d(16vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(87vw, -134vh, 0);
            transform: translate3d(87vw, -134vh, 0);
  }
}
.circle-container:nth-child(42) .circle {
  -webkit-animation-delay: 1258ms;
          animation-delay: 1258ms;
}
.circle-container:nth-child(43) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-43;
          animation-name: move-frames-43;
  -webkit-animation-duration: 35094ms;
          animation-duration: 35094ms;
  -webkit-animation-delay: 26991ms;
          animation-delay: 26991ms;
}
@-webkit-keyframes move-frames-43 {
  from {
    -webkit-transform: translate3d(37vw, 110vh, 0);
            transform: translate3d(37vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(28vw, -125vh, 0);
            transform: translate3d(28vw, -125vh, 0);
  }
}
@keyframes move-frames-43 {
  from {
    -webkit-transform: translate3d(37vw, 110vh, 0);
            transform: translate3d(37vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(28vw, -125vh, 0);
            transform: translate3d(28vw, -125vh, 0);
  }
}
.circle-container:nth-child(43) .circle {
  -webkit-animation-delay: 3526ms;
          animation-delay: 3526ms;
}
.circle-container:nth-child(44) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-44;
          animation-name: move-frames-44;
  -webkit-animation-duration: 34963ms;
          animation-duration: 34963ms;
  -webkit-animation-delay: 33776ms;
          animation-delay: 33776ms;
}
@-webkit-keyframes move-frames-44 {
  from {
    -webkit-transform: translate3d(18vw, 104vh, 0);
            transform: translate3d(18vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(76vw, -110vh, 0);
            transform: translate3d(76vw, -110vh, 0);
  }
}
@keyframes move-frames-44 {
  from {
    -webkit-transform: translate3d(18vw, 104vh, 0);
            transform: translate3d(18vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(76vw, -110vh, 0);
            transform: translate3d(76vw, -110vh, 0);
  }
}
.circle-container:nth-child(44) .circle {
  -webkit-animation-delay: 3515ms;
          animation-delay: 3515ms;
}
.circle-container:nth-child(45) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-45;
          animation-name: move-frames-45;
  -webkit-animation-duration: 33309ms;
          animation-duration: 33309ms;
  -webkit-animation-delay: 36242ms;
          animation-delay: 36242ms;
}
@-webkit-keyframes move-frames-45 {
  from {
    -webkit-transform: translate3d(61vw, 108vh, 0);
            transform: translate3d(61vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(81vw, -127vh, 0);
            transform: translate3d(81vw, -127vh, 0);
  }
}
@keyframes move-frames-45 {
  from {
    -webkit-transform: translate3d(61vw, 108vh, 0);
            transform: translate3d(61vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(81vw, -127vh, 0);
            transform: translate3d(81vw, -127vh, 0);
  }
}
.circle-container:nth-child(45) .circle {
  -webkit-animation-delay: 2653ms;
          animation-delay: 2653ms;
}
.circle-container:nth-child(46) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-46;
          animation-name: move-frames-46;
  -webkit-animation-duration: 35340ms;
          animation-duration: 35340ms;
  -webkit-animation-delay: 34745ms;
          animation-delay: 34745ms;
}
@-webkit-keyframes move-frames-46 {
  from {
    -webkit-transform: translate3d(74vw, 103vh, 0);
            transform: translate3d(74vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(36vw, -108vh, 0);
            transform: translate3d(36vw, -108vh, 0);
  }
}
@keyframes move-frames-46 {
  from {
    -webkit-transform: translate3d(74vw, 103vh, 0);
            transform: translate3d(74vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(36vw, -108vh, 0);
            transform: translate3d(36vw, -108vh, 0);
  }
}
.circle-container:nth-child(46) .circle {
  -webkit-animation-delay: 1186ms;
          animation-delay: 1186ms;
}
.circle-container:nth-child(47) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-47;
          animation-name: move-frames-47;
  -webkit-animation-duration: 29668ms;
          animation-duration: 29668ms;
  -webkit-animation-delay: 8928ms;
          animation-delay: 8928ms;
}
@-webkit-keyframes move-frames-47 {
  from {
    -webkit-transform: translate3d(73vw, 103vh, 0);
            transform: translate3d(73vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(33vw, -129vh, 0);
            transform: translate3d(33vw, -129vh, 0);
  }
}
@keyframes move-frames-47 {
  from {
    -webkit-transform: translate3d(73vw, 103vh, 0);
            transform: translate3d(73vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(33vw, -129vh, 0);
            transform: translate3d(33vw, -129vh, 0);
  }
}
.circle-container:nth-child(47) .circle {
  -webkit-animation-delay: 3951ms;
          animation-delay: 3951ms;
}
.circle-container:nth-child(48) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-48;
          animation-name: move-frames-48;
  -webkit-animation-duration: 34669ms;
          animation-duration: 34669ms;
  -webkit-animation-delay: 29336ms;
          animation-delay: 29336ms;
}
@-webkit-keyframes move-frames-48 {
  from {
    -webkit-transform: translate3d(81vw, 109vh, 0);
            transform: translate3d(81vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(12vw, -116vh, 0);
            transform: translate3d(12vw, -116vh, 0);
  }
}
@keyframes move-frames-48 {
  from {
    -webkit-transform: translate3d(81vw, 109vh, 0);
            transform: translate3d(81vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(12vw, -116vh, 0);
            transform: translate3d(12vw, -116vh, 0);
  }
}
.circle-container:nth-child(48) .circle {
  -webkit-animation-delay: 3089ms;
          animation-delay: 3089ms;
}
.circle-container:nth-child(49) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-49;
          animation-name: move-frames-49;
  -webkit-animation-duration: 33737ms;
          animation-duration: 33737ms;
  -webkit-animation-delay: 18215ms;
          animation-delay: 18215ms;
}
@-webkit-keyframes move-frames-49 {
  from {
    -webkit-transform: translate3d(80vw, 101vh, 0);
            transform: translate3d(80vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(54vw, -116vh, 0);
            transform: translate3d(54vw, -116vh, 0);
  }
}
@keyframes move-frames-49 {
  from {
    -webkit-transform: translate3d(80vw, 101vh, 0);
            transform: translate3d(80vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(54vw, -116vh, 0);
            transform: translate3d(54vw, -116vh, 0);
  }
}
.circle-container:nth-child(49) .circle {
  -webkit-animation-delay: 333ms;
          animation-delay: 333ms;
}
.circle-container:nth-child(50) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-50;
          animation-name: move-frames-50;
  -webkit-animation-duration: 34886ms;
          animation-duration: 34886ms;
  -webkit-animation-delay: 10103ms;
          animation-delay: 10103ms;
}
@-webkit-keyframes move-frames-50 {
  from {
    -webkit-transform: translate3d(22vw, 109vh, 0);
            transform: translate3d(22vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(65vw, -112vh, 0);
            transform: translate3d(65vw, -112vh, 0);
  }
}
@keyframes move-frames-50 {
  from {
    -webkit-transform: translate3d(22vw, 109vh, 0);
            transform: translate3d(22vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(65vw, -112vh, 0);
            transform: translate3d(65vw, -112vh, 0);
  }
}
.circle-container:nth-child(50) .circle {
  -webkit-animation-delay: 638ms;
          animation-delay: 638ms;
}
.circle-container:nth-child(51) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-51;
          animation-name: move-frames-51;
  -webkit-animation-duration: 35923ms;
          animation-duration: 35923ms;
  -webkit-animation-delay: 22307ms;
          animation-delay: 22307ms;
}
@-webkit-keyframes move-frames-51 {
  from {
    -webkit-transform: translate3d(91vw, 109vh, 0);
            transform: translate3d(91vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(69vw, -123vh, 0);
            transform: translate3d(69vw, -123vh, 0);
  }
}
@keyframes move-frames-51 {
  from {
    -webkit-transform: translate3d(91vw, 109vh, 0);
            transform: translate3d(91vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(69vw, -123vh, 0);
            transform: translate3d(69vw, -123vh, 0);
  }
}
.circle-container:nth-child(51) .circle {
  -webkit-animation-delay: 234ms;
          animation-delay: 234ms;
}
.circle-container:nth-child(52) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-52;
          animation-name: move-frames-52;
  -webkit-animation-duration: 35255ms;
          animation-duration: 35255ms;
  -webkit-animation-delay: 19746ms;
          animation-delay: 19746ms;
}
@-webkit-keyframes move-frames-52 {
  from {
    -webkit-transform: translate3d(18vw, 110vh, 0);
            transform: translate3d(18vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(15vw, -124vh, 0);
            transform: translate3d(15vw, -124vh, 0);
  }
}
@keyframes move-frames-52 {
  from {
    -webkit-transform: translate3d(18vw, 110vh, 0);
            transform: translate3d(18vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(15vw, -124vh, 0);
            transform: translate3d(15vw, -124vh, 0);
  }
}
.circle-container:nth-child(52) .circle {
  -webkit-animation-delay: 2504ms;
          animation-delay: 2504ms;
}
.circle-container:nth-child(53) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-53;
          animation-name: move-frames-53;
  -webkit-animation-duration: 30787ms;
          animation-duration: 30787ms;
  -webkit-animation-delay: 18037ms;
          animation-delay: 18037ms;
}
@-webkit-keyframes move-frames-53 {
  from {
    -webkit-transform: translate3d(44vw, 107vh, 0);
            transform: translate3d(44vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(47vw, -113vh, 0);
            transform: translate3d(47vw, -113vh, 0);
  }
}
@keyframes move-frames-53 {
  from {
    -webkit-transform: translate3d(44vw, 107vh, 0);
            transform: translate3d(44vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(47vw, -113vh, 0);
            transform: translate3d(47vw, -113vh, 0);
  }
}
.circle-container:nth-child(53) .circle {
  -webkit-animation-delay: 1157ms;
          animation-delay: 1157ms;
}
.circle-container:nth-child(54) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-54;
          animation-name: move-frames-54;
  -webkit-animation-duration: 35654ms;
          animation-duration: 35654ms;
  -webkit-animation-delay: 7863ms;
          animation-delay: 7863ms;
}
@-webkit-keyframes move-frames-54 {
  from {
    -webkit-transform: translate3d(65vw, 107vh, 0);
            transform: translate3d(65vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(79vw, -111vh, 0);
            transform: translate3d(79vw, -111vh, 0);
  }
}
@keyframes move-frames-54 {
  from {
    -webkit-transform: translate3d(65vw, 107vh, 0);
            transform: translate3d(65vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(79vw, -111vh, 0);
            transform: translate3d(79vw, -111vh, 0);
  }
}
.circle-container:nth-child(54) .circle {
  -webkit-animation-delay: 3497ms;
          animation-delay: 3497ms;
}
.circle-container:nth-child(55) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-55;
          animation-name: move-frames-55;
  -webkit-animation-duration: 32129ms;
          animation-duration: 32129ms;
  -webkit-animation-delay: 13352ms;
          animation-delay: 13352ms;
}
@-webkit-keyframes move-frames-55 {
  from {
    -webkit-transform: translate3d(85vw, 103vh, 0);
            transform: translate3d(85vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -128vh, 0);
            transform: translate3d(52vw, -128vh, 0);
  }
}
@keyframes move-frames-55 {
  from {
    -webkit-transform: translate3d(85vw, 103vh, 0);
            transform: translate3d(85vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -128vh, 0);
            transform: translate3d(52vw, -128vh, 0);
  }
}
.circle-container:nth-child(55) .circle {
  -webkit-animation-delay: 1827ms;
          animation-delay: 1827ms;
}
.circle-container:nth-child(56) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-56;
          animation-name: move-frames-56;
  -webkit-animation-duration: 32676ms;
          animation-duration: 32676ms;
  -webkit-animation-delay: 34405ms;
          animation-delay: 34405ms;
}
@-webkit-keyframes move-frames-56 {
  from {
    -webkit-transform: translate3d(61vw, 109vh, 0);
            transform: translate3d(61vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(59vw, -115vh, 0);
            transform: translate3d(59vw, -115vh, 0);
  }
}
@keyframes move-frames-56 {
  from {
    -webkit-transform: translate3d(61vw, 109vh, 0);
            transform: translate3d(61vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(59vw, -115vh, 0);
            transform: translate3d(59vw, -115vh, 0);
  }
}
.circle-container:nth-child(56) .circle {
  -webkit-animation-delay: 2855ms;
          animation-delay: 2855ms;
}
.circle-container:nth-child(57) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-57;
          animation-name: move-frames-57;
  -webkit-animation-duration: 30627ms;
          animation-duration: 30627ms;
  -webkit-animation-delay: 9366ms;
          animation-delay: 9366ms;
}
@-webkit-keyframes move-frames-57 {
  from {
    -webkit-transform: translate3d(92vw, 102vh, 0);
            transform: translate3d(92vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(23vw, -114vh, 0);
            transform: translate3d(23vw, -114vh, 0);
  }
}
@keyframes move-frames-57 {
  from {
    -webkit-transform: translate3d(92vw, 102vh, 0);
            transform: translate3d(92vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(23vw, -114vh, 0);
            transform: translate3d(23vw, -114vh, 0);
  }
}
.circle-container:nth-child(57) .circle {
  -webkit-animation-delay: 2854ms;
          animation-delay: 2854ms;
}
.circle-container:nth-child(58) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-58;
          animation-name: move-frames-58;
  -webkit-animation-duration: 36851ms;
          animation-duration: 36851ms;
  -webkit-animation-delay: 23979ms;
          animation-delay: 23979ms;
}
@-webkit-keyframes move-frames-58 {
  from {
    -webkit-transform: translate3d(73vw, 107vh, 0);
            transform: translate3d(73vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(81vw, -111vh, 0);
            transform: translate3d(81vw, -111vh, 0);
  }
}
@keyframes move-frames-58 {
  from {
    -webkit-transform: translate3d(73vw, 107vh, 0);
            transform: translate3d(73vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(81vw, -111vh, 0);
            transform: translate3d(81vw, -111vh, 0);
  }
}
.circle-container:nth-child(58) .circle {
  -webkit-animation-delay: 1769ms;
          animation-delay: 1769ms;
}
.circle-container:nth-child(59) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-59;
          animation-name: move-frames-59;
  -webkit-animation-duration: 28261ms;
          animation-duration: 28261ms;
  -webkit-animation-delay: 2801ms;
          animation-delay: 2801ms;
}
@-webkit-keyframes move-frames-59 {
  from {
    -webkit-transform: translate3d(62vw, 110vh, 0);
            transform: translate3d(62vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(78vw, -138vh, 0);
            transform: translate3d(78vw, -138vh, 0);
  }
}
@keyframes move-frames-59 {
  from {
    -webkit-transform: translate3d(62vw, 110vh, 0);
            transform: translate3d(62vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(78vw, -138vh, 0);
            transform: translate3d(78vw, -138vh, 0);
  }
}
.circle-container:nth-child(59) .circle {
  -webkit-animation-delay: 2549ms;
          animation-delay: 2549ms;
}
.circle-container:nth-child(60) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-60;
          animation-name: move-frames-60;
  -webkit-animation-duration: 30850ms;
          animation-duration: 30850ms;
  -webkit-animation-delay: 19883ms;
          animation-delay: 19883ms;
}
@-webkit-keyframes move-frames-60 {
  from {
    -webkit-transform: translate3d(2vw, 107vh, 0);
            transform: translate3d(2vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(34vw, -136vh, 0);
            transform: translate3d(34vw, -136vh, 0);
  }
}
@keyframes move-frames-60 {
  from {
    -webkit-transform: translate3d(2vw, 107vh, 0);
            transform: translate3d(2vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(34vw, -136vh, 0);
            transform: translate3d(34vw, -136vh, 0);
  }
}
.circle-container:nth-child(60) .circle {
  -webkit-animation-delay: 1237ms;
          animation-delay: 1237ms;
}
.circle-container:nth-child(61) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-61;
          animation-name: move-frames-61;
  -webkit-animation-duration: 32591ms;
          animation-duration: 32591ms;
  -webkit-animation-delay: 16910ms;
          animation-delay: 16910ms;
}
@-webkit-keyframes move-frames-61 {
  from {
    -webkit-transform: translate3d(82vw, 102vh, 0);
            transform: translate3d(82vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(32vw, -115vh, 0);
            transform: translate3d(32vw, -115vh, 0);
  }
}
@keyframes move-frames-61 {
  from {
    -webkit-transform: translate3d(82vw, 102vh, 0);
            transform: translate3d(82vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(32vw, -115vh, 0);
            transform: translate3d(32vw, -115vh, 0);
  }
}
.circle-container:nth-child(61) .circle {
  -webkit-animation-delay: 1594ms;
          animation-delay: 1594ms;
}
.circle-container:nth-child(62) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-62;
          animation-name: move-frames-62;
  -webkit-animation-duration: 34691ms;
          animation-duration: 34691ms;
  -webkit-animation-delay: 31784ms;
          animation-delay: 31784ms;
}
@-webkit-keyframes move-frames-62 {
  from {
    -webkit-transform: translate3d(67vw, 107vh, 0);
            transform: translate3d(67vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(64vw, -110vh, 0);
            transform: translate3d(64vw, -110vh, 0);
  }
}
@keyframes move-frames-62 {
  from {
    -webkit-transform: translate3d(67vw, 107vh, 0);
            transform: translate3d(67vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(64vw, -110vh, 0);
            transform: translate3d(64vw, -110vh, 0);
  }
}
.circle-container:nth-child(62) .circle {
  -webkit-animation-delay: 909ms;
          animation-delay: 909ms;
}
.circle-container:nth-child(63) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-63;
          animation-name: move-frames-63;
  -webkit-animation-duration: 35302ms;
          animation-duration: 35302ms;
  -webkit-animation-delay: 13717ms;
          animation-delay: 13717ms;
}
@-webkit-keyframes move-frames-63 {
  from {
    -webkit-transform: translate3d(43vw, 103vh, 0);
            transform: translate3d(43vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(79vw, -111vh, 0);
            transform: translate3d(79vw, -111vh, 0);
  }
}
@keyframes move-frames-63 {
  from {
    -webkit-transform: translate3d(43vw, 103vh, 0);
            transform: translate3d(43vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(79vw, -111vh, 0);
            transform: translate3d(79vw, -111vh, 0);
  }
}
.circle-container:nth-child(63) .circle {
  -webkit-animation-delay: 3239ms;
          animation-delay: 3239ms;
}
.circle-container:nth-child(64) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-64;
          animation-name: move-frames-64;
  -webkit-animation-duration: 29390ms;
          animation-duration: 29390ms;
  -webkit-animation-delay: 19320ms;
          animation-delay: 19320ms;
}
@-webkit-keyframes move-frames-64 {
  from {
    -webkit-transform: translate3d(86vw, 103vh, 0);
            transform: translate3d(86vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(71vw, -133vh, 0);
            transform: translate3d(71vw, -133vh, 0);
  }
}
@keyframes move-frames-64 {
  from {
    -webkit-transform: translate3d(86vw, 103vh, 0);
            transform: translate3d(86vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(71vw, -133vh, 0);
            transform: translate3d(71vw, -133vh, 0);
  }
}
.circle-container:nth-child(64) .circle {
  -webkit-animation-delay: 794ms;
          animation-delay: 794ms;
}
.circle-container:nth-child(65) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-65;
          animation-name: move-frames-65;
  -webkit-animation-duration: 33900ms;
          animation-duration: 33900ms;
  -webkit-animation-delay: 35577ms;
          animation-delay: 35577ms;
}
@-webkit-keyframes move-frames-65 {
  from {
    -webkit-transform: translate3d(63vw, 109vh, 0);
            transform: translate3d(63vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(33vw, -129vh, 0);
            transform: translate3d(33vw, -129vh, 0);
  }
}
@keyframes move-frames-65 {
  from {
    -webkit-transform: translate3d(63vw, 109vh, 0);
            transform: translate3d(63vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(33vw, -129vh, 0);
            transform: translate3d(33vw, -129vh, 0);
  }
}
.circle-container:nth-child(65) .circle {
  -webkit-animation-delay: 3413ms;
          animation-delay: 3413ms;
}
.circle-container:nth-child(66) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-66;
          animation-name: move-frames-66;
  -webkit-animation-duration: 30541ms;
          animation-duration: 30541ms;
  -webkit-animation-delay: 24714ms;
          animation-delay: 24714ms;
}
@-webkit-keyframes move-frames-66 {
  from {
    -webkit-transform: translate3d(27vw, 104vh, 0);
            transform: translate3d(27vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(23vw, -130vh, 0);
            transform: translate3d(23vw, -130vh, 0);
  }
}
@keyframes move-frames-66 {
  from {
    -webkit-transform: translate3d(27vw, 104vh, 0);
            transform: translate3d(27vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(23vw, -130vh, 0);
            transform: translate3d(23vw, -130vh, 0);
  }
}
.circle-container:nth-child(66) .circle {
  -webkit-animation-delay: 2ms;
          animation-delay: 2ms;
}
.circle-container:nth-child(67) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-67;
          animation-name: move-frames-67;
  -webkit-animation-duration: 36521ms;
          animation-duration: 36521ms;
  -webkit-animation-delay: 7513ms;
          animation-delay: 7513ms;
}
@-webkit-keyframes move-frames-67 {
  from {
    -webkit-transform: translate3d(83vw, 101vh, 0);
            transform: translate3d(83vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(17vw, -104vh, 0);
            transform: translate3d(17vw, -104vh, 0);
  }
}
@keyframes move-frames-67 {
  from {
    -webkit-transform: translate3d(83vw, 101vh, 0);
            transform: translate3d(83vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(17vw, -104vh, 0);
            transform: translate3d(17vw, -104vh, 0);
  }
}
.circle-container:nth-child(67) .circle {
  -webkit-animation-delay: 2768ms;
          animation-delay: 2768ms;
}
.circle-container:nth-child(68) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-68;
          animation-name: move-frames-68;
  -webkit-animation-duration: 33674ms;
          animation-duration: 33674ms;
  -webkit-animation-delay: 22201ms;
          animation-delay: 22201ms;
}
@-webkit-keyframes move-frames-68 {
  from {
    -webkit-transform: translate3d(50vw, 110vh, 0);
            transform: translate3d(50vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(31vw, -140vh, 0);
            transform: translate3d(31vw, -140vh, 0);
  }
}
@keyframes move-frames-68 {
  from {
    -webkit-transform: translate3d(50vw, 110vh, 0);
            transform: translate3d(50vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(31vw, -140vh, 0);
            transform: translate3d(31vw, -140vh, 0);
  }
}
.circle-container:nth-child(68) .circle {
  -webkit-animation-delay: 475ms;
          animation-delay: 475ms;
}
.circle-container:nth-child(69) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-69;
          animation-name: move-frames-69;
  -webkit-animation-duration: 31833ms;
          animation-duration: 31833ms;
  -webkit-animation-delay: 22312ms;
          animation-delay: 22312ms;
}
@-webkit-keyframes move-frames-69 {
  from {
    -webkit-transform: translate3d(31vw, 109vh, 0);
            transform: translate3d(31vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(79vw, -117vh, 0);
            transform: translate3d(79vw, -117vh, 0);
  }
}
@keyframes move-frames-69 {
  from {
    -webkit-transform: translate3d(31vw, 109vh, 0);
            transform: translate3d(31vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(79vw, -117vh, 0);
            transform: translate3d(79vw, -117vh, 0);
  }
}
.circle-container:nth-child(69) .circle {
  -webkit-animation-delay: 2359ms;
          animation-delay: 2359ms;
}
.circle-container:nth-child(70) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-70;
          animation-name: move-frames-70;
  -webkit-animation-duration: 35513ms;
          animation-duration: 35513ms;
  -webkit-animation-delay: 19360ms;
          animation-delay: 19360ms;
}
@-webkit-keyframes move-frames-70 {
  from {
    -webkit-transform: translate3d(99vw, 101vh, 0);
            transform: translate3d(99vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(61vw, -130vh, 0);
            transform: translate3d(61vw, -130vh, 0);
  }
}
@keyframes move-frames-70 {
  from {
    -webkit-transform: translate3d(99vw, 101vh, 0);
            transform: translate3d(99vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(61vw, -130vh, 0);
            transform: translate3d(61vw, -130vh, 0);
  }
}
.circle-container:nth-child(70) .circle {
  -webkit-animation-delay: 1956ms;
          animation-delay: 1956ms;
}
.circle-container:nth-child(71) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-71;
          animation-name: move-frames-71;
  -webkit-animation-duration: 30845ms;
          animation-duration: 30845ms;
  -webkit-animation-delay: 11286ms;
          animation-delay: 11286ms;
}
@-webkit-keyframes move-frames-71 {
  from {
    -webkit-transform: translate3d(3vw, 102vh, 0);
            transform: translate3d(3vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(78vw, -112vh, 0);
            transform: translate3d(78vw, -112vh, 0);
  }
}
@keyframes move-frames-71 {
  from {
    -webkit-transform: translate3d(3vw, 102vh, 0);
            transform: translate3d(3vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(78vw, -112vh, 0);
            transform: translate3d(78vw, -112vh, 0);
  }
}
.circle-container:nth-child(71) .circle {
  -webkit-animation-delay: 3646ms;
          animation-delay: 3646ms;
}
.circle-container:nth-child(72) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-72;
          animation-name: move-frames-72;
  -webkit-animation-duration: 32027ms;
          animation-duration: 32027ms;
  -webkit-animation-delay: 2111ms;
          animation-delay: 2111ms;
}
@-webkit-keyframes move-frames-72 {
  from {
    -webkit-transform: translate3d(23vw, 108vh, 0);
            transform: translate3d(23vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(19vw, -136vh, 0);
            transform: translate3d(19vw, -136vh, 0);
  }
}
@keyframes move-frames-72 {
  from {
    -webkit-transform: translate3d(23vw, 108vh, 0);
            transform: translate3d(23vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(19vw, -136vh, 0);
            transform: translate3d(19vw, -136vh, 0);
  }
}
.circle-container:nth-child(72) .circle {
  -webkit-animation-delay: 2790ms;
          animation-delay: 2790ms;
}
.circle-container:nth-child(73) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-73;
          animation-name: move-frames-73;
  -webkit-animation-duration: 31790ms;
          animation-duration: 31790ms;
  -webkit-animation-delay: 16070ms;
          animation-delay: 16070ms;
}
@-webkit-keyframes move-frames-73 {
  from {
    -webkit-transform: translate3d(17vw, 105vh, 0);
            transform: translate3d(17vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(99vw, -120vh, 0);
            transform: translate3d(99vw, -120vh, 0);
  }
}
@keyframes move-frames-73 {
  from {
    -webkit-transform: translate3d(17vw, 105vh, 0);
            transform: translate3d(17vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(99vw, -120vh, 0);
            transform: translate3d(99vw, -120vh, 0);
  }
}
.circle-container:nth-child(73) .circle {
  -webkit-animation-delay: 1098ms;
          animation-delay: 1098ms;
}
.circle-container:nth-child(74) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-74;
          animation-name: move-frames-74;
  -webkit-animation-duration: 34243ms;
          animation-duration: 34243ms;
  -webkit-animation-delay: 17417ms;
          animation-delay: 17417ms;
}
@-webkit-keyframes move-frames-74 {
  from {
    -webkit-transform: translate3d(3vw, 101vh, 0);
            transform: translate3d(3vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(17vw, -111vh, 0);
            transform: translate3d(17vw, -111vh, 0);
  }
}
@keyframes move-frames-74 {
  from {
    -webkit-transform: translate3d(3vw, 101vh, 0);
            transform: translate3d(3vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(17vw, -111vh, 0);
            transform: translate3d(17vw, -111vh, 0);
  }
}
.circle-container:nth-child(74) .circle {
  -webkit-animation-delay: 2634ms;
          animation-delay: 2634ms;
}
.circle-container:nth-child(75) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-75;
          animation-name: move-frames-75;
  -webkit-animation-duration: 28931ms;
          animation-duration: 28931ms;
  -webkit-animation-delay: 18913ms;
          animation-delay: 18913ms;
}
@-webkit-keyframes move-frames-75 {
  from {
    -webkit-transform: translate3d(47vw, 103vh, 0);
            transform: translate3d(47vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(31vw, -113vh, 0);
            transform: translate3d(31vw, -113vh, 0);
  }
}
@keyframes move-frames-75 {
  from {
    -webkit-transform: translate3d(47vw, 103vh, 0);
            transform: translate3d(47vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(31vw, -113vh, 0);
            transform: translate3d(31vw, -113vh, 0);
  }
}
.circle-container:nth-child(75) .circle {
  -webkit-animation-delay: 3578ms;
          animation-delay: 3578ms;
}
.circle-container:nth-child(76) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-76;
          animation-name: move-frames-76;
  -webkit-animation-duration: 31995ms;
          animation-duration: 31995ms;
  -webkit-animation-delay: 36574ms;
          animation-delay: 36574ms;
}
@-webkit-keyframes move-frames-76 {
  from {
    -webkit-transform: translate3d(61vw, 103vh, 0);
            transform: translate3d(61vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(69vw, -111vh, 0);
            transform: translate3d(69vw, -111vh, 0);
  }
}
@keyframes move-frames-76 {
  from {
    -webkit-transform: translate3d(61vw, 103vh, 0);
            transform: translate3d(61vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(69vw, -111vh, 0);
            transform: translate3d(69vw, -111vh, 0);
  }
}
.circle-container:nth-child(76) .circle {
  -webkit-animation-delay: 3995ms;
          animation-delay: 3995ms;
}
.circle-container:nth-child(77) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-77;
          animation-name: move-frames-77;
  -webkit-animation-duration: 36502ms;
          animation-duration: 36502ms;
  -webkit-animation-delay: 23403ms;
          animation-delay: 23403ms;
}
@-webkit-keyframes move-frames-77 {
  from {
    -webkit-transform: translate3d(40vw, 101vh, 0);
            transform: translate3d(40vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(71vw, -127vh, 0);
            transform: translate3d(71vw, -127vh, 0);
  }
}
@keyframes move-frames-77 {
  from {
    -webkit-transform: translate3d(40vw, 101vh, 0);
            transform: translate3d(40vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(71vw, -127vh, 0);
            transform: translate3d(71vw, -127vh, 0);
  }
}
.circle-container:nth-child(77) .circle {
  -webkit-animation-delay: 1047ms;
          animation-delay: 1047ms;
}
.circle-container:nth-child(78) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-78;
          animation-name: move-frames-78;
  -webkit-animation-duration: 35392ms;
          animation-duration: 35392ms;
  -webkit-animation-delay: 9470ms;
          animation-delay: 9470ms;
}
@-webkit-keyframes move-frames-78 {
  from {
    -webkit-transform: translate3d(74vw, 108vh, 0);
            transform: translate3d(74vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(53vw, -131vh, 0);
            transform: translate3d(53vw, -131vh, 0);
  }
}
@keyframes move-frames-78 {
  from {
    -webkit-transform: translate3d(74vw, 108vh, 0);
            transform: translate3d(74vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(53vw, -131vh, 0);
            transform: translate3d(53vw, -131vh, 0);
  }
}
.circle-container:nth-child(78) .circle {
  -webkit-animation-delay: 2002ms;
          animation-delay: 2002ms;
}
.circle-container:nth-child(79) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-79;
          animation-name: move-frames-79;
  -webkit-animation-duration: 31982ms;
          animation-duration: 31982ms;
  -webkit-animation-delay: 25186ms;
          animation-delay: 25186ms;
}
@-webkit-keyframes move-frames-79 {
  from {
    -webkit-transform: translate3d(67vw, 103vh, 0);
            transform: translate3d(67vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(46vw, -132vh, 0);
            transform: translate3d(46vw, -132vh, 0);
  }
}
@keyframes move-frames-79 {
  from {
    -webkit-transform: translate3d(67vw, 103vh, 0);
            transform: translate3d(67vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(46vw, -132vh, 0);
            transform: translate3d(46vw, -132vh, 0);
  }
}
.circle-container:nth-child(79) .circle {
  -webkit-animation-delay: 205ms;
          animation-delay: 205ms;
}
.circle-container:nth-child(80) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-80;
          animation-name: move-frames-80;
  -webkit-animation-duration: 36253ms;
          animation-duration: 36253ms;
  -webkit-animation-delay: 5278ms;
          animation-delay: 5278ms;
}
@-webkit-keyframes move-frames-80 {
  from {
    -webkit-transform: translate3d(38vw, 103vh, 0);
            transform: translate3d(38vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(37vw, -106vh, 0);
            transform: translate3d(37vw, -106vh, 0);
  }
}
@keyframes move-frames-80 {
  from {
    -webkit-transform: translate3d(38vw, 103vh, 0);
            transform: translate3d(38vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(37vw, -106vh, 0);
            transform: translate3d(37vw, -106vh, 0);
  }
}
.circle-container:nth-child(80) .circle {
  -webkit-animation-delay: 595ms;
          animation-delay: 595ms;
}
.circle-container:nth-child(81) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-81;
          animation-name: move-frames-81;
  -webkit-animation-duration: 30525ms;
          animation-duration: 30525ms;
  -webkit-animation-delay: 34310ms;
          animation-delay: 34310ms;
}
@-webkit-keyframes move-frames-81 {
  from {
    -webkit-transform: translate3d(91vw, 110vh, 0);
            transform: translate3d(91vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(95vw, -122vh, 0);
            transform: translate3d(95vw, -122vh, 0);
  }
}
@keyframes move-frames-81 {
  from {
    -webkit-transform: translate3d(91vw, 110vh, 0);
            transform: translate3d(91vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(95vw, -122vh, 0);
            transform: translate3d(95vw, -122vh, 0);
  }
}
.circle-container:nth-child(81) .circle {
  -webkit-animation-delay: 2842ms;
          animation-delay: 2842ms;
}
.circle-container:nth-child(82) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-82;
          animation-name: move-frames-82;
  -webkit-animation-duration: 30970ms;
          animation-duration: 30970ms;
  -webkit-animation-delay: 30410ms;
          animation-delay: 30410ms;
}
@-webkit-keyframes move-frames-82 {
  from {
    -webkit-transform: translate3d(66vw, 102vh, 0);
            transform: translate3d(66vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(10vw, -115vh, 0);
            transform: translate3d(10vw, -115vh, 0);
  }
}
@keyframes move-frames-82 {
  from {
    -webkit-transform: translate3d(66vw, 102vh, 0);
            transform: translate3d(66vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(10vw, -115vh, 0);
            transform: translate3d(10vw, -115vh, 0);
  }
}
.circle-container:nth-child(82) .circle {
  -webkit-animation-delay: 3717ms;
          animation-delay: 3717ms;
}
.circle-container:nth-child(83) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-83;
          animation-name: move-frames-83;
  -webkit-animation-duration: 35941ms;
          animation-duration: 35941ms;
  -webkit-animation-delay: 34364ms;
          animation-delay: 34364ms;
}
@-webkit-keyframes move-frames-83 {
  from {
    -webkit-transform: translate3d(59vw, 108vh, 0);
            transform: translate3d(59vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(42vw, -122vh, 0);
            transform: translate3d(42vw, -122vh, 0);
  }
}
@keyframes move-frames-83 {
  from {
    -webkit-transform: translate3d(59vw, 108vh, 0);
            transform: translate3d(59vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(42vw, -122vh, 0);
            transform: translate3d(42vw, -122vh, 0);
  }
}
.circle-container:nth-child(83) .circle {
  -webkit-animation-delay: 2018ms;
          animation-delay: 2018ms;
}
.circle-container:nth-child(84) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-84;
          animation-name: move-frames-84;
  -webkit-animation-duration: 34235ms;
          animation-duration: 34235ms;
  -webkit-animation-delay: 2095ms;
          animation-delay: 2095ms;
}
@-webkit-keyframes move-frames-84 {
  from {
    -webkit-transform: translate3d(97vw, 103vh, 0);
            transform: translate3d(97vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(32vw, -106vh, 0);
            transform: translate3d(32vw, -106vh, 0);
  }
}
@keyframes move-frames-84 {
  from {
    -webkit-transform: translate3d(97vw, 103vh, 0);
            transform: translate3d(97vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(32vw, -106vh, 0);
            transform: translate3d(32vw, -106vh, 0);
  }
}
.circle-container:nth-child(84) .circle {
  -webkit-animation-delay: 3141ms;
          animation-delay: 3141ms;
}
.circle-container:nth-child(85) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-85;
          animation-name: move-frames-85;
  -webkit-animation-duration: 33492ms;
          animation-duration: 33492ms;
  -webkit-animation-delay: 8163ms;
          animation-delay: 8163ms;
}
@-webkit-keyframes move-frames-85 {
  from {
    -webkit-transform: translate3d(86vw, 104vh, 0);
            transform: translate3d(86vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(68vw, -133vh, 0);
            transform: translate3d(68vw, -133vh, 0);
  }
}
@keyframes move-frames-85 {
  from {
    -webkit-transform: translate3d(86vw, 104vh, 0);
            transform: translate3d(86vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(68vw, -133vh, 0);
            transform: translate3d(68vw, -133vh, 0);
  }
}
.circle-container:nth-child(85) .circle {
  -webkit-animation-delay: 599ms;
          animation-delay: 599ms;
}
.circle-container:nth-child(86) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-86;
          animation-name: move-frames-86;
  -webkit-animation-duration: 35107ms;
          animation-duration: 35107ms;
  -webkit-animation-delay: 18809ms;
          animation-delay: 18809ms;
}
@-webkit-keyframes move-frames-86 {
  from {
    -webkit-transform: translate3d(3vw, 109vh, 0);
            transform: translate3d(3vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(91vw, -120vh, 0);
            transform: translate3d(91vw, -120vh, 0);
  }
}
@keyframes move-frames-86 {
  from {
    -webkit-transform: translate3d(3vw, 109vh, 0);
            transform: translate3d(3vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(91vw, -120vh, 0);
            transform: translate3d(91vw, -120vh, 0);
  }
}
.circle-container:nth-child(86) .circle {
  -webkit-animation-delay: 1723ms;
          animation-delay: 1723ms;
}
.circle-container:nth-child(87) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-87;
          animation-name: move-frames-87;
  -webkit-animation-duration: 33466ms;
          animation-duration: 33466ms;
  -webkit-animation-delay: 26179ms;
          animation-delay: 26179ms;
}
@-webkit-keyframes move-frames-87 {
  from {
    -webkit-transform: translate3d(70vw, 105vh, 0);
            transform: translate3d(70vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(57vw, -121vh, 0);
            transform: translate3d(57vw, -121vh, 0);
  }
}
@keyframes move-frames-87 {
  from {
    -webkit-transform: translate3d(70vw, 105vh, 0);
            transform: translate3d(70vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(57vw, -121vh, 0);
            transform: translate3d(57vw, -121vh, 0);
  }
}
.circle-container:nth-child(87) .circle {
  -webkit-animation-delay: 3323ms;
          animation-delay: 3323ms;
}
.circle-container:nth-child(88) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-88;
          animation-name: move-frames-88;
  -webkit-animation-duration: 30361ms;
          animation-duration: 30361ms;
  -webkit-animation-delay: 21451ms;
          animation-delay: 21451ms;
}
@-webkit-keyframes move-frames-88 {
  from {
    -webkit-transform: translate3d(48vw, 101vh, 0);
            transform: translate3d(48vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(32vw, -121vh, 0);
            transform: translate3d(32vw, -121vh, 0);
  }
}
@keyframes move-frames-88 {
  from {
    -webkit-transform: translate3d(48vw, 101vh, 0);
            transform: translate3d(48vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(32vw, -121vh, 0);
            transform: translate3d(32vw, -121vh, 0);
  }
}
.circle-container:nth-child(88) .circle {
  -webkit-animation-delay: 3960ms;
          animation-delay: 3960ms;
}
.circle-container:nth-child(89) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-89;
          animation-name: move-frames-89;
  -webkit-animation-duration: 34348ms;
          animation-duration: 34348ms;
  -webkit-animation-delay: 34774ms;
          animation-delay: 34774ms;
}
@-webkit-keyframes move-frames-89 {
  from {
    -webkit-transform: translate3d(1vw, 107vh, 0);
            transform: translate3d(1vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(70vw, -123vh, 0);
            transform: translate3d(70vw, -123vh, 0);
  }
}
@keyframes move-frames-89 {
  from {
    -webkit-transform: translate3d(1vw, 107vh, 0);
            transform: translate3d(1vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(70vw, -123vh, 0);
            transform: translate3d(70vw, -123vh, 0);
  }
}
.circle-container:nth-child(89) .circle {
  -webkit-animation-delay: 855ms;
          animation-delay: 855ms;
}
.circle-container:nth-child(90) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-90;
          animation-name: move-frames-90;
  -webkit-animation-duration: 32349ms;
          animation-duration: 32349ms;
  -webkit-animation-delay: 34290ms;
          animation-delay: 34290ms;
}
@-webkit-keyframes move-frames-90 {
  from {
    -webkit-transform: translate3d(53vw, 104vh, 0);
            transform: translate3d(53vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(43vw, -132vh, 0);
            transform: translate3d(43vw, -132vh, 0);
  }
}
@keyframes move-frames-90 {
  from {
    -webkit-transform: translate3d(53vw, 104vh, 0);
            transform: translate3d(53vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(43vw, -132vh, 0);
            transform: translate3d(43vw, -132vh, 0);
  }
}
.circle-container:nth-child(90) .circle {
  -webkit-animation-delay: 1194ms;
          animation-delay: 1194ms;
}
.circle-container:nth-child(91) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-91;
          animation-name: move-frames-91;
  -webkit-animation-duration: 33494ms;
          animation-duration: 33494ms;
  -webkit-animation-delay: 27921ms;
          animation-delay: 27921ms;
}
@-webkit-keyframes move-frames-91 {
  from {
    -webkit-transform: translate3d(64vw, 105vh, 0);
            transform: translate3d(64vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(24vw, -133vh, 0);
            transform: translate3d(24vw, -133vh, 0);
  }
}
@keyframes move-frames-91 {
  from {
    -webkit-transform: translate3d(64vw, 105vh, 0);
            transform: translate3d(64vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(24vw, -133vh, 0);
            transform: translate3d(24vw, -133vh, 0);
  }
}
.circle-container:nth-child(91) .circle {
  -webkit-animation-delay: 2955ms;
          animation-delay: 2955ms;
}
.circle-container:nth-child(92) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-92;
          animation-name: move-frames-92;
  -webkit-animation-duration: 31663ms;
          animation-duration: 31663ms;
  -webkit-animation-delay: 26032ms;
          animation-delay: 26032ms;
}
@-webkit-keyframes move-frames-92 {
  from {
    -webkit-transform: translate3d(66vw, 101vh, 0);
            transform: translate3d(66vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(36vw, -117vh, 0);
            transform: translate3d(36vw, -117vh, 0);
  }
}
@keyframes move-frames-92 {
  from {
    -webkit-transform: translate3d(66vw, 101vh, 0);
            transform: translate3d(66vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(36vw, -117vh, 0);
            transform: translate3d(36vw, -117vh, 0);
  }
}
.circle-container:nth-child(92) .circle {
  -webkit-animation-delay: 2470ms;
          animation-delay: 2470ms;
}
.circle-container:nth-child(93) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-93;
          animation-name: move-frames-93;
  -webkit-animation-duration: 30165ms;
          animation-duration: 30165ms;
  -webkit-animation-delay: 23900ms;
          animation-delay: 23900ms;
}
@-webkit-keyframes move-frames-93 {
  from {
    -webkit-transform: translate3d(66vw, 110vh, 0);
            transform: translate3d(66vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(8vw, -122vh, 0);
            transform: translate3d(8vw, -122vh, 0);
  }
}
@keyframes move-frames-93 {
  from {
    -webkit-transform: translate3d(66vw, 110vh, 0);
            transform: translate3d(66vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(8vw, -122vh, 0);
            transform: translate3d(8vw, -122vh, 0);
  }
}
.circle-container:nth-child(93) .circle {
  -webkit-animation-delay: 3559ms;
          animation-delay: 3559ms;
}
.circle-container:nth-child(94) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-94;
          animation-name: move-frames-94;
  -webkit-animation-duration: 36342ms;
          animation-duration: 36342ms;
  -webkit-animation-delay: 36957ms;
          animation-delay: 36957ms;
}
@-webkit-keyframes move-frames-94 {
  from {
    -webkit-transform: translate3d(63vw, 102vh, 0);
            transform: translate3d(63vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(18vw, -115vh, 0);
            transform: translate3d(18vw, -115vh, 0);
  }
}
@keyframes move-frames-94 {
  from {
    -webkit-transform: translate3d(63vw, 102vh, 0);
            transform: translate3d(63vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(18vw, -115vh, 0);
            transform: translate3d(18vw, -115vh, 0);
  }
}
.circle-container:nth-child(94) .circle {
  -webkit-animation-delay: 5ms;
          animation-delay: 5ms;
}
.circle-container:nth-child(95) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-95;
          animation-name: move-frames-95;
  -webkit-animation-duration: 32308ms;
          animation-duration: 32308ms;
  -webkit-animation-delay: 17658ms;
          animation-delay: 17658ms;
}
@-webkit-keyframes move-frames-95 {
  from {
    -webkit-transform: translate3d(72vw, 108vh, 0);
            transform: translate3d(72vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(62vw, -110vh, 0);
            transform: translate3d(62vw, -110vh, 0);
  }
}
@keyframes move-frames-95 {
  from {
    -webkit-transform: translate3d(72vw, 108vh, 0);
            transform: translate3d(72vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(62vw, -110vh, 0);
            transform: translate3d(62vw, -110vh, 0);
  }
}
.circle-container:nth-child(95) .circle {
  -webkit-animation-delay: 500ms;
          animation-delay: 500ms;
}
.circle-container:nth-child(96) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-96;
          animation-name: move-frames-96;
  -webkit-animation-duration: 30639ms;
          animation-duration: 30639ms;
  -webkit-animation-delay: 29916ms;
          animation-delay: 29916ms;
}
@-webkit-keyframes move-frames-96 {
  from {
    -webkit-transform: translate3d(84vw, 101vh, 0);
            transform: translate3d(84vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(96vw, -110vh, 0);
            transform: translate3d(96vw, -110vh, 0);
  }
}
@keyframes move-frames-96 {
  from {
    -webkit-transform: translate3d(84vw, 101vh, 0);
            transform: translate3d(84vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(96vw, -110vh, 0);
            transform: translate3d(96vw, -110vh, 0);
  }
}
.circle-container:nth-child(96) .circle {
  -webkit-animation-delay: 1043ms;
          animation-delay: 1043ms;
}
.circle-container:nth-child(97) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-97;
          animation-name: move-frames-97;
  -webkit-animation-duration: 30823ms;
          animation-duration: 30823ms;
  -webkit-animation-delay: 2043ms;
          animation-delay: 2043ms;
}
@-webkit-keyframes move-frames-97 {
  from {
    -webkit-transform: translate3d(22vw, 107vh, 0);
            transform: translate3d(22vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(47vw, -126vh, 0);
            transform: translate3d(47vw, -126vh, 0);
  }
}
@keyframes move-frames-97 {
  from {
    -webkit-transform: translate3d(22vw, 107vh, 0);
            transform: translate3d(22vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(47vw, -126vh, 0);
            transform: translate3d(47vw, -126vh, 0);
  }
}
.circle-container:nth-child(97) .circle {
  -webkit-animation-delay: 2596ms;
          animation-delay: 2596ms;
}
.circle-container:nth-child(98) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-98;
          animation-name: move-frames-98;
  -webkit-animation-duration: 31869ms;
          animation-duration: 31869ms;
  -webkit-animation-delay: 34943ms;
          animation-delay: 34943ms;
}
@-webkit-keyframes move-frames-98 {
  from {
    -webkit-transform: translate3d(11vw, 101vh, 0);
            transform: translate3d(11vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(14vw, -117vh, 0);
            transform: translate3d(14vw, -117vh, 0);
  }
}
@keyframes move-frames-98 {
  from {
    -webkit-transform: translate3d(11vw, 101vh, 0);
            transform: translate3d(11vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(14vw, -117vh, 0);
            transform: translate3d(14vw, -117vh, 0);
  }
}
.circle-container:nth-child(98) .circle {
  -webkit-animation-delay: 1739ms;
          animation-delay: 1739ms;
}
.circle-container:nth-child(99) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-99;
          animation-name: move-frames-99;
  -webkit-animation-duration: 29656ms;
          animation-duration: 29656ms;
  -webkit-animation-delay: 27282ms;
          animation-delay: 27282ms;
}
@-webkit-keyframes move-frames-99 {
  from {
    -webkit-transform: translate3d(56vw, 108vh, 0);
            transform: translate3d(56vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(21vw, -115vh, 0);
            transform: translate3d(21vw, -115vh, 0);
  }
}
@keyframes move-frames-99 {
  from {
    -webkit-transform: translate3d(56vw, 108vh, 0);
            transform: translate3d(56vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(21vw, -115vh, 0);
            transform: translate3d(21vw, -115vh, 0);
  }
}
.circle-container:nth-child(99) .circle {
  -webkit-animation-delay: 1253ms;
          animation-delay: 1253ms;
}
.circle-container:nth-child(100) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-100;
          animation-name: move-frames-100;
  -webkit-animation-duration: 33581ms;
          animation-duration: 33581ms;
  -webkit-animation-delay: 31524ms;
          animation-delay: 31524ms;
}
@-webkit-keyframes move-frames-100 {
  from {
    -webkit-transform: translate3d(6vw, 102vh, 0);
            transform: translate3d(6vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(42vw, -109vh, 0);
            transform: translate3d(42vw, -109vh, 0);
  }
}
@keyframes move-frames-100 {
  from {
    -webkit-transform: translate3d(6vw, 102vh, 0);
            transform: translate3d(6vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(42vw, -109vh, 0);
            transform: translate3d(42vw, -109vh, 0);
  }
}
.circle-container:nth-child(100) .circle {
  -webkit-animation-delay: 1325ms;
          animation-delay: 1325ms;
}
.circle-container:nth-child(101) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-101;
          animation-name: move-frames-101;
  -webkit-animation-duration: 29137ms;
          animation-duration: 29137ms;
  -webkit-animation-delay: 1758ms;
          animation-delay: 1758ms;
}
@-webkit-keyframes move-frames-101 {
  from {
    -webkit-transform: translate3d(57vw, 108vh, 0);
            transform: translate3d(57vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(82vw, -118vh, 0);
            transform: translate3d(82vw, -118vh, 0);
  }
}
@keyframes move-frames-101 {
  from {
    -webkit-transform: translate3d(57vw, 108vh, 0);
            transform: translate3d(57vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(82vw, -118vh, 0);
            transform: translate3d(82vw, -118vh, 0);
  }
}
.circle-container:nth-child(101) .circle {
  -webkit-animation-delay: 3022ms;
          animation-delay: 3022ms;
}
.circle-container:nth-child(102) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-102;
          animation-name: move-frames-102;
  -webkit-animation-duration: 28534ms;
          animation-duration: 28534ms;
  -webkit-animation-delay: 34379ms;
          animation-delay: 34379ms;
}
@-webkit-keyframes move-frames-102 {
  from {
    -webkit-transform: translate3d(83vw, 102vh, 0);
            transform: translate3d(83vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(38vw, -121vh, 0);
            transform: translate3d(38vw, -121vh, 0);
  }
}
@keyframes move-frames-102 {
  from {
    -webkit-transform: translate3d(83vw, 102vh, 0);
            transform: translate3d(83vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(38vw, -121vh, 0);
            transform: translate3d(38vw, -121vh, 0);
  }
}
.circle-container:nth-child(102) .circle {
  -webkit-animation-delay: 125ms;
          animation-delay: 125ms;
}
.circle-container:nth-child(103) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-103;
          animation-name: move-frames-103;
  -webkit-animation-duration: 36553ms;
          animation-duration: 36553ms;
  -webkit-animation-delay: 29674ms;
          animation-delay: 29674ms;
}
@-webkit-keyframes move-frames-103 {
  from {
    -webkit-transform: translate3d(77vw, 102vh, 0);
            transform: translate3d(77vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(46vw, -106vh, 0);
            transform: translate3d(46vw, -106vh, 0);
  }
}
@keyframes move-frames-103 {
  from {
    -webkit-transform: translate3d(77vw, 102vh, 0);
            transform: translate3d(77vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(46vw, -106vh, 0);
            transform: translate3d(46vw, -106vh, 0);
  }
}
.circle-container:nth-child(103) .circle {
  -webkit-animation-delay: 1183ms;
          animation-delay: 1183ms;
}
.circle-container:nth-child(104) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-104;
          animation-name: move-frames-104;
  -webkit-animation-duration: 30706ms;
          animation-duration: 30706ms;
  -webkit-animation-delay: 20132ms;
          animation-delay: 20132ms;
}
@-webkit-keyframes move-frames-104 {
  from {
    -webkit-transform: translate3d(56vw, 109vh, 0);
            transform: translate3d(56vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(92vw, -124vh, 0);
            transform: translate3d(92vw, -124vh, 0);
  }
}
@keyframes move-frames-104 {
  from {
    -webkit-transform: translate3d(56vw, 109vh, 0);
            transform: translate3d(56vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(92vw, -124vh, 0);
            transform: translate3d(92vw, -124vh, 0);
  }
}
.circle-container:nth-child(104) .circle {
  -webkit-animation-delay: 3653ms;
          animation-delay: 3653ms;
}
.circle-container:nth-child(105) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-105;
          animation-name: move-frames-105;
  -webkit-animation-duration: 29726ms;
          animation-duration: 29726ms;
  -webkit-animation-delay: 359ms;
          animation-delay: 359ms;
}
@-webkit-keyframes move-frames-105 {
  from {
    -webkit-transform: translate3d(67vw, 103vh, 0);
            transform: translate3d(67vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(98vw, -133vh, 0);
            transform: translate3d(98vw, -133vh, 0);
  }
}
@keyframes move-frames-105 {
  from {
    -webkit-transform: translate3d(67vw, 103vh, 0);
            transform: translate3d(67vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(98vw, -133vh, 0);
            transform: translate3d(98vw, -133vh, 0);
  }
}
.circle-container:nth-child(105) .circle {
  -webkit-animation-delay: 1477ms;
          animation-delay: 1477ms;
}
.circle-container:nth-child(106) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-106;
          animation-name: move-frames-106;
  -webkit-animation-duration: 36803ms;
          animation-duration: 36803ms;
  -webkit-animation-delay: 29853ms;
          animation-delay: 29853ms;
}
@-webkit-keyframes move-frames-106 {
  from {
    -webkit-transform: translate3d(53vw, 104vh, 0);
            transform: translate3d(53vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(76vw, -106vh, 0);
            transform: translate3d(76vw, -106vh, 0);
  }
}
@keyframes move-frames-106 {
  from {
    -webkit-transform: translate3d(53vw, 104vh, 0);
            transform: translate3d(53vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(76vw, -106vh, 0);
            transform: translate3d(76vw, -106vh, 0);
  }
}
.circle-container:nth-child(106) .circle {
  -webkit-animation-delay: 1736ms;
          animation-delay: 1736ms;
}
.circle-container:nth-child(107) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-107;
          animation-name: move-frames-107;
  -webkit-animation-duration: 28748ms;
          animation-duration: 28748ms;
  -webkit-animation-delay: 20424ms;
          animation-delay: 20424ms;
}
@-webkit-keyframes move-frames-107 {
  from {
    -webkit-transform: translate3d(53vw, 109vh, 0);
            transform: translate3d(53vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(27vw, -111vh, 0);
            transform: translate3d(27vw, -111vh, 0);
  }
}
@keyframes move-frames-107 {
  from {
    -webkit-transform: translate3d(53vw, 109vh, 0);
            transform: translate3d(53vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(27vw, -111vh, 0);
            transform: translate3d(27vw, -111vh, 0);
  }
}
.circle-container:nth-child(107) .circle {
  -webkit-animation-delay: 476ms;
          animation-delay: 476ms;
}
.circle-container:nth-child(108) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-108;
          animation-name: move-frames-108;
  -webkit-animation-duration: 33367ms;
          animation-duration: 33367ms;
  -webkit-animation-delay: 31361ms;
          animation-delay: 31361ms;
}
@-webkit-keyframes move-frames-108 {
  from {
    -webkit-transform: translate3d(45vw, 101vh, 0);
            transform: translate3d(45vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(63vw, -105vh, 0);
            transform: translate3d(63vw, -105vh, 0);
  }
}
@keyframes move-frames-108 {
  from {
    -webkit-transform: translate3d(45vw, 101vh, 0);
            transform: translate3d(45vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(63vw, -105vh, 0);
            transform: translate3d(63vw, -105vh, 0);
  }
}
.circle-container:nth-child(108) .circle {
  -webkit-animation-delay: 1759ms;
          animation-delay: 1759ms;
}
.circle-container:nth-child(109) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-109;
          animation-name: move-frames-109;
  -webkit-animation-duration: 35966ms;
          animation-duration: 35966ms;
  -webkit-animation-delay: 23161ms;
          animation-delay: 23161ms;
}
@-webkit-keyframes move-frames-109 {
  from {
    -webkit-transform: translate3d(6vw, 103vh, 0);
            transform: translate3d(6vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(18vw, -118vh, 0);
            transform: translate3d(18vw, -118vh, 0);
  }
}
@keyframes move-frames-109 {
  from {
    -webkit-transform: translate3d(6vw, 103vh, 0);
            transform: translate3d(6vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(18vw, -118vh, 0);
            transform: translate3d(18vw, -118vh, 0);
  }
}
.circle-container:nth-child(109) .circle {
  -webkit-animation-delay: 1243ms;
          animation-delay: 1243ms;
}
.circle-container:nth-child(110) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-110;
          animation-name: move-frames-110;
  -webkit-animation-duration: 34524ms;
          animation-duration: 34524ms;
  -webkit-animation-delay: 10452ms;
          animation-delay: 10452ms;
}
@-webkit-keyframes move-frames-110 {
  from {
    -webkit-transform: translate3d(45vw, 108vh, 0);
            transform: translate3d(45vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(65vw, -123vh, 0);
            transform: translate3d(65vw, -123vh, 0);
  }
}
@keyframes move-frames-110 {
  from {
    -webkit-transform: translate3d(45vw, 108vh, 0);
            transform: translate3d(45vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(65vw, -123vh, 0);
            transform: translate3d(65vw, -123vh, 0);
  }
}
.circle-container:nth-child(110) .circle {
  -webkit-animation-delay: 1488ms;
          animation-delay: 1488ms;
}
.circle-container:nth-child(111) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-111;
          animation-name: move-frames-111;
  -webkit-animation-duration: 31621ms;
          animation-duration: 31621ms;
  -webkit-animation-delay: 26144ms;
          animation-delay: 26144ms;
}
@-webkit-keyframes move-frames-111 {
  from {
    -webkit-transform: translate3d(42vw, 102vh, 0);
            transform: translate3d(42vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(66vw, -127vh, 0);
            transform: translate3d(66vw, -127vh, 0);
  }
}
@keyframes move-frames-111 {
  from {
    -webkit-transform: translate3d(42vw, 102vh, 0);
            transform: translate3d(42vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(66vw, -127vh, 0);
            transform: translate3d(66vw, -127vh, 0);
  }
}
.circle-container:nth-child(111) .circle {
  -webkit-animation-delay: 3182ms;
          animation-delay: 3182ms;
}
.circle-container:nth-child(112) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-112;
          animation-name: move-frames-112;
  -webkit-animation-duration: 34418ms;
          animation-duration: 34418ms;
  -webkit-animation-delay: 33954ms;
          animation-delay: 33954ms;
}
@-webkit-keyframes move-frames-112 {
  from {
    -webkit-transform: translate3d(56vw, 105vh, 0);
            transform: translate3d(56vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(5vw, -109vh, 0);
            transform: translate3d(5vw, -109vh, 0);
  }
}
@keyframes move-frames-112 {
  from {
    -webkit-transform: translate3d(56vw, 105vh, 0);
            transform: translate3d(56vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(5vw, -109vh, 0);
            transform: translate3d(5vw, -109vh, 0);
  }
}
.circle-container:nth-child(112) .circle {
  -webkit-animation-delay: 2624ms;
          animation-delay: 2624ms;
}
.circle-container:nth-child(113) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-113;
          animation-name: move-frames-113;
  -webkit-animation-duration: 28126ms;
          animation-duration: 28126ms;
  -webkit-animation-delay: 6263ms;
          animation-delay: 6263ms;
}
@-webkit-keyframes move-frames-113 {
  from {
    -webkit-transform: translate3d(53vw, 109vh, 0);
            transform: translate3d(53vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(4vw, -127vh, 0);
            transform: translate3d(4vw, -127vh, 0);
  }
}
@keyframes move-frames-113 {
  from {
    -webkit-transform: translate3d(53vw, 109vh, 0);
            transform: translate3d(53vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(4vw, -127vh, 0);
            transform: translate3d(4vw, -127vh, 0);
  }
}
.circle-container:nth-child(113) .circle {
  -webkit-animation-delay: 3660ms;
          animation-delay: 3660ms;
}
.circle-container:nth-child(114) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-114;
          animation-name: move-frames-114;
  -webkit-animation-duration: 33625ms;
          animation-duration: 33625ms;
  -webkit-animation-delay: 5850ms;
          animation-delay: 5850ms;
}
@-webkit-keyframes move-frames-114 {
  from {
    -webkit-transform: translate3d(89vw, 106vh, 0);
            transform: translate3d(89vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(11vw, -107vh, 0);
            transform: translate3d(11vw, -107vh, 0);
  }
}
@keyframes move-frames-114 {
  from {
    -webkit-transform: translate3d(89vw, 106vh, 0);
            transform: translate3d(89vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(11vw, -107vh, 0);
            transform: translate3d(11vw, -107vh, 0);
  }
}
.circle-container:nth-child(114) .circle {
  -webkit-animation-delay: 3781ms;
          animation-delay: 3781ms;
}
.circle-container:nth-child(115) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-115;
          animation-name: move-frames-115;
  -webkit-animation-duration: 32492ms;
          animation-duration: 32492ms;
  -webkit-animation-delay: 19106ms;
          animation-delay: 19106ms;
}
@-webkit-keyframes move-frames-115 {
  from {
    -webkit-transform: translate3d(98vw, 109vh, 0);
            transform: translate3d(98vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(24vw, -114vh, 0);
            transform: translate3d(24vw, -114vh, 0);
  }
}
@keyframes move-frames-115 {
  from {
    -webkit-transform: translate3d(98vw, 109vh, 0);
            transform: translate3d(98vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(24vw, -114vh, 0);
            transform: translate3d(24vw, -114vh, 0);
  }
}
.circle-container:nth-child(115) .circle {
  -webkit-animation-delay: 2458ms;
          animation-delay: 2458ms;
}
.circle-container:nth-child(116) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-116;
          animation-name: move-frames-116;
  -webkit-animation-duration: 36366ms;
          animation-duration: 36366ms;
  -webkit-animation-delay: 30532ms;
          animation-delay: 30532ms;
}
@-webkit-keyframes move-frames-116 {
  from {
    -webkit-transform: translate3d(45vw, 103vh, 0);
            transform: translate3d(45vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(34vw, -110vh, 0);
            transform: translate3d(34vw, -110vh, 0);
  }
}
@keyframes move-frames-116 {
  from {
    -webkit-transform: translate3d(45vw, 103vh, 0);
            transform: translate3d(45vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(34vw, -110vh, 0);
            transform: translate3d(34vw, -110vh, 0);
  }
}
.circle-container:nth-child(116) .circle {
  -webkit-animation-delay: 3203ms;
          animation-delay: 3203ms;
}
.circle-container:nth-child(117) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-117;
          animation-name: move-frames-117;
  -webkit-animation-duration: 30876ms;
          animation-duration: 30876ms;
  -webkit-animation-delay: 5561ms;
          animation-delay: 5561ms;
}
@-webkit-keyframes move-frames-117 {
  from {
    -webkit-transform: translate3d(25vw, 102vh, 0);
            transform: translate3d(25vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(44vw, -125vh, 0);
            transform: translate3d(44vw, -125vh, 0);
  }
}
@keyframes move-frames-117 {
  from {
    -webkit-transform: translate3d(25vw, 102vh, 0);
            transform: translate3d(25vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(44vw, -125vh, 0);
            transform: translate3d(44vw, -125vh, 0);
  }
}
.circle-container:nth-child(117) .circle {
  -webkit-animation-delay: 63ms;
          animation-delay: 63ms;
}
.circle-container:nth-child(118) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-118;
          animation-name: move-frames-118;
  -webkit-animation-duration: 31620ms;
          animation-duration: 31620ms;
  -webkit-animation-delay: 30863ms;
          animation-delay: 30863ms;
}
@-webkit-keyframes move-frames-118 {
  from {
    -webkit-transform: translate3d(5vw, 106vh, 0);
            transform: translate3d(5vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(5vw, -125vh, 0);
            transform: translate3d(5vw, -125vh, 0);
  }
}
@keyframes move-frames-118 {
  from {
    -webkit-transform: translate3d(5vw, 106vh, 0);
            transform: translate3d(5vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(5vw, -125vh, 0);
            transform: translate3d(5vw, -125vh, 0);
  }
}
.circle-container:nth-child(118) .circle {
  -webkit-animation-delay: 1568ms;
          animation-delay: 1568ms;
}
.circle-container:nth-child(119) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-119;
          animation-name: move-frames-119;
  -webkit-animation-duration: 28738ms;
          animation-duration: 28738ms;
  -webkit-animation-delay: 6139ms;
          animation-delay: 6139ms;
}
@-webkit-keyframes move-frames-119 {
  from {
    -webkit-transform: translate3d(20vw, 101vh, 0);
            transform: translate3d(20vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -102vh, 0);
            transform: translate3d(52vw, -102vh, 0);
  }
}
@keyframes move-frames-119 {
  from {
    -webkit-transform: translate3d(20vw, 101vh, 0);
            transform: translate3d(20vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -102vh, 0);
            transform: translate3d(52vw, -102vh, 0);
  }
}
.circle-container:nth-child(119) .circle {
  -webkit-animation-delay: 1383ms;
          animation-delay: 1383ms;
}
.circle-container:nth-child(120) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-120;
          animation-name: move-frames-120;
  -webkit-animation-duration: 29627ms;
          animation-duration: 29627ms;
  -webkit-animation-delay: 17417ms;
          animation-delay: 17417ms;
}
@-webkit-keyframes move-frames-120 {
  from {
    -webkit-transform: translate3d(76vw, 102vh, 0);
            transform: translate3d(76vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(84vw, -125vh, 0);
            transform: translate3d(84vw, -125vh, 0);
  }
}
@keyframes move-frames-120 {
  from {
    -webkit-transform: translate3d(76vw, 102vh, 0);
            transform: translate3d(76vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(84vw, -125vh, 0);
            transform: translate3d(84vw, -125vh, 0);
  }
}
.circle-container:nth-child(120) .circle {
  -webkit-animation-delay: 2866ms;
          animation-delay: 2866ms;
}
.circle-container:nth-child(121) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-121;
          animation-name: move-frames-121;
  -webkit-animation-duration: 29381ms;
          animation-duration: 29381ms;
  -webkit-animation-delay: 15816ms;
          animation-delay: 15816ms;
}
@-webkit-keyframes move-frames-121 {
  from {
    -webkit-transform: translate3d(93vw, 106vh, 0);
            transform: translate3d(93vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(18vw, -118vh, 0);
            transform: translate3d(18vw, -118vh, 0);
  }
}
@keyframes move-frames-121 {
  from {
    -webkit-transform: translate3d(93vw, 106vh, 0);
            transform: translate3d(93vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(18vw, -118vh, 0);
            transform: translate3d(18vw, -118vh, 0);
  }
}
.circle-container:nth-child(121) .circle {
  -webkit-animation-delay: 864ms;
          animation-delay: 864ms;
}
.circle-container:nth-child(122) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-122;
          animation-name: move-frames-122;
  -webkit-animation-duration: 33360ms;
          animation-duration: 33360ms;
  -webkit-animation-delay: 25839ms;
          animation-delay: 25839ms;
}
@-webkit-keyframes move-frames-122 {
  from {
    -webkit-transform: translate3d(47vw, 103vh, 0);
            transform: translate3d(47vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -128vh, 0);
            transform: translate3d(52vw, -128vh, 0);
  }
}
@keyframes move-frames-122 {
  from {
    -webkit-transform: translate3d(47vw, 103vh, 0);
            transform: translate3d(47vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -128vh, 0);
            transform: translate3d(52vw, -128vh, 0);
  }
}
.circle-container:nth-child(122) .circle {
  -webkit-animation-delay: 1304ms;
          animation-delay: 1304ms;
}
.circle-container:nth-child(123) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-123;
          animation-name: move-frames-123;
  -webkit-animation-duration: 32712ms;
          animation-duration: 32712ms;
  -webkit-animation-delay: 8243ms;
          animation-delay: 8243ms;
}
@-webkit-keyframes move-frames-123 {
  from {
    -webkit-transform: translate3d(45vw, 103vh, 0);
            transform: translate3d(45vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(49vw, -116vh, 0);
            transform: translate3d(49vw, -116vh, 0);
  }
}
@keyframes move-frames-123 {
  from {
    -webkit-transform: translate3d(45vw, 103vh, 0);
            transform: translate3d(45vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(49vw, -116vh, 0);
            transform: translate3d(49vw, -116vh, 0);
  }
}
.circle-container:nth-child(123) .circle {
  -webkit-animation-delay: 1415ms;
          animation-delay: 1415ms;
}
.circle-container:nth-child(124) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-124;
          animation-name: move-frames-124;
  -webkit-animation-duration: 33097ms;
          animation-duration: 33097ms;
  -webkit-animation-delay: 24830ms;
          animation-delay: 24830ms;
}
@-webkit-keyframes move-frames-124 {
  from {
    -webkit-transform: translate3d(60vw, 102vh, 0);
            transform: translate3d(60vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(42vw, -104vh, 0);
            transform: translate3d(42vw, -104vh, 0);
  }
}
@keyframes move-frames-124 {
  from {
    -webkit-transform: translate3d(60vw, 102vh, 0);
            transform: translate3d(60vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(42vw, -104vh, 0);
            transform: translate3d(42vw, -104vh, 0);
  }
}
.circle-container:nth-child(124) .circle {
  -webkit-animation-delay: 2449ms;
          animation-delay: 2449ms;
}
.circle-container:nth-child(125) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-125;
          animation-name: move-frames-125;
  -webkit-animation-duration: 33909ms;
          animation-duration: 33909ms;
  -webkit-animation-delay: 5568ms;
          animation-delay: 5568ms;
}
@-webkit-keyframes move-frames-125 {
  from {
    -webkit-transform: translate3d(79vw, 106vh, 0);
            transform: translate3d(79vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(95vw, -132vh, 0);
            transform: translate3d(95vw, -132vh, 0);
  }
}
@keyframes move-frames-125 {
  from {
    -webkit-transform: translate3d(79vw, 106vh, 0);
            transform: translate3d(79vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(95vw, -132vh, 0);
            transform: translate3d(95vw, -132vh, 0);
  }
}
.circle-container:nth-child(125) .circle {
  -webkit-animation-delay: 3269ms;
          animation-delay: 3269ms;
}
.circle-container:nth-child(126) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-126;
          animation-name: move-frames-126;
  -webkit-animation-duration: 30573ms;
          animation-duration: 30573ms;
  -webkit-animation-delay: 2393ms;
          animation-delay: 2393ms;
}
@-webkit-keyframes move-frames-126 {
  from {
    -webkit-transform: translate3d(41vw, 109vh, 0);
            transform: translate3d(41vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(32vw, -123vh, 0);
            transform: translate3d(32vw, -123vh, 0);
  }
}
@keyframes move-frames-126 {
  from {
    -webkit-transform: translate3d(41vw, 109vh, 0);
            transform: translate3d(41vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(32vw, -123vh, 0);
            transform: translate3d(32vw, -123vh, 0);
  }
}
.circle-container:nth-child(126) .circle {
  -webkit-animation-delay: 3531ms;
          animation-delay: 3531ms;
}
.circle-container:nth-child(127) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-127;
          animation-name: move-frames-127;
  -webkit-animation-duration: 29113ms;
          animation-duration: 29113ms;
  -webkit-animation-delay: 31504ms;
          animation-delay: 31504ms;
}
@-webkit-keyframes move-frames-127 {
  from {
    -webkit-transform: translate3d(86vw, 104vh, 0);
            transform: translate3d(86vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(2vw, -127vh, 0);
            transform: translate3d(2vw, -127vh, 0);
  }
}
@keyframes move-frames-127 {
  from {
    -webkit-transform: translate3d(86vw, 104vh, 0);
            transform: translate3d(86vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(2vw, -127vh, 0);
            transform: translate3d(2vw, -127vh, 0);
  }
}
.circle-container:nth-child(127) .circle {
  -webkit-animation-delay: 1651ms;
          animation-delay: 1651ms;
}
.circle-container:nth-child(128) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-128;
          animation-name: move-frames-128;
  -webkit-animation-duration: 32681ms;
          animation-duration: 32681ms;
  -webkit-animation-delay: 18850ms;
          animation-delay: 18850ms;
}
@-webkit-keyframes move-frames-128 {
  from {
    -webkit-transform: translate3d(44vw, 107vh, 0);
            transform: translate3d(44vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(75vw, -115vh, 0);
            transform: translate3d(75vw, -115vh, 0);
  }
}
@keyframes move-frames-128 {
  from {
    -webkit-transform: translate3d(44vw, 107vh, 0);
            transform: translate3d(44vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(75vw, -115vh, 0);
            transform: translate3d(75vw, -115vh, 0);
  }
}
.circle-container:nth-child(128) .circle {
  -webkit-animation-delay: 3451ms;
          animation-delay: 3451ms;
}
.circle-container:nth-child(129) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-129;
          animation-name: move-frames-129;
  -webkit-animation-duration: 29887ms;
          animation-duration: 29887ms;
  -webkit-animation-delay: 27653ms;
          animation-delay: 27653ms;
}
@-webkit-keyframes move-frames-129 {
  from {
    -webkit-transform: translate3d(8vw, 104vh, 0);
            transform: translate3d(8vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(80vw, -129vh, 0);
            transform: translate3d(80vw, -129vh, 0);
  }
}
@keyframes move-frames-129 {
  from {
    -webkit-transform: translate3d(8vw, 104vh, 0);
            transform: translate3d(8vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(80vw, -129vh, 0);
            transform: translate3d(80vw, -129vh, 0);
  }
}
.circle-container:nth-child(129) .circle {
  -webkit-animation-delay: 1140ms;
          animation-delay: 1140ms;
}
.circle-container:nth-child(130) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-130;
          animation-name: move-frames-130;
  -webkit-animation-duration: 35733ms;
          animation-duration: 35733ms;
  -webkit-animation-delay: 36628ms;
          animation-delay: 36628ms;
}
@-webkit-keyframes move-frames-130 {
  from {
    -webkit-transform: translate3d(32vw, 106vh, 0);
            transform: translate3d(32vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(42vw, -134vh, 0);
            transform: translate3d(42vw, -134vh, 0);
  }
}
@keyframes move-frames-130 {
  from {
    -webkit-transform: translate3d(32vw, 106vh, 0);
            transform: translate3d(32vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(42vw, -134vh, 0);
            transform: translate3d(42vw, -134vh, 0);
  }
}
.circle-container:nth-child(130) .circle {
  -webkit-animation-delay: 1337ms;
          animation-delay: 1337ms;
}
.circle-container:nth-child(131) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-131;
          animation-name: move-frames-131;
  -webkit-animation-duration: 34137ms;
          animation-duration: 34137ms;
  -webkit-animation-delay: 1112ms;
          animation-delay: 1112ms;
}
@-webkit-keyframes move-frames-131 {
  from {
    -webkit-transform: translate3d(2vw, 106vh, 0);
            transform: translate3d(2vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -134vh, 0);
            transform: translate3d(52vw, -134vh, 0);
  }
}
@keyframes move-frames-131 {
  from {
    -webkit-transform: translate3d(2vw, 106vh, 0);
            transform: translate3d(2vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -134vh, 0);
            transform: translate3d(52vw, -134vh, 0);
  }
}
.circle-container:nth-child(131) .circle {
  -webkit-animation-delay: 1574ms;
          animation-delay: 1574ms;
}
.circle-container:nth-child(132) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-132;
          animation-name: move-frames-132;
  -webkit-animation-duration: 32775ms;
          animation-duration: 32775ms;
  -webkit-animation-delay: 19339ms;
          animation-delay: 19339ms;
}
@-webkit-keyframes move-frames-132 {
  from {
    -webkit-transform: translate3d(18vw, 105vh, 0);
            transform: translate3d(18vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(17vw, -108vh, 0);
            transform: translate3d(17vw, -108vh, 0);
  }
}
@keyframes move-frames-132 {
  from {
    -webkit-transform: translate3d(18vw, 105vh, 0);
            transform: translate3d(18vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(17vw, -108vh, 0);
            transform: translate3d(17vw, -108vh, 0);
  }
}
.circle-container:nth-child(132) .circle {
  -webkit-animation-delay: 2984ms;
          animation-delay: 2984ms;
}
.circle-container:nth-child(133) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-133;
          animation-name: move-frames-133;
  -webkit-animation-duration: 34543ms;
          animation-duration: 34543ms;
  -webkit-animation-delay: 9276ms;
          animation-delay: 9276ms;
}
@-webkit-keyframes move-frames-133 {
  from {
    -webkit-transform: translate3d(22vw, 101vh, 0);
            transform: translate3d(22vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(81vw, -102vh, 0);
            transform: translate3d(81vw, -102vh, 0);
  }
}
@keyframes move-frames-133 {
  from {
    -webkit-transform: translate3d(22vw, 101vh, 0);
            transform: translate3d(22vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(81vw, -102vh, 0);
            transform: translate3d(81vw, -102vh, 0);
  }
}
.circle-container:nth-child(133) .circle {
  -webkit-animation-delay: 1354ms;
          animation-delay: 1354ms;
}
.circle-container:nth-child(134) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-134;
          animation-name: move-frames-134;
  -webkit-animation-duration: 30488ms;
          animation-duration: 30488ms;
  -webkit-animation-delay: 19529ms;
          animation-delay: 19529ms;
}
@-webkit-keyframes move-frames-134 {
  from {
    -webkit-transform: translate3d(39vw, 102vh, 0);
            transform: translate3d(39vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(73vw, -124vh, 0);
            transform: translate3d(73vw, -124vh, 0);
  }
}
@keyframes move-frames-134 {
  from {
    -webkit-transform: translate3d(39vw, 102vh, 0);
            transform: translate3d(39vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(73vw, -124vh, 0);
            transform: translate3d(73vw, -124vh, 0);
  }
}
.circle-container:nth-child(134) .circle {
  -webkit-animation-delay: 817ms;
          animation-delay: 817ms;
}
.circle-container:nth-child(135) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-135;
          animation-name: move-frames-135;
  -webkit-animation-duration: 28833ms;
          animation-duration: 28833ms;
  -webkit-animation-delay: 9164ms;
          animation-delay: 9164ms;
}
@-webkit-keyframes move-frames-135 {
  from {
    -webkit-transform: translate3d(71vw, 103vh, 0);
            transform: translate3d(71vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(86vw, -104vh, 0);
            transform: translate3d(86vw, -104vh, 0);
  }
}
@keyframes move-frames-135 {
  from {
    -webkit-transform: translate3d(71vw, 103vh, 0);
            transform: translate3d(71vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(86vw, -104vh, 0);
            transform: translate3d(86vw, -104vh, 0);
  }
}
.circle-container:nth-child(135) .circle {
  -webkit-animation-delay: 1028ms;
          animation-delay: 1028ms;
}
.circle-container:nth-child(136) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-136;
          animation-name: move-frames-136;
  -webkit-animation-duration: 33087ms;
          animation-duration: 33087ms;
  -webkit-animation-delay: 2040ms;
          animation-delay: 2040ms;
}
@-webkit-keyframes move-frames-136 {
  from {
    -webkit-transform: translate3d(26vw, 103vh, 0);
            transform: translate3d(26vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(88vw, -108vh, 0);
            transform: translate3d(88vw, -108vh, 0);
  }
}
@keyframes move-frames-136 {
  from {
    -webkit-transform: translate3d(26vw, 103vh, 0);
            transform: translate3d(26vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(88vw, -108vh, 0);
            transform: translate3d(88vw, -108vh, 0);
  }
}
.circle-container:nth-child(136) .circle {
  -webkit-animation-delay: 3585ms;
          animation-delay: 3585ms;
}
.circle-container:nth-child(137) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-137;
          animation-name: move-frames-137;
  -webkit-animation-duration: 31663ms;
          animation-duration: 31663ms;
  -webkit-animation-delay: 30833ms;
          animation-delay: 30833ms;
}
@-webkit-keyframes move-frames-137 {
  from {
    -webkit-transform: translate3d(91vw, 101vh, 0);
            transform: translate3d(91vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(65vw, -108vh, 0);
            transform: translate3d(65vw, -108vh, 0);
  }
}
@keyframes move-frames-137 {
  from {
    -webkit-transform: translate3d(91vw, 101vh, 0);
            transform: translate3d(91vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(65vw, -108vh, 0);
            transform: translate3d(65vw, -108vh, 0);
  }
}
.circle-container:nth-child(137) .circle {
  -webkit-animation-delay: 1008ms;
          animation-delay: 1008ms;
}
.circle-container:nth-child(138) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-138;
          animation-name: move-frames-138;
  -webkit-animation-duration: 33969ms;
          animation-duration: 33969ms;
  -webkit-animation-delay: 24589ms;
          animation-delay: 24589ms;
}
@-webkit-keyframes move-frames-138 {
  from {
    -webkit-transform: translate3d(6vw, 107vh, 0);
            transform: translate3d(6vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(62vw, -130vh, 0);
            transform: translate3d(62vw, -130vh, 0);
  }
}
@keyframes move-frames-138 {
  from {
    -webkit-transform: translate3d(6vw, 107vh, 0);
            transform: translate3d(6vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(62vw, -130vh, 0);
            transform: translate3d(62vw, -130vh, 0);
  }
}
.circle-container:nth-child(138) .circle {
  -webkit-animation-delay: 214ms;
          animation-delay: 214ms;
}
.circle-container:nth-child(139) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-139;
          animation-name: move-frames-139;
  -webkit-animation-duration: 34739ms;
          animation-duration: 34739ms;
  -webkit-animation-delay: 23896ms;
          animation-delay: 23896ms;
}
@-webkit-keyframes move-frames-139 {
  from {
    -webkit-transform: translate3d(43vw, 110vh, 0);
            transform: translate3d(43vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(100vw, -129vh, 0);
            transform: translate3d(100vw, -129vh, 0);
  }
}
@keyframes move-frames-139 {
  from {
    -webkit-transform: translate3d(43vw, 110vh, 0);
            transform: translate3d(43vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(100vw, -129vh, 0);
            transform: translate3d(100vw, -129vh, 0);
  }
}
.circle-container:nth-child(139) .circle {
  -webkit-animation-delay: 2164ms;
          animation-delay: 2164ms;
}
.circle-container:nth-child(140) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-140;
          animation-name: move-frames-140;
  -webkit-animation-duration: 35787ms;
          animation-duration: 35787ms;
  -webkit-animation-delay: 30658ms;
          animation-delay: 30658ms;
}
@-webkit-keyframes move-frames-140 {
  from {
    -webkit-transform: translate3d(91vw, 102vh, 0);
            transform: translate3d(91vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(57vw, -108vh, 0);
            transform: translate3d(57vw, -108vh, 0);
  }
}
@keyframes move-frames-140 {
  from {
    -webkit-transform: translate3d(91vw, 102vh, 0);
            transform: translate3d(91vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(57vw, -108vh, 0);
            transform: translate3d(57vw, -108vh, 0);
  }
}
.circle-container:nth-child(140) .circle {
  -webkit-animation-delay: 3699ms;
          animation-delay: 3699ms;
}
.circle-container:nth-child(141) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-141;
          animation-name: move-frames-141;
  -webkit-animation-duration: 34535ms;
          animation-duration: 34535ms;
  -webkit-animation-delay: 20492ms;
          animation-delay: 20492ms;
}
@-webkit-keyframes move-frames-141 {
  from {
    -webkit-transform: translate3d(24vw, 101vh, 0);
            transform: translate3d(24vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(60vw, -127vh, 0);
            transform: translate3d(60vw, -127vh, 0);
  }
}
@keyframes move-frames-141 {
  from {
    -webkit-transform: translate3d(24vw, 101vh, 0);
            transform: translate3d(24vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(60vw, -127vh, 0);
            transform: translate3d(60vw, -127vh, 0);
  }
}
.circle-container:nth-child(141) .circle {
  -webkit-animation-delay: 3610ms;
          animation-delay: 3610ms;
}
.circle-container:nth-child(142) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-142;
          animation-name: move-frames-142;
  -webkit-animation-duration: 31700ms;
          animation-duration: 31700ms;
  -webkit-animation-delay: 34914ms;
          animation-delay: 34914ms;
}
@-webkit-keyframes move-frames-142 {
  from {
    -webkit-transform: translate3d(64vw, 102vh, 0);
            transform: translate3d(64vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(31vw, -121vh, 0);
            transform: translate3d(31vw, -121vh, 0);
  }
}
@keyframes move-frames-142 {
  from {
    -webkit-transform: translate3d(64vw, 102vh, 0);
            transform: translate3d(64vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(31vw, -121vh, 0);
            transform: translate3d(31vw, -121vh, 0);
  }
}
.circle-container:nth-child(142) .circle {
  -webkit-animation-delay: 1147ms;
          animation-delay: 1147ms;
}
.circle-container:nth-child(143) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-143;
          animation-name: move-frames-143;
  -webkit-animation-duration: 32158ms;
          animation-duration: 32158ms;
  -webkit-animation-delay: 8791ms;
          animation-delay: 8791ms;
}
@-webkit-keyframes move-frames-143 {
  from {
    -webkit-transform: translate3d(75vw, 107vh, 0);
            transform: translate3d(75vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(96vw, -110vh, 0);
            transform: translate3d(96vw, -110vh, 0);
  }
}
@keyframes move-frames-143 {
  from {
    -webkit-transform: translate3d(75vw, 107vh, 0);
            transform: translate3d(75vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(96vw, -110vh, 0);
            transform: translate3d(96vw, -110vh, 0);
  }
}
.circle-container:nth-child(143) .circle {
  -webkit-animation-delay: 2719ms;
          animation-delay: 2719ms;
}
.circle-container:nth-child(144) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-144;
          animation-name: move-frames-144;
  -webkit-animation-duration: 31452ms;
          animation-duration: 31452ms;
  -webkit-animation-delay: 20968ms;
          animation-delay: 20968ms;
}
@-webkit-keyframes move-frames-144 {
  from {
    -webkit-transform: translate3d(35vw, 107vh, 0);
            transform: translate3d(35vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(11vw, -126vh, 0);
            transform: translate3d(11vw, -126vh, 0);
  }
}
@keyframes move-frames-144 {
  from {
    -webkit-transform: translate3d(35vw, 107vh, 0);
            transform: translate3d(35vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(11vw, -126vh, 0);
            transform: translate3d(11vw, -126vh, 0);
  }
}
.circle-container:nth-child(144) .circle {
  -webkit-animation-delay: 2857ms;
          animation-delay: 2857ms;
}
.circle-container:nth-child(145) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-145;
          animation-name: move-frames-145;
  -webkit-animation-duration: 30886ms;
          animation-duration: 30886ms;
  -webkit-animation-delay: 14025ms;
          animation-delay: 14025ms;
}
@-webkit-keyframes move-frames-145 {
  from {
    -webkit-transform: translate3d(74vw, 104vh, 0);
            transform: translate3d(74vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(85vw, -110vh, 0);
            transform: translate3d(85vw, -110vh, 0);
  }
}
@keyframes move-frames-145 {
  from {
    -webkit-transform: translate3d(74vw, 104vh, 0);
            transform: translate3d(74vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(85vw, -110vh, 0);
            transform: translate3d(85vw, -110vh, 0);
  }
}
.circle-container:nth-child(145) .circle {
  -webkit-animation-delay: 1459ms;
          animation-delay: 1459ms;
}
.circle-container:nth-child(146) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-146;
          animation-name: move-frames-146;
  -webkit-animation-duration: 28111ms;
          animation-duration: 28111ms;
  -webkit-animation-delay: 833ms;
          animation-delay: 833ms;
}
@-webkit-keyframes move-frames-146 {
  from {
    -webkit-transform: translate3d(94vw, 101vh, 0);
            transform: translate3d(94vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(98vw, -107vh, 0);
            transform: translate3d(98vw, -107vh, 0);
  }
}
@keyframes move-frames-146 {
  from {
    -webkit-transform: translate3d(94vw, 101vh, 0);
            transform: translate3d(94vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(98vw, -107vh, 0);
            transform: translate3d(98vw, -107vh, 0);
  }
}
.circle-container:nth-child(146) .circle {
  -webkit-animation-delay: 1404ms;
          animation-delay: 1404ms;
}
.circle-container:nth-child(147) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-147;
          animation-name: move-frames-147;
  -webkit-animation-duration: 29688ms;
          animation-duration: 29688ms;
  -webkit-animation-delay: 20061ms;
          animation-delay: 20061ms;
}
@-webkit-keyframes move-frames-147 {
  from {
    -webkit-transform: translate3d(57vw, 109vh, 0);
            transform: translate3d(57vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(79vw, -118vh, 0);
            transform: translate3d(79vw, -118vh, 0);
  }
}
@keyframes move-frames-147 {
  from {
    -webkit-transform: translate3d(57vw, 109vh, 0);
            transform: translate3d(57vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(79vw, -118vh, 0);
            transform: translate3d(79vw, -118vh, 0);
  }
}
.circle-container:nth-child(147) .circle {
  -webkit-animation-delay: 371ms;
          animation-delay: 371ms;
}
.circle-container:nth-child(148) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-148;
          animation-name: move-frames-148;
  -webkit-animation-duration: 28158ms;
          animation-duration: 28158ms;
  -webkit-animation-delay: 17442ms;
          animation-delay: 17442ms;
}
@-webkit-keyframes move-frames-148 {
  from {
    -webkit-transform: translate3d(1vw, 107vh, 0);
            transform: translate3d(1vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(50vw, -124vh, 0);
            transform: translate3d(50vw, -124vh, 0);
  }
}
@keyframes move-frames-148 {
  from {
    -webkit-transform: translate3d(1vw, 107vh, 0);
            transform: translate3d(1vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(50vw, -124vh, 0);
            transform: translate3d(50vw, -124vh, 0);
  }
}
.circle-container:nth-child(148) .circle {
  -webkit-animation-delay: 1926ms;
          animation-delay: 1926ms;
}
.circle-container:nth-child(149) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-149;
          animation-name: move-frames-149;
  -webkit-animation-duration: 30293ms;
          animation-duration: 30293ms;
  -webkit-animation-delay: 18354ms;
          animation-delay: 18354ms;
}
@-webkit-keyframes move-frames-149 {
  from {
    -webkit-transform: translate3d(90vw, 105vh, 0);
            transform: translate3d(90vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(65vw, -133vh, 0);
            transform: translate3d(65vw, -133vh, 0);
  }
}
@keyframes move-frames-149 {
  from {
    -webkit-transform: translate3d(90vw, 105vh, 0);
            transform: translate3d(90vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(65vw, -133vh, 0);
            transform: translate3d(65vw, -133vh, 0);
  }
}
.circle-container:nth-child(149) .circle {
  -webkit-animation-delay: 3949ms;
          animation-delay: 3949ms;
}
.circle-container:nth-child(150) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-150;
          animation-name: move-frames-150;
  -webkit-animation-duration: 35317ms;
          animation-duration: 35317ms;
  -webkit-animation-delay: 3081ms;
          animation-delay: 3081ms;
}
@-webkit-keyframes move-frames-150 {
  from {
    -webkit-transform: translate3d(12vw, 108vh, 0);
            transform: translate3d(12vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -113vh, 0);
            transform: translate3d(52vw, -113vh, 0);
  }
}
@keyframes move-frames-150 {
  from {
    -webkit-transform: translate3d(12vw, 108vh, 0);
            transform: translate3d(12vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -113vh, 0);
            transform: translate3d(52vw, -113vh, 0);
  }
}
.circle-container:nth-child(150) .circle {
  -webkit-animation-delay: 1423ms;
          animation-delay: 1423ms;
}
.circle-container:nth-child(151) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-151;
          animation-name: move-frames-151;
  -webkit-animation-duration: 30172ms;
          animation-duration: 30172ms;
  -webkit-animation-delay: 16829ms;
          animation-delay: 16829ms;
}
@-webkit-keyframes move-frames-151 {
  from {
    -webkit-transform: translate3d(47vw, 109vh, 0);
            transform: translate3d(47vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(89vw, -114vh, 0);
            transform: translate3d(89vw, -114vh, 0);
  }
}
@keyframes move-frames-151 {
  from {
    -webkit-transform: translate3d(47vw, 109vh, 0);
            transform: translate3d(47vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(89vw, -114vh, 0);
            transform: translate3d(89vw, -114vh, 0);
  }
}
.circle-container:nth-child(151) .circle {
  -webkit-animation-delay: 2999ms;
          animation-delay: 2999ms;
}
.circle-container:nth-child(152) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-152;
          animation-name: move-frames-152;
  -webkit-animation-duration: 35658ms;
          animation-duration: 35658ms;
  -webkit-animation-delay: 24800ms;
          animation-delay: 24800ms;
}
@-webkit-keyframes move-frames-152 {
  from {
    -webkit-transform: translate3d(86vw, 104vh, 0);
            transform: translate3d(86vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(63vw, -121vh, 0);
            transform: translate3d(63vw, -121vh, 0);
  }
}
@keyframes move-frames-152 {
  from {
    -webkit-transform: translate3d(86vw, 104vh, 0);
            transform: translate3d(86vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(63vw, -121vh, 0);
            transform: translate3d(63vw, -121vh, 0);
  }
}
.circle-container:nth-child(152) .circle {
  -webkit-animation-delay: 3239ms;
          animation-delay: 3239ms;
}
.circle-container:nth-child(153) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-153;
          animation-name: move-frames-153;
  -webkit-animation-duration: 30557ms;
          animation-duration: 30557ms;
  -webkit-animation-delay: 13397ms;
          animation-delay: 13397ms;
}
@-webkit-keyframes move-frames-153 {
  from {
    -webkit-transform: translate3d(96vw, 103vh, 0);
            transform: translate3d(96vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(34vw, -126vh, 0);
            transform: translate3d(34vw, -126vh, 0);
  }
}
@keyframes move-frames-153 {
  from {
    -webkit-transform: translate3d(96vw, 103vh, 0);
            transform: translate3d(96vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(34vw, -126vh, 0);
            transform: translate3d(34vw, -126vh, 0);
  }
}
.circle-container:nth-child(153) .circle {
  -webkit-animation-delay: 1318ms;
          animation-delay: 1318ms;
}
.circle-container:nth-child(154) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-154;
          animation-name: move-frames-154;
  -webkit-animation-duration: 29810ms;
          animation-duration: 29810ms;
  -webkit-animation-delay: 4952ms;
          animation-delay: 4952ms;
}
@-webkit-keyframes move-frames-154 {
  from {
    -webkit-transform: translate3d(71vw, 110vh, 0);
            transform: translate3d(71vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(45vw, -119vh, 0);
            transform: translate3d(45vw, -119vh, 0);
  }
}
@keyframes move-frames-154 {
  from {
    -webkit-transform: translate3d(71vw, 110vh, 0);
            transform: translate3d(71vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(45vw, -119vh, 0);
            transform: translate3d(45vw, -119vh, 0);
  }
}
.circle-container:nth-child(154) .circle {
  -webkit-animation-delay: 722ms;
          animation-delay: 722ms;
}
.circle-container:nth-child(155) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-155;
          animation-name: move-frames-155;
  -webkit-animation-duration: 34958ms;
          animation-duration: 34958ms;
  -webkit-animation-delay: 15178ms;
          animation-delay: 15178ms;
}
@-webkit-keyframes move-frames-155 {
  from {
    -webkit-transform: translate3d(14vw, 105vh, 0);
            transform: translate3d(14vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(86vw, -133vh, 0);
            transform: translate3d(86vw, -133vh, 0);
  }
}
@keyframes move-frames-155 {
  from {
    -webkit-transform: translate3d(14vw, 105vh, 0);
            transform: translate3d(14vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(86vw, -133vh, 0);
            transform: translate3d(86vw, -133vh, 0);
  }
}
.circle-container:nth-child(155) .circle {
  -webkit-animation-delay: 3726ms;
          animation-delay: 3726ms;
}
.circle-container:nth-child(156) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-156;
          animation-name: move-frames-156;
  -webkit-animation-duration: 36464ms;
          animation-duration: 36464ms;
  -webkit-animation-delay: 35461ms;
          animation-delay: 35461ms;
}
@-webkit-keyframes move-frames-156 {
  from {
    -webkit-transform: translate3d(72vw, 101vh, 0);
            transform: translate3d(72vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(98vw, -130vh, 0);
            transform: translate3d(98vw, -130vh, 0);
  }
}
@keyframes move-frames-156 {
  from {
    -webkit-transform: translate3d(72vw, 101vh, 0);
            transform: translate3d(72vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(98vw, -130vh, 0);
            transform: translate3d(98vw, -130vh, 0);
  }
}
.circle-container:nth-child(156) .circle {
  -webkit-animation-delay: 3738ms;
          animation-delay: 3738ms;
}
.circle-container:nth-child(157) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-157;
          animation-name: move-frames-157;
  -webkit-animation-duration: 31788ms;
          animation-duration: 31788ms;
  -webkit-animation-delay: 13099ms;
          animation-delay: 13099ms;
}
@-webkit-keyframes move-frames-157 {
  from {
    -webkit-transform: translate3d(52vw, 109vh, 0);
            transform: translate3d(52vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(68vw, -137vh, 0);
            transform: translate3d(68vw, -137vh, 0);
  }
}
@keyframes move-frames-157 {
  from {
    -webkit-transform: translate3d(52vw, 109vh, 0);
            transform: translate3d(52vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(68vw, -137vh, 0);
            transform: translate3d(68vw, -137vh, 0);
  }
}
.circle-container:nth-child(157) .circle {
  -webkit-animation-delay: 1637ms;
          animation-delay: 1637ms;
}
.circle-container:nth-child(158) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-158;
          animation-name: move-frames-158;
  -webkit-animation-duration: 30257ms;
          animation-duration: 30257ms;
  -webkit-animation-delay: 8806ms;
          animation-delay: 8806ms;
}
@-webkit-keyframes move-frames-158 {
  from {
    -webkit-transform: translate3d(21vw, 105vh, 0);
            transform: translate3d(21vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(47vw, -112vh, 0);
            transform: translate3d(47vw, -112vh, 0);
  }
}
@keyframes move-frames-158 {
  from {
    -webkit-transform: translate3d(21vw, 105vh, 0);
            transform: translate3d(21vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(47vw, -112vh, 0);
            transform: translate3d(47vw, -112vh, 0);
  }
}
.circle-container:nth-child(158) .circle {
  -webkit-animation-delay: 3323ms;
          animation-delay: 3323ms;
}
.circle-container:nth-child(159) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-159;
          animation-name: move-frames-159;
  -webkit-animation-duration: 32384ms;
          animation-duration: 32384ms;
  -webkit-animation-delay: 10739ms;
          animation-delay: 10739ms;
}
@-webkit-keyframes move-frames-159 {
  from {
    -webkit-transform: translate3d(97vw, 104vh, 0);
            transform: translate3d(97vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(94vw, -125vh, 0);
            transform: translate3d(94vw, -125vh, 0);
  }
}
@keyframes move-frames-159 {
  from {
    -webkit-transform: translate3d(97vw, 104vh, 0);
            transform: translate3d(97vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(94vw, -125vh, 0);
            transform: translate3d(94vw, -125vh, 0);
  }
}
.circle-container:nth-child(159) .circle {
  -webkit-animation-delay: 3259ms;
          animation-delay: 3259ms;
}
.circle-container:nth-child(160) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-160;
          animation-name: move-frames-160;
  -webkit-animation-duration: 29913ms;
          animation-duration: 29913ms;
  -webkit-animation-delay: 34446ms;
          animation-delay: 34446ms;
}
@-webkit-keyframes move-frames-160 {
  from {
    -webkit-transform: translate3d(100vw, 106vh, 0);
            transform: translate3d(100vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(90vw, -121vh, 0);
            transform: translate3d(90vw, -121vh, 0);
  }
}
@keyframes move-frames-160 {
  from {
    -webkit-transform: translate3d(100vw, 106vh, 0);
            transform: translate3d(100vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(90vw, -121vh, 0);
            transform: translate3d(90vw, -121vh, 0);
  }
}
.circle-container:nth-child(160) .circle {
  -webkit-animation-delay: 2862ms;
          animation-delay: 2862ms;
}
.circle-container:nth-child(161) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-161;
          animation-name: move-frames-161;
  -webkit-animation-duration: 28564ms;
          animation-duration: 28564ms;
  -webkit-animation-delay: 22308ms;
          animation-delay: 22308ms;
}
@-webkit-keyframes move-frames-161 {
  from {
    -webkit-transform: translate3d(46vw, 107vh, 0);
            transform: translate3d(46vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(89vw, -109vh, 0);
            transform: translate3d(89vw, -109vh, 0);
  }
}
@keyframes move-frames-161 {
  from {
    -webkit-transform: translate3d(46vw, 107vh, 0);
            transform: translate3d(46vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(89vw, -109vh, 0);
            transform: translate3d(89vw, -109vh, 0);
  }
}
.circle-container:nth-child(161) .circle {
  -webkit-animation-delay: 2604ms;
          animation-delay: 2604ms;
}
.circle-container:nth-child(162) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-162;
          animation-name: move-frames-162;
  -webkit-animation-duration: 36738ms;
          animation-duration: 36738ms;
  -webkit-animation-delay: 31468ms;
          animation-delay: 31468ms;
}
@-webkit-keyframes move-frames-162 {
  from {
    -webkit-transform: translate3d(23vw, 106vh, 0);
            transform: translate3d(23vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(61vw, -107vh, 0);
            transform: translate3d(61vw, -107vh, 0);
  }
}
@keyframes move-frames-162 {
  from {
    -webkit-transform: translate3d(23vw, 106vh, 0);
            transform: translate3d(23vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(61vw, -107vh, 0);
            transform: translate3d(61vw, -107vh, 0);
  }
}
.circle-container:nth-child(162) .circle {
  -webkit-animation-delay: 2106ms;
          animation-delay: 2106ms;
}
.circle-container:nth-child(163) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-163;
          animation-name: move-frames-163;
  -webkit-animation-duration: 34963ms;
          animation-duration: 34963ms;
  -webkit-animation-delay: 12110ms;
          animation-delay: 12110ms;
}
@-webkit-keyframes move-frames-163 {
  from {
    -webkit-transform: translate3d(2vw, 109vh, 0);
            transform: translate3d(2vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(35vw, -119vh, 0);
            transform: translate3d(35vw, -119vh, 0);
  }
}
@keyframes move-frames-163 {
  from {
    -webkit-transform: translate3d(2vw, 109vh, 0);
            transform: translate3d(2vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(35vw, -119vh, 0);
            transform: translate3d(35vw, -119vh, 0);
  }
}
.circle-container:nth-child(163) .circle {
  -webkit-animation-delay: 3495ms;
          animation-delay: 3495ms;
}
.circle-container:nth-child(164) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-164;
          animation-name: move-frames-164;
  -webkit-animation-duration: 29001ms;
          animation-duration: 29001ms;
  -webkit-animation-delay: 2325ms;
          animation-delay: 2325ms;
}
@-webkit-keyframes move-frames-164 {
  from {
    -webkit-transform: translate3d(70vw, 102vh, 0);
            transform: translate3d(70vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(71vw, -106vh, 0);
            transform: translate3d(71vw, -106vh, 0);
  }
}
@keyframes move-frames-164 {
  from {
    -webkit-transform: translate3d(70vw, 102vh, 0);
            transform: translate3d(70vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(71vw, -106vh, 0);
            transform: translate3d(71vw, -106vh, 0);
  }
}
.circle-container:nth-child(164) .circle {
  -webkit-animation-delay: 3423ms;
          animation-delay: 3423ms;
}
.circle-container:nth-child(165) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-165;
          animation-name: move-frames-165;
  -webkit-animation-duration: 33856ms;
          animation-duration: 33856ms;
  -webkit-animation-delay: 10690ms;
          animation-delay: 10690ms;
}
@-webkit-keyframes move-frames-165 {
  from {
    -webkit-transform: translate3d(81vw, 109vh, 0);
            transform: translate3d(81vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(66vw, -122vh, 0);
            transform: translate3d(66vw, -122vh, 0);
  }
}
@keyframes move-frames-165 {
  from {
    -webkit-transform: translate3d(81vw, 109vh, 0);
            transform: translate3d(81vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(66vw, -122vh, 0);
            transform: translate3d(66vw, -122vh, 0);
  }
}
.circle-container:nth-child(165) .circle {
  -webkit-animation-delay: 2662ms;
          animation-delay: 2662ms;
}
.circle-container:nth-child(166) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-166;
          animation-name: move-frames-166;
  -webkit-animation-duration: 33436ms;
          animation-duration: 33436ms;
  -webkit-animation-delay: 2425ms;
          animation-delay: 2425ms;
}
@-webkit-keyframes move-frames-166 {
  from {
    -webkit-transform: translate3d(30vw, 109vh, 0);
            transform: translate3d(30vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(30vw, -112vh, 0);
            transform: translate3d(30vw, -112vh, 0);
  }
}
@keyframes move-frames-166 {
  from {
    -webkit-transform: translate3d(30vw, 109vh, 0);
            transform: translate3d(30vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(30vw, -112vh, 0);
            transform: translate3d(30vw, -112vh, 0);
  }
}
.circle-container:nth-child(166) .circle {
  -webkit-animation-delay: 718ms;
          animation-delay: 718ms;
}
.circle-container:nth-child(167) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-167;
          animation-name: move-frames-167;
  -webkit-animation-duration: 33406ms;
          animation-duration: 33406ms;
  -webkit-animation-delay: 17424ms;
          animation-delay: 17424ms;
}
@-webkit-keyframes move-frames-167 {
  from {
    -webkit-transform: translate3d(14vw, 106vh, 0);
            transform: translate3d(14vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(26vw, -126vh, 0);
            transform: translate3d(26vw, -126vh, 0);
  }
}
@keyframes move-frames-167 {
  from {
    -webkit-transform: translate3d(14vw, 106vh, 0);
            transform: translate3d(14vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(26vw, -126vh, 0);
            transform: translate3d(26vw, -126vh, 0);
  }
}
.circle-container:nth-child(167) .circle {
  -webkit-animation-delay: 414ms;
          animation-delay: 414ms;
}
.circle-container:nth-child(168) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-168;
          animation-name: move-frames-168;
  -webkit-animation-duration: 31079ms;
          animation-duration: 31079ms;
  -webkit-animation-delay: 33052ms;
          animation-delay: 33052ms;
}
@-webkit-keyframes move-frames-168 {
  from {
    -webkit-transform: translate3d(44vw, 101vh, 0);
            transform: translate3d(44vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(46vw, -108vh, 0);
            transform: translate3d(46vw, -108vh, 0);
  }
}
@keyframes move-frames-168 {
  from {
    -webkit-transform: translate3d(44vw, 101vh, 0);
            transform: translate3d(44vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(46vw, -108vh, 0);
            transform: translate3d(46vw, -108vh, 0);
  }
}
.circle-container:nth-child(168) .circle {
  -webkit-animation-delay: 673ms;
          animation-delay: 673ms;
}
.circle-container:nth-child(169) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-169;
          animation-name: move-frames-169;
  -webkit-animation-duration: 28567ms;
          animation-duration: 28567ms;
  -webkit-animation-delay: 17032ms;
          animation-delay: 17032ms;
}
@-webkit-keyframes move-frames-169 {
  from {
    -webkit-transform: translate3d(89vw, 101vh, 0);
            transform: translate3d(89vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(79vw, -116vh, 0);
            transform: translate3d(79vw, -116vh, 0);
  }
}
@keyframes move-frames-169 {
  from {
    -webkit-transform: translate3d(89vw, 101vh, 0);
            transform: translate3d(89vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(79vw, -116vh, 0);
            transform: translate3d(79vw, -116vh, 0);
  }
}
.circle-container:nth-child(169) .circle {
  -webkit-animation-delay: 63ms;
          animation-delay: 63ms;
}
.circle-container:nth-child(170) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-170;
          animation-name: move-frames-170;
  -webkit-animation-duration: 29910ms;
          animation-duration: 29910ms;
  -webkit-animation-delay: 22155ms;
          animation-delay: 22155ms;
}
@-webkit-keyframes move-frames-170 {
  from {
    -webkit-transform: translate3d(2vw, 101vh, 0);
            transform: translate3d(2vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(17vw, -107vh, 0);
            transform: translate3d(17vw, -107vh, 0);
  }
}
@keyframes move-frames-170 {
  from {
    -webkit-transform: translate3d(2vw, 101vh, 0);
            transform: translate3d(2vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(17vw, -107vh, 0);
            transform: translate3d(17vw, -107vh, 0);
  }
}
.circle-container:nth-child(170) .circle {
  -webkit-animation-delay: 1153ms;
          animation-delay: 1153ms;
}
.circle-container:nth-child(171) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-171;
          animation-name: move-frames-171;
  -webkit-animation-duration: 32646ms;
          animation-duration: 32646ms;
  -webkit-animation-delay: 5714ms;
          animation-delay: 5714ms;
}
@-webkit-keyframes move-frames-171 {
  from {
    -webkit-transform: translate3d(31vw, 103vh, 0);
            transform: translate3d(31vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(25vw, -117vh, 0);
            transform: translate3d(25vw, -117vh, 0);
  }
}
@keyframes move-frames-171 {
  from {
    -webkit-transform: translate3d(31vw, 103vh, 0);
            transform: translate3d(31vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(25vw, -117vh, 0);
            transform: translate3d(25vw, -117vh, 0);
  }
}
.circle-container:nth-child(171) .circle {
  -webkit-animation-delay: 1439ms;
          animation-delay: 1439ms;
}
.circle-container:nth-child(172) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-172;
          animation-name: move-frames-172;
  -webkit-animation-duration: 34918ms;
          animation-duration: 34918ms;
  -webkit-animation-delay: 943ms;
          animation-delay: 943ms;
}
@-webkit-keyframes move-frames-172 {
  from {
    -webkit-transform: translate3d(94vw, 110vh, 0);
            transform: translate3d(94vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(84vw, -136vh, 0);
            transform: translate3d(84vw, -136vh, 0);
  }
}
@keyframes move-frames-172 {
  from {
    -webkit-transform: translate3d(94vw, 110vh, 0);
            transform: translate3d(94vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(84vw, -136vh, 0);
            transform: translate3d(84vw, -136vh, 0);
  }
}
.circle-container:nth-child(172) .circle {
  -webkit-animation-delay: 747ms;
          animation-delay: 747ms;
}
.circle-container:nth-child(173) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-173;
          animation-name: move-frames-173;
  -webkit-animation-duration: 34305ms;
          animation-duration: 34305ms;
  -webkit-animation-delay: 36484ms;
          animation-delay: 36484ms;
}
@-webkit-keyframes move-frames-173 {
  from {
    -webkit-transform: translate3d(20vw, 104vh, 0);
            transform: translate3d(20vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(77vw, -125vh, 0);
            transform: translate3d(77vw, -125vh, 0);
  }
}
@keyframes move-frames-173 {
  from {
    -webkit-transform: translate3d(20vw, 104vh, 0);
            transform: translate3d(20vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(77vw, -125vh, 0);
            transform: translate3d(77vw, -125vh, 0);
  }
}
.circle-container:nth-child(173) .circle {
  -webkit-animation-delay: 837ms;
          animation-delay: 837ms;
}
.circle-container:nth-child(174) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-174;
          animation-name: move-frames-174;
  -webkit-animation-duration: 35903ms;
          animation-duration: 35903ms;
  -webkit-animation-delay: 17215ms;
          animation-delay: 17215ms;
}
@-webkit-keyframes move-frames-174 {
  from {
    -webkit-transform: translate3d(89vw, 110vh, 0);
            transform: translate3d(89vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(43vw, -127vh, 0);
            transform: translate3d(43vw, -127vh, 0);
  }
}
@keyframes move-frames-174 {
  from {
    -webkit-transform: translate3d(89vw, 110vh, 0);
            transform: translate3d(89vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(43vw, -127vh, 0);
            transform: translate3d(43vw, -127vh, 0);
  }
}
.circle-container:nth-child(174) .circle {
  -webkit-animation-delay: 2191ms;
          animation-delay: 2191ms;
}
.circle-container:nth-child(175) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-175;
          animation-name: move-frames-175;
  -webkit-animation-duration: 31438ms;
          animation-duration: 31438ms;
  -webkit-animation-delay: 20491ms;
          animation-delay: 20491ms;
}
@-webkit-keyframes move-frames-175 {
  from {
    -webkit-transform: translate3d(24vw, 104vh, 0);
            transform: translate3d(24vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(56vw, -127vh, 0);
            transform: translate3d(56vw, -127vh, 0);
  }
}
@keyframes move-frames-175 {
  from {
    -webkit-transform: translate3d(24vw, 104vh, 0);
            transform: translate3d(24vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(56vw, -127vh, 0);
            transform: translate3d(56vw, -127vh, 0);
  }
}
.circle-container:nth-child(175) .circle {
  -webkit-animation-delay: 2973ms;
          animation-delay: 2973ms;
}
.circle-container:nth-child(176) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-176;
          animation-name: move-frames-176;
  -webkit-animation-duration: 31631ms;
          animation-duration: 31631ms;
  -webkit-animation-delay: 36442ms;
          animation-delay: 36442ms;
}
@-webkit-keyframes move-frames-176 {
  from {
    -webkit-transform: translate3d(71vw, 101vh, 0);
            transform: translate3d(71vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(29vw, -105vh, 0);
            transform: translate3d(29vw, -105vh, 0);
  }
}
@keyframes move-frames-176 {
  from {
    -webkit-transform: translate3d(71vw, 101vh, 0);
            transform: translate3d(71vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(29vw, -105vh, 0);
            transform: translate3d(29vw, -105vh, 0);
  }
}
.circle-container:nth-child(176) .circle {
  -webkit-animation-delay: 2587ms;
          animation-delay: 2587ms;
}
.circle-container:nth-child(177) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-177;
          animation-name: move-frames-177;
  -webkit-animation-duration: 32900ms;
          animation-duration: 32900ms;
  -webkit-animation-delay: 4969ms;
          animation-delay: 4969ms;
}
@-webkit-keyframes move-frames-177 {
  from {
    -webkit-transform: translate3d(66vw, 109vh, 0);
            transform: translate3d(66vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(37vw, -129vh, 0);
            transform: translate3d(37vw, -129vh, 0);
  }
}
@keyframes move-frames-177 {
  from {
    -webkit-transform: translate3d(66vw, 109vh, 0);
            transform: translate3d(66vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(37vw, -129vh, 0);
            transform: translate3d(37vw, -129vh, 0);
  }
}
.circle-container:nth-child(177) .circle {
  -webkit-animation-delay: 3128ms;
          animation-delay: 3128ms;
}
.circle-container:nth-child(178) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-178;
          animation-name: move-frames-178;
  -webkit-animation-duration: 29240ms;
          animation-duration: 29240ms;
  -webkit-animation-delay: 207ms;
          animation-delay: 207ms;
}
@-webkit-keyframes move-frames-178 {
  from {
    -webkit-transform: translate3d(47vw, 102vh, 0);
            transform: translate3d(47vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(15vw, -107vh, 0);
            transform: translate3d(15vw, -107vh, 0);
  }
}
@keyframes move-frames-178 {
  from {
    -webkit-transform: translate3d(47vw, 102vh, 0);
            transform: translate3d(47vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(15vw, -107vh, 0);
            transform: translate3d(15vw, -107vh, 0);
  }
}
.circle-container:nth-child(178) .circle {
  -webkit-animation-delay: 3650ms;
          animation-delay: 3650ms;
}
.circle-container:nth-child(179) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-179;
          animation-name: move-frames-179;
  -webkit-animation-duration: 34223ms;
          animation-duration: 34223ms;
  -webkit-animation-delay: 20878ms;
          animation-delay: 20878ms;
}
@-webkit-keyframes move-frames-179 {
  from {
    -webkit-transform: translate3d(85vw, 105vh, 0);
            transform: translate3d(85vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(20vw, -135vh, 0);
            transform: translate3d(20vw, -135vh, 0);
  }
}
@keyframes move-frames-179 {
  from {
    -webkit-transform: translate3d(85vw, 105vh, 0);
            transform: translate3d(85vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(20vw, -135vh, 0);
            transform: translate3d(20vw, -135vh, 0);
  }
}
.circle-container:nth-child(179) .circle {
  -webkit-animation-delay: 254ms;
          animation-delay: 254ms;
}
.circle-container:nth-child(180) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-180;
          animation-name: move-frames-180;
  -webkit-animation-duration: 32171ms;
          animation-duration: 32171ms;
  -webkit-animation-delay: 16299ms;
          animation-delay: 16299ms;
}
@-webkit-keyframes move-frames-180 {
  from {
    -webkit-transform: translate3d(83vw, 109vh, 0);
            transform: translate3d(83vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -132vh, 0);
            transform: translate3d(52vw, -132vh, 0);
  }
}
@keyframes move-frames-180 {
  from {
    -webkit-transform: translate3d(83vw, 109vh, 0);
            transform: translate3d(83vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -132vh, 0);
            transform: translate3d(52vw, -132vh, 0);
  }
}
.circle-container:nth-child(180) .circle {
  -webkit-animation-delay: 2567ms;
          animation-delay: 2567ms;
}
.circle-container:nth-child(181) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-181;
          animation-name: move-frames-181;
  -webkit-animation-duration: 33950ms;
          animation-duration: 33950ms;
  -webkit-animation-delay: 24718ms;
          animation-delay: 24718ms;
}
@-webkit-keyframes move-frames-181 {
  from {
    -webkit-transform: translate3d(72vw, 104vh, 0);
            transform: translate3d(72vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(26vw, -128vh, 0);
            transform: translate3d(26vw, -128vh, 0);
  }
}
@keyframes move-frames-181 {
  from {
    -webkit-transform: translate3d(72vw, 104vh, 0);
            transform: translate3d(72vw, 104vh, 0);
  }
  to {
    -webkit-transform: translate3d(26vw, -128vh, 0);
            transform: translate3d(26vw, -128vh, 0);
  }
}
.circle-container:nth-child(181) .circle {
  -webkit-animation-delay: 208ms;
          animation-delay: 208ms;
}
.circle-container:nth-child(182) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-182;
          animation-name: move-frames-182;
  -webkit-animation-duration: 31327ms;
          animation-duration: 31327ms;
  -webkit-animation-delay: 25662ms;
          animation-delay: 25662ms;
}
@-webkit-keyframes move-frames-182 {
  from {
    -webkit-transform: translate3d(99vw, 110vh, 0);
            transform: translate3d(99vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(37vw, -117vh, 0);
            transform: translate3d(37vw, -117vh, 0);
  }
}
@keyframes move-frames-182 {
  from {
    -webkit-transform: translate3d(99vw, 110vh, 0);
            transform: translate3d(99vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(37vw, -117vh, 0);
            transform: translate3d(37vw, -117vh, 0);
  }
}
.circle-container:nth-child(182) .circle {
  -webkit-animation-delay: 3697ms;
          animation-delay: 3697ms;
}
.circle-container:nth-child(183) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-183;
          animation-name: move-frames-183;
  -webkit-animation-duration: 31735ms;
          animation-duration: 31735ms;
  -webkit-animation-delay: 28174ms;
          animation-delay: 28174ms;
}
@-webkit-keyframes move-frames-183 {
  from {
    -webkit-transform: translate3d(19vw, 101vh, 0);
            transform: translate3d(19vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(37vw, -119vh, 0);
            transform: translate3d(37vw, -119vh, 0);
  }
}
@keyframes move-frames-183 {
  from {
    -webkit-transform: translate3d(19vw, 101vh, 0);
            transform: translate3d(19vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(37vw, -119vh, 0);
            transform: translate3d(37vw, -119vh, 0);
  }
}
.circle-container:nth-child(183) .circle {
  -webkit-animation-delay: 3418ms;
          animation-delay: 3418ms;
}
.circle-container:nth-child(184) {
  width: 4px;
  height: 4px;
  -webkit-animation-name: move-frames-184;
          animation-name: move-frames-184;
  -webkit-animation-duration: 30647ms;
          animation-duration: 30647ms;
  -webkit-animation-delay: 6339ms;
          animation-delay: 6339ms;
}
@-webkit-keyframes move-frames-184 {
  from {
    -webkit-transform: translate3d(5vw, 106vh, 0);
            transform: translate3d(5vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(1vw, -124vh, 0);
            transform: translate3d(1vw, -124vh, 0);
  }
}
@keyframes move-frames-184 {
  from {
    -webkit-transform: translate3d(5vw, 106vh, 0);
            transform: translate3d(5vw, 106vh, 0);
  }
  to {
    -webkit-transform: translate3d(1vw, -124vh, 0);
            transform: translate3d(1vw, -124vh, 0);
  }
}
.circle-container:nth-child(184) .circle {
  -webkit-animation-delay: 511ms;
          animation-delay: 511ms;
}
.circle-container:nth-child(185) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-185;
          animation-name: move-frames-185;
  -webkit-animation-duration: 36492ms;
          animation-duration: 36492ms;
  -webkit-animation-delay: 30803ms;
          animation-delay: 30803ms;
}
@-webkit-keyframes move-frames-185 {
  from {
    -webkit-transform: translate3d(90vw, 110vh, 0);
            transform: translate3d(90vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(1vw, -138vh, 0);
            transform: translate3d(1vw, -138vh, 0);
  }
}
@keyframes move-frames-185 {
  from {
    -webkit-transform: translate3d(90vw, 110vh, 0);
            transform: translate3d(90vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(1vw, -138vh, 0);
            transform: translate3d(1vw, -138vh, 0);
  }
}
.circle-container:nth-child(185) .circle {
  -webkit-animation-delay: 3613ms;
          animation-delay: 3613ms;
}
.circle-container:nth-child(186) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-186;
          animation-name: move-frames-186;
  -webkit-animation-duration: 29782ms;
          animation-duration: 29782ms;
  -webkit-animation-delay: 8638ms;
          animation-delay: 8638ms;
}
@-webkit-keyframes move-frames-186 {
  from {
    -webkit-transform: translate3d(4vw, 108vh, 0);
            transform: translate3d(4vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(42vw, -122vh, 0);
            transform: translate3d(42vw, -122vh, 0);
  }
}
@keyframes move-frames-186 {
  from {
    -webkit-transform: translate3d(4vw, 108vh, 0);
            transform: translate3d(4vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(42vw, -122vh, 0);
            transform: translate3d(42vw, -122vh, 0);
  }
}
.circle-container:nth-child(186) .circle {
  -webkit-animation-delay: 1472ms;
          animation-delay: 1472ms;
}
.circle-container:nth-child(187) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-187;
          animation-name: move-frames-187;
  -webkit-animation-duration: 28894ms;
          animation-duration: 28894ms;
  -webkit-animation-delay: 36863ms;
          animation-delay: 36863ms;
}
@-webkit-keyframes move-frames-187 {
  from {
    -webkit-transform: translate3d(42vw, 101vh, 0);
            transform: translate3d(42vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(96vw, -128vh, 0);
            transform: translate3d(96vw, -128vh, 0);
  }
}
@keyframes move-frames-187 {
  from {
    -webkit-transform: translate3d(42vw, 101vh, 0);
            transform: translate3d(42vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(96vw, -128vh, 0);
            transform: translate3d(96vw, -128vh, 0);
  }
}
.circle-container:nth-child(187) .circle {
  -webkit-animation-delay: 2004ms;
          animation-delay: 2004ms;
}
.circle-container:nth-child(188) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-188;
          animation-name: move-frames-188;
  -webkit-animation-duration: 31574ms;
          animation-duration: 31574ms;
  -webkit-animation-delay: 31064ms;
          animation-delay: 31064ms;
}
@-webkit-keyframes move-frames-188 {
  from {
    -webkit-transform: translate3d(31vw, 105vh, 0);
            transform: translate3d(31vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(93vw, -114vh, 0);
            transform: translate3d(93vw, -114vh, 0);
  }
}
@keyframes move-frames-188 {
  from {
    -webkit-transform: translate3d(31vw, 105vh, 0);
            transform: translate3d(31vw, 105vh, 0);
  }
  to {
    -webkit-transform: translate3d(93vw, -114vh, 0);
            transform: translate3d(93vw, -114vh, 0);
  }
}
.circle-container:nth-child(188) .circle {
  -webkit-animation-delay: 588ms;
          animation-delay: 588ms;
}
.circle-container:nth-child(189) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-189;
          animation-name: move-frames-189;
  -webkit-animation-duration: 34232ms;
          animation-duration: 34232ms;
  -webkit-animation-delay: 21528ms;
          animation-delay: 21528ms;
}
@-webkit-keyframes move-frames-189 {
  from {
    -webkit-transform: translate3d(10vw, 109vh, 0);
            transform: translate3d(10vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(59vw, -128vh, 0);
            transform: translate3d(59vw, -128vh, 0);
  }
}
@keyframes move-frames-189 {
  from {
    -webkit-transform: translate3d(10vw, 109vh, 0);
            transform: translate3d(10vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(59vw, -128vh, 0);
            transform: translate3d(59vw, -128vh, 0);
  }
}
.circle-container:nth-child(189) .circle {
  -webkit-animation-delay: 2510ms;
          animation-delay: 2510ms;
}
.circle-container:nth-child(190) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-190;
          animation-name: move-frames-190;
  -webkit-animation-duration: 35386ms;
          animation-duration: 35386ms;
  -webkit-animation-delay: 35894ms;
          animation-delay: 35894ms;
}
@-webkit-keyframes move-frames-190 {
  from {
    -webkit-transform: translate3d(16vw, 107vh, 0);
            transform: translate3d(16vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(24vw, -134vh, 0);
            transform: translate3d(24vw, -134vh, 0);
  }
}
@keyframes move-frames-190 {
  from {
    -webkit-transform: translate3d(16vw, 107vh, 0);
            transform: translate3d(16vw, 107vh, 0);
  }
  to {
    -webkit-transform: translate3d(24vw, -134vh, 0);
            transform: translate3d(24vw, -134vh, 0);
  }
}
.circle-container:nth-child(190) .circle {
  -webkit-animation-delay: 2279ms;
          animation-delay: 2279ms;
}
.circle-container:nth-child(191) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-191;
          animation-name: move-frames-191;
  -webkit-animation-duration: 29879ms;
          animation-duration: 29879ms;
  -webkit-animation-delay: 17667ms;
          animation-delay: 17667ms;
}
@-webkit-keyframes move-frames-191 {
  from {
    -webkit-transform: translate3d(12vw, 103vh, 0);
            transform: translate3d(12vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(80vw, -109vh, 0);
            transform: translate3d(80vw, -109vh, 0);
  }
}
@keyframes move-frames-191 {
  from {
    -webkit-transform: translate3d(12vw, 103vh, 0);
            transform: translate3d(12vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(80vw, -109vh, 0);
            transform: translate3d(80vw, -109vh, 0);
  }
}
.circle-container:nth-child(191) .circle {
  -webkit-animation-delay: 2775ms;
          animation-delay: 2775ms;
}
.circle-container:nth-child(192) {
  width: 6px;
  height: 6px;
  -webkit-animation-name: move-frames-192;
          animation-name: move-frames-192;
  -webkit-animation-duration: 32452ms;
          animation-duration: 32452ms;
  -webkit-animation-delay: 12678ms;
          animation-delay: 12678ms;
}
@-webkit-keyframes move-frames-192 {
  from {
    -webkit-transform: translate3d(30vw, 109vh, 0);
            transform: translate3d(30vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(66vw, -134vh, 0);
            transform: translate3d(66vw, -134vh, 0);
  }
}
@keyframes move-frames-192 {
  from {
    -webkit-transform: translate3d(30vw, 109vh, 0);
            transform: translate3d(30vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(66vw, -134vh, 0);
            transform: translate3d(66vw, -134vh, 0);
  }
}
.circle-container:nth-child(192) .circle {
  -webkit-animation-delay: 1393ms;
          animation-delay: 1393ms;
}
.circle-container:nth-child(193) {
  width: 1px;
  height: 1px;
  -webkit-animation-name: move-frames-193;
          animation-name: move-frames-193;
  -webkit-animation-duration: 32328ms;
          animation-duration: 32328ms;
  -webkit-animation-delay: 15683ms;
          animation-delay: 15683ms;
}
@-webkit-keyframes move-frames-193 {
  from {
    -webkit-transform: translate3d(64vw, 103vh, 0);
            transform: translate3d(64vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(94vw, -117vh, 0);
            transform: translate3d(94vw, -117vh, 0);
  }
}
@keyframes move-frames-193 {
  from {
    -webkit-transform: translate3d(64vw, 103vh, 0);
            transform: translate3d(64vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(94vw, -117vh, 0);
            transform: translate3d(94vw, -117vh, 0);
  }
}
.circle-container:nth-child(193) .circle {
  -webkit-animation-delay: 3469ms;
          animation-delay: 3469ms;
}
.circle-container:nth-child(194) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-194;
          animation-name: move-frames-194;
  -webkit-animation-duration: 36812ms;
          animation-duration: 36812ms;
  -webkit-animation-delay: 2163ms;
          animation-delay: 2163ms;
}
@-webkit-keyframes move-frames-194 {
  from {
    -webkit-transform: translate3d(51vw, 108vh, 0);
            transform: translate3d(51vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(49vw, -137vh, 0);
            transform: translate3d(49vw, -137vh, 0);
  }
}
@keyframes move-frames-194 {
  from {
    -webkit-transform: translate3d(51vw, 108vh, 0);
            transform: translate3d(51vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(49vw, -137vh, 0);
            transform: translate3d(49vw, -137vh, 0);
  }
}
.circle-container:nth-child(194) .circle {
  -webkit-animation-delay: 2429ms;
          animation-delay: 2429ms;
}
.circle-container:nth-child(195) {
  width: 5px;
  height: 5px;
  -webkit-animation-name: move-frames-195;
          animation-name: move-frames-195;
  -webkit-animation-duration: 32948ms;
          animation-duration: 32948ms;
  -webkit-animation-delay: 27585ms;
          animation-delay: 27585ms;
}
@-webkit-keyframes move-frames-195 {
  from {
    -webkit-transform: translate3d(46vw, 101vh, 0);
            transform: translate3d(46vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(67vw, -113vh, 0);
            transform: translate3d(67vw, -113vh, 0);
  }
}
@keyframes move-frames-195 {
  from {
    -webkit-transform: translate3d(46vw, 101vh, 0);
            transform: translate3d(46vw, 101vh, 0);
  }
  to {
    -webkit-transform: translate3d(67vw, -113vh, 0);
            transform: translate3d(67vw, -113vh, 0);
  }
}
.circle-container:nth-child(195) .circle {
  -webkit-animation-delay: 2545ms;
          animation-delay: 2545ms;
}
.circle-container:nth-child(196) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-196;
          animation-name: move-frames-196;
  -webkit-animation-duration: 28255ms;
          animation-duration: 28255ms;
  -webkit-animation-delay: 26860ms;
          animation-delay: 26860ms;
}
@-webkit-keyframes move-frames-196 {
  from {
    -webkit-transform: translate3d(14vw, 109vh, 0);
            transform: translate3d(14vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(98vw, -113vh, 0);
            transform: translate3d(98vw, -113vh, 0);
  }
}
@keyframes move-frames-196 {
  from {
    -webkit-transform: translate3d(14vw, 109vh, 0);
            transform: translate3d(14vw, 109vh, 0);
  }
  to {
    -webkit-transform: translate3d(98vw, -113vh, 0);
            transform: translate3d(98vw, -113vh, 0);
  }
}
.circle-container:nth-child(196) .circle {
  -webkit-animation-delay: 3069ms;
          animation-delay: 3069ms;
}
.circle-container:nth-child(197) {
  width: 7px;
  height: 7px;
  -webkit-animation-name: move-frames-197;
          animation-name: move-frames-197;
  -webkit-animation-duration: 33076ms;
          animation-duration: 33076ms;
  -webkit-animation-delay: 30609ms;
          animation-delay: 30609ms;
}
@-webkit-keyframes move-frames-197 {
  from {
    -webkit-transform: translate3d(99vw, 102vh, 0);
            transform: translate3d(99vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(31vw, -130vh, 0);
            transform: translate3d(31vw, -130vh, 0);
  }
}
@keyframes move-frames-197 {
  from {
    -webkit-transform: translate3d(99vw, 102vh, 0);
            transform: translate3d(99vw, 102vh, 0);
  }
  to {
    -webkit-transform: translate3d(31vw, -130vh, 0);
            transform: translate3d(31vw, -130vh, 0);
  }
}
.circle-container:nth-child(197) .circle {
  -webkit-animation-delay: 1039ms;
          animation-delay: 1039ms;
}
.circle-container:nth-child(198) {
  width: 8px;
  height: 8px;
  -webkit-animation-name: move-frames-198;
          animation-name: move-frames-198;
  -webkit-animation-duration: 30377ms;
          animation-duration: 30377ms;
  -webkit-animation-delay: 8573ms;
          animation-delay: 8573ms;
}
@-webkit-keyframes move-frames-198 {
  from {
    -webkit-transform: translate3d(47vw, 108vh, 0);
            transform: translate3d(47vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(20vw, -120vh, 0);
            transform: translate3d(20vw, -120vh, 0);
  }
}
@keyframes move-frames-198 {
  from {
    -webkit-transform: translate3d(47vw, 108vh, 0);
            transform: translate3d(47vw, 108vh, 0);
  }
  to {
    -webkit-transform: translate3d(20vw, -120vh, 0);
            transform: translate3d(20vw, -120vh, 0);
  }
}
.circle-container:nth-child(198) .circle {
  -webkit-animation-delay: 702ms;
          animation-delay: 702ms;
}
.circle-container:nth-child(199) {
  width: 3px;
  height: 3px;
  -webkit-animation-name: move-frames-199;
          animation-name: move-frames-199;
  -webkit-animation-duration: 29126ms;
          animation-duration: 29126ms;
  -webkit-animation-delay: 23999ms;
          animation-delay: 23999ms;
}
@-webkit-keyframes move-frames-199 {
  from {
    -webkit-transform: translate3d(21vw, 110vh, 0);
            transform: translate3d(21vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -134vh, 0);
            transform: translate3d(52vw, -134vh, 0);
  }
}
@keyframes move-frames-199 {
  from {
    -webkit-transform: translate3d(21vw, 110vh, 0);
            transform: translate3d(21vw, 110vh, 0);
  }
  to {
    -webkit-transform: translate3d(52vw, -134vh, 0);
            transform: translate3d(52vw, -134vh, 0);
  }
}
.circle-container:nth-child(199) .circle {
  -webkit-animation-delay: 3461ms;
          animation-delay: 3461ms;
}
.circle-container:nth-child(200) {
  width: 2px;
  height: 2px;
  -webkit-animation-name: move-frames-200;
          animation-name: move-frames-200;
  -webkit-animation-duration: 36295ms;
          animation-duration: 36295ms;
  -webkit-animation-delay: 11882ms;
          animation-delay: 11882ms;
}
@-webkit-keyframes move-frames-200 {
  from {
    -webkit-transform: translate3d(55vw, 103vh, 0);
            transform: translate3d(55vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(15vw, -125vh, 0);
            transform: translate3d(15vw, -125vh, 0);
  }
}
@keyframes move-frames-200 {
  from {
    -webkit-transform: translate3d(55vw, 103vh, 0);
            transform: translate3d(55vw, 103vh, 0);
  }
  to {
    -webkit-transform: translate3d(15vw, -125vh, 0);
            transform: translate3d(15vw, -125vh, 0);
  }
}
.circle-container:nth-child(200) .circle {
  -webkit-animation-delay: 3101ms;
          animation-delay: 3101ms;
}

.message {
  position: absolute;
  right: 20px;
  bottom: 10px;
  color: white;
  font-family: "Josefin Slab", serif;
  line-height: 27px;
  font-size: 18px;
  text-align: right;
 -webkit-animation: message-frames 1.5s ease 5s forwards;
          animation: message-frames 1.5s ease 5s forwards;
  opacity: 0;
}
@-webkit-keyframes message-frames {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@keyframes message-frames {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
body {
    overflow: hidden;
}
h1 {
    font-size: 200px;
}
.img {
    width: 100px;
    height: 100px;
    position: relative; top: -300px;
}
@media only screen and (min-width: 600px) {
  .img {
    margin-right: 300px;
  }
}
@media only screen and (max-width: 600px) {
  .planet {
    width: 500px;
    height: 500px;
    margin-left: -250px;
    margin-bottom: -250px;
    border-radius: 99999999px;
  }
}
    
.img {   
    animation-name: floating; 
    animation-duration: 3s; 
    animation-iteration-count: infinite; 
    animation-timing-function: ease-in-out; 
    margin-left: 30px; 
    margin-top: 5px; 
    positon: fixed; 
    float: right;
} 
  
@keyframes floating { 
    0% { transform: translate(0,  0px); } 
    50%  { transform: translate(0, 15px); } 
    100%   { transform: translate(0, -0px); }     
</style>
  <div class="container"><img class="background" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/221808/sky.jpg"/>
  <a href="https://www.wwf.org.uk/thingsyoucando"><p class="message">Learn to save the planet</p></a>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="circle-container">
    <div class="circle"></div>
  </div>
</div>
  
<img class="planet" src="https://images.vexels.com/media/users/3/157872/isolated/preview/8d20eee691b54d23d865a69f08a40cd7-basic-earth-icon-by-vexels.png">
  
  
</head>
<body>

    <nav class="black white-text" role="navigation" style="position:fixed;top:0;left:0;width:100%;z-index:999">
    <div class="nav-wrapper container">
      <a id="logo-container" href="https://homebase.rf.gd" class="brand-logo white-text">Homebase</a>
      <ul class="right hide-on-med-and-down black-text">
      <li class="waves-effect black-text"><a href="./forum/">Forum</a></li>
<li class="waves-effect black-text"><a href="./blog/">Blog</a></li>
<li class="waves-effect black-text"><a href="https://homebase.rf.gd/about-the-developer">About the developer</a></li>


        <li class="waves-effect black-text"><?php if(!isset($_SESSION['valid'])) { echo '<a href="./homebase/test.php" class="black-text">Login</a>'; } else {echo "<a href='./homebase/logout.php' class='black-text'>Logout</a>"; } ?></li>
      </ul>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="./homebase/test.php">Login</a></li>
        <li><a href="./forum">Forum</a></li>
        <li><a href="./blog">Blog</a></li>
      </ul>
    </div>
  </nav>
    <h1>500</h1>
    <p>Internal server error<br><br>
    <a class="btn waves-effect waves-light btn-large red" href="https://homebase.rf.gd" style="text-align:center">Home</a>
    </p>
    
    <img src="https://images.vexels.com/media/users/3/152639/isolated/preview/506b575739e90613428cdb399175e2c8-space-astronaut-cartoon-by-vexels.png" class="img">

</body>
</html>
