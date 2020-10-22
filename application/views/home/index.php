

<div class="container">
    <div class="row justify-content-center" style="border-style:outset; border-color:gainsboro; padding-top:15px;box-shadow: 10px 10px 5px #888888;"> 
        <div class="col-sm-3">  
            <div class="card text-white bg-info mb-3" style="max-width: 18rem; box-shadow: 10px 10px 5px #888888;">
                <div class="card-header text-center">PERMOHONAN PEKERJAAN PEMADAMAN </div>
                    <div class="card-body">
                    <h5 class="card-title">Pengajuan pekerjaan pemadaman <br> <b><i>Belum Dicek =</i></b> </h5>
                    <h1 class="text-center"><?= $permohonan_belum_dicek ?></h1><h4>Permohonan Pekerjaan</h4>
                    </div>
            </div>              
        </div>
      
        <div class="col-md-2">
            <i class="far fa-calendar-times fa-5x"></i>
        </div>
        
            

        <div class="col-sm-3 ml-3">  
            <div class="card text-white bg-success mb-3" style="max-width: 18rem; box-shadow: 10px 10px 5px #888888;">
            <div class="card-header text-center">PERMOHONAN PEKERJAAN PEMADAMAN </div>
            <div class="card-body">
                <h5 class="card-title">Pengajuan pekerjaan pemadaman <br><b><i>Sudah Dicek =</i></br> </h5>
                <h1 class="text-center"><?= $jumlah_permohonan_dicek ?></h1><h4>Permohonan Pekerjaan</h4>
            </div>
            </div>           
        </div>
        <div class="col-md-2 ">
            <i class="far fa-calendar-check fa-5x"></i>
        </div>
    </div>


        <div class="row justify-content-center"style="margin-top:20px";>
            <div class="col-md-7">
            <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Pekerjaan Belum Dicek',     <?= $permohonan_belum_dicek ?>],
                    ['Pekerjaan Sudah Dicek',      <?= $jumlah_permohonan_dicek ?>]
                    
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
      
            <?php if (($this->session->userdata('role_id') == '3')) :?>
                <div class="col-md-2" style="padding-top: 170px;">
                    <a href="<?= base_url();?>pimpinan/home/perijinan"class="btn btn-primary float-right">Selanjutnya</a>
                </div>
            <?php endif;  ?>    
            <?php if (($this->session->userdata('role_id') == '2')) :?>
                <div class="col-md-2" style="padding-top: 170px;">
                    <a href="<?= base_url();?>staff/home/perijinan"class="btn btn-primary float-right">Selanjutnya</a>
                </div>
            <?php endif;  ?>    
            <?php if (($this->session->userdata('role_id') == '1')) :?>
                <div class="col-md-2" style="padding-top: 170px;">
                    <a href="<?= base_url();?>home/perijinan"class="btn btn-primary float-right">Selanjutnya</a>
                </div>
            <?php endif;  ?>    

        </div>
        
</div>
