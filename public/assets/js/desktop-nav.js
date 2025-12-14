class NavUpdater {
    constructor() {
        this.mobileNav = document.querySelector('.mobile-nav');
        this.navBar = document.querySelector('.desktop-nav');
        this.scrolledNavBar = document.querySelector('.scrolled-desktop-nav');
        this.scrollThreshold = 100; // Increased threshold for better testing
        this.mobileBreakpoint = 1024;
        console.log('NavUpdater initialized - JavaScript version');
        this.init();
    }

    init() {
        this.updateNavVisibility();

        // Throttle scroll events for better performance
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    this.handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });

        window.addEventListener('resize', () => this.handleResize());

        // Force update after a short delay to ensure everything is loaded
        setTimeout(() => this.updateNavVisibility(), 100);
    }

    isDesktop() {
        return window.innerWidth >= this.mobileBreakpoint;
    }

    handleScroll() {
        if (this.isDesktop()) {
            this.updateDesktopNav();
        }
    }

    handleResize() {
        this.updateNavVisibility();
    }

    updateNavVisibility() {
        if (!this.isDesktop()) {
            this.showMobileNav();
        } else {
            this.updateDesktopNav();
        }
    }

    showMobileNav() {
        if (this.mobileNav) this.mobileNav.style.display = 'flex';
        if (this.navBar) this.navBar.style.display = 'none';
        if (this.scrolledNavBar) this.scrolledNavBar.style.display = 'none';
    }

    updateDesktopNav() {
        if (this.mobileNav) this.mobileNav.style.display = 'none';

        const scrollPosition = window.scrollY || window.pageYOffset;

        console.log('Scroll position:', scrollPosition, 'Threshold:', this.scrollThreshold);

        if (scrollPosition > this.scrollThreshold) {
            // Scrolled down - show scrolled nav
            if (this.navBar) this.navBar.style.display = 'none';
            if (this.scrolledNavBar) this.scrolledNavBar.style.display = 'flex';
        } else {
            // At top - show regular nav
            if (this.navBar) this.navBar.style.display = 'flex';
            if (this.scrolledNavBar) this.scrolledNavBar.style.display = 'none';
        }
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM loaded - initializing navigation');
    new NavUpdater();
});

// Also initialize when page is fully loaded (as backup)
window.addEventListener('load', () => {
    console.log('Page fully loaded - re-initializing navigation');
    setTimeout(() => {
        if (window.navUpdater) {
            window.navUpdater.updateNavVisibility();
        }
    }, 500);
});

// Make it globally available for debugging
window.navUpdater = null;
document.addEventListener('DOMContentLoaded', () => {
    window.navUpdater = new NavUpdater();
});