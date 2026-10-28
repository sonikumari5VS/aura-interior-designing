# Aura Interiors — Modern & Luxury Interior Design Website

An award-winning, luxury, minimal, and aesthetic interior design website for **“Aura Interiors”**, crafted with a warm, sensory color palette (beige, cream, white, light brown, and dark charcoal), high-resolution interior photography, fluid micro-animations, and full-stack PHP/MySQL database architecture.

---

## ✦ Key Highlights & Feature Matrix

| Feature | Description | File |
| :--- | :--- | :--- |
| **Homepage** | Cinematic hero with background interior imagery, dual CTAs, stats counter, featured project cards, services overview, "Why Choose Us" value props, design process timeline, client testimonials, and footer. | `index.php` |
| **About Us** | Studio heritage, mission & vision, 5-phase design methodology, leadership & artisan profiles, and milestone statistics. | `about.php` |
| **9 Design Services** | Dedicated showcase cards with feature checklists and 1-click consultation triggers for all 9 specified disciplines. | `services.php` |
| **Projects & Portfolio** | Live interactive filtering (Living Room, Bedroom, Kitchen, Office, Luxury Interiors), instant live search bar, and hover zoom cards. | `projects.php` |
| **Project Detail Case Study** | Deep dive with design concept, client brief, architectural solutions, interactive color palette swatches, material finish tags, and multi-angle photo gallery. | `project-detail.php` |
| **Gallery & Inspiration** | Filterable moodboard (Modern, Minimalist, Luxury, Traditional, Contemporary, Small-Space) with full-screen lightbox modal. | `gallery.php` |
| **Consultation & Contact** | Multi-field booking form with client-side & server-side validation, CSRF tokens, Beverly Hills studio hours, address, Google Maps embed, and WhatsApp button. | `contact.php` |
| **Inquiries Admin Panel** | Management dashboard to review and update consultation bookings and contact messages in real-time. | `admin/index.php` |
| **Database Installer** | Automated database setup and system diagnostics helper. | `setup.php` |
| **Floating Actions** | Floating WhatsApp concierge button with pre-filled messages and smooth Back-to-Top scroll. | `includes/whatsapp-button.php` |

---

## 🎨 Design System & Aesthetics

### Warm Sensory Palette
- **Primary Sand / Warm Gold**: `#C5A880` / `#A5855A`
- **Cream & Off-White Backgrounds**: `#FBF9F5` / `#F3EFE8`
- **Warm Beige & Sandstone**: `#EBE3D7` / `#DFD5C6`
- **Deep Charcoal / Architectural Black**: `#1C1917` / `#2E2926`
- **Pristine White**: `#FFFFFF`

### Typography Hierarchy
- **Luxury Editorial Headings**: `Playfair Display` & `Cormorant Garamond` (Google Fonts)
- **Modern Clean Body & UI**: `Plus Jakarta Sans` (Google Fonts)
- **Iconography**: Bootstrap Icons v1.11.3

---

## 🏛️ The 9 Specialized Services Covered

1. **Residential Interior Design**: Comprehensive architectural redesign, custom built-ins, and turnkey delivery.
2. **Living Room Design**: Double-height lounges, limestone plinths, curved bouclé sofas, and acoustic drapery.
3. **Bedroom Design**: Cocooning master suites, leather panels, smart circadian lighting, and custom walk-in closets.
4. **Modular Kitchen Design**: Monolithic Taj Mahal quartzite islands, concealed pantries, and matte German joinery.
5. **Office Interior Design**: Biophilic executive suites, acoustic felt baffling, and ergonomic conference rooms.
6. **Commercial Interior Design**: Signature retail boutiques, luxury hospitality venues, and atmospheric lighting.
7. **Space Planning**: Millimeter-accurate 2D CAD architectural mapping, sightline analysis, and daylight trajectory modeling.
8. **Furniture & Home Decor Consultation**: Exclusive trade showroom access, bespoke artisan commissions, and textile curation.
9. **3D Interior Visualization**: Photorealistic ray-traced 4K CGI renderings and immersive virtual walkthroughs.

---

## 💻 Technology Stack

