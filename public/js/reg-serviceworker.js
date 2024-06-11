$(function() {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('/none-sw.js')
            .then(function() { console.log('none-Service Worker: Service Worker Registered'); });
    }
})