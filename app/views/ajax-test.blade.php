
<html> 
<head> 
    <script src="/packages/ckeditor/ckeditor.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
 
    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#myForm').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
            }); 
        }); 
    </script> 
</head> 
<body>

    <form id="otherform" action="comment" method="post"> 
    Name: <input type="text" name="name" /> 
    Comment: <textarea name="comment1"></textarea> 
    <input type="submit" value="Submit Comment" /> 
</form>

 <form id="myForm" action="comment" method="post"> 
    Name: <input type="text" name="name" /> 
    Comment: <textarea name="comment"></textarea> 
    <input type="submit" value="Submit Comment" /> 
</form>

<script>
            CKEDITOR.replace('comment1');
</script>
</body>