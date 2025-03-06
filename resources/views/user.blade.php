<html>
<body>
    <h1>Halaman User</h1>
    <h2>Daftar Pengguna</h2>
    <ul>
        <li>User 1</li>
        <li>User 2</li>
        <li>User 3</li>
    </ul>
    <h2>Form Pengguna</h2>
    <form action="/user" method="POST">
        <label for="username">Nama Pengguna:</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Tambah Pengguna</button>
    </form>
</body>
</html>
