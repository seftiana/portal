<?php
class eventclass_t_user  extends eventsBase
{
	function __construct()
	{
	// fill list of events
		$this->events["BeforeEdit"]=true;

		$this->events["BeforeAdd"]=true;


//	onscreen events

	}

//	handlers

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// Before record updated
function BeforeEdit(&$values, $where, &$oldvalues, &$keys, &$message, $inline, &$pageObject)
{

		$dummypassw=$oldvalues['tusrPassword'];
if ($values['tusrPassword']==$dummypassw){
    $values['tusrPassword']=$dummypassw; 
} 
else {
  $values['tusrPassword']=md5($values['tusrPassword']);
}


// Place event code here.
// Use "Add Action" button to add code snippets.

return true;
;		
} // function BeforeEdit

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
				// Before record added
function BeforeAdd(&$values, &$message, $inline, &$pageObject)
{

		$values['tusrPassword']=md5($values['tusrPassword']);
$values['tusrRefIndex']=$values['tusrNama'];

// Place event code here.
// Use "Add Action" button to add code snippets.

return true;
;		
} // function BeforeAdd

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
//	onscreen events







}
?>
