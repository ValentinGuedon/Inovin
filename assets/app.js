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
      