<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Index</title>
</head>
<body>
	<textarea id="ckeditor_textarea " name="ckeditor_textarea" class="ckeditor_textarea"></textarea>
	<span class="text" data-id="1">Hello_world1 &nbsp;</span>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript">

	// editor is object of your CKEDITOR
	// editor.on('change',function(){
	//     console.log("test");
	// });
	// $("#p1").onclick()
	$( document ).ready(function() {

		var editor = CKEDITOR.replace( 'ckeditor_textarea ', {
			extraAllowedContent: 'a span',
			allowedContent:true,
		});


		editor.on( 'change', function(e) {
			console.log(e);
			// editor.document.isEditable( true );
			$( document ).on("dblclick", ".text", function(eV) {
		  		console.log(eV)
			});
			editor.on( 'doubleclick', function( evt ){
               // var element = evt.data.element.$.innerHTML;
               // var data = evt.data.element.$.dataset.id;
               // console.log(element)
               // console.log(data);
               // var content = editor.querySelectorAll('.text');
               var content = document.getElementById('ckeditor_textarea');;
               console.log(content);
           });
		});
	});



</script>
</body>
</html>
<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Index</title>
</head>
<body>
	<span class="text" data-id="1">Hello world</span>
	<textarea id="ckeditor_textarea " name="ckeditor_textarea" class="ckeditor_textarea"></textarea>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
	var editor = CKEDITOR.replace( 'ckeditor_textarea ', {
		extraAllowedContent: 'a span',
		allowedContent:true,
	});
	// editor is object of your CKEDITOR
	// editor.on('change',function(){
	//     console.log("test");
	// });
	// $("#p1").onclick()
	editor.on("doubleclick", function(evt) {
	      // YOUR CODE GOES HERE
	      // console.log("element clicked: ", event.data.$.target);
	      // event.data.$.target.classList.add("text-primary")
	      // event.data.preventDefault();
	      // var content = editor.querySelectorAll('.text');
	      // console.log(content);
   			console.log(event.data.$.target);
   			console.log(element);
	});

</script>
</body>
</html> -->