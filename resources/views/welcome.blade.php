<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <form action="{{ route('contact.save') }}" method="post">
        @csrf

       <div class="form-group">
            <!-- NAME -->
            <input type="text" id="name" name="name" placeholder="Name">    
            <!-- Show error -->

            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif
       </div> <br>

        <div class="form-group">
            <!-- EMAIL -->
            <input type="email" id="emailid" name="email" placeholder="Email Address"> 

            <!-- Show error -->
            @if ($errors->has('email'))
            <div class="alert alert-danger">
                {{ $errors->first('email') }}
            </div>

            @endif
        </div> <br>
        
        <div class="form-group">     
            <!-- PHONE NUMBER -->
            <input type="text" id="num" name="phone" placeholder="Phone Number" id="phone"> 
            <!-- Show error -->

            @if ($errors->has('phone'))
            <div class="alert alert-danger">
                {{ $errors->first('phone') }}
            </div>

            @endif
        </div> <br>

        <div class="form-group">
            <!-- SUBJECT -->
            <input type="text" id="name" name="subject" placeholder="Subject" id="subject"> <br>
            <!-- Show error -->

            @if ($errors->has('subject'))
            <div class="alert alert-danger">
                {{ $errors->first('subject') }}
            </div>

            @endif
        </div> <br>

        <div class="form-group">           
            <textarea name="message" id="message" rows="5"></textarea>
            @if ($errors->has('message'))
                <div class="alert alert-danger">
                    {{ $errors->first('message') }}
                </div>
            @endif
        </div>

        <input type="submit" value="Send" name="send">

    </form>


    <a href="login">
        Login
    </a>



</body>
</html>