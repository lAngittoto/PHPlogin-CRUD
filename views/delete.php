<?php

require_once __DIR__."/dashboard.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['deleteIndex'])) {
        foreach ($_POST['deleteIndex'] as $index) {
            unset($_SESSION['texts'][$index]); 
        }
      
        $_SESSION['texts'] = array_values($_SESSION['texts']);
    }
    header("Location: read.php");
    exit;
}
?>

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<section class="w-[90%] mx-auto mt-10 bg-[#08a813] text-2xl text-white p-5 rounded-lg flex flex-col items-start">
    <form action="delete.php" method="post" class="flex flex-col gap-4 w-full">
        <?php if (!empty($_SESSION['texts'])): ?>
            <?php foreach ($_SESSION['texts'] as $index => $text): ?>
                <label class="flex items-center gap-3 text-white text-xl cursor-pointer">
                    <input type="checkbox" name="deleteIndex[]" value="<?= $index ?>" 
                           class="w-5 h-5 cursor-pointer">
                    <?= $text ?>
                </label>
            <?php endforeach; ?>
            <button type="submit" 
                    class="bg-white text-[#08a813] px-5 py-2 text-2xl cursor-pointer rounded-lg shadow-md mt-5 self-start">
                Remove Selected
            </button>
        <?php else: ?>
            <p>No text to delete.</p>
        <?php endif; ?>
    </form>
</section>
