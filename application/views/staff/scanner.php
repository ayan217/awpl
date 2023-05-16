<style>
/* Center the scanner container */
.scaner-box {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.scanner-container {
  height: 100vh;
  background: #353535;
  position: relative;
  width: 100%;
}

/* Set the dimensions and border for the scanner video */
.scanner-video {
	position: relative;
	height: 100vh;
}

/* Add the scanner line */
.scanner-line {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 2px;
  background-color: #FFF;
  width: 100%;
  margin: auto;
  animation: scan 2s infinite;
}
.bg-color-nw {
  position: absolute;
  width: 200px;
  height: 200px;
  background: transparent;
  opacity: 1;
  top: 60px;
  left: 0;
  right: 0;
  width: 100%;
}
.bg-color-nw::before {
  content: '';
  height: 100vh;
  width: 100vw;
  top: -60px;
  left: 0px;
  opacity: 0.7;
  position: absolute;
  border-color: rgb(0, 0, 0);
  border-style: solid;
  border-width: 75px 65px 500px 81px;
  box-sizing: border-box;
}
.scan-qr {
	color: #fff;
	text-align: center;
	position: relative;
	top: -22px;
	font-size: 22px;
}
/* Animate the scanner line */
@keyframes scan {
	from {
		top: 0;
	}

	to {
		top: 100%;
	}
}

</style>
<script src="<?= ASSET_URL ?>js/instascan.min.js"></script>
<div class="scanner-container">
	<div class="scaner-box">
		<video id="preview" class="scanner-video"></video>
		<div class="scanner-line"></div>
	</div>
	<div class="bg-color-nw"><p class="scan-qr">Scan the QR Code</p></div>
</div>

<script>
	// Create a new Instascan scanner instance
	let scanner = new Instascan.Scanner({
		video: document.getElementById('preview')
	});

	// Add a callback function to handle when a QR code is detected
	scanner.addListener('scan', function(content) {
		// alert("QR code detected: " + content);
		window.location.replace(content);
	});

	// Start the scanner
	// Get the list of available cameras
	Instascan.Camera.getCameras().then(function(cameras) {
		if (cameras.length > 0) {
			// Find the rear camera
			let rearCamera = cameras.find(function(camera) {
				return camera.name.indexOf('back') !== -1;
				// return true;
			});

			// If a rear camera was found, start scanning with it
			if (rearCamera) {
				scanner.start(rearCamera);
			} else {
				console.error('No rear camera found.');
			}
		} else {
			console.error('No cameras found.');
		}
	});
</script>
