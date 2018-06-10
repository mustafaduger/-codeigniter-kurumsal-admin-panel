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
        <form action="<?php echo base_url('partners/Add') ?>" enctype= "multipart/form-data" method="post">
          <div class="form-body">

            <!--/row-->
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <div class="panel panel-default">
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                   <div class="col-md-12 ">
                        <div class="form-group">
                           <label for="input-file-now-custom-3">Logo</label>
                          <input type="file" id="input-file-now-custom-3" class="dropify-fr" data-height="100" data-default-file="" name="image"/>
                          <small class="form-text text-muted">Resim Boyutu: 400x300px</small>
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
                      <div class="col-md-12 ">
                        <div class="form-group">
                          <label>Ortaklar Web URL</label>
                          <input type="text" class="form-control" name="partners_url" value ="">
                          <small class="form-text text-muted">Örnek:www.siteadi.com</small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                       <div class="form-group">
                       <label class="control-label">Sıralama</label>
                      <input id="partners_order" type="text" value="1" name="partners_order" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline">
                       </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form-group">
                         <label>Durum</label>
                        <div class="row">
                          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="radio radio-success">
                                        <input type="radio" name="is_Active" id="radio1" value="1" checked>
                                        <label for="radio1"> Aktif </label>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="radio radio-warning">
                                        <input type="radio" name="is_Active" id="radio2" value="0" >
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
                <button type="submit" class="btn btn-success">Kaydet</button>
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
