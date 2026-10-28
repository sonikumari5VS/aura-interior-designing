<?php
/**
 * Aura Interiors - Services Page
 */
$page_title = "Interior Design Services & Architectural Solutions";
$page_desc = "Explore our 9 bespoke interior architecture services: Residential, Living Room, Bedroom, Modular Kitchen, Office, Commercial, Space Planning, Decor, and 3D CGI.";

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$all_services = fetch_services(false);
?>

<!-- Page Hero -->
<header class="page-hero" style="background-image: url('https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1920&q=80');">
  <div class="page-hero-overlay"></div>
  <div class="container position-relative">
    <div class="page-hero-content">
      <span class="section-tag tag-dark">Comprehensive Studio Capabilities</span>
      <h1 class="page-hero-title font-serif-luxury">Tailored Architectural Services</h1>
      <p class="page-hero-subtitle">
        Nine distinct design disciplines orchestrated under one roof to bring cohesive elegance, ergonomic balance, and lasting value to your spaces.
      </p>
    </div>
  </div>
</header>

<!-- Services Grid -->
<section class="py-5" style="background-color: var(--color-cream);">
  <div class="container py-lg-4">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="section-tag">Disciplines & Solutions</span>
      <h2 class="section-title">Designed for Discerning Lifestyles</h2>
      <p class="section-subtitle">
        Whether transforming a single sanctuary or developing a comprehensive estate, our team handles every aspect from structural layout to the final linen fold.
      </p>
    </div>

    <div class="row g-4">
      <?php foreach ($all_services as $srv): 
        $features = json_decode($srv['features'], true);
        if (!is_array($features)) {
            $features = explode("\n", $srv['features']);
        }
      ?>
        <div class="col-lg-4 col-md-6" id="<?= htmlspecialchars($srv['slug']) ?>">
          <div class="card-aura service-card">
            <div class="service-card-img-wrapper">
              <img src="<?= htmlspecialchars($srv['image_url']) ?>" alt="<?= htmlspecialchars($srv['title']) ?>" class="service-card-img" loading="lazy">
              <span class="service-card-badge"><?= htmlspecialchars($srv['category']) ?></span>
            </div>
            
            <div class="service-card-body">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="service-icon-box mb-0">
                  <i class="bi <?= htmlspecialchars($srv['icon']) ?>"></i>
                </div>
                <span class="badge bg-light text-muted border px-2 py-1 small">Bespoke Scope</span>
              </div>

              <h3 class="service-card-title"><?= htmlspecialchars($srv['title']) ?></h3>
              <p class="small text-muted fw-semibold mb-2" style="color: var(--color-primary-dark) !important;">
                <?= htmlspecialchars($srv['tagline']) ?>
              </p>
              
              <p class="service-card-text text-muted">
                <?= htmlspecialchars($srv['description']) ?>
              </p>

              <!-- Inclusions Checklist -->
              <div class="mb-4 pt-3 border-top">
                <p class="small fw-bold text-dark text-uppercase tracking-wider mb-2" style="font-size: 0.75rem;">
                  Key Inclusions:
                </p>
                <ul class="list-unstyled mb-0" style="font-size: 0.85rem;">
                  <?php if (!empty($features)): ?>
                    <?php foreach (array_slice($features, 0, 4) as $feat): ?>
                      <li class="mb-1 text-muted d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-warning me-2" style="font-size: 0.85rem; margin-top: 0.2rem;"></i>
                        <span><?= htmlspecialchars($feat) ?></span>
                      </li>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </ul>
              </div>

              <!-- Action Trigger -->
              <div class="mt-auto pt-3 border-top d-flex gap-2">
                <button type="button" class="btn btn-aura btn-aura-primary w-100" data-bs-toggle="modal" data-bs-target="#consultationModal" data-service="<?= htmlspecialchars($srv['title']) ?>">
                  <i class="bi bi-calendar2-check me-1"></i> Inquire This Service
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Frequently Asked Questions -->
<section class="py-5" style="background-color: var(--color-white); border-top: 1px solid var(--color-border);">
  <div class="container py-lg-4">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="section-tag">Clarity & Transparency</span>
      <h2 class="section-title">Frequently Asked Questions</h2>
      <p class="section-subtitle">
        Everything you need to know about engaging our interior design practice and how we work with our clients.
      </p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="accordion accordion-flush" id="serviceFaqAccordion">
          <!-- FAQ 1 -->
          <div class="accordion-item border rounded mb-3">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="false" aria-controls="faqOne">
                How does the initial design consultation work?
              </button>
            </h2>
            <div id="faqOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#serviceFaqAccordion">
              <div class="accordion-body text-muted">
                Our initial consultation is a 60-minute private strategy session either in person at our Beverly Hills studio or virtually via video conference. We review your floor plans, style preferences, lifestyle patterns, timeline expectations, and budget parameters to determine the best design scope for your home.
              </div>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="accordion-item border rounded mb-3">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">
                Can I engage Aura Interiors for a single room rather than an entire house?
              </button>
            </h2>
            <div id="faqTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#serviceFaqAccordion">
              <div class="accordion-body text-muted">
                Yes! We offer dedicated services for specialized spaces such as master bedroom suites, primary living salons, and Italian modular kitchen renovations. Each single-room project receives the same high-touch architectural care and 3D visualization as full residential estates.
              </div>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="accordion-item border rounded mb-3">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">
                How are the 3D interior visualizations created and used?
              </button>
            </h2>
            <div id="faqThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#serviceFaqAccordion">
              <div class="accordion-body text-muted">
                We generate ray-traced 4K CGI renderings accurate down to sunlight angles, actual material textures (e.g. authentic Italian marble veining and bouclé weaves), and custom millwork details. This eliminates surprises and lets you approve every detail before construction begins.
              </div>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="accordion-item border rounded mb-3">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour" aria-expanded="false" aria-controls="faqFour">
                Do you manage contractors and procurement directly?
              </button>
            </h2>
            <div id="faqFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#serviceFaqAccordion">
              <div class="accordion-body text-muted">
                Yes. In our turnkey packages, we take full responsibility for trade coordination, supplier vetting, custom furniture procurement, delivery logistics, site supervision, and final white-glove installation.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action Banner -->
<section class="py-5 text-center text-white" style="background-color: var(--color-charcoal);">
  <div class="container py-4">
    <h3 class="display-6 font-serif-luxury text-white mb-3">Have a Unique Design Requirement?</h3>
    <p class="text-white-50 mx-auto mb-4" style="max-width: 600px;">
      Our team is available to tailor a custom architectural package suited to your exact property footprint and lifestyle.
    </p>
    <div class="d-flex justify-content-center gap-3">
      <button type="button" class="btn btn-aura btn-aura-primary" data-bs-toggle="modal" data-bs-target="#consultationModal">
        Book a Consultation
      </button>
      <a href="<?= get_whatsapp_url('Hello Aura Interiors, I would like to inquire about your custom design services.') ?>" target="_blank" rel="noopener" class="btn btn-aura btn-aura-outline-white">
        <i class="bi bi-whatsapp me-1 text-success"></i> Quick WhatsApp Inquiry
      </a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
