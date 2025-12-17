<?php
$section = $data['section'] ?? 'dashboard';
$title = $data['title'] ?? 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Sports de Combats</title>
    <link rel="stylesheet" href="/sdecombats/public/assets/css/00-root.css">
    <link rel="stylesheet" href="/sdecombats/public/assets/css/01-auth.css">
    <link rel="stylesheet" href="/sdecombats/public/assets/css/10-components.css">
    <link rel="stylesheet" href="/sdecombats/public/assets/css/09-dashboard.css">
</head>

<body>
    <div class="dashboard-container">
        <aside class="dashboard-sidebar">
            <div class="sidebar-header">
                <p>Customer Panel</p>
            </div>
            <nav class="sidebar-nav">
                <a href="/sdecombats/dashboard/user/make-reservation">
                    <button class="nav-btn <?php echo $section === 'make-reservation' ? 'active' : ''; ?>">
                        <span class="nav-icon">+</span>
                        <span class="nav-text">Make Reservation</span>
                    </button>
                </a>
                <a href="/sdecombats/dashboard/user/reservations">
                    <button class="nav-btn <?php echo $section === 'reservations' ? 'active' : ''; ?>">
                        <span class="nav-icon">👁</span>
                        <span class="nav-text">My Reservations</span>
                    </button>
                </a>
                <a href="/sdecombats/dashboard/user/update-info">
                    <button class="nav-btn <?php echo $section === 'update-info' ? 'active' : ''; ?>">
                        <span class="nav-icon">⚙</span>
                        <span class="nav-text">Update Info</span>
                    </button>
                </a>
                <a href="/sdecombats/dashboard/user/membership">
                    <button class="nav-btn <?php echo $section === 'membership' ? 'active' : ''; ?>">
                        <span class="nav-icon">📆</span>
                        <span class="nav-text">Membership</span>
                    </button>
                </a>
                <a href="/sdecombats/dashboard/user/update-user-info">
                    <button class="nav-btn <?php echo $section === 'update-user-info' ? 'active' : ''; ?>">
                        <span class="nav-icon">👤</span>
                        <span class="nav-text">Update Account Info</span>
                    </button>
                </a>
                <a href="/sdecombats/dashboard/user/update-password">
                    <button class="nav-btn <?php echo $section === 'update-password' ? 'active' : ''; ?>">
                        <span class="nav-icon">🔑</span>
                        <span class="nav-text">Change Password</span>
                    </button>
                </a>
                <a href="/sdecombats/sign-out">
                    <button class="nav-btn" style="margin-top: 2rem; border-color: #ff4444;">
                        <span class="nav-icon">🚪</span>
                        <span class="nav-text">Sign Out</span>
                    </button>
                </a>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="dashboard-content">
            <?php
            // Load the appropriate section
            switch ($section) {
                case 'make-reservation':
                    include __DIR__ . '/../components/dashboard-make-reservation.php';
                    break;
                case 'reservations':
                    include __DIR__ . '/../components/dashboard-view-reservation.php';
                    break;
                case 'update-info':
                    include __DIR__ . '/../components/dashboard-update-info.php';
                    break;
                case 'membership':
                    include __DIR__ . '/../components/dashboard-membership.php';
                    break;
                case 'update-user-info':
                    include __DIR__ . '/../components/dashboard-update-user-info.php';
                    break;
                case 'update-password':
                    include __DIR__ . '/../components/dashboard-update-password.php';
                    break;
                default:
                    // Default dashboard view
            ?>
                    <div class="page-header">
                        <h1 class="page-title">Dashboard</h1>
                    </div>

                    <!-- Compact Dashboard Stats -->
                    <div class="dashboard-stats-compact">
                        <div class="stat-card-compact">
                            <div class="stat-icon-compact">
                                <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Calendar">
                            </div>
                            <div class="stat-info-compact">
                                <p class="stat-label-compact">UPCOMING</p>
                                <p class="stat-value-compact">3</p>
                            </div>
                        </div>
                        <div class="stat-card-compact">
                            <div class="stat-icon-compact">
                                <img src="/sdecombats/public/assets/icons/white/trophy.svg" alt="Trophy">
                            </div>
                            <div class="stat-info-compact">
                                <p class="stat-label-compact">COMPLETED</p>
                                <p class="stat-value-compact">12</p>
                            </div>
                        </div>
                        <div class="stat-card-compact">
                            <div class="stat-icon-compact">
                                <img src="/sdecombats/public/assets/icons/white/fire.svg" alt="Fire">
                            </div>
                            <div class="stat-info-compact">
                                <p class="stat-label-compact">TOTAL HOURS</p>
                                <p class="stat-value-compact">24</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="quick-actions-compact">
                        <p class="section-header-compact">QUICK ACTIONS</p>
                        <div class="actions-grid-compact">
                            <a href="/sdecombats/dashboard/user/make-reservation" class="action-card-compact">
                                <div class="action-icon-compact">
                                    <img src="/sdecombats/public/assets/icons/white/plus.svg" alt="Plus">
                                </div>
                                <p class="action-title-compact">NEW RESERVATION</p>
                            </a>
                            <a href="/sdecombats/dashboard/user/reservations" class="action-card-compact">
                                <div class="action-icon-compact">
                                    <img src="/sdecombats/public/assets/icons/white/report.svg" alt="Report">
                                </div>
                                <p class="action-title-compact">VIEW ALL</p>
                            </a>
                            <a href="/sdecombats/dashboard/user/update-info" class="action-card-compact">
                                <div class="action-icon-compact">
                                    <img src="/sdecombats/public/assets/icons/white/user.svg" alt="User">
                                </div>
                                <p class="action-title-compact">SETTINGS</p>
                            </a>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="recent-activity-compact">
                        <p class="section-header-compact">RECENT RESERVATIONS</p>
                        <div class="activity-list-compact">
                            <div class="activity-item-compact">
                                <div class="activity-date-compact">
                                    <p class="date-day-compact">13</p>
                                    <p class="date-month-compact">NOV</p>
                                </div>
                                <div class="activity-details-compact">
                                    <p class="activity-name-compact">Weapon Throwing - Initiation</p>
                                    <p class="activity-time-compact">18:00 • 2 participants</p>
                                </div>
                                <div class="activity-status-compact active">ACTIVE</div>
                            </div>
                            <div class="activity-item-compact">
                                <div class="activity-date-compact">
                                    <p class="date-day-compact">06</p>
                                    <p class="date-month-compact">NOV</p>
                                </div>
                                <div class="activity-details-compact">
                                    <p class="activity-name-compact">Archery Classes - Beginner</p>
                                    <p class="activity-time-compact">19:00 • 1 participant</p>
                                </div>
                                <div class="activity-status-compact completed">COMPLETED</div>
                            </div>
                            <div class="activity-item-compact">
                                <div class="activity-date-compact">
                                    <p class="date-day-compact">28</p>
                                    <p class="date-month-compact">OCT</p>
                                </div>
                                <div class="activity-details-compact">
                                    <p class="activity-name-compact">Rage Cage - Session</p>
                                    <p class="activity-time-compact">20:00 • 3 participants</p>
                                </div>
                                <div class="activity-status-compact completed">COMPLETED</div>
                            </div>
                        </div>
                        <a href="/sdecombats/dashboard/user/reservations" class="view-all-link-compact">VIEW ALL RESERVATIONS →</a>
                    </div>
            <?php
                    break;
            }
            ?>
        </main>
    </div>

    <script src="/sdecombats/public/assets/js/dashboard.js"></script>
</body>

</html>
