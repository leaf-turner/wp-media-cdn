
//test object
var jsonObject = {
	"code": 200,
	"image": "https://www.queness.com/resources/images/png/apple_raw.png",
	"new_size": 305,
	"original_size": 200,
	"percent": 50,
	"success": true
};

//test call
writeToBucket(jsonObject);

/*
 * this function:
 * - takes in a jsonObject from imagify
 * - adds file sizes to image file name //newFileName
 * - requests image from imageUrl
 * - uploads image to Google Cloud bucket 
 * - returns url for image in Google Cloud bucket
 *
 * resources:
 *	https://googlecloudplatform.github.io/google-cloud-node/#/docs/storage/master/storage/file
 *	https://googlecloudplatform.github.io/google-cloud-node/#/docs/storage/master/storage/bucket?method=upload
 *	http://stackabuse.com/the-node-js-request-module/
 */
 
function writeToBucket(jsonObject){
	
	/*
	 *	Google API authentication
	 */
	 
	var gcs = require('@google-cloud/storage')({
  		projectId: 'wp-media-cdn',
  		keyFilename: 'wp-media-cdn-d9d7c61bfad9.json'
	})
	
	/*
	 *	rename image file with image size, format: size X size imgName
	 */
	 
	if(jsonObject.code !== 200){
		 console.log('HTTP Response code ' + jsonObject.code);
	} 
	var imgUrl = jsonObject.image;
	var imgSize = jsonObject.new_size;
	var pos = imgUrl.lastIndexOf("/");
  	var newImageName = imgUrl.substring(pos+1,imgUrl.length);
  	newImageName = imgSize.toString() +" X " + imgSize.toString() + " " + newImageName;
	
	/*
	 *	Read image into stream, upload image to bucket
	 */
	 
	var request = require('request');
	var fs = require('fs'); //used for createWriteString()
	
	var myBucket = gcs.bucket('test_buckyy'); //PUT BUCKET NAME HERE
	var file = myBucket.file(newImageName);
	
	//pipes image data into fileStream
	let fileStream = myBucket.file(newImageName).createWriteStream();  
	request(imgUrl).pipe(fileStream)
		.on('error', function(err) {})
		.on('finish', function() {
			// file uploaded
		});
	/*
	 *	return image url
	 *	use getSignedUrl 
	 */
	 
		
		return 'https://storage.googleapis.com/${test_buckyy}/${newFileName}';
	
}
