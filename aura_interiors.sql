-- Aura Interiors - Complete Database Schema & Seed Data
-- Designed for MySQL / MariaDB (XAMPP Environment)

CREATE DATABASE IF NOT EXISTS `aura_interiors` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `aura_interiors`;

-- --------------------------------------------------------
-- Table: services
-- --------------------------------------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `slug` VARCHAR(100) NOT NULL UNIQUE,
  `title` VARCHAR(255) NOT NULL,
  `tagline` VARCHAR(255) DEFAULT NULL,
  `category` VARCHAR(100) DEFAULT 'Residential',
  `description` TEXT NOT NULL,
  `features` TEXT NOT NULL,
  `icon` VARCHAR(100) DEFAULT 'bi-house-heart',
  `image_url` VARCHAR(500) NOT NULL,
  `display_order` INT DEFAULT 0,
  `is_featured` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: projects
-- --------------------------------------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(150) NOT NULL UNIQUE,
  `category` VARCHAR(100) NOT NULL,
  `category_name` VARCHAR(100) NOT NULL,
  `client_type` VARCHAR(100) DEFAULT 'Private Residence',
  `location` VARCHAR(150) NOT NULL,
  `year` VARCHAR(10) NOT NULL DEFAULT '2025',
  `area` VARCHAR(50) NOT NULL,
  `duration` VARCHAR(50) NOT NULL,
  `cover_image` VARCHAR(500) NOT NULL,
  `concept_summary` TEXT NOT NULL,
  `client_brief` TEXT NOT NULL,
  `design_solution` TEXT NOT NULL,
  `color_palette` TEXT NOT NULL,
  `materials` TEXT NOT NULL,
  `is_featured` TINYINT(1) DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: project_images
-- --------------------------------------------------------
DROP TABLE IF EXISTS `project_images`;
CREATE TABLE `project_images` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `project_id` INT NOT NULL,
  `image_url` VARCHAR(500) NOT NULL,
  `caption` VARCHAR(255) DEFAULT NULL,
  `display_order` INT DEFAULT 0,
  CONSTRAINT `fk_project_images_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: consultations
-- --------------------------------------------------------
DROP TABLE IF EXISTS `consultations`;
CREATE TABLE `consultations` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `full_name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `phone` VARCHAR(50) NOT NULL,
  `service_name` VARCHAR(150) NOT NULL,
  `property_type` VARCHAR(100) DEFAULT 'Apartment',
  `budget_range` VARCHAR(100) NOT NULL,
  `preferred_date` DATE DEFAULT NULL,
  `project_location` VARCHAR(200) DEFAULT NULL,
  `description` TEXT NOT NULL,
  `status` VARCHAR(50) DEFAULT 'New',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: contacts
-- --------------------------------------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `phone` VARCHAR(50) DEFAULT NULL,
  `subject` VARCHAR(200) NOT NULL,
  `message` TEXT NOT NULL,
  `is_read` TINYINT(1) DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: testimonials
-- --------------------------------------------------------
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `client_name` VARCHAR(150) NOT NULL,
  `client_role` VARCHAR(150) NOT NULL,
  `project_title` VARCHAR(200) NOT NULL,
  `review` TEXT NOT NULL,
  `rating` INT DEFAULT 5,
  `client_avatar` VARCHAR(500) NOT NULL,
  `location` VARCHAR(100) NOT NULL,
  `is_featured` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: team_members
-- --------------------------------------------------------
DROP TABLE IF EXISTS `team_members`;
CREATE TABLE `team_members` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NOT NULL,
  `role` VARCHAR(150) NOT NULL,
  `bio` TEXT NOT NULL,
  `image_url` VARCHAR(500) NOT NULL,
  `experience_years` VARCHAR(50) NOT NULL,
  `social_instagram` VARCHAR(255) DEFAULT '#',
  `social_linkedin` VARCHAR(255) DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: gallery_items
