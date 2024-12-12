<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @charset "UTF-8";
:root {
  --color-primary: #ee75d2;
  --hue: 190deg;
  --sat: 50%;
  --blur: 0px;
  --color-secondary: #75d8ee;
  --color-tertiary: #deee75;
  --color-quaternary: #9375ee;
  --color-surface: black;
  --bg: linear-gradient(
    to bottom,
    color-mix(in srgb, var(--color-quaternary), black 70%),
    var(--color-surface)
  );
  --color-on-surface: var(--color-primary);
  --hover-filter: brightness(1.2);
}
@media (any-pointer: fine) {
  :root {
    --icon-filter: saturate(3.4) brightness(0.5) invert(1);
    --ripple-filter: blur(1rem);
  }
}

.vision-ui {
  --color-surface-container: rgba(255, 255, 255, 0.35);
  --color-on-surface: white;
  --hover-filter: brightness(1.5);
}
@media (any-pointer: fine) {
  .vision-ui {
    --icon-filter: saturate(0.4);
    --ripple-filter: filter(0.2rem);
  }
}

@property --index {
  syntax: "<number>";
  initial-value: 0;
  inherits: true;
}
@property --ripple-factor {
  syntax: "<number>";
  initial-value: 0;
  inherits: true;
}
:root {
  --hexagon-size: 8vmin;
  --gap: 0.1vmin;
}

