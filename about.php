<?php
/**
 * Aura Interiors - About Us Page
 */
$page_title = "About Our Studio & Design Philosophy";
$page_desc = "Discover Aura Interiors. Learn about our architectural ethos, design philosophy, leadership team, and five-step creative process.";

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$team_members = fetch_team_members();
?>

<!-- Page Hero -->
<header class="page-hero" style="background-image: url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1920&q=80');">
  <div class="page-hero-overlay"></div>
  <div class="container position-relative">
    <div class="page-hero-content">
      <span class="section-tag tag-dark">About Aura Interiors</span>
      <h1 class="page-hero-title font-serif-luxury">Creating Spaces That Breathe & Endure</h1>
      <p class="page-hero-subtitle">
        We are an international architectural interior design practice shaping serene, tactile, and emotionally transcendent living environments.
      </p>
    </div>
  </div>
</header>

<!-- Statistics Strip -->
<div class="stats-bar stats-section">
  <div class="container">
    <div class="row g-4 justify-content-center">
      <div class="col-6 col-md-3">
        <div class="stat-box">
          <div class="stat-number counter-value" data-target="14" data-suffix="+">14+</div>
          <div class="stat-label">Years of Experience</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="stat-box">
          <div class="stat-number counter-value" data-target="350" data-suffix="+">350+</div>
          <div class="stat-label">Completed Projects</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="stat-box">
          <div class="stat-number counter-value" data-target="280" data-suffix="+">280+</div>
          <div class="stat-label">Happy Clients Worldwide</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="stat-box">
          <div class="stat-number counter-value" data-target="22" data-suffix="">22</div>
          <div class="stat-label">International Awards</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Studio Introduction & Philosophy -->
<section class="py-5" style="background-color: var(--color-white);">
  <div class="container py-lg-4">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <span class="section-tag">Our Ethos</span>
        <h2 class="section-title">Form Follows Emotion and Tranquility</h2>
        <p class="lead text-dark" style="font-family: var(--font-serif); font-size: 1.25rem;">
          We believe luxury is not about loud ornamentation; it is the quiet confidence of exquisite proportions, honest materials, and intuitive flow.
        </p>
        <p>
          Founded in 2011, Aura Interiors emerged from a shared desire between architects and artisanal fabricators to counter sterile minimalism with deep organic warmth. We craft homes and commercial destinations that slow down the pulse and bring genuine peace to their inhabitants.
        </p>
        <p>
          By pairing ancient architectural textures — honed limestone, brushed bronze, raw travertine, and European oak — with state-of-the-art acoustic calibration and smart lighting design, we create environments that feel grounded yet celestial.
        </p>
        <div class="d-flex gap-3 pt-3">
          <button type="button" class="btn btn-aura btn-aura-primary" data-bs-toggle="modal" data-bs-target="#consultationModal">
            Consult With Our Founders
          </button>
          <a href="<?= BASE_URL ?>/projects.php" class="btn btn-aura btn-aura-outline">
            Browse Our Portfolio
          </a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="position-relative">
          <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" alt="Aura Interiors studio design" class="img-fluid rounded shadow-lg" style="width: 100%; height: 460px; object-fit: cover;">
          <div class="p-4 rounded position-absolute bottom-0 start-0 m-3 shadow" style="background-color: rgba(255, 255, 255, 0.95); backdrop-filter: blur(8px); max-width: 290px; border-left: 4px solid var(--color-primary);">
            <p class="mb-1 text-dark fw-bold small text-uppercase tracking-wider">Design Principle</p>
            <p class="mb-0 text-muted small">“Every line drawn must serve a sensory purpose and honor the architecture.”</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Mission & Vision Cards -->
<section class="py-5" style="background-color: var(--color-cream-alt);">
  <div class="container py-lg-4">
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="p-4 p-md-5 rounded bg-white border h-100 shadow-sm">
          <div class="feature-icon-circle mb-4">
            <i class="bi bi-compass"></i>
          </div>
          <h3 class="fs-3 mb-3">Our Mission</h3>
          <p class="text-muted" style="line-height: 1.8;">
            To design, engineer, and curate bespoke residential and commercial sanctuaries that enrich human wellbeing. We merge timeless craftsmanship with hyper-realistic CGI visualization to eliminate friction, delivering spaces that elevate our clients' lifestyle and enduring legacy.
          </p>
          <ul class="list-unstyled text-muted small mt-3">
            <li class="mb-2"><i class="bi bi-check2 text-warning me-2 fw-bold"></i> Deep listening to client lifestyle habits and personal aesthetics</li>
            <li class="mb-2"><i class="bi bi-check2 text-warning me-2 fw-bold"></i> Millimeter architectural precision and turnkey accountability</li>
            <li><i class="bi bi-check2 text-warning me-2 fw-bold"></i> Sourcing non-toxic, sustainable, and generational materials</li>
          </ul>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="p-4 p-md-5 rounded bg-white border h-100 shadow-sm">
          <div class="feature-icon-circle mb-4">
            <i class="bi bi-eye"></i>
          </div>
          <h3 class="fs-3 mb-3">Our Vision</h3>
          <p class="text-muted" style="line-height: 1.8;">
            To be recognized globally as the premier boutique interior architecture studio championing warm minimalism. We envision an architectural future where technology, natural earth textures, and human comfort converge in effortless harmony.
          </p>
          <ul class="list-unstyled text-muted small mt-3">
            <li class="mb-2"><i class="bi bi-check2 text-warning me-2 fw-bold"></i> Elevating interior design into an art form of sensory wellness</li>
            <li class="mb-2"><i class="bi bi-check2 text-warning me-2 fw-bold"></i> Expanding international presence across North America and Europe</li>
            <li><i class="bi bi-check2 text-warning me-2 fw-bold"></i> Fostering global partnerships with master stone & wood ateliers</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Detailed Creative Process -->
