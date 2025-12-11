class NavbarScroll {
  private scrollThreshold: number = 100;
  private lastScrollY: number = 0;
  private ticking: boolean = false;
  private mobileBreakpoint: number = 1024;

  constructor() {
    this.init();
  }

  private init(): void {
    // Initial check
    this.updateNavbar();

    // Listen for scroll events with throttling
    window.addEventListener('scroll', () => {
      if (!this.ticking) {
        window.requestAnimationFrame(() => {
          this.updateNavbar();
          this.ticking = false;
        });
        this.ticking = true;
      }
    });

    // Handle window resize
    window.addEventListener('resize', () => {
      this.handleResize();
    });
  }

  private updateNavbar(): void {
    // Don't do anything on mobile
    if (window.innerWidth <= this.mobileBreakpoint) {
      document.body.classList.remove('scrolled');
      return;
    }

    const currentScrollY = window.scrollY;

    // Add/remove scrolled class based on scroll position
    if (currentScrollY > this.scrollThreshold) {
      document.body.classList.add('scrolled');
    } else {
      document.body.classList.remove('scrolled');
    }

    this.lastScrollY = currentScrollY;
  }

  private handleResize(): void {
    // Reset on mobile
    if (window.innerWidth <= this.mobileBreakpoint) {
      document.body.classList.remove('scrolled');
    } else {
      // On desktop, update immediately
      this.updateNavbar();
    }
  }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  new NavbarScroll();
});
