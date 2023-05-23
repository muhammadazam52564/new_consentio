@extends( 'admin.layouts.admin_app' )
@section( 'content' )

<style>
		

	.main_croppir_img {
		position: relative;
		overflow: hidden;
	}
	.main_croppir_img .main_cropie_icon {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		color: #fff;
		background: #0000008f;
	}
		/*
		label.cabinet{
		display: block;
		cursor: pointer;
		}

		label.cabinet input.file{
			position: relative;
			height: 100%;
			width: auto;
			opacity: 0;
			-moz-opacity: 0;
			filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
			margin-top:-30px;
			}

	#upload-demo{
		width: 100%;
		height: 265px;
		padding-bottom: 25px;
		}
		.img-thumbnail{
			/*background-color:#000 !important;*/
		}
		*/

		.uploadcare--jcrop-holder>div>div, #preview {
				/*border-radius: 50%;*/
				}

		.uploadcare--menu__item_tab_facebook, .uploadcare--menu__item_tab_gdrive, .uploadcare--menu__item_tab_gphotos, .uploadcare--menu__item_tab_dropbox, .uploadcare--menu__item_tab_instagram, .uploadcare--menu__item_tab_evernote, .uploadcare--menu__item_tab_flickr, .uploadcare--menu__item_tab_onedrive, .uploadcare--dialog__powered-by {
		display: none !important;
	}


	.switch {
	position: relative;
	display: inline-block;
	width: 60px;
	height: 34px;
	}

	.switch input { 
	opacity: 0;
	width: 0;
	height: 0;
	}

	#size{
		margin-left: 8px;
		font-size: 18px;
		width: 168px;
		padding: 3px;
	}

	.slider {
	position: absolute;
	cursor: pointer;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color: #ccc;
	-webkit-transition: .4s;
	transition: .4s;
	}

	.slider:before {
	position: absolute;
	content: "";
	height: 26px;
	width: 26px;
	left: 4px;
	bottom: 4px;
	background-color: white;
	-webkit-transition: .4s;
	transition: .4s;
	}

	input:checked + .slider {
	background-color: #2196F3;
	}

	input:focus + .slider {
	box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	-webkit-transform: translateX(26px);
	-ms-transform: translateX(26px);
	transform: translateX(26px);
	}

	/* Rounded sliders */
	.switch {
	position: relative;
	display: inline-block;
	width: 60px;
	height: 34px;
	}

	.switch input { 
	opacity: 0;
	width: 0;
	height: 0;
	}

	.size{
		margin-left: 58px;
		width: 168px;
		padding: 3px;
	}

	.slider {
	position: absolute;
	cursor: pointer;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color: #ccc;
	-webkit-transition: .4s;
	transition: .4s;
	}

	.slider:before {
	position: absolute;
	content: "";
	height: 26px;
	width: 26px;
	left: 4px;
	bottom: 4px;
	background-color: white;
	-webkit-transition: .4s;
	transition: .4s;
	}

	input:checked + .slider {
	background-color: #2196F3;
	}

	input:focus + .slider {
	box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	-webkit-transform: translateX(26px);
	-ms-transform: translateX(26px);
	transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	border-radius: 34px;
	}

	.slider.round:before {
	border-radius: 50%;
	}
	.max-spec {
		font-size:14px;
	}






</style>

<div class="app-title">
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>
		</li>
		<li class="breadcrumb-item"><a href="{{url('/site_admin')}}">Site Admins </a>
		</li>
		<li class="breadcrumb-item"><a href="{{url('/add_admin')}}">Add Site Administrator</a>
		</li>		
	</ul>
</div>

@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Breadcrumb-->
<!--<div class="breadcrumb-holder container-fluid">-->
<!--	<ul class="breadcrumb">-->
<!--		<li class="breadcrumb-item">-->
<!--			<a href="{{url('dashboard')}}">Home</a>-->
<!--		</li>-->
<!--		<li class="breadcrumb-item active">Add Organization Administrator</li>-->
<!--	</ul>-->
<!--</div>-->
<!-- Forms Section-->
<section class="forms">
	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-12">

				<div class="card">
				    

					<div class="card-header d-flex align-items-center">
						<h3 class="h4">Add Site Administrator</h3>
					</div>
					<div class="card-body" id="org-form">
						<div class="card-body-form">
						<form class="form-horizontal" method="POST" action="{{ url('/add_admin') }}" enctype="multipart/form-data" autocomplete="off">
						{{ csrf_field() }}

							<div class="form-group row">
								<label class="col-sm-4 form-control-label">Name</label>
								<div class="col-sm-8">
									<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> 
								</div>
							</div>
							<div class="line"></div>

							<div class="form-group row">
								<label class="col-sm-4 form-control-label">Email</label>
								<div class="col-sm-8">
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="nope" required>
								</div>
							</div>
							<div class="line"></div>
							
							
							<div class="form-group row">
								<label class="col-sm-4 form-control-label">Password</label>
								<div class="col-sm-8">
									<input id="password" type="password" class="form-control" name="password" required>
								</div>
							</div>
							<div class="line"></div>

							<div class="form-group row">
								<label class="col-sm-4 form-control-label">Repeat Password</label>
								<div class="col-sm-8">
									<input id="rpassword" type="password" class="form-control" name="rpassword" required>
								</div>
							</div>
							<div class="line"></div>

							<div class="line"></div>	
						
						</div>					
							

							
							<div class="OrganizationUser">
								<div class="form-group row">
									{{-- <label class="col-sm-6 form-control-label">Profile image</label> --}}
									<div class="img_dlt">
{{-- NEW CROPPRE --}}

										<script>
  										   UPLOADCARE_PUBLIC_KEY = "demopublickey";
										</script>
										<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js" charset="utf-8"></script>
										<input type="hidden" role="uploadcare-uploader" data-crop="5:4" data-images-only >

										<!-- Your preview will be put here -->
										<div class="main_croppir_img"  style="width: fit-content;" >
											
											<div class="main_cropie_icon " style="display: none;" id="loader">
						                        <i class="fa fa-circle-o-notch fa-spin fa-5x fa-fw"></i>
						                      </div>

										  <img src="<?php  echo  URL::to('/dummy.jpg');  ?>" alt="" id="preview" width=300 height=300 />
										</div>

