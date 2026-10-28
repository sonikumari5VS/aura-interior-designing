<?php
/**
 * Aura Interiors - Consultation and Contact Page
 */
$page_title = "Book a Consultation & Studio Inquiries";
$page_desc = "Connect with Aura Interiors. Book a private design consultation, inquire about residential or commercial projects, or chat directly with our design concierge.";

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- Page Hero -->
<header class="page-hero" style="background-image: url('https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1920&q=80');">
  <div class="page-hero-overlay"></div>
  <div class="container position-relative">
    <div class="page-hero-content">
      <span class="section-tag tag-dark">Direct Concierge</span>
      <h1 class="page-hero-title font-serif-luxury">Begin Your Design Journey</h1>
      <p class="page-hero-subtitle">
        Whether scheduling a private design session in our Beverly Hills studio or initiating a worldwide residential project, we are at your service.
      </p>
    </div>
  </div>
</header>

<!-- Contact & Consultation Section -->
<section class="py-5" style="background-color: var(--color-cream);">
  <div class="container py-lg-4">
    
    <!-- Flash Messages (for standard form submission fallback) -->
    <?php if (!empty($_SESSION['flash_success'])): ?>
      <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> <?= htmlspecialchars($_SESSION['flash_success']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION['flash_success']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['flash_error'])): ?>
      <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= htmlspecialchars($_SESSION['flash_error']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION['flash_error']); ?>
    <?php endif; ?>

    <div class="row g-5">
      <!-- Left Column: Studio Information & Quick Chat -->
      <div class="col-lg-5">
        <span class="section-tag">Studio Headquarters</span>
        <h2 class="section-title fs-2 mb-4">We Welcome Discerning Inquiries</h2>
        <p class="text-muted mb-4">
          Every extraordinary home begins with an open, thoughtful conversation. Our design team is available by appointment for in-studio consultations, on-site walkthroughs, and worldwide digital meetings.
        </p>

        <!-- Studio Details Cards -->
        <div class="card p-4 border-0 shadow-sm mb-3" style="background-color: var(--color-white); border-left: 4px solid var(--color-primary) !important;">
          <div class="d-flex align-items-start gap-3">
            <div class="service-icon-box mb-0" style="width: 44px; height: 44px; font-size: 1.25rem;">
              <i class="bi bi-geo-alt"></i>
            </div>
            <div>
              <h6 class="fw-bold mb-1 font-sans">Studio Address</h6>
              <p class="text-muted small mb-0"><?= STUDIO_ADDRESS ?></p>
            </div>
          </div>
        </div>

        <div class="card p-4 border-0 shadow-sm mb-3" style="background-color: var(--color-white); border-left: 4px solid var(--color-primary) !important;">
          <div class="d-flex align-items-start gap-3">
            <div class="service-icon-box mb-0" style="width: 44px; height: 44px; font-size: 1.25rem;">
              <i class="bi bi-telephone"></i>
            </div>
            <div>
              <h6 class="fw-bold mb-1 font-sans">Telephone & Private Concierge</h6>
              <p class="text-muted small mb-0">Direct: <a href="tel:<?= STUDIO_PHONE_RAW ?>" class="text-dark fw-semibold"><?= STUDIO_PHONE ?></a></p>
              <p class="text-muted small mb-0">Email: <a href="mailto:<?= STUDIO_EMAIL ?>" class="text-dark"><?= STUDIO_EMAIL ?></a></p>
            </div>
          </div>
        </div>

        <div class="card p-4 border-0 shadow-sm mb-3" style="background-color: var(--color-white); border-left: 4px solid var(--color-primary) !important;">
          <div class="d-flex align-items-start gap-3">
            <div class="service-icon-box mb-0" style="width: 44px; height: 44px; font-size: 1.25rem;">
              <i class="bi bi-clock"></i>
            </div>
            <div>
              <h6 class="fw-bold mb-1 font-sans">Studio Working Hours</h6>
              <p class="text-muted small mb-0"><?= STUDIO_HOURS ?></p>
              <p class="text-muted small mb-0">Weekend sessions strictly by prior arrangement.</p>
            </div>
          </div>
        </div>

        <!-- WhatsApp Direct Inquiry Highlight -->
        <div class="p-4 rounded border mt-4 text-white position-relative overflow-hidden" style="background-color: var(--color-charcoal);">
          <div class="d-flex align-items-center gap-3 mb-2">
            <i class="bi bi-whatsapp text-success fs-2"></i>
            <h5 class="font-serif-luxury text-white mb-0">Instant WhatsApp Concierge</h5>
          </div>
          <p class="text-white-50 small mb-3">
            Prefer a direct text or voice message? Connect instantly with our client relations lead via official WhatsApp.
          </p>
          <a href="<?= get_whatsapp_url() ?>" target="_blank" rel="noopener" class="btn btn-aura btn-aura-primary btn-aura-sm w-100">
            <i class="bi bi-whatsapp me-2"></i> Open WhatsApp Chat
          </a>
        </div>

        <!-- Social Media Links -->
        <div class="mt-4 pt-2">
          <span class="d-block text-muted small text-uppercase tracking-wider mb-2">Follow Our Portfolio</span>
          <div class="social-links">
            <a href="<?= SOCIAL_INSTAGRAM ?>" target="_blank" rel="noopener" class="social-btn text-dark bg-white border" title="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="<?= SOCIAL_PINTEREST ?>" target="_blank" rel="noopener" class="social-btn text-dark bg-white border" title="Pinterest"><i class="bi bi-pinterest"></i></a>
            <a href="<?= SOCIAL_LINKEDIN ?>" target="_blank" rel="noopener" class="social-btn text-dark bg-white border" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
            <a href="<?= SOCIAL_HOUZZ ?>" target="_blank" rel="noopener" class="social-btn text-dark bg-white border" title="Houzz"><i class="bi bi-house-door"></i></a>
          </div>
        </div>
      </div>

      <!-- Right Column: Full Consultation & Inquiries Form -->
      <div class="col-lg-7">
        <div class="form-aura">
          <div class="mb-4">
            <span class="section-tag">Initial Consultation</span>
            <h3 class="font-serif-luxury fs-2 mb-2">Schedule Your Private Consultation</h3>
            <p class="text-muted small">
              Please complete the inquiry details below. Our senior designers will review your submission and contact you within 24 hours.
            </p>
          </div>

          <form action="<?= BASE_URL ?>/process-form.php" method="POST" data-ajax-submit="true" novalidate class="needs-validation">
            <input type="hidden" name="action" value="consultation">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">

            <div class="row g-3">
              <!-- Name -->
              <div class="col-md-6">
                <label for="contactName" class="form-label">Full Name *</label>
                <input type="text" class="form-control" id="contactName" name="full_name" required placeholder="e.g. Jacqueline Morgan">
                <div class="invalid-feedback">Please provide your name.</div>
              </div>

              <!-- Email -->
              <div class="col-md-6">
                <label for="contactEmail" class="form-label">Email Address *</label>
                <input type="email" class="form-control" id="contactEmail" name="email" required placeholder="name@domain.com">
                <div class="invalid-feedback">Please provide a valid email.</div>
              </div>

              <!-- Phone -->
              <div class="col-md-6">
                <label for="contactPhone" class="form-label">Phone / WhatsApp Number *</label>
                <input type="tel" class="form-control" id="contactPhone" name="phone" required placeholder="+1 (555) 000-0000">
                <div class="invalid-feedback">Please enter your telephone number.</div>
              </div>

              <!-- Service Selection -->
              <div class="col-md-6">
                <label for="contactService" class="form-label">Primary Service Required *</label>
                <select class="form-select" id="contactService" name="service_name" required>
                  <option value="" selected disabled>Select primary service...</option>
                  <option value="Residential Interior Design">Residential Interior Design</option>
                  <option value="Living Room Design">Living Room Design</option>
                  <option value="Bedroom Design">Bedroom Design</option>
                  <option value="Modular Kitchen Design">Modular Kitchen Design</option>
                  <option value="Office Interior Design">Office Interior Design</option>
                  <option value="Commercial Interior Design">Commercial Interior Design</option>
                  <option value="Space Planning">Space Planning</option>
                  <option value="Furniture and Home Decor Consultation">Furniture and Home Decor Consultation</option>
                  <option value="3D Interior Visualization">3D Interior Visualization</option>
                  <option value="Full Estate Turnkey Package">Full Estate Turnkey Package</option>
                </select>
                <div class="invalid-feedback">Please select a service discipline.</div>
              </div>

              <!-- Property Type -->
              <div class="col-md-6">
                <label for="contactPropertyType" class="form-label">Property / Space Type</label>
                <select class="form-select" id="contactPropertyType" name="property_type">
                  <option value="Luxury Apartment">Luxury Apartment</option>
                  <option value="Penthouse Duplex">Penthouse Duplex</option>
                  <option value="Private Villa / Estate">Private Villa / Estate</option>
                  <option value="Townhouse / Brownstone">Townhouse / Brownstone</option>
                  <option value="Corporate HQ / Office">Corporate HQ / Office</option>
                  <option value="Boutique Commercial / Retail">Boutique Commercial / Retail</option>
                </select>
              </div>

              <!-- Budget Range -->
              <div class="col-md-6">
                <label for="contactBudget" class="form-label">Target Investment Budget *</label>
                <select class="form-select" id="contactBudget" name="budget_range" required>
                  <option value="" selected disabled>Select expected budget...</option>
                  <option value="$15,000 – $30,000">$15,000 – $30,000</option>
                  <option value="$30,000 – $60,000">$30,000 – $60,000</option>
                  <option value="$60,000 – $120,000">$60,000 – $120,000</option>
                  <option value="$120,000 – $250,000">$120,000 – $250,000</option>
                  <option value="$250,000+">$250,000+ (Master Estate)</option>
                </select>
                <div class="invalid-feedback">Please select an investment range.</div>
              </div>

              <!-- Preferred Date -->
              <div class="col-md-6">
                <label for="contactDate" class="form-label">Target Consultation Date</label>
                <input type="date" class="form-control" id="contactDate" name="preferred_date" min="<?= date('Y-m-d') ?>">
              </div>

              <!-- Project Location -->
              <div class="col-md-6">
                <label for="contactLocation" class="form-label">Project Location (City, State / Country)</label>
                <input type="text" class="form-control" id="contactLocation" name="project_location" placeholder="e.g. Beverly Hills, CA or London, UK">
              </div>

              <!-- Message / Description -->
              <div class="col-12">
                <label for="contactDescription" class="form-label">Project Overview & Desired Aesthetic *</label>
                <textarea class="form-control" id="contactDescription" name="description" rows="4" required placeholder="Tell us about your home, key requirements, preferred design mood (e.g. warm minimalism, contemporary classic, Italian luxury), and anticipated project start date."></textarea>
                <div class="invalid-feedback">Please enter a project description (minimum 10 characters).</div>
              </div>

              <div class="col-12 pt-3">
                <button type="submit" class="btn btn-aura btn-aura-primary w-100 py-3">
                  <i class="bi bi-send me-2"></i> Submit Consultation Booking
                </button>
                <p class="text-muted small text-center mt-3 mb-0">
                  <i class="bi bi-shield-lock me-1"></i> Respecting your privacy: We never share or sell personal information.
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Map & Studio Location Card -->
    <div class="mt-5 pt-4">
      <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px;">
        <div class="row g-0 align-items-center">
          <div class="col-md-8" style="min-height: 320px; background-color: var(--color-warm-beige);">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.212003884813!2d-118.40321282361097!3d34.064041117105084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bc00b21845bb%3A0xb35a0937a5f6dfa9!2sCanon%20Dr%2C%20Beverly%20Hills%2C%20CA%2090210!5e0!3m2!1sen!2sus!4v1711000000000!5m2!1sen!2sus" 
              width="100%" 
              height="340" 
              style="border:0; filter: grayscale(20%) contrast(90%); display:block;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade"
              title="Aura Interiors Beverly Hills Studio Location">
            </iframe>
          </div>
          <div class="col-md-4 p-4 p-lg-5 bg-white">
            <span class="section-tag mb-2">Private Studio Visits</span>
            <h4 class="font-serif-luxury fs-4 mb-2">Beverly Hills Atelier</h4>
            <p class="text-muted small mb-3">
              Experience material samples, European wood finishes, Italian marble slabs, and custom fabric swatches firsthand in our private design gallery.
            </p>
            <p class="small text-muted mb-0">
              Valet parking available at our Canon Drive entrance.
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
