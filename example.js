$("#coverUpload").dropzone({
		url: "/businesses/addfiles",
		sending: function(file, xhr, formData){
			formData.append('imageType', "cover");
            formData.append('businessID', $("#businessID").val());
			formData.append('imageFormat', file.type);
			console.log(file.type);
        },
		addRemoveLinks : true,
		maxFiles:2,
		autoProcessQueue : false,
		autoQueue: false,
		accept: function(file, done) {
			if(file.cropped) {
				done();
			}
			file.acceptDimensions = done;
            file.rejectDimensions = function(msg) { done(msg); };
		},
		acceptedFiles: ".jpeg,.jpg,.png",
		init: function() {
			var myDropzone = this;
			if (coverThumbnailUrls) {
				for (var i = 0; i < coverThumbnailUrls.length; i++) {
					var imgURL = "/static/uploads/"+$("#userID").val()+"/"+$("#businessID").val()+"/cover/"+coverThumbnailUrls[i];
					var mockFile = { 
						name: coverThumbnailUrls[i], 
						//size: 12345, 
						//type: 'image/jpeg', 
						status: Dropzone.ADDED, 
						url: imgURL
					};

					// Call the default addedfile event handler
					myDropzone.emit("addedfile", mockFile);
					myDropzone.emit("complete", mockFile);
					// And optionally show the thumbnail of the file:
					myDropzone.emit("thumbnail", mockFile, imgURL);

					myDropzone.files.push(mockFile);
					var existingFileCoun = coverThumbnailUrls.length;
					myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCoun;
				}
			}
		}
		,
	success: function(file, serverFileName) {
		
		fileList3.push ({"serverFileName" : serverFileName.fname, "fileName" : file.name});
		$(".head-banner img").attr("src", serverFileName.url);
		$.fancybox.close();
		if(serverFileName.fname) {
			$cropperModal.modal('hide').remove();
			$(".modal-backdrop").remove();
		}
	},
	removedfile: function(file) {
		var rmvFile = "";
		if(fileList3.length > 0) {
		for(f=0;f<fileList3.length;f++){

			if(fileList3[f].fileName == file.name)
			{
				console.log("new: "+ fileList3[f].fileName+"old: "+file.name);
				rmvFile = fileList3[f].serverFileName;
				fileList3.splice(f,1);
				//myDropzone.options.maxFiles = myDropzone.options.maxFiles + 1;
			}

		}
		} else {
			rmvFile = file.name;
		}
		if(rmvFile == "") {
			rmvFile = file.name;
		}
		if (rmvFile){
			this.options.maxFiles = 1;
			console.log(rmvFile);
			$.ajax({
				type: 'POST',
				url: '/businesses/deletefile',
				data: "id="+rmvFile+"&businessID="+$("#businessID").val()+"&imageType=cover",
				dataType: 'html'
			}).done(function () { $(document).find(file.previewElement).remove(); });
			//var _ref;
			
			//return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;   
		}
		console.log(this.options.maxFiles);
	},
	thumbnail: function(file) {
		if (file.acceptDimensions) {
			if (file.width < 840 && file.height < 285) {
				file.rejectDimensions("The resolution has to be at least 840 x 285");
			}	else {
				file.acceptDimensions();
			}
		}
		$(".dz-image img").attr("src",file.url)
		if(file.accepted) {
			$.fancybox.close();
			var myDropzone = this
			if (file.cropped) {
				return;
			}
			var cachedFilename = file.name;
			//console.log(file);
			//myDropzone.removeFile(file);
		
			
			var $uploadCrop = $cropperModal.find('.crop-upload'); //1
			$cropperModal.find(".zoom-in, .zoom-out").remove();
			var $img = $('<img />');
			var reader = new FileReader();
			reader.onloadend = function () {
				$cropperModal.find('.image-container').html($img);
				$img.attr('src', reader.result);
				$img.cropper({
					preview: '.image-preview',
					aspectRatio: 35  / 12,
					autoCropArea: 1,
					movable: false,
					cropBoxResizable: true,
					minContainerHeight : 320,
					minContainerWidth : 568,
					viewMode:2,
					cropBoxResizable: false
				});
			};
			
			reader.readAsDataURL(file);		
			$cropperModal.modal('show');
				
			$uploadCrop.on('click', function() {
				var blob = $img.cropper('getCroppedCanvas').toDataURL();
				var newFile = dataURItoBlob(blob);
				newFile.cropped = true;
				newFile.name = cachedFilename;

				  myDropzone.removeAllFiles();
				  myDropzone.options.maxFiles = 1;
		
				myDropzone.addFile(newFile);
				myDropzone.enqueueFile(newFile);
				myDropzone.processQueue();
				
				
			});
			 var $this = $(document);
			$this.on('click', '.rotate-right', function () {
                $img.cropper('rotate', 45);
            })
            .on('click', '.rotate-left', function () {
                $img.cropper('rotate', -45);
            })
            .on('click', '.reset', function () {
                $img.cropper('reset');
            })
            .on('click', '.scale-x', function () {
                var $this = $(this);
                $img.cropper('scaleX', $this.data('value'));
                $this.data('value', -$this.data('value'));
            })
            .on('click', '.scale-y', function () {
                var $this = $(this);
                $img.cropper('scaleY', $this.data('value'));
                $this.data('value', -$this.data('value'));
            });
			
			/*.on('click', '.zoom-in', function () {
				$img.cropper('zoom', -0.1);
            })
			
			.on('click', '.zoom-out', function () {
                $img.cropper('zoom', 0.1);
            });*/
		}
	}
	});
}