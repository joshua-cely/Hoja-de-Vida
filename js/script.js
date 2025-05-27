// script.js

// Agregar un efecto de carga
window.addEventListener('load', () => {
    const loader = document.getElementById('loader');
    const mainContent = document.getElementById('main-content');
    if (loader) {
        loader.classList.add('hidden');
    }
    if (mainContent) {
        mainContent.classList.remove('hidden');
    }
});

// Agregar un efecto de scroll
const scrollButton = document.getElementById('scroll-button');
if (scrollButton) {
    scrollButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// Agregar un efecto de hover
const hoverButton = document.getElementById('hover-button');
if (hoverButton) {
    hoverButton.addEventListener('mouseover', () => {
        hoverButton.classList.add('hover');
    });

    hoverButton.addEventListener('mouseout', () => {
        hoverButton.classList.remove('hover');
    });
}
