<?php 
include 'header.php';

  $sorgu = $db->prepare("SELECT * FROM t_bolumler");
  $sorgu->execute( array());
  $bolumlist=$sorgu->fetchAll(PDO::FETCH_ASSOC);

  $sorgu = $db->prepare("SELECT * FROM t_fakulte");
  $sorgu->execute( array());
  $fakullist=$sorgu->fetchAll(PDO::FETCH_ASSOC);

if( isset($_GET['ad']) ){
  $sorgu = $db->prepare("SELECT * FROM t_siniflar where Sinif_Adi = ?");
  $sorgu->execute( array( $_GET['ad'] ) );
  $sonuclar=$sorgu->fetchAll(PDO::FETCH_ASSOC); 
}else{
  $sorgu = $db->prepare("SELECT * FROM t_siniflar order by ID desc");
  $sorgu->execute( array( ) );
  $sonuclar=$sorgu->fetchAll(PDO::FETCH_ASSOC);
}
if(isset($_GET['islem_tur']) and $_GET['islem_tur'] == "guncelle"){
  $sorgu = $db->prepare("SELECT * FROM t_siniflar where ID = ?");
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
                    <h2>SINIF BİLGİLERİ <small>
                      <?php
                      if(isset($_GET['islem_sonucu'])){
                      
                      if($_GET['islem_sonucu']==2){ ?>
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                         <strong>BAŞARILI:</strong> İşlem başarıyla gerçekleştirildi...
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


                    <form action="../netting/sinif-kaydet.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">FAKÜLTE SEÇ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_group form-control" id="bolum">  
                          <?php foreach ($fakullist as $key ){ ?>                                                                              
                         <option value=<?php echo $key['ID'] ?>><?php echo $key['Adi'] ?></option>   
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
                        </div>i
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SINIF ADI <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="<?php if(isset($_GET['islem_tur']) and $_GET['islem_tur']=="guncelle"){ echo $guncellenecek_kayit['Sinif_Adi'];}?>" name="sinif-adi" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">KONTENJAN <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="<?php if(isset($_GET['islem_tur']) and $_GET['islem_tur']=="guncelle"){ echo $guncellenecek_kayit['Kontenjan'];}?>" name="kontenjan" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
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
                      <input type="hidden" id="fakulteid" name="fakulteid" value=<?php echo $key['ID'] ?>>
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
                    <h2>SINIF TABLOSU</h2>
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
                      Sınıf bilgileri burada görüntülenir.
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SINIF ADI</th>
                          <th>KONTENJAN</th>
                          <th>FAKÜLTE ID</th>
                          <th>BÖLÜM ID</th>
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
                          <td><?php echo $kayit['Sinif_Adi']; ?></td>
                          <td><?php echo $kayit['Kontenjan']; ?></td>
                          <td><?php echo $kayit['FakulteID']; ?></td>
                          <td><?php echo $kayit['BolumID']; ?></td>
                          <td><a class="btn btn-danger" href="../netting/sil.php?id=<?php echo $kayit['ID']?>">Sil</a></td>
                          <td><a class="btn btn-danger" href="sinif-ekle.php?id=<?php echo $kayit['ID']&$islem_tur="guncelle"?>">DÜZENLE</a></td>
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