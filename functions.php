<?php
function sanitizeInput($input) {
    // Implement proper input validation and sanitation
    return htmlspecialchars(trim($input));
}