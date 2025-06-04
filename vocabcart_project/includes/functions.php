<?php
// Common helper functions

/**
 * Ensure the user is logged in for JSON API endpoints.
 * Outputs a JSON error and exits when the user is not authenticated.
 */
function require_login_json(): void
{
    if (empty($_SESSION['user_id'])) {
        http_response_code(403);
        echo json_encode([
            'status' => 'error',
            'message' => 'Authentication required'
        ]);
        exit;
    }
}
?>