- **Frontend**: HTML5, CSS3 (Custom Luxury Design System with CSS variables), JavaScript (ES6+), Bootstrap 5.3.3.
- **Backend**: PHP 8.2+ (Compatible with PHP 7.4 through 8.3+).
- **Database**: MySQL / MariaDB via PDO with prepared statements, SQL injection protection, and input sanitization.
- **Fallback Engine**: Smart embedded SQLite fallback so the website works immediately even before the MySQL daemon is started.
- **Environment**: Designed for XAMPP (`C:\xampp\htdocs\aura-interiors`) or PHP Built-in Server.

---

## 📁 Project Directory Structure

```
aura-interiors/
├── admin/
│   └── index.php                 # Studio Inquiries & Consultations Dashboard
├── assets/
│   ├── css/
│   │   └── style.css             # Luxury aesthetic stylesheet, animations & responsive media queries
│   └── js/
│       └── main.js               # Dynamic category filtering, search, lightbox, counters, and AJAX forms
├── config/
│   ├── config.php                # Site constants, brand info, WhatsApp business number, CSRF utilities
│   └── database.php              # PDO MySQL connection with prepared statements & resilient SQLite fallback
├── includes/
│   ├── header.php                # HTML5 head, SEO metadata, JSON-LD schema, Google fonts & CSS
│   ├── navbar.php                # Sticky glassmorphic navigation bar with active states & mobile collapse
│   ├── footer.php                # Luxury footer, newsletter form, studio details & social links
│   ├── consultation-modal.php    # Global 1-click consultation booking modal
│   └── whatsapp-button.php       # Floating WhatsApp button and Back-to-Top trigger
├── index.php                     # Homepage
├── about.php                     # About Us page
├── services.php                  # Services catalogue for all 9 disciplines
├── projects.php                  # Portfolio with filter pills & live search
├── project-detail.php            # Individual case study with color palette & materials
├── gallery.php                   # Inspiration gallery with lightbox modal
├── contact.php                   # Consultation & contact page with form validation & map
├── process-form.php              # Form submission handler (prepared statements & CSRF protection)
├── setup.php                     # Interactive database diagnostics & installer helper
├── aura_interiors.sql            # Complete MySQL database schema and rich seed data
└── README.md                     # Comprehensive documentation
```

---

## 🚀 How to Run the Website

### Option 1: Using XAMPP (Recommended)

1. **Copy or move the project folder** to your XAMPP `htdocs` directory:
   ```
   C:\xampp\htdocs\aura-interiors
   ```
2. **Start XAMPP**:
   - Open **XAMPP Control Panel**.
   - Click **Start** for **Apache** and **MySQL**.
3. **Import Database (Two easy methods)**:
   - **Method A (Web Helper)**: Open `http://localhost/aura-interiors/setup.php` in your browser and click **"(Re)Import SQL Schema & Seeds"**.
   - **Method B (phpMyAdmin)**: Open `http://localhost/phpmyadmin`, create a database named `aura_interiors`, and import `aura_interiors.sql`.
4. **View Website**:
   - Open `http://localhost/aura-interiors/index.php` in your browser.
   - Open `http://localhost/aura-interiors/admin/index.php` to view submitted inquiries!

### Option 2: Using PHP's Built-in Web Server

1. Open PowerShell or Terminal in the project root:
   ```powershell
   cd C:\Users\lenovo\.gemini\antigravity\scratch\aura-interiors
   ```
2. Run the PHP server:
   ```powershell
   C:\xampp\php\php.exe -S localhost:8000
   ```
3. Open your browser and navigate to:
   ```
   http://localhost:8000
   ```
   *(The built-in resilient SQLite data layer activates automatically if MySQL is not running, ensuring you can preview all 9 services, projects, and gallery immediately!)*

---

## 🔒 Security & Best Practices

- **Prepared Statements**: All SQL queries use PDO parameter binding (`$stmt->prepare()`, `$stmt->execute()`), safeguarding completely against SQL injection.
- **Input Sanitization**: All form inputs are sanitized using `htmlspecialchars(..., ENT_QUOTES, 'UTF-8')` and `FILTER_SANITIZE_EMAIL`.
- **CSRF Protection**: Form submissions require a valid cryptographic `csrf_token` stored in the session.
- **SEO & Accessibility**: Complete OpenGraph meta tags, Twitter card definitions, and structured `HomeAndConstructionBusiness` Schema JSON-LD markup.
- **Configurable WhatsApp**: Modify `WHATSAPP_NUMBER` in `config/config.php` to immediately change the WhatsApp concierge business destination across the entire site.
