<?php
/**
 * Aura Interiors - Setup & Database Diagnostics Helper
 */
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';

$message = '';
$message_type = 'info';

// Handle one-click MySQL import if triggered
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'import_sql') {
    $host = '127.0.0.1';
    $port = '3306';
    $db   = 'aura_interiors';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO("mysql:host=$host;port=$port", $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $pdo->exec("USE `$db`");

        $sql_file = __DIR__ . '/aura_interiors.sql';
        if (file_exists($sql_file)) {
            $sql = file_get_contents($sql_file);
            $pdo->exec($sql);
            $message = "Database `aura_interiors` successfully initialized with all tables and seed data!";
            $message_type = "success";
        } else {
            $message = "SQL file `aura_interiors.sql` not found.";
            $message_type = "danger";
        }
    } catch (Exception $e) {
        $message = "MySQL Error: " . $e->getMessage() . "<br><small>Ensure Apache & MySQL are started in your XAMPP Control Panel.</small>";
        $message_type = "danger";
    }
}

// Check environment status
$php_version = phpversion();
$has_pdo = extension_loaded('pdo');
$has_pdo_mysql = extension_loaded('pdo_mysql');
$has_pdo_sqlite = extension_loaded('pdo_sqlite');

// Test MySQL live status
$mysql_status = false;
$mysql_error = '';
$table_counts = [];

try {
    $test_pdo = new PDO("mysql:host=127.0.0.1;port=3306", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 2
    ]);
    $mysql_status = true;

    // Check tables in aura_interiors
    $test_pdo->exec("CREATE DATABASE IF NOT EXISTS `aura_interiors`");
    $test_pdo->exec("USE `aura_interiors`");

    $tables = ['services', 'projects', 'project_images', 'consultations', 'contacts', 'testimonials', 'team_members', 'gallery_items'];
    foreach ($tables as $t) {
        try {
            $count = $test_pdo->query("SELECT COUNT(*) FROM `$t`")->fetchColumn();
            $table_counts[$t] = $count;
        } catch (Exception $e) {
            $table_counts[$t] = 'Table not created yet';
        }
    }
} catch (Exception $e) {
    $mysql_error = $e->getMessage();
}

