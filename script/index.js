// Select the navbar
const navbar = document.getElementById('navbar_cn');

// Add an event listener for the scroll event
window.addEventListener('scroll', () => {
  if (window.scrollY > 0) {
    // Add a box shadow when scrolling down
    navbar.style.boxShadow = '0 4px 8px rgb(0 0 0 / 08%), 0 1px 3px rgba(0, 0, 0, 0.08)';
  } else {
    // Remove the box shadow when at the top
    navbar.style.boxShadow = 'none';
  }
});