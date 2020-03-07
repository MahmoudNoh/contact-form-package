<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <style>
        .contact-us{
            margin-top: 50px;
        }
    </style>

</head>
<body>


<div class="contact-us">
    <div class="container">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <h1>
                    @if (config('contact.contact_form_title'))
                        {{config('contact.contact_form_title')}}
                    @else
                        Contact Us any time
                    @endif
                </h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                <form action="{{route('contact')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">
                            @if (config('contact.contact_form_name_field'))
                                {{config('contact.contact_form_name_field')}}
                            @else
                                Name
                            @endif
                                :
                        </label>
                        <input type="text" name="name"   class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id='name'>
                    </div>

                    <div class="form-group">
                        <label for="email">
                            @if (config('contact.contact_form_email_field'))
                                {{config('contact.contact_form_email_field')}}
                            @else
                                Email
                            @endif
                            :
                        </label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"  id='email'  value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="message">
                            @if (config('contact.contact_form_message_field'))
                                {{config('contact.contact_form_message_field')}}
                            @else
                                Message
                            @endif
                            :
                        </label>
                        <textarea name="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror" id='message'>{{ old('message') }}</textarea>
                    </div>

                    @php($sendButton = "Send")
                    @if (config('contact.contact_form_send_button'))
                        @php($sendButton = config('contact.contact_form_send_button'))
                    @endif

                    <input type="submit" value="{{$sendButton}}" class="btn btn-primary">
                </form>

            </div>
        </div>
    </div>

</div>




    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>