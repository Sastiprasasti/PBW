<?php
require '../functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT username, COUNT(*) as skor FROM misi 
    WHERE username LIKE '%$keyword%' 
    GROUP BY username ORDER BY skor DESC ";
$dataskor=  query($query);
?>

<table width="100%">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Username</td>
                                            <td>Skor</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $i = 1;
                                        foreach ($dataskor as $row): ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?= $row['username']?></td>
                                                <td><?= $row['skor'] . ' poin';?></td>
                                            </tr>
                                        <?php $i++; 
                                        endforeach; ?>
                                    </tbody>
                                </table>