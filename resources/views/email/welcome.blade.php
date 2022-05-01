<!DOCTYPE html>
<html>
<head>
    <title>Welcome {{ $uname }}</title>
</head>
<body>
 <div>
  <h2>Hi {{ $uname }}! your application 
      @if($accept != false)
      it was {{$accept}}
      @else
        has been uploaded, good luck !<h2>
      @endif
 </div>
</body>
</html>