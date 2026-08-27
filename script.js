document.addEventListener('DOMContentLoaded', () => {
  // Theme Toggle Functionality
  const themeToggleBtn = document.getElementById('themeToggleBtn');
  
  // Load saved theme or default to light
  const savedTheme = localStorage.getItem('theme');
  if (savedTheme === 'dark') {
    document.documentElement.classList.add('dark-mode');
    document.body.classList.add('dark-mode');
  }
  
  // Toggle theme and save to localStorage
  if (themeToggleBtn) {
    themeToggleBtn.addEventListener('click', () => {
      document.documentElement.classList.toggle('dark-mode');
      document.body.classList.toggle('dark-mode');
      const currentTheme = document.body.classList.contains('dark-mode') ? 'dark' : 'light';
      localStorage.setItem('theme', currentTheme);
    });
  }

  const navLinks = document.querySelectorAll('.nav-links a[href^="#"]');
  
  navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const targetId = link.getAttribute('href');
      const targetSection = document.querySelector(targetId);
      
      if (targetSection) {
        const navHeight = 88;
        const targetPosition = targetSection.offsetTop - navHeight;
        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  });

  const navbar = document.querySelector('.navbar');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
      navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
    } else {
      navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.05)';
    }
  });

  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, observerOptions);

  const animateElements = document.querySelectorAll('.service-card, .team-member, .about-text, .about-image');
  
  animateElements.forEach((el, index) => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
    observer.observe(el);
  });

  // Sidebar Toggle Functionality
  const sidebarToggle = document.querySelector('[data-widget="pushmenu"]');
  if (sidebarToggle) {
    sidebarToggle.addEventListener('click', () => {
      document.body.classList.toggle('sidebar-collapsed');
    });
  }

  // Search Toggle Functionality
  const searchToggle = document.querySelector('.search-toggle');
  const searchBoxWrapper = document.querySelector('.search-box-wrapper');
  const searchInput = document.querySelector('.search-input');
  const searchResults = document.querySelector('.search-results');

  // Define searchable pages
  const pages = [
    {
      title: 'Dashboard',
      url: 'dashboard.php',
      keywords: ['dashboard', 'home', 'main']
    },
    {
      title: 'Excel UI',
      url: 'excel.php',
      keywords: ['excel', 'spreadsheet', 'sheet', 'data']
    },
    {
      title: 'Widgets',
      url: 'widgets.php',
      keywords: ['widgets', 'cards', 'widgets ui']
    },
    {
      title: 'Database Manager',
      url: 'database_manager.php',
      keywords: ['database', 'db', 'manager', 'tables', 'schema', 'foreign key']
    }
  ];

  if (searchToggle && searchBoxWrapper) {
    searchToggle.addEventListener('click', (e) => {
      e.preventDefault();
      searchBoxWrapper.classList.toggle('active');
      if (searchBoxWrapper.classList.contains('active')) {
        searchInput.focus();
      } else {
        searchResults.classList.remove('active');
      }
    });
  }

  if (searchInput && searchResults) {
    searchInput.addEventListener('input', (e) => {
      const query = e.target.value.toLowerCase().trim();
      if (query.length === 0) {
        searchResults.classList.remove('active');
        searchResults.innerHTML = '';
        return;
      }

      const matchedPages = pages.filter(page => {
        return (
          page.title.toLowerCase().includes(query) ||
          page.keywords.some(keyword => keyword.includes(query))
        );
      });

      renderSearchResults(matchedPages);
    });
  }

  function renderSearchResults(results) {
    if (!searchResults) return;

    if (results.length === 0) {
      searchResults.innerHTML = '<div class="search-result-item">No results found</div>';
    } else {
      searchResults.innerHTML = results.map(page => `
        <div class="search-result-item" data-url="${page.url}">
          <div class="search-result-title">${page.title}</div>
        </div>
      `).join('');
    }

    searchResults.classList.add('active');

    // Add click event listeners to result items
    const resultItems = searchResults.querySelectorAll('.search-result-item');
    resultItems.forEach(item => {
      if (item.dataset.url) {
        item.addEventListener('click', () => {
          window.location.href = item.dataset.url;
        });
      }
    });
  }

  // Close search box when clicking outside
  document.addEventListener('click', (e) => {
    if (searchBoxWrapper && searchToggle && searchResults) {
      const isClickInsideSearch = searchBoxWrapper.contains(e.target) || searchToggle.contains(e.target);
      if (!isClickInsideSearch && searchBoxWrapper.classList.contains('active')) {
        searchBoxWrapper.classList.remove('active');
        searchResults.classList.remove('active');
      }
    }
  });

  // User Dropdown Toggle Functionality
  const userDropdownToggle = document.getElementById('userDropdown');
  const userDropdownMenu = document.getElementById('userDropdownMenu');

  if (userDropdownToggle && userDropdownMenu) {
    userDropdownToggle.addEventListener('click', (e) => {
      e.preventDefault();
      userDropdownMenu.classList.toggle('active');
    });
  }

  // Close user dropdown when clicking outside
  document.addEventListener('click', (e) => {
    if (userDropdownToggle && userDropdownMenu) {
      const isClickInsideDropdown = userDropdownToggle.contains(e.target) || userDropdownMenu.contains(e.target);
      if (!isClickInsideDropdown && userDropdownMenu.classList.contains('active')) {
        userDropdownMenu.classList.remove('active');
      }
    }
  });

  // Logout Modal Functionality
  const logoutTriggerBtn = document.getElementById('logoutTriggerBtn');
  const logoutModalOverlay = document.getElementById('logoutModalOverlay');
  const logoutCancelBtn = document.getElementById('logoutCancelBtn');

  // Open modal when clicking logout trigger
  if (logoutTriggerBtn && logoutModalOverlay) {
    logoutTriggerBtn.addEventListener('click', (e) => {
      e.preventDefault();
      logoutModalOverlay.classList.add('active');
    });
  }

  // Close modal when clicking cancel button
  if (logoutCancelBtn && logoutModalOverlay) {
    logoutCancelBtn.addEventListener('click', (e) => {
      e.preventDefault();
      logoutModalOverlay.classList.remove('active');
    });
  }

  // Close modal when clicking outside the modal content
  if (logoutModalOverlay) {
    logoutModalOverlay.addEventListener('click', (e) => {
      if (e.target === logoutModalOverlay) {
        logoutModalOverlay.classList.remove('active');
      }
    });
  }

  // Sample Websites Modal Functionality
  const viewSamplesBtn = document.getElementById('viewSamplesBtn');
  const samplesModalOverlay = document.getElementById('samplesModalOverlay');
  const samplesModalClose = document.getElementById('samplesModalClose');
  const samplesModalCards = document.querySelectorAll('.samples-modal-card');

  // Starter Web Presence Sub-Modal
  const starterPresenceCard = document.getElementById('starterPresenceCard');
  const customManagementCard = document.getElementById('customManagementCard');
  const starterSubModalOverlay = document.getElementById('starterSubModalOverlay');
  const starterSubModalClose = document.getElementById('starterSubModalClose');
  const starterBackBtn = document.getElementById('starterBackBtn');

  const closeSamplesModal = () => {
    if (samplesModalOverlay) {
      samplesModalOverlay.classList.remove('active');
    }
    if (starterSubModalOverlay) {
      starterSubModalOverlay.classList.remove('active');
    }
    document.body.style.overflow = '';
  };

  const openSamplesModal = () => {
    if (samplesModalOverlay) {
      samplesModalOverlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
  };

  const openStarterSubModal = () => {
    if (samplesModalOverlay) {
      samplesModalOverlay.classList.remove('active');
    }
    if (starterSubModalOverlay) {
      starterSubModalOverlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
  };

  const goBackFromStarter = () => {
    if (starterSubModalOverlay) {
      starterSubModalOverlay.classList.remove('active');
    }
    openSamplesModal();
  };

  // Open modal when clicking View Sample Websites button
  if (viewSamplesBtn && samplesModalOverlay) {
    viewSamplesBtn.addEventListener('click', (e) => {
      e.preventDefault();
      openSamplesModal();
    });
  }

  // Close main samples modal when clicking close button
  if (samplesModalClose && samplesModalOverlay) {
    samplesModalClose.addEventListener('click', (e) => {
      e.preventDefault();
      closeSamplesModal();
    });
  }

  // Close main samples modal when clicking outside the modal content
  if (samplesModalOverlay) {
    samplesModalOverlay.addEventListener('click', (e) => {
      if (e.target === samplesModalOverlay) {
        closeSamplesModal();
      }
    });
  }

  // Starter Web Presence card opens sub-modal
  if (starterPresenceCard) {
    starterPresenceCard.addEventListener('click', (e) => {
      e.preventDefault();
      openStarterSubModal();
    });
  }

  // Custom Management System card (still logs + closes for now)
  if (customManagementCard) {
    customManagementCard.addEventListener('click', () => {
      console.log('Selected: CUSTOM MANAGEMENT SYSTEM');
      closeSamplesModal();
    });
  }

  // Close starter sub-modal when clicking close button
  if (starterSubModalClose && starterSubModalOverlay) {
    starterSubModalClose.addEventListener('click', (e) => {
      e.preventDefault();
      closeSamplesModal();
    });
  }

  // Back button from starter sub-modal re-opens main modal
  if (starterBackBtn) {
    starterBackBtn.addEventListener('click', (e) => {
      e.preventDefault();
      goBackFromStarter();
    });
  }

  // Close starter sub-modal when clicking outside content
  if (starterSubModalOverlay) {
    starterSubModalOverlay.addEventListener('click', (e) => {
      if (e.target === starterSubModalOverlay) {
        closeSamplesModal();
      }
    });
  }

  // Close modals when pressing Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      const starterActive = starterSubModalOverlay && starterSubModalOverlay.classList.contains('active');
      const samplesActive = samplesModalOverlay && samplesModalOverlay.classList.contains('active');
      if (starterActive) {
        closeSamplesModal();
      } else if (samplesActive) {
        closeSamplesModal();
      }
    }
  });

  // Remove legacy generic card-click handler (handled via individual IDs now)
  // (kept as no-op for any non-handled future cards via data attributes if needed)
});


function openContactModal() {
    const modal = document.getElementById("contactModal");

    modal.classList.add("show");

    // Prevent background scrolling
    document.body.style.overflow = "hidden";
}


function closeContactModal() {
    const modal = document.getElementById("contactModal");

    modal.classList.remove("show");

    // Restore background scrolling
    document.body.style.overflow = "";
}



document.getElementById("contactModal").addEventListener("click", function(event) {

    // Only close if the dark background itself was clicked
    if (event.target === this) {
        closeContactModal();
    }

});



document.addEventListener("keydown", function(event) {

    if (event.key === "Escape") {
        closeContactModal();
    }

});
