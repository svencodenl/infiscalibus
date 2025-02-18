/* eslint-disable no-undef */
export default function googleMaps() {
  const elements = document.querySelectorAll('.google-map');

  let map;

  /** initMap */
  async function initMap(el) {
    const markers = el.querySelectorAll('.marker');
    // Request libraries when needed, not in the script tag.
    const { Map } = await google.maps.importLibrary('maps');
    const { AdvancedMarkerElement} = await google.maps.importLibrary('marker');

    map = new Map(el, {
      zoom: parseInt(el.dataset.zoom) || 16,
      mapId: 'google_maps',
      center: {lat: 51.8190937, lng: 5.8562839},
      disableDefaultUI: true,
      gestureHandling: 'none',
      zoomControl: false,
    });

    markers.forEach(($marker) => {
      const lat = parseFloat($marker.dataset.lat);
      const lng = parseFloat($marker.dataset.lng);
      const latLng = {lat, lng};

      new AdvancedMarkerElement({
        position: latLng,
        map,
        title: `test`,
        gmpClickable: true,
      });

      map.panTo(latLng);
    });
  }

  elements.forEach(($el) => {
    initMap($el);
  });
}

import.meta.webpackHot?.accept(googleMaps);
