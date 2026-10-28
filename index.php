<?php
/**
 * Aura Interiors - Homepage
 */
$page_title = "Modern & Luxury Interior Design";
$page_desc = "Transform your space into something extraordinary with Aura Interiors. Award-winning residential, living room, bedroom, kitchen, and commercial interior architecture.";

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

// Fetch featured projects, services, and testimonials from database
$featured_projects = fetch_projects(null, true, 4);
if (empty($featured_projects)) {
    $featured_projects = fetch_projects(null, false, 4);
}
$services = fetch_services(true);
$testimonials = fetch_testimonials(true);
?>

<!-- 1. HERO SECTION -->
<header class="hero-section" style="background-image: url('https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1920&q=85');">
  <div class="hero-overlay"></div>
  <div class="container position-relative">
    <div class="hero-content">
      <span class="hero-tag">Aura Interiors • Architectural & Bespoke Living</span>
      <h1 class="hero-title">
        Transform Your Space Into Something <span style="color: var(--color-primary-light); font-style: italic;">Extraordinary.</span>
      </h1>
      <p class="hero-subtitle">
        We design beautiful, functional spaces that reflect your personality and lifestyle. From master suites to sprawling penthouses, we balance minimalist serenity with tactile warmth.
      </p>
      
      <div class="d-flex flex-wrap gap-3">
        <a href="<?= BASE_URL ?>/projects.php" class="btn btn-aura btn-aura-primary">
          <i class="bi bi-grid-3x3-gap me-1"></i> Explore Our Projects
        </a>
        <button type="button" class="btn btn-aura btn-aura-outline-white" data-bs-toggle="modal" data-bs-target="#consultationModal">
          <i class="bi bi-calendar2-check me-1"></i> Book a Consultation
        </button>
      </div>

      <!-- Quick Stats Counter Strip inside Hero -->
      <div class="hero-stats-badge">
        <div class="hero-stat-item">
          <h4 class="counter-value" data-target="14" data-suffix="+">14+</h4>
          <p>Years of Mastery</p>
        </div>
        <div class="hero-stat-item">
          <h4 class="counter-value" data-target="350" data-suffix="+">350+</h4>
          <p>Projects Realized</p>
        </div>
        <div class="hero-stat-item">
          <h4 class="counter-value" data-target="98" data-suffix="%">98%</h4>
          <p>Client Satisfaction</p>
        </div>
        <div class="hero-stat-item">
          <h4 class="counter-value" data-target="22" data-suffix="">22</h4>
          <p>Global Design Awards</p>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- 2. BRAND INTRO & DESIGN ETHOS -->
<section class="py-5" style="background-color: var(--color-white); border-bottom: 1px solid var(--color-border);">
  <div class="container py-lg-4">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <span class="section-tag">Philosophy & Heritage</span>
        <h2 class="section-title">Where Refined Proportions Meet Sensory Serenity</h2>
        <p class="lead text-dark" style="font-family: var(--font-serif); font-size: 1.25rem; line-height: 1.7;">
          “A home should not merely impress the eye — it must calm the mind, elevate conversation, and support the effortless rhythms of human living.”
        </p>
        <p>
          Founded on the principle of understated luxury, Aura Interiors blends natural earth tones — warm beiges, creamy linens, fluted marbles, and smoked timbers — to produce sanctuaries devoid of clutter yet rich in organic depth.
        </p>
        <p>
          Every custom piece, lighting trajectory, and millimeter of architectural millwork is conceived with uncompromising intention and turnkey precision.
        </p>
        <div class="pt-2">
          <a href="<?= BASE_URL ?>/about.php" class="btn btn-aura btn-aura-dark">
            Discover Our Story <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row g-3">
          <div class="col-6">
            <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=700&q=80" alt="Living sanctuary interior" class="img-fluid rounded shadow-sm" style="height: 380px; width: 100%; object-fit: cover;">
          </div>
          <div class="col-6 pt-4">
            <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=700&q=80" alt="Minimalist dining room" class="img-fluid rounded shadow-sm mb-3" style="height: 220px; width: 100%; object-fit: cover;">
            <div class="p-3 rounded text-center" style="background-color: var(--color-cream-alt); border: 1px solid var(--color-border);">
              <span class="font-serif-luxury fs-3 d-block text-dark fw-bold">100%</span>
              <span class="small text-uppercase tracking-wider text-muted">Bespoke Architectural Detailing</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 3. FEATURED PROJECTS SECTION -->
