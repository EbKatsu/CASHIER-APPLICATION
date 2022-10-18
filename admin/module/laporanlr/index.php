<section id="main-content">
  <section class="wrapper">

    <div class="row">
      <div class="col-lg-12">
        <div class="row" style="margin-left:1pc;margin-right:1pc;">

          <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sparkline12-list shadow-reset mg-t-30">
                    <div class="sparkline12-hd">
                      <div class="main-sparkline12-hd">

                      </div>
                    </div>
                    <div class="sparkline12-graph">
                      <div class="basic-login-form-ad">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="all-form-element-inner">

                              <?php
                              $test = mysqli_connect("localhost", "root", "", "db_toko");
                              if (isset($_POST['submit'])) {

                                $submit = $_POST['submit'];
                                $tgl_a = $_POST['tgl_a'];
                                $tgl_b = $_POST['tgl_b'];

                                $sql = mysqli_query($test, "SELECT * FROM beban WHERE tanggal BETWEEN '$tgl_a' AND '$tgl_b'");
                                if (mysqli_num_rows($sql) >= 0) {
                                  $no = 0;


                                  echo '<h2>Laporan Laba Rugi<br><small>' . $tgl_a . ' sampai ' . $tgl_b . '</small></h2><hr>

         <div class="col-sm-11">
          <a href="index.php?page=laporanlr" id="tombol" class="btn btn-info pull-left"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Kembali</a>
          <a href="print3.php" target="_blank"> <button class="btn btn-warning pull-right"><i class="fa fa-print"></i> Cetak</button></a>
           </div>';
                                }

                                echo '
         </tbody>
         </table>
         <div class="col-sm-11">
         <table class="table table-bordered">
         <thead>
            <tr class="info">
              <td width="15%" align="left">Pendapatan</td>
              <td width="5%"></td>
              <td width="5%"></td>
              <td width="15%"></td>    
            </tr>
            <tr>
            <td width="15%"></td>
            <td width="15%" align="left">Penjualan</td>
            <td width="5%">:</td>';
                                $sqlpenjualan = mysqli_query($test, "SELECT sum(total) as pnj FROM nota WHERE tanggal_input BETWEEN '$tgl_a' AND '$tgl_b'");
                                while ($r = mysqli_fetch_array($sqlpenjualan)) {
                                  $jumlahpemasukkan = $r['pnj'];
                                  echo '
            <td width="15%">' . number_format($r['pnj']) . '</td>
            ';
                                }
                                echo '
            </tr>
            <tr class="info">
              <td width="15%" align="left">Beban</td>
              <td width="15%"></td>
              <td width="5%"></td>
              <td width="15%"></td>
            </tr>
            <td width="15%"></td>
            <td width="15%" align="left">Beban</td>
            <td width="5%">:</td>
            ';

                                $query = mysqli_query($test, "SELECT sum(biaya) as bbn FROM beban WHERE tanggal BETWEEN '$tgl_a' AND '$tgl_b'");
                                while ($rs = mysqli_fetch_array($query)) {

                                  $jumlahbeban = $rs['bbn'];
                                  echo '<td width="15%">' . number_format($rs['bbn']) . '</td>';
                                }
                                $totallaba = $jumlahpemasukkan - $jumlahbeban;
                                echo '</tr>
            <tr>
            <td width="15%" align="left"><b>Laba/Rugi</td>
            <td width="15%"></td>
            <td width="5%"><b>=</td>
            <td width="15%"><b>' . number_format($totallaba) . '</td>
            </tr><br>
            </thead>
          
     </table>';


                                echo ' 
           </div>
           </div>
           </div>
         </div>';
                              } else {

                                echo '<h2>Laporan Laba Rugi</h2><hr>';

                              ?>
                                <div class="col-sm-1">
                                </div><br /><br />
                                <div class="well well-sm noprint">
                                  <form class="form-inline" role="form" method="post" action="">
                                    <div class="form-group">
                                      <label class="info" for="tgl_a">Mulai : </label>
                                      <input type="date" class="form-control" id="tgl1" name="tgl_a" required>
                                    </div>
                                    <div class="form-group">
                                      <label class="info" for="tgl_b">Hingga : </label>
                                      <input type="date" class="form-control" id="tgl2" name="tgl_b" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success">Tampilkan</button>
                                  </form>
                                </div>
                              <?php
                              }
                              ?>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /col-md-3-->
      </div>
    </div>
    </div>
  </section>
</section>