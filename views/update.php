<?php
require_once __DIR__."/dashboard.php";

// kapag sinave yung edits
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['texts']) && is_array($_POST['texts'])) {
        foreach ($_POST['texts'] as $index => $newText) {
            $_SESSION['texts'][$index] = htmlspecialchars($newText);
        }
    }
    header("Location: read.php"); // balik sa read.php after update
    exit;
}
?>

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<section class="w-full flex justify-center mt-10">
    <form action="update.php" method="post" class="flex flex-col items-center gap-5">
        <?php if (!empty($_SESSION['texts'])): ?>
            <?php foreach ($_SESSION['texts'] as $index => $text): ?>
                <textarea name="texts[<?= $index ?>]" 
                          class="text-2xl w-[70vw] h-[10vh] bg-[#08a813] text-white focus:outline-none p-3 rounded-lg"><?= $text ?></textarea>
            <?php endforeach; ?>
            <button type="submit" 
                    class="bg-white px-5 py-2 text-2xl text-[#08a813] cursor-pointer rounded-lg shadow-md mt-5">
                Save Changes
            </button>
        <?php else: ?>
            <p class="text-white">No texts available to update.</p>
        <?php endif; ?>
    </form>
</section>
