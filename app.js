var http = require('http');
var fs = require('fs');
var watson = require('watson-developer-cloud');

var speech_to_text = watson.speech_to_text({
  username: '652ea0c1-b578-44d1-aafb-2d0973598e2b',
  password: 'YD8QTDVHUzj6',
  version: 'v1'
});

var params = {
  content_type: 'audio/flac',
  continuous: true,
  interim_results: true,
  smart_formatting: true
};

// Create the stream.
var recognizeStream = speech_to_text.createRecognizeStream(params);

// Pipe in the audio.
var uploadeFile = "Between_Two_Plants.flac"; // public/uploads/audioFile.flac
fs.createReadStream(uploadeFile).pipe(recognizeStream);

// Pipe out the transcription to a file.
recognizeStream.pipe(fs.createWriteStream('transcription.txt'));

// Get strings instead of buffers from 'data' events.
recognizeStream.setEncoding('utf8');


var alchemy_language = watson.alchemy_language({
  api_key: 'dbddfc3d1dbc81bc23782faba7dcdda640abccd7'
});

var all_text = fs.readFileSync('transcription.txt').toString();

var parameters = {
  text: all_text,
  sentiment: 1  
  // maxRetrieve: 20
};

alchemy_language.combined(parameters, function (err, response) {

  if (err)
    console.log('error:', err);
  else {
    console.log(JSON.stringify(response, null, 2));
    
    var arr = [];
    var hold = response['relations'];
    var temp = "";
    var questions = [];
    var rand = 0;
    var changeToUpper = false;

    for (var i = 0; i < hold.length; i++) {
        temp = Object.byString(response, 'relations['+i+'].sentence');
        arr[i] = temp;
        temp = Object.byString(response, 'relations['+i+'].subject.text');
        
        questions[i] = new Array(5);  // 1st element is the question
                                      // 2nd, 3rd, 4th elements are wroong answers!
                                      // 5th element is the correct answer
        
        // multiple choice
        questions[i][0] = arr[i].replace(temp, '_________________');
        changeToUpper = false;
        
        if (questions[i][0].indexOf('_', 0) == 0) {
          changeToUpper = true;
        }
        
        for (var j = 1; j <= 3; j++) {
          
          rand = i;
          while (rand == i) {
            rand = Math.floor(Math.random() * hold.length);
            console.log("random_" + i + "_" + rand);
          }
          
          questions[i][j] = Object.byString(response, 'relations['+rand+'].subject.text');
          
          if (changeToUpper == true) {
            console.log("yes");
            questions[i][j] = questions[i][j].substring(0, 1).toUpperCase() + questions[i][j].substring(1, questions[i][j].length);
            console.log(questions[i][j]);
          } else {
            console.log("no");
            questions[i][j] = questions[i][j].substring(0, 1).toLowerCase() + questions[i][j].substring(1, questions[i][j].length);
            console.log(questions[i][j]);
          }
        }
        questions[i][4] = temp;
    }

    for (var i = 0; i < arr.length; i++) { 
      console.log(questions[i][0]); 
      console.log("1." + questions[i][1]);
      console.log("2." + questions[i][2]);
      console.log("3." + questions[i][3]);
      console.log("4." + questions[i][4]);
      console.log();
    }
  }
});

// alchemy_language.keywords(parameters, function(err, response) {
//   if (err) {
//     console.log('error:', err);
//   } else {
//     var temp = response['keywords'];
    
    
//   }
// });

/** copied from StackOverflow: http://stackoverflow.com/questions/6491463/accessing-nested-javascript-objects-with-string-key **/
Object.byString = function(o, s) {
    s = s.replace(/\[(\w+)\]/g, '.$1'); // convert indexes to properties
    s = s.replace(/^\./, '');           // strip a leading dot
    var a = s.split('.');
    for (var i = 0, n = a.length; i < n; ++i) {
        var k = a[i];
        if (k in o) {
            o = o[k];
        } else {
            return;
        }
    }
    return o;
};

