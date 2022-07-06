
<!DOCTYPE html>
<html>
  <head>
    <title>Show and Hide div elements using radio buttons</title>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <style type="text/css">
      .select {
        color: #fff;
        padding: 30px;
        display: none;
        margin-top: 30px;
        width: 100%;
      }

      label {
        margin-right: 20px;
      }
    </style>
  </head>

  <body>
    <center>
    
Example 2 (Add Alert)
<!DOCTYPE html>
<html>
  <head>
    <title>Show and Hide div elements using radio buttons</title>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <style type="text/css">
      .select {
        color: #fff;
        padding: 30px;
        display: none;
        margin-top: 30px;
        width: 100%;
      }

      label {
        margin-right: 20px;
      }
    </style>
  </head>

  <body style="font-family: 'Times New Roman', Times, serif;">
    <center>
      <h1>Codelapan</h1>
      <p>Show and Hide div based on radio button selection using jquery</p>
      <div>
        <label><input type="radio" name="type" value="single" />Single</label>
        <label><input type="radio" name="type" value="team" />Team</label>
      </div>
      <input type="text" name="val" id="val">

      <script type="text/javascript">
        $(document).ready(function () {
          $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            if(inputValue=="single")
            {
                document.getElementById('val').type = 'text';
            }
            if(inputValue=="team")
            {
                document.getElementById('val').type = 'date';
            }
            alert("Radio button '" + inputValue + "' is selected");
          });
        });
      </script>
    </center>
  </body>
</html> 

    </center>
  </body>
</html>