<section class="py-5" style="background-color: var(--color-white); border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border);">
  <div class="container py-lg-4">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="section-tag">Methodology</span>
      <h2 class="section-title">Our Rigorous Creative Process</h2>
      <p class="section-subtitle">
        How we transform an initial aspiration into a breathtaking, turnkey living reality through systematic stages of discovery and craftsmanship.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          <span class="font-serif-luxury fs-1 text-muted fw-bold d-block mb-2">01</span>
          <h4 class="fs-4 mb-2">Discovery & Lifestyle Audit</h4>
          <p class="text-muted">
            We explore your routine, aesthetic likes/dislikes, architectural floor plans, and functional requirements. We establish budget allocations and project milestones upfront.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          <span class="font-serif-luxury fs-1 text-muted fw-bold d-block mb-2">02</span>
          <h4 class="fs-4 mb-2">Concept & Moodboards</h4>
          <p class="text-muted">
            Our team curates material tactile boards, color harmonies, lighting scenarios, and schematic 2D floor plans, defining the emotional and physical language of each room.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          <span class="font-serif-luxury fs-1 text-muted fw-bold d-block mb-2">03</span>
          <h4 class="fs-4 mb-2">4K 3D Visualization</h4>
          <p class="text-muted">
            We model every room down to millwork joins, daylight bounce, fabrics, and art pieces. You will experience your exact home virtually before any physical construction begins.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          <span class="font-serif-luxury fs-1 text-muted fw-bold d-block mb-2">04</span>
          <h4 class="fs-4 mb-2">Procurement & Millwork</h4>
          <p class="text-muted">
            We coordinate directly with Italian quarries, fabric weavers, and custom cabinetmakers. Our procurement team tracks shipping, inspections, and white-glove warehousing.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          <span class="font-serif-luxury fs-1 text-muted fw-bold d-block mb-2">05</span>
          <h4 class="fs-4 mb-2">Turnkey Execution</h4>
          <p class="text-muted">
            Our architectural supervisors oversee contractor trades on-site every single week. We ensure structural accuracy, acoustic tolerances, and immaculate installation.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          <span class="font-serif-luxury fs-1 text-muted fw-bold d-block mb-2">06</span>
          <h4 class="fs-4 mb-2">Styling & Celebratory Handover</h4>
          <p class="text-muted">
            We dress beds in Italian linens, position fine art, place statement ceramics, calibrate ambient lighting, and hand over the keys to your pristine completed home.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Team Members Section -->
<section class="py-5" style="background-color: var(--color-cream);">
  <div class="container py-lg-4">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="section-tag">Leadership & Artisans</span>
      <h2 class="section-title">Meet Our Creative Directors</h2>
      <p class="section-subtitle">
        A collective of architects, interior stylists, CGI artists, and sourcing specialists committed to elevating modern living.
      </p>
    </div>

    <div class="row g-4">
      <?php foreach ($team_members as $member): ?>
        <div class="col-lg-3 col-md-6">
          <div class="team-card">
            <div class="team-img-wrapper">
              <img src="<?= htmlspecialchars($member['image_url']) ?>" alt="<?= htmlspecialchars($member['name']) ?>" class="team-img" loading="lazy">
            </div>
            <div class="team-body">
              <h4 class="team-name"><?= htmlspecialchars($member['name']) ?></h4>
              <div class="team-role"><?= htmlspecialchars($member['role']) ?></div>
              <p class="team-bio text-muted"><?= htmlspecialchars($member['bio']) ?></p>
              <div class="small fw-semibold text-dark mb-3">
                <i class="bi bi-clock me-1 text-warning"></i> <?= htmlspecialchars($member['experience_years']) ?> Experience
              </div>
              <div class="team-socials">
                <a href="<?= htmlspecialchars($member['social_instagram']) ?>" target="_blank" rel="noopener" class="team-social-icon" title="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="<?= htmlspecialchars($member['social_linkedin']) ?>" target="_blank" rel="noopener" class="team-social-icon" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Call to Action Banner -->
<section class="py-5 text-center text-white" style="background-color: var(--color-charcoal);">
  <div class="container py-4">
    <h3 class="display-6 font-serif-luxury text-white mb-3">Begin a Conversation With Our Studio</h3>
    <p class="text-white-50 mx-auto mb-4" style="max-width: 600px;">
      Whether designing a new luxury villa, penthouses, or corporate creative space, we invite you to share your vision.
    </p>
    <div class="d-flex justify-content-center gap-3">
      <button type="button" class="btn btn-aura btn-aura-primary" data-bs-toggle="modal" data-bs-target="#consultationModal">
        Book a Consultation
      </button>
      <a href="<?= BASE_URL ?>/contact.php" class="btn btn-aura btn-aura-outline-white">
        Contact Studio
      </a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
