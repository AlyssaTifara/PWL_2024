<html>
<body>
    <h1>Halaman Penjualan</h1>
    <h2>Daftar Produk</h2>
    <ul>
        <li>Produk 1</li>
        <li>Produk 2</li>
        <li>Produk 3</li>
    </ul>
    <h2>Form Penjualan</h2>
    <form action="/penjualan" method="POST">
        <label for="product">Pilih Produk:</label>
        <select id="product" name="product">
            <option value="produk1">Produk 1</option>
            <option value="produk2">Produk 2</option>
            <option value="produk3">Produk 3</option>
        </select>
        <label for="quantity">Jumlah:</label>
        <input type="number" id="quantity" name="quantity" required>
        <button type="submit">Tambah Penjualan</button>
    </form>
</body>
</html>
