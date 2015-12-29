<?php
class paginator{
	
	public static function paginateSpecials($limit=6){
		$dbh = Database::GetDB();
		
		//prepare query.  Has a count to get number of items
		$specials = $dbh->prepare("SELECT *, COUNT(*) FROM specials s
								   JOIN inventory i
								   ON s.iid = i.iid");
		//Bind the values
		//$specials->bindParam ( ':limit', $limit, PDO::PARAM_INT );
		
		//execute
		$specials->execute();
		
		//Fetch the row to see if it exists
		$results = $specials->fetch ( PDO::FETCH_ASSOC );
		
		
		if(!isset($results) || ($results['productName']==null) ){
			echo "<span>No Specials Today</span>";
		}else{//if there exists specials, find out how to display them
			
			//get the number of pages going to be displayed
			$numOfPages = ceil($results['COUNT(*)']/$limit);
			
			// What page are we currently on?
			$numOfPages = min($numOfPages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
					'options' => array(
							'default'   => 1,
							'min_range' => 1,
					),
			)));
			
			// Calculate the offset for the query
			$offset = ($numOfPages - 1)  * $limit;
			
			// Some information to display to the user
			$start = $offset + 1;
			$end = min(($offset + $limit), $total);
			
			// The "back" link
			$prevlink = ($numOfPages > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
		
			// The "forward" link
			$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
		
		
		}
		

			

	}
}
?>