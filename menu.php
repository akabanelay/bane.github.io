<?php include('form.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
        <title> Palace </title>
        <style>

* {
    margin:0;
    padding:0;
    box-sizing: border-box;
}

:root {
    --warna-utama: #FFF5FD;
    --warna-nav: #005A8D;
    --warna-text: #FF96AD;
}

body.night{
    --warna-utama: #0F3D3E;
    --warna-nav: #100F0F;
    --warna-text: #E2DCC8;
}

body{
    font-family: 'Rubik', sans-serif;
    overflow: show;
}

.table {
    width:100%;
}

.table_header {
    display:flex;
    justify-content: space-between;
    align-items:center;
    padding: 20px;
    margin-top:90px;
    background-color: var(--warna-utama);
}

.table_header p {
    color: var(--warna-text);
}

button {
    outline:none;
    border:none;
    border-radius: 6px;
    cursor: pointer;
    padding:10px;
    color: var(--warna-text);
    text-decoration: none;
}

.add_new {
    font-size: 25px;
    margin-top: 60px;
    padding:10px 20px;
    color: var(--warna-text);
    background-color: var(--warna-nav);
}

.table_section {
    height: 650px;
    overflow: auto;
}

table {
    margin-top: 100px;
    margin-bottom: 100px;
    width:100%;
    table-layout: fixed;
    min-width: 1000px;
    border-collapse: collapse;
}

thead th {
    top:0;
    background-color: var(--warna-nav);
    color: var(--warna-text);
    font-size: 15px;
}

th,td {
    border-bottom: 1px solid var(--warna-nav);
    padding: 10px 20px;
    word-break:break-all;
    text-align:center;

}

td img {
    width: 100px;
    object-fit: cover;
    border-radius: 5px;
    border: 2px solid var(--warna-nav);
}

p {
    margin-top:70px;
    font-size: 30px;
    color: var(--warna-nav);
}

.footer {
    margin: 0px;
    right: 0%;
    width: 100%;
    padding: 60px;
    background: var(--warna-nav);
    color:var(--warna-text);
    display: flex;
}

.footer div {
    text-align: center;
}

.kolom2 {
    flex-grow: 2;
}

.footer div h3 {
    font-weight: 300;
    margin-bottom: 30px;
    letter-spacing: 1px;
}

.kolom1 a {
    display: block;
    text-decoration: none;
    color: var(--warna-text);
    margin-bottom: 20px;
}

    </style>

    </head>
    <body>
    <nav>
    <div class="nav-bar">
        <i class='bx bx-menu sidebarOpen'></i>
        <span class="logo"> <a href=""> Fabric. </a> </span>
        <div class ="menu">
            <div class="logo-toggle">
                <span class="logo"> <a href=""> Fabric. </a> </span>
                <i class='bx bx-x sidebarClose'></i>
            </div>
            <ul class="nav-links">
                <li> <a href="index.php"> Home </a> </li>
                <li> <a href="admin.php"> Admin </a> </li>
                <li> <a href="menu.php"> Catalog</a> </li>
                <li> <a href="about.php"> About </a> </li>
            </ul>
        </div>
        <div class="nightday-mode">
            <div class="nightday">
                <i class='bx bx-moon moon'></i>
                <i class='bx bx-sun sun' ></i>
            </div>
            <div class="cari">
                <div class="searchToggle">
                    <i class='bx bx-x cancel'></i>
                    <i class='bx bx-search search'></i>
                </div>

                    <div class="search-field">
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div>
            </div>
        </div>
    </div>
    </nav>
        <div class="table">
            <div class="table_content">
                <table>
                    <thead>
                        <th>No.</th>
                        <th>Kode Produk</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Warna</th>
                        <th>Stok</th>
                        <th>Harga</th>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM produk ORDER BY Kode_Produk ASC";
                    $result = mysqli_query($form, $query);

                    if(!$result) {
                        die("Query Error :".mysqli_errno($form)." - ".mysqli_error($form));
                    }
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td> <?php echo $no; ?> . </td>
                            <td> <?php echo number_format ($row['Kode_Produk'], 0, ','); ?> </td>
                            <td> <img src="gambar/<?php echo $row['Gambar_Produk']; ?>"> <br> <?php echo substr($row['Gambar_Produk'], 0, 20); ?> <br> <?php echo date("Y/m/d"); ?> </td>
                            <td> <?php echo substr($row['Nama_Produk'], 0, 20); ?> </td>
                            <td> <?php echo substr($row['Warna'], 0, 20); ?> </td>
                            <td> <?php echo substr($row['Stok'], 0, 20); ?> </td>
                            <td> <?php echo substr($row['Harga'], 0, 20); ?> </td>
                        </tr>
                        <?php
                            $no++;
                                }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="script.js">
    </script>
    </body>
</html>