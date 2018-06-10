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
        <form action="<?php echo base_url('slider/update') ?>" enctype= "multipart/form-data" method="post">
          <div class="form-body">

            <!--/row-->
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <div class="panel panel-default">
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                   <div class="col-md-12 ">
                        <div class="form-group">
                           <label for="input-file-now-custom-3">Resim</label>
                          <input type="file" id="input-file-now-custom-3" class="dropify-fr" data-height="100" data-default-file="<?php echo base_url ($row->slider_image)?>" name="image"/>
                          <small class="form-text text-muted">Resim Boyutu: 1920x1280px</small>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">

                  
                    <div class="row">
                      <div class="col-md-6">
                       <div class="form-group">
                       <label class="control-label">Sıralama</label>
                      <input id="slider_order" type="text" value="<?php echo $row->slider_order?>" name="slider_order" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline">
                       <input type="hidden" name="slider_id" value="<?php echo $row->slider_id;?>">
                       </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form-group">
                         <label>Durum</label>
                        <div class="row">
                          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="radio radio-success">
                                        <input type="radio" name="is_Active" id="radio1" value="1" <?php echo ($row->is_Active== 1) ?  "checked" : "" ;  ?>>
                                        <label for="radio1"> Aktif </label>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="radio radio-warning">
                                        <input type="radio" name="is_Active" id="radio2" value="0" <?php echo ($row->is_Active== 0) ?  "checked" : "" ;  ?>>
                                        <label for="radio2"> Pasif </label>
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
