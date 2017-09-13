<?php
if($this->session->userdata('logged_in')){
?>
<div class="modal fade" id="signature-expires" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hvem bruger systemet?</h5>
        
      </div>
      <div class="modal-body">
        <?php $this->load->view('forms/set-signature'); ?>
      </div>
     
    </div>
  </div>
</div>

<script>

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

var timestamp = Math.floor(Date.now() / 1000);

var signature_expires = getCookie('signature_expiration');

var count = signature_expires - timestamp;

var counter=setInterval(timer, 1000); 

function timer()
{
  count=count-1;
  if (count <= 0)
  {
  	$('#signature-expires').modal("show");
     clearInterval(counter);
     return;
  }

 document.getElementById("timer").innerHTML=count + " sek."; // watch for spelling
}

</script>

<?php } ?>

<nav class="navbar navbar-expand-lg fixed-bottom navbar-light bg-light" style="box-shadow: 0px -1px 4px 0px rgb(206, 206, 206);
    border-top: 1px solid #cccccc;">
  <a class="navbar-brand" href="#">
    <span id="signature-name">
      <?php if(get_cookie('signature_name') == null){ echo "Start"; }
      else{
      echo get_cookie('signature_name');
      } ?>
    </span>
     <span class="navbar-text">
      <div id="timer"> ... sek.</div>
    </span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarText">
    
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('/') ?>">
          Skift bruger
        </a>
      </li>
      
    </ul>
    
  </div>
</nav>