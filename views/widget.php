<!-- This file is used to markup the public facing widget. -->

<!-- Note that the use of the 'Title' field is purely for example purposes only. -->
<?php 
if( isset( $apikey ) && ! empty( $apikey ) ) {

  echo $before_title . $title . $after_title;
  echo $before_widget;
  
  ?>
  
  <!-- formulário -->
	  <label>Celular para cancelar:</label><br />
	  <input type="text" name="cancelarCelular" id="cancelarCelular" />
	  <input type="hidden" name="cancelarApikey" id="cancelarApikey" value="<?php echo $apikey; ?>" />
    <div id="cancelStatus"></div>
  <!--/ formulário -->
  
  <?php
  
  echo $after_widget;
  
} // end if/else
  
?>
