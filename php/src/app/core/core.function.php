<?php

function printResult($result): void{
    if ($result) {
        echo $result['score'];
    }
    else{
        echo 0;
    }
  }
function response($success,$message,$data = null){
	return json_encode(
		[
			'success' => $success,
			'message' => $message,
			'data' => $data,
		],
		JSON_PRETTY_PRINT
	);
}


?>