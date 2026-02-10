<?php
   require('form.inc.php');
   $Form = new FormSolution;
   echo '<form>';

   echo '<label for="the_id" accesskey="y"><u>Y</u>ear</label>';

   $yearList = $Form->DateTimeOptionList('year', $Form->StartYear, 'StartYear',
      'N', 10, 'N', 1995, 15, 'some_class_name', 'the_id');

   $monthList = $Form->DateTimeOptionList('month', $Form->StartMonth, 'StartMonth', 'N', 13, 'Y');
   echo $yearList;
   echo '</form>'
?> 