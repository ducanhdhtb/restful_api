<?php
//Khi sử dụng cURL thường có 3 bước cơ bản:
//
//Khởi tạo cURL
//Cấu hình tham số cho cURL
//Thực thi cURL
//Ngắt cURL, giải phóng dữ liệu
////fetch.php

$api_url = "http://localhost/tutorial/rest-api-crud-using-php/api/test_api.php?action=fetch_all";

$client = curl_init($api_url); // Khởi tạo cURL

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
// Xac dinh dia chi can thuc thi
//
// //URLOPT_RETURNTRANSFER: TRUE để curl_exec() trả về chuỗi chứ không xuất thẳng ra
// CURLOPT_POST: TRUE – Thiết lập yêu cẩu gửi theo phương thức POST
//echo (curl_setopt($client, CURLOPT_RETURNTRANSFER, true));

$response = curl_exec($client);// Gửi Request với cURL
//echo ($response);

$result = json_decode($response);
//echo "<pre>";
//print_r ($result);
//echo "</pre>";

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row->first_name.'</td>
			<td>'.$row->last_name.'</td>
			<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button></td>
			<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">No Data Found</td>
	</tr>
	';
}

echo $output;

?>