

<div class="container">
    <div class="row justify-content-center" style="width:1250px;border-style:solid; border-color:gainsboro; padding-top:15px;box-shadow: 10px 10px 5px #888888;">
        <div class="col-sm-3">  
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;border-style:solid; box-shadow: 10px 10px 5px #888888;">
                <div class="card-header text-center">PERMOHONAN PEKERJAAN PEMADAMAN </div>
                    <div class="card-body">
                    <h5 class="card-title">Pengajuan pekerjaan pemadaman <br> <b><i>Disetujui =</i></b> </h5>
                    <h1 class="text-center"><?= $jumlah_disetujui ?></h1><h4>Permohonan Pekerjaan</h4>
                    </div>
            </div>              
        </div>

        <div class="col-sm-3 ml-3">  
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;border-style:outset; box-shadow: 10px 10px 5px #888888;">
                <div class="card-header text-center">PERMOHONAN PEKERJAAN PEMADAMAN </div>
                    <div class="card-body">
                    <h5 class="card-title">Pengajuan pekerjaan pemadaman <br> <b><i>Ditolak =</i></b> </h5>
                    <h1 class="text-center"><?= $jumlah_ditolak ?></h1><h4>Permohonan Pekerjaan</h4>
                    </div>
            </div>              
        </div>
      
        <div class="col-sm-3 ml-3">  
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;border-style:outset; box-shadow: 10px 10px 5px #888888;">
            <div class="card-header text-center">PERMOHONAN PEKERJAAN PEMADAMAN </div>
            <div class="card-body">
                <h5 class="card-title">Pengajuan pekerjaan pemadaman <br><b><i>Ditunda =</i></b> </h5>
                <h1 class="text-center"><?= $jumlah_ditunda ?></h1><h4>Permohonan Pekerjaan</h4>
            </div>
            </div>           
        </div>
        
    </div>


        <div class="row justify-content-center"style="margin-top: 30px;">
            
            <?php if (($this->session->userdata('role_id') == '3')) :?>
                <div class="col-md-2" style="padding-top: 170px;">
                    <a href="<?= base_url();?>pimpinan/home"class="btn btn-primary float-right">Sebelumnya</a>
                </div>
            <?php endif;  ?>    
            <?php if (($this->session->userdata('role_id') == '2')) :?>
                <div class="col-md-2" style="padding-top: 170px;">
                    <a href="<?= base_url();?>staff/home"class="btn btn-primary float-right">Sebelumnya</a>
                </div>
            <?php endif;  ?>    
            <?php if (($this->session->userdata('role_id') == '1')) :?>
                <div class="col-md-2" style="padding-top: 170px;">
                <a href="<?= base_url();?>home"class="btn btn-primary float-right">Sebelumnya</a>
            </div>
            <?php endif;  ?>    

            <div class="col-md-7">
            <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Pekerjaan Disetujui',     <?= $jumlah_disetujui ?>],
                    ['Pekerjaan Ditolak',     <?= $jumlah_ditolak ?>],
                    ['Pekerjaan Ditunda',      <?= $jumlah_ditunda ?>]
                    
                    ]);

                    var options = {
                    title: 'Perbandingan Status Pekerjaan ',
                    is3D: true,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                }
            </script>
            <div id="piechart_3d" style="width: 700px; height: 550px;"></div>
            </div>
           
        </div>
</div>
