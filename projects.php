<?php
/**
 * Aura Interiors - Projects & Portfolio
 */
$page_title = "Curated Portfolio & Signature Residences";
$page_desc = "Explore our portfolio of award-winning luxury residences, penthouses, living rooms, master bedroom suites, modular kitchens, and executive offices.";

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$all_projects = fetch_projects();
?>

<!-- Page Hero -->
<header class="page-hero" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80');">
  <div class="page-hero-overlay"></div>
  <div class="container position-relative">
    <div class="page-hero-content">
      <span class="section-tag tag-dark">Curated Portfolio</span>
      <h1 class="page-hero-title font-serif-luxury">Spaces of Distinction & Enduring Artistry</h1>
      <p class="page-hero-subtitle">
        A selected showcase of residential sanctuaries, penthouses, and bespoke commercial environments crafted across the globe.
      </p>
    </div>
  </div>
</header>

<!-- Projects Section -->
<section class="py-5" style="background-color: var(--color-cream);">
  <div class="container py-lg-4">
    
    <!-- Filter Pills & Search Bar -->
    <div class="row align-items-center mb-5 g-3">
      <div class="col-lg-8">
        <div class="filter-container justify-content-lg-start mb-0">
          <button type="button" class="filter-btn project-filter-btn active" data-filter="all">All Projects</button>
          <button type="button" class="filter-btn project-filter-btn" data-filter="living-room">Living Room</button>
          <button type="button" class="filter-btn project-filter-btn" data-filter="bedroom">Bedroom</button>
          <button type="button" class="filter-btn project-filter-btn" data-filter="kitchen">Kitchen</button>
          <button type="button" class="filter-btn project-filter-btn" data-filter="office">Office</button>
          <button type="button" class="filter-btn project-filter-btn" data-filter="luxury">Luxury Interiors</button>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="input-group">
          <span class="input-group-text bg-white border-end-0 text-muted" id="search-addon">
            <i class="bi bi-search"></i>
          </span>
          <input type="text" id="projectSearchInput" class="form-control border-start-0 ps-0" placeholder="Search by title or location..." aria-label="Search projects" aria-describedby="search-addon">
        </div>
      </div>
    </div>

    <!-- Projects Grid -->
    <div class="row g-4" id="projectsContainer">
      <?php foreach ($all_projects as $proj): ?>
        <div class="col-lg-4 col-md-6 project-grid-item" 
             data-category="<?= htmlspecialchars($proj['category']) ?>" 
             data-title="<?= htmlspecialchars($proj['title']) ?>" 
             data-location="<?= htmlspecialchars($proj['location']) ?>">
          <div class="project-card">
            <div class="project-img-wrapper">
              <img src="<?= htmlspecialchars($proj['cover_image']) ?>" alt="<?= htmlspecialchars($proj['title']) ?>" class="project-img" loading="lazy">
              <div class="project-overlay">
                <span class="project-category-badge"><?= htmlspecialchars($proj['category_name']) ?></span>
                <h3 class="project-title"><?= htmlspecialchars($proj['title']) ?></h3>
                <div class="project-meta">
                  <span><i class="bi bi-geo-alt me-1"></i> <?= htmlspecialchars($proj['location']) ?></span>
                  <span><i class="bi bi-bounding-box me-1"></i> <?= htmlspecialchars($proj['area']) ?></span>
                </div>
                <div class="pt-3 mt-2 border-top border-secondary border-opacity-25 d-flex justify-content-between align-items-center">
                  <span class="text-white-50 small"><?= htmlspecialchars($proj['client_type']) ?></span>
                  <a href="<?= BASE_URL ?>/project-detail.php?slug=<?= urlencode($proj['slug']) ?>" class="btn btn-aura btn-aura-primary btn-aura-sm py-1 px-3">
                    View Project <i class="bi bi-arrow-right ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- No Results Message (Hidden by default) -->
    <div id="noProjectsFound" class="text-center py-5" style="display: none;">
      <i class="bi bi-search fs-1 text-muted mb-3 d-block"></i>
      <h4 class="font-serif-luxury">No matching projects found</h4>
      <p class="text-muted">Try adjusting your category filter or search keywords.</p>
    </div>

  </div>
</section>

<!-- Call to Action -->
<section class="py-5 text-center text-white" style="background-color: var(--color-charcoal);">
  <div class="container py-4">
    <h3 class="display-6 font-serif-luxury text-white mb-3">Envisioning Your Next Space?</h3>
    <p class="text-white-50 mx-auto mb-4" style="max-width: 600px;">
      Let us translate your aspirations into an enduring architectural reality. Contact our design concierge today.
    </p>
    <button type="button" class="btn btn-aura btn-aura-primary" data-bs-toggle="modal" data-bs-target="#consultationModal">
      Book a Private Consultation
    </button>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
