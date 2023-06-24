/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import gsap from 'gsap';

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

const titre = document.querySelector('.titre-accueil');
const txt = document.querySelector('.txt-accueil');
const btn = document.querySelector('.cta-accueil');
const imgwine = document.querySelector('.img-wine');
const allItems = document.querySelector('.liennav');

const TL1 = gsap.timeline({ paused: true });

TL1
    .from(titre, { duration: 1, y: -100, opacity: 0 })
    .from(txt, { duration: 1, opacity: 0 }, '-=0.4')
    .from(btn, { duration: 1, opacity: 0 }, '-=0.5')
    .from(imgwine, { duration: 1, x: 100, opacity: 0 }, '-=0.5');

TL1.play();


// Display and close modal contact
const contactButtons = document.querySelectorAll(".contactModal");

contactButtons.forEach((contactButton) => {
    contactButton.addEventListener('click', () => {
        let contactModal = document.querySelector("#content-modal");
        contactModal.style.display = "block";
    });
});

const contactClose = document.querySelector('#contactclose')

contactClose.addEventListener('click', () => {
    let contactModal = document.querySelector("#content-modal");
    contactModal.style.display = "none";
});
