<?php

require_once __DIR__."/dashboard.php";
?>

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<section class="w-[90%] mx-auto mt-10 bg-[#08a813] text-2xl text-white p-5 rounded-lg">
    <?php if (!empty($_SESSION['texts'])): ?>
        <?php foreach ($_SESSION['texts'] as $text): ?>
            <p class="mb-3">- <?= $text ?></p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No text submitted yet.</p>
    <?php endif; ?>
</section>

