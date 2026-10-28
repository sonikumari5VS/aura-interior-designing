<?php
/**
 * Aura Interiors - Project Detail Page
 */
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';

$slug = isset($_GET['slug']) ? sanitize($_GET['slug']) : 'villa-serenade';
$project = fetch_project_by_slug($slug);

// If project not found, redirect to projects page or show fallback
if (!$project) {
    header("Location: " . BASE_URL . "/projects.php");
    exit;
}

$page_title = $project['title'] . " - Luxury Architectural Case Study";
$page_desc = $project['concept_summary'];

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

// Decode color palette and materials JSON
$palette = json_decode($project['color_palette'], true) ?: [];
$materials = json_decode($project['materials'], true) ?: [];

// Fetch other related projects
$related_projects = fetch_projects(null, false, 3);
?>

<!-- Project Hero Banner -->
<header class="page-hero" style="background-image: url('<?= htmlspecialchars($project['cover_image']) ?>'); min-height: 55vh; display: flex; align-items: flex-end; padding-bottom: 4rem;">
  <div class="page-hero-overlay" style="background: linear-gradient(to top, rgba(28,25,23,0.92) 0%, rgba(28,25,23,0.4) 60%, rgba(28,25,23,0.7) 100%);"></div>
  <div class="container position-relative">
    <div class="page-hero-content text-start mx-0" style="max-width: 900px;">
      <a href="<?= BASE_URL ?>/projects.php" class="text-white-50 small text-uppercase tracking-wider mb-2 d-inline-block text-decoration-none">
        <i class="bi bi-arrow-left me-1"></i> Back to Portfolio
      </a>
      <div class="mb-2">
        <span class="section-tag tag-dark"><?= htmlspecialchars($project['category_name']) ?></span>
        <span class="badge bg-secondary ms-2 text-uppercase"><?= htmlspecialchars($project['client_type']) ?></span>
      </div>
      <h1 class="page-hero-title font-serif-luxury display-4 mb-3"><?= htmlspecialchars($project['title']) ?></h1>
      
      <!-- Key Project Specifications -->
      <div class="d-flex flex-wrap gap-4 text-white-50 pt-2 border-top border-secondary border-opacity-50">
        <div>
          <span class="d-block small text-uppercase text-white">Location</span>
          <span class="text-white"><?= htmlspecialchars($project['location']) ?></span>
        </div>
        <div>
          <span class="d-block small text-uppercase text-white">Footprint</span>
          <span class="text-white"><?= htmlspecialchars($project['area']) ?></span>
        </div>
        <div>
          <span class="d-block small text-uppercase text-white">Completion</span>
          <span class="text-white"><?= htmlspecialchars($project['year']) ?></span>
        </div>
        <div>
          <span class="d-block small text-uppercase text-white">Duration</span>
          <span class="text-white"><?= htmlspecialchars($project['duration']) ?></span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Project Narrative & Story -->
<section class="py-5" style="background-color: var(--color-white); border-bottom: 1px solid var(--color-border);">
  <div class="container py-lg-4">
    <div class="row g-5">
      <!-- Main Narrative -->
      <div class="col-lg-8">
        <span class="section-tag">Design Narrative</span>
        <h2 class="section-title">The Architectural Concept</h2>
        <p class="lead text-dark" style="font-family: var(--font-serif); font-size: 1.3rem; line-height: 1.7;">
          <?= htmlspecialchars($project['concept_summary']) ?>
        </p>

        <div class="my-4 p-4 rounded" style="background-color: var(--color-cream); border-left: 4px solid var(--color-primary);">
          <h5 class="fw-bold mb-2 font-sans"><i class="bi bi-chat-square-quote me-2 text-warning"></i> The Client Brief</h5>
          <p class="mb-0 text-muted">
            <?= htmlspecialchars($project['client_brief']) ?>
          </p>
        </div>

        <h3 class="fs-3 mt-4 mb-3">The Architectural Solution</h3>
        <p class="text-muted" style="line-height: 1.8;">
          <?= htmlspecialchars($project['design_solution']) ?>
        </p>

        <!-- Color Palette Section -->
        <?php if (!empty($palette)): ?>
          <div class="pt-4 mt-4 border-top">
            <h4 class="fs-4 mb-3 font-serif">Curated Color Harmony</h4>
            <p class="small text-muted mb-3">Tonal composition developed exclusively for this residence to reflect daylight transitions.</p>
            <div class="palette-swatch-list">
              <?php foreach ($palette as $swatch): ?>
                <div class="palette-swatch-item shadow-sm">
                  <span class="color-dot" style="background-color: <?= htmlspecialchars($swatch['hex']) ?>;"></span>
                  <div>
                    <span class="d-block color-name"><?= htmlspecialchars($swatch['name']) ?></span>
                    <span class="d-block color-hex"><?= htmlspecialchars($swatch['hex']) ?></span>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- Key Materials Section -->
        <?php if (!empty($materials)): ?>
          <div class="pt-4 mt-4 border-top">
            <h4 class="fs-4 mb-3 font-serif">Materials & Architectural Finishes</h4>
            <div>
              <?php foreach ($materials as $mat): ?>
                <span class="material-tag"><i class="bi bi-gem me-1 text-warning"></i> <?= htmlspecialchars($mat) ?></span>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <!-- Sidebar Consultation Trigger Card -->
      <div class="col-lg-4">
        <div class="p-4 rounded border bg-light sticky-top" style="top: 100px; z-index: 10;">
          <h4 class="font-serif-luxury fs-4 mb-2">Inspired by this Design?</h4>
          <p class="text-muted small mb-4">
            Schedule a private design session to discuss applying similar architectural craftsmanship, color palettes, and millwork to your residence.
          </p>

          <button type="button" class="btn btn-aura btn-aura-primary w-100 mb-3" data-bs-toggle="modal" data-bs-target="#consultationModal" data-project="<?= htmlspecialchars($project['title']) ?>">
            <i class="bi bi-calendar2-check me-1"></i> Book a Consultation
          </button>

          <a href="<?= get_whatsapp_url('Hello Aura Interiors, I am inquiring about the aesthetic from project: ' . $project['title']) ?>" target="_blank" rel="noopener" class="btn btn-aura btn-aura-outline w-100">
            <i class="bi bi-whatsapp me-1 text-success"></i> WhatsApp Concierge
          </a>

          <div class="pt-4 mt-4 border-top text-muted small">
            <div class="d-flex align-items-center mb-2">
              <i class="bi bi-shield-check text-warning fs-5 me-2"></i>
              <span>Confidentiality & NDA Guaranteed</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-house-door text-warning fs-5 me-2"></i>
              <span>Full Turnkey Project Management</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Project Multi-Angle Gallery Grid -->
