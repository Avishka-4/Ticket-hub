-- Password Reset Table for TicketHub
-- Add this to your database.sql or run it separately in phpMyAdmin

-- Create password_resets table
CREATE TABLE IF NOT EXISTS password_resets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    reset_code VARCHAR(6) NOT NULL,
    reset_token VARCHAR(64) NOT NULL,
    expires_at DATETIME NOT NULL,
    is_used TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_reset_token (reset_token),
    INDEX idx_user_id (user_id),
    INDEX idx_expires_at (expires_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Add unique constraint to ensure one active reset per user
-- This will automatically replace old reset requests with new ones
ALTER TABLE password_resets 
ADD UNIQUE KEY unique_active_reset (user_id, is_used);

-- Sample queries for testing/debugging:

-- View all password reset requests
-- SELECT pr.*, u.email, u.first_name 
-- FROM password_resets pr 
-- JOIN users u ON pr.user_id = u.id 
-- ORDER BY pr.created_at DESC;

-- View active (not used and not expired) reset requests
-- SELECT pr.*, u.email 
-- FROM password_resets pr 
-- JOIN users u ON pr.user_id = u.id 
-- WHERE pr.is_used = 0 AND pr.expires_at > NOW();

-- Manually expire all reset codes (for testing)
-- UPDATE password_resets SET expires_at = NOW();

-- Clear all reset requests for a specific user
-- DELETE FROM password_resets WHERE user_id = 1;

-- Count active reset requests
-- SELECT COUNT(*) as active_resets 
-- FROM password_resets 
-- WHERE is_used = 0 AND expires_at > NOW();