// Big Groups Page JavaScript - REAL DATA
document.addEventListener("DOMContentLoaded", function () {
    // Section Navigation
    const navButtons = document.querySelectorAll(".nav-btn-bg");
    const youthSection = document.getElementById("youth-section");
    const adultsSection = document.getElementById("adults-section");

    navButtons.forEach((button) => {
        button.addEventListener("click", function () {
            navButtons.forEach((btn) => btn.classList.remove("active"));
            this.classList.add("active");

            const section = this.getAttribute("data-section");
            if (section === "youth") {
                youthSection.style.display = "block";
                adultsSection.style.display = "none";
            } else {
                youthSection.style.display = "none";
                adultsSection.style.display = "block";
            }
        });
    });

    // Package Detail Buttons
    const packageButtons = document.querySelectorAll(".package-btn-bg");
    packageButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const packageCard = this.closest(".package-card-bg");
            const packageType = packageCard.getAttribute("data-package");
            openPackageModal(packageType);
        });
    });

    // Package Data
    const packageData = {
        "kids-birthday": {
            title: "KIDS NERF BIRTHDAY PARTY",
            subtitle: "#1 Rated NERF Birthday in Montreal",
            description:
                "The most memorable birthday celebration with 200+ Nerf blasters, party room, and dedicated game masters!",
            fullDescription:
                "Backed by over 1,000 five-star reviews, experience the excitement of over 200+ NERF blasters. Birthday boy or girl gets to play for FREE and parents are always welcome to join in the fun!",
            age: "6 years & older",
            duration: "2 hours total",
            format: "30min Training + 60min Nerf Battle + 50min Party Room",
            includes: [
                "30 minutes of training in the tactical room",
                "60 minutes of Nerf Battle games",
                "50 minutes in the party room (fridge & freezer available)",
                "Access to 200+ Nerf blasters",
                "Protective glasses and tactical vests",
                "Dedicated game master",
                "Invitation e-card",
                "Party essentials (napkins, tablecloths, cups, plates, utensils, water)",
                "Souvenir photo",
                "1 complimentary underground parking spot",
            ],
            packages: [
                {
                    name: "Up to 6 Players",
                    price: "$209.99 (no party room) / $239.99 (with party room)",
                    details:
                        "Birthday child + 1 parent FREE • Max 8 players (7 kids + 1 adult) • Add player: $19.99",
                },
                {
                    name: "Up to 10 Players",
                    price: "$279.99",
                    details:
                        "Birthday child + 2 parents FREE • Max 13 players (11 kids + 2 adults) • Add player: $14.99",
                },
                {
                    name: "Up to 16 Players",
                    price: "$359.99",
                    details:
                        "Birthday child + 4 parents FREE • Max 21 players (17 kids + 4 adults) • Add player: $9.99",
                },
                {
                    name: "Up to 24 Players",
                    price: "$419.99",
                    details:
                        "Birthday child + 6 parents FREE • Max 31 players (25 kids + 6 adults) • Add player: $9.99",
                },
            ],
            addons: [
                {
                    name: "Party Loot Bags",
                    price: "From $7.99/person",
                    description: "Custom loot bags for all party guests",
                },
                {
                    name: "+ 60 Minutes Playtime",
                    price: "$179.99/group",
                    description:
                        "Extend the fun with an extra hour of gameplay",
                },
                {
                    name: "Underground Parking",
                    price: "$9.99/spot",
                    description: "Additional parking spots (1 FREE included)",
                },
            ],
            bookingUrl: "#",
        },
        "teens-birthday": {
            title: "TEENS ADVENTURE BIRTHDAY PARTY",
            subtitle: "The Ultimate Teen Birthday Destination",
            description:
                "Incredible multi-activity experiences with weapon throwing, archery, combat archery, and Nerf battles!",
            fullDescription:
                "From TV screen to reality: experience the excitement of your favorite video games and movies in our action-packed activities! Choose from 1 or 2 activities for the ultimate teen celebration.",
            age: "12 years & older (some activities 10+)",
            duration: "2 hours total",
            format: "Choice of 1 or 2 activities with eating space or party room",
            includes: [
                "2 hours of chosen activities",
                "Birthday teen + 1 parent play for FREE",
                "Experienced instructors for all activities",
                "All safety equipment and gear",
                "Eating space or party room (based on package)",
                "1 complimentary underground parking spot",
            ],
            packages: [
                {
                    name: "Package 1: 1 Activity (2 hours)",
                    price: "$239.99 (up to 8) / $299.99 (up to 12)",
                    details:
                        "Choice A: Weapon Throwing + Eating Space OR Choice B: Arena Game (75min) + Party Room (45min) • Birthday teen + 1 parent FREE • Add player: $24.99 (8) / $19.99 (12)",
                },
                {
                    name: "Package 2: 2 Activities (2 hours)",
                    price: "$339.99 (up to 8) / $419.99 (up to 12)",
                    details:
                        "Choice A: Weapon Throwing + Archery OR Choice B: Weapon Throwing + Combat Archery/Nerf • Eating space included • Birthday teen + 1 parent FREE • Add player: $34.99 (8) / $29.99 (12)",
                },
            ],
            activities: [
                {
                    name: "Weapon Throwing",
                    age: "10+",
                    description: "Axes, knives, tomahawks & spears",
                },
                {
                    name: "Beginner Archery",
                    age: "10+",
                    description: "Professional instruction & equipment",
                },
                {
                    name: "Combat Archery",
                    age: "12+",
                    description: "Archery tag with foam-tipped arrows",
                },
                {
                    name: "Nerf Battle",
                    age: "5+",
                    description: "150+ Nerf blasters in arena games",
                },
            ],
            addons: [
                {
                    name: "Underground Parking",
                    price: "$9.99/spot",
                    description: "Additional parking spots (1 FREE included)",
                },
            ],
            bookingUrl: "#",
        },
        "special-occasions": {
            title: "SPECIAL OCCASIONS",
            subtitle: "Bachelor/Bachelorette • Birthdays • Celebrations",
            description:
                "Epic packages for bachelor/bachelorette parties, birthdays, and all celebrations with beer & wine welcome!",
            fullDescription:
                "Special occasions deserve EPIC experiences! Perfect for bachelor/bachelorette parties, adult birthdays, and any special celebration. All packages come with an alcohol permit allowing you to bring beer & wine (no shots) – drink responsibly!",
            age: "18 years & older",
            participants:
                "Minimum 9 people (for smaller groups visit Small Group Packages)",
            format: "Choose 1-4 activities based on package",
            includes: [
                "Same chosen activities for whole group",
                "Experienced instructors for all activities",
                "All safety equipment and gear",
                "Beer & wine welcome (no shots)",
                "Street & underground parking available",
                "7-min walk from Metro Laurier",
                "50% deposit required",
                "Deposit refundable 10 days prior",
            ],
            packages: [
                {
                    name: "PIONEERS - 1 Hour",
                    price: "$29.99/person",
                    details:
                        "1 activity choice: Axe/Knife Throwing OR Archery Lesson OR Combat Archery OR Nerf Battle OR Rage Cage",
                },
                {
                    name: "ADVENTURERS - 2 Hours",
                    price: "$54.99/person",
                    details:
                        "2 activity choices: Mix any of the available activities",
                },
                {
                    name: "CHAMPIONS - 3 Hours",
                    price: "$74.99/person",
                    details:
                        "3 activity choices: Mix any of the available activities",
                },
                {
                    name: "LEGENDS - 4 Hours",
                    price: "$84.99/person",
                    details:
                        "4 activity choices: Mix any of the available activities",
                },
            ],
            activities: [
                {
                    name: "Rage Cage",
                    description: "World-famous demolition room - smash away!",
                },
                {
                    name: "Axe & Knife Throwing",
                    description: "Axes, knives, spears & tomahawks",
                },
                {
                    name: "Archery Lesson",
                    description: "Beginner archery instruction",
                },
                {
                    name: "Combat Archery",
                    description: "Foam-tipped arrow battles (private arena)",
                },
                {
                    name: "Nerf Battle",
                    description: "200+ Nerf blasters (private arena)",
                },
            ],
            addons: [
                {
                    name: "Rage Cage Add-On",
                    price: "$29.99/person",
                    description: "Can be added to any package",
                },
                {
                    name: "Party Room",
                    price: "$74.99/hour",
                    description: "Up to 25 people",
                },
                {
                    name: "Underground Parking",
                    price: "$9.99/car",
                    description: "2.5 hours in underground garage",
                },
            ],
            importantInfo: [
                "Everyone participates in same chosen activities",
                "Be on time - no extra time for late arrivals",
                "50% deposit and credit card required",
                "Deposit refundable 10 days prior, in-store credit if less than 10 days, no refund if less than 48 hours",
                "Surcharge may apply if participants 25% less than final confirmation",
                "Drink responsibly - intoxicated groups will be removed (no refund)",
                "Zero tolerance for inappropriate/unsafe behavior (no refund)",
            ],
            pricing: "Packages range from $29.99 to $84.99 per person",
            bookingUrl: "#",
        },
        "corporate-events": {
            title: "CORPORATE TEAM BUILDING",
            subtitle: "Staff Outings • Team Building • Corporate Events",
            description:
                "Epic team building packages from 1-4 hours with full event planning support and catering options!",
            fullDescription:
                "Your work family deserves an EPIC fun time! Our 10,000 sq ft facility offers unique team building activities that encourage fitness, teamwork, and healthy competition. From groups of 9 to 100 participants, packages can be fully customized to fit your needs!",
            age: "18 years & older",
            participants:
                "Minimum 9 people (recommended up to 29, contact for 30+)",
            facility: "10,000 sq ft facility in Mile End",
            format: "Everyone participates in same chosen activities",
            includes: [
                "Experienced instructors for all activities",
                "All safety equipment and gear",
                "Event planning assistance",
                "Presentation materials to share with team",
                "Conference space available",
                "Multimedia facilities available",
                "Beer & wine welcome (BYOB)",
                "50% deposit required",
            ],
            packages: [
                {
                    name: "THE LUNCH BREAK - 1 Hour",
                    price: "$24.99/person",
                    details:
                        "1 activity choice: Axe Throwing OR Combat Archery OR Nerf Battle OR Rage Cage OR Archery Lesson OR ArcheryTime",
                },
                {
                    name: "THE HAPPY HOUR - 2 Hours",
                    price: "$49.99/person",
                    details:
                        "2 activity choices: Mix any of the available activities",
                },
                {
                    name: "WORK FROM HOME - 3 Hours",
                    price: "$64.99/person",
                    details:
                        "3 activity choices: Mix any of the available activities",
                },
                {
                    name: "CORPORATE RETREAT - 3-4 Hours",
                    price: "$79.99/person",
                    details:
                        "4 activity choices: Mix any of the available activities",
                },
            ],
            activities: [
                {
                    name: "ArcheryTime",
                    description:
                        "Real arrows vs. virtual targets - only in Quebec!",
                },
                {
                    name: "Archery Lesson",
                    description:
                        "Beginner instruction - discover your inner Katniss",
                },
                {
                    name: "Axe & Knife Throwing",
                    description: "Channel your inner lumberjack",
                },
                {
                    name: "Nerf Battle",
                    description: "200+ blasters - epic team battles (private)",
                },
                {
                    name: "Combat Archery",
                    description: "Foam arrow dodgeball (private, 5+ people)",
                },
                {
                    name: "Rage Cage",
                    description: "World-famous demolition room stress relief",
                },
            ],
            addons: [
                {
                    name: "Unlimited Beverage",
                    price: "$2.49/person",
                    description: "Water, sodas & Gatorades",
                },
                {
                    name: "Underground Parking",
                    price: "From $9.99/car",
                    description: "For the event duration",
                },
                {
                    name: "Small Meeting Space",
                    price: "From $74.99/hour",
                    description: "For up to 24 people",
                },
                {
                    name: "Large Meeting Space",
                    price: "From $149.99/hour",
                    description: "For up to 80 people",
                },
                {
                    name: "3D Printed SDC Medals",
                    price: "From $9.99/medal",
                    description: "Customizations available",
                },
            ],
            services: [
                "Transportation options & bus company referrals",
                "Catering companies recommended or bring your own",
                "Space for food/snacks before/after/during activities",
                "Conference space with multimedia facilities",
                "Custom event planning & itinerary assistance",
                "Can bring beer & wine",
                "3 km from downtown, 7-min walk from Metro Laurier",
            ],
            importantInfo: [
                "Pricing for weekdays only - 10% surcharge for Sat/Sun",
                "Minimum 9 people, recommended for groups up to 29",
                "For 30+ people contact for large group discounts",
                "Everyone participates in same chosen activities",
                "Be on time - no extra time for late arrivals",
                "50% deposit and credit card required",
                "Deposit refundable 10 days prior, in-store credit if less than 10 days, no refund if less than 48 hours",
                "Surcharge may apply if participants 25% less than final confirmation",
            ],
            pricing:
                "Packages range from $24.99 to $79.99 per person (weekdays)",
            bookingUrl: "#",
        },
    };

    // Open Package Modal
    function openPackageModal(packageType) {
        const data = packageData[packageType];
        if (!data) return;

        let includesList = data.includes
            .map((item) => `<li>${item}</li>`)
            .join("");

        let packagesHtml = "";
        if (data.packages) {
            packagesHtml = `
                <div class="modal-packages-bg">
                    <h3>PACKAGE OPTIONS</h3>
                    ${data.packages
                        .map(
                            (pkg) => `
                        <div class="package-option-bg">
                            <div class="package-option-header">
                                <strong>${pkg.name}</strong>
                                <span class="package-option-price">${pkg.price}</span>
                            </div>
                            <p class="package-option-details">${pkg.details}</p>
                        </div>
                    `
                        )
                        .join("")}
                </div>
            `;
        }

        let activitiesHtml = "";
        if (data.activities) {
            activitiesHtml = `
                <div class="modal-activities-bg">
                    <h3>AVAILABLE ACTIVITIES</h3>
                    ${data.activities
                        .map(
                            (activity) => `
                        <div class="activity-item-bg">
                            <div class="activity-header">
                                <strong>${activity.name}</strong>
                                ${
                                    activity.age
                                        ? `<span class="activity-age">Ages ${activity.age}</span>`
                                        : ""
                                }
                            </div>
                            <p class="activity-description">${
                                activity.description
                            }</p>
                        </div>
                    `
                        )
                        .join("")}
                </div>
            `;
        }

        let addonsHtml = "";
        if (data.addons && data.addons.length > 0) {
            addonsHtml = `
                <div class="modal-addons-bg">
                    <h3>AVAILABLE ADD-ONS</h3>
                    ${data.addons
                        .map(
                            (addon) => `
                        <div class="addon-item-bg">
                            <div class="addon-header">
                                <strong>${addon.name}</strong>
                                <span class="addon-price">${addon.price}</span>
                            </div>
                            <p class="addon-description">${addon.description}</p>
                        </div>
                    `
                        )
                        .join("")}
                </div>
            `;
        }

        let featuresHtml = "";
        if (data.features) {
            featuresHtml = `
                <div class="modal-features-bg">
                    <h3>FEATURES & AMENITIES</h3>
                    <ul>
                        ${data.features
                            .map((feature) => `<li>${feature}</li>`)
                            .join("")}
                    </ul>
                </div>
            `;
        }

        let servicesHtml = "";
        if (data.services) {
            servicesHtml = `
                <div class="modal-services-bg">
                    <h3>AVAILABLE SERVICES</h3>
                    <ul>
                        ${data.services
                            .map((service) => `<li>${service}</li>`)
                            .join("")}
                    </ul>
                </div>
            `;
        }

        let depositHtml = "";
        if (data.importantInfo) {
            depositHtml = `
                <div class="modal-deposit-bg">
                    <h3>IMPORTANT INFORMATION</h3>
                    <ul>
                        ${data.importantInfo
                            .map((info) => `<li>${info}</li>`)
                            .join("")}
                    </ul>
                </div>
            `;
        }

        const modalHTML = `
            <div id="packageModal" class="package-modal-bg">
                <div class="modal-backdrop-bg"></div>
                <div class="modal-content-bg">
                    <button class="modal-close-bg" id="closePackageModal">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>

                    <div class="modal-header-bg">
                        <h2 class="modal-title-bg">${data.title}</h2>
                        <p class="modal-subtitle-bg">${data.subtitle}</p>
                    </div>

                    <div class="modal-body-bg">
                        <div class="modal-details-top">
                            ${
                                data.age
                                    ? `<div class="modal-detail-item-bg"><strong>Age:</strong> ${data.age}</div>`
                                    : ""
                            }
                            ${
                                data.duration
                                    ? `<div class="modal-detail-item-bg"><strong>Duration:</strong> ${data.duration}</div>`
                                    : ""
                            }
                            ${
                                data.participants
                                    ? `<div class="modal-detail-item-bg"><strong>Group Size:</strong> ${data.participants}</div>`
                                    : ""
                            }
                            ${
                                data.facility
                                    ? `<div class="modal-detail-item-bg"><strong>Facility:</strong> ${data.facility}</div>`
                                    : ""
                            }
                            ${
                                data.format
                                    ? `<div class="modal-detail-item-bg"><strong>Format:</strong> ${data.format}</div>`
                                    : ""
                            }
                        </div>

                        <div class="modal-info-bg">
                            <h3>ABOUT THIS PACKAGE</h3>
                            <p>${data.fullDescription}</p>
                        </div>

                        <div class="modal-includes-bg">
                            <h3>WHAT'S INCLUDED</h3>
                            <ul>${includesList}</ul>
                        </div>

                        ${packagesHtml}
                        ${activitiesHtml}
                        ${addonsHtml}
                        ${featuresHtml}
                        ${servicesHtml}
                        ${depositHtml}

                        <div class="modal-footer-bg">
                            <div class="modal-price-info">
                                ${
                                    data.pricing
                                        ? `<p class="pricing-note">${data.pricing}</p>`
                                        : ""
                                }
                            </div>
                            <button class="modal-book-btn-bg" id="bookPackage">REQUEST BOOKING</button>
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
            modal.classList.add("modal-active-bg");
        }, 10);

        document
            .getElementById("closePackageModal")
            .addEventListener("click", closeModal);
        modal
            .querySelector(".modal-backdrop-bg")
            .addEventListener("click", closeModal);
        document
            .getElementById("bookPackage")
            .addEventListener("click", function () {
                window.location.href = data.bookingUrl;
            });

        document.addEventListener("keydown", handleEscape);
    }

    // Close Modal
    function closeModal() {
        const modal = document.querySelector(".package-modal-bg");
        if (modal) {
            modal.classList.remove("modal-active-bg");

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
