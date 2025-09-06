<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php?page=login");
    exit;
}


if (!isset($_SESSION['user_agent'])) {
    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
} elseif ($_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
    session_unset();
    session_destroy();
    header("Location: ../index.php?page=login");
    exit;
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

ob_start();

$title = "Dashboard";
$page = $_GET['page'] ?? '';
$allowedPages = ['create', 'read', 'update', 'delete'];
$contentPage = '';

if (in_array($page, $allowedPages)) {

    $contentPage = __DIR__ . '/' . $page . '.php';
    if (!file_exists($contentPage)) {
        $contentPage = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
</head>
<body>
<div class="w-screen min-h-screen bg-[#93ef8e]">
    <header class="w-screen md:h-[100px] bg-[#08a813] flex sm:flex-row flex-col gap-5 justify-between p-10 items-center overflow-hidden">
        <div class="md:w-[800px] w-[300px]  flex justify-between md:text-7xl text-5xl font-extrabold text-[#93ef8e]">
            <h1>C</h1><h1>R</h1><h1>U</h1><h1>D</h1>
        </div>
        <a href="../models/logout.php" class="text-3xl text-[#93ef8e]">Log out</a>
    </header>

    <nav class="p-10 flex sm:flex-row flex-col justify-between w-screen">
        <a href="dashboard.php?page=create" class="md:text-3xl text-2xl text-[#08a813] bg-[#ffffff] md:px-10 py-2 px-6 ">CREATE</a>
        <a href="dashboard.php?page=read" class="md:text-3xl text-2xl text-[#08a813] bg-[#ffffff] md:px-10 py-2 px-6">READ</a>
        <a href="dashboard.php?page=update" class="md:text-3xl text-2xl text-[#08a813] bg-[#ffffff] md:px-10 py-2 px-6">UPDATE</a>
        <a href="dashboard.php?page=delete" class="md:text-3xl text-2xl text-[#08a813] bg-[#ffffff] md:px-10 py-2 px-6">DELETE</a>
    </nav>

    <main class="p-10">
        <?php
        if ($contentPage) {
            include_once $contentPage;
        } else {
            echo '<h2 class="text-4xl text-[#08a813] text-center mt-10">Welcome to the Dashboard</h2>';
            echo '<p class="text-center mt-5 text-xl text-[#272727]">Click a menu above to manage your data.</p>';
        }
        ?>
    </main>
</div>

<script>
window.history.forward();
function noBack() { window.history.forward(); }
setTimeout(noBack, 0);
window.onunload = function () { null };
</script>
</body>
</html>
<?php
$content = ob_get_clean();
require __DIR__ . "/layout.php";
?>
