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
const quiSommesNous = document.querySelector('.quisommesnous');
const textePresentation = document.querySelector('.textedepresentation');
const photoCedric = document.querySelector('.photocedric');

const TL1 = gsap.timeline({ paused: true });

TL1
    .from(titre, { duration: 1, y: -100, opacity: 0 })
    .from(txt, { duration: 1, opacity: 0 }, '-=0.4')
    .from(btn, { duration: 1, opacity: 0 }, '-=0.5')
    .from(imgwine, { duration: 1, x: 100, opacity: 0 }, '-=0.5');

const TL2 = gsap.timeline({ paused: true });

TL2
    .from(quiSommesNous, { duration: 1, y: -100, opacity: 0 })
    .from(textePresentation, { duration: 1,y: -100, opacity: 0 }, '-=0.4')
    .from(photoCedric, { duration: 1, x: -100, opacity: 0 }, '-=0.5');

// Fonction pour vérifier si la section est visible à l'écran
function isElementInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Fonction de gestion de l'événement de défilement
function handleScrollAnimation() {
    if (isElementInViewport(quiSommesNous)) {
        TL2.play();
        // Une fois l'animation jouée, vous pouvez supprimer l'écouteur d'événement pour éviter de répéter l'animation
        window.removeEventListener('scroll', handleScrollAnimation);
    }
}

// Fonction d'animation initiale (première partie)
function playInitialAnimation() {
    TL1.play();
}

// Ajouter un écouteur d'événement de défilement
window.addEventListener('scroll', handleScrollAnimation);

// Lancer l'animation initiale (première partie)
playInitialAnimation();










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

// Add to watchlist user
const watchlists = document.querySelectorAll(".watchlist");

watchlists.forEach((watchlist) => {
    watchlist.addEventListener("click", addToWatchlist);

    function addToWatchlist(e) {
        e.preventDefault();

        const watchlistLink = e.currentTarget;
        const link = watchlistLink.href;

        try {
            fetch(link)
                .then(res => res.json())
                .then(data => {
                    const watchlistIcon = watchlistLink.querySelector(".bi");
                    watchlistIcon.classList.toggle("bi-heart-fill", data.isInWatchlist);
                    watchlistIcon.classList.toggle("bi-heart", !data.isInWatchlist);
                });

        } catch(err) {
            //console.error(err);
        }
    }
});


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
