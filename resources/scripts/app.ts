import alpine from "alpinejs";

Object.assign(window, { Alpine: alpine }).Alpine.start();

import.meta.webpackHot?.accept(console.error);

// Import Externals
import "bootstrap";

// Standard imports
import('./component/navHandler.js').then((module) => {module.default()}).catch((err) => {console.error('Failed to load the module', err)});
import('./component/logoSlider.js').then((module) => {module.default()}).catch((err) => {console.error('Failed to load the module', err)});
import('./component/smoothScroll.js').then((module) => {module.default()}).catch((err) => {console.error('Failed to load the module', err)});
import('./component/bestuurAnchors.js').then((module) => {module.default()}).catch((err) => {console.error('Failed to load the module', err)});
import('./component/googleMaps.js').then((module) => {module.default()}).catch((err) => {console.error('Failed to load the module', err)});