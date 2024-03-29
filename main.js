(function(){
    
    // Hamburger menu
    const nav = document.querySelector('.content');
    const hamburgerButton = document.querySelector('#menu');
    const ul = document.querySelector('ul');

    const toggleNav = function(){
        nav.classList.toggle('active');
        const expanded = nav.classList.contains('active');
        hamburgerButton.setAttribute('aria-expanded', expanded);
        ul.classList.toggle('visible', expanded);
        ul.classList.toggle('hidden', !expanded);

    }

    hamburgerButton.addEventListener('click', toggleNav);
})()