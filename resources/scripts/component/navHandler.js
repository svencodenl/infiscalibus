export default function navHandler() {
  const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
  if (!isMobile) return;

	const BODY = document.body;
	const classname = 'menu-is-open';

	const menuButton = document.querySelector('.mobile-handler');
	menuButton.addEventListener('click', () => {
		if (!BODY.classList.contains(classname)) {
			BODY.classList.add(classname);
		} else {
			BODY.classList.remove(classname);
		}
	});

	const menuItems = document.querySelectorAll('.navbar a');
	menuItems.forEach((item) => {
		item.addEventListener('click', () => {
			if (!BODY.classList.contains(classname)) {
				BODY.classList.add(classname);
			} else {
				BODY.classList.remove(classname);
			}
		})
	})
}

import.meta.webpackHot?.accept(navHandler);