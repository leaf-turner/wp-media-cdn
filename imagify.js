var token ="d0e020dda55a01c8e753214e3b298376e875f9cf";

send_to_imagify("test","test","test",token);





function send_to_imagify(title, image, sizes, token) {

  var nodeImagifyAPI = require("node-imagify-api");

  var options = {'ultra':true
                  , 'resize': {'width':150, 'height':10000}};

  var apiCallback = function (result) {
      console.log("result :"+JSON.stringify(result));
  }

  nodeImagifyAPI.uploadImage(token,options,"test_image.jpg",apiCallback);

}
