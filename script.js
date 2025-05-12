
  // Smooth scrolling for navigation links
  document.querySelectorAll('nav ul li a').forEach(anchor => {
    anchor.addEventListener('click', function(event) {
      event.preventDefault();
      const targetSection = document.querySelector(this.getAttribute('href'));
      targetSection.scrollIntoView({
        behavior: 'smooth'
      });
    });
  });

  // Active navigation link highlighting based on current section
  const sections = document.querySelectorAll('main section');
  const navLinks = document.querySelectorAll('nav ul li a');

  window.addEventListener('scroll', () => {
    let currentSection = "";
    sections.forEach(section => {
      const sectionTop = section.offsetTop - 70; // adjust offset if needed
      if (window.pageYOffset >= sectionTop) {
        currentSection = section.getAttribute("id");
      }
    });

    navLinks.forEach(link => {
      link.classList.remove("active");
      if (link.getAttribute("href") === '#' + currentSection) {
        link.classList.add("active");
      }
    });
  });

  // Create a Back-to-Top button
  const backToTopBtn = document.createElement('button');
  backToTopBtn.id = 'backToTop';
  backToTopBtn.innerText = 'Back to Top';
  document.body.appendChild(backToTopBtn);

  backToTopBtn.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  // Show or hide the Back-to-Top button based on scroll position
  window.addEventListener('scroll', () => {
    if (window.scrollY > 200) {
      backToTopBtn.style.display = 'block';
    } else {
      backToTopBtn.style.display = 'none';
    }
  });
