<?php
/**
 * PASSWORD MIGRATION SCRIPT
 * ========================
 * Run this ONCE after deploying the security update.
 * It converts old sha1 password hashes to bcrypt.
 * 
 * IMPORTANT: 
 * 1. Back up your database first!
 * 2. You must know the original passwords to re-hash them, OR
 *    this script will reset all passwords to defaults.
 * 3. Delete this file after running it.
 *
 * Since we cannot reverse sha1 hashes, this script will:
 * - Alter the password column to VARCHAR(255) for bcrypt
 * - Reset the default admin password to '1122' (hashed with bcrypt)
 * - Prompt you to have users reset their passwords
 */

include 'connect.php';

echo "<h2>Password Migration Script</h2>";
echo "<pre>";

try {
    // Step 1: Alter admin table password column
    $conn->exec("ALTER TABLE `admin` MODIFY `password` VARCHAR(255) NOT NULL");
    echo "✅ admin.password column widened to VARCHAR(255)\n";

    // Step 2: Alter users table password column
    $conn->exec("ALTER TABLE `users` MODIFY `password` VARCHAR(255) NOT NULL");
    echo "✅ users.password column widened to VARCHAR(255)\n";

    // Step 3: Reset admin password to '1122' with bcrypt
    $admin_hash = password_hash('1122', PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE `admin` SET password = ? WHERE name = ?");
    $stmt->execute([$admin_hash, 'admin@gmail.com']);
    echo "✅ Admin 'admin@gmail.com' password reset to '1122' (bcrypt)\n";

    // Step 4: For regular users - we cannot reverse sha1, 
    // so we mark them for password reset by setting a known temp password
    // You can skip this and let users use "forgot password" if you add that feature
    $select_users = $conn->prepare("SELECT id, name, email FROM `users`");
    $select_users->execute();
    $user_count = $select_users->rowCount();
    
    if($user_count > 0){
        // Option A: Reset all user passwords to a temporary password
        $temp_hash = password_hash('changeme123', PASSWORD_DEFAULT);
        $conn->exec("UPDATE `users` SET password = '$temp_hash'");
        echo "✅ All $user_count user passwords reset to 'changeme123' (bcrypt)\n";
        echo "⚠️  Please notify users to change their passwords!\n";
    } else {
        echo "ℹ️  No user accounts found.\n";
    }

    echo "\n✅ Migration complete!\n";
    echo "⚠️  DELETE THIS FILE (migrate_passwords.php) after running it!\n";

} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

echo "</pre>";
?>
