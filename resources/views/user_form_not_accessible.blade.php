@extends('users.ex_user_app', ['load_admin_css' => true])
@section('content')
<style>
.section-heading {
	margin-bottom:10px;
}
</style>
<?php
    // echo "<pre>";
    // print_r($filled);
    // echo "</pre>";
    // exit;
?>
<h1>Access Notice</h1>
<p style="font-size:20px;color:#f00">The form cannot be accessed</p>

@endsection