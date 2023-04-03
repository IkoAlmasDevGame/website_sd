<?php 
include "../dashboard/header.php";
?>

<div class="col-md-6 mx-auto ml-80 mb-52">
    <h3 style="font-size : large; color:whitesmoke; font-weight:500;">Selamat Datang Di Sekolah Dasar</h3>
</div>
<div class="pull-right">
    <div id="calender"></div>
</div>

<div class="table-responsive ml-80" style="width: 98rem; margin-left:30rem;">
    <table class="table table-striped table-bordered" style="border: 3px solid;">
        <tr style="border: 1px solid black;">
            <th class="text-center">Per Bulan</th>
            <th class="text-center">Pembayaran SPP</th>
        </tr>
        <tr class="text-center">
            <th>Januri s/d Maret</th>
            <td><?php echo "Rp. ".number_format(500000, 0, ".", ","); ?></td>
        </tr>
        <tr class="text-center">
            <th>April s/d Juni</th>
            <td><?php echo "Rp. ".number_format(500000, 0, ".", ","); ?></td>
        </tr>
        <tr class="text-center">
            <th>Juli s/d September</th>
            <td><?php echo "Rp. ".number_format(500000, 0, ".", ","); ?></td>
        </tr>
        <tr class="text-center">
            <th>Oktober s/d Desember</th>
            <td><?php echo "Rp. ".number_format(500000, 0, ".", ","); ?></td>
        </tr>
    </table>
</div>



<div class="table-responsive ml-80 mb-20 " style="width: 98rem; margin-left:30rem;">
    <table class="table table-striped table-bordered" style="border: 3px solid;">
        <tr>
            <th class="text-start">Alamat Sekolah</th>
            <td class="text-start form-control input-group">Jl. xxxxxxxx xxxxxx xx/xx xx.xx, xxxxxxxxxxx, xxxxxxxxx, xxx xxxxxxx</td>
        </tr>
        <tr>
            <th class="text-start">Alamat Email</th>
            <td class="text-start form-control input-group">xxxxxxxx@gmail.com</td>
        </tr>
        <tr>
            <th class="text-start">No Telephone</th>
            <td class="text-start form-control input-group">+xx xxxxxxxxxx</td>
        </tr>
    </table>
</div>

<?php 
include "../dashboard/footer.php";
?>