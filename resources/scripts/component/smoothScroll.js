import Lenis from 'lenis'

export default function smoothScroll() {
 // Initialize Lenis
const lenis = new Lenis({
  autoRaf: true,
});

// Listen for the scroll event and log the event data
lenis.on('scroll', (e) => {
  if (e.animatedScroll > 10) {
    if (!document.body.classList.contains('scrolled-down')) {
      document.body.classList.add('scrolled-down');
    }
  } else {
    if (document.body.classList.contains('scrolled-down')) {
      document.body.classList.remove('scrolled-down');
    }
  }
  
});
}

import.meta.webpackHot?.accept(smoothScroll);