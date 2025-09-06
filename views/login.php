<?php
$title = "Login";
ob_start();
session_start();


$errorMessage = '';
if(isset($_SESSION['login_error'])){
    $errorMessage = $_SESSION['login_error'];
    unset($_SESSION['login_error']); 
}
?>

<div class="w-screen min-h-screen bg-[#93ef8e] flex sm:flex-row justify-around items-center flex-col">
    <section class="text-center">
        <h1 class="md:text-7xl text-5xl"><span class=" text-[#272727]">Don't forget <br> your <br></span> <span class=" text-[#08a813]">Username <br> and <br> Password</span></h1>
    </section>

    <div class="sm:w-[500px] sm:h-[600px] w-[400px] h-[500px] bg-[#08a813] rounded-4xl relative">
        <?php if($errorMessage): ?>
            <div class="fixed top-5 right-5 bg-red-500 text-white p-4 rounded shadow-lg z-50">
                <?= $errorMessage ?>
            </div>
            <script>
                setTimeout(() => {
                    document.querySelector('.fixed').remove();
                }, 5000); // popup disappears after 5 seconds
            </script>
        <?php endif; ?>

        <form action="models/login_auth.php" method="post" class="flex flex-col items-center">
            <h1 class="text-[#ffffff] md:text-4xl sm:text-3xl flex w-full p-10">Log in</h1>
            <div class="md:w-[250px] w-[150px] flex flex-col gap-10">
                <input type="text" name="username" placeholder="Username:" required class="w-full">
                <input type="password" name="password" placeholder="Password:" required class="w-full">
            </div>
            <button type="submit"
                class="bg-[#ffffff] text-[#08a813] font-bold sm:px-10 sm:py-3 px-5 py-2 rounded-4xl cursor-pointer active:bg-[#93ef8e] mt-10">
                Log in
            </button>
            <a href="index.php?page=register" class="mt-5 text-white underline">Back to register</a>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . "/layout.php";
?>