<section class="py-5" style="background-color: var(--color-cream);">
  <div class="container py-lg-4">
    <div class="d-flex flex-wrap justify-content-between align-items-end mb-4">
      <div>
        <span class="section-tag">Featured Portfolio</span>
        <h2 class="section-title mb-0">Signature Spaces & Completed Residences</h2>
      </div>
      <div class="mt-3 mt-md-0">
        <a href="<?= BASE_URL ?>/projects.php" class="btn btn-aura btn-aura-outline">
          View All Projects <i class="bi bi-arrow-up-right ms-1"></i>
        </a>
      </div>
    </div>

    <div class="row g-4 mt-2">
      <?php foreach ($featured_projects as $proj): ?>
        <div class="col-lg-6">
          <div class="project-card">
            <div class="project-img-wrapper">
              <img src="<?= htmlspecialchars($proj['cover_image']) ?>" alt="<?= htmlspecialchars($proj['title']) ?>" class="project-img" loading="lazy">
              <div class="project-overlay">
                <span class="project-category-badge"><?= htmlspecialchars($proj['category_name']) ?></span>
                <h3 class="project-title"><?= htmlspecialchars($proj['title']) ?></h3>
                <div class="project-meta">
                  <span><i class="bi bi-geo-alt me-1"></i> <?= htmlspecialchars($proj['location']) ?></span>
                  <span><i class="bi bi-arrows-angle-expand me-1"></i> <?= htmlspecialchars($proj['area']) ?></span>
                  <a href="<?= BASE_URL ?>/project-detail.php?slug=<?= urlencode($proj['slug']) ?>" class="ms-auto text-white fw-bold d-inline-flex align-items-center">
                    Explore Case Study <i class="bi bi-arrow-right ms-2"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- 4. SERVICES OVERVIEW SECTION -->
<section class="py-5" style="background-color: var(--color-white); border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border);">
  <div class="container py-lg-4">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="section-tag">Our Expertise</span>
      <h2 class="section-title">Holistic Interior Architecture & Styling</h2>
      <p class="section-subtitle">
        From comprehensive full-home transformations to curated furniture procurement, our multidisciplinary studio delivers tailored design solutions for every realm of life.
      </p>
    </div>

    <div class="row g-4">
      <?php foreach ($services as $srv): ?>
        <div class="col-lg-4 col-md-6">
          <div class="card-aura service-card">
            <div class="service-card-img-wrapper">
              <img src="<?= htmlspecialchars($srv['image_url']) ?>" alt="<?= htmlspecialchars($srv['title']) ?>" class="service-card-img" loading="lazy">
              <span class="service-card-badge"><?= htmlspecialchars($srv['category']) ?></span>
            </div>
            <div class="service-card-body">
              <div class="service-icon-box">
                <i class="bi <?= htmlspecialchars($srv['icon']) ?>"></i>
              </div>
              <h4 class="service-card-title"><?= htmlspecialchars($srv['title']) ?></h4>
              <p class="service-card-text text-muted">
                <?= htmlspecialchars(substr($srv['description'], 0, 135)) ?>...
              </p>
              <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-auto">
                <a href="<?= BASE_URL ?>/services.php#<?= htmlspecialchars($srv['slug']) ?>" class="fw-semibold text-dark text-decoration-none small">
                  Learn Details <i class="bi bi-chevron-right ms-1"></i>
                </a>
                <button type="button" class="btn btn-aura-primary btn-aura-sm" data-bs-toggle="modal" data-bs-target="#consultationModal" data-service="<?= htmlspecialchars($srv['title']) ?>">
                  Inquire
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-5">
      <a href="<?= BASE_URL ?>/services.php" class="btn btn-aura btn-aura-dark">
        View All 9 Services & Packages <i class="bi bi-arrow-right ms-1"></i>
      </a>
    </div>
  </div>
</section>

<!-- 5. WHY CUSTOMERS CHOOSE US -->
<section class="py-5" style="background-color: var(--color-cream-alt);">
  <div class="container py-lg-4">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="section-tag">The Aura Distinction</span>
      <h2 class="section-title">Why Discerning Clients Choose Us</h2>
      <p class="section-subtitle">
        We eliminate the chaos and uncertainty of interior renovations through architectural rigor, photorealistic 3D fidelity, and transparent project stewardship.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          <div class="feature-icon-circle">
            <i class="bi bi-palette"></i>
          </div>
          <h4 class="fs-4 mb-3">Tailored Design Sensibility</h4>
          <p class="text-muted">
            We avoid cookie-cutter formulas. Every plan is an intimate response to your daily rituals, lighting trajectories, architectural context, and emotional wellness.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          <div class="feature-icon-circle">
            <i class="bi bi-badge-vr"></i>
          </div>
          <h4 class="fs-4 mb-3">Hyper-Realistic 3D Renders</h4>
          <p class="text-muted">
            Walk through your completed rooms in ray-traced 4K resolution before execution begins. Experience authentic daylight, materials, and spatial proportions with zero guesswork.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          <div class="feature-icon-circle">
            <i class="bi bi-key"></i>
          </div>
          <h4 class="fs-4 mb-3">Seamless Turnkey Execution</h4>
          <p class="text-muted">
            From municipal approvals and contractor management to white-glove installation and scent styling, our team directs every stage with concierge-level care.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          <div class="feature-icon-circle">
            <i class="bi bi-gem"></i>
          </div>
          <h4 class="fs-4 mb-3">Master Craftsmanship & Sourcing</h4>
          <p class="text-muted">
            Exclusive relationships with Italian marble quarries, Portuguese limestone carvers, and bespoke Scandinavian millworkers ensure generational material quality.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          <div class="feature-icon-circle">
            <i class="bi bi-cash-stack"></i>
          </div>
          <h4 class="fs-4 mb-3">Transparent Budgeting</h4>
          <p class="text-muted">
            Detailed bill of quantities, itemized procurement schedules, and strict phase milestone approvals ensure your investment is respected down to the last dollar.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          <div class="feature-icon-circle">
            <i class="bi bi-clock-history"></i>
          </div>
          <h4 class="fs-4 mb-3">Guaranteed Timeline Handover</h4>
          <p class="text-muted">
            Our agile project management protocols and on-site site supervisors ensure milestones are met on schedule, delivering seamless move-in readiness.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 6. OUR CREATIVE DESIGN PROCESS -->
