const hamburgerIcon = document.querySelector('.hamburger-icon');
const hamburgerMenu = document.querySelector('.hamburger-menu')

const toggleHamburger = () => {
    hamburgerMenu.classList.toggle('hamburger_expanded');
}

hamburgerIcon.addEventListener('click', toggleHamburger)