-- --------------------------------------------------------
DROP TABLE IF EXISTS `gallery_items`;
CREATE TABLE `gallery_items` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(200) NOT NULL,
  `category` VARCHAR(100) NOT NULL,
  `category_name` VARCHAR(100) NOT NULL,
  `image_url` VARCHAR(500) NOT NULL,
  `aspect_ratio` VARCHAR(50) DEFAULT 'landscape',
  `description` TEXT NOT NULL,
  `display_order` INT DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- SEED DATA
-- ========================================================

-- Services (The 9 specified requirements)
INSERT INTO `services` (`slug`, `title`, `tagline`, `category`, `description`, `features`, `icon`, `image_url`, `display_order`, `is_featured`) VALUES
('residential-interior-design', 'Residential Interior Design', 'Bespoke living sanctuaries tailored to your distinct lifestyle', 'Residential', 'Our comprehensive residential design transforms every square foot of your residence into a harmonious, sensory sanctuary. From structural space planning to tailored millwork, we merge high-end aesthetics with everyday ergonomic comfort.', '["Full home architectural redesign & styling","Custom built-in cabinetry & millwork","Curated color stories & bespoke finishes","Integrated smart lighting & acoustic plans","Procurement, installation & turnkey handover"]', 'bi-house-door', 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1200&q=80', 1, 1),

('living-room-design', 'Living Room Design', 'Elevated communal spaces designed for conversation and tranquility', 'Residential', 'The living room is the soul of any home. We curate layered seating arrangements, statement architectural fireplaces, warm ambient illumination, and bespoke coffee tables that evoke comfort, elegance, and effortless sophistication.', '["Architectural feature walls & fireplace styling","Luxury bespoke sofas & bouclé occasional chairs","Ambient, task & accent lighting orchestration","Custom acoustic drapery & designer rugs","Art curation & styling accessories"]', 'bi-cup-hot', 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1200&q=80', 2, 1),

('bedroom-design', 'Bedroom Design', 'Restorative master suites and serene private retreats', 'Residential', 'Designed as private havens from the world, our bedrooms blend soft tactile fabrics, soothing tonal warmth, whisper-quiet ergonomics, and tailored walk-in closets to support effortless relaxation and restorative sleep.', '["Custom upholstered headboards & bed surrounds","Bespoke walk-in wardrobe & vanity systems","Circadian rhythm smart lighting integration","Sensory acoustic paneling & natural textures","Dedicated reading nooks & private lounge zones"]', 'bi-moon-stars', 'https://images.unsplash.com/photo-1616594039964-ae9021a400a0?auto=format&fit=crop&w=1200&q=80', 3, 1),

('modular-kitchen-design', 'Modular Kitchen Design', 'Culinary precision engineered with timeless Italian craftsmanship', 'Residential', 'We balance gourmet culinary performance with sculptural minimalism. Featuring concealed luxury appliances, seamless quartz or marble waterfalls, soft-touch matte cabinetry, and intelligent pantry pull-outs.', '["German & Italian hardware with soft-close mechanisms","Continuous stone countertops & seamless backsplashes","Integrated high-end appliances & hidden coffee bars","Smart pull-out pantries & corner carousel units","Undercabinet warm temperature-tuned LED illumination"]', 'bi-grid-1x2', 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=1200&q=80', 4, 1),

('office-interior-design', 'Office Interior Design', 'Inspiring workspaces that elevate productivity and wellbeing', 'Commercial', 'Modern workplaces demand a blend of collaborative energy and focused quietude. We craft ergonomic executive suites, biophilic open plans, and cutting-edge conference rooms that mirror your brand vision.', '["Biophilic integration with natural plants & light","Ergonomic executive furniture & sit-stand desks","Acoustic felt baffling & privacy phone pods","Seamless AV conference connectivity","Brand identity & refined reception lounges"]', 'bi-briefcase', 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80', 5, 1),

('commercial-interior-design', 'Commercial Interior Design', 'Signature retail, hospitality, and boutique destinations', 'Commercial', 'We conceive evocative hospitality and retail spaces that captivate patrons from the moment they step through the door. Every finish, scent profile, and lighting angle is engineered to leave an indelible impression.', '["Concept development aligned with commercial branding","Durable, high-traffic commercial grade finishes","Code-compliant egress & accessibility planning","Bespoke display fixtures & service counters","Dynamic atmospheric lighting design"]', 'bi-building', 'https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=1200&q=80', 6, 1),

('space-planning', 'Space Planning', 'Maximizing spatial flow, natural daylight, and ergonomic balance', 'Planning', 'Through rigorous millimeter-precise architectural mapping, we eliminate dead zones, improve pedestrian flow, and ensure every square inch serves an intentional lifestyle or operational purpose.', '["Comprehensive 2D architectural CAD floor plans","Sightline & circulation path optimization","Zoning for open-concept residential spaces","Natural sunlight trajectory & shadow modeling","Clear structural clearance validation"]', 'bi-bounding-box', 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=80', 7, 0),

('furniture-decor-consultation', 'Furniture and Home Decor Consultation', 'Artisanal procurement, custom furniture design, and fine art sourcing', 'Decor', 'Our stylists scour international design houses, vintage ateliers, and bespoke artisans to curate individual statement pieces, one-of-a-kind art installations, textured throws, and sculptural lighting fixtures.', '["Custom furniture commissions & finish selections","Exclusive access to trade-only design showrooms","Fine art sourcing, framing & gallery installation","Textile pairing: bouclé, linen, cashmere & velvet","Complete white-glove staging & placement day"]', 'bi-gem', 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=1200&q=80', 8, 0),

('3d-interior-visualization', '3D Interior Visualization', 'Photorealistic CGI renderings and immersive virtual walkthroughs', 'Visualization', 'Experience your envisioned space before a single hammer is swung. We produce photorealistic 4K 3D renderings, material finish simulations, and interactive 360-degree walkthroughs with true-to-life lighting.', '["Ultra-high definition 4K ray-traced renders","Accurate material & texture daylight simulations","360-degree panoramic virtual reality previews","Multi-option lighting moods (Day / Dusk / Night)","Precise millwork & finish visualization"]', 'bi-badge-vr', 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80', 9, 0);

-- Projects
INSERT INTO `projects` (`id`, `title`, `slug`, `category`, `category_name`, `client_type`, `location`, `year`, `area`, `duration`, `cover_image`, `concept_summary`, `client_brief`, `design_solution`, `color_palette`, `materials`, `is_featured`) VALUES
(1, 'Villa Serenade', 'villa-serenade', 'luxury', 'Luxury Interiors', 'Private Residence', 'Beverly Hills, CA', '2025', '6,200 sq.ft', '6 Months', 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
'A sublime luxury residence celebrating warm minimalism, floor-to-ceiling glass pavilions, and tactile European travertine stone throughout.',
'The client desired a peaceful sanctuary inspired by coastal Mediterranean architecture combined with modern California warmth. A space devoid of clutter yet rich in organic textures, entertaining capacity, and museum-grade lighting.',
'We unified the open living spaces using bookmatched Roman travertine, bespoke white oak slatted walls, and curated low-profile Italian modular seating. Pocket doors dissolve indoor-outdoor barriers completely.',
'[{"name": "Warm Travertine", "hex": "#E6DDD0"}, {"name": "Desert Sand", "hex": "#D1C2A5"}, {"name": "Smoked Oak", "hex": "#4A3B32"}, {"name": "Brushed Champagne", "hex": "#C5A880"}, {"name": "Linen Chalk", "hex": "#F9F7F2"}]',
'["Roman Travertine", "Quarter-Sawn White Oak", "Brushed Champagne Brass", "Belgian Linen", "Cast Bronze Hardware"]', 1),

(2, 'The Nordic Pavilion Living Room', 'nordic-pavilion-living-room', 'living-room', 'Living Room', 'Family Penthouse', 'Tribeca, New York', '2025', '1,450 sq.ft', '3 Months', 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1200&q=80',
'A soaring, double-height living room radiating organic serenity through fluted plaster, raw limestone, and curved velvet silhouettes.',
'Create a grand yet deeply intimate family lounge that maximizes 20-foot historic loft windows while preserving warm, acoustic stillness against vibrant city life.',
'We engineered acoustic micro-perforated wood ceiling slats and framed the central gas fireplace in unpolished Portuguese limestone. Curved seating forms encourage fluid conversation without visual obstruction.',
'[{"name": "Ecru Clay", "hex": "#EDE6DC"}, {"name": "Nordic Oat", "hex": "#D8CAB8"}, {"name": "Muted Charcoal", "hex": "#2B2826"}, {"name": "Terracotta Ochre", "hex": "#A76D53"}, {"name": "Bone White", "hex": "#FAF8F5"}]',
'["Portuguese Limestone", "Bouclé Wool", "Fluted Plaster", "Walnut Veneer", "Burnished Steel"]', 1),

(3, 'Atelier Nocturne Master Bedroom', 'atelier-nocturne-master-bedroom', 'bedroom', 'Bedroom', 'Luxury Residence', 'Kensington, London', '2024', '850 sq.ft', '2.5 Months', 'https://images.unsplash.com/photo-1616594039964-ae9021a400a0?auto=format&fit=crop&w=1200&q=80',
'A moody, deeply relaxing primary bedroom suite featuring custom leather wall paneling, cocooning alcoves, and integrated warm circadian lighting.',
'The owners wanted a boutique five-star hotel atmosphere focused on absolute rest, silent doors, discrete dressing spaces, and warm textural tactility.',
'Custom cashmere fabric was mounted onto acoustic sub-panels along the bed wall. Recessed perimeter coves cast a gentle warm amber wash, controlled via smart scenes calibrated for morning and evening routines.',
'[{"name": "Warm Cashmere", "hex": "#E3D8CC"}, {"name": "Midnight Taupe", "hex": "#3A3331"}, {"name": "Raw Umber", "hex": "#7A6453"}, {"name": "Satin Brass", "hex": "#D4AF37"}, {"name": "Cloud White", "hex": "#F5F3EF"}]',
'["Loro Piana Wool", "Full-Grain Saddle Leather", "Smoked Ash Wood", "Satin Brass", "Silk Wool Rugs"]', 1),

(4, 'The Minimalist Monolith Kitchen', 'minimalist-monolith-kitchen', 'kitchen', 'Modular Kitchen', 'Modern Townhouse', 'Zurich, Switzerland', '2025', '650 sq.ft', '3 Months', 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=1200&q=80',
'An immaculate architectural kitchen featuring a monolithic 14-foot quartzite island, touch-latch smoked oak cabinetry, and integrated prep areas.',
'Design a culinary centerpiece for an avid chef that completely disappears when not in use, maintaining seamless visual calm for dinner parties.',
'We engineered motorized sliding quartzite backsplashes that conceal spice racks and small appliances. Matte black anti-fingerprint cabinetry keeps the aesthetic pristine with zero hardware handles.',
'[{"name": "Taj Mahal Quartzite", "hex": "#E2DACD"}, {"name": "Smoked Espresso", "hex": "#231F1D"}, {"name": "Warm Greige", "hex": "#BDB3A5"}, {"name": "Champagne Bronze", "hex": "#A88D65"}, {"name": "Pure Alabaster", "hex": "#F7F5F0"}]',
'["Taj Mahal Quartzite", "Fenix NTM Matte Acrylic", "Rift-Cut Smoked Oak", "Gunmetal Tapware", "Sub-Zero Concealed Systems"]', 1),

(5, 'Apex Ventures Executive Office', 'apex-ventures-executive-office', 'office', 'Office', 'Venture Capital HQ', 'Financial District, Singapore', '2024', '4,200 sq.ft', '4 Months', 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80',
'A forward-looking corporate suite blending quiet luxury, biophilic acoustic baffles, and private client negotiation salons.',
'Create an environment that conveys financial permanence, trust, and technological innovation while offering employees a warm, domestic calm instead of sterile corporate drywall.',
'We incorporated custom curved acoustic glass partitions, warm timber ribs, Herman Miller ergonomic suites, and curated contemporary Asian sculpture throughout.',
'[{"name": "Warm Walnut", "hex": "#5C4638"}, {"name": "Deep Carbon", "hex": "#202022"}, {"name": "Natural Cane", "hex": "#D1BFA5"}, {"name": "Oatmeal Linen", "hex": "#EBE5DB"}, {"name": "Verdant Moss", "hex": "#586253"}]',
'["FSC American Walnut", "Acoustic PET Felt", "Fluted Glass", "Anodized Black Aluminum", "Vegetable-Tanned Leather"]', 1),

(6, 'The Lumina Glasshouse Penthouse', 'the-lumina-glasshouse-penthouse', 'luxury', 'Luxury Interiors', 'Penthouse Duplex', 'Sydney Harbour, Australia', '2025', '5,100 sq.ft', '5 Months', 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80',
'A panoramic harbourfront duplex celebrating ethereal sunlight, sculptural spiraling staircases, and bespoke marble joinery.',
'Capitalize on 360-degree harbour vistas without glare, delivering a tranquil retreat that balances entertaining scale with private comfort.',
'Motorized micro-weave linen solar screens, honed Fior di Bosco marble, and custom lighting fixtures made by Venetian glassblowers complete this landmark penthouse.',
'[{"name": "Fior Di Bosco", "hex": "#7E7B78"}, {"name": "Sand Dune", "hex": "#D8C7B4"}, {"name": "Champagne Silk", "hex": "#EFE9DE"}, {"name": "Antique Bronze", "hex": "#6C5946"}, {"name": "Deep Sea Slate", "hex": "#2E363D"}]',
'["Fior di Bosco Marble", "Hand-Blown Murano Glass", "Brushed Bronze", "French Oak Parquetry", "Silk-Wool Carpets"]', 0);

-- Project Images (for Detail Gallery)
INSERT INTO `project_images` (`project_id`, `image_url`, `caption`, `display_order`) VALUES
(1, 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80', 'Main open-concept living gallery with custom travertine fireplace', 1),
(1, 'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=1200&q=80', 'Architectural dining room with integrated courtyard gardens', 2),
(1, 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=1200&q=80', 'Sculptural reading nook with custom walnut shelving', 3),
(1, 'https://images.unsplash.com/photo-1600585152220-90363fe7e115?auto=format&fit=crop&w=1200&q=80', 'Outdoor poolside lounge seamless transition', 4),

(2, 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1200&q=80', 'Full view of the Nordic Pavilion double-height living area', 1),
(2, 'https://images.unsplash.com/photo-1618219908412-a29a1bb7b86e?auto=format&fit=crop&w=1200&q=80', 'Close-up of curved seating, bouclé cushions and limestone plinth', 2),
(2, 'https://images.unsplash.com/photo-1618219740975-d40978bb7378?auto=format&fit=crop&w=1200&q=80', 'Custom floating media unit with integrated acoustic fabric', 3),

(3, 'https://images.unsplash.com/photo-1616594039964-ae9021a400a0?auto=format&fit=crop&w=1200&q=80', 'Master bedroom floating king bed with acoustic headboard', 1),
(3, 'https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?auto=format&fit=crop&w=1200&q=80', 'Dressing room with smoked bronze glass wardrobes and indirect LED', 2),
(3, 'https://images.unsplash.com/photo-1540518614846-7ede433c4ef4?auto=format&fit=crop&w=1200&q=80', 'Ensuite bath with freestanding soaking tub & textured limestone', 3),

(4, 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=1200&q=80', 'The quartzite kitchen island with cantilevered breakfast seating', 1),
(4, 'https://images.unsplash.com/photo-1556909212-d5b604d0c90d?auto=format&fit=crop&w=1200&q=80', 'Concealed prep bar with motorized disappearing splashback', 2),
(4, 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1200&q=80', 'Integrated wine cellar and breakfast banquette', 3),

(5, 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80', 'Executive open collaboration studio with acoustic slatted ceiling', 1),
(5, 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1200&q=80', 'Private boardroom with brass wire pendant and videoconferencing wall', 2),

(6, 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80', 'Main penthouse salon facing harbour sunrise', 1),
(6, 'https://images.unsplash.com/photo-1600566752355-35792bedcfea?auto=format&fit=crop&w=1200&q=80', 'Sculptural helical staircase with continuous leather-wrapped balustrade', 2);

-- Testimonials
INSERT INTO `testimonials` (`client_name`, `client_role`, `project_title`, `review`, `rating`, `client_avatar`, `location`, `is_featured`) VALUES
('Evelyn Vance', 'Art Collector & Entrepreneur', 'Villa Serenade, Beverly Hills', 'Aura Interiors transformed our home into a living work of art. Their obsession with materials, natural daylight, and bespoke furniture elevated our everyday existence into pure serenity. Unsurpassed craftsmanship and dedication.', 5, 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80', 'Beverly Hills, CA', 1),

('Julian Thorne', 'Tech Executive & Architect Lover', 'Tribeca Loft, New York', 'From the 3D visualization to the final handover day, the execution was nothing short of flawless. They managed every millimeter of custom millwork and acoustic paneling. It feels like our own private boutique hotel in the heart of Manhattan.', 5, 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80', 'New York, NY', 1),

('Claire Beaumont', 'Hospitality Director', 'The Lumina Penthouse, Sydney', 'Working with Aura Interiors was the easiest, most rewarding design experience of our lives. Their team is communicative, transparent with budgets, and their sense of elegance is world-class.', 5, 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80', 'Sydney, Australia', 1),

('Marcus Sterling', 'Managing Partner, Apex', 'Apex Ventures HQ', 'Our corporate headquarters required a balance between executive gravitas and creative warmth. Aura Interiors delivered a stunning workspace that inspires our entire team and continually wows visiting investors.', 5, 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=300&q=80', 'Singapore', 1);

-- Team Members
INSERT INTO `team_members` (`name`, `role`, `bio`, `image_url`, `experience_years`, `social_instagram`, `social_linkedin`) VALUES
('Elena Rostova', 'Founder & Principal Designer', 'Educated at Milan Politecnico with over 15 years directing luxury residential projects across London, Milan, and New York. Elena champions tactile warmth and timeless proportions.', 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&q=80', '15+ Years', 'https://instagram.com', 'https://linkedin.com'),

('Marcus Chen', 'Design Director & Architect', 'Master of Architecture from Harvard GSD. Marcus specializes in structural spatial planning, biophilic acoustics, and seamless interior-exterior transitions.', 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=600&q=80', '12+ Years', 'https://instagram.com', 'https://linkedin.com'),

('Sophia Al-Mansoor', 'Lead 3D Visualizer & VR Artist', 'A pioneer in photorealistic architectural CGI and lighting simulations, Sophia brings client visions to life with millimeter precision before fabrication begins.', 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=600&q=80', '9+ Years', 'https://instagram.com', 'https://linkedin.com'),

('David Miller', 'Head of Sourcing & Millwork', 'With deep relationships across Italian stone quarries and French textile ateliers, David ensures every custom furniture piece and finish meets museum-grade standards.', 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=600&q=80', '14+ Years', 'https://instagram.com', 'https://linkedin.com');

-- Gallery Items (Categories: modern, minimalist, luxury, traditional, contemporary, small-space)
INSERT INTO `gallery_items` (`title`, `category`, `category_name`, `image_url`, `aspect_ratio`, `description`, `display_order`) VALUES
('Warm Travertine Sunken Lounge', 'modern', 'Modern Interiors', 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1200&q=80', 'landscape', 'Sun-drenched living room with low-slung linen sofa and raw stone coffee tables.', 1),

('Sculptural Japandi Dining Setting', 'minimalist', 'Minimalist Interiors', 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=1200&q=80', 'portrait', 'Clean lines, bleached oak, and washi paper lantern pendants for serene communal dining.', 2),

('Calacatta Marble Spa Bath', 'luxury', 'Luxury Interiors', 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=1200&q=80', 'landscape', 'Bookmatched Italian marble walls, freestanding monolithic tub, and brushed gold fixtures.', 3),

('Heritage Moldings & Velveteen Parlour', 'traditional', 'Traditional Interiors', 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1200&q=80', 'portrait', 'Crown moldings paired with olive velvet armchair and herringbone parquet flooring.', 4),

('Curated Ceramic Gallery & Bouclé Chair', 'contemporary', 'Contemporary Decor', 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=1200&q=80', 'landscape', 'Contemporary sculptural ceramics, textured boucle seating, and ambient table lamps.', 5),

('Multifunctional Studio Loft Micro-Kitchen', 'small-space', 'Small-Space Design Ideas', 'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=1200&q=80', 'landscape', 'Clever vertical storage, hidden fold-out desk, and light-reflective surfaces maximizing 450 sq.ft.', 6),

('Organic Bedroom with Slatted Wood Wall', 'minimalist', 'Minimalist Interiors', 'https://images.unsplash.com/photo-1616594039964-ae9021a400a0?auto=format&fit=crop&w=1200&q=80', 'portrait', 'Minimalist warmth featuring acoustic timber slats, floating nightstands, and soft neutral textiles.', 7),

('Grand Double-Height Glass Living Pavilion', 'luxury', 'Luxury Interiors', 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1200&q=80', 'landscape', 'Cathedral ceilings, bronze framing, and custom velvet curved modular lounge.', 8),

('Cozy Reading Alcove with Built-in Library', 'small-space', 'Small-Space Design Ideas', 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80', 'landscape', 'Maximizing under-stair and nook space with custom joinery and warm reading sconces.', 9),

('Sculptural Monolith Kitchen Island', 'modern', 'Modern Interiors', 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=1200&q=80', 'portrait', 'Honed Taj Mahal quartzite island with recessed LED toe kicks and fluted timber bar stools.', 10),

('Artisan Brass & Ceramic Styling Vignette', 'contemporary', 'Contemporary Decor', 'https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&w=1200&q=80', 'landscape', 'Handcrafted ceramic vessels, brass accents, and dry floral arrangements on raw limestone.', 11),

('Warm Classical Library Lounge', 'traditional', 'Traditional Interiors', 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=1200&q=80', 'landscape', 'Dark stained walnut bookshelves, tufted chesterfield sofa, and warm brass task lamps.', 12);

-- Pre-seed a couple of realistic consultation and contact records
INSERT INTO `consultations` (`full_name`, `email`, `phone`, `service_name`, `property_type`, `budget_range`, `preferred_date`, `project_location`, `description`, `status`) VALUES
('Alexander Wright', 'alex.wright@example.com', '+1 (555) 234-5678', 'Residential Interior Design', 'Penthouse', '$60,000 - $120,000', '2026-11-15', 'Tribeca, New York', 'Full renovation of a 3-bedroom penthouse with focus on open entertaining space and master suite.', 'In Progress'),
('Miranda Cole', 'm.cole@designbrand.com', '+1 (555) 876-5432', 'Office Interior Design', 'Commercial Studio', '$120,000+', '2026-11-20', 'Beverly Hills, CA', 'New design headquarters for an international fashion brand requiring showroom and creative studios.', 'New');

INSERT INTO `contacts` (`name`, `email`, `phone`, `subject`, `message`, `is_read`) VALUES
('Jonathan Hayes', 'jonathan@hayescapital.com', '+1 (555) 432-1098', 'Inquiry regarding Villa Project in Aspen', 'Hello Aura Interiors team, I admired your work on Villa Serenade and would love to discuss a 5,000 sq.ft mountain residence project commencing early next year.', 0);
