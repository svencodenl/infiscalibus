import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
import {ScrollToPlugin} from 'gsap/ScrollToPlugin';

export default function bestuurAnchors() {
  const containers = document.querySelectorAll('.bestuur-item');
  const isMobile =
    /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent,
    );
  if (!containers) return;
  if (isMobile) return;

  gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

  const navLinks = gsap.utils.toArray('.anchors .anchor-item');
  navLinks.forEach((link) => {
    const scrollToContainer = document.getElementById(
      link.getAttribute('href').replace('#', ''),
    );

    link.addEventListener('click', (e) => {
      e.preventDefault();
      gsap.to(window, {
        scrollTo: {y: scrollToContainer, offsetY: 140},
        ease: 'power2.inOut',
      });
    });
  });

  containers.forEach((container, index) => {
    ScrollTrigger.create({
      trigger: container,
      start: 'top-=40px top+=140px',
      end: 'bottom+=15px top+=100px',
			toggleClass: { targets: navLinks[index], className: "active" },
    });
  });
}

import.meta.webpackHot?.accept(bestuurAnchors);
