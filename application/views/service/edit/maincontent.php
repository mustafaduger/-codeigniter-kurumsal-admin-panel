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
          <form action="<?php echo base_url('service/update') ?>" enctype= "multipart/form-data" method="post">
            <div class="form-body">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Başlık</label>
                    <input type="text" class="form-control" name="service_title" value ="<?php echo $row->service_title;?>">
                    <input type="hidden" name="service_id" value="<?php echo $row->service_id;?>">
                  </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Başlık (İngilizce)</label>
                    <input type="text" class="form-control" name="service_title_en" value ="<?php echo $row->service_title_en;?>">
                  </div>
                </div>
                <!--/span-->
              </div>
              <!--/row-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>İçerik</label>
                    <textarea type="text" class="form-control" name="service_description" rows="8"><?php echo strip_tags($row->service_description);?></textarea>
                    
                  </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>İçerik (İngilizce)</label>
                    <textarea type="text" class="form-control" name="service_description_en" rows="8"><?php echo ($row->service_description_en);?></textarea>
                  </div>
                </div>
                <!--/span-->
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
         