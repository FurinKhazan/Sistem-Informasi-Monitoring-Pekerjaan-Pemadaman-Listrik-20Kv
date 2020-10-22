<!DOCTYPE html>
<html><head>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <title></title>
    <style>
        
        th, td {
            border:solid;
            text-align: center;
            font-size: small;
        }
        h2,h4,h3,h5 {
            
            text-align: center;
        }
        .pel{
            text-align: right;
        }
        .pim{
            text-align: left;
        }
        .judul{
            margin-bottom: 20px;
        }
        signature_kiri{
            
            font-size: smaller;
            text-align:left;
        }
        signature_kanan{
           
            font-size: smaller;
            text-align:right;
        }
        div {
       
            padding: 10px;
            width: 20px;
            height: 20px;
            text-align: justify;
            }
    </style>
</head><body>
        <h4>Laporan Pekerjaan Pemadaman Terencana <br>
        PT.PLN (Persero) Unit Pelaksana Pelayanan Pelanggan Sukoharjo</h4>
    <hr>
    <h3>Data Status Izin Pekerjaan</h3>
    <table style="border:solid;text-align: center;border-collapse: collapse;" >
        <tr style="background-color: gainsboro;">
                  <th>No</th>
                  <th>Status Pekerjaan</th>
                  <th>Tanggal Pekerjaan</th>
                  <th>ULP unit</th>
                  <th>Penyulang Padam</th>     
                  <th>Pekerjaan</th>           
                  <th>Pengawas</th>           
                  <th>Vendor Pelaksana</th>                   
        </tr>
        <?php $no=1;
            foreach( $perijinan as $pyl) :?>
        <tr>
            
                    <td><?= $no++ ?></td>
                    <td><?= $pyl['status']; ?></td>
                    <td><?= $pyl['tanggal_pekerjaan'];?> </td> 
                    <td><?= $pyl['nama_ulp'] ;?> </td>       
                    <td><?= $pyl['nama_penyulang'] ;?> </td>   
                    <td><?= $pyl['pekerjaan'];?> </td>  
                    <td><?= $pyl['nama'] ;?> </td>      
                    <td><?= $pyl['nama_vendor'] ;?> </td>                
        </tr>
        <?php endforeach; ?>   
    </table><br>
    <br><h5>Mengetahui,</h5>

    <table style="width: max-content;border-style: none;">
    <tr>
        <td style="border-style: none;">
            <h6 class="pim"  style="font-size:14px;" >
                Pimpinan<br>
                <br><br><br>
                (La Ode Lawati)
            </h6>
        </td>
        <td style="border-style: none;">
            <h6 class="pel"  style="font-size:14px;">
                Pelaksana<br>
                <br><br><br>
                (<?= $user[0]['nama'];?>)
            </h6>
        </td>
      </tr>   
    </table>
    
    <!-- <signature_kiri>Pimpinan</signature_kiri>
    <h5 style="text-align: right;">Pelaksana</h5> -->
            
</body></html>
