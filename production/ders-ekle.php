<?php 
include 'header.php';

  $sorgu = $db->prepare("SELECT * FROM t_bolumler");
  $sorgu->execute( array());
  $bolumlist=$sorgu->fetchAll(PDO::FETCH_ASSOC);

  $sorgu = $db->prepare("SELECT * FROM t_akademisyen");
  $sorgu->execute( array());
  $akademlist=$sorgu->fetchAll(PDO::FETCH_ASSOC);

  $sorgu = $db->prepare("SELECT * FROM t_siniflar");
  $sorgu->execute( array());
  $siniflist=$sorgu->fetchAll(PDO::FETCH_ASSOC);

if( isset($_GET['ad']) ){
  $sorgu = $db->prepare("SELECT * FROM t_dersler where Ders_Adi = ?");
  $sorgu->execute( array( $_GET['ad'] ) );
  $sonuclar=$sorgu->fetchAll(PDO::FETCH_ASSOC); 
}else{
  $sorgu = $db->prepare("SELECT * FROM t_dersler order by ID desc");
  $sorgu->execute( array( ) );
  $sonuclar=$sorgu->fetchAll(PDO::FETCH_ASSOC);
}
if(isset($_GET['islem_tur']) and $_GET['islem_tur'] == "guncelle"){
  $sorgu = $db->prepare("SELECT * FROM t_dersler where ID = ?");
  $sorgu->execute( array( $_GET['id'] ) );
  $guncellenecek_kayit=$sorgu->fetch(PDO::FETCH_ASSOC); 
}



?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>DERS BİLGİLERİ <small>
                      <?php
                      if(isset($_GET['islem_sonucu'])){
                      
                      if($_GET['islem_sonucu']==2){ ?>
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                         <strong>BAŞARILI:</strong> Yeni Kayıt Eklendi...
                         </div>
                      <?php }
                      else{}
                    }



                      ?>
                       <?php
                      if(isset($_GET['islem_sonucu'])){
                      
                      if($_GET['islem_sonucu']==3){ ?>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                         <strong>BAŞARISIZ:</strong> KAYIT EKLENEMEDİ!
                         </div>
                      <?php }
                      else{}
                    }

                      ?>





                      

                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>


                  <div class="x_content">
                    <br />


                    <form action="../netting/ders-kaydet.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">AKADEMİSYEN SEÇ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_group form-control" id="bolum">  
                          <?php foreach ($akademlist as $key ){ ?>                                                                              
                         <option value=<?php echo $key['ID'] ?>><?php echo $key['Ad'] ?></option>   
                         <?php } ?>              
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">BÖLÜM SEÇ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_group form-control" id="bolum">  
                          <?php foreach ($bolumlist as $key ){ ?>                                                                              
                         <option value=<?php echo $key['ID'] ?>><?php echo $key['Adi'] ?></option>   
                         <?php } ?>              
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">SINIF SEÇ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_group form-control" id="bolum">  
                          <?php foreach ($siniflist as $key ){ ?>                                                                              
                         <option value=<?php echo $key['ID'] ?>><?php echo $key['Sinif_Adi'] ?></option>   
                         <?php } ?>              
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">DERS ADI <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="ders-adi" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">DERS KODU <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="ders-kodu" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">KREDİ <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="kredi" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                     

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> ECTS <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="ects" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      


                      <?php
                      if(isset($_GET['islem_tur']) and $_GET['islem_tur'] == 'guncelle')
                      $islem = "guncelle";
                      else  
                      $islem = "yeni_kayit";
                      ?>
                      <input type="hidden" name="isl" value="<?php echo $islem;?>">
                      <input type="hidden" id="bolumid" name="bolumid" value=<?php echo $key['ID'] ?>>
                      <input type="hidden" id="akademid" name="akademid" value=<?php echo $key['ID'] ?>>
                      <input type="hidden" id="sinifid" name="sinifid" value=<?php echo $key['ID'] ?>>
                      <input type="hidden" name="id" value="<?php if(isset($guncellenecek_kayit['id'])) echo $guncellenecek_kayit['id'];?>">

                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" >EKLE</button>
                        </div>
                      </div>    
                    </form>
                  </div>
                  </div>


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>DERS TABLOSU</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Ders bilgileri burada görüntülenir.
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>DERS ADI</th>
                          <th>DERS KODU</th>
                          <th>KREDİ</th>
                          <th>ECTS</th>
                          <th>BÖLÜM ID</th>
                          <th>SINIF ID</th>
                          <th>AKADEMİSYEN ID</th>
                          <th>SİL</th>
                          <th>DÜZENLE</th>


                        </tr>
                      </thead>
                      <tbody>
                            <?php
                            $sira = 1;
                            foreach($sonuclar as $kayit){
                            ?>
                          <tr>
                          <td><?php echo $kayit['Ders_Adi']; ?></td>
                          <td><?php echo $kayit['Ders_Kodu']; ?></td>
                          <td><?php echo $kayit['Kredi']; ?></td>
                          <td><?php echo $kayit['Ects']; ?></td>
                          <td><?php echo $kayit['BolumID']; ?></td>
                          <td><?php echo $kayit['SinifID']; ?></td>
                          <td><?php echo $kayit['AkademisyenID']; ?></td>
                          <td><button type="button" class="btn btn-danger">SİL</button></a></td>
                          <td><button type="button" class="btn btn-warning">DÜZENLE</button></a></td>
                        </tr>
                        <?php $sira++; } ?>
                      </tbody>
                    </table>

                  
                </div>
                </div>


                </div>
              </div>
            </div>
          </div> 
        </div>
        <!-- /page content -->

        <?php include 'footer.php';?>