<section class="py-5" style="background-color: var(--color-white); border-bottom: 1px solid var(--color-border);">
  <div class="container py-lg-4">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="section-tag">How We Work</span>
      <h2 class="section-title">Our Five-Step Creative Journey</h2>
      <p class="section-subtitle">
        A structured, joyful collaboration that transforms initial inspiration into a refined living reality.
      </p>
    </div>

    <div class="row g-4 justify-content-center">
      <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="process-step">
          <div class="process-number">01</div>
          <h5 class="fs-5 mb-2">Discovery</h5>
          <p class="small text-muted mb-0">Initial consultation, lifestyle audit, site survey, and spatial aspirations.</p>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="process-step">
          <div class="process-number">02</div>
          <h5 class="fs-5 mb-2">Concept</h5>
          <p class="small text-muted mb-0">Architectural moodboards, spatial layouts, material palettes, and flow diagrams.</p>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="process-step">
          <div class="process-number">03</div>
          <h5 class="fs-5 mb-2">3D CGI</h5>
          <p class="small text-muted mb-0">Photorealistic 4K visualizations, material simulations, and lighting tuning.</p>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="process-step">
          <div class="process-number">04</div>
          <h5 class="fs-5 mb-2">Crafting</h5>
          <p class="small text-muted mb-0">Custom millwork fabrication, trade management, and rigorous quality audits.</p>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="process-step">
          <div class="process-number">05</div>
          <h5 class="fs-5 mb-2">The Reveal</h5>
          <p class="small text-muted mb-0">White-glove styling, artwork mounting, turnkey walkthrough, and celebratory handover.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 7. CLIENT TESTIMONIALS -->
<section class="py-5" style="background-color: var(--color-cream);">
  <div class="container py-lg-4">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="section-tag">Words of Appreciation</span>
      <h2 class="section-title">Trusted by Discerning Homeowners</h2>
      <p class="section-subtitle">
        Read firsthand impressions from clients who entrusted their primary residences and headquarters to our studio.
      </p>
    </div>

    <div class="row g-4">
      <?php foreach ($testimonials as $t): ?>
        <div class="col-lg-6">
          <div class="testimonial-card">
            <div>
              <div class="star-rating">
                <?php for ($i = 0; $i < $t['rating']; $i++): ?>
                  <i class="bi bi-star-fill"></i>
                <?php endfor; ?>
              </div>
              <p class="testimonial-text">“<?= htmlspecialchars($t['review']) ?>”</p>
            </div>
            <div class="testimonial-author border-top pt-3 mt-2">
              <img src="<?= htmlspecialchars($t['client_avatar']) ?>" alt="<?= htmlspecialchars($t['client_name']) ?>" class="testimonial-avatar" loading="lazy">
              <div>
                <h5 class="author-name"><?= htmlspecialchars($t['client_name']) ?></h5>
                <p class="author-role"><?= htmlspecialchars($t['client_role']) ?> • <span class="text-dark"><?= htmlspecialchars($t['location']) ?></span></p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- 8. FINAL CALL TO ACTION BANNER -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(rgba(28, 25, 23, 0.88), rgba(28, 25, 23, 0.94)), url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80') center/cover fixed;">
  <div class="container py-lg-5 text-center position-relative">
    <span class="section-tag tag-dark">Begin Your Transformation</span>
    <h2 class="display-5 font-serif-luxury text-white mb-3">Ready to Bring Your Vision to Life?</h2>
    <p class="lead mx-auto mb-4" style="max-width: 650px; color: rgba(255, 255, 255, 0.82);">
      Schedule an initial design conversation with our principal architectural designers today. We look forward to hearing about your project.
    </p>
    <div class="d-flex flex-wrap justify-content-center gap-3">
      <button type="button" class="btn btn-aura btn-aura-primary" data-bs-toggle="modal" data-bs-target="#consultationModal">
        <i class="bi bi-calendar2-check me-1"></i> Book a Consultation
      </button>
      <a href="<?= get_whatsapp_url() ?>" target="_blank" rel="noopener" class="btn btn-aura btn-aura-outline-white">
        <i class="bi bi-whatsapp me-1 text-success"></i> Chat on WhatsApp
      </a>
      <a href="<?= BASE_URL ?>/contact.php" class="btn btn-aura btn-aura-outline-white">
        <i class="bi bi-envelope me-1"></i> Contact Our Studio
      </a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
