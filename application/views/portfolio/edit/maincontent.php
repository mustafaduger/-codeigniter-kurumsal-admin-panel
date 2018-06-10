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
        <form action="<?php echo base_url('portfolio/update') ?>" enctype= "multipart/form-data" method="post">
          <div class="form-body">

            <!--/row-->
                    <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-default">
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                   <div class="col-md-4 ">
                    <div class="form-group">
                      <label for="input-file-now-custom-3">Resim</label>
                      <input type="file" id="input-file-now-custom-3" class="dropify-fr" data-height="100" data-default-file="<?php echo base_url ($row->portfolio_image)?>" name="image"/>
                      <small class="form-text text-muted">Resim Boyutu: 1200x900px</small>
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
                     <label>Kategori</label>
                     <select class="selectpicker" data-style="form-control" name="portfolio_category">
                      <option <?php echo ($row->portfolio_category== 1) ? "selected":"";?> value="1" >Devam Eden Projeler</option>
                      <option <?php echo ($row->portfolio_category== 2) ? "selected":"";?> value="2" >Kurucular Tarafından Tamamlanan Projeler</option>
                      <option <?php echo ($row->portfolio_category== 3) ? "selected":"";?> value="3" >Tamamlanan Projeler</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                   <div class="form-group">
                     <label class="control-label">Sıralama</label>
                     <input id="portfolio_order" type="text" value="<?php echo $row->portfolio_order;?>" name="portfolio_order" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline">
                   </div>
                 </div>
                 <div class="col-md-6">
                 <div class="form-group">
                         <label>Durum</label>
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="radio radio-success">
                                        <input type="radio" name="is_Active" id="radio1" value="1" <?php echo ($row->is_Active== 1) ?  "checked" : "" ;  ?>>
                                        <label for="radio1"> Aktif </label>
                            </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
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

            <div class="row">
              <div class="col-md-6 ">
                <div class="form-group">
                  <label>Başlık</label>
                  <input type="text" class="form-control" name="portfolio_title" value ="<?php echo $row->portfolio_title ;?>">
                  <input type="hidden" name="portfolio_id" value="<?php echo $row->portfolio_id ;?>">
                </div>
              </div>
              <div class="col-md-6 ">
                <div class="form-group">
                  <label>Başlık (İngilizce)</label>
                  <input type="text" class="form-control" name="portfolio_title_en" value ="<?php echo $row->portfolio_title_en; ?>">

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <label>Açıklama</label>
                  <textarea class="summernote" name="portfolio_content">
                  <?php echo $row->portfolio_content;?>
                  </textarea>
                  
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <label>Açıklama (İngilizce)</label>
                <textarea class="summernote" name="portfolio_content_en">
                  <?php echo $row->portfolio_content_en ;?>
                </textarea>
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
