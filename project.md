# Spanner and Jerk Motors — Website

Multi-page auto repair and imports business website for **Spanner and Jerk Motors** in **OFANKOR SEVEN DAYS, Accra, Ghana**.

---

## Business Details

| Field | Value |
|-------|-------|
| **Name** | Spanner and Jerk Motors |
| **Location** | OFANKOR SEVEN DAYS, Accra, Ghana |
| **Phone** | 0243317610 / 054300064 |
| **Email** | abdulissa2@gmail.com |
| **WhatsApp** | +233 24 331 7610 |
| **Color Scheme** | Navy `#01114D`, Near-black `#0E1116`/`#0D1015`, White, Red accent `#D42A1A` |
| **Pricing** | Very cheap / cheapest in town — all prices in GH₵ (Ghanaian Cedis) |
| **Logo** | `SPANNER AND JACK MOTORS.jpeg` (1024×1536, ~648KB — filename has "JACK", business name has "JECKS") |

### Services
- Global imports of cars & spare parts
- Home used engines
- Alternators, spark plugs, shock absorbers
- Auto spray
- Welding & fabrication
- Key programming for lost keys
- Diagnostics & repairs

---

## Slogan

> **Global Expertise. Local Prices. Unbeatable Value.**

## Vision

> To be Ghana's most trusted destination for quality automotive imports and expert repair services — bringing the world's best auto parts to our local community.

## Mission

> To deliver reliable, affordable automotive solutions through global sourcing, skilled craftsmanship, and unwavering integrity — keeping every vehicle on the road with confidence.

---

## Pages

| Page | File | Lines | Size | Description |
|------|------|-------|------|-------------|
| Home | `index.html` | ~3243 | 122 KB | Full landing: hero with slogan, carousel, services, about with Vision/Mission, engines, pricing, testimonials, gallery, blog, booking form, contact, FAQ, map, newsletter, footer |
| Services | `services.html` | ~530 | 32 KB | 6 animated service cards, engines CTA |
| Gallery | `gallery.html` | ~400 | 28 KB | 10 animated gallery items |
| Blog | `blog.html` | ~440 | 30 KB | 6 animated blog cards |
| 404 | `404.html` | ~270 | 22 KB | Full header/nav, theme toggle, footer, animated content |
| Contact Handler | `contact.php` | 83 | 4 KB | PHPMailer Gmail SMTP (needs App Password) |
| Config | `.htaccess` | 42 | 1.5 KB | Caching, gzip, security headers, 404 |
| SEO | `robots.txt` | 3 | 0.1 KB | Allow all, points to sitemap |
| SEO | `sitemap.xml` | 16 | 0.6 KB | 5 pages with priority scores |
| Logo | `SPANNER AND JACK MOTORS.jpeg` | — | 648 KB | Logo image |

---

## Features (All Pages)

- **Responsive design** — mobile-first with hamburger nav
- **Dark/light theme** — persisted via `localStorage`
- **Preloader** — logo splash on load
- **Page transition overlay** — dark fade between page navigations
- **Smooth anchor scroll** — with header offset compensation
- **Scroll reveal** — IntersectionObserver-based fade-in animations (5 variants, stagger delays 1–6)
- **Hover-glow** effects on cards
- **Reduced motion** support (`prefers-reduced-motion`)
- **Cookie consent banner** — localStorage-persisted accept/decline
- **Newsletter signup** — POSTs to `contact.php`
- **Floating WhatsApp button** — toggles chat bubble
- **Chat bubble** — WhatsApp link with "start chat" button
- **Floating call button** — direct `tel:` link
- **Back-to-top button** — appears after 400px scroll
- **Scroll progress bar** — top-of-page indicator
- **Theme toggle** — sun/moon icon
- **SEO** — Open Graph, Twitter Card, robots, keywords, canonical tags on all pages
- **Lazy loading** on all images
- **Mobile compatibility** — `safe-area-inset` for iPhone notch, 16px font-size on inputs (prevents iOS zoom), `100dvh` fallback, `hover:none` media query for touch devices, `-webkit-tap-highlight-color:transparent`

### Home Page Only
- **Carousel** — 3 auto-rotating slides with dots, prev/next, touch swipe (50px threshold)
- **Comparison slider** — before/after drag handle
- **Hero stats** — animated counters (10+ years, 2000+ cars, 500+ clients)
- **Video modal** — click-to-open
- **Lightbox** — gallery click-to-view
- **FAQ accordion** — click expand/collapse
- **Testimonials** — card slider with dots + touch swipe
- **Particles canvas** — animated dot background

---

## Contact Form

### Primary (Client-Side)
Forms use `mailto:` protocol to open the user's local email client with pre-filled subject and body. Also shows a Gmail web compose fallback link.

### Backup (Server-Side — PHP)
Uses **PHPMailer** via Composer (`vendor/autoload.php`) with Gmail SMTP.

**Setup required:** Generate a Gmail App Password at https://myaccount.google.com/apppasswords and paste it into `contact.php:65`:
```php
$mail->Password = 'your-16-char-app-password'; // no spaces
```

Then contact form submissions and newsletter signups will send email via SMTP.

---

## CSS Architecture

- All styles are inline `<style>` blocks per page (no external CSS files)
- CSS custom properties (variables) for theming
- Dark mode: `[data-theme="dark"]` (default) / `[data-theme="light"]`
- Utility classes: `.gradient-text`, `.glass`, `.glow`, `.section-padding`, `.accent-line`
- Animation classes: `.fade-in`, `.fade-in-left`, `.fade-in-right`, `.fade-in-up`, `.fade-scale`
- Stagger delays: `.stagger-1` through `.stagger-6`
- Icon library: Font Awesome 6.5.1 (CDN)
- Fonts: Oswald (headings), Poppins (body) — Google Fonts CDN

---

## JavaScript Architecture

All JS is inline `<script>` blocks per page (no external JS files). Each feature is wrapped in an IIFE. Libraries used:
- IntersectionObserver API (scroll reveal, stat counters)
- Fetch API (newsletter submission)
- LocalStorage API (theme, cookie consent)

---

## Server Setup

- **Local dev:** XAMPP at `C:\xampp\htdocs\SJMOTORS` → `http://localhost/SJMOTORS/`
- **Production domain:** `https://spannerandjerkmotors.com`
- **.htaccess** handles caching, gzip, security headers, 404
- **PHPMailer** installed via Composer at `vendor/phpmailer/phpmailer`

---

## Key Configuration Values (set in CSS `:root`)

```css
:root {
  --whatsapp-number: 233243317610;
  --phone: '0243317610 / 054300064';
  --email: 'abdulissa2@gmail.com';
  --address: 'OFANKOR SEVEN DAYS, Accra, Ghana';
}
```

The CONFIG REPLACER JS block reads these variables and populates `--phone--`, `--email--`, `--address--` placeholders throughout the page.

---

## Dependencies

- `phpmailer/phpmailer: ^7.1` — installed via Composer for SMTP email delivery
- Font Awesome 6.5.1 — CDN
- Google Fonts (Oswald, Poppins) — CDN

---

## Remaining Steps

1. Set Gmail App Password in `contact.php:65` for SMTP to work
2. Update social media links in CSS `:root` block (facebook, instagram, tiktok, youtube, twitter)
3. Replace placeholder blog content with real articles
4. Add more gallery images
5. Enable HTTPS rewrite in `.htaccess` when deploying to production
