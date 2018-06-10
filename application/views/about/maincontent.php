 
<div class="row">
  <div class="col-md-12">
     <?php echo $this->session->flashdata('error_message'); ?>
  </div>
</div>
 <div class="row">
  <div class="col-md-12">
    <div class="panel panel-inverse">
    <!--   <div class="panel-heading"> </div> -->
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
         <form action="<?php echo base_url('about/update') ?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
          <div class="form-body">
              <div class="white-box">
               <div class="row">
                    <div class="col-sm-12">
                      <label class="title">Hakkımızda İçerik</label>
                            <textarea class="summernote" name="about_content">
                                <?php echo $row->about_content; ?>
                            </textarea>
                            <input type="hidden" name="about_id" value="<?php echo $row->about_id ?>">
                    </div>
              </div>
              <div class="row">
                    <div class="col-sm-12">
                      <label class="title">Hakkımızda İçerik İngilizce</label>
                            <textarea class="summernote" name="about_content_en">
                                <?php echo $row->about_content_en; ?>
                            </textarea>
                    </div>
              </div>
              <hr class="m-t-20 m-b-20">
               <div class="row">
                    <div class="col-sm-12">
                      <label class="title">Misyon İçerik</label>
                           <textarea class="summernote" name="about_mission">
                                <?php echo $row->about_mission; ?>
                            </textarea>
                    </div>
              </div>

              <div class="row">
                    <div class="col-sm-12">
                      <label class="title">Misyon İçerik (İngilizce)</label>
                          <textarea class="summernote" name="about_mission_en">
                               <?php echo $row->about_mission_en; ?>
                            </textarea>
                    </div>
              </div>      
              <hr class="m-t-20 m-b-20">
              <div class="row">
                    <div class="col-sm-12">
                      <label class="title">Vizyon İçerik</label>
                           <textarea class="summernote" name="about_vision">
                               <?php echo $row->about_vision; ?>
                            </textarea>
                    </div>
              </div>

               <div class="row">
                    <div class="col-sm-12">
                      <label class="title">Vizyon İçerik (İngilizce)</label>
                           <textarea class="summernote" name="about_vision_en">
                               <?php echo $row->about_vision_en; ?>
                            </textarea>
                    </div>
              </div>
              <hr class="m-t-20 m-b-20">
               <div class="row">
                    <div class="col-sm-12">
                      <label class="title">Basında Biz İçerik</label>
                          <textarea class="summernote" name="about_press">
                               <?php echo $row->about_press; ?>
                            </textarea>
                    </div>
              </div>
            </div>
          <div class="form-actions">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-success">Güncelle</button>
                    <button type="button" class="btn btn-default">İptal</button>
                  </div>
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
