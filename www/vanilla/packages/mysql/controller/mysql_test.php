<?php
/**
 * Test some queries.
 */
class Mysql_Test_Controller extends Core_Controller
{
	public function main()
	{				
		// Instance the component.
		$db = new Mysqli_Component;	
		
		// Create a sample table. 
		//We will delete this later, so ensure this table does not already exist!
		$db->query 
		(
			'
			CREATE TABLE IF NOT EXISTS `example_temporary_table` (
			  `id` integer UNSIGNED NOT NULL AUTO_INCREMENT,
			  `name` varchar(255)  NOT NULL,
			  PRIMARY KEY (`id`)
			)
			'
		);
		
		// Add some rows to our table. Demonstrates query binding.
		$db->query
		(
			'
			INSERT INTO
				`example_temporary_table`
			(
				`name`
			)
			VALUES (?),(?),(?),(?),(?)
			',
			'Tom',
			'Bob',
			'Ingrid',
			'Sam',
			'James'
		);
		
		// Run a sample query on table	
		$result = $db->query('SELECT * FROM example_temporary_table a LIMIT ?,?', 0, 5);
		
		// Clean up our sample table.
		$db->query('DROP TABLE `example_temporary_table`');
		
		// Demonstrate foreach through result				
		$row_ids = array();
		foreach ($result as $row)
		{
			$row_ids[] = $row->name;
		}		
		
		// Reset the result pointer, now you can work with each row again!
		$result->rewind();
		
		// Show query log, current row, and total row count					
		Core::dump($db->get_query_log(), $result->current(), 'Total Rows: ' . $result->count, $row_ids);	
	}
}