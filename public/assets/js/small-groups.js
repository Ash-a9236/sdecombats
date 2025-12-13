// Small Groups Page JavaScript - REAL DATA
document.addEventListener("DOMContentLoaded", function () {
    // Section Navigation
    const navButtons = document.querySelectorAll(".nav-btn-sg");
    const packagesSection = document.getElementById("packages-section");
    const datesSection = document.getElementById("dates-section");

    navButtons.forEach((button) => {
        button.addEventListener("click", function () {
            navButtons.forEach((btn) => btn.classList.remove("active"));
            this.classList.add("active");

            const section = this.getAttribute("data-section");
            if (section === "packages") {
                packagesSection.style.display = "block";
                datesSection.style.display = "none";
            } else {
                packagesSection.style.display = "none";
                datesSection.style.display = "block";
            }
        });
    });

    // Package Detail Buttons
    const packageButtons = document.querySelectorAll(".package-btn");
    packageButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const packageCard = this.closest(".package-card");
            const packageType = packageCard.getAttribute("data-package");
            openPackageModal(packageType);
        });
    });

    // Date Learn More Buttons
    const dateButtons = document.querySelectorAll(".learn-more-btn");
    dateButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const dateCard = this.closest(".date-card");
            const dateType = dateCard.getAttribute("data-date");
            openDateModal(dateType);
        });
    });

    // Package Data
    const packageData = {
        "axe-citing-arrow": {
            title: "AXE-CITING ARROW TIME",
            description: "⚔️Wanna be ready for a zombie apocalypse?🧟",
            fullDescription:
                "🪓 60 minutes of weapon throwing where you'll channel your inner lumberjack—flannel optional, fun mandatory.\n\n🎯 Hang up the axes & grab the arrows for a 60-minute archery lesson that'll test your aim and your patience (because hitting the bullseye is harder than it looks, folks!).\n\n🔥Whether you're flinging axes like a Viking or channeling your inner Robin Hood, this package is all about friendly competition, hilarious fails, and bragging. 😉",
            groupSize: "1-8 people",
            duration: "120 minutes",
            basePrice:
                "$49.99/person (group of 3+) • $59.99/person (group of 2)",
            includes: [
                "60 minutes weapon throwing session",
                "60 minutes beginner archery lesson",
                "All equipment and safety gear",
                "Private targets for your group",
                "Professional instruction",
                "Age requirement: 7+ years for archery, 10+ for weapon throwing",
            ],
            addons: [
                {
                    name: "Double The Targets",
                    price: "+$59.99 per group",
                    description:
                        "Add 2 additional targets for more throwing fun",
                },
                {
                    name: "Add a Third Activity",
                    price: "+$24.99/person (groups of 3+) or +$29.99/person (smaller groups)",
                    description:
                        "Add 1 hour of Rage Cage to complete the trifecta!",
                },
            ],
        },
        "hit-throw-hilarity": {
            title: "HIT & THROW HILARITY",
            description: "🤘Ready to throw down and rock out? 🤘",
            fullDescription:
                "🪓60 minutes of epic weapon throwing, where you'll get to hurl everything from throwing knives and spears to tomahawks—because why settle for just one weapon when you can try them all?\n\n🔨Dive into the Rage Cage for pure, unfiltered destructions. Smash, bash, and crash your way to stress relief.\n\n🎉 Whether you're flinging blades or breaking stuff, this package is all about letting loose, laughing hard, and making memories that'll have you cracking up for weeks.😂",
            groupSize: "1-8 people",
            duration: "120 minutes",
            basePrice:
                "$49.99/person (group of 3+) • $59.99/person (group of 2)",
            includes: [
                "60 minutes weapon throwing session",
                "60 minutes Rage Cage demolition",
                "All safety equipment",
                "Private session for your group",
                "Professional supervision",
                "Age requirement: 16+ years for Rage Cage, 10+ for weapon throwing",
            ],
            addons: [
                {
                    name: "Double The Targets",
                    price: "+$59.99 per group",
                    description:
                        "Add 2 additional targets for more throwing action",
                },
                {
                    name: "Add a Third Activity",
                    price: "+$24.99/person (groups of 3+) or +$29.99/person (smaller groups)",
                    description:
                        "Add 1 hour of Archery to experience all 3 activities!",
                },
            ],
        },
    };

    // Date Data
    const dateData = {
        "bullseye-bonanza": {
            title: "BULLS-EYE BONANZA",
            description: "🎯 Hit the bullseye on date night!",
            fullDescription:
                "🪓 Start with 30 thrilling minutes of weapon throwing—love at first (& every) throw!\n\n🏹 Then, notch up the fun with a 60-minute archery lesson, pulling strings and heartstrings alike.\n\n❤️ Impress your date with a blend of laughter, friendly competition, and unforgettable moments. Aim for romance, and score the perfect date night!",
            participants: "2-4 people",
            duration: "90 minutes",
            basePrice: "$96.69 per couple",
            includes: [
                "30 minutes weapon throwing",
                "60 minutes beginner archery lesson",
                "All equipment and safety gear",
                "Professional instruction",
                "Private session",
                "Perfect for first dates or anniversaries",
            ],
            addons: [
                {
                    name: "Extra Couple",
                    price: "+$69.96",
                    description:
                        "Make it a double date! (4 participants total)",
                },
                {
                    name: "Archery + Rage Cage",
                    price: "+$31.99 per couple",
                    description:
                        "2 hours total. 1 hr Archery + 1 hr Rage Cage. No Weapon Throwing",
                },
                {
                    name: "All 3 Activities",
                    price: "+$44.99 per couple",
                    description:
                        "2.5 hours total. 1 hr Archery + 1 hr Rage Cage + 30 min Weapon Throwing",
                },
            ],
        },
        "axe-break-out": {
            title: "AXE OUT & BREAK OUT",
            description: "🔥Spice up date night with a bang!",
            fullDescription:
                "🪓 Kick off with 30 minutes of exhilarating weapon throwing—aim for excitement, hit with passion!\n\n🔨 Then, unleash your wild side in the Rage Cage for 60 minutes, where breaking stuff builds bonds or 'breaking the ice'.\n\n💥It's the perfect prelude to 'smashing' the rest of your night away. Get ready for an evening that's just as exhilarating behind closed doors!",
            participants: "2-4 people",
            duration: "90 minutes",
            basePrice: "$96.69 per couple",
            includes: [
                "30 minutes weapon throwing",
                "60 minutes Rage Cage demolition",
                "All safety equipment",
                "Professional supervision",
                "Private session",
                "Age requirement: 16+ years for Rage Cage",
            ],
            addons: [
                {
                    name: "Extra Couple",
                    price: "+$69.96",
                    description:
                        "Make it a double date! (4 participants total)",
                },
                {
                    name: "Archery + Rage Cage",
                    price: "+$31.99 per couple",
                    description:
                        "2 hours total. 1 hr Archery + 1 hr Rage Cage. No Weapon Throwing",
                },
                {
                    name: "All 3 Activities",
                    price: "+$44.99 per couple",
                    description:
                        "2.5 hours total. 1 hr Archery + 1 hr Rage Cage + 30 min Weapon Throwing",
                },
            ],
        },
    };

    // Open Package Modal
    function openPackageModal(packageType) {
        const data = packageData[packageType];
        if (!data) return;

        let includesList = data.includes
            .map((item) => `<li>${item}</li>`)
            .join("");
        let addonsList = data.addons
            .map(
                (addon) => `
            <div class="addon-item">
                <div class="addon-header">
                    <strong>${addon.name}</strong>
                    <span class="addon-price">${addon.price}</span>
                </div>
                <p class="addon-description">${addon.description}</p>
            </div>
        `
            )
            .join("");

        const modalHTML = `
            <div id="packageModal" class="package-modal">
                <div class="modal-backdrop-sg"></div>
                <div class="modal-content-sg">
                    <button class="modal-close-sg" id="closePackageModal">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>

                    <div class="modal-header-sg">
                        <h2 class="modal-title-sg">${data.title}</h2>
                        <p class="modal-subtitle-sg">${data.description}</p>
                    </div>

                    <div class="modal-body-sg">
                        <div class="modal-details-sg">
                            <div class="modal-detail-item">
                                <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Group Size">
                                <span>${data.groupSize}</span>
                            </div>
                            <div class="modal-detail-item">
                                <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                                <span>${data.duration}</span>
                            </div>
                        </div>

                        <div class="modal-info-sg">
                            <h3>EXPERIENCE</h3>
                            <p style="white-space: pre-line;">${data.fullDescription}</p>
                        </div>

                        <div class="modal-includes-sg">
                            <h3>WHAT'S INCLUDED</h3>
                            <ul>${includesList}</ul>
                        </div>

                        <div class="modal-addons-sg">
                            <h3>AVAILABLE ADD-ONS</h3>
                            ${addonsList}
                        </div>

                        <div class="modal-footer-sg">
                            <div class="modal-price-sg">
                                <span class="modal-price-label">STARTING AT</span>
                                <span class="modal-price-amount">$49.99</span>
                                <span class="modal-price-note">${data.basePrice}</span>
                            </div>
                            <button class="modal-book-btn" id="bookPackage">BOOK NOW</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML("beforeend", modalHTML);

        const modal = document.getElementById("packageModal");
        modal.style.display = "flex";
        document.body.style.overflow = "hidden";

        setTimeout(() => {
            modal.classList.add("modal-active-sg");
        }, 10);

        document
            .getElementById("closePackageModal")
            .addEventListener("click", closeModal);
        modal
            .querySelector(".modal-backdrop-sg")
            .addEventListener("click", closeModal);
        document
            .getElementById("bookPackage")
            .addEventListener("click", function () {
                closeModal();
                window.location.href =
                    "https://bookeo.com/sportsdecombats?category=41560WR4R4618080A1D677";
            });

        document.addEventListener("keydown", handleEscape);
    }

    // Open Date Modal
    function openDateModal(dateType) {
        const data = dateData[dateType];
        if (!data) return;

        let includesList = data.includes
            .map((item) => `<li>${item}</li>`)
            .join("");
        let addonsList = data.addons
            .map(
                (addon) => `
            <div class="addon-item">
                <div class="addon-header">
                    <strong>${addon.name}</strong>
                    <span class="addon-price">${addon.price}</span>
                </div>
                <p class="addon-description">${addon.description}</p>
            </div>
        `
            )
            .join("");

        const modalHTML = `
            <div id="dateModal" class="package-modal">
                <div class="modal-backdrop-sg"></div>
                <div class="modal-content-sg">
                    <button class="modal-close-sg" id="closeDateModal">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>

                    <div class="modal-header-sg">
                        <h2 class="modal-title-sg">${data.title}</h2>
                        <p class="modal-subtitle-sg">${data.description}</p>
                    </div>

                    <div class="modal-body-sg">
                        <div class="modal-details-sg">
                            <div class="modal-detail-item">
                                <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Participants">
                                <span>${data.participants}</span>
                            </div>
                            <div class="modal-detail-item">
                                <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                                <span>${data.duration}</span>
                            </div>
                        </div>

                        <div class="modal-info-sg">
                            <h3>THE PERFECT DATE</h3>
                            <p style="white-space: pre-line;">${data.fullDescription}</p>
                        </div>

                        <div class="modal-includes-sg">
                            <h3>INCLUDED</h3>
                            <ul>${includesList}</ul>
                        </div>

                        <div class="modal-addons-sg">
                            <h3>ENHANCE YOUR DATE</h3>
                            ${addonsList}
                        </div>

                        <div class="modal-footer-sg">
                            <div class="modal-price-sg">
                                <span class="modal-price-label">STARTING AT</span>
                                <span class="modal-price-amount">${data.basePrice}</span>
                            </div>
                            <button class="modal-book-btn" id="bookDate">BOOK YOUR DATE</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML("beforeend", modalHTML);

        const modal = document.getElementById("dateModal");
        modal.style.display = "flex";
        document.body.style.overflow = "hidden";

        setTimeout(() => {
            modal.classList.add("modal-active-sg");
        }, 10);

        document
            .getElementById("closeDateModal")
            .addEventListener("click", closeModal);
        modal
            .querySelector(".modal-backdrop-sg")
            .addEventListener("click", closeModal);
        document
            .getElementById("bookDate")
            .addEventListener("click", function () {
                closeModal();
                window.location.href = "#";
            });

        document.addEventListener("keydown", handleEscape);
    }

    // Close Modal
    function closeModal() {
        const modal = document.querySelector(".package-modal");
        if (modal) {
            modal.classList.remove("modal-active-sg");

            setTimeout(() => {
                modal.remove();
                document.body.style.overflow = "";
            }, 300);
        }

        document.removeEventListener("keydown", handleEscape);
    }

    // Handle Escape Key
    function handleEscape(e) {
        if (e.key === "Escape") {
            closeModal();
        }
    }
});
