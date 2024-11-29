<!DOCTYPE html>
<html>
<head>
  <title>Video Player</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #222;
    }
    
    #videoContainer {
      width: 960px;
      margin: 50px auto;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      background-color: #000;
    }
    
    #videoPlayer {
      width: 100%;
    }
  </style>
</head>
<body>
  <div id="videoContainer">
    <video id="videoPlayer" controls>
      <source src="tutorial/login_form.mkv" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>

  <script>
    var videoPlayer = document.getElementById('videoPlayer');
    
    videoPlayer.addEventListener('ended', function() {
      window.location.href = 'index.php'; // Replace 'next_page.html' with the URL of the page you want to redirect to
    });
  </script>
</body>
</html>
