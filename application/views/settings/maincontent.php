 <div class="row">
  <div class="col-md-12">
   <?php echo $this->session->flashdata('error_message'); ?>
 </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-inverse">
     <!-- <div class="panel-heading"></div> -->
     <div class="panel-wrapper collapse in" aria-expanded="true">
      <div class="panel-body">
        <form action="<?php echo base_url('settings/update') ?>" enctype= "multipart/form-data" method="post">
          <div class="form-body">

            <!--/row-->
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-default">
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                   <div class="col-md-4 ">
                    <div class="form-group">
                      <label for="input-file-now-custom-3">Logo</label>
                      <input type="file" id="input-file-now-custom-3" class="dropify-fr" data-height="100" data-default-file="<?php echo base_url ($row->settings_image)?>" name="image"/>
                      <small class="form-text text-muted">Resim Boyutu 135x100 px</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-wrapper collapse in">
                <div class="panel-body">

           

            <div class="row">
              <div class="col-md-6 ">
                <div class="form-group">
                  <label>Site Web Adresi</label>
                  <input type="text" class="form-control" name="settings_url" value ="<?php echo $row->settings_url;?>">
                    <input type="hidden" name="settings_id" value="<?php echo $row->settings_id ;?>">
                    <small class="form-text text-muted">Örnek:www.siteadi.com</small>
                </div>
              </div>
              <div class="col-md-6 ">
                <div class="form-group">
                  <label>Site Başlık</label>
                  <input type="text" class="form-control" name="settings_title" value ="<?php echo $row->settings_title;?>">

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <label>Açıklama</label>
                  <input type="text" class="form-control" name="settings_description" value ="<?php echo $row->settings_description;?>">
                  
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <label>Anahtar Kelimeler</label>
                <input type="text" class="form-control" name="settings_keywords" value ="<?php echo $row->settings_keywords;?>">
                <small class="form-text text-muted">Anahtar kelimleri virgülle ayırınız.</small>
              </div>
            </div>

             <div class="row">
              <div class="col-sm-6">
                <label>Site Yazar Adı</label>
                <input type="text" class="form-control" name="settings_author" value ="<?php echo $row->settings_author;?>">
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div> 

         
       </div>
       <div class="form-actions">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn btn-success">Güncelle</button>
                <!--  <button type="button" class="btn btn-default">İptal</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