<?php if (!empty($project['gallery'])): ?>
  <section class="py-5" style="background-color: var(--color-cream);">
    <div class="container py-lg-4">
      <div class="text-center max-w-700 mx-auto mb-5">
        <span class="section-tag">Visual Walkthrough</span>
        <h2 class="section-title">Architectural Perspectives</h2>
        <p class="section-subtitle">Click on any photograph to inspect materials, lighting compositions, and bespoke details in high resolution.</p>
      </div>

      <div class="row g-4">
        <?php foreach ($project['gallery'] as $gallery_img): ?>
          <div class="col-md-6 col-lg-4">
            <div class="gallery-item open-lightbox" data-img="<?= htmlspecialchars($gallery_img['image_url']) ?>" data-caption="<?= htmlspecialchars($gallery_img['caption'] ?? $project['title']) ?>">
              <div class="gallery-thumb-wrapper">
                <img src="<?= htmlspecialchars($gallery_img['image_url']) ?>" alt="<?= htmlspecialchars($gallery_img['caption']) ?>" class="gallery-thumb" loading="lazy">
              </div>
              <div class="gallery-item-overlay">
                <span class="gallery-item-cat"><i class="bi bi-arrows-fullscreen me-1"></i> Expand Fullscreen</span>
                <h5 class="gallery-item-title"><?= htmlspecialchars($gallery_img['caption'] ?? $project['title']) ?></h5>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- Related Projects Section -->
<section class="py-5" style="background-color: var(--color-white); border-top: 1px solid var(--color-border);">
  <div class="container py-lg-4">
    <div class="d-flex justify-content-between align-items-end mb-4">
      <div>
        <span class="section-tag">More Explorations</span>
        <h3 class="section-title mb-0">Related Researches & Works</h3>
      </div>
      <a href="<?= BASE_URL ?>/projects.php" class="btn btn-aura btn-aura-outline btn-aura-sm">
        All Projects <i class="bi bi-arrow-right ms-1"></i>
      </a>
    </div>

    <div class="row g-4 mt-2">
      <?php foreach ($related_projects as $rel): 
        if ($rel['id'] == $project['id']) continue;
      ?>
        <div class="col-lg-4 col-md-6">
          <div class="project-card">
            <div class="project-img-wrapper" style="aspect-ratio: 16/11;">
              <img src="<?= htmlspecialchars($rel['cover_image']) ?>" alt="<?= htmlspecialchars($rel['title']) ?>" class="project-img" loading="lazy">
              <div class="project-overlay">
                <span class="project-category-badge"><?= htmlspecialchars($rel['category_name']) ?></span>
                <h4 class="project-title fs-5"><?= htmlspecialchars($rel['title']) ?></h4>
                <div class="project-meta small">
                  <span><?= htmlspecialchars($rel['location']) ?></span>
                  <a href="<?= BASE_URL ?>/project-detail.php?slug=<?= urlencode($rel['slug']) ?>" class="ms-auto text-white fw-bold">
                    View <i class="bi bi-arrow-right"></i>
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

<!-- Lightbox Modal Container -->
<div class="lightbox-modal" id="lightboxModal">
  <button type="button" class="lightbox-close" id="lightboxClose" aria-label="Close Lightbox">&times;</button>
  <div class="lightbox-content text-center">
    <img src="" alt="" class="lightbox-img" id="lightboxImg">
    <p class="lightbox-caption" id="lightboxCaption"></p>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
