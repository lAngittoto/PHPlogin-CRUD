<?php

include_once __DIR__."/dashboard.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['userText'])) {
        $text = htmlspecialchars($_POST['userText']);
        $_SESSION['texts'][] = $text; 
    }
    
    header("Location: read.php");
    header("Location: update.php");
    exit;
}
?>

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<section class="w-full flex justify-center mt-10">
    <form action="create.php" method="post" class="flex flex-col items-center gap-5">
        <textarea name="userText" placeholder="Add Text..."
            class="text-2xl w-[70vw] h-[20vh] bg-[#08a813] text-white focus:outline-none p-3 rounded-lg"></textarea>
        <button type="submit"
            class="bg-white px-5 py-2 text-2xl text-[#08a813] cursor-pointer rounded-lg shadow-md">
            ADD
        </button>
    </form>
</section>
