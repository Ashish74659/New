


(function () {

    'use strict';

    if (sessionStorage.getItem('is_visited') == 'dark-mode-switch') {
        document.documentElement.setAttribute('data-bs-theme', 'dark');
    } else if (sessionStorage.getItem('is_visited') == 'light-mode-switch') {
        document.documentElement.setAttribute('data-bs-theme', 'light');
    } else if (sessionStorage.getItem('is_visited') == 'rtl-mode-switch') {
        document.documentElement.setAttribute('data-bs-theme', 'light');
    }

})();
