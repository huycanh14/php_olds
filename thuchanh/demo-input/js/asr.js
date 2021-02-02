// Global UI elements:
//  - log: event log
//  - trans: transcription window

// Global objects:
//  - tt: simple structure for managing the list of hypotheses
//  - dictate: dictate object with control methods 'init', 'startListening', ...
//       and event callbacks onResults, onError, ...
var tt = new Transcription();
var cur_status = 0;
var dictate = new Dictate({
        server : "wss://api.vais.vn/v1/ws/asr",
		recorderWorkerPath : '/static/js/audio/recorderWorker.js',
		onReadyForSpeech : function() {
			__message("READY FOR SPEECH");
			__status("I'm listening ...");
		},
		onEndOfSpeech : function() {
			__message("END OF SPEECH");
			__status("Transcribing...");
		},
		onEndOfSession : function() {
			__message("END OF SESSION");
			__status("");
		},
		onPartialResults : function(hypos, worker_name) {
			// TODO: demo the case where there are more hypos
			tt.add(hypos, false);
			__updateTranscript(hypos, worker_name, false);
		},
		onResults : function(hypos, worker_name) {
			// TODO: demo the case where there are more results
			tt.add(hypos, true);
			__updateTranscript(hypos, worker_name, true);
            //$("#buttonStart").html("Start");
			// diff() is defined only in diff.html
			if (typeof(diff) == "function") {
				diff();
			}
            $("#buttonStart").removeAttr("disabled");
		},
		onError : function(code, data) {
			__error(code, data);
			__status("Viga: " + code);
			dictate.cancel();
		},
		onEvent : function(code, data) {
			__message(code, data);
		}
	});

// Private methods (called from the callbacks)
function __message(code, data) {
	//log.innerHTML = "msg: " + code + ": " + (data || '') + "\n" + log.innerHTML;
}

function __error(code, data) {
	//log.innerHTML = "ERR: " + code + ": " + (data || '') + "\n" + log.innerHTML;
}

function __status(msg) {
	statusBar.innerHTML = msg;
}

function __serverStatus(msg) {
	serverStatusBar.innerHTML = msg;
}

var hyp_count = 0;
function __updateTranscript(text, worker_name, is_final) {
    if (text){
        var wid = hyp_count.toString();
        console.log(text);
        /*if ($("#text_" + wid).length == 0){
            myDivs = $('<br/> <textarea rows="1" cols="100%" id="text_' + wid + '"> </textarea> ').appendTo('div#result')

        }
    	$("#text_" + wid).val(text);
    	//__status("Done ...");*/
    	$('#noidung').val(text);
    }
    if (is_final){
        hyp_count += 1;
        console.log('chưa có nội dung');
        var test = $('#noidung');
        // alert(test.val());
        test.val('chưa có nội dung');
    }
}

// Public methods (called from the GUI)
function toggleLog() {
	$(log).toggle();
}
function clearLog() {
	log.innerHTML = "";
}

function clearTranscription() {
	tt = new Transcription();
	$("#trans").val("");
}

function toogleListening() {
    if (cur_status == 0) {
        clearTranscription();
        $("#buttonStart").html("Stop");
        cur_status = 1;
	    __status("Please wait, I'm preparing ...");
	    dictate.startListening();
    }else{
        $("#buttonStart").html("Stopping");
        $("#buttonStart").attr("disabled", true);
        cur_status = 0;
	    dictate.stopListening();
    }
}

function stopListening() {
	dictate.stopListening();
}

function cancel() {
	dictate.cancel();
}

function init() {
	dictate.init();
	__status("Hey, click the start button </br> and wait until I'm ready to listen to your voice ...");
}

function showConfig() {
	var pp = JSON.stringify(dictate.getConfig(), undefined, 2);
	log.innerHTML = pp + "\n" + log.innerHTML;
	$(log).show();
}

window.onload = function() {
	init();
};


$('#tieude').click(function() {
	/* Act on the event */
	toogleListening();
});

$('#noidung').click(function(){
	toogleListening();
});