.container {
  display: flex;
  position: relative;
  align-items: center;
}
.container .column {
  margin: 0 -0.2vmin;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.hexagon {
  --mix-percentage: calc(var(--column) * var(--index) * 3%);
  width: var(--hexagon-size);
  aspect-ratio: 1;
  position: relative;
  background: var(--color-surface-container, color-mix(in srgb, var(--color-secondary), var(--color-primary) var(--mix-percentage)));
  -webkit-backdrop-filter: blur(1rem);
          backdrop-filter: blur(1rem);
  -webkit-clip-path: polygon(98.66024% 45%, 99.39693% 46.5798%, 99.84808% 48.26352%, 100% 50%, 99.84808% 51.73648%, 99.39693% 53.4202%, 98.66025% 55%, 78.66025% 89.64102%, 77.66044% 91.06889%, 76.42788% 92.30146%, 75% 93.30127%, 73.4202% 94.03794%, 71.73648% 94.48909%, 70% 94.64102%, 30% 94.64102%, 28.26352% 94.48909%, 26.5798% 94.03794%, 25% 93.30127%, 23.57212% 92.30146%, 22.33956% 91.06889%, 21.33975% 89.64102%, 1.33975% 55%, 0.60307% 53.4202%, 0.15192% 51.73648%, 0% 50%, 0.15192% 48.26352%, 0.60307% 46.5798%, 1.33975% 45%, 21.33975% 10.35898%, 22.33956% 8.93111%, 23.57212% 7.69854%, 25% 6.69873%, 26.5798% 5.96206%, 28.26352% 5.51091%, 30% 5.35898%, 70% 5.35898%, 71.73648% 5.51091%, 73.4202% 5.96206%, 75% 6.69873%, 76.42788% 7.69854%, 77.66044% 8.93111%, 78.66025% 10.35898%);
          clip-path: polygon(98.66024% 45%, 99.39693% 46.5798%, 99.84808% 48.26352%, 100% 50%, 99.84808% 51.73648%, 99.39693% 53.4202%, 98.66025% 55%, 78.66025% 89.64102%, 77.66044% 91.06889%, 76.42788% 92.30146%, 75% 93.30127%, 73.4202% 94.03794%, 71.73648% 94.48909%, 70% 94.64102%, 30% 94.64102%, 28.26352% 94.48909%, 26.5798% 94.03794%, 25% 93.30127%, 23.57212% 92.30146%, 22.33956% 91.06889%, 21.33975% 89.64102%, 1.33975% 55%, 0.60307% 53.4202%, 0.15192% 51.73648%, 0% 50%, 0.15192% 48.26352%, 0.60307% 46.5798%, 1.33975% 45%, 21.33975% 10.35898%, 22.33956% 8.93111%, 23.57212% 7.69854%, 25% 6.69873%, 26.5798% 5.96206%, 28.26352% 5.51091%, 30% 5.35898%, 70% 5.35898%, 71.73648% 5.51091%, 73.4202% 5.96206%, 75% 6.69873%, 76.42788% 7.69854%, 77.66044% 8.93111%, 78.66025% 10.35898%);
  cursor: pointer;
}
@media (hover) {
  .hexagon:hover {
    filter: var(--hover-filter);
  }
}
.hexagon:after {
  content: var(--icon);
  display: grid;
  place-items: center;
  position: absolute;
  filter: var(--icon-filter);
  font-size: 2.5vmin;
  inset: 0;
}

@-webkit-keyframes ripple {
  from {
    transform: scale(1);
    opacity: 1;
  }
  50% {
    transform: scale(max(0.8, calc(var(--ripple-factor) / 100)));
    opacity: 0.42;
  }
  65% {
    opacity: 1;
  }
  70% {
    transform: scale(1.5);
    filter: var(--ripple-filter);
  }
  to {
    transform: scale(1);
    opacity: 1;
  }
}

@keyframes ripple {
  from {
    transform: scale(1);
    opacity: 1;
  }
  50% {
    transform: scale(max(0.8, calc(var(--ripple-factor) / 100)));
    opacity: 0.42;
  }
  65% {
    opacity: 1;
  }
  70% {
    transform: scale(1.5);
    filter: var(--ripple-filter);
  }
  to {
    transform: scale(1);
    opacity: 1;
  }
}
.container.show-ripple {
  pointer-events: none;
}
.container.show-ripple .hexagon {
  cursor: default;
  --duration: 0.45s;
  -webkit-animation: ripple var(--duration) ease-in-out;
          animation: ripple var(--duration) ease-in-out;
  -webkit-animation-duration: max(var(--duration), calc(var(--duration) * var(--ripple-factor) / 100));
          animation-duration: max(var(--duration), calc(var(--duration) * var(--ripple-factor) / 100));
  -webkit-animation-delay: calc(var(--ripple-factor) * 8ms);
          animation-delay: calc(var(--ripple-factor) * 8ms);
}

.switch {
  --mix-percentage: calc(var(--column) * var(--index) * 3%);
  width: var(--hexagon-size);
  aspect-ratio: 1;
  position: relative;
  background: var(--color-surface-container, color-mix(in srgb, var(--color-secondary), var(--color-primary) var(--mix-percentage)));
  -webkit-backdrop-filter: blur(1rem);
          backdrop-filter: blur(1rem);
  -webkit-clip-path: polygon(98.66024% 45%, 99.39693% 46.5798%, 99.84808% 48.26352%, 100% 50%, 99.84808% 51.73648%, 99.39693% 53.4202%, 98.66025% 55%, 78.66025% 89.64102%, 77.66044% 91.06889%, 76.42788% 92.30146%, 75% 93.30127%, 73.4202% 94.03794%, 71.73648% 94.48909%, 70% 94.64102%, 30% 94.64102%, 28.26352% 94.48909%, 26.5798% 94.03794%, 25% 93.30127%, 23.57212% 92.30146%, 22.33956% 91.06889%, 21.33975% 89.64102%, 1.33975% 55%, 0.60307% 53.4202%, 0.15192% 51.73648%, 0% 50%, 0.15192% 48.26352%, 0.60307% 46.5798%, 1.33975% 45%, 21.33975% 10.35898%, 22.33956% 8.93111%, 23.57212% 7.69854%, 25% 6.69873%, 26.5798% 5.96206%, 28.26352% 5.51091%, 30% 5.35898%, 70% 5.35898%, 71.73648% 5.51091%, 73.4202% 5.96206%, 75% 6.69873%, 76.42788% 7.69854%, 77.66044% 8.93111%, 78.66025% 10.35898%);
          clip-path: polygon(98.66024% 45%, 99.39693% 46.5798%, 99.84808% 48.26352%, 100% 50%, 99.84808% 51.73648%, 99.39693% 53.4202%, 98.66025% 55%, 78.66025% 89.64102%, 77.66044% 91.06889%, 76.42788% 92.30146%, 75% 93.30127%, 73.4202% 94.03794%, 71.73648% 94.48909%, 70% 94.64102%, 30% 94.64102%, 28.26352% 94.48909%, 26.5798% 94.03794%, 25% 93.30127%, 23.57212% 92.30146%, 22.33956% 91.06889%, 21.33975% 89.64102%, 1.33975% 55%, 0.60307% 53.4202%, 0.15192% 51.73648%, 0% 50%, 0.15192% 48.26352%, 0.60307% 46.5798%, 1.33975% 45%, 21.33975% 10.35898%, 22.33956% 8.93111%, 23.57212% 7.69854%, 25% 6.69873%, 26.5798% 5.96206%, 28.26352% 5.51091%, 30% 5.35898%, 70% 5.35898%, 71.73648% 5.51091%, 73.4202% 5.96206%, 75% 6.69873%, 76.42788% 7.69854%, 77.66044% 8.93111%, 78.66025% 10.35898%);
  cursor: pointer;
  --index: 6;
  --column: 2;
  position: absolute;
  display: flex;
  top: 4vmin;
  right: 4vmin;
  width: 8vmin;
  height: 4vmin;
  cursor: pointer;
  font-size: 2vmin;
}
.switch:after {
  --mix-percentage: calc(var(--column) * var(--index) * 3%);
  width: var(--hexagon-size);
  aspect-ratio: 1;
  position: relative;
  background: var(--color-surface-container, color-mix(in srgb, var(--color-secondary), var(--color-primary) var(--mix-percentage)));
  -webkit-backdrop-filter: blur(1rem);
          backdrop-filter: blur(1rem);
  -webkit-clip-path: polygon(98.66024% 45%, 99.39693% 46.5798%, 99.84808% 48.26352%, 100% 50%, 99.84808% 51.73648%, 99.39693% 53.4202%, 98.66025% 55%, 78.66025% 89.64102%, 77.66044% 91.06889%, 76.42788% 92.30146%, 75% 93.30127%, 73.4202% 94.03794%, 71.73648% 94.48909%, 70% 94.64102%, 30% 94.64102%, 28.26352% 94.48909%, 26.5798% 94.03794%, 25% 93.30127%, 23.57212% 92.30146%, 22.33956% 91.06889%, 21.33975% 89.64102%, 1.33975% 55%, 0.60307% 53.4202%, 0.15192% 51.73648%, 0% 50%, 0.15192% 48.26352%, 0.60307% 46.5798%, 1.33975% 45%, 21.33975% 10.35898%, 22.33956% 8.93111%, 23.57212% 7.69854%, 25% 6.69873%, 26.5798% 5.96206%, 28.26352% 5.51091%, 30% 5.35898%, 70% 5.35898%, 71.73648% 5.51091%, 73.4202% 5.96206%, 75% 6.69873%, 76.42788% 7.69854%, 77.66044% 8.93111%, 78.66025% 10.35898%);
          clip-path: polygon(98.66024% 45%, 99.39693% 46.5798%, 99.84808% 48.26352%, 100% 50%, 99.84808% 51.73648%, 99.39693% 53.4202%, 98.66025% 55%, 78.66025% 89.64102%, 77.66044% 91.06889%, 76.42788% 92.30146%, 75% 93.30127%, 73.4202% 94.03794%, 71.73648% 94.48909%, 70% 94.64102%, 30% 94.64102%, 28.26352% 94.48909%, 26.5798% 94.03794%, 25% 93.30127%, 23.57212% 92.30146%, 22.33956% 91.06889%, 21.33975% 89.64102%, 1.33975% 55%, 0.60307% 53.4202%, 0.15192% 51.73648%, 0% 50%, 0.15192% 48.26352%, 0.60307% 46.5798%, 1.33975% 45%, 21.33975% 10.35898%, 22.33956% 8.93111%, 23.57212% 7.69854%, 25% 6.69873%, 26.5798% 5.96206%, 28.26352% 5.51091%, 30% 5.35898%, 70% 5.35898%, 71.73648% 5.51091%, 73.4202% 5.96206%, 75% 6.69873%, 76.42788% 7.69854%, 77.66044% 8.93111%, 78.66025% 10.35898%);
  display: grid;
  place-items: center;
  --index: 6;
  --column: 4;
  content: "👾";
  position: absolute;
  left: 0;
  top: 0;
  height: 4vmin;
  width: 6vmin;
  transition: transform 0.3s ease;
}
.switch.checked:after {
  transform: translateX(2vmin);
  content: "🕶️";
}

body {
  width: 100vw;
  height: 100vh;
  display: grid;
  place-items: center;
  background: var(--bg);
  color: var(--color-on-surface);
  overflow: hidden;
}
body:before {
  content: "";
  position: absolute;
  inset: 0;
  pointer-events: none;
  background: radial-gradient(at center, transparent 80%, black), linear-gradient(to top, rgba(0, 0, 0, 0.3) 70%, transparent), url(https://assets.codepen.io/907471/vision-pro-palm.jpg) no-repeat 45% center/cover;
  opacity: 0;
  filter: blur(0.5rem);
  transition: opacity 0.6s ease-in-out, filter 0.6s ease-in-out;
}

.vision-ui body:before {
  opacity: 1;
  filter: blur(0);
}

* {
  box-sizing: border-box;
}

a.labs-follow-me {
  display: flex;
  align-items: flex-end;
  justify-content: center;
  left: 2rem;
  right: 2rem;
  bottom: 0.5vh;
  top: unset;
  text-align: center;
}
a.labs-follow-me svg {
  width: 10vmin;
}

#app div {
  --hue2: calc(var(--hue) + 60deg);
  --sat2: calc(var(--sat) + 10%);
  --clr: hsl(var(--hue) var(--sat) 90%);
  --clr2: hsl(var(--hue2) var(--sat2) 85%);
  --text: hsla(var(--hue), 70%, 10%, 0.9);
  --gradoffset: 45%;
  --gradgap: 30%;
}

#app .custom {
  --hue: 30deg;
  --sat: 50%;
  --hue2: 5deg;
  --sat2: 80%;
}

