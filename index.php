<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL + HTML + JavaScript</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>

    <div class='flex justify-center items-center p-10'>
        <span class='text-4xl'>
            <ion-icon name="people-outline"></ion-icon>
        </span>
    </div>
    
    <!-- แสดงฟอร์มเพื่อเพิ่มข้อมูลใหม่ -->
    <div class='flex justify-center'>
        <form id="addUserForm">
            <label for="username">Username :</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            <button type="button" onclick="addUser()" class='border border-black rounded-xl px-5 py-1 hover:bg-black hover:text-white transition'>Add User</button>
        </form>
    </div>

    <!-- แสดงรายการผู้ใช้ -->
    <div class='flex justify-center p-10'>
        <ul id="userList"></ul>
    </div>

    <!-- โหลดข้อมูลผู้ใช้เมื่อหน้าเว็บโหลด -->
    <script>
        window.onload = function() {
            loadUsers();
        };

        // ฟังก์ชันเพิ่มผู้ใช้
        function addUser() {
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;

            // ส่งข้อมูลไปยังไฟล์ PHP ด้วย XMLHttpRequest
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "add_user.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // เมื่อเพิ่มข้อมูลเสร็จสมบูรณ์ โหลดข้อมูลใหม่
                    loadUsers();
                }
            };
            xhr.send("username=" + username + "&email=" + email);
        }

        // ฟังก์ชันโหลดผู้ใช้
        function loadUsers() {
            // ส่งคำขอไปยังไฟล์ PHP เพื่อดึงข้อมูล
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_users.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // แสดงข้อมูลในรายการผู้ใช้
                    document.getElementById("userList").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>