<?php
require '../functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM usersimerka WHERE username LIKE '%$keyword%'
    OR email LIKE '%$keyword%' OR alamat LIKE '%$keyword%'
    ";
    
$datauser=  query($query);
?>
                    <table width="100%" >
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>edit</td>
                                            <td>Username</td>
                                            <td>Email</td>
                                            <td>Alamat</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $i = 1;
                                        foreach ($datauser as $row): ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td>
                                                   <button type="button" class="btn btn-green"><a href="ubah.php?id=<?= $row["id"]; ?>" >ubah</a> </button>
                                                   <button type="button" class="btn btn-red"><a href="hapus.php?id=<?= $row["id"]; ?>"
                                                        onclick="return confirm('Yakin ingin menghapus');">hapus</a> </button>
                                                </td>
                                                <td><?= $row['username']?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['alamat']?></td>
                                            </tr>
                                        <?php $i++; 
                                        endforeach; ?>
                                    </tbody>
                                </table>