button {
  font-size: 3vw;
   {
    font-size: 3vw;
  }

  color: var(--text);
  font-weight: 500;
  letter-spacing: -0.025em;
  background-color: var(--clr);
  background-image: linear-gradient(
    180deg,
    var(--clr2) var(--gradgap),
    transparent calc(100% - var(--gradgap))
  );
  background-repeat: no-repeat;
  background-position: center var(--gradoffset);
  background-size: 100% 200%;
  padding: 1.1em 1.5em;
  border-radius: 2em;
  border: none;

  &::before,
  &::after {
    content: "";
    inset: 0;
    position: absolute;
    border-radius: 5em;
  }

  // darkening
  &::before {
    background-image: radial-gradient(
        ellipse,
        hsla(var(--hue), 100%, 90%, 0.8) 20%,
        transparent 50%,
        transparent 200%
      ),
      linear-gradient(
        90deg,
        hsl(0deg, 0%, 25%) -10%,
        transparent 30%,
        transparent 70%,
        hsl(0deg, 0%, 25%) 110%
      );
    box-shadow: inset 0 0.25em 0.75em hsla(0deg, 0%, 0%, 0.8),
      inset 0 -0.05em 0.2em rgba(255, 255, 255, 0.4),
      inset 0 -1px 3px hsla(var(--hue), 80%, 50%, 0.75);
    background-blend-mode: overlay;
    background-repeat: no-repeat;
    background-size: 200% 80%, cover;
    background-position: center 220%;
    mix-blend-mode: overlay;
    filter: blur(calc(var(--blur) * 0.5));
  }

  // reflection
  &::after {
    background: linear-gradient(
      180deg,
      hsla(var(--hue2), 100%, 90%, 0.9),
      hsla(var(--hue2), calc(var(--sat2) * 0.7), 50%, 0.75) 40%,
      transparent 80%
    );
    top: 0.075em;
    left: 0.75em;
    right: 0.75em;
    bottom: 1.4em;
    filter: blur(var(--blur));
    mix-blend-mode: screen;
  }

  &:hover,
  &:active,
  &:focus {
    outline: none;
    box-shadow: 0 -0.2em 1em hsla(var(--hue2), 70%, 80%, 0.3),
      0 0.5em 1.5em hsla(var(--hue), 70%, 80%, 0.5),
      0 0.25em 0.3em -0.2em hsl(var(--hue) 90% 70%),
      0 0.25em 0.5em hsla(var(--hue), 20%, 30%, 0.2),
      inset 0 -2px 2px rgba(255, 255, 255, 0.2);
    background-position: center calc(var(--gradoffset) - 0.75em);
  }
}

