<?php 
include "../dashboard/header.php";
global $conAccount;
?>

<table class="table table-striped table-bordered ml-80 mt-28" style="margin-left: 35rem; width:90rem;">
    <tbody class="table-responsive">
        <tr>
            <th class="text-center" style="width:50px;">No</th>
            <th class="text-center">User Email</th>
            <th class="text-center">Data Logger</th>
        </tr>
        <?php 
            $result = $conAccount->query("SELECT * FROM t_account");
            $no = 1;
            while($x = $result->fetch_array()){
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $x['userEmail']; ?></td>
                    <td><?php echo $x['onUpdated'] ?></td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>

<?php 
include "../dashboard/footer.php";
?>