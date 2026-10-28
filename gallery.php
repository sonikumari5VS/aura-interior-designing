<?php
/**
 * Aura Interiors - Gallery & Inspiration
 */
$page_title = "Gallery & Interior Inspiration Moodboard";
$page_desc = "Explore our curated design gallery featuring modern, minimalist, luxury, traditional, contemporary, and small-space interior concepts.";

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$gallery_items = fetch_gallery_items();
?>

<!-- Page Hero -->
<header class="page-hero" style="background-image: url('https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=1920&q=80');">
  <div class="page-hero-overlay"></div>
  <div class="container position-relative">
    <div class="page-hero-content">
      <span class="section-tag tag-dark">Visual Moodboard</span>
      <h1 class="page-hero-title font-serif-luxury">Curated Inspiration & Design Aesthetics</h1>
      <p class="page-hero-subtitle">
        Immerse yourself in our visual catalog of spatial concepts, textures, light studies, and artisan decor.
      </p>
    </div>
  </div>
</header>

<!-- Gallery Filter & Grid -->
<section class="py-5" style="background-color: var(--color-cream);">
  <div class="container py-lg-4">
    
    <!-- Filter Pill Buttons -->
    <div class="filter-container mb-5">
      <button type="button" class="filter-btn gallery-filter-btn active" data-filter="all">All Inspirations</button>
      <button type="button" class="filter-btn gallery-filter-btn" data-filter="modern">Modern Interiors</button>
      <button type="button" class="filter-btn gallery-filter-btn" data-filter="minimalist">Minimalist</button>
      <button type="button" class="filter-btn gallery-filter-btn" data-filter="luxury">Luxury Living</button>
      <button type="button" class="filter-btn gallery-filter-btn" data-filter="traditional">Traditional & Classic</button>
      <button type="button" class="filter-btn gallery-filter-btn" data-filter="contemporary">Contemporary Decor</button>
      <button type="button" class="filter-btn gallery-filter-btn" data-filter="small-space">Small-Space Ideas</button>
    </div>

    <!-- Gallery Grid Items -->
    <div class="gallery-grid" id="galleryContainer">
      <?php foreach ($gallery_items as $item): ?>
        <div class="gallery-item gallery-grid-item <?= $item['aspect_ratio'] === 'portrait' ? 'portrait' : '' ?>" 
             data-category="<?= htmlspecialchars($item['category']) ?>" 
             data-img="<?= htmlspecialchars($item['image_url']) ?>" 
             data-title="<?= htmlspecialchars($item['title']) ?>" 
             data-caption="<?= htmlspecialchars($item['description']) ?>">
          <div class="gallery-thumb-wrapper">
            <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="gallery-thumb" loading="lazy">
          </div>
          <div class="gallery-item-overlay">
            <span class="gallery-item-cat"><?= htmlspecialchars($item['category_name']) ?></span>
            <h4 class="gallery-item-title"><?= htmlspecialchars($item['title']) ?></h4>
            <p class="small text-white-50 mb-0 d-none d-md-block"><?= htmlspecialchars($item['description']) ?></p>
            <div class="mt-2 text-warning small">
              <i class="bi bi-arrows-fullscreen me-1"></i> Click to enlarge
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
    <div class="mt-3">
      <h4 class="lightbox-caption text-white font-serif mb-1" id="lightboxCaption"></h4>
      <div class="pt-2">
        <button type="button" class="btn btn-aura btn-aura-primary btn-aura-sm" data-bs-toggle="modal" data-bs-target="#consultationModal">
          <i class="bi bi-stars me-1"></i> Inquire About Recreating This Look
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Final Banner -->
<section class="py-5 text-center text-white" style="background-color: var(--color-charcoal);">
  <div class="container py-4">
    <h3 class="display-6 font-serif-luxury text-white mb-3">Found An Inspiration That Speaks to You?</h3>
    <p class="text-white-50 mx-auto mb-4" style="max-width: 600px;">
      Share your ideas with our design team. We create tailored moodboards and photorealistic renderings for your exact home.
    </p>
    <div class="d-flex justify-content-center gap-3">
      <button type="button" class="btn btn-aura btn-aura-primary" data-bs-toggle="modal" data-bs-target="#consultationModal">
        Book a Consultation
      </button>
      <a href="<?= get_whatsapp_url('Hello Aura Interiors, I found some lovely inspiration on your gallery and would love to consult.') ?>" target="_blank" rel="noopener" class="btn btn-aura btn-aura-outline-white">
        <i class="bi bi-whatsapp me-1 text-success"></i> WhatsApp Us
      </a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