.static button {
  position: relative;
}
.static button .spinner {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateY(0.75em) translateX(-50%);
  opacity: 0;
  margin: 0;
  font-size: 2em;
  mix-blend-mode: overlay;
}
.static button span,
.static button svg,
.static button .spinner {
  transition: all 0.33s ease;
}

.static button:active,
.static button:focus {
  span,
  svg:not(.spinner) {
    transform: translateY(-1em);
    opacity: 0;
    filter: blur(5px);
  }
  .spinner {
    transform: translateY(-0.5em) translateX(-50%);
    opacity: 1;
  }
}

// app styles

button {
  font-family: var(--font);
  display: flex;
}

svg {
  height: 1em;
  width: auto;
  margin-left: 0.33em;
}

button svg,
button span {
  display: inline-flex;
  align-content: center;
  align-self: center;
  filter: drop-shadow(0 1px 0 hsla(var(--hue), 90%, 88%, 1));
}

#app {
  display: grid;
  gap: 2vw;
  @media screen and (min-width: 660px) {
    grid-template-columns: auto auto;
    grid-template-rows: min-content auto max-content;
  }
}

h1,
p {
  grid-column: 1/-1;
}

#app > div {
  position: relative;
  border-radius: 2vw;
  min-height: 200px;
  background-color: hsl(var(--hue), 20%, 95%);
  background-image: linear-gradient(33deg, transparent 60%, var(--clr)),
    linear-gradient(210deg, transparent 60%, var(--clr2));
  background-size: 150%;
  background-position: center;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px,
    rgba(0, 0, 0, 0.05) 0px 5px 10px;
}



