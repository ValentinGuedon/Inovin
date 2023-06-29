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


// Display and close modal contact mail in home/index.html.twig
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


// close automatically alert message contact mail in home/index.html.twig
const alertElements = document.querySelectorAll('.sk-success, .sk-error');

function closeAlert() {
    alertElements.forEach(element => {
        element.style.display = 'none';
    });
}

// Choose a time limit (5000 milliseconds)
setTimeout(closeAlert, 5000);



import Deck from './Deck';
import GamePlay from './GamePlay';
import GameUI from './GameUI';

// Instantiate the classes that implement the games functionality.
const deck = new Deck();
const gamePlay = new GamePlay();
const gameUI = new GameUI();

gamePlay.setDeck(deck);
gamePlay.setGameUI(gameUI);
gamePlay.startNewGame();

// Define event handlers for each UI element to start the game
const deckElement = document.querySelector('.deck');
document.querySelector('.deck').addEventListener('click', (event) => {
    gamePlay.turn(event.target.getAttribute('id'));
});

const restartButton = document.querySelector('.restart');
restartButton.addEventListener('click', (event) => {
    gamePlay.startNewGame();
});