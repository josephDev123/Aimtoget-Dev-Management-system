
<?php
$conn = mysqli_connect('localhost', 'root', '', 'cms');

if (!$conn) {
	die("connection failed:".mysqli_connect_error());
}