<?php 
    require "core/function.php";
    require "control/CekIsLogin.php";
    require "control/crudBarang.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inventory</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Inventory Barang</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="Logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kelola Barang
                            </a>
                            <a class="nav-link" href="user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kelola User
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'Tidak ada email'; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">INVENTORY BARANG</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Tambah Barang
                                </button>

                                <a href="export.php" class="btn btn-info" role="button">Export</a>

                                <!-- The Modals -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Tambah Barang</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <form method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="userId" id="userId" value="<?php echo $_SESSION["userId"] ?>">
                                                <input type="hidden" name="email" id="email" value="<?php echo $_SESSION["email"] ?>">
                                                <input type="text" name="kodeBarang" placeholder="Kode Barang" class="form-control my-3" required>
                                                <input type="text" name="namaBarang" placeholder="Nama Barang" class="form-control my-3" required>
                                                <input type="text" name="jenis" placeholder="Jenis Barang" class="form-control my-3" required>
                                                <input type="number" name="stock" class="form-control my-3" placeholder="stock barang" required>
                                                <button type="submit" class="btn btn-primary my-3" name="add">Add</button>
                                            </div>
                                        </form>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>

                                <!-- Delete Modals -->
                                <div class="modal fade" id="delete">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Tambah Barang</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <form method="post">
                                            <div class="modal-body">
                                                <input type="text" name="namaBarang" placeholder="Nama Barang" class="form-control my-3" required>
                                                <input type="text" name="jenis" placeholder="Jenis Barang" class="form-control my-3" required>
                                                <input type="number" name="stock" class="form-control my-3" placeholder="stock barang" required>
                                                <button type="submit" class="btn btn-primary my-3" name="add">Add</button>
                                            </div>
                                        </form>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Nama Pemilik</th>
                                                <th>Jenis</th>
                                                <th>Stock</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Tampilkan data dari database ke halaman web -->
                                            <?php 
                                                $selectALL = mysqli_query($conn, "SELECT * FROM barang");
                                                while ($data = mysqli_fetch_array($selectALL)) {
                                                    $idb = $data['idbarang'];
                                                    $kodeb = $data['kode'];
                                                    $namabarang = $data['namabarang'];
                                                    $owner = $data['name'];
                                                    $jenis = $data['jenisbarang'];
                                                    $stock = $data['stock'];
                                                    $ownerId = $_SESSION['userId'];
                                            ?>
                                            
                                                    <tr>
                                                        <td><?=$kodeb;?></td>
                                                        <td><?=$namabarang;?></td>
                                                        <td><?=$owner;?></td>
                                                        <td><?=$jenis;?></td>
                                                        <td><?=$stock;?></td>
                                                        <td>
                                                            <button type="submit" class="btn btn-warning my-3" data-toggle="modal" data-target="#edit<?=$idb;?>">Edit</button>

                                                            <button type="submit" class="btn btn-danger my-3" data-toggle="modal" data-target="#delete<?=$idb;?>">Delete</button>
                                                        </td>
                                                    </tr>

                                                    <!--  Edit Modals-->
                                                        <div class="modal fade" id="edit<?=$idb;?>">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            
                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                <h4 class="modal-title">Edit Barang</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                
                                                                <!-- Modal body -->
                                                                <form method="post">
                                                                    <div class="modal-body">
                                                                        <input type="text" name="namaBarang" value="<?=$namabarang;?>" class="form-control my-3" required>
                                                                        <input type="text" name="jenis" value="<?=$jenis;?>" class="form-control my-3" required>
                                                                        <input type="text" name="owner" value="<?=$owner;?>" class="form-control my-3" required>
                                                                        <input type="number" name="stock" class="form-control my-3" value="<?=$stock;?>" required>
                                                                        <button type="submit" class="btn btn-warning my-3" name="updateBarang">Edit</button>
                                                                        <input type="hidden" name="idb" value="<?=$idb;?>">
                                                                        <input type="hidden" name="userId" value="<?=$ownerId;?>">
                                                                        <input type="hidden" name="kodeb" value="<?=$kodeb;?>">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    
                                                     <!--  Delete Modals-->
                                                     <div class="modal fade" id="delete<?=$idb;?>">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            
                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                <h4 class="modal-title">Hapus Barang</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                
                                                                <!-- Modal body -->
                                                                <form method="post">
                                                                    <div class="modal-body">
                                                                        Hapus Barang <?=$namabarang;?>?
                                                                        <input type="hidden" name="idb" value="<?=$idb;?>">
                                                                        <input type="hidden" name="userId" value="<?=$ownerId;?>">
                                                                        <input type="hidden" name="kodeb" value="<?=$kodeb;?>">
                                                                        <br>
                                                                        <button type="submit" class="btn btn-danger my-3" name="hapusBarang">Delete</button>
                                                                    </div>
                                                                </form>
                                                                
                                                            </div>
                                                            </div>
                                                        </div>
                                            <?php 
                                            } // Tutup kurung kurawal untuk while loop
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
