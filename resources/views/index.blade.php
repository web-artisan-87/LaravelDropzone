<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8">
	    <title>Index</title>
	    <link rel="icon" type="/image/png" href="/img/favicon.png">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
		<link href="/css/plugins/dropzone/dropzone.css" rel="stylesheet">
		<script src="/js/plugins/dropzone/dropzone.js"></script>
    </head>
    <body class="page-index">
            <div class="tabs-container" style="margin:40px;">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#upload_file">Upload Files</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="chart_tab" class="tab-pane active">
                        <div class="panel-body">
                            <div class="row">
								<form action="/upload-file" class="dropzone" id="upload-file-form" name="upload-file-form" method="POST" enctype="multipart/form-data">
									{{csrf_field()}}
								</form><br><br>
								<button type="submit" class="btn btn-success pull-right" id="btnUpload">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
<script type="text/javascript">
		Dropzone.autoDiscover = false;
	    	var myDropzone = new Dropzone('#upload-file-form', {
			    // paramName: "files",
			    url: '/upload-file',
			    method: 'post',
			    maxFilesize: 25,
			    maxFiles: 4,
			    parallelUploads: 4,
			    uploadMultiple: false,
			    autoProcessQueue: false,
			    acceptedFiles: ".png",
			    addRemoveLinks: true,
			});

			$('#btnUpload').on('click', function(){
			    myDropzone.processQueue();
			});
</script>
