# Summary of Changes for Linux/Docker Compatibility

## 1. Docker Setup (New Files)

| File                 | Purpose                                       |
| -------------------- | --------------------------------------------- |
| `Dockerfile`         | PHP 8.4-FPM with required extensions          |
| `docker-compose.yml` | Nginx + PHP-FPM + MySQL + phpMyAdmin          |
| `docker/nginx.conf`  | Container-ready nginx configuration           |
| `config/env.php`     | Database config with `host: mysql` for Docker |
| `.dockerignore`      | Excludes unnecessary files from builds        |

**Usage:**
```bash
docker-compose up -d --build
```
- App: http://localhost:8082
- phpMyAdmin: http://localhost:8083

---

## 2. CSS/Asset Path Fixes

**Problem:** Hardcoded paths like `/sdecombats/assets/` and `/sdecombats/public/assets/` break on Linux because they assume a specific deployment path.

**Solution:** Changed all asset paths to root-relative `/assets/` which works universally.

**Files Modified:**
- `app/Views/common/header.php`
- `app/Views/common/authHeader.php`
- `app/Views/common/footer.php`
- `app/Views/login-protected/customer-dashboard.php`
- `app/Views/login-protected/dashboard-update-info.php`
- `app/Views/pages/activities.php`
- `app/Views/pages/big-groups.php`
- `app/Views/pages/small-groups.php`
- `app/Views/pages/contact.php`

**Also removed:** Duplicate CSS links in `header.php` and `authHeader.php` (had both Wampoon and nginx versions).

---

## 3. Bug Fix: Missing `</script>` Tag

**File:** `app/Views/common/header.php:34`

**Problem:**
```html
<script src="/assets/js/desktop-nav.js" defer>
```

**Fix:**
```html
<script src="/assets/js/desktop-nav.js" defer></script>
```

This caused the entire navigation HTML to be interpreted as JavaScript, resulting in a blank gray page.

---

## 4. README Updated

Added Docker setup instructions and service table to `README.md`.
