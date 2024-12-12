import {gsap} from 'gsap';
import {horizontalLoop} from 'scripts/utils/horizontalLoop.js';

export default function logoSlider() {
  const containers = document.querySelectorAll('.logo-slider-container');
  if (!containers) return;

  const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

  containers.forEach((container, index) => {
    // Create array of elements to tween on
    const items = gsap.utils.toArray('.logo-slider-item', container);

    // Setup the tween
    const loop = horizontalLoop(items, {
      paused: true, // Sets the tween to be paused initially
      repeat: -1, // Makes sure the tween runs infinitely
      speed: isMobile ? 0.5 + index * 0.20 : 1 + index * 0.25,
      draggable: true,
      paddingRight: parseFloat(gsap.getProperty(items[0], "marginRight", "px")) * 2,
    });

    // Pause loop on mouseenter
    // And resume after mouseleave
    items.forEach(item => {
      item.addEventListener("mouseenter", () => gsap.to(loop, {timeScale: 0, overwrite: true}));
      item.addEventListener("mouseleave", () => gsap.to(loop, {timeScale: 1, overwrite: true}));
    });

    // Start the tween
    loop.play();
  });
}

import.meta.webpackHot?.accept(logoSlider);
