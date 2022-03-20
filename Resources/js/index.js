 const headersection = document.querySelector("header");
 const sectionOne = document.querySelector("section#herosection");

 const sectionOneOptions = {};

 const sectionOneObserver = new IntersectionObserver(function(entries, sectionOneObserver) {
     entries.forEach(entry => {
        if(!entry.isIntersecting) {
            headersection.classList.add("nav-scrolled");
        }
        else {
            headersection.classList.remove("nav-scrolled");
        }
     });
 }, sectionOneOptions); 

 sectionOneObserver.observe(sectionOne);