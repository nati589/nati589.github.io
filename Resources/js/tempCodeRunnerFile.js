 const header = document.querySelector("header");
 const sectionOne = document.querySelector("#herosection");

 const sectionOneOptions = {};
 const sectionOneObserver = new IntersectionObserver(function(entries, sectionOneObserver) {
     entries.forEach(entry => {
         console.log(entry.target);
     });
 }, sectionOneOptions); 

 sectionOneObserver.observe(sectionOne);