a {
  color: #6adcf6;
}

input[type="range"] {
  position: absolute;
  top: 0.5em;
  left: 0.5em;
  right: 0.5em;
  width: auto;
  max-width: 40%;
}

#hue1 {
  top: auto;
  bottom: 0.5em;
}

#sat1 {
  top: auto;
  bottom: 0.5em;
  left: auto;
}

#hue2 {
}

#sat2 {
  left: auto;
}

#grad {
  left: auto;
  top: 50%;
  transform: translateY(-50%);
}
#gradoff {
  top: 50%;
  transform: translateY(-50%);
}

#blur {
  top: auto;
  bottom: 0.5em;
  left: 50%;
  transform: translateX(-50%);
}

input {
  font-family: inherit;
  color: white;
  background: #3b3d4c;
  padding: 0.875em;
  border-radius: 8px;
  border: 1px solid transparent;
  outline: 1px solid transparent;
  accent-color: var(--clr);
  box-shadow: 0 3px 2px -3px var(--clr);
  transition: border 0.3s ease-in, outline 0.6s ease-in, box-shadow 0.6s ease-in;

  &:focus {
    border-color: var(--clr2);
    outline-color: var(--clr2);
    transition: border 0.6s ease-out, outline 0.3s ease-out,
      box-shadow 0.3s ease-out;
  }

  &::placeholder {
    opacity: 0.33;
    font-style: italic;
  }
}

input[type="range"] {
  appearance: none;
  height: calc(1em + 2px * 2);
  background: #3b3d4c;
  border: none;
  outline: none;
  padding: 0 5px;
  border-radius: 1em;

  &,
  &* {
    transition: all 0.5s ease;
  }
}

@mixin range-thumb {
  appearance: none;
  width: 1em;
  height: 1em;
  border: none;
  outline: none;
  background: #eee;
  border-radius: 1em;
  transform: translate3d(0, 0, 0);
}

