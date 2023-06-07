/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

import { TimelineMax } from 'gsap';

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

const titre = document.querySelector('h1');
const txt = document.querySelector('p');
const btn = document.querySelector('.cta-accueil');
const imgwine = document.querySelector('.img-wine');
const allItems = document.querySelector('.liennav');

const TL1 = new TimelineMax({ paused: true });

TL1
    .from(titre, 1, { y: -100, opacity: 0 })
    .from(txt, 1, { opacity: 0 }, '-=0.4')
    .from(btn, 1, { opacity: 0 }, '-=0.5')
    .from(imgwine, 1, { x: 100, opacity: 0 }, '-=0.5');

TL1.play();
