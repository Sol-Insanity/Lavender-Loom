function toggleMenu() {
    // Select the hamburger icon and menu links
    const menu = document.querySelector('.menu-links');
    const hamburger = document.querySelector('.hamburger-icon');
    
    // Toggle the "open" class for both the menu and the hamburger icon
    menu.classList.toggle('open');
    hamburger.classList.toggle('open');}

    function toggleHam() {
        const menuLinks = document.getElementById("menu-links");
        menuLinks.classList.toggle("open"); // Toggle the 'open' class
        const icon = document.querySelector(".hamburger-icon");
        icon.classList.toggle("open"); // Toggle the hamburger icon animation
    }
    