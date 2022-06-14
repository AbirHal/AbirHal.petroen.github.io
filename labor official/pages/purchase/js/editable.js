$(document).ready(function(){
	$('#editableTable').Tabledit({
		deleteButton: false,
		editButton: false,   		
		columns: {
		  identifier: [0, 'ID'],                    
		  editable: [[1, 'material'], [2, 'tq'], [3, 'mq'], [4, 'md'], [5, 'lp'], [6, 'price'], [7, 'tprice']]
		},
		hideIdentifier: true,
		url: 'action.php'		
	});
});