<div class="content_middle">
    <div class="container">
        <div class="col-sm-9 col-sm-offset-1">
            <div class="main-content">
                <!--                <div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-ban"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b></b>
                                </div>
                                <div class="alert alert-success alert-dismissable">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b></b> 
                
                                </div>-->
                <h3 style="text-align:center; padding-top:50px;"><div style="margin-left: 285px;" class="listing">View Images</div></h3>              
                <div class="regform" id="myId">
                    <form action="<?php echo base_url(); ?>save_image/<?php echo $this->uri->segment('2'); ?>" id="my-dropzone" class="dropzone">
                       <!-- <button type="submit" id="submit" style="margin-left:280px;" class="mulbtn">Upload Images</button>-->
                    </form>
                </div>                 
            </div>
        </div>
    </div>
</div>

<script>
            Dropzone.options.myDropzone = {

              // Prevents Dropzone from uploading dropped files immediately
             // autoProcessQueue: false,
              acceptedFiles: "image/*,mp4",
              maxFiles: 20,
              init: function() {
                var submitButton = document.querySelector("#submit-all")
                    myDropzone = this; // closure

                submitButton.addEventListener("click", function() {
                  myDropzone.processQueue(); // Tell Dropzone to process all queued files.
                });

                // You might want to show the submit button only when 
                // files are dropped here:
                this.on("addedfile", function() {
                  // Show submit button here and/or inform user to click it.
                });

              }
            };
</script>









