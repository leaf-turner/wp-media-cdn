var token ="d0e020dda55a01c8e753214e3b298376e875f9cf";

var sizes = '{"thumbnail": { width": 150, "height":150,"crop":true}, "medium": { width": 150, "height":150,"crop":true}';


send_to_imagify("test","test",sizes,token);

function send_to_imagify(title, image, sizes, token) {

  var nodeImagifyAPI = require("node-imagify-api");

  var options = {'ultra':true,
                   'resize': {'width':sizes[0].width, 'height':sizes[0].height}
                };

  var apiCallback = function (result) {
      console.log("result :"+JSON.stringify(result));
  }

  nodeImagifyAPI.uploadImage(token,options,"test_image.jpg",apiCallback);

}
