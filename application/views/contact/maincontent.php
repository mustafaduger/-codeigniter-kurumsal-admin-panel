 
<div class="row">
  <div class="col-md-12">
   <?php echo $this->session->flashdata('error_message'); ?>
 </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-inverse">
      <!--  <div class="panel-heading"></div> -->
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <form action="<?php echo base_url('contact/update') ?>" enctype= "multipart/form-data" method="post">
            <div class="form-body">

              <div class="row">
                <div class="col-md-12 ">
                  <div class="form-group">
                    <label>Adres</label>
                    <input type="text" class="form-control" name="contact_address" value ="<?php echo $row->contact_address?>">
                    <input type="hidden" name="contact_id" value="<?php echo $row->contact_id;?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>İlçe</label>
                    <input type="text" class="form-control" name="contact_district" value ="<?php echo $row->contact_district;?>">
                  </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>İl</label>
                    <input type="text" class="form-control" name="contact_province" value ="<?php echo $row->contact_province;?>">
                  </div>
                </div>
                <!--/span-->
              </div>
              <!--/row-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Telefon</label>
                    <input type="text" class="form-control" name="contact_telephon" value ="<?php echo $row->contact_telephon;?>">
                  </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Fax</label>
                    <input type="text" class="form-control" name="contact_fax" value ="<?php echo $row->contact_fax;?>">
                  </div>
                </div>
                <!--/span-->
              </div> 

              <!--/row-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="contact_email" value ="<?php echo $row->contact_email;?>">
                  </div>
                </div>
                <!--/span-->

              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Google Map latitude</label>
                    <input type="text" class="form-control" name="contact_latitude" value ="<?php echo $row->contact_latitude;?>">
                    <small class="form-text text-muted">latitude ve longitude değerlerini googlemap'ten alınız.</small>
                  </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Google Map longitude</label>
                    <input type="text" class="form-control" name="contact_longitude" value ="<?php echo $row->contact_longitude;?>">
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
         