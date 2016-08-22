<?php
?>
<div class="hospital-page">


<ul>
<?php foreach ($name as $key => $value) : ?>
<li class="first1"><a href="<?php print $value['nid'];?>"><?php print $value['title']; ?></a>
  	<ul>
  <li class="viewdoctors"><a href="doc/doctor_associated">VIEW:DOCTORS</a></li>
   </ul>
</li>
  <?php endforeach; ?>
</ul>
</div>