@mixin range-track {
  background: #3b3d4c;
  display: block;
  width: calc(100% + 5px * 2);
  height: calc(1em + 5px * 2);
  border-radius: 1em;
  margin-inline: calc(5px * -1);
  transition: opacity 0.5s ease-in, background 0.5s ease-in;
  opacity: 0;
  will-change: opacity, background;
}

input[type="range"]::-webkit-slider-runnable-track {
  @include range-track;
  background: #3b3d4c;
  padding: 0.25em 5px;
  opacity: 1;
}
input[type="range"]::-moz-range-track {
  @include range-track;
}
input[type="range"]::-ms-track {
  @include range-track;
}

input[type="range"]::-webkit-slider-thumb {
  @include range-thumb;
}
input[type="range"]::-moz-range-thumb {
  @include range-thumb;
}
input[type="range"]::-ms-thumb {
  @include range-thumb;
}

input[type="range"][orient="vertical"] {
  writing-mode: bt-lr;
  height: 120px;
  width: 1em;
  appearance: slider-vertical;
}

.spinner path {
  transform-origin: center;
  animation: spin 0.75s infinite linear;
}

@keyframes spin {
  100% {
    transform: rotate(360deg);
  }
}


    </style>
</head>
<body>
<div class="container" id="container">
  <div class="column" style="--column: 0">
    <div class="hexagon" style="--index: 1; --icon: '🚀';"></div>
    <div class="hexagon" style="--index: 2; --icon: '🎸';"></div>
    <div class="hexagon" style="--index: 3; --icon: '🤖';"></div>
    <div class="hexagon" style="--index: 4; --icon: '🫶';"></div>
    <div class="hexagon" style="--index: 5; --icon: '🔥';"></div>
  </div>
  <div class="column" style="--column: 1">
    <div class="hexagon" style="--index: 1; --icon: '🕹️';"></div>
    <div class="hexagon" style="--index: 2; --icon: '👾';"></div>
    <div class="hexagon" style="--index: 3; --icon: '✨';"></div>
    <div class="hexagon" style="--index: 4; --icon: '🌴';"></div>
    <div class="hexagon" style="--index: 5; --icon: '🖥️';"></div>
    <div class="hexagon" style="--index: 6; --icon: '💻';"></div>
  </div>
  <div class="column" style="--column: 2">
    <div class="hexagon" style="--index: 1; --icon: '⌨️';"></div>
    <div class="hexagon" style="--index: 2; --icon: '💡';"></div>
    <div class="hexagon" style="--index: 3; --icon: '🕶️';"></div>
    <div class="hexagon" style="--index: 4; --icon: '⚙️';"></div>
    <div class="hexagon" style="--index: 5; --icon: '🍒';"></div>
    <div class="hexagon" style="--index: 6; --icon: '🧙‍♂️';"></div>
    <div class="hexagon" style="--index: 7; --icon: '🎮';"></div>
  </div>
  <div class="column" style="--column: 3">
    <div class="hexagon" style="--index: 1; --icon: '👽';"></div>
    <div class="hexagon" style="--index: 2; --icon: '🌌';"></div>
    <div class="hexagon" style="--index: 3; --icon: '🎧';"></div>
    <div class="hexagon" style="--index: 4; --icon: '🌒';"></div>
    <div class="hexagon" style="--index: 5; --icon: '🌓';"></div>
    <div class="hexagon" style="--index: 6; --icon: '🌔';"></div>
    <div class="hexagon" style="--index: 7; --icon: '🎵';"></div>
    <div class="hexagon" style="--index: 8; --icon: '🎶';"></div>
  </div>
  <div class="column" style="--column: 4">
    <div class="hexagon" style="--index: 1; --icon: '❤️';"></div>
    <div class="hexagon" style="--index: 2; --icon: '🎙️';"></div>
    <div class="hexagon" style="--index: 3; --icon: '📸';"></div>
    <div class="hexagon" style="--index: 4; --icon: '🕰️';"></div>
    <div class="hexagon" style="--index: 5; --icon: '🚀';"></div>
    <div class="hexagon" style="--index: 6; --icon: '🎸';"></div>
    <div class="hexagon" style="--index: 7; --icon: '🤖';"></div>
    <div class="hexagon" style="--index: 8; --icon: '🫶';"></div>
    <div class="hexagon" style="--index: 9; --icon: '🔥';"></div>
  </div>
  <div class="column" style="--column: 5">
    <div class="hexagon" style="--index: 1; --icon: '🕹️';"></div>
    <div class="hexagon" style="--index: 2; --icon: '👾';"></div>
    <div class="hexagon" style="--index: 3; --icon: '✨';"></div>
    <div class="hexagon" style="--index: 4; --icon: '🌴';"></div>
    <div class="hexagon" style="--index: 5; --icon: '🖥️';"></div>
    <div class="hexagon" style="--index: 6; --icon: '💻';"></div>
    <div class="hexagon" style="--index: 7; --icon: '⌨️';"></div>
    <div class="hexagon" style="--index: 8; --icon: '💡';"></div>
  </div>
  <div class="column" style="--column: 6">
    <div class="hexagon" style="--index: 1; --icon: '🕶️';"></div>
    <div class="hexagon" style="--index: 2; --icon: '⚙️';"></div>
    <div class="hexagon" style="--index: 3; --icon: '🍒';"></div>
    <div class="hexagon" style="--index: 4; --icon: '🦄';"></div>
    <div class="hexagon" style="--index: 5; --icon: '📱';"></div>
    <div class="hexagon" style="--index: 6; --icon: '🖨️';"></div>
    <div class="hexagon" style="--index: 7; --icon: '📡';"></div>
  </div>
  <div class="column" style="--column: 7">
    <div class="hexagon" style="--index: 1; --icon: '🔬';"></div>
    <div class="hexagon" style="--index: 2; --icon: '🔭';"></div>
    <div class="hexagon" style="--index: 3; --icon: '🎚️';"></div>
    <div class="hexagon" style="--index: 4; --icon: '🎛️';"></div>
    <div class="hexagon" style="--index: 5; --icon: '🧬';"></div>
    <div class="hexagon" style="--index: 6; --icon: '🔮';"></div>
  </div>
  <div class="column" style="--column: 8">
    <div class="hexagon" style="--index: 1; --icon: '🧲';"></div>
    <div class="hexagon" style="--index: 2; --icon: '🛸';"></div>
    <div class="hexagon" style="--index: 3; --icon: '🪐';"></div>
    <div class="hexagon" style="--index: 4; --icon: '🌠';"></div>
    <div class="hexagon" style="--index: 5; --icon: '👓';"></div>
  </div>
