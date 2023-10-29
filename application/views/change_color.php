<?php
  $baris = $user->row();
?>
<section class="content-header">
  <h1>CHANGE COLOR</h1>
</section>
<section class="content">
  <div class="box box-sfs">
  <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <form class="form-validate" method="post" action="<?php echo site_url(); ?>account/change_color/<?php echo $baris->id;?>">
                <div class="form-group">
                    <label for="request_attachment" class="control-label">Color :</label>
                    <input type="color" name="color" value="<?php echo $baris->color;?>"><br><br>
                </div>
              <button class="btn btn-md btn-sfs" type="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
      </div>
</section>