$active_driver = Database::getInstance()->getDriver();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aura Interiors - Setup & Diagnostics</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body { background-color: #FBF9F5; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
    .card { border: 1px solid #E5DDD3; border-radius: 8px; }
  </style>
</head>
<body class="py-5">
  <div class="container" style="max-width: 850px;">
    
    <div class="text-center mb-4">
      <div class="display-6 fw-bold" style="color: #1C1917;">✦ Aura Interiors</div>
      <p class="text-muted">Environment Diagnostics & XAMPP / MySQL Installer Helper</p>
    </div>

    <?php if ($message): ?>
      <div class="alert alert-<?= $message_type ?> alert-dismissible fade show" role="alert">
        <?= $message ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Active Mode Banner -->
    <div class="card p-4 shadow-sm mb-4" style="background-color: #FFFFFF; border-left: 5px solid <?= $active_driver === 'mysql' ? '#198754' : '#C5A880' ?>;">
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <span class="badge <?= $active_driver === 'mysql' ? 'bg-success' : 'bg-warning text-dark' ?> mb-1">
            Active Engine: <?= strtoupper($active_driver) ?>
          </span>
          <h4 class="mb-1">
            <?= $active_driver === 'mysql' ? 'MySQL is Connected & Live!' : 'Running in SQLite Resilient Fallback' ?>
          </h4>
          <p class="text-muted small mb-0">
            <?= $active_driver === 'mysql' 
                ? 'Your website is directly querying and writing into the MySQL database `aura_interiors` on XAMPP.' 
                : 'The site is functioning smoothly via SQLite. To enable MySQL, start the MySQL module in your XAMPP Control Panel.' ?>
          </p>
        </div>
        <div>
          <a href="<?= BASE_URL ?>/index.php" class="btn btn-dark">
            <i class="bi bi-arrow-left me-1"></i> Visit Website
          </a>
        </div>
      </div>
    </div>

    <!-- Requirements Check -->
    <div class="card p-4 shadow-sm mb-4">
      <h5 class="fw-bold mb-3"><i class="bi bi-hdd-network me-2 text-primary"></i> System Environment</h5>
      <table class="table table-bordered mb-0">
        <tbody>
          <tr>
            <td>PHP Version</td>
            <td><strong>PHP <?= $php_version ?></strong></td>
            <td><span class="badge bg-success">Passed</span></td>
          </tr>
          <tr>
            <td>PDO Extension</td>
            <td><?= $has_pdo ? 'Installed' : 'Missing' ?></td>
            <td><span class="badge <?= $has_pdo ? 'bg-success' : 'bg-danger' ?>"><?= $has_pdo ? 'OK' : 'Required' ?></span></td>
          </tr>
          <tr>
            <td>PDO MySQL (XAMPP)</td>
            <td><?= $has_pdo_mysql ? 'Installed' : 'Missing' ?></td>
            <td><span class="badge <?= $has_pdo_mysql ? 'bg-success' : 'bg-danger' ?>"><?= $has_pdo_mysql ? 'OK' : 'Required for MySQL' ?></span></td>
          </tr>
          <tr>
            <td>PDO SQLite (Fallback)</td>
            <td><?= $has_pdo_sqlite ? 'Installed' : 'Missing' ?></td>
            <td><span class="badge <?= $has_pdo_sqlite ? 'bg-success' : 'bg-warning' ?>"><?= $has_pdo_sqlite ? 'OK' : 'Optional' ?></span></td>
          </tr>
          <tr>
            <td>MySQL Connection Status</td>
            <td>
              <?php if ($mysql_status): ?>
                <span class="text-success fw-bold"><i class="bi bi-check-circle-fill me-1"></i> Connected to localhost:3306</span>
              <?php else: ?>
                <span class="text-danger"><i class="bi bi-x-circle-fill me-1"></i> Not running (<?= htmlspecialchars($mysql_error) ?>)</span>
              <?php endif; ?>
            </td>
            <td>
              <span class="badge <?= $mysql_status ? 'bg-success' : 'bg-secondary' ?>">
                <?= $mysql_status ? 'Active' : 'Offline' ?>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- MySQL Database Table Status -->
    <?php if ($mysql_status): ?>
      <div class="card p-4 shadow-sm mb-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <h5 class="fw-bold mb-0"><i class="bi bi-table me-2 text-success"></i> MySQL Database: `aura_interiors`</h5>
          <form method="POST" class="d-inline">
            <input type="hidden" name="action" value="import_sql">
            <button type="submit" class="btn btn-outline-success btn-sm">
              <i class="bi bi-arrow-repeat me-1"></i> (Re)Import SQL Schema & Seeds
            </button>
          </form>
        </div>

        <table class="table table-sm table-striped">
          <thead>
            <tr>
              <th>Table Name</th>
              <th>Records Count</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($table_counts as $t_name => $count): ?>
              <tr>
                <td><code><?= $t_name ?></code></td>
                <td><?= is_numeric($count) ? "<strong>$count</strong> rows" : $count ?></td>
                <td>
                  <span class="badge <?= is_numeric($count) && $count > 0 ? 'bg-success' : 'bg-warning text-dark' ?>">
                    <?= is_numeric($count) && $count > 0 ? 'Populated' : 'Ready' ?>
                  </span>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="card p-4 shadow-sm mb-4 bg-light">
        <h5 class="fw-bold mb-2"><i class="bi bi-info-circle me-2 text-warning"></i> How to enable MySQL with XAMPP:</h5>
        <ol class="text-muted mb-3" style="line-height: 1.8;">
          <li>Open the <strong>XAMPP Control Panel</strong> on your computer.</li>
          <li>Click the <strong>Start</strong> button next to <strong>MySQL</strong> (and Apache if using Apache).</li>
          <li>Refresh this page, and click <strong>(Re)Import SQL Schema</strong> or visit the homepage!</li>
          <li>Alternatively, you can open <a href="http://localhost/phpmyadmin" target="_blank">phpMyAdmin</a> and import the file <code>aura_interiors.sql</code>.</li>
        </ol>
      </div>
    <?php endif; ?>

    <div class="d-flex justify-content-center gap-3">
      <a href="<?= BASE_URL ?>/index.php" class="btn btn-primary px-4">
        <i class="bi bi-house me-1"></i> Open Homepage
      </a>
      <a href="<?= BASE_URL ?>/admin/index.php" class="btn btn-outline-dark px-4">
        <i class="bi bi-speedometer2 me-1"></i> Open Admin Inquiries Panel
      </a>
    </div>

  </div>
</body>
</html>