</div>
<div class="switch" id="switch"></div>

<main id="app">
        <div class="static">
            <button>
                <a href="syntax.php">
                    <span>Get Started</span>
                    <svg viewBox="0 0 22 22" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <line x1="15" y1="16" x2="19" y2="12"></line>
                        <line x1="15" y1="8" x2="19" y2="12"></line>
                    </svg>
                </a>
                <svg class="spinner" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.14,1.16a11,11,0,0,0-9,8.92A1.59,1.59,0,0,0,2.46,12,1.52,1.52,0,0,0,4.11,10.7a8,8,0,0,1,6.66-6.61A1.42,1.42,0,0,0,12,2.69h0A1.57,1.57,0,0,0,10.14,1.16Z"/>
                </svg>
            </button>
        </div>
    </main>
</body>
<script>
(() => {
  const container = document.getElementById("container");

  const hexagons = container.querySelectorAll(".hexagon");
  const hexagonElements = new Array(...hexagons);

  const ripple = (target) => {
    if (container.classList.contains("show-ripple")) {
      return;
    }
    const targetRect = target.getBoundingClientRect();
    const data = hexagonElements
      .map((element) => {
        const rect = element.getBoundingClientRect();
        const centerX = rect.x + rect.width / 2;
        const centerY = rect.y + rect.height / 2;
        const distance = Math.round(
          Math.sqrt(
            Math.pow(rect.x - targetRect.x, 2) +
              Math.pow(rect.y - targetRect.y, 2)
          )
        );
        return { element, rect, centerX, centerY, distance };
      })
      .sort((a, b) =>
        a.distance > b.distance ? 1 : a.distance < b.distance ? -1 : 0
      );

    const [max] = data.slice(-1);
    data.forEach((item) =>
      item.element.style.setProperty(
        "--ripple-factor",
        `${(item.distance * 100) / max.distance}`
      )
    );
    container.classList.toggle("show-ripple");
    const cleanUp = () => {
      requestAnimationFrame(() => {
        container.classList.remove("show-ripple");
        data.forEach((item) =>
          item.element.style.removeProperty("--ripple-factor")
        );
        max.element.removeEventListener("animationend", cleanUp);
      });
    };
    max.element.addEventListener("animationend", cleanUp);
  };

  hexagons.forEach((hexagon) => {
    hexagon.addEventListener("click", () => {
      ripple(hexagon, hexagons);
    });
  });

   const switchButton = document.getElementById('switch');
    const toggleTheme = () => {
        switchButton.classList.toggle('checked');
        document.documentElement.classList.toggle('vision-ui');
    };
    switchButton.addEventListener('click', toggleTheme);

    // demo
    setTimeout(() => {
    ripple(hexagonElements[0], hexagons);
    setTimeout(() => {
      toggleTheme();
      setTimeout(() => {
        ripple(hexagonElements[0], hexagons);
      }, 600);
    }, 900);
  }, 300);
})();

