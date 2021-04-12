<?php  foreach($dados as $dado): ?>


<hr>
Nome: <?php echo $dado->nome; ?><br>
<a href="<? echo base_url('public/upload/').$dado->arquivo; ?>"><button class="btn btn-success">Dowload</button></a>  <br>
<a href="<? echo base_url('public/upload/').$dado->zip; ?>"><button class="btn btn-info">Dowload Zip</button></a>
<hr>


<?php endforeach; ?>