{{-- END OF NEW CROPPRE --}}

										<input type="hidden" name="base_string" value="" id="destination"> 
										
											<!-- croper start -->
								{{-- <label class="cabinet center-block">
										<figure>
											<img src="" class="gambar img-responsive img-thumbnail" name="base_64_image" id="item-img-output" />
											<figcaption id="clickabkle"><i class="fa fa-camera d-none"></i></figcaption>
										</figure>
										<input type="file" class="item-img file center-block d-none" accept="image/x-png,image/jpeg,image/jpg" id="ch_br_button" name="images"/>
										<a style="margin-top: 20px; margin-left: 52px;" onclick="document.getElementById('ch_br_button').click()"class="btn btn-primary" href="#">Browse image</a>

										
									</label>
									--}}
									{{-- <script type="text/javascript">
										function abc(){
										     setTimeout(function(){ 
										     document.getElementById("destination").value = document.getElementById("item-img-output").src;
										      }, 350);
										}
										
									</script> --}}

									<!-- croepr edn -->
									</div>
								</div>
								<div class="form-group row form-btn" style="margin-left: 52px;">
										<div class="col-sm-12 text-left">
											<a href="{{url('admin')}}" class="btn btn-sm btn-secondary">@lang('general.cancel')</a>
											<button type="submit" id="sub_button" class="btn btn-sm btn-primary">@lang('general.save') </button>
										</div>
									</div>	
							</div>
							
							</form>

							

					</div>


				</div>
			</div>
		</div>
	</div>
	<!-- croper model -->
	<div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">
						</h4>
					</div>
					<div class="modal-body">
						<div id="upload-demo" class="center-block"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" id="cropImageBtn" onclick="abc()" class="btn btn-primary">Crop</button>
					</div>
				</div>
			</div>
		</div>


</section>
<script>

			// Start upload preview image
                        $(".gambar").attr("src", "<?php  echo  URL::to('/dummy.jpg');  ?>");
						var $uploadCrop,
						tempFilename,
						rawImg,
						imageId;
						function readFile(input) {
				 			if (input.files && input.files[0]) {
				              var reader = new FileReader();
					            reader.onload = function (e) {
									$('.upload-demo').addClass('ready');
									$('#cropImagePop').modal('show');
						            rawImg = e.target.result;
					            }
					            reader.readAsDataURL(input.files[0]);
					        }
					        else {
						        swal("Sorry - you're browser doesn't support the FileReader API");
						    }
						}

						$uploadCrop = $('#upload-demo').croppie({
							viewport: {
								width: 500,
								height: 700,
							},
							enforceBoundary: true,
							enableExif: true
						});
						$('#cropImagePop').on('shown.bs.modal', function(){
							// alert('Shown pop');
							$uploadCrop.croppie('bind', {
				        		url: rawImg
				        	}).then(function(){
				        		console.log('jQuery bind complete');
				        	});
						});

						$('.item-img').on('change', function () { imageId = $(this).data('id'); tempFilename = $(this).val();
							 $('#cancelCropBtn').data('id', imageId); readFile(this); });
						$('#cropImageBtn').on('click', function (ev) {
							$uploadCrop.croppie('result', {
								type: 'base64',
								format: 'jpeg',
								size: {width: 600, height: 800}
							}).then(function (resp) {
								$('#item-img-output').attr('src', resp);
								$('#cropImagePop').modal('hide');
							});
						});
				// End upload preview image
		</script>


<script>
	// Getting an instance of the widget.
const widget = uploadcare.Widget('[role=uploadcare-uploader]');
// Selecting an image to be replaced with the uploaded one.
const preview = document.getElementById('preview');
// "onUploadComplete" lets you get file info once it has been uploaded.
// "cdnUrl" holds a URL of the uploaded file: to replace a preview with.
widget.onUploadComplete(fileInfo => {
	$('#sub_button').hide();
    $('#loader').show();
  preview.src = fileInfo.cdnUrl;
  // alert(fileInfo.cdnUrl);

  const toDataURL = url => fetch(url)
  .then(response => response.blob())
  .then(blob => new Promise((resolve, reject) => {
  	$('#sub_button').hide();
    $('#loader').show();
    const reader = new FileReader()
    reader.onloadend = () => resolve(reader.result)
    reader.onerror = reject
    reader.readAsDataURL(blob)
  }))


toDataURL(fileInfo.cdnUrl)
  .then(dataUrl => {
  	$('#sub_button').show();
    $('#loader').hide();
    // console.log(dataUrl)
    preview.src = dataUrl
    $('#destination').val(dataUrl);
  })

})




</script>

<script>
	
	$('#add_images').click(function(){
	$('#images').click();
	});

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#images").change(function() {
  readURL(this);
});


  $(document).ready(function() {
    const company = '{{ old('team') }}';
    
    if(company !== '') {
      $('#team').val(company);
    }
  });



</script>

@endsection