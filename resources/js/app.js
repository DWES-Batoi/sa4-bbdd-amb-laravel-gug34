import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

if (window.Echo) {
    window.Echo.channel('futbol-femeni')
        .listen('.PartitActualitzat', (e) => {
            console.log('Evento recibido:', e);
            window.dispatchEvent(new CustomEvent('classificacio-delta', { detail: e.delta }));
        });
}