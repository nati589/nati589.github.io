const headersection = document.querySelector('header');
const sectionOne = document.querySelector('section#herosection');

const sectionOneOptions = {
    rootMargin: '-17%'
};

const sectionOneObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if(!entry.isIntersecting) {
            headersection.classList.add('nav-scrolled');
        }
        else {
            headersection.classList.remove('nav-scrolled');
        }
     })
}, sectionOneOptions); 

sectionOneObserver.observe(sectionOne);