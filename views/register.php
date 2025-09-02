<?php
$title = "Register";
ob_start();
session_start();

// Check if registration was successful
$successMessage = '';
if(isset($_SESSION['register_success'])){
    $successMessage = $_SESSION['register_success'];
    unset($_SESSION['register_success']); // show only once
}
?>

<div class="bg-[#93ef8e] w-screen min-h-screen flex flex-col items-center justify-center">
    <div class="flex flex-col items-center w-screen h-screen justify-between sm:justify-between md:flex-row sm:flex-col overflow-hidden p-5">
        <section class="text-center">
            <h1 class="text-5xl lg:text-7xl md:text-6xl">
                <span class="text-[#272727]">For new <br> users</span><br>
                <span class="text-[#08a813]">Register <br> first.</span>
            </h1>
        </section>

        <div class="flex flex-col md:w-[500px] md:h-[700px] w-[350px] h-[500px] bg-[#08a813] rounded-4xl py-10">
            <?php if($successMessage): ?>
                <div class="fixed top-5 right-5 bg-green-500 text-white p-4 rounded shadow-lg z-50">
                    <?= $successMessage ?>
                </div>
                <script>
                    setTimeout(() => {
                        document.querySelector('.fixed').remove();
                    }, 5000); // popup disappears after 3 seconds
                </script>
            <?php endif; ?>

            <form action="models/register_auth.php" method="post" class="text-2xl flex flex-col items-center">
                <h1 class="text-[#ffffff] md:text-4xl sm:text-3xl flex w-full p-10">Register</h1>
                <div class="md:w-[250px] w-[150px] flex flex-col gap-10">
                    <input type="text" name="username" placeholder="Username: " required class="w-full">
                    <input type="email" name="email" placeholder="Email: " required class="w-full">
                    <input type="password" name="password" placeholder="Password: " required class="w-full">
                </div>
                <button type="submit"
                    class="bg-[#ffffff] text-[#08a813] font-bold sm:px-10 sm:py-3 px-5 py-2 rounded-4xl cursor-pointer active:bg-[#93ef8e] mt-10">
                    Register
                </button>
                <a href="index.php?page=login" class="text-[#93ef8e] mt-5">Log in</a>
            </form>
        </div>

        <div class="text-center">
            <h1 class="lg:text-7xl text-5xl md:text-6xl">
                <span class="text-[#08a813]">Welcome <br> have a</span> <br>
                <span class="text-[#272727]">Good <br> Day.</span>
            </h1>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . "/layout.php";
?>
