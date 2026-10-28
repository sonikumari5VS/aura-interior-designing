<?php
/**
 * Aura Interiors - Secure Form Processing Endpoint
 * Handles Consultation Bookings, Contact Messages, and Newsletter Subscriptions
 * Uses PDO prepared statements, input sanitization, and CSRF protection.
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';

header('Content-Type: application/json; charset=utf-8');

// Function to handle error responses (AJAX vs Standard POST)
function respond($status, $message, $redirect_url = null) {
    $is_ajax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') || 
               (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) ||
               isset($_POST['ajax']) || (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'multipart/form-data') !== false);

    if ($is_ajax) {
        echo json_encode([
            'status' => $status,
            'message' => $message
        ]);
        exit;
    } else {
        if ($status === 'success') {
            $_SESSION['flash_success'] = $message;
        } else {
            $_SESSION['flash_error'] = $message;
        }
        $target = $redirect_url ?: ($_SERVER['HTTP_REFERER'] ?? BASE_URL . '/index.php');
        header("Location: $target");
        exit;
    }
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond('error', 'Invalid request method. Only POST submissions are accepted.');
}

// CSRF Validation
$submitted_csrf = $_POST['csrf_token'] ?? '';
if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $submitted_csrf)) {
    respond('error', 'Security token mismatch. Please refresh the page and try again.');
}

$action = trim($_POST['action'] ?? '');
$db = get_db();

if (!$db) {
    respond('error', 'Database connection unavailable. Please contact us directly via WhatsApp or phone.');
}

switch ($action) {
    // ----------------------------------------------------
    // Action 1: Consultation Booking Request
    // ----------------------------------------------------
    case 'consultation':
        $full_name     = sanitize($_POST['full_name'] ?? '');
        $email         = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
        $phone         = sanitize($_POST['phone'] ?? '');
        $service_name  = sanitize($_POST['service_name'] ?? 'General Consultation');
        $property_type = sanitize($_POST['property_type'] ?? 'Luxury Apartment');
        $budget_range  = sanitize($_POST['budget_range'] ?? 'Undisclosed');
        $preferred_date= !empty($_POST['preferred_date']) ? sanitize($_POST['preferred_date']) : null;
        $location      = sanitize($_POST['project_location'] ?? '');
        $description   = sanitize($_POST['description'] ?? '');

        // Validations
        if (empty($full_name) || strlen($full_name) < 2) {
            respond('error', 'Please provide a valid full name (minimum 2 characters).');
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            respond('error', 'Please enter a valid email address.');
        }
        if (empty($phone) || strlen($phone) < 6) {
            respond('error', 'Please enter a valid phone or WhatsApp number.');
        }
        if (empty($budget_range)) {
            respond('error', 'Please select an estimated budget range.');
        }
        if (empty($description) || strlen($description) < 10) {
            respond('error', 'Please provide a brief description of your project (minimum 10 characters).');
        }

        try {
            $stmt = $db->prepare("
                INSERT INTO consultations 
                (full_name, email, phone, service_name, property_type, budget_range, preferred_date, project_location, description, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'New')
            ");
            $stmt->execute([
                $full_name,
                $email,
                $phone,
                $service_name,
                $property_type,
                $budget_range,
                $preferred_date,
                $location,
                $description
            ]);

            respond('success', "Thank you, {$full_name}! Your consultation request for {$service_name} has been received. Our senior design director will review your project and contact you within 24 hours.");

        } catch (Exception $e) {
            error_log("Consultation submission error: " . $e->getMessage());
            respond('error', 'An internal error occurred while saving your consultation. Please contact us via phone or WhatsApp.');
        }
        break;

    // ----------------------------------------------------
    // Action 2: Contact Page General Inquiry
    // ----------------------------------------------------
    case 'contact':
        $name    = sanitize($_POST['name'] ?? '');
        $email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
        $phone   = sanitize($_POST['phone'] ?? '');
        $subject = sanitize($_POST['subject'] ?? 'General Inquiry');
        $message = sanitize($_POST['message'] ?? '');

        // Validations
        if (empty($name) || strlen($name) < 2) {
            respond('error', 'Please enter your full name.');
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            respond('error', 'Please enter a valid email address.');
        }
        if (empty($subject)) {
            respond('error', 'Please select or enter an inquiry subject.');
        }
        if (empty($message) || strlen($message) < 10) {
            respond('error', 'Please enter your message (at least 10 characters).');
        }

        try {
            $stmt = $db->prepare("
                INSERT INTO contacts (name, email, phone, subject, message, is_read) 
                VALUES (?, ?, ?, ?, ?, 0)
            ");
            $stmt->execute([$name, $email, $phone, $subject, $message]);

            respond('success', "Thank you, {$name}. Your message has been received. Our studio concierge will get back to you shortly.");

        } catch (Exception $e) {
            error_log("Contact form error: " . $e->getMessage());
            respond('error', 'Could not transmit your message. Please reach out to us directly via WhatsApp.');
        }
        break;

    // ----------------------------------------------------
    // Action 3: Newsletter Subscription
    // ----------------------------------------------------
    case 'newsletter':
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            respond('error', 'Please enter a valid email address.');
        }
        // Save as contact or subscription note
        try {
            $stmt = $db->prepare("
                INSERT INTO contacts (name, email, subject, message, is_read) 
                VALUES ('Newsletter Subscriber', ?, 'Newsletter Subscription', 'Subscribed to Aura Journal updates', 1)
            ");
            $stmt->execute([$email]);
            respond('success', 'You are now subscribed to The Aura Journal. Welcome to timeless design inspiration.');
        } catch (Exception $e) {
            respond('success', 'Thank you for subscribing to The Aura Journal.');
        }
        break;

    default:
        respond('error', 'Unrecognized form action requested.');
        break;
}
?>
