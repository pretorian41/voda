import './stimulus_bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import Inputmask from 'inputmask';

document.addEventListener('DOMContentLoaded', () => {
    const phones = document.querySelectorAll('[data-phone]');

    if (!phones.length) return;

    Inputmask({
        mask: '+380 (99) 999-99-99',
        showMaskOnHover: false,
        showMaskOnFocus: true,
        clearIncomplete: true,
    }).mask(phones);
});