let randomise = () => {
  
  $("#hue1").val( Math.floor(Math.random() * 360) );
  $("#sat1").val( Math.floor(Math.random() * 360) );
  $("#hue2").val( Math.floor(Math.random() * 70) + 15 );
  $("#sat2").val( Math.floor(Math.random() * 70) + 15 );
  $("#grad").val( Math.floor(Math.random() * 10) + 20 );
  $("#gradoff").val( Math.floor(Math.random() * 20) + 40 );
  
  $(".custom").css({
    "--hue":  $("#hue1").val() + "deg",
    "--sat":  $("#sat1").val() + "%",
    "--hue2": $("#hue2").val() + "deg",
    "--sat2": $("#sat2").val() + "%",
    "--gradgap": $("#grad").val() + "%",
    "--gradoffset": $("#gradoff").val() + "%"
  });
}

setTimeout( () => {
  $("input[type=range]").on("change", (e) => {
    $(".custom").css({
      "--hue":  $("#hue1").val() + "deg",
      "--sat":  $("#sat1").val() + "%",
      "--hue2": $("#hue2").val() + "deg",
      "--sat2": $("#sat2").val() + "%",
      "--gradgap": $("#grad").val() + "%",
      "--gradoffset": $("#gradoff").val() + "%"
    });
    $("#app").css({
      "--blur": $("#blur").val() + "px"
    });
  });
}, 1000 );

document.addEventListener("DOMContentLoaded", function() {
            const button = document.querySelector('.static button');
            const link = button.querySelector('a');
            const spinner = button.querySelector('.spinner');

            button.addEventListener('click', function(event) {
                event.preventDefault();
                spinner.style.display = 'block';
                link.style.display = 'none';
                setTimeout(() => {
                    window.location.href = link.href;
                }, 1000); // Adjust delay as needed
            });
        });

function HexToHSL(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);

    var r = parseInt(result[1], 16);
    var g = parseInt(result[2], 16);
    var b = parseInt(result[3], 16);

    r /= 255, g /= 255, b /= 255;
    var max = Math.max(r, g, b), min = Math.min(r, g, b);
    var h, s, l = (max + min) / 2;

    if(max == min){
        h = s = 0; // achromatic
    } else {
        var d = max - min;
        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
        switch(max) {
            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
            case g: h = (b - r) / d + 2; break;
            case b: h = (r - g) / d + 4; break;
        }
        
        h /= 6;
    }

    s = s*100;
    s = Math.round(s);
    l = l*100;
    l = Math.round(l);
    h = Math.round(360*h);

    return {h, s, l};
}

</script>
</html>