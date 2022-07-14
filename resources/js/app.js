require('./bootstrap');

import Alpine from 'alpinejs';

import 'flowbite';


window.Alpine = Alpine;

Alpine.start();


// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.theme === 'dark' ||
    (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    localStorage.theme === 'dark';
    document.documentElement.classList.add('dark');
} else {
    localStorage.theme === 'light';
    document.documentElement.classList.remove('dark');
}