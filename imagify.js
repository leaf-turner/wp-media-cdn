var token = "d0e020dda55a01c8e753214e3b298376e875f9cf";

var sizes = JSON.parse('{"thumbnail": {"width": "500", "height":"500","crop":"true"}, "medium": {"width": "500", "height":"500","crop":"true"}}');

send_to_imagify("test", "test", sizes, token);

function send_to_imagify(title, image, sizes, token) {

  var nodeImagifyAPI = require("node-imagify-api");

  for (var i in sizes) {
      var options = {
        'ultra': true,
        'resize': {
          'width': sizes[i].width,
          'height': sizes[i].height
        }
      };

      var apiCallback = function(result) {
        console.log("result :" + JSON.stringify(result));
      }

      nodeImagifyAPI.uploadImage(token, options, "test_image.jpg", apiCallback);
  }
}
