<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="src/output.css">
    <link rel="stylesheet" href="src/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
</head>

<body class=" select-none font-sans">
    <div class=" bg-[#93ef8e] w-screen h-screen flex flex-col items-center justify-center">
        <div class=" flex flex-row items-center w-full justify-around">
            <section class="text-center">
                <h1 class=" text-9xl "><span class=" text-[#272727]">For new <br> users</span><br><span class=" text-[#08a813]">Register <br> first.</span></h1>
            </section>
            <div class=" flex flex-col w-[600px] h-[700px] bg-[#08a813] rounded-4xl py-10"> 
                <form action="" method="post" class=" text-2xl flex flex-col items-center ">
                    <h1 class=" text-[#ffffff] text-5xl flex w-full  p-10">Register</h1>
                    <div class=" w-[400px] flex flex-col gap-10">
                        <input type="text" name="username" placeholder="Username: " required class=" w-full " >
                        <input type="email" name="email" placeholder="Email: " required class=" w-full">
                        <input type="password" name="password" placeholder="Password: " required class="w-full">
                    </div>
                    <button type="submit" class=" bg-[#ffffff] text-[#08a813] font-bold px-10 py-3 rounded-4xl cursor-pointer active:bg-[#93ef8e] mt-10">Register</button>
                </form>
            </div>
            <div class=" text-center">
                <h1 class=" text-9xl"><span class=" text-[#08a813]">Welcome <br> have a</span> <br> <span class=" text-[#272727]">Good <br> Day.</span></h1>
            </div>
        </div>
    </div>
</body>

</html>