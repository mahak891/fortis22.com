<?php
function viewdoctors(){
$query3 = new EntityFieldQuery();
$query3->entityCondition('entity_type', 'node')
	   ->entityCondition('bundle', 'doctor');
$result3= $query3->execute();

$header = array(t('Doctor name'), t('Speciality Name'), t('Hospital'));
$rows = array();
foreach ($result3['node'] as $key => $value2) {
  $nid = $value2->nid;
  $doc = node_load($nid);
  $field_value = field_get_items('node', $doc, 'field_speciality')[0]['tid'];
  $field_value1= field_get_items('node', $doc, 'field_hospitals')[0]['target_id'];
    // dpm($doc->title);
  $docname = $doc->title;
  $spec = taxonomy_term_load($field_value);
  $hosp = node_load($field_value1);

      //dpm($spec->name);
    //  dpm($hosp->title);
  $speclname = $spec->name;
  $hospname = $hosp->title;
  $subrow = array();
  $subrow[] = $docname;
  $subrow[] = $speclname;
  $subrow[] = $hospname;
  $rows[] = $subrow;
}

	 return theme('table', array('header' => $header, 'rows' => $rows)); 

}	   

